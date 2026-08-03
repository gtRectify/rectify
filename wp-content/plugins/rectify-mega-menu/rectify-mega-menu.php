<?php
/**
 * Plugin Name: Rectify Mega Menu
 * Description: Production-ready mega menu for the Rectify homepage with admin-managed icons and images.
 * Version: 1.1.2
 * Author: Copilot
 * Text Domain: rectify-mega-menu
 */

if (!defined('ABSPATH')) {
    exit;
}

class Rectify_Mega_Menu_Walker extends Walker_Nav_Menu
{
    /**
     * True while rendering the children of a top-level item that has a
     * hardcoded custom layout (currently just "Resources"). Lets start_lvl/
     * end_lvl/start_el/end_el suppress the generic child-list output for
     * that branch without affecting any other top-level item.
     */
    private $in_custom_branch = false;
    private $custom_branch_key = '';

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($this->in_custom_branch) {
            return;
        }

        if ($depth === 0) {
            $output .= '<ul class="rx-mega-submenu-list">';
        } else {
            $output .= '<ul class="rx-mega-submenu-nested">';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($this->in_custom_branch) {
            return;
        }

        $output .= '</ul>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if ($depth > 0 && $this->in_custom_branch) {
            return;
        }

        if ($depth === 0) {
            $custom_key = $this->get_custom_branch_key($item);
            $this->in_custom_branch = ($custom_key !== '');
            $this->custom_branch_key = $custom_key;
        }

        $classes = array('menu-item', 'rx-menu-item');

        if ($depth === 0) {
            $classes[] = 'rx-mega-parent';
        } else {
            $classes[] = 'rx-mega-child';
        }

        if ($item->current || $item->current_item_ancestor || $item->current_item_parent) {
            $classes[] = 'current-menu-item';
        }

        if (in_array('menu-item-has-children', $item->classes, true)) {
            $classes[] = 'menu-item-has-children';
        }

        $class_names = implode(' ', array_filter($classes));
        $item_id = 'menu-' . sanitize_title($item->title);
        $output .= '<li id="' . esc_attr($item_id) . '" class="' . esc_attr($class_names) . '">';

        $item_url = !empty($item->url) ? $item->url : '#';
        $link_classes = $depth === 0 ? 'rx-mega-link' : 'rx-mega-sub-link';
        $icon_markup = $this->get_icon_markup($item->ID, $depth);
        $child_title = $depth > 0 ? get_post_meta($item->ID, '_rectify_megamenu_child_title', true) : '';
        $child_description = $depth > 0 ? get_post_meta($item->ID, '_rectify_megamenu_child_description', true) : '';
        $display_title = $depth > 0 && !empty($child_title) ? $child_title : $item->title;
        $display_description = $depth > 0 && !empty($child_description) ? $child_description : $item->description;

        $output .= '<a class="' . esc_attr($link_classes) . '" href="' . esc_url($item_url) . '">';

        if ($depth === 0) {
            $output .= $icon_markup;
            $output .= '<span class="rx-mega-link-text">' . esc_html($item->title) . '</span>';
            if (in_array('menu-item-has-children', $item->classes, true)) {
                $output .= '<span class="rx-menu-caret" aria-hidden="true"></span>';
            }
            $output .= '</a>';

            if (in_array('menu-item-has-children', $item->classes, true)) {
                if ($this->in_custom_branch) {
                    $output .= $this->get_custom_branch_markup($this->custom_branch_key, $item);
                } else {
                    $output .= '<div class="rx-mega-submenu"><div class="rx-mega-submenu-inner">';
                    $output .= '<div class="rx-mega-submenu-intro">';
                    // $output .= '<h3>' . esc_html($item->title) . '</h3>';
                    $intro_markup = $this->get_intro_content_markup($item->ID);
                    if (!empty($intro_markup)) {
                        $output .= $intro_markup;
                    }
                    $output .= '</div>';
                }
            }
        } else {
            $output .= '<div class="display-flex"><div class="rx-menu-icon">'.$icon_markup.'</div>';
            $output .= '<div><span class="rx-mega-sub-title">' . esc_html($display_title) . '</span>';
            if (!empty($display_description)) {
                $output .= '<span class="rx-mega-sub-desc">' . esc_html($display_description) . '</span></div></div>';
            }
            $output .= '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if ($depth > 0 && $this->in_custom_branch) {
            return;
        }

