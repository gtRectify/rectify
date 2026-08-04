<?php
/**
 * Jammed Doors & Sticking Windows page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$doors_images = array(
    'hero'       => rx_asset_url( 'images/jammed-doors-windows/hero-intro.jpg' ),
    'why_matter' => rx_asset_url( 'images/jammed-doors-windows/when-should-you-be-concerned.jpg' ),
    'before'     => rx_asset_url( 'images/jammed-doors-windows/before-after-1.jpg' ),
    'after'      => rx_asset_url( 'images/jammed-doors-windows/before-after-2.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/jammed-doors-windows/foundation-settlement.jpg',
        'title' => 'Foundation Settlement',
        'copy'  => array(
            'Foundation settlement occurs when the soil beneath a building compresses or loses its ability to support the structure evenly. As different sections of the foundation settle at varying rates, the building may shift slightly, causing door and window frames to become misaligned.',
            'This movement often results in doors that drag on the floor, windows that no longer open smoothly, or frames that no longer close properly. Settlement may develop gradually or become more noticeable following changes in ground conditions.',
        ),
    ),
    array(
        'image' => 'images/jammed-doors-windows/reactive-clay-soils.jpg',
        'title' => 'Reactive Clay Soils',
        'copy'  => array(
            'Many Australian homes are built on reactive clay soils, which naturally expand when wet and shrink during dry conditions. This continuous cycle causes the ground beneath foundations to move throughout the year.',
            'As foundations rise or settle unevenly, the building frame can shift, making doors and windows difficult to operate. Reactive soils are one of the most common causes of structural movement in residential properties across Australia.',
        ),
    ),
    array(
        'image' => 'images/jammed-doors-windows/seasonal-moisture-changes.jpg',
        'title' => 'Seasonal Moisture Changes',
        'copy'  => array(
            'Extended dry weather followed by periods of heavy rainfall can significantly alter the moisture content of the soil surrounding your home. As the ground dries, it contracts, and when moisture returns, it expands again.',
            'These natural seasonal changes can gradually affect foundation stability, leading to subtle structural movement that causes doors and windows to stick or jam over time.',
        ),
    ),
    array(
        'image' => 'images/jammed-doors-windows/subsidence.jpg',
        'title' => 'Subsidence',
        'copy'  => array(
            'Subsidence occurs when the ground beneath part of a building sinks due to weakened or unstable soil conditions. As the supporting ground moves downward, sections of the foundation may also settle, causing the building to shift.',
            'Even small amounts of subsidence can affect the alignment of doors and windows, making them increasingly difficult to open or close. Subsidence is often accompanied by wall cracks, uneven floors, or visible movement elsewhere in the property.',
        ),
    ),
    array(
        'image' => 'images/jammed-doors-windows/poor-drainage.jpg',
        'title' => 'Poor Drainage',
        'copy'  => array(
            'Poor drainage can allow excessive water to collect around foundations, weakening supporting soils or causing reactive clay to expand. In other situations, inadequate drainage may contribute to erosion or uneven drying of the ground.',
            "Over time, these changing ground conditions can lead to foundation movement, affecting the alignment of doors, windows, walls, and floors. Maintaining effective site drainage is an important part of protecting a property's structural integrity.",
        ),
    ),
    array(
        'image' => 'images/jammed-doors-windows/erosion.jpg',
        'title' => 'Erosion',
        'copy'  => array(
            'Erosion occurs when water gradually removes or weakens the soil supporting foundations. Heavy rainfall, groundwater movement, damaged drainage systems, or long-term water infiltration can all contribute to the loss of supporting material beneath a structure.',
            'As the ground becomes less stable, foundations may begin to settle unevenly, affecting the alignment of doors, windows, walls, and floors. Rectify provides ground improvement and foundation stabilisation solutions designed to restore support while minimising disruption.',
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-cracked-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-doors-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Jammed Doors & Sticking Windows Repair in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Jammed Doors & Windows', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-doors-intro',
                'render' => function () use ( $doors_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Fix foundation movement causing Doors & Windows to stick without major excavation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( "Doors and windows that suddenly become difficult to open or close are often more than a minor inconvenience. While seasonal temperature and humidity changes can sometimes affect timber frames, persistent sticking, jamming or misalignment may indicate movement beneath your home's foundations.", 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'As the supporting ground shifts, foundations can settle unevenly, causing the structure to move. Even small amounts of foundation movement can place stress on door and window openings, resulting in sticking doors, windows that no longer slide smoothly, visible gaps around frames, or locks that no longer align correctly.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we identify the root cause of structural movement using advanced assessment techniques before recommending engineered solutions such as chemical underpinning, polyurethane resin injection and ground stabilisation. Rather than simply adjusting the door or window, our goal is to restore stability to the foundation and help prevent future movement.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $doors_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Door frame affected by foundation movement', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-doors-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why Are My Doors or Windows Suddenly Sticking?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'Doors and windows that suddenly become difficult to open or close are often more than just an inconvenience—they can be an early warning sign of foundation movement. As the ground beneath a building shifts, the structure can move slightly out of alignment, causing door and window frames to twist or become distorted.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( "While changes in temperature and humidity can occasionally affect timber doors and windows, persistent sticking or jamming—especially when combined with wall cracks or uneven floors—may indicate that the building's foundations are moving. At Rectify, identifying the underlying cause is the first step in recommending the most appropriate repair solution.", 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-doors-causes',
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
                'key'    => 'residential-doors-matters',
                'render' => function () use ( $doors_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <figure class="rx-cracked-matters-media">
                                <img src="<?php echo esc_url( $doors_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Gap forming around a window frame', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'When should you be concerned?', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( "While some sticking doors are caused by humidity, seasonal timber expansion, or worn hardware, doors and windows that suddenly jam together with wall cracks or uneven floors often indicate movement within the building's foundations.", 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we investigate the underlying cause of structural movement before recommending repairs. Where foundation instability is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can help restore support beneath the building. By addressing the source of the problem rather than just the symptoms, we help provide a more durable and long-lasting solution for your property.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-doors-advantage',
                'render' => function () use ( $doors_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $doors_images['contours'] ) . ');' ); ?>">
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
                'key'    => 'residential-doors-performance',
                'render' => function () use ( $doors_images ) {
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
                                                <img src="<?php echo esc_url( $doors_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                            </div>
                                            <div class="rx-slider-slide">
                                                <img src="<?php echo esc_url( $doors_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
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
                'key'    => 'residential-doors-help',
                'render' => function () use ( $doors_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $doors_images['contours'] ) . ');' ); ?>">
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
