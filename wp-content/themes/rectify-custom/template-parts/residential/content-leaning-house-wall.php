<?php
/**
 * Leaning House Wall page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$wall_images = array(
    'hero'     => rx_asset_url( 'images/leaning-house-wall/intro-image.png' ),
    'matters'  => rx_asset_url( 'images/leaning-house-wall/why-matters-image.jpg' ),
    'before'   => rx_asset_url( 'images/leaning-house-wall/before-image.png' ),
    'after'    => rx_asset_url( 'images/leaning-house-wall/after-image.png' ),
    'contours' => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/leaning-house-wall/foundation-settlement.png',
        'title' => 'Foundation Settlement',
        'copy'  => "Foundation settlement occurs when the soil beneath a building compresses or loses its ability to support the structure evenly. As one section of the foundation settles more than another, the building can shift, causing walls to lean, crack, or move out of alignment.\n\nSettlement may develop gradually over many years or occur more rapidly following changes in ground conditions. Early assessment can help determine whether the movement is ongoing and whether foundation stabilisation is required.",
    ),
    array(
        'image' => 'images/leaning-house-wall/reactive-clay-soils.png',
        'title' => 'Reactive Clay Soils',
        'copy'  => "Reactive clay soils are common throughout many parts of Australia and naturally expand when they absorb moisture and shrink during dry conditions. These repeated cycles of expansion and contraction create movement beneath foundations.\n\nAs the ground shifts unevenly, different sections of the building may rise or settle at different rates, placing stress on walls and potentially causing them to lean or crack. Reactive soils are one of the leading causes of residential structural movement.",
    ),
    array(
        'image' => 'images/leaning-house-wall/subsidence.png',
        'title' => 'Subsidence',
        'copy'  => "Subsidence is the downward movement of the ground beneath a building caused by weakening or loss of soil support. As the ground sinks, foundations may also move, allowing walls to lean or become misaligned.\n\nIn addition to leaning walls, subsidence may cause cracked brickwork, sticking doors and windows, uneven floors, and gaps around window or door frames. A professional assessment is essential to determine the extent of the movement and the most suitable remediation method.",
    ),
    array(
        'image' => 'images/leaning-house-wall/poor-soil-compaction.jpg',
        'title' => 'Poor Soil Compaction',
        'copy'  => "Buildings rely on properly compacted soil to provide long-term support. If fill material beneath the foundations was not adequately compacted during construction, it can continue to compress over time.\n\nAs the supporting ground settles unevenly, foundations may shift, creating structural stress that can cause walls to lean, crack, or move out of alignment. Ground improvement techniques can help restore support beneath affected areas.",
    ),
    array(
        'image' => 'images/leaning-house-wall/erosion.png',
        'title' => 'Erosion',
        'copy'  => "Erosion gradually removes or weakens the soil supporting a building's foundations. Heavy rainfall, groundwater movement, poor surface drainage, or damaged stormwater systems can all contribute to the loss of supporting ground.\n\nAs erosion creates voids or reduces soil strength, parts of the foundation may settle unevenly, leading to leaning walls and other signs of structural movement. Rectify provides advanced ground improvement and erosion remediation solutions designed to restore stability with minimal disruption.",
    ),
    array(
        'image' => 'images/leaning-house-wall/drainage-issues.jpg',
        'title' => 'Drainage Issues',
        'copy'  => "Poor drainage around a property can have a significant impact on foundation performance. Water pooling near foundations or flowing beneath the building can alter soil moisture levels, weaken supporting ground, or contribute to erosion.\n\nThese changing ground conditions may result in uneven foundation movement, increasing the risk of leaning walls, wall cracks, and floor settlement. Maintaining effective drainage helps protect the long-term stability of the structure.",
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-cracked-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-leaning-walls-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Leaning House Wall Repair in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Leaning House Walls', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-leaning-walls-intro',
                'render' => function () use ( $wall_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Restore structural stability with advanced foundation repair & ground stabilisation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'A leaning house wall is one of the clearest signs that your property may be experiencing structural movement. While some walls may appear to lean gradually over many years, others can shift more rapidly due to changing ground conditions, foundation settlement or soil movement.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'In many cases, a leaning wall is not the problem itself—it is a symptom of movement occurring beneath the foundations. As supporting soils expand, shrink or lose strength, foundations can settle unevenly, causing external and internal walls to move out of alignment.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we specialise in identifying the underlying cause of leaning walls before recommending the most appropriate repair solution. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property, helping restore stability with minimal disruption compared to traditional excavation methods.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $wall_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Rectify technician propping a leaning house wall', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-leaning-walls-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why Is My House Wall Leaning?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'A leaning wall is often a sign that the structure beneath your home has shifted. While some walls may appear slightly out of alignment due to age or construction tolerances, a wall that is visibly leaning, bowing, or moving out of plumb should be professionally assessed.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'In many cases, the problem does not originate in the wall itself but in the ground supporting the building. Changes in soil conditions, foundation movement, or loss of ground support can place uneven pressure on the structure, causing walls to lean over time. At Rectify, we focus on identifying the underlying cause before recommending the most appropriate repair solution.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-leaning-walls-causes',
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
                                        <?php foreach ( explode( "\n\n", $cause['copy'] ) as $paragraph ) : ?>
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
                'key'    => 'residential-leaning-walls-matters',
                'render' => function () use ( $wall_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <figure class="rx-cracked-matters-media">
                                <img src="<?php echo esc_url( $wall_images['matters'] ); ?>" alt="<?php esc_attr_e( 'Rectify specialists inspecting a leaning house wall', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'Why Identifying the Cause Matters', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Identifying the cause of the movement is essential before any cosmetic repairs are carried out, as repairing the visible damage alone often allows the problem to return.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we begin by investigating the underlying cause of structural movement before recommending a solution. Where unstable ground or foundation movement is identified, advanced techniques such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can restore support beneath the structure. By addressing the root cause rather than simply repairing the symptoms, we help provide a more reliable, long-term solution for homes, commercial buildings, and infrastructure.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-leaning-walls-advantage',
                'render' => function () use ( $wall_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $wall_images['contours'] ) . ');' ); ?>">
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
                'key'    => 'residential-leaning-walls-performance',
                'render' => function () use ( $wall_images ) {
                    ?>
                    <section class="rx-performance">
                        <div class="rx-wrap rx-reveal">
                            <h2 class="rx-title"><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p class="rx-lead"><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-compare">
                                <div class="rx-slider">
                                    <div class="slider-container">
                                        <div class="slider">
                                            <div class="rx-slider-slide slider-image slider-image-before is-active">
                                                <img src="<?php echo esc_url( $wall_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                            </div>
                                            <div class="rx-slider-slide">
                                                <img src="<?php echo esc_url( $wall_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                            </div>
                                        </div>
                                        <button class="rx-slider-control rx-slider-prev" type="button" aria-label="<?php esc_attr_e( 'Previous image', 'rectify-custom' ); ?>"></button>
                                        <button class="rx-slider-control rx-slider-next" type="button" aria-label="<?php esc_attr_e( 'Next image', 'rectify-custom' ); ?>"></button>
                                        <div class="slider-handle"></div>
                                    </div>
                                    <span class="rx-slider-dot" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-leaning-walls-help',
                'render' => function () use ( $wall_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $wall_images['contours'] ) . ');' ); ?>">
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
