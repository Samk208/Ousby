<?php

/**
 * Fofana Child Theme — functions.php
 *
 * Theme: GeneratePress (parent)
 * Site:  L'Honorable Ansoumane "Ouzby" Fofana
 *
 * RULES from the build plan:
 * - G12: Never re-enqueue parent or child CSS — GP does it.
 * - G9:  Activate GP Premium modules explicitly.
 * - G12: Sidebar layout values use hyphens (e.g. 'no-sidebar').
 * - G12: generate_show_title needs boolean false.
 * - Colours and typography go into generate_settings, not !important CSS (G1).
 * - No JS animation library. Total JS < 150 KB.
 *
 * @package FofanaChild
 */

defined('ABSPATH') || exit;

/**
 * Theme setup.
 */
function fofana_child_setup()
{
    // Child text domain for translations.
    load_child_theme_textdomain('fofana-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'fofana_child_setup');

/* =========================================================================
 * 1. TRICLOUR BAR — generate_before_header + footer hook (plan §3)
 * ========================================================================= */

/**
 * Print the tricolour Guinea accent bar.
 */
function fofana_tricolour_bar()
{
    echo '<div class="fofana-tricolour-bar" aria-hidden="true">'
        . '<div class="rule-red"></div>'
        . '<div class="rule-gold"></div>'
        . '<div class="rule-green"></div>'
        . '</div>';
}
add_action('generate_before_header', 'fofana_tricolour_bar', 7);
/* Tricolour bar after footer is handled by the custom footer itself. */

/* =========================================================================
 * 1b. CUSTOM FOOTER — 4-column layout matching Next.js reference (plan §3)
 * ========================================================================= */

// Remove GP default footer widgets and copyright bar (must run after GP registers them).
function fofana_remove_default_footer()
{
    remove_action('generate_footer', 'generate_construct_footer_widgets', 5);
    remove_action('generate_footer', 'generate_construct_footer', 10);
}
add_action('init', 'fofana_remove_default_footer');

/**
 * Render the custom site footer.
 */
function fofana_custom_footer()
{
?>
    <div class="fofana-site-footer">
        <?php fofana_tricolour_bar(); ?>
        <div class="fofana-footer-inner">

            <!-- Col 1: Brand -->
            <div class="fofana-footer-col">
                <h3 class="fofana-footer-brand">Ouzby Fofana</h3>
                <p class="fofana-footer-desc">
                    Député de la République de Guinée.<br>
                    Président du RGA depuis 2010.
                </p>
                <p class="fofana-footer-motto">
                    &ldquo;Servir le peuple, construire la nation&rdquo;
                </p>
            </div>

            <!-- Col 2: Navigation -->
            <div class="fofana-footer-col">
                <h4 class="fofana-footer-heading">Navigation</h4>
                <nav aria-label="<?php esc_attr_e('Pied de page — Navigation', 'fofana-child'); ?>">
                    <ul class="fofana-footer-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Accueil', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/parcours/')); ?>"><?php esc_html_e('Parcours', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/mandat/')); ?>"><?php esc_html_e('Mandat', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/vision/')); ?>"><?php esc_html_e('Vision', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/actualites/')); ?>"><?php esc_html_e('Actualités', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/galerie/')); ?>"><?php esc_html_e('Galerie', 'fofana-child'); ?></a></li>
                    </ul>
                </nav>
            </div>

            <!-- Col 3: Ressources -->
            <div class="fofana-footer-col">
                <h4 class="fofana-footer-heading">Ressources</h4>
                <nav aria-label="<?php esc_attr_e('Pied de page — Ressources', 'fofana-child'); ?>">
                    <ul class="fofana-footer-links">
                        <li><a href="<?php echo esc_url(home_url('/agenda/')); ?>"><?php esc_html_e('Agenda', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/espace-presse/')); ?>"><?php esc_html_e('Espace Presse', 'fofana-child'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact', 'fofana-child'); ?></a></li>
                        <li>
                            <a href="https://rga-guinee.org" target="_blank" rel="noopener noreferrer">
                                RGA Guinée
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6" />
                                    <polyline points="15 3 21 3 21 9" />
                                    <line x1="10" y1="14" x2="21" y2="3" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Col 4: Contact -->
            <div class="fofana-footer-col">
                <h4 class="fofana-footer-heading">Contact</h4>
                <ul class="fofana-footer-contact">
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <span>Kaloum, Conakry, Guinée</span>
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z" />
                        </svg>
                        <span>+224 627 249 666</span>
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <polyline points="22,6 12,13 2,6" />
                        </svg>
                        <span>contact@rga-guinee.org</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="fofana-footer-bottom">
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> Ansoumane Fofana. <?php esc_html_e('Tous droits réservés.', 'fofana-child'); ?></p>
            <p><?php esc_html_e('Vérité · Loyauté · Paix', 'fofana-child'); ?></p>
        </div>
    </div>
<?php
}
add_action('generate_footer', 'fofana_custom_footer', 5);

/* =========================================================================
 * 2. FLOATING WHATSAPP BUTTON (plan §3)
 * ========================================================================= */

/**
 * Floating WhatsApp pill — bottom-right, ≥ 48px, aria-label.
 * Number must be confirmed with the client.
 */
function fofana_floating_whatsapp()
{
    $number = '224627249666'; // Confirm with client (plan §3).
    $url    = 'https://wa.me/' . $number;
?>
    <a href="<?php echo esc_url($url); ?>"
        target="_blank"
        rel="noopener noreferrer"
        class="fofana-whatsapp-float"
        aria-label="<?php esc_attr_e('Contacter sur WhatsApp', 'fofana-child'); ?>">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
        <span class="fofana-wa-label"><?php esc_html_e('WhatsApp Officiel', 'fofana-child'); ?></span>
    </a>
<?php
}
add_action('wp_footer', 'fofana_floating_whatsapp', 20);

/* =========================================================================
 * 3. WHATSAPP SHARE ON SINGLE POSTS & EVENTS (plan §3)
 * ========================================================================= */

/**
 * Append a WhatsApp share link after single post / event content.
 */
function fofana_whatsapp_share($content)
{
    if (! is_singular() || ! in_the_loop() || ! is_main_query()) {
        return $content;
    }
    $post_type = get_post_type();
    if (! in_array($post_type, array('post', 'evenement'), true)) {
        return $content;
    }
    $title     = get_the_title();
    $permalink = get_permalink();
    $text      = rawurlencode($title . ' — ' . $permalink);
    $url       = 'https://wa.me/?text=' . $text;

    $share  = '<div class="fofana-wa-share-wrap" style="margin:1.5rem 0;">';
    $share .= '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" class="fofana-wa-share">';
    $share .= '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';
    $share .= esc_html__('Partager sur WhatsApp', 'fofana-child');
    $share .= '</a></div>';

    return $content . $share;
}
add_filter('the_content', 'fofana_whatsapp_share');

/* =========================================================================
 * 4. REVEAL + COUNTER JS (~30 lines, IntersectionObserver)
 * ========================================================================= */

/**
 * Enqueue the minimal reveal + counter script.
 * Loaded only on the front-end, not in the editor.
 */
function fofana_enqueue_scripts()
{
    $js_dir = get_stylesheet_directory_uri() . '/assets/js';
    $js_ver = filemtime(get_stylesheet_directory() . '/assets/js/fofana-reveal.js');
    wp_enqueue_script(
        'fofana-reveal',
        $js_dir . '/fofana-reveal.js',
        array(),
        $js_ver,
        true // Load in footer.
    );
}
add_action('wp_enqueue_scripts', 'fofana_enqueue_scripts');

/* =========================================================================
 * 5. SIDEBAR LAYOUT DEFAULTS (G12)
 * ========================================================================= */

/**
 * Force no-sidebar on all pages except blog index and single posts.
 * GP sidebar layout values use hyphens (e.g. 'no-sidebar').
 */
function fofana_sidebar_layout($layout)
{
    if (is_page() && ! is_front_page()) {
        return 'no-sidebar';
    }
    if (is_front_page()) {
        return 'no-sidebar';
    }
    // Blog index and single posts keep right sidebar.
    return $layout;
}
add_filter('generate_sidebar_layout', 'fofana_sidebar_layout');

/* =========================================================================
 * 6. DISABLE PAGE TITLES ON SPECIFIC PAGES (G12)
 * ========================================================================= */

/**
 * Disable GP page title on front page and key layout pages.
 * generate_show_title needs boolean false (G12).
 */
function fofana_disable_page_title($show)
{
    if (is_front_page()) {
        return false;
    }
    return $show;
}
add_filter('generate_show_title', 'fofana_disable_page_title');

/* =========================================================================
 * 7. BLOCK PATTERNS (plan §4.4)
 * ========================================================================= */

/**
 * Register block pattern category.
 */
function fofana_register_block_pattern_category()
{
    register_block_pattern_category('fofana', array(
        'label' => __('Fofana', 'fofana-child'),
    ));
}
add_action('init', 'fofana_register_block_pattern_category');

/**
 * Register block patterns for editor-reusable components.
 */
function fofana_register_block_patterns()
{

    // Stat band pattern.
    if (function_exists('register_block_pattern')) {
        register_block_pattern(
            'fofana/stat-band',
            array(
                'title'      => __('Stat Band', 'fofana-child'),
                'categories' => array('fofana'),
                'content'    => '<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"className":"fofana-card fofana-card-cta"} -->
<div class="wp-block-column fofana-card fofana-card-cta" style="padding:2rem;text-align:center"><!-- wp:paragraph {"className":"fofana-stat-number"} --><p class="fofana-stat-number">70 738</p><!-- /wp:paragraph --><!-- wp:paragraph {"className":"fofana-label-caps"} --><p class="fofana-label-caps">Voix obtenues</p><!-- /wp:paragraph --></div>
<!-- /wp:column --><!-- wp:column {"className":"fofana-card fofana-card-cta"} -->
<div class="wp-block-column fofana-card fofana-card-cta" style="padding:2rem;text-align:center"><!-- wp:paragraph {"className":"fofana-stat-number"} --><p class="fofana-stat-number">1</p><!-- /wp:paragraph --><!-- wp:paragraph {"className":"fofana-label-caps"} --><p class="fofana-label-caps">Député national</p><!-- /wp:paragraph --></div>
<!-- /wp:column --><!-- wp:column {"className":"fofana-card fofana-card-cta"} -->
<div class="wp-block-column fofana-card fofana-card-cta" style="padding:2rem;text-align:center"><!-- wp:paragraph {"className":"fofana-stat-number"} --><p class="fofana-stat-number">27</p><!-- /wp:paragraph --><!-- wp:paragraph {"className":"fofana-label-caps"} --><p class="fofana-label-caps">Conseillers communaux</p><!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
            )
        );

        // Value card pattern.
        register_block_pattern(
            'fofana/value-card',
            array(
                'title'      => __('Value Card', 'fofana-child'),
                'categories' => array('fofana'),
                'content'    => '<!-- wp:group {"className":"fofana-card","style":{"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"}}}} -->
<div class="wp-block-group fofana-card" style="padding:2rem"><!-- wp:heading {"level":3,"style":{"color":{"text":"#005f39"}}} --><h3 class="has-text-color" style="color:#005f39">Titre de la valeur</h3><!-- /wp:heading --><!-- wp:paragraph {"style":{"color":{"text":"#3e4941"}}} --><p class="has-text-color" style="color:#3e4941">Description de la valeur républicaine.</p><!-- /wp:paragraph --></div>
<!-- /wp:group -->',
            )
        );

        // CTA band pattern.
        register_block_pattern(
            'fofana/cta-band',
            array(
                'title'      => __('CTA Band', 'fofana-child'),
                'categories' => array('fofana'),
                'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}},"color":{"background":"#075C3B","text":"#ffffff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="color:#ffffff;background-color:#075C3B;padding-top:5rem;padding-bottom:5rem"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="has-text-align-center has-text-color" style="color:#ffffff">Rejoignez le mouvement</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffffb3"}}} --><p class="has-text-align-center has-text-color" style="color:#ffffffb3">Ensemble, construisons une Guinée méthodique et solidaire.</p><!-- /wp:paragraph --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"#fcc748","textColor":"#181d1b","style":{"borderRadius":"4px"}} --><div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background-color has-background" href="/contact" style="border-radius:4px;color:#181d1b;background-color:#fcc748">Nous rejoindre</a></div><!-- /wp:button --><!-- wp:button {"style":{"borderRadius":"4px","color":{"background":"#25D366","text":"#ffffff"}}} --><div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background has-background-color" href="https://wa.me/224627249666" target="_blank" rel="noopener noreferrer" style="border-radius:4px;color:#ffffff;background-color:#25D366">WhatsApp</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div>
<!-- /wp:group -->',
            )
        );
    }
}
add_action('init', 'fofana_register_block_patterns');

/* =========================================================================
 * 8. IMAGE OPTIMISATION (plan §6 Slice 3)
 * ========================================================================= */

/**
 * Limit big image threshold to 1600px for hero images.
 */
function fofana_big_image_size_threshold()
{
    return 1600;
}
add_filter('big_image_size_threshold', 'fofana_big_image_size_threshold');

/**
 * Set JPEG quality to 82.
 */
function fofana_jpeg_quality()
{
    return 82;
}
add_filter('wp_editor_set_quality', 'fofana_jpeg_quality');

/* =========================================================================
 * 9. SECURITY HARDENING (plan §1)
 * ========================================================================= */

/**
 * Disable XML-RPC.
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove REST API user enumeration for non-logged-in users.
 */
function fofana_restrict_rest_users($result)
{
    if (! is_user_logged_in()) {
        return new WP_Error(
            'rest_user_cannot_view',
            __('User enumeration is disabled.', 'fofana-child'),
            array('status' => 401)
        );
    }
    return $result;
}
add_filter('rest_authentication_errors', 'fofana_restrict_rest_users');

/**
 * Remove WordPress version from head and feeds.
 */
remove_action('wp_head', 'wp_generator');
