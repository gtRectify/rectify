<?php
/**
 * Basement Construction Remedial Services page content template.
 *
 * Matches Figma node 154:2828 ("Basement Construction"). Content is
 * editable via the Rectify Page Builder meta box (see
 * rectify_pb_get_basement_construction_seed_blocks() in
 * class-seed-defaults.php for the seed/editable fields); the markup below
 * is only the fallback shown for any section that has not been saved yet,
 * and mirrors the "solution-*" block renderers in class-renderer.php.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$basement_images = array(
	'hero'                   => rx_asset_url( 'images/basement-construction-support/hero-basement.jpg' ),
	'concrete_repairs'       => rx_asset_url( 'images/basement-construction-support/concrete-repairs.jpg' ),
	'waterproofing'          => rx_asset_url( 'images/basement-construction-support/waterproofing.jpg' ),
	'foundation'             => rx_asset_url( 'images/basement-construction-support/foundation-reinforcement.jpg' ),
	'concrete_spalling'      => rx_asset_url( 'images/basement-construction-support/concrete-spalling.jpg' ),
	'corrective_method_icon' => rx_asset_url( 'icons-red/basement/corrective-method.svg' ),
);

$why_choose_cards = array(
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-worker.svg' ), 'title' => 'Engineering-Led Solutions', 'copy' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-expert.svg' ), 'title' => 'Proven Structural Expertise', 'copy' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-non-invasive.svg' ), 'title' => 'Non-Invasive Technology', 'copy' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-services-longterm.png' ), 'title' => 'Long-Term Confidence', 'copy' => 'We don\'t just repair today\'s problem—we strengthen your asset for long-term performance and lasting value.' ),
);

$process_steps = array(
	array( 'number' => '01', 'title' => 'Investigate & diagnose', 'copy' => 'Level surveys, moisture mapping, hammer sounding, cover meter scans, and (as needed) core tests or CCTV of drains.' ),
	array( 'number' => '02', 'title' => 'Design the fix', 'copy' => 'Scope tailored to the cause: water management plus repairs, ground improvement plus lift, or structural strengthening.' ),
	array( 'number' => '03', 'title' => 'Execute with control', 'copy' => 'Low-impact methods; staged works around site operations; continuous monitoring of movement/flows.' ),
	array( 'number' => '04', 'title' => 'Verify & document', 'copy' => 'Watertightness checks, level re-surveys, pull-off/bond tests (as relevant), as-built records and maintenance advice.' ),
);

$concrete_repairs_symptoms = array(
	'Visible cracking (map, shrinkage, settlement, or structural cracks).',
	'Staining at cracks or joints; moisture tracking and efflorescence.',
	'Honeycombing, surface scaling, pop-outs, or laitance.',
	'Uneven floors, loss of falls to drains, or step hazards.',
	'Delamination/hollow "drumming" areas; local spalls—especially near corners/edges.',
);

$concrete_repairs_methods = array(
	array( 'title' => 'Crack injection', 'copy' => 'Epoxy injection for structural cracks; flexible PU injection for live/leaking cracks with movement or water.' ),
	array( 'title' => 'Patch & section repair', 'copy' => 'Remove unsound concrete; apply bonding primer; reinstate with polymer-modified or structural repair mortars; reinstate cover and finish.' ),
	array( 'title' => 'Stitching & dowelling', 'copy' => 'Stainless/galvanised bars or staples across cracks or interfaces to restore load transfer.' ),
	array( 'title' => 'Surface re-profiling', 'copy' => 'Grinding, levelling mortars, and joint arris rebuilding to restore functionality and drainage falls.' ),
	array( 'title' => 'Protective Sealing', 'copy' => 'Penetrating sealers or coatings to resist moisture ingress, abrasion, and chemical exposure.' ),
);

$waterproofing_symptoms = array(
	'Damp walls or floors; active leaks at construction joints or service penetrations.',
	'Hydrostatic pressure signs: water beads or "sweating" on negative (internal) surfaces.',
	'Efflorescence, mould/mildew, and musty odours.',
	'Corrosion staining from reinforcement; blistering/peeling coatings.',
);

$waterproofing_methods = array(
	array( 'title' => 'Leak sealing injection', 'copy' => 'Hydrophilic/hydrophobic PU or micro-cement grouts to stop active water at cracks, cold joints, and wall–slab interfaces.' ),
	array( 'title' => 'Membranes & coatings', 'copy' => 'Positive-side sheet or liquid membranes; negative-side cementitious/crystalline coatings where external access is limited.' ),
	array( 'title' => 'Joint systems', 'copy' => 'Waterstops, re-detailing of construction/movement joints, and joint sealant renewal.' ),
	array( 'title' => 'Surface re-profiling', 'copy' => 'Grinding, levelling mortars, and joint arris rebuilding to restore functionality and drainage falls.' ),
	array( 'title' => 'Protective sealing', 'copy' => 'Penetrating sealers or coatings to resist moisture ingress, abrasion, and chemical exposure.' ),
);

$foundation_symptoms = array(
	'Differential settlement: diagonal wall cracks, door binding, misaligned frames.',
	'Tilt/rotation of retaining walls or columns; racking of partitions.',
	'Slab deflection, rocking, or voids beneath slab edges (pumping).',
	'Recurring joint steps or trip hazards after patching.',
	'Delamination/hollow "drumming" areas; local spalls—especially near corners/edges.',
);

$foundation_methods = array(
	array( 'title' => 'Ground improvement', 'copy' => 'Resin injection to fill voids and compact weak zones; compaction or permeation grouting in granular fills to restore bearing and reduce permeability.' ),
	array( 'title' => 'Structural strengthening', 'copy' => 'Local thickening, additional reinforcement, steel/FRP plates/wraps to increase capacity where design loads have changed.' ),
	array( 'title' => 'Controlled lift', 'copy' => 'Micro-increment jacking or resin-assisted lift to re-establish levels, door clearances, and falls to drains—monitored in real time.' ),
);

$spalling_symptoms = array(
	'Rust-coloured staining; cracking parallel to reinforcement lines.',
	'Hollow-sounding areas under light hammer sounding.',
	'Localised bulging/delamination; concrete breaking away to expose corroded steel.',
	'Accelerated deterioration in humid or wet locations.',
);

$spalling_methods = array(
	array( 'title' => 'Break-out & preparation', 'copy' => 'Remove all unsound concrete; saw-cut perimeters; prepare a clean, profiled surface.' ),
	array( 'title' => 'Rebar Treatment', 'copy' => 'Clean to bright metal; continuity checks; apply passivating primer; replace/augment bars where section loss is significant.' ),
	array( 'title' => 'Corrosion mitigation', 'copy' => 'Install galvanic anodes or consider hybrid/cathodic protection in severe environments; apply anti-carbonation or chloride-resistant coatings.' ),
	array( 'title' => 'Structural patching', 'copy' => 'Place compatible, low-shrinkage repair mortar; cure and finish; reinstate cover and protective coatings.' ),
	array( 'title' => 'Follow-up sealing', 'copy' => 'Crack/joint sealing and hydrophobic impregnation to limit future ingress.' ),
);

$rx_basement_render_methods = function ( $items ) use ( $basement_images ) {
	foreach ( $items as $item ) : ?>
		<article class="rx-driveway-proof-card">
			<span class="rx-driveway-proof-icon"><img src="<?php echo esc_url( $basement_images['corrective_method_icon'] ); ?>" alt=""></span>
			<h3><?php echo esc_html( $item['title'] ); ?></h3>
			<p><?php echo esc_html( $item['copy'] ); ?></p>
		</article>
	<?php endforeach;
};
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-basement-page' ); ?>>

	<?php
	if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
		rectify_pb_render_page_sections( get_the_ID(), array(

			array(
				'key'    => 'residential-basement-hero',
				'render' => function () {
					?>
					<section class="rx-driveway-hero">
						<div class="rx-driveway-wrap">
							<span class="rx-kicker"><?php esc_html_e( 'RESIDENTIAL SOLUTIONS', 'rectify-custom' ); ?></span>
							<h1><?php esc_html_e( 'Basement Construction Remedial Services', 'rectify-custom' ); ?></h1>
							<nav class="rx-driveway-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
								<span aria-hidden="true">&gt;</span>
								<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
								<span aria-hidden="true">&gt;</span>
								<span><?php esc_html_e( 'Basement Construction Remedial Services', 'rectify-custom' ); ?></span>
							</nav>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-intro',
				'render' => function () use ( $basement_images ) {
					?>
					<section class="rx-driveway-band" data-rx-section="residential-basement-intro">
						<div class="rx-driveway-wrap rx-driveway-two-col">
							<div class="rx-driveway-copy">
								<h2><?php esc_html_e( 'Protect your basement against structural weaknesses, concrete damage, and water intrusion—so it remains safe, durable, and serviceable for the long term.', 'rectify-custom' ); ?></h2>
								<p><?php esc_html_e( 'Below are the most common remedial categories, the symptoms that signal a problem, and the corrective methods typically used to fix them.', 'rectify-custom' ); ?></p>
								<p class="rx-driveway-related">
									<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
									<a href="<?php echo esc_url( home_url( '/residential/foundation-repair/' ) ); ?>"><?php esc_html_e( 'Foundation Repair', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
								</p>
							</div>
							<figure class="rx-driveway-media">
								<img src="<?php echo esc_url( $basement_images['hero'] ); ?>" alt="<?php esc_attr_e( 'Basement structural damage and water intrusion', 'rectify-custom' ); ?>">
							</figure>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-concrete-repairs',
				'render' => function () use ( $basement_images, $concrete_repairs_symptoms ) {
					?>
					<section class="rx-driveway-band rx-driveway-soft" data-rx-section="residential-basement-concrete-repairs">
						<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
							<figure class="rx-driveway-media">
								<img src="<?php echo esc_url( $basement_images['concrete_repairs'] ); ?>" alt="<?php esc_attr_e( 'Concrete repair and stabilisation', 'rectify-custom' ); ?>">
							</figure>
							<div class="rx-driveway-copy">
								<h2><?php esc_html_e( 'Concrete Repairs', 'rectify-custom' ); ?></h2>
								<p class="rx-driveway-benefits-label"><?php esc_html_e( 'Typical Symptoms', 'rectify-custom' ); ?></p>
								<div class="rx-driveway-benefit-grid">
									<?php foreach ( $concrete_repairs_symptoms as $symptom ) : ?>
										<article class="rx-driveway-benefit">
											<span class="rx-driveway-check" aria-hidden="true"></span>
											<h3><?php echo esc_html( $symptom ); ?></h3>
										</article>
									<?php endforeach; ?>
								</div>
								<p class="rx-driveway-related">
									<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
									<a href="<?php echo esc_url( home_url( '/residential/wall-cracks/' ) ); ?>"><?php esc_html_e( 'Cracked Walls', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
									<a href="<?php echo esc_url( home_url( '/residential/house-relevelling/' ) ); ?>"><?php esc_html_e( 'Uneven Floors', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
								</p>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-concrete-repairs-methods',
				'render' => function () use ( $concrete_repairs_methods, $rx_basement_render_methods ) {
					?>
					<section class="rx-driveway-band bg-gray" data-rx-section="residential-basement-concrete-repairs-methods">
						<div class="rx-driveway-wrap">
							<div class="rx-driveway-benefit-copy">
								<h2><?php esc_html_e( 'Corrective Methods', 'rectify-custom' ); ?></h2>
								<div class="rx-driveway-proof-grid">
									<?php $rx_basement_render_methods( $concrete_repairs_methods ); ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-waterproofing',
				'render' => function () use ( $basement_images, $waterproofing_symptoms ) {
					?>
					<section class="rx-driveway-band" data-rx-section="residential-basement-waterproofing">
						<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
							<figure class="rx-driveway-media">
								<img src="<?php echo esc_url( $basement_images['waterproofing'] ); ?>" alt="<?php esc_attr_e( 'Waterproofing membrane installation', 'rectify-custom' ); ?>">
							</figure>
							<div class="rx-driveway-copy">
								<h2><?php esc_html_e( 'Waterproofing & Water Intrusion Control', 'rectify-custom' ); ?></h2>
								<p class="rx-driveway-benefits-label"><?php esc_html_e( 'Typical Symptoms', 'rectify-custom' ); ?></p>
								<div class="rx-driveway-benefit-grid">
									<?php foreach ( $waterproofing_symptoms as $symptom ) : ?>
										<article class="rx-driveway-benefit">
											<span class="rx-driveway-check" aria-hidden="true"></span>
											<h3><?php echo esc_html( $symptom ); ?></h3>
										</article>
									<?php endforeach; ?>
								</div>
								<p class="rx-driveway-related">
									<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
									<a href="<?php echo esc_url( home_url( '/residential/wall-cracks/' ) ); ?>"><?php esc_html_e( 'Cracked Walls', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
									<a href="<?php echo esc_url( home_url( '/residential/house-relevelling/' ) ); ?>"><?php esc_html_e( 'Uneven Floors', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
								</p>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-waterproofing-methods',
				'render' => function () use ( $waterproofing_methods, $rx_basement_render_methods ) {
					?>
					<section class="rx-driveway-band" data-rx-section="residential-basement-waterproofing-methods">
						<div class="rx-driveway-wrap">
							<div class="rx-driveway-benefit-copy">
								<h2><?php esc_html_e( 'Corrective Methods', 'rectify-custom' ); ?></h2>
								<div class="rx-driveway-proof-grid">
									<?php $rx_basement_render_methods( $waterproofing_methods ); ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-foundation',
				'render' => function () use ( $basement_images, $foundation_symptoms ) {
					?>
					<section class="rx-driveway-band rx-driveway-soft" data-rx-section="residential-basement-foundation">
						<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
							<figure class="rx-driveway-media">
								<img src="<?php echo esc_url( $basement_images['foundation'] ); ?>" alt="<?php esc_attr_e( 'Foundation reinforcement and stabilisation', 'rectify-custom' ); ?>">
							</figure>
							<div class="rx-driveway-copy">
								<h2><?php esc_html_e( 'Foundation Reinforcement & Stabilisation', 'rectify-custom' ); ?></h2>
								<p class="rx-driveway-benefits-label"><?php esc_html_e( 'Typical Symptoms', 'rectify-custom' ); ?></p>
								<div class="rx-driveway-benefit-grid">
									<?php foreach ( $foundation_symptoms as $symptom ) : ?>
										<article class="rx-driveway-benefit">
											<span class="rx-driveway-check" aria-hidden="true"></span>
											<h3><?php echo esc_html( $symptom ); ?></h3>
										</article>
									<?php endforeach; ?>
								</div>
								<p class="rx-driveway-related">
									<strong><?php esc_html_e( 'Related Service:', 'rectify-custom' ); ?></strong>
									<a href="<?php echo esc_url( home_url( '/residential/ground-improvement/' ) ); ?>"><?php esc_html_e( 'Ground Improvement', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
									<a href="<?php echo esc_url( home_url( '/residential/slab-lifting-slab-jacking/' ) ); ?>"><?php esc_html_e( 'Slab Lifting', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
								</p>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-foundation-methods',
				'render' => function () use ( $foundation_methods, $rx_basement_render_methods ) {
					?>
					<section class="rx-driveway-band bg-gray" data-rx-section="residential-basement-foundation-methods">
						<div class="rx-driveway-wrap">
							<div class="rx-driveway-benefit-copy">
								<h2><?php esc_html_e( 'Corrective Methods', 'rectify-custom' ); ?></h2>
								<div class="rx-driveway-proof-grid">
									<?php $rx_basement_render_methods( $foundation_methods ); ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-spalling',
				'render' => function () use ( $basement_images, $spalling_symptoms ) {
					?>
					<section class="rx-driveway-band" data-rx-section="residential-basement-spalling">
						<div class="rx-driveway-wrap rx-driveway-two-col rx-driveway-media-first">
							<figure class="rx-driveway-media">
								<img src="<?php echo esc_url( $basement_images['concrete_spalling'] ); ?>" alt="<?php esc_attr_e( 'Concrete spalling and deterioration treatment', 'rectify-custom' ); ?>">
							</figure>
							<div class="rx-driveway-copy">
								<h2><?php esc_html_e( 'Concrete Spalling ("Concrete Cancer") Remediation', 'rectify-custom' ); ?></h2>
								<p class="rx-driveway-benefits-label"><?php esc_html_e( 'Typical Symptoms', 'rectify-custom' ); ?></p>
								<div class="rx-driveway-benefit-grid">
									<?php foreach ( $spalling_symptoms as $symptom ) : ?>
										<article class="rx-driveway-benefit">
											<span class="rx-driveway-check" aria-hidden="true"></span>
											<h3><?php echo esc_html( $symptom ); ?></h3>
										</article>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-spalling-methods',
				'render' => function () use ( $spalling_methods, $rx_basement_render_methods ) {
					?>
					<section class="rx-driveway-band" data-rx-section="residential-basement-spalling-methods">
						<div class="rx-driveway-wrap">
							<div class="rx-driveway-benefit-copy">
								<h2><?php esc_html_e( 'Corrective Methods', 'rectify-custom' ); ?></h2>
								<div class="rx-driveway-proof-grid">
									<?php $rx_basement_render_methods( $spalling_methods ); ?>
								</div>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-process',
				'render' => function () use ( $process_steps ) {
					?>
					<section class="rx-driveway-process">
						<div class="rx-driveway-wrap">
							<h2><?php esc_html_e( 'Our Delivery Process', 'rectify-custom' ); ?></h2>
							<div class="rx-driveway-step-grid">
								<?php foreach ( $process_steps as $step ) : ?>
									<article class="rx-driveway-step">
										<span class="rx-driveway-step-number"><?php echo esc_html( $step['number'] ); ?></span>
										<h3><?php echo esc_html( $step['title'] ); ?></h3>
										<p><?php echo esc_html( $step['copy'] ); ?></p>
									</article>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php
				},
			),

			array(
				'key'    => 'residential-basement-why',
				'render' => function () use ( $why_choose_cards ) {
					?>
					<section class="rx-driveway-proof" style="<?php echo esc_attr( '--rx-driveway-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
						<div class="rx-driveway-wrap">
							<h2><?php esc_html_e( 'Why Choose Rectify', 'rectify-custom' ); ?></h2>
							<div class="rx-driveway-proof-grid">
								<?php foreach ( $why_choose_cards as $card ) : ?>
									<article class="rx-driveway-proof-card">
										<span class="rx-driveway-proof-icon"><img src="<?php echo esc_url( $card['icon'] ); ?>" alt=""></span>
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
				'key'    => 'residential-basement-cta',
				'render' => function () {
					?>
					<section class="rx-driveway-cta">
						<div class="rx-driveway-wrap">
							<h2><?php esc_html_e( 'Ready to Strengthen and Waterproof Your Basement?', 'rectify-custom' ); ?></h2>
							<p><?php esc_html_e( 'We\'ll assess the issues, explain options (repair vs replacement), and deliver a clear program and budget.', 'rectify-custom' ); ?></p>
							<div class="rx-driveway-cta-actions">
								<a class="rx-driveway-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'CONTACT US', 'rectify-custom' ); ?></a>
								<a class="rx-driveway-cta-outline" href="tel:1800182020"><?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?></a>
								<a class="rx-driveway-cta-outline" href="mailto:admin@rectify.com.au"><?php esc_html_e( 'admin@rectify.com.au', 'rectify-custom' ); ?></a>
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
