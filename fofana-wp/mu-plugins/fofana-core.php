<?php

/**
 * Plugin Name: Fofana Core
 * Description: CPT evenement, JSON-LD structured data, and core data model for the official site of L'Honorable Ansoumane Fofana.
 * Version:     1.0.0
 * Author:      Ousbe
 * Text Domain: fofana-core
 *
 * RULES from the build plan:
 * - Keep theme = presentation, mu-plugin = data.
 * - Switching themes never loses content.
 * - No invented facts; use [À COMPLÉTER PAR LE CABINET] markers.
 * - [EXEMPLE] drafts only, never published.
 *
 * @package FofanaCore
 */

defined('ABSPATH') || exit;

/* =========================================================================
 * 1. CPT: evenement (Agenda)
 * ========================================================================= */

/**
 * Register the evenement custom post type.
 * URL: /agenda/%slug%/
 */
function fofana_register_cpt_evenement()
{
    $labels = array(
        'name'                  => __('Événements', 'fofana-core'),
        'singular_name'         => __('Événement', 'fofana-core'),
        'add_new'               => __('Ajouter', 'fofana-core'),
        'add_new_item'          => __('Ajouter un événement', 'fofana-core'),
        'edit_item'             => __('Modifier l\'événement', 'fofana-core'),
        'new_item'              => __('Nouvel événement', 'fofana-core'),
        'view_item'             => __('Voir l\'événement', 'fofana-core'),
        'search_items'          => __('Rechercher un événement', 'fofana-core'),
        'not_found'             => __('Aucun événement trouvé', 'fofana-core'),
        'not_found_in_trash'    => __('Aucun événement dans la corbeille', 'fofana-core'),
        'all_items'             => __('Tous les événements', 'fofana-core'),
        'menu_name'             => __('Agenda', 'fofana-core'),
        'archives'              => __('Archives événements', 'fofana-core'),
    );

    register_post_type('evenement', array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, // Gutenberg support.
        'query_var'          => true,
        'rewrite'            => array('slug' => 'agenda', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'template'           => array(), // Empty — editor will be blank for new events.
    ));
}
add_action('init', 'fofana_register_cpt_evenement');

/**
 * Flush rewrite rules on plugin activation (first load).
 */
function fofana_flush_rewrite_once()
{
    if (! get_option('fofana_rewrite_flushed')) {
        fofana_register_cpt_evenement();
        flush_rewrite_rules();
        update_option('fofana_rewrite_flushed', true);
    }
}
add_action('after_switch_theme', 'fofana_flush_rewrite_once');

/* =========================================================================
 * 2. ACF FIELD GROUP — evenement
 * Fields: date_debut, heure, lieu, statut
 * Exported to PHP (no JSON dependency for mu-plugin context).
 * ========================================================================= */

/**
 * Register ACF field group for evenement CPT.
 * Uses acf_add_local_field_group() so it works without JSON import.
 */
function fofana_register_acf_fields()
{
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key'      => 'group_fofana_evenement',
        'title'    => 'Détails de l\'événement',
        'fields'   => array(
            array(
                'key'           => 'field_date_debut',
                'label'         => 'Date de début',
                'name'          => 'date_debut',
                'type'          => 'date_picker',
                'display_format' => 'd/m/Y',
                'return_format'  => 'Y-m-d',
                'required'       => 1,
            ),
            array(
                'key'           => 'field_heure',
                'label'         => 'Heure',
                'name'          => 'heure',
                'type'          => 'time_picker',
                'display_format' => 'H:i',
                'return_format'  => 'H:i:s',
            ),
            array(
                'key'           => 'field_lieu',
                'label'         => 'Lieu',
                'name'          => 'lieu',
                'type'          => 'text',
                'placeholder'   => 'Ex: Conakry, Assemblée nationale',
            ),
            array(
                'key'           => 'field_statut',
                'label'         => 'Statut',
                'name'          => 'statut',
                'type'          => 'select',
                'choices'       => array(
                    'a_venir'  => 'À venir',
                    'termine'  => 'Terminé',
                    'reporte'  => 'Reporté',
                ),
                'default_value' => 'a_venir',
                'return_format' => 'value',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'evenement',
                ),
            ),
        ),
        'menu_order'       => 0,
        'position'         => 'normal',
        'style'            => 'default',
        'label_placement'  => 'top',
        'instruction_placement' => 'label',
    ));
}
add_action('acf/init', 'fofana_register_acf_fields');

/* =========================================================================
 * 3. JSON-LD STRUCTURED DATA (plan §5)
 * ========================================================================= */

/**
 * Emit Person + WebSite JSON-LD on the home page.
 */
