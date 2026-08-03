<?php
/**
 * 404 Error Page Template
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
        <article class="post error-404">
            <header class="post-header">
                <h1 class="post-title"><?php esc_html_e( '404 - Page Not Found', 'rectify-custom' ); ?></h1>
            </header>

            <div class="post-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rectify-custom' ); ?></p>

                <?php get_search_form(); ?>

                <h2><?php esc_html_e( 'Recent Posts', 'rectify-custom' ); ?></h2>
                <ul>
                    <?php
                    $recent = new WP_Query( array(
                        'posts_per_page' => 5,
                    ) );

                    while ( $recent->have_posts() ) {
                        $recent->the_post();
                        ?>
                        <li><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></li>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </article>
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
