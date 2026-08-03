<?php
/**
 * Alias of content-leaning-pillars.php for the `leaning-pillars-chimneys`
 * slug (the page actually linked from the Residential Solutions mega menu),
 * so it renders through the same page-builder-wired sections instead of
 * falling back to raw post content.
 *
 * @package Rectify_Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require __DIR__ . '/content-leaning-pillars.php';
