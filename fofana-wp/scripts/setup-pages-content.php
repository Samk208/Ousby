<?php

/**
 * Build remaining pages — Slice 3.
 * Run via: wp eval-file scripts/setup-pages-content.php --path=<wp-path>
 */

$hero_url = wp_get_attachment_url(43);
$community_url = wp_get_attachment_url(44);
$rally_url = wp_get_attachment_url(45);
$depute_url = wp_get_attachment_url(46);
$vision_poster_url = wp_get_attachment_url(49);
$boubou_url = wp_get_attachment_url(48);

function fofana_update_page($slug, $content)
{
    $page = get_page_by_path($slug);
    if (! $page) {
        echo "ERROR: Page '$slug' not found.\n";
        return;
    }
    wp_update_post(array('ID' => $page->ID, 'post_content' => $content));
    echo "Updated: $slug (ID {$page->ID})\n";
}

// === PARCOURS ===
$parcours = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Biographie</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:2rem">Un engagement construit sur le terrain</h1>

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
<p style="font-size:17px;line-height:1.7;color:#3e4941;margin-bottom:1.5rem">Leader politique, entrepreneur social et fervent défenseur des valeurs républicaines, l'Honorable Ansoumane Fofana incarne une nouvelle génération de responsables guinéens. Son parcours est marqué par une volonté constante de bâtir des ponts entre l'expérience acquise sur le terrain et la nécessité de réformes institutionnelles profondes.</p>
<p style="font-size:16px;line-height:1.7;color:#3e4941">Fondateur et président du Rassemblement pour la Guinée (RGA) depuis 2010, il porte une vision de gouvernance méthodique et solidaire pour les 33 préfectures du pays. Élu député en 2026 avec 70 738 voix, il siège désormais à l'Assemblée nationale pour porter la voix du peuple.</p>
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
<figure class="wp-block-image" style="border-radius:12px;overflow:hidden;border:1px solid #DEE5DF;aspect-ratio:3/4"><img src="{{HERO_URL}}" alt="Portrait de l'Honorable Ansoumane Fofana" style="object-fit:cover;width:100%;height:100%"/></figure>
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group fofana-reveal" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem;text-align:center">Chronologie</p>
<h2 class="wp-block-heading" style="font-size:32px;color:#005f39;text-align:center;margin-bottom:3rem">Les étapes clés d'un parcours</h2>

<div style="max-width:720px;margin:0 auto">
<div style="border-left:3px solid #005f39;padding-left:2rem;margin-left:1rem">

<div style="margin-bottom:2.5rem;position:relative">
<span style="position:absolute;left:-2.75rem;top:0;width:14px;height:14px;border-radius:50%;background:#005f39;border:3px solid #faf8f2;display:block"></span>
<p class="fofana-label-caps" style="color:#785a00;margin-bottom:0.25rem">2010</p>
<h3 style="font-size:20px;color:#181d1b;margin-bottom:0.5rem">Fondation du RGA</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">Création du Rassemblement pour la Guinée (RGA), un mouvement politique engagé pour la transformation institutionnelle du pays.</p>
</div>

<div style="margin-bottom:2.5rem;position:relative">
<span style="position:absolute;left:-2.75rem;top:0;width:14px;height:14px;border-radius:50%;background:#005f39;border:3px solid #faf8f2;display:block"></span>
<p class="fofana-label-caps" style="color:#785a00;margin-bottom:0.25rem">2015</p>
<h3 style="font-size:20px;color:#181d1b;margin-bottom:0.5rem">Expansion nationale</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">Implantation du RGA dans plus de 20 préfectures avec des cellules locales et des coordinations régionales.</p>
</div>

<div style="margin-bottom:2.5rem;position:relative">
<span style="position:absolute;left:-2.75rem;top:0;width:14px;height:14px;border-radius:50%;background:#005f39;border:3px solid #faf8f2;display:block"></span>
<p class="fofana-label-caps" style="color:#785a00;margin-bottom:0.25rem">2020</p>
<h3 style="font-size:20px;color:#181d1b;margin-bottom:0.5rem">Engagement communautaire</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">Renforcement des actions sociales et développement de programmes d'accompagnement pour les communautés locales.</p>
</div>

