<?php
/**
 * Allows SVG uploads through the standard WP media library (wp.media) for
 * users who can edit pages, so the icon-picker field can offer a "Upload
 * custom SVG" option alongside the fixed icon library. WordPress core
 * rejects .svg uploads by default and does not sanitize SVG content, so both
 * concerns are handled here: mime allowlisting scoped to page editors, and a
 * conservative strip of script-executing constructs from the uploaded file.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('upload_mimes', 'rectify_pb_allow_svg_mime');
function rectify_pb_allow_svg_mime($mimes)
{
    if (current_user_can('edit_pages')) {
        $mimes['svg'] = 'image/svg+xml';
    }

    return $mimes;
}

/**
 * WP's real-mime-type sniff (finfo) doesn't recognise image/svg+xml, so
 * without this filter every SVG upload is flagged as "file type does not
 * match extension" and rejected even after the mime is allow-listed above.
 */
add_filter('wp_check_filetype_and_ext', 'rectify_pb_fix_svg_filetype_check', 10, 4);
function rectify_pb_fix_svg_filetype_check($data, $file, $filename, $mimes)
{
    if (!empty($data['ext']) && !empty($data['type'])) {
        return $data;
    }

    if (preg_match('/\.svg$/i', $filename) && current_user_can('edit_pages')) {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}

/**
 * Strip the uploaded file's content of script-executing constructs after WP
 * has moved it into place. This is a conservative denylist (script tags,
 * event-handler attributes, javascript: URIs, embedded foreign content) - it
 * is not a full XML-aware sanitizer, but it removes the realistic XSS
 * vectors for an SVG rendered inline in a page.
 */
add_filter('wp_handle_upload', 'rectify_pb_sanitize_uploaded_svg');
function rectify_pb_sanitize_uploaded_svg($upload)
{
    if (empty($upload['file']) || empty($upload['type']) || $upload['type'] !== 'image/svg+xml') {
        return $upload;
    }

    $content = file_get_contents($upload['file']);

    if ($content === false) {
        return $upload;
    }

    $sanitized = rectify_pb_sanitize_svg_markup($content);

    file_put_contents($upload['file'], $sanitized);

    return $upload;
}

/**
 * @param string $svg
 * @return string
 */
function rectify_pb_sanitize_svg_markup($svg)
{
    // Remove <script>, <foreignObject>, <iframe>, <object>, <embed> blocks entirely.
    $svg = preg_replace('#<(script|foreignObject|iframe|object|embed)\b[^>]*>.*?</\1\s*>#is', '', $svg);
    $svg = preg_replace('#<(script|iframe|object|embed)\b[^>]*/?>#is', '', $svg);

    // Strip any on*="..." / on*='...' event-handler attributes.
    $svg = preg_replace('/\son\w+\s*=\s*"[^"]*"/i', '', $svg);
    $svg = preg_replace("/\son\w+\s*=\s*'[^']*'/i", '', $svg);

    // Neutralise javascript: URIs in href/xlink:href attributes.
    $svg = preg_replace('/((?:xlink:)?href\s*=\s*)"javascript:[^"]*"/i', '$1"#"', $svg);
    $svg = preg_replace("/((?:xlink:)?href\\s*=\\s*)'javascript:[^']*'/i", '$1"#"', $svg);

    // Drop inline DOCTYPE subsets (guards against XXE/entity-expansion tricks).
    $svg = preg_replace('/<!DOCTYPE[^>]*\[[^\]]*\]>/is', '', $svg);

    return $svg;
}
