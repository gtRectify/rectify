<?php
/**
 * Commercial Slab Lifting page content template.
 *
 * Matches Figma node 904:13453. All section content is supplied by the
 * Rectify Page Builder; all page-specific presentation is scoped under the
 * .rx-ci-slab-page wrapper in commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_slab_renderers = array(
    'commercial-inner-banner'    => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'     => 'rectify_pb_render_commercial_inner_intro',
    'commercial-slab-causes'     => 'rectify_pb_render_commercial_void_causes',
    'commercial-slab-process'    => 'rectify_pb_render_commercial_void_process',
    'commercial-inner-why-cards' => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'       => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_slab_blocks = function_exists( 'rectify_pb_get_commercial_slab_lifting_seed_blocks' )
    ? rectify_pb_get_commercial_slab_lifting_seed_blocks()
    : array();

$rx_ci_slab_sections = array();

foreach ( $rx_ci_slab_blocks as $rx_ci_slab_block ) {
    $rx_ci_slab_key      = isset( $rx_ci_slab_block['section_key'] ) ? $rx_ci_slab_block['section_key'] : '';
    $rx_ci_slab_type     = isset( $rx_ci_slab_block['type'] ) ? $rx_ci_slab_block['type'] : '';
    $rx_ci_slab_fields   = isset( $rx_ci_slab_block['fields'] ) && is_array( $rx_ci_slab_block['fields'] ) ? $rx_ci_slab_block['fields'] : array();
    $rx_ci_slab_renderer = isset( $rx_ci_slab_renderers[ $rx_ci_slab_type ] ) ? $rx_ci_slab_renderers[ $rx_ci_slab_type ] : '';

    if ( ! $rx_ci_slab_key || ! $rx_ci_slab_renderer || ! function_exists( $rx_ci_slab_renderer ) ) {
        continue;
    }

    $rx_ci_slab_sections[] = array(
        'key'    => $rx_ci_slab_key,
        'render' => function () use ( $rx_ci_slab_renderer, $rx_ci_slab_fields, $rx_ci_slab_key ) {
            call_user_func( $rx_ci_slab_renderer, $rx_ci_slab_fields, $rx_ci_slab_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-slab-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_slab_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_slab_sections );
    }
    ?>
</article>
