<?php
/**
 * Our Projects custom post type + Project Category taxonomy.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_custom_register_our_projects_cpt' ) ) {
    function rectify_custom_register_our_projects_cpt() {
        $labels = array(
            'name'                  => __( 'Our Projects', 'rectify-custom' ),
            'singular_name'         => __( 'Project', 'rectify-custom' ),
            'menu_name'             => __( 'Our Projects', 'rectify-custom' ),
            'add_new'               => __( 'Add New', 'rectify-custom' ),
            'add_new_item'          => __( 'Add New Project', 'rectify-custom' ),
            'edit_item'             => __( 'Edit Project', 'rectify-custom' ),
            'new_item'              => __( 'New Project', 'rectify-custom' ),
            'view_item'             => __( 'View Project', 'rectify-custom' ),
            'view_items'            => __( 'View Projects', 'rectify-custom' ),
            'search_items'          => __( 'Search Projects', 'rectify-custom' ),
            'not_found'             => __( 'No projects found', 'rectify-custom' ),
            'not_found_in_trash'    => __( 'No projects found in Trash', 'rectify-custom' ),
            'all_items'             => __( 'All Projects', 'rectify-custom' ),
            'archives'              => __( 'Project Archives', 'rectify-custom' ),
        );

        register_post_type( 'our_project', array(
            'labels'        => $labels,
            'public'        => true,
            'menu_icon'     => 'dashicons-portfolio',
            'menu_position' => 22,
            'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
            'has_archive'   => 'projects',
            'rewrite'       => array( 'slug' => 'projects', 'with_front' => false ),
            'show_in_rest'  => true,
        ) );

        register_taxonomy( 'project_category', 'our_project', array(
            'labels'            => array(
                'name'          => __( 'Project Categories', 'rectify-custom' ),
                'singular_name' => __( 'Project Category', 'rectify-custom' ),
                'add_new_item'  => __( 'Add New Project Category', 'rectify-custom' ),
                'search_items'  => __( 'Search Project Categories', 'rectify-custom' ),
                'all_items'     => __( 'All Project Categories', 'rectify-custom' ),
            ),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'project-category' ),
            'show_in_rest'      => true,
        ) );
    }
}
add_action( 'init', 'rectify_custom_register_our_projects_cpt' );

if ( ! function_exists( 'rectify_custom_default_project_categories' ) ) {
    /**
     * Default set of project categories. Admins can add further categories
     * at any time from Our Projects > Project Categories in wp-admin.
     *
     * @return string[]
     */
    function rectify_custom_default_project_categories() {
        return array(
            'Residential',
            'Commercial',
            'Underpinning',
            'Structural Repairs',
        );
    }
}

if ( ! function_exists( 'rectify_custom_seed_project_categories' ) ) {
    function rectify_custom_seed_project_categories() {
        if ( ! taxonomy_exists( 'project_category' ) ) {
            return;
        }

        foreach ( rectify_custom_default_project_categories() as $category ) {
            if ( ! term_exists( $category, 'project_category' ) ) {
                wp_insert_term( $category, 'project_category' );
            }
        }
    }
}
add_action( 'init', 'rectify_custom_seed_project_categories', 20 );

if ( ! function_exists( 'rectify_custom_our_projects_seed_source_images' ) ) {
    /**
     * The hard-coded thumbnails previously used on the homepage "Follow Our
     * Latest Projects & Insights" section, kept here so the seeded projects
     * use the exact same thumbnail images.
     *
     * @return string[]
     */
    function rectify_custom_our_projects_seed_source_images() {
        return array( 'follow2.png', 'follow1.png', 'follow3.png', 'follow4.png', 'follow5.png', 'follow6.png', 'follow7.png', 'follow8.png' );
    }
}

if ( ! function_exists( 'rectify_custom_our_projects_sideload_thumbnail' ) ) {
    /**
     * Copy a theme asset image into the media library and attach it to a post
     * as its featured image.
     *
     * @param string $filename Filename inside images/home/.
     * @param int    $post_id  Post to attach the thumbnail to.
     */
    function rectify_custom_our_projects_sideload_thumbnail( $filename, $post_id ) {
        $theme_dir = get_stylesheet_directory();
        $candidates = array(
            trailingslashit( $theme_dir ) . 'rectify-homepage-draft2-v3/assets/images/home/' . $filename,
            trailingslashit( $theme_dir ) . 'assets/images/home/' . $filename,
        );

        $source_path = '';
        foreach ( $candidates as $candidate ) {
            if ( file_exists( $candidate ) ) {
                $source_path = $candidate;
                break;
            }
        }

        if ( '' === $source_path ) {
            return;
        }

        $upload_dir = wp_upload_dir();
        if ( ! empty( $upload_dir['error'] ) ) {
            return;
        }

        $unique_filename = wp_unique_filename( $upload_dir['path'], $filename );
        $destination     = trailingslashit( $upload_dir['path'] ) . $unique_filename;

        if ( ! copy( $source_path, $destination ) ) {
            return;
        }

        $filetype   = wp_check_filetype( $unique_filename, null );
        $attachment = array(
            'post_mime_type' => $filetype['type'],
            'post_title'     => sanitize_file_name( pathinfo( $unique_filename, PATHINFO_FILENAME ) ),
            'post_content'   => '',
            'post_status'    => 'inherit',
        );

        $attachment_id = wp_insert_attachment( $attachment, $destination, $post_id );

        if ( ! is_wp_error( $attachment_id ) && $attachment_id ) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $destination );
            wp_update_attachment_metadata( $attachment_id, $attachment_data );
            set_post_thumbnail( $post_id, $attachment_id );
        }
    }
}

if ( ! function_exists( 'rectify_custom_seed_our_projects' ) ) {
    function rectify_custom_seed_our_projects() {
        if ( ! post_type_exists( 'our_project' ) ) {
            return;
        }

        $existing = get_posts( array(
            'post_type'      => 'our_project',
            'post_status'    => 'any',
            'posts_per_page' => 1,
            'fields'         => 'ids',
        ) );

        if ( ! empty( $existing ) ) {
            return;
        }

        $images = rectify_custom_our_projects_seed_source_images();

        foreach ( $images as $index => $filename ) {
            $post_id = wp_insert_post( array(
                'post_type'    => 'our_project',
                'post_title'   => sprintf( __( 'Project %d', 'rectify-custom' ), $index + 1 ),
                'post_status'  => 'publish',
                'menu_order'   => $index,
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                rectify_custom_our_projects_sideload_thumbnail( $filename, $post_id );
            }
        }
    }
}
add_action( 'init', 'rectify_custom_seed_our_projects', 21 );

if ( ! function_exists( 'rectify_custom_our_projects_rewrite_flush' ) ) {
    function rectify_custom_our_projects_rewrite_flush() {
        rectify_custom_register_our_projects_cpt();
        rectify_custom_seed_project_categories();
        rectify_custom_seed_our_projects();
        flush_rewrite_rules();
    }
}
add_action( 'after_switch_theme', 'rectify_custom_our_projects_rewrite_flush' );
