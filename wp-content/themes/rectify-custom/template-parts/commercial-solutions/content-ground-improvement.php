<?php
/**
 * Commercial Ground Improvement page content template.
 *
 * Matches the Figma design at node 902:13513 ("Ground Improvement"). All
 * content is supplied by the Rectify Page Builder's cgi-* blocks; the seed
 * data also provides the first-render fallback, keeping the editable builder
 * content and the front end in sync. Styling lives entirely in
 * assets/css/commercial-inner-pages.css, scoped under the .rx-ci-page
 * wrapper below (shared with the Pipe Abandonment page, which uses the same
 * design system).
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_cgi_renderers = array(
    'cgi-banner'         => 'rectify_pb_render_cgi_banner',
    'cgi-intro'          => 'rectify_pb_render_cgi_intro',
    'cgi-why-matters'    => 'rectify_pb_render_cgi_why_matters',
    'cgi-solutions-grid' => 'rectify_pb_render_cgi_solutions_grid',
    'cgi-why-choose'     => 'rectify_pb_render_cgi_why_choose',
    'cgi-industries'     => 'rectify_pb_render_cgi_industries',
    'cgi-process'        => 'rectify_pb_render_cgi_process',
    'cgi-cta'            => 'rectify_pb_render_cgi_cta',
);

$rx_cgi_blocks = function_exists( 'rectify_pb_get_commercial_ground_improvement_seed_blocks' )
    ? rectify_pb_get_commercial_ground_improvement_seed_blocks()
    : array();

$rx_cgi_sections = array();

foreach ( $rx_cgi_blocks as $rx_cgi_block ) {
    $rx_cgi_key      = isset( $rx_cgi_block['section_key'] ) ? $rx_cgi_block['section_key'] : '';
    $rx_cgi_type     = isset( $rx_cgi_block['type'] ) ? $rx_cgi_block['type'] : '';
    $rx_cgi_fields   = isset( $rx_cgi_block['fields'] ) && is_array( $rx_cgi_block['fields'] ) ? $rx_cgi_block['fields'] : array();
    $rx_cgi_renderer = isset( $rx_cgi_renderers[ $rx_cgi_type ] ) ? $rx_cgi_renderers[ $rx_cgi_type ] : '';

    if ( ! $rx_cgi_key || ! $rx_cgi_renderer || ! function_exists( $rx_cgi_renderer ) ) {
        continue;
    }

    $rx_cgi_sections[] = array(
        'key'    => $rx_cgi_key,
        'render' => function () use ( $rx_cgi_renderer, $rx_cgi_fields, $rx_cgi_key ) {
            call_user_func( $rx_cgi_renderer, $rx_cgi_fields, $rx_cgi_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_cgi_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_cgi_sections );
    }
    ?>
</article>
