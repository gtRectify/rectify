<?php
/**
 * Contact Us confirmation email.
 *
 * The Contact Us HubSpot form (portal 48201196, form
 * f02ab874-fad0-436f-a5ca-56897af5b5cb) posts straight to HubSpot from the
 * browser, so WordPress never sees that submission server-side. Instead,
 * js/contact-thankyou.js listens for HubSpot's own "onFormSubmitted"
 * postMessage (the same event that already opens the on-page thank-you
 * modal), reads the submitted name/email out of it, and calls the AJAX
 * action below to send this confirmation through wp_mail() - kept entirely
 * on the WordPress side rather than relying on a HubSpot workflow email.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_contact_confirmation_email_html' ) ) {
    /**
     * Build the confirmation email body. Matches Figma node 626:8577
     * ("Contact Confirmation Email").
     *
     * @param string $first_name Submitted first name, already sanitized. May be empty.
     * @return string Full HTML document for the email body.
     */
    function rectify_contact_confirmation_email_html( $first_name ) {
        $font    = rectify_email_font_stack();
        $hero    = rx_asset_url( 'images/home/TruckandVanathouse.jpg' );
        $greeting = $first_name ? 'Dear ' . $first_name . ',' : 'Hi there,';

        ob_start();
        ?>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:18px;line-height:24px;color:#676767;padding-bottom:32px;">
                        <?php echo esc_html( $greeting ); ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:18px;line-height:26px;color:#bd1726;padding-bottom:32px;">
                        Thank you for contacting Rectify.
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:16px;line-height:22px;color:#676767;padding-bottom:32px;">
                        We&rsquo;ve received your enquiry and appreciate you taking the time to get in touch. A member of our team is reviewing your message and will respond as soon as possible, typically within one business day.
                    </td>
                </tr>
        <?php
        $body_top = ob_get_clean();

        $inner  = rectify_email_header_html();
        $inner .= rectify_email_hero_html( $hero );
        $inner .= '<tr><td style="padding:40px 39px 0;"><table role="presentation" width="100%" cellpadding="0" cellspacing="0">';
        $inner .= $body_top;
        $inner .= rectify_email_resource_buttons_html();
        $inner .= rectify_email_urgent_call_html();
        $inner .= rectify_email_closing_html();
        $inner .= '</table></td></tr>';
        $inner .= rectify_email_divider_html();
        $inner .= rectify_email_trust_html();
        $inner .= rectify_email_footer_html();

        return rectify_email_document_html( 'Thank you for contacting Rectify', $inner );
    }
}

if ( ! function_exists( 'rectify_send_contact_confirmation_email' ) ) {
    /**
     * Send the confirmation email and report the underlying wp_mail() result.
     *
     * @param string $to_email   Validated recipient address.
     * @param string $first_name Sanitized first name, may be empty.
     * @return true|WP_Error
     */
    function rectify_send_contact_confirmation_email( $to_email, $first_name ) {
        $subject = 'Thank you for contacting Rectify';
        $body    = rectify_contact_confirmation_email_html( $first_name );

        $headers = array( 'Content-Type: text/html; charset=UTF-8' );

        $set_mail_from      = static function () {
            return 'hello@rectify.com.au';
        };
        $set_mail_from_name = static function () {
            return 'Rectify Group';
        };

        $mail_error         = '';
        $capture_mail_error = static function ( $wp_error ) use ( &$mail_error ) {
            $mail_error = $wp_error->get_error_message();
        };

        add_filter( 'wp_mail_from', $set_mail_from );
        add_filter( 'wp_mail_from_name', $set_mail_from_name );
        add_action( 'wp_mail_failed', $capture_mail_error );

        $sent = wp_mail( $to_email, $subject, $body, $headers );

        remove_filter( 'wp_mail_from', $set_mail_from );
        remove_filter( 'wp_mail_from_name', $set_mail_from_name );
        remove_action( 'wp_mail_failed', $capture_mail_error );

        if ( ! $sent ) {
            return new WP_Error( 'rectify_mail_failed', $mail_error ? $mail_error : 'wp_mail() returned false.' );
        }

        return true;
    }
}

if ( ! function_exists( 'rectify_handle_contact_confirmation_email' ) ) {
    /**
     * AJAX callback fired by js/contact-thankyou.js right after the Contact Us
     * HubSpot form reports a successful submission client-side.
     */
    function rectify_handle_contact_confirmation_email() {
        check_ajax_referer( 'rectify_nonce', 'nonce' );

        // Same per-IP limit used by inc/staff-email.php for the same reason:
        // this endpoint can only be reached by JS already running on our own
        // page, but the address it emails is still visitor-supplied.
        $is_rate_limit_exempt = current_user_can( 'manage_options' );
        $ip                   = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '';
        $rate_limit_key       = 'rectify_contact_email_' . md5( $ip );
        $sent_in_window       = (int) get_transient( $rate_limit_key );

        if ( ! $is_rate_limit_exempt && $sent_in_window >= 5 ) {
            wp_send_json_error( array( 'message' => 'Too many requests.' ), 429 );
        }

        $email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
        $first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';

        if ( ! $email || ! is_email( $email ) ) {
            wp_send_json_error( array( 'message' => 'A valid email address is required.' ) );
        }

        set_transient( $rate_limit_key, $sent_in_window + 1, 15 * MINUTE_IN_SECONDS );

        $result = rectify_send_contact_confirmation_email( $email, $first_name );

        if ( is_wp_error( $result ) ) {
            $error_response = array( 'message' => 'Something went wrong sending the confirmation email.' );

            if ( current_user_can( 'manage_options' ) ) {
                $error_response['debug'] = $result->get_error_message();
            }

            wp_send_json_error( $error_response );
        }

        wp_send_json_success( array( 'message' => 'Confirmation email sent.' ) );
    }
}

add_action( 'wp_ajax_rectify_contact_confirmation_email', 'rectify_handle_contact_confirmation_email' );
add_action( 'wp_ajax_nopriv_rectify_contact_confirmation_email', 'rectify_handle_contact_confirmation_email' );
