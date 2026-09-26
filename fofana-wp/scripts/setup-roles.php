<?php

/**
 * Setup custom roles: Contributeur and Éditeur.
 * Run via: wp eval-file scripts/setup-roles.php --path=<wp-path>
 *
 * @package FofanaCore
 */

// 1. Contributeur — can write and submit for review, but not publish.
// Based on WordPress 'contributor' with extra capabilities.
if (! get_role('contributeur_fofana')) {
    add_role('contributeur_fofana', 'Contributeur', array(
        'read'              => true,
        'edit_posts'        => true,
        'delete_posts'      => true,
        'upload_files'      => true,
        'edit_published_posts' => false,
        'publish_posts'     => false,
    ));
    echo "Created role: Contributeur.\n";
} else {
    echo "Role Contributeur already exists.\n";
}

// 2. Éditeur — can publish, edit all content, manage categories, media.
// Based on WordPress 'editor' with restricted plugin/theme/user management.
if (! get_role('editeur_fofana')) {
    add_role('editeur_fofana', 'Éditeur', array(
        'read'                     => true,
        'edit_posts'               => true,
        'delete_posts'             => true,
        'publish_posts'            => true,
        'edit_published_posts'     => true,
        'delete_published_posts'   => true,
        'upload_files'             => true,
        'edit_others_posts'        => true,
        'delete_others_posts'      => true,
        'manage_categories'        => true,
        'moderate_comments'        => true,
        'edit_pages'               => true,
        'edit_published_pages'     => true,
        'publish_pages'            => true,
        // CPT capabilities.
        'edit_evenements'          => true,
        'edit_others_evenements'   => true,
        'publish_evenements'       => true,
        'read_private_evenements'  => true,
        'delete_evenements'        => true,
        'delete_others_evenements' => true,
        'delete_published_evenements' => true,
    ));
    echo "Created role: Éditeur.\n";
} else {
    echo "Role Éditeur already exists.\n";
}

// 3. Set French translations for built-in roles.
// WordPress translates role names via the text domain, but we can update
// the display name in the database for the admin UI.
global $wp_roles;
if (isset($wp_roles->roles['contributor']['name'])) {
    $wp_roles->roles['contributor']['name'] = 'Contributeur (WordPress)';
}
if (isset($wp_roles->roles['editor']['name'])) {
    $wp_roles->roles['editor']['name'] = 'Éditeur (WordPress)';
}

echo "\n=== Roles setup complete ===\n";
echo "Roles available:\n";
foreach (wp_roles()->get_names() as $slug => $name) {
    echo "  - $slug: $name\n";
}
