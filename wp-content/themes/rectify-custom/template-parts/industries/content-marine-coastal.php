<?php
/**
 * Industries: Marine & Coastal page content template.
 *
 * Matches the dedicated Marine & Coastal Figma design (node 1130:25480).
 * Every section is supplied by the Rectify Page Builder's reusable ii-*
 * blocks so the complete page remains editable in wp-admin. Styling lives
 * entirely in assets/css/industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_mc_renderers = array(
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

$rx_mc_blocks = function_exists( 'rectify_pb_get_marine_coastal_seed_blocks' )
    ? rectify_pb_get_marine_coastal_seed_blocks()
    : array();

$rx_mc_sections = array();

foreach ( $rx_mc_blocks as $rx_mc_block ) {
    $rx_mc_key      = isset( $rx_mc_block['section_key'] ) ? $rx_mc_block['section_key'] : '';
    $rx_mc_type     = isset( $rx_mc_block['type'] ) ? $rx_mc_block['type'] : '';
    $rx_mc_fields   = isset( $rx_mc_block['fields'] ) && is_array( $rx_mc_block['fields'] ) ? $rx_mc_block['fields'] : array();
    $rx_mc_renderer = isset( $rx_mc_renderers[ $rx_mc_type ] ) ? $rx_mc_renderers[ $rx_mc_type ] : '';

    if ( ! $rx_mc_key || ! $rx_mc_renderer || ! function_exists( $rx_mc_renderer ) ) {
        continue;
    }

    $rx_mc_sections[] = array(
        'key'    => $rx_mc_key,
        'render' => function () use ( $rx_mc_renderer, $rx_mc_fields, $rx_mc_key ) {
            call_user_func( $rx_mc_renderer, $rx_mc_fields, $rx_mc_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-marine-coastal' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_mc_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_mc_sections );
    }
    ?>
</article>

<script>
(function () {
    var track = document.querySelector( '.rx-ii-marine-coastal .rx-ii-solutions-track' );
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
