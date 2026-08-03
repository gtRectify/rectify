<?php
/**
 * Commercial Pipe Abandonment page content template.
 *
 * Matches the Figma design at node 957:15840 ("Pipe Abandonment").
 * Styling lives entirely in assets/css/commercial-inner-pages.css, scoped
 * under the .rx-ci-page wrapper below (shared with the Ground Improvement
 * page, which uses the same design system).
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ci-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'commercial-pipe-abandonment-banner',
                'render' => function () {
                    ?>
                    <section class="rx-ci-banner">
                        <div class="rx-ci-wrap">
                            <span class="rx-ci-kicker">COMMERCIAL SOLUTIONS</span>
                            <h1>Pipe Abandonment &amp; Cellular Concrete Grouting Melbourne &amp; South Australia</h1>
                            <nav class="rx-ci-breadcrumb" aria-label="Breadcrumb">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                                <a href="<?php echo esc_url( home_url( '/commercial-solutions/' ) ); ?>">Commercial Solutions</a>
                                <span class="rx-ci-breadcrumb-sep" aria-hidden="true"></span>
                                <span class="rx-ci-breadcrumb-current">Pipe Abandonment</span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'commercial-pipe-abandonment-intro',
                'render' => function () {
                    ?>
                    <section class="rx-ci-band rx-ci-intro">
                        <div class="rx-ci-wrap rx-ci-two-col">
                            <div class="rx-ci-copy">
                                <h2>Engineered Pipe Abandonment Solutions for Commercial, Industrial &amp; Infrastructure Assets</h2>
                                <p>In-ground service pipes have a finite life span and need to be replaced periodically. Unfortunately, excavation and removal of the underground assets can be extremely expensive, given they may run under existing infrastructure, buildings and property. These abandoned pipes cannot be simply be left in situ as there is a risk of collapse that could destabilise the overlying soil, leading to subsidence. If removal is not an option, then adequately grouting the pipes to fill the cavity is the appropriate approach. This will prevent collapse as well as eliminating the build-up of potentially explosive gases and restricting groundwater and unwanted fluid migration along the pipe.</p>
                                <p>Typical cement grouts bleed and experience shrinkage upon drying, creating a small annulus at the crown of the pipe. Using our polymer modified cellular concrete that is specifically engineered as a light weight, high strength fill that offers superior flowability with low pump pressures also provides the benefits of a relatively low shrinkage with minimal bleed. This saves time and reduces the requirement to provide numerous access pits to the abandoned pipe by enabling <a href="https://share.google/J343SALYF1B8YMAGT" target="_blank" rel="noopener">quick installation</a> over long distances.</p>
                            </div>
                            <figure class="rx-ci-media">
                                <img src="<?php echo esc_url( content_url( '/uploads/2026/07/commercial-pipe-abandonment-e08-pipe-abandonment.png' ) ); ?>" alt="Voiding beneath an abandoned pipe filled with cellular concrete grout">
                            </figure>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'commercial-pipe-abandonment-why-choose',
                'render' => function () {
                    $rx_pa_why_cards = array(
                        array(
                            'icon'  => 'images/commercial-ground-improvement/icon-worker.svg',
                            'title' => 'Engineering-Led Solutions',
                            'desc'  => 'Every project begins with understanding the cause of the problem, ensuring the right solution is delivered—not just a temporary fix.',
                        ),
                        array(
                            'icon'  => 'images/commercial-ground-improvement/icon-expert.svg',
                            'title' => 'Proven Structural Expertise',
                            'desc'  => 'Trusted to deliver engineered solutions across residential, commercial and infrastructure projects.',
                        ),
                        array(
                            'icon'  => 'images/commercial-ground-improvement/icon-non-invasive.svg',
                            'title' => 'Non-Invasive Technology',
                            'desc'  => 'Our advanced, non-invasive technologies restore structural stability with less excavation, less mess, and minimal interruption.',
                        ),
                        array(
                            'icon'  => 'images/commercial-ground-improvement/icon-services-longterm.png',
                            'title' => 'Long-Term Confidence',
                            'desc'  => 'We don’t just repair today’s problem—we strengthen your asset for long-term performance and lasting value.',
                        ),
                    );
                    $rx_pa_contour = rx_asset_url( 'images/home/Contour on Navy Blue.png' );
                    ?>
                    <section class="rx-ci-why-choose rx-ci-void-why" style="<?php echo esc_attr( '--rx-ci-contour:url(' . esc_url_raw( $rx_pa_contour ) . ')' ); ?>">
                        <div class="rx-ci-wrap">
                            <h2>Why Choose Rectify</h2>
                            <div class="rx-ci-void-why-grid">
                                <?php foreach ( $rx_pa_why_cards as $rx_pa_card ) : ?>
                                <article class="rx-ci-why-choose-card">
                                    <img src="<?php echo esc_url( rx_asset_url( $rx_pa_card['icon'] ) ); ?>" alt="" class="rx-ci-why-choose-icon">
                                    <h3><?php echo esc_html( $rx_pa_card['title'] ); ?></h3>
                                    <p><?php echo wp_kses_post( $rx_pa_card['desc'] ); ?></p>
                                </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'commercial-pipe-abandonment-cta',
                'render' => function () {
                    ?>
                    <section class="rx-ci-cta">
                        <div class="rx-ci-wrap">
                            <h2>Restore Ground Support With Engineered Void Filling</h2>
                            <p>Hidden voids beneath slabs, pavements and infrastructure can compromise structural performance and increase long-term maintenance costs. Rectify delivers engineered void filling solutions that stabilise the ground, restore support and minimise operational disruption.</p>
                            <div class="rx-ci-cta-actions">
                                <a class="rx-ci-cta-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a>
                                <a class="rx-ci-cta-outline" href="tel:1800182020"><span class="rx-ci-cta-icon rx-ci-cta-icon-phone" aria-hidden="true"></span>1800 18 20 20</a>
                                <a class="rx-ci-cta-outline" href="mailto:admin@rectify.com.au"><span class="rx-ci-cta-icon rx-ci-cta-icon-mail" aria-hidden="true"></span>admin@rectify.com.au</a>
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
