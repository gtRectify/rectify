<?php
/**
 * Grouped search results, with FAQs intentionally shown first.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$search_term    = get_search_query( false );
$faq_results    = rectify_custom_search_faqs( $search_term );
$content_groups = rectify_custom_search_content_groups( $search_term );
$content_total  = array_sum( array_map( 'count', $content_groups ) );
$result_total   = count( $faq_results ) + $content_total;
$group_labels   = array(
    'case-studies' => __( 'Case Studies', 'rectify-custom' ),
    'news'         => __( 'News & Insights', 'rectify-custom' ),
    'projects'     => __( 'Our Projects', 'rectify-custom' ),
    'posts'        => __( 'Posts', 'rectify-custom' ),
);

get_header();
?>

<main class="rx-search-page" id="main-content">
    <section class="rx-search-hero">
        <div class="rx-search-hero__contour" aria-hidden="true"></div>
        <div class="rx-search-wrap">
            <nav class="rx-search-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php esc_html_e( 'Search', 'rectify-custom' ); ?></span>
            </nav>
            <p class="rx-search-eyebrow"><?php esc_html_e( 'Search Rectify', 'rectify-custom' ); ?></p>
            <h1>
                <?php if ( '' !== trim( $search_term ) ) : ?>
                    <?php printf( esc_html__( 'Results for “%s”', 'rectify-custom' ), esc_html( $search_term ) ); ?>
                <?php else : ?>
                    <?php esc_html_e( 'What can we help you find?', 'rectify-custom' ); ?>
                <?php endif; ?>
            </h1>
            <p><?php esc_html_e( 'Search our frequently asked questions, case studies, insights and completed projects.', 'rectify-custom' ); ?></p>

            <form class="rx-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="rx-search-query"><?php esc_html_e( 'Search Rectify', 'rectify-custom' ); ?></label>
                <input id="rx-search-query" type="search" name="s" value="<?php echo esc_attr( $search_term ); ?>" placeholder="<?php esc_attr_e( 'Try “wall cracks” or “slab lifting”', 'rectify-custom' ); ?>" required>
                <button type="submit">
                    <span><?php esc_html_e( 'Search', 'rectify-custom' ); ?></span>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m16 16 5 5"></path></svg>
                </button>
            </form>

            <?php if ( '' !== trim( $search_term ) ) : ?>
                <p class="rx-search-count">
                    <?php
                    printf(
                        esc_html( _n( '%d result found', '%d results found', $result_total, 'rectify-custom' ) ),
                        absint( $result_total )
                    );
                    ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <?php if ( '' === trim( $search_term ) ) : ?>
        <section class="rx-search-empty">
            <div class="rx-search-wrap rx-search-empty__inner">
                <span class="rx-search-empty__icon" aria-hidden="true">?</span>
                <h2><?php esc_html_e( 'Start with a question or topic', 'rectify-custom' ); ?></h2>
                <p><?php esc_html_e( 'You can search for a symptom, a service, a project type or a question about how Rectify works.', 'rectify-custom' ); ?></p>
            </div>
        </section>
    <?php elseif ( 0 === $result_total ) : ?>
        <section class="rx-search-empty">
            <div class="rx-search-wrap rx-search-empty__inner">
                <span class="rx-search-empty__icon" aria-hidden="true">0</span>
                <h2><?php esc_html_e( 'No matching results yet', 'rectify-custom' ); ?></h2>
                <p><?php esc_html_e( 'Try a shorter phrase or a broader term such as foundations, cracks, soil or commercial.', 'rectify-custom' ); ?></p>
                <a class="rx-btn rx-btn-red" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Ask our team', 'rectify-custom' ); ?><span aria-hidden="true">→</span></a>
            </div>
        </section>
    <?php else : ?>
        <?php if ( $faq_results ) : ?>
            <section class="rx-search-section rx-search-section--faqs" aria-labelledby="rx-search-faq-heading">
                <div class="rx-search-wrap">
                    <div class="rx-search-section__heading">
                        <div>
                            <p class="rx-search-kicker"><?php esc_html_e( 'Quick answers', 'rectify-custom' ); ?></p>
                            <h2 id="rx-search-faq-heading"><?php esc_html_e( 'Frequently Asked Questions', 'rectify-custom' ); ?></h2>
                        </div>
                        <span class="rx-search-section__count"><?php echo esc_html( count( $faq_results ) ); ?></span>
                    </div>

                    <div class="rx-search-faq-list">
                        <?php foreach ( $faq_results as $faq ) : ?>
                            <article class="rx-search-faq-card">
                                <div class="rx-search-faq-card__body">
                                    <p class="rx-search-result-type"><?php echo esc_html( $faq['group'] ); ?></p>
                                    <h3><a href="<?php echo esc_url( $faq['url'] ); ?>"><?php echo esc_html( $faq['question'] ); ?></a></h3>
                                    <p><?php echo esc_html( wp_trim_words( $faq['answer'], 34, '…' ) ); ?></p>
                                </div>
                                <a class="rx-search-result-link" href="<?php echo esc_url( $faq['url'] ); ?>">
                                    <?php esc_html_e( 'Read answer', 'rectify-custom' ); ?><span aria-hidden="true">→</span>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php foreach ( $content_groups as $group_key => $posts ) : ?>
            <?php if ( ! $posts ) { continue; } ?>
            <section class="rx-search-section rx-search-section--content" aria-labelledby="rx-search-<?php echo esc_attr( $group_key ); ?>-heading">
                <div class="rx-search-wrap">
                    <div class="rx-search-section__heading">
                        <div>
                            <p class="rx-search-kicker"><?php esc_html_e( 'Explore our work', 'rectify-custom' ); ?></p>
                            <h2 id="rx-search-<?php echo esc_attr( $group_key ); ?>-heading"><?php echo esc_html( $group_labels[ $group_key ] ); ?></h2>
                        </div>
                        <span class="rx-search-section__count"><?php echo esc_html( count( $posts ) ); ?></span>
                    </div>

                    <div class="rx-search-card-grid">
                        <?php foreach ( $posts as $result_post ) : ?>
                            <?php
                            $excerpt = has_excerpt( $result_post ) ? $result_post->post_excerpt : $result_post->post_content;
                            $excerpt = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $excerpt ) ), 24, '…' );
                            ?>
                            <article class="rx-search-content-card">
                                <a class="rx-search-content-card__media" href="<?php echo esc_url( get_permalink( $result_post ) ); ?>" tabindex="-1" aria-hidden="true">
                                    <?php if ( has_post_thumbnail( $result_post ) ) : ?>
                                        <?php echo get_the_post_thumbnail( $result_post, 'large', array( 'loading' => 'lazy' ) ); ?>
                                    <?php else : ?>
                                        <span class="rx-search-content-card__placeholder">
                                            <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 36 22 12l6 12 4-8 6 20H10Z"></path></svg>
                                        </span>
                                    <?php endif; ?>
                                </a>
                                <div class="rx-search-content-card__body">
                                    <p class="rx-search-result-type"><?php echo esc_html( $group_labels[ $group_key ] ); ?></p>
                                    <h3><a href="<?php echo esc_url( get_permalink( $result_post ) ); ?>"><?php echo esc_html( get_the_title( $result_post ) ); ?></a></h3>
                                    <?php if ( $excerpt ) : ?><p><?php echo esc_html( $excerpt ); ?></p><?php endif; ?>
                                    <a class="rx-search-result-link" href="<?php echo esc_url( get_permalink( $result_post ) ); ?>"><?php esc_html_e( 'View result', 'rectify-custom' ); ?><span aria-hidden="true">→</span></a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>

    <section class="rx-search-cta">
        <div class="rx-search-wrap rx-search-cta__inner">
            <div>
                <p class="rx-search-kicker"><?php esc_html_e( 'Need expert guidance?', 'rectify-custom' ); ?></p>
                <h2><?php esc_html_e( 'Still can’t find what you need?', 'rectify-custom' ); ?></h2>
                <p><?php esc_html_e( 'Tell our specialists what you are seeing and we’ll help you understand the next step.', 'rectify-custom' ); ?></p>
            </div>
            <div class="rx-search-cta__actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact us', 'rectify-custom' ); ?><span aria-hidden="true">→</span></a>
                <a class="rx-search-cta__phone" href="tel:1800182020">1800 18 20 20</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
