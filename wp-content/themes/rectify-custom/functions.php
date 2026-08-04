<?php
/**
 * Rectify Custom Theme - Functions
 * 
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set the content width in pixels
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

require get_template_directory() . '/inc/cpt-job-opportunities.php';
require get_template_directory() . '/inc/cpt-our-projects.php';
require get_template_directory() . '/inc/cpt-case-studies-news.php';
require get_template_directory() . '/inc/homepage-instagram-feed.php';
require get_template_directory() . '/inc/search-support.php';
require get_template_directory() . '/inc/staff-email.php';

if ( ! function_exists( 'rectify_custom_maybe_flush_job_opportunities_rewrites' ) ) {
    /**
     * Flush rewrite rules once after the Job Opportunities CPT is introduced,
     * since the theme is already active and after_switch_theme won't fire.
     */
    function rectify_custom_maybe_flush_job_opportunities_rewrites() {
        if ( ! get_option( 'rectify_job_opportunities_rewrites_flushed' ) ) {
            flush_rewrite_rules();
            update_option( 'rectify_job_opportunities_rewrites_flushed', 1 );
        }
    }
}
add_action( 'init', 'rectify_custom_maybe_flush_job_opportunities_rewrites', 30 );

if ( ! function_exists( 'rectify_custom_maybe_flush_our_projects_rewrites' ) ) {
    /**
     * Flush rewrite rules once after the Our Projects CPT is introduced,
     * since the theme is already active and after_switch_theme won't fire.
     */
    function rectify_custom_maybe_flush_our_projects_rewrites() {
        if ( ! get_option( 'rectify_our_projects_rewrites_flushed' ) ) {
            flush_rewrite_rules();
            update_option( 'rectify_our_projects_rewrites_flushed', 1 );
        }
    }
}
add_action( 'init', 'rectify_custom_maybe_flush_our_projects_rewrites', 30 );

if ( ! function_exists( 'rectify_custom_maybe_flush_articles_rewrites' ) ) {
    /**
     * Flush rewrite rules once after the Case Studies And News & Insights
     * CPT is introduced, since the theme is already active and
     * after_switch_theme won't fire.
     */
    function rectify_custom_maybe_flush_articles_rewrites() {
        if ( ! get_option( 'rectify_articles_rewrites_flushed' ) ) {
            flush_rewrite_rules();
            update_option( 'rectify_articles_rewrites_flushed', 1 );
        }
    }
}
add_action( 'init', 'rectify_custom_maybe_flush_articles_rewrites', 30 );

if ( ! function_exists( 'rectify_custom_maybe_flush_article_category_rewrites' ) ) {
    /**
     * Flush again once after switching article permalinks from the static
     * "resources/article/..." slug to "resources/{article-category}/...",
     * since the old slug is baked into the cached rewrite rules.
     */
    function rectify_custom_maybe_flush_article_category_rewrites() {
        if ( ! get_option( 'rectify_articles_category_rewrites_flushed' ) ) {
            flush_rewrite_rules();
            update_option( 'rectify_articles_category_rewrites_flushed', 1 );
        }
    }
}
add_action( 'init', 'rectify_custom_maybe_flush_article_category_rewrites', 30 );

if ( ! function_exists( 'rectify_custom_enqueue_admin_typography' ) ) {
    /**
     * Keep the WordPress dashboard and login UI aligned with Rectify's
     * Helvetica typography without overriding icon or code fonts.
     */
    function rectify_custom_enqueue_admin_typography() {
        $admin_css = get_template_directory() . '/assets/css/admin.css';

        if ( ! file_exists( $admin_css ) ) {
            return;
        }

        wp_enqueue_style(
            'rectify-admin-typography',
            get_template_directory_uri() . '/assets/css/admin.css',
            array(),
            filemtime( $admin_css )
        );
    }
}
add_action( 'admin_enqueue_scripts', 'rectify_custom_enqueue_admin_typography' );
add_action( 'login_enqueue_scripts', 'rectify_custom_enqueue_admin_typography' );

if ( ! function_exists( 'rx_asset_url' ) ) {
    function rx_asset_url( $relative_path = '' ) {
        $relative_path = ltrim( $relative_path, '/' );
        $theme_dir     = get_stylesheet_directory();
        $theme_uri     = get_stylesheet_directory_uri();
        $parent_dir    = get_template_directory();
        $parent_uri    = get_template_directory_uri();

        $candidates = array(
            array( 'dir' => trailingslashit( $theme_dir ) . 'rectify-homepage-draft2-v3/assets', 'uri' => trailingslashit( $theme_uri ) . 'rectify-homepage-draft2-v3/assets' ),
            array( 'dir' => trailingslashit( $theme_dir ) . 'assets', 'uri' => trailingslashit( $theme_uri ) . 'assets' ),
            array( 'dir' => trailingslashit( $parent_dir ) . 'rectify-homepage-draft2-v3/assets', 'uri' => trailingslashit( $parent_uri ) . 'rectify-homepage-draft2-v3/assets' ),
            array( 'dir' => trailingslashit( $parent_dir ) . 'assets', 'uri' => trailingslashit( $parent_uri ) . 'assets' ),
        );

        foreach ( $candidates as $candidate ) {
            $candidate_path = trailingslashit( $candidate['dir'] ) . $relative_path;
            if ( ( '' === $relative_path && is_dir( $candidate['dir'] ) ) || ( '' !== $relative_path && file_exists( $candidate_path ) ) ) {
                $encoded_path = implode( '/', array_map( 'rawurlencode', explode( '/', $relative_path ) ) );
                $asset_url    = trailingslashit( $candidate['uri'] ) . $encoded_path;

                // Version every local asset, not only enqueued CSS/JS. Many
                // page-builder sections render images directly through this
                // helper, and browsers otherwise keep showing an older file
                // when an image is replaced in place under the same name.
                if ( '' !== $relative_path && is_file( $candidate_path ) ) {
                    $asset_url = add_query_arg( 'ver', (string) filemtime( $candidate_path ), $asset_url );
                }

                return $asset_url;
            }
        }

        $encoded_path = implode( '/', array_map( 'rawurlencode', explode( '/', $relative_path ) ) );
        return trailingslashit( $theme_uri ) . 'rectify-homepage-draft2-v3/assets/' . $encoded_path;
    }
}

if ( ! function_exists( 'rectify_custom_version_upload_url' ) ) {
    /**
     * Add the on-disk modification time to a local Media Library URL.
     *
     * Builder image fields are stored as attachment IDs. WordPress normally
     * emits those image URLs without a version, so replacing/regenerating an
     * attachment in place can leave the previous pixels in the browser cache.
     *
     * @param string $url Attachment or generated image URL.
     * @return string
     */
    function rectify_custom_version_upload_url( $url ) {
        if ( ! is_string( $url ) || '' === $url ) {
            return $url;
        }

        $uploads  = wp_upload_dir();
        $base_url = isset( $uploads['baseurl'] ) ? untrailingslashit( $uploads['baseurl'] ) : '';
        $base_dir = isset( $uploads['basedir'] ) ? untrailingslashit( $uploads['basedir'] ) : '';

        if ( '' === $base_url || '' === $base_dir || 0 !== strpos( $url, $base_url . '/' ) ) {
            return $url;
        }

        $url_path      = (string) wp_parse_url( $url, PHP_URL_PATH );
        $base_url_path = (string) wp_parse_url( $base_url, PHP_URL_PATH );

        if ( '' === $url_path || 0 !== strpos( $url_path, trailingslashit( $base_url_path ) ) ) {
            return $url;
        }

        $relative_path = ltrim( substr( $url_path, strlen( $base_url_path ) ), '/' );
        $file_path     = trailingslashit( $base_dir ) . str_replace( '/', DIRECTORY_SEPARATOR, rawurldecode( $relative_path ) );

        if ( is_file( $file_path ) ) {
            return add_query_arg( 'ver', (string) filemtime( $file_path ), $url );
        }

        return $url;
    }
}

if ( ! function_exists( 'rectify_custom_version_attachment_url' ) ) {
    function rectify_custom_version_attachment_url( $url ) {
        return rectify_custom_version_upload_url( $url );
    }
}
add_filter( 'wp_get_attachment_url', 'rectify_custom_version_attachment_url' );

if ( ! function_exists( 'rectify_custom_version_attachment_image_src' ) ) {
    function rectify_custom_version_attachment_image_src( $image ) {
        if ( is_array( $image ) && ! empty( $image[0] ) ) {
            $image[0] = rectify_custom_version_upload_url( $image[0] );
        }

        return $image;
    }
}
add_filter( 'wp_get_attachment_image_src', 'rectify_custom_version_attachment_image_src' );

if ( ! function_exists( 'rectify_custom_version_attachment_srcset' ) ) {
    function rectify_custom_version_attachment_srcset( $sources ) {
        if ( ! is_array( $sources ) ) {
            return $sources;
        }

        foreach ( $sources as &$source ) {
            if ( is_array( $source ) && ! empty( $source['url'] ) ) {
                $source['url'] = rectify_custom_version_upload_url( $source['url'] );
            }
        }
        unset( $source );

        return $sources;
    }
}
add_filter( 'wp_calculate_image_srcset', 'rectify_custom_version_attachment_srcset' );

