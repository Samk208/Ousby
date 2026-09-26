<?php

/**
 * Fix GP global_colors — add 'name' key to each entry.
 * GP editor palette expects 'name', 'slug', and 'color'.
 * Run via: wp eval-file scripts/fix-global-colors.php --path=<wp-path>
 */

$settings = get_option('generate_settings', array());
$colors = isset($settings['global_colors']) ? $settings['global_colors'] : array();

$name_map = array(
    'primary'              => 'Primary',
    'primary-container'    => 'Primary Container',
    'deep-forest'          => 'Deep Forest',
    'secondary'            => 'Secondary',
    'secondary-container'  => 'Secondary Container',
    'tertiary'             => 'Tertiary',
    'ivory-bg'             => 'Ivory Background',
    'border-elegant'       => 'Border Elegant',
    'text-muted'           => 'Text Muted',
    'on-surface'           => 'On Surface',
    'on-surface-variant'   => 'On Surface Variant',
);

foreach ($colors as &$entry) {
    if (! isset($entry['name']) && isset($entry['slug'])) {
        $entry['name'] = isset($name_map[$entry['slug']]) ? $name_map[$entry['slug']] : ucfirst(str_replace('-', ' ', $entry['slug']));
    }
}
unset($entry);

$settings['global_colors'] = $colors;
update_option('generate_settings', $settings);

// Flush GP dynamic CSS cache.
delete_option('generate_dynamic_css_output');
delete_option('generate_dynamic_css_cached_version');

echo "Fixed global_colors with 'name' keys. Count: " . count($colors) . "\n";
