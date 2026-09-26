<?php

/**
 * Template: Single Evenement
 *
 * @package FofanaChild
 */

defined('ABSPATH') || exit;

get_header();

$date_debut = get_field('date_debut');
$heure      = get_field('heure');
$lieu       = get_field('lieu');
$statut     = get_field('statut');

$date_display = $date_debut ? date_i18n('l d F Y', strtotime($date_debut)) : '';
$heure_display = $heure ? substr($heure, 0, 5) : '';

$statut_labels = array(
    'a_venir' => 'À venir',
    'termine' => 'Terminé',
    'reporte' => 'Reporté',
);
$statut_colors = array(
    'a_venir' => '#005f39',
    'termine' => '#626a66',
    'reporte' => '#785a00',
);
$statut_label = isset($statut_labels[$statut]) ? $statut_labels[$statut] : '';
$statut_color = isset($statut_colors[$statut]) ? $statut_colors[$statut] : '#626a66';
?>

<div class="fofana-container fofana-section">
    <article <?php post_class('fofana-single-event'); ?>>

        <!-- Back link -->
        <nav style="margin-bottom:2rem">
            <a href="<?php echo esc_url(get_post_type_archive_link('evenement')); ?>"
                style="color:#005f39;font-weight:700;font-size:14px;text-decoration:none">
                ← <?php esc_html_e('Retour à l\'agenda', 'fofana-child'); ?>
            </a>
        </nav>

        <!-- Header -->
        <header style="margin-bottom:2.5rem">
            <?php if ($statut_label) : ?>
                <span style="display:inline-block;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;padding:0.25rem 0.75rem;border-radius:9999px;background:<?php echo esc_attr($statut_color); ?>15;color:<?php echo esc_attr($statut_color); ?>;border:1px solid <?php echo esc_attr($statut_color); ?>30;margin-bottom:1rem">
                    <?php echo esc_html($statut_label); ?>
                </span>
            <?php endif; ?>

            <h1 class="entry-title" style="font-size:40px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">
                <?php the_title(); ?>
            </h1>

            <!-- Meta info -->
            <div style="display:flex;flex-wrap:wrap;gap:1.5rem;font-size:15px;color:#3e4941">
                <?php if ($date_display) : ?>
                    <div style="display:flex;align-items:center;gap:0.5rem">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:#785a00">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span><?php echo esc_html($date_display); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($heure_display) : ?>
                    <div style="display:flex;align-items:center;gap:0.5rem">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:#785a00">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span><?php echo esc_html($heure_display); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($lieu) : ?>
                    <div style="display:flex;align-items:center;gap:0.5rem">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:#785a00">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <span><?php echo esc_html($lieu); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Featured image -->
        <?php if (has_post_thumbnail()) : ?>
            <figure style="margin-bottom:2.5rem;border-radius:12px;overflow:hidden">
                <?php the_post_thumbnail('large', array('style' => 'width:100%;height:auto;display:block')); ?>
            </figure>
        <?php endif; ?>

        <!-- Content -->
        <div class="entry-content" style="max-width:720px;font-size:17px;line-height:1.7;color:#181d1b">
            <?php the_content(); ?>
        </div>

        <!-- Share -->
        <footer style="margin-top:3rem;padding-top:2rem;border-top:1px solid #DEE5DF">
            <?php
            // WhatsApp share is appended by fofana_whatsapp_share filter in functions.php.
            ?>
        </footer>
    </article>
</div>

<?php get_footer(); ?>