<?php
/**
 * Commercial Void Filling page content template.
 *
 * Matches Figma node 944:14183 ("Void Filling"). All content is supplied by
 * the Rectify Page Builder and all page-specific styling is scoped under the
 * .rx-ci-page wrapper in assets/css/commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_void_renderers = array(
    'commercial-inner-banner'    => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'     => 'rectify_pb_render_commercial_inner_intro',
    'commercial-void-causes'     => 'rectify_pb_render_commercial_void_causes',
    'commercial-void-process'    => 'rectify_pb_render_commercial_void_process',
    'commercial-inner-why-cards' => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'       => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_void_blocks = function_exists( 'rectify_pb_get_commercial_void_filling_seed_blocks' )
    ? rectify_pb_get_commercial_void_filling_seed_blocks()
    : array();

$rx_ci_void_sections = array();

foreach ( $rx_ci_void_blocks as $rx_ci_void_block ) {
    $rx_ci_void_key      = isset( $rx_ci_void_block['section_key'] ) ? $rx_ci_void_block['section_key'] : '';
    $rx_ci_void_type     = isset( $rx_ci_void_block['type'] ) ? $rx_ci_void_block['type'] : '';
    $rx_ci_void_fields   = isset( $rx_ci_void_block['fields'] ) && is_array( $rx_ci_void_block['fields'] ) ? $rx_ci_void_block['fields'] : array();
    $rx_ci_void_renderer = isset( $rx_ci_void_renderers[ $rx_ci_void_type ] ) ? $rx_ci_void_renderers[ $rx_ci_void_type ] : '';

    if ( ! $rx_ci_void_key || ! $rx_ci_void_renderer || ! function_exists( $rx_ci_void_renderer ) ) {
        continue;
    }

    $rx_ci_void_sections[] = array(
        'key'    => $rx_ci_void_key,
        'render' => function () use ( $rx_ci_void_renderer, $rx_ci_void_fields, $rx_ci_void_key ) {
            call_user_func( $rx_ci_void_renderer, $rx_ci_void_fields, $rx_ci_void_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-void-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_void_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_void_sections );
    }
    ?>
</article>
