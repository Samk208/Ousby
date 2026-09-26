# Build Plan: Fofana site → WordPress + GeneratePress Pro on CyberPanel

**For:** Qoder (builder) · **From:** Sam Konneh · **Date:** 2026-09-26
**Client:** L'Honorable Ansoumane "Ouzby" Fofana, député national (Guinée), président du RGA
**Source of truth for design:** the live Next.js build `fofana-site/` (https://fofana-site.vercel.app) + `stitch_site_officiel_ansoumane_fofana/r_publique_moderne/DESIGN.md`

> **First action:** create a new git repo `fofana-wp` and commit this file as `docs/PLAN.md`. This file is not in any repo yet. `fofana-site` is a **public** GitHub repo, so never commit server IPs, usernames, app passwords or `wp-config.php` there or in `fofana-wp`.

---

## 0. Read these first (in order)

| # | File | Why |
|---|---|---|
| 1 | `Ousbe\stitch_site_officiel_ansoumane_fofana\fofanasiteprdinput.md` | Client brief, audiences, objectives, performance budget, open questions (Part 5) |
| 2 | `Ousbe\stitch_site_officiel_ansoumane_fofana\r_publique_moderne\DESIGN.md` | Design tokens: colours, type scale, radii, spacing |
| 3 | `Ousbe\stitch_site_officiel_ansoumane_fofana\handover_note_l_honorable_ansoumane_fofana.md` | What the Next.js build contains, page by page |
| 4 | `Ousbe\fofana-site\src\app\**\page.tsx` | Visual reference for every page. Port the **layout**, not the data (see §2) |
| 5 | `Claude cowork\wordpress\razorbench\theme\razorbench-child\` (`functions.php`, `style.css`) | Reference GeneratePress child theme: footer hook, head block, homepage sections |
| 6 | `Claude cowork\wordpress\bulk-affiliate-sites\templates\affiliate-gp-child\functions.php` | GP rules verified against docs (header comment) + image/lazy-load hardening |
| 7 | `Claude cowork\wordpress\quietpooch\scripts\deploy.sh` | Deploy pattern: scp child theme → chown/chmod → drop GP dynamic CSS → purge → curl check |
| 8 | `Claude cowork\wordpress\bulk-affiliate-sites\scripts\wordpress\gp-settings.sh` | How to push palette/typography into `generate_settings` via wp-cli |
| 9 | `Claude cowork\wordpress\quietpooch\docs\SITE-SETUP-GUIDE.md` | CyberPanel site creation → WP install → GP setup, step by step |
| 10 | `C:\Users\Lenovo\.claude\skills\wp-cyberpanel-deploy\SKILL.md`, `wp-litespeed-performance\SKILL.md`, `wp-child-theme-display-defects\SKILL.md` | Deploy, cache, and CSS-defect playbooks |
| 11 | `Claude cowork\wordpress\bulk-affiliate-sites\VPS-REMEDIATION-RUNBOOK-2026-06-09.md` | Server hardening baseline (panel behind SSH tunnel, fail2ban, key-only SSH) |
| 12 | `Claude cowork\wordpress\Beyla Region\HANDOVER.md` §2 | Sibling Guinean civic site: the "zero fabricated facts" + `[À COMPLÉTER PAR LE CABINET]` convention this build reuses |

Do not copy the affiliate-specific parts of those themes (Amazon, disclosure, product cards, anti-network variation).

---

## 1. Decisions (fixed unless Sam changes them)

| Area | Decision | Reason |
|---|---|---|
| Theme | **GeneratePress + GP Premium** (client's own licence) + child theme `fofana-child` | Client requirement. Do not reuse the fleet's GP Premium copy; the client needs their own licence for updates |
| Page layout | Block editor + **GenerateBlocks** (free; Pro only if a layout truly needs it) + GP **Elements** (Hooks / Block elements) for header bar, footer, CTA bands | Editors can change text without touching code |
| Content types | Native **Posts** + **one CPT `evenement`** (Agenda). Nothing else custom | Fewest moving parts for a non-technical team |
| Custom fields | **ACF (free)** for `evenement` only: date_debut, heure, lieu, statut (à venir / terminé / reporté) | Editor-friendly date/place fields |
| CPT registration | Small site plugin `wp-content/mu-plugins/fofana-core.php` (CPT, taxonomy, schema, security tweaks). Keep theme = presentation, mu-plugin = data | Switching themes never loses content |
| Forms | **Fluent Forms** (free) + Cloudflare **Turnstile** + entries stored in DB | Stores submissions, spam protection, no paid tier |
| Email | **FluentSMTP** → transactional provider (Brevo or Resend, Sam to pick) | PHP mail() from a VPS lands in spam |
| SEO | **Rank Math** (free unless client buys Pro) + JSON-LD `Person` / `PoliticalParty` / `Event` emitted from `fofana-core.php` | See gotcha G7: verify Rank Math actually prints tags |
| Cache | **LiteSpeed Cache** (server is OpenLiteSpeed). Cloudflare in front (DNS proxied, auto-purge) | Fleet standard; Guinea has no nearby edge, caching is what makes it fast |
| Security | Wordfence (free) with 2FA for all admin/editor accounts, login rate-limit, XML-RPC off, REST user enumeration off, file editing off (`DISALLOW_FILE_EDIT`) | Political site = target; auth routes must be rate-limited before launch |
| Language | WordPress in **fr_FR**. English later via Polylang, not now | PRD: French only v1 |
| Animation | **No JS animation library.** CSS transitions + one ~30-line IntersectionObserver script for reveal and counters. Respect `prefers-reduced-motion` | PRD budget: < 150 KB JS on first load |
| Fonts | Source Serif 4 + Hanken Grotesk **self-hosted** (woff2, 2 weights each, `font-display: swap`), via GP Premium local fonts or `@font-face` in child theme | No Google Fonts round trip on 3G |
| Out of scope v1 | Donations/"Soutenir" (legal review pending), English, newsletter double opt-in (unless Sam confirms a provider), Facebook auto-syndication | PRD §4.4 and Part 5 |

---

## 2. Content rule (non-negotiable)

**Most data in the Next.js build is placeholder, not client-confirmed.** Do not import it as real content.

| Next.js source | Status | WordPress action |
|---|---|---|
| `page.tsx` STATS (70,738 voix, 1 député, 27 conseillers, 33+ préfectures, 2010) | Sourced in PRD §1.3 | Keep. Add a source note in the page's editor notes |
| VALUES (Vérité · Loyauté · Paix), slogan, vision statement, quotes in PRD §1.5 | Sourced | Keep verbatim |
| `mandat/page.tsx` STATS (124 interventions, **45 propositions de loi**, 89 votes, 32 missions) | **Invented.** He was seated 18 Jul 2026 | Do not ship. Stat blocks show `[À COMPLÉTER PAR LE CABINET]` |
| `mandat` ACTIVITIES, `actualites` NEWS + COMMUNIQUES, `agenda` EVENTS | **Invented** (e.g. "Mission à Kankan", "Vote du budget 2026-2027") | Create as **drafts** titled `[EXEMPLE] …` for layout testing only; never publish. Delete before launch |
| `parcours` TIMELINE | 2010 onward matches PRD §1.2; pre-2017 career unknown | Ship only PRD §1.2 dated items. Birth, education, pre-2017 = `[À COMPLÉTER PAR LE CABINET]` |
| PRR ↔ RGA relationship | Unconfirmed (PRD Part 5 Q5) | Do not mention PRR anywhere until the client answers |
| `espace-presse` RESOURCES | **Mislabelled:** "Logo RGA SVG", "Logo RGA PNG" and "Charte graphique PDF" link to campaign-poster JPGs | Only list files that exist. Real logo + charte are an intake item |
| Bio 50/200/500 words | Not written | Placeholder until the cabinet approves |
| Photos in `public/images/client/` | Real client photos | Import (see §6). `guinea_youth_education.jpg`, `parliament_hemicycle.jpg`, `press_conference_podium.jpg` are stock/AI: caption "Photo d'illustration" or drop |

Every placeholder uses the literal marker `[À COMPLÉTER PAR LE CABINET]` so a pre-launch grep finds them all.

---

## 3. Information architecture (keep the Next.js slugs)

| URL | WP object | Built with | Notes |
|---|---|---|---|
| `/` | Page "Accueil" (static front page) | GenerateBlocks sections | Hero (portrait + name + office), stat band, 3 value cards, latest 3 posts (Query Loop), next 2 events, CTA band (WhatsApp + contact) |
| `/parcours/` | Page | Blocks | Portrait, timeline (block pattern, not CPT), convictions cards |
| `/vision/` | Page | Blocks | 3 values, 15 axes grid (priority badge: haute/moyenne/standard), programme PDF download (real PDF from rga-guinee.org, confirm with client) |
| `/mandat/` | Page + Query Loop on category **Mandat** | Blocks | Stat band (placeholders), filter by sub-category: Interventions, Votes, Questions écrites, Terrain |
| `/actualites/` | Posts page (blog index) | GP archive + child template | Featured post, category pills, 2-col grid, sidebar CTA WhatsApp |
| `/actualites/%postname%/` | Single post | GP single | Permalink base `/actualites/%postname%/` — set in Settings → Permaliens |
| `/communiques/` | Category archive **Communiqués** | GP archive | Formal list, date prominent, optional PDF attachment per post |
| `/agenda/` | CPT `evenement` archive | Child template `archive-evenement.php` | Two tabs: À venir (date ≥ today, ASC) / Archives (date < today, DESC). Tabs = two links with `?periode=archives`, no JS needed |
| `/agenda/%slug%/` | Single event | Child template | Emits `Event` JSON-LD |
| `/galerie/` | Page | Core Gallery block + Reels section | Reels = click-to-load facade (thumbnail + play button → injects the Facebook iframe on click). Never load FB SDK on page load |
| `/espace-presse/` | Page | Blocks (File block for downloads) | Bio 3 lengths, portraits hi-res, logo, programme PDF, press contact |
| `/contact/` | Page | Fluent Forms | Fields: nom, email, téléphone (optional), objet (select: presse / citoyen / partenariat / autre), message. Turnstile. Success message in French |
| `/mentions-legales/` | Page | Plain | Legal notice, privacy (form data retention), hosting provider. `[À COMPLÉTER]` for the legal entity |
| `/politique-de-confidentialite/` | Page | Plain | WP privacy page, set in Réglages → Confidentialité |

Taxonomies: post categories **Actualités**, **Communiqués**, **Mandat** (children: Interventions, Votes, Questions écrites, Terrain). Tags = the 15 Vision axes (so the Mandat archive filters by theme too). Uncategorized renamed to Actualités.

Menu (primary): Accueil · Parcours · Vision · Mandat · Actualités · Agenda · Galerie · Presse · **Contact** (button style). Footer: 4 columns as in `Footer.tsx`, link to rga-guinee.org, social links, mentions légales.

Global elements (GP Elements or child-theme hooks):
- Tricolour bar (red → gold → green, 4px) above header and footer: `generate_before_header` priority 7 and in the footer hook.
- Floating WhatsApp button (`https://wa.me/224627249666`, confirm number with client), pill, ≥ 48px, bottom-right, `aria-label`.
- WhatsApp share link on every single post and event: `https://wa.me/?text=<urlencoded title + permalink>`. Plain `<a>`, no plugin.

---

## 4. Design port (Tailwind → GeneratePress)

1. **Colours into GP, not CSS.** Put the DESIGN.md palette into `generate_settings` global colours with `gp-settings.sh` as the pattern (primary `#005f39`, primary-container `#087a4b`, deep-forest `#075C3B`, secondary `#785a00`, secondary-container `#fcc748`, tertiary `#a01e23`, ivory `#FAF8F2`, border `#DEE5DF`, muted `#626A66`, text `#181d1b`). GP generates `--primary` etc. CSS variables; the child CSS uses those variables.
2. **Typography** in GP Customizer → Typography (local fonts): headings Source Serif 4 700/600, body Hanken Grotesk 400/700. Scale from DESIGN.md (`display-lg` 48/56, mobile 36/42; `headline-md` 32/40; `body-lg` 18/28).
3. **Layout:** container 1280px, no sidebar except blog index/single (right sidebar), content padding 2rem desktop / 1.25rem mobile, section gap 5rem.
4. **Components** as GenerateBlocks patterns registered from the child theme (`register_block_pattern`) so editors can insert them: Stat band, Value card, Record card (label-caps / title / date·category footer), CTA band, Timeline item, Axis card with priority badge.
5. **Cards:** white on ivory, 1px `#DEE5DF` border, radius 8px (large media 16px). Hover = border turns primary green, **no lift** (DESIGN.md §Elevation). Single shadow only on primary CTA cards: `0 4px 12px rgba(32,37,35,.05)`.
6. **Drop from the Next.js build:** parallax hero, floating particles, gold shimmer text, framer-motion stagger, scroll progress bar. They conflict with DESIGN.md ("avoid gradients", "3G budget") and the JS budget. Keep: counter animation (tiny JS, only when in view, reduced-motion = final number immediately).
7. Use `stitch_*/*/screen.png` and the live Vercel site side by side as the visual target at 375px and 1280px.

---

## 5. Structured data (objective #1: be the authoritative result for his name)

Emit from `fofana-core.php` on `wp_head`:
- **Home:** `Person` (name "Ansoumane Fofana", alternateName "Ouzby Fofana", honorificPrefix "L'Honorable", jobTitle "Député national", `memberOf` → `PoliticalParty` RGA with url https://rga-guinee.org, `sameAs` Facebook URL + rga-guinee.org president page, image = official portrait) + `WebSite`.
- **Single event:** `Event` (startDate, location Place, organizer Person, eventStatus).
- **Single post:** leave Article schema to Rank Math **only if** it prints it (G7); otherwise emit `NewsArticle` from the mu-plugin.
- No birthDate, alumniOf etc. until the cabinet confirms.
- Validate with Google Rich Results Test before launch.

Open Graph: every page needs `og:image` 1200×630 (traffic arrives from Facebook/WhatsApp shares). Default = official portrait crop; per-post = featured image. Make featured image required on posts (editor checklist, not code).

---

## 6. Build sequence (vertical slices; each ends verified)

**Slice 1: Local skeleton, one page end to end**
1. LocalWP site `fofana` (PHP 8.2, same as server). fr_FR. GeneratePress + GP Premium (client licence) + GenerateBlocks + child theme `fofana-child` in the `fofana-wp` repo.
2. Palette + fonts + header/footer + tricolour bar + menu.
3. Build **Accueil** fully (real photos, real sourced stats).
4. Check at 375px and 1280px against the Vercel site. Lighthouse mobile ≥ 90.

**Slice 2: Content model**
5. `fofana-core.php`: CPT `evenement` (slug `agenda`, `show_in_rest`, supports title/editor/thumbnail/excerpt), ACF field group (exported to `acf-json/` in the child theme so it lives in git), categories/tags from §3, schema output.
6. Templates: blog index, single post, category archive, `archive-evenement.php`, `single-evenement.php`.
7. Seed `[EXEMPLE]` drafts (≤ 3 per type) to test layouts. Never publish them.

**Slice 3: Remaining pages**
8. Parcours, Vision, Mandat, Galerie (Reels facade), Espace Presse, Contact (Fluent Forms + Turnstile + FluentSMTP), Mentions légales, Confidentialité.
9. Image import: from `fofana-site/public/images/client/`, upload the **JPG originals** (WP makes WebP via LiteSpeed image optimisation). `big_image_size_threshold` 1600 for hero, JPEG quality 82. Hero ≤ 200 KB delivered. Descriptive French alt text.

**Slice 4: Editorial workflow**
10. Roles: client team = **Contributeur** (write, submit for review) + one **Éditeur** (publishes). Sam = admin. Nobody on the client side gets admin.
11. Write `docs/GUIDE-EDITEUR.md` in French, 1 page: publish a news post, a communiqué, an event; set featured image; fill excerpt.

**Stop point after Slice 4.** Hand Sam a LocalWP export (All-in-One WP Migration `.wpress` or a wp-cli db dump + `wp-content` zip) and a screenshot set at 375px and 1280px. Slices 5-7 start only once Sam has bought the domain.

**Slice 5: Server (CyberPanel)**
12. On the **new, dedicated VPS** (hardened per §9.1 first), create website in CyberPanel for the client domain, PHP 8.2, its own Linux user. Issue SSL (see G2).
13. Install WP with the site user (pattern: `bulk-affiliate-sites\scripts\wordpress\wp-install-new-sites.sh`), then migrate LocalWP → server (All-in-One WP Migration or wp-cli db export/import + search-replace `http://fofana.local` → `https://<domain>`).
14. Write the WordPress rewrite rules into `.htaccess` by hand (G3), save permalinks, verify.
15. `wp-config.php`: fresh salts, `DISALLOW_FILE_EDIT`, `WP_DEBUG false`, `WP_ENVIRONMENT_TYPE production`, `FORCE_SSL_ADMIN`.
16. Deploy script `fofana-wp/scripts/deploy.sh`, copied from `quietpooch/scripts/deploy.sh`, with two changes: **run wp-cli as the site user (`sudo -u <siteuser> wp …`), never `--allow-root`** (G6), and read host/user from a gitignored `.env.deploy`.
17. LiteSpeed Cache: page cache on, CSS minify on, **CSS combine / UCSS / CCSS off**, image optimisation (WebP) on, QUIC.cloud CDN off. Cloudflare in front with LiteSpeed's Cloudflare purge integration.

**Slice 6: Launch gate** (all must pass, see §8)

**Slice 7: Cut over**
18. Point domain DNS. Sam deletes the Vercel project after the WP site passes §8 (see §9.6). Qoder does not touch Vercel.

---

## 7. Gotchas already paid for on this fleet (do not re-learn)

| # | Gotcha | Fix |
|---|---|---|
| G1 | GP inline CSS loads **after** the child stylesheet and is **cached** in the option `generate_dynamic_css_output` | Set colours/typography in `generate_settings`, not `!important`. After any wp-cli change: `wp option delete generate_dynamic_css_output generate_dynamic_css_cached_version` |
| G2 | CyberPanel `issueSSL` reports success but leaves the 10-year self-signed placeholder cert | Apex and www must resolve first. Check the issuer with `openssl s_client`. If self-signed: move `/etc/letsencrypt/live/<domain>` aside, remove the acme.sh conf, re-issue |
| G3 | OpenLiteSpeed never writes WP's `.htaccess` → pretty URLs and `/wp-json/` 404 | Write the standard WP rewrite block by hand, restart LSWS, verify `curl -sI https://<domain>/parcours/` = 200 |
| G4 | After a permission fix, LiteSpeed keeps serving the cached 404 | Purge is part of every fix: `wp litespeed-purge all` + `lswsctrl restart`. Don't `rm -rf wp-content/litespeed/*` |
| G5 | Docroot perms | `<siteuser>:nobody`, dirs 750, files 640, `wp-config.php` 600 |
| G6 | wp-cli / cache commands as **root** recreate `wp-content/litespeed` as root:root → CSS breaks | Always run as the site user |
| G7 | Rank Math was active on three fleet sites and printed **nothing** in `<head>` (no description, OG, robots) | Day one: view-source on home, a post, an event. If tags are missing, emit them from the child theme (pattern: `bulk-affiliate-sites\scripts\wordpress\seo_theme_block.py` output; it stands down when Rank Math's head action fires) |
| G8 | Theme-printed links (footer, menus) are invisible to REST-based link checks; the fleet had 84 dead footer links | Crawl the **rendered** HTML for 404s, not the REST API |
| G9 | GP Premium modules silently ignore settings when the module is not activated (e.g. `_generate-disable-headline`) | Activate the Elements, Typography, Colors, Blog modules explicitly |
| G10 | Full-bleed GenerateBlocks sections get clipped | Container `max-width: none` on full-width sections |
| G11 | CyberPanel API rejects `$ ; \| &` even inside passwords | Use the web UI or passwords without those characters |
| G12 | Never re-enqueue parent/child CSS (GP does it); sidebar layout values use hyphens (`no-sidebar`); `generate_show_title` needs boolean `false` | Follow the header of `templates\affiliate-gp-child\functions.php` |

---

## 8. Launch gate (verify, don't assume)

- [ ] `grep -r "À COMPLÉTER"` over the DB export returns only items the client has explicitly deferred. Zero `[EXEMPLE]` posts exist (`wp post list --s="[EXEMPLE]" --post_status=any`).
- [ ] Lighthouse **mobile** ≥ 90 on `/`, `/actualites/`, one post, `/agenda/`, `/galerie/`. LCP < 2.5 s with "Slow 4G" throttling. JS transferred on `/` < 150 KB.
- [ ] Every URL in §3 returns 200 over HTTPS from outside the box. `/wp-json/` returns 200. HTTP → HTTPS and www → apex (or reverse) 301.
- [ ] SSL issuer is Let's Encrypt, not self-signed.
- [ ] view-source shows: one `<title>`, meta description, canonical, `og:image`, `Person` JSON-LD on home, `Event` JSON-LD on an event. Rich Results Test passes.
- [ ] Rendered-HTML crawl: zero internal 404s (menus, footer, buttons). No `href="#"` left (the Next.js build has two: press "Bio" and Vision PDF).
- [ ] Contact form: submission lands in Fluent Forms entries. Turnstile blocks a scripted POST. (Email delivery check added once the provider is chosen, §9.4.)
- [ ] Login: Wordfence 2FA on every admin/editor, lockout after 5 failures, `/xmlrpc.php` blocked, `/wp-json/wp/v2/users` returns 401/empty.
- [ ] CyberPanel ports 8090/7080 closed to the internet (panel reachable only via SSH tunnel), SSH key-only, fail2ban active.
- [ ] Off-server backup configured and **one restore tested** (UpdraftPlus → remote storage, or CyberPanel remote backup).
- [ ] Share `/` and a post in WhatsApp and the Facebook Sharing Debugger: correct image, title, description.
- [ ] Contributor account can draft + submit but cannot publish.

---

## 9. Blocked on Sam (answer before Slice 5)

1. ~~Which server?~~ **Decided 2026-09-26:** a **separate, new VPS running CyberPanel**, not the affiliate-sites box. Nothing about this client shares an IP, panel or backups with the affiliate network. Provisioning baseline for the new box (Slice 5, before WordPress goes on it):
   - Fresh OS (AlmaLinux 9 or Ubuntu 22.04), current CyberPanel + OpenLiteSpeed, PHP 8.2.
   - SSH key-only, root password login off, fail2ban on, OS auto-security-updates on.
   - Firewall: only 22, 80, 443 open. CyberPanel 8090 and OLS WebAdmin 7080 reachable **only through an SSH tunnel**, with CyberPanel 2FA on. (An internet-exposed, unpatched 8090 is how the June 2026 fleet compromise happened.)
   - Off-server backups configured from day one.
   - Follow `bulk-affiliate-sites\VPS-REMEDIATION-RUNBOOK-2026-06-09.md` for the hardening steps; skip its affiliate-site cleanup sections.
2. ~~Domain~~ **Decided 2026-09-26:** Sam buys the domain when the build is ready. Slices 1-4 run entirely on LocalWP and need no domain. Slice 5 waits for the domain. Do not stand up a public staging copy on another domain in the meantime (duplicate content, and it would tie the client to an unrelated domain).
3. ~~GP Premium licence~~ **Decided 2026-09-26:** **GeneratePress Pro licence**, supplied by Sam. Install the premium plugin that licence provides (it installs as the `gp-premium` plugin; everywhere this plan says "GP Premium" it means that plugin). If the licence also includes GenerateBlocks Pro, it may be used, but nothing in this plan requires it. Register the licence key on the production site (Apparence → GeneratePress) so updates flow.
4. ~~Email provider~~ **Deferred 2026-09-26:** chosen later. Until then: install FluentSMTP but leave it unconfigured, and the contact form **stores every entry in Fluent Forms** (the entries list is the source of truth). Launch gate §8 "email arrives" is replaced by "entry appears in Fluent Forms → Entrées" until the provider is set; add the email check back when it is.
5. **Newsletter/WhatsApp list capture** in v1 or v2? If v1: which provider does double opt-in.
6. ~~Vercel after cutover~~ **Decided 2026-09-26:** Sam deletes the Vercel project himself, after the WordPress site passes §8 on the real domain. Qoder does not touch Vercel.

## 10. Blocked on the client (intake list, from PRD Part 5)

Birth date/place · education · pre-2017 career · Build Transap Guinée mention (yes/no) · **PRR ↔ RGA relationship** · family details allowed · political base region · official logo files (SVG/PNG) + charte graphique · approved bios (50/200/500 words) · programme PDF (confirm the 23-page one) · confirmed WhatsApp numbers for citizens vs press · other social accounts · real Mandat record (interventions, votes, questions écrites with dates) · who publishes and who approves · donations yes/no (legal review first).

The site can launch with `[À COMPLÉTER PAR LE CABINET]` markers on biography gaps; it cannot launch with invented figures.
