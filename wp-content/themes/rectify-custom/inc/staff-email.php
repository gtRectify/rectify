<?php
/**
 * AJAX handler for the "Email" popup on the Meet the Team page.
 *
 * The recipient submitted by the browser is never trusted directly - it is
 * checked against the live team roster (same source the page itself renders
 * from) so the form can't be used to relay mail to arbitrary addresses.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_get_meet_the_team_recipients' ) ) {
    /**
     * Build an email => name map of the team members currently shown on the
     * Meet the Team page, pulling from saved builder data first and falling
     * back to the seed defaults, exactly as content-meet-the-team.php does.
     *
     * @return array<string, string>
     */
    function rectify_get_meet_the_team_recipients() {
        // The page lives at /about-us/meet-the-team/, so get_page_by_path()
        // would need the full hierarchical path; querying by post_name
        // directly finds it regardless of parent, same as is_page() does.
        $pages = get_posts( array(
            'name'           => 'meet-the-team',
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'numberposts'    => 1,
        ) );

        $page = ! empty( $pages ) ? $pages[0] : null;

        if ( ! $page ) {
            return array();
        }

        $items = array();

        if ( function_exists( 'rectify_pb_find_block' ) ) {
            $block = rectify_pb_find_block( $page->ID, 'mtt-team' );

            if ( $block && isset( $block['fields']['items'] ) && is_array( $block['fields']['items'] ) ) {
                $items = $block['fields']['items'];
            }
        }

        if ( empty( $items ) && function_exists( 'rectify_pb_get_about_meet_the_team_seed_blocks' ) ) {
            foreach ( rectify_pb_get_about_meet_the_team_seed_blocks() as $seed ) {
                if ( isset( $seed['section_key'] ) && 'mtt-team' === $seed['section_key'] ) {
                    $items = isset( $seed['fields']['items'] ) && is_array( $seed['fields']['items'] )
                        ? $seed['fields']['items']
                        : array();
                    break;
                }
            }
        }

        $recipients = array();

        foreach ( $items as $item ) {
            $name      = isset( $item['name'] ) ? sanitize_text_field( $item['name'] ) : '';
            $email_url = isset( $item['email_url'] ) ? $item['email_url'] : '';
            // Some saved team entries store email_url as "http://name@domain"
            // instead of "mailto:name@domain" - strip either prefix so the
            // real address underneath is still recognised.
            $email = sanitize_email( preg_replace( '#^(mailto:|https?://)#i', '', $email_url ) );

            if ( $email && is_email( $email ) ) {
                $recipients[ strtolower( $email ) ] = $name;
            }
        }

        return $recipients;
    }
}

if ( ! function_exists( 'rectify_handle_send_staff_email' ) ) {
    /**
     * AJAX callback: compose and send an email to one selected staff member.
     */
    function rectify_handle_send_staff_email() {
        check_ajax_referer( 'rectify_nonce', 'nonce' );

        // Honeypot: bots fill every field, humans never see this one. Report
        // success without sending so the bot doesn't learn to avoid it.
        if ( ! empty( $_POST['rx_mtt_company'] ) ) {
            wp_send_json_success( array( 'message' => 'Message sent.' ) );
        }

        // Admins testing the form themselves aren't the bot traffic this
        // limit exists to stop, so they're exempt from it.
        $is_rate_limit_exempt = current_user_can( 'manage_options' );

        $ip             = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '';
        $rate_limit_key = 'rectify_mtt_email_' . md5( $ip );
        $sent_in_window = (int) get_transient( $rate_limit_key );

        if ( ! $is_rate_limit_exempt && $sent_in_window >= 5 ) {
            wp_send_json_error( array( 'message' => 'Too many requests. Please try again later.' ), 429 );
        }

        $sender_name     = isset( $_POST['sender_name'] ) ? sanitize_text_field( wp_unslash( $_POST['sender_name'] ) ) : '';
        $sender_email    = isset( $_POST['sender_email'] ) ? sanitize_email( wp_unslash( $_POST['sender_email'] ) ) : '';
        $subject         = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
        $message         = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
        $recipient_email = isset( $_POST['recipient_email'] ) ? strtolower( sanitize_email( wp_unslash( $_POST['recipient_email'] ) ) ) : '';

        if ( ! $sender_name || ! $sender_email || ! is_email( $sender_email ) || ! $subject || ! $message ) {
            wp_send_json_error( array( 'message' => 'Please fill in all fields with a valid email address.' ) );
        }

        $roster = rectify_get_meet_the_team_recipients();

        if ( ! $recipient_email || ! isset( $roster[ $recipient_email ] ) ) {
            wp_send_json_error( array( 'message' => 'Please select a current team member to email.' ) );
        }

        set_transient( $rate_limit_key, $sent_in_window + 1, 15 * MINUTE_IN_SECONDS );

        $body = sprintf(
            "%s\n\n---\nSent via the Meet the Team page by %s (%s).",
            $message,
            $sender_name,
            $sender_email
        );

        $headers = array(
            sprintf( 'Reply-To: %s <%s>', $sender_name, $sender_email ),
        );

        // WordPress's default From address is "wordpress@" + the current
        // request's host, which PHPMailer rejects outright on local/staging
        // setups where that host has no dot (e.g. "wordpress@localhost").
        // Pin it to the real site domain so sending works the same in every
        // environment, not just once this is live on rectify.com.au.
        $set_mail_from      = static function () {
            return 'noreply@rectify.com.au';
        };
        $set_mail_from_name = static function () {
            return 'Rectify Website';
        };

        add_filter( 'wp_mail_from', $set_mail_from );
        add_filter( 'wp_mail_from_name', $set_mail_from_name );

        // Capture the underlying PHPMailer/SMTP error (if any) so it can be
        // surfaced to admins for diagnosis - wp_mail() itself only returns
        // a bare false, with no detail on why the send failed.
        $mail_error         = '';
        $capture_mail_error = static function ( $wp_error ) use ( &$mail_error ) {
            $mail_error = $wp_error->get_error_message();
        };
        add_action( 'wp_mail_failed', $capture_mail_error );

        $sent = wp_mail( $recipient_email, $subject, $body, $headers );

        remove_filter( 'wp_mail_from', $set_mail_from );
        remove_filter( 'wp_mail_from_name', $set_mail_from_name );
        remove_action( 'wp_mail_failed', $capture_mail_error );

        if ( ! $sent ) {
            $error_response = array( 'message' => 'Something went wrong sending your message. Please try again.' );

            // Only ever shown to logged-in admins - regular visitors never
            // see raw mail-server internals.
            if ( $mail_error && current_user_can( 'manage_options' ) ) {
                $error_response['debug'] = $mail_error;

                if ( false !== stripos( $mail_error, 'connect' ) && function_exists( 'rectify_smtp_connectivity_report' ) ) {
                    $error_response['debug'] .= ' :: ' . rectify_smtp_connectivity_report();
                }
            }

            wp_send_json_error( $error_response );
        }

        wp_send_json_success( array( 'message' => 'Message sent.' ) );
    }
}

add_action( 'wp_ajax_rectify_send_staff_email', 'rectify_handle_send_staff_email' );
add_action( 'wp_ajax_nopriv_rectify_send_staff_email', 'rectify_handle_send_staff_email' );
