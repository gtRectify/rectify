<?php
/**
 * Privacy Policy page content template.
 *
 * Rendered via page.php's slug-based template_part lookup for the
 * top-level "our-policy" page. Shares the rx-faq-page / rx-faq-hero /
 * rx-faq-cta components used by content-legal.php and
 * content-modern-slavery-statement.php, and renders the published PDF
 * full-page via the rx-pdf-viewer (see assets/js/pdf-viewer.js) instead of
 * a download link so the document is view-only.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$policy_pdf_url = trailingslashit( home_url() ) . 'wp-content/uploads/2026/08/RG-POL-PRV-001-Privacy-Policy.pdf';
$policy_pdf_id  = attachment_url_to_postid( $policy_pdf_url );

if ( $policy_pdf_id ) {
    $policy_pdf_url = wp_get_attachment_url( $policy_pdf_id );
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post rx-faq-page rx-legal-page' ); ?>>

    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key'    => 'policy-hero',
                'render' => function () {
                    ?>
                    <section class="rx-faq-hero rx-legal-hero">
                        <div class="rx-wrap">
                            <h1><?php esc_html_e( 'Privacy Policy', 'rectify-custom' ); ?></h1>

                            <nav class="rx-faq-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                <span aria-hidden="true">></span>
                                <span><?php esc_html_e( 'Privacy Policy', 'rectify-custom' ); ?></span>
                            </nav>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'policy-content',
                'render' => function () use ( $policy_pdf_url ) {
                    ?>
                    <section class="rx-pdf-section">
                        <div class="rx-wrap">
                            <div
                                class="rx-pdf-viewer"
                                data-pdf-url="<?php echo esc_url( $policy_pdf_url ); ?>"
                                data-pdf-title="<?php esc_attr_e( 'Privacy Policy', 'rectify-custom' ); ?>"
                            >
                                <div class="rx-pdf-toolbar">
                                    <div class="rx-pdf-toolbar-group">
                                        <button type="button" class="rx-pdf-btn rx-pdf-zoom-out" aria-label="<?php esc_attr_e( 'Zoom out', 'rectify-custom' ); ?>">&#8722;</button>
                                        <span class="rx-pdf-zoom-level">100%</span>
                                        <button type="button" class="rx-pdf-btn rx-pdf-zoom-in" aria-label="<?php esc_attr_e( 'Zoom in', 'rectify-custom' ); ?>">+</button>
                                    </div>
                                    <div class="rx-pdf-toolbar-group rx-pdf-page-indicator">
                                        <?php esc_html_e( 'Page', 'rectify-custom' ); ?>
                                        <span class="rx-pdf-current-page">1</span> / <span class="rx-pdf-total-pages">&hellip;</span>
                                    </div>
                                </div>
                                <div class="rx-pdf-pages" role="document" aria-label="<?php esc_attr_e( 'Privacy Policy document viewer', 'rectify-custom' ); ?>">
                                    <div class="rx-pdf-status"><?php esc_html_e( 'Loading document…', 'rectify-custom' ); ?></div>
                                </div>
                            </div>
                            <noscript>
                                <p class="rx-pdf-noscript"><?php esc_html_e( 'Please enable JavaScript in your browser to view this document.', 'rectify-custom' ); ?></p>
                            </noscript>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key'    => 'policy-help',
                'render' => function () {
                    ?>
                    <section class="rx-faq-cta" style="<?php echo esc_attr( '--rx-faq-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

                            <div class="rx-faq-help-grid">
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Call Expert.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Call Us', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-phone" href="tel:1800182020">
                                        <span aria-hidden="true">&#9742;</span> <?php esc_html_e( '1800 18 20 20', 'rectify-custom' ); ?>
                                    </a>
                                </article>
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Request Assessment_red.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Estimate Project Cost', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-link" href="<?php echo esc_url( home_url( '/assessment/' ) ); ?>"><?php esc_html_e( 'GET MY COST ESTIMATE', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
                                </article>
                                <article class="rx-faq-help-card">
                                    <span class="rx-faq-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/Rectify Icon Set_Explore Resources.svg' ) ); ?>" alt=""></span>
                                    <h3><?php esc_html_e( 'Explore Resources', 'rectify-custom' ); ?></h3>
                                    <p><?php esc_html_e( 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'rectify-custom' ); ?></p>
                                    <a class="rx-faq-help-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'EXPLORE RESOURCES', 'rectify-custom' ); ?> <span aria-hidden="true">&#8594;</span></a>
                                </article>
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
