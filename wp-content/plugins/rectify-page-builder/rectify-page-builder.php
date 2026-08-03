<?php
/**
 * Plugin Name: Rectify Page Builder
 * Description: Drag-and-drop block builder for the Rectify homepage template (page-rectify-homepage.php). Lets editors reorder and edit the homepage sections without touching code.
 * Version: 1.1.0
 * Author: Rectify
 * Text Domain: rectify-page-builder
 */

if (!defined('ABSPATH')) {
    exit;
}

define('RECTIFY_PB_VERSION', '1.1.0');
define('RECTIFY_PB_FILE', __FILE__);
define('RECTIFY_PB_DIR', plugin_dir_path(__FILE__));
define('RECTIFY_PB_URL', plugin_dir_url(__FILE__));

/**
 * The exact template filename (basename) used by the Rectify homepage.
 * Kept as a single constant so every file that needs to check "is this the
 * homepage template" checks against the same value.
 */
define('RECTIFY_PB_TEMPLATE_SLUG', 'page-rectify-homepage.php');

require_once RECTIFY_PB_DIR . 'includes/class-block-registry.php';
require_once RECTIFY_PB_DIR . 'includes/class-icon-library.php';
require_once RECTIFY_PB_DIR . 'includes/class-svg-upload.php';
require_once RECTIFY_PB_DIR . 'includes/class-asset-importer.php';
require_once RECTIFY_PB_DIR . 'includes/class-hubspot.php';
require_once RECTIFY_PB_DIR . 'includes/class-seed-defaults.php';
require_once RECTIFY_PB_DIR . 'includes/class-renderer.php';
require_once RECTIFY_PB_DIR . 'includes/class-meta-box.php';

/**
 * Activation is intentionally a no-op: this plugin never needs to create
 * tables, options, or otherwise mutate site state on activation. It only
 * reads/writes postmeta on the specific pages editors choose to use it on.
 */
function rectify_pb_activate()
{
    // Intentionally empty.
}
register_activation_hook(__FILE__, 'rectify_pb_activate');

/**
 * Version string for a plugin asset, based on its modification time.
 *
 * The builder's admin JS/CSS were previously versioned by the static
 * RECTIFY_PB_VERSION constant, which meant any edit to builder.js shipped to
 * browsers still holding the cached copy unless the constant was bumped by
 * hand. Since the builder's field rendering is driven by the block registry,
 * a stale builder.js silently drops any newly registered field type (its
 * renderField() switch just hits `default: return`), so a missed bump shows up
 * as a field vanishing from the meta box rather than as an obvious error.
 *
 * @param string $relative_path Path relative to the plugin directory.
 * @return string
 */
function rectify_pb_asset_version($relative_path)
{
    $absolute = RECTIFY_PB_DIR . $relative_path;

    return file_exists($absolute) ? (string) filemtime($absolute) : RECTIFY_PB_VERSION;
}

