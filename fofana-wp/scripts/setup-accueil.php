<?php

/**
 * Setup Accueil page — block content + template assignment.
 * Run via: wp eval-file scripts/setup-accueil.php --path=<wp-path>
 *
 * @package FofanaChild
 */

// 1. Get image URLs.
$hero_url = wp_get_attachment_url(43);
$community_url = wp_get_attachment_url(44);

if (! $hero_url) {
    echo "ERROR: Hero image (ID 43) not found. Run import-images.php first.\n";
    exit(1);
}
if (! $community_url) {
    echo "ERROR: Community image (ID 44) not found. Run import-images.php first.\n";
    exit(1);
}

echo "Hero URL: $hero_url\n";
echo "Community URL: $community_url\n";

// 2. Read block template and replace placeholders.
$blocks_file = __DIR__ . '/accueil-blocks.txt';
if (! file_exists($blocks_file)) {
    echo "ERROR: accueil-blocks.txt not found at $blocks_file\n";
    exit(1);
}

$content = file_get_contents($blocks_file);
$content = str_replace('{{HERO_URL}}', esc_url($hero_url), $content);
$content = str_replace('{{COMMUNITY_URL}}', esc_url($community_url), $content);

// 3. Update Accueil page (ID 4).
$accueil = get_page_by_path('accueil');
if (! $accueil) {
    echo "ERROR: Accueil page not found. Run setup-pages.php first.\n";
    exit(1);
}

$result = wp_update_post(array(
    'ID'           => $accueil->ID,
    'post_content' => $content,
));

if (is_wp_error($result)) {
    echo "ERROR updating Accueil: " . $result->get_error_message() . "\n";
    exit(1);
}

echo "Accueil page updated (ID {$accueil->ID}).\n";

// 4. Assign page template (Full Width No Padding).
update_post_meta($accueil->ID, '_wp_page_template', 'page-full-width.php');
echo "Template set to 'page-full-width.php'.\n";

// 5. Set sidebar layout to no-sidebar for Accueil (belt and suspenders).
update_post_meta($accueil->ID, '_generate-sidebar-layout-meta', 'no-sidebar');
echo "Sidebar layout set to no-sidebar.\n";

// 6. Flush GP dynamic CSS cache (G1).
delete_option('generate_dynamic_css_output');
delete_option('generate_dynamic_css_cached_version');
echo "GP dynamic CSS cache flushed.\n";

echo "\n=== Accueil setup complete ===\n";
