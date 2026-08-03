<?php
/**
 * Archive Template
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
        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="page-description">', '</div>' );
            ?>
        </header>

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
        }
        ?>
    </aside>
</div>

<?php get_footer();
