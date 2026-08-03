<?php
/**
 * Soil Stabilisation page content template.
 *
 * Replicates rectify.com.au/soil-stabilisation/ (copy-only landing page:
 * hero, why/innovative/environment bands, Rectify Advantage, testimonials,
 * FAQ, final CTA).
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-brick-page rx-driveway-page rx-residential-figma' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'soil-stabilisation-hero',
                'render' => function () {
                    ?>
                    <section class="rx-brick-hero-panel">
                        <div class="rx-wrap rx-brick-hero-grid">
                            <div class="rx-brick-hero-copy">
                                <span class="rx-kicker">RESIDENTIAL SOLUTIONS</span>
                                <h1>Residential Soil Stabilisation</h1>
                                <p>At Rectify Group, we transform unstable grounds into resilient foundations. Over 50 years of expertise dedicated to bringing enduring stability to your home.</p>
                                <div class="rx-brick-hero-actions">
                                    <a class="rx-btn rx-btn-red" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Get A Free Quote</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-why',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band">
                        <div class="rx-driveway-wrap">
                            <h2>Why Soil Stabilisation Matters</h2>
                            <p>We're all too familiar with the issues caused by soil instability: cracks in the walls, sloping floors, and worst of all, a compromised home structure. That's where soil stabilisation steps in as the silent hero.</p>
                            <p>With our cutting-edge techniques, we enhance soil properties, increasing its weight-bearing capabilities and reducing risks associated with soil liquefaction and settlement.</p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-innovative',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band rx-driveway-soft">
                        <div class="rx-driveway-wrap">
                            <h2>Our Innovative Solutions</h2>
                            <p>In a realm often plagued by outdated methods, we dare to be different. Our state-of-the-art techniques like injection grouting and compaction offer efficient, minimally-intrusive remedies that are both fast and affordable. When you entrust us with your home, you're getting nothing less than the best.</p>
                            <p class="rx-driveway-related">
                                <strong>Related Services:</strong>
                                <a href="<?php echo esc_url( home_url( '/residential/ground-improvement/' ) ); ?>">Ground Improvement <span aria-hidden="true">&#8594;</span></a>
                                <a href="<?php echo esc_url( home_url( '/residential/chemical-underpinning/' ) ); ?>">Chemical Underpinning <span aria-hidden="true">&#8594;</span></a>
                            </p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-environment',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band">
                        <div class="rx-driveway-wrap">
                            <h2>Environmental Responsibility</h2>
                            <p>We take our commitment to the planet seriously. The products we use in the soil stabilisation process are environmentally friendly and comply with all relevant regulations. Peace of mind for you; a helping hand for Mother Earth.</p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-advantage',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band rx-driveway-soft">
                        <div class="rx-driveway-wrap">
                            <span class="rx-kicker">HERE'S WHY WE STAND OUT</span>
                            <h2>The Rectify Advantage</h2>
                            <div class="rx-driveway-benefit-grid">
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Unrivalled Experience</h3><p>We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with the highest level of expertise and training.</p></article>
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Cutting-Edge Technology</h3><p>We invest in the latest technology, equipment and materials, constantly reviewing the latest developments from around the world.</p></article>
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Quality Assurance</h3><p>Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.</p></article>
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Seamless Delivery</h3><p>Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.</p></article>
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Affordable Solutions</h3><p>We ensure the solutions provided are affordable and competitive when compared to other similar companies.</p></article>
                                <article class="rx-driveway-benefit"><span class="rx-driveway-check" aria-hidden="true"></span><h3>Environmentally Conscious</h3><p>Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.</p></article>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-testimonials-intro',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band">
                        <div class="rx-driveway-wrap">
                            <span class="rx-kicker">OUR TESTIMONIALS</span>
                            <h2>What Our Clients Are Saying</h2>
                            <p>Get in touch with the Rectify team today to begin work on your next project.</p>
                            <p class="rx-driveway-related"><a class="rx-driveway-cta-primary" href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>">View All Reviews</a></p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-testimonials',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-band">
                        <div class="rx-driveway-wrap">
                            <div class="rx-driveway-benefit-copy">
                                <div class="rx-driveway-proof-grid">
                                    <article class="rx-driveway-proof-card"><h3>Highly Recommended</h3><p>Thanks to all the team - Frank, Armand, Adrian, Birt, Junior, Beyz and Tina - for the professional approach and expertise brought to a difficult four townhouse stabilization and lift project. Highly recommended. &mdash; Bill Rees, Verified Customer</p></article>
                                    <article class="rx-driveway-proof-card"><h3>Very Professional</h3><p>Very professional. Explained everything to me and answered all my questions. The guys were always on time and cleaned up everything when they left, and they were friendly and polite. &mdash; Andrea Wilde, Verified Customer</p></article>
                                    <article class="rx-driveway-proof-card"><h3>Professional &amp; Clear</h3><p>Professional and clear advice, all services undertaken in a planned and timely manner. At the moment all seems well - but a bit early to confirm definitively. &mdash; Cheryl Sullivan, Verified Customer</p></article>
                                    <article class="rx-driveway-proof-card"><h3>Beyond Expectation</h3><p>We were very satisfied with all aspects of their service. The outcome was beyond expectation with all wall issue greatly improved. Their knowledge and service was great. Would highly recommend Rectify. &mdash; Kris Camm, Verified Customer</p></article>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'soil-stabilisation-faq',
                'render' => function () {
                    $rx_soil_faqs = array(
                        array( 'Do I really need soil stabilisation for my property?', "Soil stability is vital for your home's structural integrity. If you notice cracks or other signs of settling, it's likely that soil stabilisation could be beneficial." ),
                        array( 'What is the duration of the soil stabilisation process?', 'Generally, soil stabilisation projects range from a few days to several weeks, depending on the complexity of the job.' ),
                        array( 'How much does soil stabilisation cost?', 'Each project is unique, and we provide detailed quotations after assessing the property. Rest assured, we aim to provide the most cost-effective solutions.' ),
                        array( 'Is the process disruptive to my daily life?', 'Our modern methods are designed to be minimally invasive, meaning less disruption to your day-to-day activities.' ),
                        array( 'Is the stabilised soil safe for landscaping and gardening?', 'Absolutely. Our environmentally friendly solutions ensure that your soil remains suitable for all types of landscaping and gardening projects.' ),
                    );
                    $rx_soil_faqs = array_map(
                        static function ( $item ) {
                            return array( $item['question'], $item['answer'] );
                        },
                        rectify_custom_get_faq_group( 'soil-stabilisation' )
                    );
                    ?>
                    <section class="rx-faq-list-band">
                        <div class="rx-wrap">
                            <h2>Frequently Asked Questions</h2>
                            <div class="rx-faq-list">
                                <?php foreach ( $rx_soil_faqs as $index => $rx_soil_faq ) : ?>
                                <div class="rx-faq-item<?php echo 0 === $index ? ' is-active' : ''; ?>">
                                    <button type="button" class="rx-faq-question" aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>" aria-controls="rx-faq-answer-soil-<?php echo esc_attr( $index ); ?>">
                                        <span><?php echo esc_html( $rx_soil_faq[0] ); ?></span>
                                        <span class="rx-faq-icon" aria-hidden="true">
                                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </span>
                                    </button>
                                    <div class="rx-faq-answer" id="rx-faq-answer-soil-<?php echo esc_attr( $index ); ?>">
                                        <p><?php echo esc_html( $rx_soil_faq[1] ); ?></p>
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
                'key'    => 'soil-stabilisation-cta',
                'render' => function () {
                    ?>
                    <section class="rx-driveway-cta">
                        <div class="rx-driveway-wrap">
                            <h2>Get A FREE Quote &amp; Structural Assessment</h2>
                            <div class="rx-driveway-cta-actions">
                                <a class="rx-driveway-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Get A Free Quote</a>
                                <a class="rx-driveway-cta-outline" href="tel:1800182020">1800 18 20 20</a>
                                <a class="rx-driveway-cta-outline" href="mailto:hello@rectify.com.au">hello@rectify.com.au</a>
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
