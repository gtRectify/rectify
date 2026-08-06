<?php
/**
 * Shared markup for the HubSpot confirmation emails (Contact Us, Get a Free
 * Quote / sticky quick quote). Mirrors the Figma file's own reuse: "Email
 * Header", "Email Footer" and "Email Trust" are each a single named
 * component there, shared by both the Contact Confirmation Email (node
 * 626:8577) and Quote Confirmation Email (node 1388:23977) frames, plus the
 * "About Us"/"Case Studies" resource buttons and the urgent-call/closing
 * copy that both frames repeat verbatim.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_email_font_stack' ) ) {
    function rectify_email_font_stack() {
        return 'Helvetica, Arial, sans-serif';
    }
}

if ( ! function_exists( 'rectify_email_header_html' ) ) {
    function rectify_email_header_html() {
        $logo = rx_asset_url( 'images/rectify.png' );
        ob_start();
        ?>
    <tr>
        <td style="background:#222840;padding:26px 0;text-align:center;">
            <img src="<?php echo esc_url( $logo ); ?>" width="220" alt="Rectify" style="display:inline-block;width:220px;max-width:220px;height:auto;border:0;outline:none;">
        </td>
    </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_hero_html' ) ) {
    /**
     * @param string $image_url Absolute URL of the hero photo.
     */
    function rectify_email_hero_html( $image_url ) {
        ob_start();
        ?>
    <tr>
        <td style="line-height:0;font-size:0;">
            <img src="<?php echo esc_url( $image_url ); ?>" width="600" height="107" alt="" style="display:block;width:100%;height:107px;object-fit:cover;object-position:center 58%;border:0;outline:none;">
        </td>
    </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_resource_buttons_html' ) ) {
    function rectify_email_resource_buttons_html() {
        $font       = rectify_email_font_stack();
        $about_icon = rx_asset_url( 'images/Rectify-Icon-Set_About-Us-2-white.svg' );
        $case_icon  = rx_asset_url( 'images/Rectify-Icon-Set-Recovered_Case-Study-1.svg' );
        $about_url  = home_url( '/about-us/' );
        $cases_url  = home_url( '/resources/case-studies/' );
        ob_start();
        ?>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:16px;line-height:22px;color:#676767;padding-bottom:18px;">
                        In the meantime, here are some resources to get to know us better and explore how we&rsquo;ve helped others
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom:32px;">
                        <table role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding-right:10px;">
                                    <a href="<?php echo esc_url( $about_url ); ?>" style="display:inline-block;background:#bd1726;border:1px solid #bd1726;border-radius:8px;padding:15px 24px;font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:16px;line-height:22px;color:#ffffff;text-decoration:none;white-space:nowrap;">
                                        <img src="<?php echo esc_url( $about_icon ); ?>" width="18" height="18" alt="" style="vertical-align:middle;border:0;margin-right:8px;">
                                        <span style="vertical-align:middle;">About Us</span>
                                    </a>
                                </td>
                                <td style="padding-left:10px;">
                                    <a href="<?php echo esc_url( $cases_url ); ?>" style="display:inline-block;background:#ffffff;border:1px solid #bd1726;border-radius:8px;padding:15px 24px;font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:16px;line-height:22px;color:#bd1726;text-decoration:none;white-space:nowrap;">
                                        <img src="<?php echo esc_url( $case_icon ); ?>" width="18" height="18" alt="" style="vertical-align:middle;border:0;margin-right:8px;">
                                        <span style="vertical-align:middle;">Case Studies</span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_urgent_call_html' ) ) {
    function rectify_email_urgent_call_html() {
        $font = rectify_email_font_stack();
        ob_start();
        ?>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:18px;line-height:24px;color:#222840;padding-bottom:32px;">
                        If your enquiry is urgent, please call us on<br>
                        <span style="color:#bd1726;">1800 18 20 20</span> for immediate assistance.
                    </td>
                </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_closing_html' ) ) {
    function rectify_email_closing_html() {
        $font = rectify_email_font_stack();
        ob_start();
        ?>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:16px;line-height:22px;color:#676767;padding-bottom:32px;">
                        Thank you for choosing Rectify. We look forward to speaking with you.
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:16px;line-height:22px;color:#676767;padding-bottom:40px;">
                        Kind regards,<br><br>
                        <strong style="color:#222840;">Rectify Group</strong><br>
                        <span style="color:#222840;">Australia&rsquo;s Leading Structural Stabilisation Specialists</span>
                    </td>
                </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_divider_html' ) ) {
    function rectify_email_divider_html() {
        ob_start();
        ?>
    <tr>
        <td style="padding:0 39px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td style="border-top:1px solid #e3e5ea;font-size:0;line-height:0;">&nbsp;</td></tr></table>
        </td>
    </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_trust_html' ) ) {
    function rectify_email_trust_html() {
        $font        = rectify_email_font_stack();
        $google_logo = rx_asset_url( 'images/google-logo.png' );
        ob_start();
        ?>
    <tr>
        <td style="padding:32px 39px 0;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="45%" valign="middle" style="font-family:<?php echo esc_attr( $font ); ?>;">
                        <div style="color:#f7b500;font-size:20px;line-height:20px;letter-spacing:2px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <div style="margin-top:10px;font-size:14px;line-height:18px;color:#000000;"><strong>280+</strong>&nbsp;reviews&nbsp;|&nbsp;<strong>4.9/5</strong>&nbsp;average rating</div>
                        <img src="<?php echo esc_url( $google_logo ); ?>" width="98" alt="Google" style="display:block;margin-top:10px;border:0;">
                    </td>
                    <td width="10%" style="font-size:0;line-height:0;">
                        <table role="presentation" cellpadding="0" cellspacing="0" height="90"><tr><td style="border-left:1px solid #e3e5ea;font-size:0;">&nbsp;</td></tr></table>
                    </td>
                    <td width="45%" valign="middle" style="font-family:<?php echo esc_attr( $font ); ?>;">
                        <div style="font-weight:bold;font-size:30px;line-height:32px;color:#000000;">1,000+</div>
                        <div style="margin-top:8px;font-weight:bold;font-size:15px;line-height:18px;color:#000000;">Projects Completed</div>
                        <div style="margin-top:8px;font-size:12px;line-height:16px;color:#676767;">Delivering measurable outcomes across thousands of successful projects.</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_footer_html' ) ) {
    function rectify_email_footer_html() {
        $font    = rectify_email_font_stack();
        $icon_ig = rx_asset_url( 'images/email/social-instagram.svg' );
        $icon_fb = rx_asset_url( 'images/email/social-facebook.svg' );
        $icon_li = rx_asset_url( 'images/email/social-linkedin.svg' );
        $icon_yt = rx_asset_url( 'images/email/social-youtube.svg' );
        ob_start();
        ?>
    <tr>
        <td style="background:#222840;padding:32px 32px 24px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-weight:bold;font-size:16px;line-height:19px;color:#ffffff;padding-bottom:17px;">
                        Proven Experts &bull; Trusted By Thousands &bull; Results You Can Measure
                    </td>
                </tr>
                <tr>
                    <td style="border-top:1px solid rgba(255,255,255,0.25);font-size:0;line-height:0;padding-bottom:24px;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:10px;line-height:12px;color:#ffffff;padding-bottom:8px;">
                        FOLLOW US
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom:20px;">
                        <a href="https://www.instagram.com/rectify.group" style="display:inline-block;margin:0 6px;"><img src="<?php echo esc_url( $icon_ig ); ?>" width="32" height="32" alt="Instagram" style="display:block;border:0;"></a>
                        <a href="https://www.facebook.com/RectifyGroupAustralia" style="display:inline-block;margin:0 6px;"><img src="<?php echo esc_url( $icon_fb ); ?>" width="32" height="32" alt="Facebook" style="display:block;border:0;"></a>
                        <a href="https://www.linkedin.com/company/rectify-group-au" style="display:inline-block;margin:0 6px;"><img src="<?php echo esc_url( $icon_li ); ?>" width="32" height="32" alt="LinkedIn" style="display:block;border:0;"></a>
                        <a href="https://www.youtube.com/@rectifygroup6000" style="display:inline-block;margin:0 6px;"><img src="<?php echo esc_url( $icon_yt ); ?>" width="32" height="32" alt="YouTube" style="display:block;border:0;"></a>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-weight:300;font-size:10px;line-height:14px;color:#ffffff;padding-bottom:20px;">
                        You are receiving this email because you signed up on <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:#ffffff;text-decoration:underline;">Rectify.com.au</a> with this email address. If you have any questions or need assistance, please contact our team at 1800 80 20 20 or hello@rectify.com.au.
                    </td>
                </tr>
                <tr>
                    <td style="border-top:1px solid rgba(255,255,255,0.25);font-size:0;line-height:0;padding-bottom:12px;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:10px;line-height:14px;color:#ffffff;padding-bottom:12px;">
                        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="color:#ffffff;text-decoration:none;">Manage Preferences</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="color:#ffffff;text-decoration:none;">Support</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="mailto:hello@rectify.com.au?subject=Unsubscribe" style="color:#ffffff;text-decoration:none;">Unsubscribe</a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top:1px solid rgba(255,255,255,0.25);font-size:0;line-height:0;padding-bottom:16px;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" style="font-family:<?php echo esc_attr( $font ); ?>;font-size:9px;line-height:12px;color:#ffffff;">
                        28 Trade Park Drive, Tullamarine VIC 3043
                    </td>
                </tr>
            </table>
        </td>
    </tr>
        <?php
        return ob_get_clean();
    }
}

if ( ! function_exists( 'rectify_email_document_html' ) ) {
    /**
     * Wrap a 600px-wide inner table (header/body/footer <tr> blocks already
     * concatenated by the caller) in the boilerplate every confirmation
     * email shares: doctype, head, Outlook width-fix conditional comments.
     *
     * @param string $title       <title> / preview text.
     * @param string $inner_rows  Concatenated <tr> markup for the 600px table.
     */
    function rectify_email_document_html( $title, $inner_rows ) {
        ob_start();
        ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo esc_html( $title ); ?></title>
<!--[if mso]>
<style>
    table { border-collapse: collapse; }
</style>
<![endif]-->
</head>
<body style="margin:0;padding:0;background:#ffffff;-webkit-text-size-adjust:100%;">
<div style="display:none;max-height:0;overflow:hidden;mso-hide:all;"><?php echo esc_html( $title ); ?></div>
<!--[if mso]>
<table role="presentation" width="600" align="center" cellpadding="0" cellspacing="0"><tr><td>
<![endif]-->
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#ffffff;">
<tr>
<td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:600px;max-width:600px;background:#ffffff;">
<?php echo $inner_rows; // phpcs:ignore -- built from escaped, trusted pieces above. ?>
</table>
</td>
</tr>
</table>
<!--[if mso]>
</td></tr></table>
<![endif]-->
</body>
</html>
        <?php
        return ob_get_clean();
    }
}
