<?php
/**
 * One-time theme-asset -> media-library importer.
 *
 * The homepage's existing images live as plain files under the theme's
 * asset folders (not WordPress attachments), but builder "image" fields
 * store an attachment ID. This resolves a theme-relative asset path (e.g.
 * 'images/home/team.webp') to a real attachment ID, importing the file into
 * the media library on first use and reusing the same attachment on every
 * subsequent call (tracked via postmeta so nothing is ever duplicated).
 */

if (!defined('ABSPATH')) {
    exit;
}

define('RECTIFY_PB_IMPORTED_SOURCE_META', '_rectify_pb_source_path');

/**
 * Resolve a theme-relative asset path to its absolute filesystem path,
 * mirroring the same candidate search rx_asset_url()/rectify_pb_theme_asset_url()
 * use, so the file we import is exactly the one the front-end links to today.
 *
 * @param string $relative_path
 * @return string Absolute path, or '' if not found on disk.
 */
function rectify_pb_resolve_theme_asset_path($relative_path)
{
    $relative_path = ltrim($relative_path, '/');
    $theme_dir = get_stylesheet_directory();
    $parent_dir = get_template_directory();

    $candidates = array(
        trailingslashit($theme_dir) . 'rectify-homepage-draft2-v3/assets/' . $relative_path,
        trailingslashit($theme_dir) . 'assets/' . $relative_path,
        trailingslashit($parent_dir) . 'rectify-homepage-draft2-v3/assets/' . $relative_path,
        trailingslashit($parent_dir) . 'assets/' . $relative_path,
    );

    foreach ($candidates as $candidate) {
        if (file_exists($candidate)) {
            return $candidate;
        }
    }

    return '';
}

/**
 * Get (importing on first use) the attachment ID for a theme-relative asset
 * path. Idempotent: re-running with the same path always returns the same
 * attachment, never creates duplicates.
 *
 * @param string $relative_path e.g. 'images/home/team.webp'
 * @return int Attachment ID, or 0 if the source file could not be found/imported.
 */
function rectify_pb_get_or_import_theme_asset($relative_path)
{
    static $cache = array();

    $relative_path = ltrim((string) $relative_path, '/');

    if ($relative_path === '') {
        return 0;
    }

    if (isset($cache[$relative_path])) {
        return $cache[$relative_path];
    }

    $existing = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'meta_key' => RECTIFY_PB_IMPORTED_SOURCE_META,
        'meta_value' => $relative_path,
        'no_found_rows' => true,
    ));

    if (!empty($existing)) {
        $cache[$relative_path] = (int) $existing[0];

        return $cache[$relative_path];
    }

    $source_path = rectify_pb_resolve_theme_asset_path($relative_path);

    if ($source_path === '') {
        $cache[$relative_path] = 0;

        return 0;
    }

    if (!function_exists('wp_generate_attachment_metadata')) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }
    if (!function_exists('wp_read_video_metadata')) {
        require_once ABSPATH . 'wp-admin/includes/media.php';
    }
    if (!function_exists('wp_unique_filename')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }

    $filetype = wp_check_filetype(basename($source_path));

    if (empty($filetype['type'])) {
        $cache[$relative_path] = 0;

        return 0;
    }

    $upload_dir = wp_upload_dir();

    if (!empty($upload_dir['error'])) {
        $cache[$relative_path] = 0;

        return 0;
    }

    $filename = wp_unique_filename($upload_dir['path'], basename($source_path));
    $destination = trailingslashit($upload_dir['path']) . $filename;

    if (!@copy($source_path, $destination)) {
        $cache[$relative_path] = 0;

        return 0;
    }

    $attachment = array(
        'post_mime_type' => $filetype['type'],
        'post_title' => sanitize_file_name(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content' => '',
        'post_status' => 'inherit',
    );

    $attachment_id = wp_insert_attachment($attachment, $destination);

    if (is_wp_error($attachment_id) || !$attachment_id) {
        $cache[$relative_path] = 0;

        return 0;
    }

    $metadata = wp_generate_attachment_metadata($attachment_id, $destination);
    wp_update_attachment_metadata($attachment_id, $metadata);
    update_post_meta($attachment_id, RECTIFY_PB_IMPORTED_SOURCE_META, $relative_path);

    $cache[$relative_path] = (int) $attachment_id;

    return $cache[$relative_path];
}

/**
 * Recursively walk a block's fields (per its type schema) and replace any
 * 'image' field whose value is a non-empty, non-numeric string (a
 * theme-relative asset path placed there by the seed defaults) with the
 * imported attachment ID. Numeric values (real attachment IDs, or 0) are
 * left untouched.
 *
 * @param string $block_type
 * @param array  $fields
 * @return array
 */
/**
 * Resolve a single seed 'image' field value to an attachment ID. Accepts:
 *   - an attachment ID (numeric string or int) - returned unchanged
 *   - a real Media Library URL (e.g. content migrated from raw HTML that
 *     already references wp-content/uploads/...) - resolved via
 *     attachment_url_to_postid(), no import needed since it's already there
 *   - a theme-relative asset path (e.g. 'images/home/team.webp') - imported
 *     into the Media Library on first use via rectify_pb_get_or_import_theme_asset()
 *
 * @param string|int $value
 * @return int
 */
function rectify_pb_resolve_image_field_value($value)
{
    if (!is_string($value) || $value === '' || ctype_digit($value)) {
        return $value;
    }

    if (preg_match('#^https?://#i', $value)) {
        $attachment_id = attachment_url_to_postid($value);

        return $attachment_id ? $attachment_id : 0;
    }

    return rectify_pb_get_or_import_theme_asset($value);
}

/**
 * @param string $block_type
 * @param array  $fields
 * @return array
 */
function rectify_pb_resolve_image_paths_in_fields($block_type, $fields)
{
    $types = rectify_pb_get_block_types();

    if (!isset($types[$block_type]) || !is_array($fields)) {
        return $fields;
    }

    $schema_fields = $types[$block_type]['fields'];

    foreach ($schema_fields as $key => $field_schema) {
        if (!isset($fields[$key])) {
            continue;
        }

        $type = isset($field_schema['type']) ? $field_schema['type'] : '';

        if ($type === 'image') {
            $fields[$key] = rectify_pb_resolve_image_field_value($fields[$key]);
        } elseif ($type === 'repeater' && is_array($fields[$key])) {
            $sub_fields = isset($field_schema['fields']) && is_array($field_schema['fields']) ? $field_schema['fields'] : array();

            foreach ($fields[$key] as $row_index => $row) {
                if (!is_array($row)) {
                    continue;
                }

                foreach ($sub_fields as $sub_key => $sub_schema) {
                    if (!isset($row[$sub_key])) {
                        continue;
                    }

                    if (isset($sub_schema['type']) && $sub_schema['type'] === 'image') {
                        $fields[$key][$row_index][$sub_key] = rectify_pb_resolve_image_field_value($row[$sub_key]);
                    }
                }
            }
        }
    }

    return $fields;
}

/**
 * Resolve every image-path placeholder across a full list of blocks (as
 * returned by rectify_pb_get_seed_blocks()) into real attachment IDs.
 *
 * @param array $blocks
 * @return array
 */
function rectify_pb_resolve_seed_blocks_images($blocks)
{
    foreach ($blocks as $index => $block) {
        if (!isset($block['type'], $block['fields']) || !is_array($block['fields'])) {
            continue;
        }

        $blocks[$index]['fields'] = rectify_pb_resolve_image_paths_in_fields($block['type'], $block['fields']);
    }

    return $blocks;
}
