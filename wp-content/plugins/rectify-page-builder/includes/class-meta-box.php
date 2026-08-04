<?php
/**
 * Meta box: registers the "Rectify Page Builder" box on the Page edit
 * screen (only for pages using the Rectify homepage template), renders the
 * JS app mount point, localizes data for builder.js, and handles saving.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('RECTIFY_PB_META_KEY', '_rectify_builder_data');
define('RECTIFY_PB_NONCE_ACTION', 'rectify_pb_save');
define('RECTIFY_PB_NONCE_FIELD', 'rectify_pb_nonce');

add_action('add_meta_boxes', 'rectify_pb_add_meta_box');
function rectify_pb_add_meta_box()
{
    add_meta_box(
        'rectify-pb-meta-box',
        __('Rectify Page Builder', 'rectify-page-builder'),
        'rectify_pb_render_meta_box',
        'page',
        'normal',
        'high'
    );
}

/**
 * The meta box only shows its app UI when the page is using the homepage
 * template; otherwise it explains why it's hidden (still registered so it
 * doesn't disappear/reappear confusingly as the template dropdown changes,
 * WordPress re-renders meta boxes via the page template metabox JS).
 *
 * @param WP_Post $post
 */
function rectify_pb_render_meta_box($post)
{
    $profile = rectify_pb_get_page_profile($post->ID);

    if (!$profile) {
        echo '<p>' . esc_html__('This meta box is only available on pages managed by Rectify Page Builder (currently: the homepage template, the Residential Solutions hub page, the Commercial Solutions hub page, the Contact Us page, and their managed child service pages).', 'rectify-page-builder') . '</p>';

        return;
    }

    wp_nonce_field(RECTIFY_PB_NONCE_ACTION, RECTIFY_PB_NONCE_FIELD);

    $saved_raw = get_post_meta($post->ID, RECTIFY_PB_META_KEY, true);
    $saved_data = $saved_raw ? $saved_raw : '[]';

    ?>
    <div id="rectify-pb-app" class="rectify-pb-app"></div>
    <textarea id="rectify_pb_data" name="rectify_pb_data" style="display:none;"><?php echo esc_textarea($saved_data); ?></textarea>
    <?php

    rectify_pb_localize_inline($profile);
}

/**
 * Return the seed-content function result for a given page profile.
 *
 * @param string $profile
 * @return array
 */