if ( ! function_exists( 'rectify_custom_get_residential_solutions_page_ids' ) ) {
    /**
     * Page IDs linked from the "Residential Solutions" branch of the mega menu,
     * regardless of each page's actual parent in the page hierarchy — the mega
     * menu is a manually curated nav menu, so some linked pages (e.g. top-level
     * pages) are not descendants of the "residential" page.
     *
     * @return int[]
     */
    function rectify_custom_get_residential_solutions_page_ids() {
        static $page_ids = null;

        if ( null !== $page_ids ) {
            return $page_ids;
        }

        $page_ids = array();

        $options  = get_option( 'rectify_megamenu_options', array() );
        $location = ! empty( $options['location'] ) ? $options['location'] : 'rectify_megamenu';
        $locations = get_nav_menu_locations();

        if ( empty( $locations[ $location ] ) ) {
            return $page_ids;
        }

        $menu_items = wp_get_nav_menu_items( $locations[ $location ] );

        if ( empty( $menu_items ) ) {
            return $page_ids;
        }

        $children_by_parent = array();
        $top_level_id       = 0;

        foreach ( $menu_items as $menu_item ) {
            $parent_id = (int) $menu_item->menu_item_parent;

            if ( ! isset( $children_by_parent[ $parent_id ] ) ) {
                $children_by_parent[ $parent_id ] = array();
            }
            $children_by_parent[ $parent_id ][] = $menu_item;

            if ( 0 === $parent_id && in_array( strtolower( trim( wp_strip_all_tags( $menu_item->title ) ) ), array( 'residential', 'residential solutions' ), true ) ) {
                $top_level_id = (int) $menu_item->ID;
            }
        }

        if ( ! $top_level_id ) {
            return $page_ids;
        }

        $queue = isset( $children_by_parent[ $top_level_id ] ) ? $children_by_parent[ $top_level_id ] : array();

        while ( ! empty( $queue ) ) {
            $menu_item = array_shift( $queue );
            $object_id = 0;

            if ( in_array( $menu_item->object, array( 'page', 'post' ), true ) ) {
                $object_id = (int) $menu_item->object_id;
            } elseif ( ! empty( $menu_item->url ) ) {
                $object_id = (int) url_to_postid( $menu_item->url );
            }

            if ( $object_id ) {
                $page_ids[] = $object_id;
            }

            if ( isset( $children_by_parent[ (int) $menu_item->ID ] ) ) {
                array_push( $queue, ...$children_by_parent[ (int) $menu_item->ID ] );
            }
        }

        $page_ids = array_values( array_unique( $page_ids ) );

        return $page_ids;
    }
}

if ( ! function_exists( 'rectify_custom_is_residential_solutions_page' ) ) {
    function rectify_custom_is_residential_solutions_page( $post_id = 0 ) {
        $post_id = $post_id ? (int) $post_id : get_queried_object_id();

        if ( ! $post_id ) {
            return false;
        }

        return in_array( (int) $post_id, rectify_custom_get_residential_solutions_page_ids(), true );
    }
}

if ( ! function_exists( 'rectify_custom_residential_solutions_template_include' ) ) {
    function rectify_custom_residential_solutions_template_include( $template ) {
        if ( is_page() && rectify_custom_is_residential_solutions_page() ) {
            $custom_template = get_template_directory() . '/template-parts/residential/single.php';

            if ( file_exists( $custom_template ) ) {
                return $custom_template;
            }
        }

        return $template;
    }
}
add_filter( 'template_include', 'rectify_custom_residential_solutions_template_include' );

