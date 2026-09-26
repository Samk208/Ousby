<?php
// List all media attachments
$attachments = get_posts(array(
    'post_type'   => 'attachment',
    'numberposts' => 50,
    'post_status' => 'inherit',
));
foreach ($attachments as $att) {
    $url  = wp_get_attachment_url($att->ID);
    $file = basename($url);
    echo sprintf("%d | %s | %s\n", $att->ID, $file, $att->post_title);
}

// Also show which images are referenced in page content
echo "\n--- Page content image references ---\n";
$pages = get_posts(array(
    'post_type'   => 'page',
    'numberposts' => 20,
    'post_status' => 'publish',
));
foreach ($pages as $p) {
    preg_match_all('/wp-image-(\d+)/', $p->post_content, $m);
    if (!empty($m[1])) {
        echo sprintf("Page %d (%s): uses image IDs %s\n", $p->ID, $p->post_title, implode(', ', $m[1]));
    }
}
