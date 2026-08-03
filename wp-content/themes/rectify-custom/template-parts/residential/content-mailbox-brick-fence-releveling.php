<?php
/**
 * Mailbox / Brick Fence Re-Levelling page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$brick_images = array(
	'intro'          => rx_asset_url( 'images/mailbox-brick-fence/intro-house.jpg' ),
	'causes'         => rx_asset_url( 'images/mailbox-brick-fence/causes-mailbox.jpg' ),
	'help_1'         => rx_asset_url( 'images/mailbox-brick-fence/where-single-pier.jpg' ),
	'help_2'         => rx_asset_url( 'images/mailbox-brick-fence/intro-house.jpg' ),
	'help_3'         => rx_asset_url( 'images/mailbox-brick-fence/where-softclay.jpg' ),
	'help_4'         => rx_asset_url( 'images/mailbox-brick-fence/where-driveway.jpg' ),
	'benefits'       => rx_asset_url( 'images/mailbox-brick-fence/benefits.jpg' ),
	'issues'         => rx_asset_url( 'images/mailbox-brick-fence/typical-issue.jpg' ),
	'considerations' => rx_asset_url( 'images/mailbox-brick-fence/important-consideration.jpg' ),
	'check_icon'     => rx_asset_url( 'images/mailbox-brick-fence/icon-check.svg' ),
	'arrow_icon'     => rx_asset_url( 'images/mailbox-brick-fence/icon-arrow-right.svg' ),
	'contour'        => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$causes = array(
	array(
		'title' => 'Reactive clay cycles',
		'copy'  => 'Shrink/swell with wet&ndash;dry changes reduces bearing and shifts the footing.',
	),
	array(
		'title' => 'Granular soils and washout',
		'copy'  => 'Sand or fill can settle or wash away around services.',
	),
	array(
		'title' => 'Voids and poor compaction',
		'copy'  => 'Introduced fills consolidate over time, undermining support.',
	),
	array(
		'title' => 'Water paths',
		'copy'  => 'Downpipes, irrigation, or leaks erode fines and create soft spots.',
	),
);

$where_help = array(
	array(
		'image' => $brick_images['help_1'],
		'title' => 'Single or twin brick mailbox piers (with/without built-in boxes or parcels).',
	),
	array(
		'image' => $brick_images['help_2'],
		'title' => 'Short front boundary masonry fences and wing walls.',
	),
	array(
		'image' => $brick_images['help_3'],
		'title' => 'Letterbox/fence footings over soft clays, sandy soils, or uncontrolled fill.',
	),
	array(
		'image' => $brick_images['help_4'],
		'title' => 'Driveway edges and garden walls affected by water or tree roots.',
	),
);

$steps = array(
	array(
		'number' => '01',
		'title'  => 'Diagnose &amp; Plan',
		'copy'   => 'We check plumb/tilt, footing type, soil behaviour and nearby services to map strategic injection points.',
	),
	array(
		'number'        => '02',
		'title'         => 'Targeted Resin Injection',
		'copy'          => 'Site-specific engineered polyurethane/geopolymer resin is injected via small holes to re-support the footing and improve bearing in the soil below. The expanding resin fills voids, binds loose material, and compacts the zone under load.',
		'related_label' => 'Related Service',
		'related_text'  => 'Ground Improvement',
		'related_url'   => home_url( '/residential/ground-improvement/' ),
	),
	array(
		'number'        => '03',
		'title'         => 'Controlled Lift &amp; Alignment',
		'copy'          => 'We apply measured lift to bring the pier/fence back to plumb and relieve binding. Movement is monitored in real time to avoid over-correction.',
		'related_label' => 'Related Service:',
		'related_text'  => 'Slab Lifting',
		'related_url'   => home_url( '/residential/slab-lifting-slab-jacking/' ),
	),
	array(
		'number' => '04',
		'title'  => 'Finish &amp; Verify',
		'copy'   => 'We grout injection points, make good the surface, and verify alignment and stability. Where needed, we can repoint open joints or seal minor cracks to keep water out.',
		'copy2'  => 'On sites with localised water ingress or sandy soils, small-scale stabilisation or sealing grouts may be added to lock the ground and reduce future washout.',
	),
);

$benefits = array(
	array(
		'title' => 'Non-destructive',
		'copy'  => 'keep the existing brickwork&mdash;no tear-down or rebuild.',
	),
	array(
		'title' => 'Fast return to service',
		'copy'  => 'Minimal set-up, rapid curing, and neat reinstatement.',
	),
	array(
		'title' => 'Precise Results',
		'copy'  => 'Millimetre-controlled lift to restore plumb alignment and function.',
	),
	array(
		'title' => 'Value-preserving',
		'copy'  => 'Cost-effective remediation versus full replacement.',
	),
);

$issues = array(
	'Leaning or rotated masonry walls and mailboxes.',
	'Stepped or open mortar joints, hairline cracking.',
	'Voiding/settlement adjacent to services or driveway edges.',
);

$considerations_paragraphs = array(
	'Mailboxes and garden walls generally have shallow footings and are influenced by soil reactivity and moisture changes (refer to CSIRO BTF-18), as well as nearby vegetation.',
	'Established trees can alter ground moisture regimes; root activity may disturb foundations. Trees may also lean on structures and cause rotation.',
	'Not all leaning garden walls or letterboxes can be corrected using resin injection. Damage driven by root heave or pushing by plants is not suitable for resin-based repair.',
	'A level survey will determine the polarity of movement and extent of vertical change to assess whether ground remediation can correct alignment.',
);

$why_cards = array(
	array(
		'icon'  => rx_asset_url( 'images/commercial-ground-improvement/icon-worker.svg' ),
		'title' => 'Engineering-Led Solutions',
		'copy'  => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered&mdash;not just a temporary fix.',
	),
	array(
		'icon'  => rx_asset_url( 'images/commercial-ground-improvement/icon-expert.svg' ),
		'title' => 'Proven Structural Expertise',
		'copy'  => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.',
	),
	array(
		'icon'  => rx_asset_url( 'images/commercial-ground-improvement/icon-non-invasive.svg' ),
		'title' => 'Non-Invasive Technology',
		'copy'  => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.',
	),
	array(
		'icon'  => rx_asset_url( 'images/commercial-ground-improvement/icon-services-longterm.png' ),
		'title' => 'Long-Term Confidence',
		'copy'  => 'We don&rsquo;t just repair today&rsquo;s problem&mdash;we strengthen your asset for long-term performance and lasting value.',
	),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-brick-page rx-residential-figma' ); ?>>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-hero' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-hero-panel">
		<div class="rx-wrap">
			<span class="rx-kicker">RESIDENTIAL SOLUTIONS</span>
			<h1>Mailbox / Brick Fence Re-Levelling</h1>
			<nav class="rx-brick-breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
				<span aria-hidden="true">&gt;</span>
				<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>">Residential Solutions</a>
				<span aria-hidden="true">&gt;</span>
				<span>Mailbox / Brick fence re-levelling</span>
			</nav>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-intro' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-intro">
		<div class="rx-wrap rx-brick-intro-grid">
			<div>
				<h2>Restore alignment, safety, and street appeal&mdash;quickly, cleanly, and without demolition.</h2>
				<p>Lean, tilt, or cracking in brick mailboxes and masonry fences usually points to soil movement or loss of support beneath the footing. Our targeted ground improvement and controlled re-levelling re-supports the footing, closes cracks, and returns your asset to plumb alignment&mdash;often in a single visit.</p>
				<p class="rx-brick-related"><strong>Related Service:</strong> <a href="<?php echo esc_url( home_url( '/residential/foundation-repair/' ) ); ?>">Foundation Repair <img class="rx-brick-arrow-icon" src="<?php echo esc_url( $brick_images['arrow_icon'] ); ?>" alt=""></a></p>
			</div>
			<figure class="rx-brick-intro-media">
				<img src="<?php echo esc_url( $brick_images['intro'] ); ?>" alt="Brick fence movement support">
			</figure>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-causes' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-causes">
		<div class="rx-wrap rx-brick-causes-grid">
			<figure>
				<img src="<?php echo esc_url( $brick_images['causes'] ); ?>" alt="Cracked brick mailbox pier">
			</figure>
			<div>
				<h2>Why Brick Mailbox / Fence Movement Happens</h2>
				<div class="rx-brick-checklist">
					<?php foreach ( $causes as $cause ) : ?>
						<div class="rx-brick-check-item">
							<img class="rx-brick-check-icon" src="<?php echo esc_url( $brick_images['check_icon'] ); ?>" alt="">
							<h3><?php echo esc_html( $cause['title'] ); ?></h3>
							<p><?php echo wp_kses_post( $cause['copy'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-where' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-where">
		<div class="rx-wrap">
			<h2>Where We Help</h2>
			<div class="rx-brick-where-grid">
				<?php foreach ( $where_help as $help ) : ?>
					<article class="rx-brick-where-card">
						<figure>
							<img src="<?php echo esc_url( $help['image'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $help['title'] ) ); ?>">
						</figure>
						<div class="rx-brick-where-copy">
							<h3><?php echo esc_html( $help['title'] ); ?></h3>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-process' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-process">
		<div class="rx-wrap">
			<h2>How Rectify Re-Levels Brick Mailbox Piers &amp; Short Masonry Fences</h2>
			<div class="rx-brick-process-grid">
				<?php foreach ( $steps as $step ) : ?>
					<article class="rx-brick-process-step">
						<span><?php echo esc_html( $step['number'] ); ?></span>
						<div>
							<h3><?php echo wp_kses_post( $step['title'] ); ?></h3>
							<p><?php echo wp_kses_post( $step['copy'] ); ?></p>
							<?php if ( ! empty( $step['copy2'] ) ) : ?>
								<p><?php echo wp_kses_post( $step['copy2'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $step['related_text'] ) ) : ?>
								<p class="rx-brick-related"><strong><?php echo esc_html( $step['related_label'] ); ?></strong> <a href="<?php echo esc_url( $step['related_url'] ); ?>"><?php echo esc_html( $step['related_text'] ); ?> <img class="rx-brick-arrow-icon" src="<?php echo esc_url( $brick_images['arrow_icon'] ); ?>" alt=""></a></p>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-benefits' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-benefits">
		<div class="rx-wrap rx-brick-benefits-grid">
			<figure>
				<img src="<?php echo esc_url( $brick_images['benefits'] ); ?>" alt="Brick mailbox pier on a residential street">
			</figure>
			<div>
				<h2>Benefits</h2>
				<div class="rx-brick-checklist">
					<?php foreach ( $benefits as $benefit ) : ?>
						<div class="rx-brick-check-item">
							<img class="rx-brick-check-icon" src="<?php echo esc_url( $brick_images['check_icon'] ); ?>" alt="">
							<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
							<p><?php echo wp_kses_post( $benefit['copy'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-issues' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-issues">
		<div class="rx-wrap rx-brick-issues-grid">
			<div>
				<h2>Typical Issues We Fix</h2>
				<ul class="rx-brick-issue-list">
					<?php foreach ( $issues as $issue ) : ?>
						<li><img class="rx-brick-arrow-icon" src="<?php echo esc_url( $brick_images['arrow_icon'] ); ?>" alt=""><span><?php echo esc_html( $issue ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<figure>
				<img src="<?php echo esc_url( $brick_images['issues'] ); ?>" alt="Masonry repair work">
			</figure>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-considerations' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-considerations">
		<div class="rx-wrap rx-brick-considerations-grid">
			<figure>
				<img src="<?php echo esc_url( $brick_images['considerations'] ); ?>" alt="Brick mailbox pier assessment">
			</figure>
			<div>
				<p class="rx-brick-label">IMPORTANT CONSIDERATIONS:</p>
				<h2>Vegetation, Reactivity &amp; Suitability</h2>
				<div class="rx-brick-copy-block">
					<?php
					$total = count( $considerations_paragraphs );
					foreach ( $considerations_paragraphs as $index => $paragraph ) :
						?>
						<p><?php echo esc_html( $paragraph ); ?></p>
						<?php if ( $index < $total - 1 ) : ?>
							<hr class="rx-brick-divider">
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-why' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-brick-band rx-brick-why" style="<?php echo esc_attr( '--rx-brick-contour:url(' . esc_url_raw( $brick_images['contour'] ) . ')' ); ?>">
		<div class="rx-wrap">
			<h2>Why Choose Rectify</h2>
			<div class="rx-brick-why-grid">
				<?php foreach ( $why_cards as $card ) : ?>
					<article class="rx-brick-why-card">
						<span class="rx-brick-why-icon"><img src="<?php echo esc_url( $card['icon'] ); ?>" alt=""></span>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo wp_kses_post( $card['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-brick-cta' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section id="ready-to-relevel" class="rx-brick-band rx-brick-cta">
		<div class="rx-wrap rx-brick-cta-grid">
			<div class="rx-brick-cta-copy">
				<h2>Ready to Re-Level Your Mailbox or Front Fence?</h2>
				<p>We&rsquo;ll assess your site and recommend the most efficient remediation plan.</p>
			</div>
			<div class="rx-brick-cta-actions">
				<a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">CONTACT US</a>
				<a class="rx-btn rx-btn-ghost" href="tel:1800182020"><img class="rx-brick-cta-icon" src="<?php echo esc_url( rx_asset_url( 'images/commercial-void-filling/cta-phone.svg' ) ); ?>" alt="" aria-hidden="true">1800 18 20 20</a>
				<a class="rx-btn rx-btn-ghost" href="mailto:admin@rectify.com.au"><img class="rx-brick-cta-icon" src="<?php echo esc_url( rx_asset_url( 'images/commercial-void-filling/cta-mail.svg' ) ); ?>" alt="" aria-hidden="true">admin@rectify.com.au</a>
			</div>
		</div>
	</section>
	<?php } ?>

</article>
