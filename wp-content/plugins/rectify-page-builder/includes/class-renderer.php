<?php
/**
 * Front-end renderer.
 *
 * rectify_builder_render_section() is the single entry point called from
 * page-rectify-homepage.php. It looks up the saved block for a given
 * section_key and, if one exists, echoes markup using the same CSS
 * classes/structure as the existing hardcoded section and returns true.
 * If no saved block exists for that key it returns false so the caller can
 * fall back to the hardcoded HTML unchanged.
 */

if (!defined('ABSPATH')) {
    exit;
}

/* -----------------------------------------------------------------------
 * Foundation Stabilisation — Figma node 815:11836.
 * ---------------------------------------------------------------------*/

/**
 * Render an attachment or a theme-asset fallback as a responsive image.
 */
function rectify_pb_foundation_image_markup($value, $alt = '', $class = '')
{
    $attachment_id = absint($value);

    if ($attachment_id) {
        return wp_get_attachment_image(
            $attachment_id,
            'large',
            false,
            array(
                'alt' => $alt,
                'class' => $class,
                'loading' => 'lazy',
                'decoding' => 'async',
            )
        );
    }

    if (!is_string($value) || $value === '') {
        return '';
    }

    $src = preg_match('#^https?://#i', $value) ? $value : rectify_pb_theme_asset_url($value);

    return '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '" loading="lazy" decoding="async">';
}

function rectify_pb_render_foundation_banner($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = !empty($fields['breadcrumb_label']) ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="rx-foundation-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap">
            <?php if ($kicker) : ?><span class="rx-foundation-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-foundation-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">›</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">›</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_intro($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = isset($fields['image']) ? $fields['image'] : '';
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    ?>
    <section class="rx-foundation-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap rx-foundation-intro-grid">
            <div class="rx-foundation-intro-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
                <figure class="rx-foundation-intro-media"><?php echo rectify_pb_foundation_image_markup($image, $image_alt, 'rx-foundation-image'); ?></figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_overview($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $signs_heading = isset($fields['signs_heading']) ? $fields['signs_heading'] : '';
    $signs = isset($fields['signs']) && is_array($fields['signs']) ? $fields['signs'] : array();
    $check_icon = rectify_pb_theme_asset_url('images/foundation-stabilisation/check.svg');
    ?>
    <section class="rx-foundation-overview" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap rx-foundation-overview-grid">
            <div class="rx-foundation-overview-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <div class="rx-foundation-signs">
                <?php if ($signs_heading) : ?><h3><?php echo esc_html($signs_heading); ?></h3><?php endif; ?>
                <?php if ($signs) : ?>
                    <ul>
                        <?php foreach ($signs as $sign) : ?>
                            <?php $text = isset($sign['text']) ? $sign['text'] : ''; ?>
                            <?php if ($text) : ?><li><img src="<?php echo esc_url($check_icon); ?>" alt="" aria-hidden="true"><span><?php echo esc_html($text); ?></span></li><?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_solutions($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = isset($fields['image']) ? $fields['image'] : '';
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-foundation-solutions" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap rx-foundation-solutions-grid">
            <div class="rx-foundation-solutions-feature">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-foundation-richtext rx-foundation-solutions-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                <?php if ($image) : ?><figure><?php echo rectify_pb_foundation_image_markup($image, $image_alt, 'rx-foundation-image'); ?></figure><?php endif; ?>
            </div>
            <div class="rx-foundation-solution-cards">
                <?php foreach ($items as $item) :
                    $icon = isset($item['image']) ? $item['image'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="rx-foundation-solution-card">
                        <?php if ($icon) : ?><div class="rx-foundation-solution-icon"><?php echo rectify_pb_foundation_image_markup($icon, '', ''); ?></div><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_causes_table($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-foundation-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap rx-foundation-causes-wrap">
            <div class="rx-foundation-causes-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <div>
                    <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                    <?php if ($lead) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                </div>
            </div>
            <?php if ($items) : ?>
                <div class="rx-foundation-table-scroll">
                    <table class="rx-foundation-table">
                        <thead><tr><th scope="col">Cause</th><th scope="col">How it affects your home</th></tr></thead>
                        <tbody>
                            <?php foreach ($items as $item) :
                                $title = isset($item['title']) ? $item['title'] : '';
                                $description = isset($item['description']) ? $item['description'] : '';
                                ?>
                                <tr><th scope="row"><?php echo esc_html($title); ?></th><td><?php echo wp_kses_post($description); ?></td></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_why($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-foundation-why" style="<?php echo esc_attr('--rx-foundation-contours:url(' . $contours . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-foundation-why-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['image']) ? $item['image'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="rx-foundation-why-card">
                        <?php if ($icon) : ?><div class="rx-foundation-why-icon"><?php echo rectify_pb_foundation_image_markup($icon, '', ''); ?></div><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_foundation_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    $phone_icon = rectify_pb_theme_asset_url('icons-red/telephone-symbol-button.svg');
    $mail_icon = rectify_pb_theme_asset_url('images/commercial-archive/mail-white.svg');
    ?>
    <section class="rx-foundation-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-foundation-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-foundation-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            <div class="rx-foundation-cta-actions">
                <?php if ($primary_text && $primary_url) : ?><a class="rx-foundation-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text && $phone_url) : ?><a class="rx-foundation-cta-outline" href="<?php echo esc_url($phone_url); ?>"><img src="<?php echo esc_url($phone_icon); ?>" alt="" aria-hidden="true"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text && $email_url) : ?><a class="rx-foundation-cta-outline" href="<?php echo esc_url($email_url); ?>"><img src="<?php echo esc_url($mail_icon); ?>" alt="" aria-hidden="true"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Fetch + decode the saved builder data for a post.
 *
 * @param int $post_id
 * @return array List of block arrays (each with 'section_key', 'type', 'fields')
 */
function rectify_pb_get_saved_blocks($post_id)
{
    $raw = get_post_meta($post_id, '_rectify_builder_data', true);

    if (empty($raw)) {
        return array();
    }

    $decoded = is_string($raw) ? json_decode($raw, true) : $raw;

    if (!is_array($decoded)) {
        return array();
    }

    return $decoded;
}

/**
 * Find the saved block matching a section_key. When more than one saved
 * block shares a section_key (e.g. a "removed" tombstone left behind after
 * a section was re-added under the same key), the LAST one in the array
 * wins, since that reflects the most recent edit/add action in the admin UI.
 *
 * @param int    $post_id
 * @param string $section_key
 * @return array|null
 */
function rectify_pb_find_block($post_id, $section_key)
{
    $match = null;

    foreach (rectify_pb_get_saved_blocks($post_id) as $block) {
        if (isset($block['section_key']) && $block['section_key'] === $section_key) {
            $match = $block;
        }
    }

    return $match;
}

/**
 * Render every section of a page in the order defined by the saved
 * page-builder data (i.e. the order shown/dragged in wp-admin), rather than
 * the fixed order the theme template happens to call sections in.
 *
 * For any section_key present in the saved data, that data's array position
 * (last occurrence wins, matching rectify_pb_find_block()) determines its
 * render position. Any section the builder hasn't touched yet (no saved
 * block at all - typically because the page has never been opened in the
 * builder) keeps its original default position, appended after the saved
 * ones. This means a page with no saved data at all renders in exactly its
 * original hardcoded order (unchanged behaviour), while a page that's been
 * reordered and saved in wp-admin renders in that saved order.
 *
 * @param int   $post_id
 * @param array $sections Ordered list of the theme's default sections, each
 *                         ['key' => section_key, 'render' => callable that
 *                         echoes that section's hardcoded fallback markup].
 */
function rectify_pb_render_page_sections($post_id, $sections)
{
    $default_order = array();
    $fallback_renderers = array();

    foreach ($sections as $section) {
        if (!isset($section['key'], $section['render'])) {
            continue;
        }

        $default_order[] = $section['key'];
        $fallback_renderers[$section['key']] = $section['render'];
    }

    $saved_position = array();

    foreach (rectify_pb_get_saved_blocks($post_id) as $index => $block) {
        if (!empty($block['section_key'])) {
            // Later occurrences overwrite the index, so a re-added section
            // (after a "removed" tombstone) sorts at its NEW position.
            $saved_position[$block['section_key']] = $index;
        }
    }

    if (empty($saved_position)) {
        $ordered_keys = $default_order;
    } else {
        asort($saved_position);
        $saved_order = array_keys($saved_position);
        $saved_lookup = array_flip($saved_order);

        // Merge saved-order with the theme's default order rather than
        // simply putting every saved section before every untouched one:
        // a page only partially edited in the builder (e.g. one section
        // saved out of eight) must keep that section in its natural
        // position instead of jumping to the top of the page. Sections
        // present in both keep the admin's drag-and-drop order (relative
        // to each other); untouched sections keep their original slot.
        $ordered_keys = array();

        foreach ($default_order as $key) {
            if (isset($saved_lookup[$key])) {
                $ordered_keys[] = array_shift($saved_order);
            } else {
                $ordered_keys[] = $key;
            }
        }

        // Any saved section_key with no matching default section (a custom
        // section added via the "section_key" field, not part of the
        // theme's hardcoded set) has no natural position, so it's appended
        // at the end in saved order.
        foreach ($saved_order as $key) {
            $ordered_keys[] = $key;
        }
    }

    foreach ($ordered_keys as $key) {
        if (function_exists('rectify_builder_render_section') && rectify_builder_render_section($post_id, $key)) {
            continue;
        }

        if (isset($fallback_renderers[$key])) {
            call_user_func($fallback_renderers[$key]);
        }
    }
}

/**
 * Main render entry point. Echoes markup and returns true if a saved block
 * exists for the section; returns false (echoes nothing, so the caller falls
 * back to its hardcoded default) otherwise.
 *
 * A block explicitly removed via the admin "Remove Section" button is saved
 * as a `type => 'removed'` tombstone rather than being deleted outright, so
 * that removing a section actually hides it on the front end instead of
 * reverting to the theme's hardcoded fallback content.
 *
 * @param int    $post_id
 * @param string $section_key
 * @return bool
 */
function rectify_builder_render_section($post_id, $section_key)
{
    $block = rectify_pb_find_block($post_id, $section_key);

    if (!$block) {
        return false;
    }

    $type = isset($block['type']) ? $block['type'] : '';
    $fields = isset($block['fields']) && is_array($block['fields']) ? $block['fields'] : array();

    if ($type === 'removed') {
        return true;
    }

    switch ($type) {
        case 'hero':
            rectify_pb_render_hero($fields, $section_key);
            break;
        case 'services-tabs':
            rectify_pb_render_services_tabs($fields, $section_key);
            break;
        case 'feature-grid':
            rectify_pb_render_feature_grid($fields, $section_key);
            break;
        case 'feature-list':
            rectify_pb_render_feature_list($fields, $section_key);
            break;
        case 'video-loop':
            rectify_pb_render_video_loop($fields, $section_key);
            break;
        case 'image-slider':
            rectify_pb_render_image_slider($fields, $section_key);
            break;
        case 'logo-slider':
            rectify_pb_render_logo_slider($fields, $section_key);
            break;
        case 'accordion':
            rectify_pb_render_accordion($fields, $section_key);
            break;
        case 'homepage-faq':
            rectify_pb_render_homepage_faq($fields, $section_key);
            break;
        case 'image-text':
            rectify_pb_render_image_text($fields, $section_key);
            break;
        case 'cta':
            rectify_pb_render_cta($fields, $section_key);
            break;
        case 'residential-hero':
            rectify_pb_render_residential_hero($fields, $section_key);
            break;
        case 'residential-intro':
            rectify_pb_render_residential_intro($fields, $section_key);
            break;
        case 'residential-solutions-grid':
            rectify_pb_render_residential_solutions_grid($fields, $section_key);
            break;
        case 'residential-why':
            rectify_pb_render_residential_why($fields, $section_key);
            break;
        case 'commercial-help':
            rectify_pb_render_commercial_help($fields, $section_key);
            break;
        case 'residential-cta':
            rectify_pb_render_residential_cta($fields, $section_key);
            break;
        case 'ground-hero':
            rectify_pb_render_ground_hero($fields, $section_key);
            break;
        case 'ground-intro':
            rectify_pb_render_ground_intro($fields, $section_key);
            break;
        case 'ground-required':
            rectify_pb_render_ground_required($fields, $section_key);
            break;
        case 'ground-projects':
            rectify_pb_render_ground_projects($fields, $section_key);
            break;
        case 'ground-why':
            rectify_pb_render_ground_why($fields, $section_key);
            break;
        case 'ground-cta':
            rectify_pb_render_ground_cta($fields, $section_key);
            break;
        case 'solutions-child-hero':
            rectify_pb_render_solutions_child_hero($fields, $section_key);
            break;
        case 'solutions-intro-band':
            rectify_pb_render_solutions_intro_band($fields, $section_key);
            break;
        case 'civil-where-help':
            rectify_pb_render_civil_where_help($fields, $section_key);
            break;
        case 'undermining-causes':
            rectify_pb_render_undermining_causes($fields, $section_key);
            break;
        case 'hospital-feature-grid':
            rectify_pb_render_hospital_feature_grid($fields, $section_key);
            break;
        case 'hospital-where-help':
            rectify_pb_render_hospital_where_help($fields, $section_key);
            break;
        case 'solutions-media-list':
            rectify_pb_render_solutions_media_list($fields, $section_key);
            break;
        case 'solutions-process':
            rectify_pb_render_solutions_process($fields, $section_key);
            break;
        case 'civil-capabilities':
            rectify_pb_render_civil_capabilities_figma($fields, $section_key);
            break;
        case 'solutions-benefits':
            rectify_pb_render_solutions_benefits($fields, $section_key);
            break;
        case 'solutions-notes':
            rectify_pb_render_solutions_notes($fields, $section_key);
            break;
        case 'raw-map':
            // Intentionally unmanaged: fall back so the existing
            // rectify-wp-map shortcode output stays untouched.
            return false;
        case 'cgi-banner':
            rectify_pb_render_cgi_banner($fields, $section_key);
            break;
        case 'cgi-intro':
            rectify_pb_render_cgi_intro($fields, $section_key);
            break;
        case 'cgi-why-matters':
            rectify_pb_render_cgi_why_matters($fields, $section_key);
            break;
        case 'cgi-solutions-grid':
            rectify_pb_render_cgi_solutions_grid($fields, $section_key);
            break;
        case 'cgi-why-choose':
            rectify_pb_render_cgi_why_choose($fields, $section_key);
            break;
        case 'cgi-industries':
            rectify_pb_render_cgi_industries($fields, $section_key);
            break;
        case 'cgi-process':
            rectify_pb_render_cgi_process($fields, $section_key);
            break;
        case 'cgi-cta':
            rectify_pb_render_cgi_cta($fields, $section_key);
            break;
        case 'cpa-banner':
            rectify_pb_render_cpa_banner($fields, $section_key);
            break;
        case 'cpa-intro':
            rectify_pb_render_cpa_intro($fields, $section_key);
            break;
        case 'cpa-why-choose':
            rectify_pb_render_cpa_why_choose($fields, $section_key);
            break;
        case 'cpa-cta':
            rectify_pb_render_cpa_cta($fields, $section_key);
            break;
        case 'ii-banner':
            rectify_pb_render_ii_banner($fields, $section_key);
            break;
        case 'ii-intro':
            rectify_pb_render_ii_intro($fields, $section_key);
            break;
        case 'ii-challenges':
            rectify_pb_render_ii_challenges($fields, $section_key);
            break;
        case 'ii-photo-banner':
            rectify_pb_render_ii_photo_banner($fields, $section_key);
            break;
        case 'ii-solutions':
            rectify_pb_render_ii_solutions($fields, $section_key);
            break;
        case 'ii-why-choose':
            rectify_pb_render_ii_why_choose($fields, $section_key);
            break;
        case 'ii-process':
            rectify_pb_render_ii_process($fields, $section_key);
            break;
        case 'ii-faq':
            rectify_pb_render_ii_faq($fields, $section_key);
            break;
        case 'ii-cta':
            rectify_pb_render_ii_cta($fields, $section_key);
            break;
        case 'ii-assets':
            rectify_pb_render_ii_assets($fields, $section_key);
            break;
        case 'solution-hero':
            rectify_pb_render_solution_hero($fields, $section_key);
            break;
        case 'solution-band':
            rectify_pb_render_solution_band($fields, $section_key);
            break;
        case 'solution-icon-grid':
            rectify_pb_render_solution_icon_grid($fields, $section_key);
            break;
        case 'solution-process-steps':
            rectify_pb_render_solution_process_steps($fields, $section_key);
            break;
        case 'solution-notes':
            rectify_pb_render_solution_notes($fields, $section_key);
            break;
        case 'solution-cta':
            rectify_pb_render_solution_cta($fields, $section_key);
            break;
        case 'solution-photo-grid':
            rectify_pb_render_solution_photo_grid($fields, $section_key);
            break;
        case 'commercial-inner-banner':
            rectify_pb_render_commercial_inner_banner($fields, $section_key);
            break;
        case 'commercial-inner-intro':
            rectify_pb_render_commercial_inner_intro($fields, $section_key);
            break;
        case 'commercial-void-causes':
            rectify_pb_render_commercial_void_causes($fields, $section_key);
            break;
        case 'commercial-void-process':
            rectify_pb_render_commercial_void_process($fields, $section_key);
            break;
        case 'commercial-slab-causes':
            rectify_pb_render_commercial_void_causes($fields, $section_key);
            break;
        case 'commercial-slab-process':
            rectify_pb_render_commercial_void_process($fields, $section_key);
            break;
        case 'commercial-engineered-required':
            rectify_pb_render_commercial_engineered_required($fields, $section_key);
            break;
        case 'commercial-engineered-comparison':
            rectify_pb_render_commercial_engineered_comparison($fields, $section_key);
            break;
        case 'commercial-engineered-applications':
            rectify_pb_render_commercial_engineered_applications($fields, $section_key);
            break;
        case 'commercial-engineered-process':
            rectify_pb_render_commercial_engineered_process($fields, $section_key);
            break;
        case 'commercial-leak-causes':
            rectify_pb_render_commercial_leak_causes($fields, $section_key);
            break;
        case 'commercial-leak-types':
            rectify_pb_render_commercial_leak_types($fields, $section_key);
            break;
        case 'commercial-leak-scenarios':
            rectify_pb_render_commercial_leak_scenarios($fields, $section_key);
            break;
        case 'commercial-leak-diagnostics':
            rectify_pb_render_commercial_leak_diagnostics($fields, $section_key);
            break;
        case 'commercial-realignment-causes':
            rectify_pb_render_commercial_realignment_causes($fields, $section_key);
            break;
        case 'commercial-realignment-feature':
            rectify_pb_render_commercial_realignment_feature($fields, $section_key);
            break;
        case 'commercial-realignment-impact':
            rectify_pb_render_commercial_realignment_impact($fields, $section_key);
            break;
        case 'commercial-realignment-process':
            rectify_pb_render_commercial_realignment_process($fields, $section_key);
            break;
        case 'commercial-realignment-industries':
            rectify_pb_render_commercial_realignment_industries($fields, $section_key);
            break;
        case 'commercial-protective-causes':
            rectify_pb_render_commercial_protective_causes($fields, $section_key);
            break;
        case 'commercial-protective-solutions':
            rectify_pb_render_commercial_protective_solutions($fields, $section_key);
            break;
        case 'commercial-protective-feature':
            rectify_pb_render_commercial_protective_feature($fields, $section_key);
            break;
        case 'commercial-protective-repairs':
            rectify_pb_render_commercial_protective_repairs($fields, $section_key);
            break;
        case 'commercial-inner-why-cards':
            rectify_pb_render_commercial_inner_why_cards($fields, $section_key);
            break;
        case 'commercial-inner-cta':
            rectify_pb_render_commercial_inner_cta($fields, $section_key);
            break;
        case 'chemical-hero':
            rectify_pb_render_chemical_hero($fields, $section_key);
            break;
        case 'chemical-what':
            rectify_pb_render_chemical_what($fields, $section_key);
            break;
        case 'chemical-engineering':
            rectify_pb_render_chemical_engineering($fields, $section_key);
            break;
        case 'chemical-signs':
            rectify_pb_render_chemical_signs($fields, $section_key);
            break;
        case 'chemical-uses':
            rectify_pb_render_chemical_uses($fields, $section_key);
            break;
        case 'chemical-why':
            rectify_pb_render_chemical_why($fields, $section_key);
            break;
        case 'chemical-process':
            rectify_pb_render_chemical_process($fields, $section_key);
            break;
        case 'chemical-causes':
            rectify_pb_render_chemical_causes($fields, $section_key);
            break;
        case 'chemical-cta':
            rectify_pb_render_chemical_cta($fields, $section_key);
            break;
        case 'sand-hero':
            rectify_pb_render_sand_hero($fields, $section_key);
            break;
        case 'sand-intro':
            rectify_pb_render_sand_intro($fields, $section_key);
            break;
        case 'sand-risk':
            rectify_pb_render_sand_risk($fields, $section_key);
            break;
        case 'sand-scenarios':
            rectify_pb_render_sand_scenarios($fields, $section_key);
            break;
        case 'sand-process':
            rectify_pb_render_sand_process($fields, $section_key);
            break;
        case 'sand-benefits':
            rectify_pb_render_sand_benefits($fields, $section_key);
            break;
        case 'sand-notes':
            rectify_pb_render_sand_notes($fields, $section_key);
            break;
        case 'sand-why':
            rectify_pb_render_chemical_why($fields, $section_key);
            break;
        case 'sand-cta':
            rectify_pb_render_sand_cta($fields, $section_key);
            break;
        case 'brick-hero':
            rectify_pb_render_brick_hero($fields, $section_key);
            break;
        case 'brick-band':
            rectify_pb_render_brick_band($fields, $section_key);
            break;
        case 'brick-grid':
            rectify_pb_render_brick_grid($fields, $section_key);
            break;
        case 'brick-media-grid':
            rectify_pb_render_brick_media_grid($fields, $section_key);
            break;
        case 'brick-process':
            rectify_pb_render_brick_process($fields, $section_key);
            break;
        case 'brick-cta':
            rectify_pb_render_brick_cta($fields, $section_key);
            break;
        case 'cracked-hero':
            rectify_pb_render_cracked_hero($fields, $section_key);
            break;
        case 'cracked-band':
            rectify_pb_render_cracked_band($fields, $section_key);
            break;
        case 'cracked-whatis':
            rectify_pb_render_cracked_whatis($fields, $section_key);
            break;
        case 'cracked-causes':
            rectify_pb_render_cracked_causes($fields, $section_key);
            break;
        case 'cracked-process':
            rectify_pb_render_cracked_process($fields, $section_key);
            break;
        case 'cracked-solutions':
            rectify_pb_render_cracked_solutions($fields, $section_key);
            break;
        case 'cracked-advantage':
            rectify_pb_render_cracked_advantage($fields, $section_key);
            break;
        case 'cracked-performance':
            rectify_pb_render_cracked_performance($fields, $section_key);
            break;
        case 'cracked-help':
            rectify_pb_render_cracked_help($fields, $section_key);
            break;
        case 'foundation-banner':
            rectify_pb_render_foundation_banner($fields, $section_key);
            break;
        case 'foundation-intro':
            rectify_pb_render_foundation_intro($fields, $section_key);
            break;
        case 'foundation-overview':
            rectify_pb_render_foundation_overview($fields, $section_key);
            break;
        case 'foundation-solutions':
            rectify_pb_render_foundation_solutions($fields, $section_key);
            break;
        case 'foundation-causes-table':
            rectify_pb_render_foundation_causes_table($fields, $section_key);
            break;
        case 'foundation-why':
            rectify_pb_render_foundation_why($fields, $section_key);
            break;
        case 'foundation-cta':
            rectify_pb_render_foundation_cta($fields, $section_key);
            break;
        case 'ws-hero':
            rectify_pb_render_ws_hero($fields, $section_key);
            break;
        case 'ws-band':
            rectify_pb_render_ws_band($fields, $section_key);
            break;
        case 'ws-whatis':
            rectify_pb_render_ws_whatis($fields, $section_key);
            break;
        case 'ws-causes':
            rectify_pb_render_ws_causes($fields, $section_key);
            break;
        case 'ws-advantage':
            rectify_pb_render_ws_advantage($fields, $section_key);
            break;
        case 'ws-performance':
            rectify_pb_render_ws_performance($fields, $section_key);
            break;
        case 'ws-help':
            rectify_pb_render_ws_help($fields, $section_key);
            break;
        case 'lp-hero':
            rectify_pb_render_lp_hero($fields, $section_key);
            break;
        case 'lp-band':
            rectify_pb_render_lp_band($fields, $section_key);
            break;
        case 'lp-whatis':
            rectify_pb_render_lp_whatis($fields, $section_key);
            break;
        case 'lp-causes':
            rectify_pb_render_lp_causes($fields, $section_key);
            break;
        case 'lp-advantage':
            rectify_pb_render_lp_advantage($fields, $section_key);
            break;
        case 'lp-performance':
            rectify_pb_render_lp_performance($fields, $section_key);
            break;
        case 'lp-help':
            rectify_pb_render_lp_help($fields, $section_key);
            break;
        case 'faq-hero':
            rectify_pb_render_faq_hero($fields, $section_key);
            break;
        case 'faq-banner':
            rectify_pb_render_faq_banner($fields, $section_key);
            break;
        case 'faq-list':
            rectify_pb_render_faq_list($fields, $section_key);
            break;
        case 'faq-cta':
            rectify_pb_render_faq_cta($fields, $section_key);
            break;
        case 'legal-hero':
            rectify_pb_render_legal_hero($fields, $section_key);
            break;
        case 'legal-sections':
            rectify_pb_render_legal_sections($fields, $section_key);
            break;
        case 'contact-hero':
            rectify_pb_render_contact_hero($fields, $section_key);
            break;
        case 'contact-offices':
            rectify_pb_render_contact_offices($fields, $section_key);
            break;
        case 'contact-form':
            rectify_pb_render_contact_form($fields, $section_key);
            break;
        case 'contact-cta':
            rectify_pb_render_contact_cta($fields, $section_key);
            break;
        case 'loc-hero':
            rectify_pb_render_loc_hero($fields, $section_key);
            break;
        case 'loc-offices':
            rectify_pb_render_loc_offices($fields, $section_key);
            break;
        case 'loc-footprint':
            rectify_pb_render_loc_footprint($fields, $section_key);
            break;
        case 'loc-cta':
            rectify_pb_render_loc_cta($fields, $section_key);
            break;
        case 'mtt-hero':
            rectify_pb_render_mtt_hero($fields, $section_key);
            break;
        case 'mtt-philosophy':
            rectify_pb_render_mtt_philosophy($fields, $section_key);
            break;
        case 'mtt-team':
            rectify_pb_render_mtt_team($fields, $section_key);
            break;
        case 'mtt-why':
            rectify_pb_render_mtt_why($fields, $section_key);
            break;
        case 'mtt-cta':
            rectify_pb_render_mtt_cta($fields, $section_key);
            break;
        case 'cert-hero':
            rectify_pb_render_cert_hero($fields, $section_key);
            break;
        case 'cert-banner':
            rectify_pb_render_cert_banner($fields, $section_key);
            break;
        case 'cert-why-matters':
            rectify_pb_render_cert_why_matters($fields, $section_key);
            break;
        case 'cert-standards':
            rectify_pb_render_cert_standards($fields, $section_key);
            break;
        case 'cert-registration-safety':
            rectify_pb_render_cert_registration_safety($fields, $section_key);
            break;
        case 'cert-confidence':
            rectify_pb_render_cert_confidence($fields, $section_key);
            break;
        case 'cert-systems':
            rectify_pb_render_cert_systems($fields, $section_key);
            break;
        case 'cert-cta':
            rectify_pb_render_cert_cta($fields, $section_key);
            break;
        case 'careers-hero':
            rectify_pb_render_careers_hero($fields, $section_key);
            break;
        case 'careers-banner':
            rectify_pb_render_careers_banner($fields, $section_key);
            break;
        case 'careers-why-work':
            rectify_pb_render_careers_why_work($fields, $section_key);
            break;
        case 'careers-culture':
            rectify_pb_render_careers_culture($fields, $section_key);
            break;
        case 'careers-standards':
            rectify_pb_render_careers_standards($fields, $section_key);
            break;
        case 'careers-standards-matter':
            rectify_pb_render_careers_standards_matter($fields, $section_key);
            break;
        case 'careers-fit':
            rectify_pb_render_careers_fit($fields, $section_key);
            break;
        case 'careers-why-join':
            rectify_pb_render_careers_why_join($fields, $section_key);
            break;
        case 'careers-jobs':
            rectify_pb_render_careers_jobs($fields, $section_key);
            break;
        case 'careers-cta':
            rectify_pb_render_careers_cta($fields, $section_key);
            break;
        case 'ar-hero':
            rectify_pb_render_ar_hero($fields, $section_key);
            break;
        case 'ar-banner':
            rectify_pb_render_ar_banner($fields, $section_key);
            break;
        case 'ar-intro':
            rectify_pb_render_ar_intro($fields, $section_key);
            break;
        case 'ar-vision':
            rectify_pb_render_ar_vision($fields, $section_key);
            break;
        case 'ar-what':
            rectify_pb_render_ar_what($fields, $section_key);
            break;
        case 'ar-serve':
            rectify_pb_render_ar_serve($fields, $section_key);
            break;
        case 'ar-stats':
            rectify_pb_render_ar_stats($fields, $section_key);
            break;
        case 'ar-advantage':
            rectify_pb_render_ar_advantage($fields, $section_key);
            break;
        case 'ar-difference':
            rectify_pb_render_ar_difference($fields, $section_key);
            break;
        case 'ar-approach':
            rectify_pb_render_ar_approach($fields, $section_key);
            break;
        case 'ar-values':
            rectify_pb_render_ar_values($fields, $section_key);
            break;
        case 'ar-future':
            rectify_pb_render_ar_future($fields, $section_key);
            break;
        case 'ar-cta':
            rectify_pb_render_ar_cta($fields, $section_key);
            break;
        case 'story-hero':
            rectify_pb_render_story_hero($fields, $section_key);
            break;
        case 'story-began':
            rectify_pb_render_story_began($fields, $section_key);
            break;
        case 'story-problem':
            rectify_pb_render_story_problem($fields, $section_key);
            break;
        case 'story-work':
            rectify_pb_render_story_work($fields, $section_key);
            break;
        case 'story-values':
            rectify_pb_render_story_values($fields, $section_key);
            break;
        case 'story-growth':
            rectify_pb_render_story_growth($fields, $section_key);
            break;
        case 'story-belief':
            rectify_pb_render_story_belief($fields, $section_key);
            break;
        case 'story-name':
            rectify_pb_render_story_name($fields, $section_key);
            break;
        case 'story-philosophy':
            rectify_pb_render_story_philosophy($fields, $section_key);
            break;
        case 'story-growing':
            rectify_pb_render_story_growing($fields, $section_key);
            break;
        case 'story-purpose':
            rectify_pb_render_story_purpose($fields, $section_key);
            break;
        case 'story-drives':
            rectify_pb_render_story_drives($fields, $section_key);
            break;
        case 'story-ahead':
            rectify_pb_render_story_ahead($fields, $section_key);
            break;
        case 'story-vision':
            rectify_pb_render_story_vision($fields, $section_key);
            break;
        case 'story-principles':
            rectify_pb_render_story_principles($fields, $section_key);
            break;
        case 'assessment-title':
            rectify_pb_render_assessment_title($fields, $section_key);
            break;
        case 'assessment-hero':
            rectify_pb_render_assessment_hero($fields, $section_key);
            break;
        case 'assessment-card-grid':
            rectify_pb_render_assessment_card_grid($fields, $section_key);
            break;
        case 'assessment-image-checklists':
            rectify_pb_render_assessment_image_checklists($fields, $section_key);
            break;
        case 'assessment-cta':
            rectify_pb_render_assessment_cta($fields, $section_key);
            break;
        case 'quotation-form':
            rectify_pb_render_quotation_form($fields, $section_key);
            break;
        case 'quotation-next':
            rectify_pb_render_quotation_next($fields, $section_key);
            break;
        case 'hubspot-form':
            rectify_pb_render_hubspot_form($fields, $section_key);
            break;
        case 'warranty-hero':
            rectify_pb_render_warranty_hero($fields, $section_key);
            break;
        case 'warranty-periods':
            rectify_pb_render_warranty_periods($fields, $section_key);
            break;
        case 'warranty-terms':
            rectify_pb_render_warranty_terms($fields, $section_key);
            break;
        case 'tech-hero':
            rectify_pb_render_tech_hero($fields, $section_key);
            break;
        case 'tech-why-matters':
            rectify_pb_render_tech_why_matters($fields, $section_key);
            break;
        case 'tech-approach':
            rectify_pb_render_tech_approach($fields, $section_key);
            break;
        case 'tech-expertise':
            rectify_pb_render_tech_expertise($fields, $section_key);
            break;
        case 'tech-engineered':
            rectify_pb_render_tech_engineered($fields, $section_key);
            break;
        case 'tech-measuring':
            rectify_pb_render_tech_measuring($fields, $section_key);
            break;
        case 'tech-innovation':
            rectify_pb_render_tech_innovation($fields, $section_key);
            break;
        case 'process-hero':
            rectify_pb_render_process_hero($fields, $section_key);
            break;
        case 'process-banner':
            rectify_pb_render_process_banner($fields, $section_key);
            break;
        case 'process-principles':
            rectify_pb_render_process_principles($fields, $section_key);
            break;
        case 'slab-relevel-hero':
            rectify_pb_render_slab_relevel_hero($fields, $section_key);
            break;
        case 'slab-relevel-intro':
            rectify_pb_render_slab_relevel_intro($fields, $section_key);
            break;
        case 'slab-relevel-signs':
            rectify_pb_render_slab_relevel_signs($fields, $section_key);
            break;
        case 'slab-relevel-causes':
            rectify_pb_render_slab_relevel_causes($fields, $section_key);
            break;
        case 'slab-relevel-process':
            rectify_pb_render_slab_relevel_process($fields, $section_key);
            break;
        case 'slab-relevel-comparison':
            rectify_pb_render_slab_relevel_comparison($fields, $section_key);
            break;
        case 'slab-relevel-proof':
            rectify_pb_render_slab_relevel_proof($fields, $section_key);
            break;
        case 'slab-relevel-why':
            rectify_pb_render_slab_relevel_why($fields, $section_key);
            break;
        case 'slab-relevel-cta':
            rectify_pb_render_slab_relevel_cta($fields, $section_key);
            break;
        default:
            return false;
    }

    return true;
}

function rectify_pb_render_warranty_hero($fields, $section_key)
{
    $title = isset($fields['title']) ? $fields['title'] : '';
    $statement = isset($fields['statement']) ? $fields['statement'] : '';
    ?>
    <section class="rx-warranty-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <header class="rx-warranty-title-band">
            <div class="rx-wrap">
                <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <nav class="rx-warranty-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'rectify-custom'); ?></a>
                    <span aria-hidden="true">&rsaquo;</span>
                    <strong><?php esc_html_e('Warranty', 'rectify-custom'); ?></strong>
                </nav>
            </div>
        </header>
        <div class="rx-warranty-hero-grid">
            <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Rectify specialist reviewing project documentation', 'rectify-custom'); ?>"><?php endif; ?>
            <div class="rx-warranty-statement"><?php echo wp_kses_post(wpautop($statement)); ?></div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_warranty_periods($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-warranty-periods" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-warranty-cards">
                <?php foreach ($items as $item) :
                    $icon = !empty($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    ?>
                    <article class="rx-warranty-card">
                        <?php if ($icon) : ?><span class="rx-warranty-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if (!empty($item['title'])) : ?><h3><?php echo esc_html($item['title']); ?></h3><?php endif; ?>
                        <?php if (!empty($item['period'])) : ?><p class="rx-warranty-period"><?php echo esc_html($item['period']); ?></p><?php endif; ?>
                        <?php if (!empty($item['warranty_type'])) : ?><p class="rx-warranty-type"><?php echo esc_html($item['warranty_type']); ?></p><?php endif; ?>
                        <?php if (!empty($item['covers'])) : ?><div class="rx-warranty-covers"><strong><?php esc_html_e('Covers:', 'rectify-custom'); ?></strong><?php echo wp_kses_post(wpautop($item['covers'])); ?></div><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_warranty_terms($fields, $section_key)
{
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-warranty-terms" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-warranty-terms-grid">
            <div class="rx-warranty-terms-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div>
            <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Rectify vehicle at a completed project site', 'rectify-custom'); ?>"><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_quotation_form($fields, $section_key)
{
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $form_heading = isset($fields['form_heading']) ? $fields['form_heading'] : '';
    $form_shortcode = isset($fields['form_shortcode']) ? $fields['form_shortcode'] : '';
    $form_markup = '';

    $is_hubspot_form = stripos($form_shortcode, 'hbspt.forms.create') !== false
        || stripos($form_shortcode, 'rectify_hubspot_form') !== false;

    if ($is_hubspot_form && function_exists('rectify_pb_hubspot_embed')) {
        $portal_id = defined('RECTIFY_PB_HUBSPOT_PORTAL_ID') ? RECTIFY_PB_HUBSPOT_PORTAL_ID : '';
        $form_id = defined('RECTIFY_PB_HUBSPOT_FORM_ID') ? RECTIFY_PB_HUBSPOT_FORM_ID : '';
        $region = defined('RECTIFY_PB_HUBSPOT_REGION') ? RECTIFY_PB_HUBSPOT_REGION : '';

        if (preg_match('/portal(?:Id|_id)\s*(?::|=)\s*["\']?([0-9]+)/i', $form_shortcode, $portal_match)) {
            $portal_id = $portal_match[1];
        }

        if (preg_match('/form(?:Id|_id)\s*(?::|=)\s*["\']([a-zA-Z0-9\-]+)["\']/i', $form_shortcode, $form_match)) {
            $form_id = $form_match[1];
        }

        if (preg_match('/region\s*(?::|=)\s*["\']([a-zA-Z0-9]+)["\']/i', $form_shortcode, $region_match)) {
            $region = $region_match[1];
        }

        $form_markup = rectify_pb_hubspot_embed(array(
            'portal_id' => $portal_id,
            'form_id' => $form_id,
            'region' => $region,
            // Let HubSpot perform its native success redirect only after the
            // submission (including CAPTCHA and uploads) has been accepted.
            'redirect_url' => add_query_arg(
                'hubspot_quote_submitted',
                '1',
                get_permalink()
            ),
        ));
    } elseif ($form_shortcode) {
        $form_markup = rectify_pb_form_embed_markup($form_shortcode);
    }
    ?>
    <section class="rx-quotation-main" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <header class="rx-quotation-hero">
            <div class="rx-wrap">
                <?php if ($eyebrow) : ?><p class="rx-quotation-eyebrow"><?php echo esc_html($eyebrow); ?></p><?php endif; ?>
                <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <nav class="rx-quotation-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'rectify-custom'); ?></a>
                    <span aria-hidden="true">&rsaquo;</span>
                    <strong><?php esc_html_e('Request A Quote', 'rectify-custom'); ?></strong>
                </nav>
            </div>
        </header>
        <div class="rx-wrap rx-quotation-form-wrap">
            <div class="rx-quotation-form-card ra-quote-card">
                <?php if ($form_heading) : ?><h3><?php echo esc_html($form_heading); ?></h3><?php endif; ?>
                <?php if ($form_markup) : ?>
                    <div class="rx-quotation-form"><?php echo $form_markup; // phpcs:ignore WordPress.Security.EscapeOutput -- markup is sanitized or generated by the form helpers above. ?></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * HubSpot form section. The heading/intro/card-heading are all optional, so
 * this can be either a full section or just a bare form dropped into a page.
 */
function rectify_pb_render_hubspot_form($fields, $section_key)
{
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $form_heading = isset($fields['form_heading']) ? $fields['form_heading'] : '';

    if (!function_exists('rectify_pb_hubspot_embed')) {
        return;
    }

    $embed = rectify_pb_hubspot_embed(array(
        'portal_id' => isset($fields['portal_id']) ? $fields['portal_id'] : '',
        'form_id' => isset($fields['form_id']) ? $fields['form_id'] : '',
        'region' => isset($fields['region']) ? $fields['region'] : '',
    ));
    ?>
    <section class="rx-hubspot-section" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-hubspot-wrap">
            <?php if ($eyebrow || $title || $intro) : ?>
                <header class="rx-hubspot-head">
                    <?php if ($eyebrow) : ?><p class="rx-hubspot-eyebrow"><?php echo esc_html($eyebrow); ?></p><?php endif; ?>
                    <?php if ($title) : ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                    <?php if ($intro) : ?><div class="rx-hubspot-intro"><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
                </header>
            <?php endif; ?>

            <div class="rx-hubspot-card">
                <?php if ($form_heading) : ?><h3><?php echo esc_html($form_heading); ?></h3><?php endif; ?>
                <div class="rx-hubspot-form"><?php echo $embed; // phpcs:ignore WordPress.Security.EscapeOutput -- container div built with esc_attr() in rectify_pb_hubspot_embed(). ?></div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_quotation_next($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-quotation-next" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-quotation-next-grid">
            <div class="rx-quotation-next-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($intro) : ?><div class="rx-quotation-next-intro"><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
                <?php if ($items) : ?><ul class="rx-quotation-steps">
                    <?php foreach ($items as $item) : ?>
                        <?php if (!empty($item['text'])) : ?><li><?php echo esc_html($item['text']); ?></li><?php endif; ?>
                    <?php endforeach; ?>
                </ul><?php endif; ?>
                <?php if ($closing) : ?><div class="rx-quotation-closing"><?php echo wp_kses_post(wpautop($closing)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?><img class="rx-quotation-next-image" src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Rectify project team vehicle on site', 'rectify-custom'); ?>"><?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Output for an 'embed' field (the form_shortcode fields).
 *
 * The value is either a shortcode - e.g. [gravityforms ...] or
 * [rectify_hubspot_form ...] - or a provider snippet pasted verbatim, which is
 * typically a <script src> plus an inline init call. Both are handled by
 * running do_shortcode() and echoing the result unescaped: do_shortcode()
 * leaves non-shortcode markup untouched, so a pasted snippet passes straight
 * through.
 *
 * Deliberately NOT escaped/kses'd here. Doing so would strip the <script>
 * tags that make an embed work; the value is instead filtered on the way IN,
 * by the 'embed' case of rectify_pb_sanitize_field(), which only allows script
 * markup to be stored by users with the `unfiltered_html` capability.
 *
 * @param string $value
 * @return string
 */
function rectify_pb_form_embed_markup($value)
{
    $value = trim((string) $value);

    if ($value === '') {
        return '';
    }

    return do_shortcode($value);
}

/**
 * Resolve an attachment ID field to a usable <img> src, falling back to ''.
 *
 * @param int    $attachment_id
 * @param string $size
 * @return string
 */
function rectify_pb_image_url($attachment_id, $size = 'large')
{
    if (is_string($attachment_id) && trim($attachment_id) !== '' && !ctype_digit(trim($attachment_id))) {
        $value = trim($attachment_id);
        return preg_match('#^https?://#i', $value) ? $value : rectify_pb_theme_asset_url($value);
    }

    $attachment_id = absint($attachment_id);

    if (!$attachment_id) {
        return '';
    }

    $url = wp_get_attachment_image_url($attachment_id, $size);

    if (!$url) {
        $url = wp_get_attachment_url($attachment_id);
    }

    return $url ? $url : '';
}

/**
 * Resolve an icon-picker value (icon library key) to renderable markup.
 *
 * @param string $icon_key
 * @return string Safe HTML (already escaped where required)
 */
function rectify_pb_icon_markup($icon_key)
{
    if (!$icon_key) {
        return '';
    }

    if (strpos($icon_key, 'upload:') === 0) {
        return rectify_pb_uploaded_icon_img($icon_key);
    }

    if (strpos($icon_key, 'paste:') === 0) {
        return rectify_pb_pasted_icon_svg($icon_key);
    }

    $icons = rectify_pb_get_icon_library();

    if (!isset($icons[$icon_key])) {
        return '';
    }

    $icon = $icons[$icon_key];

    if ($icon['type'] === 'svg' && !empty($icon['svg'])) {
        // Already-known, hardcoded SVG markup from the icon library (not
        // user-entered), safe to output as-is - matches how the theme
        // template itself echoes $services_svg markup.
        return $icon['svg'];
    }

    if ($icon['type'] === 'file' && !empty($icon['url'])) {
        return '<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($icon['label']) . '">';
    }

    return '';
}

/**
 * Resolve a "paste:<base64>" icon-picker value (SVG code pasted directly by
 * an editor in the admin builder) to inline SVG markup. The value was
 * already run through rectify_pb_sanitize_svg_markup() at save time; it is
 * sanitized again here as defense in depth before being echoed unescaped.
 *
 * @param string $icon_key
 * @return string
 */
function rectify_pb_pasted_icon_svg($icon_key)
{
    $decoded = base64_decode(substr($icon_key, 6), true);

    if ($decoded === false || stripos($decoded, '<svg') === false) {
        return '';
    }

    return function_exists('rectify_pb_sanitize_svg_markup') ? rectify_pb_sanitize_svg_markup($decoded) : '';
}

/**
 * Resolve an "upload:<attachment_id>" icon-picker value to an <img> tag.
 *
 * @param string $icon_key
 * @param string $class
 * @return string
 */
function rectify_pb_uploaded_icon_img($icon_key, $class = 'rx-custom-icon')
{
    $attachment_id = absint(substr($icon_key, 7));
    $url = $attachment_id ? wp_get_attachment_url($attachment_id) : '';

    return $url ? '<img src="' . esc_url($url) . '" alt="" class="' . esc_attr($class) . '">' : '';
}

/* -----------------------------------------------------------------------
 * Block renderers - one per block type. Markup mirrors the CSS classes
 * used in page-rectify-homepage.php so the builder-driven output looks the
 * same as the hardcoded original.
 * ---------------------------------------------------------------------*/

function rectify_pb_render_hero($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $video_url = isset($fields['background_video_url']) ? $fields['background_video_url'] : '';
    $poster = rectify_pb_image_url(isset($fields['background_poster_image']) ? $fields['background_poster_image'] : 0);
    $cta1_text = isset($fields['cta_primary_text']) ? $fields['cta_primary_text'] : '';
    $cta1_url = isset($fields['cta_primary_url']) ? $fields['cta_primary_url'] : '';
    $cta2_text = isset($fields['cta_secondary_text']) ? $fields['cta_secondary_text'] : '';
    $cta2_url = isset($fields['cta_secondary_url']) ? $fields['cta_secondary_url'] : '';
    $quote = isset($fields['testimonial_quote']) ? $fields['testimonial_quote'] : '';
    $name = isset($fields['testimonial_name']) ? $fields['testimonial_name'] : '';
    $meta = isset($fields['testimonial_meta']) ? $fields['testimonial_meta'] : '';
    $rating = isset($fields['rating_text']) ? $fields['rating_text'] : '';
    $reviews = isset($fields['review_count_text']) ? $fields['review_count_text'] : '';
    ?>
    <section class="rx-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <?php if ($video_url) : ?>
        <video class="rx-hero-video" autoplay muted loop playsinline preload="metadata" <?php echo $poster ? 'poster="' . esc_url($poster) . '"' : ''; ?> aria-hidden="true">
            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
        </video>
        <?php endif; ?>
        <div class="rx-wrap">
            <div class="rx-hero-copy rx-reveal">
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($heading) : ?><h1><?php echo wp_kses_post($heading); ?></h1><?php endif; ?>
                <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
                <div class="rx-hero-actions">
                    <?php if ($cta1_text) : ?><a class="rx-btn rx-btn-red" href="<?php echo esc_url($cta1_url); ?>"><?php echo esc_html($cta1_text); ?></a><?php endif; ?>
                    <?php if ($cta2_text) : ?><a class="rx-btn rx-btn-ghost" href="<?php echo esc_url($cta2_url); ?>"><?php echo esc_html($cta2_text); ?></a><?php endif; ?>
                </div>
                <div class="rx-hero-trust">
                    <div class="rx-hero-trust-summary">
                        <div class="rx-stars rx-hero-trust-stars" aria-hidden="true">★★★★★</div>
                        <p class="rx-hero-trust-count"><?php echo esc_html($reviews); ?> <span class="rx-hero-trust-sep">|</span> <?php echo esc_html($rating); ?></p>
                        <div class="rx-google-word rx-hero-trust-google"><span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span></div>
                    </div>
                    <div class="rx-hero-trust-review">
                        <div class="rx-hero-google-reviews">
                            <?php echo do_shortcode('[grw id=8235]'); ?>
                        </div>
                        <a
                            class="rx-hero-review-link rx-hero-google-review-link"
                            href="https://search.google.com/local/reviews?placeid=ChIJFRbv3xhD1moRiWxPGYri6LQ"
                            target="_blank"
                            rel="nofollow noopener"
                        >Read Review</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Per-section-key markup variants for the feature-grid type. Each of these
 * sections shares the same underlying field schema (heading/lead/kicker/cta
 * + a repeater of icon|image/title/description/link items) but the original
 * design uses a genuinely different CSS class structure per section, so the
 * renderer must reproduce each one exactly rather than a single generic
 * template - reusing one grid/card class across all of them is what broke
 * the styling. Unrecognised section keys (e.g. a brand new custom section an
 * editor adds) fall back to the 'causes' variant as a sane default.
 *
 * @return array
 */
function rectify_pb_feature_grid_variant($section_key)
{
    $variants = array(
        'causes' => array(
            'section_class' => 'rx-causes',
            'head_style' => 'stacked',
            'grid_class' => 'rx-cause-grid',
            'card_class' => 'rx-cause-card',
            'card_style' => 'icon-title-desc',
        ),
        'advantage' => array(
            'section_class' => 'rx-advantage',
            'head_style' => 'split',
            'grid_class' => 'rx-advantage-grid',
            'card_class' => 'rx-adv-card',
            'card_style' => 'head-wrap-icon-title-then-desc',
        ),
        'case-studies' => array(
            'section_class' => 'rx-cases',
            'head_style' => 'row-head-cta',
            'grid_class' => 'rx-case-study-grid',
            'card_class' => 'rx-case-study-card',
            'card_style' => 'bg-image-title-then-desc',
        ),
        'social' => array(
            'section_class' => 'rx-social',
            'head_style' => 'social-head-cta',
            'grid_class' => 'rx-social-grid',
            'card_class' => 'rx-social-card',
            'card_style' => 'thumb-image-plus-content',
        ),
        'questions' => array(
            'section_class' => 'rx-questions',
            'head_style' => 'plain',
            'grid_class' => 'rx-question-grid',
            'card_class' => 'rx-question-card',
            'card_style' => 'icon-title-desc-link',
        ),
    );

    if (isset($variants[$section_key])) {
        return $variants[$section_key];
    }

    return array(
        'section_class' => 'rx-' . $section_key,
        'head_style' => 'stacked',
        'grid_class' => 'rx-cause-grid',
        'card_class' => 'rx-cause-card',
        'card_style' => 'icon-title-desc',
    );
}

function rectify_pb_render_services_tabs($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $tab1_label = isset($fields['tab1_label']) ? $fields['tab1_label'] : '';
    $tab2_label = isset($fields['tab2_label']) ? $fields['tab2_label'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $items_secondary = isset($fields['items_secondary']) && is_array($fields['items_secondary']) ? $fields['items_secondary'] : array();
    ?>
    <section class="rx-services" id="services" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-grid-2">
            <div class="rx-reveal">
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                <div class="rx-services-toggle" role="tablist" aria-label="Service categories">
                    <button class="rx-btn rx-btn-outline no-border rx-services-tab-button is-active" id="service-tab-button" type="button" role="tab" aria-selected="true" aria-controls="service-tab" data-rx-services-tab="service-tab"><?php echo esc_html($tab1_label); ?> <span class="arr">→</span></button>
                    <button class="rx-btn rx-btn-outline no-border rx-services-tab-button" id="commercial-tab-button" type="button" role="tab" aria-selected="false" aria-controls="commercial-tab" data-rx-services-tab="commercial-tab"><?php echo esc_html($tab2_label); ?> <span class="arr">→</span></button>
                </div>
            </div>
            <div class="rx-services-list rx-stagger tab-active" id="service-tab" role="tabpanel" aria-labelledby="service-tab-button">
                <div class="rx-wrap rx-grid-2">
                    <?php foreach ($items as $item) :
                        $icon = isset($item['icon']) ? rectify_pb_icon_markup($item['icon']) : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $link_url = isset($item['link_url']) ? $item['link_url'] : '';
                        $tag = $link_url ? 'a' : 'div';
                        ?>
                        <<?php echo $tag; ?> class="rx-service-item"<?php echo $link_url ? ' href="' . esc_url($link_url) . '"' : ''; ?>>
                            <?php if ($icon) : ?><span class="rx-sign-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                            <div class="rx-service-item-text"><?php echo esc_html($title); ?></div>
                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="rx-services-list rx-stagger tab-hidden" id="commercial-tab" role="tabpanel" aria-labelledby="commercial-tab-button" hidden>
                <div class="rx-wrap rx-grid-2">
                    <?php foreach ($items_secondary as $item) :
                        $icon = isset($item['icon']) ? rectify_pb_icon_markup($item['icon']) : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $link_url = isset($item['link_url']) ? $item['link_url'] : '';
                        $tag = $link_url ? 'a' : 'div';
                        ?>
                        <<?php echo $tag; ?> class="rx-service-item"<?php echo $link_url ? ' href="' . esc_url($link_url) . '"' : ''; ?>>
                            <?php if ($icon) : ?><span class="rx-sign-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                            <div class="rx-service-item-text"><?php echo esc_html($title); ?></div>
                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_feature_grid($fields, $section_key)
{
    $variant = rectify_pb_feature_grid_variant($section_key);

    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $cta_text = isset($fields['cta_text']) ? $fields['cta_text'] : '';
    $cta_url = isset($fields['cta_url']) ? $fields['cta_url'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    if ($section_key === 'advantage') {
        rectify_pb_render_homeowner_advantage($fields, $section_key);
        return;
    }

    /*
     * These two homepage grids are managed from the Rectify Article list.
     * Keep the page builder's editable section headings and layout, but use
     * the selected live articles instead of the builder's old static cards.
     */
    if (function_exists('rectify_custom_get_homepage_articles') && in_array($section_key, array('case-studies', 'social'), true)) {
        $placement = $section_key === 'case-studies' ? 'featured_case_study' : 'featured_news_insights';
        $limit = $section_key === 'case-studies' ? 3 : 4;
        $articles = rectify_custom_get_homepage_articles($placement, $limit);
        $dynamic_items = array();

        foreach ($articles as $index => $article) {
            $image = get_post_thumbnail_id($article->ID);

            if (!$image && isset($items[$index]['image'])) {
                $image = $items[$index]['image'];
            }

            $dynamic_items[] = array(
                'icon' => '',
                'image' => $image,
                'title' => $section_key === 'case-studies' && function_exists('rectify_custom_article_case_study_label')
                    ? strtoupper(rectify_custom_article_case_study_label($article->ID))
                    : '',
                'description' => get_the_title($article),
                'link_text' => '',
                'link_url' => get_permalink($article),
            );
        }

        $items = $dynamic_items;
    }

    if ($section_key === 'questions') {
        $contact_icons = array('adv-trustworthy', 'adv-affordable', 'contact-explore-resources');
        $contact_items = array();

        foreach ($items as $index => $item) {
            $link_url = isset($item['link_url']) ? $item['link_url'] : '';
            $link_text = isset($item['link_text']) ? $item['link_text'] : '';
            $is_phone = ($index === 0 && strpos($link_url, 'tel:') === 0);

            $contact_items[] = array(
                'icon' => !empty($item['icon']) ? $item['icon'] : (isset($contact_icons[$index]) ? $contact_icons[$index] : ''),
                'title' => isset($item['title']) ? $item['title'] : '',
                'description' => isset($item['description']) ? $item['description'] : '',
                'phone' => $is_phone ? $link_text : '',
                'link_text' => $is_phone ? '' : $link_text,
                'link_url' => $is_phone ? '' : $link_url,
            );
        }

        rectify_pb_render_contact_cta(array(
            'heading' => $heading,
            'copy' => $lead,
            'items' => $contact_items,
        ), $section_key);
        return;
    }
    ?>
    <section class="<?php echo esc_attr($variant['section_class']); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($variant['head_style'] === 'plain') : ?>
                <?php if ($heading) : ?><h2 class="rx-title rx-reveal"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-reveal"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            <?php elseif ($variant['head_style'] === 'split') : ?>
                <div class="rx-grid-2 rx-reveal">
                    <div>
                        <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                        <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                    </div>
                    <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                </div>
            <?php elseif ($variant['head_style'] === 'row-head-cta' || $variant['head_style'] === 'social-head-cta') : ?>
                <div class="<?php echo $variant['head_style'] === 'social-head-cta' ? 'rx-social-head' : 'rx-row-head'; ?> rx-reveal">
                    <div>
                        <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                        <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                        <?php if ($lead) : ?><p class="rx-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                    </div>
                    <?php if ($cta_text) : ?><a class="rx-btn rx-btn-outline" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?> <span class="arr">→</span></a><?php endif; ?>
                </div>
            <?php else : /* stacked */ ?>
                <div class="rx-row-head rx-reveal">
                    <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                    <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                    <?php if ($lead) : ?><p class="rx-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($variant['grid_class']); ?> rx-stagger">
                <?php foreach ($items as $index => $item) :
                    $icon = isset($item['icon']) ? $item['icon'] : '';
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '';
                    $icon_markup = $icon ? rectify_pb_icon_markup($icon) : '';
                    ?>
                    <?php if ($variant['card_style'] === 'head-wrap-icon-title-then-desc') : ?>
                        <article class="<?php echo esc_attr($variant['card_class']); ?>">
                            <div class="rx-adv-card-head">
                                <?php if ($image) : ?><span class="rx-sign-card-icon" style="background-image:url('<?php echo esc_url($image); ?>');background-size:cover;background-position:center;display:block;"></span>
                                <?php elseif ($icon_markup) : ?><span class="rx-sign-card-icon"><?php echo $icon_markup; ?></span><?php endif; ?>
                                <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            </div>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </article>
                    <?php elseif ($variant['card_style'] === 'bg-image-title-then-desc') : ?>
                        <<?php echo $link_url ? 'a' : 'article'; ?>
                            class="<?php echo esc_attr($variant['card_class']); ?> rx-home-article-link"
                            <?php echo $link_url ? 'href="' . esc_url($link_url) . '"' : ''; ?>
                        >
                            <div class="rx-case-card" style="<?php echo $image ? "background-image: url('" . esc_url($image) . "');" : ''; ?>">
                                <span class="rx-sign-card-icon"><?php echo $icon_markup; ?></span>
                                <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            </div>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </<?php echo $link_url ? 'a' : 'article'; ?>>
                    <?php elseif ($variant['card_style'] === 'thumb-image-plus-content') :
                        $modifiers = array('--featured', '--accent', '', '--quote');
                        $modifier = $modifiers[$index % count($modifiers)];
                        ?>
                        <<?php echo $link_url ? 'a' : 'article'; ?>
                            class="<?php echo esc_attr($variant['card_class']); ?><?php echo $modifier ? ' ' . esc_attr($variant['card_class'] . $modifier) : ''; ?>"
                            <?php echo $link_url ? 'href="' . esc_url($link_url) . '"' : ''; ?>
                        >
                            <div class="rx-social-card-thumb">
                                <?php if ($image) : ?><img class="skip-lazy" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($description)); ?>" loading="lazy" decoding="async" data-no-lazy="1" data-skip-lazy="1"><?php endif; ?>
                            </div>
                            <div class="rx-social-card-content">
                                <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                            </div>
                        </<?php echo $link_url ? 'a' : 'article'; ?>>
                    <?php else : /* icon-title-desc, icon-title-desc-link */ ?>
                        <article class="<?php echo esc_attr($variant['card_class']); ?>">
                            <?php if ($image) : ?>
                            <span class="rx-sign-card-icon" style="background-image:url('<?php echo esc_url($image); ?>');background-size:cover;background-position:center;display:block;"></span>
                            <?php elseif ($icon_markup) : ?><span class="rx-sign-card-icon"><?php echo $icon_markup; ?></span><?php endif; ?>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                            <?php if ($link_text) : ?><a href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?></a><?php endif; ?>
                        </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_feature_list_variant($section_key)
{
    $variants = array(
        'signs' => array(
            'section_class' => 'rx-signs',
            'head_class' => 'rx-signs-copy',
            'grid_class' => 'rx-signs-grid',
            'card_style' => 'plain-bg-image',
        ),
        'follow' => array(
            'section_class' => 'rx-follow',
            'head_class' => 'rx-follow-head',
            'grid_class' => 'rx-follow-grid',
            'card_style' => 'thumb-wrap',
        ),
    );

    if (isset($variants[$section_key])) {
        return $variants[$section_key];
    }

    return array(
        'section_class' => 'rx-' . $section_key,
        'head_class' => 'rx-signs-copy',
        'grid_class' => 'rx-signs-grid',
        'card_style' => 'plain-bg-image',
    );
}

function rectify_pb_render_feature_list($fields, $section_key)
{
    $variant = rectify_pb_feature_list_variant($section_key);

    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $cta_text = isset($fields['cta_text']) ? $fields['cta_text'] : '';
    $cta_url = isset($fields['cta_url']) ? $fields['cta_url'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $is_follow_style = $variant['card_style'] === 'thumb-wrap';
    $instagram_shortcode = '';

    if ($is_follow_style && function_exists('rectify_custom_get_homepage_instagram_shortcode')) {
        $instagram_shortcode = rectify_custom_get_homepage_instagram_shortcode(get_queried_object_id());
    }
    ?>
    <section class="<?php echo esc_attr($variant['section_class']); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap<?php echo $is_follow_style ? '' : ' rx-grid-2'; ?>">
            <div class="<?php echo esc_attr($variant['head_class']); ?> rx-reveal">
                <?php if ($is_follow_style) : ?><div>
                <?php endif; ?>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                <?php if ($is_follow_style) : ?></div>
                <?php endif; ?>
                <?php if ($cta_text) : ?><a class="rx-gradient-pill" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a><?php endif; ?>
            </div>
            <?php if ($instagram_shortcode && shortcode_exists('instagram-feed')) : ?>
                <div class="rx-follow-instagram-feed">
                    <?php echo do_shortcode($instagram_shortcode); ?>
                </div>
            <?php else : ?>
                <div class="<?php echo esc_attr($variant['grid_class']); ?> rx-stagger">
                    <?php foreach ($items as $item) :
                        $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0);
                        $label = isset($item['label']) ? $item['label'] : '';
                        ?>
                        <?php if ($is_follow_style) : ?>
                            <article class="rx-follow-card">
                                <div class="rx-follow-card-thumb">
                                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($label); ?>"><?php endif; ?>
                                </div>
                                <div class="rx-follow-card-content"></div>
                            </article>
                        <?php else : ?>
                            <article class="rx-sign-card" aria-label="<?php echo esc_attr($label); ?>">
                                <?php if ($image) : ?><img class="rx-sign-card-bg" src="<?php echo esc_url($image); ?>" alt="" loading="lazy" decoding="async"><?php endif; ?>
                                <div class="rx-sign-card-label"><?php echo esc_html($label); ?></div>
                            </article>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_video_loop($fields, $section_key)
{
    $video_url = isset($fields['video_url']) ? $fields['video_url'] : '';
    $poster = rectify_pb_image_url(isset($fields['poster_image']) ? $fields['poster_image'] : 0);

    if (!$video_url) {
        return;
    }
    ?>
    <section class="rx-video" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-video-frame">
                <video class="rx-video-el" autoplay muted loop playsinline preload="metadata"<?php echo $poster ? ' poster="' . esc_url($poster) . '"' : ''; ?>>
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_image_slider($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $slides = isset($fields['slides']) && is_array($fields['slides']) ? $fields['slides'] : array();
    ?>
    <section class="rx-performance" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><p class="rx-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            <div class="rx-compare">
                <div class="rx-slider">
                    <div class="slider-container">
                        <div class="slider">
                            <?php foreach ($slides as $index => $slide) :
                                $image = rectify_pb_image_url(isset($slide['image']) ? $slide['image'] : 0);
                                $caption = isset($slide['caption']) ? $slide['caption'] : '';
                                $active_class = $index === 0 ? ' slider-image-before is-active' : '';
                                ?>
                                <div class="rx-slider-slide slider-image<?php echo esc_attr($active_class); ?>">
                                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($caption); ?>"><?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="rx-slider-control rx-slider-prev" type="button" aria-label="Previous image"></button>
                        <button class="rx-slider-control rx-slider-next" type="button" aria-label="Next image"></button>
                        <div class="slider-handle"></div>
                    </div>
                    <span class="rx-slider-dot" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_logo_slider($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $logos = isset($fields['logos']) && is_array($fields['logos']) ? $fields['logos'] : array();
    ?>
    <section class="rx-<?php echo esc_attr($section_key); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><p class="rx-lead text-center"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            <div class="rx-customers-slider">
                <div class="rx-customers-slider-window" aria-label="Logo carousel">
                    <div class="rx-logo-row rx-brand-slider">
                        <?php foreach (array_merge($logos, $logos) as $logo) :
                            $image = rectify_pb_image_url(isset($logo['image']) ? $logo['image'] : 0);
                            $alt = isset($logo['alt']) ? $logo['alt'] : '';
                            if (!$image) {
                                continue;
                            }
                            ?>
                            <div class="rx-logo-slide">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_accordion($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Resource Centre';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    // The assessment page's FAQ list uses its own simpler full-width design
    // (ra-faq markup) instead of the homepage image + accordion layout.
    if ($section_key === 'assessment-faqs') {
        ?>
        <section class="ra-section ra-section-white" id="faqs" data-rx-section="<?php echo esc_attr($section_key); ?>">
            <div class="rx-wrap">
                <?php if ($heading) : ?>
                    <div class="ra-section-head">
                        <div><h2><?php echo wp_kses_post($heading); ?></h2></div>
                    </div>
                <?php endif; ?>
                <div class="ra-faq">
                    <?php foreach ($items as $index => $item) :
                        $question = isset($item['question']) ? $item['question'] : '';
                        $answer = isset($item['answer']) ? $item['answer'] : '';
                        ?>
                        <details <?php echo $index === 0 ? 'open' : ''; ?>>
                            <summary><?php echo esc_html($question); ?></summary>
                            <p><?php echo wp_kses_post($answer); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
        return;
    }

    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/home/resources-image.webp');
    }
    ?>
    <section class="rx-guide" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-grid-2">
            <div class="rx-reveal">
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                <?php if ($image) : ?><img class="rx-guide-img" src="<?php echo esc_url($image); ?>" alt=""><?php endif; ?>
            </div>
            <div class="rx-reveal">
                <p class="rx-faq-label">Frequently asked questions</p>
                <div class="rx-faq">
                    <?php foreach ($items as $index => $item) :
                        $question = isset($item['question']) ? $item['question'] : '';
                        $answer = isset($item['answer']) ? $item['answer'] : '';
                        ?>
                        <details <?php echo $index === 0 ? 'open' : ''; ?>>
                            <summary><?php echo esc_html($question); ?></summary>
                            <p><?php echo wp_kses_post($answer); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
                <div class="rx-guide-action">
                    <b>Still looking for Answers</b>
                    <a class="rx-btn rx-btn-outline" href="<?php echo esc_url(home_url('/resources/faq/residential/')); ?>">Read more FAQs <span class="arr">→</span></a>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Render the full-width FAQ used directly below the homepage social feed.
 * This has its own block type because the generic homepage accordion is a
 * two-column image/content component.
 */
function rectify_pb_render_homepage_faq($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    if (!$heading && !$items) {
        return;
    }
    ?>
    <section class="rx-home-faq" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?>
                <h2 class="rx-home-faq__heading"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
            <?php if ($items) : ?>
                <div class="rx-home-faq__list">
                    <?php foreach ($items as $index => $item) :
                        $question = isset($item['question']) ? $item['question'] : '';
                        $answer = isset($item['answer']) ? $item['answer'] : '';

                        if ($question === '') {
                            continue;
                        }
                        ?>
                        <details class="rx-home-faq__item" id="rx-home-faq-<?php echo esc_attr($index); ?>" <?php echo $index === 0 ? 'open' : ''; ?>>
                            <summary><?php echo esc_html($question); ?></summary>
                            <?php if ($answer !== '') : ?>
                                <div class="rx-home-faq__answer"><?php echo wpautop(wp_kses_post($answer)); ?></div>
                            <?php endif; ?>
                        </details>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_image_text($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0);
    $cta_text = isset($fields['cta_text']) ? $fields['cta_text'] : '';
    $cta_url = isset($fields['cta_url']) ? $fields['cta_url'] : '';

    if ($section_key === 'team') {
        ?>
        <section class="rx-team" data-rx-section="<?php echo esc_attr($section_key); ?>">
            <div class="rx-grid-2 rx-wrap">
                <div class="rx-team-copy rx-reveal">
                    <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                    <?php if ($cta_text) : ?><a class="rx-btn rx-btn-ghost rx-btn-pill" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?> <span class="arr">→</span></a><?php endif; ?>
                </div>
                <div class="rx-team-grid rx-reveal" style="<?php echo $image ? "--rx-team:url('" . esc_url($image) . "');" : ''; ?>"></div>
            </div>
        </section>
        <?php
        return;
    }

    if ($section_key === 'resources') {
        ?>
        <section class="rx-resources" id="resources" data-rx-section="<?php echo esc_attr($section_key); ?>"<?php if ($image) : ?> style="<?php echo esc_attr("--rx-resources-bg-image:url('" . esc_url_raw($image) . "');"); ?>"<?php endif; ?>>
            <div class="rx-wrap">
                <div class="rx-row-head rx-reveal">
                    <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                    <?php if ($copy) : ?><p class="rx-lead"><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                    <?php if ($cta_text) : ?><a class="rx-btn rx-btn-ghost rx-btn-pill" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?> <span class="arr">→</span></a><?php endif; ?>
                </div>
            </div>
        </section>
        <?php
        return;
    }

    if ($section_key === 'reputation') {
        ?>
        <section class="rx-reputation" data-rx-section="<?php echo esc_attr($section_key); ?>">
            <div class="rx-wrap">
                <div class="rx-row-head rx-reveal">
                    <div>
                        <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                        <?php if ($copy) : ?><p class="rx-lead"><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                    </div>
                    <div class="rx-google">
                        <div class="rx-google-word">
                            <span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span>
                        </div>
                        <div>
                            <div class="rx-rating">4.9<span class="rx-stars">★★★★★</span></div>
                            <?php if ($image) : ?>
                                <img class="rx-google-review-image" src="<?php echo esc_url($image); ?>" alt="Google reviews" loading="lazy" decoding="async">
                            <?php endif; ?>
                            <?php if ($cta_text) : ?><a class="rx-btn rx-btn-outline" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?> <span class="arr">→</span></a><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="rx-review-strip rx-stagger">
                    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
                    <div class="elfsight-app-6a3ce5e7-eedb-4277-852a-400cbf621ab9" data-elfsight-app-lazy></div>
                </div>
            </div>
        </section>
        <?php
        return;
    }

    ?>
    <section class="rx-<?php echo esc_attr($section_key); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-grid-2">
            <div class="rx-reveal">
                <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><p class="rx-lead"><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                <?php if ($cta_text) : ?><a class="rx-btn rx-btn-ghost rx-btn-pill" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?> <span class="arr">→</span></a><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <div class="rx-reveal" style="background-image:url('<?php echo esc_url($image); ?>');background-size:cover;background-position:center;"></div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $button_text = isset($fields['button_text']) ? $fields['button_text'] : '';
    $button_url = isset($fields['button_url']) ? $fields['button_url'] : '';
    $phone = isset($fields['phone_number']) ? $fields['phone_number'] : '';
    $phone_href = 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
    ?>
    <section class="rx-final-cta" id="contact" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($heading) : ?><h2 class="rx-title"><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
            <div class="rx-hero-actions">
                <?php if ($phone) : ?><a class="rx-btn rx-btn-white" href="<?php echo esc_attr($phone_href); ?>">Call <?php echo esc_html($phone); ?></a><?php endif; ?>
                <?php if ($button_text) : ?><a class="rx-btn rx-btn-ghost" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?> <span class="arr">→</span></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * Residential Solutions page block renderers.
 * ---------------------------------------------------------------------*/

/**
 * Both the Residential Solutions and Commercial Solutions pages share an
 * identical markup structure (same theme author, same design) - only the
 * CSS class prefix differs ("rx-residential-*" vs "rx-commercial-*"). Rather
 * than duplicating 5 block types + render functions, this derives the
 * correct prefix from the section_key naming convention
 * ("residential-hero"/"commercial-hero"/etc).
 *
 * @param string $section_key
 * @return string 'residential'|'commercial'
 */
function rectify_pb_solutions_page_prefix($section_key)
{
    $section_key = (string) $section_key;

    foreach (array('commercial', 'civil', 'hospital', 'undermining') as $known_prefix) {
        if (strpos($section_key, $known_prefix) === 0) {
            return $known_prefix;
        }
    }

    return 'residential';
}

/**
 * Split a "Points (one per line)"-style textarea value into an array of
 * trimmed, non-empty lines.
 *
 * @param string $text
 * @return array
 */
function rectify_pb_split_lines($text)
{
    if (!$text) {
        return array();
    }

    return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $text))));
}

/**
 * Split "Label|||URL" lines (used by related-links textareas) into an array
 * of ['label' => ..., 'url' => ...].
 *
 * @param string $text
 * @return array
 */
function rectify_pb_split_label_url_lines($text)
{
    $links = array();

    foreach (rectify_pb_split_lines($text) as $line) {
        $parts = explode('|||', $line, 2);
        $links[] = array(
            'label' => trim($parts[0]),
            'url' => isset($parts[1]) ? trim($parts[1]) : '#',
        );
    }

    return $links;
}

function rectify_pb_render_residential_hero($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-<?php echo esc_attr($prefix); ?>-hero-grid">
            <div>
                <?php if ($eyebrow) : ?><span class="rx-kicker"><?php echo esc_html($eyebrow); ?></span><?php endif; ?>
                <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <nav class="rx-<?php echo esc_attr($prefix); ?>-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">></span>
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div class="rx-<?php echo esc_attr($prefix); ?>-hero-summary">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php if ($image) : ?>
    <figure class="rx-<?php echo esc_attr($prefix); ?>-strip">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </figure>
    <?php endif; ?>
    <?php
}

function rectify_pb_render_residential_intro($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-<?php echo esc_attr($prefix); ?>-intro-grid">
            <div>
                <?php if ($eyebrow) : ?><span class="rx-kicker"><?php echo esc_html($eyebrow); ?></span><?php endif; ?>
                <?php if ($title) : ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><div class="rx-<?php echo esc_attr($prefix); ?>-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-<?php echo esc_attr($prefix); ?>-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_residential_solutions_grid($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-solutions" id="<?php echo esc_attr($prefix); ?>-solutions" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($eyebrow) : ?><span class="rx-kicker"><?php echo esc_html($eyebrow); ?></span><?php endif; ?>
            <?php if ($heading) : ?><h2 class="rx-<?php echo esc_attr($prefix); ?>-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><div class="rx-<?php echo esc_attr($prefix); ?>-richtext rx-<?php echo esc_attr($prefix); ?>-solutions-copy"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-<?php echo esc_attr($prefix); ?>-solution-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $point_title = isset($item['point_title']) ? $item['point_title'] : '';
                    $points_text = isset($item['points_text']) ? $item['points_text'] : '';
                    $points = $points_text ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $points_text))) : array();
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '#';
                    ?>
                    <article class="rx-<?php echo esc_attr($prefix); ?>-solution-card">
                        <div class="rx-<?php echo esc_attr($prefix); ?>-card-top">
                            <?php if ($icon) : ?><span class="rx-<?php echo esc_attr($prefix); ?>-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                            <?php if ($link_text) : ?>
                            <a class="rx-<?php echo esc_attr($prefix); ?>-learn" href="<?php echo esc_url($link_url); ?>">
                                <?php echo esc_html($link_text); ?>
                                <span aria-hidden="true">→</span>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        <?php if ($point_title || !empty($points)) : ?>
                        <div class="rx-<?php echo esc_attr($prefix); ?>-points">
                            <?php if ($point_title) : ?><h4><?php echo esc_html($point_title); ?></h4><?php endif; ?>
                            <?php if (!empty($points)) : ?>
                            <ul>
                                <?php foreach ($points as $point) : ?>
                                <li><?php echo esc_html($point); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_residential_why($fields, $section_key)
{
    // The Civil & Energy page predates the shared Commercial Solutions block.
    // Keep its saved builder data compatible while rendering the current,
    // Figma-matched Commercial Solutions component.
    if ($section_key === 'civil-why') {
        rectify_pb_render_commercial_inner_why_cards($fields, $section_key);
        return;
    }

    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <?php
    // residential/commercial pages use a generic --rx-contours var; the
    // civil/hospital/undermining pages each expect a page-specific
    // --rx-{prefix}-contours var instead - see inner-page.css / inner-pages.css.
    $contour_var = in_array($prefix, array('residential', 'commercial'), true) ? '--rx-contours' : ('--rx-' . $prefix . '-contours');
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-why" style="<?php echo esc_attr($contour_var . ':url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-<?php echo esc_attr($prefix); ?>-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><div class="rx-<?php echo esc_attr($prefix); ?>-richtext rx-<?php echo esc_attr($prefix); ?>-why-copy"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-<?php echo esc_attr($prefix); ?>-why-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '';
                    $phone_text = isset($item['phone_text']) ? $item['phone_text'] : '';
                    $phone_url = isset($item['phone_url']) ? $item['phone_url'] : '';
                    ?>
                    <article class="rx-<?php echo esc_attr($prefix); ?>-why-card">
                        <?php if ($icon) : ?><span class="rx-<?php echo esc_attr($prefix); ?>-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-<?php echo esc_attr($prefix); ?>-help-description"><p><?php echo wp_kses_post($description); ?></p></div><?php endif; ?>
                        <?php if ($phone_text) : ?>
                            <a class="rx-<?php echo esc_attr($prefix); ?>-help-phone" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a>
                        <?php elseif ($link_text) : ?>
                            <a class="rx-<?php echo esc_attr($prefix); ?>-learn rx-<?php echo esc_attr($prefix); ?>-help-link" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?><span aria-hidden="true">&rarr;</span></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Render the three-card help panel used by the Commercial Solutions archive.
 * This is intentionally a dedicated block because its cards contain actions,
 * unlike the simpler residential "Why Choose" cards.
 *
 * @param array  $fields      Builder field values.
 * @param string $section_key Builder section key.
 */
function rectify_pb_render_commercial_help($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $lead = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-commercial-why" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-commercial-help-heading">
            <?php if ($heading) : ?><h2 class="rx-commercial-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><div class="rx-commercial-richtext rx-commercial-why-copy"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
        </div>
        <?php if (!empty($items)) : ?>
        <div class="rx-commercial-why-grid">
            <?php foreach ($items as $index => $item) :
                $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                $title = isset($item['title']) ? $item['title'] : '';
                $description = isset($item['description']) ? $item['description'] : '';
                $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                $link_url = isset($item['link_url']) ? $item['link_url'] : '';
                $phone_text = isset($item['phone_text']) ? $item['phone_text'] : '';
                $phone_url = isset($item['phone_url']) ? $item['phone_url'] : '';

                if (0 === $index) {
                    $phone_text = '1800 18 20 20';
                    $phone_url = 'tel:1800182020';
                } elseif (1 === $index) {
                    $link_url = home_url('/assessment/');
                } elseif (2 === $index) {
                    $link_url = home_url('/resources/');
                }
                ?>
                <article class="rx-commercial-why-card">
                    <?php if ($icon) : ?><span class="rx-commercial-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-commercial-help-description"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                    <?php if ($phone_text) : ?>
                        <a class="rx-commercial-help-phone" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a>
                    <?php elseif ($link_text) : ?>
                        <a class="rx-commercial-learn rx-commercial-help-link" href="<?php echo esc_url($link_url); ?>">
                            <?php echo esc_html($link_text); ?><span aria-hidden="true">&rarr;</span>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_residential_cta($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-cta" <?php echo $image ? 'style="background-image:url(' . esc_url($image) . ');"' : ''; ?> data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><?php echo wp_kses_post(wpautop($copy)); ?><?php endif; ?>
            <div class="rx-<?php echo esc_attr($prefix); ?>-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-btn rx-btn-white" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-<?php echo esc_attr($prefix); ?>-contact-pill" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-<?php echo esc_attr($prefix); ?>-contact-pill" href="<?php echo esc_url($email_url); ?>"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Ground Improvement page renderers. These intentionally use a dedicated,
 * page-scoped component family so the Figma layout can be reproduced without
 * changing any of the older Residential Solutions templates.
 */
function rectify_pb_render_ground_hero($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $current = isset($fields['breadcrumb_current']) ? $fields['breadcrumb_current'] : 'Ground Improvement';
    ?>
    <section class="rx-ground-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap">
            <?php if ($kicker) : ?><span class="rx-ground-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-ground-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($current); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ground_intro($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    ?>
    <section class="rx-ground-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap rx-ground-intro-grid">
            <?php if ($image) : ?>
                <figure class="rx-ground-intro-media"><img src="<?php echo esc_url($image); ?>" alt=""></figure>
            <?php endif; ?>
            <div class="rx-ground-intro-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><div class="rx-ground-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ground_required($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ground-required" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap">
            <div class="rx-ground-required-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ground-richtext"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
                <div class="rx-ground-required-grid">
                    <?php foreach ($items as $item) :
                        $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                        <article class="rx-ground-required-card">
                            <?php if ($icon) : ?><span class="rx-ground-required-icon"><?php echo $icon; ?></span><?php endif; ?>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-ground-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ground_projects($fields, $section_key)
{
    $images = array(
        rectify_pb_image_url(isset($fields['image_1']) ? $fields['image_1'] : 0, 'full'),
        rectify_pb_image_url(isset($fields['image_2']) ? $fields['image_2'] : 0, 'full'),
        rectify_pb_image_url(isset($fields['image_3']) ? $fields['image_3'] : 0, 'full'),
    );
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $applications_heading = isset($fields['applications_heading']) ? $fields['applications_heading'] : '';
    $applications = rectify_pb_split_lines(isset($fields['applications']) ? $fields['applications'] : '');
    ?>
    <section class="rx-ground-projects" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap">
            <div class="rx-ground-project-gallery">
                <?php foreach ($images as $image) : ?>
                    <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt=""></figure><?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="rx-ground-project-copy-grid">
                <div>
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($copy) : ?><div class="rx-ground-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
                </div>
                <div class="rx-ground-applications">
                    <?php if ($applications_heading) : ?><h3><?php echo esc_html($applications_heading); ?></h3><?php endif; ?>
                    <?php if (!empty($applications)) : ?>
                        <ul><?php foreach ($applications as $application) : ?><li><?php echo esc_html($application); ?></li><?php endforeach; ?></ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ground_why($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-ground-why" style="<?php echo esc_attr('--rx-ground-contours:url(' . $contours . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
                <div class="rx-ground-why-grid">
                    <?php foreach ($items as $item) :
                        $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                        <article class="rx-ground-why-card">
                            <?php if ($icon) : ?><span class="rx-ground-why-icon"><?php echo $icon; ?></span><?php endif; ?>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-ground-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ground_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    $phone_icon = rectify_pb_theme_asset_url('images/commercial-void-filling/cta-phone.svg');
    $email_icon = rectify_pb_theme_asset_url('images/commercial-void-filling/cta-mail.svg');
    ?>
    <section class="rx-ground-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ground-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-ground-cta-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            <div class="rx-ground-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-ground-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-ground-cta-outline" href="<?php echo esc_url($phone_url); ?>"><img src="<?php echo esc_url($phone_icon); ?>" alt=""><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-ground-cta-outline" href="<?php echo esc_url($email_url); ?>"><img src="<?php echo esc_url($email_icon); ?>" alt=""><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Resolve an icon-picker value to an <img> tag (residential cards always use
 * <span class="rx-residential-card-icon"><img ...></span>, unlike the
 * homepage's raw inline-SVG icon spans) - wraps rectify_pb_icon_markup() and
 * converts inline SVG library entries into a data URI <img> so the markup
 * stays consistent with the original template's img-based icon slot.
 *
 * @param string $icon_key
 * @return string
 */
function rectify_pb_icon_markup_as_img($icon_key)
{
    if (!$icon_key) {
        return '';
    }

    if (strpos($icon_key, 'upload:') === 0) {
        return rectify_pb_uploaded_icon_img($icon_key);
    }

    if (strpos($icon_key, 'paste:') === 0) {
        $svg_markup = rectify_pb_pasted_icon_svg($icon_key);

        return $svg_markup ? '<img src="data:image/svg+xml;base64,' . base64_encode($svg_markup) . '" alt="">' : '';
    }

    $icons = rectify_pb_get_icon_library();

    if (!isset($icons[$icon_key])) {
        return '';
    }

    $icon = $icons[$icon_key];

    if ($icon['type'] === 'file' && !empty($icon['url'])) {
        return '<img src="' . esc_url($icon['url']) . '" alt="">';
    }

    if ($icon['type'] === 'svg' && !empty($icon['svg'])) {
        return '<img src="data:image/svg+xml;base64,' . base64_encode($icon['svg']) . '" alt="">';
    }

    return '';
}

/* -----------------------------------------------------------------------
 * Contact Us page block renderers. Single page (no prefix scheme needed) -
 * markup/classes mirror the original hardcoded template-parts/content-contact-us.php.
 * ---------------------------------------------------------------------*/

function rectify_pb_render_contact_hero($fields, $section_key)
{
    $eyebrow = isset($fields['eyebrow']) ? $fields['eyebrow'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    ?>
    <section class="rx-contact-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-contact-hero-grid">
            <div class="rx-contact-hero-copy">
                <?php if ($eyebrow) : ?><span class="rx-kicker"><?php echo esc_html($eyebrow); ?></span><?php endif; ?>
                <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <nav class="rx-contact-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'rectify-custom'); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'rectify-custom'); ?></a>
                    <span aria-hidden="true">&gt;</span>
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <?php if ($copy) : ?><p class="rx-contact-hero-lead"><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_contact_offices($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-contact-offices" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-contact-offices-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-contact-office-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $copy = isset($item['copy']) ? $item['copy'] : '';
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '#';
                    ?>
                    <article class="rx-contact-office-card">
                        <?php if ($icon) : ?><span class="rx-contact-office-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($copy) : ?><p><?php echo esc_html($copy); ?></p><?php endif; ?>
                        <?php if ($link_text) : ?>
                        <a class="rx-contact-map-link" href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html(strtoupper($link_text)); ?> <span aria-hidden="true">&#8594;</span></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_contact_form($fields, $section_key)
{
    $form_shortcode = isset($fields['form_shortcode']) ? $fields['form_shortcode'] : '';
    $form_markup = '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';

    if ($section_key === 'assessment-quote') {
        $copy_parts = preg_split('/\R\s*\R/', trim($copy), 2);
        $intro_copy = isset($copy_parts[0]) ? $copy_parts[0] : '';
        $review_lines = isset($copy_parts[1]) ? preg_split('/\R/', trim($copy_parts[1])) : array();
        $review_label = $review_lines ? array_shift($review_lines) : '';
        $review_items = array();

        foreach ($review_lines as $review_line) {
            $review_line = trim($review_line);

            if (strpos($review_line, '- ') === 0) {
                $review_line = substr($review_line, 2);
            }

            if ($review_line !== '') {
                $review_items[] = $review_line;
            }
        }

        if ($form_shortcode === '' || stripos($form_shortcode, 'gravityform') !== false) {
            $form_shortcode = '[rectify_hubspot_form portal_id="48201196" form_id="a1c00f4d-e08e-4d15-8916-d0cc2528f9c0" region="ap1"]';
        }
        ?>
        <section class="ra-section ra-section-dark" id="get-a-quote" data-rx-section="<?php echo esc_attr($section_key); ?>">
            <div class="rx-wrap ra-quote-grid">
                <div class="ra-quote-copy">
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($intro_copy) : ?><p><?php echo esc_html($intro_copy); ?></p><?php endif; ?>
                    <?php if ($review_label) : ?><p class="ra-quote-label"><?php echo esc_html($review_label); ?></p><?php endif; ?>
                    <?php if ($review_items) : ?>
                        <ul class="ra-hero-list">
                            <?php foreach ($review_items as $review_item) : ?>
                                <li><?php echo esc_html($review_item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="rx-quotation-page">
                    <div class="rx-quotation-form-card ra-quote-card">
                        <h3><?php esc_html_e('Get a Free Quote', 'rectify-custom'); ?></h3>
                        <div class="rx-quotation-form">
                            <?php echo rectify_pb_form_embed_markup($form_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput -- see rectify_pb_form_embed_markup(). ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        return;
    }

    $is_hubspot_form = stripos($form_shortcode, 'hbspt.forms.create') !== false
        || stripos($form_shortcode, 'rectify_hubspot_form') !== false;

    if ($is_hubspot_form && function_exists('rectify_pb_hubspot_embed')) {
        $portal_id = defined('RECTIFY_PB_HUBSPOT_PORTAL_ID') ? RECTIFY_PB_HUBSPOT_PORTAL_ID : '';
        $form_id = '';
        $region = defined('RECTIFY_PB_HUBSPOT_REGION') ? RECTIFY_PB_HUBSPOT_REGION : '';

        if (preg_match('/portal(?:Id|_id)\s*(?::|=)\s*["\']?([0-9]+)/i', $form_shortcode, $portal_match)) {
            $portal_id = $portal_match[1];
        }

        if (preg_match('/form(?:Id|_id)\s*(?::|=)\s*["\']([a-zA-Z0-9\-]+)["\']/i', $form_shortcode, $form_match)) {
            $form_id = $form_match[1];
        }

        if (preg_match('/region\s*(?::|=)\s*["\']([a-zA-Z0-9]+)["\']/i', $form_shortcode, $region_match)) {
            $region = $region_match[1];
        }

        $form_markup = rectify_pb_hubspot_embed(array(
            'portal_id' => $portal_id,
            'form_id' => $form_id,
            'region' => $region,
            // Match the working quote form: redirect only after HubSpot has
            // persisted the native form submission.
            'redirect_url' => add_query_arg(
                'hubspot_contact_submitted',
                '1',
                get_permalink()
            ),
        ));
    } elseif ($form_shortcode) {
        $form_markup = rectify_pb_form_embed_markup($form_shortcode);
    }
    ?>
    <section class="rx-contact-form-section" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-contact-form-grid">
            <div class="rx-contact-form-panel">
                <?php if ($form_markup) : ?>
                    <?php echo $form_markup; // phpcs:ignore WordPress.Security.EscapeOutput -- generated by the HubSpot helper or sanitized embed helper above. ?>
                <?php endif; ?>
            </div>
            <div class="rx-contact-form-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><div class="rx-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
                <?php if ($phone_text) : ?>
                <div class="rx-contact-direct">
                    <span class="rx-contact-direct-label"><?php esc_html_e('CALL', 'rectify-custom'); ?></span>
                    <a class="rx-contact-direct-value" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone_text)); ?>"><?php echo esc_html($phone_text); ?></a>
                </div>
                <?php endif; ?>
                <?php if ($email_text) : ?>
                <div class="rx-contact-direct">
                    <span class="rx-contact-direct-label"><?php esc_html_e('Email', 'rectify-custom'); ?></span>
                    <a class="rx-contact-direct-value" href="<?php echo esc_url('mailto:' . $email_text); ?>"><?php echo esc_html($email_text); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_contact_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-contact-cta"<?php echo $section_key === 'questions' ? ' id="questions"' : ''; ?> style="<?php echo esc_attr('--rx-contact-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-contact-cta-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $phone = isset($item['phone']) ? $item['phone'] : '';
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '#';
                    ?>
                    <article class="rx-contact-cta-card">
                        <?php if ($icon) : ?><span class="rx-contact-cta-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        <?php if ($phone) : ?>
                        <a class="rx-contact-cta-phone" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                            <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M22.6795 1.32019C21.7996 0.440119 20.7395 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33334 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.1876 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18231 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/>
                            </svg>
                            </span> <?php echo esc_html($phone); ?>
                        </a>
                        <?php elseif ($link_text) : ?>
                        <a class="rx-contact-cta-link" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html(strtoupper($link_text)); ?> <span aria-hidden="true">&#8594;</span></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * Commercial Solutions child-page block renderers (civil-energy-utilities,
 * hospital-asset-remediation, undermining-treatment). Prefix derived from
 * section_key via rectify_pb_solutions_page_prefix().
 * ---------------------------------------------------------------------*/

function rectify_pb_render_solutions_child_hero($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-<?php echo esc_attr($prefix); ?>-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/commercial-solutions/')); ?>">Commercial Solutions</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($title); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solutions_intro_band($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $lede = isset($fields['lede']) ? $fields['lede'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $related_label = isset($fields['related_label']) ? $fields['related_label'] : '';
    $related_text = isset($fields['related_text']) ? $fields['related_text'] : '';
    $related_url = isset($fields['related_url']) ? $fields['related_url'] : '';
    $image_value = isset($fields['image']) ? $fields['image'] : 0;
    $image = $prefix === 'civil'
        ? rectify_pb_commercial_inner_image_url($image_value, 'large')
        : rectify_pb_image_url($image_value, 'large');
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-<?php echo esc_attr($prefix); ?>-intro-grid">
            <div>
                <?php if ($lede) : ?><p class="rx-<?php echo esc_attr($prefix); ?>-lede"><?php echo esc_html($lede); ?></p><?php endif; ?>
                <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                <?php if ($related_text) : ?>
                <p class="rx-<?php echo esc_attr($prefix); ?>-related">
                    <?php if ($related_label) : ?><strong><?php echo esc_html($related_label); ?></strong><?php endif; ?>
                    <a href="<?php echo esc_url($related_url); ?>"><?php echo esc_html($related_text); ?> <span aria-hidden="true">&#8594;</span></a>
                </p>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-<?php echo esc_attr($prefix); ?>-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_civil_where_help($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-civil-band rx-civil-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-civil-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-civil-where-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $list_items = rectify_pb_split_lines(isset($item['items_text']) ? $item['items_text'] : '');
                    ?>
                    <article class="rx-civil-where-card">
                        <?php if ($icon) : ?><span class="rx-civil-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if (!empty($list_items)) : ?>
                        <ul>
                            <?php foreach ($list_items as $li) : ?>
                            <li><?php echo esc_html($li); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_undermining_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-undermining-band rx-undermining-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-undermining-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-undermining-causes-grid">
                <?php foreach ($items as $item) :
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="rx-undermining-cause-item">
                        <span class="rx-undermining-check" aria-hidden="true"></span>
                        <div>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_hospital_feature_grid($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $icon = isset($fields['icon']) ? rectify_pb_icon_markup_as_img($fields['icon']) : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $is_why = (strpos((string) $section_key, '-why') !== false);
    ?>
    <?php if ($is_why) : ?>
    <section class="rx-hospital-why" style="<?php echo esc_attr('--rx-hospital-contours:url(' . rectify_pb_theme_asset_url('images/commercial/why-choose-contours.svg') . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
    <?php else : ?>
    <section class="rx-hospital-band rx-hospital-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
    <?php endif; ?>
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-hospital-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-hospital-feature-grid">
                <?php foreach ($items as $item) :
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="rx-hospital-feature-card">
                        <?php if ($icon) : ?><span class="rx-hospital-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_hospital_where_help($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-hospital-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-hospital-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-hospital-where-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $related = rectify_pb_split_label_url_lines(isset($item['related_text']) ? $item['related_text'] : '');
                    ?>
                    <article class="rx-hospital-where-card">
                        <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt=""><?php endif; ?>
                        <div class="rx-hospital-where-overlay">
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                            <?php if (!empty($related)) : ?>
                            <p class="rx-hospital-where-related-label">Related Services:</p>
                            <p class="rx-hospital-where-related">
                                <?php foreach ($related as $link) : ?>
                                <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?> <span aria-hidden="true">&#8594;</span></a>
                                <?php endforeach; ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solutions_media_list($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $list = rectify_pb_split_lines(isset($fields['list_text']) ? $fields['list_text'] : '');
    $list_col2 = rectify_pb_split_lines(isset($fields['list_text_col2']) ? $fields['list_text_col2'] : '');
    $related_label = isset($fields['related_label']) ? $fields['related_label'] : '';
    $related = rectify_pb_split_label_url_lines(isset($fields['related_text']) ? $fields['related_text'] : '');
    $has_two_cols = !empty($list_col2);
    $is_hospital_retrospective = ($prefix === 'hospital' && $section_key === 'hospital-retrospective');
    $grid_class = $is_hospital_retrospective
        ? 'rx-hospital-retrospective-grid'
        : ($has_two_cols ? "rx-{$prefix}-areas-grid" : "rx-{$prefix}-symptoms-grid");
    $section_classes = "rx-{$prefix}-band";
    if ($has_two_cols || $is_hospital_retrospective) {
        $section_classes .= " rx-{$prefix}-soft";
    }
    ?>
    <section class="<?php echo esc_attr($section_classes); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap <?php echo esc_attr($grid_class); ?>">
            <figure class="rx-<?php echo esc_attr($prefix); ?>-media">
                <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt=""><?php endif; ?>
            </figure>
            <div>
                <?php if ($heading) : ?><h3><?php echo esc_html($heading); ?></h3><?php endif; ?>
                <?php if ($has_two_cols) : ?>
                <div class="rx-<?php echo esc_attr($prefix); ?>-areas-columns">
                    <ul class="rx-<?php echo esc_attr($prefix); ?>-arrow-list">
                        <?php foreach ($list as $li) : ?><li><?php echo esc_html($li); ?></li><?php endforeach; ?>
                    </ul>
                    <ul class="rx-<?php echo esc_attr($prefix); ?>-arrow-list">
                        <?php foreach ($list_col2 as $li) : ?><li><?php echo esc_html($li); ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <?php else : ?>
                <ul class="rx-<?php echo esc_attr($prefix); ?>-arrow-list">
                    <?php foreach ($list as $li) : ?><li><?php echo esc_html($li); ?></li><?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if (!empty($related)) : ?>
                <p class="rx-<?php echo esc_attr($prefix); ?>-related">
                    <?php if ($related_label) : ?><strong><?php echo esc_html($related_label); ?></strong><?php endif; ?>
                    <?php foreach ($related as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['label']); ?> <span aria-hidden="true">&#8594;</span></a>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solutions_process($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $wrapper_class = "rx-{$prefix}-band" . ($prefix === 'civil' ? ' rx-civil-soft' : ($prefix === 'undermining' ? ' rx-undermining-soft' : ''));
    ?>
    <section class="<?php echo esc_attr($wrapper_class); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-<?php echo esc_attr($prefix); ?>-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-<?php echo esc_attr($prefix); ?>-process-grid">
                <?php foreach ($items as $item) :
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $point_lines = rectify_pb_split_lines(isset($item['points_text']) ? $item['points_text'] : '');
                    $titled_points = array();
                    $flat_points = array();
                    foreach ($point_lines as $line) {
                        if (strpos($line, '|||') !== false) {
                            $parts = explode('|||', $line, 2);
                            $titled_points[] = array('title' => trim($parts[0]), 'copy' => trim($parts[1]));
                        } else {
                            $flat_points[] = $line;
                        }
                    }
                    ?>
                    <article class="rx-<?php echo esc_attr($prefix); ?>-process-step">
                        <span class="rx-<?php echo esc_attr($prefix); ?>-process-circle"><?php echo esc_html($number); ?></span>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        <?php if (!empty($titled_points)) : ?>
                        <div class="rx-<?php echo esc_attr($prefix); ?>-process-points">
                            <?php foreach ($titled_points as $point) : ?>
                            <div class="rx-<?php echo esc_attr($prefix); ?>-process-point">
                                <h4><?php echo esc_html($point['title']); ?></h4>
                                <p><?php echo esc_html($point['copy']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php elseif (!empty($flat_points)) : ?>
                        <ul class="rx-<?php echo esc_attr($prefix); ?>-process-points">
                            <?php foreach ($flat_points as $point) : ?>
                            <li><?php echo esc_html($point); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_civil_capabilities($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-civil-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-civil-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
        </div>
        <div class="rx-civil-capabilities">
            <?php foreach ($items as $item) :
                $number = isset($item['number']) ? $item['number'] : '';
                $title = isset($item['title']) ? $item['title'] : '';
                $symptoms_label = isset($item['symptoms_label']) ? $item['symptoms_label'] : '';
                $symptoms = isset($item['symptoms']) ? $item['symptoms'] : '';
                $steps = rectify_pb_split_lines(isset($item['steps_text']) ? $item['steps_text'] : '');
                $tags_label = isset($item['tags_label']) ? $item['tags_label'] : '';
                $tags = rectify_pb_split_lines(isset($item['tags_text']) ? $item['tags_text'] : '');
                $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                $side_tags = in_array((string) $number, array('3', '4'), true);
                ?>
                <article class="rx-civil-cap-row<?php echo $side_tags ? ' rx-civil-cap-side-tags' : ''; ?>">
                    <div class="rx-wrap rx-civil-cap-grid">
                        <div class="rx-civil-cap-body">
                            <div class="rx-civil-cap-head">
                                <span class="rx-civil-cap-number"><?php echo esc_html($number); ?></span>
                                <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            </div>
                            <?php if ($symptoms) : ?>
                            <p class="rx-civil-cap-symptoms"><?php if ($symptoms_label) : ?><strong><?php echo esc_html($symptoms_label); ?></strong> <?php endif; ?><?php echo esc_html($symptoms); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($steps)) : ?>
                            <h4 class="rx-civil-cap-subhead">What We Do</h4>
                            <div class="rx-civil-cap-steps">
                                <?php foreach ($steps as $index => $step) : ?>
                                    <?php if ($index > 0) : ?><span class="rx-civil-cap-arrow" aria-hidden="true">&#8594;</span><?php endif; ?>
                                    <div class="rx-civil-cap-step"><?php echo esc_html($step); ?></div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($tags)) : ?>
                            <p class="rx-civil-cap-tags">
                                <?php if ($tags_label) : ?><strong><?php echo esc_html($tags_label); ?></strong> <?php endif; ?>
                                <?php echo esc_html(implode(' → ', $tags)); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php if ($image) : ?>
                        <figure class="rx-civil-cap-media">
                            <img src="<?php echo esc_url($image); ?>" alt="">
                        </figure>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

/**
 * Render the Figma-authored civil capability rows.
 *
 * The summary, media, treatment steps and optional outcome list occupy
 * separate grid areas at desktop widths. Keeping those areas explicit lets
 * the editable builder data match the source composition without hardcoding
 * page copy into the renderer.
 */
function rectify_pb_render_civil_capabilities_figma($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-civil-band rx-civil-core" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-civil-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
        </div>
        <div class="rx-civil-capabilities">
            <?php foreach ($items as $item) :
                $number = isset($item['number']) ? $item['number'] : '';
                $title = isset($item['title']) ? $item['title'] : '';
                $symptoms_label = isset($item['symptoms_label']) ? $item['symptoms_label'] : '';
                $symptoms = isset($item['symptoms']) ? $item['symptoms'] : '';
                $steps = rectify_pb_split_lines(isset($item['steps_text']) ? $item['steps_text'] : '');
                $tags_label = isset($item['tags_label']) ? $item['tags_label'] : '';
                $tags = rectify_pb_split_lines(isset($item['tags_text']) ? $item['tags_text'] : '');
                $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                $side_tags = in_array((string) $number, array('3', '4'), true);
                ?>
                <article class="rx-civil-cap-row<?php echo $side_tags ? ' rx-civil-cap-side-tags' : ''; ?>">
                    <div class="rx-wrap rx-civil-cap-grid">
                        <span class="rx-civil-cap-number"><?php echo esc_html($number); ?></span>

                        <div class="rx-civil-cap-summary">
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($symptoms) : ?>
                                <p class="rx-civil-cap-symptoms"><?php if ($symptoms_label) : ?><strong><?php echo esc_html($symptoms_label); ?></strong> <?php endif; ?><?php echo esc_html($symptoms); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if ($image) : ?>
                            <figure class="rx-civil-cap-media">
                                <img src="<?php echo esc_url($image); ?>" alt="">
                            </figure>
                        <?php endif; ?>

                        <div class="rx-civil-cap-detail">
                            <?php if (!empty($steps)) : ?>
                                <div class="rx-civil-cap-work">
                                    <h4 class="rx-civil-cap-subhead">What We Do</h4>
                                    <div class="rx-civil-cap-steps">
                                        <?php foreach ($steps as $index => $step) : ?>
                                            <?php if ($index > 0) : ?><span class="rx-civil-cap-arrow" aria-hidden="true">&#8594;</span><?php endif; ?>
                                            <div class="rx-civil-cap-step"><?php echo esc_html($step); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($tags)) : ?>
                                <div class="rx-civil-cap-tags">
                                    <?php if ($tags_label) : ?><strong><?php echo esc_html($tags_label); ?></strong><?php endif; ?>
                                    <div class="rx-civil-cap-tag-list">
                                        <?php foreach ($tags as $tag) : ?><span><?php echo esc_html($tag); ?></span><?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solutions_benefits($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $image_value = isset($fields['image']) ? $fields['image'] : 0;
    $image = $prefix === 'civil'
        ? rectify_pb_commercial_inner_image_url($image_value, 'large')
        : rectify_pb_image_url($image_value, 'large');
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $heading_outside = ($prefix === 'civil');
    // 'solutions-benefits' + prefix 'residential' is a new combination (the
    // residential-solutions hub page never used this block type) - styled as
    // a navy/contour band (like the "why choose" sections) rather than the
    // plain white band civil/hospital/undermining use, per the Ground
    // Improvement page design.
    $is_dark = ($prefix === 'residential');
    $dark_style = '';
    if ($is_dark) {
        $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
        $dark_style = ' style="' . esc_attr('--rx-residential-contours:url(' . $contours_url . ');') . '"';
    }
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-band<?php echo $prefix === 'hospital' ? ' rx-hospital-soft' : ''; ?><?php echo $is_dark ? ' rx-residential-benefits-band' : ''; ?>"<?php echo $dark_style; ?> data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading_outside && $heading) : ?><h2 class="rx-civil-section-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-<?php echo esc_attr($prefix); ?>-benefits-grid">
                <?php if ($image) : ?>
                <figure class="rx-<?php echo esc_attr($prefix); ?>-media">
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </figure>
                <?php endif; ?>
                <div>
                    <?php if (!$heading_outside && $heading) : ?><h2 class="rx-<?php echo esc_attr($prefix); ?>-benefits-title"><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <div class="rx-<?php echo esc_attr($prefix); ?>-benefit-list">
                        <?php foreach ($items as $item) :
                            $title = isset($item['title']) ? $item['title'] : '';
                            $description = isset($item['description']) ? $item['description'] : '';
                            ?>
                            <article class="rx-<?php echo esc_attr($prefix); ?>-benefit-item">
                                <span class="rx-<?php echo esc_attr($prefix); ?>-check" aria-hidden="true"></span>
                                <div>
                                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Solution Page" block renderers (rx-driveway-* markup, shared verbatim by
 * Driveway Re-Levelling, Basement Construction Support, Sand Permeation, and
 * any future residential child page that reuses this component family).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_solution_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'RESIDENTIAL SOLUTIONS';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : 'Residential Solutions';
    $breadcrumb_url = (isset($fields['breadcrumb_url']) && $fields['breadcrumb_url'] !== '') ? $fields['breadcrumb_url'] : home_url('/residential/');
    ?>
    <section class="rx-driveway-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <?php if ($image) : ?>
        <div class="rx-driveway-wrap rx-driveway-two-col">
            <div class="rx-driveway-copy">
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <nav class="rx-driveway-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">&gt;</span>
                    <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                    <span aria-hidden="true">&gt;</span>
                    <span><?php echo esc_html($title); ?></span>
                </nav>
                <?php if ($intro) : ?><?php echo wp_kses_post(wpautop($intro)); ?><?php endif; ?>
            </div>
            <figure class="rx-driveway-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
        </div>
        <?php else : ?>
        <div class="rx-driveway-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-driveway-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($title); ?></span>
            </nav>
            <?php if ($intro) : ?><?php echo wp_kses_post(wpautop($intro)); ?><?php endif; ?>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_solution_band($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $full_width = (isset($fields['full_width']) && $fields['full_width'] === 'yes');
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $richtext = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $list_lines = rectify_pb_split_lines(isset($fields['body_list']) ? $fields['body_list'] : '');
    $benefits_label = isset($fields['benefits_label']) ? $fields['benefits_label'] : '';
    $benefits = isset($fields['body_benefits']) && is_array($fields['body_benefits']) ? $fields['body_benefits'] : array();
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_grid = isset($fields['image_grid']) && is_array($fields['image_grid']) ? $fields['image_grid'] : array();
    $media_first = (isset($fields['media_position']) && $fields['media_position'] === 'first');
    $soft = (isset($fields['soft']) && $fields['soft'] === 'yes');
    $cta_text = isset($fields['cta_text']) ? $fields['cta_text'] : '';
    $cta_url = isset($fields['cta_url']) ? $fields['cta_url'] : '';
    $related_label = isset($fields['related_label']) && $fields['related_label'] !== '' ? $fields['related_label'] : 'Related Service:';
    $related_links = isset($fields['related_links']) && is_array($fields['related_links']) ? $fields['related_links'] : array();

    $section_class = 'rx-driveway-band' . ($soft ? ' rx-driveway-soft' : '');
    $wrap_class = $full_width
        ? 'rx-driveway-wrap'
        : 'rx-driveway-wrap rx-driveway-two-col' . ($media_first ? ' rx-driveway-media-first' : '');

    $render_media = function () use ($image, $image_grid) {
        if (!empty($image_grid)) {
            ?>
            <div class="rx-driveway-benefit-grid">
                <?php foreach ($image_grid as $item) :
                    $item_image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $caption = isset($item['caption']) ? $item['caption'] : '';

                    if (!$item_image) {
                        continue;
                    }
                    ?>
                <figure class="rx-driveway-media">
                    <img src="<?php echo esc_url($item_image); ?>" alt="">
                    <?php if ($caption) : ?><figcaption><?php echo esc_html($caption); ?></figcaption><?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
            <?php
        } elseif ($image) {
            ?>
            <figure class="rx-driveway-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php
        }
    };

    $render_content = function () use ($heading, $richtext, $list_lines, $benefits_label, $benefits, $cta_text, $cta_url, $related_label, $related_links) {
        if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif;
        if (!empty($benefits)) : ?>
        <?php if ($benefits_label) : ?><p class="rx-driveway-benefits-label"><?php echo esc_html($benefits_label); ?></p><?php endif; ?>
        <div class="rx-driveway-benefit-grid">
            <?php foreach ($benefits as $benefit) :
                $b_title = isset($benefit['title']) ? $benefit['title'] : '';
                $b_desc = isset($benefit['description']) ? $benefit['description'] : '';
                ?>
            <article class="rx-driveway-benefit">
                <span class="rx-driveway-check" aria-hidden="true"></span>
                <?php if ($b_title) : ?><h3><?php echo esc_html($b_title); ?></h3><?php endif; ?>
                <?php if ($b_desc) : ?><p><?php echo wp_kses_post($b_desc); ?></p><?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
        <?php else :
            if ($richtext) {
                echo wp_kses_post(wpautop($richtext));
            }
            if (!empty($list_lines)) : ?>
            <ul class="rx-driveway-arrow-list">
                <?php foreach ($list_lines as $line) : ?><li><?php echo esc_html($line); ?></li><?php endforeach; ?>
            </ul>
            <?php endif;
        endif;
        if ($cta_text) : ?>
        <p class="rx-driveway-related"><a class="rx-driveway-cta-primary" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a></p>
        <?php endif;
        if (!empty($related_links)) : ?>
        <p class="rx-driveway-related">
            <?php if ($related_label) : ?><strong><?php echo esc_html($related_label); ?></strong><?php endif; ?>
            <?php foreach ($related_links as $link) :
                $link_text = isset($link['text']) ? $link['text'] : '';
                $link_url = isset($link['url']) ? $link['url'] : '#';
                if (!$link_text) {
                    continue;
                }
                ?>
            <a href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?> <span aria-hidden="true">&#8594;</span></a>
            <?php endforeach; ?>
        </p>
        <?php endif;
    };
    ?>
    <section class="<?php echo esc_attr($section_class); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="<?php echo esc_attr($wrap_class); ?>">
            <?php if ($full_width) : ?>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php $render_content(); ?>
                <?php $render_media(); ?>
            <?php else : ?>
                <?php if ($media_first) : $render_media(); endif; ?>
                <div class="rx-driveway-copy">
                    <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                    <?php $render_content(); ?>
                </div>
                <?php if (!$media_first) : $render_media(); endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solution_photo_grid($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $soft = (isset($fields['soft']) && $fields['soft'] === 'yes');
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $section_class = 'rx-driveway-band' . ($soft ? ' rx-driveway-soft' : '');
    ?>
    <section class="<?php echo esc_attr($section_class); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-driveway-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><?php echo wp_kses_post(wpautop($lead)); ?><?php endif; ?>
            <div class="rx-driveway-benefit-grid">
                <?php foreach ($items as $item) :
                    $item_image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $caption = isset($item['caption']) ? $item['caption'] : '';

                    if (!$item_image) {
                        continue;
                    }
                    ?>
                <figure class="rx-driveway-media">
                    <img src="<?php echo esc_url($item_image); ?>" alt="">
                    <?php if ($caption) : ?><figcaption><?php echo esc_html($caption); ?></figcaption><?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solution_icon_grid($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $dark = (isset($fields['dark']) && $fields['dark'] === 'yes');
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_style = '';

    if ($dark) {
        $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
        $contours_style = ' style="' . esc_attr('--rx-driveway-contours:url(' . $contours_url . ');') . '"';
    }
    ?>
    <section class="<?php echo $dark ? 'rx-driveway-proof' : 'rx-driveway-band'; ?>"<?php echo $contours_style; ?> data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-driveway-wrap">
            <?php if (!$dark) : ?><div class="rx-driveway-benefit-copy"><?php endif; ?>
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-driveway-proof-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-driveway-proof-card">
                    <?php if ($icon) : ?><span class="rx-driveway-proof-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php if (!$dark) : ?></div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solution_process_steps($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $note = isset($fields['note']) ? $fields['note'] : '';
    $cta_text = isset($fields['cta_text']) ? $fields['cta_text'] : '';
    $cta_url = isset($fields['cta_url']) ? $fields['cta_url'] : '';
    ?>
    <section class="rx-driveway-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-driveway-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><?php echo wp_kses_post(wpautop($lead)); ?><?php endif; ?>
            <?php if ($image) : ?>
            <figure class="rx-driveway-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-driveway-step-grid">
                <?php foreach ($items as $item) :
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $related_label = (isset($item['related_label']) && $item['related_label'] !== '') ? $item['related_label'] : 'Related Service:';
                    $related_text = isset($item['related_text']) ? $item['related_text'] : '';
                    $related_url = isset($item['related_url']) ? $item['related_url'] : '';
                    ?>
                <article class="rx-driveway-step">
                    <?php if ($number) : ?><span class="rx-driveway-step-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    <?php if ($related_text) : ?>
                    <p class="rx-driveway-related rx-driveway-step-related">
                        <strong><?php echo esc_html($related_label); ?></strong>
                        <a href="<?php echo esc_url($related_url); ?>"><?php echo esc_html($related_text); ?> <span aria-hidden="true">&#8594;</span></a>
                    </p>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php if ($note) : ?><?php echo wp_kses_post(wpautop($note)); ?><?php endif; ?>
            <?php if ($cta_text) : ?>
            <p class="rx-driveway-related"><a class="rx-driveway-cta-primary" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a></p>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solution_notes($fields, $section_key)
{
    $col1_heading = isset($fields['col1_heading']) ? $fields['col1_heading'] : '';
    $col1_copy = rectify_pb_split_lines(isset($fields['col1_copy']) ? $fields['col1_copy'] : '');
    $col2_heading = isset($fields['col2_heading']) ? $fields['col2_heading'] : '';
    $col2_copy = rectify_pb_split_lines(isset($fields['col2_copy']) ? $fields['col2_copy'] : '');
    $small_notes = isset($fields['small_notes']) && is_array($fields['small_notes']) ? $fields['small_notes'] : array();
    ?>
    <section class="rx-driveway-band rx-driveway-notes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-driveway-wrap rx-driveway-notes-grid">
            <div>
                <?php if ($col1_heading) : ?><h2><?php echo esc_html($col1_heading); ?></h2><?php endif; ?>
                <?php foreach ($col1_copy as $para) : ?><p><?php echo esc_html($para); ?></p><?php endforeach; ?>
            </div>
            <div>
                <?php if ($col2_heading) : ?><h2><?php echo esc_html($col2_heading); ?></h2><?php endif; ?>
                <?php foreach ($col2_copy as $para) : ?><p><?php echo esc_html($para); ?></p><?php endforeach; ?>
                <?php if (!empty($small_notes)) : ?>
                <div class="rx-driveway-small-note-grid">
                    <?php foreach ($small_notes as $note) :
                        $note_heading = isset($note['heading']) ? $note['heading'] : '';
                        $note_copy = rectify_pb_split_lines(isset($note['copy']) ? $note['copy'] : '');
                        ?>
                    <div>
                        <?php if ($note_heading) : ?><h3><?php echo esc_html($note_heading); ?></h3><?php endif; ?>
                        <?php foreach ($note_copy as $para) : ?><p><?php echo esc_html($para); ?></p><?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solution_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-driveway-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-driveway-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
            <div class="rx-driveway-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-driveway-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-driveway-cta-outline" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-driveway-cta-outline" href="<?php echo esc_url($email_url); ?>"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * Figma-matched Commercial Inner Page renderers (rx-ci-* markup).
 * These blocks keep the page content editable while the presentation stays
 * isolated in assets/css/commercial-inner-pages.css.
 * ---------------------------------------------------------------------*/

function rectify_pb_commercial_inner_image_url($value, $size = 'large')
{
    if (is_numeric($value)) {
        return rectify_pb_image_url($value, $size);
    }

    $value = is_string($value) ? trim($value) : '';

    if ($value === '') {
        return '';
    }

    if (preg_match('#^https?://#i', $value)) {
        return $value;
    }

    if (function_exists('rx_asset_url')) {
        return rx_asset_url($value);
    }

    return trailingslashit(get_template_directory_uri()) . 'assets/' . ltrim($value, '/');
}

function rectify_pb_render_commercial_inner_banner($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = isset($fields['breadcrumb_label']) ? $fields['breadcrumb_label'] : 'Commercial Solutions';
    $breadcrumb_url = isset($fields['breadcrumb_url']) ? $fields['breadcrumb_url'] : home_url('/commercial-solutions/');
    $current_label = !empty($fields['current_label']) ? $fields['current_label'] : $title;
    $chevron = rectify_pb_commercial_inner_image_url('images/commercial-void-filling/breadcrumb-chevron.svg', 'full');
    ?>
    <section class="rx-ci-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <?php if ($kicker) : ?><span class="rx-ci-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-ci-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <img class="rx-ci-breadcrumb-icon" src="<?php echo esc_url($chevron); ?>" alt="" aria-hidden="true">
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <img class="rx-ci-breadcrumb-icon" src="<?php echo esc_url($chevron); ?>" alt="" aria-hidden="true">
                <span class="rx-ci-breadcrumb-current"><?php echo esc_html($current_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_inner_intro($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $modifier_class = strpos($section_key, 'leak-sealing') !== false ? ' rx-ci-leak-intro' : ' rx-ci-void-intro';
    ?>
    <section class="rx-ci-band rx-ci-intro<?php echo esc_attr($modifier_class); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col">
            <div class="rx-ci-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-ci-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-ci-media">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_void_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items_heading = isset($fields['items_heading']) ? $fields['items_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-void-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-void-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-void-section-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items_heading) : ?><h3 class="rx-ci-causes-items-heading"><?php echo esc_html($items_heading); ?></h3><?php endif; ?>
            <?php if ($items) : ?>
            <div class="rx-ci-void-causes-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-void-cause-card">
                    <?php if ($image) : ?><img class="rx-ci-void-cause-image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-void-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_void_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $options_heading = isset($fields['options_heading']) ? $fields['options_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $check = rectify_pb_commercial_inner_image_url('images/our-story/check-icon.svg', 'full');
    ?>
    <section class="rx-ci-band rx-ci-void-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-void-section-head rx-ci-void-process-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-void-section-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <div class="rx-ci-void-process-layout">
                <?php if ($image) : ?><figure class="rx-ci-media"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
                <div class="rx-ci-void-options">
                    <?php if ($options_heading) : ?><h3><?php echo esc_html($options_heading); ?></h3><?php endif; ?>
                    <?php foreach ($items as $item) :
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ci-void-option">
                        <img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true">
                        <div>
                            <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-ci-void-option-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_engineered_required($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-engineered-required" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-engineered-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-engineered-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?>
            <div class="rx-ci-engineered-required-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-engineered-required-card">
                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-engineered-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_engineered_comparison($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $check = rectify_pb_commercial_inner_image_url('images/our-story/check-icon.svg', 'full');
    ?>
    <section class="rx-ci-band rx-ci-engineered-comparison" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-engineered-section-head rx-ci-engineered-comparison-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-engineered-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <div class="rx-ci-engineered-comparison-layout">
                <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
                <?php if ($items) : ?>
                <div class="rx-ci-engineered-benefits">
                    <?php foreach ($items as $item) :
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ci-engineered-benefit">
                        <img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true">
                        <div>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-ci-engineered-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_engineered_applications($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-engineered-applications" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <header class="rx-ci-engineered-applications-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-engineered-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </header>
            <?php if ($items) : ?>
            <div class="rx-ci-engineered-applications-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_commercial_inner_image_url(isset($item['icon']) ? $item['icon'] : 0, 'full');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-engineered-application-card">
                    <?php if ($icon) : ?><img src="<?php echo esc_url($icon); ?>" alt="" aria-hidden="true"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-engineered-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_engineered_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-engineered-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-engineered-process-layout">
            <div class="rx-ci-engineered-process-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-engineered-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                <?php if ($items) : ?>
                <div class="rx-ci-engineered-steps">
                    <?php foreach ($items as $item) :
                        $number = isset($item['number']) ? $item['number'] : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ci-engineered-step">
                        <?php if ($number) : ?><span><?php echo esc_html($number); ?></span><?php endif; ?>
                        <div>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-ci-engineered-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_leak_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-leak-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-leak-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-leak-section-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?>
            <div class="rx-ci-leak-causes-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-leak-cause-card">
                    <?php if ($image) : ?><img class="rx-ci-leak-cause-image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-leak-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_leak_types($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $list_heading = isset($fields['list_heading']) ? $fields['list_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $check = rectify_pb_commercial_inner_image_url('images/our-story/check-icon.svg', 'full');
    ?>
    <section class="rx-ci-band rx-ci-leak-types" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-leak-types-layout">
            <div class="rx-ci-leak-types-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-ci-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($list_heading) : ?><h3><?php echo esc_html($list_heading); ?></h3><?php endif; ?>
                <?php if ($items) : ?>
                <ul class="rx-ci-leak-types-list">
                    <?php foreach ($items as $item) : ?>
                    <li><img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true"><span><?php echo esc_html(isset($item['text']) ? $item['text'] : ''); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?><figure class="rx-ci-media"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_leak_scenarios($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-leak-scenarios" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-leak-scenarios-grid">
            <?php foreach ($items as $item) :
                $title = isset($item['title']) ? $item['title'] : '';
                $intro = isset($item['intro']) ? $item['intro'] : '';
                $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                $conventional_heading = isset($item['conventional_heading']) ? $item['conventional_heading'] : '';
                $conventional_copy = isset($item['conventional_copy']) ? $item['conventional_copy'] : '';
                $secondary_heading = isset($item['secondary_heading']) ? $item['secondary_heading'] : '';
                $secondary_copy = isset($item['secondary_copy']) ? $item['secondary_copy'] : '';
                $solution_heading = isset($item['solution_heading']) ? $item['solution_heading'] : '';
                $solution_copy = isset($item['solution_copy']) ? $item['solution_copy'] : '';
                ?>
            <article class="rx-ci-leak-scenario">
                <header>
                    <?php if ($title) : ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                    <?php if ($intro) : ?><div><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
                </header>
                <?php if ($image) : ?><img class="rx-ci-leak-scenario-image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                <div class="rx-ci-leak-methods">
                    <?php if ($conventional_heading) : ?><h3><?php echo esc_html($conventional_heading); ?></h3><?php endif; ?>
                    <?php if ($conventional_copy) : ?><div><?php echo wp_kses_post(wpautop($conventional_copy)); ?></div><?php endif; ?>
                    <?php if ($secondary_heading) : ?><h3><?php echo esc_html($secondary_heading); ?></h3><?php endif; ?>
                    <?php if ($secondary_copy) : ?><div><?php echo wp_kses_post(wpautop($secondary_copy)); ?></div><?php endif; ?>
                </div>
                <div class="rx-ci-leak-solution">
                    <?php if ($solution_heading) : ?><h3><?php echo esc_html($solution_heading); ?></h3><?php endif; ?>
                    <?php if ($solution_copy) : ?><div><?php echo wp_kses_post(wpautop($solution_copy)); ?></div><?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_leak_diagnostics($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $before_image = rectify_pb_commercial_inner_image_url(isset($fields['before_image']) ? $fields['before_image'] : 0, 'full');
    $before_label = isset($fields['before_label']) ? $fields['before_label'] : 'BEFORE';
    $after_image = rectify_pb_commercial_inner_image_url(isset($fields['after_image']) ? $fields['after_image'] : 0, 'full');
    $after_label = isset($fields['after_label']) ? $fields['after_label'] : 'AFTER';
    ?>
    <section class="rx-ci-band rx-ci-leak-diagnostics" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-leak-diagnostics-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <div class="rx-ci-leak-diagnostic-grid">
                <?php foreach (array(array($before_image, $before_label), array($after_image, $after_label)) as $diagnostic) :
                    if (!$diagnostic[0]) {
                        continue;
                    }
                    ?>
                <figure class="rx-ci-leak-diagnostic">
                    <div class="rx-ci-leak-diagnostic-crop rx-ci-leak-diagnostic-thermal"><img src="<?php echo esc_url($diagnostic[0]); ?>" alt=""></div>
                    <div class="rx-ci-leak-diagnostic-crop rx-ci-leak-diagnostic-visible"><img src="<?php echo esc_url($diagnostic[0]); ?>" alt=""></div>
                    <figcaption><?php echo esc_html($diagnostic[1]); ?></figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_realignment_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-realign-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-realign-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-realign-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?>
            <div class="rx-ci-realign-causes-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-realign-cause-card">
                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-realign-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_realignment_feature($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    ?>
    <section class="rx-ci-realign-feature" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-realign-feature-copy">
            <div>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-ci-realign-feature-body"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
        <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_commercial_realignment_impact($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $note_heading = isset($fields['note_heading']) ? $fields['note_heading'] : '';
    $note_body = isset($fields['note_body']) ? $fields['note_body'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-realign-impact" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-realign-impact-layout">
            <div class="rx-ci-realign-impact-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-realign-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                <div class="rx-ci-realign-impact-note">
                    <?php if ($note_heading) : ?><h3><?php echo esc_html($note_heading); ?></h3><?php endif; ?>
                    <?php if ($note_body) : ?><div><?php echo wp_kses_post(wpautop($note_body)); ?></div><?php endif; ?>
                </div>
            </div>
            <?php if ($items) : ?>
            <div class="rx-ci-realign-impact-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $caption = isset($item['caption']) ? $item['caption'] : '';
                    ?>
                <figure>
                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($caption) : ?><figcaption><?php echo esc_html($caption); ?></figcaption><?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_realignment_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $approach_heading = isset($fields['approach_heading']) ? $fields['approach_heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-realign-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-realign-process-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <div>
                    <?php if ($approach_heading) : ?><h3><?php echo esc_html($approach_heading); ?></h3><?php endif; ?>
                    <?php if ($lead) : ?><div class="rx-ci-realign-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                </div>
            </div>
            <div class="rx-ci-realign-process-layout">
                <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
                <?php if ($items) : ?>
                <div class="rx-ci-realign-steps">
                    <?php foreach ($items as $item) :
                        $number = isset($item['number']) ? $item['number'] : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ci-realign-step">
                        <?php if ($number) : ?><span><?php echo esc_html($number); ?></span><?php endif; ?>
                        <div>
                            <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                            <?php if ($description) : ?><div><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_realignment_industries($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $map_image = rectify_pb_commercial_inner_image_url(isset($fields['map_image']) ? $fields['map_image'] : 0, 'large');
    $map_image_alt = isset($fields['map_image_alt']) ? $fields['map_image_alt'] : '';
    $list_heading = isset($fields['list_heading']) ? $fields['list_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $check = rectify_pb_commercial_inner_image_url('images/our-story/check-icon.svg', 'full');
    ?>
    <section class="rx-ci-band rx-ci-realign-industries" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-realign-industries-layout">
            <div>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-realign-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
                <?php if ($map_image) : ?><figure class="rx-ci-realign-map"><img src="<?php echo esc_url($map_image); ?>" alt="<?php echo esc_attr($map_image_alt); ?>"></figure><?php endif; ?>
            </div>
            <div class="rx-ci-realign-industries-list">
                <?php if ($list_heading) : ?><h3><?php echo esc_html($list_heading); ?></h3><?php endif; ?>
                <?php if ($items) : ?><ul>
                    <?php foreach ($items as $item) :
                        $title = isset($item['title']) ? $item['title'] : '';
                        if (!$title) {
                            continue;
                        }
                        ?><li><img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true"><span><?php echo esc_html($title); ?></span></li><?php endforeach; ?>
                </ul><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_protective_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-pc-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-pc-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div class="rx-ci-pc-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?>
            <div class="rx-ci-pc-causes-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-pc-cause-card">
                    <?php if ($image) : ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-pc-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_protective_solutions($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $check = rectify_pb_commercial_inner_image_url('images/our-story/check-icon.svg', 'full');
    ?>
    <section class="rx-ci-band rx-ci-pc-solutions" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-pc-solutions-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?><div class="rx-ci-pc-solution-rows">
                <?php foreach ($items as $item) :
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $options_heading = isset($item['options_heading']) ? $item['options_heading'] : '';
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $image_alt = isset($item['image_alt']) ? $item['image_alt'] : '';
                    $image_position = isset($item['image_position']) && $item['image_position'] === 'first' ? 'first' : 'last';
                    $options = array(
                        array('title' => isset($item['option_1_title']) ? $item['option_1_title'] : '', 'copy' => isset($item['option_1_copy']) ? $item['option_1_copy'] : ''),
                        array('title' => isset($item['option_2_title']) ? $item['option_2_title'] : '', 'copy' => isset($item['option_2_copy']) ? $item['option_2_copy'] : ''),
                    );
                    ?>
                <article class="rx-ci-pc-solution-row rx-ci-pc-image-<?php echo esc_attr($image_position); ?>">
                    <div class="rx-ci-pc-solution-copy">
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-ci-pc-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        <?php if ($options_heading) : ?><h4><?php echo esc_html($options_heading); ?></h4><?php endif; ?>
                        <?php foreach ($options as $option) :
                            if (!$option['title'] && !$option['copy']) {
                                continue;
                            }
                            ?>
                        <div class="rx-ci-pc-option">
                            <img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true">
                            <div>
                                <?php if ($option['title']) : ?><h5><?php echo esc_html($option['title']); ?></h5><?php endif; ?>
                                <?php if ($option['copy']) : ?><div><?php echo wp_kses_post(wpautop($option['copy'])); ?></div><?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_protective_feature($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    ?>
    <section class="rx-ci-pc-feature" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-pc-feature-copy">
            <div>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
        <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>"></figure><?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_commercial_protective_repairs($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-pc-repairs" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-pc-repairs-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><div><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            </div>
            <?php if ($items) : ?><div class="rx-ci-pc-repair-grid">
                <?php foreach ($items as $item) :
                    $title = isset($item['title']) ? $item['title'] : '';
                    $repair_items = array(
                        array('title' => isset($item['item_1_title']) ? $item['item_1_title'] : '', 'copy' => isset($item['item_1_copy']) ? $item['item_1_copy'] : ''),
                        array('title' => isset($item['item_2_title']) ? $item['item_2_title'] : '', 'copy' => isset($item['item_2_copy']) ? $item['item_2_copy'] : ''),
                    );
                    ?>
                <article class="rx-ci-pc-repair-card">
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php foreach ($repair_items as $repair_item) :
                        if (!$repair_item['title'] && !$repair_item['copy']) {
                            continue;
                        }
                        ?><div class="rx-ci-pc-repair-item">
                            <?php if ($repair_item['title']) : ?><h4><?php echo esc_html($repair_item['title']); ?></h4><?php endif; ?>
                            <?php if ($repair_item['copy']) : ?><div><?php echo wp_kses_post(wpautop($repair_item['copy'])); ?></div><?php endif; ?>
                        </div><?php endforeach; ?>
                </article>
                <?php endforeach; ?>
            </div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_inner_why_cards($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $icons = array(
        rectify_pb_theme_asset_url('images/commercial/why-choose-worker.svg'),
        rectify_pb_theme_asset_url('images/commercial/why-choose-expert.svg'),
        rectify_pb_theme_asset_url('images/commercial/why-choose-non-invasive.svg'),
        rectify_pb_theme_asset_url('images/commercial/why-choose-long-term.png'),
    );
    ?>
    <section class="rx-ci-why-choose rx-ci-void-why rx-commercial-why-choose" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($items) : ?>
            <div class="rx-ci-void-why-grid">
                <?php foreach ($items as $index => $item) :
                    $image = isset($icons[$index]) ? $icons[$index] : rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-why-choose-card">
                    <?php if ($image) : ?><img class="rx-ci-why-choose-icon" src="<?php echo esc_url($image); ?>" alt=""><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><div class="rx-ci-void-card-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_commercial_inner_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    $phone_icon = rectify_pb_commercial_inner_image_url('images/commercial-void-filling/cta-phone.svg', 'full');
    $mail_icon = rectify_pb_commercial_inner_image_url('images/commercial-void-filling/cta-mail.svg', 'full');
    ?>
    <section class="rx-ci-cta rx-ci-void-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-ci-void-cta-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            <div class="rx-ci-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-ci-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($phone_url); ?>"><img src="<?php echo esc_url($phone_icon); ?>" alt="" aria-hidden="true"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($email_url); ?>"><img src="<?php echo esc_url($mail_icon); ?>" alt="" aria-hidden="true"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Chemical Underpinning" page block renderers (rx-chemical-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_chemical_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'RESIDENTIAL SOLUTIONS';
    $title = isset($fields['title']) ? $fields['title'] : '';
    ?>
    <section class="rx-chemical-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-chemical-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&rsaquo;</span>
                <span><?php echo esc_html($title); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_what($fields, $section_key)
{
    $image_1 = rectify_pb_image_url(isset($fields['image_1']) ? $fields['image_1'] : 0, 'large');
    $image_2 = rectify_pb_image_url(isset($fields['image_2']) ? $fields['image_2'] : 0, 'large');
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $engineering_heading = isset($fields['engineering_heading']) ? $fields['engineering_heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $points_title = isset($fields['points_title']) ? $fields['points_title'] : '';
    $points = rectify_pb_split_lines(isset($fields['points_text']) ? $fields['points_text'] : '');
    $note = isset($fields['note']) ? $fields['note'] : '';
    ?>
    <section class="rx-chemical-what" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-chemical-what-grid">
            <div class="rx-chemical-what-left rx-reveal">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <div class="rx-chemical-what-images">
                <?php if ($image_1) : ?><figure><img src="<?php echo esc_url($image_1); ?>" alt=""></figure><?php endif; ?>
                <?php if ($image_2) : ?><figure><img src="<?php echo esc_url($image_2); ?>" alt=""></figure><?php endif; ?>
                </div>
            </div>
            <div class="rx-chemical-what-right rx-reveal">
                <?php if ($engineering_heading) : ?><h2><?php echo esc_html($engineering_heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><div class="rx-chemical-richtext"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
                <?php if (!empty($points)) : ?>
                <div class="rx-chemical-key-aspects">
                    <?php if ($points_title) : ?><h3><?php echo esc_html($points_title); ?></h3><?php endif; ?>
                    <ul><?php foreach ($points as $point) : ?><li><?php echo esc_html($point); ?></li><?php endforeach; ?></ul>
                </div>
                <?php endif; ?>
                <?php if ($note) : ?><p class="rx-chemical-engineering-note"><?php echo esc_html($note); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_engineering($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $points_title = isset($fields['points_title']) ? $fields['points_title'] : '';
    $points = rectify_pb_split_lines(isset($fields['points_text']) ? $fields['points_text'] : '');
    $note = isset($fields['note']) ? $fields['note'] : '';
    ?>
    <section class="rx-chemical-engineering" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-chemical-engineering-grid">
            <?php if ($image) : ?>
            <figure class="rx-chemical-engineering-image rx-reveal">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-reveal">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if (!empty($points)) : ?>
                <div class="rx-chemical-key-aspects">
                    <?php if ($points_title) : ?><h3><?php echo esc_html($points_title); ?></h3><?php endif; ?>
                    <ul>
                        <?php foreach ($points as $point) : ?><li><?php echo esc_html($point); ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if ($note) : ?><p class="rx-chemical-engineering-note"><?php echo esc_html($note); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_signs($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $note = isset($fields['note']) ? $fields['note'] : '';
    ?>
    <section class="rx-chemical-signs" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-chemical-signs-heading rx-reveal">
                <div>
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($intro) : ?><p class="rx-chemical-signs-intro"><?php echo esc_html($intro); ?></p><?php endif; ?>
                </div>
                <?php if ($note) : ?><p class="rx-chemical-signs-note"><?php echo esc_html($note); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-chemical-signs-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $title = isset($item['title']) ? $item['title'] : '';
                    ?>
                <article class="rx-chemical-sign-card">
                    <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt=""></figure><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_uses($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-chemical-uses" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-reveal"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><p class="rx-reveal"><?php echo esc_html($copy); ?></p><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-chemical-uses-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    ?>
                <div class="rx-chemical-use-row">
                    <?php if ($icon) : ?><span class="rx-chemical-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_why($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-chemical-why" style="<?php echo esc_attr('--rx-chemical-contours:url(' . $contours . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-reveal"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-chemical-why-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    if ($icon) {
                        $icon = str_replace('<img ', '<img class="rx-chemical-why-icon" ', $icon);
                    }
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-chemical-why-card">
                    <?php echo $icon; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $left_items = array_slice($items, 0, 2);
    $right_items = array_slice($items, 2);
    ?>
    <section class="rx-chemical-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-chemical-process-columns rx-stagger">
                <div class="rx-chemical-process-column rx-chemical-process-column-left">
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($copy) : ?><p><?php echo esc_html($copy); ?></p><?php endif; ?>
                    <?php rectify_pb_render_chemical_process_items($left_items); ?>
                </div>
                <div class="rx-chemical-process-column">
                    <?php rectify_pb_render_chemical_process_items($right_items); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_process_items($items)
{
    foreach ($items as $item) :
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-chemical-process-card">
                    <?php if ($number) : ?><span class="rx-chemical-process-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                    <div class="rx-chemical-process-copy">
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </div>
                </article>
    <?php endforeach;
}

function rectify_pb_render_chemical_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $item_image = static function ($item) {
        return rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
    };
    $render_item = static function ($item) {
        $title = isset($item['title']) ? $item['title'] : '';
        $description = isset($item['description']) ? $item['description'] : '';
        ?>
        <div class="rx-chemical-cause-item">
            <?php if ($title) : ?><h3><img src="<?php echo esc_url(rectify_pb_theme_asset_url('images/residential/chemical-underpinning/check.svg')); ?>" alt="" aria-hidden="true"><?php echo esc_html($title); ?></h3><?php endif; ?>
            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
        </div>
        <?php
    };
    ?>
    <section class="rx-chemical-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-chemical-causes-grid">
            <div class="rx-chemical-causes-column rx-reveal">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if (isset($items[0])) { $render_item($items[0]); } ?>
                <?php if (isset($items[1])) { $render_item($items[1]); } ?>
                <?php if (isset($items[1]) && $item_image($items[1])) : ?><figure><img src="<?php echo esc_url($item_image($items[1])); ?>" alt=""></figure><?php endif; ?>
                <?php if (isset($items[4]) && $item_image($items[4])) : ?><figure><img src="<?php echo esc_url($item_image($items[4])); ?>" alt=""></figure><?php endif; ?>
            </div>
            <div class="rx-chemical-causes-column rx-reveal">
                <?php if (isset($items[0]) && $item_image($items[0])) : ?><figure class="rx-chemical-causes-hero-image"><img src="<?php echo esc_url($item_image($items[0])); ?>" alt=""></figure><?php endif; ?>
                <?php if (isset($items[2])) { $render_item($items[2]); } ?>
                <?php if (isset($items[3])) { $render_item($items[3]); } ?>
                <?php if (isset($items[4])) { $render_item($items[4]); } ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_chemical_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-chemical-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-chemical-cta-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            <div class="rx-chemical-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-chemical-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-chemical-contact-link" href="<?php echo esc_url($phone_url); ?>"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('images/commercial-void-filling/cta-phone.svg')); ?>" alt="" aria-hidden="true"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-chemical-contact-link" href="<?php echo esc_url($email_url); ?>"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('images/commercial-void-filling/cta-mail.svg')); ?>" alt="" aria-hidden="true"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Sand Permeation Grouting & Non-Cohesive Soil Control" page block
 * renderers (rx-sand-* markup). The "Why Choose Rectify" section reuses
 * rectify_pb_render_chemical_why() directly since it's the same shared
 * navy/contour 4-card component (rx-ci-why-choose / rx-ci-void-why).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_sand_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'RESIDENTIAL SOLUTIONS';
    $title = isset($fields['title']) ? $fields['title'] : '';
    ?>
    <section class="rx-sand-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-sand-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&rsaquo;</span>
                <span><?php echo esc_html($title); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_intro($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $related_label = isset($fields['related_label']) ? $fields['related_label'] : '';
    $related_text = isset($fields['related_text']) ? $fields['related_text'] : '';
    $related_url = isset($fields['related_url']) ? $fields['related_url'] : '';
    ?>
    <section class="rx-sand-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-sand-intro-grid">
            <div class="rx-sand-intro-copy rx-reveal">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><div><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
                <?php if ($related_text) : ?>
                <p class="rx-sand-related">
                    <?php if ($related_label) : ?><strong><?php echo esc_html($related_label); ?></strong><?php endif; ?>
                    <a href="<?php echo esc_url($related_url); ?>">
                        <?php echo esc_html($related_text); ?>
                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2 9h13.5M9.5 3.5 15.5 9l-6 5.5" stroke="#BD1726" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </p>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-sand-intro-media rx-reveal">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_risk($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-sand-band rx-sand-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-reveal"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-sand-risk-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    if ($icon) {
                        $icon = str_replace('<img ', '<img class="rx-sand-risk-icon" ', $icon);
                    }
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-sand-risk-card">
                    <?php echo $icon; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_scenarios($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-sand-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-reveal"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-sand-scenarios-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    ?>
                <article class="rx-sand-scenario-card">
                    <?php echo $icon; ?>
                    <?php if ($title) : ?><p><?php echo esc_html($title); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
                <div class="rx-sand-scenario-decor" aria-hidden="true"></div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-sand-band rx-sand-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2 class="rx-reveal"><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-sand-process-grid rx-stagger">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-sand-process-card">
                    <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt=""></figure><?php endif; ?>
                    <div class="rx-sand-process-head">
                        <?php if ($number) : ?><span class="rx-sand-process-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    </div>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_benefits($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-sand-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-sand-benefits-grid">
            <?php if ($image) : ?>
            <figure class="rx-sand-benefits-media rx-reveal">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-sand-benefits-copy rx-reveal">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <div class="rx-sand-benefit-grid rx-stagger">
                    <?php foreach ($items as $item) :
                        $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-sand-benefit-item">
                        <?php echo $icon; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_notes($fields, $section_key)
{
    $col1_heading = isset($fields['col1_heading']) ? $fields['col1_heading'] : '';
    $col1_copy = isset($fields['col1_copy']) ? $fields['col1_copy'] : '';
    $col2_heading = isset($fields['col2_heading']) ? $fields['col2_heading'] : '';
    $col2_copy = isset($fields['col2_copy']) ? $fields['col2_copy'] : '';
    ?>
    <section class="rx-sand-band rx-sand-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-sand-notes-grid">
            <div class="rx-sand-notes-col rx-reveal">
                <?php if ($col1_heading) : ?><h2><?php echo esc_html($col1_heading); ?></h2><?php endif; ?>
                <?php if ($col1_copy) : ?><div><?php echo wp_kses_post(wpautop($col1_copy)); ?></div><?php endif; ?>
            </div>
            <div class="rx-sand-notes-col rx-reveal">
                <?php if ($col2_heading) : ?><h2><?php echo esc_html($col2_heading); ?></h2><?php endif; ?>
                <?php if ($col2_copy) : ?><div><?php echo wp_kses_post(wpautop($col2_copy)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_sand_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-sand-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-reveal">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-sand-cta-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
            <div class="rx-sand-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-sand-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-sand-cta-outline" href="<?php echo esc_url($phone_url); ?>"><span class="rx-sand-cta-icon rx-sand-cta-icon-phone" aria-hidden="true"></span><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-sand-cta-outline" href="<?php echo esc_url($email_url); ?>"><span class="rx-sand-cta-icon rx-sand-cta-icon-mail" aria-hidden="true"></span><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Mailbox / Brick Fence Re-Levelling" page block renderers (rx-brick-*
 * markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_brick_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'RESIDENTIAL SOLUTIONS';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $parent_label = (isset($fields['breadcrumb_parent_label']) && $fields['breadcrumb_parent_label'] !== '') ? $fields['breadcrumb_parent_label'] : 'Residential Solutions';
    $parent_url = isset($fields['breadcrumb_parent_url']) && $fields['breadcrumb_parent_url'] !== '' ? $fields['breadcrumb_parent_url'] : home_url('/residential/');
    $current = (isset($fields['breadcrumb_current']) && $fields['breadcrumb_current'] !== '') ? $fields['breadcrumb_current'] : $title;
    ?>
    <section class="rx-brick-hero-panel" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-brick-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'rectify-page-builder'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'rectify-page-builder'); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url($parent_url); ?>"><?php echo esc_html($parent_label); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($current); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_brick_band($fields, $section_key)
{
    $allowed_variants = array('intro', 'causes', 'benefits', 'issues', 'considerations');
    $variant = isset($fields['variant']) && in_array($fields['variant'], $allowed_variants, true) ? $fields['variant'] : 'intro';
    $label = isset($fields['label']) ? $fields['label'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $list_lines = rectify_pb_split_lines(isset($fields['list_text']) ? $fields['list_text'] : '');
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : '');
    $media_first = (isset($fields['media_position']) && $fields['media_position'] === 'first');
    $related_label = isset($fields['related_label']) && $fields['related_label'] !== '' ? $fields['related_label'] : 'Related Service:';
    $related_text = isset($fields['related_text']) ? $fields['related_text'] : '';
    $related_url = isset($fields['related_url']) ? $fields['related_url'] : '';
    $section_class = 'rx-brick-band rx-brick-' . $variant;
    $wrap_class = 'rx-wrap rx-brick-' . $variant . '-grid';
    $is_checklist = in_array($variant, array('causes', 'benefits'), true);
    ?>
    <section class="<?php echo esc_attr($section_class); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="<?php echo esc_attr($wrap_class); ?>">
            <?php if ($media_first && $image) : ?>
            <figure><img src="<?php echo esc_url($image); ?>" alt=""></figure>
            <?php endif; ?>
            <div>
                <?php if ($label) : ?><p class="rx-brick-label"><?php echo esc_html($label); ?></p><?php endif; ?>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($is_checklist && !empty($items)) : ?>
                <div class="rx-brick-checklist">
                    <?php foreach ($items as $item) :
                        $item_title = isset($item['title']) ? $item['title'] : '';
                        $item_desc = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <div class="rx-brick-check-item">
                        <img class="rx-brick-check-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/mailbox-brick-fence/icon-check.svg')); ?>" alt="">
                        <?php if ($item_title) : ?><h3><?php echo esc_html($item_title); ?></h3><?php endif; ?>
                        <?php if ($item_desc) : ?><p><?php echo wp_kses_post($item_desc); ?></p><?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php elseif (!empty($list_lines)) : ?>
                <ul class="rx-brick-issue-list">
                    <?php foreach ($list_lines as $line) : ?>
                    <li><img class="rx-brick-arrow-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/mailbox-brick-fence/icon-arrow-right.svg')); ?>" alt=""><span><?php echo esc_html($line); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php elseif ($copy) : ?>
                <div class="rx-brick-copy-block">
                    <?php
                    $paragraphs = array_filter(array_map('trim', explode("\n\n", (string) $copy)));
                    $count = count($paragraphs);
                    $i = 0;
                    foreach ($paragraphs as $paragraph) :
                        $i++;
                        ?>
                    <p><?php echo wp_kses_post($paragraph); ?></p>
                    <?php if ($variant === 'considerations' && $i < $count) : ?><hr class="rx-brick-divider"><?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($related_text) : ?>
                <p class="rx-brick-related"><strong><?php echo esc_html($related_label); ?></strong> <a href="<?php echo esc_url($related_url); ?>"><?php echo esc_html($related_text); ?> <img class="rx-brick-arrow-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/mailbox-brick-fence/icon-arrow-right.svg')); ?>" alt=""></a></p>
                <?php endif; ?>
            </div>
            <?php if (!$media_first && $image) : ?>
            <figure><img src="<?php echo esc_url($image); ?>" alt=""></figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_brick_grid($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $variant = isset($fields['variant']) && in_array($fields['variant'], array('causes', 'benefits', 'why'), true) ? $fields['variant'] : 'why';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $is_why = ($variant === 'why');
    $style = '';
    if ($is_why) {
        $style = ' style="' . esc_attr('--rx-brick-contour:url(' . esc_url_raw(rectify_pb_commercial_inner_image_url('images/home/Contour on Navy Blue.png')) . ')') . '"';
    }
    ?>
    <section class="rx-brick-band rx-brick-<?php echo esc_attr($variant); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>"<?php echo $style; // phpcs:ignore ?>>
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-brick-<?php echo esc_attr($variant); ?>-grid">
                <?php foreach ($items as $item) :
                    $icon = $is_why ? rectify_pb_commercial_inner_image_url(isset($item['icon']) ? $item['icon'] : '') : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-brick-<?php echo $variant === 'causes' ? 'cause' : ($variant === 'benefits' ? 'benefit' : 'why'); ?>-card">
                    <?php if ($is_why && $icon) : ?><span class="rx-brick-why-icon"><img src="<?php echo esc_url($icon); ?>" alt=""></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_brick_media_grid($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-brick-band rx-brick-where" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-brick-where-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : '');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-brick-where-card">
                    <?php if ($image) : ?><figure><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"></figure><?php endif; ?>
                    <div class="rx-brick-where-copy">
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_brick_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-brick-band rx-brick-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-brick-process-grid">
                <?php foreach ($items as $item) :
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $step_related_label = isset($item['related_label']) && $item['related_label'] !== '' ? $item['related_label'] : 'Related Service:';
                    $step_related_text = isset($item['related_text']) ? $item['related_text'] : '';
                    $step_related_url = isset($item['related_url']) ? $item['related_url'] : '';
                    ?>
                <article class="rx-brick-process-step">
                    <span><?php echo esc_html($number); ?></span>
                    <div>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        <?php if ($step_related_text) : ?>
                        <p class="rx-brick-related"><strong><?php echo esc_html($step_related_label); ?></strong> <a href="<?php echo esc_url($step_related_url); ?>"><?php echo esc_html($step_related_text); ?> <img class="rx-brick-arrow-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/mailbox-brick-fence/icon-arrow-right.svg')); ?>" alt=""></a></p>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_brick_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $primary_text = isset($fields['primary_text']) ? $fields['primary_text'] : '';
    $primary_url = isset($fields['primary_url']) ? $fields['primary_url'] : '';
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section id="ready-to-relevel" class="rx-brick-band rx-brick-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-brick-cta-grid">
            <div class="rx-brick-cta-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
            </div>
            <div class="rx-brick-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-btn rx-btn-white" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-btn rx-btn-ghost" href="<?php echo esc_url($phone_url); ?>"><img class="rx-brick-cta-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/commercial-void-filling/cta-phone.svg', 'full')); ?>" alt="" aria-hidden="true"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-btn rx-btn-ghost" href="<?php echo esc_url($email_url); ?>"><img class="rx-brick-cta-icon" src="<?php echo esc_url(rectify_pb_commercial_inner_image_url('images/commercial-void-filling/cta-mail.svg', 'full')); ?>" alt="" aria-hidden="true"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_solutions_notes($fields, $section_key)
{
    $prefix = rectify_pb_solutions_page_prefix($section_key);
    $col1_heading = isset($fields['col1_heading']) ? $fields['col1_heading'] : '';
    $col1_copy = isset($fields['col1_copy']) ? $fields['col1_copy'] : '';
    $col2_heading = isset($fields['col2_heading']) ? $fields['col2_heading'] : '';
    $col2_copy = isset($fields['col2_copy']) ? $fields['col2_copy'] : '';
    $finish_heading = isset($fields['finish_heading']) ? $fields['finish_heading'] : '';
    $finish_copy = isset($fields['finish_copy']) ? $fields['finish_copy'] : '';
    $finish_copy_col2 = isset($fields['finish_copy_col2']) ? $fields['finish_copy_col2'] : '';
    ?>
    <section class="rx-<?php echo esc_attr($prefix); ?>-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-<?php echo esc_attr($prefix); ?>-notes-grid">
            <div>
                <?php if ($col1_heading) : ?><h3><?php echo esc_html($col1_heading); ?></h3><?php endif; ?>
                <?php echo wp_kses_post(wpautop($col1_copy)); ?>
            </div>
            <div>
                <?php if ($col2_heading) : ?><h3><?php echo esc_html($col2_heading); ?></h3><?php endif; ?>
                <?php echo wp_kses_post(wpautop($col2_copy)); ?>
                <?php if ($finish_heading || $finish_copy || $finish_copy_col2) : ?>
                <div class="rx-<?php echo esc_attr($prefix); ?>-finish-matters">
                    <?php if ($finish_heading) : ?><h4><?php echo esc_html($finish_heading); ?></h4><?php endif; ?>
                    <div class="rx-<?php echo esc_attr($prefix); ?>-finish-copy-grid">
                        <?php if ($finish_copy) : ?><p><?php echo wp_kses_post($finish_copy); ?></p><?php endif; ?>
                        <?php if ($finish_copy_col2) : ?><p><?php echo wp_kses_post($finish_copy_col2); ?></p><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Cracked-style" block renderers (rx-cracked-* markup), shared by the
 * cracked-walls, foundation-repair, weak-soils, open-uneven-control-joints,
 * leaning-pillars, leaning-house-wall, jammed-doors-windows and
 * sloping-slab pages, which all share one hardcoded design system.
 * ---------------------------------------------------------------------*/

function rectify_pb_render_cracked_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'WHAT WE RECTIFY';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="rx-cracked-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-cracked-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

/**
 * Theme-asset fallback image (relative to the assets dir) used per
 * cracked-band section_key when no image has been uploaded via the
 * builder's Media Library field yet, so the page still looks complete
 * out of the box.
 *
 * @return array section_key => relative asset path
 */
function rectify_pb_cracked_band_fallback_images()
{
    return array(
        'residential-cracked-intro' => 'images/home/horizontal-crack.webp',
        'residential-cracked-matters' => 'images/home/Wall-with-prop7.jpg',
        'residential-foundation-intro' => 'images/home/Wall-with-prop7.jpg',
        'residential-foundation-matters' => 'images/guide-worker.jpg',
        'residential-soil-intro' => 'images/home/IMG_0867-1.jpg',
        'residential-soil-matters' => 'images/home/Wall-with-prop7.jpg',
        'residential-joints-intro' => 'images/home/control-joint.webp',
        'residential-joints-matters' => 'images/guide-worker.jpg',
        'residential-pillars-intro' => 'images/leaning-pillars/hero-intro.jpg',
        'residential-pillars-matters' => 'images/leaning-pillars/why-identifying-cause-matters.jpg',
        'residential-wall-intro' => 'images/home/Wall-with-prop7.jpg',
        'residential-wall-matters' => 'images/guide-worker.jpg',
        'residential-doors-intro' => 'images/jammed-doors-windows/hero-intro.jpg',
        'residential-doors-matters' => 'images/jammed-doors-windows/when-should-you-be-concerned.jpg',
        'residential-slab-intro' => 'images/sloping-slab/intro-tiles.webp',
        'residential-slab-matters' => 'images/sloping-slab/ground-essential.webp',
    );
}

function rectify_pb_render_cracked_band($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $fallback_map = rectify_pb_cracked_band_fallback_images();
        $image = isset($fallback_map[$section_key]) ? rectify_pb_theme_asset_url($fallback_map[$section_key]) : '';
    }

    $media_first = (isset($fields['media_position']) && $fields['media_position'] === 'first');
    $show_pin = (isset($fields['pin']) && $fields['pin'] === 'yes');
    $soft = (isset($fields['soft']) && $fields['soft'] === 'yes');
    // "flip" swaps the two columns visually (via CSS order) while keeping the
    // copy style tied to media_position, so e.g. an intro-styled band (small
    // red heading) can still show its image on the left.
    $flip = (isset($fields['flip']) && $fields['flip'] === 'yes');
    ?>
    <section class="rx-cracked-band<?php echo $soft ? ' rx-cracked-soft' : ''; ?><?php echo $flip ? ' rx-cracked-band--flip' : ''; ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap <?php echo $media_first ? 'rx-cracked-matters-grid' : 'rx-cracked-intro-grid'; ?>">
            <?php if ($media_first && $image) : ?>
            <figure class="rx-cracked-matters-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="<?php echo $media_first ? 'rx-cracked-matters-copy' : 'rx-cracked-intro-copy'; ?>">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php if (!$media_first && $image) : ?>
            <figure class="rx-cracked-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
                <?php if ($show_pin) : ?><span class="rx-cracked-pin" aria-hidden="true"></span><?php endif; ?>
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cracked_whatis($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-cracked-whatis" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cracked-whatis-grid">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($subheading || $body) : ?>
            <div class="rx-cracked-whatis-copy">
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cracked_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    // Photo-based cards (new Figma design) sit on a plain white band; the
    // legacy icon cards keep the soft grey band + card shadow treatment.
    $has_photos = false;

    foreach ($items as $item) {
        if (!empty($item['image'])) {
            $has_photos = true;
            break;
        }
    }
    ?>
    <section class="rx-cracked-band rx-cracked-causes<?php echo $has_photos ? ' rx-cracked-causes--photo' : ' rx-cracked-soft'; ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-cracked-causes-grid">
                <?php foreach ($items as $item) :
                    $photo = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $icon = (!$photo && isset($item['icon'])) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-cracked-cause-card<?php echo $photo ? ' rx-cracked-cause-card--photo' : ''; ?>">
                    <?php if ($photo) : ?>
                    <figure class="rx-cracked-cause-photo">
                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($title); ?>">
                    </figure>
                    <?php elseif ($icon) : ?>
                    <span class="rx-cracked-card-icon"><?php echo $icon; ?></span>
                    <?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><?php echo wp_kses_post(wpautop($description)); ?><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Numbered process-steps band (e.g. "How We Re-level Your House In 4 Simple
 * Steps"): a heading/lead two-column header followed by a two-column grid
 * where each column stacks its steps vertically (so 4 items read as
 * 01,02 down the left column then 03,04 down the right column).
 */
function rectify_pb_render_cracked_process($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $columns = array_chunk($items, (int) ceil(count($items) / 2) ?: 1);
    ?>
    <section class="rx-cracked-band rx-cracked-soft rx-cracked-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading || $lead) : ?>
            <div class="rx-cracked-process-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="rx-cracked-process-grid">
                <?php foreach ($columns as $column) : ?>
                <div class="rx-cracked-process-col">
                    <?php foreach ($column as $item) :
                        $number = isset($item['number']) ? $item['number'] : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-cracked-process-step">
                        <?php if ($number) : ?><span class="rx-cracked-process-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                        <div>
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Two-column "solutions" band used on the Erosion Control & Sinkhole
 * Remediation page: left column is a heading/body/inline-image, right
 * column is a bullet list of solutions plus a secondary heading/body.
 */
function rectify_pb_render_cracked_solutions($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $list_heading = isset($fields['list_heading']) ? $fields['list_heading'] : '';
    $list_items = isset($fields['list_items']) && is_array($fields['list_items']) ? $fields['list_items'] : array();
    $extra_heading = isset($fields['extra_heading']) ? $fields['extra_heading'] : '';
    $extra_body = isset($fields['extra_body']) ? $fields['extra_body'] : '';
    ?>
    <section class="rx-cracked-band rx-cracked-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cracked-matters-grid">
            <div class="rx-cracked-matters-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
                <?php if ($image) : ?>
                <figure class="rx-cracked-intro-media" style="margin-top:24px;">
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </figure>
                <?php endif; ?>
            </div>
            <div class="rx-cracked-matters-copy">
                <?php if ($list_heading) : ?><h3 class="rx-cracked-solutions-subheading"><?php echo esc_html($list_heading); ?></h3><?php endif; ?>
                <?php if (!empty($list_items)) : ?>
                <ul class="rx-driveway-arrow-list">
                    <?php foreach ($list_items as $item) : ?><li><?php echo esc_html($item); ?></li><?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($extra_heading) : ?><h3 class="rx-cracked-solutions-subheading"><?php echo esc_html($extra_heading); ?></h3><?php endif; ?>
                <?php if ($extra_body) : ?><?php echo wp_kses_post(wpautop($extra_body)); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Return the icon used by the canonical residential homeowner-advantage
 * section. The final card uses the dedicated Environmentally Conscious
 * save-environment icon from the shared icon library.
 *
 * @param int $index Zero-based advantage-card index.
 * @return string
 */
function rectify_pb_homeowner_advantage_icon_markup($index)
{
    $icon_keys = array(
        'adv-home-experience',
        'adv-home-technology',
        'adv-home-delivery',
        'adv-home-affordable',
        'adv-home-quality',
        'adv-home-trustworthy',
    );

    return isset($icon_keys[$index])
        ? rectify_pb_icon_markup_as_img($icon_keys[$index])
        : '';
}

/**
 * Render the canonical homeowner-advantage component used by every active
 * page outside the residential templates that already share the reference
 * markup directly.
 *
 * @param array  $fields
 * @param string $section_key
 * @return void
 */
function rectify_pb_render_homeowner_advantage($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'OUR ADVANTAGE';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Homeowners Choose Rectify';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '')
        ? $fields['lead']
        : "At Rectify, we don't just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.";
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-homeowner-advantage" style="<?php echo esc_attr('--rx-homeowner-advantage-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-homeowner-advantage-wrap">
            <div class="rx-homeowner-advantage-head">
                <div>
                    <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                    <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                </div>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-homeowner-advantage-grid">
                <?php foreach ($items as $item_index => $item) :
                    $icon = rectify_pb_homeowner_advantage_icon_markup($item_index);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-homeowner-advantage-card">
                    <div class="rx-homeowner-advantage-card-head">
                        <?php if ($icon) : ?><span class="rx-homeowner-advantage-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    </div>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cracked_advantage($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'OUR ADVANTAGE';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Homeowners Choose Rectify';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-cracked-advantage" style="<?php echo esc_attr('--rx-cracked-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-cracked-advantage-head">
                <div>
                    <span class="rx-kicker"><?php echo esc_html($kicker); ?></span>
                    <h2><?php echo esc_html($heading); ?></h2>
                </div>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <div class="rx-cracked-advantage-grid">
                <?php foreach ($items as $item_index => $item) :
                    $icon = rectify_pb_homeowner_advantage_icon_markup($item_index);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-cracked-advantage-card">
                    <div class="rx-cracked-advantage-card-head">
                        <?php if ($icon) : ?><span class="rx-cracked-advantage-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    </div>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cracked_performance($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered. Rectified. Performance Verified.';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $before = rectify_pb_image_url(isset($fields['before_image']) ? $fields['before_image'] : 0, 'large');
    $after = rectify_pb_image_url(isset($fields['after_image']) ? $fields['after_image'] : 0, 'large');

    if (!$before) {
        $before = rectify_pb_theme_asset_url('images/home/before-after-1.png');
    }

    if (!$after) {
        $after = rectify_pb_theme_asset_url('images/home/before-after-2.png');
    }
    ?>
    <section class="rx-cracked-band rx-cracked-performance" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-cracked-compare">
                <figure class="rx-cracked-compare-image">
                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-before">BEFORE</span>
                    <img src="<?php echo esc_url($before); ?>" alt="Before structural remediation">
                </figure>
                <span class="rx-cracked-compare-divider" aria-hidden="true">
                    <span class="rx-cracked-compare-arrows">&#9664;&#9654;</span>
                </span>
                <figure class="rx-cracked-compare-image">
                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-after">AFTER</span>
                    <img src="<?php echo esc_url($after); ?>" alt="After structural remediation">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cracked_help($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $subtext = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $phone_text = '1800 18 20 20';
    $phone_url = 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    $arrow_icon = '<span class="rx-cracked-help-arrow" aria-hidden="true"><svg viewBox="0 0 36 17.4375" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.5875 7.72333C35.5871 7.72291 35.5868 7.72242 35.5863 7.722L28.2383 0.409495C27.6879 -0.138309 26.7975 -0.136271 26.2496 0.414276C25.7017 0.964753 25.7038 1.85512 26.2543 2.40299L31.1877 7.3125H1.40625C0.629578 7.3125 0 7.94207 0 8.71875C0 9.49542 0.629578 10.125 1.40625 10.125H31.1876L26.2543 15.0345C25.7039 15.5824 25.7018 16.4727 26.2496 17.0232C26.7976 17.5738 27.688 17.5757 28.2384 17.028L35.5864 9.71549C35.5868 9.71507 35.5871 9.71458 35.5876 9.71416C36.1384 9.16446 36.1366 8.27121 35.5875 7.72333Z" fill="#BD1726"/></svg></span>';
    ?>
    <section class="rx-cracked-help" style="<?php echo esc_attr('--rx-cracked-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-cracked-help-grid">
                <article class="rx-cracked-help-card">
                    <span class="rx-cracked-help-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <g clip-path="url(#clip0_986_5061)">
                                    <path d="M59.1029 59.9541L59.2787 61.4841L59.2197 63.8199L59.2464 67.9965C59.259 70.1171 57.6629 72.0001 55.4608 71.9986L6.49372 71.9776C4.80622 71.9776 3.10185 70.3435 3.09482 68.7488L3.05966 60.1932C3.03857 55.0393 6.73138 50.5168 11.5745 48.7871L18.6901 46.246C19.6787 45.2447 20.3959 44.4221 21.7754 43.8061V40.5183C19.9698 38.4511 18.7689 36.0619 18.1628 33.4238C15.0283 32.4015 14.0397 26.8327 15.8875 24.7022C16.2728 24.2579 16.7748 24.1496 17.4287 23.8191C16.412 23.393 15.4445 23.4211 14.5206 22.9486C13.8878 22.6238 13.2676 21.991 13.2592 21.2569L13.2311 18.4655C13.2198 17.394 14.0945 16.5347 15.2012 16.5263L15.2575 14.0794C15.9564 9.7974 18.4918 6.00193 22.1242 3.68021C23.1845 3.0024 24.2983 2.73521 25.4612 2.37802C25.8676 1.69458 26.1981 0.49646 27.2022 0.306616C29.6743 -0.157446 32.1606 0.00145991 34.6651 0.157554C36.1642 0.250366 37.2231 1.3388 37.1373 2.89834C38.8895 3.17677 40.397 3.84615 41.7653 4.88677C45.3751 7.63037 47.4423 11.9208 47.3467 16.5305C48.4872 16.6683 49.3478 17.4474 49.3267 18.5907L49.2887 20.6663C49.0398 22.0233 47.912 22.9318 46.6548 23.341C46.0937 23.5238 45.534 23.4465 44.9983 23.9077C46.1261 24.1721 46.8953 24.8836 47.1568 25.9608C47.8065 28.6397 46.9206 32.3902 44.1911 33.4632C43.5484 36.1576 42.3123 38.5383 40.5236 40.5886L40.5137 43.8666C41.7822 44.2674 42.6386 45.1997 43.4767 46.201C43.824 46.6158 45.6283 46.5202 45.4229 47.9096C45.3442 48.4454 44.7339 49.0458 44.1123 48.811C43.4233 48.5508 42.6315 48.3554 42.0086 47.949C41.5543 47.4061 41.1958 46.6355 40.4265 46.2221L34.3333 53.3363L32.1831 55.6144V69.8808L55.4509 69.8611C56.4564 69.8611 57.0934 68.9541 57.0892 68.0682L57.0568 60.9076C57.0484 59.1441 55.337 57.984 56.6251 57.0741C57.0723 56.7577 57.7951 56.8491 58.1481 57.4299C58.5967 58.1682 58.9975 59.0204 59.1043 59.9555L59.1029 59.9541ZM45.0756 21.458C45.8715 21.458 46.5873 21.1402 46.9586 20.641C47.3495 20.1151 47.2623 19.3458 47.0668 18.7763L43.3108 18.7383C42.7609 18.7327 42.3742 18.0605 42.4206 17.6218C42.4754 17.1071 42.834 16.6486 43.3979 16.6177L45.2247 16.5179C45.1825 11.9265 42.8593 7.67677 38.7798 5.6138C38.2679 5.35505 37.7645 5.1399 37.1317 5.15396L37.1078 14.5758C37.1078 15.1313 36.5411 15.4786 36.077 15.4674C35.634 15.4561 35.035 15.1468 35.035 14.5913L35.0223 3.01365C35.0223 2.0799 33.8692 2.23599 32.2647 2.13333C30.8218 2.04193 29.4268 2.15584 28.0122 2.33302C27.7858 2.36115 27.6029 2.65927 27.6029 2.88709L27.6086 14.3494C27.6086 14.9597 27.2162 15.3971 26.6608 15.466C26.2698 15.5152 25.5343 15.2382 25.5329 14.6911L25.4992 4.85162C25.045 4.70396 24.647 4.85162 24.2462 5.04849C21.3986 6.45052 19.2765 8.90162 18.1304 11.8632C17.5356 13.4002 17.1995 14.9429 17.3218 16.5966L19.2512 16.6332C19.7758 16.643 20.1118 17.2266 20.1048 17.6963C20.0978 18.1294 19.7406 18.7215 19.2343 18.7285L15.3756 18.7819L15.3151 20.3527C15.2786 21.3132 16.3768 21.4847 17.6397 21.4833L45.0756 21.458ZM37.0206 40.9908C39.715 38.7085 41.5206 35.8046 42.2139 32.3944C42.3489 31.7307 42.827 31.4115 43.4697 31.3355C43.9112 31.2835 44.2768 30.8518 44.5075 30.4665C45.4187 28.9505 45.3878 26.5543 44.8422 26.2041C44.6537 26.0832 44.2178 26.5697 43.4964 26.2885C43.2559 26.1943 42.9297 25.9271 42.9212 25.5629L42.8776 23.6715H19.5043L19.5367 25.1536C19.5465 25.5966 19.375 25.9833 19.06 26.2027C18.3484 26.6977 17.717 26.0213 17.4709 26.2126C16.7523 26.7736 17.0265 31.2132 19.2372 31.4213C19.6858 31.4635 20.0176 31.7954 20.1062 32.2524C20.8656 36.2208 23.1803 39.6844 26.6593 41.7868C28.2076 42.7219 29.9908 43.2001 31.7809 43.1283C33.7834 43.0482 35.4878 42.2888 37.0192 40.9908H37.0206ZM38.4423 45.2124L38.3509 42.6263C36.2345 44.0157 33.9578 44.6555 31.5109 44.8665L30.8092 44.8496C28.3187 44.7891 26.08 43.8751 23.9383 42.4871L23.9073 45.3263L29.3945 51.6952L31.1242 53.4319C33.7173 50.7713 36.0573 48.053 38.4437 45.2138L38.4423 45.2124ZM21.9414 54.9844L26.4203 51.6629L21.8612 46.1968C21.2889 46.6341 20.829 47.0729 20.4704 47.6565L21.9428 54.9844H21.9414ZM30.0133 69.8738L30.0076 55.5329L27.8223 53.3082L21.7501 57.8757C21.3536 58.0908 20.9415 58.0726 20.6012 57.8616C20.2848 57.6647 20.1765 57.3357 20.095 56.9208L18.475 48.638L13.1397 50.5449C11.8347 51.0118 10.6225 51.518 9.51154 52.3322C7.07732 54.0563 5.52482 56.6213 5.24638 59.6251L5.1831 67.891C5.17607 68.8022 5.60497 69.8583 6.73841 69.8597L30.0104 69.8738H30.0133Z" fill="#BD1726"/>
                                    <path d="M35.1452 62.8398C33.3648 61.2986 32.9261 58.8334 33.9836 56.7226C34.8766 54.9409 36.0902 53.4362 37.2053 51.7825C38.3345 50.1076 40.1978 49.3314 42.2031 49.8672C43.7064 50.2694 44.8075 51.5659 45.5444 50.4747C47.6917 47.2994 49.6914 44.0453 51.5434 40.6815C52.5152 38.9153 50.1934 38.6284 48.6578 36.782C47.3936 35.2633 47.3697 33.1483 48.2711 31.3947C49.1725 29.6411 50.2159 27.8861 51.3648 26.1958C51.7994 25.5559 52.5208 25.127 53.1564 24.7403C54.4178 23.9725 55.8522 23.8642 57.2359 24.3719C57.9812 24.6461 58.7055 24.9273 59.41 25.3759C61.4983 26.7105 63.1 28.8226 63.7427 31.254C64.4458 33.9147 64.0858 36.6034 63.1141 39.1361C61.0792 44.439 56.8436 51.1722 53.5459 55.9295L49.3145 61.4195C48.4848 62.4953 47.5314 63.37 46.4303 64.1603C42.7909 66.7717 38.4062 65.6594 35.148 62.8398H35.1452ZM35.8525 57.7436C35.2773 58.7519 35.4053 60.0203 36.1436 60.7726C37.9914 62.657 40.9023 64.0787 43.4772 63.2364C44.7569 62.8187 45.7848 62.0073 46.7102 61.044C48.3062 59.3819 49.6787 57.6381 51.0302 55.7439C54.498 50.8811 58.9094 43.9047 61.0384 38.4301C63.0592 33.2326 61.653 29.0969 56.9336 26.2605C55.5611 25.4364 54.0325 25.795 53.2225 27.159L50.2159 32.2215C49.7195 33.0569 49.5044 34.0595 50.0008 34.9609C50.6223 36.093 52.6023 36.9142 53.2942 37.8747C54.2448 39.1965 53.9861 40.787 53.2155 42.1384C51.3142 45.4698 49.4073 48.6831 47.2417 51.8444C46.6567 52.6994 45.6287 53.2464 44.6205 53.2014C43.8358 53.1648 43.2058 52.7472 42.5195 52.3478C41.6266 51.8289 40.2723 51.459 39.4891 52.4378C38.1602 54.0986 36.9339 55.8479 35.8553 57.7422L35.8525 57.7436Z" fill="#BD1726"/>
                                    <path d="M62.6033 60.3084C62.0197 60.57 61.4656 60.2282 61.2617 59.7628C61.0888 59.3676 61.138 58.6321 61.6274 58.3861C63.2136 57.5887 64.5299 56.4862 65.4538 54.9253C66.455 53.235 66.9388 51.2943 66.7686 49.3017C66.5999 47.3329 65.8953 45.4275 64.482 44.0564C63.9758 43.5656 63.6945 42.9721 64.1811 42.3421C64.5622 41.85 65.3638 41.8289 65.8602 42.3182C67.812 44.2504 68.826 46.7845 68.9328 49.5365C69.1086 54.0492 66.7391 58.4507 62.6033 60.3084Z" fill="#BD1726"/>
                                    <path d="M59.1468 55.4766C59.0653 54.7215 59.4042 54.4163 59.9358 54.1224C62.1633 52.8863 62.9297 49.9458 61.6134 47.7704C61.2633 47.1924 61.3448 46.5469 61.8918 46.1686C62.3475 45.8536 63.0745 45.9352 63.4289 46.5132C65.4904 49.8811 64.2347 54.3333 60.7654 56.2036C60.4279 56.3851 60.1073 56.4455 59.7909 56.3021C59.4956 56.1685 59.1933 55.8929 59.1483 55.478L59.1468 55.4766Z" fill="#BD1726"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_986_5061">
                                    <rect width="72" height="72" fill="white"/>
                                    </clipPath>
                                </defs>
                                </svg>
                    </span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-cracked-help-link rx-cracked-help-link-phone" href="<?php echo esc_url($phone_url); ?>">
                        <svg viewBox="0 0 23.9997 24.0001" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6795 1.32019C21.7996 0.440119 20.7396 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33335 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.18761 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18232 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/></svg>
                        <?php echo esc_html($phone_text); ?>
                    </a>
                </article>
                <article class="rx-cracked-help-card">
                    <span class="rx-cracked-help-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                            <g clip-path="url(#clip0_0_225)">
                                <path d="M17.4375 14.2341L17.3967 10.3964L11.4272 10.3528C10.0463 10.343 8.45578 11.2388 8.45578 12.863V65.6536C8.45438 67.1006 9.73406 68.3297 11.1136 68.3311L38.3302 68.3438L40.4831 70.3434L11.6888 70.3856C8.89875 70.3898 6.48563 68.452 6.48703 65.5411V12.8489C6.48984 10.6284 8.29125 8.63719 10.4611 8.4375L17.6794 8.33906C18.2348 6.95109 19.4639 5.92031 20.9573 5.89922L23.7094 5.85984C24.0848 2.45672 26.8959 -0.119531 30.2864 -0.0660938C33.5855 -0.0140625 36.3305 2.53547 36.6666 5.85844L39.5972 5.91328C41.0062 5.94 42.165 7.01438 42.712 8.34047L49.8178 8.42344C51.8738 8.44734 53.7834 10.4723 53.7863 12.6169L53.827 39.9684L51.8963 39.6717L51.8484 37.5863L51.84 13.1864C51.84 11.828 51.0455 10.4273 49.5717 10.4175L42.975 10.3725L42.9258 14.2706C42.9131 15.2972 42.0848 16.0889 41.0709 16.2984L19.2839 16.3013C18.3023 16.0481 17.4488 15.293 17.4375 14.2341ZM40.6631 14.2706C40.9261 14.2706 41.0091 14.0766 41.0091 13.9627L40.9936 9.66375C40.9908 8.82563 40.3973 7.93266 39.5142 7.92703L35.8973 7.90313C35.5092 7.90031 35.228 7.78781 35.0044 7.55297C34.7456 7.28297 34.7372 7.01578 34.7442 6.5925C34.785 4.06688 32.7108 1.89844 30.1191 1.93641C27.585 1.97297 25.5938 4.11609 25.6134 6.59391C25.6163 7.00594 25.612 7.28719 25.3631 7.56563C25.1817 7.76953 24.9005 7.88625 24.5616 7.88906L20.9447 7.91156C20.063 7.91719 19.3416 8.78906 19.35 9.66375L19.3922 14.2706H40.6631Z" fill="#BD1726"/>
                                <path d="M44.3419 70.8356C38.932 68.49 35.3447 63.2686 35.0072 57.4397C34.6177 50.7023 38.7352 44.3981 45.0225 42.0412C50.4253 40.0177 56.4005 41.2762 60.5588 45.1603C67.2159 51.3773 67.1681 62.0395 60.4012 68.1722C56.0953 72.0745 49.7925 73.1995 44.3419 70.8356ZM60.9581 64.7423C65.0939 59.0569 64.388 51.5616 59.4787 46.7536C54.8395 42.21 47.6058 41.7122 42.3886 45.6033C38.6297 48.4059 36.4781 53.0255 36.8944 57.7462C37.2094 61.3195 38.9222 64.5722 41.5491 66.8812C47.3836 72.0098 56.3766 71.0395 60.9581 64.7423Z" fill="#BD1726"/>
                                <path d="M22.4662 32.1258L13.8445 32.0878C13.2075 32.085 12.4453 31.3411 12.4369 30.7083L12.3384 22.8178C12.33 22.1836 12.3933 21.6014 12.7969 21.1359C13.2005 20.6705 13.7531 20.5059 14.4 20.5045L21.9755 20.4919C22.9388 20.4905 23.9498 21.0614 23.9513 22.1231L23.9583 30.4819C23.9583 31.3158 23.2748 31.9416 22.4677 32.1272L22.4662 32.1258ZM22.365 30.42L22.3509 22.1681L14.0175 22.178L14.0147 30.4369L22.365 30.4186V30.42Z" fill="#BD1726"/>
                                <path d="M22.4494 46.5652L14.0597 46.5877C13.0528 46.5905 12.3736 45.7073 12.3736 44.7483L12.3694 37.2825C12.3694 36.6286 12.3975 36.0563 12.8489 35.588C13.2286 35.1956 13.7517 34.9777 14.3944 34.9762L21.9811 34.9706C22.9148 34.9706 23.9428 35.5627 23.9442 36.6061L23.9597 44.9733C23.9611 45.7256 23.258 46.5623 22.448 46.5652H22.4494ZM22.3678 44.9058L22.3439 36.6708L14.2791 36.6497C14.0738 36.7031 13.9936 36.8466 13.995 37.0519L14.0498 44.9409L22.3664 44.9058H22.3678Z" fill="#BD1726"/>
                                <path d="M22.3073 61.1775L13.8938 61.1859C13.1077 60.9862 12.4003 60.4237 12.3975 59.5687L12.3666 51.4195C12.3623 50.3986 13.1203 49.5478 14.168 49.5506L22.4128 49.5717C23.2214 49.5731 23.9611 50.4 23.9597 51.1903L23.9442 59.6756C23.9428 60.4758 23.0723 61.1775 22.3059 61.1775H22.3073ZM22.3523 51.3731C22.3523 51.1481 21.8644 51.1608 21.7209 51.1636L19.5905 51.2114L15.7613 51.1762L14.0077 51.2677L14.0273 59.4984L22.32 59.5111L22.3523 51.3731Z" fill="#BD1726"/>
                                <path d="M44.4755 39.1247L27.5569 39.1359C27.1083 39.1359 26.8144 38.5763 26.827 38.243C26.8439 37.838 27.1519 37.3359 27.6497 37.3359L44.4502 37.3444C44.9044 37.3444 45.0998 37.8436 45.1294 38.1431C45.1589 38.4427 45.0014 39.1233 44.4755 39.1233V39.1247Z" fill="#BD1726"/>
                                <path d="M44.3897 24.6347L27.5597 24.6319C27.0759 24.6319 26.8523 24.0848 26.8538 23.7502C26.8552 23.4155 27.0703 22.8417 27.5611 22.8417L44.4487 22.8445C44.9297 22.8445 45.1406 23.4239 45.128 23.7445C45.1139 24.0877 44.9114 24.6347 44.3897 24.6347Z" fill="#BD1726"/>
                                <path d="M38.6986 29.5144L27.7861 29.5003C27.2166 29.5003 26.8748 29.0883 26.858 28.6144C26.8439 28.1883 27.1252 27.637 27.6708 27.637H38.6648C39.1627 27.637 39.4763 28.1292 39.4805 28.4963C39.4861 28.9631 39.2456 29.3161 38.7 29.513L38.6986 29.5144Z" fill="#BD1726"/>
                                <path d="M38.662 42.1636C39.2442 42.1636 39.4833 42.6937 39.4636 43.0959C39.4439 43.4981 39.1317 43.9523 38.6423 43.9537L27.7847 43.9861C27.1997 43.9875 26.8678 43.5656 26.8608 43.1002C26.8509 42.5166 27.2292 42.1481 27.8634 42.1481L38.662 42.1622V42.1636Z" fill="#BD1726"/>
                                <path d="M33.757 53.9888L27.5442 53.9578C27.0802 53.955 26.8509 53.4262 26.8636 53.0648C26.8762 52.7034 27.0816 52.1761 27.5484 52.1761L34.1381 52.1634L33.7584 53.9902L33.757 53.9888Z" fill="#BD1726"/>
                                <path d="M33.6909 58.6223C32.1623 58.6702 27.8648 58.7841 27.3586 58.5745C26.9873 58.4213 26.8552 58.0514 26.8636 57.7013C26.8692 57.4242 27.0478 56.8477 27.4711 56.8434L33.563 56.7914C33.5166 57.4411 33.5813 57.9952 33.6909 58.6209V58.6223Z" fill="#BD1726"/>
                                <path d="M29.4834 9.18844C28.3162 8.83406 27.6567 7.69219 27.7453 6.62063C27.8437 5.41828 28.6734 4.45641 29.9208 4.30734C31.493 4.12031 32.76 5.47453 32.6405 6.98484C32.5209 8.49516 31.0683 9.66938 29.4848 9.18703L29.4834 9.18844ZM29.8842 6.17344C29.4427 6.41531 29.4159 6.87375 29.6212 7.16344C29.8266 7.45312 30.2006 7.54453 30.4959 7.40391C30.8602 7.23094 30.9614 6.80062 30.8011 6.46312C30.6548 6.15797 30.2695 5.96109 29.8842 6.17344Z" fill="#BD1726"/>
                                <path d="M57.3441 65.5088L52.5319 65.5045C51.9539 65.5045 51.6684 65.1038 51.6684 64.5511L51.6755 59.3888L48.7589 59.4042L48.7252 64.8633C48.7223 65.2683 48.2316 65.4989 47.8814 65.4989L43.0214 65.5031C42.5292 65.5031 42.1355 65.1839 42.1341 64.6552L42.1158 57.4833L40.5591 57.4538C40.2089 57.4467 39.9684 57.0909 39.908 56.8631C39.8011 56.4581 39.9136 56.1263 40.2117 55.838L49.4663 46.9083C49.9472 46.4442 50.5406 46.5258 50.9892 46.9617L53.2856 49.1948C53.4516 48.5634 53.3391 47.7464 54.0042 47.7464H56.7014C57.1373 47.7464 57.3216 48.2105 57.3202 48.5873L57.3089 53.0255L60.4434 56.0588C60.6642 56.2725 60.6389 56.6536 60.5433 56.9025C60.4617 57.1163 60.2508 57.4397 59.9442 57.4439L58.3242 57.4664L58.3186 64.6242C58.3186 65.1544 57.8911 65.5073 57.3441 65.5073V65.5088ZM52.5389 57.6394C53.1113 57.6394 53.3573 58.2033 53.3573 58.6617V63.7917L56.6423 63.7734V56.7464C56.6423 56.4258 56.7675 56.1136 56.9869 56.0531L57.7955 55.8267L50.1652 48.5888L42.6839 55.8169C43.3294 55.9673 43.6894 56.1319 43.7597 56.6395L43.7541 63.7973L47.1206 63.7889L47.108 58.3411C47.1966 57.8756 47.5383 57.6436 48.0038 57.6422L52.5389 57.638V57.6394ZM55.6973 51.3155L55.717 49.3889C55.4048 49.3186 55.1911 49.3144 54.8831 49.4002C54.7552 50.3677 54.8016 50.9175 55.6973 51.3155Z" fill="#BD1726"/>
                                <path d="M15.3534 26.9944C14.947 26.5866 14.9597 26.1211 15.2831 25.7681C15.6066 25.4152 16.1002 25.3336 16.4728 25.6964L17.5683 26.7623L19.9702 24.1847C20.302 23.8289 20.7548 23.7923 21.112 24.0595C21.4298 24.2972 21.6408 24.8245 21.2991 25.1887L18.1308 28.5623C17.7947 28.9195 17.3025 28.9505 16.9509 28.5975L15.3534 26.993V26.9944Z" fill="#BD1726"/>
                                <path d="M15.2761 41.3831C14.8809 40.9936 15.0131 40.4423 15.3858 40.1484C16.2155 39.4931 16.6936 40.5844 17.5809 41.2467L19.8591 38.79C20.2134 38.4075 20.6072 38.2303 21.0516 38.5059C21.4031 38.7239 21.6633 39.2963 21.3089 39.6731L18.128 43.0481C17.8959 43.2942 17.4094 43.4841 17.1563 43.2338L15.2775 41.3817L15.2761 41.3831Z" fill="#BD1726"/>
                                <path d="M17.0789 57.7294L15.1538 55.7648C14.8739 55.4794 15.0933 55.0491 15.2663 54.8297C15.5025 54.533 16.0045 54.3459 16.3069 54.6258L17.5458 55.7691L20.1853 53.0719C20.4961 52.7541 21.0994 53.0058 21.2892 53.2617C21.5761 53.6484 21.4805 54.0745 21.1345 54.4373L17.9972 57.7252C17.768 57.9642 17.3278 57.9825 17.0789 57.7294Z" fill="#BD1726"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_0_225">
                                    <rect width="72" height="72" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-cracked-help-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">GET MY COST ESTIMATE<?php echo $arrow_icon; ?></a>
                </article>
                <article class="rx-cracked-help-card">
                    <span class="rx-cracked-help-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                            <g>
                                <path d="M9.46266 63.7425L9.49359 42.2353L9.50484 40.4072C9.09984 40.3031 8.63719 40.2778 8.23359 40.3791C7.75266 40.4986 7.49812 40.9177 7.43766 41.3859L7.38844 44.6077L7.36734 67.3847H30.3708C30.9698 67.3847 31.3945 67.5844 31.5577 68.1848C31.6294 68.933 32.2158 69.7542 33.0384 69.7584L36.2742 69.7711C37.2291 69.7753 37.9505 68.9667 37.9758 68.0625C38.1867 67.5169 38.603 67.3847 39.1739 67.3847H64.2262V41.6194C64.2262 40.853 63.578 40.3748 62.9297 40.4002C62.6456 40.3791 62.4586 40.3594 62.1323 40.4522L62.1281 53.6316C62.1281 53.8819 61.9523 54.0886 61.8427 54.1941C61.4475 54.5709 60.698 54.2391 60.3267 53.5247L60.3197 38.6522C58.6252 38.0109 56.8814 37.6678 55.0912 37.5666L54.8114 36.5625C54.7397 36.3023 54.5077 36.1013 54.5836 35.7764L63.9225 35.7455C64.1475 35.7455 64.3064 35.5866 64.4119 35.5261C64.5469 35.4488 64.7297 35.0705 64.5581 34.9116L60.8161 31.4747L59.2383 32.8317C58.635 33.3506 57.9839 33.3169 57.42 32.7712L55.0041 30.4397L52.5248 32.6855C51.7908 32.5434 51.0708 31.6392 51.4012 31.327L54.1055 28.7648C54.6314 28.267 55.402 28.267 55.9111 28.7648L58.3467 31.1513L59.9456 29.7563C60.4561 29.3105 61.1072 29.3133 61.6134 29.7563L64.5862 32.3592L64.6102 22.4494C64.6102 22.0219 64.2516 21.6788 63.8255 21.6788L50.8106 21.683C50.4366 21.683 50.1145 22.0092 50.1131 22.3664L50.1019 29.5959C50.1019 29.8983 49.9809 30.1008 49.7756 30.2273C49.3397 30.4959 48.7294 30.1852 48.3202 29.648L48.3342 22.2159C48.337 20.9658 49.2581 20.0686 50.4802 19.8295L50.5012 10.4977L44.9592 10.485C43.7498 10.4006 42.8316 9.55125 42.698 8.34469L42.6783 2.25L29.5003 2.24438C29.0714 2.24438 28.7986 2.55656 28.8 2.97984L28.8113 31.6547C28.8113 31.9514 29.2458 32.092 29.4342 32.2256C29.3344 32.7755 28.7381 33.3408 28.087 33.2367C27.5245 33.1467 26.9944 32.5167 26.9944 31.8656L27.0042 2.52281C27.0042 1.25016 28.1784 0.379687 29.3541 0.381094L43.9608 0.386719C44.287 0.386719 44.5739 0.579375 44.7933 0.801562L51.7598 7.86937C52.1423 8.19 52.2802 8.57109 52.2802 9.08297V19.8436L64.1714 19.8759C65.5186 19.8802 66.4453 21.1584 66.4228 22.4466L66.3975 35.3433C66.3947 36.5203 65.3569 37.4034 64.2628 37.5708L62.1773 37.6284C62.0733 37.8281 62.055 38.4244 62.3137 38.5875C64.1334 38.257 65.9869 39.4369 65.9911 41.362L66.0192 52.5333V67.4241C66.0206 68.3986 65.2612 69.2395 64.2825 69.2395L39.5536 69.2564C39.0586 70.5389 38.0011 71.3995 36.7102 71.6161L32.9273 71.6316C31.5844 71.4502 30.4847 70.5811 29.9967 69.2578L7.11281 69.2184C6.24797 69.217 5.58422 68.3002 5.58703 67.4663L5.67844 41.033C5.68406 39.5184 7.25766 38.5102 8.55141 38.4877L9.54422 38.4708L9.585 36.7706C9.59906 36.187 10.0758 35.9297 10.5694 35.7427C13.2005 34.7456 15.8991 34.1733 18.7298 34.0003H23.1441C25.4433 34.1536 27.6497 34.5206 29.8069 35.287C30.1092 35.3953 30.5887 35.5416 30.6464 35.8453L30.2597 36.8719C30.2006 37.0294 30.0923 37.1461 29.9995 37.2023C29.842 37.2952 29.6958 37.2178 29.4989 37.1489C27.1294 36.3164 24.6811 35.9325 22.1737 35.8411L19.6988 35.8327C16.8342 35.8228 13.9739 36.3994 11.3133 37.5005L11.2669 56.7183L11.2177 62.3039C12.3328 61.8384 13.3861 61.6275 14.5252 61.3631C21.1092 60.0919 28.1728 60.8414 33.8794 64.7241L33.9286 54.1055C33.93 53.7117 34.4714 53.5219 34.7245 53.505C35.0002 53.4867 35.6245 53.6794 35.6273 54.0928L35.6752 64.6608C40.3369 61.4714 45.6483 60.4308 51.1509 60.9286C53.0508 61.0425 54.817 61.4081 56.6114 61.9622C57.5241 63.0577 58.8741 63.6427 60.3014 63.4612C60.6319 63.4191 61.0678 63.1631 61.3448 63.4528C61.5262 63.6412 61.6416 64.9308 61.2028 65.3273C60.982 65.527 60.5433 65.6817 60.1903 65.4905C54.8283 62.602 48.1008 61.8877 42.2437 63.5681C39.6872 64.3022 37.44 65.5594 35.3827 67.2089C34.9327 67.5703 34.3055 67.3664 33.885 67.0402C29.5861 63.6961 24.4097 62.4586 18.9998 62.6878C16.117 62.8102 13.4002 63.3248 10.7606 64.4695C10.3205 64.6608 9.46547 64.3809 9.46687 63.7509L9.46266 63.7425ZM47.6353 8.64984L49.7616 8.48531L44.5191 3.19359L44.4755 7.91859C44.4642 9.17719 46.0955 8.17453 47.6353 8.64984Z" fill="#BD1726"/>
                                <path d="M61.9298 61.7555C60.6459 62.7891 58.8417 62.8242 57.6773 61.6669L51.2241 55.2502C50.7473 54.7748 50.7713 54.1927 50.6742 53.6063L49.358 52.2422C44.3053 55.7044 37.5623 54.7791 33.5391 50.182C30.2105 46.3781 29.4469 41.0456 31.7798 36.4781C33.1158 33.8625 35.3039 31.7517 38.077 30.6183C41.4886 29.2219 45.4191 29.4694 48.6155 31.3228C54.6652 34.8314 56.6184 42.6417 52.8736 48.6127L54.2883 49.9866C54.9225 50.0709 55.4892 50.0991 55.9856 50.5927L60.1397 54.7256L62.6527 57.2822C63.6848 58.6772 63.2855 60.6628 61.927 61.7569L61.9298 61.7555ZM52.8581 43.5994C53.5458 38.963 51.0933 34.4306 46.8422 32.5125C43.3716 30.9473 39.4552 31.3819 36.4303 33.6881C33.968 35.5655 32.4197 38.4539 32.2763 41.5673C32.0245 47.0053 35.9888 51.6952 41.3227 52.3941C46.9392 53.1309 52.0439 49.0936 52.8581 43.598V43.5994ZM51.7739 52.148L52.8047 51.075L51.8034 50.0752L50.7305 51.1495L51.7739 52.148ZM59.0063 60.4055C59.5941 60.9862 60.5236 60.6248 60.9398 60.1945C61.4025 59.715 61.6486 58.7995 61.1002 58.2567L54.8423 52.0636C54.6258 51.8484 54.2686 51.9792 54.1069 52.1423L52.7681 53.4825C52.6275 53.6245 52.553 53.7961 52.5966 53.9705C52.6247 54.0816 52.7091 54.1898 52.837 54.3164L59.0048 60.4069L59.0063 60.4055Z" fill="#BD1726"/>
                                <path d="M26.152 30.3412C26.1563 31.8642 25.3814 33.1917 23.7937 33.1945L8.24906 33.217C7.00031 33.2184 5.69531 32.4309 5.69391 31.0627L5.69109 16.3505C5.69109 15.3155 6.75563 14.2875 7.78078 14.2875H24.0469C25.117 14.2875 26.107 15.3548 26.1098 16.418L26.1506 30.3427L26.152 30.3412ZM21.9122 31.3172L23.7122 31.2975C23.9948 31.2947 24.3352 31.0711 24.3352 30.7308L24.3422 16.8033C24.3422 16.3912 24.0398 16.1156 23.6545 16.1156L8.16188 16.0973C7.73859 16.0973 7.46438 16.3927 7.46438 16.7991L7.47141 30.967C7.71609 31.3045 8.09297 31.3805 8.47406 31.3481C9.46125 31.2637 10.3711 31.3214 11.3639 31.3214H20.0053L21.9136 31.3158L21.9122 31.3172Z" fill="#BD1726"/>
                                <path d="M45.4162 22.14H32.3606C31.8094 22.14 31.4212 21.8067 31.3636 21.3188C31.3144 20.9053 31.5773 20.3048 32.1398 20.3048H45.7017C46.2417 20.3034 46.4977 20.9334 46.4527 21.3145C46.3922 21.8194 46.0322 22.1414 45.4162 22.1414V22.14Z" fill="#BD1726"/>
                                <path d="M45.7552 17.3489L32.0386 17.318C31.4817 17.318 31.3031 16.5811 31.3875 16.2225C31.5113 15.7036 31.9191 15.4913 32.4788 15.4913H45.3656C45.9113 15.4913 46.3275 15.712 46.4358 16.2295C46.5272 16.6627 46.3402 17.1802 45.7552 17.3489Z" fill="#BD1726"/>
                                <path d="M27.3038 54.3136C23.4295 54.0225 19.6833 54.0028 15.8681 54.3234C15.2592 54.3741 14.9442 53.7595 14.992 53.3166C15.0525 52.7498 15.5053 52.4939 16.0889 52.4531L18.135 52.3083L25.1128 52.3055L27.052 52.4362C27.5808 52.4714 27.983 52.778 28.0884 53.242C28.1686 53.5922 27.9028 54.3586 27.3038 54.3136Z" fill="#BD1726"/>
                                <path d="M24.9089 48.9066L18.3952 48.9178L16.3308 49.0795C15.7556 49.1245 15.2213 49.0345 15.0328 48.472C14.8669 47.977 15.1509 47.3527 15.7486 47.2683C17.3194 47.0447 18.862 47.0475 20.4736 47.0264C22.7461 46.9955 24.9356 46.9927 27.18 47.2416C27.6877 47.2978 28.073 47.6452 28.1025 48.1247C28.132 48.6042 27.7552 49.1428 27.2109 49.0978L24.9103 48.9066H24.9089Z" fill="#BD1726"/>
                                <path d="M27.3192 43.868C23.5139 43.5403 19.8338 43.5516 16.0988 43.8469C15.518 43.8933 15.0891 43.6331 15.0019 43.11C14.9358 42.7106 15.1538 42.0877 15.7219 42.0356C19.5863 41.6827 23.4492 41.6981 27.3248 42.0272C27.8114 42.068 28.1067 42.518 28.1067 42.9103C28.1067 43.335 27.8634 43.7597 27.3192 43.8666V43.868Z" fill="#BD1726"/>
                                <path d="M41.7698 26.9845L32.1764 26.9592C31.6223 26.9578 31.3355 26.3573 31.3622 25.9706C31.4016 25.3884 31.8417 25.0777 32.4506 25.0791L41.6222 25.0819C42.1158 25.0819 42.4786 25.4855 42.532 25.8792C42.5953 26.3475 42.3225 26.7623 41.7713 26.9845H41.7698Z" fill="#BD1726"/>
                                <path d="M38.7225 12.548L32.2495 12.555C31.6716 12.555 31.3284 12.0234 31.3636 11.5523C31.4058 11.0067 31.8375 10.6594 32.4309 10.6608L38.8477 10.6777C39.3905 10.6791 39.683 11.2345 39.6703 11.6494C39.6548 12.1134 39.3103 12.5466 38.7211 12.548H38.7225Z" fill="#BD1726"/>
                                <path d="M60.1481 23.7136C61.3702 23.3986 62.4586 24.1369 62.7553 25.2577C63.052 26.3784 62.3334 27.4795 61.2084 27.8058C60.1566 28.1109 59.0203 27.4514 58.6828 26.3953C58.3284 25.2844 58.9275 24.0286 60.1481 23.7136Z" fill="#BD1726"/>
                                <path d="M42.4237 50.7234C38.0166 50.6166 34.4348 47.1572 34.0411 42.8681C33.7584 39.7898 35.0733 36.9225 37.4878 35.0831C41.1244 32.3128 46.3134 32.947 49.2216 36.488C51.3956 39.1373 51.8794 42.7809 50.3086 45.9267C48.8939 48.7603 45.907 50.8078 42.4252 50.722L42.4237 50.7234ZM48.1838 38.1277C46.6467 35.9156 43.9861 34.8497 41.3691 35.3348C38.932 35.7863 36.8747 37.5877 36.1055 40.0838C35.1605 43.1522 36.5147 46.4034 39.2245 47.9602C42.0005 49.5548 45.5287 48.9895 47.6409 46.6538C49.7784 44.2898 50.0738 40.8488 48.1838 38.1291V38.1277Z" fill="#BD1726"/>
                                <path d="M20.2641 24.7331L14.4942 28.1953C14.0105 28.485 13.0809 28.0772 13.0795 27.4936L13.0725 20.392C13.0725 19.7719 13.995 19.3528 14.5336 19.6748L20.1136 23.0273C20.4202 23.2116 20.5945 23.5167 20.6241 23.8064C20.6508 24.0666 20.6016 24.532 20.2641 24.7331ZM18.0534 23.9302L14.8894 22.0261L14.8809 25.8694L18.0548 23.9287L18.0534 23.9302Z" fill="#BD1726"/>
                            </g>
                        </svg>
                    </span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-cracked-help-link" href="<?php echo esc_url(home_url('/resources/')); ?>">EXPLORE RESOURCES<?php echo $arrow_icon; ?></a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Weak Soils / Soil Stabilisation" (residential) block renderers
 * (rx-ci-ws-* markup). Figma node 748:13238. Field contracts mirror the
 * rectify_pb_render_cracked_* family 1:1 (same 'cracked-*' seed data still
 * powers these blocks) but the markup/classes are scoped to
 * .rx-ci-ws-page so the page styles exclusively from
 * assets/css/commercial-inner-pages.css instead of residential-inner-pages.css.
 * ---------------------------------------------------------------------*/

function rectify_pb_render_ws_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'WHAT WE RECTIFY';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="rx-ci-ws-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-ci-ws-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_band($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $fallback_map = rectify_pb_cracked_band_fallback_images();
        $image = isset($fallback_map[$section_key]) ? rectify_pb_theme_asset_url($fallback_map[$section_key]) : '';
    }

    $media_first = (isset($fields['media_position']) && $fields['media_position'] === 'first');
    $soft = (isset($fields['soft']) && $fields['soft'] === 'yes') || $media_first;
    ?>
    <section class="rx-ci-ws-band<?php echo $soft ? ' rx-ci-ws-soft' : ''; ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap <?php echo $media_first ? 'rx-ci-ws-matters-grid' : 'rx-ci-ws-intro-grid'; ?>">
            <?php if ($media_first && $image) : ?>
            <figure class="rx-ci-ws-matters-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="<?php echo $media_first ? 'rx-ci-ws-matters-copy' : 'rx-ci-ws-intro-copy'; ?>">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php if (!$media_first && $image) : ?>
            <figure class="rx-ci-ws-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_whatis($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-ci-ws-whatis" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-ci-ws-whatis-grid">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($body) : ?><div><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_causes($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-ws-band rx-ci-ws-causes" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-ci-ws-causes-grid">
                <?php foreach ($items as $item) :
                    $photo = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-ws-cause-card">
                    <?php if ($photo) : ?>
                    <figure class="rx-ci-ws-cause-photo">
                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($title); ?>">
                    </figure>
                    <?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><?php echo wp_kses_post(wpautop($description)); ?><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_advantage($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'OUR ADVANTAGE';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Homeowners Choose Rectify';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-ci-ws-advantage" style="<?php echo esc_attr('--rx-ci-ws-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-ci-ws-advantage-head">
                <div>
                    <span class="rx-kicker"><?php echo esc_html($kicker); ?></span>
                    <h2><?php echo esc_html($heading); ?></h2>
                </div>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <div class="rx-ci-ws-advantage-grid">
                <?php foreach ($items as $item_index => $item) :
                    $icon = rectify_pb_homeowner_advantage_icon_markup($item_index);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-ws-advantage-card">
                    <div class="rx-ci-ws-advantage-card-head">
                        <?php if ($icon) : ?><span class="rx-ci-ws-advantage-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    </div>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_performance($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered. Rectified. Performance Verified.';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $before = rectify_pb_image_url(isset($fields['before_image']) ? $fields['before_image'] : 0, 'large');
    $after = rectify_pb_image_url(isset($fields['after_image']) ? $fields['after_image'] : 0, 'large');

    if (!$before) {
        $before = rectify_pb_theme_asset_url('images/home/before-after-1.png');
    }

    if (!$after) {
        $after = rectify_pb_theme_asset_url('images/home/before-after-2.png');
    }
    ?>
    <section class="rx-ci-ws-performance" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-ci-ws-compare">
                <figure class="rx-ci-ws-compare-image">
                    <span class="rx-ci-ws-compare-tag">BEFORE</span>
                    <img src="<?php echo esc_url($before); ?>" alt="Before structural remediation">
                </figure>
                <figure class="rx-ci-ws-compare-image">
                    <span class="rx-ci-ws-compare-tag rx-ci-ws-compare-tag-after">AFTER</span>
                    <img src="<?php echo esc_url($after); ?>" alt="After structural remediation">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ws_help($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $subtext = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $phone_text = '1800 18 20 20';
    $phone_url = 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    $call_icon = rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Call Expert 1.svg');
    $estimate_icon = rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Request Assessment 1.svg');
    $explore_icon = rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Explore Resources 1.svg');
    $phone_icon = rectify_pb_theme_asset_url('icons-red/telephone-symbol-button.svg');
    $arrow_icon = rectify_pb_theme_asset_url('icons-red/right-arrow.svg');
    ?>
    <section class="rx-ci-ws-help rx-contact-cta" style="<?php echo esc_attr('--rx-ci-ws-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-ci-ws-help-grid rx-contact-cta-grid">
                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon"><img src="<?php echo esc_url($call_icon); ?>" alt=""></span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-ci-ws-help-link-phone rx-contact-cta-phone" href="<?php echo esc_url($phone_url); ?>">
                        <span class="rx-ci-ws-help-link-phone-icon"><img src="<?php echo esc_url($phone_icon); ?>" alt=""></span>
                        <?php echo esc_html($phone_text); ?>
                    </a>
                </article>
                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon"><img src="<?php echo esc_url($estimate_icon); ?>" alt=""></span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-ci-ws-help-link rx-contact-cta-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">
                        GET MY COST ESTIMATE
                        <span class="rx-ci-ws-help-link-arrow"><img src="<?php echo esc_url($arrow_icon); ?>" alt=""></span>
                    </a>
                </article>
                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon"><img src="<?php echo esc_url($explore_icon); ?>" alt=""></span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-ci-ws-help-link rx-contact-cta-link" href="<?php echo esc_url(home_url('/resources/')); ?>">
                        EXPLORE RESOURCES
                        <span class="rx-ci-ws-help-link-arrow"><img src="<?php echo esc_url($arrow_icon); ?>" alt=""></span>
                    </a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Leaning Pillars & Chimneys" (residential) block renderers
 * (rx-ci-lp-* markup). Figma node 742:12168. Mirrors the markup already
 * hardcoded in template-parts/residential/content-leaning-pillars.php so
 * that once this post has saved builder data, the front end renders
 * identically whether the data came from the fallback closures or the
 * builder's saved blocks.
 * ---------------------------------------------------------------------*/

function rectify_pb_render_lp_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'WHAT WE RECTIFY';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="rx-ci-lp-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($title) : ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
            <nav class="rx-ci-lp-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/residential/')); ?>">Residential Solutions</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_band($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_commercial_inner_image_url(isset($fields['image']) ? $fields['image'] : '', 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/leaning-pillars/hero-intro.jpg');
    }

    $media_first = (isset($fields['media_position']) && $fields['media_position'] === 'first');
    $soft = (isset($fields['soft']) && $fields['soft'] === 'yes');
    ?>
    <section class="rx-ci-lp-band<?php echo $soft ? ' rx-ci-lp-soft' : ''; ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap <?php echo $media_first ? 'rx-ci-lp-matters-grid' : 'rx-ci-lp-intro-grid'; ?>">
            <?php if ($media_first && $image) : ?>
            <figure class="rx-ci-lp-matters-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="<?php echo $media_first ? 'rx-ci-lp-matters-copy' : 'rx-ci-lp-intro-copy'; ?>">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php if (!$media_first && $image) : ?>
            <figure class="rx-ci-lp-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_whatis($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-ci-lp-whatis" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-ci-lp-whatis-grid">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($body) : ?><div class="rx-ci-lp-whatis-copy"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_causes($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-lp-band rx-ci-lp-causes rx-ci-lp-causes--photo" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-ci-lp-causes-grid">
                <?php foreach ($items as $item) :
                    $photo = rectify_pb_commercial_inner_image_url(isset($item['image']) ? $item['image'] : '', 'large');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-lp-cause-card--photo">
                    <?php if ($photo) : ?>
                    <figure class="rx-ci-lp-cause-photo">
                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($title); ?>">
                    </figure>
                    <?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><?php echo wp_kses_post(wpautop($description)); ?><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_advantage($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'OUR ADVANTAGE';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Homeowners Choose Rectify';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-ci-lp-advantage" style="<?php echo esc_attr('--rx-ci-lp-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-ci-lp-advantage-head">
                <div>
                    <span class="rx-kicker"><?php echo esc_html($kicker); ?></span>
                    <h2><?php echo esc_html($heading); ?></h2>
                </div>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <div class="rx-ci-lp-advantage-grid">
                <?php foreach ($items as $item_index => $item) :
                    $icon = rectify_pb_homeowner_advantage_icon_markup($item_index);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-lp-advantage-card">
                    <div class="rx-ci-lp-advantage-card-head">
                        <?php if ($icon) : ?><span class="rx-ci-lp-advantage-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    </div>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_performance($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered. Rectified. Performance Verified.';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $before = rectify_pb_commercial_inner_image_url(isset($fields['before_image']) ? $fields['before_image'] : '', 'large');
    $after = rectify_pb_commercial_inner_image_url(isset($fields['after_image']) ? $fields['after_image'] : '', 'large');

    if (!$before) {
        $before = rectify_pb_theme_asset_url('images/leaning-pillars/before-after-1.jpg');
    }

    if (!$after) {
        $after = rectify_pb_theme_asset_url('images/leaning-pillars/before-after-2.jpg');
    }
    ?>
    <section class="rx-ci-lp-band rx-ci-lp-performance" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-ci-lp-compare">
                <figure class="rx-ci-lp-compare-image">
                    <span class="rx-ci-lp-compare-tag rx-ci-lp-compare-tag-before">BEFORE</span>
                    <img src="<?php echo esc_url($before); ?>" alt="Before structural remediation">
                </figure>
                <span class="rx-ci-lp-compare-divider" aria-hidden="true">
                    <span class="rx-ci-lp-compare-arrows">&#9664;&#9654;</span>
                </span>
                <figure class="rx-ci-lp-compare-image">
                    <span class="rx-ci-lp-compare-tag rx-ci-lp-compare-tag-after">AFTER</span>
                    <img src="<?php echo esc_url($after); ?>" alt="After structural remediation">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_lp_help($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $subtext = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $phone_text = '1800 18 20 20';
    $phone_url = 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-ci-lp-help rx-contact-cta" style="<?php echo esc_attr('--rx-ci-lp-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>
            <div class="rx-ci-lp-help-grid rx-contact-cta-grid">
                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" stroke="currentColor" stroke-width="1.6"/></svg>
                    </span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-ci-lp-help-link rx-ci-lp-help-link-phone rx-contact-cta-phone" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a>
                </article>
                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" y="3" width="14" height="18" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M8 7h8M8 11h2m3 0h2m-7 4h2m3 0h2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    </span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-ci-lp-help-link rx-contact-cta-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">GET MY COST ESTIMATE</a>
                </article>
                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13z" stroke="currentColor" stroke-width="1.6"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13z" stroke="currentColor" stroke-width="1.6"/></svg>
                    </span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-ci-lp-help-link rx-contact-cta-link" href="<?php echo esc_url(home_url('/resources/')); ?>">EXPLORE RESOURCES</a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "FAQ" block renderers (rx-faq-* markup), shared by the 5 Frequently Asked
 * Questions category pages under /resources/faq/ (residential, commercial,
 * our-process, our-technology, industries-we-serve).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_faq_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Resources';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Frequently Asked Questions';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $breadcrumb_label = isset($fields['breadcrumb_label']) ? $fields['breadcrumb_label'] : '';
    $breadcrumb_url = isset($fields['breadcrumb_url']) ? $fields['breadcrumb_url'] : '';
    ?>
    <section class="rx-faq-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <?php if ($intro) : ?><p><?php echo wp_kses_post($intro); ?></p><?php endif; ?>

            <nav class="rx-faq-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>">Resources</a>
                <?php if ($breadcrumb_label) : ?>
                <span aria-hidden="true">&gt;</span>
                <?php if ($breadcrumb_url) : ?>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <?php else : ?>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
                <?php endif; ?>
                <?php endif; ?>
                <span aria-hidden="true">&gt;</span>
                <span>Frequently Asked Questions</span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_faq_banner($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/home/TruckandVanathouse.jpg');
    }
    ?>
    <div class="rx-faq-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </div>
    <?php
}

function rectify_pb_render_faq_list($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-faq-search-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <form class="rx-faq-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" name="s" class="rx-faq-search-input" placeholder="Search Question">
                <button type="submit" class="rx-faq-search-btn">
                    Search
                    <svg width="15" height="15" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="2"/><line x1="14.2" y1="14.2" x2="19" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                </button>
            </form>
        </div>
    </section>

    <section class="rx-faq-list-band">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>

            <div class="rx-faq-list">
                <?php foreach ($items as $index => $item) :
                    $question = isset($item['question']) ? $item['question'] : '';
                    $answer = isset($item['answer']) ? $item['answer'] : '';
                    $is_active = ($index === 0);
                    ?>
                    <div class="rx-faq-item<?php echo $is_active ? ' is-active' : ''; ?>">
                        <button type="button" class="rx-faq-question" aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>" aria-controls="rx-faq-answer-<?php echo esc_attr($section_key . '-' . $index); ?>">
                            <span><?php echo esc_html($question); ?></span>
                            <span class="rx-faq-icon" aria-hidden="true">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </button>
                        <div class="rx-faq-answer" id="rx-faq-answer-<?php echo esc_attr($section_key . '-' . $index); ?>">
                            <p><?php echo wp_kses_post($answer); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_faq_cta($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $subtext = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $phone_text = '1800 18 20 20';
    $phone_url = 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-faq-cta" style="<?php echo esc_attr('--rx-faq-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>

            <div class="rx-faq-help-grid">
                <article class="rx-faq-help-card">
                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Call Expert.svg')); ?>" alt=""></span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-faq-help-phone" href="<?php echo esc_url($phone_url); ?>">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_1039_13672)">
                                <path d="M22.6795 1.32019C21.7996 0.440119 20.7395 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33334 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.1876 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18231 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1039_13672">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                        </span> <?php echo esc_html($phone_text); ?>
                    </a>
                </article>
                <article class="rx-faq-help-card">
                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Request Assessment 1.svg')); ?>" alt=""></span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-faq-help-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">GET MY COST ESTIMATE <span aria-hidden="true">&#8594;</span></a>
                </article>
                <article class="rx-faq-help-card">
                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Explore Resources 1.svg')); ?>" alt=""></span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-faq-help-link" href="<?php echo esc_url(home_url('/resources/')); ?>">EXPLORE RESOURCES <span aria-hidden="true">&#8594;</span></a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * Legal pages (Privacy Policy etc., rx-legal-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_legal_hero($fields, $section_key)
{
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Privacy Policy';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="rx-faq-hero rx-legal-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h1><?php echo esc_html($title); ?></h1>

            <nav class="rx-faq-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_legal_sections($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-legal-body" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <ol class="rx-legal-list">
                <?php foreach ($items as $item) :
                    $heading = isset($item['heading']) ? $item['heading'] : '';
                    $body = isset($item['body']) ? $item['body'] : '';
                    ?>
                    <li class="rx-legal-item">
                        <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                        <?php if ($body) : ?>
                        <div class="rx-legal-item-copy"><?php echo wp_kses_post(wpautop($body)); ?></div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Our Locations" page (rx-loc-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_loc_image_url($value, $fallback_relative_path)
{
    if (is_numeric($value)) {
        $attachment_url = rectify_pb_image_url($value, 'full');

        if ($attachment_url) {
            return $attachment_url;
        }
    }

    $value = is_string($value) ? trim($value) : '';

    if ($value !== '') {
        if (preg_match('#^https?://#i', $value)) {
            return $value;
        }

        return rectify_pb_theme_asset_url($value);
    }

    return rectify_pb_theme_asset_url($fallback_relative_path);
}

function rectify_pb_render_loc_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Our Locations';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Find Your Nearest Rectify Office';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $banner_image = rectify_pb_loc_image_url(isset($fields['banner_image']) ? $fields['banner_image'] : '', 'images/our-locations/truck-and-van.jpg');
    ?>
    <section class="rx-loc-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-loc-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-loc-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">›</span>
                    <span>About Us</span>
                    <span aria-hidden="true">›</span>
                    <strong><?php echo esc_html($kicker); ?></strong>
                </nav>
            </div>
            <?php if ($intro) : ?><div class="rx-loc-hero-copy"><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
        </div>
    </section>
    <?php if ($banner_image) : ?>
    <figure class="rx-loc-banner" data-rx-section="loc-banner">
        <img src="<?php echo esc_url($banner_image); ?>" alt="Rectify service truck and van outside a residential property">
    </figure>
    <?php endif; ?>
    <?php
}

function rectify_pb_render_loc_offices($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Where We Operate';
    $lead = isset($fields['lead']) ? $fields['lead'] : 'As the business continues to grow, our footprint is also expanding into new regions and markets.';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $phone_icon = rectify_pb_theme_asset_url('images/our-locations/phone.svg');
    $mail_icon = rectify_pb_theme_asset_url('images/our-locations/mail.svg');
    $arrow_icon = rectify_pb_theme_asset_url('images/our-locations/right-arrow.svg');
    $map_image = rectify_pb_theme_asset_url('images/our-locations/australia-map.jpg');
    $map_pin = rectify_pb_theme_asset_url('images/our-locations/map-pin.svg');
    $map_locations = array(
        array('match' => 'adelaide', 'lat' => -34.9249, 'lng' => 138.6058),
        array('match' => 'tullamarine', 'lat' => -37.6879, 'lng' => 144.8410),
        array('match' => 'hobart', 'lat' => -42.8821, 'lng' => 147.3272),
    );
    ?>
    <section class="rx-loc-offices" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-loc-section-head">
                <h2><?php echo esc_html($heading); ?></h2>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>

            <div class="rx-loc-office-grid">
                <?php foreach ($items as $office) :
                    $icon = isset($office['icon']) ? rectify_pb_icon_markup_as_img($office['icon']) : '';
                    $title = isset($office['title']) ? $office['title'] : '';
                    $description = isset($office['description']) ? $office['description'] : '';
                    $address = isset($office['address']) ? $office['address'] : '';
                    $phone = isset($office['phone']) ? $office['phone'] : '';
                    $email = isset($office['email']) ? $office['email'] : '';
                    $map_url = isset($office['map_url']) ? $office['map_url'] : '';

                    if ((!$map_url || trim((string) $map_url) === '#') && $address) {
                        $map_url = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($address);
                    }
                    ?>
                <article class="rx-loc-office-card">
                    <div class="rx-loc-office-body">
                        <?php if ($icon) : ?><span class="rx-loc-office-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-loc-office-description"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                    </div>

                    <div class="rx-loc-office-contact">
                        <?php if ($address) : ?><p class="rx-loc-address"><?php echo esc_html($address); ?></p><?php endif; ?>

                        <?php if ($phone) : ?>
                        <a class="rx-loc-contact-row" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                            <span class="rx-loc-contact-icon" aria-hidden="true"><img src="<?php echo esc_url($phone_icon); ?>" alt=""></span>
                            <?php echo esc_html($phone); ?>
                        </a>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                        <a class="rx-loc-contact-row" href="<?php echo esc_url('mailto:' . $email); ?>">
                            <span class="rx-loc-contact-icon" aria-hidden="true"><img src="<?php echo esc_url($mail_icon); ?>" alt=""></span>
                            <?php echo esc_html($email); ?>
                        </a>
                        <?php endif; ?>
                    </div>

                    <?php if ($map_url) : ?>
                    <a class="rx-loc-map-link" href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener noreferrer">
                        View on Map
                        <img src="<?php echo esc_url($arrow_icon); ?>" alt="" aria-hidden="true">
                    </a>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    $map_pins = array();

    foreach ($map_locations as $location) {
        foreach ($items as $office) {
            $address = isset($office['address']) ? $office['address'] : '';

            if (stripos($address, $location['match']) === false) {
                continue;
            }

            $map_pins[] = array(
                'title'   => isset($office['title']) ? $office['title'] : $address,
                'address' => $address,
                'phone'   => isset($office['phone']) ? $office['phone'] : '',
                'lat'     => $location['lat'],
                'lng'     => $location['lng'],
            );
            break;
        }
    }
    ?>
    <section class="rx-loc-map-section" aria-label="Rectify office locations map">
        <div
            class="rx-loc-map"
            id="rxLocMap"
            data-offices="<?php echo esc_attr(wp_json_encode($map_pins)); ?>"
            data-pin-icon="<?php echo esc_url($map_pin); ?>"
            aria-label="Map showing Rectify office locations across Victoria, Tasmania and South Australia"
        >
            <noscript>
                <img class="rx-loc-map-image" src="<?php echo esc_url($map_image); ?>" alt="Map of southern Australia showing Rectify offices in Adelaide, Melbourne and Hobart">
            </noscript>
        </div>
    </section>
    <?php
}

function rectify_pb_render_loc_footprint($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'A growing footprint';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_loc_image_url(isset($fields['image']) ? $fields['image'] : '', 'images/our-locations/growing-footprint.jpg');
    ?>
    <section class="rx-loc-footprint" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <?php if ($image) : ?>
            <img class="rx-loc-footprint-image" src="<?php echo esc_url($image); ?>" alt="Rectify specialist assessing structural movement at a residential property">
        <?php endif; ?>
        <div class="rx-loc-footprint-shade" aria-hidden="true"></div>
        <div class="rx-wrap rx-loc-footprint-content">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><div class="rx-loc-footprint-copy"><?php echo wp_kses_post(wpautop($copy)); ?></div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_loc_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Unsure Whether Rectify Services Your Location?';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $phone_text = (isset($fields['phone_text']) && $fields['phone_text'] !== '') ? $fields['phone_text'] : '1800 18 20 20';
    $phone_url = (isset($fields['phone_url']) && $fields['phone_url'] !== '') ? $fields['phone_url'] : 'tel:1800182020';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    if (!$items) {
        $items = array(
            array('icon' => 'loc-cta-call', 'title' => 'Call Us', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone' => $phone_text, 'link_text' => '', 'link_url' => $phone_url),
            array('icon' => 'loc-cta-estimate', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'phone' => '', 'link_text' => 'Get My Cost Estimate', 'link_url' => home_url('/assessment/')),
            array('icon' => 'loc-cta-resources', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'phone' => '', 'link_text' => 'Explore Resources', 'link_url' => home_url('/resources/')),
        );
    }

    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    $phone_icon = rectify_pb_theme_asset_url('images/our-locations/phone.svg');
    $arrow_icon = rectify_pb_theme_asset_url('images/our-locations/right-arrow.svg');
    ?>
    <section class="rx-loc-cta" style="<?php echo esc_attr('--rx-loc-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>

            <div class="rx-loc-help-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $card_title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $card_phone = isset($item['phone']) ? $item['phone'] : '';
                    $link_text = isset($item['link_text']) ? $item['link_text'] : '';
                    $link_url = isset($item['link_url']) ? $item['link_url'] : '';

                    if ($link_url && strpos($link_url, '/') === 0) {
                        $link_url = home_url($link_url);
                    }

                    if ($card_phone && !$link_url) {
                        $link_url = 'tel:' . preg_replace('/\s+/', '', $card_phone);
                    }
                    ?>
                    <article class="rx-loc-help-card">
                        <?php if ($icon) : ?><span class="rx-loc-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($card_title) : ?><h3><?php echo esc_html($card_title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-loc-help-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        <?php if ($card_phone) : ?>
                            <a class="rx-loc-help-phone" href="<?php echo esc_url($link_url); ?>"><img src="<?php echo esc_url($phone_icon); ?>" alt="" aria-hidden="true"> <?php echo esc_html($card_phone); ?></a>
                        <?php elseif ($link_text && $link_url) : ?>
                            <a class="rx-loc-help-link" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?><img src="<?php echo esc_url($arrow_icon); ?>" alt="" aria-hidden="true"></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Meet The Team" page (rx-mtt-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_mtt_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Our Team';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Our leadership team';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-mtt-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-mtt-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-mtt-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">&gt;</span>
                    <span>About Us</span>
                    <span aria-hidden="true">&gt;</span>
                    <span>Meet the team</span>
                </nav>
            </div>
            <div class="rx-mtt-hero-intro">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-mtt-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_mtt_philosophy($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-mtt-philosophy-section" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-mtt-philosophy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-mtt-philosophy-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
                <?php if ($body) : ?><div class="rx-mtt-philosophy-copy"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_mtt_team($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-mtt-grid-section" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if (!empty($items)) : ?>
            <div class="rx-mtt-grid">
                <?php foreach ($items as $member) :
                    $image = rectify_pb_image_url(isset($member['image']) ? $member['image'] : 0, 'large');

                    if (!$image) {
                        $image = rectify_pb_theme_asset_url('images/team-bg.jpg');
                    }

                    $name = isset($member['name']) ? $member['name'] : '';
                    $role = isset($member['role']) ? $member['role'] : '';
                    $description = isset($member['description']) ? $member['description'] : '';
                    $email_raw = (isset($member['email_url']) && $member['email_url'] !== '') ? $member['email_url'] : 'admin@rectify.com.au';
                    // The field is a plain email address, but older saved
                    // entries may still carry a "mailto:" or (mistakenly)
                    // "http://" prefix - strip either so the address underneath
                    // is still recognised.
                    $email_address = sanitize_email(preg_replace('#^(mailto:|https?://)#i', '', $email_raw));
                    $linkedin_url = isset($member['linkedin_url']) ? $member['linkedin_url'] : '';
                    $email_icon = rectify_pb_theme_asset_url('images/team/icons/email.png');
                    $linkedin_icon = rectify_pb_theme_asset_url('images/team/icons/linkedin.svg');
                    ?>
                <article class="rx-mtt-card">
                    <figure class="rx-mtt-card-photo">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
                    </figure>
                    <div class="rx-mtt-card-body">
                        <div class="rx-mtt-card-heading">
                            <h3><?php echo esc_html($name); ?></h3>
                        </div>
                        <p><?php echo esc_html($role); ?></p>
                        <div class="rx-mtt-card-contact">
                            <a class="rx-mtt-email" href="<?php echo esc_url('mailto:' . $email_address); ?>" data-email="<?php echo esc_attr($email_address); ?>" data-name="<?php echo esc_attr($name); ?>">
                                <span>EMAIL</span>
                                <img src="<?php echo esc_url($email_icon); ?>" alt="" aria-hidden="true">
                            </a>
                            <?php if ($linkedin_url) : ?>
                                <a class="rx-mtt-card-linkedin" href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($name . ' on LinkedIn'); ?>">
                                    <img src="<?php echo esc_url($linkedin_icon); ?>" alt="" aria-hidden="true">
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if ($description) : ?>
                            <div class="rx-mtt-card-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <div id="rx-mtt-email-modal" class="rx-mtt-email-modal" aria-hidden="true">
                <div class="rx-mtt-email-backdrop" data-rx-mtt-email-close></div>
                <div class="rx-mtt-email-card" role="dialog" aria-modal="true" aria-labelledby="rx-mtt-email-heading" tabindex="-1">
                    <button type="button" class="rx-mtt-email-close" data-rx-mtt-email-close aria-label="Close email form">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h2 id="rx-mtt-email-heading">Email <span id="rx-mtt-email-recipient-name"></span></h2>

                    <form id="rx-mtt-email-form" novalidate>
                        <input type="hidden" name="recipient_email" id="rx-mtt-recipient-email">

                        <div class="rx-mtt-honeypot-wrap" aria-hidden="true">
                            <label for="rx-mtt-company">Company</label>
                            <input type="text" id="rx-mtt-company" name="rx_mtt_company" class="rx-mtt-honeypot" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="rx-mtt-field">
                            <label for="rx-mtt-sender-name">Your Name</label>
                            <input type="text" id="rx-mtt-sender-name" name="sender_name" required>
                        </div>

                        <div class="rx-mtt-field">
                            <label for="rx-mtt-sender-email">Your Email</label>
                            <input type="email" id="rx-mtt-sender-email" name="sender_email" required>
                        </div>

                        <div class="rx-mtt-field">
                            <label for="rx-mtt-subject">Subject</label>
                            <input type="text" id="rx-mtt-subject" name="subject" value="Message from website visitor" required>
                        </div>

                        <div class="rx-mtt-field">
                            <label for="rx-mtt-message">Message</label>
                            <textarea id="rx-mtt-message" name="message" rows="5" required></textarea>
                        </div>

                        <div class="rx-mtt-email-status" id="rx-mtt-email-status" role="status" aria-live="polite"></div>

                        <button type="submit" class="rx-mtt-email-submit">Send Email</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_mtt_why($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $outro = isset($fields['outro']) ? $fields['outro'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/team/why-team-matters.jpg');
    }
    ?>
    <section class="rx-mtt-why" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-mtt-why-media" aria-hidden="true">
            <img src="<?php echo esc_url($image); ?>" alt="">
        </div>
        <div class="rx-wrap">
            <div class="rx-mtt-why-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-mtt-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($outro) : ?><div class="rx-mtt-why-outro"><?php echo wp_kses_post(wpautop($outro)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_mtt_cta($fields, $section_key)
{
    $heading = 'Need Help Choosing the Right Solution?';
    $subtext = 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.';
    $phone_text = '1800 18 20 20';
    $phone_url = 'tel:1800182020';
    $items = array(
        array('icon' => 'call-expert.svg', 'title' => 'Call Us', 'description' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone' => $phone_text, 'link_text' => '', 'link_url' => $phone_url),
        array('icon' => 'estimate-project.svg', 'title' => 'Estimate Project Cost', 'description' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'phone' => '', 'link_text' => 'Get My Cost Estimate', 'link_url' => '/assessment/'),
        array('icon' => 'explore-resources.svg', 'title' => 'Explore Resources', 'description' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'phone' => '', 'link_text' => 'Explore Resources', 'link_url' => '/resources/'),
    );
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    $phone_icon = rectify_pb_theme_asset_url('images/team/icons/telephone.svg');
    $arrow_icon = rectify_pb_theme_asset_url('images/team/icons/right-arrow.svg');

    ?>
    <section class="rx-mtt-cta" style="<?php echo esc_attr('--rx-mtt-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-mtt-cta-heading">
                <h2><?php echo esc_html($heading); ?></h2>
                <?php if ($subtext) : ?><div><?php echo wp_kses_post(wpautop($subtext)); ?></div><?php endif; ?>
            </div>
            <div class="rx-mtt-help-grid">
                <?php foreach ($items as $card) :
                    $card_icon = isset($card['icon']) ? basename($card['icon']) : '';
                    $card_title = isset($card['title']) ? $card['title'] : '';
                    $description = isset($card['description']) ? $card['description'] : '';
                    $card_phone = isset($card['phone']) ? $card['phone'] : '';
                    $link_text = isset($card['link_text']) ? $card['link_text'] : '';
                    $link_url = isset($card['link_url']) ? $card['link_url'] : '';

                    if ($link_url && strpos($link_url, '/') === 0) {
                        $link_url = home_url($link_url);
                    }

                    $icon_url = $card_icon ? rectify_pb_theme_asset_url('images/team/icons/' . $card_icon) : '';
                    ?>
                    <article class="rx-mtt-help-card">
                        <?php if ($icon_url) : ?><span class="rx-mtt-card-icon"><img src="<?php echo esc_url($icon_url); ?>" alt="" aria-hidden="true"></span><?php endif; ?>
                        <?php if ($card_title) : ?><h3><?php echo esc_html($card_title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><div class="rx-mtt-help-copy"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        <?php if ($card_phone) : ?>
                            <a class="rx-mtt-help-phone" href="<?php echo esc_url($link_url ? $link_url : $phone_url); ?>">
                                <img src="<?php echo esc_url($phone_icon); ?>" alt="" aria-hidden="true">
                                <span><?php echo esc_html($card_phone); ?></span>
                            </a>
                        <?php elseif ($link_text && $link_url) : ?>
                            <a class="rx-mtt-help-link" href="<?php echo esc_url($link_url); ?>">
                                <span><?php echo esc_html($link_text); ?></span>
                                <img src="<?php echo esc_url($arrow_icon); ?>" alt="" aria-hidden="true">
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Certifications & Compliance" page (rx-cert-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_cert_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'About Us';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Certifications & Compliance';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'When homeowners choose a structural stabilisation specialist, trust matters.';
    $body = (isset($fields['body']) && $fields['body'] !== '') ? $fields['body'] : 'Part of that trust comes from knowing the business you are dealing with is professional, properly structured, and serious about standards. At Rectify, we place strong importance on registration, compliance, safety, documentation, and the systems that support reliable delivery.';
    $breadcrumb_arrow = rectify_pb_theme_asset_url('images/about-rectify/breadcrumb-arrow.svg');
    ?>
    <section class="rx-cert-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-cert-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span>About Us</span>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_banner($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/certifications-compliance/quality-assurance.png');
    }
    ?>
    <div class="rx-cert-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </div>
    <?php
}

function rectify_pb_render_cert_why_matters($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why this matters';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '') ? $fields['lead'] : 'Structural and ground-related issues are too important to be approached casually.';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/certifications-compliance/why-matters.png');
    }
    ?>
    <section class="rx-cert-why" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-why-grid">
            <div class="rx-cert-why-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-cert-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
                <?php if ($body) : ?><div class="rx-cert-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <figure class="rx-cert-why-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_builder_registration($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Builder Registration';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $registrations = isset($fields['registrations']) && is_array($fields['registrations']) ? $fields['registrations'] : array();
    $logos = isset($fields['logos']) && is_array($fields['logos']) ? $fields['logos'] : array();
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-cert-builder" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-builder-grid">
            <div class="rx-cert-builder-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($intro) : ?><p><?php echo esc_html($intro); ?></p><?php endif; ?>
                <?php if (!empty($registrations)) : ?>
                <ul class="rx-cert-builder-list">
                    <?php foreach ($registrations as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if ($text === '') { continue; }
                        ?>
                    <li><?php echo esc_html($text); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($body) : ?>
                <div class="rx-cert-richtext rx-cert-builder-body"><?php echo wp_kses_post(wpautop($body)); ?></div>
                <?php endif; ?>
            </div>
            <?php if (!empty($logos)) : ?>
            <div class="rx-cert-builder-logos">
                <?php foreach ($logos as $logo) :
                    $logo_field = isset($logo['image']) ? $logo['image'] : 0;
                    $image = is_numeric($logo_field) ? rectify_pb_image_url($logo_field, 'medium') : '';
                    if (!$image && is_string($logo_field) && $logo_field !== '') {
                        $image = rectify_pb_theme_asset_url($logo_field);
                    }
                    $label = isset($logo['label']) ? $logo['label'] : '';
                    if (!$image && $label === '') { continue; }
                    ?>
                <span class="rx-cert-builder-logo">
                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($label); ?>">
                    <?php else : ?>
                    <?php echo esc_html($label); ?>
                    <?php endif; ?>
                </span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_engineering($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineering Oversight';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $link_text = (isset($fields['link_text']) && $fields['link_text'] !== '') ? $fields['link_text'] : 'Insurance Material';
    $link_url = (isset($fields['link_url']) && $fields['link_url'] !== '') ? $fields['link_url'] : '#';
    $insurance_note = isset($fields['insurance_note']) ? $fields['insurance_note'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/certifications-compliance/hero-banner.png');
    }
    ?>
    <section class="rx-cert-engineering" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-engineering-grid">
            <figure class="rx-cert-engineering-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <div class="rx-cert-engineering-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-cert-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($link_text) : ?>
                <a class="rx-cert-engineering-link" href="<?php echo esc_url($link_url); ?>">
                    <?php echo esc_html($link_text); ?> <span aria-hidden="true">&#8594;</span>
                </a>
                <?php endif; ?>
                <?php if ($insurance_note) : ?><div class="rx-cert-richtext rx-cert-engineering-note"><?php echo wp_kses_post(wpautop($insurance_note)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_standards($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Our standards';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '') ? $fields['lead'] : 'We believe these standards support better outcomes for clients and greater confidence throughout the process.';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-cert-standards" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-cert-standards-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-cert-standards-grid">
                <?php foreach ($items as $card) :
                    $icon = isset($card['icon']) ? rectify_pb_icon_markup_as_img($card['icon']) : '';
                    $title = isset($card['title']) ? $card['title'] : '';
                    $description = isset($card['description']) ? $card['description'] : '';
                    ?>
                <article class="rx-cert-standards-card">
                    <?php if ($icon) : ?><span class="rx-cert-standards-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_registration_safety($fields, $section_key)
{
    $left_heading = isset($fields['left_heading']) ? $fields['left_heading'] : '';
    $left_lead = isset($fields['left_lead']) ? $fields['left_lead'] : '';
    $left_body = isset($fields['left_body']) ? $fields['left_body'] : '';
    $right_heading = isset($fields['right_heading']) ? $fields['right_heading'] : '';
    $right_lead = isset($fields['right_lead']) ? $fields['right_lead'] : '';
    $right_intro = isset($fields['right_intro']) ? $fields['right_intro'] : '';
    $right_items = isset($fields['right_items']) && is_array($fields['right_items']) ? $fields['right_items'] : array();
    $right_body = isset($fields['right_body']) ? $fields['right_body'] : '';
    ?>
    <section class="rx-cert-split" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-cert-split-col rx-cert-split-col--left">
            <div class="rx-cert-split-inner">
                <?php if ($left_heading) : ?><h2><?php echo esc_html($left_heading); ?></h2><?php endif; ?>
                <?php if ($left_lead) : ?><p class="rx-cert-lead"><?php echo esc_html($left_lead); ?></p><?php endif; ?>
                <?php if ($left_body) : ?><div class="rx-cert-richtext"><?php echo wp_kses_post(wpautop($left_body)); ?></div><?php endif; ?>
            </div>
        </div>
        <div class="rx-cert-split-col rx-cert-split-col--right">
            <div class="rx-cert-split-inner">
                <?php if ($right_heading) : ?><h2><?php echo esc_html($right_heading); ?></h2><?php endif; ?>
                <?php if ($right_lead) : ?><p class="rx-cert-lead"><?php echo esc_html($right_lead); ?></p><?php endif; ?>
                <?php if ($right_intro) : ?><p class="rx-cert-body"><?php echo wp_kses_post($right_intro); ?></p><?php endif; ?>
                <?php rectify_pb_render_story_checklist($right_items, 'rx-cert-safety-checklist'); ?>
                <?php if ($right_body) : ?><div class="rx-cert-richtext"><?php echo wp_kses_post(wpautop($right_body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_confidence($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Confidence Through Professionalism';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '') ? $fields['lead'] : 'For homeowners, compliance is not about jargon. <strong class="rx-cert-accent">It is about confidence.</strong>';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/certifications-compliance/rig-in-driveway.jpg');
    }
    ?>
    <section class="rx-cert-confidence" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-confidence-grid">
            <div class="rx-cert-confidence-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-cert-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                <?php if ($body) : ?><p class="rx-cert-body"><?php echo wp_kses_post($body); ?></p><?php endif; ?>
                <?php rectify_pb_render_story_checklist($items, 'rx-cert-confidence-checklist'); ?>
                <?php if ($closing) : ?><p class="rx-cert-confidence-closing"><?php echo wp_kses_post($closing); ?></p><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-cert-confidence-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_systems($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Systems and accountability';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '') ? $fields['lead'] : 'Rectify continues to invest in the systems and processes that support consistency and accountability.';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/certifications-compliance/systems-warehouse.jpg');
    }
    ?>
    <section class="rx-cert-systems" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-cert-systems-grid">
            <figure class="rx-cert-systems-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <div class="rx-cert-systems-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-cert-lead"><?php echo esc_html($lead); ?></p><?php endif; ?>
                <?php if ($body) : ?><p class="rx-cert-body"><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cert_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Need Help Choosing the Right Solution?';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $phone_text = (isset($fields['phone_text']) && $fields['phone_text'] !== '') ? $fields['phone_text'] : '1800 18 20 20';
    $phone_url = (isset($fields['phone_url']) && $fields['phone_url'] !== '') ? $fields['phone_url'] : 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-cert-cta" style="<?php echo esc_attr('--rx-cert-cta-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>

            <div class="rx-cert-help-grid">
                <article class="rx-cert-help-card">
                    <span class="rx-cert-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Call Expert.svg')); ?>" alt=""></span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-cert-help-phone" href="<?php echo esc_url($phone_url); ?>">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_1115_1346)">
                                <path d="M22.6795 1.32019C21.7996 0.440119 20.7395 0 19.5001 0H4.49997C3.2605 0 2.20043 0.440119 1.32019 1.32019C0.440119 2.20043 0 3.26045 0 4.49997V19.4999C0 20.7393 0.440119 21.7995 1.32019 22.6797C2.20043 23.5599 3.2605 24.0001 4.49997 24.0001H19.4999C20.7394 24.0001 21.7995 23.5599 22.6793 22.6797C23.5596 21.7995 23.9997 20.7394 23.9997 19.4999V4.49997C23.9996 3.26045 23.5595 2.20027 22.6795 1.32019ZM19.6557 18.2174C19.437 18.6965 18.9448 19.1133 18.1793 19.4677C17.4137 19.822 16.7338 19.9992 16.1399 19.9992C15.9732 19.9992 15.7961 19.9863 15.6086 19.9603C15.4211 19.9341 15.2625 19.9082 15.1323 19.8821C15.0022 19.8561 14.8301 19.8093 14.6167 19.7415C14.403 19.674 14.2492 19.6217 14.1558 19.5853C14.0618 19.549 13.8901 19.4838 13.6402 19.3901C13.3902 19.2961 13.2338 19.2388 13.1717 19.2184C11.4633 18.593 9.79382 17.4656 8.16371 15.8355C6.53359 14.205 5.40593 12.5358 4.78089 10.8278C4.7602 10.7652 4.7029 10.6089 4.60904 10.359C4.51535 10.1092 4.45006 9.93721 4.41361 9.84357C4.37738 9.74982 4.32523 9.59615 4.25747 9.38276C4.18978 9.16916 4.14304 8.99743 4.11693 8.86707C4.09077 8.73703 4.06494 8.57827 4.03884 8.39072C4.01279 8.20317 3.99982 8.02585 3.99982 7.85931C3.99982 7.26552 4.17697 6.58586 4.53122 5.82022C4.88542 5.05469 5.302 4.56253 5.78125 4.34373C6.33334 4.11447 6.85939 3.99987 7.35943 3.99987C7.47387 3.99987 7.55733 4.01038 7.60926 4.03118C7.66142 4.05225 7.74739 4.14578 7.86725 4.31248C7.9871 4.47918 8.11724 4.69004 8.25784 4.94529C8.39849 5.20059 8.53651 5.44802 8.67191 5.68751C8.8073 5.92705 8.93756 6.16391 9.06261 6.39847C9.1876 6.63265 9.2657 6.78129 9.2969 6.84357C9.32815 6.89594 9.3959 6.99473 9.49999 7.14069C9.60408 7.28643 9.6824 7.41646 9.73439 7.53117C9.78638 7.64577 9.81248 7.75517 9.81248 7.85931C9.81248 8.01578 9.7056 8.20579 9.49211 8.42957C9.27851 8.65357 9.04411 8.85941 8.78886 9.04696C8.53361 9.23451 8.29932 9.43508 8.08577 9.64863C7.87239 9.86201 7.76551 10.0365 7.76551 10.1719C7.76551 10.2449 7.78373 10.3308 7.82024 10.4297C7.85669 10.5289 7.89056 10.6096 7.92181 10.672C7.95306 10.7344 8.00264 10.823 8.07023 10.9377C8.13793 11.0524 8.18231 11.1253 8.203 11.1566C8.77584 12.1878 9.43481 13.0759 10.1794 13.8208C10.9244 14.5658 11.8123 15.2244 12.8437 15.7974C12.8747 15.8184 12.9478 15.8626 13.0628 15.9304C13.1772 15.9978 13.266 16.0473 13.3284 16.0785C13.391 16.1098 13.4715 16.1437 13.5706 16.1799C13.6697 16.2162 13.7556 16.2345 13.8288 16.2345C13.995 16.2345 14.2242 16.0628 14.5162 15.7191C14.8078 15.3751 15.1049 15.034 15.407 14.6954C15.7088 14.3572 15.9534 14.1879 16.1413 14.1879C16.2454 14.1879 16.3546 14.2138 16.4696 14.2658C16.5843 14.3179 16.7142 14.3962 16.8599 14.5003C17.006 14.6048 17.1049 14.6722 17.157 14.7039L17.9847 15.1566C18.5369 15.4484 18.9978 15.7061 19.3677 15.9301C19.7376 16.1541 19.9382 16.3077 19.9695 16.3908C19.9902 16.4429 20.0003 16.5265 20.0003 16.6411C20 17.1406 19.8853 17.6667 19.6557 18.2174Z" fill="#BD1726"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1115_1346">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                        </span> <?php echo esc_html($phone_text); ?>
                    </a>
                </article>
                <article class="rx-cert-help-card">
                    <span class="rx-cert-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Request Assessment 1.svg')); ?>" alt=""></span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-cert-help-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">GET MY COST ESTIMATE <span aria-hidden="true">&#8594;</span></a>
                </article>
                <article class="rx-cert-help-card">
                    <span class="rx-cert-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Explore Resources 1.svg')); ?>" alt=""></span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-cert-help-link" href="<?php echo esc_url(home_url('/resources/')); ?>">EXPLORE RESOURCES <span aria-hidden="true">&#8594;</span></a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Careers" page (rx-careers-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_careers_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Careers';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Why Work at Rectify';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-careers-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-careers-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-careers-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">&gt;</span>
                    <span>About Us</span>
                    <span aria-hidden="true">&gt;</span>
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-careers-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_banner($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/careers/hero-banner.jpg');
    }
    ?>
    <div class="rx-careers-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </div>
    <?php
}

/**
 * Renders a checklist item's icon: the same red-circle/white-tick "Check
 * Icon" graphic already used on the Our Story page (Figma node 864:14012),
 * reused as-is so every checklist across the site stays visually identical.
 */
function rectify_pb_careers_check_icon()
{
    static $url = null;

    if ($url === null) {
        $url = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    }

    return '<img src="' . esc_url($url) . '" alt="" width="24" height="24">';
}

function rectify_pb_render_careers_why_work($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why work at Rectify';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/careers/team-photo.jpg');
    }
    ?>
    <section class="rx-careers-why-work" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-careers-why-work-grid">
            <div class="rx-careers-why-work-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ul class="rx-careers-checklist">
                    <?php foreach ($items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><?php echo rectify_pb_careers_check_icon(); ?><span><?php echo esc_html($text); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-careers-why-work-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_culture($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Our culture';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/careers/culture-bg.jpg');
    }
    $style = $image ? '--rx-careers-culture-bg:url(' . $image . ');' : '';
    ?>
    <section class="rx-careers-culture" style="<?php echo esc_attr($style); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-careers-culture-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-careers-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_standards($fields, $section_key)
{
    $left_heading = isset($fields['left_heading']) ? $fields['left_heading'] : '';
    $left_subheading = isset($fields['left_subheading']) ? $fields['left_subheading'] : '';
    $left_body = isset($fields['left_body']) ? $fields['left_body'] : '';
    $right_heading = isset($fields['right_heading']) ? $fields['right_heading'] : '';
    $right_subheading = isset($fields['right_subheading']) ? $fields['right_subheading'] : '';
    $right_body = isset($fields['right_body']) ? $fields['right_body'] : '';
    ?>
    <section class="rx-careers-standards" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-careers-standards-col rx-careers-standards-col-left">
            <div class="rx-careers-standards-inner">
                <?php if ($left_heading) : ?><h2><?php echo esc_html($left_heading); ?></h2><?php endif; ?>
                <?php if ($left_subheading) : ?><h3><?php echo esc_html($left_subheading); ?></h3><?php endif; ?>
                <?php if ($left_body) : ?><p><?php echo wp_kses_post($left_body); ?></p><?php endif; ?>
            </div>
        </div>
        <div class="rx-careers-standards-col rx-careers-standards-col-right">
            <div class="rx-careers-standards-inner">
                <?php if ($right_heading) : ?><h2><?php echo esc_html($right_heading); ?></h2><?php endif; ?>
                <?php if ($right_subheading) : ?><h3><?php echo esc_html($right_subheading); ?></h3><?php endif; ?>
                <?php if ($right_body) : ?><div class="rx-careers-richtext"><?php echo wp_kses_post(wpautop($right_body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_standards_matter($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Standards matter here';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/careers/laser-level.jpg');
    }
    ?>
    <section class="rx-careers-standards-matter" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-careers-standards-matter-grid">
            <div class="rx-careers-standards-matter-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-careers-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-careers-standards-matter-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_fit($fields, $section_key)
{
    $left_heading = isset($fields['left_heading']) ? $fields['left_heading'] : '';
    $left_body = isset($fields['left_body']) ? $fields['left_body'] : '';
    $left_items = isset($fields['left_items']) && is_array($fields['left_items']) ? $fields['left_items'] : array();
    $right_heading = isset($fields['right_heading']) ? $fields['right_heading'] : '';
    $right_subheading = isset($fields['right_subheading']) ? $fields['right_subheading'] : '';
    $right_body = isset($fields['right_body']) ? $fields['right_body'] : '';
    $right_items = isset($fields['right_items']) && is_array($fields['right_items']) ? $fields['right_items'] : array();
    ?>
    <section class="rx-careers-fit" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-careers-fit-grid">
            <article class="rx-careers-fit-card">
                <?php if ($left_heading) : ?><h2><?php echo esc_html($left_heading); ?></h2><?php endif; ?>
                <?php if ($left_body) : ?><p><?php echo wp_kses_post($left_body); ?></p><?php endif; ?>
                <?php if (!empty($left_items)) : ?>
                <ul class="rx-careers-checklist">
                    <?php foreach ($left_items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><?php echo rectify_pb_careers_check_icon(); ?><span><?php echo esc_html($text); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </article>
            <article class="rx-careers-fit-card">
                <?php if ($right_heading) : ?><h2><?php echo esc_html($right_heading); ?></h2><?php endif; ?>
                <?php if ($right_subheading) : ?><h3><?php echo esc_html($right_subheading); ?></h3><?php endif; ?>
                <?php if ($right_body) : ?><p><?php echo wp_kses_post($right_body); ?></p><?php endif; ?>
                <?php if (!empty($right_items)) : ?>
                <ul class="rx-careers-checklist">
                    <?php foreach ($right_items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><?php echo rectify_pb_careers_check_icon(); ?><span><?php echo esc_html($text); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </article>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_why_join($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Join Now';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/careers/why-join-bg.jpg');
    }
    $style = $image ? '--rx-careers-why-join-bg:url(' . $image . ');' : '';
    ?>
    <section class="rx-careers-why-join" style="<?php echo esc_attr($style); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-careers-why-join-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_careers_jobs($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Opportunities Across Australia';
    $subtitle = isset($fields['subtitle']) ? $fields['subtitle'] : '';
    $placeholder_items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();

    // Real Job Opportunities (from the job_opportunity CPT, if any are
    // published) always take priority over the builder's placeholder list,
    // matching the page's original fallback behaviour.
    $job_opportunity_query = post_type_exists('job_opportunity')
        ? new WP_Query(array(
            'post_type' => 'job_opportunity',
            'posts_per_page' => -1,
            'orderby' => 'menu_order title',
            'order' => 'ASC',
            'no_found_rows' => true,
        ))
        : null;

    $has_job_opportunities = $job_opportunity_query instanceof WP_Query && $job_opportunity_query->have_posts();

    if ($has_job_opportunities) {
        $job_filters = array(array('key' => 'all', 'label' => 'All'));

        $job_categories = get_terms(array(
            'taxonomy' => 'job_category',
            'hide_empty' => false,
            'orderby' => 'term_id',
            'order' => 'ASC',
        ));

        if (!is_wp_error($job_categories)) {
            foreach ($job_categories as $job_category) {
                $job_filters[] = array('key' => $job_category->slug, 'label' => $job_category->name);
            }
        }

        $jobs = array();

        while ($job_opportunity_query->have_posts()) {
            $job_opportunity_query->the_post();

            $job_terms = get_the_terms(get_the_ID(), 'job_category');
            $job_term_slugs = ($job_terms && !is_wp_error($job_terms)) ? wp_list_pluck($job_terms, 'slug') : array();
            $job_summary = function_exists('get_field') ? get_field('job_summary') : '';

            $jobs[] = array(
                'category' => implode(' ', $job_term_slugs),
                'title' => get_the_title(),
                'copy' => $job_summary ? $job_summary : get_the_excerpt(),
                'url' => get_permalink(),
            );
        }

        wp_reset_postdata();
    } else {
        $job_filters = array(
            array('key' => 'all', 'label' => 'All'),
            array('key' => 'business-development', 'label' => 'Business Development'),
            array('key' => 'operations', 'label' => 'Operations'),
            array('key' => 'technical-engineering', 'label' => 'Technical & Engineering'),
            array('key' => 'field-operations', 'label' => 'Field Operations'),
            array('key' => 'corporate-support', 'label' => 'Corporate Support'),
        );

        $jobs = array();

        foreach ($placeholder_items as $item) {
            $jobs[] = array(
                'category' => isset($item['category']) ? $item['category'] : '',
                'title' => isset($item['title']) ? $item['title'] : '',
                'copy' => isset($item['description']) ? $item['description'] : '',
                'url' => isset($item['url']) ? $item['url'] : '#',
            );
        }
    }
    ?>
    <section class="rx-careers-jobs" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-careers-section-head">
                <h2><?php echo esc_html($heading); ?></h2>
                <?php if ($subtitle) : ?><span class="rx-careers-subtitle"><?php echo esc_html($subtitle); ?></span><?php endif; ?>
            </div>

            <div class="rx-careers-filters" role="tablist" aria-label="Filter job categories">
                <?php foreach ($job_filters as $index => $filter) : ?>
                <button type="button" class="rx-careers-filter<?php echo 0 === $index ? ' is-active' : ''; ?>" data-rx-job-filter="<?php echo esc_attr($filter['key']); ?>">
                    <?php echo esc_html(strtoupper(wp_specialchars_decode($filter['label'], ENT_QUOTES))); ?>
                </button>
                <?php endforeach; ?>
            </div>

            <div class="rx-careers-job-grid">
                <?php foreach ($jobs as $job) : ?>
                <article class="rx-careers-job-card" data-rx-job-category="<?php echo esc_attr($job['category']); ?>">
                    <span class="rx-careers-job-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_House.svg')); ?>" alt=""></span>
                    <h3><?php echo esc_html($job['title']); ?></h3>
                    <p><?php echo esc_html($job['copy']); ?></p>
                    <a class="rx-careers-job-link" href="<?php echo esc_url($job['url']); ?>">
                        See Job Details
                        <span class="rx-careers-arrow-icon" aria-hidden="true"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/right-arrow.svg')); ?>" alt=""></span>
                    </a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
        (function () {
            var filters = document.querySelectorAll('[data-rx-job-filter]');
            var jobs = document.querySelectorAll('[data-rx-job-category]');

            filters.forEach(function (button) {
                button.addEventListener('click', function () {
                    filters.forEach(function (btn) { btn.classList.remove('is-active'); });
                    button.classList.add('is-active');

                    var category = button.getAttribute('data-rx-job-filter');

                    jobs.forEach(function (job) {
                        var jobCategories = (job.getAttribute('data-rx-job-category') || '').split(' ');
                        var show = 'all' === category || jobCategories.indexOf(category) !== -1;
                        job.style.display = show ? '' : 'none';
                    });
                });
            });
        })();
    </script>
    <?php
}

function rectify_pb_render_careers_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Need Help Choosing the Right Solution?';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $phone_text = (isset($fields['phone_text']) && $fields['phone_text'] !== '') ? $fields['phone_text'] : '1800 18 20 20';
    $phone_url = (isset($fields['phone_url']) && $fields['phone_url'] !== '') ? $fields['phone_url'] : 'tel:1800182020';
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-careers-cta" style="<?php echo esc_attr('--rx-careers-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>

            <div class="rx-careers-help-grid">
                <article class="rx-careers-help-card">
                    <span class="rx-careers-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Call Expert 1.svg')); ?>" alt=""></span>
                    <h3>Call Us</h3>
                    <p>Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.</p>
                    <a class="rx-careers-help-phone" href="<?php echo esc_url($phone_url); ?>">
                        <span class="rx-careers-help-phone-icon" aria-hidden="true"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/telephone-symbol-button.svg')); ?>" alt=""></span> <?php echo esc_html($phone_text); ?>
                    </a>
                </article>
                <article class="rx-careers-help-card">
                    <span class="rx-careers-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Request Assessment 1.svg')); ?>" alt=""></span>
                    <h3>Estimate Project Cost</h3>
                    <p>Use our interactive estimator to understand the likely investment before requesting a professional assessment.</p>
                    <a class="rx-careers-help-link" href="<?php echo esc_url(home_url('/assessment/')); ?>">GET MY COST ESTIMATE <span class="rx-careers-arrow-icon" aria-hidden="true"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/right-arrow.svg')); ?>" alt=""></span></a>
                </article>
                <article class="rx-careers-help-card">
                    <span class="rx-careers-card-icon"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/Rectify Icon Set_Explore Resources 1.svg')); ?>" alt=""></span>
                    <h3>Explore Resources</h3>
                    <p>Access practical guides, real project case studies, and expert insights on structural movement and remediation.</p>
                    <a class="rx-careers-help-link" href="<?php echo esc_url(home_url('/resources/')); ?>">EXPLORE RESOURCES <span class="rx-careers-arrow-icon" aria-hidden="true"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/right-arrow.svg')); ?>" alt=""></span></a>
                </article>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Assessment page: hero copy (left column above/beside the always-hardcoded
 * cost calculator card). Kicker, H1, intro paragraph and a short bullet list.
 */
function rectify_pb_render_assessment_title($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Pricing';
    $title = isset($fields['title']) ? $fields['title'] : '';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : $title;
    ?>
    <section class="ra-title-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <span class="ra-kicker ra-kicker-red"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <nav class="ra-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html($breadcrumb_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_assessment_hero($fields, $section_key)
{
    // Note: the page's kicker/H1/breadcrumb live in the always-hardcoded
    // title band above this section (driven by the post title), so
    // "heading" here is the hero's H2, not the page H1.
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $checklist = isset($fields['checklist']) && is_array($fields['checklist']) ? $fields['checklist'] : array();
    ?>
    <div class="ra-hero-copy" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
        <?php if ($intro) : ?><p><?php echo wp_kses_post($intro); ?></p><?php endif; ?>
        <?php if (!empty($checklist)) : ?>
            <p class="ra-hero-label">Before You Estimate</p>
            <ul class="ra-hero-list">
                <?php foreach ($checklist as $item) :
                    $text = isset($item['text']) ? $item['text'] : '';
                    if (!$text) { continue; }
                    ?>
                    <li><?php echo esc_html($text); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Variant config for the assessment page's 3-card grid, reused for both the
 * "Typical Investment by Solution" and "Typical project examples" sections
 * (same schema, different section_key -> different visual treatment), same
 * pattern as rectify_pb_feature_grid_variant().
 */
function rectify_pb_assessment_card_grid_variant($section_key)
{
    if ($section_key === 'assessment-examples') {
        return array(
            'wrapper_class' => 'ra-scenario-band',
            'grid_class' => 'ra-scenarios',
            'card_class' => 'ra-scenario',
        );
    }

    return array(
        'wrapper_class' => '',
        'grid_class' => 'ra-card-grid',
        'card_class' => 'ra-card',
    );
}

function rectify_pb_render_assessment_card_grid($fields, $section_key)
{
    $variant = rectify_pb_assessment_card_grid_variant($section_key);
    $is_examples = ($section_key === 'assessment-examples');

    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $footnote = isset($fields['footnote']) ? $fields['footnote'] : '';
    ?>
    <section class="ra-section <?php echo $is_examples ? '' : 'ra-section-white'; ?>" id="<?php echo $is_examples ? 'scenarios' : 'ranges'; ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading || $lead) : ?>
                <div class="ra-section-head<?php echo $is_examples ? ' ra-section-head--stack' : ''; ?>">
                    <div>
                        <?php if ($kicker) : ?><span class="ra-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                        <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                    </div>
                    <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($variant['grid_class']); ?>">
                <?php foreach ($items as $item) :
                    $title = isset($item['title']) ? $item['title'] : '';
                    $price_prefix = isset($item['price_prefix']) ? $item['price_prefix'] : '';
                    $price = isset($item['price']) ? $item['price'] : '';
                    $price_suffix = isset($item['price_suffix']) ? $item['price_suffix'] : '';
                    $list_label = isset($item['list_label']) ? $item['list_label'] : '';
                    $price_line = isset($item['price_line']) ? $item['price_line'] : '';
                    $list_html = isset($item['list_html']) ? $item['list_html'] : '';
                    $footer_note = isset($item['footer_note']) ? $item['footer_note'] : '';

                    $price_block = '';
                    if ($price !== '') {
                        $price_block = '<div class="ra-price">';
                        if ($price_prefix !== '') {
                            $price_block .= '<span class="ra-price-prefix">' . esc_html($price_prefix) . '</span>';
                        }
                        $price_block .= '<p class="ra-price-value">' . esc_html($price);
                        if ($price_suffix !== '') {
                            $price_block .= ' <span class="ra-price-suffix">' . esc_html($price_suffix) . '</span>';
                        }
                        $price_block .= '</p></div>';
                    } elseif ($price_line !== '') {
                        $price_block = '<p class="ra-card-price"><strong>' . esc_html($price_line) . '</strong></p>';
                    }
                    ?>
                    <article class="<?php echo esc_attr($variant['card_class']); ?>">
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if (!$is_examples) : ?><?php echo $price_block; ?><?php endif; ?>
                        <?php if ($list_label) : ?><p class="ra-list-label"><?php echo esc_html($list_label); ?></p><?php endif; ?>
                        <?php if ($list_html) : ?><div class="ra-list<?php echo $is_examples ? ' ra-list-arrows' : ''; ?>"><?php echo wp_kses_post($list_html); ?></div><?php endif; ?>
                        <?php if ($is_examples) : ?><?php echo $price_block; ?><?php endif; ?>
                        <?php if ($footer_note) : ?><p class="ra-card-note"><?php echo wp_kses_post($footer_note); ?></p><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php if ($footnote) : ?><p class="ra-scenarios-footnote"><?php echo wp_kses_post($footnote); ?></p><?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Assessment page: dark "Why are these shown as ranges?" band - intro copy +
 * photo on one side, two labelled checklists (cost influence / inclusions)
 * on the other.
 */
function rectify_pb_render_assessment_image_checklists($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $list1_heading = isset($fields['list1_heading']) ? $fields['list1_heading'] : '';
    $list1_items = isset($fields['list1_items']) ? $fields['list1_items'] : '';
    $list2_heading = isset($fields['list2_heading']) ? $fields['list2_heading'] : '';
    $list2_items = isset($fields['list2_items']) ? $fields['list2_items'] : '';
    $footnote = isset($fields['footnote']) ? $fields['footnote'] : '';
    ?>
    <section class="ra-section ra-section-dark ra-why-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap ra-why-grid">
            <?php if ($image) : ?>
                <div class="ra-why-media"><img src="<?php echo esc_url($image); ?>" alt=""></div>
            <?php endif; ?>
            <div class="ra-why-copy">
                <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
                <?php if ($intro) : ?><p><?php echo wp_kses_post($intro); ?></p><?php endif; ?>
                <div class="ra-why-lists">
                    <?php if ($list1_heading || $list1_items) : ?>
                        <div>
                            <?php if ($list1_heading) : ?><h4><?php echo esc_html($list1_heading); ?></h4><?php endif; ?>
                            <?php if ($list1_items) : ?><div class="ra-list"><?php echo wp_kses_post($list1_items); ?></div><?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($list2_heading || $list2_items) : ?>
                        <div>
                            <?php if ($list2_heading) : ?><h4><?php echo esc_html($list2_heading); ?></h4><?php endif; ?>
                            <?php if ($list2_items) : ?><div class="ra-list"><?php echo wp_kses_post($list2_items); ?></div><?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($footnote) : ?><p class="ra-why-footnote"><?php echo esc_html($footnote); ?></p><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Assessment page - full-width dark banner CTA shown near the bottom of the
 * page (heading, copy, single button), styled via .ra-cta-band in
 * assets/css/inner-pages.css rather than the sitewide .rx-residential-cta.
 */
function rectify_pb_render_assessment_cta($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $button_text = isset($fields['button_text']) ? $fields['button_text'] : '';
    $button_url = isset($fields['button_url']) ? $fields['button_url'] : '';
    ?>
    <section class="ra-section ra-section-dark ra-cta-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo wp_kses_post($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><?php echo wp_kses_post(wpautop($copy)); ?><?php endif; ?>
            <?php if ($button_text) : ?>
                <div class="ra-cta-actions">
                    <a class="ra-btn-cta" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Our Story" page (rx-story-* markup, shares the rx-mtt-* base styles).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_story_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'About Us';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Our Story';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    ?>
    <section class="rx-mtt-hero rx-story-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-mtt-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-mtt-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span aria-hidden="true">&gt;</span>
                    <span>About Us</span>
                    <span aria-hidden="true">&gt;</span>
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div class="rx-mtt-hero-intro">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><p class="rx-story-hero-statement"><?php echo esc_html($subheading); ?></p><?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_background_media($image, $class_name)
{
    if (!$image) {
        return;
    }

    $style = '--rx-story-media:url(' . esc_url_raw($image) . ');';
    ?>
    <figure class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>" aria-hidden="true"></figure>
    <?php
}

function rectify_pb_render_story_began($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    ?>
    <section class="rx-story-began" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-began-grid">
            <div class="rx-story-began-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php rectify_pb_render_story_background_media($image, 'rx-story-began-media'); ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_checklist($items, $class_name = '')
{
    if (empty($items) || !is_array($items)) {
        return;
    }

    $check = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <ul class="rx-story-checklist <?php echo esc_attr($class_name); ?>">
        <?php foreach ($items as $item) :
            $text = isset($item['text']) ? $item['text'] : '';

            if ($text === '') {
                continue;
            }
            ?>
            <li>
                <img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true">
                <span><?php echo esc_html($text); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}

function rectify_pb_render_story_problem($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $emphasis = isset($fields['emphasis']) ? $fields['emphasis'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-story-problem" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-problem-grid">
            <div class="rx-story-problem-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($intro) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
                <?php rectify_pb_render_story_checklist($items); ?>
                <?php if ($emphasis) : ?><div class="rx-story-emphasis"><?php echo wp_kses_post(wpautop($emphasis)); ?></div><?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($closing) : ?><p class="rx-story-closing"><?php echo esc_html($closing); ?></p><?php endif; ?>
            </div>
            <?php rectify_pb_render_story_background_media($image, 'rx-story-problem-media'); ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_work($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $body = isset($fields['body']) ? $fields['body'] : '';
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $check = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <section class="rx-story-work" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-work-grid">
            <?php rectify_pb_render_story_background_media($image, 'rx-story-work-media'); ?>
            <div class="rx-story-work-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($intro) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($intro)); ?></div><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <div class="rx-story-pillars">
                    <?php foreach ($items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if ($text === '') {
                            continue;
                        }
                        ?>
                        <div class="rx-story-pillar">
                            <img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true">
                            <span><?php echo esc_html($text); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($closing) : ?><div class="rx-story-emphasis"><?php echo wp_kses_post(wpautop($closing)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_values($fields, $section_key)
{
    $columns = array(
        array(
            'heading' => isset($fields['left_heading']) ? $fields['left_heading'] : '',
            'copy' => isset($fields['left_copy']) ? $fields['left_copy'] : '',
            'items' => isset($fields['left_items']) && is_array($fields['left_items']) ? $fields['left_items'] : array(),
        ),
        array(
            'heading' => isset($fields['right_heading']) ? $fields['right_heading'] : '',
            'copy' => isset($fields['right_copy']) ? $fields['right_copy'] : '',
            'items' => isset($fields['right_items']) && is_array($fields['right_items']) ? $fields['right_items'] : array(),
        ),
    );
    ?>
    <section class="rx-story-values" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-story-values-grid">
            <?php foreach ($columns as $index => $column) : ?>
            <div class="rx-story-values-panel rx-story-values-panel-<?php echo (int) ($index + 1); ?>">
                <div class="rx-story-values-inner">
                    <?php if ($column['heading']) : ?><h2><?php echo esc_html($column['heading']); ?></h2><?php endif; ?>
                    <?php if ($column['copy']) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($column['copy'])); ?></div><?php endif; ?>
                    <?php rectify_pb_render_story_checklist($column['items']); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_growth($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-story-growth" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-growth-grid">
            <div class="rx-story-growth-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><div class="rx-story-growth-lead"><?php echo wp_kses_post(wpautop($subheading)); ?></div><?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <?php rectify_pb_render_story_background_media($image, 'rx-story-growth-media'); ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_belief($fields, $section_key)
{
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $principles = isset($fields['principles']) && is_array($fields['principles']) ? $fields['principles'] : array();
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    ?>
    <section class="rx-story-belief" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-belief-grid">
            <?php if ($image) : ?>
            <figure class="rx-story-belief-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-story-belief-copy">
                <?php if ($intro) : ?><p class="rx-story-belief-intro"><?php echo esc_html($intro); ?></p><?php endif; ?>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if (!empty($principles)) : ?>
                <div class="rx-story-belief-principles">
                    <?php foreach ($principles as $principle) :
                        $text = isset($principle['text']) ? $principle['text'] : '';
                        if ($text !== '') : ?><strong><?php echo esc_html($text); ?></strong><?php endif;
                    endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($closing) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($closing)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_name($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-story-name" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-name-grid">
            <?php rectify_pb_render_story_background_media($image, 'rx-story-name-media'); ?>
            <div class="rx-story-name-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-story-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_philosophy($fields, $section_key)
{
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $statement = isset($fields['statement']) ? $fields['statement'] : '';
    ?>
    <section class="rx-story-philosophy" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($intro) : ?><p class="rx-story-philosophy-intro"><?php echo esc_html($intro); ?></p><?php endif; ?>
            <?php if ($statement) : ?><p class="rx-story-philosophy-statement"><?php echo esc_html($statement); ?></p><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_growing($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $list_heading = isset($fields['list_heading']) ? $fields['list_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $outro = isset($fields['outro']) ? $fields['outro'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    $check = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <section class="rx-story-growing" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-growing-grid">
            <div class="rx-story-growing-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($copy) : ?><?php echo wp_kses_post(wpautop($copy)); ?><?php endif; ?>
                <?php if ($list_heading) : ?><p class="rx-story-growing-list-heading"><?php echo esc_html($list_heading); ?></p><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ul class="rx-story-checklist">
                    <?php foreach ($items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';

                        if ($text === '') {
                            continue;
                        }
                        ?>
                    <li>
                        <?php if ($check) : ?><img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true"><?php endif; ?>
                        <span><?php echo esc_html($text); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($outro) : ?><div class="rx-story-growing-outro"><?php echo wp_kses_post(wpautop($outro)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-story-growing-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_purpose($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-story-purpose" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-purpose-grid">
            <?php if ($image) : ?>
            <figure class="rx-story-purpose-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-story-purpose-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><div class="rx-story-purpose-subheading"><?php echo wp_kses_post(wpautop($subheading)); ?></div><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_drives($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-story-drives" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-story-drives-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'medium');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-story-drives-card">
                    <?php if ($icon) : ?><span class="rx-story-card-icon"><img src="<?php echo esc_url($icon); ?>" alt=""></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_ahead($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');
    $style = $image ? '--rx-story-ahead-bg:url(' . $image . ');' : '';
    ?>
    <section class="rx-story-ahead" style="<?php echo esc_attr($style); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <div class="rx-story-ahead-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($copy) : ?><?php echo wp_kses_post(wpautop($copy)); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_vision($fields, $section_key)
{
    $intro = isset($fields['intro']) ? $fields['intro'] : '';
    $statement = isset($fields['statement']) ? $fields['statement'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');
    ?>
    <section class="rx-story-vision" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-story-vision-grid">
            <div class="rx-story-vision-copy">
                <?php if ($intro) : ?><p class="rx-story-vision-intro"><?php echo esc_html($intro); ?></p><?php endif; ?>
                <?php if ($statement) : ?><div class="rx-story-vision-statement"><?php echo wp_kses_post(wpautop($statement)); ?></div><?php endif; ?>
                <?php if ($copy) : ?><?php echo wp_kses_post(wpautop($copy)); ?><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-story-vision-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_story_principles($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-story-principles" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-story-principles-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'medium');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-story-principle-card">
                    <?php if ($icon) : ?><span class="rx-story-card-icon"><img src="<?php echo esc_url($icon); ?>" alt=""></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "About Rectify" page (rx-about-rectify-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_ar_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'ABOUT US';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'About Rectify';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $breadcrumb_arrow = rectify_pb_theme_asset_url('images/about-rectify/breadcrumb-arrow.svg');
    ?>
    <section class="rx-about-rectify-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-about-rectify-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span>About Us</span>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div class="rx-about-rectify-hero-intro">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-about-rectify-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_banner($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-rectify/about-banner.jpg');
    }
    ?>
    <div class="rx-about-rectify-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </div>
    <?php
}

function rectify_pb_render_ar_intro($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-rectify/who-we-are.png');
    }
    ?>
    <section class="rx-about-rectify-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-intro-grid">
            <div class="rx-about-rectify-intro-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p class="rx-about-rectify-intro-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-about-rectify-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_vision($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $copy = isset($fields['copy']) ? $fields['copy'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-rectify/vision-tunnel.jpg');
    }
    $style = $image ? '--rx-about-rectify-vision-bg:url(' . $image . ');' : '';
    ?>
    <section class="rx-about-rectify-vision<?php echo $image ? ' has-image' : ''; ?>" style="<?php echo esc_attr($style); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_what($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-about-rectify-what" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-about-rectify-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-about-rectify-what-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-about-rectify-what-card">
                    <?php if ($icon) : ?><span class="rx-about-rectify-what-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_serve($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-about-rectify-serve" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <div class="rx-about-rectify-section-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-about-rectify-serve-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0, 'large');
                    $title = isset($item['title']) ? $item['title'] : '';

                    if (!$image) {
                        continue;
                    }
                    ?>
                <figure class="rx-about-rectify-serve-card">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                    <?php if ($title) : ?><figcaption><?php echo esc_html($title); ?></figcaption><?php endif; ?>
                </figure>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_stats($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $google_logo = rectify_pb_theme_asset_url('images/google-logo.png');
    ?>
    <section class="rx-about-rectify-stats" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-stats-grid">
            <?php foreach ($items as $item) :
                $value = isset($item['value']) ? $item['value'] : '';
                $label = isset($item['label']) ? $item['label'] : '';
                $description = isset($item['description']) ? $item['description'] : '';
                $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                $is_google = (isset($item['google']) && $item['google'] === 'yes');
                ?>
            <div class="rx-about-rectify-stat">
                <?php if ($icon) : ?><span class="rx-about-rectify-stat-icon"><?php echo $icon; ?></span><?php endif; ?>
                <?php if ($value) : ?>
                <span class="rx-about-rectify-stat-value"><?php echo esc_html($value); ?></span>
                <?php endif; ?>
                <?php if ($is_google && $google_logo) : ?>
                    <span class="rx-about-rectify-google-row">
                        <img class="rx-about-rectify-google-logo" src="<?php echo esc_url($google_logo); ?>" alt="Google">
                        <?php if ($label) : ?><span class="rx-about-rectify-stat-label"><?php echo esc_html($label); ?></span><?php endif; ?>
                    </span>
                <?php elseif ($label) : ?>
                    <span class="rx-about-rectify-stat-label"><?php echo esc_html($label); ?></span>
                <?php endif; ?>
                <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_advantage($fields, $section_key)
{
    rectify_pb_render_homeowner_advantage($fields, $section_key);
}

function rectify_pb_render_ar_difference($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $focus = isset($fields['focus']) ? $fields['focus'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-rectify/what-makes-us-different.jpg');
    }
    ?>
    <section class="rx-about-rectify-difference" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-about-rectify-difference-media">
            <img src="<?php echo esc_url($image); ?>" alt="">
            <div class="rx-wrap rx-about-rectify-difference-grid">
                <div class="rx-about-rectify-difference-heading">
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                </div>
                <?php if ($body) : ?>
                <div class="rx-about-rectify-difference-copy"><?php echo wp_kses_post(wpautop($body)); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($focus) : ?>
        <div class="rx-about-rectify-focus">
            <div class="rx-wrap"><p><?php echo wp_kses_post($focus); ?></p></div>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_ar_approach($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $principles_heading = isset($fields['principles_heading']) ? $fields['principles_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-about-rectify-approach" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-approach-grid">
            <div class="rx-about-rectify-approach-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-about-rectify-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <div class="rx-about-rectify-principles">
                <?php if ($principles_heading) : ?><h3><?php echo esc_html($principles_heading); ?></h3><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ol>
                    <?php foreach ($items as $index => $item) :
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <li>
                        <span class="rx-about-rectify-step"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                        <div>
                            <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_values($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'Our Values';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-about-rectify-values" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-values-grid">
            <div class="rx-about-rectify-values-label">
                <span><?php echo esc_html($kicker); ?></span>
            </div>
            <?php foreach ($items as $item) :
                $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                $title = isset($item['title']) ? $item['title'] : '';
                $description = isset($item['description']) ? $item['description'] : '';
                ?>
            <article class="rx-about-rectify-value-card">
                <?php if ($icon) : ?><span class="rx-about-rectify-value-icon"><?php echo $icon; ?></span><?php endif; ?>
                <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_future($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $intro_line = isset($fields['intro_line']) ? $fields['intro_line'] : '';
    $tagline = isset($fields['tagline']) ? $fields['tagline'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-rectify/future-bg.png');
    }
    ?>
    <section class="rx-about-rectify-future" style="<?php echo esc_attr('--rx-about-rectify-future-image:url(' . $image . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-about-rectify-future-grid">
            <div class="rx-about-rectify-future-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($intro_line) : ?><p><?php echo esc_html($intro_line); ?></p><?php endif; ?>
                <?php if ($tagline) : ?><p class="rx-about-rectify-future-tagline"><?php echo esc_html($tagline); ?></p><?php endif; ?>
            </div>
            <?php if ($body) : ?>
            <div class="rx-about-rectify-future-body"><?php echo wp_kses_post(wpautop($body)); ?></div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ar_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'If Your Home Is Showing Signs Of Movement, Talk To Rectify.';
    $subtext = isset($fields['subtext']) ? $fields['subtext'] : '';
    $phone_text = (isset($fields['phone_text']) && $fields['phone_text'] !== '') ? $fields['phone_text'] : '1800 18 20 20';
    $phone_url = (isset($fields['phone_url']) && $fields['phone_url'] !== '') ? $fields['phone_url'] : 'tel:1800182020';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contours_url = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-about-rectify-cta" style="<?php echo esc_attr('--rx-about-rectify-cta-contours:url(' . $contours_url . ');'); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <h2><?php echo esc_html($heading); ?></h2>
            <?php if ($subtext) : ?><p><?php echo wp_kses_post($subtext); ?></p><?php endif; ?>

            <?php if (!empty($items)) : ?>
            <div class="rx-about-rectify-help-grid">
                <?php foreach ($items as $item) :
                    $icon = isset($item['icon']) ? rectify_pb_icon_markup_as_img($item['icon']) : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $action_text = isset($item['action_text']) ? $item['action_text'] : '';
                    $action_url = isset($item['action_url']) ? $item['action_url'] : '';
                    $action_type = isset($item['action_type']) ? $item['action_type'] : 'button';

                    if ($action_type === 'phone') {
                        $action_text = $action_text ?: $phone_text;
                        $action_url = $action_url ?: $phone_url;
                    } elseif ($action_url !== '' && strpos($action_url, '/') === 0) {
                        $action_url = home_url($action_url);
                    }
                    ?>
                <article class="rx-about-rectify-help-card">
                    <?php if ($icon) : ?><span class="rx-about-rectify-card-icon"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    <?php if ($action_text && $action_url && $action_type === 'phone') : ?>
                    <a class="rx-about-rectify-help-phone" href="<?php echo esc_url($action_url); ?>">
                        <span class="rx-about-rectify-phone-icon" aria-hidden="true"><img src="<?php echo esc_url(rectify_pb_theme_asset_url('icons-red/telephone-symbol-button.svg')); ?>" alt=""></span>
                        <?php echo esc_html($action_text); ?>
                    </a>
                    <?php elseif ($action_text && $action_url) : ?>
                    <a class="rx-about-rectify-help-link" href="<?php echo esc_url($action_url); ?>">
                        <?php echo esc_html($action_text); ?>
                        <img src="<?php echo esc_url(rectify_pb_theme_asset_url('images/about-rectify/cta-arrow.svg')); ?>" alt="" aria-hidden="true">
                    </a>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Our Technology" page (rx-tech-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_tech_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'ABOUT US';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Our Technology';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $breadcrumb_arrow = rectify_pb_theme_asset_url('images/about-rectify/breadcrumb-arrow.svg');
    ?>
    <section class="rx-tech-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-tech-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span>About Us</span>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div class="rx-tech-hero-intro">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_why_matters($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-technology/why-matters.jpg');
    }
    ?>
    <section class="rx-tech-why" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-why-grid">
            <div class="rx-tech-why-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-tech-why-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_approach($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-technology/approach-banner.jpg');
    }
    $style = $image ? '--rx-tech-approach-bg:url(' . $image . ');' : '';
    ?>
    <section class="rx-tech-approach<?php echo $image ? ' has-image' : ''; ?>" style="<?php echo esc_attr($style); ?>" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
            <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_expertise($fields, $section_key)
{
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-tech-expertise" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-expertise-grid">
            <?php foreach ($items as $item) :
                $icon = rectify_pb_image_url(isset($item['icon']) ? $item['icon'] : 0, 'full');
                $title = isset($item['title']) ? $item['title'] : '';
                $subheading = isset($item['subheading']) ? $item['subheading'] : '';
                $body = isset($item['body']) ? $item['body'] : '';
                ?>
            <article class="rx-tech-expertise-card">
                <?php if ($icon) : ?><span class="rx-tech-expertise-icon"><img src="<?php echo esc_url($icon); ?>" alt=""></span><?php endif; ?>
                <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                <?php if ($subheading) : ?><h4><?php echo esc_html($subheading); ?></h4><?php endif; ?>
                <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_engineered($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-technology/engineered-solutions.jpg');
    }
    ?>
    <section class="rx-tech-engineered" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-engineered-grid">
            <?php if ($image) : ?>
            <figure class="rx-tech-engineered-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
            <div class="rx-tech-engineered-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_measuring($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-technology/measuring-outcomes.jpg');
    }
    ?>
    <section class="rx-tech-measuring" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-measuring-grid">
            <div class="rx-tech-measuring-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
                <?php if ($closing) : ?><p class="rx-tech-measuring-closing"><?php echo esc_html($closing); ?></p><?php endif; ?>
            </div>
            <?php if ($image) : ?>
            <figure class="rx-tech-measuring-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_tech_innovation($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'large');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-technology/innovation.jpg');
    }

    $callout_heading = isset($fields['callout_heading']) ? $fields['callout_heading'] : '';
    $callout_body = isset($fields['callout_body']) ? $fields['callout_body'] : '';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $checklist_heading = isset($fields['checklist_heading']) ? $fields['checklist_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $closing = isset($fields['closing']) ? $fields['closing'] : '';
    $check = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <section class="rx-tech-innovation" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-tech-innovation-grid">
            <div class="rx-tech-innovation-media-col">
                <?php if ($image) : ?>
                <figure class="rx-tech-innovation-media">
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </figure>
                <?php endif; ?>
                <?php if ($callout_heading || $callout_body) : ?>
                <div class="rx-tech-innovation-callout">
                    <?php if ($callout_heading) : ?><h3><?php echo esc_html($callout_heading); ?></h3><?php endif; ?>
                    <?php if ($callout_body) : ?><p><?php echo wp_kses_post($callout_body); ?></p><?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="rx-tech-innovation-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-tech-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($checklist_heading || !empty($items)) : ?>
                <div class="rx-tech-innovation-checklist-block">
                    <?php if ($checklist_heading) : ?><h4><?php echo esc_html($checklist_heading); ?></h4><?php endif; ?>
                    <?php if (!empty($items)) : ?>
                    <ul class="rx-tech-checklist">
                        <?php foreach ($items as $item) :
                            $label = isset($item['label']) ? $item['label'] : '';

                            if (!$label) {
                                continue;
                            }
                            ?>
                        <li><img src="<?php echo esc_url($check); ?>" alt="" aria-hidden="true"><span><?php echo esc_html($label); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ($closing) : ?><div class="rx-tech-innovation-closing"><?php echo wp_kses_post(wpautop($closing)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * "Our Process" page (rx-process-* markup).
 * ---------------------------------------------------------------------*/

function rectify_pb_render_process_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'ABOUT US';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Our Process';
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $breadcrumb_arrow = rectify_pb_theme_asset_url('images/about-rectify/breadcrumb-arrow.svg');
    ?>
    <section class="rx-process-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-process-hero-grid">
            <div>
                <?php if ($kicker) : ?><span class="rx-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <nav class="rx-process-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span>About Us</span>
                    <img src="<?php echo esc_url($breadcrumb_arrow); ?>" alt="" aria-hidden="true">
                    <span><?php echo esc_html($title); ?></span>
                </nav>
            </div>
            <div class="rx-process-hero-intro">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><div class="rx-process-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_process_banner($fields, $section_key)
{
    $image = rectify_pb_image_url(isset($fields['image']) ? $fields['image'] : 0, 'full');

    if (!$image) {
        $image = rectify_pb_theme_asset_url('images/about-our-process/banner.jpg');
    }
    ?>
    <div class="rx-process-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="">
    </div>
    <?php
}

function rectify_pb_render_process_principles($fields, $section_key)
{
    $heading = isset($fields['heading']) ? $fields['heading'] : '';
    $subheading = isset($fields['subheading']) ? $fields['subheading'] : '';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $image_1 = rectify_pb_image_url(isset($fields['image_1']) ? $fields['image_1'] : 0, 'large');
    $image_2 = rectify_pb_image_url(isset($fields['image_2']) ? $fields['image_2'] : 0, 'large');

    if (!$image_1) {
        $image_1 = rectify_pb_theme_asset_url('images/about-our-process/photo-1.jpg');
    }
    if (!$image_2) {
        $image_2 = rectify_pb_theme_asset_url('images/about-our-process/photo-2.jpg');
    }

    $steps_heading = isset($fields['steps_heading']) ? $fields['steps_heading'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-process-principles" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-wrap rx-process-principles-grid">
            <div class="rx-process-principles-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><div class="rx-process-richtext"><?php echo wp_kses_post(wpautop($body)); ?></div><?php endif; ?>
                <?php if ($image_1) : ?>
                <figure class="rx-process-photo">
                    <img src="<?php echo esc_url($image_1); ?>" alt="">
                </figure>
                <?php endif; ?>
                <?php if ($image_2) : ?>
                <figure class="rx-process-photo">
                    <img src="<?php echo esc_url($image_2); ?>" alt="">
                </figure>
                <?php endif; ?>
            </div>
            <div class="rx-process-steps-col">
                <?php if ($steps_heading) : ?><h3><?php echo esc_html($steps_heading); ?></h3><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ol class="rx-process-steps">
                    <?php foreach ($items as $index => $item) :
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <li>
                        <span class="rx-process-step-number"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                        <div class="rx-process-step-body">
                            <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                            <?php if ($description) : ?><div class="rx-process-richtext"><?php echo wp_kses_post(wpautop($description)); ?></div><?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Resolve an image field to a URL: prefers an uploaded attachment ID, falling
 * back to a hardcoded theme asset path when the field is empty. Used by the
 * Commercial Ground Improvement ("cgi-*") block types below, whose fallback
 * theme template (content-ground-improvement.php) ships bespoke photography
 * that an editor may not have replaced with an upload yet.
 *
 * @param mixed  $field_value
 * @param string $fallback_relative_path
 * @return string
 */
function rectify_pb_cgi_image_url($field_value, $fallback_relative_path)
{
    $url = rectify_pb_image_url($field_value);

    return $url ? $url : rectify_pb_theme_asset_url($fallback_relative_path);
}

function rectify_pb_render_cgi_banner($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'COMMERCIAL SOLUTIONS';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Commercial Ground Improvement Solutions Melbourne & South Australia';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : 'Commercial Solutions';
    $breadcrumb_url = (isset($fields['breadcrumb_url']) && $fields['breadcrumb_url'] !== '') ? $fields['breadcrumb_url'] : home_url('/commercial-solutions/');
    $current_label = (isset($fields['current_label']) && $fields['current_label'] !== '') ? $fields['current_label'] : 'Ground Improvement';
    ?>
    <section class="rx-ci-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <span class="rx-ci-kicker"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <nav class="rx-ci-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                <span class="rx-ci-breadcrumb-current"><?php echo esc_html($current_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_intro($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered Ground Improvement for Commercial, Industrial & Infrastructure Projects';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_cgi_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-ground-improvement/hero-engineered-ground.jpg');
    ?>
    <section class="rx-ci-band rx-ci-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col">
            <div class="rx-ci-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <figure class="rx-ci-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_why_matters($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why ground improvement matters';
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'Improve Ground Performance Before Structural Problems Escalate';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $applications_heading = (isset($fields['applications_heading']) && $fields['applications_heading'] !== '') ? $fields['applications_heading'] : 'Typical applications include';
    $applications = isset($fields['applications']) && is_array($fields['applications']) ? $fields['applications'] : array();
    $image_1 = rectify_pb_cgi_image_url(isset($fields['image_1']) ? $fields['image_1'] : 0, 'images/commercial-ground-improvement/trench-excavation.jpg');
    $image_2 = rectify_pb_cgi_image_url(isset($fields['image_2']) ? $fields['image_2'] : 0, 'images/commercial-ground-improvement/sinkhole.jpg');
    $check_icon = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-why-matters" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col rx-ci-two-col-tight">
            <div class="rx-ci-why-matters-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <div class="rx-ci-why-matters-body">
                    <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                    <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
                </div>
            </div>
            <?php if ($applications_heading || !empty($applications)) : ?>
            <div class="rx-ci-applications">
                <?php if ($applications_heading) : ?><h3><?php echo esc_html($applications_heading); ?></h3><?php endif; ?>
                <?php if (!empty($applications)) : ?>
                <ul class="rx-ci-check-list rx-ci-check-list-lg">
                    <?php foreach ($applications as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><img src="<?php echo esc_url($check_icon); ?>" alt=""><span><?php echo esc_html($text); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="rx-ci-wrap">
            <div class="rx-ci-photo-grid">
                <figure class="rx-ci-media"><img src="<?php echo esc_url($image_1); ?>" alt=""></figure>
                <figure class="rx-ci-media"><img src="<?php echo esc_url($image_2); ?>" alt=""></figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_solutions_grid($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Our Ground Improvement Solutions';
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'Engineering Better Ground Performance';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ci-band rx-ci-solutions" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col rx-ci-two-col-tight">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-ci-solutions-lead">
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
        </div>
        <?php if (!empty($items)) : ?>
        <div class="rx-ci-wrap">
            <div class="rx-ci-solutions-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_image_url(isset($item['icon']) ? $item['icon'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ci-solution-card">
                    <?php if ($icon) : ?><img src="<?php echo esc_url($icon); ?>" alt="" class="rx-ci-solution-icon"><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_cgi_why_choose($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Commercial Clients Choose Rectify';
    $image = rectify_pb_cgi_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-ground-improvement/img-0571.jpg');
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'Engineered Solutions Designed Around Asset Performance';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contour = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-ci-why-choose" data-rx-section="<?php echo esc_attr($section_key); ?>" style="<?php echo esc_attr('--rx-ci-contour:url(' . esc_url_raw($contour) . ')'); ?>">
        <div class="rx-ci-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-ci-why-choose-layout">
                <div class="rx-ci-why-choose-media">
                    <?php if ($image) : ?><figure class="rx-ci-media"><img src="<?php echo esc_url($image); ?>" alt=""></figure><?php endif; ?>
                    <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                    <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
                </div>
                <?php if (!empty($items)) : ?>
                <div class="rx-ci-why-choose-grid">
                    <?php foreach ($items as $item) :
                        $icon = rectify_pb_image_url(isset($item['icon']) ? $item['icon'] : 0);
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ci-why-choose-card">
                        <?php if ($icon) : ?><img src="<?php echo esc_url($icon); ?>" alt="" class="rx-ci-why-choose-icon"><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_industries($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : "Supporting Australia's Critical Infrastructure";
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_cgi_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-ground-improvement/australia-map.png');
    $list_heading = (isset($fields['list_heading']) && $fields['list_heading'] !== '') ? $fields['list_heading'] : 'Industries We Support';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $check_icon = rectify_pb_theme_asset_url('images/our-story/check-icon.svg');
    ?>
    <section class="rx-ci-band rx-ci-industries" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col rx-ci-two-col-tight">
            <div class="rx-ci-industries-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
                <?php if ($image) : ?>
                <figure class="rx-ci-industries-media">
                    <img src="<?php echo esc_url($image); ?>" alt="Map of Australia">
                </figure>
                <?php endif; ?>
            </div>
            <?php if ($list_heading || !empty($items)) : ?>
            <div class="rx-ci-industries-list">
                <?php if ($list_heading) : ?><h3><?php echo esc_html($list_heading); ?></h3><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ul class="rx-ci-check-list">
                    <?php foreach ($items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><img src="<?php echo esc_url($check_icon); ?>" alt=""><span><?php echo esc_html($text); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_process($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Our Process';
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'A Structured Engineering Approach';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $image = rectify_pb_cgi_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-ground-improvement/broughton-hall.jpg');
    ?>
    <section class="rx-ci-band rx-ci-soft rx-ci-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <div class="rx-ci-process-layout">
                <div class="rx-ci-process-copy">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                    <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
                    <?php if (!empty($items)) : ?>
                    <div class="rx-ci-process-steps">
                        <?php foreach ($items as $item) :
                            $number = isset($item['number']) ? $item['number'] : '';
                            $title = isset($item['title']) ? $item['title'] : '';
                            $description = isset($item['description']) ? $item['description'] : '';
                            ?>
                        <div class="rx-ci-process-step">
                            <?php if ($number) : ?><span class="rx-ci-process-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                            <div class="rx-ci-process-step-text">
                                <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                                <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <figure class="rx-ci-process-media">
                    <img src="<?php echo esc_url($image); ?>" alt="">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cgi_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Build With Confidence on Stronger Ground';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $primary_text = (isset($fields['primary_text']) && $fields['primary_text'] !== '') ? $fields['primary_text'] : 'Contact Us';
    $primary_url = (isset($fields['primary_url']) && $fields['primary_url'] !== '') ? $fields['primary_url'] : home_url('/contact-us/');
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-ci-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            <div class="rx-ci-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-ci-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($phone_url); ?>"><span class="rx-ci-cta-icon rx-ci-cta-icon-phone" aria-hidden="true"></span><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($email_url); ?>"><span class="rx-ci-cta-icon rx-ci-cta-icon-mail" aria-hidden="true"></span><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cpa_banner($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'COMMERCIAL SOLUTIONS';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Pipe Abandonment & Cellular Concrete Grouting Melbourne & South Australia';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : 'Commercial Solutions';
    $breadcrumb_url = (isset($fields['breadcrumb_url']) && $fields['breadcrumb_url'] !== '') ? $fields['breadcrumb_url'] : home_url('/commercial-solutions/');
    $current_label = (isset($fields['current_label']) && $fields['current_label'] !== '') ? $fields['current_label'] : 'Pipe Abandonment';
    ?>
    <section class="rx-ci-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <span class="rx-ci-kicker"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <nav class="rx-ci-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                <span class="rx-ci-breadcrumb-current"><?php echo esc_html($current_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cpa_intro($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered Pipe Abandonment Solutions for Commercial, Industrial & Infrastructure Assets';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_cgi_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-ground-improvement/img-0571.jpg');
    // The theme fallback ships its own hardcoded photo (an existing upload,
    // not a theme asset), so only fall back to a theme asset if this render
    // path is ever reached without a saved image - which in practice only
    // happens once an editor has actively created a cpa-intro block via the
    // admin builder without picking an image yet.
    ?>
    <section class="rx-ci-band rx-ci-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap rx-ci-two-col">
            <div class="rx-ci-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <figure class="rx-ci-media">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </figure>
        </div>
    </section>
    <?php
}

function rectify_pb_render_cpa_why_choose($fields, $section_key)
{
    rectify_pb_render_commercial_inner_why_cards($fields, $section_key);
}

function rectify_pb_render_cpa_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Restore Ground Support With Engineered Void Filling';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $primary_text = (isset($fields['primary_text']) && $fields['primary_text'] !== '') ? $fields['primary_text'] : 'Contact Us';
    $primary_url = (isset($fields['primary_url']) && $fields['primary_url'] !== '') ? $fields['primary_url'] : home_url('/contact-us/');
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-ci-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ci-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            <div class="rx-ci-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-ci-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($phone_url); ?>"><span class="rx-ci-cta-icon rx-ci-cta-icon-phone" aria-hidden="true"></span><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-ci-cta-outline" href="<?php echo esc_url($email_url); ?>"><span class="rx-ci-cta-icon rx-ci-cta-icon-mail" aria-hidden="true"></span><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}
/**
 * Resolve an image field to a URL for the "Industries Inner Page" ("ii-*")
 * block family, falling back to a hardcoded theme asset path when the field
 * is empty - mirrors rectify_pb_cgi_image_url() for the cgi-* blocks.
 *
 * @param mixed  $field_value
 * @param string $fallback_relative_path
 * @return string
 */
function rectify_pb_ii_image_url($field_value, $fallback_relative_path)
{
    // Seed data may supply a theme-relative asset path directly (no media
    // library attachment yet) instead of an attachment ID - detect that
    // case before treating the value as an ID.
    if (is_string($field_value) && $field_value !== '' && !ctype_digit($field_value)) {
        return rectify_pb_theme_asset_url($field_value);
    }

    $url = rectify_pb_image_url($field_value);

    return $url ? $url : rectify_pb_theme_asset_url($fallback_relative_path);
}

/**
 * Resolve an icon-picker field to markup: inline SVG for a "svg" icon, an
 * <img> for a "file" icon, or a directly uploaded/pasted icon (the
 * "upload:<attachment_id>" and "paste:<base64>" values the icon-picker also
 * accepts - see rectify_pb_icon_markup()). Used by the ii-* block renderers.
 *
 * @param string $icon_key
 * @param string $class
 * @return string
 */
function rectify_pb_ii_icon_markup($icon_key, $class = 'rx-ii-icon')
{
    if (!$icon_key) {
        return '';
    }

    if (strpos($icon_key, 'upload:') === 0) {
        return rectify_pb_uploaded_icon_img($icon_key, $class);
    }

    if (strpos($icon_key, 'paste:') === 0) {
        $svg_markup = rectify_pb_pasted_icon_svg($icon_key);

        return $svg_markup ? '<span class="' . esc_attr($class) . '">' . $svg_markup . '</span>' : '';
    }

    $library = rectify_pb_get_icon_library();

    if (!isset($library[$icon_key])) {
        return '';
    }

    $icon = $library[$icon_key];

    if ($icon['type'] === 'svg' && $icon['svg']) {
        return '<span class="' . esc_attr($class) . '">' . $icon['svg'] . '</span>';
    }

    if ($icon['type'] === 'file' && $icon['url']) {
        return '<img class="' . esc_attr($class) . '" src="' . esc_url($icon['url']) . '" alt="">';
    }

    return '';
}

function rectify_pb_render_ii_banner($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'INDUSTRIES';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Structural Stabilisation Solutions';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : 'Industries';
    $breadcrumb_url = (isset($fields['breadcrumb_url']) && $fields['breadcrumb_url'] !== '') ? $fields['breadcrumb_url'] : home_url('/industries/');
    $current_label = (isset($fields['current_label']) && $fields['current_label'] !== '') ? $fields['current_label'] : $title;
    ?>
    <section class="rx-ii-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap">
            <span class="rx-ii-kicker"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <nav class="rx-ii-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="rx-ii-breadcrumb-sep" aria-hidden="true"></span>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <span class="rx-ii-breadcrumb-sep" aria-hidden="true"></span>
                <span class="rx-ii-breadcrumb-current"><?php echo esc_html($current_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_intro($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Protecting Critical Transport Infrastructure';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_ii_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-engineered-fill/intro-site.png');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    ?>
    <section class="rx-ii-band rx-ii-intro" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap rx-ii-two-col">
            <div class="rx-ii-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <figure class="rx-ii-media">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            </figure>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_challenges($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Challenges We Help Resolve';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-band rx-ii-challenges" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><div class="rx-ii-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-ii-challenges-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_ii_icon_markup(isset($item['icon']) ? $item['icon'] : '', 'rx-ii-challenge-icon');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    ?>
                <article class="rx-ii-challenge-card">
                    <?php if ($icon) : ?><span class="rx-ii-challenge-icon-wrap"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_photo_banner($fields, $section_key)
{
    $image = rectify_pb_ii_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-engineered-fill/infrastructure-rehabilitation.png');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    ?>
    <section class="rx-ii-photo-banner" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
    </section>
    <?php
}

function rectify_pb_render_ii_solutions($fields, $section_key)
{
    $kicker = isset($fields['kicker']) ? $fields['kicker'] : '';
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered Solutions for Transport Infrastructure';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-band rx-ii-solutions" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap rx-ii-two-col rx-ii-two-col-tight">
            <div class="rx-ii-solutions-copy">
                <?php if ($kicker) : ?><span class="rx-ii-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            </div>
            <?php if ($lead) : ?><div class="rx-ii-lead"><?php echo wp_kses_post(wpautop($lead)); ?></div><?php endif; ?>
        </div>
        <?php if (!empty($items)) : ?>
        <div class="rx-ii-wrap">
            <div class="rx-ii-solutions-track">
                <button type="button" class="rx-ii-solutions-prev" aria-label="<?php esc_attr_e('Previous solution', 'rectify-page-builder'); ?>">
                    <span class="rx-ii-solutions-arrow" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 5L8 12l7 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                </button>
                <div class="rx-ii-solutions-grid">
                    <?php foreach ($items as $index => $item) :
                        $icon = rectify_pb_ii_icon_markup(isset($item['icon']) ? $item['icon'] : '', 'rx-ii-solution-icon');
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <article class="rx-ii-solution-card<?php echo $index === 0 ? ' is-active' : ''; ?>">
                        <?php if ($icon) : ?><span class="rx-ii-solution-icon-wrap"><?php echo $icon; ?></span><?php endif; ?>
                        <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                        <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    </article>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="rx-ii-solutions-next" aria-label="<?php esc_attr_e('Next solution', 'rectify-page-builder'); ?>">
                    <span class="rx-ii-solutions-arrow" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                </button>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <?php
}

function rectify_pb_render_ii_why_choose($fields, $section_key)
{
    rectify_pb_render_homeowner_advantage($fields, $section_key);
}

function rectify_pb_render_ii_process($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Our Structured Engineering Approach';
    $image = rectify_pb_ii_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-engineered-fill/weak-foundation-soils.jpg');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-band rx-ii-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <div class="rx-ii-process-layout">
                <?php if (!empty($items)) : ?>
                <div class="rx-ii-process-steps">
                    <?php foreach ($items as $item) :
                        $number = isset($item['number']) ? $item['number'] : '';
                        $title = isset($item['title']) ? $item['title'] : '';
                        $description = isset($item['description']) ? $item['description'] : '';
                        ?>
                    <div class="rx-ii-process-step">
                        <?php if ($number) : ?><span class="rx-ii-process-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                        <div class="rx-ii-process-step-text">
                            <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                            <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <figure class="rx-ii-process-media">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_faq($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Frequently Asked Questions';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-band rx-ii-faq" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-ii-faq-list">
                <?php foreach ($items as $index => $item) :
                    $question = isset($item['question']) ? $item['question'] : '';
                    $answer = isset($item['answer']) ? $item['answer'] : '';
                    if (!$question) { continue; }
                    ?>
                <details class="rx-ii-faq-item" <?php echo ($index === 0) ? 'open' : ''; ?>>
                    <summary>
                        <span><?php echo esc_html($question); ?></span>
                        <span class="rx-ii-faq-icon" aria-hidden="true"></span>
                    </summary>
                    <?php if ($answer) : ?><div class="rx-ii-faq-answer"><?php echo wp_kses_post(wpautop($answer)); ?></div><?php endif; ?>
                </details>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : "Let's Find The Right Engineering Solution";
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($lead) : ?><p class="rx-ii-cta-lead"><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-ii-cta-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_ii_icon_markup(isset($item['icon']) ? $item['icon'] : '', 'rx-ii-cta-card-icon');
                    $title = isset($item['title']) ? $item['title'] : '';
                    $description = isset($item['description']) ? $item['description'] : '';
                    $button_text = isset($item['button_text']) ? $item['button_text'] : '';
                    $button_url = isset($item['button_url']) ? $item['button_url'] : '';
                    ?>
                <article class="rx-ii-cta-card">
                    <?php if ($icon) : ?><span class="rx-ii-cta-card-icon-wrap"><?php echo $icon; ?></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo wp_kses_post($description); ?></p><?php endif; ?>
                    <?php if ($button_text) :
                        $is_phone = strpos($button_url, 'tel:') === 0;
                        $button_asset_dir = is_page('commercial-buildings')
                            ? 'images/industries/commercial-buildings/'
                            : 'images/industries/transport-assets/';
                        $phone_icon = rectify_pb_theme_asset_url($button_asset_dir . 'telephone.svg');
                        ?>
                    <a class="rx-ii-cta-card-button<?php echo $is_phone ? ' is-phone' : ''; ?>" href="<?php echo esc_url($button_url); ?>">
                        <?php if ($is_phone) : ?><img class="rx-ii-cta-button-icon" src="<?php echo esc_url($phone_icon); ?>" alt=""><?php endif; ?>
                        <span><?php echo esc_html($button_text); ?></span>
                        <?php if (!$is_phone) : ?><span class="rx-ii-cta-button-arrow" aria-hidden="true">&#8594;</span><?php endif; ?>
                    </a>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_ii_assets($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Assets We Support';
    $image = rectify_pb_ii_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/commercial-engineered-fill/intro-site.png');
    $image_alt = isset($fields['image_alt']) ? $fields['image_alt'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-ii-band rx-ii-assets" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-ii-wrap rx-ii-two-col">
            <figure class="rx-ii-media">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            </figure>
            <div class="rx-ii-assets-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if (!empty($items)) : ?>
                <ul class="rx-ii-assets-list">
                    <?php foreach ($items as $item) :
                        $text = isset($item['text']) ? $item['text'] : '';
                        if (!$text) { continue; }
                        ?>
                    <li><span class="rx-ii-assets-check" aria-hidden="true"></span><?php echo esc_html($text); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/* -----------------------------------------------------------------------
 * Slab Relevelling (Residential Solutions child page), matching
 * template-parts/residential/content-slab-relevelling.php.
 * ---------------------------------------------------------------------*/

function rectify_pb_slab_relevel_image_url($field_value, $fallback_relative_path)
{
    $url = rectify_pb_image_url($field_value);

    return $url ? $url : rectify_pb_theme_asset_url($fallback_relative_path);
}

function rectify_pb_render_slab_relevel_hero($fields, $section_key)
{
    $kicker = (isset($fields['kicker']) && $fields['kicker'] !== '') ? $fields['kicker'] : 'RESIDENTIAL SOLUTIONS';
    $title = (isset($fields['title']) && $fields['title'] !== '') ? $fields['title'] : 'Slab Relevelling Melbourne, Adelaide & South Australia';
    $breadcrumb_label = (isset($fields['breadcrumb_label']) && $fields['breadcrumb_label'] !== '') ? $fields['breadcrumb_label'] : 'Residential Solutions';
    $breadcrumb_url = (isset($fields['breadcrumb_url']) && $fields['breadcrumb_url'] !== '') ? $fields['breadcrumb_url'] : home_url('/residential/');
    $current_label = (isset($fields['current_label']) && $fields['current_label'] !== '') ? $fields['current_label'] : 'Slab Relevelling';
    ?>
    <section class="rx-slab-hero" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <span class="rx-slab-kicker"><?php echo esc_html($kicker); ?></span>
            <h1><?php echo esc_html($title); ?></h1>
            <nav class="rx-slab-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?php echo esc_url($breadcrumb_url); ?>"><?php echo esc_html($breadcrumb_label); ?></a>
                <span aria-hidden="true">&rsaquo;</span>
                <span><?php echo esc_html($current_label); ?></span>
            </nav>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_intro($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Restore Sunken Concrete Slabs with Advanced Chemical Underpinning';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $image = rectify_pb_slab_relevel_image_url(isset($fields['image']) ? $fields['image'] : 0, 'images/slab-relevelling/intro-slab.jpg');
    ?>
    <section class="rx-slab-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap rx-slab-intro-grid">
            <div class="rx-slab-intro-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <figure class="rx-slab-intro-media">
                <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('House exterior showing a concrete slab and pathway', 'rectify-custom'); ?>">
            </figure>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_signs($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Is Your Concrete Slab Showing These Warning Signs?';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $note = isset($fields['note']) ? $fields['note'] : '';
    $cta_text = (isset($fields['cta_text']) && $fields['cta_text'] !== '') ? $fields['cta_text'] : 'CONTACT OUR EXPERTS';
    $cta_url = (isset($fields['cta_url']) && $fields['cta_url'] !== '') ? $fields['cta_url'] : home_url('/contact-us/');
    ?>
    <section class="rx-slab-band rx-slab-soft" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <div class="rx-slab-signs-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-slab-signs-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $copy = isset($item['copy']) ? $item['copy'] : '';
                    ?>
                <article class="rx-slab-sign-card">
                    <?php if ($image) : ?>
                    <figure class="rx-slab-sign-media">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                    </figure>
                    <?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if ($note) : ?><p class="rx-slab-signs-note"><?php echo wp_kses_post($note); ?></p><?php endif; ?>
            <?php if ($cta_text) : ?><a class="rx-slab-btn-primary" href="<?php echo esc_url($cta_url); ?>"><?php echo esc_html($cta_text); ?></a><?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_causes($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'The Ground Beneath the Slab Is Usually the Problem';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $subhead = (isset($fields['subhead']) && $fields['subhead'] !== '') ? $fields['subhead'] : 'Several factors can contribute to slab movement, including:';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-slab-band" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <div class="rx-slab-causes-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <?php if ($subhead) : ?><h3 class="rx-slab-causes-subhead"><?php echo esc_html($subhead); ?></h3><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-slab-causes-grid">
                <?php foreach ($items as $item) :
                    $image = rectify_pb_image_url(isset($item['image']) ? $item['image'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $copy = isset($item['copy']) ? $item['copy'] : '';
                    ?>
                <article class="rx-slab-cause-card">
                    <?php if ($image) : ?>
                    <figure class="rx-slab-cause-media">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                    </figure>
                    <?php endif; ?>
                    <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                    <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_process($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'How Chemical Underpinning Relevels Your Slab';
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'Stabilise the Ground Before Lifting the Slab';
    $body = isset($fields['body_richtext']) ? $fields['body_richtext'] : '';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    ?>
    <section class="rx-slab-band rx-slab-process" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap rx-slab-process-grid">
            <div class="rx-slab-process-copy">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                <?php if ($body) : ?><?php echo wp_kses_post(wpautop($body)); ?><?php endif; ?>
            </div>
            <?php if (!empty($items)) : ?>
            <div class="rx-slab-steps">
                <?php foreach ($items as $item) :
                    $number = isset($item['number']) ? $item['number'] : '';
                    $title = isset($item['title']) ? $item['title'] : '';
                    $copy = isset($item['copy']) ? $item['copy'] : '';
                    ?>
                <article class="rx-slab-step">
                    <?php if ($number) : ?><span class="rx-slab-step-number"><?php echo esc_html($number); ?></span><?php endif; ?>
                    <div class="rx-slab-step-copy">
                        <?php if ($title) : ?><h4><?php echo esc_html($title); ?></h4><?php endif; ?>
                        <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_comparison($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Choose Chemical Underpinning?';
    $subheading = (isset($fields['subheading']) && $fields['subheading'] !== '') ? $fields['subheading'] : 'A Smarter Alternative to Slab Replacement';
    $lead = isset($fields['lead']) ? $fields['lead'] : '';
    $rows = isset($fields['rows']) && is_array($fields['rows']) ? $fields['rows'] : array();
    ?>
    <section class="rx-slab-band rx-slab-comparison" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <div class="rx-slab-comparison-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <div>
                    <?php if ($subheading) : ?><h3><?php echo esc_html($subheading); ?></h3><?php endif; ?>
                    <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
                </div>
            </div>
            <?php if (!empty($rows)) : ?>
            <div class="rx-slab-compare-table" role="table">
                <div class="rx-slab-compare-row rx-slab-compare-row-heading" role="row">
                    <div class="rx-slab-compare-cell rx-slab-compare-heading" role="columnheader"><?php esc_html_e('Traditional Slab Replacement', 'rectify-custom'); ?></div>
                    <div class="rx-slab-compare-cell rx-slab-compare-heading" role="columnheader"><?php esc_html_e('Rectify Chemical Underpinning', 'rectify-custom'); ?></div>
                </div>
                <?php foreach ($rows as $row) :
                    $traditional = isset($row['traditional']) ? $row['traditional'] : '';
                    $rectify = isset($row['rectify']) ? $row['rectify'] : '';
                    ?>
                <div class="rx-slab-compare-row" role="row">
                    <div class="rx-slab-compare-cell rx-slab-compare-cross" role="cell"><?php echo esc_html($traditional); ?></div>
                    <div class="rx-slab-compare-cell rx-slab-compare-check" role="cell">
                        <span class="rx-slab-check" aria-hidden="true"></span>
                        <span><?php echo esc_html($rectify); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_proof($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Engineered. Rectified. Performance Verified.';
    $lead = (isset($fields['lead']) && $fields['lead'] !== '') ? $fields['lead'] : 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.';
    $before_image = rectify_pb_slab_relevel_image_url(isset($fields['before_image']) ? $fields['before_image'] : 0, 'images/slab-relevelling/before-slab.jpg');
    $after_image = rectify_pb_slab_relevel_image_url(isset($fields['after_image']) ? $fields['after_image'] : 0, 'images/slab-relevelling/after-slab.jpg');
    ?>
    <section class="rx-slab-band rx-slab-soft rx-slab-proof" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <div class="rx-slab-proof-head">
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($lead) : ?><p><?php echo wp_kses_post($lead); ?></p><?php endif; ?>
            </div>
            <div class="rx-slab-compare">
                <figure class="rx-slab-compare-image">
                    <span class="rx-slab-compare-tag rx-slab-compare-tag-before"><?php esc_html_e('BEFORE', 'rectify-custom'); ?></span>
                    <img src="<?php echo esc_url($before_image); ?>" alt="<?php esc_attr_e('Concrete slab before chemical underpinning', 'rectify-custom'); ?>">
                </figure>
                <figure class="rx-slab-compare-image">
                    <span class="rx-slab-compare-tag rx-slab-compare-tag-after"><?php esc_html_e('AFTER', 'rectify-custom'); ?></span>
                    <img src="<?php echo esc_url($after_image); ?>" alt="<?php esc_attr_e('Concrete slab after chemical underpinning', 'rectify-custom'); ?>">
                </figure>
            </div>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_why($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Why Choose Rectify';
    $items = isset($fields['items']) && is_array($fields['items']) ? $fields['items'] : array();
    $contour = rectify_pb_theme_asset_url('images/home/Contour on Navy Blue.png');
    ?>
    <section class="rx-slab-why" data-rx-section="<?php echo esc_attr($section_key); ?>" style="<?php echo esc_attr('--rx-slab-contours:url(' . esc_url_raw($contour) . ');'); ?>">
        <div class="rx-slab-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if (!empty($items)) : ?>
            <div class="rx-slab-why-grid">
                <?php foreach ($items as $item) :
                    $icon = rectify_pb_image_url(isset($item['icon']) ? $item['icon'] : 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $copy = isset($item['copy']) ? $item['copy'] : '';
                    ?>
                <article class="rx-slab-why-card">
                    <?php if ($icon) : ?><span class="rx-slab-why-icon"><img src="<?php echo esc_url($icon); ?>" alt=""></span><?php endif; ?>
                    <?php if ($title) : ?><h3><?php echo esc_html($title); ?></h3><?php endif; ?>
                    <?php if ($copy) : ?><p><?php echo wp_kses_post($copy); ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

function rectify_pb_render_slab_relevel_cta($fields, $section_key)
{
    $heading = (isset($fields['heading']) && $fields['heading'] !== '') ? $fields['heading'] : 'Concerned About a Sunken Concrete Slab?';
    $body = isset($fields['body']) ? $fields['body'] : '';
    $primary_text = (isset($fields['primary_text']) && $fields['primary_text'] !== '') ? $fields['primary_text'] : 'CONTACT US';
    $primary_url = (isset($fields['primary_url']) && $fields['primary_url'] !== '') ? $fields['primary_url'] : home_url('/contact-us/');
    $phone_text = isset($fields['phone_text']) ? $fields['phone_text'] : '';
    $phone_url = isset($fields['phone_url']) ? $fields['phone_url'] : '';
    $email_text = isset($fields['email_text']) ? $fields['email_text'] : '';
    $email_url = isset($fields['email_url']) ? $fields['email_url'] : '';
    ?>
    <section class="rx-slab-cta" data-rx-section="<?php echo esc_attr($section_key); ?>">
        <div class="rx-slab-wrap">
            <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
            <?php if ($body) : ?><p><?php echo wp_kses_post($body); ?></p><?php endif; ?>
            <div class="rx-slab-cta-actions">
                <?php if ($primary_text) : ?><a class="rx-slab-cta-primary" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html($primary_text); ?></a><?php endif; ?>
                <?php if ($phone_text) : ?><a class="rx-slab-cta-outline rx-slab-cta-phone" href="<?php echo esc_url($phone_url); ?>"><?php echo esc_html($phone_text); ?></a><?php endif; ?>
                <?php if ($email_text) : ?><a class="rx-slab-cta-outline rx-slab-cta-mail" href="<?php echo esc_url($email_url); ?>"><?php echo esc_html($email_text); ?></a><?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}
