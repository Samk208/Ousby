<?php

/**
 * Add missing images to Vision, Mandat, Espace Presse pages
 * and expand Galerie with unused stock photos.
 */

// Get attachment URLs
$attachments = array();
$att_posts = get_posts(array(
    'post_type'   => 'attachment',
    'numberposts' => 50,
    'post_status' => 'inherit',
));
foreach ($att_posts as $a) {
    $file = basename(wp_get_attachment_url($a->ID));
    $attachments[$a->ID] = array(
        'url'   => wp_get_attachment_url($a->ID),
        'file'  => $file,
        'title' => $a->post_title,
    );
}

// Key image IDs
$hero_suit    = 43; // fofana-hero-suit
$field_comm   = 44; // fofana-field-community
$field_rally  = 45; // fofana-field-rally
$depute       = 46; // fofana-depute-poster
$poster_vision = 47; // fofana-poster-vision (jpg)
$boubou       = 48; // fofana-traditional-boubou
$vision_poster = 49; // fofana-vision-poster
$youth        = 50; // guinea_youth_education
$parliament   = 51; // parliament_hemicycle
$press_conf   = 52; // press_conference_podium

$results = array();

// ============================================================
// 1. VISION page (ID 6) — Add vision poster image
// ============================================================
$vision_page = get_post(6);
$vision_content = $vision_page->post_content;

// Check if image already present
if (
    strpos($vision_content, 'wp-image-' . $vision_poster) === false &&
    strpos($vision_content, basename($attachments[$vision_poster]['url'])) === false
) {

    $vision_img_url = $attachments[$vision_poster]['url'];
    $vision_img_block = <<<BLOCK
<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section">
<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
<!-- wp:heading {"style":{"color":{"text":"#005f39"}}} --><h2 class="has-text-color" style="color:#005f39">Une vision pour la Guinée</h2><!-- /wp:heading -->
<!-- wp:paragraph -->
<p>La vision de l'Honorable Ansoumane Fofana s'articule autour d'une Guinée moderne, solidaire et prospère. Chaque axe stratégique est pensé pour répondre aux défis majeurs du développement national.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
<!-- wp:image {"id":{$vision_poster},"sizeSlug":"large","linkDestination":"none","className":"fofana-card"} -->
<figure class="wp-block-image size-large fofana-card"><img src="{$vision_img_url}" alt="Vision pour la Guinée — Ansoumane Fofana" class="wp-image-{$vision_poster}"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
BLOCK;

    // Prepend the image section before the existing content
    $vision_content = $vision_img_block . "\n" . $vision_content;

    wp_update_post(array(
        'ID'           => 6,
        'post_content' => $vision_content,
    ));
    $results[] = "Vision (ID 6): Added vision poster image (ID $vision_poster)";
} else {
    $results[] = "Vision (ID 6): Image already present, skipped";
}

// ============================================================
// 2. MANDAT page (ID 7) — Add parliament photo before stat band
// ============================================================
$mandat_page = get_post(7);
$mandat_content = $mandat_page->post_content;

if (
    strpos($mandat_content, 'wp-image-' . $parliament) === false &&
    strpos($mandat_content, basename($attachments[$parliament]['url'])) === false
) {

    $parliament_url = $attachments[$parliament]['url'];
    $mandat_img_block = <<<BLOCK

<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section">
<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:image {"id":{$parliament},"sizeSlug":"large","linkDestination":"none","className":"fofana-card"} -->
<figure class="wp-block-image size-large fofana-card"><img src="{$parliament_url}" alt="Assemblée nationale de Guinée — Hémicycle" class="wp-image-{$parliament}"/></figure>
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

    // Insert after the first heading/paragraph (before the stat band)
    // Find the "CHIFFRES DU MANDAT" marker and insert before it
    $marker = 'CHIFFRES DU MANDAT';
    $pos = strpos($mandat_content, $marker);
    if ($pos !== false) {
        // Find the start of the group containing this text
        $before = substr($mandat_content, 0, $pos);
        $after  = substr($mandat_content, $pos);
        // Find the last <!-- wp:group before the marker
        $last_group = strrpos($before, '<!-- wp:group');
        if ($last_group !== false) {
            $mandat_content = substr($before, 0, $last_group) . $mandat_img_block . "\n" . substr($before, $last_group) . $after;
        } else {
            $mandat_content = $mandat_img_block . "\n" . $mandat_content;
        }
    } else {
        // Append at end if no marker found
        $mandat_content .= "\n" . $mandat_img_block;
    }

    wp_update_post(array(
        'ID'           => 7,
        'post_content' => $mandat_content,
    ));
    $results[] = "Mandat (ID 7): Added parliament hemicycle image (ID $parliament)";
} else {
    $results[] = "Mandat (ID 7): Image already present, skipped";
}

// ============================================================
// 3. ESPACE PRESSE page (ID 10) — Add press photos
// ============================================================
$press_page = get_post(10);
$press_content = $press_page->post_content;