if ( ! function_exists( 'rectify_custom_redirect_old_residential_solutions_urls' ) ) {
    /**
     * The "residential-solutions" page slug was renamed to "residential".
     * 301 redirect any lingering /residential-solutions/... requests
     * (bookmarks, backlinks, search results) to the new /residential/... URL.
     */
    function rectify_custom_redirect_old_residential_solutions_urls() {
        $request_path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
        $home_path    = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );

        if ( $home_path && str_starts_with( $request_path, $home_path ) ) {
            $request_path = trim( substr( $request_path, strlen( $home_path ) ), '/' );
        }

        if ( $request_path === 'residential-solutions' || str_starts_with( $request_path, 'residential-solutions/' ) ) {
            $new_path = 'residential' . substr( $request_path, strlen( 'residential-solutions' ) );
            wp_safe_redirect( home_url( '/' . $new_path . '/' ), 301 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'rectify_custom_redirect_old_residential_solutions_urls' );

if ( ! function_exists( 'rectify_custom_residential_menu_services' ) ) {
    function rectify_custom_residential_menu_services() {
        return array(
            array(
                'Rectify_Icon_Set_Cracked_Wall.svg',
                'Cracked Walls',
                'Identify and address the underlying causes of structural cracking, not just the symptoms.',
            ),
            array(
                'Rectify Icon Set_Sloping Slab.svg',
                'Sloping Slab',
                'Correct uneven floor levels caused by foundation movement and soil instability.',
            ),
            array(
                'Rectify Icon Set_Sticking Door.svg',
                'Jamming Doors & Windows',
                'Resolve movement-related issues that affect the operation of doors and windows.',
            ),
            array(
                'Rectify Icon Set_Leaning Wall.svg',
                'Leaning Walls & Gaps in Doors & Windows',
                'Address structural movement causing separation, distortion, and visible misalignment.',
            ),
            array(
                'Rectify Icon Set_Leaning Chimney.svg',
                'Leaning Pillars & Chimneys',
                'Stabilise and correct structural elements affected by foundation settlement.',
            ),
            array(
                'Rectify Icon Set_Uneven Control Joint.svg',
                'Open/Uneven Control Joints',
                'Assess and rectify joint movement resulting from slab displacement and ground changes.',
            ),
            array(
                'Rectify Icon Set_Weak Soil.svg',
                'Weak Soils',
                'Improve ground conditions beneath homes to reduce future movement and instability.',
            ),
            array(
                'Rectify Icon Set_Sinkhole Remediation.svg',
                'Erosion Control & Sinkhole Remediation',
                'Stabilise compromised ground and address subsurface voids before they cause further damage.',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_service_defaults' ) ) {
    function rectify_custom_service_defaults() {
        $services = array_merge(
            rectify_custom_residential_menu_services(),
            array(
                array(
                    'Rectify Icon Set_House Relevelling.svg',
                    'House Relevelling',
                    'Raise and stabilise affected areas where foundation movement has changed floor levels.',
                ),
                array(
                    'Rectify Icon Set_Slab Lifting.svg',
                    'Slab Lifting',
                    'Restore sunken concrete slabs with targeted lifting and ground improvement methods.',
                ),
            )
        );

        $defaults = array();
        foreach ( $services as $service ) {
            $defaults[ sanitize_title( $service[1] ) ] = $service;
        }

        return $defaults;
    }
}

if ( ! function_exists( 'rectify_custom_service_aliases' ) ) {
    function rectify_custom_service_aliases() {
        return array(
            'wall-cracks'              => 'cracked-walls',
            'jammed-doors-windows'    => 'jamming-doors-windows',
            'leaning-pillars-chimneys' => 'leaning-pillars-chimneys',
        );
    }
}

/**
 * Theme Setup
 */
function rectify_custom_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary'          => __( 'Primary Menu', 'rectify-custom' ),
        'rectify_megamenu' => __( 'Rectify Mega Menu', 'rectify-custom' ),
        'footer'           => __( 'Footer Menu', 'rectify-custom' ),
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Brand color palette for the block editor
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'Navy', 'rectify-custom' ),
            'slug'  => 'brand-navy',
            'color' => '#222840',
        ),
        array(
            'name'  => __( 'Dark', 'rectify-custom' ),
            'slug'  => 'brand-dark',
            'color' => '#000000',
        ),
        array(
            'name'  => __( 'Red', 'rectify-custom' ),
            'slug'  => 'brand-red',
            'color' => '#bd1726',
        ),
        array(
            'name'  => __( 'American Flag Navy Blue', 'rectify-custom' ),
            'slug'  => 'brand-navy-secondary',
            'color' => '#002147',
        ),
        array(
            'name'  => __( 'Secondary Red', 'rectify-custom' ),
            'slug'  => 'brand-red-secondary',
            'color' => '#b72a2f',
        ),
        array(
            'name'  => __( 'Orange', 'rectify-custom' ),
            'slug'  => 'brand-orange',
            'color' => '#fe5000',
        ),
        array(
            'name'  => __( 'Dark Gray', 'rectify-custom' ),
            'slug'  => 'neutral-dark-gray',
            'color' => '#555555',
        ),
        array(
            'name'  => __( 'Light Gray', 'rectify-custom' ),
            'slug'  => 'neutral-gray',
            'color' => '#676767',
        ),
        array(
            'name'  => __( 'Light', 'rectify-custom' ),
            'slug'  => 'neutral-light',
            'color' => '#c8c8c8',
        ),
        array(
            'name'  => __( 'Lightest', 'rectify-custom' ),
            'slug'  => 'neutral-lightest',
            'color' => '#f3f3f3',
        ),
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'rectify-custom', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'rectify_custom_theme_setup' );

/**
 * Media uploads: keep only the original file.
 *
 * By default WordPress generates several extra copies of every uploaded
 * image (thumbnail, medium, medium_large, large, 1536x1536, 2048x2048, plus
 * an auto-scaled "-scaled" copy for large originals). This site only wants
 * the single original file kept, so all of that is disabled at the source.
 */
add_filter( 'intermediate_image_sizes_advanced', '__return_empty_array' );
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes', '__return_empty_array' );

/**
 * Register Widget Areas
 */
function rectify_custom_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'rectify-custom' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Main sidebar widget area', 'rectify-custom' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 1', 'rectify-custom' ),
        'id'            => 'footer-1',
        'description'   => __( 'Footer widget area 1', 'rectify-custom' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 2', 'rectify-custom' ),
        'id'            => 'footer-2',
        'description'   => __( 'Footer widget area 2', 'rectify-custom' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 3', 'rectify-custom' ),
        'id'            => 'footer-3',
        'description'   => __( 'Footer widget area 3', 'rectify-custom' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'rectify_custom_widgets_init' );

/**
 * Enqueue Styles and Scripts
 */
function rectify_custom_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style( 
        'rectify-custom-style', 
        get_stylesheet_uri(), 
        array(), 
        filemtime( get_template_directory() . '/style.css' )
    );

    if ( is_search() || isset( $_GET['s'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        $search_css = get_template_directory() . '/assets/css/search.css';

        if ( file_exists( $search_css ) ) {
            wp_enqueue_style(
                'rectify-search',
                get_template_directory_uri() . '/assets/css/search.css',
                array( 'rectify-custom-style' ),
                filemtime( $search_css )
            );
        }
    }

    $residential_page = get_page_by_path( 'residential' );
    $commercial_page  = get_page_by_path( 'commercial-solutions' );
    $current_page     = is_page() ? get_queried_object() : null;
    $residential_ids  = array();
    $commercial_ids   = array();

    if ( $current_page instanceof WP_Post ) {
        $residential_ids = get_post_ancestors( $current_page );
        $commercial_ids  = get_post_ancestors( $current_page );
    }

    $is_residential_page = is_page( 'residential' )
        || (
            $residential_page instanceof WP_Post
            && in_array( (int) $residential_page->ID, array_map( 'intval', $residential_ids ), true )
        )
        || rectify_custom_is_residential_solutions_page();

    $is_commercial_page = is_page( 'commercial-solutions' )
        || (
            $commercial_page instanceof WP_Post
            && in_array( (int) $commercial_page->ID, array_map( 'intval', $commercial_ids ), true )
        );

    $is_case_single_page    = is_page( 'case-studies-sigle-page' ) || is_singular( 'rectify_article' );
    $is_careers_single_page = is_page( 'careers-single-page' ) || is_singular( 'job_opportunity' );

    $is_commercial_figma_inner_page = $current_page instanceof WP_Post
        && in_array( $current_page->post_name, array( 'ground-improvement', 'void-filling', 'leak-sealing-water-stopping', 'realignment-levelling', 'slab-lifting', 'protective-coatings-concrete-repair', 'engineered-fill', 'pipe-abandonment', 'civil-energy-utilities-sector', 'undermining-treatment', 'hospital-asset-remediation' ), true )
        && $commercial_page instanceof WP_Post
        && (int) $current_page->post_parent === (int) $commercial_page->ID;

    $is_commercial_archive_page = $current_page instanceof WP_Post
        && 'commercial-solutions' === $current_page->post_name;

    $is_residential_figma_inner_page = $current_page instanceof WP_Post
        && in_array( $current_page->post_name, array( 'ground-improvement', 'house-relevelling', 'weak-soils', 'foundation-repair', 'leaning-pillars-chimneys', 'leaning-pillars', 'chemical-underpinning', 'driveway-relevelling', 'sand-permeation', 'mailbox-brick-fence-releveling', 'basement-construction-support', 'slab-relevelling', 'cracked-walls', 'open-uneven-control-joints', 'sloping-slab', 'erosion-control-sinkhole-remediation', 'jammed-doors-windows', 'leaning-house-wall' ), true )
        && $residential_page instanceof WP_Post
        && (int) $current_page->post_parent === (int) $residential_page->ID;

    $is_about_rectify_figma_page = $current_page instanceof WP_Post
        && 'about-rectify' === $current_page->post_name;

    $industries_page = get_page_by_path( 'industries' );

    $is_industries_figma_inner_page = $current_page instanceof WP_Post
        && in_array( $current_page->post_name, array( 'transport-assets', 'commercial-buildings', 'utilities-energy', 'mining-resources', 'industrial-facilities', 'civil-infrastructure', 'residential-strata', 'marine-coastal' ), true )
        && $industries_page instanceof WP_Post
        && (int) $current_page->post_parent === (int) $industries_page->ID;

    if ( ( $is_residential_page || $is_commercial_page || $is_case_single_page || $is_careers_single_page || is_page( 'soil-stabilisation' ) ) && ! $is_commercial_figma_inner_page && ! $is_commercial_archive_page && ! $is_residential_figma_inner_page ) {
        $inner_pages_css = get_template_directory() . '/assets/css/inner-page.css';

        if ( file_exists( $inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-inner-pages',
                get_template_directory_uri() . '/assets/css/inner-page.css',
                array( 'rectify-custom-style' ),
                filemtime( $inner_pages_css )
            );
        }

        $inner_mobile_css = get_template_directory() . '/assets/css/mobile/inner-mobile.css';

        if ( file_exists( $inner_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-inner-mobile',
                get_template_directory_uri() . '/assets/css/mobile/inner-mobile.css',
                array( 'rectify-inner-pages' ),
                filemtime( $inner_mobile_css )
            );
        }
    }

    if ( $is_case_single_page ) {
        $resources_inner_pages_css = get_template_directory() . '/assets/css/resources-inner-pages.css';

        if ( file_exists( $resources_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-resources-inner-pages',
                get_template_directory_uri() . '/assets/css/resources-inner-pages.css',
                array( 'rectify-custom-style', 'rectify-inner-pages' ),
                filemtime( $resources_inner_pages_css )
            );
        }

        $resources_mobile_css = get_template_directory() . '/assets/css/mobile/resources-mobile.css';

        if ( file_exists( $resources_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-resources-mobile',
                get_template_directory_uri() . '/assets/css/mobile/resources-mobile.css',
                array( 'rectify-resources-inner-pages' ),
                filemtime( $resources_mobile_css )
            );
        }
    }

    if ( $is_commercial_figma_inner_page || $is_commercial_archive_page ) {
        $commercial_inner_pages_css = get_template_directory() . '/assets/css/commercial-inner-pages.css';

        if ( file_exists( $commercial_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-commercial-inner-pages',
                get_template_directory_uri() . '/assets/css/commercial-inner-pages.css',
                array( 'rectify-custom-style' ),
                filemtime( $commercial_inner_pages_css )
            );
        }

        $commercial_mobile_css = get_template_directory() . '/assets/css/mobile/commercial-mobile.css';

        if ( file_exists( $commercial_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-commercial-mobile',
                get_template_directory_uri() . '/assets/css/mobile/commercial-mobile.css',
                array( 'rectify-commercial-inner-pages' ),
                filemtime( $commercial_mobile_css )
            );
        }
    }

    if ( $is_industries_figma_inner_page ) {
        $industries_inner_pages_css = get_template_directory() . '/assets/css/industries-inner-pages.css';

        if ( file_exists( $industries_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-industries-inner-pages',
                get_template_directory_uri() . '/assets/css/industries-inner-pages.css',
                array( 'rectify-custom-style' ),
                filemtime( $industries_inner_pages_css )
            );
        }

        $industries_mobile_css = get_template_directory() . '/assets/css/mobile/industries-mobile.css';

        if ( file_exists( $industries_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-industries-mobile',
                get_template_directory_uri() . '/assets/css/mobile/industries-mobile.css',
                array( 'rectify-industries-inner-pages' ),
                filemtime( $industries_mobile_css )
            );
        }

        $industries_inner_pages_js = get_template_directory() . '/assets/js/industries-inner-pages.js';

        if ( file_exists( $industries_inner_pages_js ) ) {
            wp_enqueue_script(
                'rectify-industries-inner-pages',
                get_template_directory_uri() . '/assets/js/industries-inner-pages.js',
                array(),
                filemtime( $industries_inner_pages_js ),
                true
            );
        }
    }

    if ( $is_residential_figma_inner_page ) {
        $residential_inner_pages_css = get_template_directory() . '/assets/css/residential-inner-pages.css';

        if ( file_exists( $residential_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-residential-inner-pages',
                get_template_directory_uri() . '/assets/css/residential-inner-pages.css',
                array( 'rectify-custom-style' ),
                filemtime( $residential_inner_pages_css )
            );
        }

        $residential_mobile_css = get_template_directory() . '/assets/css/mobile/residential-mobile.css';

        if ( file_exists( $residential_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-residential-mobile',
                get_template_directory_uri() . '/assets/css/mobile/residential-mobile.css',
                array( 'rectify-residential-inner-pages' ),
                filemtime( $residential_mobile_css )
            );
        }

        // The "Engineered. Rectified. Performance Verified." image slider on these
        // pages reuses the homepage's .rx-performance/.rx-slider markup, so it
        // needs the same carousel script (auto-init is scoped to that selector).
        $residential_slider_js = get_template_directory() . '/assets/js/rectify-home.js';

        if ( file_exists( $residential_slider_js ) ) {
            wp_enqueue_script(
                'rectify-home-slider',
                get_template_directory_uri() . '/assets/js/rectify-home.js',
                array(),
                filemtime( $residential_slider_js ),
                true
            );
        }
    }

    $inner_pages_plural_slugs = array( 'case-studies', 'news-and-insights', 'contact-us', 'assessment', 'get-a-free-quote', 'quotation', 'soil-stabilisation', 'our-policy', 'legal' );

    $is_faq_child_page = $current_page instanceof WP_Post
        && $current_page->post_parent
        && 'faq' === get_post_field( 'post_name', $current_page->post_parent );

    if ( is_page( $inner_pages_plural_slugs ) || $is_faq_child_page ) {
        $inner_pages_plural_css = get_template_directory() . '/assets/css/inner-pages.css';

        if ( file_exists( $inner_pages_plural_css ) ) {
            wp_enqueue_style(
                'rectify-inner-pages-plural',
                get_template_directory_uri() . '/assets/css/inner-pages.css',
                array( 'rectify-custom-style' ),
                filemtime( $inner_pages_plural_css )
            );
        }

        $inner_mobile_css = get_template_directory() . '/assets/css/mobile/inner-mobile.css';

        if ( file_exists( $inner_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-inner-mobile',
                get_template_directory_uri() . '/assets/css/mobile/inner-mobile.css',
                array( 'rectify-inner-pages-plural' ),
                filemtime( $inner_mobile_css )
            );
        }
    }

    // 'our-technology' is also used by a FAQ category child page (parent
    // 'faq'), so it must be scoped to the About Us child page by parent
    // slug rather than added to the plain is_page() slug list below.
    $is_about_our_technology_page = $current_page instanceof WP_Post
        && 'our-technology' === $current_page->post_name
        && $current_page->post_parent
        && 'about-us' === get_post_field( 'post_name', $current_page->post_parent );

    // 'our-process' is also used by a FAQ category child page (parent
    // 'faq'), so it must be scoped to the About Us child page by parent
    // slug rather than added to the plain is_page() slug list below.
    $is_about_our_process_page = $current_page instanceof WP_Post
        && 'our-process' === $current_page->post_name
        && $current_page->post_parent
        && 'about-us' === get_post_field( 'post_name', $current_page->post_parent );

    if ( is_page( array( 'about-rectify', 'our-locations', 'meet-the-team', 'our-story', 'certifications-compliance', 'careers' ) ) || $is_about_our_technology_page || $is_about_our_process_page ) {
        $about_inner_pages_css = get_template_directory() . '/assets/css/about-inner-pages.css';

        if ( file_exists( $about_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-about-inner-pages',
                get_template_directory_uri() . '/assets/css/about-inner-pages.css',
                array( 'rectify-custom-style' ),
                filemtime( $about_inner_pages_css )
            );
        }

        $about_mobile_css = get_template_directory() . '/assets/css/mobile/about-mobile.css';

        if ( file_exists( $about_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-about-mobile',
                get_template_directory_uri() . '/assets/css/mobile/about-mobile.css',
                array( 'rectify-about-inner-pages' ),
                filemtime( $about_mobile_css )
            );
        }
    }

    if ( is_page( 'our-locations' ) ) {
        $our_locations_map_js = get_template_directory() . '/js/our-locations-map.js';

        if ( file_exists( $our_locations_map_js ) ) {
            wp_enqueue_script(
                'rectify-our-locations-map',
                get_template_directory_uri() . '/js/our-locations-map.js',
                array(),
                filemtime( $our_locations_map_js ),
                true
            );

            wp_enqueue_script(
                'rectify-our-locations-google-maps',
                'https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhu_75UbalvbIiuIWocy8-LHVuGgItnU&callback=initRectifyLocationsMap',
                array( 'rectify-our-locations-map' ),
                null,
                true
            );
        }
    }

    if ( is_page( 'meet-the-team' ) ) {
        $meet_the_team_email_js = get_template_directory() . '/js/meet-the-team-email.js';

        if ( file_exists( $meet_the_team_email_js ) ) {
            wp_enqueue_script(
                'rectify-meet-the-team-email',
                get_template_directory_uri() . '/js/meet-the-team-email.js',
                array( 'rectify-custom-script' ),
                filemtime( $meet_the_team_email_js ),
                true
            );
        }
    }

    if ( is_page( 'case-studies' ) ) {
        $resources_inner_pages_css = get_template_directory() . '/assets/css/resources-inner-pages.css';

        if ( file_exists( $resources_inner_pages_css ) ) {
            wp_enqueue_style(
                'rectify-resources-inner-pages',
                get_template_directory_uri() . '/assets/css/resources-inner-pages.css',
                array( 'rectify-inner-pages-plural' ),
                filemtime( $resources_inner_pages_css )
            );
        }

        $resources_mobile_css = get_template_directory() . '/assets/css/mobile/resources-mobile.css';

        if ( file_exists( $resources_mobile_css ) ) {
            wp_enqueue_style(
                'rectify-resources-mobile',
                get_template_directory_uri() . '/assets/css/mobile/resources-mobile.css',
                array( 'rectify-resources-inner-pages' ),
                filemtime( $resources_mobile_css )
            );
        }
    }

    if ( is_page( 'warranty' ) ) {
        $warranty_css = get_template_directory() . '/assets/css/warranty.css';

        if ( file_exists( $warranty_css ) ) {
            wp_enqueue_style(
                'rectify-warranty',
                get_template_directory_uri() . '/assets/css/warranty.css',
                array( 'rectify-custom-style' ),
                filemtime( $warranty_css )
            );
        }
    }

    // Keep the shared three-card help CTA consistent across page-specific templates.
    $help_cta_css = get_template_directory() . '/assets/css/help-cta.css';

    if ( file_exists( $help_cta_css ) ) {
        wp_enqueue_style(
            'rectify-help-cta',
            get_template_directory_uri() . '/assets/css/help-cta.css',
            array( 'rectify-custom-style' ),
            filemtime( $help_cta_css )
        );
    }

    // Sticky "Get a Quick Quote" tab + panel: shown on every page (see header.php).
    $sticky_quick_quote_css = get_template_directory() . '/assets/css/sticky-quick-quote.css';

    if ( file_exists( $sticky_quick_quote_css ) ) {
        wp_enqueue_style(
            'rectify-sticky-quick-quote',
            get_template_directory_uri() . '/assets/css/sticky-quick-quote.css',
            array( 'rectify-custom-style' ),
            filemtime( $sticky_quick_quote_css )
        );
    }

    $sticky_quick_quote_js = get_template_directory() . '/js/sticky-quick-quote.js';

    if ( file_exists( $sticky_quick_quote_js ) ) {
        wp_enqueue_script(
            'rectify-sticky-quick-quote',
            get_template_directory_uri() . '/js/sticky-quick-quote.js',
            array(),
            filemtime( $sticky_quick_quote_js ),
            true
        );
    }

    $faq_deep_links_js = get_template_directory() . '/js/faq-deep-links.js';

    if ( file_exists( $faq_deep_links_js ) ) {
        wp_enqueue_script(
            'rectify-faq-deep-links',
            get_template_directory_uri() . '/js/faq-deep-links.js',
            array(),
            filemtime( $faq_deep_links_js ),
            true
        );
    }

    // Main script
    wp_enqueue_script(
        'rectify-custom-script',
        get_template_directory_uri() . '/js/main.js',
        array(),
        filemtime( get_template_directory() . '/js/main.js' ),
        true
    );

    // Comment script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Turns the Gravity Forms/HubSpot AJAX confirmation into a popup. Loaded
    // sitewide because the sticky "Get a Quick Quote" widget (header.php)
    // relies on it on every page, not just the dedicated form pages.
    $contact_thankyou_js = get_template_directory() . '/js/contact-thankyou.js';

    if ( file_exists( $contact_thankyou_js ) ) {
        wp_enqueue_script(
            'rectify-contact-thankyou',
            get_template_directory_uri() . '/js/contact-thankyou.js',
            array( 'jquery' ),
            filemtime( $contact_thankyou_js ),
            true
        );
    }

    // Contact Us: give the HubSpot fields the design's placeholders without
    // replacing its form markup.
    if ( is_page( 'contact-us' ) ) {
        $hubspot_contact_form_js = get_template_directory() . '/js/hubspot-contact-form.js';

        if ( file_exists( $hubspot_contact_form_js ) ) {
            wp_enqueue_script(
                'rectify-hubspot-contact-form',
                get_template_directory_uri() . '/js/hubspot-contact-form.js',
                array(),
                filemtime( $hubspot_contact_form_js ),
                true
            );
        }
    }

    // Enhance the native HubSpot upload field without replacing its form markup.
    if ( is_page( array( 'assessment', 'get-a-free-quote' ) ) ) {
        $hubspot_quote_form_js = get_template_directory() . '/js/hubspot-quote-form.js';

        if ( file_exists( $hubspot_quote_form_js ) ) {
            wp_enqueue_script(
                'rectify-hubspot-quote-form',
                get_template_directory_uri() . '/js/hubspot-quote-form.js',
                array(),
                filemtime( $hubspot_quote_form_js ),
                true
            );
        }
    }

    // Pass data to JavaScript
    wp_localize_script( 'rectify-custom-script', 'rectifyData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'rectify_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'rectify_custom_enqueue_assets' );

if ( ! function_exists( 'rectify_custom_enqueue_typography' ) ) {
    /**
     * Load the Figma-derived typography contract after page-specific styles.
     *
     * A late priority is intentional: every front-end template shares the same
     * Helvetica Regular/Bold system while retaining its own layout stylesheet.
     */
    function rectify_custom_enqueue_typography() {
        $typography_css = get_template_directory() . '/assets/css/typography.css';

        if ( ! file_exists( $typography_css ) ) {
            return;
        }

        wp_enqueue_style(
            'rectify-typography',
            get_template_directory_uri() . '/assets/css/typography.css',
            array( 'rectify-custom-style' ),
            filemtime( $typography_css )
        );

        $homeowner_advantage_css = get_template_directory() . '/assets/css/homeowner-advantage.css';

        if ( file_exists( $homeowner_advantage_css ) ) {
            wp_enqueue_style(
                'rectify-homeowner-advantage',
                get_template_directory_uri() . '/assets/css/homeowner-advantage.css',
                array( 'rectify-typography' ),
                filemtime( $homeowner_advantage_css )
            );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'rectify_custom_enqueue_typography', 99 );

/**
 * Use the quotation form labels as placeholders to match the compact design.
 *
 * @param array $form Gravity Forms form configuration.
 * @return array
 */
function rectify_custom_quotation_form_placeholders( $form ) {
    if ( ! is_page( 'quotation' ) || empty( $form['fields'] ) ) {
        return $form;
    }

    foreach ( $form['fields'] as $field ) {
        if ( in_array( $field->type, array( 'text', 'email', 'phone', 'textarea' ), true ) ) {
            $field->placeholder = $field->label . ( $field->isRequired ? '*' : '' );
        }
    }

    return $form;
}
add_filter( 'gform_pre_render_1', 'rectify_custom_quotation_form_placeholders' );
add_filter( 'gform_pre_validation_1', 'rectify_custom_quotation_form_placeholders' );
add_filter( 'gform_pre_submission_filter_1', 'rectify_custom_quotation_form_placeholders' );

/**
 * Custom excerpt length
 */
function rectify_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'rectify_custom_excerpt_length' );

/**
 * Custom excerpt more
 */
function rectify_custom_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'rectify_custom_excerpt_more' );

/**
 * Get custom logo
 */
function rectify_custom_get_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html            = sprintf(
        '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
        esc_url( home_url( '/' ) ),
        wp_get_attachment_image( $custom_logo_id, 'full' )
    );

    return $html;
}

/**
 * Display post meta information
 */
function rectify_custom_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    printf(
        '<span class="posted-on">%s</span>',
        $time_string
    );
}

/**
 * Display author information
 */
function rectify_custom_posted_by() {
    printf(
        '<span class="byline">%s</span>',
        sprintf(
            __( 'by %s', 'rectify-custom' ),
            '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
        )
    );
}

/**
 * Comments template
 */
if ( ! function_exists( 'rectify_custom_comment' ) ) {
    function rectify_custom_comment( $comment, $args, $depth ) {
        $tag = 'div' === $args['style'] ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                        <?php printf( __( '<b class="fn">%s</b> <span class="says">says:</span>', 'rectify-custom' ), get_comment_author_link() ); ?>
                    </div>
                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php comment_time( __( 'F j, Y \a\t g:i a', 'rectify-custom' ) ); ?>
                            </time>
                        </a>
                        <?php edit_comment_link( __( '(Edit)', 'rectify-custom' ), ' ' ); ?>
                    </div>
                </footer>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </article>
        <?php
    }
}

/**
 * Pagination
 */
if ( ! function_exists( 'rectify_custom_pagination' ) ) {
    function rectify_custom_pagination() {
        global $wp_query;

        $big   = 999999999;
        $links = paginate_links( array(
            'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'  => '?paged=%#%',
            'current' => max( 1, get_query_var( 'paged' ) ),
            'total'   => $wp_query->max_num_pages,
            'type'    => 'array',
        ) );

        if ( $links ) {
            echo '<div class="pagination">';
            echo implode( '', $links );
            echo '</div>';
        }
    }
}

/**
 * Add custom CSS classes to body tag
 */
function rectify_custom_body_classes( $classes ) {
    if ( is_home() ) {
        $classes[] = 'blog-page';
    }

    if ( is_archive() ) {
        $classes[] = 'archive-page';
    }

    if ( is_search() ) {
        $classes[] = 'search-page';
    }

    if ( is_singular() ) {
        $classes[] = 'single-page';
    }

    $residential_page = get_page_by_path( 'residential' );
    $commercial_page  = get_page_by_path( 'commercial-solutions' );
    $current_page     = is_page() ? get_queried_object() : null;
    $residential_ids  = array();
    $commercial_ids   = array();

    if ( $current_page instanceof WP_Post ) {
        $residential_ids = get_post_ancestors( $current_page );
        $commercial_ids  = get_post_ancestors( $current_page );
    }

    if (
        is_page( 'residential' )
        || (
            $residential_page instanceof WP_Post
            && in_array( (int) $residential_page->ID, array_map( 'intval', $residential_ids ), true )
        )
        || rectify_custom_is_residential_solutions_page()
    ) {
        $classes[] = 'rx-residential-solutions-page';
    }

    if (
        is_page( 'commercial-solutions' )
        || (
            $commercial_page instanceof WP_Post
            && in_array( (int) $commercial_page->ID, array_map( 'intval', $commercial_ids ), true )
        )
    ) {
        $classes[] = 'rx-commercial-solutions-page';
    }

    if ( is_page( 'our-locations' ) ) {
        $classes[] = 'rx-our-locations-page';
    }

    if ( is_page( 'contact-us' ) ) {
        $classes[] = 'rx-contact-us-page';
    }

    if ( is_page( 'meet-the-team' ) ) {
        $classes[] = 'rx-meet-the-team-page';
    }

    if ( is_page( 'about-rectify' ) ) {
        $classes[] = 'rx-about-rectify-page-body';
    }

    if ( is_page( 'our-story' ) ) {
        $classes[] = 'rx-our-story-page';
    }

    // Note: 'our-technology' is also used by a FAQ category child page
    // (parent 'faq'), so this must be scoped to the About Us child page by
    // parent slug rather than using is_page( 'our-technology' ) alone.
    if (
        $current_page instanceof WP_Post
        && 'our-technology' === $current_page->post_name
        && $current_page->post_parent
        && 'about-us' === get_post_field( 'post_name', $current_page->post_parent )
    ) {
        $classes[] = 'rx-tech-page-body';
    }

    // Note: 'our-process' is also used by a FAQ category child page
    // (parent 'faq'), so this must be scoped to the About Us child page by
    // parent slug rather than using is_page( 'our-process' ) alone.
    if (
        $current_page instanceof WP_Post
        && 'our-process' === $current_page->post_name
        && $current_page->post_parent
        && 'about-us' === get_post_field( 'post_name', $current_page->post_parent )
    ) {
        $classes[] = 'rx-process-page-body';
    }

    if ( is_page( array( 'hospital-asset-remediation', 'undermining-treatment', 'case-studies', 'news-and-insights', 'careers' ) ) ) {
        $classes[] = 'rx-fullwidth-page';
    }

    if (
        $current_page instanceof WP_Post
        && 'residential' === $current_page->post_name
        && $current_page->post_parent
        && 'faq' === get_post_field( 'post_name', $current_page->post_parent )
    ) {
        $classes[] = 'rx-fullwidth-page';
    }

    if ( is_page( 'case-studies-sigle-page' ) || is_singular( 'rectify_article' ) ) {
        $classes[] = 'rx-case-single-page';
    }

    if ( is_page( 'careers-single-page' ) || is_singular( 'job_opportunity' ) ) {
        $classes[] = 'rx-career-single-page';
    }

    return $classes;
}
add_filter( 'body_class', 'rectify_custom_body_classes' );

if ( ! function_exists( 'rectify_custom_residential_solution_acf_fields' ) ) {
    function rectify_custom_residential_solution_acf_fields() {
        return array(
            array(
                'key'       => 'field_rectify_residential_tab_hero',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name'  => 'residential_hero_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_residential_hero_title',
                'label' => 'Hero Title',
                'name'  => 'residential_hero_title',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_residential_hero_supporting_title',
                'label' => 'Hero Supporting Title',
                'name'  => 'residential_hero_supporting_title',
                'type'  => 'text',
            ),
            array(
                'key'  => 'field_rectify_residential_hero_copy',
                'label' => 'Hero Copy',
                'name' => 'residential_hero_copy',
                'type' => 'textarea',
                'rows' => 4,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_residential_hero_image',
                'label'         => 'Hero Strip Image',
                'name'          => 'residential_hero_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'           => 'field_rectify_residential_hero_primary_link',
                'label'         => 'Hero Primary Button',
                'name'          => 'residential_hero_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_residential_hero_secondary_link',
                'label'         => 'Hero Secondary Button',
                'name'          => 'residential_hero_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'       => 'field_rectify_residential_tab_intro',
                'label'     => 'Intro',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_intro_eyebrow',
                'label' => 'Intro Eyebrow',
                'name'  => 'residential_intro_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_residential_intro_title',
                'label' => 'Intro Title',
                'name'  => 'residential_intro_title',
                'type'  => 'text',
            ),
            array(
                'key'     => 'field_rectify_residential_intro_copy',
                'label'   => 'Intro Copy',
                'name'    => 'residential_intro_copy',
                'type'    => 'wysiwyg',
                'tabs'    => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key'           => 'field_rectify_residential_intro_image',
                'label'         => 'Intro Image',
                'name'          => 'residential_intro_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'          => 'field_rectify_residential_stats',
                'label'        => 'Stats',
                'name'         => 'residential_stats',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Stat',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_stat_value',
                        'label' => 'Value',
                        'name'  => 'value',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_residential_stat_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_residential_tab_issues',
                'label'     => 'Issues & Solutions',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_solutions_eyebrow',
                'label' => 'Section Eyebrow',
                'name'  => 'residential_solutions_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_residential_solutions_title',
                'label' => 'Section Title',
                'name'  => 'residential_solutions_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_residential_solutions_copy',
                'label'     => 'Section Copy',
                'name'      => 'residential_solutions_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_residential_issue_cards',
                'label'        => 'Issue Cards',
                'name'         => 'residential_issue_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Issue Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_issue_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_residential_issue_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'           => 'field_rectify_residential_issue_image',
                        'label'         => 'Image',
                        'name'          => 'image',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'medium',
                        'library'       => 'all',
                    ),
                    array(
                        'key'           => 'field_rectify_residential_issue_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                ),
            ),
            array(
                'key'          => 'field_rectify_residential_solution_cards',
                'label'        => 'Solution Cards',
                'name'         => 'residential_solution_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Solution Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_solution_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_residential_solution_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'   => 'field_rectify_residential_solution_point_title',
                        'label' => 'Point List Heading',
                        'name'  => 'point_title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'          => 'field_rectify_residential_solution_points',
                        'label'        => 'Points',
                        'name'         => 'points',
                        'type'         => 'repeater',
                        'layout'       => 'table',
                        'button_label' => 'Add Point',
                        'sub_fields'   => array(
                            array(
                                'key'   => 'field_rectify_residential_solution_point',
                                'label' => 'Point',
                                'name'  => 'point',
                                'type'  => 'text',
                            ),
                        ),
                    ),
                    array(
                        'key'           => 'field_rectify_residential_solution_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                    array(
                        'key'           => 'field_rectify_residential_solution_link',
                        'label'         => 'Learn More Link',
                        'name'          => 'link',
                        'type'          => 'link',
                        'return_format' => 'array',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_residential_tab_process',
                'label'     => 'Process',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_process_eyebrow',
                'label' => 'Process Eyebrow',
                'name'  => 'residential_process_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_residential_process_title',
                'label' => 'Process Title',
                'name'  => 'residential_process_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_residential_process_copy',
                'label'     => 'Process Copy',
                'name'      => 'residential_process_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_residential_process_steps',
                'label'        => 'Process Steps',
                'name'         => 'residential_process_steps',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Step',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_step_number',
                        'label' => 'Step Number',
                        'name'  => 'step',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_residential_step_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_residential_step_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_residential_tab_proof_faq',
                'label'     => 'Proof & FAQ',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_proof_title',
                'label' => 'Proof Band Title',
                'name'  => 'residential_proof_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_residential_proof_copy',
                'label'     => 'Proof Band Copy',
                'name'      => 'residential_proof_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_residential_why_cards',
                'label'        => 'Why Choose Cards',
                'name'         => 'residential_why_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Why Choose Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_why_card_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_residential_why_card_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'           => 'field_rectify_residential_why_card_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                ),
            ),
            array(
                'key'   => 'field_rectify_residential_faq_title',
                'label' => 'FAQ Title',
                'name'  => 'residential_faq_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_residential_faq_copy',
                'label'     => 'FAQ Copy',
                'name'      => 'residential_faq_copy',
                'type'      => 'textarea',
                'rows'      => 2,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_residential_faqs',
                'label'        => 'FAQs',
                'name'         => 'residential_faqs',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add FAQ',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_residential_faq_question',
                        'label' => 'Question',
                        'name'  => 'question',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_residential_faq_answer',
                        'label'     => 'Answer',
                        'name'      => 'answer',
                        'type'      => 'textarea',
                        'rows'      => 4,
                        'new_lines' => 'wpautop',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_residential_tab_cta',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_residential_cta_title',
                'label' => 'CTA Title',
                'name'  => 'residential_cta_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_residential_cta_copy',
                'label'     => 'CTA Copy',
                'name'      => 'residential_cta_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_residential_cta_image',
                'label'         => 'CTA Background Image',
                'name'          => 'residential_cta_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'           => 'field_rectify_residential_cta_primary_link',
                'label'         => 'CTA Primary Button',
                'name'          => 'residential_cta_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_residential_cta_secondary_link',
                'label'         => 'CTA Secondary Button',
                'name'          => 'residential_cta_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_residential_cta_email_link',
                'label'         => 'CTA Email Button',
                'name'          => 'residential_cta_email_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_register_residential_solution_fields' ) ) {
    function rectify_custom_register_residential_solution_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        $fields    = rectify_custom_residential_solution_acf_fields();
        $group_key = '';

        if ( function_exists( 'acf_get_field_groups' ) ) {
            $groups = acf_get_field_groups();

            foreach ( $groups as $group ) {
                if ( isset( $group['title'], $group['key'] ) && 'Residential Solutions Page' === $group['title'] ) {
                    $group_key = $group['key'];
                    break;
                }
            }
        }

        if ( $group_key && function_exists( 'acf_add_local_field' ) ) {
            foreach ( $fields as $field ) {
                $field['parent'] = $group_key;
                acf_add_local_field( $field );
            }

            return;
        }

        $residential_page = get_page_by_path( 'residential' );
        $location         = $residential_page
            ? array(
                array(
                    array(
                        'param'    => 'page',
                        'operator' => '==',
                        'value'    => (string) $residential_page->ID,
                    ),
                ),
            )
            : array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'page',
                    ),
                ),
            );

        acf_add_local_field_group( array(
            'key'                   => 'group_rectify_residential_solutions_page',
            'title'                 => 'Residential Solutions Page',
            'fields'                => $fields,
            'location'              => $location,
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'active'                => true,
            'description'           => 'Content fields for the Residential Solutions page template.',
        ) );
    }
}
add_action( 'acf/init', 'rectify_custom_register_residential_solution_fields' );

if ( ! function_exists( 'rectify_custom_contact_us_acf_fields' ) ) {
    function rectify_custom_contact_us_acf_fields() {
        return array(
            array(
                'key'       => 'field_rectify_contact_tab_hero',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_contact_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name'  => 'contact_hero_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_contact_hero_title',
                'label' => 'Hero Title',
                'name'  => 'contact_hero_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_contact_hero_copy',
                'label'     => 'Hero Copy',
                'name'      => 'contact_hero_copy',
                'type'      => 'textarea',
                'rows'      => 4,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_contact_hero_image',
                'label'         => 'Hero Background Image',
                'name'          => 'contact_hero_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'       => 'field_rectify_contact_tab_copy',
                'label'     => 'Intro',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_contact_copy_title',
                'label' => 'Contact Copy Title',
                'name'  => 'contact_copy_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_contact_copy',
                'label'     => 'Contact Copy',
                'name'      => 'contact_copy',
                'type'      => 'wysiwyg',
                'tabs'      => 'all',
                'toolbar'   => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key'          => 'field_rectify_contact_cards',
                'label'        => 'Contact Cards',
                'name'         => 'contact_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Contact Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_contact_card_icon',
                        'label' => 'Icon',
                        'name'  => 'icon',
                        'type'  => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                    array(
                        'key'   => 'field_rectify_contact_card_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_contact_card_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'           => 'field_rectify_contact_card_link',
                        'label'         => 'Link',
                        'name'          => 'link',
                        'type'          => 'link',
                        'return_format' => 'array',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_contact_tab_form',
                'label'     => 'Form',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_contact_form_title',
                'label' => 'Form Title',
                'name'  => 'contact_form_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_contact_form_description',
                'label'     => 'Form Description',
                'name'      => 'contact_form_description',
                'type'      => 'wysiwyg',
                'tabs'      => 'all',
                'toolbar'   => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key'   => 'field_rectify_contact_form_shortcode',
                'label' => 'Form Shortcode',
                'name'  => 'contact_form_shortcode',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_contact_tab_cta',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_contact_cta_title',
                'label' => 'CTA Title',
                'name'  => 'contact_cta_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_contact_cta_copy',
                'label'     => 'CTA Copy',
                'name'      => 'contact_cta_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_contact_cta_primary_link',
                'label'         => 'CTA Primary Button',
                'name'          => 'contact_cta_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_contact_cta_secondary_link',
                'label'         => 'CTA Secondary Button',
                'name'          => 'contact_cta_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_register_contact_us_fields' ) ) {
    function rectify_custom_register_contact_us_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        $fields    = rectify_custom_contact_us_acf_fields();
        $group_key = '';

        if ( function_exists( 'acf_get_field_groups' ) ) {
            $groups = acf_get_field_groups();

            foreach ( $groups as $group ) {
                if ( isset( $group['title'], $group['key'] ) && 'Contact us page' === $group['title'] ) {
                    $group_key = $group['key'];
                    break;
                }
            }
        }

        if ( $group_key && function_exists( 'acf_add_local_field' ) ) {
            foreach ( $fields as $field ) {
                $field['parent'] = $group_key;
                acf_add_local_field( $field );
            }

            return;
        }

        $contact_page = get_page_by_path( 'contact-us' );
        $location     = $contact_page
            ? array(
                array(
                    array(
                        'param'    => 'page',
                        'operator' => '==',
                        'value'    => (string) $contact_page->ID,
                    ),
                ),
            )
            : array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'page',
                    ),
                ),
            );

        acf_add_local_field_group( array(
            'key'                   => 'group_rectify_contact_us_page',
            'title'                 => 'Contact us page',
            'fields'                => $fields,
            'location'              => $location,
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'active'                => true,
            'description'           => 'Content fields for the Contact Us page template.',
        ) );
    }
}
add_action( 'acf/init', 'rectify_custom_register_contact_us_fields' );

