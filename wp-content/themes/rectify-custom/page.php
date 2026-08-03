<?php
/**
 * Page Template
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;
$page_slug = $post->post_name;

get_header();

?>

<div class="content-wrapper">
    <div class="site-content">
        <?php
        while ( have_posts() ) {
            the_post();
            
            // Load custom template for child pages
            if ( $post->post_parent ) {
                $parent = get_post( $post->post_parent );
                $template_candidates = array(
                    get_template_directory() . '/template-parts/' . $parent->post_name . '/content-' . $post->post_name . '.php',
                    get_template_directory() . '/template-parts/resources/' . $parent->post_name . '/content-' . $post->post_name . '.php',
                );

                $template_path = '';
                foreach ( $template_candidates as $candidate ) {
                    if ( file_exists( $candidate ) ) {
                        $template_path = $candidate;
                        break;
                    }
                }

                if ( $template_path ) {
                    include( $template_path );
                } else {
                    get_template_part( 'template-parts/content' );
                }
            } else {
                // The Get a Free Quote URL renders the quotation page content.
                $content_slug = 'get-a-free-quote' === $page_slug ? 'quotation' : $page_slug;
                get_template_part( 'template-parts/content', $content_slug );
            }

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>
    </div>

  
</div>

<?php get_footer();
