<?php
/**
 * Sinking Floor & Concrete Slab Repair page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$slab_images = array(
    'hero'       => rx_asset_url( 'images/sloping-slab/intro-tiles.webp' ),
    'why_matter' => rx_asset_url( 'images/sloping-slab/ground-essential.webp' ),
    'before'     => rx_asset_url( 'images/sloping-slab/before.webp' ),
    'after'      => rx_asset_url( 'images/sloping-slab/after.webp' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/sloping-slab/foundation-settlement.webp',
        'title' => 'Foundation Settlement',
        'copy'  => array(
            'Foundation settlement occurs when the soil beneath your home compresses or loses its ability to adequately support the building. As different areas of the foundation settle at different rates, stress is transferred into the walls, often resulting in cracks around doors, windows, corners, or brickwork.',
            'Settlement can develop gradually over many years or occur more quickly due to changing ground conditions. Early assessment helps determine whether the movement is ongoing and whether foundation stabilisation is required before cosmetic repairs are undertaken.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/subsidence.webp',
        'title' => 'Subsidence',
        'copy'  => array(
            'Subsidence is the downward movement of the ground beneath a property. Unlike normal settlement, subsidence usually occurs when the supporting soil weakens or shifts, causing part of the building to sink.',
            'This movement may lead to uneven floors, wall cracks, sticking doors and windows, and visible changes throughout the structure. Professional assessment is essential to determine the extent of the movement and the most appropriate remediation solution.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/poorly-compacted-fill.webp',
        'title' => 'Poorly Compacted Fill',
        'copy'  => array(
            'If the soil or fill material beneath a building was not properly compacted during construction, it can continue to compress after the home is built. As the fill settles, gaps may develop beneath slabs and foundations, reducing their support.',
            'This gradual movement can cause floors to sink, become uneven, or feel unstable underfoot. Proper ground stabilisation can restore support beneath affected areas.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/leaking-water-pipes.webp',
        'title' => 'Leaking Water Pipes',
        'copy'  => array(
            'Underground plumbing leaks, damaged stormwater pipes, or leaking sewer lines can introduce excessive moisture into the surrounding soil. Over time, this may soften the ground, wash away fine soil particles, or create voids beneath the foundation.',
            'As support beneath the floor decreases, sections of the slab may begin to settle, resulting in uneven or sinking floors. Repairing the water source is an important part of achieving a long-term solution.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/drainage-problems.webp',
        'title' => 'Drainage Problems',
        'copy'  => array(
            'Poor drainage around a property can significantly affect soil stability. Water that pools around foundations or flows beneath the building can alter moisture levels, weaken supporting soils, and contribute to erosion.',
            'Over time, these changing ground conditions may lead to differential settlement, where some areas of the floor sink more than others. Maintaining effective site drainage helps reduce the risk of ongoing foundation movement.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/erosion.webp',
        'title' => 'Erosion',
        'copy'  => array(
            'Erosion occurs when flowing water gradually removes or weakens the soil supporting foundations and concrete slabs. This may be caused by heavy rainfall, groundwater movement, damaged drainage systems, or long-term water infiltration.',
            'As supporting material is lost, underground voids can develop, allowing foundations and floors to settle unevenly. Rectify provides advanced ground improvement solutions designed to restore stability and reduce the effects of erosion with minimal disruption.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/underground-voids.webp',
        'title' => 'Underground Voids',
        'copy'  => array(
            'Underground voids are empty spaces that develop beneath concrete slabs or foundations after soil has been displaced, compressed, or washed away. Without adequate support, the concrete above may begin to crack, sink, or move.',
            'Polyurethane resin injection can fill these voids, strengthen the surrounding ground, and help restore support beneath affected slabs without the need for extensive excavation.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/ageing-foundations.webp',
        'title' => 'Ageing Foundations',
        'copy'  => array(
            'As buildings age, decades of natural ground movement and environmental changes can gradually affect the performance of their foundations. Older homes may become more susceptible to settlement, particularly if drainage has deteriorated or soil conditions have changed over time.',
            'While ageing alone does not always result in sinking floors, it can increase the likelihood of foundation movement when combined with other contributing factors. A professional assessment can determine whether remediation is required.',
        ),
    ),
    array(
        'image' => 'images/sloping-slab/seasonal-moisture.webp',
        'title' => 'Seasonal Moisture Changes',
        'copy'  => array(
            'Australia\'s changing weather patterns can significantly influence the moisture content of the soil beneath a property. Extended dry periods may cause soils to shrink, while heavy rainfall can cause them to expand or soften. These seasonal changes are particularly noticeable in reactive clay soils and can lead to repeated cycles of foundation movement.',
            'Over time, this movement may cause floors to become uneven or begin to sink if the underlying ground loses stability.',
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
                'key'    => 'residential-slab-hero',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Sinking floor & Concrete slab repair in Melbourne & Adelaide', 'rectify-custom' ); ?></h1>
                            <nav class="rx-cracked-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Sloping Slab', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-slab-intro',
                'render' => function () use ( $slab_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-band--flip">
                        <div class="rx-wrap rx-cracked-intro-grid">
                            <div class="rx-cracked-intro-copy">
                                <h2><?php esc_html_e( 'Restore uneven floors, sunken concrete slabs & foundation stability without major excavation', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Sinking floors and concrete slabs are often one of the earliest signs that the ground beneath your property is no longer providing adequate support. While a floor may initially develop a slight slope or isolated low spot, continued ground movement can eventually lead to wall cracks, sticking doors and windows, uneven surfaces, and foundation settlement.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we specialise in diagnosing the underlying cause of sinking concrete slabs rather than simply treating the visible symptoms. Using advanced polyurethane resin injection, chemical underpinning and ground stabilisation techniques, we strengthen the supporting soil, fill underground voids and carefully re-level concrete slabs with minimal disruption to your home.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-cracked-intro-media">
                                <img src="<?php echo esc_url( $slab_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Sloping concrete slab and uneven floor tiles', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-slab-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-cracked-whatis">
                        <div class="rx-wrap rx-cracked-whatis-grid">
                            <h2><?php esc_html_e( 'Why are my floors Sinking?', 'rectify-custom' ); ?></h2>
                            <div class="rx-cracked-whatis-copy">
                                <p><?php esc_html_e( 'Sinking or uneven floors are often a sign that the ground beneath your home is no longer providing consistent support. While the floor itself may appear to be the problem, the underlying cause is frequently related to movement in the foundation or changes in the supporting soil.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, we understand that every property is different. That\'s why identifying the source of the movement is the first step in recommending the right repair solution. By addressing the ground beneath the structure rather than just the visible symptoms, long-term stability can often be restored.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-slab-causes',
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
                'key'    => 'residential-slab-matters',
                'render' => function () use ( $slab_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-soft rx-cracked-band--flip">
                        <div class="rx-wrap rx-cracked-matters-grid">
                            <figure class="rx-cracked-matters-media">
                                <img src="<?php echo esc_url( $slab_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Rectify technician preparing a concrete slab for re-levelling', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-cracked-matters-copy">
                                <h2><?php esc_html_e( 'Why addressing the ground is essential', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Repairing the floor without correcting the ground beneath often allows the problem to return.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, our approach focuses on identifying the underlying cause of foundation movement before recommending a solution. Where ground instability is present, advanced techniques such as polyurethane resin injection, chemical underpinning, ground improvement, and slab lifting can stabilise the supporting soil and restore structural performance. By treating the cause rather than simply repairing the visible damage, we help provide a more durable and long-lasting solution for your property.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-slab-advantage',
                'render' => function () use ( $slab_images, $advantage_cards ) {
                    ?>
                    <section class="rx-cracked-advantage" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $slab_images['contours'] ) . ');' ); ?>">
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
                'key'    => 'residential-slab-performance',
                'render' => function () use ( $slab_images ) {
                    ?>
                    <section class="rx-cracked-band rx-cracked-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-cracked-compare">
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $slab_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <span class="rx-cracked-compare-divider" aria-hidden="true">
                                    <span class="rx-cracked-compare-arrows">&#9664;&#9654;</span>
                                </span>
                                <figure class="rx-cracked-compare-image">
                                    <span class="rx-cracked-compare-tag rx-cracked-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $slab_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-slab-help',
                'render' => function () use ( $slab_images ) {
                    ?>
                    <section class="rx-cracked-help" style="<?php echo esc_attr( '--rx-cracked-contours:url(' . esc_url_raw( $slab_images['contours'] ) . ');' ); ?>">
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
