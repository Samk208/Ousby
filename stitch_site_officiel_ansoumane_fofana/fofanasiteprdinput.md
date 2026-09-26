# PRD Input Brief — Personal Website for Ansoumane "Ouzby" Fofana

**Prepared for:** hand-off to ChatGPT to draft a Product Requirements Document **Project:** Official personal website for a sitting Guinean MP and party leader **Stack decision (fixed):** Next.js frontend deployed on Vercel **Language:** French only (v1)

> **How to use this document:** Everything in Part 1 is sourced from public web pages and the client's public Facebook profile, with sources listed at the end. Everything in Part 5 is an open question the client must answer before the PRD is finalised. Nothing in this brief should be published on the site until the client has personally confirmed it — biographical detail about a public official has to come from him, not from search results.

---

## PART 1 — WHO THE CLIENT IS

### 1.1 Identity

| Field | Value |
| :---- | :---- |
| Full name | Ansoumane Fofana |
| Known as | "Ouzby" — widely used publicly (Ansoumane Ouzby Fofana) |
| Formal style | L'Honorable Ansoumane FOFANA |
| Current office | Député national, Assemblée nationale de Guinée (5ᵉ République) |
| Party role | Fondateur et Président, RGA — Rassemblement des Guinéens pour l'Alternance |
| Business role | Président du conseil d'administration / Directeur général, Build Transap Guinée (since 10 Oct 2017\) |
| Based | Conakry, Guinea (also from Conakry) |
| Personal status | Married (per public Facebook profile) |
| Facebook | facebook.com/ouzby.fofana — \~10K followers, \~3K following, category "Politician" |
| Facebook bio line | *« Je suis déterminé pour une Guinée rassemblée et prospère »* |

### 1.2 Political track record (verified public timeline)

