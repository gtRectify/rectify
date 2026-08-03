<?php
/**
 * Protective Coatings & Concrete Repair page content template.
 *
 * Matches Figma node 954:15156. Content is managed by Rectify Page Builder;
 * page-specific presentation is scoped under .rx-ci-pc-page in
 * commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_pc_renderers = array(
    'commercial-inner-banner'        => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'         => 'rectify_pb_render_commercial_inner_intro',
    'commercial-protective-causes'   => 'rectify_pb_render_commercial_protective_causes',
    'commercial-protective-solutions'=> 'rectify_pb_render_commercial_protective_solutions',
    'commercial-protective-feature'  => 'rectify_pb_render_commercial_protective_feature',
    'commercial-protective-repairs'  => 'rectify_pb_render_commercial_protective_repairs',
    'commercial-inner-why-cards'     => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'           => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_pc_blocks = function_exists( 'rectify_pb_get_commercial_protective_coatings_seed_blocks' )
    ? rectify_pb_get_commercial_protective_coatings_seed_blocks()
    : array();

$rx_ci_pc_sections = array();

foreach ( $rx_ci_pc_blocks as $rx_ci_pc_block ) {
    $rx_ci_pc_key      = isset( $rx_ci_pc_block['section_key'] ) ? $rx_ci_pc_block['section_key'] : '';
    $rx_ci_pc_type     = isset( $rx_ci_pc_block['type'] ) ? $rx_ci_pc_block['type'] : '';
    $rx_ci_pc_fields   = isset( $rx_ci_pc_block['fields'] ) && is_array( $rx_ci_pc_block['fields'] ) ? $rx_ci_pc_block['fields'] : array();
    $rx_ci_pc_renderer = isset( $rx_ci_pc_renderers[ $rx_ci_pc_type ] ) ? $rx_ci_pc_renderers[ $rx_ci_pc_type ] : '';

    if ( ! $rx_ci_pc_key || ! $rx_ci_pc_renderer || ! function_exists( $rx_ci_pc_renderer ) ) {
        continue;
    }

    $rx_ci_pc_sections[] = array(
        'key'    => $rx_ci_pc_key,
        'render' => function () use ( $rx_ci_pc_renderer, $rx_ci_pc_fields, $rx_ci_pc_key ) {
            call_user_func( $rx_ci_pc_renderer, $rx_ci_pc_fields, $rx_ci_pc_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-pc-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_pc_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_pc_sections );
    }
    ?>
</article>