<div style="margin-bottom:2.5rem;position:relative">
<span style="position:absolute;left:-2.75rem;top:0;width:14px;height:14px;border-radius:50%;background:#005f39;border:3px solid #faf8f2;display:block"></span>
<p class="fofana-label-caps" style="color:#785a00;margin-bottom:0.25rem">2025</p>
<h3 style="font-size:20px;color:#181d1b;margin-bottom:0.5rem">Campagne législative nationale</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">Campagne électorale historique à travers les 33+ préfectures, aboutissant à une mobilisation sans précédent.</p>
</div>

<div style="margin-bottom:0;position:relative">
<span style="position:absolute;left:-2.75rem;top:0;width:14px;height:14px;border-radius:50%;background:#fcc748;border:3px solid #faf8f2;display:block"></span>
<p class="fofana-label-caps" style="color:#785a00;margin-bottom:0.25rem">Mai 2026</p>
<h3 style="font-size:20px;color:#181d1b;margin-bottom:0.5rem">Élection à l'Assemblée nationale</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">Élu Député de la République avec 70 738 voix. Prise de fonctions officielle à l'Assemblée nationale de Guinée.</p>
</div>

</div>
</div>
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}},"color":{"background":"#087a4b"}}} -->
<div class="wp-block-group has-background fofana-reveal" style="background-color:#087a4b;padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="text-align:center;color:rgba(255,255,255,0.7);margin-bottom:0.5rem">Convictions</p>
<h2 class="wp-block-heading" style="text-align:center;font-size:32px;color:#ffffff;margin-bottom:3rem">Ce qui guide son action</h2>
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"2rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column" style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:12px;padding:2rem;text-align:center">
<h3 style="font-size:24px;color:#ffffff;margin-bottom:0.75rem">Justice équitable</h3>
<p style="color:rgba(255,255,255,0.8);font-size:15px;line-height:1.6">Un système judiciaire transparent et accessible à tous les citoyens guinéens, sans discrimination.</p>
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:12px;padding:2rem;text-align:center">
<h3 style="font-size:24px;color:#ffffff;margin-bottom:0.75rem">Croissance inclusive</h3>
<p style="color:rgba(255,255,255,0.8);font-size:15px;line-height:1.6">Développement économique qui bénéficie à chaque Guinéen, en particulier les jeunes et les femmes entrepreneurs.</p>
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:12px;padding:2rem;text-align:center">
<h3 style="font-size:24px;color:#ffffff;margin-bottom:0.75rem">Cohésion nationale</h3>
<p style="color:rgba(255,255,255,0.8);font-size:15px;line-height:1.6">Renforcement de l'unité nationale à travers le dialogue intercommunautaire et la solidarité entre préfectures.</p>
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
HTML;

$parcours = str_replace('{{HERO_URL}}', esc_url($hero_url), $parcours);
fofana_update_page('parcours', $parcours);

// === VISION ===
$vision = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Notre vision</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">Une République méthodique et solidaire</h1>
<p style="font-size:18px;line-height:1.7;color:#3e4941;max-width:720px">L'Honorable Ansoumane Fofana porte une vision de gouvernance qui place le citoyen au centre de chaque décision. Une Guinée où la transparence, la justice et le progrès partagé guident l'action publique.</p>
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"3rem","bottom":"5rem"}}}} -->
<div class="wp-block-group fofana-reveal" style="padding-top:3rem;padding-bottom:5rem">
<h2 class="wp-block-heading" style="font-size:32px;color:#005f39;margin-bottom:2rem">Axes stratégiques</h2>
<p style="font-size:16px;color:#626a66;margin-bottom:2rem">[À COMPLÉTER PAR LE CABINET — Les 15 axes stratégiques détaillés du programme RGA]</p>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem">
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#a01e2315;color:#a01e23;border:1px solid #a01e2330;margin-bottom:0.5rem">Priorité haute</span><h3 style="font-size:16px;margin-bottom:0.25rem">Réforme institutionnelle</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#a01e2315;color:#a01e23;border:1px solid #a01e2330;margin-bottom:0.5rem">Priorité haute</span><h3 style="font-size:16px;margin-bottom:0.25rem">Éducation et jeunesse</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#785a0015;color:#785a00;border:1px solid #785a0030;margin-bottom:0.5rem">Priorité moyenne</span><h3 style="font-size:16px;margin-bottom:0.25rem">Santé publique</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#785a0015;color:#785a00;border:1px solid #785a0030;margin-bottom:0.5rem">Priorité moyenne</span><h3 style="font-size:16px;margin-bottom:0.25rem">Agriculture et souveraineté alimentaire</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#005f3915;color:#005f39;border:1px solid #005f3930;margin-bottom:0.5rem">Standard</span><h3 style="font-size:16px;margin-bottom:0.25rem">Infrastructure et développement</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
<div class="fofana-card" style="padding:1.25rem"><span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;padding:0.2rem 0.6rem;border-radius:4px;background:#005f3915;color:#005f39;border:1px solid #005f3930;margin-bottom:0.5rem">Standard</span><h3 style="font-size:16px;margin-bottom:0.25rem">Gouvernance et transparence</h3><p style="font-size:14px;color:#626a66">[À COMPLÉTER PAR LE CABINET]</p></div>
</div>
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}},"color":{"background":"#075C3B"}}} -->
<div class="wp-block-group has-background fofana-reveal" style="background-color:#075C3B;padding-top:5rem;padding-bottom:5rem;text-align:center">
<h2 class="wp-block-heading" style="font-size:32px;color:#ffffff;margin-bottom:1rem">Télécharger le programme</h2>
<p style="color:rgba(255,255,255,0.7);font-size:17px;max-width:540px;margin:0 auto 2rem;line-height:1.6">[À COMPLÉTER PAR LE CABINET — Lien vers le PDF du programme RGA depuis rga-guinee.org]</p>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary-container","textColor":"on-surface","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"2rem","right":"2rem"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-on-surface-color has-secondary-container-background-color has-text-color has-background" href="#" style="padding-top:0.875rem;padding-right:2rem;padding-bottom:0.875rem;padding-left:2rem;border-radius:4px;font-weight:700;text-transform:uppercase;font-size:13px">Programme PDF ↓</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
HTML;

