<?php
/**
 * Case Studies And News & Insights custom post type + Article Category taxonomy.
 *
 * Category structure:
 * 1. Case Studies
 *    a. Residential
 *    b. Infrastructure
 *    c. Commercial
 * 2. News & Insights
 *    a. News
 *    b. Pro Tips
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_custom_register_articles_cpt' ) ) {
    function rectify_custom_register_articles_cpt() {
        $labels = array(
            'name'               => __( 'Case Studies And News & Insights', 'rectify-custom' ),
            'singular_name'      => __( 'Article', 'rectify-custom' ),
            'menu_name'          => __( 'Case Studies And News & Insights', 'rectify-custom' ),
            'add_new'            => __( 'Add New', 'rectify-custom' ),
            'add_new_item'       => __( 'Add New Article', 'rectify-custom' ),
            'edit_item'          => __( 'Edit Article', 'rectify-custom' ),
            'new_item'           => __( 'New Article', 'rectify-custom' ),
            'view_item'          => __( 'View Article', 'rectify-custom' ),
            'view_items'         => __( 'View Articles', 'rectify-custom' ),
            'search_items'       => __( 'Search Articles', 'rectify-custom' ),
            'not_found'          => __( 'No articles found', 'rectify-custom' ),
            'not_found_in_trash' => __( 'No articles found in Trash', 'rectify-custom' ),
            'all_items'          => __( 'All Articles', 'rectify-custom' ),
            'archives'           => __( 'Article Archives', 'rectify-custom' ),
            'featured_image'     => __( 'Article Thumbnail', 'rectify-custom' ),
            'set_featured_image' => __( 'Upload article thumbnail', 'rectify-custom' ),
            'remove_featured_image' => __( 'Remove article thumbnail', 'rectify-custom' ),
            'use_featured_image' => __( 'Use as article thumbnail', 'rectify-custom' ),
        );

        register_post_type( 'rectify_article', array(
            'labels'        => $labels,
            'public'        => true,
            'menu_icon'     => 'dashicons-welcome-widgets-menus',
            'menu_position' => 23,
            'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
            'taxonomies'    => array( 'post_tag' ),
            'has_archive'   => false,
            'rewrite'       => false,
            'show_in_rest'  => true,
        ) );

        register_taxonomy( 'article_category', 'rectify_article', array(
            'labels'            => array(
                'name'          => __( 'Article Categories', 'rectify-custom' ),
                'singular_name' => __( 'Article Category', 'rectify-custom' ),
                'add_new_item'  => __( 'Add New Article Category', 'rectify-custom' ),
                'search_items'  => __( 'Search Article Categories', 'rectify-custom' ),
                'all_items'     => __( 'All Article Categories', 'rectify-custom' ),
            ),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array( 'slug' => 'article-category', 'hierarchical' => true ),
            'show_in_rest'      => true,
        ) );
    }
}
add_action( 'init', 'rectify_custom_register_articles_cpt' );

if ( ! function_exists( 'rectify_custom_promote_article_thumbnail_metabox' ) ) {
    /**
     * Keep the native WordPress media uploader, but make the article
     * thumbnail control prominent in the editor sidebar.
     */
    function rectify_custom_promote_article_thumbnail_metabox( $post_type, $context ) {
        if ( 'rectify_article' !== $post_type || 'side' !== $context ) {
            return;
        }

        remove_meta_box( 'postimagediv', 'rectify_article', 'side' );
        add_meta_box(
            'postimagediv',
            __( 'Article Thumbnail', 'rectify-custom' ),
            'post_thumbnail_meta_box',
            'rectify_article',
            'side',
            'high'
        );
    }
}
add_action( 'do_meta_boxes', 'rectify_custom_promote_article_thumbnail_metabox', 10, 2 );

