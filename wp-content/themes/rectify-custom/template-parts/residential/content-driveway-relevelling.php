<?php
/**
 * Driveway Re-Levelling page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$driveway_images = array(
	'hero'     => rx_asset_url( 'images/driveway-relevelling/driveway-edge.png' ),
	'move'     => rx_asset_url( 'images/driveway-relevelling/driveway-cracked.png' ),
	'benefits' => rx_asset_url( 'images/driveway-relevelling/driveway-benefits.png' ),
	'issues'   => rx_asset_url( 'images/driveway-relevelling/sunken-panels.png' ),
);

$related_links = array(
	'foundation_repair' => home_url( '/residential/foundation-repair/' ),
	'ground_subsidence' => home_url( '/residential/ground-improvement/' ),
	'slab_lifting'      => home_url( '/residential/slab-lifting-slab-jacking/' ),
	'ground_stabilise'  => home_url( '/residential/ground-improvement/' ),
	'uneven_floors'     => home_url( '/residential/house-relevelling/' ),
	'cracked_walls'     => home_url( '/residential/wall-cracks/' ),
);

$why_points = array(
	'Reactive soil cycles (wet/dry) causing shrink/swell and differential movement.',
	'Uncontrolled fill / poor compaction leading to long-term consolidation.',
	'Erosion or washout around downpipes, irrigation lines or unsealed panel joints.',
	'Traffic and point loads (cars, boats, trailers) that overload weak spots.',
);

$process_steps = array(
	array(
		'number'  => '01',
		'title'   => 'Assess & Map',
		'copy'    => 'We survey levels, locate voids/soft zones, and define injection points away from edges and services.',
		'related' => '',
	),
	array(
		'number'  => '02',
		'title'   => 'Targeted Resin Injection',
		'copy'    => 'Small holes are drilled and a high-strength expanding resin is injected at appropriate depths depending upon the contributing factors and desired outcome. The resin fills voids, binds loose material, increases bearing capacity, and can gently lift the slab back toward level.',
		'related' => array( 'Ground Subsidence', $related_links['ground_stabilise'] ),
	),
	array(
		'number'  => '03',
		'title'   => 'Controlled Lift & Checks',
		'copy'    => 'Lift is applied in micro-increments and monitored continuously (levels, joints, falls to drains).',
		'related' => array( 'Slab Lifting', $related_links['slab_lifting'] ),
	),
	array(
		'number'  => '04',
		'title'   => 'Finish & Verify',
		'copy'    => 'Holes are plugged, joints can be sealed, and before/after levels recorded. Where needed, we’ll advise on drainage improvements to prevent reocurrence.',
		'related' => '',
	),
);

$benefits = array(
	array(
		'title' => 'Non-destructive',
		'copy'  => 'Keep the existing slab—no bulk demolition.',
	),
	array(
		'title' => 'Fast return to service',
		'copy'  => 'Resin cures quickly; typical areas useable the same day',
	),
	array(
		'title' => 'Precise',
		'copy'  => 'Millimetre-scale control to restore falls and remove trip steps.',
	),
	array(
		'title' => 'Clean workface',
		'copy'  => 'Small injection points; minimal mess and waste.',
	),
);

$suitability_notes = array(
	'The slab may be too broken to act monolithically and lift together (multiple full-depth crack fragments, shattered corners, delamination).',
	'Treatment width may be too narrow to correct gradient adequately (insufficient slab size prohibits differential recovery).',
	'Treatment width may be too narrow to correct gradient adequately (insufficient slab size prohibits differential recovery).',
	'Severe root heave is the primary cause—resin won’t counter ongoing tree growth forces.',
	'We’ll perform a level survey to confirm the polarity of movement (heave vs settlement) and the extent of vertical change so you’ll know if ground remediation can realistically restore alignment.',
);

$cost_notes = array(
	'Small, isolated sections are often cheaper to replace than to remediate because resin works have a fixed entry cost and mobilisation. Larger areas or multiple panels tend to favour re-levelling, especially where demolition/reinstatement would be disruptive or expensive.',
);

$finish_matters = array(
	'Exposed aggregate / stencilled concrete are difficult to match on a partial replacement—re-levelling preserves the original look.',
	'Tiled/paved overlays may not be replaceable or available—re-levelling can retain these finishes intact.',
);

$function_notes = array(
	'If settlement has upset drainage, re-levelling can restore falls without a full rebuild.',
);

$issues = array(
	'Sunken panels creating trip steps at garage entries, thresholds, or path interfaces.',
	'Loss of falls to drains causing ponding.',
	'Void pumping and slab drumming over soft spots.',
	'Settled edges at crossovers and vehicle pads.',
);

$proof_cards = array(
	array(
		'icon'  => rx_asset_url( 'images/commercial-ground-improvement/icon-worker.svg' ),
		'title' => 'Engineering-Led Solutions',
		'copy'  => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.',
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
		'copy'  => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value.",
	),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-driveway-page rx-residential-figma' ); ?>>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-hero' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-hero">
		<div class="rx-driveway-wrap">
			<span class="rx-kicker"><?php esc_html_e( 'RESIDENTIAL SOLUTIONS', 'rectify-custom' ); ?></span>
			<h1><?php esc_html_e( 'Driveway Re-Levelling', 'rectify-custom' ); ?></h1>
			<nav class="rx-driveway-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">></span>
				<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">></span>
				<span><?php esc_html_e( 'Driveway Re-Levelling', 'rectify-custom' ); ?></span>
			</nav>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-intro' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-band rx-driveway-intro">
		<div class="rx-driveway-wrap rx-driveway-two-col">
			<div class="rx-driveway-copy">
				<h2><?php esc_html_e( 'Restore levels, remove trip hazards, and preserve your driveway’s appearance—cleanly and with minimal disruption.', 'rectify-custom' ); ?></h2>
				<p><?php esc_html_e( 'Slab driveways can settle or heave when soils change volume, lose bearing or are mobilised through water ingress. Our targeted ground improvement and controlled re-levelling re-supports the slab and lifts it back toward design level—often without removing the driveway or shutting down access for long periods. We inject engineered resin beneath the slab to fill voids, densify weak soils, and apply measured lift, with outcomes verified in real time.', 'rectify-custom' ); ?></p>
				<p class="rx-driveway-related">
					<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
					<a href="<?php echo esc_url( $related_links['foundation_repair'] ); ?>"><?php esc_html_e( 'Foundation Repair', 'rectify-custom' ); ?> <span class="rx-driveway-related-arrow" aria-hidden="true"></span></a>
				</p>
			</div>
			<figure class="rx-driveway-media">
				<img src="<?php echo esc_url( $driveway_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Cracked and uneven concrete slab', 'rectify-custom' ); ?>">
			</figure>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-why-moves' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-band rx-driveway-soft">
		<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
			<figure class="rx-driveway-media">
				<img src="<?php echo esc_url( $driveway_images['move'] ); ?>" alt="<?php esc_attr_e( 'Structural movement near a control joint', 'rectify-custom' ); ?>">
			</figure>
			<div class="rx-driveway-copy">
				<h2><?php esc_html_e( 'Why Driveways Move', 'rectify-custom' ); ?></h2>
				<ul class="rx-driveway-arrow-list">
					<?php foreach ( $why_points as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
				<p class="rx-driveway-related">
					<strong><?php esc_html_e( 'Related Problems:', 'rectify-custom' ); ?></strong>
					<a href="<?php echo esc_url( $related_links['ground_subsidence'] ); ?>"><?php esc_html_e( 'Ground Subsidence', 'rectify-custom' ); ?> <span class="rx-driveway-related-arrow" aria-hidden="true"></span></a>
				</p>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-process' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-process">
		<div class="rx-driveway-wrap">
			<h2><?php esc_html_e( 'How Driveway Re-Levelling Works', 'rectify-custom' ); ?></h2>
			<div class="rx-driveway-step-grid">
				<?php foreach ( $process_steps as $step ) : ?>
					<article class="rx-driveway-step">
						<span class="rx-driveway-step-number"><?php echo esc_html( $step['number'] ); ?></span>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['copy'] ); ?></p>
						<?php if ( ! empty( $step['related'] ) ) : ?>
							<p class="rx-driveway-related rx-driveway-step-related">
								<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
								<a href="<?php echo esc_url( $step['related'][1] ); ?>"><?php echo esc_html( $step['related'][0] ); ?> <span class="rx-driveway-related-arrow" aria-hidden="true"></span></a>
							</p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-benefits' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-band rx-driveway-soft">
		<div class="rx-driveway-wrap rx-driveway-two-col">
			<figure class="rx-driveway-media rx-driveway-tall-media">
				<img src="<?php echo esc_url( $driveway_images['benefits'] ); ?>" alt="<?php esc_attr_e( 'Before and after concrete repair comparison', 'rectify-custom' ); ?>">
			</figure>
			<div class="rx-driveway-benefit-copy">
				<h2><?php esc_html_e( 'Benefits', 'rectify-custom' ); ?></h2>
				<div class="rx-driveway-benefit-grid">
					<?php foreach ( $benefits as $benefit ) : ?>
						<article class="rx-driveway-benefit">
							<span class="rx-driveway-check" aria-hidden="true"></span>
							<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
							<p><?php echo esc_html( $benefit['copy'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-notes' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-band rx-driveway-notes">
		<div class="rx-driveway-wrap rx-driveway-notes-grid">
			<div>
				<h2><?php esc_html_e( 'Limitations & Suitability', 'rectify-custom' ); ?></h2>
				<?php foreach ( $suitability_notes as $note ) : ?>
					<p><?php echo esc_html( $note ); ?></p>
				<?php endforeach; ?>
			</div>
			<div>
				<h2><?php esc_html_e( 'Cost & Decision Factors', 'rectify-custom' ); ?></h2>
				<?php foreach ( $cost_notes as $note ) : ?>
					<p><?php echo esc_html( $note ); ?></p>
				<?php endforeach; ?>
				<div class="rx-driveway-small-note-grid">
					<div>
						<h3><?php esc_html_e( 'Finish Matters', 'rectify-custom' ); ?></h3>
						<?php foreach ( $finish_matters as $note ) : ?>
							<p><?php echo esc_html( $note ); ?></p>
						<?php endforeach; ?>
					</div>
					<div>
						<h3><?php esc_html_e( 'Functionality considerations', 'rectify-custom' ); ?></h3>
						<?php foreach ( $function_notes as $note ) : ?>
							<p><?php echo esc_html( $note ); ?></p>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-issues' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-band rx-driveway-soft">
		<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
			<figure class="rx-driveway-media">
				<img src="<?php echo esc_url( $driveway_images['issues'] ); ?>" alt="<?php esc_attr_e( 'Rectify vehicle at a worksite', 'rectify-custom' ); ?>">
			</figure>
			<div class="rx-driveway-copy">
				<h2><?php esc_html_e( 'Typical Issues We Fix', 'rectify-custom' ); ?></h2>
				<ul class="rx-driveway-arrow-list">
					<?php foreach ( $issues as $issue ) : ?>
						<li><?php echo esc_html( $issue ); ?></li>
					<?php endforeach; ?>
				</ul>
				<p class="rx-driveway-related">
					<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
					<a href="<?php echo esc_url( $related_links['uneven_floors'] ); ?>"><?php esc_html_e( 'Uneven Floors', 'rectify-custom' ); ?> <span class="rx-driveway-related-arrow" aria-hidden="true"></span></a>
					<a href="<?php echo esc_url( $related_links['cracked_walls'] ); ?>"><?php esc_html_e( 'Cracked Walls', 'rectify-custom' ); ?> <span class="rx-driveway-related-arrow" aria-hidden="true"></span></a>
				</p>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-why' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-proof" style="<?php echo esc_attr( '--rx-driveway-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
		<div class="rx-driveway-wrap">
			<h2><?php esc_html_e( 'Why Choose Rectify', 'rectify-custom' ); ?></h2>
			<div class="rx-driveway-proof-grid">
				<?php foreach ( $proof_cards as $card ) : ?>
					<article class="rx-driveway-proof-card">
						<span class="rx-driveway-proof-icon"><img src="<?php echo esc_url( $card['icon'] ); ?>" alt=""></span>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-driveway-cta' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-driveway-cta">
		<div class="rx-driveway-wrap">
			<h2><?php esc_html_e( 'Ready to Assess Your Driveway?', 'rectify-custom' ); ?></h2>
			<p><?php esc_html_e( 'We’ll inspect, map levels, and advise whether re-levelling or replacement offers the best result for your finish and budget.', 'rectify-custom' ); ?></p>
			<div class="rx-driveway-cta-actions">
				<a class="rx-driveway-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'CONTACT US', 'rectify-custom' ); ?></a>
				<a class="rx-driveway-cta-outline" href="tel:1800182020"><?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?></a>
				<a class="rx-driveway-cta-outline" href="mailto:admin@rectify.com.au"><?php esc_html_e( 'admin@rectify.com.au', 'rectify-custom' ); ?></a>
			</div>
		</div>
	</section>
	<?php } ?>

</article>
