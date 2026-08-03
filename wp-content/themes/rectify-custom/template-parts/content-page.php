<?php
/**
 * Page Content Template Part
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
        <!-- // DISABLED POST FEATURED IMAGE -->
<!-- 
    <header class="post-header">
        <?php


        the_title( '<h1 class="post-title">', '</h1>' );
        ?>
    </header> -->

    <div class="post-content">
        <?php
        the_content();
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rectify-custom' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>
</article>
