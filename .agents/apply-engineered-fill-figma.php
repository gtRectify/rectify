<?php
define( 'WP_USE_THEMES', false );
define( 'DISABLE_WP_CRON', true );
define( 'WP_HTTP_BLOCK_EXTERNAL', true );

require dirname( __DIR__ ) . '/wp-load.php';

$page_id = 3052;

if ( ! function_exists( 'rectify_pb_get_commercial_engineered_fill_seed_blocks' ) ) {
    fwrite( STDERR, "Engineered Fill seed function is unavailable.\n" );
    exit( 1 );
}

$blocks = rectify_pb_get_commercial_engineered_fill_seed_blocks();

if ( function_exists( 'rectify_pb_resolve_seed_blocks_images' ) ) {
    $blocks = rectify_pb_resolve_seed_blocks_images( $blocks );
}

$saved = update_post_meta(
    $page_id,
    RECTIFY_PB_META_KEY,
    wp_slash( wp_json_encode( $blocks ) )
);

clean_post_cache( $page_id );

printf(
    "Page %d: %d builder blocks saved (%s).\n",
    $page_id,
    count( $blocks ),
    $saved ? 'updated' : 'unchanged'
);

foreach ( $blocks as $block ) {
    printf(
        "- %s [%s]\n",
        isset( $block['section_key'] ) ? $block['section_key'] : '',
        isset( $block['type'] ) ? $block['type'] : ''
    );
}
