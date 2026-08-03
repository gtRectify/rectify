<?php
/**
 * Industries: Mining & Resources page content template.
 *
 * Matches the Figma "Engineered Ground and Structural Solutions for Mining
 * Operations" design (node 1130:24277). All editable content is supplied by
 * the Rectify Page Builder ii-* blocks. The shared rx-ii-commercial-buildings
 * class opts this page into the common detailed-industry Figma layout;
 * mining-specific differences are scoped by rx-ii-mining-resources in
 * assets/css/industries-inner-pages.css.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_mr_renderers = array(
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

$rx_mr_blocks = function_exists( 'rectify_pb_get_mining_resources_seed_blocks' )
    ? rectify_pb_get_mining_resources_seed_blocks()
    : array();

$rx_mr_sections = array();

foreach ( $rx_mr_blocks as $rx_mr_block ) {
    $rx_mr_key      = isset( $rx_mr_block['section_key'] ) ? $rx_mr_block['section_key'] : '';
    $rx_mr_type     = isset( $rx_mr_block['type'] ) ? $rx_mr_block['type'] : '';
    $rx_mr_fields   = isset( $rx_mr_block['fields'] ) && is_array( $rx_mr_block['fields'] ) ? $rx_mr_block['fields'] : array();
    $rx_mr_renderer = isset( $rx_mr_renderers[ $rx_mr_type ] ) ? $rx_mr_renderers[ $rx_mr_type ] : '';

    if ( ! $rx_mr_key || ! $rx_mr_renderer || ! function_exists( $rx_mr_renderer ) ) {
        continue;
    }

    $rx_mr_sections[] = array(
        'key'    => $rx_mr_key,
        'render' => function () use ( $rx_mr_renderer, $rx_mr_fields, $rx_mr_key ) {
            call_user_func( $rx_mr_renderer, $rx_mr_fields, $rx_mr_key );
        },
    );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-ii-page rx-ii-commercial-buildings rx-ii-mining-resources' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) && ! empty( $rx_mr_sections ) ) {
        rectify_pb_render_page_sections( get_the_ID(), $rx_mr_sections );
    }
    ?>
</article>

<script>
(function () {
    var track = document.querySelector( '.rx-ii-mining-resources .rx-ii-solutions-track' );
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
