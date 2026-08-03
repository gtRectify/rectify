<?php
/**
 * Single Job Opportunity Template
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
            get_template_part( 'template-parts/about-us/content-careers-single-page' );
        }
        ?>
    </div>
</div>

<?php get_footer();
