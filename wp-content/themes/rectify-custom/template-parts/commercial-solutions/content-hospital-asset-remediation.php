<?php
/**
 * Hospital Asset Remediation page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$hospital_images = array(
    'intro'         => rx_asset_url( 'images/commercial/hospital-asset-remediation/hospital-entrance.png' ),
    'help_1'        => rx_asset_url( 'images/commercial/hospital-asset-remediation/ground-remediation.png' ),
    'help_2'        => rx_asset_url( 'images/commercial/hospital-asset-remediation/water-stopping.png' ),
    'help_3'        => rx_asset_url( 'images/commercial/hospital-asset-remediation/void-fill.png' ),
    'help_4'        => rx_asset_url( 'images/commercial/hospital-asset-remediation/concrete-repair.png' ),
    'retrospective' => rx_asset_url( 'images/commercial/hospital-asset-remediation/operating-room.png' ),
    'benefits'      => rx_asset_url( 'images/commercial/hospital-asset-remediation/hospital-hallway.png' ),
);

$icon_hospital = rx_asset_url( 'icons-red/Rectify Icon Set_Hospital.svg' );

$challenges = array(
    array(
        'title' => 'Continuous Operation',
        'copy'  => 'Work must proceed around patients, staff, and sensitive equipment.',
    ),
    array(
        'title' => 'Hygiene and Safety',
        'copy'  => 'Solutions must be clean, non-toxic, and low-impact.',
    ),
    array(
        'title' => 'Critical Infrastructure',
        'copy'  => 'Utilities, labs, theatres, and wards require uninterrupted service.',
    ),
    array(
        'title' => 'High Standards',
        'copy'  => 'Compliance with healthcare facility guidelines and accreditation requirements.',
    ),
);

$where_help = array(
    array(
        'image'    => $hospital_images['help_1'],
        'title'    => 'Ground Remediation',
        'copy'     => 'Stabilising weak soils under hospital buildings, car parks, and service corridors. Prevents settlement and ensures long-term performance of critical facilities.',
        'related'  => array(
            array( 'label' => 'Chemical Underpinning', 'url' => home_url( '/residential/chemical-underpinning/' ) ),
            array( 'label' => 'Void Filling Service', 'url' => home_url( '/commercial-solutions/void-filling/' ) ),
        ),
    ),
    array(
        'image'    => $hospital_images['help_2'],
        'title'    => 'Water Stopping & Waterproofing',
        'copy'     => 'Grouting and sealing against water ingress in basements, plant rooms, lift shafts, and tunnels. Protects against mould, corrosion, and equipment downtime.',
        'related'  => array(
            array( 'label' => 'Leak Sealing / Water Stopping', 'url' => home_url( '/commercial-solutions/leak-sealing-water-stopping/' ) ),
        ),
    ),
    array(
        'image'    => $hospital_images['help_3'],
        'title'    => 'Void Fill & Re-support',
        'copy'     => 'Addressing voids beneath slabs and pavements caused by washout or service leaks. Restores full support for heavy medical equipment and high-traffic areas.',
        'related'  => array(
            array( 'label' => 'Slab Lifting', 'url' => home_url( '/commercial-solutions/slab-lifting/' ) ),
        ),
    ),
    array(
        'image'    => $hospital_images['help_4'],
        'title'    => 'Concrete Repair & Protection',
        'copy'     => 'Repairing spalled, cracked, or chemically attacked concrete in structures, façades, or service areas. Extends asset life and restores compliance with safety standards.',
        'related'  => array(
            array( 'label' => 'Cracked Walls', 'url' => home_url( '/residential/cracked-walls/' ) ),
        ),
    ),
);

$retrospective_points = array(
    'Increasing bearing capacity under existing slabs to support heavier imaging, radiology, or robotic surgery equipment.',
    'Precision levelling and stabilisation for ultra-low tolerance installations (MRI suites, linear accelerators, laboratory robotics).',
    'Upgrading performance of existing floors without demolition or rebuild.',
);

$process_steps = array(
    array(
        'number' => '01',
        'title'  => 'Investigate & Plan',
        'copy'   => 'We survey the site, identify risks, and schedule works around patient care—often staged or out-of-hours.',
        'points' => array(),
    ),
    array(
        'number' => '02',
        'title'  => 'Targeted Remediation',
        'copy'   => 'Select resin/grout/coating systems, define horizons and injection grids, set QA/ITP.',
        'points' => array(
            'Engineered resins and grouts consolidate soil, stop leaks, and fill voids.',
            'Waterproofing treatments prevent future water ingress.',
            'Specialist concrete repair techniques restore structural integrity.',
            'Retrospective upgrades strengthen and level slabs for today\'s advanced medical equipment.',
        ),
    ),
    array(
        'number' => '03',
        'title'  => 'Verification & Compliance',
        'copy'   => 'Every solution is checked against required standards: level surveys, watertightness checks, and structural inspections.',
        'points' => array(),
    ),
);

$benefits = array(
    array(
        'title' => 'Minimal Disruption',
        'copy'  => 'Fast-curing materials, clean installation, and staging around operations.',
    ),
    array(
        'title' => 'Proven Results',
        'copy'  => 'Decades of global application, adapted for sensitive hospital environments.',
    ),
    array(
        'title' => 'Future-ready facilities',
        'copy'  => 'Reinforced floors and precise levelling to support modern medical technology.',
    ),
    array(
        'title' => 'Safer Environments',
        'copy'  => 'Secure structures, dry basements, and restored pavements.',
    ),
);

$why_cards = array(
    array(
        'title' => 'Experience in healthcare projects',
        'copy'  => 'Teams familiar with working in sensitive, live environments.',
    ),
    array(
        'title' => 'Clean, non-invasive methods',
        'copy'  => 'No bulk excavation; small injection points and minimal waste.',
    ),
    array(
        'title' => 'Engineering assurance',
        'copy'  => 'Solutions designed, monitored, and documented for compliance.',
    ),
    array(
        'title' => 'Proven people and processes',
        'copy'  => 'Methods refined over decades; staff with 10+ years of direct remediation experience.',
    ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-hospital-page' ); ?>>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-hero' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-hero-panel">
        <div class="rx-wrap">
            <span class="rx-kicker"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></span>
            <h1><?php echo esc_html( get_the_title() ); ?></h1>
            <nav class="rx-hospital-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <a href="<?php echo esc_url( home_url( '/commercial-solutions/' ) ); ?>"><?php esc_html_e( 'Commercial Solutions', 'rectify-custom' ); ?></a>
                <span aria-hidden="true">&gt;</span>
                <span><?php echo esc_html( get_the_title() ); ?></span>
            </nav>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-intro' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band">
        <div class="rx-wrap rx-hospital-intro-grid">
            <div>
                <p class="rx-hospital-lede"><?php esc_html_e( 'Protecting healthcare facilities with engineered remediation solutions—safely, discreetly, and without interrupting care.', 'rectify-custom' ); ?></p>
                <p><?php esc_html_e( 'Hospitals operate around the clock. Even minor asset failures—subsiding floors, water ingress, or concrete deterioration—can affect patient safety, medical equipment, and compliance with strict standards. Rectify delivers targeted remediation solutions designed for the healthcare environment: minimal disruption, proven methods, and measurable outcomes.', 'rectify-custom' ); ?></p>
            </div>
            <figure class="rx-hospital-media">
                <?php if ( $hospital_images['intro'] ) : ?>
                    <img src="<?php echo esc_url( $hospital_images['intro'] ); ?>" alt="">
                <?php endif; ?>
            </figure>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-challenges' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band rx-hospital-soft">
        <div class="rx-wrap">
            <h2 class="rx-hospital-section-title"><?php esc_html_e( 'Unique Challenges in Hospital Environments', 'rectify-custom' ); ?></h2>
            <div class="rx-hospital-feature-grid">
                <?php foreach ( $challenges as $challenge ) : ?>
                    <article class="rx-hospital-feature-card">
                        <span class="rx-hospital-card-icon"><img src="<?php echo esc_url( $icon_hospital ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $challenge['title'] ); ?></h3>
                        <p><?php echo esc_html( $challenge['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-where-help' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band">
        <div class="rx-wrap">
            <h2 class="rx-hospital-section-title"><?php esc_html_e( 'Where We Help in Hospitals', 'rectify-custom' ); ?></h2>
            <div class="rx-hospital-where-grid">
                <?php foreach ( $where_help as $help ) : ?>
                    <article class="rx-hospital-where-card">
                        <?php if ( $help['image'] ) : ?>
                            <img src="<?php echo esc_url( $help['image'] ); ?>" alt="">
                        <?php endif; ?>
                        <div class="rx-hospital-where-overlay">
                            <h3><?php echo esc_html( $help['title'] ); ?></h3>
                            <p><?php echo esc_html( $help['copy'] ); ?></p>
                            <?php if ( ! empty( $help['related'] ) ) : ?>
                                <p class="rx-hospital-where-related-label"><?php esc_html_e( 'Related Services:', 'rectify-custom' ); ?></p>
                                <p class="rx-hospital-where-related">
                                    <?php foreach ( $help['related'] as $related ) : ?>
                                        <a href="<?php echo esc_url( $related['url'] ); ?>"><?php echo esc_html( $related['label'] ); ?> <span aria-hidden="true">&#8594;</span></a>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-retrospective' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band rx-hospital-soft">
        <div class="rx-wrap rx-hospital-retrospective-grid">
            <figure class="rx-hospital-media">
                <?php if ( $hospital_images['retrospective'] ) : ?>
                    <img src="<?php echo esc_url( $hospital_images['retrospective'] ); ?>" alt="">
                <?php endif; ?>
            </figure>
            <div>
                <h3><?php esc_html_e( 'Retrospective Upgrades for New Medical Facilities', 'rectify-custom' ); ?></h3>
                <ul class="rx-hospital-arrow-list">
                    <?php foreach ( $retrospective_points as $point ) : ?>
                        <li><?php echo esc_html( $point ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-process' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band">
        <div class="rx-wrap">
            <h2 class="rx-hospital-section-title"><?php esc_html_e( 'Our Delivery Process', 'rectify-custom' ); ?></h2>
            <div class="rx-hospital-process-grid">
                <?php foreach ( $process_steps as $step ) : ?>
                    <article class="rx-hospital-process-step">
                        <span class="rx-hospital-process-circle"><?php echo esc_html( $step['number'] ); ?></span>
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo esc_html( $step['copy'] ); ?></p>
                        <?php if ( ! empty( $step['points'] ) ) : ?>
                            <ul class="rx-hospital-process-points">
                                <?php foreach ( $step['points'] as $point ) : ?>
                                    <li><?php echo esc_html( $point ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-benefits' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-band rx-hospital-soft">
        <div class="rx-wrap rx-hospital-benefits-grid">
            <figure class="rx-hospital-media">
                <?php if ( $hospital_images['benefits'] ) : ?>
                    <img src="<?php echo esc_url( $hospital_images['benefits'] ); ?>" alt="">
                <?php endif; ?>
            </figure>
            <div>
                <h2 class="rx-hospital-benefits-title"><?php esc_html_e( 'Benefits for Hospitals', 'rectify-custom' ); ?></h2>
                <div class="rx-hospital-benefit-list">
                    <?php foreach ( $benefits as $benefit ) : ?>
                        <article class="rx-hospital-benefit-item">
                            <span class="rx-hospital-check" aria-hidden="true"></span>
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

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-why' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-why" style="<?php echo esc_attr( '--rx-hospital-contours:url(' . esc_url_raw( rx_asset_url( 'images/commercial/why-choose-contours.svg' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2 class="rx-hospital-section-title"><?php esc_html_e( 'Why Hospitals Choose Rectify', 'rectify-custom' ); ?></h2>
            <div class="rx-hospital-feature-grid">
                <?php foreach ( $why_cards as $card ) : ?>
                    <article class="rx-hospital-feature-card">
                        <span class="rx-hospital-card-icon"><img src="<?php echo esc_url( $icon_hospital ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'hospital-cta' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-hospital-cta">
        <div class="rx-wrap">
            <h2><?php esc_html_e( 'Ready to Protect and Upgrade Your Hospital?', 'rectify-custom' ); ?></h2>
            <p><?php esc_html_e( 'Rectify Group delivers remediation and upgrade programs tailored for healthcare facilities—safely, quickly, and with measurable results.', 'rectify-custom' ); ?></p>
            <div class="rx-hospital-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'rectify-custom' ); ?></a>
                <a class="rx-hospital-contact-pill" href="tel:1800182020">1800 18 20 20</a>
                <a class="rx-hospital-contact-pill" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
            </div>
        </div>
    </section>
    <?php } ?>

</article>