/**
 * Determine whether a given post is using the Rectify homepage template.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_homepage_template($post_id)
{
    $template = get_page_template_slug($post_id);

    return is_string($template) && basename($template) === RECTIFY_PB_TEMPLATE_SLUG;
}

/**
 * Determine whether a given post is the top-level "Residential Solutions"
 * hub page (slug 'residential', no parent) - it has no selectable
 * "Template Name:" header (it renders via the theme's default page.php +
 * template-parts/content-residential-solutions.php based on slug), so
 * detection is by post_name/post_parent instead of get_page_template_slug().
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_residential_solutions_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'residential'
        && (int) $post->post_parent === 0;
}

/**
 * Same as rectify_pb_is_residential_solutions_page() but for the "Commercial
 * Solutions" hub page (slug 'commercial-solutions', no parent).
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_commercial_solutions_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'commercial-solutions'
        && (int) $post->post_parent === 0;
}

/**
 * Same as rectify_pb_is_residential_solutions_page() but for the "Contact Us"
 * page (slug 'contact-us', no parent) - renders via the theme's default
 * page.php + template-parts/content-contact-us.php based on slug, same as
 * the solutions hub pages.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_contact_us_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'contact-us'
        && (int) $post->post_parent === 0;
}

/**
 * Detects the Assessment page (Project Cost Estimator). Same shape as
 * rectify_pb_is_contact_us_page() - rendered via page.php +
 * template-parts/content-assessment.php based on slug.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_assessment_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'assessment'
        && (int) $post->post_parent === 0;
}

/**
 * Detects a standalone quotation page. Both the quotation slug and the
 * Get a Free Quote slug the site's header links to use these sections, so
 * either page gets the builder UI and the quotation seed content.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_quotation_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && in_array($post->post_name, array('quotation', 'get-a-free-quote'), true)
        && (int) $post->post_parent === 0;
}

/**
 * Detects the standalone warranty page.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_warranty_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'warranty'
        && (int) $post->post_parent === 0;
}

/**
 * Detects the standalone Soil Stabilisation page (slug 'soil-stabilisation',
 * no parent). Same shape as rectify_pb_is_warranty_page().
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_soil_stabilisation_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'soil-stabilisation'
        && (int) $post->post_parent === 0;
}

/**
 * Detects the Privacy Policy page (slug 'our-policy', no parent - the live
 * page is published at /our-policy/, not /privacy-policy/). Same shape as
 * rectify_pb_is_contact_us_page() - rendered via page.php +
 * template-parts/content-our-policy.php based on slug.
 *
 * @param int $post_id
 * @return bool
 */
function rectify_pb_is_privacy_policy_page($post_id)
{
    $post = get_post($post_id);

    return $post
        && $post->post_type === 'page'
        && $post->post_name === 'our-policy'
        && (int) $post->post_parent === 0;
}

/**
 * Slug => profile map for the 3 Commercial Solutions child service pages
 * (civil-energy-utilities-sector, hospital-asset-remediation,
 * undermining-treatment). Each is a direct child of the Commercial Solutions
 * hub page and renders via the theme's generic parent-slug template lookup
 * (template-parts/commercial-solutions/content-{slug}.php), not a
 * selectable "Template Name:" header, so detection is by slug + parent.
 *
 * @return array slug => profile name
 */
function rectify_pb_get_commercial_child_page_slugs()
{
    return array(
        'civil-energy-utilities-sector' => 'civil-solutions',
        'hospital-asset-remediation' => 'hospital-solutions',
        'undermining-treatment' => 'undermining-solutions',
        'realignment-levelling' => 'commercial-realignment-solutions',
        'slab-lifting' => 'commercial-slab-lifting-solutions',
        'engineered-fill' => 'commercial-engineered-fill-solutions',
        'void-filling' => 'commercial-void-filling-solutions',
        'leak-sealing-water-stopping' => 'commercial-leak-sealing-solutions',
        'protective-coatings-concrete-repair' => 'commercial-protective-coatings-solutions',
        'pipe-abandonment' => 'commercial-pipe-abandonment-solutions',
        'ground-improvement' => 'commercial-ground-improvement-solutions',
    );
}

/**
 * Determine whether a given post is one of the Commercial Solutions child
 * service pages, returning its profile name if so.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_commercial_child_page_profile($post_id)
{
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'page') {
        return null;
    }

    $slugs = rectify_pb_get_commercial_child_page_slugs();

    if (!isset($slugs[$post->post_name])) {
        return null;
    }

    $commercial_page = get_page_by_path('commercial-solutions');

    if (!$commercial_page || (int) $post->post_parent !== $commercial_page->ID) {
        return null;
    }

    return $slugs[$post->post_name];
}

/**
 * Slug => profile map for Residential Solutions child service pages managed
 * by the builder (parallels rectify_pb_get_commercial_child_page_slugs()).
 * Note some slugs (e.g. 'ground-improvement') exist under BOTH
 * residential-solutions and commercial-solutions as separate pages, so the
 * parent ID must always be checked alongside the slug.
 *
 * @return array slug => profile name
 */
