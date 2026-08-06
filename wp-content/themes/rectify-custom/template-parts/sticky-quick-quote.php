<?php
/**
 * Sticky "Get a Quick Quote" widget.
 *
 * Renders on every page except assessment/get-a-free-quote (included from
 * header.php, which already excludes those two): a fixed tab on the right
 * edge of the viewport that opens a slide-in panel containing the HubSpot
 * quick-quote form, plus the shared thank-you popup re-used from the
 * get-a-free-quote/quotation page so a successful submission looks identical
 * everywhere on the site.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'rectify_pb_hubspot_embed' ) ) {
    return;
}

$rx_sq_form_id = 'a64c955b-6ec4-441c-ad35-0f84c1a985b9';
?>
<div class="rx-sticky-quote" id="rx-sticky-quote">
    <button
        type="button"
        class="rx-sticky-quote-tab"
        id="rx-sticky-quote-tab"
        aria-expanded="false"
        aria-controls="rx-sticky-quote-panel"
    >
        <span>Get a Quick Quote</span>
    </button>

    <div class="rx-sticky-quote-panel" id="rx-sticky-quote-panel" aria-hidden="true">
        <div class="rx-sticky-quote-backdrop" data-rx-sq-close></div>

        <div class="rx-sticky-quote-drawer" role="dialog" aria-modal="true" aria-label="Get a quick quote form">
            <button type="button" class="rx-sticky-quote-close" data-rx-sq-close aria-label="Close quick quote form">
                <span aria-hidden="true">&times;</span>
            </button>

            <div class="rx-sticky-quote-scroll">
                <div class="rx-sticky-quote-form rx-hubspot-form">
                    <?php
                    echo rectify_pb_hubspot_embed( array(
                        'portal_id' => '48201196',
                        'form_id'   => $rx_sq_form_id,
                        'region'    => 'ap1',
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$rx_sq_assets = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
?>
<div
    id="rx-thankyou-modal-hubspot-sticky-quote"
    class="rx-thankyou-modal rx-thankyou-modal--quotation rx-thankyou-modal--contact"
    data-hubspot-form-id="<?php echo esc_attr( $rx_sq_form_id ); ?>"
    aria-hidden="true"
>
    <div class="rx-thankyou-backdrop" data-rx-thankyou-close></div>
    <div
        class="rx-thankyou-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="rx-thankyou-heading-hubspot-sticky-quote"
        tabindex="-1"
    >
        <button class="rx-thankyou-close" type="button" data-rx-thankyou-close aria-label="Close thank-you popup">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="rx-thankyou-scroll">
            <div class="rx-thankyou-body">
                <h2 id="rx-thankyou-heading-hubspot-sticky-quote">Your quote request has been received.</h2>
                <p class="rx-thankyou-copy">We have received your request and appreciate the opportunity to assist you.<br><br>Our team will review the information you provided to understand your property concerns and determine the most appropriate next step. A Rectify specialist will contact you shortly to discuss your requirements, clarify any details and explain what may be required before a formal quotation can be prepared.</p>
                <p class="rx-thankyou-resource-copy">In the meantime, here are some resources to get to know us better and explore how we've helped others</p>

                <div class="rx-thankyou-actions">
                    <a class="rx-thankyou-btn rx-thankyou-btn--filled" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">
                        <img src="<?php echo esc_url( $rx_sq_assets . 'Rectify-Icon-Set_About-Us-2-white.svg' ); ?>" alt="">
                        <span>About Us</span>
                    </a>
                    <a class="rx-thankyou-btn" href="<?php echo esc_url( home_url( '/resources/case-studies/' ) ); ?>">
                        <img src="<?php echo esc_url( $rx_sq_assets . 'Rectify-Icon-Set-Recovered_Case-Study-1.svg' ); ?>" alt="">
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
                        <img class="rx-thankyou-google-logo" src="<?php echo esc_url( $rx_sq_assets . 'google-logo.png' ); ?>" alt="Google">
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
                <img src="<?php echo esc_url( $rx_sq_assets . 'thankyou-contour-left.svg' ); ?>" alt="">
            </div>
        </div>
    </div>
</div>
