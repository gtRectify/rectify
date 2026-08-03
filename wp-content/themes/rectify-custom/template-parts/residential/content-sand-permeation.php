<?php
/**
 * Sand Permeation Grouting & Non-Cohesive Soil Control page content template.
 *
 * Styling lives entirely in assets/css/residential-inner-pages.css, scoped
 * under the .rx-sand-page wrapper (Figma node 152:2317).
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sand_risk_icon = rx_asset_url( 'icons-red/Rectify Icon Set_Sand Permeation_red.svg' );
$sand_check_icon = rx_asset_url( 'icons-red/Rectify Icon Set_Check_red.svg' );

$risk_items = array(
	array( 'title' => 'No cohesion', 'copy' => "Faces ravel and collapse ('running sand') during excavation." ),
	array( 'title' => 'High Permeability', 'copy' => 'Water drives fines migration, piping/boiling and scour voids.' ),
	array( 'title' => 'Load Transfer', 'copy' => 'Local loss of bearing leads to slab deflection and differential settlement.' ),
	array( 'title' => 'Service Influence', 'copy' => 'Broken stormwater/irrigation and dewatering drawdown can accelerate material mobilisation.' ),
);

$scenarios = array(
	'Utility corridors and culvert inlets/outlets experiencing scour and voiding.',
	'Retention/SECANT pile support zones where sands would overbreak or wash out.',
	'Driveway/pavement panels and approach slabs with edge washout (\'pumping\').',
	'Coastal and riverine sites with fluctuating groundwater or flood recovery works.',
	'Pre-treatment for trenches, pits and lift shafts in sandy ground.',
);

$steps = array(
	array(
		'number' => '01',
		'title'  => 'Ground Model & Feasibility',
		'copy'   => 'Assess whether the soil is genuinely groutable sand rather than silty or clay-heavy material. This stage defines groundwater conditions, fines content, permeability, density, and movement constraints to determine if permeation grouting is viable. The main goal is establishing the treatment envelope and acceptance criteria before any injection begins.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-1.png' ),
	),
	array(
		'number' => '02',
		'title'  => 'Bench Treatability & Grout Selection',
		'copy'   => 'Test grout compatibility with the actual soil pore structure to ensure the grout can permeate without filtering, washing out, or setting too early. Grout type is selected based on particle size and performance requirements, typically using microfine cement for cleaner sands and colloidal silica or chemical grouts for finer or seepage-prone soils. Viscosity, gel time, bleed, and stability are critical QA factors.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-2.png' ),
	),
	array(
		'number' => '03',
		'title'  => 'Injection Grid & Pilot Calibration',
		'copy'   => 'Develop the injection layout, spacing, staging, and pressure controls through a controlled pilot area. This phase calibrates the relationship between pressure, flow, grout take, and ground response before full production begins. Monitoring systems are established to prevent hydrofracture, uplift, or uncontrolled grout migration.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-3.png' ),
	),
	array(
		'number' => '04',
		'title'  => 'Primary Permeation Pass',
		'copy'   => 'Carry out the main grout injection process using controlled low-pressure permeation to fill the natural pore spaces without displacing the soil structure. The objective is to create a continuous strengthened and water-tightened ground mass while maintaining stable intake rates and preventing heave or fracturing. Continuous pressure, flow, and volume monitoring are essential during execution.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-4.png' ),
	),
	array(
		'number' => '05',
		'title'  => 'Secondary Closure & Water Cut-Off',
		'copy'   => 'Perform secondary or tertiary injections to close untreated windows and improve curtain continuity. This stage strengthens local weak zones and further reduces seepage pathways, often using finer or lower-viscosity grouts to penetrate remaining pore spaces missed during the primary pass. Hydraulic continuity and seepage reduction become the main performance targets.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-5.png' ),
	),
	array(
		'number' => '06',
		'title'  => 'Verification & Construction Integration',
		'copy'   => 'Validate the completed treatment using independent proof testing such as permeability testing, CPTs, coring, pressure testing, or load testing. The grouted ground is then integrated into excavation, dewatering, footing support, or construction sequencing. Any areas failing acceptance criteria are identified for remedial injection before construction proceeds.',
		'image'  => rx_asset_url( 'images/sand-permeation/process-step-6.png' ),
	),
);

$benefits = array(
	array( 'title' => 'Stable Excavation', 'copy' => 'Reduced ravel/collapse risk.' ),
	array( 'title' => 'Controlled Inflows', 'copy' => 'Reduced washout of fines.' ),
	array( 'title' => 'Improved Bearing Capacity', 'copy' => 'Mitigates slab deflection and settlement.' ),
	array( 'title' => 'Non-destructive Delivery', 'copy' => 'Small injection points; minimal disruption.' ),
);

$suitability_notes = array(
	"Very fine silts/clayey soils may not accept permeation grouts—alternative methods required. High groundwater velocities can cause grout washout; cut-off or staged dewatering may be needed.",
	"Access constraints or sensitive adjacent structures may limit injection pressures/spacing. Global stability issues (e.g., active slope movement) must be addressed in parallel—not just local sand binding.",
);

$cost_notes = array(
	'Small, shallow, isolated areas may be cheaper to excavate and replace; injection has fixed entry/mobilisation costs.',
	'Larger treatment zones or works near valuable finishes/services favour grouting to avoid demolition and reinstatement.',
	'Program risk: pre-treating sands to prevent collapse or inflows often avoids costly delays mid-construction.',
);

$why_choose_cards = array(
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-worker.svg' ), 'title' => 'Engineering-Led Solutions', 'copy' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-expert.svg' ), 'title' => 'Proven Structural Expertise', 'copy' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-non-invasive.svg' ), 'title' => 'Non-Invasive Technology', 'copy' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-services-longterm.png' ), 'title' => 'Long-Term Confidence', 'copy' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.' ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-sand-page rx-ci-page rx-subpage rx-residential-figma' ); ?>>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-hero' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-hero-panel">
		<div class="rx-wrap rx-reveal">
			<span class="rx-kicker">RESIDENTIAL SOLUTIONS</span>
			<h1>Sand permeation grouting &amp; non-cohesive soil control</h1>
			<nav class="rx-sand-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">&rsaquo;</span>
				<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">&rsaquo;</span>
				<span>Sand permeation grouting &amp; non-cohesive soil control</span>
			</nav>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-intro' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-intro">
		<div class="rx-wrap rx-sand-intro-grid">
			<div class="rx-sand-intro-copy rx-reveal">
				<h2>Stabilise running sands, control groundwater, and prevent excavation failure&mdash;safely and with minimal disruption.</h2>
				<p>Non-cohesive soils (sands and some gravels) lack the natural &lsquo;stick&rsquo; that holds excavations upright. High permeability allows fines to mobilise, causing voids, loss of support, and slab/footing deflection. Our sand-permeation and ground improvement solutions bind loose grains, reduce permeability, and create a stable, uniform mass that supports construction and protects adjacent assets.</p>
				<p class="rx-sand-related">
					<strong>Related Service:</strong>
					<a href="<?php echo esc_url( home_url( '/residential/ground-improvement/' ) ); ?>">
						Ground Improvement
						<svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2 9h13.5M9.5 3.5 15.5 9l-6 5.5" stroke="#BD1726" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</a>
				</p>
			</div>
			<figure class="rx-sand-intro-media rx-reveal">
				<img src="<?php echo esc_url( rx_asset_url( 'images/sand-permeation/intro-permeation-grout.png' ) ); ?>" alt="Shallow compaction grout compared with shallow permeation grout beneath a house">
			</figure>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-risk' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-band rx-sand-soft">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Why non-cohesive soils create risk</h2>
			<div class="rx-sand-risk-grid rx-stagger">
				<?php foreach ( $risk_items as $item ) : ?>
					<article class="rx-sand-risk-card">
						<img class="rx-sand-risk-icon" src="<?php echo esc_url( $sand_risk_icon ); ?>" alt="">
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-scenarios' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-band">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Typical scenarios &amp; examples</h2>
			<div class="rx-sand-scenarios-grid rx-stagger">
				<?php foreach ( $scenarios as $scenario ) : ?>
					<article class="rx-sand-scenario-card">
						<img src="<?php echo esc_url( $sand_check_icon ); ?>" alt="">
						<p><?php echo esc_html( $scenario ); ?></p>
					</article>
				<?php endforeach; ?>
				<div class="rx-sand-scenario-decor" aria-hidden="true"></div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-process' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-band rx-sand-soft">
		<div class="rx-wrap">
			<h2 class="rx-reveal">How Sand-Permeation Works</h2>
			<div class="rx-sand-process-grid rx-stagger">
				<?php foreach ( $steps as $step ) : ?>
					<article class="rx-sand-process-card">
						<figure>
							<img src="<?php echo esc_url( $step['image'] ); ?>" alt="">
						</figure>
						<div class="rx-sand-process-head">
							<span class="rx-sand-process-number"><?php echo esc_html( $step['number'] ); ?></span>
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
						</div>
						<p><?php echo esc_html( $step['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-benefits' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-band">
		<div class="rx-wrap rx-sand-benefits-grid">
			<figure class="rx-sand-benefits-media rx-reveal">
				<img src="<?php echo esc_url( rx_asset_url( 'images/sand-permeation/benefits-photo.png' ) ); ?>" alt="Rectify crew reviewing sand permeation grout panels on site">
			</figure>
			<div class="rx-sand-benefits-copy rx-reveal">
				<h2>Benefits</h2>
				<div class="rx-sand-benefit-grid rx-stagger">
					<?php foreach ( $benefits as $benefit ) : ?>
						<article class="rx-sand-benefit-item">
							<img src="<?php echo esc_url( $sand_check_icon ); ?>" alt="">
							<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
							<p><?php echo esc_html( $benefit['copy'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-notes' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-band rx-sand-soft">
		<div class="rx-wrap rx-sand-notes-grid">
			<div class="rx-sand-notes-col rx-reveal">
				<h2>Limitations &amp; Suitability</h2>
				<?php foreach ( $suitability_notes as $note ) : ?>
					<p><?php echo esc_html( $note ); ?></p>
				<?php endforeach; ?>
			</div>
			<div class="rx-sand-notes-col rx-reveal">
				<h2>Cost &amp; Decision Factors</h2>
				<?php foreach ( $cost_notes as $note ) : ?>
					<p><?php echo esc_html( $note ); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-why' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-ci-why-choose rx-ci-void-why" style="<?php echo esc_attr( '--rx-ci-contour:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ')' ); ?>">
		<div class="rx-ci-wrap">
			<h2 class="rx-reveal">Why Choose Rectify</h2>
			<div class="rx-ci-void-why-grid rx-stagger">
				<?php foreach ( $why_choose_cards as $card ) : ?>
					<article class="rx-ci-why-choose-card">
						<img src="<?php echo esc_url( $card['icon'] ); ?>" alt="" class="rx-ci-why-choose-icon">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-sand-cta' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-sand-cta">
		<div class="rx-wrap rx-reveal">
			<h2>Ready to Stabilise Sands and Control Mobilisation?</h2>
			<div class="rx-sand-cta-copy">
				<p>We&rsquo;ll assess your ground conditions, design the right mix of permeation/compaction/resin solutions, and coordinate any water management needed to keep works safe and on schedule.</p>
			</div>
			<div class="rx-sand-cta-actions">
				<a class="rx-sand-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a>
				<a class="rx-sand-cta-outline" href="tel:1800182020"><span class="rx-sand-cta-icon rx-sand-cta-icon-phone" aria-hidden="true"></span>1800 18 20 20</a>
				<a class="rx-sand-cta-outline" href="mailto:admin@rectify.com.au"><span class="rx-sand-cta-icon rx-sand-cta-icon-mail" aria-hidden="true"></span>admin@rectify.com.au</a>
			</div>
		</div>
	</section>
	<?php } ?>

</article>
