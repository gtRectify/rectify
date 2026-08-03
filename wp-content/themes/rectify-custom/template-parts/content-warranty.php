<?php
/**
 * Warranty page.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-warranty-page' ); ?>>
    <?php
    $sections = array( 'warranty-hero', 'warranty-periods', 'warranty-terms', 'warranty-cta' );
    foreach ( $sections as $section_key ) {
        if ( function_exists( 'rectify_builder_render_section' ) ) {
            rectify_builder_render_section( get_the_ID(), $section_key );
        }
    }
    ?>
</article>
