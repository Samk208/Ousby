---
name: République Moderne
colors:
  surface: '#f6faf7'
  surface-dim: '#d7dbd8'
  surface-bright: '#f6faf7'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f0f5f1'
  surface-container: '#eaefeb'
  surface-container-high: '#e5e9e6'
  surface-container-highest: '#dfe4e0'
  on-surface: '#181d1b'
  on-surface-variant: '#3e4941'
  inverse-surface: '#2c312f'
  inverse-on-surface: '#edf2ee'
  outline: '#6e7a71'
  outline-variant: '#becabf'
  surface-tint: '#006d42'
  primary: '#005f39'
  on-primary: '#ffffff'
  primary-container: '#087a4b'
  on-primary-container: '#a4ffc7'
  inverse-primary: '#7adaa2'
  secondary: '#785a00'
  on-secondary: '#ffffff'
  secondary-container: '#fcc748'
  on-secondary-container: '#705300'
  tertiary: '#a01e23'
  on-tertiary: '#ffffff'
  tertiary-container: '#c23738'
  on-tertiary-container: '#ffe6e4'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#96f6bc'
  primary-fixed-dim: '#7adaa2'
  on-primary-fixed: '#002110'
  on-primary-fixed-variant: '#005230'
  secondary-fixed: '#ffdf9d'
  secondary-fixed-dim: '#f3bf40'
  on-secondary-fixed: '#251a00'
  on-secondary-fixed-variant: '#5b4300'
  tertiary-fixed: '#ffdad7'
  tertiary-fixed-dim: '#ffb3ae'
  on-tertiary-fixed: '#410004'
  on-tertiary-fixed-variant: '#8f0f19'
  background: '#f6faf7'
  on-background: '#181d1b'
  surface-variant: '#dfe4e0'
  deep-forest: '#075C3B'
  ivory-bg: '#FAF8F2'
  surface-white: '#FFFFFF'
  text-muted: '#626A66'
  border-elegant: '#DEE5DF'
typography:
  display-lg:
    fontFamily: Source Serif 4
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Source Serif 4
    fontSize: 36px
    fontWeight: '700'
    lineHeight: 42px
    letterSpacing: -0.01em
  headline-md:
    fontFamily: Source Serif 4
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-sm:
    fontFamily: Source Serif 4
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  body-lg:
    fontFamily: Hanken Grotesk
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Hanken Grotesk
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-caps:
    fontFamily: Hanken Grotesk
    fontSize: 12px
    fontWeight: '700'
    lineHeight: 16px
    letterSpacing: 0.05em
  stats-number:
    fontFamily: Hanken Grotesk
    fontSize: 40px
    fontWeight: '800'
    lineHeight: 40px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  margin-page: 2rem
  margin-mobile: 1.25rem
  gutter: 1.5rem
  section-gap: 5rem
  stack-sm: 0.5rem
  stack-md: 1rem
  stack-lg: 2rem
---

## Brand & Style

The design system embodies the persona of a "Generational Alternative"—a bridge between traditional Guinean institutional values and a forward-looking, disciplined, and methodical future. The aesthetic is **Modern Editorial**, blending the gravitas of a statesman with the accessibility of a digital-first public servant.

The visual direction prioritizes **Institutional Minimalism**. It avoids decorative excess in favor of structured clarity, using generous whitespace to signify transparency and openness. The tone is authoritative but approachable, utilizing a sophisticated color palette that feels rooted in national identity without being overtly partisan. High-performance constraints drive a "Static-First" philosophy, where elegance is achieved through impeccable typography and a rhythmic layout rather than heavy assets.

**Key Principles:**
- **Credibility over Flair:** Every element must feel intentional and permanent.
- **Radical Accessibility:** Optimized for legibility on mid-to-low-end devices and 3G connections.
- **National Unity:** A color story that subtly references the flag through a premium, muted lens.

## Colors

The palette is anchored in **Primary Green**, representing growth and national identity. To ensure an institutional feel, we utilize a **Deep Forest** green for footer areas and high-contrast accents, providing a sense of stability. 

**Warm Gold** is used sparingly as a "Highlight" color—reserved for key performance indicators, statistical data, or "Premium" signifiers such as official seals or call-outs. **Guinea Red** is an "Emergency" or "Action" accent, used strictly for critical updates or sparse visual punctuation to avoid a cluttered look.

