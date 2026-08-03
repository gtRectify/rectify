<?php
/**
 * Our Process page content.
 *
 * Every section is sourced from the Rectify Page Builder's
 * about-our-process profile. The profile's seed data also provides the
 * first-render fallback, keeping the editable builder content and the front
 * end in sync.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-process-page' ); ?>>
    <?php
    if (
        function_exists( 'rectify_pb_render_page_sections' )
        && function_exists( 'rectify_pb_get_about_our_process_seed_blocks' )
    ) {
        $renderers = array(
            'process-hero'       => 'rectify_pb_render_process_hero',
            'process-banner'     => 'rectify_pb_render_process_banner',
            'process-principles' => 'rectify_pb_render_process_principles',
            'mtt-cta'            => 'rectify_pb_render_mtt_cta',
        );
        $sections = array();

        foreach ( rectify_pb_get_about_our_process_seed_blocks() as $block ) {
            $section_key = isset( $block['section_key'] ) ? $block['section_key'] : '';
            $type        = isset( $block['type'] ) ? $block['type'] : '';
            $fields      = isset( $block['fields'] ) && is_array( $block['fields'] ) ? $block['fields'] : array();
            $renderer    = isset( $renderers[ $type ] ) ? $renderers[ $type ] : '';

            if ( ! $section_key || ! $renderer || ! is_callable( $renderer ) ) {
                continue;
            }

            $sections[] = array(
                'key'    => $section_key,
                'render' => static function () use ( $renderer, $fields, $section_key ) {
                    call_user_func( $renderer, $fields, $section_key );
                },
            );
        }

        rectify_pb_render_page_sections( get_the_ID(), $sections );
    }
    ?>
</article>
