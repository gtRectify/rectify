<?php
/**
 * Residential Solutions page content.
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

$rx_points = function ( $items ) {
    if ( empty( $items ) || ! is_array( $items ) ) {
        return array();
    }

    $points = array();

    foreach ( $items as $item ) {
        if ( is_array( $item ) ) {
            $point = isset( $item['point'] ) ? $item['point'] : reset( $item );
        } else {
            $point = $item;
        }

        if ( '' !== $point && null !== $point ) {
            $points[] = $point;
        }
    }

    return $points;
};

$rx_card_icon = function ( $icon, $fallback_file = '' ) use ( $rx_image_url ) {
    if ( is_string( $icon ) && '' !== $icon && false === strpos( $icon, '://' ) && 0 !== strpos( $icon, '/' ) && 0 !== strpos( $icon, 'data:' ) ) {
        $red_icon = rx_asset_url( 'icons-red/' . $icon );
        return $red_icon ? $red_icon : rx_asset_url( 'icons/' . $icon );
    }

    $fallback = $fallback_file ? rx_asset_url( 'icons-red/' . $fallback_file ) : '';
    return $rx_image_url( $icon, 'thumbnail', $fallback );
};

$default_solutions = array(
    array(
        'icon'         => 'Rectify Icon Set_Chemical Underpinning.svg',
        'title'        => 'Chemical Underpinning',
        'copy'         => 'Advanced ground stabilisation without major excavation.',
        'point_title'  => 'Benefits:',
        'points'       => array( 'Minimal excavation', 'Fast installation', 'Reduced disruption', 'Precision lifting where appropriate' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/chemical-underpinning/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Foundation Repair.svg',
        'title'        => 'Foundation Repair',
        'copy'         => 'Address structural issues before they become costly.',
        'point_title'  => 'Common signs include:',
        'points'       => array( 'Wall cracking', 'Sloping floors', 'Doors and windows sticking', 'Separation around walls or ceilings' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/foundation-repair/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Slab Lifting 3.png',
        'title'        => 'Slab Lifting',
        'copy'         => 'Restore sunken concrete slabs with precision.',
        'point_title'  => 'Suitable for:',
        'points'       => array( 'Internal floor slabs', 'Garage slabs', 'Outdoor concrete slabs', 'Pathways' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/slab-lifting-slab-jacking/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_House Relevelling.svg',
        'title'        => 'House Relevelling',
        'copy'         => 'Restore your home\'s level and structural performance.',
        'point_title'  => 'Helps resolve:',
        'points'       => array( 'Sloping floors', 'Structural distortion', 'Misaligned doors and windows', 'Ongoing foundation movement' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/house-relevelling/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Driveway Relevelling.svg',
        'title'        => 'Driveway Relevelling',
        'copy'         => 'Improve safety, appearance and functionality.',
        'point_title'  => 'Benefits:',
        'points'       => array( 'Improved safety', 'Better water drainage', 'Enhanced street appeal', 'Extended concrete lifespan' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/driveway-relevelling/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Brick Fence Revelling.svg',
        'title'        => 'Mailbox & Brick Fence Relevelling',
        'copy'         => 'Restore stability without unnecessary rebuilding.',
        'point_title'  => 'Ideal for:',
        'points'       => array( 'Leaning brick fences', 'Sunken letterboxes', 'Boundary wall movement', 'Masonry settlement' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/mailbox-brick-fence-releveling/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Heritage Building.svg',
        'title'        => 'Basement Construction Support',
        'copy'         => 'Build on stronger, more stable ground.',
        'point_title'  => 'Suitable for:',
        'points'       => array( 'New basement construction', 'Sites with unstable ground conditions', 'Ground stabilisation', 'Improving foundation performance' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/basement-construction-support/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Sand Permeation_red.svg',
        'title'        => 'Sand Permeation',
        'copy'         => 'Improve weak or loose ground conditions.',
        'point_title'  => 'Applications:',
        'points'       => array( 'Weak or loose soils', 'Foundation support', 'Erosion control', 'Ground improvement' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/sand-permeation/', 'title' => 'Learn More' ),
    ),
    array(
        'icon'         => 'Rectify Icon Set_Ground Improvement.svg',
        'title'        => 'Ground Improvement',
        'copy'         => 'Strengthen the ground before problems develop.',
        'point_title'  => 'Suitable for:',
        'points'       => array( 'Poor soil conditions', 'Foundation support', 'Residential extensions', 'Areas prone to settlement' ),
        'link'         => array( 'url' => 'http://localhost/rectify_fresh/residential/ground-improvement/', 'title' => 'Learn More' ),
    ),
);

$why_card_asset = static function ( $filename ) {
    return rx_asset_url( 'images/commercial-archive/' . ltrim( $filename, '/' ) );
};

$default_why_cards = array(
    array( 'icon' => 'call-expert.svg', 'title' => 'Call Us', 'copy' => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.', 'phone' => '1800 18 20 20', 'url' => 'tel:1800182020' ),
    array( 'icon' => 'estimate-project-cost.svg', 'title' => 'Estimate Project Cost', 'copy' => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.', 'link' => 'Get My Cost Estimate', 'url' => home_url( '/cost-calculator/' ) ),
    array( 'icon' => 'explore-resources.svg', 'title' => 'Explore Resources', 'copy' => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.', 'link' => 'Explore Resources', 'url' => home_url( '/resources/' ) ),
);

$hero_eyebrow = $rx_get_field( 'residential_hero_eyebrow', 'Residential' );
$hero_title   = $rx_get_field( 'residential_hero_title', get_the_title() );
$hero_heading = $rx_get_field( 'residential_hero_supporting_title', 'Protect Your Home with Long-Term Structural Confidence' );
$hero_copy    = $rx_get_field( 'residential_hero_copy', 'Your home is one of your most valuable investments, and when signs of foundation movement begin to appear, acting early can prevent more extensive structural damage. Cracks in walls, uneven floors, sticking doors and windows, or sinking concrete are often symptoms of movement beneath the structure, not just cosmetic issues.' );
$hero_image   = $rx_image_url( $rx_get_field( 'residential_hero_image' ), 'full', rx_asset_url( 'images/residential/residential-hero-strip.jpg' ) );

$intro_title    = $rx_get_field( 'residential_intro_title', 'We provide engineering-led residential solutions' );
$intro_copy     = $rx_get_field( 'residential_intro_copy', 'Designed to stabilise foundations, improve ground conditions, and restore structural performance with minimal disruption to your property. Rather than treating the visible symptoms, we address the underlying cause using proven ground engineering and structural remediation techniques. This aligns with Rectify\'s positioning as an engineering-led structural stabilisation specialist delivering long-term asset performance rather than cosmetic repairs.' );
$intro_image    = $rx_image_url( $rx_get_field( 'residential_intro_image' ), 'large', rx_asset_url( 'images/residential/residential-intro.jpg' ) );
$intro_eyebrow  = $rx_get_field( 'residential_intro_eyebrow' );

$solutions_eyebrow = $rx_get_field( 'residential_solutions_eyebrow' );
$solutions_title    = $rx_get_field( 'residential_solutions_title', 'Residential Solutions We Offer' );
$solutions_copy     = $rx_get_field( 'residential_solutions_copy' );
$solutions          = $rx_get_field( 'residential_solution_cards', $default_solutions );

$why_title = $rx_get_field( 'residential_proof_title', 'Why Choose Rectify' );
$why_copy  = $rx_get_field( 'residential_proof_copy' );
$why_cards = $rx_get_field( 'residential_why_cards', $default_why_cards );

$cta_title = $rx_get_field( 'residential_cta_title', 'Not Sure Which Solution You Need?' );
$cta_copy  = $rx_get_field( 'residential_cta_copy', 'Every home is different, and the visible signs of damage do not always reveal the underlying cause. Our specialists can assess your property\'s condition, identify the source of foundation movement, and recommend the most appropriate engineered solution for your home.' );
$cta_primary_link   = $rx_link( $rx_get_field( 'residential_cta_primary_link' ), home_url( '/contact/' ), 'Contact Us' );
$cta_secondary_link = $rx_link( $rx_get_field( 'residential_cta_secondary_link' ), 'tel:1800182020', '1800 18 20 20' );
$cta_email_link     = $rx_link( $rx_get_field( 'residential_cta_email_link' ), 'mailto:admin@rectify.com.au', 'admin@rectify.com.au' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-residential-page rx-residential-figma' ); ?>>
    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'residential-hero' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-residential-hero-panel">
        <div class="rx-wrap rx-residential-hero-grid">
            <div class="rx-reveal">
                <?php if ( $hero_eyebrow ) : ?>
                    <span class="rx-kicker"><?php echo esc_html( $hero_eyebrow ); ?></span>
                <?php endif; ?>
                <h1><?php echo esc_html( $hero_title ); ?></h1>
                <nav class="rx-residential-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                    <span aria-hidden="true">></span>
                    <span><?php echo esc_html( $hero_title ); ?></span>
                </nav>
            </div>
            <div class="rx-residential-hero-summary rx-reveal">
                <h2><?php echo esc_html( $hero_heading ); ?></h2>
                <p><?php echo esc_html( $hero_copy ); ?></p>
            </div>
        </div>
    </section>

    <?php if ( $hero_image ) : ?>
        <figure class="rx-residential-strip">
            <img src="<?php echo esc_url( $hero_image ); ?>" alt="">
        </figure>
    <?php endif; ?>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'residential-intro' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-residential-intro">
        <div class="rx-wrap rx-residential-intro-grid">
            <div class="rx-reveal">
                <?php if ( $intro_eyebrow ) : ?>
                    <span class="rx-kicker"><?php echo esc_html( $intro_eyebrow ); ?></span>
                <?php endif; ?>
                <h2><?php echo esc_html( $intro_title ); ?></h2>
                <div class="rx-residential-richtext"><?php echo wp_kses_post( wpautop( $intro_copy ) ); ?></div>
            </div>
            <?php if ( $intro_image ) : ?>
                <figure class="rx-residential-intro-media rx-reveal">
                    <img src="<?php echo esc_url( $intro_image ); ?>" alt="">
                </figure>
            <?php endif; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'residential-solutions-grid' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-residential-solutions" id="residential-solutions">
        <div class="rx-wrap">
            <?php if ( $solutions_eyebrow ) : ?>
                <span class="rx-kicker"><?php echo esc_html( $solutions_eyebrow ); ?></span>
            <?php endif; ?>
            <h2 class="rx-residential-section-title rx-reveal"><?php echo esc_html( $solutions_title ); ?></h2>
            <?php if ( $solutions_copy ) : ?>
                <div class="rx-residential-richtext rx-residential-solutions-copy rx-reveal"><?php echo wp_kses_post( wpautop( $solutions_copy ) ); ?></div>
            <?php endif; ?>
            <?php if ( ! empty( $solutions ) && is_array( $solutions ) ) : ?>
                <div class="rx-residential-solution-grid rx-stagger">
                    <?php foreach ( $solutions as $solution ) : ?>
                        <?php
                        $solution_title       = isset( $solution['title'] ) ? $solution['title'] : '';
                        $solution_copy        = isset( $solution['copy'] ) ? $solution['copy'] : '';
                        $solution_icon_value  = isset( $solution['icon'] ) ? $solution['icon'] : '';
                        $solution_link        = $rx_link( isset( $solution['link'] ) ? $solution['link'] : array(), '#', 'Learn More' );
                        $solution_point_title = isset( $solution['point_title'] ) ? $solution['point_title'] : '';
                        $solution_points      = $rx_points( isset( $solution['points'] ) ? $solution['points'] : array() );
                        $solution_icon_file   = is_string( $solution_icon_value ) ? $solution_icon_value : '';
                        $solution_icon        = $rx_card_icon( $solution_icon_value, $solution_icon_file );
                        ?>
                        <article class="rx-residential-solution-card">
                            <div class="rx-residential-card-top">
                                <?php if ( $solution_icon ) : ?>
                                    <span class="rx-residential-card-icon"><img src="<?php echo esc_url( $solution_icon ); ?>" alt=""></span>
                                <?php endif; ?>
                                <a class="rx-residential-learn" href="<?php echo esc_url( $solution_link['url'] ); ?>" <?php echo $solution_link['target'] ? 'target="' . esc_attr( $solution_link['target'] ) . '"' : ''; ?>>
                                    <?php echo esc_html( $solution_link['title'] ); ?>
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>
                            <h3><?php echo esc_html( $solution_title ); ?></h3>
                            <p><?php echo esc_html( $solution_copy ); ?></p>
                            <?php if ( $solution_point_title || ! empty( $solution_points ) ) : ?>
                                <div class="rx-residential-points">
                                    <?php if ( $solution_point_title ) : ?>
                                        <h4><?php echo esc_html( $solution_point_title ); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $solution_points ) ) : ?>
                                        <ul>
                                            <?php foreach ( $solution_points as $point ) : ?>
                                                <li><?php echo esc_html( $point ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'residential-why' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <section class="rx-residential-why" style="<?php echo esc_attr( '--rx-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <h2 class="rx-residential-section-title rx-reveal"><?php echo esc_html( $why_title ); ?></h2>
            <?php if ( $why_copy ) : ?>
                <div class="rx-residential-richtext rx-residential-why-copy rx-reveal"><?php echo wp_kses_post( wpautop( $why_copy ) ); ?></div>
            <?php endif; ?>
            <?php if ( ! empty( $why_cards ) && is_array( $why_cards ) ) : ?>
                <div class="rx-residential-why-grid rx-stagger">
                    <?php foreach ( $why_cards as $card ) : ?>
                        <?php
                        $card_title      = isset( $card['title'] ) ? $card['title'] : '';
                        $card_copy       = isset( $card['copy'] ) ? $card['copy'] : '';
                        $card_icon_value = isset( $card['icon'] ) ? $card['icon'] : '';
                        $card_icon_file  = is_string( $card_icon_value ) ? $card_icon_value : '';
                        $card_icon       = $card_icon_file ? $why_card_asset( $card_icon_file ) : $rx_card_icon( $card_icon_value, $card_icon_file );
                        ?>
                        <article class="rx-residential-why-card">
                            <?php if ( $card_icon ) : ?>
                                <span class="rx-residential-card-icon"><img src="<?php echo esc_url( $card_icon ); ?>" alt=""></span>
                            <?php endif; ?>
                            <h3><?php echo esc_html( $card_title ); ?></h3>
                            <div class="rx-residential-help-description"><p><?php echo esc_html( $card_copy ); ?></p></div>
                            <?php if ( ! empty( $card['phone'] ) ) : ?>
                                <a class="rx-residential-help-phone" href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['phone'] ); ?></a>
                            <?php elseif ( ! empty( $card['link'] ) ) : ?>
                                <a class="rx-residential-learn rx-residential-help-link" href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['link'] ); ?><span aria-hidden="true">&rarr;</span></a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php } ?>

    <?php if ( function_exists('rectify_builder_render_section') && rectify_builder_render_section( get_the_ID(), 'residential-cta' ) ) {
        // rendered by plugin, nothing else to do here
    } else {
    ?>
    <?php $cta_background = $rx_image_url( $rx_get_field( 'residential_cta_image' ), 'full' ); ?>
    <section class="rx-residential-cta" <?php echo $cta_background ? 'style="background-image:url(' . esc_url( $cta_background ) . ');"' : ''; ?>>
        <div class="rx-wrap rx-reveal">
            <h2><?php echo esc_html( $cta_title ); ?></h2>
            <p><?php echo esc_html( $cta_copy ); ?></p>
            <div class="rx-residential-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( $cta_primary_link['url'] ); ?>" <?php echo $cta_primary_link['target'] ? 'target="' . esc_attr( $cta_primary_link['target'] ) . '"' : ''; ?>><?php echo esc_html( $cta_primary_link['title'] ); ?></a>
                <a class="rx-residential-contact-pill" href="<?php echo esc_url( $cta_secondary_link['url'] ); ?>" <?php echo $cta_secondary_link['target'] ? 'target="' . esc_attr( $cta_secondary_link['target'] ) . '"' : ''; ?>><?php echo esc_html( $cta_secondary_link['title'] ); ?></a>
                <a class="rx-residential-contact-pill" href="<?php echo esc_url( $cta_email_link['url'] ); ?>" <?php echo $cta_email_link['target'] ? 'target="' . esc_attr( $cta_email_link['target'] ) . '"' : ''; ?>><?php echo esc_html( $cta_email_link['title'] ); ?></a>
            </div>
        </div>
    </section>
    <?php } ?>
</article>