function rectify_pb_get_residential_child_page_slugs()
{
    return array(
        'ground-improvement' => 'ground-improvement-solutions',
        'chemical-underpinning' => 'chemical-underpinning-solutions',
        'driveway-relevelling' => 'driveway-relevelling-solutions',
        'basement-construction-support' => 'basement-construction-solutions',
        'mailbox-brick-fence-releveling' => 'mailbox-brick-fence-solutions',
        'sand-permeation' => 'sand-permeation-solutions',
        'cracked-walls' => 'cracked-walls-solutions',
        'foundation-repair' => 'foundation-repair-solutions',
        'weak-soils' => 'weak-soils-solutions',
        'open-uneven-control-joints' => 'open-uneven-control-joints-solutions',
        'leaning-pillars' => 'leaning-pillars-solutions',
        'leaning-pillars-chimneys' => 'leaning-pillars-solutions',
        'leaning-house-wall' => 'leaning-house-wall-solutions',
        'jammed-doors-windows' => 'jammed-doors-windows-solutions',
        'sloping-slab' => 'sloping-slab-solutions',
        'leaning-walls-gaps-in-doors-windows' => 'leaning-walls-gaps-solutions',
        'erosion-control-sinkhole-remediation' => 'erosion-control-sinkhole-remediation-solutions',
        'house-relevelling' => 'house-relevelling-solutions',
    );
}

/**
 * Determine whether a given post is one of the Residential Solutions child
 * service pages, returning its profile name if so.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_residential_child_page_profile($post_id)
{
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'page') {
        return null;
    }

    $slugs = rectify_pb_get_residential_child_page_slugs();

    if (!isset($slugs[$post->post_name])) {
        return null;
    }

    $residential_page = get_page_by_path('residential');

    if (!$residential_page || (int) $post->post_parent !== $residential_page->ID) {
        return null;
    }

    return $slugs[$post->post_name];
}

/**
 * Slug => profile map for the 5 "Frequently Asked Questions" category child
 * pages (parents is the /resources/faq/ hub page). Parallels
 * rectify_pb_get_residential_child_page_slugs().
 *
 * @return array slug => profile name
 */
function rectify_pb_get_faq_child_page_slugs()
{
    return array(
        'residential' => 'faq-residential',
        'commercial' => 'faq-commercial',
        'our-process' => 'faq-our-process',
        'our-technology' => 'faq-our-technology',
        'industries-we-serve' => 'faq-industries-we-serve',
    );
}

/**
 * Determine whether a given post is one of the FAQ category child pages,
 * returning its profile name if so.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_faq_child_page_profile($post_id)
{
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'page') {
        return null;
    }

    $slugs = rectify_pb_get_faq_child_page_slugs();

    if (!isset($slugs[$post->post_name])) {
        return null;
    }

    $faq_page = get_page_by_path('resources/faq');

    if (!$faq_page || (int) $post->post_parent !== $faq_page->ID) {
        return null;
    }

    return $slugs[$post->post_name];
}

/**
 * Slug => profile map for the "About Us" child pages (Our Locations, Meet
 * The Team, Certifications & Compliance, Careers, Our Story, About Rectify,
 * Our Technology). Parallels rectify_pb_get_faq_child_page_slugs(). Each has
 * its own bespoke design, so unlike the residential/commercial/FAQ families
 * these profiles are not interchangeable with each other - each maps to its
 * own dedicated block types and seed function.
 *
 * @return array slug => profile name
 */
function rectify_pb_get_about_us_child_page_slugs()
{
    return array(
        'our-locations' => 'about-our-locations',
        'meet-the-team' => 'about-meet-the-team',
        'certifications-compliance' => 'about-certifications-compliance',
        'careers' => 'about-careers',
        'our-story' => 'about-our-story',
        'about-rectify' => 'about-rectify',
        'our-technology' => 'about-our-technology',
        'our-process' => 'about-our-process',
    );
}

