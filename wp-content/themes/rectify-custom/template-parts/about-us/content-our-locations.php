<?php
/**
 * Our Locations page content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-loc-page' ); ?>>

    <?php if ( function_exists( 'rectify_pb_render_page_sections' ) ) :
        rectify_pb_render_page_sections( get_the_ID(), array(
            array(
                'key' => 'loc-hero',
                'render' => function () {
                    ?>
                    <section class="rx-loc-hero">
                        <div class="rx-wrap rx-loc-hero-grid">
                            <div>
                                <span class="rx-kicker"><?php esc_html_e( 'Our Locations', 'rectify-custom' ); ?></span>
                                <h1><?php esc_html_e( 'Find Your Nearest Rectify Office', 'rectify-custom' ); ?></h1>
                                <nav class="rx-loc-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rectify-custom' ); ?>">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'rectify-custom' ); ?></a>
                                    <span aria-hidden="true">&gt;</span>
                                    <span><?php esc_html_e( 'About Us', 'rectify-custom' ); ?></span>
                                    <span aria-hidden="true">&gt;</span>
                                    <span><?php esc_html_e( 'Our Locations', 'rectify-custom' ); ?></span>
                                </nav>
                            </div>
                            <p><?php esc_html_e( 'With offices and project teams operating across Australia, Rectify provides local support backed by national expertise in structural stabilisation, ground engineering, and asset remediation.', 'rectify-custom' ); ?></p>
                        </div>
                    </section>

                    <div class="rx-loc-banner">
                        <img src="<?php echo esc_url( rx_asset_url( 'images/home/TruckandVanathouse.jpg' ) ); ?>" alt="">
                    </div>
                    <?php
                },
            ),
            array(
                'key' => 'loc-offices',
                'render' => function () {
                    $offices = array(
                        array(
                            'icon'    => 'Rectify Icon Set_Victoria_red.svg',
                            'title'   => 'Head Office',
                            'address' => '28 Trade Park Drive, Tullamarine VIC 3043',
                            'phone'   => '1800 18 20 20',
                            'email'   => 'admin@rectify.com.au',
                            'lat'     => -37.6879,
                            'lng'     => 144.8410,
                        ),
                        array(
                            'icon'    => 'Rectify Icon Set_Tasmania_red.svg',
                            'title'   => 'Tasmania Office',
                            'address' => 'Level 3, 85 Macquarie Street, Hobart TAS 7000',
                            'phone'   => '1800 18 20 20',
                            'email'   => 'admin@rectify.com.au',
                            'lat'     => -42.8821,
                            'lng'     => 147.3272,
                        ),
                        array(
                            'icon'    => 'Rectify Icon Set_Adelaide.svg',
                            'title'   => 'South Australia Office',
                            'address' => 'Level 3, 97 Pirie Street, Adelaide SA 5000',
                            'phone'   => '1800 18 20 20',
                            'email'   => 'admin@rectify.com.au',
                            'lat'     => -34.9249,
                            'lng'     => 138.6058,
                        ),
                    );
                    ?>
                    <section class="rx-loc-offices">
                        <div class="rx-wrap">
                            <div class="rx-loc-section-head">
                                <h2><?php esc_html_e( 'Find Your Local Rectify Team', 'rectify-custom' ); ?></h2>
                                <p><?php esc_html_e( 'Connect with your nearest office for expert advice, project enquiries, site assessments, and structural remediation solutions tailored to your location.', 'rectify-custom' ); ?></p>
                            </div>

                            <div class="rx-loc-office-grid">
                                <?php foreach ( $offices as $office ) : ?>
                                    <article class="rx-loc-office-card">
                                        <span class="rx-loc-office-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $office['icon'] ) ); ?>" alt=""></span>
                                        <h3><?php echo esc_html( $office['title'] ); ?></h3>
                                        <p><?php echo esc_html( $office['address'] ); ?></p>

                                        <a class="rx-loc-contact-row" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $office['phone'] ) ); ?>">
                                            <span class="rx-loc-contact-icon" aria-hidden="true">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.3 21 3 13.7 3 4.8c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.4 0 .8-.2 1L6.6 10.8z" fill="currentColor"/></svg>
                                            </span>
                                            <?php echo esc_html( $office['phone'] ); ?>
                                        </a>

                                        <a class="rx-loc-contact-row" href="<?php echo esc_url( 'mailto:' . $office['email'] ); ?>">
                                            <span class="rx-loc-contact-icon" aria-hidden="true">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M3 5.5A1.5 1.5 0 0 1 4.5 4h15A1.5 1.5 0 0 1 21 5.5v13a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18.5v-13z" fill="currentColor"/><path d="M4 5.5l8 6.5 8-6.5" stroke="#fff" stroke-width="1.4" fill="none"/></svg>
                                            </span>
                                            <?php echo esc_html( $office['email'] ); ?>
                                        </a>

                                        <a class="rx-loc-map-link" href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $office['address'] ) ); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php esc_html_e( 'View on Map', 'rectify-custom' ); ?>
                                            <span aria-hidden="true">&#8594;</span>
                                        </a>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>

                    <?php
                    $map_offices = array_map( function ( $office ) {
                        return array(
                            'title'   => $office['title'],
                            'address' => $office['address'],
                            'phone'   => $office['phone'],
                            'lat'     => $office['lat'],
                            'lng'     => $office['lng'],
                        );
                    }, $offices );
                    ?>
                    <section class="rx-loc-map-section">
                        <div
                            class="rx-loc-map"
                            id="rxLocMap"
                            data-offices="<?php echo esc_attr( wp_json_encode( $map_offices ) ); ?>"
                            data-pin-icon="<?php echo esc_url( rx_asset_url( 'images/our-locations/map-pin.svg' ) ); ?>"
                            aria-label="<?php esc_attr_e( 'Map showing Rectify office locations in Victoria, Tasmania and South Australia', 'rectify-custom' ); ?>"
                        >
                            <noscript>
                                <img class="rx-loc-map-image" src="<?php echo esc_url( rx_asset_url( 'images/our-locations/australia-map.jpg' ) ); ?>" alt="Map of southern Australia showing Rectify offices in Adelaide, Melbourne and Hobart">
                            </noscript>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key' => 'loc-footprint',
                'render' => function () {
                    ?>
                    <section class="rx-loc-footprint">
                        <img class="rx-loc-footprint-image" src="<?php echo esc_url( rx_asset_url( 'images/our-locations/growing-footprint.jpg' ) ); ?>" alt="Rectify specialist assessing structural movement at a residential property">
                        <div class="rx-loc-footprint-shade" aria-hidden="true"></div>
                        <div class="rx-wrap rx-loc-footprint-content">
                            <h2><?php esc_html_e( 'A growing footprint', 'rectify-custom' ); ?></h2>
                            <div class="rx-loc-footprint-copy">
                                <p><?php esc_html_e( 'As Rectify continues to expand, our focus remains the same: deliver specialist solutions with professionalism, strong communication, and a process homeowners can trust.', 'rectify-custom' ); ?></p>
                                <p><?php esc_html_e( 'Growth matters because it allows more people to access the right type of support when their property begins to show signs of movement or instability.', 'rectify-custom' ); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
            array(
                'key' => 'loc-cta',
                'render' => function () {
                    $help_cards = array(
                        array(
                            'icon'  => 'Rectify Icon Set_Call Expert.svg',
                            'title' => 'Call Us',
                            'copy'  => 'Speak directly with a specialist for expert guidance on structural movement, and remediation solutions.',
                            'type'  => 'phone',
                            'phone' => '1800 18 20 20',
                        ),
                        array(
                            'icon'  => 'Rectify Icon Set_Request Assessment_red.svg',
                            'title' => 'Estimate Project Cost',
                            'copy'  => 'Use our interactive estimator to understand the likely investment before requesting a professional assessment.',
                            'type'  => 'link',
                            'label' => 'Get My Cost Estimate',
                            'url'   => home_url( '/assessment/' ),
                        ),
                        array(
                            'icon'  => 'Rectify Icon Set_Explore Resources.svg',
                            'title' => 'Explore Resources',
                            'copy'  => 'Access practical guides, real project case studies, and expert insights on structural movement and remediation.',
                            'type'  => 'link',
                            'label' => 'Explore Resources',
                            'url'   => home_url( '/resources/' ),
                        ),
                    );
                    ?>
                    <section class="rx-loc-cta" style="<?php echo esc_attr( '--rx-loc-contours:url(' . esc_url_raw( rx_asset_url( 'images/home/Contour on Navy Blue.png' ) ) . ');' ); ?>">
                        <div class="rx-wrap">
                            <h2><?php esc_html_e( 'Need Help Choosing the Right Solution?', 'rectify-custom' ); ?></h2>
                            <p><?php esc_html_e( 'Whether you\'re dealing with foundation movement, structural cracking or ground instability, our specialists can help you understand the cause, explore your options and take the next step with confidence.', 'rectify-custom' ); ?></p>

                            <div class="rx-loc-help-grid">
                                <?php foreach ( $help_cards as $card ) : ?>
                                    <article class="rx-loc-help-card">
                                        <span class="rx-loc-card-icon"><img src="<?php echo esc_url( rx_asset_url( 'icons-red/' . $card['icon'] ) ); ?>" alt=""></span>
                                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                                        <p><?php echo esc_html( $card['copy'] ); ?></p>
                                        <?php if ( 'phone' === $card['type'] ) : ?>
                                            <a class="rx-loc-help-phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $card['phone'] ) ); ?>">
                                                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( $card['phone'] ); ?>
                                            </a>
                                        <?php else : ?>
                                            <a class="rx-loc-help-link" href="<?php echo esc_url( $card['url'] ); ?>">
                                                <?php echo esc_html( strtoupper( $card['label'] ) ); ?> <span aria-hidden="true">&#8594;</span>
                                            </a>
                                        <?php endif; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                    <?php
                },
            ),
        ) );
    endif; ?>

</article>
