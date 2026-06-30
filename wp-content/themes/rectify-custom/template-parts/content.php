<?php
/**
 * Post/Content Template Part
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
    <header class="post-header">
        <?php
        if ( has_post_thumbnail() ) {
            ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
            <?php
        }

        the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        ?>

        <div class="post-meta">
            <?php rectify_custom_posted_on(); ?>
            <?php rectify_custom_posted_by(); ?>
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<span class="category">';
                foreach ( $categories as $category ) {
                    echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>, ';
                }
                echo '</span>';
            }
            ?>
        </div>
    </header>

    <div class="post-content">
        <?php
        if ( is_singular() ) {
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rectify-custom' ),
                'after'  => '</div>',
            ) );
        } else {
            the_excerpt();
            ?>
            <a href="<?php esc_url( the_permalink() ); ?>" class="read-more"><?php esc_html_e( 'Read More', 'rectify-custom' ); ?></a>
            <?php
        }
        ?>
    </div>

    <?php
    if ( is_singular() && comments_open() ) {
        ?>
        <footer class="post-footer">
            <?php
            $tags = get_the_tags();
            if ( ! empty( $tags ) ) {
                echo '<div class="post-tags">';
                echo esc_html__( 'Tags: ', 'rectify-custom' );
                foreach ( $tags as $tag ) {
                    echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a> ';
                }
                echo '</div>';
            }
            ?>
        </footer>
        <?php
    }
    ?>
</article>
