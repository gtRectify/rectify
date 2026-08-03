<?php
/**
 * One-time local content migration for the Figma-matched Slab Lifting page.
 *
 * Run from the WordPress root with PHP. The script imports the committed
 * Figma assets into the Media Library and writes the editable builder blocks
 * to the existing Slab Lifting page.
 */

require dirname( __DIR__ ) . '/wp-load.php';

if ( ! function_exists( 'rectify_pb_get_commercial_slab_lifting_seed_blocks' ) ) {
    fwrite( STDERR, "Rectify Page Builder is not active.\n" );
    exit( 1 );
}

$page = get_page_by_path( 'commercial-solutions/slab-lifting' );

if ( ! $page ) {
    fwrite( STDERR, "Slab Lifting page was not found.\n" );
    exit( 1 );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

/**
 * Import a committed theme asset once and return its attachment ID.
 */
function rectify_import_slab_figma_asset( $relative_path, $title ) {
    $existing = get_posts(
        array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_key'       => '_rectify_figma_asset',
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

    update_post_meta( $attachment_id, '_rectify_figma_asset', $relative_path );

    return (int) $attachment_id;
}

$asset_titles = array(
    'images/commercial-slab-lifting/intro-slab-lifting.png'                         => 'Commercial slab lifting introduction',
    'images/commercial-slab-lifting/weak-subgrade.jpg'                             => 'Weak or poorly compacted subgrade',
    'images/commercial-slab-lifting/heavy-loading.png'                              => 'Heavy operational loading',
    'images/commercial-slab-lifting/water-ingress.jpg'                              => 'Water ingress',
    'images/commercial-slab-lifting/soil-erosion.png'                               => 'Soil erosion',
    'images/commercial-slab-lifting/reactive-ground.png'                            => 'Reactive ground conditions',
    'images/commercial-slab-lifting/underground-voids.jpg'                          => 'Underground voids',
    'images/commercial-slab-lifting/engineered-process.png'                         => 'Engineered slab lifting process',
    'images/commercial-ground-improvement/icon-worker.svg'                          => 'Engineering-led solutions icon',
    'images/commercial-ground-improvement/icon-expert.svg'                          => 'Proven structural expertise icon',
    'images/commercial-ground-improvement/icon-non-invasive.svg'                    => 'Non-invasive technology icon',
    'images/commercial-ground-improvement/icon-services-longterm.png'               => 'Long-term confidence icon',
);

$attachment_ids = array();

try {
    foreach ( $asset_titles as $relative_path => $title ) {
        $attachment_ids[ $relative_path ] = rectify_import_slab_figma_asset( $relative_path, $title );
    }
} catch ( RuntimeException $error ) {
    fwrite( STDERR, $error->getMessage() . "\n" );
    exit( 1 );
}

$blocks = rectify_pb_get_commercial_slab_lifting_seed_blocks();

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

echo 'Updated page ' . $page->ID . ' with ' . count( $blocks ) . " builder sections.\n";
foreach ( $attachment_ids as $path => $attachment_id ) {
    echo $attachment_id . ' ' . $path . "\n";
}
