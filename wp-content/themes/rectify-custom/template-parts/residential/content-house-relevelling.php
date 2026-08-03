<?php
/**
 * House Relevelling page content template (Figma node 819:13359).
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$relevel_images = array(
    'intro'      => rx_asset_url( 'images/house-relevelling/intro-house-relevelling.jpg' ),
    'before'     => rx_asset_url( 'images/house-relevelling/before.jpg' ),
    'after'      => rx_asset_url( 'images/house-relevelling/after.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/house-relevelling/reactive-clay-soils.jpg',
        'title' => 'Reactive Clay Soils',
        'copy'  => 'Reactive clay expands during wet weather and contracts during dry periods. This continual movement places stress on foundations and can cause sections of the home to settle unevenly.',
    ),
    array(
        'image' => 'images/house-relevelling/poor-soil-compaction.jpg',
        'title' => 'Poor Soil Compaction',
        'copy'  => 'If the fill beneath the foundations was not properly compacted during construction, it may continue to compress over time, resulting in gradual settlement.',
    ),
    array(
        'image' => 'images/house-relevelling/underground-water-leaks.jpg',
        'title' => 'Underground Water Leaks',
        'copy'  => 'Leaking plumbing, damaged stormwater systems or poor drainage can soften supporting soils and reduce their load-bearing capacity.',
    ),
    array(
        'image' => 'images/house-relevelling/erosion.jpg',
        'title' => 'Erosion',
        'copy'  => 'Groundwater movement and poor surface drainage may gradually wash away supporting soils beneath the foundation, creating voids and uneven settlement.',
    ),
    array(
        'image' => 'images/house-relevelling/tree-root-activity.jpg',
        'title' => 'Tree Root Activity',
        'copy'  => 'Large trees can remove moisture from surrounding soils, particularly reactive clays, causing shrinkage and differential movement beneath foundations.',
    ),
    array(
        'image' => 'images/house-relevelling/natural-foundation-settlement.jpg',
        'title' => 'Natural Foundation Settlement',
        'copy'  => 'Older homes often experience gradual settlement over time. While some movement is expected, excessive or ongoing settlement should be professionally assessed to determine whether remediation is required.',
    ),
);

$process_steps = array(
    array(
        'number' => '01',
        'title'  => 'Precision Drilling',
        'copy'   => 'Our skilled team begins by carefully drilling small, strategically placed holes around the affected area of your foundation. This step is done with precision to ensure minimal impact on your property while preparing for the underpinning process.',
    ),
    array(
        'number' => '02',
        'title'  => 'Advanced Resin Injection',
        'copy'   => 'We then select the appropriate site specific engineered polyurethane resin and inject through tubes that have been inserted at required depth through the drilled holes. This resin is carefully monitored as it expands, allowing us to precisely control the lift and ensure the process is executed with accuracy.',
    ),
    array(
        'number' => '03',
        'title'  => 'Ground Improvement',
        'copy'   => "Our engineered resin serves a dual purpose: it initially fills any underground voids and then starts compacting the soil improving the ground's bearing capacity. This proven solution ensures a comprehensive treatment of the subsidence issue, addressing both the cause and the symptom.",
    ),
    array(
        'number' => '04',
        'title'  => 'Controlled Level Improvement',
        'copy'   => "The final step sees your building levels improved. Our experienced team ensures that the most practicable adjustment is made with due diligence, guaranteeing that your home's foundation is not only stabilised but also prepared to stand firm against future subsidence.",
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

$process_columns = array_chunk( $process_steps, 2 );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-cracked-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-relevel-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'House Relevelling Melbourne & South Australia', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'House Relevelling', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-relevel-intro',
                'render' => function () use ( $relevel_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( "Restore Your Home's Level and Stability with Engineered House Relevelling Solutions", 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'If your floors have become uneven, doors no longer close properly, or cracks continue to appear in your walls, your home may be experiencing foundation movement. These issues often develop gradually as the ground beneath the property settles, shifts, or loses its ability to adequately support the structure.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we specialise in house relevelling solutions for homes across Melbourne, Victoria, and South Australia. Our experienced ground engineering team identifies the underlying cause of movement before recommending an engineered solution designed to restore stability, improve foundation support, and minimise future settlement.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Unlike cosmetic repairs that only hide the symptoms, our approach focuses on stabilising the ground beneath your home to help protect its long-term structural integrity.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $relevel_images['intro'] ); ?>" alt="<?php esc_attr_e( 'Laser level and ladder set up inside a home during a house relevelling assessment', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-relevel-causes-heading',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'What Causes a House to Become Uneven?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'Most homes do not suddenly become out of level. Foundation movement typically develops over many years due to changing ground conditions.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-relevel-causes',
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
                'key'    => 'residential-relevel-process',
                'render' => function () use ( $process_columns ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft rx-cracked-process">
                        <div class="rx-wrap">
                            <div class="rx-cracked-process-head">
                                <h2><?php esc_html_e( 'How We Re-level Your House In 4 Simple Steps', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Our method involves a series of steps designed to ensure the safety, stability, and longevity of your home, with a focus on our trusted chemical underpinning services.', 'rectify-custom' ); ?></p>
                            </div>
                            <div class="rx-cracked-process-grid">
                                <?php foreach ( $process_columns as $column ) : ?>
                                    <div class="rx-cracked-process-col">
                                        <?php foreach ( $column as $step ) : ?>
                                            <article class="rx-cracked-process-step">
                                                <span class="rx-cracked-process-number"><?php echo esc_html( $step['number'] ); ?></span>
                                                <div>
                                                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                                                    <p><?php echo esc_html( $step['copy'] ); ?></p>
                                                </div>
                                            </article>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-relevel-advantage',
                'render' => function () use ( $relevel_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $relevel_images['contours'] ) . ');' ); ?>">
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
                'key'    => 'residential-relevel-performance',
                'render' => function () use ( $relevel_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-cracked-compare">
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $relevel_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before house relevelling remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <span class="rx-cracked-compare-divider" aria-hidden="true">
                                    <span class="rx-cracked-compare-arrows">&#9664;&#9654;</span>
                                </span>
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $relevel_images['after'] ); ?>" alt="<?php esc_attr_e( 'After house relevelling remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-relevel-help',
                'render' => function () use ( $relevel_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $relevel_images['contours'] ) . ');' ); ?>">
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
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
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