- **20 Oct 2010** — Founds the RGA (Rassemblement des Guinéens pour l'Alternance). Official registration: A/2010/3855/MATAP/CAB/DNLPAJR/10. HQ: Kaloum, Conakry.  
- **2020–2024** — Publicly active and quoted as **Président du PRR (Parti Républicain pour le Renouveau)**. ⚠️ The relationship between PRR and RGA (merger? rename? two vehicles? sequence?) is **not clear from public sources and must be confirmed by the client** — see §5.  
- **Sept 2021** — Public op-ed criticising the fragmentation of Guinea's opposition.  
- **Apr 2024** — Public appeal to "the new political generation" for national consciousness above ethnic and partisan division.  
- **Mar 2026** — Re-elected head of the RGA at the party's national congress.  
- **16 Apr 2026** — RGA candidacy provisionally validated by the DGE for the legislative and communal elections.  
- **May 2026** — National campaign tour; mobilisation rallies in Conakry and N'Zérékoré/Koulé; public call for restraint after tensions inside the FRONDEG coalition.  
- **31 May 2026** — Legislative and communal elections.  
- **5 Jun 2026** — Provisional results: elected **député national on the national list with 70,738 votes**.  
- **20 Jun 2026** — Final results validated by the **Cour suprême**.  
- **18 Jul 2026** — Delivers his declaration at the **inaugural session of the 5ᵉ République**.  
- **26 Jul 2026** — Chairs an extraordinary meeting of the RGA's Bureau Politique National.  
- **29 Jul 2026** — Honoured by Groupe Uni-Art et Culture for his advocacy for people with albinism.

### 1.3 The 2026 electoral scorecard (already used as hero stats on the party site)

| Metric | Value |
| :---- | :---- |
| Seats in the Assemblée nationale | **1** (his own) |
| Personal vote (national list) | **70,738** |
| Conseillers communaux elected | **27** — Beyla 12, Niansomoridou 6, Tombolia 5, N'Zérékoré 4 |
| Prefectures covered | **33+** |
| Party founded | **2010** |

### 1.4 Platform and message

**Party slogan:** *« Servir le peuple, construire la nation »* (since 2010\) **Vision statement:** *« Une Guinée unie, juste et prospère »* **Three core values:** **Vérité · Loyauté · Paix**

- *Vérité* — transparent governance grounded in facts, dialogue and respect for citizens  
- *Loyauté* — unwavering commitment to the nation and its democratic institutions  
- *Paix* — dialogue, social cohesion, national reconciliation

**Programme:** a 7-year reform framework (2025–2030) organised into **15 strategic axes**, of which 6 are flagged high priority. A 23-page policy PDF already exists and is downloadable from the party site.

*High priority:* Governance & rule of law · Diplomacy, diaspora & regional integration · Education, training & youth employment · Economy & economic sovereignty · Health, social protection & water · Security, defence & civil protection · Infrastructure, transport & energy *Medium:* Public finances & budget justice · Agriculture & industrialisation · Human rights & communities · Equality, gender & inclusion *Standard:* Mining, taxation & local content · Culture, citizenship & sport · Housing & urbanism · Environment, climate & sustainable development

### 1.5 Voice — usable verbatim quotes (French, as published)

> « Gouverner avec méthode, justice, discipline, humanité et courage. Gouverner pour servir, non pour se servir. »  
>   
> « La Guinée ne manque pas de richesses, elle manque d'un État fort dans ses principes, juste dans ses décisions et proche de ses citoyens. »  
>   
> « Le changement politique que nous cherchons ne viendra pas de l'extérieur, il viendra de nous, le peuple guinéen aspirant à une gouvernance transparente, des institutions fortes et l'égalité des chances pour tous. »  
>   
> « Cette victoire est celle de tous les Guinéens engagés pour l'alternance. »  
>   
> « La Guinée mérite une Assemblée exemplaire. »

**Tone characteristics to carry into the copy:** formal, republican, unifying, deliberately anti-ethnic and anti-factional; positions himself as the *generational* alternative rather than a factional one (his 2020 line was that Guinea needed "alternance générationnelle" more than a specific political alternance); emphasises institutions, method and discipline over personality; frequently expresses solidarity in moments of national tragedy (e.g. his public message on the Dar-Es-Salam landfill disaster in Conakry).

### 1.6 Existing digital footprint

| Property | Status | Implication |
| :---- | :---- | :---- |
| **rga-guinee.org** | Live, reasonably complete party site — sections: Le Parti, Le Président, Programme, Élections 2026, Actualités, Rejoindre le RGA, Contact. Publishes news, communiqués, parliamentary activity, federations, allies, candidates. | **The new site must not duplicate this.** It is the party's institutional voice; the new site is *the man's* voice. Cross-link, don't clone. |
| **Facebook (facebook.com/ouzby.fofana)** | His most active channel. \~10K followers. Heavy **Reels** use — recent clips at 1.2K–11K views. Posts in French with auto-translation. | Facebook is where his audience already lives. The site should syndicate *from* it, and every page should be built to look good when shared back *into* it (OG images). Reels embedding is a real requirement, not a nice-to-have. |
| Personal domain | None found | Needs to be acquired — see §5. |
| X / LinkedIn / YouTube / TikTok | Not found in public search | Confirm with client. |

### 1.7 Party contact details (public)

Kaloum, Conakry · \+224 627 249 666 · \+224 628 440 873 · [contact@rga-guinee.org](mailto:contact@rga-guinee.org)

---

## PART 2 — WHAT THE SITE IS FOR

The client has confirmed **four** primary objectives, all of equal weight. The PRD should treat these as the four pillars the information architecture must serve.

**1\. Credibility / official reference** The authoritative destination when a journalist, embassy, institution, NGO or potential partner searches his name. Must outrank scattered news articles and the Facebook profile for "Ansoumane Fofana" and "Ouzby Fofana". Requires: a real biography, official portraits, a press kit, an accurate record, and clean structured data.

**2\. Mobilisation and membership** Convert visitors into supporters — RGA membership, volunteer sign-up, newsletter, and (critically for this market) WhatsApp groups. Should feed the party's existing "Rejoindre le RGA" funnel rather than compete with it.

**3\. Publishing his record** A living archive he and his team update constantly: parliamentary interventions, votes, written questions, communiqués, positions on national issues, field visits, events. This is the content engine of the site and the reason a CMS is non-negotiable.

**4\. Diaspora and fundraising** Reach Guineans abroad (France, US, Belgium, Senegal, Côte d'Ivoire) and enable contributions. ⚠️ Political fundraising is legally sensitive — see §4.4 and §5.

---

## PART 3 — AUDIENCES

| \# | Audience | What they came for | Design consequence |
| :---- | :---- | :---- | :---- |
| 1 | **Guinean voters & supporters (domestic)** | What he's actually doing, where he'll be, how to join | Mobile-first, very low bandwidth, WhatsApp-native sharing |
| 2 | **Journalists & media** | Verified bio, quotable positions, portraits, contact | Dedicated press kit page with downloadable assets |
| 3 | **The diaspora** | Connection, credibility, a way to contribute | Faster international loads, contribution path, events |
| 4 | **Institutions, diplomats, NGOs, investors** | Is he serious? What does he stand for? | Formal presentation, downloadable programme PDF |
| 5 | **Political opponents & fact-checkers** | Inconsistencies | Every claim sourced and dated; no puffery |

---

## PART 4 — PRODUCT REQUIREMENTS TO SPEC

### 4.1 Proposed information architecture

/                        Accueil — identity, current office, headline record, latest 3 posts, CTA

/biographie              Parcours — full life and career narrative \+ timeline component

/mandat                  Le mandat de député — his parliamentary work (the "record" hub)

  /mandat/interventions  Interventions, votes, questions écrites (filterable, dated)

  /mandat/circonscription What he's doing on the ground

/vision                  His convictions — the 15 axes retold in HIS voice, \+ programme PDF

/actualites              News feed (CMS-driven)

  /actualites/\[slug\]     Article

/communiques             Official statements (distinct from news; formal, dated, PDF-downloadable)

/galerie                 Photos \+ Facebook Reels

/agenda                  Upcoming events and field visits

/rejoindre               Membership / volunteer / newsletter — feeds RGA funnel

/soutenir                Contributions (gated on §4.4 legal check)

/presse                  Press kit: bio in 3 lengths, portraits, logos, quotes, contact

/contact                 Contact form \+ office details \+ WhatsApp

/mentions-legales        Legal notice, privacy, political financing disclosure

### 4.2 Non-negotiable functional requirements

- **CMS-driven content.** His team must publish news, communiqués and events without a developer. This is the single biggest determinant of whether the site stays alive after launch.  
- **Reels & Facebook embedding** on the gallery and homepage.  
- **WhatsApp click-to-chat** and WhatsApp share buttons throughout — this is the dominant channel in Guinea, more important than X or LinkedIn sharing.  
- **Newsletter \+ SMS/WhatsApp list capture** with a real double-opt-in.  
- **Downloadable press kit** (portraits at multiple resolutions, bio at 50/200/500 words, party logo, the 23-page programme PDF).  
- **Structured data** — `Person` \+ `PoliticalParty` schema.org markup, so search engines and AI assistants render him correctly in knowledge panels. Directly serves objective \#1.  
- **Search and filter** on the record archive (by date, by theme, by type).  
- **Open Graph images generated per page** (`next/og`) — because nearly all traffic will arrive from a Facebook or WhatsApp share.

### 4.3 Performance requirements — the constraint that should shape the build

Guinean mobile internet is expensive, intermittent and mostly 3G/4G on low-end Android. This should be written into the PRD as a hard budget, not an aspiration:

- Largest Contentful Paint **under 2.5s on simulated 3G**, not on office fibre.  
- **JavaScript budget under 150KB** on the initial route. Favour React Server Components; avoid heavy client-side animation libraries.  
- Images: `next/image`, AVIF/WebP, aggressive `sizes`, never ship a 2MB rally photo.  
- Static generation \+ ISR for everything except forms — Vercel serves from CDN edge, but note **Vercel has no African edge region**; the nearest are European. Static caching is therefore doing the heavy lifting for Conakry visitors.  
- Design must degrade gracefully: no reliance on custom web fonts loading, no layout that breaks without JS.

### 4.4 Payments — a real constraint worth flagging early

Stripe and most Western payment processors **do not operate in Guinea**. The dominant rails are **Orange Money and MTN MoMo**. Any "soutenir" feature must be spec'd around mobile money aggregators (or a diaspora-only card path via an international processor), not assumed to be a Stripe integration. Additionally, political financing in Guinea is regulated — the PRD should require a legal review before this feature is built, and should include a disclosure section in the legal notice regardless.

### 4.5 Suggested technical shape (for the PRD's technical section)

- **Next.js (App Router)** on **Vercel**, TypeScript, Tailwind.  
- **CMS:** Sanity or Payload — both have strong Next.js integration and a French-localisable editor UI. Payload if self-hosting matters for data sovereignty; Sanity if speed of setup matters more.  
- **Forms:** Next.js route handlers → Resend for transactional email; submissions persisted to Supabase or Airtable so the team can work the list.  
- **Analytics:** Vercel Analytics \+ Plausible (lightweight, no cookie banner burden).  
- **i18n:** French only in v1, but structure routes with `next-intl` from day one so English can be added for the diaspora without a rebuild.  
- **Security:** rate-limited forms, hCaptcha or Turnstile — a political site attracts spam and abuse.  
- **Editorial workflow:** draft → review → publish, with at least two roles, because a mis-published statement from an MP is a political incident.

---

## PART 5 — WHAT THE CLIENT MUST ANSWER BEFORE THE PRD IS FINAL

These are genuine gaps. Public sources do not cover them, and guessing at any of them would be a mistake on an official site for a sitting MP.

**Biography (all missing from public sources):**

1. Date and place of birth.  
2. Education — schools, universities, degrees, dates.  
3. Career before 2017 — what he did before Build Transap Guinée.  
4. What Build Transap Guinée actually does (sector, size, whether it should even be mentioned on a political site — there are conflict-of-interest optics to weigh).  
5. **The PRR ↔ RGA question.** He was publicly "Président du PRR" as recently as 2024 and "Fondateur/Président du RGA" since 2010\. Merger, rename, coalition, or two parallel vehicles? The official biography has to state this cleanly, because opponents will probe it.  
6. Family details he is willing to have published (public profile says married; nothing more should be assumed).  
7. Constituency / region he considers his political base beyond the national list.

**Project decisions:** 8\. Domain name — and whether he wants `.org`, `.gn`, or `.com`. 9\. Who on his team will actually update the site, and how technical are they? This decides the CMS. 10\. Does he want donations at all, given the legal exposure? (See §4.4.) 11\. Relationship to rga-guinee.org — who owns it, who built it, and is there any appetite to consolidate later? 12\. Existing brand assets — logo, colour palette, official portrait photography, typography. 13\. Other social accounts to link (X, LinkedIn, YouTube, TikTok, Instagram). 14\. Budget and launch date — is there a political moment this needs to land before? 15\. Sign-off process for published content.

---

## PART 6 — SOURCES

All facts above are traceable to these public pages. The PRD should note that biographical detail is **unverified by the client** until §5 is answered.

- RGA official site — homepage, Le Parti, Le Président, Programme, Actualités: [https://rga-guinee.org/](https://rga-guinee.org/)  
- Facebook profile (public): [https://www.facebook.com/ouzby.fofana](https://www.facebook.com/ouzby.fofana)  
- RGA congress / re-election as party head: [https://www.avenirguinee.org/2026/03/14/rga-congres-national-ansoumane-fofana-elections-2026/](https://www.avenirguinee.org/2026/03/14/rga-congres-national-ansoumane-fofana-elections-2026/)  
- Elected deputies on the national list (70,738 votes): [https://kalenews.org/elections-legislatives-voici-la-liste-des-deputes-elus-sur-la-liste-nationale/](https://kalenews.org/elections-legislatives-voici-la-liste-des-deputes-elus-sur-la-liste-nationale/)  
- Victory statement: [https://www.lerenifleur224.com/2026/06/05/ansoumane-fofana-cette-victoire-est-celle-de-tous-les-guineens-engages-pour-lalternance/](https://www.lerenifleur224.com/2026/06/05/ansoumane-fofana-cette-victoire-est-celle-de-tous-les-guineens-engages-pour-lalternance/)  
- Final results validated: [https://www.lerenifleur224.com/2026/06/20/apres-la-validation-des-resultats-definitifs-ansoumane-fofana-remercie-ses-electeurs-et-ses-allies/](https://www.lerenifleur224.com/2026/06/20/apres-la-validation-des-resultats-definitifs-ansoumane-fofana-remercie-ses-electeurs-et-ses-allies/)  
- "La Guinée mérite une Assemblée exemplaire": [https://www.lerenifleur224.com/2026/02/26/ansoumane-fofana-rga-la-guinee-merite-une-assemblee-exemplaire/](https://www.lerenifleur224.com/2026/02/26/ansoumane-fofana-rga-la-guinee-merite-une-assemblee-exemplaire/)  
- RGA structures its elected officials: [https://mediaguinee.com/2026/07/le-rga-dansoumane-fofana-renforce-ses-structures-et-met-ses-elus-face-a-leurs-responsabilites](https://mediaguinee.com/2026/07/le-rga-dansoumane-fofana-renforce-ses-structures-et-met-ses-elus-face-a-leurs-responsabilites)  
- Appeal to the new political generation (2024, as PRR president): [https://kalenews.org/jinterpelle-la-nouvelle-generation-politique-pour-une-prise-de-conscience-ansoumane-fofana-ouzby/](https://kalenews.org/jinterpelle-la-nouvelle-generation-politique-pour-une-prise-de-conscience-ansoumane-fofana-ouzby/)  
- 2021 op-ed on the opposition: [https://lepointguinee.com/2021/09/02/les-aneries-commencent-a-apparaitre-au-sein-de-cette-desastreuse-opposition-politique-livree-a-elle-meme-sans-vergogne-ansoumane-ouzby-fofana-president-du-prr/](https://lepointguinee.com/2021/09/02/les-aneries-commencent-a-apparaitre-au-sein-de-cette-desastreuse-opposition-politique-livree-a-elle-meme-sans-vergogne-ansoumane-ouzby-fofana-president-du-prr/)  
- 2020 "alternance générationnelle" position: [https://www.accentguinee.com/presidentielle-2020-la-guinee-nest-pas-dans-une-necessite-urgente-dalternance-politique-specifique-mais-dalternance-generationnelle-soutient-le-president-du-prr/](https://www.accentguinee.com/presidentielle-2020-la-guinee-nest-pas-dans-une-necessite-urgente-dalternance-politique-specifique-mais-dalternance-generationnelle-soutient-le-president-du-prr/)  
- Cour suprême confirms final legislative results: [https://www.guinee7.com/2026/06/20/cour-supreme-resultats-definitifs-legislatives-2026-guinee/](https://www.guinee7.com/2026/06/20/cour-supreme-resultats-definitifs-legislatives-2026-guinee/)

---

## PART 7 — SUGGESTED PROMPT FOR CHATGPT

> You are a senior product manager. Using the attached brief, write a complete Product Requirements Document for the official personal website of Ansoumane "Ouzby" Fofana, a sitting member of Guinea's National Assembly and founder-president of the RGA party.  
>   
> The PRD must include: problem statement and objectives with measurable success metrics; personas for each of the five audiences; full information architecture with page-by-page content requirements; functional requirements written as user stories with acceptance criteria; non-functional requirements including the 3G performance budget; a technical architecture section for Next.js on Vercel with a CMS; a content model; an analytics and measurement plan; a phased release plan (MVP → v1 → v2); risks and mitigations; and an explicit open-questions section carrying forward the gaps listed in Part 5\.  
>   
> Write in English. Site copy will be in French — call out where French copy is needed rather than writing it. Do not invent biographical facts that the brief marks as unknown; carry them into the open-questions section instead.  
