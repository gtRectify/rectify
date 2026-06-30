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
        'primary' => __( 'Primary Menu', 'rectify-custom' ),
        'footer'  => __( 'Footer Menu', 'rectify-custom' ),
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'rectify-custom', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'rectify_custom_theme_setup' );

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

    // Pass data to JavaScript
    wp_localize_script( 'rectify-custom-script', 'rectifyData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'rectify_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'rectify_custom_enqueue_assets' );

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

    return $classes;
}
add_filter( 'body_class', 'rectify_custom_body_classes' );

/**
 * Add this to your child theme functions.php, or enqueue the files manually.
 */
