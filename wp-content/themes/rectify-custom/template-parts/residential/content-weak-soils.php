<?php
/**
 * Weak Soils / Soil Stabilisation page content template.
 *
 * Matches Figma node 748:13238 ("Weak Soils"). Content is rendered by the
 * Rectify Page Builder and all page-specific presentation is scoped under
 * the .rx-ci-ws-page wrapper in assets/css/commercial-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$soil_images = array(
    'hero'       => rx_asset_url( 'images/weak-soils/intro-image53.png' ),
    'why_matter' => rx_asset_url( 'images/weak-soils/matters-image54.png' ),
    'before'     => rx_asset_url( 'images/weak-soils/before-img2903.jpg' ),
    'after'      => rx_asset_url( 'images/weak-soils/after-img2900.jpg' ),
    'contours'   => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
    array(
        'image' => 'images/weak-soils/seasonal-moisture.png',
        'title' => 'Seasonal Moisture Changes',
        'copy'  => 'Changes in seasonal weather can have a significant impact on the ground beneath your home. Extended dry conditions may cause certain soil types, particularly reactive clays, to shrink, while periods of heavy rainfall can increase soil moisture, leading to expansion or a reduction in soil strength.',
    ),
    array(
        'image' => 'images/weak-soils/inadequate-soil-compaction.jpg',
        'title' => 'Inadequate Soil Compaction',
        'copy'  => 'A building\'s long-term performance depends on the stability of the ground supporting its foundations. If the soil or fill material beneath the structure was not compacted correctly during construction, it may continue to settle long after the building has been completed.',
    ),
    array(
        'image' => 'images/weak-soils/underground-water-leaks.jpg',
        'title' => 'Underground Water Leaks',
        'copy'  => 'Hidden leaks beneath a property can gradually weaken the supporting soil without being immediately visible. Damaged water pipes, leaking stormwater systems, or underground plumbing failures can introduce excess moisture into the ground, reducing its load-bearing capacity and, in some cases, creating underground voids.',
    ),
    array(
        'image' => 'images/weak-soils/erosion.png',
        'title' => 'Erosion Beneath Foundations',
        'copy'  => 'Erosion occurs when water gradually removes or weakens the soil supporting a building\'s foundations. Poor site drainage, prolonged rainfall, groundwater movement, or damaged drainage infrastructure can all contribute to the gradual loss of supporting material.',
    ),
    array(
        'image' => 'images/weak-soils/ageing-foundations.jpg',
        'title' => 'Ageing Foundations',
        'copy'  => 'Many buildings naturally experience gradual settlement over decades of service. While older foundations often remain structurally sound, years of environmental exposure, seasonal ground movement, and changing soil conditions can make them more susceptible to differential settlement.',
    ),
    array(
        'image' => 'images/weak-soils/underground-voids.jpg',
        'title' => 'Underground Voids',
        'copy'  => array(
            'Underground voids are empty spaces that develop beneath concrete slabs or foundations after soil has been displaced, compressed, or washed away. Without adequate support, the concrete above may begin to crack, sink, or move.',
            'Polyurethane resin injection can fill these voids, strengthen the surrounding ground, and help restore support beneath affected slabs without the need for extensive excavation.',
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-ci-ws-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'residential-soil-hero',
                'render' => function () {
                    ?>
                    <section class="rx-ci-ws-hero">
                        <div class="rx-wrap">
                            <span class="rx-kicker"><?php esc_html_e( 'WHAT WE RECTIFY', 'rectify-custom' ); ?></span>
                            <h1><?php esc_html_e( 'Soil Stabilisation Melbourne & South Australia', 'rectify-custom' ); ?></h1>
                            <nav class="rx-ci-ws-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">&gt;</span>
                                <a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">&gt;</span>
                                <span><?php esc_html_e( 'Soil Stabilisation', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-intro',
                'render' => function () use ( $soil_images ) {
                    ?>
                    <section class="rx-ci-ws-band">
                        <div class="rx-wrap rx-ci-ws-intro-grid">
                            <div class="rx-ci-ws-intro-copy">
                                <h2><?php esc_html_e( 'Strengthen Weak Ground with Engineered Soil Stabilisation Solutions', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Weak or unstable soil can lead to foundation settlement, wall cracks, uneven floors, sinking concrete slabs, and ongoing structural movement. At Rectify, we provide advanced soil stabilisation solutions that improve ground strength beneath residential properties across Melbourne, Victoria, and South Australia.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Using innovative ground improvement technologies and engineered methodologies, our team stabilises weak soils with minimal disruption, helping protect your home\'s structural integrity for the long term.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Whether you\'re experiencing early signs of foundation movement or require a proactive ground improvement solution, Rectify delivers tailored recommendations based on your property\'s unique ground conditions.', 'rectify-custom' ); ?></p>
                            </div>
                            <figure class="rx-ci-ws-intro-media">
                                <img src="<?php echo esc_url( $soil_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Ground engineering equipment stabilising weak soil on site', 'rectify-custom' ); ?>">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-whatis',
                'render' => function () {
                    ?>
                    <section class="rx-ci-ws-whatis">
                        <div class="rx-wrap rx-ci-ws-whatis-grid">
                            <h2><?php esc_html_e( 'What Is Soil Stabilisation?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Soil stabilisation is an engineered process used to strengthen weak or unstable ground so it can safely support buildings, slabs, footings, and foundations.', 'rectify-custom' ); ?><br><br><?php esc_html_e( 'Rather than simply repairing visible structural damage, soil stabilisation addresses the underlying cause by improving the engineering properties of the soil beneath the structure.', 'rectify-custom' ); ?></p>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-causes',
                'render' => function () use ( $causes ) {
                    ?>
                    <section class="rx-ci-ws-band rx-ci-ws-causes">
                        <div class="rx-wrap">
                            <div class="rx-ci-ws-causes-grid">
                                <?php foreach ( $causes as $cause ) : ?>
                                    <article class="rx-ci-ws-cause-card">
                                        <figure class="rx-ci-ws-cause-photo">
                                            <img src="<?php echo esc_url( rx_asset_url( $cause['image'] ) ); ?>" alt="<?php echo esc_attr( $cause['title'] ); ?>">
                                        </figure>
                                        <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                                        <?php if ( is_array( $cause['copy'] ) ) : ?>
                                            <?php foreach ( $cause['copy'] as $paragraph ) : ?>
                                                <p><?php echo esc_html( $paragraph ); ?></p>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p><?php echo esc_html( $cause['copy'] ); ?></p>
                                        <?php endif; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-matters',
                'render' => function () use ( $soil_images ) {
                    ?>
                    <section class="rx-ci-ws-band rx-ci-ws-soft">
                        <div class="rx-wrap rx-ci-ws-matters-grid">
                            <figure class="rx-ci-ws-matters-media">
                                <img src="<?php echo esc_url( $soil_images['why_matter'] ); ?>" alt="<?php esc_attr_e( 'Eroded ground beneath a coastal path requiring assessment', 'rectify-custom' ); ?>">
                            </figure>
                            <div class="rx-ci-ws-matters-copy">
                                <h2><?php esc_html_e( 'Why Professional Assessment Is Important', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Open or widening articulation joints are often a symptom of movement beneath the structure rather than the root cause of the problem. A detailed site inspection can identify whether soil conditions, moisture variations, erosion, inadequate compaction, or foundation settlement are contributing to the movement.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'At Rectify, our experienced ground engineering specialists assess the underlying cause of foundation movement and recommend tailored remediation solutions, including soil stabilisation, ground improvement, chemical underpinning, and foundation repair. By addressing the source of the problem—not just the visible symptoms—we help homeowners achieve long-term structural stability across Melbourne, Victoria, and South Australia.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-advantage',
                'render' => function () use ( $soil_images, $advantage_cards ) {
                    ?>
                    <section class="rx-ci-ws-advantage" style="<?php echo esc_attr( '--rx-ci-ws-contours:url(' . esc_url_raw( $soil_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <div class="rx-ci-ws-advantage-head">
                                <div>
                                    <span class="rx-kicker"><?php esc_html_e( 'OUR ADVANTAGE', 'rectify-custom' ); ?></span>
                                    <h2><?php esc_html_e( 'Why Homeowners Choose Rectify', 'rectify-custom' ); ?></h2>
                                </div>
                                <p><?php esc_html_e( 'At Rectify, we don\'t just repair structural problems—we help protect and preserve valuable assets for the long term. Our team combines technical expertise, innovative ground stabilisation technologies and a commitment to quality delivery across every project. Serving clients throughout Melbourne, Victoria, Adelaide, South Australia, and across Australia, we deliver trusted underpinning, foundation repair and ground engineering solutions that reduce risk, restore confidence and provide long-lasting structural performance.', 'rectify-custom' ); ?></p>
                            </div>
                            <div class="rx-ci-ws-advantage-grid">
                                <?php foreach ( $advantage_cards as $card ) : ?>
                                    <article class="rx-ci-ws-advantage-card">
                                        <div class="rx-ci-ws-advantage-card-head">
                                            <span class="rx-ci-ws-advantage-icon">
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
                'key'    => 'residential-soil-performance',
                'render' => function () use ( $soil_images ) {
                    ?>
                    <section class="rx-ci-ws-performance">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
                            <div class="rx-ci-ws-compare">
                                <figure class="rx-ci-ws-compare-image">
                                    <span class="rx-ci-ws-compare-tag"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $soil_images['before'] ); ?>" alt="<?php esc_attr_e( 'Before structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                                <figure class="rx-ci-ws-compare-image">
                                    <span class="rx-ci-ws-compare-tag rx-ci-ws-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
                                    <img src="<?php echo esc_url( $soil_images['after'] ); ?>" alt="<?php esc_attr_e( 'After structural remediation', 'rectify-custom' ); ?>">
                                </figure>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'residential-soil-help',
                'render' => function () use ( $soil_images ) {
                    ?>
                    <section class="rx-ci-ws-help rx-contact-cta" style="<?php echo esc_attr( '--rx-ci-ws-contours:url(' . esc_url_raw( $soil_images['contours'] ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>
                            <div class="rx-ci-ws-help-grid rx-contact-cta-grid">
                                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon">
                                        <img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Call Expert 1.svg' ) ); ?>" alt="">
                                    </span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-ws-help-link-phone rx-contact-cta-phone" href="tel:1800182020">
                                        <span class="rx-ci-ws-help-link-phone-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/telephone-symbol-button.svg' ) ); ?>" alt=""></span>
                                        <?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?>
                                    </a>
                                </article>
                                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon">
                                        <img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Request Assessment 1.svg' ) ); ?>" alt="">
                                    </span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-ws-help-link rx-contact-cta-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>">
                                        <?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); ?>
                                        <span class="rx-ci-ws-help-link-arrow"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/right-arrow.svg' ) ); ?>" alt=""></span>
                                    </a>
                                </article>
                                <article class="rx-ci-ws-help-card rx-contact-cta-card">
                                    <span class="rx-ci-ws-help-icon rx-contact-cta-icon">
                                        <img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Explore Resources 1.svg' ) ); ?>" alt="">
                                    </span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-ci-ws-help-link rx-contact-cta-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">
                                        <?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); ?>
                                        <span class="rx-ci-ws-help-link-arrow"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/right-arrow.svg' ) ); ?>" alt=""></span>
                                    </a>
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