if (strpos($press_content, 'wp-image-' . $press_conf) === false) {

    $press_img_url = $attachments[$press_conf]['url'];
    $hero_img_url  = $attachments[$hero_suit]['url'];
    $depute_img_url = $attachments[$depute]['url'];

    $press_img_block = <<<BLOCK

<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section">
<!-- wp:heading {"style":{"color":{"text":"#005f39"}}} --><h2 class="has-text-color" style="color:#005f39">Galerie média</h2><!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Photos officielles disponibles pour la presse. Pour toute demande de visuels haute résolution, contactez-nous via l'<a href="/contact/">espace contact</a>.</p>
<!-- /wp:paragraph -->
<!-- wp:gallery {"ids":[{$hero_suit},{$depute},{$press_conf}],"columns":3,"linkTo":"media","className":"fofana-reveal"} -->
<figure class="wp-block-gallery has-nested-images columns-3 is-cropped fofana-reveal">
<!-- wp:image {"id":{$hero_suit},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$hero_img_url}"><img src="{$hero_img_url}" alt="Portrait officiel — Ansoumane Fofana" class="wp-image-{$hero_suit}"/></a></figure>
<!-- /wp:image -->
<!-- wp:image {"id":{$depute},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$depute_img_url}"><img src="{$depute_img_url}" alt="Portrait député — Ansoumane Fofana" class="wp-image-{$depute}"/></a></figure>
<!-- /wp:image -->
<!-- wp:image {"id":{$press_conf},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$press_img_url}"><img src="{$press_img_url}" alt="Conférence de presse" class="wp-image-{$press_conf}"/></a></figure>
<!-- /wp:image -->
</figure>
<!-- /wp:gallery -->
</div>
<!-- /wp:group -->
BLOCK;

    // Append the media gallery section
    $press_content .= "\n" . $press_img_block;

    wp_update_post(array(
        'ID'           => 10,
        'post_content' => $press_content,
    ));
    $results[] = "Espace Presse (ID 10): Added 3 press photos (IDs $hero_suit, $depute, $press_conf)";
} else {
    $results[] = "Espace Presse (ID 10): Images already present, skipped";
}

// ============================================================
// 4. GALERIE page (ID 8) — Add 3 unused stock photos
// ============================================================
$galerie_page = get_post(8);
$galerie_content = $galerie_page->post_content;

// Check if youth education image already present
if (
    strpos($galerie_content, 'wp-image-' . $youth) === false &&
    strpos($galerie_content, basename($attachments[$youth]['url'])) === false
) {

    $youth_url      = $attachments[$youth]['url'];
    $parliament_url2 = $attachments[$parliament]['url'];
    $press_url2      = $attachments[$press_conf]['url'];
    $rally_url       = $attachments[$field_rally]['url'];

    $galerie_extra = <<<BLOCK

<!-- wp:group {"layout":{"type":"constrained"},"className":"fofana-section"} -->
<div class="wp-block-group fofana-section">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#005f39"}}} --><h2 class="has-text-align-center has-text-color" style="color:#005f39">Engagement et terrain</h2><!-- /wp:heading -->
<!-- wp:gallery {"ids":[{$youth},{$parliament},{$press_conf},{$field_rally}],"columns":4,"linkTo":"media","className":"fofana-reveal"} -->
<figure class="wp-block-gallery has-nested-images columns-4 is-cropped fofana-reveal">
<!-- wp:image {"id":{$youth},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$youth_url}"><img src="{$youth_url}" alt="Jeunesse et éducation en Guinée" class="wp-image-{$youth}"/></a></figure>
<!-- /wp:image -->
<!-- wp:image {"id":{$parliament},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$parliament_url2}"><img src="{$parliament_url2}" alt="Hémicycle — Assemblée nationale de Guinée" class="wp-image-{$parliament}"/></a></figure>
<!-- /wp:image -->
<!-- wp:image {"id":{$press_conf},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$press_url2}"><img src="{$press_url2}" alt="Conférence de presse" class="wp-image-{$press_conf}"/></a></figure>
<!-- /wp:image -->
<!-- wp:image {"id":{$field_rally},"sizeSlug":"large","linkDestination":"media"} -->
<figure class="wp-block-image size-large"><a href="{$rally_url}"><img src="{$rally_url}" alt="Rassemblement sur le terrain" class="wp-image-{$field_rally}"/></a></figure>
<!-- /wp:image -->
</figure>
<!-- /wp:gallery -->
</div>
<!-- /wp:group -->
BLOCK;

    $galerie_content .= "\n" . $galerie_extra;

    wp_update_post(array(
        'ID'           => 8,
        'post_content' => $galerie_content,
    ));
    $results[] = "Galerie (ID 8): Added 4 extra images (IDs $youth, $parliament, $press_conf, $field_rally)";
} else {
    $results[] = "Galerie (ID 8): Extra images already present, skipped";
}

// Output results
echo "=== IMAGE UPDATE RESULTS ===\n\n";
foreach ($results as $r) {
    echo "✓ $r\n";
}