if ( ! function_exists( 'rectify_custom_our_locations_acf_fields' ) ) {
    function rectify_custom_our_locations_acf_fields() {
        return array(
            array(
                'key'       => 'field_rectify_locations_tab_hero',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name'  => 'locations_hero_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_locations_hero_title',
                'label' => 'Hero Title',
                'name'  => 'locations_hero_title',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_locations_hero_supporting_title',
                'label' => 'Hero Supporting Title',
                'name'  => 'locations_hero_supporting_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_locations_hero_copy',
                'label'     => 'Hero Copy',
                'name'      => 'locations_hero_copy',
                'type'      => 'textarea',
                'rows'      => 4,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_locations_hero_image',
                'label'         => 'Hero Strip Image',
                'name'          => 'locations_hero_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'           => 'field_rectify_locations_hero_primary_link',
                'label'         => 'Hero Primary Button',
                'name'          => 'locations_hero_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_locations_hero_secondary_link',
                'label'         => 'Hero Secondary Button',
                'name'          => 'locations_hero_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'       => 'field_rectify_locations_tab_intro',
                'label'     => 'Intro',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_intro_eyebrow',
                'label' => 'Intro Eyebrow',
                'name'  => 'locations_intro_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_locations_intro_title',
                'label' => 'Intro Title',
                'name'  => 'locations_intro_title',
                'type'  => 'text',
            ),
            array(
                'key'          => 'field_rectify_locations_intro_copy',
                'label'        => 'Intro Copy',
                'name'         => 'locations_intro_copy',
                'type'         => 'wysiwyg',
                'tabs'         => 'all',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key'           => 'field_rectify_locations_intro_image',
                'label'         => 'Intro Image',
                'name'          => 'locations_intro_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'          => 'field_rectify_locations_stats',
                'label'        => 'Stats',
                'name'         => 'locations_stats',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Stat',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_locations_stat_value',
                        'label' => 'Value',
                        'name'  => 'value',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_locations_stat_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_locations_tab_map',
                'label'     => 'Map',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_map_eyebrow',
                'label' => 'Map Eyebrow',
                'name'  => 'locations_map_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_locations_map_title',
                'label' => 'Map Title',
                'name'  => 'locations_map_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_locations_map_copy',
                'label'     => 'Map Copy',
                'name'      => 'locations_map_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_locations_map_image',
                'label'         => 'Map Image',
                'name'          => 'locations_map_image',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ),
            array(
                'key'          => 'field_rectify_locations_map_points',
                'label'        => 'Map Pins',
                'name'         => 'locations_map_points',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Pin',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_locations_map_point_label',
                        'label' => 'Label',
                        'name'  => 'label',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_locations_map_point_left',
                        'label' => 'Left %',
                        'name'  => 'left',
                        'type'  => 'number',
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ),
                    array(
                        'key'   => 'field_rectify_locations_map_point_top',
                        'label' => 'Top %',
                        'name'  => 'top',
                        'type'  => 'number',
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_locations_tab_regions',
                'label'     => 'Locations',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_regions_title',
                'label' => 'Locations Section Title',
                'name'  => 'locations_regions_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_locations_regions_copy',
                'label'     => 'Locations Section Copy',
                'name'      => 'locations_regions_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_locations_regions',
                'label'        => 'Location Cards',
                'name'         => 'locations_regions',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Location',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_locations_region_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_locations_region_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'   => 'field_rectify_locations_region_service_area',
                        'label' => 'Service Area',
                        'name'  => 'service_area',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_locations_region_phone',
                        'label' => 'Phone',
                        'name'  => 'phone',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_locations_region_email',
                        'label' => 'Email',
                        'name'  => 'email',
                        'type'  => 'email',
                    ),
                    array(
                        'key'           => 'field_rectify_locations_region_link',
                        'label'         => 'Link',
                        'name'          => 'link',
                        'type'          => 'link',
                        'return_format' => 'array',
                    ),
                    array(
                        'key'           => 'field_rectify_locations_region_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_locations_tab_proof',
                'label'     => 'Proof',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_proof_title',
                'label' => 'Proof Title',
                'name'  => 'locations_proof_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_locations_proof_copy',
                'label'     => 'Proof Copy',
                'name'      => 'locations_proof_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_locations_proof_cards',
                'label'        => 'Proof Cards',
                'name'         => 'locations_proof_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Proof Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_locations_proof_card_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_locations_proof_card_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'           => 'field_rectify_locations_proof_card_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_locations_tab_cta',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_locations_cta_title',
                'label' => 'CTA Title',
                'name'  => 'locations_cta_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_locations_cta_copy',
                'label'     => 'CTA Copy',
                'name'      => 'locations_cta_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_locations_cta_primary_link',
                'label'         => 'CTA Primary Button',
                'name'          => 'locations_cta_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_locations_cta_secondary_link',
                'label'         => 'CTA Secondary Button',
                'name'          => 'locations_cta_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_locations_cta_email_link',
                'label'         => 'CTA Email Button',
                'name'          => 'locations_cta_email_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_register_our_locations_fields' ) ) {
    function rectify_custom_register_our_locations_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        $fields    = rectify_custom_our_locations_acf_fields();
        $group_key = '';

        if ( function_exists( 'acf_get_field_groups' ) ) {
            $groups = acf_get_field_groups();

            foreach ( $groups as $group ) {
                if ( isset( $group['title'], $group['key'] ) && 'Our Locations Page' === $group['title'] ) {
                    $group_key = $group['key'];
                    break;
                }
            }
        }

        if ( $group_key && function_exists( 'acf_add_local_field' ) ) {
            foreach ( $fields as $field ) {
                $field['parent'] = $group_key;
                acf_add_local_field( $field );
            }

            return;
        }

        $locations_page = get_page_by_path( 'our-locations' );
        $location       = $locations_page
            ? array(
                array(
                    array(
                        'param'    => 'page',
                        'operator' => '==',
                        'value'    => (string) $locations_page->ID,
                    ),
                ),
            )
            : array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'page',
                    ),
                ),
            );

        acf_add_local_field_group( array(
            'key'                   => 'group_rectify_our_locations_page',
            'title'                 => 'Our Locations Page',
            'fields'                => $fields,
            'location'              => $location,
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'active'                => true,
            'description'           => 'Content fields for the Our Locations page template.',
        ) );
    }
}
add_action( 'acf/init', 'rectify_custom_register_our_locations_fields' );