/**
 * Determine whether a given post is one of the About Us child pages,
 * returning its profile name if so.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_about_us_child_page_profile($post_id)
{
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'page') {
        return null;
    }

    $slugs = rectify_pb_get_about_us_child_page_slugs();

    if (!isset($slugs[$post->post_name])) {
        return null;
    }

    $about_page = get_page_by_path('about-us');

    if (!$about_page || (int) $post->post_parent !== $about_page->ID) {
        return null;
    }

    return $slugs[$post->post_name];
}

/**
 * Slug => profile map for the "Industries" child pages (parent is the
 * /industries/ hub page). Parallels rectify_pb_get_commercial_child_page_slugs().
 * Transport Assets, Commercial Buildings, Utilities & Energy and Mining &
 * Resources currently have dedicated designs/profiles. The remaining sibling
 * industry pages will get entries here as their Figma designs are implemented.
 *
 * @return array slug => profile name
 */
function rectify_pb_get_industries_child_page_slugs()
{
    return array(
        'transport-assets' => 'transport-assets-solutions',
        'commercial-buildings' => 'commercial-buildings-solutions',
        'utilities-energy' => 'utilities-energy-solutions',
        'mining-resources' => 'mining-resources-solutions',
        'industrial-facilities' => 'industrial-facilities-solutions',
        'civil-infrastructure' => 'civil-infrastructure-solutions',
        'residential-strata' => 'residential-strata-solutions',
        'marine-coastal' => 'marine-coastal-solutions',
    );
}

/**
 * Determine whether a given post is one of the Industries child pages,
 * returning its profile name if so.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_industries_child_page_profile($post_id)
{
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'page') {
        return null;
    }

    $slugs = rectify_pb_get_industries_child_page_slugs();

    if (!isset($slugs[$post->post_name])) {
        return null;
    }

    $industries_page = get_page_by_path('industries');

    if (!$industries_page || (int) $post->post_parent !== $industries_page->ID) {
        return null;
    }

    return $slugs[$post->post_name];
}

/**
 * Every WordPress page the builder can manage, keyed by a stable "profile"
 * name used to pick the right seed-content function and to gate the admin
 * UI. Add an entry here (plus a detector function) to support a new page.
 *
 * @param int $post_id
 * @return string|null
 */
function rectify_pb_get_page_profile($post_id)
{
    $industries_child_profile = rectify_pb_get_industries_child_page_profile($post_id);

    if ($industries_child_profile) {
        return $industries_child_profile;
    }

    if (rectify_pb_is_homepage_template($post_id)) {
        return 'homepage';
    }

    if (rectify_pb_is_residential_solutions_page($post_id)) {
        return 'residential-solutions';
    }

    if (rectify_pb_is_commercial_solutions_page($post_id)) {
        return 'commercial-solutions';
    }

    $child_profile = rectify_pb_get_commercial_child_page_profile($post_id);

    if ($child_profile) {
        return $child_profile;
    }

    $residential_child_profile = rectify_pb_get_residential_child_page_profile($post_id);

    if ($residential_child_profile) {
        return $residential_child_profile;
    }

    $faq_child_profile = rectify_pb_get_faq_child_page_profile($post_id);

    if ($faq_child_profile) {
        return $faq_child_profile;
    }

    if (rectify_pb_is_contact_us_page($post_id)) {
        return 'contact-us';
    }

    if (rectify_pb_is_assessment_page($post_id)) {
        return 'assessment';
    }

    if (rectify_pb_is_quotation_page($post_id)) {
        return 'quotation';
    }

    if (rectify_pb_is_warranty_page($post_id)) {
        return 'warranty';
    }

    if (rectify_pb_is_soil_stabilisation_page($post_id)) {
        return 'soil-stabilisation';
    }

    if (rectify_pb_is_privacy_policy_page($post_id)) {
        return 'privacy-policy';
    }

    $about_us_child_profile = rectify_pb_get_about_us_child_page_profile($post_id);

    if ($about_us_child_profile) {
        return $about_us_child_profile;
    }

    return null;
}

