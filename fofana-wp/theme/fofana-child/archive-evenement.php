<?php

/**
 * Template: Archive Evenement (Agenda)
 * Two tabs: À venir (default) / Archives (?periode=archives).
 *
 * @package FofanaChild
 */

defined('ABSPATH') || exit;

get_header();

$periode = isset($_GET['periode']) ? sanitize_text_field($_GET['periode']) : 'a_venir';
$base_url = get_post_type_archive_link('evenement');
?>

<div class="fofana-container fofana-section">
    <header class="fofana-archive-header" style="margin-bottom:3rem">
        <p class="fofana-label-caps" style="margin-bottom:0.5rem">Agenda</p>
        <h1 class="entry-title" style="font-size:48px;color:#005f39;margin-bottom:1rem">
            <?php esc_html_e('Événements', 'fofana-child'); ?>
        </h1>
        <p style="font-size:17px;color:#3e4941;line-height:1.6;max-width:600px">
            <?php esc_html_e('Retrouvez les prochains rendez-vous et l\'historique des activités de l\'Honorable Ansoumane Fofana.', 'fofana-child'); ?>
        </p>
    </header>

    <!-- Tab navigation -->
    <nav class="fofana-tabs" style="display:flex;gap:1rem;margin-bottom:2.5rem;border-bottom:2px solid #DEE5DF;padding-bottom:0">
        <a href="<?php echo esc_url($base_url); ?>"
            style="padding:0.75rem 1.5rem;font-weight:700;font-size:14px;text-decoration:none;border-bottom:3px solid <?php echo $periode === 'a_venir' ? '#005f39' : 'transparent'; ?>;color:<?php echo $periode === 'a_venir' ? '#005f39' : '#626a66'; ?>;margin-bottom:-2px;transition:border-color 0.2s,color 0.2s"
            <?php echo $periode === 'a_venir' ? 'aria-current="page"' : ''; ?>>
            <?php esc_html_e('À venir', 'fofana-child'); ?>
        </a>
        <a href="<?php echo esc_url(add_query_arg('periode', 'archives', $base_url)); ?>"
            style="padding:0.75rem 1.5rem;font-weight:700;font-size:14px;text-decoration:none;border-bottom:3px solid <?php echo $periode === 'archives' ? '#005f39' : 'transparent'; ?>;color:<?php echo $periode === 'archives' ? '#005f39' : '#626a66'; ?>;margin-bottom:-2px;transition:border-color 0.2s,color 0.2s"
            <?php echo $periode === 'archives' ? 'aria-current="page"' : ''; ?>>
            <?php esc_html_e('Archives', 'fofana-child'); ?>
        </a>
    </nav>

    <?php if (have_posts()) : ?>
        <div class="fofana-event-list" style="display:grid;gap:1.5rem">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $date_debut = get_field('date_debut');
                $heure      = get_field('heure');
                $lieu       = get_field('lieu');
                $statut     = get_field('statut');

                // Format date for display.
                $date_display = $date_debut ? date_i18n('d F Y', strtotime($date_debut)) : '';
                $date_short   = $date_debut ? date_i18n('d', strtotime($date_debut)) : '';
                $date_month   = $date_debut ? date_i18n('M', strtotime($date_debut)) : '';

                // Statut badge.
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

                <article class="fofana-card fofana-reveal" style="display:flex;gap:1.5rem;padding:1.5rem;align-items:flex-start"
                    <?php post_class(); ?>>
                    <!-- Date block -->
                    <?php if ($date_short) : ?>
                        <div style="min-width:64px;text-align:center;background:#faf8f2;border-radius:8px;padding:0.75rem 0.5rem">
                            <span style="display:block;font-size:28px;font-weight:800;color:#785a00;line-height:1"><?php echo esc_html($date_short); ?></span>
                            <span style="display:block;font-size:12px;font-weight:700;text-transform:uppercase;color:#626a66;margin-top:0.25rem"><?php echo esc_html($date_month); ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Event content -->
                    <div style="flex:1">
                        <div style="display:flex;gap:0.75rem;align-items:center;margin-bottom:0.5rem;flex-wrap:wrap">
                            <?php if ($statut_label) : ?>
                                <span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;padding:0.25rem 0.75rem;border-radius:9999px;background:<?php echo esc_attr($statut_color); ?>15;color:<?php echo esc_attr($statut_color); ?>;border:1px solid <?php echo esc_attr($statut_color); ?>30">
                                    <?php echo esc_html($statut_label); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <h2 style="font-size:20px;margin-bottom:0.5rem">
                            <a href="<?php the_permalink(); ?>" style="color:#181d1b;text-decoration:none">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php if ($lieu || $heure) : ?>
                            <p style="font-size:14px;color:#626a66;margin-bottom:0.5rem">
                                <?php if ($lieu) : ?>
                                    <span style="margin-right:1rem">📍 <?php echo esc_html($lieu); ?></span>
                                <?php endif; ?>
                                <?php if ($heure) : ?>
                                    <span>🕐 <?php echo esc_html(substr($heure, 0, 5)); ?></span>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <?php if (has_excerpt()) : ?>
                            <p style="font-size:15px;color:#3e4941;line-height:1.6">
                                <?php the_excerpt(); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav style="margin-top:3rem;text-align:center">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '← Précédent',
                'next_text' => 'Suivant →',
            ));
            ?>
        </nav>
    <?php else : ?>
        <div style="text-align:center;padding:4rem 2rem">
            <p style="font-size:18px;color:#626a66">
                <?php if ($periode === 'archives') : ?>
                    <?php esc_html_e('Aucun événement passé pour le moment.', 'fofana-child'); ?>
                <?php else : ?>
                    <?php esc_html_e('Aucun événement à venir pour le moment.', 'fofana-child'); ?>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>