<?php
/**
 * Industries: Civil Infrastructure page content template.
 *
 * Matches the Figma "Structural Stabilisation Solutions for Civil
 * Infrastructure" design (node 1104:26274). All editable content is supplied
 * by the Rectify Page Builder ii-* blocks; the seed data doubles as the
 * first-render fallback. The shared rx-ii-commercial-buildings class opts this
 * page into the common detailed-industry layout; civil-specific measurements
 * are scoped by rx-ii-civil-infrastructure in industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_renderers = array(
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

$rx_ci_blocks = function_exists( 'rectify_pb_get_civil_infrastructure_seed_blocks' )
    ? rectify_pb_get_civil_infrastructure_seed_blocks()
    : array();

$rx_ci_sections = array();

foreach ( $rx_ci_blocks as $rx_ci_block ) {
    $rx_ci_key      = isset( $rx_ci_block['section_key'] ) ? $rx_ci_block['section_key'] : '';
    $rx_ci_type     = isset( $rx_ci_block['type'] ) ? $rx_ci_block['type'] : '';
    $rx_ci_fields   = isset( $rx_ci_block['fields'] ) && is_array( $rx_ci_block['fields'] ) ? $rx_ci_block['fields'] : array();
    $rx_ci_renderer = isset( $rx_ci_renderers[ $rx_ci_type ] ) ? $rx_ci_renderers[ $rx_ci_type ] : '';

    if ( ! $rx_ci_key || ! $rx_ci_renderer || ! function_exists( $rx_ci_renderer ) ) {
        continue;
    }

    $rx_ci_sections[] = array(
        'key'    => $rx_ci_key,
        'render' => function () use ( $rx_ci_renderer, $rx_ci_fields, $rx_ci_key ) {
            call_user_func( $rx_ci_renderer, $rx_ci_fields, $rx_ci_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-civil-infrastructure' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_sections );
    }
    ?>
</article>
