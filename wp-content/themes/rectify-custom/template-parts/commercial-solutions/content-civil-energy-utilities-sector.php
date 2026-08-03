<?php
/**
 * Civil, Energy & Utilities Infrastructure Repair & Ground Stabilisation page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$civil_images = array(
    'intro'     => rx_asset_url( 'images/home/IMG_0867-1.jpg' ),
    'cap_1'     => rx_asset_url( 'images/home/TruckandVanathouse.jpg' ),
    'cap_2'     => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
    'cap_3'     => rx_asset_url( 'images/home/resources-image.webp' ),
    'cap_4'     => rx_asset_url( 'images/home/rectify-homepage-hero.webp' ),
    'benefits'  => rx_asset_url( 'images/home/team.webp' ),
);

$where_help = array(
    array(
        'icon'  => 'Rectify Icon Set_Civil and Transport.svg',
        'title' => 'Civil and Transport',
        'items' => array( 'Road/Bridge Approaches', 'Pavements', 'Culverts', 'Retaining Structures', 'Embankments', 'Tunnels', 'Ports', 'Airports' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Energy.svg',
        'title' => 'Energy',
        'items' => array( 'Power Stations', 'Turbine Bases', 'Switchyards/Substations', 'Transformer Bunds', 'Cable Trenches' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Utilities and Water_red.svg',
        'title' => 'Utilities and Water',
        'items' => array( 'Treatment Plants', 'Pump Stations', 'Rising Mains', 'Manholes', 'Service Corridors', 'Reservoirs and Tanks' ),
    ),
);

$capabilities = array(
    array(
        'number'         => '1',
        'title'          => 'PU Ground Remediation (Void Fill, Bearing Improvement, Controlled Lift)',
        'symptoms_label' => 'Typical symptoms:',
        'symptoms'       => 'Settlement at approaches and slabs, pumping/voids at falls, rocking panels, racking of structures.',
        'steps'          => array(
            'Inject site-specific polyurethane resin to fill voids, bind loose material and compact weak zones.',
            'Apply controlled lift in micro-increments to re-establish levels, tolerances, and drainage falls.',
            'Targeted injections at shallow or deeper horizons depending on subgrade and fill conditions.',
        ),
        'tags_label'     => 'Deliverables:',
        'tags'           => array( 'Level surveys before/after', 'Volumes/pressures', 'Injection Maps', 'QA records' ),
        'image'          => $civil_images['cap_1'],
    ),
    array(
        'number'         => '2',
        'title'          => 'Water Stopping & Protective Coatings',
        'symptoms_label' => 'Typical symptoms:',
        'symptoms'       => 'Infiltration/exfiltration at joints and penetrations, active leaks, dampness/efflorescence, coating failure, corrosion risk.',
        'steps'          => array(
            'Leak sealing injection (PU or micro-cement) at cracks, joints, wall-slab interfaces, penetrations.',
            'Curtain/cut-off behind walls and culverts to control inflows in granular or fractured ground.',
            'Negative/positive-side waterproofing, anti-carbonation and chemical-resistant coatings for basins, channels and bunds.',
        ),
        'tags_label'     => '',
        'tags'           => array(),
        'image'          => $civil_images['cap_2'],
    ),
    array(
        'number'         => '3',
        'title'          => 'Cellular Concrete Bulk Fill (Permanent or Temporary)',
        'symptoms_label' => 'Use cases:',
        'symptoms'       => 'Trench and shaft backfill, annulus/void infill, sinkhole remediation, redundant chamber fill, ground lowering mitigation, temporary works that must be re-excavatable.',
        'steps'          => array(
            'Pump low-density cellular concrete to create lightweight, uniform bearing fill over large volumes with minimal access.',
            'Choose densities for permanent structural fill or temporary works where later re-excavation is easy.',
        ),
        'tags_label'     => 'Benefits:',
        'tags'           => array( 'Fast Placement', 'Excellent Flow into Complex Voids', 'Reduced Truck Movements' ),
        'image'          => $civil_images['cap_3'],
    ),
    array(
        'number'         => '4',
        'title'          => 'Service Abandonment (Pipes, Culverts, Tanks, Conduits)',
        'symptoms_label' => 'Drivers:',
        'symptoms'       => 'Redundancy, safety, environmental compliance, leak risk, future earthworks.',
        'steps'          => array(
            'Design abandonment mix or cementitious grout to completely fill internal volumes and prevent collapse or migration.',
            'Seal ends/penetrations, provide caps and markers, and produce as-built documentation for records.',
        ),
        'tags_label'     => 'Typical Assets:',
        'tags'           => array( 'Stormwater Culverts', 'Sewer/Storm Mains', 'Fuel Lines', 'Process Lines', 'Redundant Tanks and Ducts' ),
        'image'          => $civil_images['cap_4'],
    ),
);

$process_steps = array(
    array(
        'number' => '01',
        'title'  => 'Investigate & Plan',
        'copy'   => 'Level/permeability checks, void mapping, materials/ground assessment, access and staging plan to keep assets operational.',
    ),
    array(
        'number' => '02',
        'title'  => 'Design & Treat',
        'copy'   => 'Select resin/grout/coating systems, define horizons and injection depths, set QA/ITP.',
    ),
    array(
        'number' => '03',
        'title'  => 'Control & Monitor',
        'copy'   => 'Micro-increment lift, pressure/volume control, leak-sealing verification, coating QA.',
    ),
    array(
        'number' => '04',
        'title'  => 'Verify & Document',
        'copy'   => 'Before/after levels, permeability, flow reduction where applicable, coating DFT/adhesion (if specified), as-built maps and close-out report.',
    ),
);

$benefits = array(
    array(
        'title' => 'Minimal Shutdowns',
        'copy'  => 'Many areas stay live; fast rapid-cure resins enable same-day light load in typical zones.',
    ),
    array(
        'title' => 'Non-invasive',
        'copy'  => 'Small injection points and tidy reinstatement, no bulk demolition.',
    ),
    array(
        'title' => 'Predictable Outcomes',
        'copy'  => 'Monitored lift, measurable void reduction, documented QA.',
    ),
    array(
        'title' => 'Program Certainty',
        'copy'  => 'Pre-treatment site plans help avoid unplanned delays and rework.',
    ),
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-civil-page' ); ?>>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-hero' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-hero-panel">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></span>
            <h1><?php echo esc_html( get_the_title() ); ?></h1>
            <nav class="rx-civil-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( home_url( '/commercial-solutions/' ) ); ?>"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html( get_the_title() ); ?></span>
            </nav>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-intro' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-band">
        <div class="rx-wrap rx-civil-intro-grid">
            <div>
                <p><?php esc_html_e( 'Stabilise ground, stop water, protect concrete, and manage redundant assets, safely, efficiently, and with minimal disruption to live assets and the public.', 'rectify-custom' ); ?></p>
                <p><?php esc_html_e( 'Rectify Group delivers integrated remediation for civil infrastructure, energy facilities, and utility networks. Our methods are non-destructive, fast to deploy, and engineered to restore function while limiting shutdowns.', 'rectify-custom' ); ?></p>
            </div>
            <?php if ( $civil_images['intro'] ) : ?>
                <figure class="rx-civil-media">
                    <img src="<?php echo esc_url( $civil_images['intro'] ); ?>" alt="">
                </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-where-help' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-band rx-civil-soft">
        <div class="rx-wrap">
            <h2 class="rx-civil-section-title"><?php esc_html_e( 'Where We Help', 'rectify-custom' ); ?></h2>
            <div class="rx-civil-where-grid">
                <?php foreach ( $where_help as $card ) : ?>
                    <article class="rx-civil-where-card">
                        <span class="rx-civil-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <ul>
                            <?php foreach ( $card['items'] as $item ) : ?>
                                <li><?php echo esc_html( $item ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-capabilities' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-band">
        <div class="rx-wrap">
            <h2 class="rx-civil-section-title"><?php esc_html_e( 'Core Capabilities', 'rectify-custom' ); ?></h2>
        </div>
        <div class="rx-civil-capabilities">
            <?php foreach ( $capabilities as $capability ) : ?>
                <article class="rx-civil-cap-row">
                    <div class="rx-wrap rx-civil-cap-grid">
                        <div class="rx-civil-cap-body">
                            <div class="rx-civil-cap-head">
                                <span class="rx-civil-cap-number"><?php echo esc_html( $capability['number'] ); ?></span>
                                <h3><?php echo esc_html( $capability['title'] ); ?></h3>
                            </div>
                            <?php if ( $capability['symptoms'] ) : ?>
                                <p class="rx-civil-cap-symptoms"><strong><?php echo esc_html( $capability['symptoms_label'] ); ?></strong> <?php echo esc_html( $capability['symptoms'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $capability['steps'] ) ) : ?>
                                <h4 class="rx-civil-cap-subhead"><?php esc_html_e( 'What We Do', 'rectify-custom' ); ?></h4>
                                <div class="rx-civil-cap-steps">
                                    <?php foreach ( $capability['steps'] as $index => $step ) : ?>
                                        <?php if ( $index > 0 ) : ?>
                                            <span class="rx-civil-cap-arrow" aria-hidden="true">&#8594;</span>
                                        <?php endif; ?>
                                        <div class="rx-civil-cap-step"><?php echo esc_html( $step ); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $capability['tags'] ) ) : ?>
                                <p class="rx-civil-cap-tags">
                                    <strong><?php echo esc_html( $capability['tags_label'] ); ?></strong>
                                    <?php echo esc_html( implode( ' → ', $capability['tags'] ) ); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <?php if ( $capability['image'] ) : ?>
                            <figure class="rx-civil-cap-media">
                                <img src="<?php echo esc_url( $capability['image'] ); ?>" alt="">
                            </figure>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-process' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-band rx-civil-soft">
        <div class="rx-wrap">
            <h2 class="rx-civil-section-title"><?php esc_html_e( 'Our Delivery Process', 'rectify-custom' ); ?></h2>
            <div class="rx-civil-process-grid">
                <?php foreach ( $process_steps as $step ) : ?>
                    <article class="rx-civil-process-step">
                        <span class="rx-civil-process-circle"><?php echo esc_html( $step['number'] ); ?></span>
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo esc_html( $step['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-benefits' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-band">
        <div class="rx-wrap">
            <h2 class="rx-civil-section-title"><?php esc_html_e( 'Benefits for Asset Owners and Operators', 'rectify-custom' ); ?></h2>
            <div class="rx-civil-benefits-grid">
                <?php if ( $civil_images['benefits'] ) : ?>
                    <figure class="rx-civil-media">
                        <img src="<?php echo esc_url( $civil_images['benefits'] ); ?>" alt="">
                    </figure>
                <?php endif; ?>
                <div class="rx-civil-benefit-list">
                    <?php foreach ( $benefits as $benefit ) : ?>
                        <article class="rx-civil-benefit-item">
                            <span class="rx-civil-check" aria-hidden="true"></span>
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

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-why' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-why" style="<?php echo esc_attr( '--rx-civil-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2 class="rx-civil-section-title"><?php esc_html_e( 'Why Choose Rectify', 'rectify-custom' ); ?></h2>
            <div class="rx-civil-why-grid">
                <?php foreach ( $why_cards as $card ) : ?>
                    <article class="rx-civil-why-card">
                        <span class="rx-civil-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'civil-cta' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-civil-cta">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Ready to Stabilise and Protect Your Network?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'We\'ll assess your site, outline options (remediate vs replace), and deliver a clear program, QA and budget.', 'rectify-custom' ); ?></p>
            <div class="rx-civil-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'rectify-custom' ); ?></a>
                <a class="rx-civil-contact-pill" href="tel:1800182020">1800 18 20 20</a>
                <a class="rx-civil-contact-pill" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
            </div>
        </div>
    </section>
    <?php } ?>

</article>