if ( ! function_exists( 'rectify_custom_article_homepage_placements' ) ) {
    /**
     * Homepage destinations available to Rectify articles.
     *
     * @return array<string, string>
     */
    function rectify_custom_article_homepage_placements() {
        return array(
            ''                       => __( 'Not featured', 'rectify-custom' ),
            'featured_case_study'    => __( 'Featured Case Study', 'rectify-custom' ),
            'featured_news_insights' => __( 'Featured News & Insights', 'rectify-custom' ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_sanitize_article_homepage_placement' ) ) {
    /**
     * Only allow one of the registered homepage placement values.
     *
     * @param mixed $value Submitted placement.
     * @return string
     */
    function rectify_custom_sanitize_article_homepage_placement( $value ) {
        $value      = sanitize_key( (string) $value );
        $placements = rectify_custom_article_homepage_placements();

        return isset( $placements[ $value ] ) ? $value : '';
    }
}

if ( ! function_exists( 'rectify_custom_register_article_homepage_meta' ) ) {
    function rectify_custom_register_article_homepage_meta() {
        register_post_meta( 'rectify_article', '_rectify_homepage_placement', array(
            'type'              => 'string',
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => 'rectify_custom_sanitize_article_homepage_placement',
            'auth_callback'     => function () {
                return current_user_can( 'edit_posts' );
            },
        ) );
    }
}
add_action( 'init', 'rectify_custom_register_article_homepage_meta', 11 );

if ( ! function_exists( 'rectify_custom_add_article_homepage_metabox' ) ) {
    function rectify_custom_add_article_homepage_metabox() {
        add_meta_box(
            'rectify-article-homepage-placement',
            __( 'Homepage Placement', 'rectify-custom' ),
            'rectify_custom_render_article_homepage_metabox',
            'rectify_article',
            'side',
            'high'
        );
    }
}
add_action( 'add_meta_boxes_rectify_article', 'rectify_custom_add_article_homepage_metabox' );

if ( ! function_exists( 'rectify_custom_render_article_homepage_metabox' ) ) {
    /**
     * Render the placement selector on the article edit screen.
     *
     * @param WP_Post $post Current article.
     */
    function rectify_custom_render_article_homepage_metabox( $post ) {
        $selected = get_post_meta( $post->ID, '_rectify_homepage_placement', true );

        wp_nonce_field( 'rectify_save_article_homepage_placement', 'rectify_article_homepage_placement_nonce' );
        ?>
        <p>
            <label for="rectify-article-homepage-placement-select">
                <?php esc_html_e( 'Choose where this article appears on the homepage.', 'rectify-custom' ); ?>
            </label>
        </p>
        <select
            id="rectify-article-homepage-placement-select"
            name="rectify_article_homepage_placement"
            class="widefat"
        >
            <?php foreach ( rectify_custom_article_homepage_placements() as $value => $label ) : ?>
                <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $selected, $value ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php
    }
}

if ( ! function_exists( 'rectify_custom_store_article_homepage_placement' ) ) {
    /**
     * Store or clear an article placement.
     *
     * @param int   $post_id   Article ID.
     * @param mixed $placement Submitted placement.
     */
    function rectify_custom_store_article_homepage_placement( $post_id, $placement ) {
        $placement = rectify_custom_sanitize_article_homepage_placement( $placement );

        if ( '' === $placement ) {
            delete_post_meta( $post_id, '_rectify_homepage_placement' );
            return;
        }

        update_post_meta( $post_id, '_rectify_homepage_placement', $placement );
    }
}

if ( ! function_exists( 'rectify_custom_save_article_homepage_placement' ) ) {
    function rectify_custom_save_article_homepage_placement( $post_id ) {
        if (
            ! isset( $_POST['rectify_article_homepage_placement_nonce'] ) ||
            ! wp_verify_nonce(
                sanitize_text_field( wp_unslash( $_POST['rectify_article_homepage_placement_nonce'] ) ),
                'rectify_save_article_homepage_placement'
            )
        ) {
            return;
        }

        if (
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
            wp_is_post_revision( $post_id ) ||
            ! current_user_can( 'edit_post', $post_id )
        ) {
            return;
        }

        $placement = isset( $_POST['rectify_article_homepage_placement'] )
            ? wp_unslash( $_POST['rectify_article_homepage_placement'] )
            : '';

        rectify_custom_store_article_homepage_placement( $post_id, $placement );
    }
}
add_action( 'save_post_rectify_article', 'rectify_custom_save_article_homepage_placement' );

if ( ! function_exists( 'rectify_custom_add_article_homepage_admin_column' ) ) {
    function rectify_custom_add_article_homepage_admin_column( $columns ) {
        $updated = array();

        foreach ( $columns as $key => $label ) {
            $updated[ $key ] = $label;

            if ( 'title' === $key ) {
                $updated['rectify_article_thumbnail'] = __( 'Thumbnail', 'rectify-custom' );
            }

            if ( 'taxonomy-article_category' === $key ) {
                $updated['rectify_homepage_placement'] = __( 'Homepage Placement', 'rectify-custom' );
            }
        }

        if ( ! isset( $updated['rectify_article_thumbnail'] ) ) {
            $updated['rectify_article_thumbnail'] = __( 'Thumbnail', 'rectify-custom' );
        }

        if ( ! isset( $updated['rectify_homepage_placement'] ) ) {
            $updated['rectify_homepage_placement'] = __( 'Homepage Placement', 'rectify-custom' );
        }

        return $updated;
    }
}
add_filter( 'manage_rectify_article_posts_columns', 'rectify_custom_add_article_homepage_admin_column' );

if ( ! function_exists( 'rectify_custom_render_article_homepage_admin_column' ) ) {
    function rectify_custom_render_article_homepage_admin_column( $column, $post_id ) {
        if ( 'rectify_article_thumbnail' === $column ) {
            if ( has_post_thumbnail( $post_id ) ) {
                echo get_the_post_thumbnail(
                    $post_id,
                    array( 80, 60 ),
                    array(
                        'style' => 'display:block;height:60px;object-fit:cover;width:80px;',
                        'alt'   => '',
                    )
                );
            } else {
                echo '<span aria-hidden="true">&mdash;</span><span class="screen-reader-text">' .
                    esc_html__( 'No thumbnail', 'rectify-custom' ) .
                    '</span>';
            }

            return;
        }

        if ( 'rectify_homepage_placement' !== $column ) {
            return;
        }

        $selected = get_post_meta( $post_id, '_rectify_homepage_placement', true );
        ?>
        <select
            class="rectify-homepage-placement-select"
            data-post-id="<?php echo esc_attr( $post_id ); ?>"
            aria-label="<?php echo esc_attr( sprintf( __( 'Homepage placement for %s', 'rectify-custom' ), get_the_title( $post_id ) ) ); ?>"
        >
            <?php foreach ( rectify_custom_article_homepage_placements() as $value => $label ) : ?>
                <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $selected, $value ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <span class="spinner" aria-hidden="true"></span>
        <span class="rectify-homepage-placement-status" aria-live="polite"></span>
        <?php
    }
}
add_action( 'manage_rectify_article_posts_custom_column', 'rectify_custom_render_article_homepage_admin_column', 10, 2 );

if ( ! function_exists( 'rectify_custom_article_homepage_admin_script' ) ) {
    /**
     * Save list-table selector changes without leaving the Articles screen.
     *
     */
    function rectify_custom_article_homepage_admin_script() {
        $screen = get_current_screen();
        if ( ! $screen || 'rectify_article' !== $screen->post_type ) {
            return;
        }
        ?>
        <style>
            .column-rectify_article_thumbnail { width: 90px; }
            .column-rectify_homepage_placement { width: 210px; }
            .rectify-homepage-placement-select { max-width: 190px; width: 100%; }
            .rectify-homepage-placement-status { display: inline-block; margin-top: 4px; }
            .rectify-homepage-placement-status.is-error { color: #b32d2e; }
            .column-rectify_homepage_placement .spinner { float: none; margin: 3px 0 0 4px; }
        </style>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.rectify-homepage-placement-select').forEach(function (select) {
                select.dataset.previousValue = select.value;

                select.addEventListener('change', function () {
                    var field = this;
                    var cell = field.closest('td');
                    var spinner = cell.querySelector('.spinner');
                    var status = cell.querySelector('.rectify-homepage-placement-status');
                    var previousValue = field.dataset.previousValue;
                    var body = new URLSearchParams({
                        action: 'rectify_update_article_homepage_placement',
                        nonce: '<?php echo esc_js( wp_create_nonce( 'rectify_update_article_homepage_placement' ) ); ?>',
                        post_id: field.dataset.postId,
                        placement: field.value
                    });

                    field.disabled = true;
                    spinner.classList.add('is-active');
                    status.textContent = '';
                    status.classList.remove('is-error');

                    window.fetch(ajaxurl, {
                        method: 'POST',
                        credentials: 'same-origin',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
                        body: body.toString()
                    })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (response) {
                        if (!response.success) {
                            throw new Error(response.data && response.data.message ? response.data.message : 'Unable to save.');
                        }

                        field.dataset.previousValue = field.value;
                        status.textContent = '<?php echo esc_js( __( 'Saved', 'rectify-custom' ) ); ?>';
                        window.setTimeout(function () {
                            status.textContent = '';
                        }, 1500);
                    })
                    .catch(function (error) {
                        field.value = previousValue;
                        status.textContent = error.message;
                        status.classList.add('is-error');
                    })
                    .finally(function () {
                        field.disabled = false;
                        spinner.classList.remove('is-active');
                    });
                });
            });
        });
        </script>
        <?php
    }
}
add_action( 'admin_footer-edit.php', 'rectify_custom_article_homepage_admin_script' );

