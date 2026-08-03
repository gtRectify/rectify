<?php
/**
 * Our Technology FAQ page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$faqs = array(
    array(
        'question' => 'What is chemical underpinning?',
        'answer'   => 'Chemical underpinning involves injecting engineered materials beneath foundations to stabilise soils, fill voids, and improve ground performance, helping restore structural stability.',
        'active'   => true,
    ),
    array(
        'question' => 'What is ground stabilisation?',
        'answer'   => 'Ground stabilisation is the process of strengthening weak, loose or reactive soils beneath a structure so they can reliably support the foundation, reducing the risk of further movement.',
    ),
    array(
        'question' => 'What is sand permeation?',
        'answer'   => 'Sand permeation is a grouting technique that fills the voids between loose, non-cohesive soils such as sand, increasing soil stiffness and controlling groundwater to prevent excavation failure and ground loss.',
    ),
    array(
        'question' => 'What is asset remediation?',
        'answer'   => 'Asset remediation covers the range of repair and stabilisation works carried out to restore a structure or piece of infrastructure to a safe, functional condition after damage from ground movement, water ingress or general deterioration.',
    ),
    array(
        'question' => 'Are your solutions invasive?',
        'answer'   => 'No. Our techniques are designed to be low-disruption and require minimal excavation compared to traditional methods, allowing works to be carried out with limited impact on your property or operations.',
    ),
    array(
        'question' => 'How do you determine the right solution?',
        'answer'   => 'Every project begins with a site assessment to understand the cause and extent of the movement, soil conditions and site access. From there, our specialists recommend the technique best suited to your property and budget.',
    ),
);

$faqs = rectify_custom_get_faq_group( 'our-technology' );

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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-faq-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'faq-our-technology-hero',
                'render' => function () {
                    ?>
                    <section class="rx-faq-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'Resources', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Frequently Asked Questions', 'rectify-custom' ); ?></h1>
                            <p><?php esc_html_e( 'Find clear answers to the most common questions about cracks, sinking floors, foundation movement, and how Rectify can help protect your home.', 'rectify-custom' ); ?></p>

                            <nav class="rx-faq-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">&gt;</span>
                                <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">&gt;</span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">&gt;</span>
                                <span><?php esc_html_e( 'Frequently Asked Questions', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'faq-our-technology-banner',
                'render' => function () {
                    ?>
                    <div class="rx-faq-banner">
                        <img src="<?php echo esc_url( rx_asset_url( 'images/home/TruckandVanathouse.jpg' ) ); ?>" alt="">
                    </div>
                    <?php
                },
            ),
            array(
                'key'    => 'faq-our-technology-list',
                'render' => function () use ( $faqs ) {
                    ?>
                    <section class="rx-faq-search-band">
                        <div class="rx-wrap">
                            <form class="rx-faq-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="search" name="s" class="rx-faq-search-input" placeholder="<?php esc_attr_e( 'Search Question', 'rectify-custom' ); ?>">
                                <button type="submit" class="rx-faq-search-btn">
                                    <?php esc_html_e( 'Search', 'rectify-custom' ); ?>
                                    <svg width="15" height="15" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="2"/><line x1="14.2" y1="14.2" x2="19" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                                </button>
                            </form>
                        </div>
                    </section>

                    <section class="rx-faq-list-band">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Our Technology FAQs', 'rectify-custom' ); ?></h2>

                            <div class="rx-faq-list">
                                <?php foreach ( $faqs as $index => $faq ) : ?>
                                    <div class="rx-faq-item<?php echo ! empty( $faq['active'] ) ? ' is-active' : ''; ?>">
                                        <button type="button" class="rx-faq-question" aria-expanded="<?php echo ! empty( $faq['active'] ) ? 'true' : 'false'; ?>" aria-controls="rx-faq-answer-<?php echo esc_attr( $index ); ?>">
                                            <span><?php echo esc_html( $faq['question'] ); ?></span>
                                            <span class="rx-faq-icon" aria-hidden="true">
                                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </span>
                                        </button>
                                        <div class="rx-faq-answer" id="rx-faq-answer-<?php echo esc_attr( $index ); ?>">
                                            <p><?php echo esc_html( $faq['answer'] ); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'faq-our-technology-cta',
                'render' => function () use ( $help_cards ) {
                    ?>
                    <section class="rx-faq-cta" style="<?php echo esc_attr( '--rx-faq-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

                            <div class="rx-faq-help-grid">
                                <?php foreach ( $help_cards as $card ) : ?>
                                    <article class="rx-faq-help-card">
                                        <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                                        <?php if ( 'phone' === $card['type'] ) : ?>
                                            <a class="rx-faq-help-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( $card['phone'] ); ?>
                                            </a>
                                        <?php else : ?>
                                            <a class="rx-faq-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                                            </a>
                                        <?php endif; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
        ) );
    endif;
    ?>

</article>