        if ($depth === 0 && in_array('menu-item-has-children', $item->classes, true)) {
            $output .= '</div></div>';
        }

        $output .= '</li>';

        if ($depth === 0) {
            $this->in_custom_branch = false;
            $this->custom_branch_key = '';
        }
    }

    private function get_custom_branch_key($item)
    {
        $title = strtolower(trim(wp_strip_all_tags($item->title)));

        if ($title === 'resources') {
            return 'resources';
        }

        if ($title === 'about us') {
            return 'about';
        }

        return '';
    }

    private function get_custom_branch_markup($key, $item)
    {
        if ($key === 'resources') {
            return $this->get_resources_mega_markup();
        }

        if ($key === 'about') {
            return $this->get_about_mega_markup($item->ID);
        }

        return '';
    }

    /**
     * Hardcoded 4-column Resources mega menu (case studies, news, FAQs).
     * Shares CSS classes with the theme's rx-mega-resources styles in rectify-home.css,
     * so it's styled by the theme rather than this plugin's stylesheet.
     */
    private function get_resources_mega_markup()
    {
        $case_studies_url = home_url('/resources/case-studies/');
        $news_url = home_url('/resources/news-and-insights/');

        $columns = '';

        $columns .= '<div class="rx-mega-resources-col">'
            . '<h3 class="rx-mega-resources-heading">Residential Case Studies</h3>'
            . '<a class="rx-mega-resources-card" href="' . esc_url($case_studies_url) . '">'
            . '<span class="rx-mega-resources-card-label">Recent Residential Project</span>'
            . '<span class="rx-mega-resources-card-media"><img src="' . esc_url(rx_asset_url('images/home/IMG_0867-1.jpg')) . '" alt="" loading="lazy" decoding="async"></span>'
            . '<span class="rx-mega-resources-card-title">Soil Stabilization for Apartment Block Construction in Hampton, Victoria</span>'
            . '</a>'
            . '<a class="rx-mega-resources-more" href="' . esc_url($case_studies_url) . '">See More Case Studies</a>'
            . '</div>';

        $columns .= '<div class="rx-mega-resources-col">'
            . '<h3 class="rx-mega-resources-heading">Commercial Case Studies</h3>'
            . '<a class="rx-mega-resources-card" href="' . esc_url($case_studies_url) . '">'
            . '<span class="rx-mega-resources-card-label">Recent Commercial Project</span>'
            . '<span class="rx-mega-resources-card-media"><img src="' . esc_url(rx_asset_url('images/home/Wall-with-prop7.jpg')) . '" alt="" loading="lazy" decoding="async"></span>'
            . '<span class="rx-mega-resources-card-title">Warehouse Stability Resolved in South Geelong</span>'
            . '</a>'
            . '<a class="rx-mega-resources-more" href="' . esc_url($case_studies_url) . '">See More Case Studies</a>'
            . '</div>';

        $columns .= '<div class="rx-mega-resources-col">'
            . '<h3 class="rx-mega-resources-heading">News &amp; Insights</h3>'
            . '<a class="rx-mega-resources-card" href="' . esc_url($news_url) . '">'
            . '<span class="rx-mega-resources-card-label">Recent Blog Post</span>'
            . '<span class="rx-mega-resources-card-media"><img src="' . esc_url(rx_asset_url('images/home/article_2.png')) . '" alt="" loading="lazy" decoding="async"></span>'
            . '<span class="rx-mega-resources-card-title">Red flags when comparing costs</span>'
            . '</a>'
            . '<a class="rx-mega-resources-more" href="' . esc_url($news_url) . '">See More News &amp; Insights</a>'
            . '</div>';

        $faq_links = array(
            'Residential FAQs' => '/resources/faq/residential/',
            'Commercial FAQs' => '/resources/faq/commercial/',
            'Our Process FAQs' => '/resources/faq/our-process/',
            'Our Technology FAQs' => '/resources/faq/our-technology/',
            'Industries We Serve FAQs' => '/resources/faq/industries-we-serve/',
        );

        $faq_markup = '';
        foreach ($faq_links as $label => $path) {
            $faq_markup .= '<li><a href="' . esc_url(home_url($path)) . '">' . esc_html($label) . '</a></li>';
        }

        $columns .= '<div class="rx-mega-resources-col rx-mega-resources-col--faqs">'
            . '<h3 class="rx-mega-resources-heading">FAQs</h3>'
            . '<ul class="rx-mega-resources-faq-list">' . $faq_markup . '</ul>'
            . '</div>';

        // Leaves 2 divs open (rx-mega-submenu, rx-mega-resources) — end_el() closes them with '</div></div>',
        // same contract as the generic branch's rx-mega-submenu/rx-mega-submenu-inner pair.
        return '<div class="rx-mega-submenu rx-mega-submenu--resources"><div class="rx-mega-resources">' . $columns;
    }

    /**
     * 3-column About Us mega menu (intro panel + icon/title/desc grid).
     * Columns and cards are built from the actual "About Us" child menu items in
     * Appearance → Menus, using each item's admin-managed icon, title and description
     * (see render_menu_item_fields()/get_icon_markup()) rather than static content.
     * Shares CSS classes with the theme's rx-mega-about styles in rectify-home.css,
     * so it's styled by the theme rather than this plugin's stylesheet.
     */
    private function get_about_mega_markup($parent_id)
    {
        $children = $this->get_menu_item_children($parent_id);

        $columns = array(array(), array(), array());
        $per_column = (int) ceil(count($children) / 3);
        foreach ($children as $index => $child) {
            $col = $per_column > 0 ? min(2, intdiv($index, $per_column)) : 0;
            $columns[$col][] = $child;
        }

        $columns_markup = '';
        foreach ($columns as $column_items) {
            $columns_markup .= '<ul class="rx-mega-about-col">';
            foreach ($column_items as $child) {
                $title = get_post_meta($child->ID, '_rectify_megamenu_child_title', true);
                $desc = get_post_meta($child->ID, '_rectify_megamenu_child_description', true);
                $title = !empty($title) ? $title : $child->title;
                $desc = !empty($desc) ? $desc : $child->description;
                $icon_markup = $this->get_icon_markup($child->ID, 1);
                $is_active = $child->current || $child->current_item_ancestor || $child->current_item_parent;
                $item_classes = 'rx-mega-about-item' . ($is_active ? ' is-active' : '');
                $item_url = !empty($child->url) ? $child->url : '#';
                $item_id = 'menu-' . sanitize_title($title);

                $columns_markup .= '<li id="' . esc_attr($item_id) . '" class="' . esc_attr($item_classes) . '">'
                    . '<a class="rx-mega-about-link" href="' . esc_url($item_url) . '">'
                    . '<span class="rx-mega-about-icon-wrap">' . $icon_markup . '</span>'
                    . '<span class="rx-mega-about-copy">'
                    . '<span class="rx-mega-about-title">' . esc_html($title) . '</span>';
                if (!empty($desc)) {
                    $columns_markup .= '<span class="rx-mega-about-desc">' . esc_html($desc) . '</span>';
                }
                $columns_markup .= '</span>'
                    . '</a>'
                    . '</li>';
            }
            $columns_markup .= '</ul>';
        }

        $intro_subtitle = get_post_meta($parent_id, '_rectify_megamenu_intro_subtitle', true);
        $intro_text = get_post_meta($parent_id, '_rectify_megamenu_intro_text', true);
        $intro_subtitle = !empty($intro_subtitle) ? $intro_subtitle : 'Structural Stability. Engineering Confidence.';
        $intro_text = !empty($intro_text) ? $intro_text : 'We deliver engineered solutions that stabilise structures, reduce risk, and extend asset life.';

        $intro_contour = function_exists('rx_asset_url') ? rx_asset_url('icons-red/mega-about/contour-grey.png') : '';
        $intro_style = $intro_contour ? ' style="' . esc_attr('--rx-mega-about-contour:url(' . $intro_contour . ');') . '"' : '';

        // Leaves 2 divs open (rx-mega-submenu, rx-mega-submenu-inner) — end_el() closes them with '</div></div>'.
        return '<div class="rx-mega-submenu rx-mega-submenu--about"><div class="rx-mega-submenu-inner rx-mega-submenu-inner--about">'
            . '<div class="rx-mega-submenu-intro rx-mega-submenu-intro--about"' . $intro_style . '>'
            . '<h3>' . esc_html($intro_subtitle) . '</h3>'
            . '<p>' . esc_html($intro_text) . '</p>'
            . '</div>'
            . '<div class="rx-mega-about">' . $columns_markup . '</div>';
    }

    /**
     * Fetch the direct child nav-menu items of a parent menu item, in menu order,
     * fully hydrated (title, url, description, current/ancestor state) via
     * wp_setup_nav_menu_item() so they behave like items from wp_get_nav_menu_items().
     */
    private function get_menu_item_children($parent_id)
    {
        $posts = get_posts(array(
            'post_type' => 'nav_menu_item',
            'posts_per_page' => -1,
            'meta_key' => '_menu_item_menu_item_parent',
            'meta_value' => $parent_id,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => 'publish',
            'no_found_rows' => true,
        ));

        $items = array();
        foreach ($posts as $post) {
            $items[] = wp_setup_nav_menu_item($post);
        }

        return $items;
    }

    private function get_intro_content_markup($menu_item_id)
    {
        $intro_text = get_post_meta($menu_item_id, '_rectify_megamenu_intro_text', true);
        $intro_subtitle = get_post_meta($menu_item_id, '_rectify_megamenu_intro_subtitle', true);
        $button_label = get_post_meta($menu_item_id, '_rectify_megamenu_intro_button_label', true);
        $button_url = get_post_meta($menu_item_id, '_rectify_megamenu_intro_button_url', true);

        $markup = '';

        if (!empty($intro_subtitle)) {
            $markup .= '<h3 class="rx-mega-submenu-intro-subtitle">' . esc_html($intro_subtitle) . '</h3>';
        }

        if (!empty($intro_text)) {
            $markup .= '<p class="rx-mega-submenu-intro-text">' . esc_html($intro_text) . '</p>';
        }

        if (!empty($button_label) && !empty($button_url)) {
            $markup .= '<a class="rx-btn rx-btn-red" href="' . esc_url($button_url) . '">' . esc_html($button_label) . '</a>';
        }

        return $markup;
    }

    private function get_icon_markup($menu_item_id, $depth)
    {
        $icon_svg = get_post_meta($menu_item_id, '_rectify_megamenu_icon_svg', true);
        if (!empty($icon_svg)) {
            return '<span class="rx-mega-icon-wrap rx-mega-icon-svg">' . $icon_svg . '</span>';
        }
        $icon_id = absint(get_post_meta($menu_item_id, '_rectify_megamenu_icon_id', true));
        $icon_url = get_post_meta($menu_item_id, '_rectify_megamenu_icon_url', true);
        $resolved_url = '';

        if ($icon_id) {
            $attachment = wp_get_attachment_image_src($icon_id, 'full');
            if (!empty($attachment[0])) {
                $resolved_url = $attachment[0];
            }
        }

        if (empty($resolved_url) && !empty($icon_url)) {
            $resolved_url = $this->normalize_media_url($icon_url);
        }

        if (empty($resolved_url)) {
            return '';
        }

        return '<span class="rx-mega-icon-wrap"><img class="rx-mega-icon" src="' . esc_url($resolved_url) . '" alt="" loading="lazy" decoding="async" /></span>';
    }

    private function normalize_media_url($url)
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '';
        }

        if (strpos($url, '//') === 0) {
            return 'https:' . $url;
        }

        if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
            return $url;
        }

        if (strpos($url, '/') === 0) {
            return home_url($url);
        }

        return home_url('/' . ltrim($url, '/'));
    }
}

