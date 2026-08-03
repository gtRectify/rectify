<?php
/**
 * Industries: Transport Assets page content template.
 *
 * Matches the Figma "Structural Stabilisation Solutions for Transport
 * Assets" design. All content is supplied by the Rectify Page Builder's
 * ii-* blocks; the seed data also provides the first-render fallback,
 * keeping the editable builder content and the front end in sync. Styling
 * lives entirely in assets/css/industries-inner-pages.css, scoped under the
 * .rx-ii-page wrapper below - shared with future Industries child pages
 * once their own designs are implemented.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ta_renderers = array(
    'ii-banner'       => 'rectify_pb_render_ii_banner',
    'ii-intro'        => 'rectify_pb_render_ii_intro',
    'ii-challenges'   => 'rectify_pb_render_ii_challenges',
    'ii-photo-banner' => 'rectify_pb_render_ii_photo_banner',
    'ii-solutions'    => 'rectify_pb_render_ii_solutions',
    'ii-why-choose'   => 'rectify_pb_render_ii_why_choose',
    'ii-process'      => 'rectify_pb_render_ii_process',
    'ii-faq'          => 'rectify_pb_render_ii_faq',
    'ii-cta'          => 'rectify_pb_render_ii_cta',
);

$rx_ta_blocks = function_exists( 'rectify_pb_get_transport_assets_seed_blocks' )
    ? rectify_pb_get_transport_assets_seed_blocks()
    : array();

$rx_ta_sections = array();

foreach ( $rx_ta_blocks as $rx_ta_block ) {
    $rx_ta_key      = isset( $rx_ta_block['section_key'] ) ? $rx_ta_block['section_key'] : '';
    $rx_ta_type     = isset( $rx_ta_block['type'] ) ? $rx_ta_block['type'] : '';
    $rx_ta_fields   = isset( $rx_ta_block['fields'] ) && is_array( $rx_ta_block['fields'] ) ? $rx_ta_block['fields'] : array();
    $rx_ta_renderer = isset( $rx_ta_renderers[ $rx_ta_type ] ) ? $rx_ta_renderers[ $rx_ta_type ] : '';

    if ( ! $rx_ta_key || ! $rx_ta_renderer || ! function_exists( $rx_ta_renderer ) ) {
        continue;
    }

    $rx_ta_sections[] = array(
        'key'    => $rx_ta_key,
        'render' => function () use ( $rx_ta_renderer, $rx_ta_fields, $rx_ta_key ) {
            call_user_func( $rx_ta_renderer, $rx_ta_fields, $rx_ta_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-transport-assets' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ta_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ta_sections );
    }
    ?>
</article>
