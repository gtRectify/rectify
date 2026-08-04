<?php
/**
 * Industries: Utilities & Energy page content template.
 *
 * All editable content is supplied by the Rectify Page Builder ii-* blocks.
 * The shared rx-ii-commercial-buildings class opts this page into the common
 * detailed-industry Figma layout; utilities-specific differences are scoped
 * by rx-ii-utilities-energy in industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ue_renderers = array(
    'ii-banner'       => 'rectify_pb_render_ii_banner',
    'ii-intro'        => 'rectify_pb_render_ii_intro',
    'ii-challenges'   => 'rectify_pb_render_ii_challenges',
    'ii-photo-banner' => 'rectify_pb_render_ii_photo_banner',
    'ii-solutions'    => 'rectify_pb_render_ii_solutions',
    'ii-why-choose'   => 'rectify_pb_render_ii_why_choose',
    'ii-process'      => 'rectify_pb_render_ii_process',
    'ii-assets'       => 'rectify_pb_render_ii_assets',
    'ii-faq'          => 'rectify_pb_render_ii_faq',
    'ii-cta'          => 'rectify_pb_render_ii_cta',
);

$rx_ue_blocks = function_exists( 'rectify_pb_get_utilities_energy_seed_blocks' )
    ? rectify_pb_get_utilities_energy_seed_blocks()
    : array();

$rx_ue_sections = array();

foreach ( $rx_ue_blocks as $rx_ue_block ) {
    $rx_ue_key      = isset( $rx_ue_block['section_key'] ) ? $rx_ue_block['section_key'] : '';
    $rx_ue_type     = isset( $rx_ue_block['type'] ) ? $rx_ue_block['type'] : '';
    $rx_ue_fields   = isset( $rx_ue_block['fields'] ) && is_array( $rx_ue_block['fields'] ) ? $rx_ue_block['fields'] : array();
    $rx_ue_renderer = isset( $rx_ue_renderers[ $rx_ue_type ] ) ? $rx_ue_renderers[ $rx_ue_type ] : '';

    if ( ! $rx_ue_key || ! $rx_ue_renderer || ! function_exists( $rx_ue_renderer ) ) {
        continue;
    }

    $rx_ue_sections[] = array(
        'key'    => $rx_ue_key,
        'render' => function () use ( $rx_ue_renderer, $rx_ue_fields, $rx_ue_key ) {
            call_user_func( $rx_ue_renderer, $rx_ue_fields, $rx_ue_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-utilities-energy' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ue_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ue_sections );
    }
    ?>
</article>
