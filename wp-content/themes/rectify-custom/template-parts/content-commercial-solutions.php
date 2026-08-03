<?php
/**
 * Commercial Solutions archive content.
 *
 * Content is managed by Rectify Page Builder. The markup below is the
 * complete Figma-matched fallback used before a page has builder data.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$commercial_asset = static function ( $filename ) {
    return rx_asset_url( 'images/commercial-archive/' . ltrim( $filename, '/' ) );
};

$commercial_solutions = array(
    array( 'icon' => 'ground-improvement.svg', 'title' => 'Ground Improvement', 'copy' => 'Strengthening and stabilising weak or variable ground conditions to support long-term asset performance.', 'point_title' => 'Benefits:', 'points' => array( 'Improves ground stability', 'Increases load capacity', 'Reduces ground movement', 'Strengthens weak soils' ), 'url' => home_url( '/commercial-solutions/ground-improvement/' ) ),
    array( 'icon' => 'realignment.svg', 'title' => 'Re-alignment & Levelling', 'copy' => 'Correcting structural movement and restoring alignment with precision-engineered lifting solutions.', 'point_title' => 'Benefits:', 'points' => array( 'Restores structural alignment', 'Corrects uneven floors', 'Re-levels settled structures', 'Minimises operational disruption' ), 'url' => home_url( '/commercial-solutions/realignment-levelling/' ) ),
    array( 'icon' => 'slab-lifting.svg', 'title' => 'Slab Lifting', 'copy' => 'Re-levelling sunken concrete slabs with minimal disruption to operations and surrounding assets.', 'point_title' => 'Ideal for:', 'points' => array( 'Sunken concrete slabs', 'Warehouse floors', 'Loading docks', 'External pavements' ), 'url' => home_url( '/commercial-solutions/slab-lifting/' ) ),
    array( 'icon' => 'engineered-fill.svg', 'title' => 'Engineered Fill', 'copy' => 'Filling voids and improving subsurface conditions to enhance structural stability and load capacity.', 'point_title' => 'Ideal for:', 'points' => array( 'Subsurface voids', 'Weak foundation soils', 'Ground consolidation', 'Structural support' ), 'url' => home_url( '/commercial-solutions/engineered-fill/' ) ),
    array( 'icon' => 'void-filling.svg', 'title' => 'Void Filling', 'copy' => 'Eliminating underground voids that threaten structural integrity, safety, and operational continuity.', 'point_title' => 'Benefits:', 'points' => array( 'Eliminates underground voids', 'Restores ground support', 'Reduces settlement risk', 'Minimises disruption' ), 'url' => home_url( '/commercial-solutions/void-filling/' ) ),
    array( 'icon' => 'leak-sealing.svg', 'title' => 'Leak Sealing & Water Stopping', 'copy' => 'Controlling water ingress through engineered sealing systems that protect structures and critical assets.', 'point_title' => 'Ideal for:', 'points' => array( 'Basements', 'Lift pits', 'Concrete joints', 'Underground structures' ), 'url' => home_url( '/commercial-solutions/leak-sealing-water-stopping/' ) ),
    array( 'icon' => 'concrete-repair.svg', 'title' => 'Protective Coatings & Concrete Repair', 'copy' => 'Restoring durability and extending asset life through specialised repair and protection systems.', 'point_title' => 'Suitable for:', 'points' => array( 'Cracked concrete', 'Corroded structures', 'Chemical exposure', 'Surface deterioration' ), 'url' => home_url( '/commercial-solutions/protective-coatings-concrete-repair/' ) ),
    array( 'icon' => 'pipe-abandonment.svg', 'title' => 'Pipe Abandonment', 'copy' => 'Safe and compliant decommissioning of underground assets using engineered filling and stabilisation methods.', 'point_title' => 'Suitable for:', 'points' => array( 'Decommissioned pipelines', 'Underground service pipes', 'Stormwater systems', 'Utility infrastructure' ), 'url' => home_url( '/commercial-solutions/pipe-abandonment/' ) ),
    array( 'icon' => 'preventative-ground-improvement.svg', 'title' => 'Ground Improvement', 'copy' => 'Strengthen the ground before problems develop.', 'point_title' => 'Suitable for:', 'points' => array( 'Weak ground conditions', 'Foundation support', 'Settlement-prone sites', 'Load-bearing enhancement' ), 'url' => home_url( '/commercial-solutions/ground-improvement/' ) ),
    array( 'icon' => 'civil-energy-utilities.svg', 'title' => 'Civil, Energy and Utilities', 'copy' => 'Specialised structural remediation and ground engineering solutions that protect critical infrastructure, reduce risk, and minimise operational disruption.', 'point_title' => 'Suitable for:', 'points' => array( 'Roads and pavements', 'Utility infrastructure', 'Energy facilities', 'Civil assets' ), 'url' => home_url( '/commercial-solutions/civil-energy-utilities-sector/' ) ),
    array( 'icon' => 'hospital-remediation.svg', 'title' => 'Hospital Asset Remediation', 'copy' => 'Engineered remediation solutions that restore structural performance while maintaining safety, compliance, and operational continuity.', 'point_title' => 'Suitable for:', 'points' => array( 'Hospitals', 'Healthcare facilities', 'Plant rooms', 'Critical infrastructure' ), 'url' => home_url( '/commercial-solutions/hospital-asset-remediation/' ) ),
    array( 'icon' => 'undermining-treatment.svg', 'title' => 'Underminning Treatment', 'copy' => 'Stabilising ground affected by erosion and subsurface voids to protect structures from ongoing movement and settlement.', 'point_title' => 'Suitable for:', 'points' => array( 'Erosion voids', 'Undermined foundations', 'Retaining structures', 'Settlement-prone areas' ), 'url' => home_url( '/commercial-solutions/undermining-treatment/' ) ),
);

$commercial_help_cards = array(
    array( 'icon' => 'call-expert.svg', 'title' => 'Call Us', 'copy' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone' => '1800 18 20 20', 'url' => 'tel:1800182020' ),
    array( 'icon' => 'estimate-project-cost.svg', 'title' => 'Estimate Project Cost', 'copy' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'link' => 'Get My Cost Estimate', 'url' => home_url( '/cost-calculator/' ) ),
    array( 'icon' => 'explore-resources.svg', 'title' => 'Explore Resources', 'copy' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'link' => 'Explore Resources', 'url' => home_url( '/resources/' ) ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-commercial-page rx-commercial-figma' ); ?>>
    <?php if ( ! function_exists( 'rectify_builder_render_section' ) || ! rectify_builder_render_section( get_the_ID(), 'commercial-hero' ) ) : ?>
        <section class="rx-commercial-hero-panel">
            <div class="rx-commercial-wrap rx-commercial-hero-grid">
                <div>
                    <span class="rx-kicker">COMMERCIAL</span>
                    <h1>Commercial Solutions</h1>
                    <nav class="rx-commercial-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <span aria-hidden="true"></span>
                        <strong>Commercial Solutions</strong>
                    </nav>
                </div>
                <div class="rx-commercial-hero-summary">
                    <h2>Engineering Solutions for Critical Assets and Essential Infrastructure</h2>
                    <p>Rectify partners with asset owners, Tier 1 contractors, engineers, government agencies, and facility managers to deliver engineered structural stabilisation, ground improvement, and asset remediation solutions. Our non-invasive technologies and engineering-led approach restore performance while minimising disruption to operations, occupants, and surrounding infrastructure.</p>
                </div>
            </div>
        </section>
        <figure class="rx-commercial-strip">
            <img src="<?php echo esc_url( $commercial_asset( 'hero.jpg' ) ); ?>" alt="Rectify team completing ground remediation works at a commercial site">
        </figure>
    <?php endif; ?>

    <?php if ( ! function_exists( 'rectify_builder_render_section' ) || ! rectify_builder_render_section( get_the_ID(), 'commercial-intro' ) ) : ?>
        <section class="rx-commercial-intro">
            <div class="rx-commercial-wrap rx-commercial-intro-grid">
                <div>
                    <h2>Engineering-Led Solutions for Complex Commercial Projects</h2>
                    <div class="rx-commercial-richtext">
                        <p>Rectify delivers specialised commercial solutions that address the underlying causes of structural movement, ground instability, void formation, and concrete deterioration—not just the visible symptoms. Our integrated capabilities span structural stabilisation, ground engineering, and asset remediation, enabling us to solve complex challenges across commercial buildings, industrial facilities, utilities, transport infrastructure, marine assets, and public infrastructure.</p>
                        <p>Every solution is supported by detailed engineering assessment, proven remediation technologies, and a commitment to delivering measurable, long-term performance outcomes. Whether the project involves strengthening foundations, filling underground voids, stabilising weak ground, repairing deteriorated concrete, or extending the service life of critical infrastructure, our focus remains the same: reducing risk, minimising disruption, and protecting valuable assets for the future.</p>
                    </div>
                </div>
                <figure class="rx-commercial-intro-media">
                    <img src="<?php echo esc_url( $commercial_asset( 'intro.jpg' ) ); ?>" alt="Rectify vehicles at a complex commercial remediation project">
                </figure>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! function_exists( 'rectify_builder_render_section' ) || ! rectify_builder_render_section( get_the_ID(), 'commercial-solutions-grid' ) ) : ?>
        <section class="rx-commercial-solutions" id="commercial-solutions">
            <div class="rx-commercial-wrap">
                <h2 class="rx-commercial-section-title">Commercial Solutions We Offer</h2>
                <div class="rx-commercial-solution-grid">
                    <?php foreach ( $commercial_solutions as $solution ) : ?>
                        <article class="rx-commercial-solution-card">
                            <div class="rx-commercial-card-top">
                                <span class="rx-commercial-card-icon"><img src="<?php echo esc_url( $commercial_asset( $solution['icon'] ) ); ?>" alt=""></span>
                                <a class="rx-commercial-learn" href="<?php echo esc_url( $solution['url'] ); ?>">Learn More<span aria-hidden="true">&rarr;</span></a>
                            </div>
                            <h3><?php echo esc_html( $solution['title'] ); ?></h3>
                            <p><?php echo esc_html( $solution['copy'] ); ?></p>
                            <div class="rx-commercial-points">
                                <h4><?php echo esc_html( $solution['point_title'] ); ?></h4>
                                <ul>
                                    <?php foreach ( $solution['points'] as $point ) : ?>
                                        <li><?php echo esc_html( $point ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! function_exists( 'rectify_builder_render_section' ) || ! rectify_builder_render_section( get_the_ID(), 'commercial-help' ) ) : ?>
        <section class="rx-commercial-why">
            <div class="rx-commercial-help-heading">
                <h2 class="rx-commercial-section-title">Need Help Choosing the Right Solution?</h2>
                <div class="rx-commercial-richtext rx-commercial-why-copy"><p>Whether you're dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.</p></div>
            </div>
            <div class="rx-commercial-why-grid">
                <?php foreach ( $commercial_help_cards as $card ) : ?>
                    <article class="rx-commercial-why-card">
                        <span class="rx-commercial-card-icon"><img src="<?php echo esc_url( $commercial_asset( $card['icon'] ) ); ?>" alt=""></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <div class="rx-commercial-help-description"><p><?php echo esc_html( $card['copy'] ); ?></p></div>
                        <?php if ( ! empty( $card['phone'] ) ) : ?>
                            <a class="rx-commercial-help-phone" href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['phone'] ); ?></a>
                        <?php else : ?>
                            <a class="rx-commercial-learn rx-commercial-help-link" href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['link'] ); ?><span aria-hidden="true">&rarr;</span></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( ! function_exists( 'rectify_builder_render_section' ) || ! rectify_builder_render_section( get_the_ID(), 'commercial-cta' ) ) : ?>
        <section class="rx-commercial-cta">
            <div class="rx-commercial-wrap">
                <h2>Not Sure Which Solution You Need?</h2>
                <p>Every home is different, and the visible signs of damage don't always reveal the underlying cause. Our specialists can assess your property's condition, identify the source of foundation movement, and recommend the most appropriate engineered solution for your home.</p>
                <div class="rx-commercial-cta-actions">
                    <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
                    <a class="rx-commercial-contact-pill rx-commercial-contact-phone" href="tel:1800182020">1800 18 20 20</a>
                    <a class="rx-commercial-contact-pill rx-commercial-contact-email" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
