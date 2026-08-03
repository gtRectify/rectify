<?php
/**
 * Single Post Template
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="content-wrapper">
    <div class="site-content">
        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            // Post navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post', 'rectify-custom' ) . '</span><span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'rectify-custom' ) . '</span><span class="nav-title">%title</span>',
            ) );
        }
        ?>
    </div>

    <aside class="sidebar" role="complementary">
        <?php
        if ( is_active_sidebar( 'primary-sidebar' ) ) {
            dynamic_sidebar( 'primary-sidebar' );
        }
        ?>
    </aside>
</div>

<?php get_footer();
