<?php
/**
 * Page Template
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
            get_template_part( 'template-parts/content', 'page' );

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
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
