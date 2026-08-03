<?php
/**
 * Leaning Pillar & Chimney page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$pillar_images = array(
    'hero'       => rx_asset_url( 'images/leaning-pillars/hero-intro.jpg' ),
    'why_matter' => rx_asset_url( 'images/leaning-pillars/why-identifying-cause-matters.jpg' ),
    'before'     => rx_asset_url( 'images/leaning-pillars/before-after-1.jpg' ),
    'after'      => rx_asset_url( 'images/leaning-pillars/before-after-2.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/leaning-pillars/reactive-clay-soils.jpg',
        'title' => 'Reactive Clay Soils',
        'copy'  => array(
            'Reactive clay soils are common throughout many parts of Australia and naturally expand when wet and shrink during dry periods. These repeated cycles of movement place continual pressure on foundations and footings.',
            'As the soil expands and contracts unevenly, isolated structures such as chimneys and brick pillars may begin to tilt, crack, or separate from adjoining walls. Reactive clay is one of the most common causes of foundation movement affecting residential properties.',
        ),
    ),
    array(
        'image' => 'images/leaning-pillars/foundation-settlement.jpg',
        'title' => 'Foundation Settlement',
        'copy'  => array(
            'Foundation settlement occurs when the soil beneath a footing compresses or loses its ability to support the structure evenly. As one side of the footing settles more than the other, the chimney or brick pillar can gradually lean out of alignment.',
            'Settlement may occur slowly over many years or develop more rapidly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before masonry repairs are undertaken.',
        ),
    ),
    array(
        'image' => 'images/leaning-pillars/poor-soil-compaction.jpg',
        'title' => 'Poor Soil Compaction',
        'copy'  => array(
            'Properly compacted soil provides the stable base needed to support masonry structures. If the fill beneath a footing was not adequately compacted during construction, it can continue to compress long after the building is completed.',
            'As the supporting ground settles, the footing may move unevenly, causing brick pillars or chimneys to lean and develop structural cracks. Ground improvement can help restore support beneath affected footings.',
        ),
    ),
    array(
        'image' => 'images/leaning-pillars/subsidence.jpg',
        'title' => 'Subsidence',
        'copy'  => array(
            'Subsidence is the downward movement of the ground beneath a structure caused by weakening or loss of soil support. When the soil beneath a chimney or pillar subsides, the footing may settle unevenly, causing the masonry above to lean.',
            'In addition to visible leaning, subsidence may also result in cracking through brickwork, separation from the house, sticking doors and windows, and uneven floors. A professional assessment is essential to determine the extent of the movement and the most appropriate repair solution.',
        ),
    ),
    array(
        'image' => 'images/leaning-pillars/water-leaks-beneath-footings.jpg',
        'title' => 'Water Leaks Beneath Footings',
        'copy'  => array(
            'Leaking water pipes, damaged stormwater systems, or underground plumbing failures can introduce excess moisture beneath foundations. This may soften the soil, wash away fine particles, or create voids beneath footings.',
            'As the supporting ground weakens, masonry structures can begin to settle unevenly, causing visible leaning or cracking. Repairing the source of the water leak is an important part of preventing further movement.',
        ),
    ),
    array(
        'image' => 'images/leaning-pillars/underground-voids.jpg',
        'title' => 'Underground Voids',
        'copy'  => array(
            'Underground voids develop when soil beneath a footing is displaced, washed away, or compresses over time. Without adequate support, the footing may begin to settle unevenly, allowing the structure above to lean.',
            'Rectify uses advanced polyurethane resin injection technology to fill underground voids, strengthen weak soils, and restore support beneath affected foundations without the need for extensive excavation. This non-invasive approach helps stabilise the footing while minimising disruption.',
        ),
    ),
);

$advantage_cards = array(
    array(
        'icon'  => 'home-advantage/unrivalled-experience.svg',
        'title' => 'Unrivalled Experience',
        'copy'  => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
    ),
    array(
        'icon'  => 'home-advantage/cutting-edge-technology.svg',
        'title' => 'Cutting-Edge Technology',
        'copy'  => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
    ),
    array(
        'icon'  => 'home-advantage/seamless-delivery.svg',
        'title' => 'Seamless Delivery',
        'copy'  => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
    ),
    array(
        'icon'  => 'home-advantage/affordable-solutions.svg',
        'title' => 'Affordable Solutions',
        'copy'  => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
    ),
    array(
        'icon'  => 'home-advantage/quality-assurance.svg',
        'title' => 'Quality Assurance',
        'copy'  => 'Our commitment is backed by the quality of our workmanship, offering a 10 year warranty across our services.',
    ),
    array(
        'icon'  => 'home-advantage/save-environment.svg',
        'title' => 'Environmentally Conscious',
        'copy'  => 'Low carbon footprint using less raw materials, reduced site traffic and excellent thermal insulation properties.',
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-ci-lp-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-pillars-hero',
                'render' => function () {
                    ?>
                    <section class="rx-ci-lp-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Leaning Pillar & Chimney Repair Specialists in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-ci-lp-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Leaning Pillars Chimneys', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-intro',
                'render' => function () use ( $pillar_images ) {
                    ?>
                    <section class="rx-ci-lp-band">
                        <div class="rx-wrap rx-ci-lp-intro-grid">
                            <div class="rx-ci-lp-intro-copy">
                                <h2><?php esc_html_e( 'Restore Structural Stability Without Major Excavation Using Advanced Ground Engineering Solutions', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'A leaning pillar or chimney is often one of the most noticeable signs that the supporting foundation has shifted. While the movement may begin gradually, continued settlement beneath the footing can cause masonry structures to tilt, separate from the home, crack or become unstable over time.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Because brick chimneys and entrance pillars are heavy, concentrated structures, they place significant pressure on the ground beneath them. If the supporting soil weakens through foundation settlement, reactive clay movement, erosion or underground voids, the structure can begin to lean even when the rest of the building appears stable.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we identify the underlying cause of structural movement before recommending an engineered repair solution. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting soils beneath pillars and chimneys, helping restore stability with minimal excavation and disruption.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-ci-lp-intro-media">
                                <img src="<?php echo esc_url( $pillar_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Rectify technician assessing a leaning brick pillar', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-ci-lp-whatis">
                        <div class="rx-wrap rx-ci-lp-whatis-grid">
                            <h2><?php esc_html_e( 'Why Is My Chimney or Brick Pillar Leaning?', 'rectify-custom' ); ?></h2>
                            <div class="rx-ci-lp-whatis-copy">
                                <p><?php esc_html_e( 'A leaning chimney or brick pillar is often a sign that the foundation supporting the structure has moved. While the brickwork itself may appear to be the problem, the underlying cause is commonly found beneath the footing, where changing ground conditions reduce the stability of the supporting soil.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Chimneys, entrance pillars, boundary pillars, and other masonry structures are particularly vulnerable because they are heavy, rigid, and less able to accommodate movement. Even minor foundation movement can cause these structures to lean, crack, or separate from adjoining walls. At Rectify, we investigate the cause of the movement before recommending the most appropriate remediation solution, ensuring repairs address the source of the problem rather than just the visible symptoms.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-causes',
                'render' => function () use ( $causes ) {
                    ?>
                    <section class="rx-ci-lp-band rx-ci-lp-causes rx-ci-lp-causes--photo">
                        <div class="rx-wrap">
                            <div class="rx-ci-lp-causes-grid">
                                <?php foreach ( $causes as $cause ) : ?>
                                    <article class="rx-ci-lp-cause-card--photo">
                                        <figure class="rx-ci-lp-cause-photo">
                                            <img src="<?php echo esc_url( rx_asset_url( $cause['image'] ) ); ?>" alt="<?php echo esc_attr( $cause['title'] ); ?>">
                                        </figure>
                                        <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                                        <?php foreach ( $cause['copy'] as $paragraph ) : ?>
                                            <p><?php echo esc_html( $paragraph ); ?></p>
                                        <?php endforeach; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-matters',
                'render' => function () use ( $pillar_images ) {
                    ?>
                    <section class="rx-ci-lp-band rx-ci-lp-soft">
                        <div class="rx-wrap rx-ci-lp-matters-grid">
                            <figure class="rx-ci-lp-matters-media">
                                <img src="<?php echo esc_url( $pillar_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Rectify specialist inspecting a leaning chimney', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-ci-lp-matters-copy">
                                <h2><?php esc_html_e( 'Why Identifying the Cause Matters', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'In many cases, the visible lean is not the root problem. The movement usually begins beneath the footing, where unstable soil causes the structure above to shift over time. Repairing the masonry without stabilising the foundation often results in the same problem returning.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we focus on identifying and treating the source of the movement before cosmetic repairs are undertaken. Where unstable ground or foundation settlement is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can restore support beneath the footing. By addressing the underlying cause rather than simply repairing the visible damage, we help provide a long-term solution for residential, commercial, and infrastructure assets.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-advantage',
                'render' => function () use ( $pillar_images, $advantage_cards ) {
                    ?>
                    <section class="rx-ci-lp-advantage" style="<?php echo esc_attr( '--rx-ci-lp-contours:url(' . esc_url_raw( $pillar_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <div class="rx-ci-lp-advantage-head">
                                <div>
                                    <span class="rx-kicker"><?php esc_html_e( 'OUR ADVANTAGE', 'rectify-custom' ); ?></span>
                                    <h2><?php esc_html_e( 'Why Homeowners Choose Rectify', 'rectify-custom' ); ?></h2>
                                </div>
                                <p><?php esc_html_e( 'At Rectify, we don\'t just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.', 'rectify-custom' ); ?></p>
                            </div>
                            <div class="rx-ci-lp-advantage-grid">
                                <?php foreach ( $advantage_cards as $card ) : ?>
                                    <article class="rx-ci-lp-advantage-card">
                                        <div class="rx-ci-lp-advantage-card-head">
                                            <span class="rx-ci-lp-advantage-icon">
                                                <img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt="">
                                            </span>
                                            <h3><?php echo esc_html( $card['title'] ); ?></h3>
                                        </div>
                                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-performance',
                'render' => function () use ( $pillar_images ) {
                    ?>
                    <section class="rx-ci-lp-band rx-ci-lp-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-ci-lp-compare">
                                <figure class="rx-ci-lp-compare-image">
                                    <span class="rx-ci-lp-compare-tag rx-ci-lp-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $pillar_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <span class="rx-ci-lp-compare-divider" aria-hidden="true">
                                    <span class="rx-ci-lp-compare-arrows">&#9664;&#9654;</span>
                                </span>
                                <figure class="rx-ci-lp-compare-image">
                                    <span class="rx-ci-lp-compare-tag rx-ci-lp-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $pillar_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-pillars-help',
                'render' => function () {
                    ?>
                    <section class="rx-ci-lp-help rx-contact-cta" style="<?php echo esc_attr( '--rx-ci-lp-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>
                            <div class="rx-ci-lp-help-grid rx-contact-cta-grid">
                                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" stroke="currentColor" stroke-width="1.6"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-lp-help-link rx-ci-lp-help-link-phone rx-contact-cta-phone" href="tel:1800182020"><?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?></a>
                                </article>
                                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" y="3" width="14" height="18" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M8 7h8M8 11h2m3 0h2m-7 4h2m3 0h2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-lp-help-link rx-contact-cta-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>"><?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); ?></a>
                                </article>
                                <article class="rx-ci-lp-help-card rx-contact-cta-card">
                                    <span class="rx-ci-lp-help-icon rx-contact-cta-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13z" stroke="currentColor" stroke-width="1.6"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13z" stroke="currentColor" stroke-width="1.6"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-lp-help-link rx-contact-cta-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); ?></a>
                                </article>
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
