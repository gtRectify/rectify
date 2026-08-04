<?php
/**
 * Open & Uneven Control Joints page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$joint_images = array(
    'hero'       => rx_asset_url( 'images/open-uneven-control-joints/intro-control-joint.jpg' ),
    'why_matter' => rx_asset_url( 'images/open-uneven-control-joints/concerned-control-joint.jpg' ),
    'before'     => rx_asset_url( 'images/open-uneven-control-joints/before-control-joint.jpg' ),
    'after'      => rx_asset_url( 'images/open-uneven-control-joints/after-control-joint.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/open-uneven-control-joints/seasonal-moisture.jpg',
        'title' => 'Seasonal Moisture Variation',
        'copy'  => array(
            'Seasonal changes in rainfall and temperature can significantly affect the moisture content of the soil beneath a building. During prolonged dry periods, soil may contract, while heavy rainfall can cause it to expand or soften.',
            'These natural cycles of movement can result in repeated foundation movement, causing control joints to gradually widen over time. Monitoring changes in articulation joints between seasons can help identify ongoing structural movement.',
        ),
    ),
    array(
        'image' => 'images/open-uneven-control-joints/poor-soil-compaction.jpg',
        'title' => 'Poor Soil Compaction',
        'copy'  => array(
            'If the soil or fill material beneath a home was not adequately compacted during construction, it can continue to compress or shift over time, reducing the support available to the footings above.',
            'As the ground gradually consolidates, differential foundation movement can occur, causing articulation joints to widen or become uneven. An engineering assessment can identify whether poorly compacted ground is contributing to the movement.',
        ),
    ),
    array(
        'image' => 'images/open-uneven-control-joints/underground-water-leaks.jpg',
        'title' => 'Underground Water Leaks',
        'copy'  => array(
            'Leaking water pipes, damaged stormwater systems, or underground plumbing failures can introduce excess moisture beneath foundations. This may weaken the supporting soil, wash away fine particles, or create underground voids.',
            'As the ground loses strength, differential foundation movement may occur, causing articulation joints to widen and structural cracks to develop. Repairing the source of the leak is an important part of preventing further movement.',
        ),
    ),
    array(
        'image' => 'images/open-uneven-control-joints/erosion.jpg',
        'title' => 'Erosion',
        'copy'  => array(
            'Erosion occurs when flowing water gradually removes or weakens the soil supporting a building\'s foundations. Poor drainage, heavy rainfall, groundwater movement, or damaged drainage systems can all contribute to the loss of supporting ground.',
            'As erosion progresses, foundations may settle unevenly, resulting in widening control joints, cracking, and other signs of structural movement. Rectify provides advanced ground improvement and erosion remediation solutions designed to restore support while minimising disruption.',
        ),
    ),
    array(
        'image' => 'images/open-uneven-control-joints/ageing-foundations.jpg',
        'title' => 'Ageing Foundations',
        'copy'  => array(
            'Over time, buildings naturally experience decades of seasonal movement, environmental exposure, and gradual settlement. While many older foundations remain structurally sound, changing soil conditions and ageing infrastructure can make them more susceptible to movement.',
            'When combined with other contributing factors, ageing foundations may result in articulation joints gradually opening beyond their original design tolerance. An engineering assessment can determine whether the movement is historical or ongoing.',
        ),
    ),
    array(
        'image' => 'images/open-uneven-control-joints/poor-drainage.jpg',
        'title' => 'Poor Drainage',
        'copy'  => array(
            'Poor drainage can allow excessive water to collect around foundations, weakening supporting soils or causing reactive clay to expand. In other situations, inadequate drainage may contribute to erosion or uneven drying of the ground.',
            'Over time, these changing ground conditions can lead to foundation movement, affecting the alignment of doors, windows, walls, and floors. Maintaining effective site drainage is an important part of protecting a property\'s structural integrity.',
        ),
    ),
);

$advantage_cards = array(
    array(
        'icon'  => 'Rectify Icon prof.svg',
        'title' => 'Unrivalled Experience',
        'copy'  => 'We have a team of qualified structural engineers, geologists, project managers, supervisors and technicians with highest level of expertise and training.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Engineered Fill.svg',
        'title' => 'Cutting-Edge Technology',
        'copy'  => 'We invest in the latest technology, equipment and materials, constantly reviewing latest developments from around the world.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Corrective Method.svg',
        'title' => 'Seamless Delivery',
        'copy'  => 'Our non-invasive technique ensures you do not vacate your home or business, enabling continuity of use.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
        'title' => 'Affordable Solutions',
        'copy'  => 'We ensure the solutions provided are affordable and competitive when compared to other similar companies.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Certifications and Compliance.svg',
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
                'key'    => 'residential-joints-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Open & Uneven Control Joint Repair in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Open Uneven Control Joints', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-joints-intro',
                'render' => function () use ( $joint_images ) {
                    ?>
                    <section class="rx-cracked-band">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Repair Foundation Movement Affecting Brick Articulation Joints Without Major Excavation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Control joints (also known as articulation joints) are intentionally built into brickwork to allow buildings to expand, contract and move slightly with seasonal temperature and moisture changes. However, when these joints become noticeably wider, uneven or misaligned, they may be signalling movement beneath your home\'s foundations rather than normal building movement.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we specialise in identifying whether open or uneven control joints are performing as intended or whether they indicate foundation settlement, subsidence or soil movement. Using advanced chemical underpinning, polyurethane resin injection and ground stabilisation techniques, we strengthen the supporting ground beneath your property to help prevent ongoing structural movement with minimal excavation and disruption.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $joint_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Uneven control joint on a brick wall', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-joints-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why Are My Control Joints Opening?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'Control joints, also known as articulation joints or expansion joints, are designed to accommodate small amounts of normal building movement caused by temperature changes, material expansion, and minor foundation settlement. However, if these joints become noticeably wider, uneven, or continue to open over time, they may indicate movement occurring beneath the building rather than normal structural behaviour.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'In many cases, widening control joints are a symptom of foundation movement caused by changing ground conditions. Identifying the underlying cause is essential to determine whether the movement is within expected limits or whether foundation remediation is required. At Rectify, we investigate the source of the movement before recommending the most appropriate solution.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-joints-causes',
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
                'key'    => 'residential-joints-matters',
                'render' => function () use ( $joint_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft rx-cracked-band--flip">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <figure class="rx-cracked-matters-media">
                                <img src="<?php echo esc_url( $joint_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Widening control joint on a brick wall', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'When Should You Be Concerned?', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'While articulation joints are designed to accommodate movement, excessive widening or uneven alignment often indicates that the supporting foundations are moving beyond their intended tolerance.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we begin by identifying the cause of the movement before recommending any repairs. Where foundation instability is identified, advanced solutions such as polyurethane resin injection, chemical underpinning, ground improvement, and foundation stabilisation can improve ground support and help minimise further structural movement. By addressing the source of the problem rather than simply repairing the visible symptoms, we provide long-term solutions for residential, commercial, industrial, and infrastructure assets.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-joints-advantage',
                'render' => function () use ( $joint_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $joint_images['contours'] ) . ');' ); ?>">
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
                                        <span class="rx-cracked-card-icon">
                                            <img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt="">
                                        </span>
                                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
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
                'key'    => 'residential-joints-performance',
                'render' => function () use ( $joint_images ) {
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
                                                <img src="<?php echo esc_url( $joint_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                            </div>
                                            <div class="rx-slider-slide">
                                                <img src="<?php echo esc_url( $joint_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
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
                'key'    => 'residential-joints-help',
                'render' => function () use ( $joint_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $joint_images['contours'] ) . ');' ); ?>">
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
