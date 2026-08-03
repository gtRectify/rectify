<?php
define('WP_USE_THEMES', false);
require __DIR__ . '/wp-load.php';
$pid = 3037;
echo "profile: "; var_dump(rectify_pb_get_page_profile($pid));
echo "commercial hub id: "; $p = get_page_by_path('commercial-solutions'); echo $p ? $p->ID : 'NULL'; echo "\n";
$post = get_post($pid);
echo "post_name: {$post->post_name} parent: {$post->post_parent} type: {$post->post_type}\n";
echo "builder data: "; var_dump(get_post_meta($pid, '_rectify_builder_data', true));