class Rectify_Mega_Menu_Plugin
{
    private $version = '1.1.2';

    public function __construct()
    {
        add_action('init', array($this, 'register_menu_location'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('admin_menu', array($this, 'register_admin_page'));
        add_action('admin_init', array($this, 'register_settings'));
        add_filter('nav_menu_css_class', array($this, 'menu_item_classes'), 10, 4);
        add_action('wp_nav_menu_item_custom_fields', array($this, 'render_menu_item_fields'), 10, 4);
        add_action('wp_update_nav_menu_item', array($this, 'save_menu_item_fields'), 10, 3);
    }

    public function register_menu_location()
    {
        register_nav_menus(array(
            'rectify_megamenu' => __('Rectify Mega Menu', 'rectify-mega-menu'),
        ));
    }

    public function enqueue_frontend_assets()
    {
        wp_enqueue_style('rectify-mega-menu', plugins_url('assets/rectify-mega-menu.css', __FILE__), array(), $this->version);
        wp_enqueue_script('rectify-mega-menu', plugins_url('assets/rectify-mega-menu.js', __FILE__), array(), $this->version, true);
    }

    public function enqueue_admin_assets($hook)
    {
        $allowed_hooks = array('nav-menus.php', 'appearance_page_rectify-mega-menu');
        if (!in_array($hook, $allowed_hooks, true)) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_style('rectify-mega-menu-admin', plugins_url('assets/rectify-mega-menu-admin.css', __FILE__), array(), $this->version);
        wp_enqueue_script('rectify-mega-menu-admin', plugins_url('assets/rectify-mega-menu-admin.js', __FILE__), array('jquery'), $this->version, true);
    }

    public function register_admin_page()
    {
        add_theme_page(
            __('Rectify Mega Menu', 'rectify-mega-menu'),
            __('Rectify Mega Menu', 'rectify-mega-menu'),
            'manage_options',
            'rectify-mega-menu',
            array($this, 'render_settings_page')
        );
    }

    public function register_settings()
    {
        register_setting('rectify_megamenu_options', 'rectify_megamenu_options', array($this, 'sanitize_settings'));

        add_settings_section(
            'rectify_megamenu_general',
            __('General Settings', 'rectify-mega-menu'),
            array($this, 'render_settings_intro'),
            'rectify-mega-menu'
        );

        add_settings_field(
            'rectify_megamenu_location',
            __('Menu Location', 'rectify-mega-menu'),
            array($this, 'render_location_field'),
            'rectify-mega-menu',
            'rectify_megamenu_general'
        );
    }

    public function sanitize_settings($input)
    {
        $sanitized = array();
        $sanitized['location'] = isset($input['location']) ? sanitize_key($input['location']) : 'rectify_megamenu';
        $sanitized['show_descriptions'] = !empty($input['show_descriptions']) ? 1 : 0;

        return $sanitized;
    }

    public function render_settings_intro()
    {
        echo '<p>' . esc_html__('Set up the menu location and manage icons for each menu item directly from Appearance → Menus.', 'rectify-mega-menu') . '</p>';
    }

    public function render_location_field()
    {
        $options = get_option('rectify_megamenu_options', array());
        $location = isset($options['location']) ? $options['location'] : 'rectify_megamenu';
        $menus = get_registered_nav_menus();

        echo '<select name="rectify_megamenu_options[location]">';
        foreach ($menus as $key => $label) {
            printf('<option value="%s" %s>%s</option>', esc_attr($key), selected($location, $key, false), esc_html($label));
        }
        echo '</select>';
        echo '<p class="description">' . esc_html__('Choose the menu location that should render the mega menu.', 'rectify-mega-menu') . '</p>';
    }

    public function render_settings_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have permission to access this page.', 'rectify-mega-menu'));
        }

        echo '<div class="wrap">';
        echo '<h1>' . esc_html__('Rectify Mega Menu', 'rectify-mega-menu') . '</h1>';
        echo '<p>' . esc_html__('This plugin is ready to use. Create or edit a WordPress menu, assign it to the selected location, and upload an icon or image for each item below.', 'rectify-mega-menu') . '</p>';

        echo '<div class="card">';
        echo '<p><strong>' . esc_html__('Next steps:', 'rectify-mega-menu') . '</strong></p>';
        echo '<ol>';
        echo '<li>' . esc_html__('Open Appearance → Menus.', 'rectify-mega-menu') . '</li>';
        echo '<li>' . esc_html__('Add your top-level menu items and sub-items.', 'rectify-mega-menu') . '</li>';
        echo '<li>' . esc_html__('Use the new Icon / Image field to upload an image for each menu item.', 'rectify-mega-menu') . '</li>';
        echo '<li>' . esc_html__('Assign the menu to the Rectify Mega Menu location and save.', 'rectify-mega-menu') . '</li>';
        echo '</ol>';
        echo '</div>';

        echo '<form method="post" action="options.php">';
        settings_fields('rectify_megamenu_options');
        do_settings_sections('rectify-mega-menu');
        submit_button(__('Save Settings', 'rectify-mega-menu'));
        echo '</form>';
        echo '</div>';
    }