if ( ! function_exists( 'rectify_custom_meet_the_team_acf_fields' ) ) {
    function rectify_custom_meet_the_team_acf_fields() {
        return array(
            array(
                'key'       => 'field_rectify_team_tab_hero',
                'label'     => 'Hero',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_team_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name'  => 'team_hero_eyebrow',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_team_hero_title',
                'label' => 'Hero Title',
                'name'  => 'team_hero_title',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_rectify_team_hero_supporting_title',
                'label' => 'Hero Supporting Title',
                'name'  => 'team_hero_supporting_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_team_hero_copy',
                'label'     => 'Hero Copy',
                'name'      => 'team_hero_copy',
                'type'      => 'textarea',
                'rows'      => 4,
                'new_lines' => '',
            ),
            array(
                'key'       => 'field_rectify_team_tab_members',
                'label'     => 'Leadership Team',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_team_members_title',
                'label' => 'Team Section Title',
                'name'  => 'team_members_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_team_members_copy',
                'label'     => 'Team Section Copy',
                'name'      => 'team_members_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_team_members',
                'label'        => 'Team Members',
                'name'         => 'team_members',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Team Member',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_rectify_team_member_image',
                        'label'         => 'Photo',
                        'name'          => 'image',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'medium',
                        'library'       => 'all',
                    ),
                    array(
                        'key'   => 'field_rectify_team_member_name',
                        'label' => 'Name',
                        'name'  => 'name',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_team_member_role',
                        'label' => 'Role',
                        'name'  => 'role',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_rectify_team_member_linkedin',
                        'label' => 'LinkedIn URL',
                        'name'  => 'linkedin_url',
                        'type'  => 'url',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_team_tab_questions',
                'label'     => 'Questions Band',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_team_questions_title',
                'label' => 'Questions Title',
                'name'  => 'team_questions_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_team_questions_copy',
                'label'     => 'Questions Copy',
                'name'      => 'team_questions_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'          => 'field_rectify_team_question_cards',
                'label'        => 'Question Cards',
                'name'         => 'team_question_cards',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Question Card',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_rectify_team_question_card_icon',
                        'label'         => 'Icon',
                        'name'          => 'icon',
                        'type'          => 'image',
                        'return_format' => 'array',
                        'preview_size'  => 'thumbnail',
                        'library'       => 'all',
                    ),
                    array(
                        'key'   => 'field_rectify_team_question_card_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'       => 'field_rectify_team_question_card_copy',
                        'label'     => 'Copy',
                        'name'      => 'copy',
                        'type'      => 'textarea',
                        'rows'      => 3,
                        'new_lines' => '',
                    ),
                    array(
                        'key'           => 'field_rectify_team_question_card_link',
                        'label'         => 'Link',
                        'name'          => 'link',
                        'type'          => 'link',
                        'return_format' => 'array',
                    ),
                ),
            ),
            array(
                'key'       => 'field_rectify_team_tab_cta',
                'label'     => 'CTA',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ),
            array(
                'key'   => 'field_rectify_team_cta_title',
                'label' => 'CTA Title',
                'name'  => 'team_cta_title',
                'type'  => 'text',
            ),
            array(
                'key'       => 'field_rectify_team_cta_copy',
                'label'     => 'CTA Copy',
                'name'      => 'team_cta_copy',
                'type'      => 'textarea',
                'rows'      => 3,
                'new_lines' => '',
            ),
            array(
                'key'       => 'field_rectify_team_cta_supporting_copy',
                'label'     => 'CTA Supporting Copy',
                'name'      => 'team_cta_supporting_copy',
                'type'      => 'textarea',
                'rows'      => 2,
                'new_lines' => '',
            ),
            array(
                'key'           => 'field_rectify_team_cta_primary_link',
                'label'         => 'CTA Primary Button',
                'name'          => 'team_cta_primary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
            array(
                'key'           => 'field_rectify_team_cta_secondary_link',
                'label'         => 'CTA Secondary Button',
                'name'          => 'team_cta_secondary_link',
                'type'          => 'link',
                'return_format' => 'array',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_register_meet_the_team_fields' ) ) {
    function rectify_custom_register_meet_the_team_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        $fields    = rectify_custom_meet_the_team_acf_fields();
        $group_key = '';

        if ( function_exists( 'acf_get_field_groups' ) ) {
            $groups = acf_get_field_groups();

            foreach ( $groups as $group ) {
                if ( isset( $group['title'], $group['key'] ) && 0 === strcasecmp( 'meet the team Page', $group['title'] ) ) {
                    $group_key = $group['key'];
                    break;
                }
            }
        }

        if ( $group_key && function_exists( 'acf_add_local_field' ) ) {
            foreach ( $fields as $field ) {
                $field['parent'] = $group_key;
                acf_add_local_field( $field );
            }

            return;
        }

        $team_page = get_page_by_path( 'meet-the-team' );
        $location  = $team_page
            ? array(
                array(
                    array(
                        'param'    => 'page',
                        'operator' => '==',
                        'value'    => (string) $team_page->ID,
                    ),
                ),
            )
            : array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'page',
                    ),
                ),
            );

        acf_add_local_field_group( array(
            'key'                   => 'group_rectify_meet_the_team_page',
            'title'                 => 'meet the team Page',
            'fields'                => $fields,
            'location'              => $location,
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'active'                => true,
            'description'           => 'Content fields for the Meet the Team page template.',
        ) );
    }
}
add_action( 'acf/init', 'rectify_custom_register_meet_the_team_fields' );