/**
 * Prevent a full-page cache from serving stale builder content.
 *
 * Builder content lives in post meta, so a cache that only watches changes to
 * post_content may not notice an edit. Mark managed frontend pages as dynamic
 * and send explicit no-store headers. The filter allows a hosting environment
 * with reliable tag-based purging to opt back into page caching.
 */
function rectify_pb_prevent_stale_frontend_cache()
{
    if (is_admin() || !is_singular('page')) {
        return;
    }

    $post_id = get_queried_object_id();

    if (!$post_id || !rectify_pb_get_page_profile($post_id)) {
        return;
    }

    if (!apply_filters('rectify_pb_disable_page_cache', true, $post_id)) {
        return;
    }

    if (!defined('DONOTCACHEPAGE')) {
        define('DONOTCACHEPAGE', true);
    }

    nocache_headers();

    if (!headers_sent()) {
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0, private', true);
        header('Expires: Wed, 11 Jan 1984 05:00:00 GMT', true);
    }
}
add_action('template_redirect', 'rectify_pb_prevent_stale_frontend_cache', 0);

/**
 * Clear frontend caches after Rectify Page Builder data is saved.
 *
 * WordPress clears the post-meta cache during update_post_meta(), but persistent
 * object caches and full-page cache plugins may retain rendered HTML. Support
 * the public purge APIs used by the common cache plugins while keeping the
 * plugin dependency-free.
 *
 * @param int $post_id
 */
function rectify_pb_refresh_frontend_after_save($post_id)
{
    $post_id = absint($post_id);

    if (!$post_id) {
        return;
    }

    clean_post_cache($post_id);
    wp_cache_delete($post_id, 'post_meta');

    if (function_exists('rocket_clean_post')) {
        rocket_clean_post($post_id);
    }

    if (function_exists('w3tc_flush_post')) {
        w3tc_flush_post($post_id);
    }

    if (function_exists('wp_cache_post_change')) {
        wp_cache_post_change($post_id);
    }

    if (function_exists('sg_cachepress_purge_cache')) {
        sg_cachepress_purge_cache();
    }

    // LiteSpeed Cache listens for this action and purges the post URL/tags.
    do_action('litespeed_purge_post', $post_id);

    /**
     * Let hosting-specific cache integrations purge this page as well.
     *
     * @param int    $post_id
     * @param string $permalink
     */
    do_action('rectify_pb_after_frontend_cache_purge', $post_id, get_permalink($post_id));
}

/**
 * Enqueue admin assets only on the Page edit screen, and only when the page
 * being edited (or about to be created) is one the builder manages.
 *
 * @param string $hook
 */
function rectify_pb_admin_enqueue($hook)
{
    if (!in_array($hook, array('post.php', 'post-new.php'), true)) {
        return;
    }

    $post = get_post();

    if (!$post || $post->post_type !== 'page') {
        return;
    }

    // On post-new.php there is no saved template/slug yet to match against;
    // only bail out on post.php (an existing page) when its profile is unrecognised.
    if ($hook === 'post.php' && !rectify_pb_get_page_profile($post->ID)) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script('jquery-ui-sortable');

    wp_enqueue_style(
        'rectify-pb-admin',
        RECTIFY_PB_URL . 'assets/css/builder-admin.css',
        array(),
        rectify_pb_asset_version('assets/css/builder-admin.css')
    );

    wp_enqueue_script(
        'rectify-pb-builder-templates',
        RECTIFY_PB_URL . 'assets/js/builder-templates.js',
        array('jquery', 'underscore', 'wp-util'),
        rectify_pb_asset_version('assets/js/builder-templates.js'),
        true
    );

    wp_enqueue_script(
        'rectify-pb-builder',
        RECTIFY_PB_URL . 'assets/js/builder.js',
        array('jquery', 'jquery-ui-sortable', 'underscore', 'wp-util', 'rectify-pb-builder-templates'),
        rectify_pb_asset_version('assets/js/builder.js'),
        true
    );
}
add_action('admin_enqueue_scripts', 'rectify_pb_admin_enqueue');