    public function render_menu_item_fields($item_id, $item, $depth, $args)
    {
        $icon_id = get_post_meta($item_id, '_rectify_megamenu_icon_id', true);
        $icon_url = get_post_meta($item_id, '_rectify_megamenu_icon_url', true);
        $icon_svg = get_post_meta($item_id, '_rectify_megamenu_icon_svg', true);
        $child_title = get_post_meta($item_id, '_rectify_megamenu_child_title', true);
        $child_description = get_post_meta($item_id, '_rectify_megamenu_child_description', true);
        $intro_text = get_post_meta($item_id, '_rectify_megamenu_intro_text', true);
        $intro_subtitle = get_post_meta($item_id, '_rectify_megamenu_intro_subtitle', true);
        $intro_button_label = get_post_meta($item_id, '_rectify_megamenu_intro_button_label', true);
        $intro_button_url = get_post_meta($item_id, '_rectify_megamenu_intro_button_url', true);
		$preview_url = !empty($icon_url) ? esc_url($icon_url) : '';
		$svg_preview = !empty($icon_svg) ? $icon_svg : '';
        $field_id = 'rectify_megamenu_icon_id_' . $item_id;
        $field_url = 'rectify_megamenu_icon_url_' . $item_id;
        $field_svg = 'rectify_megamenu_icon_svg_' . $item_id;
        $nonce_name = 'rectify_megamenu_item_nonce_' . $item_id;

        wp_nonce_field('rectify_megamenu_item_' . $item_id, $nonce_name);
        ?>
        <div class="rectify-mega-menu-field" data-item-id="<?php echo esc_attr($item_id); ?>">
            <p class="description"><strong><?php esc_html_e('Icon / Image', 'rectify-mega-menu'); ?></strong></p>
            <div class="rectify-mega-menu-preview">
                <?php if (!empty($preview_url)) : ?>
                    <img src="<?php echo esc_url($preview_url); ?>" alt="" />
                <?php elseif (!empty($svg_preview)) : ?>
                    <div class="rectify-mega-menu-svg-preview"><?php echo $svg_preview; ?></div>
                <?php endif; ?>
            </div>
            <input type="hidden" id="<?php echo esc_attr($field_id); ?>" name="rectify_megamenu_icon_id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($icon_id); ?>" />
            <input type="hidden" id="<?php echo esc_attr($field_url); ?>" name="rectify_megamenu_icon_url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($icon_url); ?>" />
            <input type="hidden" id="<?php echo esc_attr($field_svg); ?>" name="rectify_megamenu_icon_svg[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($icon_svg); ?>" />
            <button type="button" class="button rectify-mega-menu-upload-btn" data-target-id="<?php echo esc_attr($field_id); ?>" data-target-url="<?php echo esc_attr($field_url); ?>"><?php esc_html_e('Upload Icon / Image', 'rectify-mega-menu'); ?></button>
            <button type="button" class="button rectify-mega-menu-clear-btn" data-target-id="<?php echo esc_attr($field_id); ?>" data-target-url="<?php echo esc_attr($field_url); ?>"><?php esc_html_e('Clear', 'rectify-mega-menu'); ?></button>
            <p class="description"><?php esc_html_e('Upload a small icon or image for this menu item. It will appear in the mega menu.', 'rectify-mega-menu'); ?></p>
        </div>

        <div class="rectify-mega-menu-field" data-item-id="<?php echo esc_attr($item_id); ?>">
            <p class="description"><strong><?php esc_html_e('SVG Icon (paste)', 'rectify-mega-menu'); ?></strong></p>
            <label for="rectify_megamenu_icon_svg_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('SVG code', 'rectify-mega-menu'); ?></label>
            <textarea id="rectify_megamenu_icon_svg_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_icon_svg[<?php echo esc_attr($item_id); ?>]" rows="4"><?php echo esc_textarea($icon_svg); ?></textarea>
            <p class="description"><?php esc_html_e('Paste inline SVG markup to use instead of an image. Prefer small, optimized SVGs.', 'rectify-mega-menu'); ?></p>
        </div>

        <?php if ($depth > 0) : ?>
            <div class="rectify-mega-menu-field" data-item-id="<?php echo esc_attr($item_id); ?>">
                <p class="description"><strong><?php esc_html_e('Child Menu Content', 'rectify-mega-menu'); ?></strong></p>
                <label for="rectify_megamenu_child_title_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Title', 'rectify-mega-menu'); ?></label>
                <input type="text" id="rectify_megamenu_child_title_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_child_title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($child_title); ?>" />

                <label for="rectify_megamenu_child_description_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Description', 'rectify-mega-menu'); ?></label>
                <textarea id="rectify_megamenu_child_description_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_child_description[<?php echo esc_attr($item_id); ?>]" rows="3"><?php echo esc_textarea($child_description); ?></textarea>
                <p class="description"><?php esc_html_e('Set a custom title and description for this child menu item.', 'rectify-mega-menu'); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($depth === 0) : ?>
            <div class="rectify-mega-menu-field" data-item-id="<?php echo esc_attr($item_id); ?>">
                <p class="description"><strong><?php esc_html_e('Mega Menu Intro', 'rectify-mega-menu'); ?></strong></p>
                <label for="rectify_megamenu_intro_subtitle_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Sub title', 'rectify-mega-menu'); ?></label>
                <input type="text" id="rectify_megamenu_intro_subtitle_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_intro_subtitle[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($intro_subtitle); ?>" />

                <label for="rectify_megamenu_intro_text_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Description', 'rectify-mega-menu'); ?></label>
                <textarea id="rectify_megamenu_intro_text_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_intro_text[<?php echo esc_attr($item_id); ?>]" rows="3"><?php echo esc_textarea($intro_text); ?></textarea>

                <label for="rectify_megamenu_intro_button_label_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Button label', 'rectify-mega-menu'); ?></label>
                <input type="text" id="rectify_megamenu_intro_button_label_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_intro_button_label[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($intro_button_label); ?>" />

                <label for="rectify_megamenu_intro_button_url_<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Button link', 'rectify-mega-menu'); ?></label>
                <input type="url" id="rectify_megamenu_intro_button_url_<?php echo esc_attr($item_id); ?>" name="rectify_megamenu_intro_button_url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($intro_button_url); ?>" />
                <p class="description"><?php esc_html_e('This description and button appear in the mega menu intro area for this parent item.', 'rectify-mega-menu'); ?></p>
            </div>
        <?php endif; ?>
        <?php
    }