function fofana_jsonld_home()
{
    if (! is_front_page()) {
        return;
    }

    // Person schema.
    $person = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'Person',
        'name'             => 'Ansoumane Fofana',
        'alternateName'    => 'Ouzby Fofana',
        'honorificPrefix'  => 'L\'Honorable',
        'jobTitle'         => 'Député national',
        'description'      => 'Député de la République de Guinée et Président fondateur du Rassemblement pour la Guinée (RGA).',
        'memberOf'         => array(
            '@type' => 'PoliticalParty',
            'name'  => 'Rassemblement pour la Guinée (RGA)',
            'url'   => 'https://rga-guinee.org',
        ),
        'sameAs'           => array(
            'https://rga-guinee.org',
        ),
    );

    // Add portrait if available.
    $hero_img = wp_get_attachment_url(get_post_thumbnail_id(get_option('page_on_front')));
    if ($hero_img) {
        $person['image'] = $hero_img;
    }

    // WebSite schema.
    $website = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'WebSite',
        'name'        => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'url'         => home_url('/'),
        'inLanguage'  => 'fr-FR',
    );

    echo '<script type="application/ld+json">' . wp_json_encode($person, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    echo '<script type="application/ld+json">' . wp_json_encode($website, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
add_action('wp_head', 'fofana_jsonld_home');

/**
 * Emit Event JSON-LD on single evenement pages.
 */
function fofana_jsonld_event()
{
    if (! is_singular('evenement')) {
        return;
    }

    $post_id = get_the_ID();
    $date    = get_field('date_debut', $post_id);
    $heure   = get_field('heure', $post_id);
    $lieu    = get_field('lieu', $post_id);
    $statut  = get_field('statut', $post_id);

    $event = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Event',
        'name'        => get_the_title($post_id),
        'description' => get_the_excerpt($post_id),
        'url'         => get_permalink($post_id),
        'organizer'   => array(
            '@type' => 'Person',
            'name'  => 'Ansoumane Fofana',
        ),
    );

    if ($date) {
        $start = $date;
        if ($heure) {
            $start .= 'T' . $heure;
        }
        $event['startDate'] = $start;
    }

    if ($lieu) {
        $event['location'] = array(
            '@type'   => 'Place',
            'name'    => $lieu,
            'address' => array(
                '@type'       => 'PostalAddress',
                'addressCountry' => 'GN',
            ),
        );
    }

    // Map statut to schema.org eventStatus.
    $status_map = array(
        'a_venir' => 'https://schema.org/EventScheduled',
        'termine' => 'https://schema.org/EventCompleted',
        'reporte' => 'https://schema.org/EventPostponed',
    );
    if (isset($status_map[$statut])) {
        $event['eventStatus'] = $status_map[$statut];
    }

    // Thumbnail as image.
    $thumb = get_the_post_thumbnail_url($post_id, 'large');
    if ($thumb) {
        $event['image'] = $thumb;
    }

    echo '<script type="application/ld+json">' . wp_json_encode($event, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
add_action('wp_head', 'fofana_jsonld_event');

/**
 * Emit NewsArticle JSON-LD on single posts (fallback if Rank Math doesn't emit it — G7).
 */
function fofana_jsonld_post()
{
    if (! is_singular('post')) {
        return;
    }

    // If Rank Math is active and emits Article schema, skip ours.
    if (class_exists('RankMath')) {
        return;
    }

    $post_id = get_the_ID();
    $article = array(
        '@context'          => 'https://schema.org',
        '@type'             => 'NewsArticle',
        'headline'          => get_the_title($post_id),
        'datePublished'     => get_the_date('c', $post_id),
        'dateModified'      => get_the_modified_date('c', $post_id),
        'author'            => array(
            '@type' => 'Person',
            'name'  => get_the_author(),
        ),
        'publisher'         => array(
            '@type' => 'Organization',
            'name'  => get_bloginfo('name'),
        ),
        'mainEntityOfPage'  => get_permalink($post_id),
    );

    $thumb = get_the_post_thumbnail_url($post_id, 'large');
    if ($thumb) {
        $article['image'] = $thumb;
    }

    echo '<script type="application/ld+json">' . wp_json_encode($article, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
add_action('wp_head', 'fofana_jsonld_post');

/* =========================================================================
 * 4. ARCHIVE QUERY MODIFICATIONS
 * ========================================================================= */

/**
 * Modify the evenement archive query:
 * Default: upcoming events (date >= today), ASC.
 * With ?periode=archives: past events (date < today), DESC.
 */
function fofana_evenement_archive_query($query)
{
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if (! is_post_type_archive('evenement')) {
        return;
    }

    $today = date('Y-m-d');
    $periode = isset($_GET['periode']) ? sanitize_text_field($_GET['periode']) : 'a_venir';

    if ($periode === 'archives') {
        // Past events, newest first.
        $query->set('meta_query', array(
            array(
                'key'     => 'date_debut',
                'value'   => $today,
                'compare' => '<',
                'type'    => 'DATE',
            ),
        ));
        $query->set('meta_key', 'date_debut');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'DESC');
    } else {
        // Upcoming events, soonest first.
        $query->set('meta_query', array(
            array(
                'key'     => 'date_debut',
                'value'   => $today,
                'compare' => '>=',
                'type'    => 'DATE',
            ),
        ));
        $query->set('meta_key', 'date_debut');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
    }

    $query->set('posts_per_page', 12);
}
add_action('pre_get_posts', 'fofana_evenement_archive_query');

/* =========================================================================
 * 5. PERMALINK BASE FOR POSTS → /actualites/%postname%/
 * ========================================================================= */

/**
 * Set the post permalink base to "actualites".
 * Only applies once, on theme activation.
 */
function fofana_set_post_base()
{
    if (get_option('fofana_post_base_set') !== '1') {
        update_option('permalink_structure', '/actualites/%postname%/');
        flush_rewrite_rules();
        update_option('fofana_post_base_set', '1');
    }
}
// Run after theme setup (called from functions.php or manually).
// Uncomment to activate: add_action('after_setup_theme', 'fofana_set_post_base');
