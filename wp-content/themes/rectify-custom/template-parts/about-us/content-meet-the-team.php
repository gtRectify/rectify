<?php
/**
 * Meet The Team page content.
 *
 * Every visible section is rendered through the dedicated Rectify Page
 * Builder profile. The canonical Figma seed is also used as the front-end
 * fallback before a page has saved builder data.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$rx_mtt_seeds = function_exists( 'rectify_pb_get_about_meet_the_team_seed_blocks' )
    ? rectify_pb_get_about_meet_the_team_seed_blocks()
    : array();

$rx_mtt_fallbacks = array();

foreach ( $rx_mtt_seeds as $rx_mtt_seed ) {
    if ( empty( $rx_mtt_seed['section_key'] ) || empty( $rx_mtt_seed['type'] ) ) {
        continue;
    }

    $rx_mtt_fallbacks[ $rx_mtt_seed['section_key'] ] = array(
        'type'   => $rx_mtt_seed['type'],
        'fields' => isset( $rx_mtt_seed['fields'] ) && is_array( $rx_mtt_seed['fields'] )
            ? $rx_mtt_seed['fields']
            : array(),
    );
}

$rx_mtt_render_fallback = static function ( $section_key ) use ( $rx_mtt_fallbacks ) {
    if ( empty( $rx_mtt_fallbacks[ $section_key ] ) ) {
        return;
    }

    $block = $rx_mtt_fallbacks[ $section_key ];
    $function = 'rectify_pb_render_' . str_replace( '-', '_', $block['type'] );

    if ( function_exists( $function ) ) {
        call_user_func( $function, $block['fields'], $section_key );
    }
};

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rx-mtt-page' ); ?>>
    <?php
    if ( function_exists( 'rectify_pb_render_page_sections' ) ) {
        $rx_mtt_sections = array();

        foreach ( array( 'mtt-hero', 'mtt-philosophy', 'mtt-team', 'mtt-why', 'mtt-cta' ) as $rx_mtt_key ) {
            $rx_mtt_sections[] = array(
                'key'    => $rx_mtt_key,
                'render' => static function () use ( $rx_mtt_render_fallback, $rx_mtt_key ) {
                    $rx_mtt_render_fallback( $rx_mtt_key );
                },
            );
        }

        rectify_pb_render_page_sections( get_the_ID(), $rx_mtt_sections );
    }
    ?>
</article>
