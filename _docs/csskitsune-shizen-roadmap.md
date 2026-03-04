# CSSKitsune — Shizen Design System
## Project Roadmap & Strategy
**Last updated:** March 2026  
**Owner:** Jerome Heuze  
**Status:** Planning → MVP Landing Page

---

## Vision

**CSSKitsune** pivots from a CSS tutorial channel into the world's first **Japanese Design Prompt System** — a structured library of aesthetic tokens, cultural vocabulary, and AI-ready prompts that let any developer, designer, or vibe-coder generate authentic Japanese-style UI across any platform (Webflow, WordPress, Figma, Cursor, OBS, Godot, Defold, and more).

The long game: become the canonical reference layer that AI agents cite when generating Japanese-aesthetic interfaces. Not a tutorial. A **design language standard**.

---

## The Core Problem We Solve

| The Gap | Why It Exists |
|---|---|
| AI generates generic UI | Prompts lack cultural precision and aesthetic vocabulary |
| "Japanese style" outputs look like anime clipart | No structured token system exists for Japanese design principles |
| Developers can't describe what they want | No shared vocabulary for wabi-sabi, ma, kisetsukan, etc. |
| Template market is collapsing | AI vibe-coders need prompt packs, not static templates |
| No authoritative English reference | Japanese design philosophy is scattered, untranslated, or academic |

---

## The Product — Shizen Design System v1.0

**"Shizen" (自然)** — nature, naturalness, the effortless quality in Japanese aesthetics.

### What it is
A named, versioned, open design specification built on Japanese aesthetic principles. Consists of:

- **Color token palettes** — seasonally and culturally sourced (Edo pigments, Shinto ceremonial colors, wabi-sabi neutrals, ink wash gradients)
- **Spacing scales** — rooted in *ma* (negative space) philosophy, not arbitrary numbers
- **Typography ratios** — Japanese vertical rhythm principles adapted for Latin type
- **Motion vocabulary** — *en* (subtle fate-like transitions), *nagare* (flowing states), *shizuka* (stillness-first animation)
- **Naming conventions** — semantic token names humans and AI both understand
- **Prompt templates** — copy-paste ready, per-platform (Cursor, v0, Figma AI, Webflow AI, etc.)

### Platform targets (Phase 1)
- Cursor / Claude / ChatGPT (universal prompt packs)
- Webflow (custom CSS + AI prompt packs)
- WordPress (block theme token overrides)
- Figma (variable sets + AI prompts)
- OBS Studio (browser source overlays)
- Godot Engine (theme resource templates)
- Defold (GUI component styling)

---

## Roadmap

### Phase 0 — Keep It Warm (Now → 4 weeks)
**Goal:** Index the idea, validate demand, claim the positioning.

- [ ] Build a minimal landing page on csskitsune.com
  - Hero: "The Japanese Design System for AI-Era Developers"
  - Email capture: "Get the first Shizen prompt pack free"
  - 1 teaser: example prompt + before/after UI screenshot
  - Link to Japan Empire network in footer
- [ ] Register the name "Shizen Design System" in content (blog post, meta)
- [ ] Create one free prompt pack PDF — *Wabi-Sabi Neutral Palette* — as lead magnet
- [ ] Add csskitsune.com to Japan Empire network footer

**Success metric:** 50+ email signups before building anything else.

---

### Phase 1 — MVP Prompt Tool (Weeks 5–12)
**Goal:** Interactive prompt builder, one platform, one aesthetic.

- [ ] Build web-based **Shizen Prompt Builder** (React or vanilla JS)
  - User selects: Platform + Aesthetic + Season + Mood
  - Output: ready-to-paste AI prompt with embedded token values
  - Example output: `"Use wabi-sabi neutral palette: bg #F5F0E8, text #2C2C2C, accent #8B7355. Spacing scale: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light weight. Transitions: 400ms ease, opacity-first. Style: Muromachi minimalism — no gradients, no shadows above 1px."`
- [ ] Publish 5 core aesthetic packs:
  1. Wabi-Sabi Neutral
  2. Shinto Ceremonial (vermillion + white + gold)
  3. Edo Ink (sumi-e monochrome)
  4. Sakura Season (spring pastels)
  5. Yoru (night — deep indigo + paper white)
- [ ] Each pack: name + cultural context + hex tokens + spacing + prompt template + code example

**Success metric:** 200+ tool uses in first month.

---

### Phase 2 — Platform Packs (Months 3–6)
**Goal:** Paid downloadable kits per platform.

