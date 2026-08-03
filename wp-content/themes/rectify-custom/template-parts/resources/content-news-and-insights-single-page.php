<?php
/**
 * News and Insights listing page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$filters = array(
    array( 'key' => 'all', 'label' => 'All' ),
    array( 'key' => 'news', 'label' => 'News' ),
    array( 'key' => 'pro-tips', 'label' => 'Pro Tips' ),
);

$news_items = array(
    array(
        'category' => 'news',
        'badge'    => 'News',
        'image'    => rx_asset_url( 'images/home/craced-walls.webp' ),
        'title'    => 'FAQs before getting house chemically underpinned',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/IMG_0867-1.jpg' ),
        'title'    => 'How to know if the crack is serious',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
        'title'    => 'pre-winter home checklist',
    ),
    array(
        'category' => 'news',
        'badge'    => 'News',
        'image'    => rx_asset_url( 'images/home/craced-walls.webp' ),
        'title'    => 'FAQs before getting house chemically underpinned',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/IMG_0867-1.jpg' ),
        'title'    => 'How to know if the crack is serious',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
        'title'    => 'pre-winter home checklist',
    ),
    array(
        'category' => 'news',
        'badge'    => 'News',
        'image'    => rx_asset_url( 'images/home/craced-walls.webp' ),
        'title'    => 'FAQs before getting house chemically underpinned',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/IMG_0867-1.jpg' ),
        'title'    => 'How to know if the crack is serious',
    ),
    array(
        'category' => 'pro-tips',
        'badge'    => 'Pro Tips',
        'image'    => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
        'title'    => 'pre-winter home checklist',
    ),
);

$help_cards = array(
    array(
        'icon'  => 'Rectify Icon Set_Call Expert.svg',
        'title' => 'Call Us',
        'copy'  => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
        'type'  => 'phone',
        'phone' => '1800 18 20 20',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
        'title' => 'Estimate Project Cost',
        'copy'  => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
        'type'  => 'link',
        'label' => 'Get My Cost Estimate',
        'url'   => home_url( '/assessment/' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Explore Resources.svg',
        'title' => 'Explore Resources',
        'copy'  => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
        'type'  => 'link',
        'label' => 'Explore Resources',
        'url'   => home_url( '/resources/' ),
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-news-page' ); ?>>

    <section class="rx-news-hero">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'News and Insights', 'rectify-custom' ); ?></span>
            <h1><?php esc_html_e( 'Latest News & Insights at Rectify', 'rectify-custom' ); ?></h1>
            <p><?php esc_html_e( 'Expert guidance, technical knowledge and practical advice to help homeowners, property managers and industry professionals make informed decisions about structural stability and asset performance.', 'rectify-custom' ); ?></p>

            <nav class="rx-news-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php esc_html_e( 'News and Insights', 'rectify-custom' ); ?></span>
            </nav>

            <div class="rx-news-filters" role="tablist" aria-label="<?php esc_attr_e( 'Filter news and insights', 'rectify-custom' ); ?>">
                <?php foreach ( $filters as $index => $filter ) : ?>
                    <button
                        type="button"
                        class="rx-news-filter<?php echo 0 === $index ? ' is-active' : ''; ?>"
                        data-filter="<?php echo esc_attr( $filter['key'] ); ?>"
                        role="tab"
                        aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
                    ><?php echo esc_html( strtoupper( $filter['label'] ) ); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-news-band">
        <div class="rx-wrap">
            <div class="rx-news-grid">
                <?php foreach ( $news_items as $item ) : ?>
                    <article class="rx-news-card" data-category="<?php echo esc_attr( $item['category'] ); ?>">
                        <figure>
                            <img src="<?php echo esc_url( $item['image'] ); ?>" alt="">
                            <span class="rx-news-badge"><?php echo esc_html( strtoupper( $item['badge'] ) ); ?></span>
                        </figure>
                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="rx-news-load-more">
                <button type="button" class="rx-news-load-btn">
                    <?php esc_html_e( 'Load More News and Insights', 'rectify-custom' ); ?>
                    <span aria-hidden="true">&#8594;</span>
                </button>
            </div>
        </div>
    </section>

    <section class="rx-news-cta" style="<?php echo esc_attr( '--rx-news-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

            <div class="rx-news-help-grid">
                <?php foreach ( $help_cards as $card ) : ?>
                    <article class="rx-news-help-card">
                        <span class="rx-news-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                        <?php if ( 'phone' === $card['type'] ) : ?>
                            <a class="rx-news-help-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( $card['phone'] ); ?>
                            </a>
                        <?php else : ?>
                            <a class="rx-news-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</article>
