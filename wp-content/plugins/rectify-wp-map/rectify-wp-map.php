<?php
/**
 * Plugin Name: Rectify WP Map Shortcode
 * Plugin URI:  https://example.com/
 * Description: Adds a shortcode to embed a Google Map with custom markers and popup content.
 * Version:     1.1.0
 * Author:      Rectify
 * Text Domain: rectify-wp-map
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! defined('RECTIFY_WP_MAP_API_KEY')) {
    define('RECTIFY_WP_MAP_API_KEY', '');
}

function rectify_wp_map_register_assets() {
    wp_register_style(
        'rectify-wp-map-style',
        plugin_dir_url(__FILE__) . 'assets/css/rectify-wp-map.css',
        array(),
        '1.1.0'
    );

    wp_register_script(
        'rectify-wp-map-script',
        plugin_dir_url(__FILE__) . 'assets/js/rectify-wp-map.js',
        array(),
        '1.1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'rectify_wp_map_register_assets');

function rectify_wp_map_get_api_key($atts) {
    $atts = shortcode_atts(
        array(
            'api_key' => '',
        ),
        $atts,
        'rectify_map'
    );

    $api_key = trim($atts['api_key']);
    if (empty($api_key)) {
        $api_key = defined('RECTIFY_WP_MAP_API_KEY') ? RECTIFY_WP_MAP_API_KEY : '';
    }

    return $api_key;
}

function rectify_wp_map_shortcode($atts = array()) {
    $api_key = rectify_wp_map_get_api_key($atts);

    if (empty($api_key)) {
        return '<div class="rectify-wp-map-error" style="color:#d00;padding:16px;background:#fff7f7;border:1px solid #f5c2c7;border-radius:8px;">Rectify map shortcode requires a Google Maps API key. Use <code>[rectify_map api_key="YOUR_KEY"]</code> or define <code>RECTIFY_WP_MAP_API_KEY</code> in <code>wp-config.php</code>.</div>';
    }

    wp_enqueue_style('rectify-wp-map-style');
    wp_enqueue_script('rectify-wp-map-script');

    wp_add_inline_script(
        'rectify-wp-map-script',
        '(function rectifyManualMapFallback(){'
            . 'if(window.rectifyManualMap && typeof window.rectifyManualMap.getCenter==="function"){return;}'
            . 'if(typeof window.initRectifyManualMap==="function" && window.google && window.google.maps){'
                . 'window.initRectifyManualMap();'
                . 'return;'
            . '}'
            . 'window.rectifyManualMapInitAttempts = (window.rectifyManualMapInitAttempts || 0) + 1;'
            . 'if(window.rectifyManualMapInitAttempts < 50){'
                . 'setTimeout(rectifyManualMapFallback, 200);'
            . '}'
        . '})();'
    );

    $google_maps_url = sprintf(
        'https://maps.googleapis.com/maps/api/js?key=%s',
        rawurlencode($api_key)
    );

    wp_register_script('rectify-wp-map-google-api', $google_maps_url, array('rectify-wp-map-script'), null, true);
    wp_enqueue_script('rectify-wp-map-google-api');

    return '<div class="rectify-manual-map-wrapper">'
        . '<div id="rectifyManualMap"></div>'
        . '<div class="rectify-map-message" id="rectifyMapMessage">Maximum zoom reached</div>'
        . '</div>';
}
add_shortcode('rectify_map', 'rectify_wp_map_shortcode');
