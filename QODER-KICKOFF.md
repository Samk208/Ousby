# Qoder kickoff: Fofana WordPress build

## Sam does first (about 10 minutes, in the Local app)

1. Delete `dog-comfort-test` and `kmedtour` in Local (both backed up in `C:\Users\Lenovo\WP-Backups\local-sites-2026-09-26\`).
2. Create a new Local site:
   - Name: `fofana` → domain `fofana.local`
   - Environment **Custom**: PHP **8.2.x**, web server **Apache** (closest to OpenLiteSpeed's `.htaccess` behaviour), MySQL **8.0.x**
   - Admin user: your choice. Do not paste the password into Qoder.
3. Start the site and confirm `http://fofana.local` loads.
4. Download the GeneratePress Pro plugin zip from your GeneratePress account into `C:\Users\Lenovo\Desktop\Project\Ousbe\vendor\` (for example `gp-premium.zip`). Keep the licence key out of the repo.
5. Open Qoder with the folder `C:\Users\Lenovo\Desktop\Project\Ousbe` and paste the prompt below.

---

## Prompt to paste into Qoder

```
You are building the official WordPress site for L'Honorable Ansoumane "Ouzby" Fofana (Guinean MP). It replaces a Next.js site that stays in fofana-site/ as the visual reference.

READ FIRST, fully, before writing anything:
1. WP-BUILD-PLAN-2026-09-26.md (this folder). It is the spec. Sections 1, 2 and 7 are non-negotiable.
2. The files listed in its §0 table, in order.

ENVIRONMENT
- Local (Flywheel) site "fofana" at http://fofana.local, files at C:\Users\Lenovo\Local Sites\fofana\app\public
- PHP 8.2, Apache, MySQL 8. The DB port and credentials are in %APPDATA%\Local\sites.json under the "fofana" entry.
- For wp-cli use Local's PHP with wp-cli.phar and that port, or ask me to run commands in Local's "Open site shell". Never guess.
- GeneratePress Pro plugin zip: vendor\ in this folder.
- Shell is Windows PowerShell 5.1: no `&&`, use `;`. Windows paths.

REPO
- Create C:\Users\Lenovo\Desktop\Project\Ousbe\fofana-wp as a new git repo (no remote yet; I will add one). Layout:
  theme/fofana-child/      GeneratePress child theme (style.css, functions.php, templates, acf-json/, assets/fonts/)
  mu-plugins/fofana-core.php   CPT evenement, taxonomies, JSON-LD, security tweaks
  scripts/                 setup + deploy scripts
  docs/PLAN.md             copy of WP-BUILD-PLAN-2026-09-26.md (commit this first)
- Link the code into the Local site with directory junctions (mklink /J, no admin needed) so edits in the repo are live:
  wp-content\themes\fofana-child -> fofana-wp\theme\fofana-child
  wp-content\mu-plugins -> fofana-wp\mu-plugins
- .gitignore: vendor/, *.zip, .env*, wp-config.php, *.sql. Never commit server IPs, usernames, passwords or licence keys.

SCOPE OF THIS RUN: plan §6 Slices 1 to 4 ONLY, then STOP.
- Slice 1: GP + GP Premium + GenerateBlocks + child theme; palette into generate_settings; self-hosted fonts; header, footer, tricolour bar, menu; Accueil page built fully. Verify at 375px and 1280px against fofana-site (run `npm run dev` there, or use https://fofana-site.vercel.app) and the stitch_*/screen.png mockups.
- Slice 2: fofana-core.php, ACF field group for evenement, categories/tags, templates, schema. [EXEMPLE] drafts only for layout testing.
- Slice 3: remaining pages, Fluent Forms contact with Turnstile (use Cloudflare's test keys locally), image import.
- Slice 4: roles + docs/GUIDE-EDITEUR.md in French.
- Commit after each slice with a clear message.

HARD RULES
- Content: follow plan §2 exactly. No invented figures, dates, bios, quotes or events. Anything unconfirmed is the literal marker [À COMPLÉTER PAR LE CABINET]. Placeholder items from the Next.js code (Mandat stats, news, agenda, activities) are [EXEMPLE] drafts, never published.
- Never mention PRR anywhere.
- No JS animation library. Total JS on the homepage under 150 KB.
- Colours and typography go into generate_settings, not !important CSS; delete generate_dynamic_css_output after changing them (plan G1).
- Do not touch the server, DNS, Vercel, or any other Local site.

WHEN YOU STOP (after Slice 4), report:
1. What was built per slice, with file paths.
2. Lighthouse mobile scores for /, /actualites/, /agenda/, /galerie/ and JS KB on /.
3. Screenshots of every page at 375px and 1280px, saved to fofana-wp/docs/screenshots/.
4. A list of every [À COMPLÉTER PAR LE CABINET] marker and where it is.
5. Anything in the plan you could not do or disagree with, and why.
6. A site export for handover: All-in-One WP Migration .wpress, or a wp-cli db export plus a wp-content zip, in fofana-wp/../exports/ (outside git).

If anything in the plan is ambiguous or conflicts with what you find, stop and ask me. Do not improvise around it.
```
