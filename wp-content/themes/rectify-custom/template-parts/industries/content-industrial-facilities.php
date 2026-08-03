<?php
/**
 * Industries: Industrial Facilities page content template.
 *
 * Matches the Figma "Engineered Structural Solutions for Industrial
 * Facilities" design (node 1104:25085). All editable content is supplied by
 * the Rectify Page Builder ii-* blocks; the seed data doubles as the
 * first-render fallback. The shared rx-ii-commercial-buildings class opts this
 * page into the common detailed-industry layout; industrial-specific
 * measurements are scoped by rx-ii-industrial-facilities in
 * industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_if_renderers = array(
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

$rx_if_blocks = function_exists( 'rectify_pb_get_industrial_facilities_seed_blocks' )
    ? rectify_pb_get_industrial_facilities_seed_blocks()
    : array();

$rx_if_sections = array();

foreach ( $rx_if_blocks as $rx_if_block ) {
    $rx_if_key      = isset( $rx_if_block['section_key'] ) ? $rx_if_block['section_key'] : '';
    $rx_if_type     = isset( $rx_if_block['type'] ) ? $rx_if_block['type'] : '';
    $rx_if_fields   = isset( $rx_if_block['fields'] ) && is_array( $rx_if_block['fields'] ) ? $rx_if_block['fields'] : array();
    $rx_if_renderer = isset( $rx_if_renderers[ $rx_if_type ] ) ? $rx_if_renderers[ $rx_if_type ] : '';

    if ( ! $rx_if_key || ! $rx_if_renderer || ! function_exists( $rx_if_renderer ) ) {
        continue;
    }

    $rx_if_sections[] = array(
        'key'    => $rx_if_key,
        'render' => function () use ( $rx_if_renderer, $rx_if_fields, $rx_if_key ) {
            call_user_func( $rx_if_renderer, $rx_if_fields, $rx_if_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-industrial-facilities' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_if_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_if_sections );
    }
    ?>
</article>

<script>
(function () {
    var track = document.querySelector( '.rx-ii-industrial-facilities .rx-ii-solutions-track' );
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
