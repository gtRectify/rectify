<?php
$theme_dir = __DIR__;

if ( ! is_dir( $theme_dir ) ) {
    http_response_code( 404 );
    exit;
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator( $theme_dir, RecursiveDirectoryIterator::SKIP_DOTS )
);

$latest = 0;
foreach ( $iterator as $file ) {
    if ( $file->isFile() ) {
        $latest = max( $latest, $file->getMTime() );
    }
}

header( 'Content-Type: application/json' );
echo json_encode( array( 'modified' => $latest ) );