function rectify_pb_get_seed_blocks_for_profile($profile)
{
    if ($profile === 'residential-solutions' && function_exists('rectify_pb_get_residential_seed_blocks')) {
        return rectify_pb_get_residential_seed_blocks();
    }

    if ($profile === 'commercial-solutions' && function_exists('rectify_pb_get_commercial_seed_blocks')) {
        return rectify_pb_get_commercial_seed_blocks();
    }

    if ($profile === 'civil-solutions' && function_exists('rectify_pb_get_civil_seed_blocks')) {
        return rectify_pb_get_civil_seed_blocks();
    }

    if ($profile === 'hospital-solutions' && function_exists('rectify_pb_get_hospital_seed_blocks')) {
        return rectify_pb_get_hospital_seed_blocks();
    }

    if ($profile === 'undermining-solutions' && function_exists('rectify_pb_get_undermining_seed_blocks')) {
        return rectify_pb_get_undermining_seed_blocks();
    }

    if ($profile === 'ground-improvement-solutions' && function_exists('rectify_pb_get_ground_improvement_seed_blocks')) {
        return rectify_pb_get_ground_improvement_seed_blocks();
    }

    if ($profile === 'chemical-underpinning-solutions' && function_exists('rectify_pb_get_chemical_underpinning_seed_blocks')) {
        return rectify_pb_get_chemical_underpinning_seed_blocks();
    }

    if ($profile === 'driveway-relevelling-solutions' && function_exists('rectify_pb_get_driveway_relevelling_seed_blocks')) {
        return rectify_pb_get_driveway_relevelling_seed_blocks();
    }

    if ($profile === 'basement-construction-solutions' && function_exists('rectify_pb_get_basement_construction_seed_blocks')) {
        return rectify_pb_get_basement_construction_seed_blocks();
    }

    if ($profile === 'mailbox-brick-fence-solutions' && function_exists('rectify_pb_get_mailbox_brick_fence_seed_blocks')) {
        return rectify_pb_get_mailbox_brick_fence_seed_blocks();
    }

    if ($profile === 'sand-permeation-solutions' && function_exists('rectify_pb_get_sand_permeation_seed_blocks')) {
        return rectify_pb_get_sand_permeation_seed_blocks();
    }

    if ($profile === 'cracked-walls-solutions' && function_exists('rectify_pb_get_cracked_walls_seed_blocks')) {
        return rectify_pb_get_cracked_walls_seed_blocks();
    }

    if ($profile === 'foundation-repair-solutions' && function_exists('rectify_pb_get_foundation_repair_seed_blocks')) {
        return rectify_pb_get_foundation_repair_seed_blocks();
    }

    if ($profile === 'weak-soils-solutions' && function_exists('rectify_pb_get_weak_soils_seed_blocks')) {
        return rectify_pb_get_weak_soils_seed_blocks();
    }

    if ($profile === 'open-uneven-control-joints-solutions' && function_exists('rectify_pb_get_open_uneven_control_joints_seed_blocks')) {
        return rectify_pb_get_open_uneven_control_joints_seed_blocks();
    }

    if ($profile === 'leaning-pillars-solutions' && function_exists('rectify_pb_get_leaning_pillars_seed_blocks')) {
        return rectify_pb_get_leaning_pillars_seed_blocks();
    }

    if ($profile === 'leaning-house-wall-solutions' && function_exists('rectify_pb_get_leaning_house_wall_seed_blocks')) {
        return rectify_pb_get_leaning_house_wall_seed_blocks();
    }

    if ($profile === 'jammed-doors-windows-solutions' && function_exists('rectify_pb_get_jammed_doors_windows_seed_blocks')) {
        return rectify_pb_get_jammed_doors_windows_seed_blocks();
    }

    if ($profile === 'sloping-slab-solutions' && function_exists('rectify_pb_get_sloping_slab_seed_blocks')) {
        return rectify_pb_get_sloping_slab_seed_blocks();
    }

    if ($profile === 'leaning-walls-gaps-solutions' && function_exists('rectify_pb_get_leaning_walls_gaps_seed_blocks')) {
        return rectify_pb_get_leaning_walls_gaps_seed_blocks();
    }

    if ($profile === 'erosion-control-sinkhole-remediation-solutions' && function_exists('rectify_pb_get_erosion_control_sinkhole_remediation_seed_blocks')) {
        return rectify_pb_get_erosion_control_sinkhole_remediation_seed_blocks();
    }

    if ($profile === 'house-relevelling-solutions' && function_exists('rectify_pb_get_house_relevelling_seed_blocks')) {
        return rectify_pb_get_house_relevelling_seed_blocks();
    }

    if ($profile === 'slab-relevelling-solutions' && function_exists('rectify_pb_get_slab_relevelling_seed_blocks')) {
        return rectify_pb_get_slab_relevelling_seed_blocks();
    }

    if ($profile === 'faq-residential' && function_exists('rectify_pb_get_faq_residential_seed_blocks')) {
        return rectify_pb_get_faq_residential_seed_blocks();
    }

    if ($profile === 'faq-commercial' && function_exists('rectify_pb_get_faq_commercial_seed_blocks')) {
        return rectify_pb_get_faq_commercial_seed_blocks();
    }

    if ($profile === 'faq-our-process' && function_exists('rectify_pb_get_faq_our_process_seed_blocks')) {
        return rectify_pb_get_faq_our_process_seed_blocks();
    }

    if ($profile === 'faq-our-technology' && function_exists('rectify_pb_get_faq_our_technology_seed_blocks')) {
        return rectify_pb_get_faq_our_technology_seed_blocks();
    }

    if ($profile === 'faq-industries-we-serve' && function_exists('rectify_pb_get_faq_industries_we_serve_seed_blocks')) {
        return rectify_pb_get_faq_industries_we_serve_seed_blocks();
    }

    if ($profile === 'contact-us' && function_exists('rectify_pb_get_contact_seed_blocks')) {
        return rectify_pb_get_contact_seed_blocks();
    }

    if ($profile === 'assessment' && function_exists('rectify_pb_get_assessment_seed_blocks')) {
        return rectify_pb_get_assessment_seed_blocks();
    }

    if ($profile === 'quotation' && function_exists('rectify_pb_get_quotation_seed_blocks')) {
        return rectify_pb_get_quotation_seed_blocks();
    }

    if ($profile === 'warranty' && function_exists('rectify_pb_get_warranty_seed_blocks')) {
        return rectify_pb_get_warranty_seed_blocks();
    }

    if ($profile === 'soil-stabilisation' && function_exists('rectify_pb_get_soil_stabilisation_seed_blocks')) {
        return rectify_pb_get_soil_stabilisation_seed_blocks();
    }

    if ($profile === 'privacy-policy' && function_exists('rectify_pb_get_privacy_policy_seed_blocks')) {
        return rectify_pb_get_privacy_policy_seed_blocks();
    }

    if ($profile === 'commercial-realignment-solutions' && function_exists('rectify_pb_get_commercial_realignment_levelling_seed_blocks')) {
        return rectify_pb_get_commercial_realignment_levelling_seed_blocks();
    }

    if ($profile === 'commercial-slab-lifting-solutions' && function_exists('rectify_pb_get_commercial_slab_lifting_seed_blocks')) {
        return rectify_pb_get_commercial_slab_lifting_seed_blocks();
    }

    if ($profile === 'commercial-engineered-fill-solutions' && function_exists('rectify_pb_get_commercial_engineered_fill_seed_blocks')) {
        return rectify_pb_get_commercial_engineered_fill_seed_blocks();
    }

    if ($profile === 'commercial-void-filling-solutions' && function_exists('rectify_pb_get_commercial_void_filling_seed_blocks')) {
        return rectify_pb_get_commercial_void_filling_seed_blocks();
    }

    if ($profile === 'commercial-leak-sealing-solutions' && function_exists('rectify_pb_get_commercial_leak_sealing_seed_blocks')) {
        return rectify_pb_get_commercial_leak_sealing_seed_blocks();
    }

    if ($profile === 'commercial-protective-coatings-solutions' && function_exists('rectify_pb_get_commercial_protective_coatings_seed_blocks')) {
        return rectify_pb_get_commercial_protective_coatings_seed_blocks();
    }

    if ($profile === 'commercial-pipe-abandonment-solutions' && function_exists('rectify_pb_get_commercial_pipe_abandonment_seed_blocks')) {
        return rectify_pb_get_commercial_pipe_abandonment_seed_blocks();
    }

    if ($profile === 'commercial-ground-improvement-solutions' && function_exists('rectify_pb_get_commercial_ground_improvement_seed_blocks')) {
        return rectify_pb_get_commercial_ground_improvement_seed_blocks();
    }

    if ($profile === 'about-our-locations' && function_exists('rectify_pb_get_about_our_locations_seed_blocks')) {
        return rectify_pb_get_about_our_locations_seed_blocks();
    }

    if ($profile === 'about-meet-the-team' && function_exists('rectify_pb_get_about_meet_the_team_seed_blocks')) {
        return rectify_pb_get_about_meet_the_team_seed_blocks();
    }

    if ($profile === 'about-certifications-compliance' && function_exists('rectify_pb_get_about_certifications_compliance_seed_blocks')) {
        return rectify_pb_get_about_certifications_compliance_seed_blocks();
    }

    if ($profile === 'about-careers' && function_exists('rectify_pb_get_about_careers_seed_blocks')) {
        return rectify_pb_get_about_careers_seed_blocks();
    }

    if ($profile === 'about-our-story' && function_exists('rectify_pb_get_about_our_story_seed_blocks')) {
        return rectify_pb_get_about_our_story_seed_blocks();
    }

    if ($profile === 'about-rectify' && function_exists('rectify_pb_get_about_rectify_seed_blocks')) {
        return rectify_pb_get_about_rectify_seed_blocks();
    }

    if ($profile === 'about-our-technology' && function_exists('rectify_pb_get_about_our_technology_seed_blocks')) {
        return rectify_pb_get_about_our_technology_seed_blocks();
    }

    if ($profile === 'about-our-process' && function_exists('rectify_pb_get_about_our_process_seed_blocks')) {
        return rectify_pb_get_about_our_process_seed_blocks();
    }

    if ($profile === 'transport-assets-solutions' && function_exists('rectify_pb_get_transport_assets_seed_blocks')) {
        return rectify_pb_get_transport_assets_seed_blocks();
    }

    if ($profile === 'commercial-buildings-solutions' && function_exists('rectify_pb_get_commercial_buildings_seed_blocks')) {
        return rectify_pb_get_commercial_buildings_seed_blocks();
    }

    if ($profile === 'utilities-energy-solutions' && function_exists('rectify_pb_get_utilities_energy_seed_blocks')) {
        return rectify_pb_get_utilities_energy_seed_blocks();
    }

    if ($profile === 'mining-resources-solutions' && function_exists('rectify_pb_get_mining_resources_seed_blocks')) {
        return rectify_pb_get_mining_resources_seed_blocks();
    }

    if ($profile === 'marine-coastal-solutions' && function_exists('rectify_pb_get_marine_coastal_seed_blocks')) {
        return rectify_pb_get_marine_coastal_seed_blocks();
    }

    if ($profile === 'industrial-facilities-solutions' && function_exists('rectify_pb_get_industrial_facilities_seed_blocks')) {
        return rectify_pb_get_industrial_facilities_seed_blocks();
    }

    if ($profile === 'civil-infrastructure-solutions' && function_exists('rectify_pb_get_civil_infrastructure_seed_blocks')) {
        return rectify_pb_get_civil_infrastructure_seed_blocks();
    }

    if ($profile === 'residential-strata-solutions' && function_exists('rectify_pb_get_residential_strata_seed_blocks')) {
        return rectify_pb_get_residential_strata_seed_blocks();
    }

    return rectify_pb_get_seed_blocks();
}