fofana_update_page('vision', $vision);

// === MANDAT ===
$mandat = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Mandat</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">L'action parlementaire au service du peuple</h1>
<p style="font-size:18px;line-height:1.7;color:#3e4941;max-width:720px">Depuis sa prise de fonctions à l'Assemblée nationale, l'Honorable Ansoumane Fofana travaille activement pour représenter les intérêts de ses électeurs et contribuer au débat législatif national.</p>
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"0","bottom":"5rem"}}}} -->
<div class="wp-block-group fofana-reveal" style="padding-bottom:5rem">
<p class="fofana-label-caps" style="text-align:center;margin-bottom:0.5rem">Chiffres du mandat</p>
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.5rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"width":"1px","color":"#DEE5DF","radius":"8px"}}} -->
<div class="wp-block-column has-border-color" style="border-color:#DEE5DF;border-width:1px;border-radius:8px;padding:1.5rem;text-align:center;background:#ffffff">
<p class="fofana-stat-number">[À COMPLÉTER]</p>
<p class="fofana-label-caps" style="margin-top:0.5rem">Interventions en séance</p>
</div>
<!-- /wp:column -->
<!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"width":"1px","color":"#DEE5DF","radius":"8px"}}} -->
<div class="wp-block-column has-border-color" style="border-color:#DEE5DF;border-width:1px;border-radius:8px;padding:1.5rem;text-align:center;background:#ffffff">
<p class="fofana-stat-number">[À COMPLÉTER]</p>
<p class="fofana-label-caps" style="margin-top:0.5rem">Propositions de loi</p>
</div>
<!-- /wp:column -->
<!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"width":"1px","color":"#DEE5DF","radius":"8px"}}} -->
<div class="wp-block-column has-border-color" style="border-color:#DEE5DF;border-width:1px;border-radius:8px;padding:1.5rem;text-align:center;background:#ffffff">
<p class="fofana-stat-number">[À COMPLÉTER]</p>
<p class="fofana-label-caps" style="margin-top:0.5rem">Questions écrites</p>
</div>
<!-- /wp:column -->
<!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"width":"1px","color":"#DEE5DF","radius":"8px"}}} -->
<div class="wp-block-column has-border-color" style="border-color:#DEE5DF;border-width:1px;border-radius:8px;padding:1.5rem;text-align:center;background:#ffffff">
<p class="fofana-stat-number">[À COMPLÉTER]</p>
<p class="fofana-label-caps" style="margin-top:0.5rem">Visites de terrain</p>
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"3rem","bottom":"5rem"}},"color":{"background":"#faf8f2"}}} -->
<div class="wp-block-group has-background fofana-reveal" style="background-color:#faf8f2;padding-top:3rem;padding-bottom:5rem">
<h2 class="wp-block-heading" style="font-size:32px;color:#005f39;margin-bottom:1rem">Activités récentes</h2>
<p style="font-size:16px;color:#626a66;margin-bottom:2rem">[À COMPLÉTER PAR LE CABINET — Les activités du mandat seront publiées comme articles dans la catégorie Mandat avec les sous-catégories : Interventions, Votes, Questions écrites, Terrain]</p>
<p style="font-size:15px;color:#3e4941"><a href="/actualites/" style="color:#005f39;font-weight:700">Voir toutes les actualités →</a></p>
</div>
<!-- /wp:group -->
HTML;

