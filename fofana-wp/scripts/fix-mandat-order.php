<?php
/**
 * Fix Mandat page: move parliament image section to correct position.
 * Current order: intro → stats → activités → parliament image
 * Correct order: intro → parliament image → stats → activités
 */

$parliament_img_section = <<<'BLOCK'
<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section">
<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:image {"id":51,"sizeSlug":"large","linkDestination":"none","className":"fofana-card"} -->
<figure class="wp-block-image size-large fofana-card"><img src="http://localhost:10028/wp-content/uploads/2026/09/parliament_hemicycle.jpg" alt="Assemblée nationale de Guinée — Hémicycle" class="wp-image-51"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:heading {"style":{"color":{"text":"#005f39"}}} --><h2 class="has-text-color" style="color:#005f39">À l'Assemblée nationale</h2><!-- /wp:heading -->
<!-- wp:paragraph -->
<p>En tant que député, l'Honorable Fofana siège à l'Assemblée nationale où il participe activement aux débats législatifs et aux commissions parlementaires.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
BLOCK;

// Rebuild Mandat content in correct order
$content = <<<'CONTENT'
<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"},"style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}}} -->
<div class="wp-block-group" style="padding-top:5rem;padding-bottom:5rem">
<p class="fofana-label-caps" style="margin-bottom:0.5rem">Mandat</p>
<h1 class="wp-block-heading" style="font-size:48px;line-height:1.15;color:#005f39;margin-bottom:1.5rem">L'action parlementaire au service du peuple</h1>
<p style="font-size:18px;line-height:1.7;color:#3e4941;max-width:720px">Depuis sa prise de fonctions à l'Assemblée nationale, l'Honorable Ansoumane Fofana travaille activement pour représenter les intérêts de ses électeurs et contribuer au débat législatif national.</p>
</div>
<!-- /wp:group -->
CONTENT;

// Add parliament image section
$content .= "\n\n" . $parliament_img_section;

// Add stats and activities sections
$content .= <<<'CONTENT2'


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
CONTENT2;

wp_update_post(array(
    'ID'           => 7,
    'post_content' => $content,
));

echo "✓ Mandat (ID 7): Fixed content order — parliament image now between intro and stats\n";