/**
 * Print the localized config as an inline script tag. Using an inline
 * <script type="application/json"> block (parsed by builder.js) rather than
 * wp_localize_script keeps the potentially large seed/icon payload out of a
 * generic global and avoids depending on script registration order.
 *
 * @param string $profile
 */
function rectify_pb_localize_inline($profile = 'homepage')
{
    $config = array(
        'blockTypes' => rectify_pb_get_block_types(),
        'iconLibrary' => array_values(rectify_pb_get_icon_library()),
        'seedBlocks' => rectify_pb_resolve_seed_blocks_images(rectify_pb_get_seed_blocks_for_profile($profile)),
        'restNonce' => wp_create_nonce('wp_rest'),
        'i18n' => array(
            'addItem' => __('Add Item', 'rectify-page-builder'),
            'removeItem' => __('Remove', 'rectify-page-builder'),
            'addBlock' => __('Add Section', 'rectify-page-builder'),
            'loadCurrentContent' => __('Load current content', 'rectify-page-builder'),
            'confirmLoadSeed' => __('This will replace all sections currently in the builder with the default content for this page. Continue?', 'rectify-page-builder'),
            'confirmRemoveBlock' => __('Remove this section from the builder?', 'rectify-page-builder'),
            'collapse' => __('Collapse', 'rectify-page-builder'),
            'expand' => __('Expand', 'rectify-page-builder'),
            'chooseImage' => __('Choose Image', 'rectify-page-builder'),
            'removeImage' => __('Remove Image', 'rectify-page-builder'),
            'uploadIcon' => __('Upload Custom SVG', 'rectify-page-builder'),
            'removeIcon' => __('Remove Custom Icon', 'rectify-page-builder'),
            'pasteIconSvg' => __('Paste SVG Code', 'rectify-page-builder'),
            'pasteIconSvgPlaceholder' => __('Paste <svg>...</svg> markup here', 'rectify-page-builder'),
            'useIconSvg' => __('Use This SVG', 'rectify-page-builder'),
            'cancelIconSvg' => __('Cancel', 'rectify-page-builder'),
            'invalidIconSvg' => __('That doesn\'t look like valid SVG code (expected an <svg> tag).', 'rectify-page-builder'),
        ),
    );

    echo '<script type="application/json" id="rectify-pb-config">' . wp_json_encode($config) . '</script>';
}

