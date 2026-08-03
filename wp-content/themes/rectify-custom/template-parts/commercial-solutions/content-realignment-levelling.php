<?php
/**
 * Commercial Structural Realignment & Levelling page content template.
 *
 * Matches Figma node 902:15639. All section content is supplied by the
 * Rectify Page Builder; all page-specific presentation is scoped under the
 * .rx-ci-realign-page wrapper in commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_ci_realign_renderers = array(
    'commercial-inner-banner'           => 'rectify_pb_render_commercial_inner_banner',
    'commercial-inner-intro'            => 'rectify_pb_render_commercial_inner_intro',
    'commercial-realignment-causes'     => 'rectify_pb_render_commercial_realignment_causes',
    'commercial-realignment-feature'    => 'rectify_pb_render_commercial_realignment_feature',
    'commercial-realignment-impact'     => 'rectify_pb_render_commercial_realignment_impact',
    'commercial-realignment-process'    => 'rectify_pb_render_commercial_realignment_process',
    'commercial-realignment-industries' => 'rectify_pb_render_commercial_realignment_industries',
    'commercial-inner-why-cards'        => 'rectify_pb_render_commercial_inner_why_cards',
    'commercial-inner-cta'              => 'rectify_pb_render_commercial_inner_cta',
);

$rx_ci_realign_blocks = function_exists( 'rectify_pb_get_commercial_realignment_levelling_seed_blocks' )
    ? rectify_pb_get_commercial_realignment_levelling_seed_blocks()
    : array();

$rx_ci_realign_sections = array();

foreach ( $rx_ci_realign_blocks as $rx_ci_realign_block ) {
    $rx_ci_realign_key      = isset( $rx_ci_realign_block['section_key'] ) ? $rx_ci_realign_block['section_key'] : '';
    $rx_ci_realign_type     = isset( $rx_ci_realign_block['type'] ) ? $rx_ci_realign_block['type'] : '';
    $rx_ci_realign_fields   = isset( $rx_ci_realign_block['fields'] ) && is_array( $rx_ci_realign_block['fields'] ) ? $rx_ci_realign_block['fields'] : array();
    $rx_ci_realign_renderer = isset( $rx_ci_realign_renderers[ $rx_ci_realign_type ] ) ? $rx_ci_realign_renderers[ $rx_ci_realign_type ] : '';

    if ( ! $rx_ci_realign_key || ! $rx_ci_realign_renderer || ! function_exists( $rx_ci_realign_renderer ) ) {
        continue;
    }

    $rx_ci_realign_sections[] = array(
        'key'    => $rx_ci_realign_key,
        'render' => function () use ( $rx_ci_realign_renderer, $rx_ci_realign_fields, $rx_ci_realign_key ) {
            call_user_func( $rx_ci_realign_renderer, $rx_ci_realign_fields, $rx_ci_realign_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-ci-realign-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_ci_realign_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_ci_realign_sections );
    }
    ?>
</article>