**Surface Strategy:**
- **Background:** Use `ivory-bg` (#FAF8F2) for the page body to reduce eye strain and feel more "editorial" than pure white.
- **Surface:** Use `surface-white` (#FFFFFF) for cards and interactive containers to create subtle depth.
- **Contrast:** Maintain a minimum 7:1 contrast ratio for all body text against the ivory background to meet accessibility standards.

## Typography

The typographic system pairs the authoritative **Source Serif 4** with the modern, high-legibility **Hanken Grotesk**. This combination bridges the gap between traditional parliamentary records and modern digital transparency.

**Usage Guidelines:**
- **Serif for Narrative:** Use Source Serif 4 for all headlines, pull-quotes, and formal introductions. It conveys "Statesmanlike" gravity.
- **Sans-Serif for Utility:** Use Hanken Grotesk for body text, data tables, and navigation. It is chosen for its exceptional performance on Android Chrome and low-resolution screens.
- **Vertical Rhythm:** Maintain a strict baseline grid. Paragraphs should have a bottom margin of `1.5rem` to ensure the "Editorial" whitespace is preserved.
- **Mobile Scale:** For screens below 768px, switch to `display-lg-mobile` to prevent word-breaking and ensure LCP efficiency.

## Layout & Spacing

The layout follows a **Fixed-Fluid Hybrid** model. On desktop, the content is contained within a 1280px max-width to maintain line-length readability for long-form biographies and policy papers. On mobile, the grid transitions to a single-column layout with high-density information for "Electoral Scorecards."

**Layout Model:**
- **12-Column Desktop Grid:** Used for the "Record Hub" and policy filtering.
- **Vertical Rhythm:** A "Stack" system (`stack-sm`, `stack-md`, `stack-lg`) ensures consistent spacing between component internal elements.
- **Safe Margins:** A minimum 32px (2rem) gutter on desktop to keep the "Editorial" feel.
- **Performance Constraint:** Layout structures should use CSS Grid/Flexbox natively to avoid heavy JS-based layout calculations.

## Elevation & Depth

To align with the "3G Budget" and institutional tone, this system rejects heavy shadows and blurs. Depth is achieved through **Tonal Layering** and **Low-Contrast Outlines**.

- **Surface Levels:** The primary background is the Ivory tone. Cards and interactive zones use Pure White with a 1px border in `border-elegant`.
- **Shadows:** Use a single, "Whisper" shadow for primary call-to-action cards: `0px 4px 12px rgba(32, 37, 35, 0.05)`.
- **Interactive Depth:** On hover, a card should not lift; instead, its border-color should shift from `border-elegant` to `primary-green`.
- **Statesmanlike Flatness:** Avoid glassmorphism or gradients. Professionalism is conveyed through flat, solid color blocks and precise alignment.

## Shapes

The shape language is **Soft-Institutional**. We use a base radius of 8px (0.5rem) to humanize the interface without appearing overly "techy" or informal. 

- **Primary Elements:** Buttons, input fields, and small cards use the base `rounded` (8px).
- **Secondary Elements:** Large image containers and policy cards use `rounded-lg` (16px).
- **Contextual Exceptions:** Statistical badges and WhatsApp sharing triggers use a fully rounded (Pill) shape to distinguish them as high-priority interactive utilities.

## Components

**Buttons & Actions**
- **Primary:** Solid `primary-green` with White text. Rounded (8px). 
- **Secondary:** Transparent background with `border-elegant` and `primary-green` text.
- **WhatsApp Share:** High-visibility green (System WhatsApp Green) pill-shaped buttons with a trailing icon. These must be thumb-friendly (min 48px height).

**Cards: The "Record Hub"**
- Use white surfaces against the ivory background. 
- Header: `label-caps` in `text-muted`.
- Title: `headline-sm` in `primary-green`.
- Footer: Metadata (Date, Category) separated by a 1px vertical `border-elegant`.

**Input Fields**
- 1px `border-elegant` with `ivory-bg`. Focus state shifts border to `primary-green` and adds a subtle 2px inset highlight.

**Policy Stats**
- Large `stats-number` in `secondary-gold`. 
- Accompanied by a `label-caps` description to ensure "at-a-glance" credibility for parliamentary data.

**Lists & Navigation**
- Use clean, simple dividers (#DEE5DF) between list items. 
- Mobile navigation must be a simple slide-out or full-screen overlay to keep the JS footprint under 150KB.