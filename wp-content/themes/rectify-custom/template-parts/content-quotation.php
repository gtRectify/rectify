<?php
/**
 * Quotation page.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-quotation-page ra-page' ); ?>>
    <?php
    /**
     * Rendered through rectify_pb_render_page_sections() rather than a fixed
     * list of keys so that sections added in the page builder (e.g. a HubSpot
     * Form block) render at whatever position they were dragged to. This page
     * has no hardcoded fallback markup - every section comes from the builder -
     * so each default entry's renderer is intentionally a no-op.
     */
    $default_keys = array( 'quotation-form', 'quotation-next', 'quotation-cta' );
    $sections     = array();

    foreach ( $default_keys as $section_key ) {
        $sections[] = array(
            'key'    => $section_key,
            'render' => '__return_null',
        );
    }

    if ( function_exists( 'rectify_pb_render_page_sections' ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $sections );
    }
    ?>
</article>

<?php
$rx_thankyou_assets = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
$rx_hubspot_returned = isset( $_GET['hubspot_quote_submitted'] )
    && '1' === sanitize_text_field( wp_unslash( $_GET['hubspot_quote_submitted'] ) );
?>
<div
    id="rx-thankyou-modal-hubspot-quote"
    class="rx-thankyou-modal rx-thankyou-modal--quotation rx-thankyou-modal--contact"
    data-hubspot-form-id="a1c00f4d-e08e-4d15-8916-d0cc2528f9c0"
    data-hubspot-thankyou-url="https://www.rectify.com.au/thank-you-search/"
    data-open-on-load="<?php echo $rx_hubspot_returned ? 'true' : 'false'; ?>"
    data-submitted-query-arg="hubspot_quote_submitted"
    aria-hidden="true"
>
    <div class="rx-thankyou-backdrop" data-rx-thankyou-close></div>
    <div
        class="rx-thankyou-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="rx-thankyou-heading-hubspot-quote"
        tabindex="-1"
    >
        <button class="rx-thankyou-close" type="button" data-rx-thankyou-close aria-label="Close thank-you popup">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="rx-thankyou-scroll">
            <div class="rx-thankyou-body">
                <h2 id="rx-thankyou-heading-hubspot-quote">Your quote request has been received.</h2>
                <p class="rx-thankyou-copy">We have received your request and appreciate the opportunity to assist you.<br><br>Our team will review the information you provided to understand your property concerns and determine the most appropriate next step. A Rectify specialist will contact you shortly to discuss your requirements, clarify any details and explain what may be required before a formal quotation can be prepared.</p>
                <p class="rx-thankyou-resource-copy">In the meantime, here are some resources to get to know us better and explore how we've helped others</p>

                <div class="rx-thankyou-actions">
                    <a class="rx-thankyou-btn rx-thankyou-btn--filled" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">
                        <img src="<?php echo esc_url( $rx_thankyou_assets . 'Rectify-Icon-Set_About-Us-2-white.svg' ); ?>" alt="">
                        <span>About Us</span>
                    </a>
                    <a class="rx-thankyou-btn" href="<?php echo esc_url( home_url( '/resources/case-studies/' ) ); ?>">
                        <img src="<?php echo esc_url( $rx_thankyou_assets . 'Rectify-Icon-Set-Recovered_Case-Study-1.svg' ); ?>" alt="">
                        <span>View Case Studies</span>
                    </a>
                </div>

                <p class="rx-thankyou-urgent">If your enquiry is urgent, please call us on <a href="tel:1800182020">1800 18 20 20</a> for immediate assistance.</p>
                <p class="rx-thankyou-trust">We appreciate your trust in Rectify and look forward to assisting you.</p>

                <div class="rx-thankyou-divider" aria-hidden="true"></div>

                <div class="rx-thankyou-stats">
                    <div class="rx-thankyou-stat rx-thankyou-stat--reviews">
                        <div class="rx-thankyou-stars" aria-label="Five-star rating">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="rx-thankyou-stat-line"><strong>280+</strong> reviews | <strong>4.9/5</strong> average rating</p>
                        <img class="rx-thankyou-google-logo" src="<?php echo esc_url( $rx_thankyou_assets . 'google-logo.png' ); ?>" alt="Google">
                    </div>
                    <div class="rx-thankyou-stat-divider" aria-hidden="true"></div>
                    <div class="rx-thankyou-stat rx-thankyou-stat--projects">
                        <p class="rx-thankyou-stat-value">1,000+</p>
                        <p class="rx-thankyou-stat-label">Projects Completed</p>
                        <p class="rx-thankyou-stat-copy">Delivering measurable outcomes across thousands of successful projects.</p>
                    </div>
                </div>
            </div>

            <div class="rx-thankyou-contours" aria-hidden="true">
                <img src="<?php echo esc_url( $rx_thankyou_assets . 'thankyou-contour-left.svg' ); ?>" alt="">
                <img src="<?php echo esc_url( $rx_thankyou_assets . 'thankyou-contour-right.svg' ); ?>" alt="">
            </div>
        </div>
    </div>
</div>
