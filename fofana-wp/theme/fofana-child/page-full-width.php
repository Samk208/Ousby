<?php

/**
 * Template Name: Full Width No Padding
 * Description: Full-width layout with no content-area padding for full-bleed page sections.
 *
 * @package FofanaChild
 */

if (! defined('ABSPATH')) {
    exit;
}

// Disable page title for this template.
add_filter('generate_show_title', '__return_false');

get_header();

// Add custom body class for this template.
add_filter('generate_body_classes', function ($classes) {
    $classes[] = 'fofana-template-full-width';
    return $classes;
}); ?>

<div id="primary" class="content-area fofana-template-full-width">
    <main id="main" class="site-main" <?php do_action('generate_main_attr'); ?>>
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
