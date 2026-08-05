<?php
/**
 * Contact Us page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id = get_the_ID();

$rx_get_field = function ( $name, $fallback = '' ) use ( $post_id ) {
    $value = function_exists( 'get_field' )
        ? get_field( $name, $post_id )
        : get_post_meta( $post_id, $name, true );

    if (
        ( null === $value || false === $value || '' === $value )
        && function_exists( 'acf_maybe_get_field' )
        && function_exists( 'acf_get_value' )
    ) {
        $field = acf_maybe_get_field( $name, $post_id, false );

        if ( $field ) {
            $value = acf_get_value( $post_id, $field );
        }
    }

    return ( null === $value || false === $value || '' === $value ) ? $fallback : $value;
};

$rx_image_url = function ( $image, $size = 'large', $fallback = '' ) {
    if ( is_array( $image ) ) {
        if ( ! empty( $image['sizes'][ $size ] ) ) {
            return $image['sizes'][ $size ];
        }

        if ( ! empty( $image['url'] ) ) {
            return $image['url'];
        }
    }

    if ( is_numeric( $image ) ) {
        $url = wp_get_attachment_image_url( (int) $image, $size );
        return $url ? $url : $fallback;
    }

    if ( is_string( $image ) && '' !== $image ) {
        return $image;
    }

    return $fallback;
};

$rx_link = function ( $link, $fallback_url = '#', $fallback_label = '' ) {
    if ( is_array( $link ) ) {
        return array(
            'url'    => ! empty( $link['url'] ) ? $link['url'] : $fallback_url,
            'title'  => ! empty( $link['title'] ) ? $link['title'] : $fallback_label,
            'target' => ! empty( $link['target'] ) ? $link['target'] : '',
        );
    }

    return array(
        'url'    => is_string( $link ) && '' !== $link ? $link : $fallback_url,
        'title'  => $fallback_label,
        'target' => '',
    );
};

$rx_card_icon = function ( $icon, $fallback_file = '' ) use ( $rx_image_url ) {
    if ( is_string( $icon ) && '' !== $icon && false === strpos( $icon, '://' ) && 0 !== strpos( $icon, '/' ) && 0 !== strpos( $icon, 'data:' ) ) {
        $red_icon = rx_asset_url( 'icons-red/' . $icon );
        return $red_icon ? $red_icon : rx_asset_url( 'icons/' . $icon );
    }

    $fallback = $fallback_file ? rx_asset_url( 'icons-red/' . $fallback_file ) : '';
    return $rx_image_url( $icon, 'thumbnail', $fallback );
};

$hero_eyebrow = $rx_get_field( 'contact_hero_eyebrow', 'CONTACT US' );
$hero_title   = $rx_get_field( 'contact_hero_title', get_the_title() );
$hero_copy    = $rx_get_field( 'contact_hero_copy', 'We understand that structural issues can be concerning. That’s why we take the time to listen, understand your situation, and provide clear, professional guidance on the most appropriate next steps.' );

$offices_title = $rx_get_field( 'contact_offices_title', 'Get in touch with one of our offices' );

$contact_cards = $rx_get_field( 'contact_cards', array(
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Victoria_red.svg',
        'title'         => 'Head Office',
        'copy'          => '28 Trade Park Drive, Tullamarine VIC 3043',
        'link'          => array(
            'url'    => 'https://www.google.com/maps/search/?api=1&query=28+Trade+Park+Drive+Tullamarine+VIC+3043',
            'title'  => 'View on Map',
            'target' => '_blank',
        ),
    ),
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Tasmania_red.svg',
        'title'         => 'Tasmania Office',
        'copy'          => 'Level 3, 85 Macquarie Street, Hobart TAS 7000',
        'link'          => array(
            'url'    => 'https://www.google.com/maps/search/?api=1&query=Level+3+85+Macquarie+Street+Hobart+TAS+7000',
            'title'  => 'View on Map',
            'target' => '_blank',
        ),
    ),
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Adelaide.svg',
        'title'         => 'South Australia Office',
        'copy'          => 'Level 3, 97 Pirie Street, Adelaide SA 5000',
        'link'          => array(
            'url'    => 'https://www.google.com/maps/search/?api=1&query=Level+3+97+Pirie+Street+Adelaide+SA+5000',
            'title'  => 'View on Map',
            'target' => '_blank',
        ),
    ),
) );

$contact_form_title       = $rx_get_field( 'contact_form_title', 'Take the First Step' );
$contact_form_description = $rx_get_field( 'contact_form_description', 'If you’re concerned about structural movement, don’t wait for the problem to worsen. Contact Rectify today and speak with a specialist who can help you understand the cause, assess the risks, and recommend the most appropriate solution for your property.' );
$contact_form_shortcode   = $rx_get_field( 'contact_form_shortcode' );
$contact_form_phone       = $rx_get_field( 'contact_form_phone', '1800 18 20 20' );
$contact_form_email       = $rx_get_field( 'contact_form_email', 'hello@rectify.com.au' );

$cta_title = $rx_get_field( 'contact_cta_title', 'Need Help Choosing the Right Solution?' );
$cta_copy  = $rx_get_field( 'contact_cta_copy', 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.' );

$contact_support_cards = $rx_get_field( 'contact_support_cards', array(
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Call Expert.svg',
        'title'         => 'Call Us',
        'copy'          => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
        'type'          => 'phone',
        'phone'         => '1800 18 20 20',
    ),
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Request Assessment_red.svg',
        'title'         => 'Estimate Project Cost',
        'copy'          => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
        'type'          => 'link',
        'link'          => array( 'url' => esc_url( home_url( '/assessment/' ) ), 'title' => 'Get My Cost Estimate' ),
    ),
    array(
        'icon'          => '',
        'icon_fallback' => 'Rectify Icon Set_Explore Resources.svg',
        'title'         => 'Explore Resources',
        'copy'          => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
        'type'          => 'link',
        'link'          => array( 'url' => esc_url( home_url( '/resources/' ) ), 'title' => 'Explore Resources' ),
    ),
) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-contact-page' ); ?>>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'contact-hero' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-contact-hero-panel">
        <div class="rx-wrap rx-contact-hero-grid">
            <div class="rx-contact-hero-copy">
                <?php if ( $hero_eyebrow ) : ?>
                    <span class="rx-kicker"><?php echo esc_html( $hero_eyebrow ); ?></span>
                <?php endif; ?>

                <h1><?php echo esc_html( $hero_title ); ?></h1>

                <nav class="rx-contact-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                    <span aria-hidden="true">&gt;</span>
                    <span><?php echo esc_html( get_the_title() ); ?></span>
                </nav>
            </div>

            <?php if ( $hero_copy ) : ?>
                <p class="rx-contact-hero-lead"><?php echo esc_html( $hero_copy ); ?></p>
            <?php endif; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'contact-offices' ) ) {
        // rendered by plugin, nothing else to do here
    } else { ?>
    <?php if ( ! empty( $contact_cards ) && is_array( $contact_cards ) ) : ?>
        <section class="rx-contact-offices">
            <div class="rx-wrap">
                <?php if ( $offices_title ) : ?>
                    <h2 class="rx-contact-offices-title"><?php echo esc_html( $offices_title ); ?></h2>
                <?php endif; ?>

                <div class="rx-contact-office-grid">
                    <?php foreach ( $contact_cards as $card ) : ?>
                        <?php
                        $card_title    = isset( $card['title'] ) ? $card['title'] : '';
                        $card_copy     = isset( $card['copy'] ) ? $card['copy'] : '';
                        $card_fallback = isset( $card['icon_fallback'] ) ? $card['icon_fallback'] : '';
                        $card_icon     = $rx_card_icon( isset( $card['icon'] ) ? $card['icon'] : '', $card_fallback );
                        $card_link     = $rx_link( isset( $card['link'] ) ? $card['link'] : array(), '#', 'View on Map' );
                        ?>
                        <article class="rx-contact-office-card">
                            <?php if ( $card_icon ) : ?>
                                <span class="rx-contact-office-icon"><img src="<?php echo esc_url( $card_icon ); ?>" alt=""></span>
                            <?php endif; ?>

                            <?php if ( $card_title ) : ?>
                                <h3><?php echo esc_html( $card_title ); ?></h3>
                            <?php endif; ?>

                            <?php if ( $card_copy ) : ?>
                                <p><?php echo esc_html( $card_copy ); ?></p>
                            <?php endif; ?>

                            <?php if ( $card_link['url'] && $card_link['title'] ) : ?>
                                <a class="rx-contact-map-link" href="<?php echo esc_url( $card_link['url'] ); ?>" <?php echo $card_link['target'] ? 'target="' . esc_attr( $card_link['target'] ) . '"' : ''; ?>><?php echo esc_html( strtoupper( $card_link['title'] ) ); ?> <span aria-hidden="true">&#8594;</span></a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'contact-form' ) ) {
        // rendered by plugin, nothing else to do here
    } else { ?>
    <section class="rx-contact-form-section">
        <div class="rx-wrap rx-contact-form-grid">
            <div class="rx-contact-form-panel">
                <?php echo do_shortcode( wp_kses_post( $contact_form_shortcode ? $contact_form_shortcode : '[rectify_hubspot_form portal_id="48201196" form_id="f02ab874-fad0-436f-a5ca-56897af5b5cb" region="ap1"]' ) ); ?>
            </div>

            <div class="rx-contact-form-copy">
                <?php if ( $contact_form_title ) : ?>
                    <h2><?php echo esc_html( $contact_form_title ); ?></h2>
                <?php endif; ?>

                <?php if ( $contact_form_description ) : ?>
                    <div class="rx-richtext"><?php echo wp_kses_post( wpautop( $contact_form_description ) ); ?></div>
                <?php endif; ?>

                <?php if ( $contact_form_phone ) : ?>
                    <div class="rx-contact-direct">
                        <span class="rx-contact-direct-label"><?php esc_html_e( 'CALL', 'rectify-custom' ); ?></span>
                        <a class="rx-contact-direct-value" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $contact_form_phone ) ); ?>"><?php echo esc_html( $contact_form_phone ); ?></a>
                    </div>
                <?php endif; ?>

                <?php if ( $contact_form_email ) : ?>
                    <div class="rx-contact-direct">
                        <span class="rx-contact-direct-label"><?php esc_html_e( 'Email', 'rectify-custom' ); ?></span>
                        <a class="rx-contact-direct-value" href="<?php echo esc_url( 'mailto:' . $contact_form_email ); ?>"><?php echo esc_html( $contact_form_email ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'contact-cta' ) ) {
        // rendered by plugin, nothing else to do here
    } else { ?>
    <section class="rx-contact-cta" style="<?php echo esc_attr( '--rx-contact-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <?php if ( $cta_title ) : ?>
                <h2><?php echo esc_html( $cta_title ); ?></h2>
            <?php endif; ?>

            <?php if ( $cta_copy ) : ?>
                <p><?php echo esc_html( $cta_copy ); ?></p>
            <?php endif; ?>

            <div class="rx-contact-cta-grid">
                <?php foreach ( $contact_support_cards as $card ) : ?>
                    <?php
                    $card_title    = isset( $card['title'] ) ? $card['title'] : '';
                    $card_copy     = isset( $card['copy'] ) ? $card['copy'] : '';
                    $card_fallback = isset( $card['icon_fallback'] ) ? $card['icon_fallback'] : '';
                    $card_icon     = $rx_card_icon( isset( $card['icon'] ) ? $card['icon'] : '', $card_fallback );
                    $card_type     = isset( $card['type'] ) ? $card['type'] : 'link';
                    $card_link     = $rx_link( isset( $card['link'] ) ? $card['link'] : array(), '#', 'Learn more' );
                    ?>
                    <article class="rx-contact-cta-card">
                        <?php if ( $card_icon ) : ?>
                            <span class="rx-contact-cta-icon"><img src="<?php echo esc_url( $card_icon ); ?>" alt=""></span>
                        <?php endif; ?>

                        <?php if ( $card_title ) : ?>
                            <h3><?php echo esc_html( $card_title ); ?></h3>
                        <?php endif; ?>

                        <?php if ( $card_copy ) : ?>
                            <p><?php echo esc_html( $card_copy ); ?></p>
                        <?php endif; ?>

                        <?php if ( 'phone' === $card_type && ! empty( $card['phone'] ) ) : ?>
                            <a class="rx-contact-cta-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( $card['phone'] ); ?>
                            </a>
                        <?php elseif ( $card_link['url'] && $card_link['title'] ) : ?>
                            <a class="rx-contact-cta-link" href="<?php echo esc_url( $card_link['url'] ); ?>" <?php echo $card_link['target'] ? 'target="' . esc_attr( $card_link['target'] ) . '"' : ''; ?>><?php echo esc_html( strtoupper( $card_link['title'] ) ); ?> <span aria-hidden="true">&#8594;</span></a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php } ?>

</article>

<?php
$rx_thankyou_assets = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
$rx_hubspot_contact_returned = isset( $_GET['hubspot_contact_submitted'] )
    && '1' === sanitize_text_field( wp_unslash( $_GET['hubspot_contact_submitted'] ) );
?>
<div
    id="rx-thankyou-modal-2"
    class="rx-thankyou-modal rx-thankyou-modal--quotation rx-thankyou-modal--contact"
    data-hubspot-form-id="f02ab874-fad0-436f-a5ca-56897af5b5cb"
    data-open-on-load="<?php echo $rx_hubspot_contact_returned ? 'true' : 'false'; ?>"
    data-submitted-query-arg="hubspot_contact_submitted"
    aria-hidden="true"
>
    <div class="rx-thankyou-backdrop" data-rx-thankyou-close></div>
    <div
        class="rx-thankyou-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="rx-thankyou-heading-hubspot-contact"
        tabindex="-1"
    >
        <button class="rx-thankyou-close" type="button" data-rx-thankyou-close aria-label="Close thank-you popup">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="rx-thankyou-scroll">
            <div class="rx-thankyou-body">
                <h2 id="rx-thankyou-heading-hubspot-contact">Your quote request has been received.</h2>
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
