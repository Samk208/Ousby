<?php

/**
 * Seed [EXEMPLE] draft posts and events for layout testing.
 * Never publish — draft status only.
 * Run via: wp eval-file scripts/seed-exemples.php --path=<wp-path>
 *
 * @package FofanaCore
 */

// Helper: create draft if not exists.
function fofana_seed_draft($title, $content, $post_type, $meta = array())
{
    $existing = get_page_by_path(sanitize_title($title), OBJECT, $post_type);
    if ($existing) {
        echo "  Draft '$title' already exists (ID {$existing->ID}).\n";
        return $existing->ID;
    }
    $id = wp_insert_post(array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_excerpt' => isset($meta['excerpt']) ? $meta['excerpt'] : '',
        'post_status'  => 'draft',
        'post_type'    => $post_type,
        'post_author'  => 1,
    ));
    if (is_wp_error($id)) {
        echo "  ERROR: " . $id->get_error_message() . "\n";
        return 0;
    }

    // Set ACF fields if provided.
    foreach ($meta as $key => $value) {
        if (in_array($key, array('date_debut', 'heure', 'lieu', 'statut'), true)) {
            update_field($key, $value, $id);
        }
    }

    // Set category if provided.
    if (isset($meta['category'])) {
        wp_set_post_categories($id, array(get_cat_ID($meta['category'])));
    }

    echo "  Created draft: '$title' (ID $id).\n";
    return $id;
}

// 1. Seed [EXEMPLE] posts (actualités).
echo "=== [EXEMPLE] Posts ===\n";

fofana_seed_draft(
    '[EXEMPLE] Communiqué — Lancement de la campagne RGA',
    '<p>[À COMPLÉTER PAR LE CABINET] Contenu du communiqué officiel de lancement.</p>',
    'post',
    array(
        'excerpt'  => '[EXEMPLE] Communiqué officiel concernant le lancement de la campagne.',
        'category' => 'Communiqués',
    )
);

fofana_seed_draft(
    '[EXEMPLE] Intervention — Session budgétaire Assemblée nationale',
    '<p>[À COMPLÉTER PAR LE CABINET] Résumé de l\'intervention lors de la session budgétaire.</p>',
    'post',
    array(
        'excerpt'  => '[EXEMPLE] Intervention lors de la session budgétaire à l\'Assemblée nationale.',
        'category' => 'Interventions',
    )
);

fofana_seed_draft(
    '[EXEMPLE] Terrain — Visite dans la préfecture de Labé',
    '<p>[À COMPLÉTER PAR LE CABINET] Compte-rendu de la visite de terrain.</p>',
    'post',
    array(
        'excerpt'  => '[EXEMPLE] Visite de terrain dans la préfecture de Labé.',
        'category' => 'Terrain',
    )
);

// 2. Seed [EXEMPLE] events (evenement CPT).
echo "\n=== [EXEMPLE] Events ===\n";

fofana_seed_draft(
    '[EXEMPLE] Réunion publique à Conakry',
    '<p>[À COMPLÉTER PAR LE CABINET] Détails de la réunion publique.</p>',
    'evenement',
    array(
        'excerpt'    => '[EXEMPLE] Réunion publique avec les citoyens de Conakry.',
        'date_debut' => '2026-10-15',
        'heure'      => '10:00:00',
        'lieu'       => 'Conakry, Centre culturel',
        'statut'     => 'a_venir',
    )
);

fofana_seed_draft(
    '[EXEMPLE] Session parlementaire — Projet de loi éducation',
    '<p>[À COMPLÉTER PAR LE CABINET] Détails de la session parlementaire.</p>',
    'evenement',
    array(
        'excerpt'    => '[EXEMPLE] Session parlementaire sur le projet de loi relatif à l\'éducation.',
        'date_debut' => '2026-11-20',
        'heure'      => '09:00:00',
        'lieu'       => 'Assemblée nationale, Conakry',
        'statut'     => 'a_venir',
    )
);

fofana_seed_draft(
    '[EXEMPLE] Conférence de presse — Bilan trimestriel RGA',
    '<p>[À COMPLÉTER PAR LE CABINET] Détails de la conférence de presse.</p>',
    'evenement',
    array(
        'excerpt'    => '[EXEMPLE] Conférence de presse pour présenter le bilan trimestriel du RGA.',
        'date_debut' => '2026-06-01',
        'heure'      => '14:00:00',
        'lieu'       => 'Conakry, Hôtel Palm Camayenne',
        'statut'     => 'termine',
    )
);

// 3. Set post permalink base to /actualites/%postname%/.
echo "\n=== Permalink base ===\n";
$current_structure = get_option('permalink_structure');
if ($current_structure !== '/actualites/%postname%/') {
    update_option('permalink_structure', '/actualites/%postname%/');
    flush_rewrite_rules();
    echo "Permalink structure set to /actualites/%postname%/.\n";
} else {
    echo "Permalink structure already /actualites/%postname%/.\n";
}

// 4. Ensure CPT rewrite rules are flushed.
fofana_register_cpt_evenement();
flush_rewrite_rules();
echo "Rewrite rules flushed.\n";

echo "\n=== Seed complete ===\n";
