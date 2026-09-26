# Handover Note: Official Website for L'Honorable Ansoumane "Ouzby" Fofana

## Project Overview

This project delivers the **fully built, production-deployed** frontend for the official personal website of Ansoumane Fofana, a national deputy and political leader in Guinea. The site is live on Vercel and adheres to the "République Moderne" visual identity.

| Status           | Detail                                                                   |
| ---------------- | ------------------------------------------------------------------------ |
| **Build**        | Complete — zero TypeScript errors, all 10 routes statically generated    |
| **Deployment**   | Live at [https://fofana-site.vercel.app](https://fofana-site.vercel.app) |
| **Framework**    | Next.js 16.3.2 (App Router)                                              |
| **Language**     | French (v1), structured for future i18n                                  |
| **Last Updated** | August 25, 2026                                                          |

---

## 1. Core Visual Identity: "République Moderne"

The design system establishes a credible, institutional, and distinctly Guinean statesman aesthetic.

### Color Palette (mapped to Tailwind CSS v4 `@theme` tokens)

| Token                 | Hex       | Usage                                               |
| --------------------- | --------- | --------------------------------------------------- |
| `primary`             | `#005f39` | Institutional green — buttons, active nav, headings |
| `primary-container`   | `#087a4b` | Hero gradients, hover states, value cards           |
| `deep-forest`         | `#075C3B` | Footer background, dark overlays                    |
| `secondary`           | `#785a00` | Warm gold — stat numbers, labels                    |
| `secondary-container` | `#fcc748` | Gold accents, shimmer text, highlights              |
| `tertiary`            | `#a01e23` | Guinea red — sparingly, national values             |
| `ivory-bg`            | `#FAF8F2` | Page background (avoids harsh white)                |
| `border-elegant`      | `#DEE5DF` | Subtle borders, card outlines                       |
| `text-muted`          | `#626A66` | Secondary text, labels, metadata                    |

### Typography

- **Headings:** Source Serif 4 — sophisticated, editorial, authoritative
- **Body:** Hanken Grotesk — modern sans-serif, optimized for readability on low-end mobile

### Design Principles

- Mobile-first layouts with generous whitespace
- Guinea tricolour accent bar (red → gold → green) on header and footer
- Low-bandwidth optimization: all pages statically generated (SSG)
- `prefers-reduced-motion` respected for all animations

---

## 2. Technology Stack (Implemented)

| Layer      | Technology                           | Version              |
| ---------- | ------------------------------------ | -------------------- |
| Framework  | Next.js (App Router)                 | 16.3.2               |
| Language   | TypeScript                           | 5.x                  |
| Styling    | Tailwind CSS v4 (`@theme` directive) | 4.x                  |
| Animations | Framer Motion                        | 13.1.1               |
| Icons      | Lucide React                         | 1.34.0               |
| Deployment | Vercel (static/SSG)                  | Auto-deploys on push |
| Validation | Zod                                  | 4.4.3                |

---

## 3. Information Architecture & Page Inventory

All 9 pages are built, statically generated, and live:

| Route            | Page              | Key Features                                                                                              |
| ---------------- | ----------------- | --------------------------------------------------------------------------------------------------------- |
| `/`              | **Accueil**       | Parallax hero, gold shimmer name, animated stat counters (5 metrics), value cards, CTA banner             |
| `/parcours`      | **Parcours**      | Hero portrait, timeline with dot markers (2010→2026), convictions cards                                   |
| `/mandat`        | **Mandat**        | Gradient hero, 4 animated stat cards, filterable activity feed with type/theme badges                     |
| `/vision`        | **Vision**        | Values grid, bento-grid strategic axes (6 axes), priority detail cards, PDF download CTA                  |
| `/actualites`    | **Actualités**    | Featured article hero, category pill filters, 2-col news grid, sidebar (communiqués + WhatsApp CTA)       |
| `/galerie`       | **Galerie**       | Bento photo grid (6 photos), reels section (9:16 video cards with play overlays)                          |
| `/agenda`        | **Agenda**        | Upcoming/Archive tabs, event cards with date blocks, status badges, time/location metadata                |
| `/espace-presse` | **Espace Presse** | Quick download dashboard (bios + media resources), press contact card, portrait gallery, communiqués list |
| `/contact`       | **Contact**       | Form with validation + success state, contact info sidebar, WhatsApp CTA                                  |

---

## 4. Animation System (Framer Motion)

### Global Animation Patterns

| Pattern                 | Implementation                                                        | Where Used                        |
| ----------------------- | --------------------------------------------------------------------- | --------------------------------- |
| **Staggered reveal**    | `containerVariants` + `itemVariants` with spring physics              | Every page section                |
| **Viewport trigger**    | `whileInView` with `once: true, margin: "-80px"`                      | All `AnimatedSection` components  |
| **Animated counters**   | `useInView` + `requestAnimationFrame` with `easeOutExpo`-style easing | Homepage stats, Mandat dashboard  |
| **Hero parallax**       | `useScroll` + `useTransform` for opacity and scale                    | Homepage hero                     |
| **Card hover lift**     | `whileHover={{ y: -4 }}` with spring stiffness 400                    | All cards, news items, activities |
| **Floating particles**  | `animate={{ y: [0, -20, 0] }}` with staggered delays                  | Hero background                   |
| **Gold shimmer**        | CSS `@keyframes shimmer` on gradient text                             | Hero name, section headings       |
| **Mobile drawer**       | `AnimatePresence` with height/opacity transition                      | Header mobile nav                 |
| **Scroll-aware header** | `scrollY > 20` triggers backdrop-blur + shadow                        | All pages                         |

### Reusable Components

| Component          | File                                 | Purpose                                                                          |
| ------------------ | ------------------------------------ | -------------------------------------------------------------------------------- |
| `Header`           | `src/components/Header.tsx`          | Scroll-aware sticky nav, tricolour bar, mobile drawer, active route highlighting |
| `Footer`           | `src/components/Footer.tsx`          | Deep-forest gradient, 4-column grid, tricolour bar, contact info                 |
| `AnimatedCounter`  | `src/components/AnimatedCounter.tsx` | Viewport-triggered number animation with locale formatting                       |
| `AnimatedSection`  | `src/components/AnimatedSection.tsx` | Wrapper for staggered reveal animations on any section                           |
| Animation variants | `src/lib/animations.ts`              | Shared `containerVariants`, `itemVariants`, `fadeUpVariants`, `scaleInVariants`  |

---

## 5. Project File Structure

```
fofana-site/
├── src/
│   ├── app/
│   │   ├── globals.css          # République Moderne design tokens + utilities
│   │   ├── layout.tsx           # Root layout with fonts, metadata, Header/Footer
│   │   ├── page.tsx             # Homepage (hero, stats, values, CTA)
│   │   ├── parcours/page.tsx    # Biography + timeline
│   │   ├── mandat/page.tsx      # Parliamentary record dashboard
│   │   ├── vision/page.tsx      # 15 strategic axes + priorities
│   │   ├── actualites/page.tsx  # News feed with filters
│   │   ├── galerie/page.tsx     # Bento photo grid + reels
│   │   ├── agenda/page.tsx      # Events calendar
│   │   ├── espace-presse/page.tsx # Press kit + downloads
│   │   └── contact/page.tsx     # Contact form + WhatsApp
│   ├── components/
│   │   ├── Header.tsx           # Scroll-aware nav with mobile drawer
│   │   ├── Footer.tsx           # 4-column footer with tricolour bar
│   │   ├── AnimatedCounter.tsx  # Viewport-triggered counter
│   │   └── AnimatedSection.tsx  # Staggered reveal wrapper
│   └── lib/
│       └── animations.ts        # Shared Framer Motion variants
├── package.json
├── next.config.ts
├── tailwind.config.ts
└── tsconfig.json
```

---

## 6. Pending Requirements

The following items require action before final content population:

| Priority   | Item                            | Action Required                                                                                              |
| ---------- | ------------------------------- | ------------------------------------------------------------------------------------------------------------ |
| **High**   | Real portrait images            | Replace placeholder gradients with actual photos (download to `/public` and use `next/image` with AVIF/WebP) |
| **High**   | Content verification            | Cabinet must confirm: birth date/place, educational degrees, pre-2017 career details                         |
| **High**   | Political vehicle clarification | Confirm PRR/RGA sequence and official naming                                                                 |
| **Medium** | CMS integration                 | Connect Sanity or Payload CMS for news, events, and activity records (data-driven components ready)          |
| **Medium** | Custom domain                   | Configure `.gn`, `.org`, or `.com` domain in Vercel dashboard                                                |
| **Medium** | WhatsApp channels               | Set up official WhatsApp channels for press and citizen communication                                        |
| **Low**    | Analytics                       | Integrate Plausible Analytics (privacy-first, lightweight)                                                   |
| **Low**    | i18n                            | Add English language support via `next-intl` for diaspora audience                                           |
| **Low**    | Payment                         | Set up Orange Money / MTN MoMo for donations (Stripe unavailable in Guinea)                                  |
| **Low**    | Open Graph images               | Add dynamic OG images for social sharing on WhatsApp/Facebook                                                |

---

## 7. Deployment & Maintenance

### Current Deployment

- **URL:** [https://fofana-site.vercel.app](https://fofana-site.vercel.app)
- **Vercel Project:** `fofana-site` under `skonneh2020-6609s-projects`
- **Build Command:** `next build` (zero errors, ~18s build time)
- **All routes:** Statically generated (SSG) — no server runtime needed

### How to Redeploy

```bash
cd fofana-site
npm run build          # Verify zero errors
vercel --prod --yes    # Deploy to production
```

### Local Development

```bash
cd fofana-site
npm run dev            # Start dev server at http://localhost:3000
```

---

## 8. Original Design Reference Screens

The Stitch AI HTML mockups are preserved in the `stitch_site_officiel_ansoumane_fofana/` directory for visual reference:

| Directory                                        | Page                                 |
| ------------------------------------------------ | ------------------------------------ |
| `accueil_l_honorable_ansoumane_fofana/`          | Homepage (static)                    |
| `accueil_l_honorable_ansoumane_fofana_animated/` | Homepage (animated reference)        |
| `accueil_mobile_l_honorable_ansoumane_fofana/`   | Mobile homepage                      |
| `parcours_l_honorable_ansoumane_fofana/`         | Biography/Timeline                   |
| `mandat_l_honorable_ansoumane_fofana/`           | Parliamentary mandate                |
| `vision_l_honorable_ansoumane_fofana/`           | Vision/Policy                        |
| `actualit_s_l_honorable_ansoumane_fofana/`       | News feed                            |
| `galerie_l_honorable_ansoumane_fofana/`          | Photo gallery                        |
| `agenda_l_honorable_ansoumane_fofana/`           | Events/Agenda                        |
| `espace_presse_l_honorable_ansoumane_fofana/`    | Press kit                            |
| `contact_l_honorable_ansoumane_fofana/`          | Contact                              |
| `r_publique_moderne/DESIGN.md`                   | Complete design system specification |

---

_Originally designed by Stitch AI Design Assistant. Built and deployed by Qoder AI._
_Last updated: August 25, 2026_
