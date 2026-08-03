<?php
/**
 * Our Story page content template.
 *
 * The custom Rectify Page Builder owns the section order and content. The
 * profile seed is also used as the front-end fallback before the first save.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$story_seed_blocks = function_exists( 'rectify_pb_get_about_our_story_seed_blocks' )
    ? rectify_pb_get_about_our_story_seed_blocks()
    : array();

$story_renderers = array(
    'story-hero'       => 'rectify_pb_render_story_hero',
    'story-began'      => 'rectify_pb_render_story_began',
    'story-problem'    => 'rectify_pb_render_story_problem',
    'story-work'       => 'rectify_pb_render_story_work',
    'story-values'     => 'rectify_pb_render_story_values',
    'story-growth'     => 'rectify_pb_render_story_growth',
    'story-belief'     => 'rectify_pb_render_story_belief',
    'story-name'       => 'rectify_pb_render_story_name',
    'mtt-cta'          => 'rectify_pb_render_mtt_cta',
);

$story_sections = array();

foreach ( $story_seed_blocks as $story_block ) {
    $story_key  = isset( $story_block['section_key'] ) ? $story_block['section_key'] : '';
    $story_type = isset( $story_block['type'] ) ? $story_block['type'] : '';

    if ( ! $story_key || empty( $story_renderers[ $story_type ] ) ) {
        continue;
    }

    $story_fields   = isset( $story_block['fields'] ) && is_array( $story_block['fields'] )
        ? $story_block['fields']
        : array();
    $story_callback = $story_renderers[ $story_type ];

    $story_sections[] = array(
        'key'    => $story_key,
        'render' => static function () use ( $story_callback, $story_fields, $story_key ) {
            if ( function_exists( $story_callback ) ) {
                call_user_func( $story_callback, $story_fields, $story_key );
            }
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-mtt-page rx-story-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $story_sections );
    } else {
        foreach ( $story_sections as $story_section ) {
            call_user_func( $story_section['render'] );
        }
    }
    ?>
</article>
