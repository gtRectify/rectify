<?php
/**
 * Industries: Commercial Buildings page content template.
 *
 * Matches the Figma "Structural Stabilisation Solutions for Commercial
 * Buildings" design. All content is supplied by the Rectify Page Builder's
 * ii-* blocks (the same system introduced for the Transport Assets page);
 * the seed data also provides the first-render fallback, keeping the
 * editable builder content and the front end in sync. Styling lives
 * entirely in assets/css/industries-inner-pages.css, scoped under the
 * .rx-ii-page wrapper below - shared with the Transport Assets page.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_cb_renderers = array(
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

$rx_cb_blocks = function_exists( 'rectify_pb_get_commercial_buildings_seed_blocks' )
    ? rectify_pb_get_commercial_buildings_seed_blocks()
    : array();

$rx_cb_sections = array();

foreach ( $rx_cb_blocks as $rx_cb_block ) {
    $rx_cb_key      = isset( $rx_cb_block['section_key'] ) ? $rx_cb_block['section_key'] : '';
    $rx_cb_type     = isset( $rx_cb_block['type'] ) ? $rx_cb_block['type'] : '';
    $rx_cb_fields   = isset( $rx_cb_block['fields'] ) && is_array( $rx_cb_block['fields'] ) ? $rx_cb_block['fields'] : array();
    $rx_cb_renderer = isset( $rx_cb_renderers[ $rx_cb_type ] ) ? $rx_cb_renderers[ $rx_cb_type ] : '';

    if ( ! $rx_cb_key || ! $rx_cb_renderer || ! function_exists( $rx_cb_renderer ) ) {
        continue;
    }

    $rx_cb_sections[] = array(
        'key'    => $rx_cb_key,
        'render' => function () use ( $rx_cb_renderer, $rx_cb_fields, $rx_cb_key ) {
            call_user_func( $rx_cb_renderer, $rx_cb_fields, $rx_cb_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_cb_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_cb_sections );
    }
    ?>
</article>

<script>
(function () {
    var track = document.querySelector( '.rx-ii-commercial-buildings .rx-ii-solutions-track' );
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
