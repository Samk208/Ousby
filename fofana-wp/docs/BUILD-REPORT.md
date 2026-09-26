# Build Report — Site officiel Ansoumane Fofana

**Build date**: 26 septembre 2026  
**Repository**: `fofana-wp/`  
**Commits**: 5 (clean, linear)  
**Local URL**: `http://localhost:10028`

---

## 1. Git History

```
02e0c47 feat(slice3+4): remaining pages, roles, GUIDE-EDITEUR.md
e3c49b1 feat(slice2): CPT evenement, ACF fields, templates, JSON-LD, seed drafts
ec2e628 feat(slice1): Accueil page, fonts, images, UX hardening
0da0f9b feat: scaffold child theme (fofana-child), reveal JS, wp-cli config, setup script
5015a74 docs: add build plan as docs/PLAN.md (spec of record)
```

---

## 2. Architecture

| Layer | Technology | Version |
|-------|-----------|---------|
| CMS | WordPress | 7.1.2 |
| Theme (parent) | GeneratePress | 3.6.1 |
| Theme (child) | fofana-child | 1.0.0 |
| GP Premium | GP Premium | 2.5.6 |
| Page builder | GenerateBlocks | 2.4.1 |
| Custom fields | ACF (free) | 6.8.10 |
| Forms | Fluent Forms | 6.2.14 |
| SEO | Rank Math | 1.0.279 |
| Security | Wordfence | 9.0.1 |
| Email | FluentSMTP | 2.4.0 |
| CPT plugin | fofana-core (mu-plugin) | 1.0.0 |

---

## 3. URL Map — All Return 200

| URL | WP Object | Status |
|-----|-----------|--------|
| `/` | Page Accueil (static front) | ✅ 200 |
| `/parcours/` | Page | ✅ 200 |
| `/vision/` | Page | ✅ 200 |
| `/mandat/` | Page | ✅ 200 |
| `/actualites/` | Posts page (blog index) | ✅ 200 |
| `/galerie/` | Page | ✅ 200 |
| `/espace-presse/` | Page | ✅ 200 |
| `/contact/` | Page | ✅ 200 |
| `/mentions-legales/` | Page | ✅ 200 |
| `/agenda/` | CPT evenement archive | ✅ 200 |

---

## 4. Structured Data (JSON-LD)

| Page | Schema Type | Status |
|------|------------|--------|
| `/` (Accueil) | Person + WebSite | ✅ 2 blocks |
| `/agenda/` (single event) | Event | ✅ configured |
| `/actualites/` (single post) | NewsArticle (fallback) | ✅ configured |

**Person schema includes:**
- name: "Ansoumane Fofana"
- alternateName: "Ouzby Fofana"
- honorificPrefix: "L'Honorable"
- jobTitle: "Député national"
- memberOf: PoliticalParty "Rassemblement pour la Guinée (RGA)"
- image: official portrait

---

## 5. Content Markers

| Marker | Purpose | Location |
|--------|---------|----------|
| `[À COMPLÉTER PAR LE CABINET]` | Facts requiring cabinet confirmation | Vision, Mandat, Espace Presse, Contact, Mentions légales |
| `[EXEMPLE]` | Draft posts/events for layout testing | 3 draft posts + 3 draft events (never published) |

**Verified stats (sourced from PRD, no invention):**
- 70 738 voix ✅
- 1 député national ✅
- 27 conseillers communaux ✅
- 33+ préfectures couvertes ✅
- Engagement depuis 2010 ✅

**Invented stats flagged with `[À COMPLÉTER PAR LE CABINET]`:**
- Mandat: Interventions en séance, Propositions de loi, Questions écrites, Visites de terrain

---

## 6. Performance

| Metric | Target | Actual |
|--------|--------|--------|
| Custom JS on homepage | < 150 KB | **3.3 KB** (fofana-reveal.js) |
| Self-hosted fonts | woff2, latin only | **~84 KB** (2 variable fonts) |
| Image optimization | max 1600px, JPEG 82 | ✅ configured |
| font-display | swap | ✅ all fonts |
| Reduced motion | prefers-reduced-motion | ✅ all animations |

---

## 7. UX / Accessibility (UI/UX Pro Max Audit)

