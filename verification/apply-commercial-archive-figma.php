<?php
/**
 * Apply the Figma-matched Commercial Solutions archive blocks to the local
 * Rectify Page Builder record. Safe to re-run: theme images are imported
 * idempotently and the page's builder JSON is replaced with the canonical
 * seed returned by the plugin.
 */

require dirname( __DIR__ ) . '/wp-load.php';

if ( ! function_exists( 'rectify_pb_get_commercial_seed_blocks' ) ) {
    fwrite( STDERR, "Rectify Page Builder is not active.\n" );
    exit( 1 );
}

$page = get_page_by_path( 'commercial-solutions' );

if ( ! $page instanceof WP_Post ) {
    fwrite( STDERR, "Commercial Solutions page was not found.\n" );
    exit( 1 );
}

$blocks = rectify_pb_get_commercial_seed_blocks();

if ( function_exists( 'rectify_pb_resolve_seed_blocks_images' ) ) {
    $blocks = rectify_pb_resolve_seed_blocks_images( $blocks );
}

// Post meta is unslashed by core; pre-slash JSON so escaped newlines remain
// real line breaks after the value is read and decoded by the builder.
update_post_meta( $page->ID, '_rectify_builder_data', wp_slash( wp_json_encode( $blocks ) ) );

printf(
    "Updated page %d with %d builder sections.\n",
    $page->ID,
    count( $blocks )
);
