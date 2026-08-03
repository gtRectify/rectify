<?php
/**
 * Mailbox / Brick Fence Releveling page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$brick_images = array(
    'hero'           => rx_asset_url( 'images/home/Wall-with-prop7.jpg' ),
    'intro'          => rx_asset_url( 'images/home/sloping-slab.webp' ),
    'help_1'         => rx_asset_url( 'images/home/before-after-1.png' ),
    'help_2'         => rx_asset_url( 'images/home/before-after-2.png' ),
    'help_3'         => rx_asset_url( 'images/home/before-after-3.png' ),
    'help_4'         => rx_asset_url( 'images/home/before-after-4.png' ),
    'issues'         => rx_asset_url( 'images/home/TruckandVanathouse.jpg' ),
    'considerations' => rx_asset_url( 'images/home/before-after-5.png' ),
);

$causes = array(
    array(
        'title' => 'Reactive clay cycles',
        'copy'  => 'Soils shrink and swell with changing moisture, causing masonry footings to tilt and settle.',
    ),
    array(
        'title' => 'Granular soils and washout',
        'copy'  => 'Loose sand or fill can wash away beneath shallow footings, leaving brickwork unsupported.',
    ),
    array(
        'title' => 'Voids and poor compaction',
        'copy'  => 'Gaps beneath the structure or poorly compacted material allow the wall to move and sink.',
    ),
    array(
        'title' => 'Water paths',
        'copy'  => 'Surface water, irrigation and drains can undermine foundations and destabilise masonry.',
    ),
);

$where_help = array(
    array(
        'image' => $brick_images['help_1'],
        'title' => 'Single or twin brick mailbox piers',
        'copy'  => 'With or without built-in boxes, we stabilise and level masonry features cleanly.',
    ),
    array(
        'image' => $brick_images['help_2'],
        'title' => 'Short front boundary masonry fences',
        'copy'  => 'Preserve existing wall form while stopping further lean and movement.',
    ),
    array(
        'image' => $brick_images['help_3'],
        'title' => 'Letterbox / fence footings over soft soils',
        'copy'  => 'Improve bearing and control settlement where shallow uncontrolled fill has been used.',
    ),
    array(
        'image' => $brick_images['help_4'],
        'title' => 'Driveway edges and garden walls',
        'copy'  => 'Restore stability to walls affected by water, roots or weak edge soils.',
    ),
);

$steps = array(
    array(
        'number' => '01',
        'title'  => 'Diagnose & Plan',
        'copy'   => 'We inspect the structure, map levels and define injection positions for safe, effective lift.',
    ),
    array(
        'number' => '02',
        'title'  => 'Targeted Resin Injection',
        'copy'   => 'Engineered resin fills voids and improves bearing beneath the footing without digging out the wall.',
    ),
    array(
        'number' => '03',
        'title'  => 'Controlled Lift & Alignment',
        'copy'   => 'Lift is applied gradually and monitored to restore plumb and level without over-correction.',
    ),
    array(
        'number' => '04',
        'title'  => 'Finish & Verify',
        'copy'   => 'We restore the site, confirm the outcome and leave you with a stable, aligned result.',
    ),
);

$benefits = array(
    array(
        'title' => 'Non-destructive',
        'copy'  => 'Preserve the existing masonry finish instead of rebuilding the wall.',
    ),
    array(
        'title' => 'Fast return to service',
        'copy'  => 'Small injection points keep disruption minimal and access restored quickly.',
    ),
    array(
        'title' => 'Precise results',
        'copy'  => 'Measured lift and support help maintain alignment and appearance.',
    ),
    array(
        'title' => 'Value-preserving',
        'copy'  => 'Repairing the existing structure is often more efficient than replacing it.',
    ),
);

$issues = array(
    'Leaning or rotated masonry walls and letterboxes.',
    'Open mortar joints, cracking and hairline separation.',
    'Shallow footings with poor compaction or fill.',
    'Water movement causing undermining and sinkage.',
);

$why_cards = array(
    array(
        'title' => 'Proven Techniques',
        'copy'  => 'Established ground improvement and controlled lift methods delivered by specialists.',
    ),
    array(
        'title' => 'Clean, low-impact delivery',
        'copy'  => 'Small injection points, neat reinstatement and minimal disruption.',
    ),
    array(
        'title' => 'Engineered confidence',
        'copy'  => 'Site-specific materials and monitored work for a reliable outcome.',
    ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-brick-page' ); ?>>
    <section class="rx-brick-hero-panel">
        <div class="rx-wrap rx-brick-hero-grid">
            <div class="rx-brick-hero-copy">
                <span class="rx-kicker">RESIDENTIAL SOLUTIONS</span>
                <h1>Mailbox / Brick Fence Re-Leveling</h1>
                <p>Restore alignment, safety and street appeal quickly, cleanly and without demolition.</p>
                <div class="rx-brick-hero-actions">
                    <a class="rx-btn rx-btn-red" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a>
                    <a class="rx-btn rx-btn-white" href="tel:1800182020">1800 18 20 20</a>
                </div>
            </div>
            <figure class="rx-brick-hero-media">
                <img src="<?php echo esc_url( $brick_images['hero'] ); ?>" alt="Brick fence and mailbox repair">
            </figure>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-intro">
        <div class="rx-wrap rx-brick-intro-grid">
            <div>
                <h2>Restore stability, preserve curb appeal, and avoid a costly rebuild.</h2>
                <p>Leaning brick mailboxes, boundary fences and pier walls often reflect weak, shallow footings or soil movement. Our targeted support and resin injection approach stabilises the ground and restores alignment with minimal disruption.</p>
                <p class="rx-brick-related"><strong>Related Service:</strong> <a href="<?php echo esc_url( home_url( '/residential/foundation-repair/' ) ); ?>">Foundation Repair <span aria-hidden="true">?</span></a></p>
            </div>
            <figure class="rx-brick-intro-media">
                <img src="<?php echo esc_url( $brick_images['intro'] ); ?>" alt="Brick fence movement support">
            </figure>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-causes">
        <div class="rx-wrap">
            <h2>Why Brick Mailbox / Fence Movement Happens</h2>
            <div class="rx-brick-causes-grid">
                <?php foreach ( $causes as $cause ) : ?>
                    <article class="rx-brick-cause-card">
                        <h3><?php echo esc_html( $cause['title'] ); ?></h3>
                        <p><?php echo esc_html( $cause['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-where">
        <div class="rx-wrap">
            <h2>Where We Help</h2>
            <div class="rx-brick-where-grid">
                <?php foreach ( $where_help as $help ) : ?>
                    <article class="rx-brick-where-card">
                        <figure>
                            <img src="<?php echo esc_url( $help['image'] ); ?>" alt="<?php echo esc_attr( $help['title'] ); ?>">
                        </figure>
                        <div class="rx-brick-where-copy">
                            <h3><?php echo esc_html( $help['title'] ); ?></h3>
                            <p><?php echo esc_html( $help['copy'] ); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-process">
        <div class="rx-wrap">
            <h2>How Rectify Re-Levels Brick Mailbox Piers &amp; Short Masonry Fences</h2>
            <div class="rx-brick-process-grid">
                <?php foreach ( $steps as $step ) : ?>
                    <article class="rx-brick-process-step">
                        <span><?php echo esc_html( $step['number'] ); ?></span>
                        <div>
                            <h3><?php echo esc_html( $step['title'] ); ?></h3>
                            <p><?php echo esc_html( $step['copy'] ); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-benefits">
        <div class="rx-wrap">
            <h2>Benefits</h2>
            <div class="rx-brick-benefits-grid">
                <?php foreach ( $benefits as $benefit ) : ?>
                    <article class="rx-brick-benefit-card">
                        <h3><?php echo esc_html( $benefit['title'] ); ?></h3>
                        <p><?php echo esc_html( $benefit['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-issues">
        <div class="rx-wrap rx-brick-issues-grid">
            <div>
                <h2>Typical Issues We Fix</h2>
                <ul class="rx-brick-issue-list">
                    <?php foreach ( $issues as $issue ) : ?>
                        <li><?php echo esc_html( $issue ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <figure>
                <img src="<?php echo esc_url( $brick_images['issues'] ); ?>" alt="Masonry repair work">
            </figure>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-considerations">
        <div class="rx-wrap rx-brick-considerations-grid">
            <div>
                <h2>Important Considerations</h2>
                <p><strong>Vegetation, Reactivity &amp; Suitability</strong></p>
                <p>Shallow masonry footings are sensitive to soil moisture, tree roots and water paths. We review site conditions so the repair approach preserves assets and limits future movement.</p>
                <p>A site level survey and soil assessment helps determine whether resin support or a deeper repair is the best solution.</p>
            </div>
            <figure>
                <img src="<?php echo esc_url( $brick_images['considerations'] ); ?>" alt="Brick wall assessment">
            </figure>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-why">
        <div class="rx-wrap">
            <h2>Why Choose Rectify</h2>
            <div class="rx-brick-why-grid">
                <?php foreach ( $why_cards as $card ) : ?>
                    <article class="rx-brick-why-card">
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rx-brick-band rx-brick-cta">
        <div class="rx-wrap rx-brick-cta-grid">
            <div>
                <h2>Ready to Re-Level Your Mailbox or Front Fence?</h2>
                <p>We’ll assess your site and recommend the most efficient remediation plan.</p>
            </div>
            <div class="rx-brick-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">CONTACT US</a>
                <a class="rx-btn rx-btn-ghost" href="tel:1800182020">1800 18 20 20</a>
                <a class="rx-btn rx-btn-ghost" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
            </div>
        </div>
    </section>
</article>
