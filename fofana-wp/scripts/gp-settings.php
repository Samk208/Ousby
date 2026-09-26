<?php

/**
 * GP Settings — Palette + Typography + Modules
 * Run via: wp eval-file scripts/gp-settings.php --path=<wp-path>
 * After:    wp option delete generate_dynamic_css_output generate_dynamic_css_cached_version
 *
 * @package FofanaChild
 */

// 1. Activate GP Premium modules (G9).
$gp_modules = get_option('gp_premium_modules', array());
$required_modules = array(
    'elements',
    'typography',
    'colors',
    'blog',
    'menu_plus',
    'secondary_nav',
    'spacing',
    'site_library',
    'woocommerce',
    'disable_elements',
);
foreach ($required_modules as $mod) {
    $gp_modules[$mod] = '1';
}
update_option('gp_premium_modules', $gp_modules);
echo "GP Premium modules activated.\n";

// 2. Set the République Moderne colour palette (plan §4.1).
$settings = get_option('generate_settings', array());

// Global colours — GP uses global_colors array with unique IDs.
$settings['global_colors'] = array(
    array(
        'slug'  => 'primary',
        'color' => '#005f39',
    ),
    array(
        'slug'  => 'primary-container',
        'color' => '#087a4b',
    ),
    array(
        'slug'  => 'deep-forest',
        'color' => '#075C3B',
    ),
    array(
        'slug'  => 'secondary',
        'color' => '#785a00',
    ),
    array(
        'slug'  => 'secondary-container',
        'color' => '#fcc748',
    ),
    array(
        'slug'  => 'tertiary',
        'color' => '#a01e23',
    ),
    array(
        'slug'  => 'ivory-bg',
        'color' => '#FAF8F2',
    ),
    array(
        'slug'  => 'border-elegant',
        'color' => '#DEE5DF',
    ),
    array(
        'slug'  => 'text-muted',
        'color' => '#626A66',
    ),
    array(
        'slug'  => 'on-surface',
        'color' => '#181d1b',
    ),
    array(
        'slug'  => 'on-surface-variant',
        'color' => '#3e4941',
    ),
);

// Map GP colour settings to the palette.
$settings['base_colors'] = array(
    'header_background_color'       => '#FAF8F2',
    'header_text_color'             => '#181d1b',
    'header_link_color'             => '#181d1b',
    'header_link_hover_color'       => '#005f39',
    'site_title_color'              => '#075C3B',
    'site_tagline_color'            => '#626A66',
    'navigation_background_color'   => '#FAF8F2',
    'navigation_text_color'         => '#3e4941',
    'navigation_link_hover_color'   => '#005f39',
    'navigation_background_hover_color' => '#FAF8F2',
    'navigation_text_hover_color'   => '#005f39',
    'content_background_color'      => '#FAF8F2',
    'content_text_color'            => '#181d1b',
    'content_link_color'            => '#005f39',
    'content_link_hover_color'      => '#075C3B',
    'content_title_color'           => '#005f39',
    'footer_background_color'       => '#075C3B',
    'footer_text_color'             => '#ffffff',
    'footer_link_color'             => '#fcc748',
    'footer_link_hover_color'       => '#ffffff',
    'body_background_color'         => '#FAF8F2',
    'form_input_background_color'   => '#FAF8F2',
    'form_input_text_color'         => '#181d1b',
);

// 3. Typography settings (plan §4.2).
$settings['font_body']        = 'Hanken Grotesk';
$settings['font_body_category'] = 'system';
$settings['font_body_variants'] = '400,700';
$settings['font_site_title']  = 'Source Serif 4';
$settings['font_site_title_category'] = 'system';
$settings['font_site_title_variants'] = '600,700';
$settings['font_navigation']  = 'Hanken Grotesk';
$settings['font_navigation_category'] = 'system';
$settings['font_navigation_variants'] = '400,700';
$settings['font_buttons']     = 'Hanken Grotesk';
$settings['font_buttons_category'] = 'system';
$settings['font_buttons_variants'] = '700';
$settings['font_all_headings'] = 'Source Serif 4';
$settings['font_all_headings_category'] = 'system';
$settings['font_all_headings_variants'] = '600,700';
$settings['font_h1']          = 'Source Serif 4';
$settings['font_h1_category'] = 'system';
$settings['font_h1_variants'] = '700';
$settings['font_h2']          = 'Source Serif 4';
$settings['font_h2_category'] = 'system';
$settings['font_h2_variants'] = '600';
$settings['font_h3']          = 'Source Serif 4';
$settings['font_h3_category'] = 'system';
$settings['font_h3_variants'] = '600';

// Font sizes (plan §4.2 scale).
$settings['font_size_body']         = '16';
$settings['font_size_body_unit']    = 'px';
$settings['font_size_h1']           = '48';
$settings['font_size_h1_unit']      = 'px';
$settings['font_size_h2']           = '32';
$settings['font_size_h2_unit']      = 'px';
$settings['font_size_h3']           = '24';
$settings['font_size_h3_unit']      = 'px';
$settings['font_size_site_title']   = '24';
$settings['font_size_site_title_unit'] = 'px';
$settings['font_size_navigation']   = '12';
$settings['font_size_navigation_unit'] = 'px';

// Line heights.
$settings['font_body_line_height']       = '1.5';
$settings['font_h1_line_height']         = '56';
$settings['font_h1_line_height_unit']    = 'px';
$settings['font_h2_line_height']         = '40';
$settings['font_h2_line_height_unit']    = 'px';
$settings['font_h3_line_height']         = '32';
$settings['font_h3_line_height_unit']    = 'px';

// Letter spacing.
$settings['font_h1_letter_spacing']      = '-0.02';
$settings['font_h1_letter_spacing_unit'] = 'em';

// 4. Layout settings (plan §4.3).
$settings['container_width']        = '1280';
$settings['content_layout_setting'] = 'separate-containers';
$settings['layout_setting']         = 'no-sidebar'; // Default: no sidebar.
$settings['blog_layout_setting']    = 'right-sidebar'; // Blog: right sidebar.

// Spacing.
$settings['content_padding_top']     = '0';
$settings['content_padding_right']   = '32';
$settings['content_padding_bottom']  = '0';
$settings['content_padding_left']    = '32';
$settings['separator_space']         = '40';

// Header.
$settings['header_alignment_setting'] = 'center';
$settings['nav_position_setting']     = 'nav-below-header';
$settings['nav_alignment_setting']    = 'center';

// Footer.
$settings['footer_widget_count'] = '4';

// Blog.
$settings['post_content'] = 'excerpt';

// Save.
update_option('generate_settings', $settings);
echo "generate_settings updated with palette, typography, layout.\n";

// 5. Flush GP dynamic CSS cache (G1).
delete_option('generate_dynamic_css_output');
delete_option('generate_dynamic_css_cached_version');
echo "GP dynamic CSS cache flushed.\n";
