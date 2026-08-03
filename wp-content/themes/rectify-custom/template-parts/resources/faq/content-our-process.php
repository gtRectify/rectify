<?php
/**
 * Our Process FAQ page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$faqs = array(
    array(
        'question' => 'What happens when I contact Rectify?',
        'answer'   => 'Our team will discuss your concerns, review the symptoms, and determine the most appropriate next steps, which may include a site inspection or technical assessment.',
        'active'   => true,
    ),
    array(
        'question' => 'What does a structural assessment involve?',
        'answer'   => 'A specialist visits your property to inspect the affected areas, review signs of movement such as cracking or sloping floors, and where needed take measurements or samples to identify the underlying cause.',
    ),
    array(
        'question' => 'Will I receive a detailed recommendation?',
        'answer'   => 'Yes. Following your assessment, we provide a written recommendation outlining the cause of the issue, the proposed remediation method, and an estimated cost and timeframe for the works.',
    ),
    array(
        'question' => 'How do you ensure quality outcomes?',
        'answer'   => 'Our teams follow established engineering methods, use quality-controlled materials, and carry out testing throughout the works to confirm the ground and structure are performing as expected.',
    ),
    array(
        'question' => 'Do you provide documentation and reporting?',
        'answer'   => 'Yes. We provide documentation covering the assessment findings, the works completed, and testing results, giving you a clear record for your own files, insurers or future reference.',
    ),
    array(
        'question' => 'What happens after the work is completed?',
        'answer'   => 'Once works are finished, our team reinstates the site, completes final checks and testing, and walks you through the outcome so you understand what was done and what to expect going forward.',
    ),
    array(
        'question' => 'What is Rectify\'s approach to structural issues?',
        'answer'   => 'We focus on identifying the root cause of the movement first, then apply the least disruptive, most cost-effective remediation method suited to your property, backed by over 50 years of combined industry experience.',
    ),
);

$faqs = rectify_custom_get_faq_group( 'our-process' );

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
                'key'    => 'faq-our-process-hero',
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
                'key'    => 'faq-our-process-banner',
                'render' => function () {
                    ?>
                    <div class="rx-faq-banner">
                        <img src="<?php echo esc_url( rx_asset_url( 'images/home/TruckandVanathouse.jpg' ) ); ?>" alt="">
                    </div>
                    <?php
                },
            ),
            array(
                'key'    => 'faq-our-process-list',
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
                            <h2><?php esc_html_e( 'Our Process FAQs', 'rectify-custom' ); ?></h2>

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
                'key'    => 'faq-our-process-cta',
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
