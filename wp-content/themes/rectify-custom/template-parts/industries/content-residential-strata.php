<?php
/**
 * Industries: Residential & Strata page content template.
 *
 * Matches the Figma "Protecting Residential and Strata Properties with
 * Engineered Structural Solutions" design (node 1130:26529). All editable
 * content is supplied by the Rectify Page Builder ii-* blocks. The shared
 * rx-ii-commercial-buildings class opts this page into the common
 * detailed-industry Figma layout; residential-specific differences are scoped
 * by rx-ii-residential-strata in assets/css/industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_rs_renderers = array(
    'ii-banner'       => 'rectify_pb_render_ii_banner',
    'ii-intro'        => 'rectify_pb_render_ii_intro',
    'ii-challenges'   => 'rectify_pb_render_ii_challenges',
    'ii-photo-banner' => 'rectify_pb_render_ii_photo_banner',
    'ii-solutions'    => 'rectify_pb_render_ii_solutions',
    'ii-why-choose'   => 'rectify_pb_render_ii_why_choose',
    'ii-process'      => 'rectify_pb_render_ii_process',
    'ii-assets'       => 'rectify_pb_render_ii_assets',
    'ii-faq'          => 'rectify_pb_render_ii_faq',
    'ii-cta'          => 'rectify_pb_render_ii_cta',
);

$rx_rs_blocks = function_exists( 'rectify_pb_get_residential_strata_seed_blocks' )
    ? rectify_pb_get_residential_strata_seed_blocks()
    : array();

$rx_rs_sections = array();

foreach ( $rx_rs_blocks as $rx_rs_block ) {
    $rx_rs_key      = isset( $rx_rs_block['section_key'] ) ? $rx_rs_block['section_key'] : '';
    $rx_rs_type     = isset( $rx_rs_block['type'] ) ? $rx_rs_block['type'] : '';
    $rx_rs_fields   = isset( $rx_rs_block['fields'] ) && is_array( $rx_rs_block['fields'] ) ? $rx_rs_block['fields'] : array();
    $rx_rs_renderer = isset( $rx_rs_renderers[ $rx_rs_type ] ) ? $rx_rs_renderers[ $rx_rs_type ] : '';

    if ( ! $rx_rs_key || ! $rx_rs_renderer || ! function_exists( $rx_rs_renderer ) ) {
        continue;
    }

    $rx_rs_sections[] = array(
        'key'    => $rx_rs_key,
        'render' => function () use ( $rx_rs_renderer, $rx_rs_fields, $rx_rs_key ) {
            call_user_func( $rx_rs_renderer, $rx_rs_fields, $rx_rs_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-residential-strata' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_rs_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_rs_sections );
    }
    ?>
</article>

<script>
(function () {
    var track = document.querySelector( '.rx-ii-residential-strata .rx-ii-solutions-track' );
    if ( ! track ) {
        return;
    }

    var grid = track.querySelector( '.rx-ii-solutions-grid' );
    var next = track.querySelector( '.rx-ii-solutions-next' );
    var prev = track.querySelector( '.rx-ii-solutions-prev' );

    if ( ! grid || ! next || ! prev ) {
        return;
    }

    function move( direction ) {
        var card = grid.querySelector( '.rx-ii-solution-card' );
        if ( ! card ) {
            return;
        }

        var step = card.getBoundingClientRect().width + parseFloat( getComputedStyle( grid ).columnGap || 24 );
        grid.scrollTo( {
            left: grid.scrollLeft + ( step * direction ),
            behavior: 'smooth'
        } );
    }

    next.addEventListener( 'click', function () {
        move( 1 );
    } );

    prev.addEventListener( 'click', function () {
        move( -1 );
    } );
})();
</script>
