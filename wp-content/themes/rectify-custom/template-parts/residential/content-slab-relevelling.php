<?php
/**
 * Slab Relevelling page content template.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$slab_images = array(
	'intro'     => rx_asset_url( 'images/slab-relevelling/intro-slab.jpg' ),
	'before'    => rx_asset_url( 'images/slab-relevelling/before-slab.jpg' ),
	'after'     => rx_asset_url( 'images/slab-relevelling/after-slab.jpg' ),
	'contours'  => rx_asset_url( 'images/home/Contour on Navy Blue.png' ),
);

$signs = array(
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/sign-uneven-floors.jpg' ),
		'title' => 'Uneven, sloping or sinking floors',
		'copy'  => 'Floors that no longer feel level can indicate that sections of the slab have settled unevenly.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/sign-cracked-tiles.jpg' ),
		'title' => 'Cracked Floor Tiles',
		'copy'  => 'Tiles that crack, lift or separate without impact are often responding to movement beneath the slab.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/sign-wall-gaps.jpg' ),
		'title' => 'Gaps Around Walls or Skirting Boards',
		'copy'  => 'As the slab shifts, small gaps can begin appearing where walls and flooring once met neatly.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/sign-doors-windows.jpg' ),
		'title' => 'Doors and Windows Becoming Difficult to Operate',
		'copy'  => 'Movement in the foundation can affect door frames and window openings, causing sticking or misalignment.',
	),
);

$causes = array(
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/cause-reactive-clay.jpg' ),
		'title' => 'Reactive Clay Soils',
		'copy'  => 'Many areas throughout Melbourne and South Australia contain reactive clay soils that expand when wet and shrink during dry conditions. This continual movement can gradually affect the support beneath the slab.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/cause-underground-voids.jpg' ),
		'title' => 'Underground Voids',
		'copy'  => 'Hidden voids beneath the slab reduce its bearing support, allowing sections of concrete to settle.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/cause-poorly-compacted-fill.jpg' ),
		'title' => 'Poorly Compacted Fill',
		'copy'  => 'If the ground was not adequately compacted during construction, gradual consolidation may occur over time.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/cause-water-drainage.jpg' ),
		'title' => 'Water Leaks and Drainage Problems',
		'copy'  => 'Leaking plumbing or poor drainage can soften the supporting soils and contribute to ongoing settlement.',
	),
	array(
		'image' => rx_asset_url( 'images/slab-relevelling/cause-soil-erosion.jpg' ),
		'title' => 'Soil Erosion',
		'copy'  => 'Water movement can wash away supporting material beneath the slab, leaving unsupported areas that eventually sink.',
	),
);

$process_steps = array(
	array(
		'number' => '01',
		'title'  => 'Structural Assessment',
		'copy'   => 'Our specialists inspect the slab, surrounding structures and ground conditions to identify the cause of movement.',
	),
	array(
		'number' => '02',
		'title'  => 'Precision Injection Points',
		'copy'   => 'Small access holes are created through the slab to reach the affected ground below.',
	),
	array(
		'number' => '03',
		'title'  => 'Chemical Underpinning',
		'copy'   => 'Engineered structural resin is injected beneath the slab. As it expands, it fills voids, strengthens weak ground and improves load-bearing capacity.',
	),
	array(
		'number' => '04',
		'title'  => 'Controlled Slab Relevelling',
		'copy'   => 'As ground support is restored, the slab can often be carefully relevelled while movement is continuously monitored for precision.',
	),
	array(
		'number' => '05',
		'title'  => 'Final Verification',
		'copy'   => 'Once the desired outcome has been achieved, the completed work is verified to ensure the slab has been stabilised and relevelled as intended.',
	),
);

$comparison_rows = array(
	array( 'traditional' => 'Removes and replaces the existing slab', 'rectify' => 'Retains the existing slab where suitable' ),
	array( 'traditional' => 'Extensive excavation and demolition', 'rectify' => 'Minimal excavation required' ),
	array( 'traditional' => 'Long construction periods', 'rectify' => 'Faster installation in many projects' ),
	array( 'traditional' => 'Significant disruption to the property', 'rectify' => 'Minimal disruption to daily life' ),
	array( 'traditional' => 'Addresses the concrete only', 'rectify' => 'Stabilises the supporting ground' ),
	array( 'traditional' => 'Large amounts of construction waste', 'rectify' => 'Lower environmental impact' ),
);

$why_choose_cards = array(
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-worker.svg' ), 'title' => 'Engineering-Led Solutions', 'copy' => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-expert.svg' ), 'title' => 'Proven Structural Expertise', 'copy' => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-non-invasive.svg' ), 'title' => 'Non-Invasive Technology', 'copy' => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.' ),
	array( 'icon' => rx_asset_url( 'images/commercial-ground-improvement/icon-services-longterm.png' ), 'title' => 'Long-Term Confidence', 'copy' => "We don't just repair today's problem—we strengthen your asset for long-term performance and lasting value." ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-slab-page' ); ?>>

	<?php
	if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
		rectify_pb_render_page_sections( get_the_ID(), array(
			array(
				'key'    => 'residential-slab-relevel-hero',
				'render' => function () {
					?>
					<section class="rx-slab-hero">
						<div class="rx-slab-wrap">
							<span class="rx-slab-kicker"><?php esc_html_e( 'RESIDENTIAL SOLUTIONS', 'rectify-custom' ); ?></span>
							<h1><?php esc_html_e( 'Slab Relevelling Melbourne, Adelaide & South Australia', 'rectify-custom' ); ?></h1>
							<nav class="rx-slab-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
								<span aria-hidden="true">&rsaquo;</span>
								<a href="<?php echo esc_url( home_url( '/residential/' ) ); ?>"><?php esc_html_e( 'Residential Solutions', 'rectify-custom' ); ?></a>
								<span aria-hidden="true">&rsaquo;</span>
								<span><?php esc_html_e( 'Slab Relevelling', 'rectify-custom' ); ?></span>
							</nav>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-intro',
				'render' => function () use ( $slab_images ) {
					?>
					<section class="rx-slab-band">
						<div class="rx-slab-wrap rx-slab-intro-grid">
							<div class="rx-slab-intro-copy">
								<h2><?php esc_html_e( 'Restore Sunken Concrete Slabs with Advanced Chemical Underpinning', 'rectify-custom' ); ?></h2>
								<p><?php esc_html_e( 'A sunken or uneven concrete slab is often the result of changing ground conditions beneath your property—not a failure of the concrete itself. Rectify uses advanced Chemical Underpinning technology to stabilise the supporting ground before precisely releveling the slab, helping restore structural performance with minimal disruption.', 'rectify-custom' ); ?></p>
								<p><?php esc_html_e( "Whether you're dealing with uneven floors in Melbourne, Adelaide, or anywhere across South Australia, our engineering-led approach addresses the underlying cause of slab settlement rather than simply treating the symptoms.", 'rectify-custom' ); ?></p>
							</div>
							<figure class="rx-slab-intro-media">
								<img src="<?php echo esc_url( $slab_images['intro'] ); ?>" alt="<?php esc_attr_e( 'House exterior showing a concrete slab and pathway', 'rectify-custom' ); ?>">
							</figure>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-signs',
				'render' => function () use ( $signs ) {
					?>
					<section class="rx-slab-band rx-slab-soft">
						<div class="rx-slab-wrap">
							<div class="rx-slab-signs-head">
								<h2><?php esc_html_e( 'Is Your Concrete Slab Showing These Warning Signs?', 'rectify-custom' ); ?></h2>
								<p><?php esc_html_e( 'Concrete slabs rarely sink overnight. Most homeowners first notice subtle changes around their property before realising the supporting ground has begun to move.', 'rectify-custom' ); ?></p>
							</div>
							<div class="rx-slab-signs-grid">
								<?php foreach ( $signs as $sign ) : ?>
									<article class="rx-slab-sign-card">
										<figure class="rx-slab-sign-media">
											<img src="<?php echo esc_url( $sign['image'] ); ?>" alt="<?php echo esc_attr( $sign['title'] ); ?>">
										</figure>
										<h3><?php echo esc_html( $sign['title'] ); ?></h3>
										<p><?php echo esc_html( $sign['copy'] ); ?></p>
									</article>
								<?php endforeach; ?>
							</div>
							<p class="rx-slab-signs-note"><?php esc_html_e( "If you've noticed one or more of these issues around your property in Melbourne, Adelaide or South Australia, it's worth investigating the underlying ground conditions before the movement worsens.", 'rectify-custom' ); ?></p>
							<a class="rx-slab-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'CONTACT OUR EXPERTS', 'rectify-custom' ); ?></a>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-causes',
				'render' => function () use ( $causes ) {
					?>
					<section class="rx-slab-band">
						<div class="rx-slab-wrap">
							<div class="rx-slab-causes-head">
								<h2><?php esc_html_e( 'The Ground Beneath the Slab Is Usually the Problem', 'rectify-custom' ); ?></h2>
								<p><?php esc_html_e( 'Concrete is designed to support significant loads, but it relies entirely on the ground beneath it. When that support changes, the slab begins to settle.', 'rectify-custom' ); ?></p>
							</div>
							<h3 class="rx-slab-causes-subhead"><?php esc_html_e( 'Several factors can contribute to slab movement, including:', 'rectify-custom' ); ?></h3>
							<div class="rx-slab-causes-grid">
								<?php foreach ( $causes as $cause ) : ?>
									<article class="rx-slab-cause-card">
										<figure class="rx-slab-cause-media">
											<img src="<?php echo esc_url( $cause['image'] ); ?>" alt="<?php echo esc_attr( $cause['title'] ); ?>">
										</figure>
										<h4><?php echo esc_html( $cause['title'] ); ?></h4>
										<p><?php echo esc_html( $cause['copy'] ); ?></p>
									</article>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-process',
				'render' => function () use ( $process_steps ) {
					?>
					<section class="rx-slab-band rx-slab-process">
						<div class="rx-slab-wrap rx-slab-process-grid">
							<div class="rx-slab-process-copy">
								<h2><?php esc_html_e( 'How Chemical Underpinning Relevels Your Slab', 'rectify-custom' ); ?></h2>
								<h3><?php esc_html_e( 'Stabilise the Ground Before Lifting the Slab', 'rectify-custom' ); ?></h3>
								<p>
									<?php esc_html_e( "Rectify's slab relevelling process is built around our proven", 'rectify-custom' ); ?>
									<span class="rx-slab-accent"><?php esc_html_e( 'Chemical Underpinning', 'rectify-custom' ); ?></span>
									<?php esc_html_e( 'technology.', 'rectify-custom' ); ?>
								</p>
								<p><?php esc_html_e( 'Rather than demolishing and replacing concrete, we strengthen the supporting ground beneath the slab using specialised expanding structural resin. The resin fills underground voids, improves soil density and restores support beneath the slab, allowing controlled lifting where appropriate.', 'rectify-custom' ); ?></p>
							</div>
							<div class="rx-slab-steps">
								<?php foreach ( $process_steps as $step ) : ?>
									<article class="rx-slab-step">
										<span class="rx-slab-step-number"><?php echo esc_html( $step['number'] ); ?></span>
										<div class="rx-slab-step-copy">
											<h4><?php echo esc_html( $step['title'] ); ?></h4>
											<p><?php echo esc_html( $step['copy'] ); ?></p>
										</div>
									</article>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-comparison',
				'render' => function () use ( $comparison_rows ) {
					?>
					<section class="rx-slab-band rx-slab-comparison">
						<div class="rx-slab-wrap">
							<div class="rx-slab-comparison-head">
								<h2><?php esc_html_e( 'Why Choose Chemical Underpinning?', 'rectify-custom' ); ?></h2>
								<div>
									<h3><?php esc_html_e( 'A Smarter Alternative to Slab Replacement', 'rectify-custom' ); ?></h3>
									<p><?php esc_html_e( "Replacing an entire concrete slab isn't always necessary. In many cases, the slab itself remains structurally sound—the real issue lies beneath it.", 'rectify-custom' ); ?></p>
								</div>
							</div>
							<div class="rx-slab-compare-table" role="table">
								<div class="rx-slab-compare-row rx-slab-compare-row-heading" role="row">
									<div class="rx-slab-compare-cell rx-slab-compare-heading" role="columnheader"><?php esc_html_e( 'Traditional Slab Replacement', 'rectify-custom' ); ?></div>
									<div class="rx-slab-compare-cell rx-slab-compare-heading" role="columnheader"><?php esc_html_e( 'Rectify Chemical Underpinning', 'rectify-custom' ); ?></div>
								</div>
								<?php foreach ( $comparison_rows as $row ) : ?>
									<div class="rx-slab-compare-row" role="row">
										<div class="rx-slab-compare-cell rx-slab-compare-cross" role="cell"><?php echo esc_html( $row['traditional'] ); ?></div>
										<div class="rx-slab-compare-cell rx-slab-compare-check" role="cell">
											<span class="rx-slab-check" aria-hidden="true"></span>
											<span><?php echo esc_html( $row['rectify'] ); ?></span>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-proof',
				'render' => function () use ( $slab_images ) {
					?>
					<section class="rx-slab-band rx-slab-soft rx-slab-proof">
						<div class="rx-slab-wrap">
							<div class="rx-slab-proof-head">
								<h2><?php esc_html_e( 'Engineered. Rectified. Performance Verified.', 'rectify-custom' ); ?></h2>
								<p><?php esc_html_e( 'See how identifying the cause, applying the right solution and verifying the outcome delivers lasting structural performance.', 'rectify-custom' ); ?></p>
							</div>
							<div class="rx-slab-compare">
								<figure class="rx-slab-compare-image">
									<span class="rx-slab-compare-tag rx-slab-compare-tag-before"><?php esc_html_e( 'BEFORE', 'rectify-custom' ); ?></span>
									<img src="<?php echo esc_url( $slab_images['before'] ); ?>" alt="<?php esc_attr_e( 'Concrete slab before chemical underpinning', 'rectify-custom' ); ?>">
								</figure>
								<figure class="rx-slab-compare-image">
									<span class="rx-slab-compare-tag rx-slab-compare-tag-after"><?php esc_html_e( 'AFTER', 'rectify-custom' ); ?></span>
									<img src="<?php echo esc_url( $slab_images['after'] ); ?>" alt="<?php esc_attr_e( 'Concrete slab after chemical underpinning', 'rectify-custom' ); ?>">
								</figure>
							</div>
						</div>
					</section>
					<?php
				},
			),
			array(
				'key'    => 'residential-slab-relevel-why',
				'render' => function () use ( $slab_images, $why_choose_cards ) {
					?>
					<section class="rx-slab-why" style="<?php echo esc_attr( '--rx-slab-contours:url(' . esc_url_raw( $slab_images['contours'] ) . ');' ); ?>">
						<div class="rx-slab-wrap">
							<h2><?php esc_html_e( 'Why Choose Rectify', 'rectify-custom' ); ?></h2>
							<div class="rx-slab-why-grid">
								<?php foreach ( $why_choose_cards as $card ) : ?>
									<article class="rx-slab-why-card">
										<span class="rx-slab-why-icon"><img src="<?php echo esc_url( $card['icon'] ); ?>" alt=""></span>
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
				'key'    => 'residential-slab-relevel-cta',
				'render' => function () {
					?>
					<section class="rx-slab-cta">
						<div class="rx-slab-wrap">
							<h2><?php esc_html_e( 'Concerned About a Sunken Concrete Slab?', 'rectify-custom' ); ?></h2>
							<p><?php esc_html_e( "If your floors have become uneven or you've noticed signs of slab settlement, don't wait for the problem to become more extensive. Book a professional structural assessment with Rectify to identify the cause and determine whether Chemical Underpinning is the right solution for your property in Melbourne, Adelaide, or South Australia.", 'rectify-custom' ); ?></p>
							<div class="rx-slab-cta-actions">
								<a class="rx-slab-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'CONTACT US', 'rectify-custom' ); ?></a>
								<a class="rx-slab-cta-outline rx-slab-cta-phone" href="tel:1800182020"><?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?></a>
								<a class="rx-slab-cta-outline rx-slab-cta-mail" href="mailto:admin@rectify.com.au"><?php esc_html_e( 'admin@rectify.com.au', 'rectify-custom' ); ?></a>
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
