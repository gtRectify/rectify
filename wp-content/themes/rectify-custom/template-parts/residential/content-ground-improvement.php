<?php
/**
 * Ground Improvement page content (Residential Solutions child page).
 *
 * Every page section is sourced from Rectify Page Builder data. The seed
 * blocks are also used as a safe first-render fallback before an editor saves
 * the page for the first time.
 *
 * @package Rectify_Custom
 */

if (!defined('ABSPATH')) {
    exit;
}

$ground_blocks = function_exists('rectify_pb_get_ground_improvement_seed_blocks')
    ? rectify_pb_get_ground_improvement_seed_blocks()
    : array();

$ground_renderers = array(
    'ground-hero' => 'rectify_pb_render_ground_hero',
    'ground-intro' => 'rectify_pb_render_ground_intro',
    'ground-required' => 'rectify_pb_render_ground_required',
    'ground-projects' => 'rectify_pb_render_ground_projects',
    'ground-why' => 'rectify_pb_render_ground_why',
    'ground-cta' => 'rectify_pb_render_ground_cta',
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rx-ground-page'); ?>>
    <?php foreach ($ground_blocks as $ground_block) :
        $section_key = isset($ground_block['section_key']) ? $ground_block['section_key'] : '';
        $block_type = isset($ground_block['type']) ? $ground_block['type'] : '';

        if (function_exists('rectify_builder_render_section') && rectify_builder_render_section(get_the_ID(), $section_key)) {
            continue;
        }

        if (isset($ground_renderers[$block_type]) && function_exists($ground_renderers[$block_type])) {
            call_user_func($ground_renderers[$block_type], isset($ground_block['fields']) ? $ground_block['fields'] : array(), $section_key);
        }
    endforeach; ?>
</article>