/**
 * Save handler: sanitize every field per the registry schema, never trust
 * raw $_POST content into the DB.
 *
 * @param int $post_id
 */
add_action('save_post', 'rectify_pb_save_meta_box');
function rectify_pb_save_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (wp_is_post_revision($post_id)) {
        return;
    }

    if (get_post_type($post_id) !== 'page') {
        return;
    }

    if (!isset($_POST[RECTIFY_PB_NONCE_FIELD]) || !wp_verify_nonce(wp_unslash($_POST[RECTIFY_PB_NONCE_FIELD]), RECTIFY_PB_NONCE_ACTION)) {
        return;
    }

    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    if (!isset($_POST['rectify_pb_data'])) {
        return;
    }

    $raw = wp_unslash($_POST['rectify_pb_data']);
    $decoded = json_decode($raw, true);

    if (!is_array($decoded)) {
        // Nothing usable was submitted; do not overwrite existing data with
        // garbage, but do allow clearing via an explicit empty array "[]".
        if (trim((string) $raw) === '[]') {
            update_post_meta($post_id, RECTIFY_PB_META_KEY, wp_slash(wp_json_encode(array())));
            rectify_pb_refresh_frontend_after_save($post_id);
        }

        return;
    }

    $block_types = rectify_pb_get_block_types();
    $sanitized_blocks = array();

    foreach ($decoded as $block) {
        if (!is_array($block) || empty($block['type'])) {
            continue;
        }

        // A "removed" tombstone marks a section the editor explicitly
        // deleted in the admin UI, so the front end hides it entirely
        // instead of falling back to the theme's hardcoded default. It has
        // no field schema of its own, so it's sanitized separately from
        // normal blocks (which must match a registered block type).
        if ($block['type'] === 'removed') {
            $sanitized_blocks[] = array(
                'id' => sanitize_key(isset($block['id']) ? $block['id'] : uniqid('rx-block-', true)),
                'type' => 'removed',
                'section_key' => sanitize_key(isset($block['section_key']) ? $block['section_key'] : ''),
                'label' => sanitize_text_field(isset($block['label']) ? $block['label'] : ''),
                'fields' => array(),
            );

            continue;
        }

        if (!isset($block_types[$block['type']])) {
            continue;
        }

        $sanitized_blocks[] = array(
            'id' => sanitize_key(isset($block['id']) ? $block['id'] : uniqid('rx-block-', true)),
            'type' => sanitize_key($block['type']),
            'section_key' => sanitize_key(isset($block['section_key']) ? $block['section_key'] : ''),
            'label' => sanitize_text_field(isset($block['label']) ? $block['label'] : ''),
            'fields' => rectify_pb_sanitize_block_fields($block['type'], isset($block['fields']) ? $block['fields'] : array()),
        );
    }

    update_post_meta($post_id, RECTIFY_PB_META_KEY, wp_slash(wp_json_encode($sanitized_blocks)));
    rectify_pb_refresh_frontend_after_save($post_id);
}
