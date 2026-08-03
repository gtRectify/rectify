<?php
/**
 * Site Footer (shared markup)
 *
 * Used by footer.php (generic templates) and page-rectify-homepage.php,
 * which don't share a common get_footer() flow.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_footer_columns = array(
    'About' => array(
        array( 'About Rectify', home_url( '/about-rectify/' ) ),
        array( 'Our Story', home_url( '/about-us/our-story/' ) ),
        array( 'Our Team', home_url( '/about-us/meet-the-team/' ) ),
        array( 'Our Technology', home_url( '/about-us/our-technology/' ) ),
        array( 'Office Locations', home_url( '/about-us/our-locations/' ) ),
        array( 'Certifications &amp; Compliance', home_url( '/certifications-compliance/' ) ),
        array( 'Careers', home_url( '/about-us/careers/' ) ),
        array( 'Contact Us', home_url( '/contact-us/' ) ),
    ),
    'Residential Solutions' => array(
        array( 'Chemical Underpinning', home_url( '/residential/chemical-underpinning/' ) ),
        array( 'Foundation Stabilisation', home_url( '/residential/foundation-repair/' ) ),
        array( 'Slab Re-Levelling', home_url( '/residential/slab-relevelling/' ) ),
        array( 'Ground Improvement', home_url( '/residential/ground-improvement/' ) ),
    ),
    'Commercial Solutions' => array(
        array( 'Ground Improvement', home_url( '/commercial-solutions/ground-improvement/' ) ),
        array( 'Re-alignment &amp; Levelling', home_url( '/commercial-solutions/realignment-levelling/' ) ),
        array( 'Slab Lifting', home_url( '/commercial-solutions/slab-lifting/' ) ),
        array( 'Engineered Fill', home_url( '/commercial-solutions/engineered-fill/' ) ),
        array( 'Void Filling', home_url( '/commercial-solutions/void-filling/' ) ),
        array( 'Leak Sealing &amp; Water Stopping', home_url( '/commercial-solutions/leak-sealing-water-stopping/' ) ),
        array( 'Protective Coatings and Concrete Repair', home_url( '/commercial-solutions/protective-coatings-concrete-repair/' ) ),
        array( 'Pipe Abandonment', home_url( '/commercial-solutions/pipe-abandonment/' ) ),
    ),
    'Resources' => array(
        array( 'Frequently Asked Questions', home_url( '/resources/faq/residential/' ) ),
        array( 'News &amp; Insights', home_url( '/resources/news-and-insights/' ) ),
        array( 'Case Studies', home_url( '/resources/case-studies/' ) ),
        array( 'Soil Review', home_url( '/soil-stabilisation/' ) ),
    ),
);

$rx_footer_socials = array(
    array( 'Instagram', 'https://www.instagram.com/rectify.group', 'instagram' ),
    array( 'Facebook', 'https://www.facebook.com/RectifyGroupAustralia', 'facebook' ),
    array( 'LinkedIn', 'https://www.linkedin.com/company/rectify-group-au', 'linkedin' ),
    array( 'YouTube', 'https://www.youtube.com/@rectifygroup6000', 'youtube' ),
);

$rx_footer_social_icons = array(
    'instagram' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 3h8c2.761 0 5 2.239 5 5v8c0 2.761-2.239 5-5 5H8c-2.761 0-5-2.239-5-5V8c0-2.761 2.239-5 5-5Zm0 2.4A2.6 2.6 0 0 0 5.4 8v8A2.6 2.6 0 0 0 8 18.6h8a2.6 2.6 0 0 0 2.6-2.6V8A2.6 2.6 0 0 0 16 5.4H8Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.6a4.6 4.6 0 1 0 0-9.2 4.6 4.6 0 0 0 0 9.2Zm0-2a2.6 2.6 0 1 1 0-5.2 2.6 2.6 0 0 1 0 5.2Z" fill="currentColor"/><circle cx="17.2" cy="6.8" r="1.15" fill="currentColor"/></svg>',
    'facebook'  => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14 9h2.5V6H14c-1.93 0-3.5 1.57-3.5 3.5V11H8.5v3H10.5v6h3v-6h2.3l.4-3H13.5V9.7c0-.5.2-.7.7-.7Z" fill="currentColor"/></svg>',
    'linkedin'  => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="9" width="3" height="10" fill="currentColor"/><circle cx="5.5" cy="5.5" r="1.7" fill="currentColor"/><path d="M11 9h2.8v1.6c.6-1 1.7-1.8 3.2-1.8 2.4 0 3.5 1.6 3.5 4.4V19h-3v-5.2c0-1.2-.4-2.1-1.6-2.1-.9 0-1.4.6-1.6 1.2-.1.2-.1.6-.1.9V19h-3V9Z" fill="currentColor"/></svg>',
    'youtube'   => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="6.5" width="18" height="11" rx="3" stroke="currentColor" stroke-width="1.6"/><path d="M10.5 9.8v4.4L14.5 12l-4-2.2Z" fill="currentColor"/></svg>',
    'tiktok'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14 4h2.2c.2 1.7 1.4 3 3.3 3.2V9.5c-1.3 0-2.4-.4-3.3-1.1v5.8c0 2.7-2.2 4.8-4.9 4.8S6.4 16.9 6.4 14.2c0-2.6 2.1-4.7 4.7-4.8v2.4a2.4 2.4 0 1 0 2.4 2.4V4Z" fill="currentColor"/></svg>',
);
?>
<footer id="site-footer" class="rx-footer" role="contentinfo">
    <div class="rx-wrap rx-footer-top">
        <div class="rx-footer-brand">
            <a class="rx-footer-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img class="rx-footer-logo" src="<?php echo esc_url( rx_asset_url( 'images/rectify.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?> logo">
            </a>
            <p class="rx-footer-tagline">Rectify Group is an Australian ground engineering and asset remediation company.</p>
        </div>

        <div class="rx-footer-columns">
            <?php foreach ( $rx_footer_columns as $rx_footer_heading => $rx_footer_links ) : ?>
                <div class="rx-footer-col">
                    <h3 class="rx-footer-col-heading"><?php echo esc_html( strtoupper( $rx_footer_heading ) ); ?></h3>
                    <ul class="rx-footer-col-list">
                        <?php foreach ( $rx_footer_links as $rx_footer_link ) : ?>
                            <li><a href="<?php echo esc_url( $rx_footer_link[1] ); ?>"><?php echo wp_kses_post( $rx_footer_link[0] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="rx-wrap rx-footer-bottom">
        <p class="rx-footer-copyright">Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>

        <nav class="rx-footer-legal" aria-label="Legal">
            <a href="<?php echo esc_url( home_url( '/legal/' ) ); ?>">Our Policy</a>
            <a href="#">Terms and Conditions</a>
            <a href="#">Contractor Policy</a>
        </nav>

        <div class="rx-footer-social">
            <span class="rx-footer-social-label">FOLLOW US</span>
            <?php foreach ( $rx_footer_socials as $rx_footer_social ) :
                list( $rx_social_label, $rx_social_url, $rx_social_key ) = $rx_footer_social;
                ?>
                <a class="rx-footer-social-icon" href="<?php echo esc_url( $rx_social_url ); ?>" aria-label="<?php echo esc_attr( $rx_social_label ); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo $rx_footer_social_icons[ $rx_social_key ]; // phpcs:ignore -- static, trusted inline SVG markup defined above. ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</footer>
