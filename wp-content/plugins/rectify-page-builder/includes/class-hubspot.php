<?php
/**
 * HubSpot form embedding.
 *
 * HubSpot ships its forms as a raw <script> snippet. That snippet can be
 * pasted straight into an 'embed' field (see the 'embed' case of
 * rectify_pb_sanitize_field()), but doing so stores executable markup in
 * postmeta and requires the `unfiltered_html` capability.
 *
 * This file provides the safer alternative: store only the three values that
 * actually vary between forms (portal ID, form ID, region) as plain text and
 * rebuild the snippet here at render time. Nothing executable is stored, so
 * no special capability is needed.
 *
 * Exposed two ways:
 *   - rectify_pb_hubspot_embed()  - used by the 'hubspot-form' block renderer
 *   - [rectify_hubspot_form]      - shortcode, so a HubSpot form can also drop
 *                                   into any existing "Form Shortcode" field
 *                                   (e.g. the quotation-form block) in place
 *                                   of a Gravity Forms shortcode.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The Rectify HubSpot account defaults, so a bare [rectify_hubspot_form] (or a
 * block with the ID fields left empty) still renders the intended form.
 */
define('RECTIFY_PB_HUBSPOT_PORTAL_ID', '48201196');
define('RECTIFY_PB_HUBSPOT_FORM_ID', 'a1c00f4d-e08e-4d15-8916-d0cc2528f9c0');
define('RECTIFY_PB_HUBSPOT_REGION', 'ap1');

/**
 * Build the region-specific URL of HubSpot's v2 embed script.
 *
 * HubSpot serves the North America region from the unprefixed host and every
 * other region from a `js-<region>` host (js-ap1, js-eu1, ...).
 *
 * @param string $region
 * @return string
 */
function rectify_pb_hubspot_script_url($region)
{
    $region = rectify_pb_hubspot_sanitize_region($region);

    if ($region === '' || $region === 'na1') {
        return 'https://js.hsforms.net/forms/embed/v2.js';
    }

    return 'https://js-' . $region . '.hsforms.net/forms/embed/v2.js';
}

/**
 * Regions are short alphanumeric codes (ap1, eu1, na1, ...). Anything else is
 * dropped rather than interpolated into a script host.
 *
 * @param string $region
 * @return string
 */
function rectify_pb_hubspot_sanitize_region($region)
{
    return preg_replace('/[^a-z0-9]/', '', strtolower((string) $region));
}

/**
 * Render one HubSpot form.
 *
 * Returns the target container and queues HubSpot's embed script plus the
 * matching hbspt.forms.create() call in the footer. The script handle is keyed
 * per region so several forms on one page share a single script load, and each
 * form gets its own target ID so multiple forms can coexist.
 *
 * @param array $args portal_id, form_id, region, inline_message, redirect_url
 * @return string Markup for the form container ('' when misconfigured).
 */
function rectify_pb_hubspot_embed($args = array())
{
    static $instance = 0;

    $args = wp_parse_args($args, array(
        'portal_id' => RECTIFY_PB_HUBSPOT_PORTAL_ID,
        'form_id' => RECTIFY_PB_HUBSPOT_FORM_ID,
        'region' => RECTIFY_PB_HUBSPOT_REGION,
        'inline_message' => '',
        'redirect_url' => '',
    ));

    // Portal IDs are numeric; form IDs are UUIDs. Fall back to the account
    // defaults when a field was left blank in the builder.
    $portal_id = preg_replace('/[^0-9]/', '', (string) $args['portal_id']);
    $form_id = preg_replace('/[^a-zA-Z0-9\-]/', '', (string) $args['form_id']);
    $region = rectify_pb_hubspot_sanitize_region($args['region']);
    $inline_message = wp_kses_post((string) $args['inline_message']);
    $redirect_url = esc_url_raw((string) $args['redirect_url']);

    if ($portal_id === '') {
        $portal_id = RECTIFY_PB_HUBSPOT_PORTAL_ID;
    }

    if ($form_id === '') {
        $form_id = RECTIFY_PB_HUBSPOT_FORM_ID;
    }

    if ($region === '') {
        $region = RECTIFY_PB_HUBSPOT_REGION;
    }

    $instance++;
    $target_id = 'rx-hubspot-form-' . $instance;
    $handle = 'rectify-hubspot-embed-' . $region;

    if (!wp_script_is($handle, 'registered')) {
        wp_register_script($handle, rectify_pb_hubspot_script_url($region), array(), null, true);
    }

    wp_enqueue_script($handle);

    $config = array(
        'portalId' => $portal_id,
        'formId' => $form_id,
        'region' => $region,
        'target' => '#' . $target_id,
    );

    // HubSpot treats redirects and inline confirmations as mutually exclusive.
    // Prefer the redirect whenever one was explicitly supplied.
    if ($redirect_url !== '') {
        $config['redirectUrl'] = $redirect_url;
    } elseif ($inline_message !== '') {
        $config['inlineMessage'] = $inline_message;
    }

    // Keep HubSpot in full control of validation, CAPTCHA, upload handling and
    // the POST request. The theme listens for HubSpot's native persisted-
    // submission message rather than injecting a callback into this config.
    $init_script = sprintf(
        'window.hbspt && hbspt.forms.create(%s);',
        wp_json_encode($config)
    );

    wp_add_inline_script($handle, $init_script, 'after');

    return '<div class="rx-hubspot-embed" id="' . esc_attr($target_id) . '"></div>';
}

/**
 * [rectify_hubspot_form portal_id="" form_id="" region=""]
 *
 * All attributes are optional and fall back to the Rectify account defaults.
 *
 * @param array $atts
 * @return string
 */
function rectify_pb_hubspot_form_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'portal_id' => RECTIFY_PB_HUBSPOT_PORTAL_ID,
            'form_id' => RECTIFY_PB_HUBSPOT_FORM_ID,
            'region' => RECTIFY_PB_HUBSPOT_REGION,
        ),
        $atts,
        'rectify_hubspot_form'
    );

    return rectify_pb_hubspot_embed($atts);
}
add_shortcode('rectify_hubspot_form', 'rectify_pb_hubspot_form_shortcode');