fofana_update_page('mandat', $mandat);

// === GALERIE ===
$galerie = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Galerie</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">En images</h1>
<p style="font-size:18px;line-height:1.7;color:#3e4941;max-width:720px;margin-bottom:3rem">Retrouvez les moments forts de l'engagement de l'Honorable Ansoumane Fofana à travers la Guinée.</p>

<!-- wp:gallery {"columns":3,"linkTo":"media"} -->
<figure class="wp-block-gallery has-nested-images columns-3">
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{HERO_URL}}" alt="Portrait officiel"/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{COMMUNITY_URL}}" alt="Rencontre communautaire"/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{RALLY_URL}}" alt="Rassemblement"/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{DEPUTE_URL}}" alt="Portrait député"/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{VISION_URL}}" alt="Vision"/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="{{BOUBOU_URL}}" alt="En tenue traditionnelle"/></figure>
<!-- /wp:image -->
</figure>
<!-- /wp:gallery -->

<h2 class="wp-block-heading" style="font-size:32px;color:#005f39;margin-top:4rem;margin-bottom:2rem">Vidéos et Réels</h2>
<p style="font-size:16px;color:#626a66">[À COMPLÉTER PAR LE CABINET — Liens vers les vidéos Facebook/YouTube. Les réels seront affichés en façade click-to-load pour ne pas charger le SDK Facebook au chargement de la page.]</p>
</div>
<!-- /wp:group -->
HTML;

$galerie = str_replace(
    array('{{HERO_URL}}', '{{COMMUNITY_URL}}', '{{RALLY_URL}}', '{{DEPUTE_URL}}', '{{VISION_URL}}', '{{BOUBOU_URL}}'),
    array(esc_url($hero_url), esc_url($community_url), esc_url($rally_url), esc_url($depute_url), esc_url($vision_poster_url), esc_url($boubou_url)),
    $galerie
);
fofana_update_page('galerie', $galerie);

// === ESPACE PRESSE ===
$presse = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Espace Presse</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">Ressources pour les médias</h1>
<p style="font-size:18px;line-height:1.7;color:#3e4941;max-width:720px;margin-bottom:3rem">Téléchargez les ressources officielles : biographie, portraits haute résolution, communiqués de presse et programme du RGA.</p>

<h2 class="wp-block-heading" style="font-size:28px;color:#005f39;margin-bottom:1.5rem">Biographie</h2>
<p style="font-size:16px;color:#626a66;margin-bottom:1rem">[À COMPLÉTER PAR LE CABINET — Biographie en 3 longueurs : courte (50 mots), moyenne (150 mots), longue (500 mots)]</p>

<h2 class="wp-block-heading" style="font-size:28px;color:#005f39;margin-top:3rem;margin-bottom:1.5rem">Portraits officiels</h2>
<p style="font-size:16px;color:#626a66;margin-bottom:1rem">[À COMPLÉTER PAR LE CABINET — Portraits haute résolution à télécharger. Utiliser le bloc Fichier pour les liens de téléchargement.]</p>

<h2 class="wp-block-heading" style="font-size:28px;color:#005f39;margin-top:3rem;margin-bottom:1.5rem">Communiqués de presse</h2>
<p style="font-size:16px;color:#626a66;margin-bottom:1rem">Retrouvez les communiqués officiels dans la catégorie <a href="/communiques/" style="color:#005f39;font-weight:700">Communiqués</a>.</p>

<h2 class="wp-block-heading" style="font-size:28px;color:#005f39;margin-top:3rem;margin-bottom:1.5rem">Contact presse</h2>
<p style="font-size:16px;color:#3e4941">[À COMPLÉTER PAR LE CABINET — Email et téléphone du responsable communication]</p>
</div>
<!-- /wp:group -->
HTML;

fofana_update_page('espace-presse', $presse);