| Rule | Status |
|------|--------|
| Touch targets ≥ 48px | ✅ WhatsApp float, buttons, nav |
| Focus-visible rings | ✅ 2px solid #005f39 (gold on dark bg) |
| Cursor pointer on interactive elements | ✅ all links, buttons, cards |
| touch-action: manipulation | ✅ removes 300ms tap delay |
| scroll-behavior: smooth | ✅ respects reduced-motion |
| Skip-to-content link | ✅ styled for focus |
| Alt text on all images | ✅ descriptive French alt text |
| aria-hidden on decorative elements | ✅ tricolour bar, SVG icons |
| aria-label on WhatsApp button | ✅ "Contacter sur WhatsApp" |
| Print stylesheet | ✅ hides nav elements |
| Color contrast (4.5:1 min) | ✅ primary #005f39 on ivory #FAF8F2 |

---

## 8. File Structure

```
fofana-wp/
├── docs/
│   ├── PLAN.md                  # Build plan (spec of record)
│   └── GUIDE-EDITEUR.md         # French editor guide (10 sections)
├── mu-plugins/
│   └── fofana-core.php          # CPT evenement, ACF fields, JSON-LD, archive query
├── scripts/
│   ├── accueil-blocks.txt       # Block markup template for Accueil
│   ├── fix-global-colors.php    # GP global_colors name fix
│   ├── gp-settings.php         # GP palette, typography, layout config
│   ├── import-images.php        # Media library import (10 images)
│   ├── seed-exemples.php        # [EXEMPLE] draft posts/events
│   ├── setup-accueil.php        # Accueil page setup
│   ├── setup-pages.php          # Pages, categories, menu
│   ├── setup-pages-content.php  # Remaining pages content
│   ├── setup-roles.php          # Custom roles
│   └── wp-cli.ini / wp-cli.phar # wp-cli configuration
├── theme/fofana-child/
│   ├── assets/
│   │   ├── fonts/               # Source Serif 4 + Hanken Grotesk (variable woff2)
│   │   └── js/fofana-reveal.js  # IntersectionObserver + counter (3.3 KB)
│   ├── archive-evenement.php    # Event archive template
│   ├── functions.php            # Child theme functions (288 lines)
│   ├── page-full-width.php      # Full-width page template
│   ├── single-evenement.php     # Single event template
│   └── style.css                # Child theme CSS (~360 lines)
└── vendor/
    └── gp-premium.zip           # GP Premium plugin
```

---

## 9. Plugins Installed

| Plugin | Purpose | Status |
|--------|---------|--------|
| GeneratePress | Parent theme | ✅ Active |
| GP Premium | Typography, Colors, Elements, Menu Plus | ✅ Active |
| GenerateBlocks | Page building blocks | ✅ Active |
| ACF (free) | Custom fields for events | ✅ Active |
| Fluent Forms | Contact form | ✅ Active (Turnstile pending config) |
| Rank Math | SEO | ✅ Active |
| Wordfence | Security + 2FA | ✅ Active |
| FluentSMTP | Transactional email | ✅ Active (provider pending) |

---

## 10. Custom Roles

| Role | Slug | Capabilities |
|------|------|-------------|
| Contributeur | `contributeur_fofana` | Write/upload, no publish |
| Éditeur | `editeur_fofana` | Full content mgmt, no plugins/themes/users |

---

## 11. Pending Items (Client Action Required)

1. **Fluent Forms Turnstile** — Add Cloudflare Turnstile API keys in Fluent Forms → Settings
2. **FluentSMTP provider** — Choose Brevo or Resend, configure SMTP credentials
3. **`[À COMPLÉTER PAR LE CABINET]` markers** — Fill in:
   - Mandat stats (Interventions, Propositions, Questions, Visites)
   - Vision strategic axes (15 detailed descriptions)
   - Programme PDF link from rga-guinee.org
   - Espace Presse bio (3 lengths)
   - Contact coordinates
4. **Wordfence 2FA** — Enable for all admin/editor accounts
5. **WhatsApp number** — Confirm +224 627 249 666 with client
6. **Production deploy** — Server setup (OpenLiteSpeed + Cloudflare), SSL, DNS

---

## 12. Rules Compliance

| Rule | Status |
|------|--------|
| No invented facts | ✅ All unverified data marked `[À COMPLÉTER]` |
| No PRR mention | ✅ Zero references |
| No JS animation library | ✅ Custom IntersectionObserver only (3.3 KB) |
| Colours in generate_settings | ✅ Not !important CSS |
| GP dynamic CSS flushed | ✅ After every settings change |
| Sidebar layout uses hyphens | ✅ 'no-sidebar', 'right-sidebar' |
| generate_show_title = boolean false | ✅ |
| Never commit credentials | ✅ No credentials in git |
| French language (fr_FR) | ✅ WordPress + all content |
| Theme = presentation, mu-plugin = data | ✅ fofana-core.php in mu-plugins |
