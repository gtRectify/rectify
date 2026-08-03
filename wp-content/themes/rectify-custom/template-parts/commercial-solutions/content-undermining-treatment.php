<?php
/**
 * Undermining Treatment (Ground Remediation for Failing Support & Slab Deflection) page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$undermining_images = array(
    'intro'    => rx_asset_url( 'images/residential/residential-hero-strip.jpg' ),
    'symptoms' => rx_asset_url( 'images/home/sloping-slab.webp' ),
    'benefits' => rx_asset_url( 'images/home/rectify-homepage-hero.webp' ),
    'areas'    => rx_asset_url( 'images/home/TruckandVanathouse.jpg' ),
);

$causes = array(
    array(
        'title' => 'Material mobilisation by water (scouring/flooding)',
        'copy'  => 'Roof/downpipe discharge, broken stormwater, surface runoff or flood events erode fines and create voids under slabs and footings.',
    ),
    array(
        'title' => 'Animal burrowing',
        'copy'  => 'Rabbits, wombats and other burrowers create tunnels leading to localised collapse under pavements, foundations and garden walls.',
    ),
    array(
        'title' => 'Service leaks & poor drainage',
        'copy'  => 'Leaking water lines and ponding areas soften subgrades and pump fines.',
    ),
    array(
        'title' => 'Slope instability & lateral migration',
        'copy'  => 'Gravity-driven soil movement on grades transfers support away from slabs/footings, opening joints and creating tilt.',
    ),
    array(
        'title' => 'Uncontrolled fill / poor compaction',
        'copy'  => 'Long-term consolidation leaves gaps under slabs and footings.',
    ),
    array(
        'title' => 'Traffic/vibration',
        'copy'  => 'Repetitive loads expose weakened zones, accelerating pumping and void growth.',
    ),
);

$symptoms = array(
    'Hollow-sounding ("drumming") concrete, rocking slabs, or visible voids at edges.',
    'Differential transitions over drains, trip hazards, or loss of falls to drains.',
    'Cracking/rotation of masonry (step cracks, wall opening separation).',
    'Binding gates/doors, misaligned thresholds or settled crossovers.',
    'Repeated patch failures where the base keeps moving.',
);

$related_problems = array(
    array( 'label' => 'Cracked Wall', 'url' => home_url( '/residential/wall-cracks/' ) ),
    array( 'label' => 'Uneven Floor', 'url' => home_url( '/residential/house-relevelling/' ) ),
);

$process_steps = array(
    array(
        'number' => '01',
        'title'  => 'Investigate & Map',
        'copy'   => 'Level survey to quantify severity of movement and vertical change; locate voids/soft spots; check drainage/services. Where relevant, we may propose CCTV, dye tests or moisture checks.',
        'points' => array(),
    ),
    array(
        'number' => '02',
        'title'  => 'Design the Remediation',
        'copy'   => 'Select treatment based on ground conditions and access.',
        'points' => array(
            array( 'title' => 'Void fill & re-support', 'copy' => 'Targeted resin injection to fill voids, bond loose material and re-establish contact beneath slabs.' ),
            array( 'title' => 'Permeation/compaction grouting', 'copy' => 'Strengthen granular or fill soils and reduce permeability where washout is active.' ),
            array( 'title' => 'Local underpinning/stiffening zones', 'copy' => 'Where footings need deeper improvement.' ),
            array( 'title' => 'Water management measures', 'copy' => 'Sealing joints, redirecting downpipes, drainage tweaks to prevent recurrence.' ),
        ),
    ),
    array(
        'number' => '03',
        'title'  => 'Controlled Lift (Where Required)',
        'copy'   => 'Apply micro-increment lift to remove steps, restore falls and relieve binding, monitored in real time for accuracy.',
        'points' => array(),
    ),
    array(
        'number' => '04',
        'title'  => 'Verify & Make Good',
        'copy'   => 'Plug injection points, seal joints if needed, and document outcomes (levels, volumes, injection map). Provide maintenance recommendations to keep the base stable.',
        'points' => array(),
    ),
);

$benefits = array(
    array(
        'title' => 'Treats the cause',
        'copy'  => 'Rebuilds support at depth and fills hidden voids.',
    ),
    array(
        'title' => 'Minimal disruption',
        'copy'  => 'Small injection points; many areas remain usable during works.',
    ),
    array(
        'title' => 'Precise Outcomes',
        'copy'  => 'Controlled lift to restore function (falls, alignments, door clearances).',
    ),
    array(
        'title' => 'Clean Installation',
        'copy'  => 'Fast-curing materials and tidy reinstatement.',
    ),
);

$areas_col_1 = array(
    'Driveways',
    'Pavements',
    'Patios and pool surrounds with edge washout or burrows',
    'Road pavements',
    'Hardstands',
    'Garage thresholds that have dropped or "pumped"',
);

$areas_col_2 = array(
    'Building strip',
    'Slab foundations undermined by leaks or runoff',
    'Structure and slabs adjacent to stormwater discharge systems, or on slopes with lateral soil movement',
);

$why_cards = array(
    array(
        'icon'  => 'Rectify Icon prof.svg',
        'title' => 'Proven Techniques, Experienced Team',
        'copy'  => 'Established methods in void fill, soil consolidation, and controlled lift delivered by specialists.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Call Expert.svg',
        'title' => 'Low-impact Delivery',
        'copy'  => 'Small injection points, neat reinstatement, and minimal interruption.',
    ),
    array(
        'icon'  => 'Rectify Icon Set_Certifications and Compliance.svg',
        'title' => 'Engineering Assurance',
        'copy'  => 'Site-specific treatment plans, monitored lift, and documented outcomes.',
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page rx-undermining-page' ); ?>>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-hero' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-hero-panel">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></span>
            <h1><?php echo esc_html( get_the_title() ); ?></h1>
            <nav class="rx-undermining-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( home_url( '/commercial-solutions/' ) ); ?>"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php esc_html_e( 'Undermining Treatment', 'rectify-custom' ); ?></span>
            </nav>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-intro' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band">
        <div class="rx-wrap rx-undermining-intro-grid">
            <div>
                <p class="rx-undermining-lede"><?php esc_html_e( 'Restore support, arrest movement, and return assets to service, safely and with minimal disruption.', 'rectify-custom' ); ?></p>
                <p><?php esc_html_e( 'Undermining occurs when soil beneath a slab or footing is removed, weakened, or displaced. The result is loss of bearing, slab deflection, cracking, binding doors/gates, trip steps and service misalignment. Our ground remediation approach targets the cause (voids, washout, loss of density) and rebuilds support beneath the structure using established injection and consolidation methods delivered by a highly experienced team.', 'rectify-custom' ); ?></p>
                <p class="rx-undermining-related">
                    <strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
                    <a href="<?php echo esc_url( home_url( '/residential/foundation-repair/' ) ); ?>"><?php esc_html_e( 'Foundation Repair', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
                </p>
            </div>
            <figure class="rx-undermining-media">
                <img src="<?php echo esc_url( $undermining_images['intro'] ); ?>" alt="">
            </figure>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-causes' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band rx-undermining-soft">
        <div class="rx-wrap">
            <h2 class="rx-undermining-section-title"><?php esc_html_e( 'Why Undermining Happens', 'rectify-custom' ); ?></h2>
            <div class="rx-undermining-causes-grid">
                <?php foreach ( $causes as $cause ) : ?>
                    <article class="rx-undermining-cause-item">
                        <span class="rx-undermining-check" aria-hidden="true"></span>
                        <div>
                            <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                            <p><?php echo esc_html( $cause['copy'] ); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-symptoms' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band">
        <div class="rx-wrap rx-undermining-symptoms-grid">
            <figure class="rx-undermining-media">
                <img src="<?php echo esc_url( $undermining_images['symptoms'] ); ?>" alt="">
            </figure>
            <div>
                <h3><?php esc_html_e( 'Symptoms to look for', 'rectify-custom' ); ?></h3>
                <ul class="rx-undermining-arrow-list">
                    <?php foreach ( $symptoms as $symptom ) : ?>
                        <li><?php echo esc_html( $symptom ); ?></li>
                    <?php endforeach; ?>
                </ul>
                <p class="rx-undermining-related">
                    <strong><?php esc_html_e( 'Related Problems:', 'rectify-custom' ); ?></strong>
                    <?php foreach ( $related_problems as $problem ) : ?>
                        <a href="<?php echo esc_url( $problem['url'] ); ?>"><?php echo esc_html( $problem['label'] ); ?> <span aria-hidden="true">&#8594;</span></a>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-process' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band rx-undermining-soft">
        <div class="rx-wrap">
            <h2 class="rx-undermining-section-title"><?php esc_html_e( 'How We Treat Undermining (Process)', 'rectify-custom' ); ?></h2>
            <div class="rx-undermining-process-grid">
                <?php foreach ( $process_steps as $step ) : ?>
                    <article class="rx-undermining-process-step">
                        <span class="rx-undermining-process-circle"><?php echo esc_html( $step['number'] ); ?></span>
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo esc_html( $step['copy'] ); ?></p>
                        <?php if ( ! empty( $step['points'] ) ) : ?>
                            <div class="rx-undermining-process-points">
                                <?php foreach ( $step['points'] as $point ) : ?>
                                    <div class="rx-undermining-process-point">
                                        <h4><?php echo esc_html( $point['title'] ); ?></h4>
                                        <p><?php echo esc_html( $point['copy'] ); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-benefits' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band">
        <div class="rx-wrap rx-undermining-benefits-grid">
            <figure class="rx-undermining-media">
                <img src="<?php echo esc_url( $undermining_images['benefits'] ); ?>" alt="">
            </figure>
            <div>
                <h2 class="rx-undermining-benefits-title"><?php esc_html_e( 'Benefits', 'rectify-custom' ); ?></h2>
                <div class="rx-undermining-benefit-list">
                    <?php foreach ( $benefits as $benefit ) : ?>
                        <article class="rx-undermining-benefit-item">
                            <span class="rx-undermining-check" aria-hidden="true"></span>
                            <div>
                                <h3><?php echo esc_html( $benefit['title'] ); ?></h3>
                                <p><?php echo esc_html( $benefit['copy'] ); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-notes' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band">
        <div class="rx-wrap rx-undermining-notes-grid">
            <div>
                <h3><?php esc_html_e( 'Limitations & Suitability', 'rectify-custom' ); ?></h3>
                <p><?php esc_html_e( 'Concrete is too fractured to act as a single element (multiple broken fragments/delamination). Treatment panel width is too narrow to correct side-to-side levels differentially.', 'rectify-custom' ); ?></p>
                <p><?php esc_html_e( 'Active slope instability is ongoing, global stability must be addressed, not just local support. Ongoing severe scouring sources (e.g. uncontrolled discharge) without baseline water management.', 'rectify-custom' ); ?></p>
                <p><?php esc_html_e( 'We use a level survey and condition assessment to determine if remediation will realistically restore support, alignment and performance.', 'rectify-custom' ); ?></p>
            </div>
            <div>
                <h3><?php esc_html_e( 'Cost & Decision Factors', 'rectify-custom' ); ?></h3>
                <p><?php esc_html_e( 'Small, isolated sections are often cheaper to replace than remediate due to fixed entry costs for injection works. Larger areas or multiple panels typically favour remediation, especially where demolition/reinstatement is disruptive.', 'rectify-custom' ); ?></p>
                <div class="rx-undermining-finish-matters">
                    <h4><?php esc_html_e( 'Finish Matters', 'rectify-custom' ); ?></h4>
                    <p><?php esc_html_e( 'Exposed aggregate or stencilled concrete are difficult to match in partial replacement. Tiled/paved overlays may be hard to source or re-lay, keeping the slab often retains these finishes.', 'rectify-custom' ); ?></p>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-areas' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-band rx-undermining-soft">
        <div class="rx-wrap rx-undermining-areas-grid">
            <figure class="rx-undermining-media">
                <img src="<?php echo esc_url( $undermining_images['areas'] ); ?>" alt="">
            </figure>
            <div>
                <h3><?php esc_html_e( 'Typical Areas We Treat', 'rectify-custom' ); ?></h3>
                <div class="rx-undermining-areas-columns">
                    <ul class="rx-undermining-arrow-list">
                        <?php foreach ( $areas_col_1 as $area ) : ?>
                            <li><?php echo esc_html( $area ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="rx-undermining-arrow-list">
                        <?php foreach ( $areas_col_2 as $area ) : ?>
                            <li><?php echo esc_html( $area ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-why' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-why" style="<?php echo esc_attr( '--rx-undermining-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2 class="rx-undermining-section-title"><?php esc_html_e( 'Why Choose Rectify', 'rectify-custom' ); ?></h2>
            <div class="rx-undermining-why-grid">
                <?php foreach ( $why_cards as $card ) : ?>
                    <article class="rx-undermining-why-card">
                        <span class="rx-undermining-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'undermining-cta' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-undermining-cta">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Ready to Stop Undermining at the Source?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'We\'ll inspect, map levels and ground conditions, and advise whether remediation or replacement offers the best result for your asset and finish.', 'rectify-custom' ); ?></p>
            <div class="rx-undermining-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'rectify-custom' ); ?></a>
                <a class="rx-undermining-contact-pill" href="tel:1800182020">1800 18 20 20</a>
                <a class="rx-undermining-contact-pill" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
            </div>
        </div>
    </section>
    <?php } ?>

</article>
