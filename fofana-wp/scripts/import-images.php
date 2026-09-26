<?php

/**
 * Import client images to WP media library.
 * Run via: wp eval-file scripts/import-images.php --path=<wp-path>
 */

$img_dir = 'c:/Users/Lenovo/Desktop/Project/Ousbe/fofana-site/public/images/client/';
$images = array(
    'fofana-hero-suit.webp'        => 'Ansoumane Fofana — Portrait officiel',
    'fofana-field-community.webp'   => 'Rencontre communautaire',
    'fofana-field-rally.webp'       => 'Rassemblement terrain',
    'fofana-depute-poster.webp'     => 'Portrait député',
    'fofana-poster-vision.jpg'      => 'Vision — Affiche',
    'fofana-traditional-boubou.jpg' => 'En tenue traditionnelle',
    'fofana-vision-poster.webp'     => 'Affiche Vision',
);

// Also grab the extra non-client images.
$extra_dir = 'c:/Users/Lenovo/Desktop/Project/Ousbe/fofana-site/public/images/';
$extra_images = array(
    'guinea_youth_education.jpg'    => 'Jeunesse et éducation en Guinée',
    'parliament_hemicycle.jpg'      => 'Hémicycle Assemblée nationale',
    'press_conference_podium.jpg'   => 'Conférence de presse',
);

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

function fofana_import_image($file_path, $title)
{
    if (!file_exists($file_path)) {
        echo "SKIP: $file_path not found.\n";
        return 0;
    }
    // Copy to a temp file to avoid path issues with media_handle_sideload.
    $tmp = wp_tempnam(basename($file_path));
    copy($file_path, $tmp);

    $file_array = array(
        'name'     => basename($file_path),
        'tmp_name' => $tmp,
    );

    $id = media_handle_sideload($file_array, 0, $title);
    if (is_wp_error($id)) {
        echo "ERROR importing " . basename($file_path) . ": " . $id->get_error_message() . "\n";
        @unlink($tmp);
        return 0;
    }
    echo "Imported: " . basename($file_path) . " → ID $id ($title)\n";
    return $id;
}

echo "=== Importing client images ===\n";
foreach ($images as $file => $title) {
    fofana_import_image($img_dir . $file, $title);
}

echo "\n=== Importing extra images ===\n";
foreach ($extra_images as $file => $title) {
    fofana_import_image($extra_dir . $file, $title);
}

// Set hero image as featured image on Accueil page.
$hero_id = get_page_by_path('accueil');
if ($hero_id) {
    $hero_img = get_posts(array(
        'post_type' => 'attachment',
        'name' => 'fofana-hero-suit',
        'posts_per_page' => 1,
    ));
    if ($hero_img) {
        set_post_thumbnail($hero_id->ID, $hero_img[0]->ID);
        echo "\nSet hero image as featured on Accueil.\n";
    }
}

echo "\n=== Image import complete ===\n";
