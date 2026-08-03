<?php
/**
 * Chemical Underpinning page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$engineering_points = array(
	'Fills underground voids',
	'Densifies weak soils',
	'Improves load-bearing capacity',
	'Restores uniform support beneath the foundation',
	'Can carefully re-level sections of the structure where appropriate',
);

$signs = array(
	array( 'title' => 'Cracks appearing in internal or external walls', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-cracked-walls.jpg' ) ),
	array( 'title' => 'Doors and windows becoming difficult to open or close', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-doors-windows.jpg' ) ),
	array( 'title' => 'Uneven, sloping or sinking floors', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-sloping-floor.jpg' ) ),
	array( 'title' => 'Gaps forming around skirting boards, cornices or ceilings', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-gaps.jpg' ) ),
	array( 'title' => 'Exterior brick cracking', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-exterior-cracking.jpg' ) ),
	array( 'title' => 'Windows sticking', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-windows-sticking.jpg' ) ),
	array( 'title' => 'Visible slab settlement', 'image' => rx_asset_url( 'images/residential/chemical-underpinning/sign-visible-settlement.jpg' ) ),
);

$uses = array(
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-residential-home.svg' ), 'title' => 'Residential Homes' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-house-extensions.svg' ), 'title' => 'House Extensions' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-reactive-soil.svg' ), 'title' => 'Settlement Caused by Reactive Soil' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-raft-slab.svg' ), 'title' => 'Raft Slab Foundations' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-waffle-slab.svg' ), 'title' => 'Waffle Slab Foundations' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-garage.svg' ), 'title' => 'Garage' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-void-foundation.svg' ), 'title' => 'Void Remediation beneath Foundations' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/use-floor-slab.svg' ), 'title' => 'Internal Floor Slab' ),
);

$why_choose_cards = array(
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/why-engineering.svg' ), 'title' => 'Engineering-Led Solutions', 'copy' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/why-expertise.svg' ), 'title' => 'Proven Structural Expertise', 'copy' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.' ),
	array( 'icon' => rx_asset_url( 'images/residential/chemical-underpinning/why-non-invasive.svg' ), 'title' => 'Non-Invasive Technology', 'copy' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-services-longterm.png' ), 'title' => 'Long-Term Confidence', 'copy' => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.' ),
);

$process = array(
	array( 'number' => '01', 'title' => 'Structural Assessment', 'copy' => 'We inspect your home to identify the cause of movement and determine whether chemical underpinning is the appropriate solution.' ),
	array( 'number' => '02', 'title' => 'Site Preparation', 'copy' => 'Our team identifies treatment zones, completes pre-condition surveys, verifies underground services and prepares the work area before injection begins.' ),
	array( 'number' => '03', 'title' => 'Precision Resin Injection', 'copy' => 'Small injection ports are installed through the slab and engineered resin is injected at carefully controlled depths and pressures to improve the supporting soils.' ),
	array( 'number' => '04', 'title' => 'Continuous Monitoring', 'copy' => 'Throughout the injection process we monitor floor levels and structural movement using precision laser equipment to ensure accurate control.' ),
	array( 'number' => '05', 'title' => 'Completion & Verification', 'copy' => 'Injection points are sealed, floor levels are rechecked where applicable and comprehensive project documentation is completed.' ),
);

$causes = array(
	array( 'icon' => rx_asset_url( 'icons-red/Rectify Icon Set_Reactive Soil_red.svg' ), 'title' => 'Founding in Reactive Clay Soil', 'copy' => 'Clay soils has the ability to absorb or dispel moisture. In a wet environment, clay will absorb moisture increasing its plasticity and expanding. This causes heave in footings and structures. In contrast, in hot and dry environments, it becomes hard, brittle and non-plastic shrinking in the process. During periods of prolonged drought, the clay shrinks to the extent that the structure supported by it subsides significantly. Any other cause for loss of moisture in clay will cause subsidence and settlement, this includes trees and vegetation, or the construction of a new structure which affects the impermeability of soil beside structure.' ),
	array( 'icon' => rx_asset_url( 'icons-red/Rectify Icon Set_Water leaking_red.svg' ), 'title' => 'Flooding and Water Erosion', 'copy' => 'Poor site drainage can lead to water ponding against and seeping below a concrete structure, be it a house or a warehouse slab. The water weakens soil and washes away the silt/sands from silty and sandy clays. This leads to voids and weakening of soil causing subsidence. Cracked or leaking pipes (drainage or sewer) is another cause of poor site drainage. Therefore, we recommend regular checks of all pipes for any signs of leak.' ),
	array( 'icon' => rx_asset_url( 'icons-red/Rectify Icon Set_Void Beneath Foundation_red.svg' ), 'title' => 'Undermining or Due to Adjoining Footing Construction', 'copy' => 'If the adjoining land to your property is vacant, and during slab preparation your footing is undermined, that is the adjoining cut is below the bottom of your footing, this may loosen soil and cause subsidence.' ),
	array( 'icon' => rx_asset_url( 'icons-red/Rectify Icon Set_Slab Lifting_red.svg' ), 'title' => 'Load Exceeds Concrete Strength and Soil Bearing Capacity', 'copy' => 'A 150mm thick concrete slab can typically support a weight of 860kg/m2. However, the soil supporting the slab can have less support weight/bearing capacity. Once a structure or another type of load, such as a heavy vehicle, overloads this limit, the concrete begins to weaken and cracks can begin to form and soil underneath starts to settle. This creates openings for moisture to enter; weakening the underlying soil. A crack that is 5mm wide has the potential to reduce the weight capacity by up to half of its initial strength.' ),
	array( 'icon' => rx_asset_url( 'icons-red/Rectify Icon Set_Corrective Method.svg' ), 'title' => 'Poor Workmanship and Inadequate Founding', 'copy' => 'Waffle slab footing (edge and internal beams) can be supported on up to 300mm of "controlled fill". The controlled fill has a strict method of laying, and is required to be of clayey materials with 97% of moisture. We recommend that all edge ribs are trenched through this fill and founded into natural clay. However, when the ribs are founded on fill, if it hasn\'t been prepared as per requirements set out in AS2870 - Residential Slabs and Footings, then the fill will settle over time and the slab will subside and show signs of distress.' ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-chemical-page rx-ci-page rx-subpage rx-residential-figma' ); ?>>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-hero' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-hero-panel">
		<div class="rx-wrap rx-reveal">
			<span class="rx-kicker">RESIDENTIAL SOLUTIONS</span>
			<h1>Chemical Underpinning</h1>
			<nav class="rx-chemical-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">&rsaquo;</span>
				<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
				<span aria-hidden="true">&rsaquo;</span>
				<span>Chemical Underpinning</span>
			</nav>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-what' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-what">
		<div class="rx-wrap rx-chemical-what-grid">
			<div class="rx-chemical-what-left rx-reveal">
				<h2>What is Chemical Underpinning?</h2>
				<div class="rx-chemical-what-images">
					<figure><img src="<?php echo esc_url( rx_asset_url( 'images/residential/chemical-underpinning/underpinning-process.jpg' ) ); ?>" alt="Chemical underpinning beneath a home"></figure>
					<figure><img src="<?php echo esc_url( rx_asset_url( 'images/residential/chemical-underpinning/resin-samples.jpg' ) ); ?>" alt="Expanded underpinning resin samples"></figure>
				</div>
			</div>
			<div class="rx-chemical-what-right rx-reveal">
				<h2>Engineering the Ground Beneath Your Home</h2>
				<div class="rx-chemical-richtext">
					<p>Chemical underpinning is an advanced ground stabilisation method that improves weak or unstable soils beneath existing foundations.</p>
					<p>Also known as polyurethane underpinning is the process of injecting a 2-part resin under the affected area of the slab, causing a rapid expansion which fills any empty spaces (or voids) in the soil. This strengthens the soil and creates a strong base which ensures that the property will no longer sink. Using this solid base, more resin is then injected on top causing the property to lift back into the original position and returning it to a near new state.</p>
					<p>Rather than excavating beneath your home, specially engineered expanding polyurethane resin is injected into carefully selected locations beneath the slab.</p>
				</div>
				<div class="rx-chemical-key-aspects">
					<h3>As the resin expands, it:</h3>
					<ul>
						<?php foreach ( $engineering_points as $point ) : ?><li><?php echo esc_html( $point ); ?></li><?php endforeach; ?>
					</ul>
				</div>
				<p class="rx-chemical-engineering-note">The result is a stronger, more stable foundation with minimal disruption to your property.</p>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-signs' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-signs">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Common Signs You May Need Chemical Underpinning</h2>
			<p class="rx-chemical-signs-intro rx-reveal">Many Australian homes are built on reactive clay soils that naturally expand and contract as moisture levels change. Over time, this movement can place stress on your home's foundation, leading to structural issues that become more costly if left untreated.</p>
			<div class="rx-chemical-signs-grid rx-stagger">
				<?php foreach ( $signs as $sign ) : ?>
					<article class="rx-chemical-sign-card">
						<figure>
							<img src="<?php echo esc_url( $sign['image'] ); ?>" alt="">
						</figure>
						<h3><?php echo esc_html( $sign['title'] ); ?></h3>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="rx-chemical-signs-note rx-reveal">If you've noticed one or more of these issues, an inspection can determine whether foundation movement is the underlying cause.</p>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-uses' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-uses">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Chemical Underpinning Can Be Used For</h2>
			<div class="rx-chemical-uses-grid rx-stagger">
				<?php foreach ( $uses as $use ) : ?>
					<div class="rx-chemical-use-row">
						<span class="rx-chemical-card-icon"><img src="<?php echo esc_url( $use['icon'] ); ?>" alt=""></span>
						<h3><?php echo esc_html( $use['title'] ); ?></h3>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-why' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-why" style="<?php echo esc_attr( '--rx-chemical-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Why Choose Rectify</h2>
			<div class="rx-chemical-why-grid rx-stagger">
				<?php foreach ( $why_choose_cards as $card ) : ?>
					<article class="rx-chemical-why-card">
						<img src="<?php echo esc_url( $card['icon'] ); ?>" alt="" class="rx-chemical-why-icon">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-process' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-process">
		<div class="rx-wrap">
			<h2 class="rx-reveal">Whatever the cause, our underpinning services can help.</h2>
			<div class="rx-chemical-process-grid rx-stagger">
				<?php foreach ( $process as $step ) : ?>
					<article class="rx-chemical-process-card">
						<span class="rx-chemical-process-number"><?php echo esc_html( $step['number'] ); ?></span>
						<div class="rx-chemical-process-copy">
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['copy'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-causes' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-causes">
		<div class="rx-wrap rx-chemical-causes-grid">
			<figure class="rx-chemical-causes-image rx-reveal">
				<img src="<?php echo esc_url( rx_asset_url( 'images/home/before-after-2.png' ) ); ?>" alt="Causes of damage">
			</figure>
			<div class="rx-reveal">
				<h2>Causes of damage:</h2>
				<div class="rx-chemical-causes-list">
					<?php foreach ( $causes as $cause ) : ?>
						<div class="rx-chemical-cause-item">
							<span class="rx-chemical-cause-icon"><img src="<?php echo esc_url( $cause['icon'] ); ?>" alt=""></span>
							<div>
								<h4><?php echo esc_html( $cause['title'] ); ?></h4>
								<p><?php echo esc_html( $cause['copy'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php if ( function_exists( 'rectify_builder_render_section' ) && rectify_builder_render_section( get_the_ID(), 'residential-chemical-cta' ) ) {
		// rendered by plugin, nothing else to do here
	} else { ?>
	<section class="rx-chemical-cta">
		<div class="rx-wrap rx-reveal">
			<h2>Protect Your Home Before Foundation Movement Gets Worse</h2>
			<div class="rx-chemical-cta-copy">
				<p>Foundation movement rarely improves without intervention.</p>
				<p>If you've noticed cracks, settlement or uneven floors, our specialists can determine the underlying cause and recommend the most appropriate solution for your home.</p>
			</div>
			<div class="rx-chemical-cta-actions">
				<a class="rx-btn rx-btn-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">CONTACT US</a>
				<a class="rx-chemical-contact-link" href="tel:1800182020">1800 18 20 20</a>
				<a class="rx-chemical-contact-link" href="mailto:admin@rectify.com.au">admin@rectify.com.au</a>
			</div>
		</div>
	</section>
	<?php } ?>

</article>
