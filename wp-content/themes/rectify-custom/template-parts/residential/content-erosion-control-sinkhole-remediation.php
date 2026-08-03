<?php
/**
 * Erosion Control & Sinkhole Remediation page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$erosion_images = array(
    'hero'      => rx_asset_url( 'images/erosion-control-sinkhole-remediation/intro-image53.png' ),
    'solutions' => rx_asset_url( 'images/erosion-control-sinkhole-remediation/solutions-image55.png' ),
    'before'    => rx_asset_url( 'images/erosion-control-sinkhole-remediation/before-img3240.jpg' ),
    'after'     => rx_asset_url( 'images/erosion-control-sinkhole-remediation/after-img3254.jpg' ),
    'contours'  => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/erosion-control-sinkhole-remediation/natural-ground-movement.jpg',
        'title' => 'Natural Ground Movement',
        'copy'  => 'Natural soil movement, underground cavities and the dissolution of rock can create hidden voids that eventually collapse into sinkholes.',
    ),
    array(
        'image' => 'images/erosion-control-sinkhole-remediation/water-erosion.png',
        'title' => 'Water Erosion',
        'copy'  => 'Flooding, heavy rainfall, leaking services or poor drainage can wash fine soil particles away, weakening the ground and reducing its load-bearing capacity.',
    ),
    array(
        'image' => 'images/erosion-control-sinkhole-remediation/poorly-compacted-backfill.jpg',
        'title' => 'Poorly Compacted Backfill',
        'copy'  => 'Previously excavated areas or service trenches that have been inadequately compacted may consolidate over time, creating underground air pockets and surface settlement.',
    ),
);

$solutions = array(
    'Soil permeation grouting',
    'Stabilisation of loose sand and weak soils',
    'Sinkhole remediation',
    'Void filling behind concrete structures',
    'High-flow leak cut-off',
    'Underground water flow cut-off',
    'Increased soil bearing capacity',
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-cracked-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-erosion-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Erosion Control & Sinkhole Remediation', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Soil Stabilisation', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-intro',
                'render' => function () use ( $erosion_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Stop Ground Loss Before It Becomes Structural Damage', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Soil erosion, underground voids and sinkholes can develop gradually beneath your property—often without obvious warning. Left untreated, they can undermine foundations, pavements and infrastructure, leading to costly structural damage. Rectify provides engineered ground stabilisation solutions that restore soil support, halt erosion and protect your property with minimal disruption.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $erosion_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Void filling and resin injection ground treatment', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why Erosion & Sinkholes Occur', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <h3 style="color:#fff;font-size:24px;line-height:30px;margin-bottom:12px;"><?php esc_html_e( 'Ground Instability Starts Below the Surface', 'rectify-custom' ); ?></h3>
                                <p><?php esc_html_e( 'Sinkholes and underground voids can develop through both natural ground conditions and human activity. As soil is displaced or loses its strength, the ground can no longer adequately support structures above, leading to settlement, cracking and structural movement.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-causes',
                'render' => function () use ( $causes ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-causes rx-cracked-causes--photo">
                        <div class="rx-wrap">
                            <div class="rx-cracked-causes-grid">
                                <?php foreach ( $causes as $cause ) : ?>
                                    <article class="rx-cracked-cause-card rx-cracked-cause-card--photo">
                                        <figure class="rx-cracked-cause-photo">
                                            <img src="<?php echo esc_url( rx_asset_url( $cause['image'] ) ); ?>" alt="<?php echo esc_attr( $cause['title'] ); ?>">
                                        </figure>
                                        <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                                        <p><?php echo esc_html( $cause['copy'] ); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-solutions',
                'render' => function () use ( $erosion_images, $solutions ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'Restore Ground Stability Without Major Excavation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Rectify uses patented ultra-low viscosity polyurethane resin injection to treat unstable ground with minimal disruption. Our engineered approach fills underground voids, consolidates loose soils and improves ground bearing capacity without extensive excavation or reconstruction.', 'rectify-custom' ); ?></p>
                                <figure class="rx-cracked-intro-media" style="margin-top:24px;">
                                    <img src="<?php echo esc_url( $erosion_images['solutions'] ); ?>" alt="<?php esc_attr_e( 'Ground stabilisation works alongside a retaining wall', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                            <div class="rx-cracked-matters-copy">
                                <h3 style="font-size:24px;line-height:30px;margin-bottom:20px;"><?php esc_html_e( 'Our Solutions Include', 'rectify-custom' ); ?></h3>
                                <ul class="rx-driveway-arrow-list">
                                    <?php foreach ( $solutions as $solution ) : ?>
                                        <li><?php echo esc_html( $solution ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <h3 style="font-size:24px;line-height:30px;margin:24px 0 12px;"><?php esc_html_e( 'Soil Stablisation: Resilience Through Resin', 'rectify-custom' ); ?></h3>
                                <p><?php esc_html_e( 'Using patented ultra-low viscosity polyurethane resins, voids can be filled, soil consolidated, erosion halted and soil bearing improved.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Permeation Grouting using Polyurethane can ensure stabilisation, consolidation and binding of soils. Through permeation injection of polyurethane resin in a gridded/sequenced pattern creates a solid mass of soil and rigid resin (ideal for silty and sandy soils).', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'The displacement of water and the resulting solid soil/resin mass reverses the erosion process and improves soil stability and soil bearing capacity.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-advantage',
                'render' => function () use ( $erosion_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $erosion_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <div class="rx-cracked-advantage-head">
                                <div>
                                    <span class="rx-kicker"><?php esc_html_e( 'OUR ADVANTAGE', 'rectify-custom' ); ?></span>
                                    <h2><?php esc_html_e( 'Why Homeowners Choose Rectify', 'rectify-custom' ); ?></h2>
                                </div>
                                <p><?php esc_html_e( 'At Rectify, we don\'t just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.', 'rectify-custom' ); ?></p>
                            </div>
                            <div class="rx-cracked-advantage-grid">
                                <?php foreach ( $advantage_cards as $card ) : ?>
                                    <article class="rx-cracked-advantage-card">
                                        <div class="rx-cracked-advantage-card-head">
                                            <span class="rx-cracked-advantage-icon">
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
                'key'    => 'residential-erosion-performance',
                'render' => function () use ( $erosion_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-cracked-compare">
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $erosion_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <span class="rx-cracked-compare-divider" aria-hidden="true">
                                    <span class="rx-cracked-compare-arrows">&#9664;&#9654;</span>
                                </span>
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $erosion_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-erosion-help',
                'render' => function () use ( $erosion_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $erosion_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>
                            <div class="rx-cracked-help-grid">
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" stroke="currentColor" stroke-width="1.6"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link rx-cracked-help-link-phone" href="tel:1800182020"><?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?></a>
                                </article>
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" y="3" width="14" height="18" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M8 7h8M8 11h2m3 0h2m-7 4h2m3 0h2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>"><?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); ?></a>
                                </article>
                                <article class="rx-cracked-help-card">
                                    <span class="rx-cracked-help-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13z" stroke="currentColor" stroke-width="1.6"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13z" stroke="currentColor" stroke-width="1.6"/></svg>
                                    </span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real case studies and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-cracked-help-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); ?></a>
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
