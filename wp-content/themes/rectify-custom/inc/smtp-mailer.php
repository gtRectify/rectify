<?php
/**
 * Route wp_mail() through a real SMTP relay instead of PHP's native mail().
 *
 * PHP's mail() hands the message to the server's local MTA and returns as
 * soon as that handoff succeeds - it has no way to report a downstream
 * bounce, so wp_mail() reports success even when the message never reaches
 * an inbox. This is the standard cause of "form says sent, email never
 * arrives", and hosts commonly black-hole native mail() on staging
 * environments specifically.
 *
 * Stays a no-op unless RECTIFY_SMTP_HOST is defined (e.g. in wp-config.php),
 * so each environment opts in independently and nothing changes here until
 * real credentials are provided.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_configure_smtp' ) ) {
    /**
     * @param PHPMailer\PHPMailer\PHPMailer $phpmailer
     */
    function rectify_configure_smtp( $phpmailer ) {
        if ( ! defined( 'RECTIFY_SMTP_HOST' ) || ! RECTIFY_SMTP_HOST ) {
            return;
        }

        $phpmailer->isSMTP();
        $phpmailer->Host       = RECTIFY_SMTP_HOST;
        $phpmailer->Port       = defined( 'RECTIFY_SMTP_PORT' ) ? (int) RECTIFY_SMTP_PORT : 587;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Username   = defined( 'RECTIFY_SMTP_USER' ) ? RECTIFY_SMTP_USER : '';
        $phpmailer->Password   = defined( 'RECTIFY_SMTP_PASS' ) ? RECTIFY_SMTP_PASS : '';
        $phpmailer->SMTPSecure = defined( 'RECTIFY_SMTP_SECURE' ) ? RECTIFY_SMTP_SECURE : 'tls';
        $phpmailer->SMTPAutoTLS = false;
    }
}
add_action( 'phpmailer_init', 'rectify_configure_smtp' );

if ( ! function_exists( 'rectify_smtp_mail_from' ) ) {
    function rectify_smtp_mail_from( $original_email ) {
        return defined( 'RECTIFY_SMTP_FROM_EMAIL' ) && RECTIFY_SMTP_FROM_EMAIL
            ? RECTIFY_SMTP_FROM_EMAIL
            : $original_email;
    }
}
add_filter( 'wp_mail_from', 'rectify_smtp_mail_from', 20 );

if ( ! function_exists( 'rectify_smtp_mail_from_name' ) ) {
    function rectify_smtp_mail_from_name( $original_name ) {
        return defined( 'RECTIFY_SMTP_FROM_NAME' ) && RECTIFY_SMTP_FROM_NAME
            ? RECTIFY_SMTP_FROM_NAME
            : $original_name;
    }
}
add_filter( 'wp_mail_from_name', 'rectify_smtp_mail_from_name', 20 );
