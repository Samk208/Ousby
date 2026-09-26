<?php
// Check what images are used across all pages and the front page
$all_pages = get_posts(array(
    'post_type'   => array('page'),
    'numberposts' => 20,
    'post_status' => 'any',
));

echo "=== PAGE IMAGE USAGE ===\n\n";
foreach ($all_pages as $p) {
    $content = $p->post_content;
    // Find wp-image-XXX references
    preg_match_all('/wp-image-(\d+)/', $content, $img_matches);
    // Find image URLs
    preg_match_all('/(https?:\/\/[^\s"\'<>]+\.(?:jpg|jpeg|png|webp|gif))/', $content, $url_matches);

    $featured = get_post_thumbnail_id($p->ID);

    echo sprintf("--- %s (ID %d, status: %s) ---\n", $p->post_title, $p->ID, $p->post_status);
    if ($featured) {
        echo "  Featured image: ID $featured (" . basename(wp_get_attachment_url($featured)) . ")\n";
    }
    if (!empty($img_matches[1])) {
        echo "  Block image IDs: " . implode(', ', array_unique($img_matches[1])) . "\n";
        foreach (array_unique($img_matches[1]) as $id) {
            $att = get_post($id);
            if ($att) {
                echo "    -> ID $id = " . basename(wp_get_attachment_url($id)) . "\n";
            } else {
                echo "    -> ID $id = *** MISSING ***\n";
            }
        }
    }
    if (!empty($url_matches[1])) {
        echo "  URL images: " . count($url_matches[1]) . " found\n";
        foreach (array_unique($url_matches[1]) as $url) {
            echo "    -> " . basename($url) . "\n";
        }
    }
    if (!$featured && empty($img_matches[1]) && empty($url_matches[1])) {
        echo "  (no images)\n";
    }
    echo "\n";
}

// Also check the Next.js reference for image usage per page
echo "\n=== IMAGES NOT YET ON ANY WP PAGE ===\n";
$used_ids = array();
foreach ($all_pages as $p) {
    preg_match_all('/wp-image-(\d+)/', $p->post_content, $m);
    $used_ids = array_merge($used_ids, $m[1]);
    $fid = get_post_thumbnail_id($p->ID);
    if ($fid) $used_ids[] = $fid;
}
$used_ids = array_unique($used_ids);

$all_attachments = get_posts(array(
    'post_type'   => 'attachment',
    'numberposts' => 50,
    'post_status' => 'inherit',
));
foreach ($all_attachments as $att) {
    if (!in_array($att->ID, $used_ids)) {
        echo sprintf("  UNUSED: ID %d — %s (%s)\n", $att->ID, $att->post_title, basename(wp_get_attachment_url($att->ID)));
    }
}
