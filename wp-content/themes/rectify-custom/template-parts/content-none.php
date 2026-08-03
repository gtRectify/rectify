<?php
/**
 * No Content Found Template Part
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article class="post">
    <header class="post-header">
        <h1 class="post-title"><?php esc_html_e( 'Nothing Found', 'rectify-custom' ); ?></h1>
    </header>

    <div class="post-content">
        <?php
        if ( is_search() ) {
            ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rectify-custom' ); ?></p>
            <?php get_search_form(); ?>
            <?php
        } else {
            ?>
            <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'rectify-custom' ); ?></p>
            <?php get_search_form(); ?>
            <?php
        }
        ?>
    </div>
</article>
