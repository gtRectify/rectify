<?php
/**
 * Apply the canonical Figma Meet the Team sections to the local page-builder
 * record. Theme image paths are imported into the Media Library through the
 * builder's idempotent asset resolver.
 */

require dirname( __DIR__ ) . '/wp-load.php';

if ( ! function_exists( 'rectify_pb_get_about_meet_the_team_seed_blocks' ) ) {
    fwrite( STDERR, "Rectify Page Builder is not active.\n" );
    exit( 1 );
}

$page = get_page_by_path( 'about-us/meet-the-team' );

if ( ! $page instanceof WP_Post ) {
    fwrite( STDERR, "Meet the Team page was not found.\n" );
    exit( 1 );
}

$blocks = rectify_pb_get_about_meet_the_team_seed_blocks();

if ( function_exists( 'rectify_pb_resolve_seed_blocks_images' ) ) {
    $blocks = rectify_pb_resolve_seed_blocks_images( $blocks );
}

update_post_meta(
    $page->ID,
    '_rectify_builder_data',
    wp_slash( wp_json_encode( $blocks, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) )
);

printf(
    "Updated page %d with %d editable Meet the Team sections.\n",
    $page->ID,
    count( $blocks )
);