// === CONTACT ===
$contact = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Contact</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">Nous contacter</h1>

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%">
<p style="font-size:17px;line-height:1.7;color:#3e4941;margin-bottom:2rem">Vous souhaitez contacter l'Honorable Ansoumane Fofana ou son équipe ? Remplissez le formulaire ci-dessous ou utilisez les coordonnées indiquées.</p>
<div class="fofana-card" style="padding:2rem;text-align:center;color:#626a66">
<p style="font-size:16px">[Formulaire Fluent Forms — à configurer avec Turnstile]</p>
<p style="font-size:14px;margin-top:0.5rem">Champs : Nom, Email, Téléphone (optionnel), Objet (presse / citoyen / partenariat / autre), Message</p>
</div>
</div>
<!-- /wp:column -->
<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%">
<div class="fofana-card" style="padding:2rem">
<h3 style="font-size:20px;color:#005f39;margin-bottom:1rem">Coordonnées</h3>
<p style="font-size:15px;color:#3e4941;line-height:1.6">[À COMPLÉTER PAR LE CABINET]</p>
<p style="font-size:15px;color:#3e4941;margin-top:1rem"><strong>Email :</strong> [À COMPLÉTER]<br><strong>Téléphone :</strong> [À COMPLÉTER]</p>
<hr style="border-color:#DEE5DF;margin:1.5rem 0">
<h3 style="font-size:18px;color:#005f39;margin-bottom:0.75rem">WhatsApp</h3>
<a href="https://wa.me/224627249666" target="_blank" rel="noopener noreferrer" class="fofana-wa-share" style="display:inline-flex;align-items:center;gap:0.5rem;background:#25D366;color:#fff;padding:0.75rem 1.25rem;border-radius:9999px;font-weight:700;text-decoration:none;min-height:48px">Contacter sur WhatsApp</a>
</div>
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
HTML;

fofana_update_page('contact', $contact);

// === MENTIONS LÉGALES ===
$mentions = <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem;max-width:800px">
<h1 class="wp-block-heading" style="font-size:40px;color:#005f39;margin-bottom:2rem">Mentions légales</h1>

<h2 style="font-size:24px;color:#005f39;margin-top:2rem;margin-bottom:1rem">Éditeur du site</h2>
<p style="font-size:16px;line-height:1.7;color:#3e4941">Ce site est édité par le cabinet de l'Honorable Ansoumane Fofana, Député de la République de Guinée, Président du Rassemblement pour la Guinée (RGA).</p>
<p style="font-size:16px;line-height:1.7;color:#3e4941">[À COMPLÉTER PAR LE CABINET — Adresse postale, téléphone, email]</p>

<h2 style="font-size:24px;color:#005f39;margin-top:2rem;margin-bottom:1rem">Hébergement</h2>
<p style="font-size:16px;line-height:1.7;color:#3e4941">[À COMPLÉTER PAR LE CABINET — Nom et adresse de l'hébergeur]</p>

<h2 style="font-size:24px;color:#005f39;margin-top:2rem;margin-bottom:1rem">Propriété intellectuelle</h2>
<p style="font-size:16px;line-height:1.7;color:#3e4941">L'ensemble du contenu de ce site (textes, images, vidéos) est la propriété exclusive du cabinet de l'Honorable Ansoumane Fofana, sauf mention contraire. Toute reproduction, même partielle, est soumise à autorisation préalable.</p>

<h2 style="font-size:24px;color:#005f39;margin-top:2rem;margin-bottom:1rem">Données personnelles</h2>
<p style="font-size:16px;line-height:1.7;color:#3e4941">Les données collectées via le formulaire de contact sont traitées conformément à notre <a href="/politique-de-confidentialite/" style="color:#005f39">politique de confidentialité</a>.</p>
</div>
<!-- /wp:group -->
HTML;

fofana_update_page('mentions-legales', $mentions);

// === AGENDA page — set to use evenement archive redirect ===
// The "Agenda" page in the menu should redirect to the CPT archive.
// Since the CPT has_archive with slug 'agenda', the page at /agenda/ conflicts.
// Solution: delete the "agenda" page and let the CPT archive handle /agenda/.
$agenda_page = get_page_by_path('agenda');
if ($agenda_page) {
    wp_delete_post($agenda_page->ID, true);
    echo "Deleted 'agenda' page (CPT archive handles /agenda/).\n";
}

echo "\n=== All pages content updated ===\n";
