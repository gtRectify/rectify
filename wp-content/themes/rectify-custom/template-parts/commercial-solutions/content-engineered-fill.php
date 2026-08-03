<?php
/**
 * Commercial Engineered Fill page content template.
 *
 * Matches Figma node 921:13763. Content is supplied by the Rectify Page
 * Builder and page-specific presentation lives in commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_engineered_renderers = array(
    'commercial-inner-banner'            => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'             => 'rectify_pb_render_commercial_inner_intro',
    'commercial-engineered-required'     => 'rectify_pb_render_commercial_engineered_required',
    'commercial-engineered-comparison'   => 'rectify_pb_render_commercial_engineered_comparison',
    'commercial-engineered-applications' => 'rectify_pb_render_commercial_engineered_applications',
    'commercial-engineered-process'      => 'rectify_pb_render_commercial_engineered_process',
    'commercial-inner-why-cards'         => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'               => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_engineered_blocks = function_exists( 'rectify_pb_get_commercial_engineered_fill_seed_blocks' )
    ? rectify_pb_get_commercial_engineered_fill_seed_blocks()
    : array();

$rx_ci_engineered_sections = array();

foreach ( $rx_ci_engineered_blocks as $rx_ci_engineered_block ) {
    $rx_ci_engineered_key      = isset( $rx_ci_engineered_block['section_key'] ) ? $rx_ci_engineered_block['section_key'] : '';
    $rx_ci_engineered_type     = isset( $rx_ci_engineered_block['type'] ) ? $rx_ci_engineered_block['type'] : '';
    $rx_ci_engineered_fields   = isset( $rx_ci_engineered_block['fields'] ) && is_array( $rx_ci_engineered_block['fields'] ) ? $rx_ci_engineered_block['fields'] : array();
    $rx_ci_engineered_renderer = isset( $rx_ci_engineered_renderers[ $rx_ci_engineered_type ] ) ? $rx_ci_engineered_renderers[ $rx_ci_engineered_type ] : '';

    if ( ! $rx_ci_engineered_key || ! $rx_ci_engineered_renderer || ! function_exists( $rx_ci_engineered_renderer ) ) {
        continue;
    }

    $rx_ci_engineered_sections[] = array(
        'key'    => $rx_ci_engineered_key,
        'render' => function () use ( $rx_ci_engineered_renderer, $rx_ci_engineered_fields, $rx_ci_engineered_key ) {
            call_user_func( $rx_ci_engineered_renderer, $rx_ci_engineered_fields, $rx_ci_engineered_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-engineered-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_engineered_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_engineered_sections );
    }
    ?>
</article>