/**
 * Add this to your child theme functions.php, or enqueue the files manually.
 */


function nexgen_allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'nexgen_allow_svg_uploads');

function nexgen_fix_svg_mime_type($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);

    if ($filetype['ext'] === 'svg') {
        $data['ext']  = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'nexgen_fix_svg_mime_type', 10, 4);

/**
 * Assessment page "Get a Free Quote" form (Gravity Forms #1): inject the
 * designed dropzone UI (cloud icon + "Click to upload or drag and drop" +
 * file-type hint) into the multi-file upload field's drop area. The stock
 * plupload UI ("Drop files here or [Select files]") is hidden by CSS in
 * assets/css/inner-pages.css, which also stretches the real Select-files
 * button invisibly across the dropzone so the whole box stays clickable.
 */
function rectify_custom_assessment_upload_ui( $content, $field ) {
    if ( is_admin() || 'fileupload' !== $field->type ) {
        return $content;
    }

    $upload_ui = "<div class='rx-upload-ui' aria-hidden='true'>"
        . "<span class='rx-upload-icon'></span>"
        . "<span class='rx-upload-text'><strong>Click to upload</strong> or drag and drop"
        . "<span class='rx-upload-hint'>JPG, PNG, PDF up to 10MB</span></span>"
        . '</div>';

    return preg_replace(
        "/(<div[^>]*id='gform_drag_drop_area_[0-9_]+'[^>]*>)/",
        '$1' . $upload_ui,
        $content,
        1
    );
}
add_filter( 'gform_field_content_1', 'rectify_custom_assessment_upload_ui', 10, 2 );

