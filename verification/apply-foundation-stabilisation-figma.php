<?php
/**
 * One-time local migration for the Figma Foundation Stabilisation page.
 *
 * Imports the committed Figma assets into the Media Library and writes the
 * seven editable Rectify Page Builder sections to /residential/foundation-repair/.
 */

require dirname( __DIR__ ) . '/wp-load.php';

if ( ! function_exists( 'rectify_pb_get_foundation_repair_seed_blocks' ) ) {
    fwrite( STDERR, "Rectify Page Builder is not active.\n" );
    exit( 1 );
}

$page = get_page_by_path( 'residential/foundation-repair' );

if ( ! $page ) {
    fwrite( STDERR, "Foundation Repair page was not found.\n" );
    exit( 1 );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

/**
 * Import a committed theme asset once and return its attachment ID.
 */
function rectify_import_foundation_figma_asset( $relative_path, $title ) {
    $existing = get_posts(
        array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_key'       => '_rectify_foundation_figma_asset',
            'meta_value'     => $relative_path,
        )
    );

    if ( $existing ) {
        return (int) $existing[0];
    }

    $source = get_template_directory() . '/assets/' . ltrim( $relative_path, '/' );

    if ( ! is_file( $source ) ) {
        throw new RuntimeException( 'Missing asset: ' . $source );
    }

    $upload = wp_upload_bits( basename( $source ), null, file_get_contents( $source ) );

    if ( ! empty( $upload['error'] ) ) {
        throw new RuntimeException( $upload['error'] );
    }

    $filetype = wp_check_filetype( $upload['file'], null );
    $mime     = $filetype['type'];

    if ( ! $mime && strtolower( pathinfo( $source, PATHINFO_EXTENSION ) ) === 'svg' ) {
        $mime = 'image/svg+xml';
    }

    $attachment_id = wp_insert_attachment(
        array(
            'post_mime_type' => $mime,
            'post_title'     => $title,
            'post_status'    => 'inherit',
        ),
        $upload['file'],
        0,
        true
    );

    if ( is_wp_error( $attachment_id ) ) {
        throw new RuntimeException( $attachment_id->get_error_message() );
    }

    $metadata = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );

    if ( $metadata ) {
        wp_update_attachment_metadata( $attachment_id, $metadata );
    }

    update_post_meta( $attachment_id, '_rectify_foundation_figma_asset', $relative_path );

    return (int) $attachment_id;
}

$asset_titles = array(
    'images/foundation-stabilisation/intro-technician.jpg'      => 'Foundation stabilisation technician',
    'images/foundation-stabilisation/cracked-foundation.jpg'   => 'Cracked residential foundation',
    'images/foundation-stabilisation/chemical-underpinning.svg' => 'Chemical underpinning icon',
    'images/foundation-stabilisation/ground-improvement.svg'   => 'Ground improvement icon',
    'images/foundation-stabilisation/engineering-led.svg'      => 'Engineering-led solutions icon',
    'images/foundation-stabilisation/structural-expertise.svg' => 'Proven structural expertise icon',
    'images/foundation-stabilisation/non-invasive.svg'         => 'Non-invasive technology icon',
    'images/foundation-stabilisation/long-term.png'            => 'Long-term confidence icon',
);

$attachment_ids = array();

try {
    foreach ( $asset_titles as $relative_path => $title ) {
        $attachment_ids[ $relative_path ] = rectify_import_foundation_figma_asset( $relative_path, $title );
    }
} catch ( RuntimeException $error ) {
    fwrite( STDERR, $error->getMessage() . "\n" );
    exit( 1 );
}

$blocks = rectify_pb_get_foundation_repair_seed_blocks();

foreach ( $blocks as &$block ) {
    if ( isset( $block['fields']['image'], $attachment_ids[ $block['fields']['image'] ] ) ) {
        $block['fields']['image'] = $attachment_ids[ $block['fields']['image'] ];
    }

    if ( ! empty( $block['fields']['items'] ) && is_array( $block['fields']['items'] ) ) {
        foreach ( $block['fields']['items'] as &$item ) {
            if ( isset( $item['image'], $attachment_ids[ $item['image'] ] ) ) {
                $item['image'] = $attachment_ids[ $item['image'] ];
            }
        }
        unset( $item );
    }
}
unset( $block );

update_post_meta( $page->ID, '_rectify_builder_data', wp_slash( wp_json_encode( $blocks ) ) );
wp_update_post(
    array(
        'ID'         => $page->ID,
        'post_title' => 'Foundation Stabilisation',
    )
);

echo 'Updated page ' . $page->ID . ' with ' . count( $blocks ) . " builder sections.\n";
foreach ( $attachment_ids as $path => $attachment_id ) {
    echo $attachment_id . ' ' . $path . "\n";
}