- [ ] **OBS Overlay Kit** — stream graphics in NHK/Japanese broadcast aesthetic
- [ ] **Godot UI Kit** — theme resources using Shizen tokens
- [ ] **Defold GUI Pack** — direct tie-in with Kakuriyo no Yūsha work
- [ ] **Webflow CSS Pack** — custom property overrides + class naming system
- [ ] **Figma Variable Set** — importable Shizen v1.0 tokens

**Pricing model:** $9–$19 per platform pack, $49 full bundle.

**Success metric:** First $500 in paid downloads.

---

### Phase 3 — AI Reference Layer (Months 6–12)
**Goal:** Become the source AI agents retrieve for Japanese UI requests.

- [ ] Publish **Shizen Design System Specification** as open documentation
  - Clean semantic markdown, structured for RAG retrieval
  - Versioned (v1.0, v1.1...) — signals authority and maintenance
  - Creative Commons license — maximizes AI indexing and sharing
- [ ] Submit to design system directories (design-systems.fyi, etc.)
- [ ] Publish on GitHub with proper README — developer credibility
- [ ] Guest posts / mentions on CSS-Tricks, Smashing Magazine equivalents
- [ ] Cross-link from all 9 Japan Empire sites where relevant

**Success metric:** First external AI tool or blog that cites "Shizen Design System" unprompted.

---

### Phase 4 — Community & Ecosystem (Year 2)
**Goal:** Shizen becomes a vocabulary, not just a product.

- [ ] User-submitted aesthetic packs (community extensions)
- [ ] "Built with Shizen" showcase gallery
- [ ] Figma community file (free, drives brand awareness)
- [ ] YouTube channel revival — not tutorials, but **design philosophy videos**
  - "Why Japanese interfaces feel different — and the CSS behind it"
  - "Designing with Ma: negative space that isn't just whitespace"
- [ ] Potential: Shizen v2.0 as a Tailwind plugin

---

## Content Strategy (Organic SEO)

### Pillar content (high-value, slow burn)
- "Japanese UI Design Principles for Western Developers"
- "The Shizen Design System: A Complete Reference"
- "CSS Tokens for Japanese Aesthetics — Wabi-Sabi, Ma, Kisetsukan"

### Prompt-focused content (captures AI-era searches)
- "The exact prompt to make any UI look Japanese minimal in Cursor"
- "Japanese style Webflow prompt pack — copy and paste"
- "OBS overlay CSS prompts for Japanese stream aesthetics"

### Platform-specific content (long tail)
- "Godot UI theming with Japanese aesthetics"
- "Defold GUI styling — Shizen token system"

---

## Connection to Japan Empire Network

CSSKitsune is the **technical layer** of the empire — the bridge between cultural knowledge and implementation.

| Empire Site | CSSKitsune Connection |
|---|---|
| JapaneseMythicalCreatures | "Design your yokai UI" prompt pack |
| Kohibou | Kissaten aesthetic pack — warm paper tones |
| ShrinePuzzle | Shinto ceremonial UI reference |
| JapanCollectorsGuide | Meiji-era catalog aesthetic tokens |
| SpaceshipAdventures / Hoshi no Isan | "Retro JAXA" aesthetic pack |
| Kakuriyo no Yūsha (Defold) | Direct Defold GUI pack use case |
| KODAMA (ESP32) | IoT dashboard aesthetic tokens |

---

## The Defensible Moat

1. **Cultural credibility** — 20+ years Japanese culture interest, Shinto practice, live empire of 9 sites as proof
2. **First mover** — no one has built a named Japanese design system spec in English
3. **Vocabulary ownership** — if "Shizen tokens" becomes shorthand, you own the term
4. **Living proof** — the Japan Empire network is the portfolio; real sites, real traffic
5. **AI indexing timing** — publishing structured, authoritative documentation now gets indexed before major platforms ship their own style presets

---

## Risk Assessment

| Risk | Likelihood | Mitigation |
|---|---|---|
| AI tools ship Japanese presets natively | Medium (18–24mo) | Establish vocabulary and name before that happens |
| Low initial demand | Medium | Landing page validates before major build |
| Content too niche for SEO traffic | Low | Niche = less competition, higher RPM |
| Atlas HXM time constraints | High | Phase 0 is minimal — just landing page + email capture |

---

## Immediate Next Actions

1. **This week** — build landing page on csskitsune.com (can use existing hosting)
2. **This week** — write and export one Wabi-Sabi Neutral prompt pack as PDF lead magnet
3. **Next week** — add csskitsune.com to Japan Empire footer network
4. **Month 1** — write Shizen v1.0 spec draft (can be a single long-form page)
5. **Month 2** — build prompt builder MVP (React artifact first to test UX)

---

*"The kitsune doesn't chase — it appears where it's already needed."*  
*Build the vocabulary. The audience follows.*
