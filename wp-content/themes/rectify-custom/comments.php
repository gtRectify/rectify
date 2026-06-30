<?php
/**
 * Comments Template
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) {
        ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                esc_html_e( 'One comment', 'rectify-custom' );
            } else {
                printf(
                    esc_html( _n( '%s comment', '%s comments', $comment_count, 'rectify-custom' ) ),
                    intval( $comment_count )
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'avatar_size' => 48,
                'callback'    => 'rectify_custom_comment',
            ) );
            ?>
        </ol>

        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'rectify-custom' ); ?></h2>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'rectify-custom' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'rectify-custom' ) ); ?></div>
            </nav>
            <?php
        }
    }

    if ( comments_open() ) {
        comment_form( array(
            'title_reply'        => esc_html__( 'Leave a Comment', 'rectify-custom' ),
            'label_submit'       => esc_html__( 'Post Comment', 'rectify-custom' ),
            'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'rectify-custom' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
            'fields'             => array(
                'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'rectify-custom' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . ' /></p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'rectify-custom' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . ' /></p>',
                'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'rectify-custom' ) . '</label><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>',
            ),
        ) );
    }
    ?>
</div>
