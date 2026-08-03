<?php
/**
 * Foundation Stabilisation page.
 *
 * The editable content is stored by Rectify Page Builder. The seed blocks
 * mirror Figma node 815:11836 and also act as front-end fallbacks before the
 * page has been saved in wp-admin.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$foundation_blocks = function_exists( 'rectify_pb_get_foundation_repair_seed_blocks' )
    ? rectify_pb_get_foundation_repair_seed_blocks()
    : array();

$foundation_renderers = array(
    'foundation-banner'       => 'rectify_pb_render_foundation_banner',
    'foundation-intro'        => 'rectify_pb_render_foundation_intro',
    'foundation-overview'     => 'rectify_pb_render_foundation_overview',
    'foundation-solutions'    => 'rectify_pb_render_foundation_solutions',
    'foundation-causes-table' => 'rectify_pb_render_foundation_causes_table',
    'foundation-why'          => 'rectify_pb_render_foundation_why',
    'foundation-cta'          => 'rectify_pb_render_foundation_cta',
);

$foundation_sections = array();

foreach ( $foundation_blocks as $foundation_block ) {
    $foundation_type = isset( $foundation_block['type'] ) ? $foundation_block['type'] : '';
    $foundation_key  = isset( $foundation_block['section_key'] ) ? $foundation_block['section_key'] : '';

    if ( ! $foundation_key || empty( $foundation_renderers[ $foundation_type ] ) ) {
        continue;
    }

    $foundation_renderer = $foundation_renderers[ $foundation_type ];

    $foundation_sections[] = array(
        'key'    => $foundation_key,
        'render' => static function () use ( $foundation_block, $foundation_renderer, $foundation_key ) {
            if ( function_exists( $foundation_renderer ) ) {
                call_user_func( $foundation_renderer, $foundation_block['fields'], $foundation_key );
            }
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-foundation-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $foundation_sections );
    } else {
        foreach ( $foundation_sections as $foundation_section ) {
            call_user_func( $foundation_section['render'] );
        }
    }
    ?>
</article>
