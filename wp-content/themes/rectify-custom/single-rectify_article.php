<?php
/**
 * Single template for the Case Studies And News & Insights post type.
 *
 * Reuses the existing case study single-page layout; per-post ACF/meta
 * fields override its placeholder content the same way they do on the
 * case-studies-sigle-page template.
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

            include get_template_directory() . '/template-parts/resources/content-case-studies-sigle-page.php';
        }
        ?>
    </div>
</div>

<?php get_footer();
