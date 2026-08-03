<?php
/**
 * Meet the Team page content.
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

$default_members = array(
    array(
        'image'        => rx_asset_url( 'images/team-bg.jpg' ),
        'name'         => 'Furkan Resuloglu',
        'role'         => 'Director',
        'linkedin_url' => '#',
    ),
    array(
        'image'        => rx_asset_url( 'images/partners-trucks.jpg' ),
        'name'         => 'Robert Philip Irwin',
        'role'         => 'Business Development Manager',
        'linkedin_url' => '#',
    ),
    array(
        'image'        => rx_asset_url( 'images/guide-worker.jpg' ),
        'name'         => 'Bassam Hassan',
        'role'         => 'Regional Manager (SA/VIC/TAS)',
        'linkedin_url' => '#',
    ),
);

$default_question_cards = array(
    array(
        'icon'  => 'Rectify Icon Set_Call Expert.svg',
        'title' => 'Call Us',
        'copy'  => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
        'link'  => array( 'url' => 'tel:1800182020', 'title' => '1800 18 20 20' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
        'title' => 'Request an Assessment',
        'copy'  => 'Book an inspection or consultation to identify the cause of movement and explore the most appropriate solution.',
        'link'  => array( 'url' => home_url( '/assessment/' ), 'title' => 'Get a free quote' ),
    ),
    array(
        'icon'  => 'Rectify Icon Set_Explore Resources.svg',
        'title' => 'Explore Resources',
        'copy'  => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
        'link'  => array( 'url' => home_url( '/resources/' ), 'title' => 'Explore resources' ),
    ),
);

$hero_eyebrow = $rx_get_field( 'team_hero_eyebrow', 'OUR TEAM' );
$hero_title   = $rx_get_field( 'team_hero_title', 'Our leadership team' );
$hero_heading = $rx_get_field( 'team_hero_supporting_title', 'A dedicated team of specialists - strengthening Australia\'s foundations' );
$hero_copy    = $rx_get_field( 'team_hero_copy', 'At Rectify, our people are our greatest strength. Our leadership team brings together technical expertise, operational discipline, and a shared commitment to engineered structural outcomes. Across residential, commercial, industrial, and infrastructure environments, we lead with precision, accountability, and a clear focus on protecting and extending the life of built assets.' );

$members_title = $rx_get_field( 'team_members_title' );
$members_copy  = $rx_get_field( 'team_members_copy' );
$members       = $rx_get_field( 'team_members', $default_members );

$questions_title = $rx_get_field( 'team_questions_title', 'Still Have Questions?' );
$questions_copy  = $rx_get_field( 'team_questions_copy', 'Structural movement can be complex. Our team is here to help you understand the cause, the risks, and the most appropriate solution for your property or asset.' );
$question_cards  = $rx_get_field( 'team_question_cards', $default_question_cards );

$cta_title = $rx_get_field( 'team_cta_title', 'Noticed Cracks, Uneven Floors or Structural Movement?' );
$cta_copy  = $rx_get_field( 'team_cta_copy', 'Small signs today can become costly structural problems tomorrow. Our specialists assess the cause and recommend the most effective solution to protect your property.' );
$cta_supporting_copy = $rx_get_field( 'team_cta_supporting_copy', 'Book an inspection and gain confidence in your home\'s structural integrity.' );
$cta_primary_link    = $rx_link( $rx_get_field( 'team_cta_primary_link' ), home_url( '/assessment/' ), 'Get a free quote' );
$cta_secondary_link  = $rx_link( $rx_get_field( 'team_cta_secondary_link' ), home_url( '/residential/' ), 'Explore our residential solutions' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-team-page' ); ?>>
    <section class="rx-team-hero-panel">
        <div class="rx-wrap rx-team-hero-grid">
            <div class="rx-reveal">
                <?php if ( $hero_eyebrow ) : ?>
                    <span class="rx-kicker"><?php echo esc_html( $hero_eyebrow ); ?></span>
                <?php endif; ?>
                <h1><?php echo esc_html( $hero_title ); ?></h1>
                <nav class="rx-team-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                    <span aria-hidden="true">></span>
                    <span><?php esc_html_e( 'About Us', 'rectify-custom' ); ?></span>
                    <span aria-hidden="true">></span>
                    <span><?php echo esc_html( get_the_title() ); ?></span>
                </nav>
            </div>
            <div class="rx-team-hero-summary rx-reveal">
                <h2><?php echo esc_html( $hero_heading ); ?></h2>
                <p><?php echo esc_html( $hero_copy ); ?></p>
            </div>
        </div>
    </section>

    <section class="rx-team-members">
        <div class="rx-wrap">
            <?php if ( $members_title || $members_copy ) : ?>
                <div class="rx-team-section-head rx-reveal">
                    <?php if ( $members_title ) : ?>
                        <h2><?php echo esc_html( $members_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $members_copy ) : ?>
                        <p><?php echo esc_html( $members_copy ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $members ) && is_array( $members ) ) : ?>
                <div class="rx-team-member-grid rx-stagger">
                    <?php foreach ( $members as $member ) : ?>
                        <?php
                        $member_name     = isset( $member['name'] ) ? $member['name'] : '';
                        $member_role     = isset( $member['role'] ) ? $member['role'] : '';
                        $member_image    = $rx_image_url( isset( $member['image'] ) ? $member['image'] : '', 'large', rx_asset_url( 'images/team-bg.jpg' ) );
                        $member_linkedin = isset( $member['linkedin_url'] ) ? $member['linkedin_url'] : '';
                        ?>
                        <article class="rx-team-member-card">
                            <?php if ( $member_image ) : ?>
                                <figure>
                                    <img src="<?php echo esc_url( $member_image ); ?>" alt="<?php echo esc_attr( $member_name ); ?>">
                                </figure>
                            <?php endif; ?>
                            <div class="rx-team-member-meta">
                                <div>
                                    <h3><?php echo esc_html( $member_name ); ?></h3>
                                    <p><?php echo esc_html( $member_role ); ?></p>
                                </div>
                                <?php if ( $member_linkedin ) : ?>
                                    <a class="rx-team-linkedin" href="<?php echo esc_url( $member_linkedin ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( sprintf( __( 'View %s on LinkedIn', 'rectify-custom' ), $member_name ) ); ?>">in</a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="rx-team-questions" style="<?php echo esc_attr( '--rx-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
        <div class="rx-wrap">
            <div class="rx-team-question-head rx-reveal">
                <h2><?php echo esc_html( $questions_title ); ?></h2>
                <p><?php echo esc_html( $questions_copy ); ?></p>
            </div>

            <?php if ( ! empty( $question_cards ) && is_array( $question_cards ) ) : ?>
                <div class="rx-team-question-grid rx-stagger">
                    <?php foreach ( $question_cards as $card ) : ?>
                        <?php
                        $card_title = isset( $card['title'] ) ? $card['title'] : '';
                        $card_copy  = isset( $card['copy'] ) ? $card['copy'] : '';
                        $card_icon_value = isset( $card['icon'] ) ? $card['icon'] : '';
                        $card_icon = $rx_card_icon( $card_icon_value, is_string( $card_icon_value ) ? $card_icon_value : 'Rectify Icon Set_Call Expert.svg' );
                        $card_link = $rx_link( isset( $card['link'] ) ? $card['link'] : array(), '#', 'Learn more' );
                        ?>
                        <article class="rx-team-question-card">
                            <?php if ( $card_icon ) : ?>
                                <span class="rx-team-question-icon"><img src="<?php echo esc_url( $card_icon ); ?>" alt=""></span>
                            <?php endif; ?>
                            <h3><?php echo esc_html( $card_title ); ?></h3>
                            <p><?php echo esc_html( $card_copy ); ?></p>
                            <?php if ( $card_link['url'] && $card_link['title'] ) : ?>
                                <a href="<?php echo esc_url( $card_link['url'] ); ?>" <?php echo $card_link['target'] ? 'target="' . esc_attr( $card_link['target'] ) . '"' : ''; ?>>
                                    <?php echo esc_html( $card_link['title'] ); ?>
                                    <span aria-hidden="true">-></span>
                                </a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="rx-team-final-cta">
        <div class="rx-wrap">
            <h2><?php echo esc_html( $cta_title ); ?></h2>
            <?php if ( $cta_copy ) : ?>
                <p><?php echo esc_html( $cta_copy ); ?></p>
            <?php endif; ?>
            <?php if ( $cta_supporting_copy ) : ?>
                <p class="rx-team-cta-supporting"><?php echo esc_html( $cta_supporting_copy ); ?></p>
            <?php endif; ?>
            <div class="rx-team-cta-actions">
                <a class="rx-btn rx-btn-white" href="<?php echo esc_url( $cta_primary_link['url'] ); ?>" <?php echo $cta_primary_link['target'] ? 'target="' . esc_attr( $cta_primary_link['target'] ) . '"' : ''; ?>><?php echo esc_html( $cta_primary_link['title'] ); ?></a>
                <a class="rx-team-cta-outline" href="<?php echo esc_url( $cta_secondary_link['url'] ); ?>" <?php echo $cta_secondary_link['target'] ? 'target="' . esc_attr( $cta_secondary_link['target'] ) . '"' : ''; ?>>
                    <?php echo esc_html( $cta_secondary_link['title'] ); ?>
                    <span aria-hidden="true">-></span>
                </a>
            </div>
        </div>
    </section>
</article>
