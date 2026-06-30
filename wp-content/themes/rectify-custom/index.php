<?php
/**
 * Main Template File
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
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            }

            rectify_custom_pagination();
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
        ?>
    </div>

    <aside class="sidebar" role="complementary">
        <?php
        if ( is_active_sidebar( 'primary-sidebar' ) ) {
            dynamic_sidebar( 'primary-sidebar' );
        } else {
            ?>
            <div class="widget">
                <h3 class="widget-title"><?php esc_html_e( 'Sidebar', 'rectify-custom' ); ?></h3>
                <p><?php esc_html_e( 'This sidebar is currently empty. Add some widgets to get started.', 'rectify-custom' ); ?></p>
            </div>
            <?php
        }
        ?>
    </aside>
</div>

<?php get_footer();
