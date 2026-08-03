<?php
/**
 * Our Technology page content.
 *
 * Every section is sourced from the Rectify Page Builder's
 * about-our-technology profile. The profile's seed data also provides the
 * first-render fallback, keeping the editable builder content and the front
 * end in sync.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-tech-page' ); ?>>
    <?php
    if (
        function_exists( 'rectify_pb_render_page_sections' )
        && function_exists( 'rectify_pb_get_about_our_technology_seed_blocks' )
    ) {
        $renderers = array(
            'tech-hero'       => 'rectify_pb_render_tech_hero',
            'tech-why-matters' => 'rectify_pb_render_tech_why_matters',
            'tech-approach'   => 'rectify_pb_render_tech_approach',
            'tech-expertise'  => 'rectify_pb_render_tech_expertise',
            'tech-engineered' => 'rectify_pb_render_tech_engineered',
            'tech-measuring'  => 'rectify_pb_render_tech_measuring',
            'tech-innovation' => 'rectify_pb_render_tech_innovation',
            'mtt-cta'         => 'rectify_pb_render_mtt_cta',
        );
        $sections = array();

        foreach ( rectify_pb_get_about_our_technology_seed_blocks() as $block ) {
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