/**
 * Keep the homepage Google Reviews feeds limited to five-star reviews.
 *
 * Rich Showcase's free edition has no rating-filter control. Use its native
 * per-feed hidden-review setting instead of editing the plugin, so plugin
 * updates remain safe. Newly imported lower-rated reviews are added to the
 * hidden list automatically before each feed is rendered.
 */
function rectify_custom_sync_five_star_google_reviews() {
    // Hero trust strip [grw id=8235] and Reputation section [grw id=8234].
    $feed_ids = array( 8234, 8235 );

    foreach ( $feed_ids as $feed_id ) {
        rectify_custom_sync_five_star_google_reviews_feed( $feed_id );
    }
}
add_action( 'init', 'rectify_custom_sync_five_star_google_reviews', 20 );

function rectify_custom_sync_five_star_google_reviews_feed( $feed_id ) {
    $feed = get_post( $feed_id );
    if ( ! $feed || 'grw_feed' !== $feed->post_type ) {
        return;
    }

    $config = json_decode( $feed->post_content );
    if ( ! $config || empty( $config->connections ) || ! is_array( $config->connections ) ) {
        return;
    }

    $place_ids = array();
    foreach ( $config->connections as $connection ) {
        if ( isset( $connection->platform, $connection->id )
            && 'google' === $connection->platform
            && '' !== $connection->id
        ) {
            $place_ids[] = (string) $connection->id;
        }
    }

    $place_ids = array_values( array_unique( $place_ids ) );
    if ( empty( $place_ids ) ) {
        return;
    }

    global $wpdb;

    $placeholders = implode( ',', array_fill( 0, count( $place_ids ), '%s' ) );
    $query        = "
        SELECT review.id
        FROM {$wpdb->prefix}grp_google_review AS review
        INNER JOIN {$wpdb->prefix}grp_google_place AS place
            ON place.id = review.google_place_id
        WHERE place.place_id IN ({$placeholders})
            AND review.rating < 5
    ";
    $hidden_ids   = array_map(
        'intval',
        $wpdb->get_col( $wpdb->prepare( $query, $place_ids ) )
    );

    if ( ! isset( $config->options ) || ! is_object( $config->options ) ) {
        $config->options = new stdClass();
    }

    $existing_hidden_ids = array();
    if ( ! empty( $config->options->hidden ) ) {
        $existing_hidden_ids = array_filter(
            array_map( 'intval', explode( ',', (string) $config->options->hidden ) )
        );
    }

    $hidden_ids = array_values( array_unique( array_merge( $existing_hidden_ids, $hidden_ids ) ) );
    sort( $hidden_ids, SORT_NUMERIC );

    $hidden_value = implode( ',', $hidden_ids );
    $needs_update = $hidden_value !== (string) ( $config->options->hidden ?? '' );

    // Remove the temporary plugin-level option used by an earlier approach.
    if ( isset( $config->options->min_rating ) ) {
        unset( $config->options->min_rating );
        $needs_update = true;
    }

    if ( ! $needs_update ) {
        return;
    }

    $config->options->hidden = $hidden_value;

    wp_update_post(
        array(
            'ID'           => $feed_id,
            'post_content' => wp_slash( wp_json_encode( $config ) ),
        )
    );

    if ( defined( 'GRW_VERSION' ) ) {
        delete_transient( 'grw_feed_' . GRW_VERSION . '_' . $feed_id . '_reviews' );
        delete_transient( 'grw_feed_' . GRW_VERSION . '_' . $feed_id . '_options' );
    }
}



