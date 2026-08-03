<?php
/**
 * Commercial Leak Sealing & Water Stopping page content template.
 *
 * Matches Figma node 945:14703. Content is supplied by the Rectify Page
 * Builder and page-specific presentation lives in commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_leak_renderers = array(
    'commercial-inner-banner'    => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'     => 'rectify_pb_render_commercial_inner_intro',
    'commercial-leak-causes'     => 'rectify_pb_render_commercial_leak_causes',
    'commercial-leak-types'      => 'rectify_pb_render_commercial_leak_types',
    'commercial-leak-scenarios'  => 'rectify_pb_render_commercial_leak_scenarios',
    'commercial-leak-diagnostics'=> 'rectify_pb_render_commercial_leak_diagnostics',
    'commercial-inner-why-cards' => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'       => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_leak_blocks = function_exists( 'rectify_pb_get_commercial_leak_sealing_seed_blocks' )
    ? rectify_pb_get_commercial_leak_sealing_seed_blocks()
    : array();

$rx_ci_leak_sections = array();

foreach ( $rx_ci_leak_blocks as $rx_ci_leak_block ) {
    $rx_ci_leak_key      = isset( $rx_ci_leak_block['section_key'] ) ? $rx_ci_leak_block['section_key'] : '';
    $rx_ci_leak_type     = isset( $rx_ci_leak_block['type'] ) ? $rx_ci_leak_block['type'] : '';
    $rx_ci_leak_fields   = isset( $rx_ci_leak_block['fields'] ) && is_array( $rx_ci_leak_block['fields'] ) ? $rx_ci_leak_block['fields'] : array();
    $rx_ci_leak_renderer = isset( $rx_ci_leak_renderers[ $rx_ci_leak_type ] ) ? $rx_ci_leak_renderers[ $rx_ci_leak_type ] : '';

    if ( ! $rx_ci_leak_key || ! $rx_ci_leak_renderer || ! function_exists( $rx_ci_leak_renderer ) ) {
        continue;
    }

    $rx_ci_leak_sections[] = array(
        'key'    => $rx_ci_leak_key,
        'render' => function () use ( $rx_ci_leak_renderer, $rx_ci_leak_fields, $rx_ci_leak_key ) {
            call_user_func( $rx_ci_leak_renderer, $rx_ci_leak_fields, $rx_ci_leak_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-leak-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_leak_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_leak_sections );
    }
    ?>
</article>