    public function save_menu_item_fields($menu_id, $menu_item_db_id, $args)
    {
        $nonce_name = 'rectify_megamenu_item_nonce_' . $menu_item_db_id;
        if (!isset($_POST[$nonce_name]) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$nonce_name])), 'rectify_megamenu_item_' . $menu_item_db_id)) {
            return;
        }

        if (!current_user_can('edit_theme_options')) {
            return;
        }

        $icon_id = isset($_POST['rectify_megamenu_icon_id'][$menu_item_db_id]) ? absint($_POST['rectify_megamenu_icon_id'][$menu_item_db_id]) : 0;
        $icon_url = isset($_POST['rectify_megamenu_icon_url'][$menu_item_db_id]) ? esc_url_raw(wp_unslash($_POST['rectify_megamenu_icon_url'][$menu_item_db_id])) : '';
        $intro_text = isset($_POST['rectify_megamenu_intro_text'][$menu_item_db_id]) ? sanitize_textarea_field(wp_unslash($_POST['rectify_megamenu_intro_text'][$menu_item_db_id])) : '';
        $intro_subtitle = isset($_POST['rectify_megamenu_intro_subtitle'][$menu_item_db_id]) ? sanitize_text_field(wp_unslash($_POST['rectify_megamenu_intro_subtitle'][$menu_item_db_id])) : '';
        $intro_button_label = isset($_POST['rectify_megamenu_intro_button_label'][$menu_item_db_id]) ? sanitize_text_field(wp_unslash($_POST['rectify_megamenu_intro_button_label'][$menu_item_db_id])) : '';
        $intro_button_url = isset($_POST['rectify_megamenu_intro_button_url'][$menu_item_db_id]) ? esc_url_raw(wp_unslash($_POST['rectify_megamenu_intro_button_url'][$menu_item_db_id])) : '';
        $icon_svg_raw = isset($_POST['rectify_megamenu_icon_svg'][$menu_item_db_id]) ? wp_unslash($_POST['rectify_megamenu_icon_svg'][$menu_item_db_id]) : '';
        $icon_svg = $this->sanitize_svg($icon_svg_raw);
        $child_title = isset($_POST['rectify_megamenu_child_title'][$menu_item_db_id]) ? sanitize_text_field(wp_unslash($_POST['rectify_megamenu_child_title'][$menu_item_db_id])) : '';
        $child_description = isset($_POST['rectify_megamenu_child_description'][$menu_item_db_id]) ? sanitize_textarea_field(wp_unslash($_POST['rectify_megamenu_child_description'][$menu_item_db_id])) : '';

        if ($icon_id) {
            $attachment_url = wp_get_attachment_url($icon_id);
            if ($attachment_url) {
                $icon_url = $attachment_url;
            }
            update_post_meta($menu_item_db_id, '_rectify_megamenu_icon_id', $icon_id);
            update_post_meta($menu_item_db_id, '_rectify_megamenu_icon_url', $icon_url);
        } elseif (!empty($icon_url)) {
            update_post_meta($menu_item_db_id, '_rectify_megamenu_icon_url', $icon_url);
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_icon_id');
        } else {
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_icon_id');
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_icon_url');
        }

        if ($intro_text !== '' || $intro_subtitle !== '' || $intro_button_label !== '' || $intro_button_url !== '') {
            update_post_meta($menu_item_db_id, '_rectify_megamenu_intro_text', $intro_text);
            update_post_meta($menu_item_db_id, '_rectify_megamenu_intro_subtitle', $intro_subtitle);
            update_post_meta($menu_item_db_id, '_rectify_megamenu_intro_button_label', $intro_button_label);
            update_post_meta($menu_item_db_id, '_rectify_megamenu_intro_button_url', $intro_button_url);
        } else {
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_intro_text');
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_intro_subtitle');
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_intro_button_label');
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_intro_button_url');
        }

        if ($icon_svg !== '') {
            update_post_meta($menu_item_db_id, '_rectify_megamenu_icon_svg', $icon_svg);
        } else {
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_icon_svg');
        }

        if ($child_title !== '' || $child_description !== '') {
            update_post_meta($menu_item_db_id, '_rectify_megamenu_child_title', $child_title);
            update_post_meta($menu_item_db_id, '_rectify_megamenu_child_description', $child_description);
        } else {
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_child_title');
            delete_post_meta($menu_item_db_id, '_rectify_megamenu_child_description');
        }
    }

    /**
     * Sanitize pasted SVG markup to a safe subset.
     *
     * @param string $svg Raw SVG string
     * @return string Sanitized SVG or empty string
     */
    private function sanitize_svg($svg)
    {
        $svg = trim((string) $svg);
        if ($svg === '') {
            return '';
        }

        // Allow a conservative set of SVG tags and attributes
        $allowed_tags = array(
            'svg' => array(
                'xmlns' => true,
                'width' => true,
                'height' => true,
                'viewBox' => true,
                'fill' => true,
                'stroke' => true,
                'class' => true,
                'aria-hidden' => true,
                'role' => true,
            ),
            'g' => array('fill' => true, 'stroke' => true, 'transform' => true, 'class' => true),
            'path' => array('d' => true, 'fill' => true, 'stroke' => true, 'transform' => true, 'class' => true),
            'rect' => array('x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true),
            'circle' => array('cx' => true, 'cy' => true, 'r' => true, 'fill' => true, 'stroke' => true),
            'ellipse' => array('cx' => true, 'cy' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true),
            'line' => array('x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true),
            'polyline' => array('points' => true, 'fill' => true, 'stroke' => true),
            'polygon' => array('points' => true, 'fill' => true, 'stroke' => true),
            'title' => array(),
            'desc' => array(),
            'defs' => array(),
            'use' => array('href' => true, 'xlink:href' => true),
            'linearGradient' => array('id' => true),
            'stop' => array('offset' => true, 'stop-color' => true, 'stop-opacity' => true),
        );

        // Strip scripts and on* attributes by using wp_kses
        $clean = wp_kses($svg, $allowed_tags);

        return $clean;
    }

    public function menu_item_classes($classes, $item, $args)
    {
        $options = get_option('rectify_megamenu_options', array());
        $location = isset($options['location']) ? $options['location'] : 'rectify_megamenu';

        if ($args->theme_location === $location) {
            if ($item->current || $item->current_item_ancestor || $item->current_item_parent) {
                $classes[] = 'is-active';
            }
        }

        return $classes;
    }
}

new Rectify_Mega_Menu_Plugin();
