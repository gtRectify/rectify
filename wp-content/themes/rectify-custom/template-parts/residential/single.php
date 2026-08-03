<?php
/**
 * Single page template for anything linked from the "Residential Solutions"
 * branch of the mega menu (see rectify_custom_get_residential_solutions_page_ids()
 * in functions.php). Matching is based on the mega menu structure, not the page
 * hierarchy, since several linked pages are not children of "residential-solutions".
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

            $post_slug     = get_post_field( 'post_name', get_the_ID() );
            $template_path = get_template_directory() . '/template-parts/residential/content-' . $post_slug . '.php';

            if ( file_exists( $template_path ) ) {
                include $template_path;
            } else {
                get_template_part( 'template-parts/content-page' );
            }

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>
    </div>
</div>

<?php get_footer();