if ( ! function_exists( 'rectify_custom_ajax_update_article_homepage_placement' ) ) {
    function rectify_custom_ajax_update_article_homepage_placement() {
        check_ajax_referer( 'rectify_update_article_homepage_placement', 'nonce' );

        $post_id = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : 0;
        if ( ! $post_id || 'rectify_article' !== get_post_type( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
            wp_send_json_error( array( 'message' => __( 'You cannot edit this article.', 'rectify-custom' ) ), 403 );
        }

        $placement = isset( $_POST['placement'] ) ? wp_unslash( $_POST['placement'] ) : '';
        rectify_custom_store_article_homepage_placement( $post_id, $placement );

        wp_send_json_success();
    }
}
add_action( 'wp_ajax_rectify_update_article_homepage_placement', 'rectify_custom_ajax_update_article_homepage_placement' );

if ( ! function_exists( 'rectify_custom_default_article_categories' ) ) {
    /**
     * Default article category tree: parent label => child labels.
     * Admins can add further categories at any time from
     * Case Studies And News & Insights > Article Categories in wp-admin.
     *
     * @return array<string, string[]>
     */
    function rectify_custom_default_article_categories() {
        return array(
            'Case Studies'    => array( 'Residential', 'Infrastructure', 'Commercial' ),
            'News & Insights' => array( 'News', 'Pro Tips' ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_seed_article_categories' ) ) {
    function rectify_custom_seed_article_categories() {
        if ( ! taxonomy_exists( 'article_category' ) ) {
            return;
        }

        foreach ( rectify_custom_default_article_categories() as $parent_label => $children ) {
            $parent = term_exists( $parent_label, 'article_category' );

            if ( ! $parent ) {
                $parent = wp_insert_term( $parent_label, 'article_category' );
            }

            if ( is_wp_error( $parent ) ) {
                continue;
            }

            $parent_id = is_array( $parent ) ? (int) $parent['term_id'] : (int) $parent;

            if ( ! $parent_id ) {
                continue;
            }

            foreach ( $children as $child_label ) {
                if ( ! term_exists( $child_label, 'article_category', $parent_id ) ) {
                    wp_insert_term( $child_label, 'article_category', array( 'parent' => $parent_id ) );
                }
            }
        }
    }
}
add_action( 'init', 'rectify_custom_seed_article_categories', 20 );

if ( ! function_exists( 'rectify_custom_article_child_term' ) ) {
    /**
     * First assigned article_category term that is a child of the given
     * parent term, for badge/filter output on the listing pages.
     *
     * @param int|WP_Post $post        Post to inspect.
     * @param int         $parent_term Parent term ID.
     * @return WP_Term|null
     */
    function rectify_custom_article_child_term( $post, $parent_term ) {
        $terms = get_the_terms( $post, 'article_category' );

        if ( empty( $terms ) || is_wp_error( $terms ) ) {
            return null;
        }

        foreach ( $terms as $term ) {
            if ( (int) $term->parent === (int) $parent_term ) {
                return $term;
            }
        }

        return null;
    }
}

if ( ! function_exists( 'rectify_custom_articles_seed_data' ) ) {
    /**
     * Seed articles mirroring the cards previously hard-coded on the
     * Case Studies and News & Insights listing pages, so both pages look
     * identical after switching to real posts.
     *
     * @return array[]
     */
    function rectify_custom_articles_seed_data() {
        return array(
            array( 'category' => 'Residential', 'image' => 'sloping-slab.webp', 'title' => 'Sinkhole Remediation Explained: Early Warning Signs and How to Fix Them' ),
            array( 'category' => 'Infrastructure', 'image' => 'Wall-with-prop7.jpg', 'title' => 'Government Infrastructure Maintenance Solutions for Ground Stability and Structural Remediation' ),
            array( 'category' => 'Commercial', 'image' => 'TruckandVanathouse.jpg', 'title' => 'Void Filling Under Concrete: How Engineered Fill Solutions Prevent Long-Term Damage' ),
            array( 'category' => 'Residential', 'image' => 'rectify-homepage-hero.webp', 'title' => 'Chemical Underpinning in Australia: the Smart Fix for Cracked Walls, Sloping Floors & Unstable Foundations' ),
            array( 'category' => 'Infrastructure', 'image' => 'IMG_0867-1.jpg', 'title' => 'Marine Structures Repair Strategies for Erosion Control and Structural Stability' ),
            array( 'category' => 'Commercial', 'image' => 'craced-walls.webp', 'title' => 'Ground Subsidence Explained and the Most Effective Way to Repair It' ),
            array( 'category' => 'Residential', 'image' => 'horizontal-crack.webp', 'title' => 'Jammed Door Repairs to Restore Functionality in Homes & Buildings' ),
            array( 'category' => 'Infrastructure', 'image' => 'resources-image.webp', 'title' => 'Road Infrastructure Maintenance Strategies for Preventing Ground Failure and Structural Deterioration' ),
            array( 'category' => 'Commercial', 'image' => 'jamming-doors.webp', 'title' => 'Cracks in Brick Walls: Causes, Warning Signs, and Effective Repair Methods' ),
            array( 'category' => 'News', 'image' => 'craced-walls.webp', 'title' => 'FAQs before getting house chemically underpinned' ),
            array( 'category' => 'Pro Tips', 'image' => 'IMG_0867-1.jpg', 'title' => 'How to know if the crack is serious' ),
            array( 'category' => 'Pro Tips', 'image' => 'Wall-with-prop7.jpg', 'title' => 'Pre-winter home checklist' ),
        );
    }
}

if ( ! function_exists( 'rectify_custom_article_sideload_thumbnail' ) ) {
    /**
     * Copy a theme asset image into the media library and attach it to a
     * post as its featured image.
     *
     * @param string $filename Filename inside images/home/.
     * @param int    $post_id  Post to attach the thumbnail to.
     */
    function rectify_custom_article_sideload_thumbnail( $filename, $post_id ) {
        $theme_dir  = get_stylesheet_directory();
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

if ( ! function_exists( 'rectify_custom_seed_articles' ) ) {
    function rectify_custom_seed_articles() {
        if ( ! post_type_exists( 'rectify_article' ) || ! taxonomy_exists( 'article_category' ) ) {
            return;
        }

        $existing = get_posts( array(
            'post_type'      => 'rectify_article',
            'post_status'    => 'any',
            'posts_per_page' => 1,
            'fields'         => 'ids',
        ) );

        if ( ! empty( $existing ) ) {
            return;
        }

        foreach ( rectify_custom_articles_seed_data() as $index => $article ) {
            $post_id = wp_insert_post( array(
                'post_type'   => 'rectify_article',
                'post_title'  => $article['title'],
                'post_status' => 'publish',
                'menu_order'  => $index,
            ) );

            if ( ! $post_id || is_wp_error( $post_id ) ) {
                continue;
            }

            $term = get_term_by( 'name', $article['category'], 'article_category' );
            if ( $term instanceof WP_Term ) {
                wp_set_object_terms( $post_id, array( (int) $term->term_id ), 'article_category' );
            }

            rectify_custom_article_sideload_thumbnail( $article['image'], $post_id );
        }
    }
}
add_action( 'init', 'rectify_custom_seed_articles', 21 );

if ( ! function_exists( 'rectify_custom_get_homepage_articles' ) ) {
    /**
     * Fetch published articles assigned to a homepage section.
     *
     * @param string $placement Homepage placement value.
     * @param int    $limit     Maximum number of cards.
     * @return WP_Post[]
     */
    function rectify_custom_get_homepage_articles( $placement, $limit ) {
        $placement = rectify_custom_sanitize_article_homepage_placement( $placement );

        if ( '' === $placement ) {
            return array();
        }

        return get_posts( array(
            'post_type'      => 'rectify_article',
            'post_status'    => 'publish',
            'posts_per_page' => max( 1, absint( $limit ) ),
            'meta_key'       => '_rectify_homepage_placement',
            'meta_value'     => $placement,
            'orderby'        => array(
                'menu_order' => 'ASC',
                'date'       => 'DESC',
            ),
            'order'          => 'ASC',
        ) );
    }
}

if ( ! function_exists( 'rectify_custom_article_case_study_label' ) ) {
    /**
     * Build the small uppercase label shown on homepage case-study cards.
     *
     * @param int $post_id Article ID.
     * @return string
     */
    function rectify_custom_article_case_study_label( $post_id ) {
        $case_parent = get_term_by( 'name', 'Case Studies', 'article_category' );

        if ( $case_parent instanceof WP_Term ) {
            $term = rectify_custom_article_child_term( $post_id, $case_parent->term_id );
            if ( $term instanceof WP_Term ) {
                return sprintf( __( '%s Case Study', 'rectify-custom' ), $term->name );
            }
        }

        return __( 'Featured Case Study', 'rectify-custom' );
    }
}

if ( ! function_exists( 'rectify_custom_article_category_url_segment' ) ) {
    /**
     * URL segment used for an article's top-level Article Category, e.g.
     * "resources/case-studies/..." or "resources/news-and-insights/...".
     * Kept in sync with the static resources/case-studies and
     * resources/news-and-insights listing pages linked throughout the site.
     *
     * @param WP_Term $term Top-level article_category term.
     * @return string
     */
    function rectify_custom_article_category_url_segment( $term ) {
        if ( ! $term instanceof WP_Term ) {
            return 'uncategorised';
        }

        $known = array(
            'case-studies'  => 'case-studies',
            'news-insights' => 'news-and-insights',
        );

        if ( isset( $known[ $term->slug ] ) ) {
            return $known[ $term->slug ];
        }

        return sanitize_title( str_replace( '&', 'and', $term->name ) );
    }
}

if ( ! function_exists( 'rectify_custom_get_article_top_term' ) ) {
    /**
     * Top-level Article Category term for a post ("Case Studies" or
     * "News & Insights"). Articles published without any article_category
     * term are assigned one at random so every article still gets a
     * consistent URL and breadcrumb.
     *
     * @param int|WP_Post $post Article to inspect.
     * @return WP_Term|null
     */
    function rectify_custom_get_article_top_term( $post ) {
        $post = get_post( $post );

        if ( ! $post instanceof WP_Post ) {
            return null;
        }

        $terms = get_the_terms( $post, 'article_category' );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                if ( 0 === (int) $term->parent ) {
                    return $term;
                }
            }

            foreach ( $terms as $term ) {
                if ( $term->parent ) {
                    $parent = get_term( $term->parent, 'article_category' );
                    if ( $parent instanceof WP_Term ) {
                        return $parent;
                    }
                }
            }
        }

        $top_terms = get_terms( array(
            'taxonomy'   => 'article_category',
            'parent'     => 0,
            'hide_empty' => false,
        ) );

        if ( is_wp_error( $top_terms ) || empty( $top_terms ) ) {
            return null;
        }

        // No category assigned yet — pick one at random for now so the
        // article still gets a consistent URL/breadcrumb, and remember
        // the choice so it stays the same on future requests.
        $chosen = $top_terms[ array_rand( $top_terms ) ];
        wp_set_object_terms( $post->ID, array( (int) $chosen->term_id ), 'article_category', true );

        return $chosen;
    }
}

if ( ! function_exists( 'rectify_custom_article_permalink' ) ) {
    /**
     * Build "resources/{article-category}/{post-slug}/" permalinks for
     * articles, based on each post's own Article Category term.
     *
     * @param string  $post_link Default permalink.
     * @param WP_Post $post      Post being linked to.
     * @return string
     */
    function rectify_custom_article_permalink( $post_link, $post ) {
        if ( ! $post instanceof WP_Post || 'rectify_article' !== $post->post_type ) {
            return $post_link;
        }

        $segment = rectify_custom_article_category_url_segment( rectify_custom_get_article_top_term( $post ) );

        return home_url( user_trailingslashit( "resources/{$segment}/{$post->post_name}" ) );
    }
}
add_filter( 'post_type_link', 'rectify_custom_article_permalink', 10, 2 );

if ( ! function_exists( 'rectify_custom_register_article_rewrite_rules' ) ) {
    /**
     * Route incoming "resources/{article-category}/{post-slug}/" requests
     * back to the matching rectify_article post. Registered as extra
     * rewrite rules, so these take effect immediately without needing a
     * rewrite flush.
     */
    function rectify_custom_register_article_rewrite_rules() {
        if ( ! taxonomy_exists( 'article_category' ) ) {
            return;
        }

        $segments  = array( 'uncategorised' );
        $top_terms = get_terms( array(
            'taxonomy'   => 'article_category',
            'parent'     => 0,
            'hide_empty' => false,
        ) );

        if ( ! is_wp_error( $top_terms ) ) {
            foreach ( $top_terms as $term ) {
                $segments[] = rectify_custom_article_category_url_segment( $term );
            }
        }

        foreach ( array_unique( $segments ) as $segment ) {
            add_rewrite_rule(
                '^resources/' . preg_quote( $segment, '#' ) . '/([^/]+)/?$',
                'index.php?rectify_article=$matches[1]',
                'top'
            );
        }
    }
}
add_action( 'init', 'rectify_custom_register_article_rewrite_rules', 25 );

if ( ! function_exists( 'rectify_custom_article_kicker_label' ) ) {
    /**
     * Small label shown above an article's title on its single page, based
     * on the post's actual Article Category (e.g. "Commercial Case Study",
     * "Pro Tips") instead of a fixed placeholder.
     *
     * @param int $post_id Article ID.
     * @return string
     */
    function rectify_custom_article_kicker_label( $post_id ) {
        $top_term = rectify_custom_get_article_top_term( $post_id );

        if ( ! $top_term instanceof WP_Term ) {
            return __( 'Case Study', 'rectify-custom' );
        }

        $child_term = rectify_custom_article_child_term( $post_id, $top_term->term_id );

        if ( 'case-studies' === $top_term->slug ) {
            return $child_term instanceof WP_Term
                ? sprintf( __( '%s Case Study', 'rectify-custom' ), $child_term->name )
                : __( 'Case Study', 'rectify-custom' );
        }

        return $child_term instanceof WP_Term ? $child_term->name : $top_term->name;
    }
}

if ( ! function_exists( 'rectify_custom_articles_rewrite_flush' ) ) {
    function rectify_custom_articles_rewrite_flush() {
        rectify_custom_register_articles_cpt();
        rectify_custom_seed_article_categories();
        rectify_custom_seed_articles();
        flush_rewrite_rules();
    }
}
add_action( 'after_switch_theme', 'rectify_custom_articles_rewrite_flush' );
