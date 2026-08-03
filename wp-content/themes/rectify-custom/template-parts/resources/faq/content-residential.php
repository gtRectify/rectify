<?php
/**
 * Residential FAQ page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$faqs = array(
    array(
        'question' => 'What are the signs my home may have a structural problem?',
        'answer'   => 'Common warning signs include cracks in walls or ceilings, doors and windows that jam or no longer close properly, sloping or bouncy floors, and gaps appearing around skirting boards or architraves. If you notice any of these, it\'s worth having a specialist assess the cause before it worsens.',
        'active'   => true,
    ),
    array(
        'question' => 'Are cracks in my walls always serious?',
        'answer'   => 'Not every crack points to a structural issue, hairline cracks in plaster can be cosmetic and caused by normal settling. However, cracks that are wide, diagonal, growing over time, or paired with sticking doors and sloping floors usually indicate underlying foundation movement that should be assessed.',
    ),
    array(
        'question' => 'Can a sinking slab be repaired without rebuilding my home?',
        'answer'   => 'Yes. In most cases a sinking slab can be stabilised and re-levelled using techniques such as chemical underpinning, resin injection or void filling, without the need to demolish or rebuild. A site assessment determines the most suitable method for your property.',
    ),
    array(
        'question' => 'Will the problem continue to get worse if I do nothing?',
        'answer'   => 'Foundation movement rarely resolves on its own. Left untreated, ground instability typically continues, leading to wider cracking, worsening slopes and more costly repairs down the track. Early intervention is generally the most cost-effective approach.',
    ),
    array(
        'question' => 'How long does a residential stabilisation project take?',
        'answer'   => 'Most residential stabilisation works are completed within a few days to a couple of weeks, depending on the extent of the movement, the remediation method used and site access. Your specialist will provide a project timeframe as part of your assessment.',
    ),
    array(
        'question' => 'Will I need to move out during the works?',
        'answer'   => 'In the majority of cases, homeowners are able to remain in the property while works are carried out, as most stabilisation methods are low-disruption. Your project team will let you know in advance if any part of the process requires you to vacate the area.',
    ),
    array(
        'question' => 'Can structural movement affect my property\'s value?',
        'answer'   => 'Yes, unresolved cracking or foundation movement can affect a property\'s value and make it harder to sell or insure. Addressing the issue with a documented, professional remediation gives buyers and valuers confidence the underlying cause has been resolved.',
    ),
    array(
        'question' => 'What causes foundation movement?',
        'answer'   => 'Foundation movement is most commonly caused by reactive clay soils expanding and contracting with moisture changes, poor drainage, tree roots drawing moisture from the ground, leaking pipes, or inadequate original footings. A site assessment identifies the specific cause for your property.',
    ),
);

$faqs = rectify_custom_get_faq_group( 'residential' );

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
                'key'    => 'faq-residential-hero',
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
                'key'    => 'faq-residential-banner',
                'render' => function () {
                    ?>
                    <div class="rx-faq-banner">
                        <img src="<?php echo esc_url( rx_asset_url( 'images/home/TruckandVanathouse.jpg' ) ); ?>" alt="">
                    </div>
                    <?php
                },
            ),
            array(
                'key'    => 'faq-residential-list',
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
                            <h2><?php esc_html_e( 'Residential FAQs', 'rectify-custom' ); ?></h2>

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
                'key'    => 'faq-residential-cta',
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
