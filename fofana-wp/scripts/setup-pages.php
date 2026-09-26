<?php

/**
 * Slice 1 — Pages, Categories, Menu, Front Page config.
 * Run via: wp eval-file scripts/setup-pages.php --path=<wp-path>
 *
 * @package FofanaChild
 */

// Helper: create page if not exists.
function fofana_create_page($slug, $title, $content = '', $parent = 0)
{
    $existing = get_page_by_path($slug);
    if ($existing) {
        echo "Page '$slug' already exists (ID {$existing->ID}).\n";
        return $existing->ID;
    }
    $id = wp_insert_post(array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_parent'  => $parent,
        'post_author'  => 1,
    ));
    if (is_wp_error($id)) {
        echo "ERROR creating page '$slug': " . $id->get_error_message() . "\n";
        return 0;
    }
    echo "Created page '$slug' (ID $id).\n";
    return $id;
}

// 1. Create categories.
echo "=== Categories ===\n";
$cat_actualites = wp_insert_term('Actualités', 'category', array('slug' => 'actualites'));
$cat_communiques = wp_insert_term('Communiqués', 'category', array('slug' => 'communiques'));
$cat_mandat = wp_insert_term('Mandat', 'category', array('slug' => 'mandat-cat'));

// Child categories of Mandat.
$mandat_id = is_wp_error($cat_mandat) ? get_cat_ID('Mandat') : $cat_mandat['term_id'];
if ($mandat_id) {
    wp_insert_term('Interventions', 'category', array('slug' => 'interventions', 'parent' => $mandat_id));
    wp_insert_term('Votes', 'category', array('slug' => 'votes', 'parent' => $mandat_id));
    wp_insert_term('Questions écrites', 'category', array('slug' => 'questions-ecrites', 'parent' => $mandat_id));
    wp_insert_term('Terrain', 'category', array('slug' => 'terrain', 'parent' => $mandat_id));
}

// Rename "Uncategorized" (ID 1) — but since we set the default category, just set it.
$default_cat = get_cat_ID('Actualités');
if ($default_cat) {
    update_option('default_category', $default_cat);
    echo "Default category set to Actualités.\n";
}

// 2. Create pages.
echo "\n=== Pages ===\n";
$accueil_id = fofana_create_page('accueil', 'Accueil', '');
$parcours_id = fofana_create_page('parcours', 'Parcours', '');
$vision_id = fofana_create_page('vision', 'Vision', '');
$mandat_page_id = fofana_create_page('mandat', 'Mandat', '');
$galerie_id = fofana_create_page('galerie', 'Galerie', '');
$agenda_page_id = fofana_create_page('agenda', 'Agenda', '');
$presse_id = fofana_create_page('espace-presse', 'Espace Presse', '');
$contact_id = fofana_create_page('contact', 'Contact', '');
$mentions_id = fofana_create_page('mentions-legales', 'Mentions légales', '');
$conf_id = fofana_create_page('politique-de-confidentialite', 'Politique de confidentialité', '');

// Blog page (Actualités archive).
$blog_id = fofana_create_page('actualites', 'Actualités', '');

// 3. Set front page and posts page.
echo "\n=== Front page config ===\n";
update_option('show_on_front', 'page');
update_option('page_on_front', $accueil_id);
update_option('page_for_posts', $blog_id);
echo "Front page: Accueil (ID $accueil_id).\n";
echo "Posts page: Actualités (ID $blog_id).\n";

// 4. Set privacy page.
update_option('wp_page_for_privacy_policy', $conf_id);
echo "Privacy page set (ID $conf_id).\n";

// 5. Create primary menu.
echo "\n=== Menu ===\n";
$menu_name = 'Menu Principal';
$menu_exists = wp_get_nav_menu_object($menu_name);
if (! $menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
} else {
    $menu_id = $menu_exists->term_id;
    // Clear existing items.
    $items = wp_get_nav_menu_items($menu_id);
    if ($items) {
        foreach ($items as $item) {
            wp_delete_post($item->ID, true);
        }
    }
}

$menu_items = array(
    array('title' => 'Accueil',     'url' => '/',              'position' => 1),
    array('title' => 'Parcours',    'url' => '/parcours/',     'position' => 2),
    array('title' => 'Vision',      'url' => '/vision/',       'position' => 3),
    array('title' => 'Mandat',      'url' => '/mandat/',       'position' => 4),
    array('title' => 'Actualités',  'url' => '/actualites/',   'position' => 5),
    array('title' => 'Agenda',      'url' => '/agenda/',       'position' => 6),
    array('title' => 'Galerie',     'url' => '/galerie/',      'position' => 7),
    array('title' => 'Presse',      'url' => '/espace-presse/', 'position' => 8),
    array('title' => 'Contact',     'url' => '/contact/',      'position' => 9),
);

foreach ($menu_items as $item) {
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title'     => $item['title'],
        'menu-item-url'       => home_url($item['url']),
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
        'menu-item-position'  => $item['position'],
    ));
}

// Assign menu to primary location.
$locations = get_theme_mod('nav_menu_locations', array());
$locations['primary'] = $menu_id;
set_theme_mod('nav_menu_locations', $locations);
echo "Menu 'Menu Principal' created and assigned to primary location.\n";

// 6. Set site title and tagline.
update_option('blogname', 'Ansoumane Fofana');
update_option('blogdescription', 'Site Officiel — Député de la République de Guinée');
echo "Site title and tagline set.\n";

// 7. Disable comments on pages.
$pages = get_posts(array('post_type' => 'page', 'posts_per_page' => -1));
foreach ($pages as $pg) {
    wp_update_post(array('ID' => $pg->ID, 'comment_status' => 'closed', 'ping_status' => 'closed'));
}
echo "Comments disabled on all pages.\n";

// 8. Delete default "Hello world" post and sample page.
$hello = get_page_by_path('hello-world', OBJECT, 'post');
if ($hello) {
    wp_delete_post($hello->ID, true);
    echo "Deleted 'Hello World' post.\n";
}
$sample = get_page_by_path('sample-page');
if ($sample) {
    wp_delete_post($sample->ID, true);
    echo "Deleted 'Sample Page'.\n";
}
$privacy = get_page_by_path('privacy-policy');
if ($privacy) {
    wp_delete_post($privacy->ID, true);
    echo "Deleted default 'Privacy Policy' page.\n";
}

echo "\n=== Setup pages complete ===\n";