function custom_safe_page_redirect() {
    // 1. Safety Check: Never redirect inside the WP Admin Dashboard or REST API/Block Editor
    if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        return;
    }

    // 2. Target Check: Specific page target (Change 'your-page-slug' to your actual slug or ID)
    if ( is_page( 'resources' ) ) {
        // 3. Execution: Redirect to the new location safely
        wp_redirect( site_url( '/resources/case-studies/' ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'custom_safe_page_redirect' );

/**
 * Turn the Reputation section's Elfsight review grid into an auto-sliding
 * carousel, without touching Elfsight's own dashboard config.
 *
 * The Elfsight widget (app id 6a3ce5e7-eedb-4277-852a-400cbf621ab9) renders
 * straight into the light DOM (no shadow root), using stable "es-*" class
 * names Elfsight itself intends for custom CSS overrides, scoped under
 * `.eapps-google-reviews-6a3ce5e7-...-custom-css-root`. This flips its
 * review grid into a horizontally scrolling row and auto-advances it with
 * plain JS, since the widget only loads/renders after its own remote
 * script runs, so a MutationObserver waits for the grid to appear.
 */
function rectify_custom_elfsight_reviews_slider() {
    if ( ! is_front_page() ) {
        return;
    }
    ?>
    <style>
        .eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-grid-layout {
            display: flex !important;
            flex-wrap: nowrap !important;
            overflow-x: auto;
            /* No scroll-snap here: with mandatory snapping, any programmatic
               scrollLeft that doesn't land exactly on a snap point gets
               reverted to the nearest one (usually back to 0), which silently
               defeats the auto-scroll ticker below. */
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-grid-layout::-webkit-scrollbar {
            display: none;
            height: 0;
        }
        .eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-review-container {
            flex: 0 0 300px;
        }
        .eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-load-more-button {
            display: none !important;
        }
    </style>
    <script>
    (function () {
        var GRID_SELECTOR = '.eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-grid-layout';
        var LOAD_MORE_SELECTOR = '.eapps-google-reviews-6a3ce5e7-eedb-4277-852a-400cbf621ab9-custom-css-root .es-load-more-button';
        var CARD_STEP_PX = 320; // review card flex-basis (300px) + grid gap (20px)
        var PAUSE_MS = 3500;
        var TRANSITION_MS = 600;
        var TARGET_REVIEW_COUNT = 15;
        var MAX_LOAD_MORE_CLICKS = 8;

        function easeInOutQuad( t ) {
            return t < 0.5 ? 2 * t * t : -1 + ( 4 - 2 * t ) * t;
        }

        /**
         * Advances one card at a time (rather than a continuous non-stop
         * scroll): pause, animate to the next card position, pause again.
         *
         * Re-queries the live grid on every step rather than closing over a
         * fixed node, because Elfsight's "Load More" (still running in the
         * background at this point) replaces the whole grid element - a
         * cached reference would go stale/detached mid-slide. Hover/touch
         * pause is delegated at the document level for the same reason:
         * listeners bound directly to the grid node are lost the moment
         * Elfsight swaps it out.
         */
        function startAutoScroll() {
            if ( window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
                return;
            }

            var paused = false;

            function isInGrid( node ) {
                return !! ( node && node.closest && node.closest( GRID_SELECTOR ) );
            }

            document.addEventListener( 'mouseover', function ( e ) {
                if ( isInGrid( e.target ) ) {
                    paused = true;
                }
            } );
            document.addEventListener( 'mouseout', function ( e ) {
                if ( isInGrid( e.target ) && ! isInGrid( e.relatedTarget ) ) {
                    paused = false;
                }
            } );
            document.addEventListener( 'touchstart', function ( e ) {
                if ( isInGrid( e.target ) ) {
                    paused = true;
                }
            }, { passive: true } );
            document.addEventListener( 'touchend', function ( e ) {
                if ( isInGrid( e.target ) ) {
                    paused = false;
                }
            }, { passive: true } );

            function animateTo( grid, target ) {
                var start = grid.scrollLeft;
                var change = target - start;
                var startTime = null;

                function frame( time ) {
                    if ( startTime === null ) {
                        startTime = time;
                    }
                    var progress = Math.min( ( time - startTime ) / TRANSITION_MS, 1 );
                    grid.scrollLeft = start + change * easeInOutQuad( progress );
                    if ( progress < 1 ) {
                        requestAnimationFrame( frame );
                    }
                }
                requestAnimationFrame( frame );
            }

            function scheduleNext() {
                setTimeout( function () {
                    var grid = document.querySelector( GRID_SELECTOR );
                    if ( grid && ! paused ) {
                        var max = grid.scrollWidth - grid.clientWidth;
                        if ( max > 0 ) {
                            var next = grid.scrollLeft + CARD_STEP_PX;
                            animateTo( grid, next >= max ? 0 : next );
                        }
                    }
                    scheduleNext();
                }, PAUSE_MS );
            }
            scheduleNext();
        }

        /**
         * The widget only ships 8 reviews up front; the rest are real
         * reviews Elfsight already has cached, revealed by clicking its own
         * "Load More" button (kept in the DOM but hidden via CSS). Drive
         * that button programmatically until 15 genuine reviews are loaded,
         * then start the auto-scroll - no fabricated review content.
         *
         * Elfsight's own React code replaces the whole grid element on every
         * "Load More" click (confirmed by testing), so the grid/card count
         * must be re-queried live each time rather than reused from a
         * captured reference, which would otherwise go stale/detached and
         * freeze at the pre-click count.
         */
        function loadMoreReviews( onDone ) {
            var attempts = 0;

            function countCards() {
                var liveGrid = document.querySelector( GRID_SELECTOR );
                return liveGrid ? liveGrid.querySelectorAll( '.es-review-container' ).length : 0;
            }

            function tryNext() {
                if ( countCards() >= TARGET_REVIEW_COUNT || attempts >= MAX_LOAD_MORE_CLICKS ) {
                    onDone();
                    return;
                }

                var button = document.querySelector( LOAD_MORE_SELECTOR );
                if ( ! button ) {
                    onDone();
                    return;
                }

                attempts++;
                button.click();
                setTimeout( tryNext, 2200 );
            }

            tryNext();
        }

        function initSlider( grid ) {
            if ( grid.dataset.rxSliderInit ) {
                return;
            }
            grid.dataset.rxSliderInit = '1';

            // Start sliding immediately on whatever's already loaded; fetch
            // the rest of the 15 reviews in the background afterwards so the
            // carousel isn't stuck waiting several seconds for it first.
            startAutoScroll();

            // The grid container can exist slightly before Elfsight finishes
            // rendering its "Load More" button, so give it a moment before
            // the first click attempt.
            setTimeout( function () {
                loadMoreReviews( function () {} );
            }, 1500 );
        }

        function findAndInit() {
            var grid = document.querySelector( GRID_SELECTOR );
            if ( grid ) {
                initSlider( grid );
                return true;
            }
            return false;
        }

        if ( ! findAndInit() ) {
            var observer = new MutationObserver( function () {
                if ( findAndInit() ) {
                    observer.disconnect();
                }
            } );
            observer.observe( document.body, { childList: true, subtree: true } );
            setTimeout( function () { observer.disconnect(); }, 30000 );
        }
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'rectify_custom_elfsight_reviews_slider' );
