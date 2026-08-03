<?php
/**
 * Job Opportunities custom post type + Job Category taxonomy.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_custom_register_job_opportunities_cpt' ) ) {
    function rectify_custom_register_job_opportunities_cpt() {
        $labels = array(
            'name'                  => __( 'Job Opportunities', 'rectify-custom' ),
            'singular_name'         => __( 'Job Opportunity', 'rectify-custom' ),
            'menu_name'             => __( 'Job Opportunities', 'rectify-custom' ),
            'add_new'               => __( 'Add New', 'rectify-custom' ),
            'add_new_item'          => __( 'Add New Job Opportunity', 'rectify-custom' ),
            'edit_item'             => __( 'Edit Job Opportunity', 'rectify-custom' ),
            'new_item'              => __( 'New Job Opportunity', 'rectify-custom' ),
            'view_item'             => __( 'View Job Opportunity', 'rectify-custom' ),
            'view_items'            => __( 'View Job Opportunities', 'rectify-custom' ),
            'search_items'          => __( 'Search Job Opportunities', 'rectify-custom' ),
            'not_found'             => __( 'No job opportunities found', 'rectify-custom' ),
            'not_found_in_trash'    => __( 'No job opportunities found in Trash', 'rectify-custom' ),
            'all_items'             => __( 'All Job Opportunities', 'rectify-custom' ),
            'archives'              => __( 'Job Opportunity Archives', 'rectify-custom' ),
        );

        register_post_type( 'job_opportunity', array(
            'labels'        => $labels,
            'public'        => true,
            'menu_icon'     => 'dashicons-businessperson',
            'menu_position' => 21,
            'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
            'has_archive'   => 'careers',
            'rewrite'       => array( 'slug' => 'job-opportunities', 'with_front' => false ),
            'show_in_rest'  => true,
        ) );

        register_taxonomy( 'job_category', 'job_opportunity', array(
            'labels'            => array(
                'name'          => __( 'Job Categories', 'rectify-custom' ),
                'singular_name' => __( 'Job Category', 'rectify-custom' ),
                'add_new_item'  => __( 'Add New Job Category', 'rectify-custom' ),
                'search_items'  => __( 'Search Job Categories', 'rectify-custom' ),
                'all_items'     => __( 'All Job Categories', 'rectify-custom' ),
            ),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'job-category' ),
            'show_in_rest'      => true,
        ) );
    }
}
add_action( 'init', 'rectify_custom_register_job_opportunities_cpt' );

if ( ! function_exists( 'rectify_custom_default_job_categories' ) ) {
    /**
     * Default set of job categories. Admins can add further categories at
     * any time from Job Opportunities > Job Categories in wp-admin.
     *
     * @return string[]
     */
    function rectify_custom_default_job_categories() {
        return array(
            'Business Development',
            'Operations',
            'Technical & Engineering',
            'Field Operations',
            'Corporate Support',
        );
    }
}

if ( ! function_exists( 'rectify_custom_seed_job_categories' ) ) {
    function rectify_custom_seed_job_categories() {
        if ( ! taxonomy_exists( 'job_category' ) ) {
            return;
        }

        foreach ( rectify_custom_default_job_categories() as $category ) {
            if ( ! term_exists( $category, 'job_category' ) ) {
                wp_insert_term( $category, 'job_category' );
            }
        }
    }
}
add_action( 'init', 'rectify_custom_seed_job_categories', 20 );

if ( ! function_exists( 'rectify_custom_job_opportunities_rewrite_flush' ) ) {
    function rectify_custom_job_opportunities_rewrite_flush() {
        rectify_custom_register_job_opportunities_cpt();
        rectify_custom_seed_job_categories();
        flush_rewrite_rules();
    }
}
add_action( 'after_switch_theme', 'rectify_custom_job_opportunities_rewrite_flush' );

if ( ! function_exists( 'rectify_custom_job_opportunity_acf_fields' ) ) {
    function rectify_custom_job_opportunity_acf_fields() {
        return array(
            array(
                'key'   => 'field_rectify_job_summary',
                'label' => 'Card Summary',
                'name'  => 'job_summary',
                'type'  => 'textarea',
                'rows'  => 2,
                'new_lines'     => '',
                'instructions'  => 'Short summary shown on the job card in the "Opportunities Across Australia" grid.',
            ),
            array(
                'key'           => 'field_rectify_job_about',
                'label'         => 'About the Opportunity',
                'name'          => 'job_about_the_opportunity',
                'type'          => 'wysiwyg',
                'tabs'          => 'all',
                'toolbar'       => 'basic',
                'media_upload'  => 0,
            ),
            array(
                'key'          => 'field_rectify_job_why_role',
                'label'        => 'Why This Role',
                'name'         => 'job_why_this_role',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Point',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_job_why_role_point',
                        'label' => 'Point',
                        'name'  => 'point',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'          => 'field_rectify_job_responsibilities',
                'label'        => 'Key Responsibilities',
                'name'         => 'job_key_responsibilities',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Point',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_job_responsibility_point',
                        'label' => 'Point',
                        'name'  => 'point',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'          => 'field_rectify_job_about_you',
                'label'        => 'About You',
                'name'         => 'job_about_you',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Point',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_job_about_you_point',
                        'label' => 'Point',
                        'name'  => 'point',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'          => 'field_rectify_job_whats_on_offer',
                'label'        => "What's on Offer",
                'name'         => 'job_whats_on_offer',
                'type'         => 'repeater',
                'layout'       => 'table',
                'button_label' => 'Add Point',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_rectify_job_whats_on_offer_point',
                        'label' => 'Point',
                        'name'  => 'point',
                        'type'  => 'text',
                    ),
                ),
            ),
            array(
                'key'          => 'field_rectify_job_apply_label',
                'label'        => 'Apply Button Label',
                'name'         => 'job_apply_button_label',
                'type'         => 'text',
                'default_value' => 'Apply in LinkedIn',
            ),
            array(
                'key'   => 'field_rectify_job_apply_url',
                'label' => 'Apply URL',
                'name'  => 'job_apply_url',
                'type'  => 'url',
            ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_register_job_opportunity_fields' ) ) {
    function rectify_custom_register_job_opportunity_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( array(
            'key'                   => 'group_rectify_job_opportunity',
            'title'                 => 'Job Opportunity Details',
            'fields'                => rectify_custom_job_opportunity_acf_fields(),
            'location'              => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'job_opportunity',
                    ),
                ),
            ),
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'active'                => true,
            'description'           => 'Content fields for the single Job Opportunity template.',
        ) );
    }
}
add_action( 'acf/init', 'rectify_custom_register_job_opportunity_fields' );
