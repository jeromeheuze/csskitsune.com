# CURSOR SPEC — CSSKitsune Kitsune Theme Page + Yokai Cross-Link Network
**File:** `CURSOR-KITSUNE-PAGE.md`  
**Project:** CSSKitsune.com (Shizen Design System)  
**Stack:** Plain PHP · Vanilla JS / Alpine.js CDN · CSS custom properties  
**Target keywords:** `kitsune web` · `kitsune website` · `kitsune maker`  
**Cross-link target:** JapaneseMythicalCreatures.com (yokai pages)

---

## Part 1 — Kitsune Landing Page (`/kitsune` or `/kitsune.php`)

---

### Objective

A standalone SEO page that:
1. Ranks for `kitsune web`, `kitsune website`, `kitsune maker`
2. Showcases the Shizen Kitsune aesthetic pack
3. Includes an interactive **Kitsune Theme Maker** (live CSS variable generator)
4. Cross-links to the JMC kitsune yokai page and the broader yokai theme network

---

### File Structure

```
/kitsune/
  index.php          ← main page
  /yokai/
    index.php        ← yokai theme hub (see Part 2)
    kitsune.php      ← (same as /kitsune/ or redirect)
    tengu.php
    oni.php
    tanuki.php
    ... (20 total)
```

---

### `/kitsune/index.php` — Page Structure

#### PHP Head

```php
<?php
$meta = [
    'title'       => 'Kitsune Web — CSS Theme Maker & Kitsune Design System | CSSKitsune',
    'description' => 'Build beautiful kitsune-themed websites with the Kitsune Web Design System. Use our free kitsune theme maker to generate CSS variables inspired by Japanese fox spirit aesthetics.',
    'canonical'   => 'https://csskitsune.com/kitsune/',
];

$swatches = [
    ['name' => 'Kitsune Ember',   'hex' => '#C9521A', 'var' => '--kitsune-ember'],
    ['name' => 'Twilight Indigo', 'hex' => '#2D2B55', 'var' => '--kitsune-indigo'],
    ['name' => 'Fox Cream',       'hex' => '#F5ECD7', 'var' => '--kitsune-cream'],
    ['name' => 'Sacred Gold',     'hex' => '#D4A827', 'var' => '--kitsune-gold'],
    ['name' => 'Forest Shadow',   'hex' => '#1A2C1E', 'var' => '--kitsune-forest'],
    ['name' => 'Moonlit Mist',    'hex' => '#E8E4F0', 'var' => '--kitsune-mist'],
];
?>
```

---

#### Section 1 — Hero

Dark background (`#0F0D1A`). Full viewport height.

**Visual:** Inline SVG kitsune silhouette — stylized fox head profile with 3–5 fanned bezier-curve tails, fill `#C9521A` at 90%, ember glow via `filter: drop-shadow(0 0 40px rgba(201,82,26,0.6))`. Torii gate SVG in background at 10% opacity. 30–40 CSS star particles with randomised `animation-delay`.

**H1:**
```
Kitsune Web
The Design System for Japanese Fox Aesthetics
```
Include kanji: `狐` styled large in Noto Serif JP above or beside headline.

**Subheadline:**
```
Build atmospheric, Japan-inspired websites with Shizen's Kitsune theme pack —
CSS variables, utility classes, and a free Kitsune Theme Maker.
```

**CTAs:**
- Primary: `Try the Theme Maker ↓` (smooth scroll to `#theme-maker`)
- Secondary: `Explore Yokai Themes →` (links to `/yokai/`)

**Fonts (Google Fonts CDN):**
```html
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
```

---

#### Section 2 — What Is a Kitsune Website? (SEO prose)

Two-column layout. Left: rotated Japanese ornament text (CSS only). Right: body copy.

**H2:** `What Makes a Kitsune Website?`

**Copy (write verbatim into template):**

> In Japanese mythology, the kitsune is a fox spirit of intelligence, beauty, and transformation — a being that exists between worlds. A kitsune website carries that same duality: elegant and wild, ancient and modern, warm and mysterious.
>
> The Shizen Kitsune theme translates this spirit into CSS design tokens: ember oranges, twilight indigoes, sacred gold accents, and deep forest shadows — all calibrated for WCAG-accessible contrast on the web.

**Three icon+label feature cards (CSS grid, 3-col):**
- 🦊 `Fox Spirit Palette` — 6 hand-tuned color tokens
- 🎋 `Torii Typography` — Noto Serif JP + DM Sans pairing
- ✨ `Motion Pack` — entrance animations inspired by mist and ember

---

#### Section 3 — Kitsune Theme Maker (`id="theme-maker"`)

**Load Alpine.js via CDN:**
```html
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

**Alpine x-data object:**
```javascript
{
    colors: {
        primary:    '#C9521A',
        accent:     '#D4A827',
        background: '#0F0D1A',
        text:       '#F5ECD7',
    },
    presets: [
        { name: 'Ember Fox',      primary: '#C9521A', accent: '#D4A827', background: '#0F0D1A', text: '#F5ECD7' },
        { name: 'Moonlit Shrine', primary: '#8B6BB1', accent: '#C9A96E', background: '#F0EDE8', text: '#1A1A2E' },
        { name: 'Forest Inari',   primary: '#2D6A4F', accent: '#95C11F', background: '#1A2C1E', text: '#E8F5E9' },
        { name: 'Cherry Dusk',    primary: '#D64C82', accent: '#FFB347', background: '#1C0D1A', text: '#FCE4EC' },
    ],
    get cssOutput() {
        return `:root {\n  --kitsune-primary:    ${this.colors.primary};\n  --kitsune-accent:     ${this.colors.accent};\n  --kitsune-background: ${this.colors.background};\n  --kitsune-text:       ${this.colors.text};\n}`;
    },
    copied: false,
    applyPreset(p) { this.colors = { primary: p.primary, accent: p.accent, background: p.background, text: p.text }; },
    copyCSS() {
        navigator.clipboard.writeText(this.cssOutput);
        this.copied = true;
        setTimeout(() => this.copied = false, 2000);
    }
}
```

**Layout:** Two columns
- Left: 4 color pickers (labeled) + 4 preset buttons
- Right: Live preview card — fake mini-website updating via `x-bind:style`

**Copy output box:** monospace `<pre>` showing `cssOutput`, with "Copy CSS" button → flips to "Copied ✓" for 2s.

---

#### Section 4 — Yokai Theme Network (Cross-link block)

**H2:** `Explore Yokai Web Themes`

**Copy:**
> Each yokai in Japanese mythology has a distinct spirit — and a distinct visual language. Browse our full collection of yokai CSS themes, each with its own palette, typography recommendation, and link to the mythological lore.

**Grid of 6 featured yokai theme cards** (linking into `/yokai/` hub):
- Kitsune (active/highlighted)
- Tengu
- Oni
- Tanuki
- Yuki-onna
- Kappa

Each card: yokai name (JP + EN), color swatch strip (3 dots), short descriptor, link to `/yokai/{name}.php`.

**CTA:** `View All 20 Yokai Themes →` → `/yokai/`

---

#### Section 5 — SEO Footer Prose

Small, muted text. 3–4 sentences covering: what kitsune web design is, why fox spirit aesthetics work for Japanese-inspired sites, how developers use Shizen's kitsune theme pack.

---

### SEO Tags (in `<head>`)

```php
<title><?= $meta['title'] ?></title>
<meta name="description" content="<?= $meta['description'] ?>">
<link rel="canonical" href="<?= $meta['canonical'] ?>">
<meta property="og:title"       content="<?= $meta['title'] ?>">
<meta property="og:description" content="<?= $meta['description'] ?>">
<meta property="og:url"         content="<?= $meta['canonical'] ?>">
<meta property="og:type"        content="website">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Kitsune Web — CSS Theme Maker",
  "description": "<?= $meta['description'] ?>",
  "url": "<?= $meta['canonical'] ?>"
}
</script>
```

---

---

## Part 2 — Yokai Theme Network (`/yokai/`)

---

### Strategy

20 individual yokai theme pages on CSSKitsune, each:
- Targeting `[yokai name] theme`, `[yokai name] website`, `[yokai name] CSS`
- Providing a color palette + CSS tokens unique to that yokai's visual identity
- Cross-linking to the corresponding JapaneseMythicalCreatures.com yokai entry with descriptive anchor text

This creates a reciprocal topical authority loop:
- CSSKitsune owns "yokai web design / CSS themes"
- JMC owns "yokai mythology / lore"
- Each side links to the other as a natural complement

---

### The 20 Yokai + Palette Seeds

| # | Yokai | JP | Palette direction | JMC slug |
|---|-------|----|-------------------|----------|
| 1 | Kitsune | 狐 | Ember orange, twilight indigo, sacred gold | `/yokai/kitsune` |
| 2 | Tengu | 天狗 | Crimson red, mountain grey, deep cedar | `/yokai/tengu` |
| 3 | Oni | 鬼 | Cobalt blue or red, black iron, bone white | `/yokai/oni` |
| 4 | Tanuki | 狸 | Warm brown, sake gold, cedar green | `/yokai/tanuki` |
| 5 | Yuki-onna | 雪女 | Ice white, frozen blue, pale lilac | `/yokai/yuki-onna` |
| 6 | Kappa | 河童 | River teal, lily green, muddy amber | `/yokai/kappa` |
| 7 | Baku | 獏 | Dream purple, cloud grey, pearl | `/yokai/baku` |
| 8 | Ryu (Dragon) | 龍 | Imperial green, storm silver, gold | `/yokai/ryu` |
| 9 | Jorōgumo | 絡新婦 | Deep crimson, silk white, shadow black | `/yokai/jorogumo` |
| 10 | Bakeneko | 化け猫 | Slate grey, amber, night navy | `/yokai/bakeneko` |
| 11 | Raijin | 雷神 | Electric yellow, storm grey, thunder black | `/yokai/raijin` |
| 12 | Fujin | 風神 | Sky turquoise, cloud white, wind grey | `/yokai/fujin` |
| 13 | Nue | 鵺 | Chimera multi-tone, moonlit grey, rust | `/yokai/nue` |
| 14 | Gashadokuro | がしゃどくろ | Bone white, void black, blood rust | `/yokai/gashadokuro` |
| 15 | Shisa | シーサー | Terracotta, sea foam, coral | `/yokai/shisa` |
| 16 | Yamata no Orochi | 八岐大蛇 | Serpent green, storm purple, crimson | `/yokai/yamata-no-orochi` |
| 17 | Yatagarasu | 八咫烏 | Raven black, solar gold, blood red | `/yokai/yatagarasu` |
| 18 | Tsuchigumo | 土蜘蛛 | Earth brown, web silver, cave black | `/yokai/tsuchigumo` |
| 19 | Ningyo | 人魚 | Deep sea teal, pearl pink, seafoam | `/yokai/ningyo` |
| 20 | Inari | 稲荷 | Sacred red, harvest gold, shrine white | `/yokai/inari` |

---

### `/yokai/index.php` — Hub Page

**Title:** `Yokai CSS Themes — Japanese Spirit Web Design | CSSKitsune`  
**H1:** `Yokai Web Themes`  
**Subhead:** `20 CSS palettes inspired by Japanese mythological spirits — each with tokens, typography, and lore.`

Grid of all 20 yokai cards. Each card:
- Yokai name (JP kanji + EN)
- 3-color swatch strip (the palette seed colors)
- One-line descriptor
- Link: `/yokai/{slug}.php`

Footer cross-link block:
```
Learn the mythology behind these spirits →
JapaneseMythicalCreatures.com — the complete guide to yokai, kami, and Japanese mythical beings.
```
Anchor text: `Japanese mythical creatures guide` → `https://japanesemythicalcreatures.com`

---

### Individual Yokai Page Template (`/yokai/_template.php`)

Build one reusable PHP template. Each yokai page passes a `$yokai` config array:

```php
<?php
$yokai = [
    'name_en'     => 'Kitsune',
    'name_jp'     => '狐',
    'slug'        => 'kitsune',
    'description' => 'The fox spirit of intelligence and transformation.',
    'palette'     => [
        ['name' => 'Ember',   'hex' => '#C9521A'],
        ['name' => 'Indigo',  'hex' => '#2D2B55'],
        ['name' => 'Gold',    'hex' => '#D4A827'],
        ['name' => 'Cream',   'hex' => '#F5ECD7'],
    ],
    'css_vars'    => [
        '--yokai-primary'    => '#C9521A',
        '--yokai-accent'     => '#D4A827',
        '--yokai-background' => '#0F0D1A',
        '--yokai-text'       => '#F5ECD7',
    ],
    'font_display' => 'Noto Serif JP',
    'font_body'    => 'DM Sans',
    'jmc_url'     => 'https://japanesemythicalcreatures.com/yokai/kitsune/',
    'jmc_anchor'  => 'Kitsune — Japanese Fox Spirit Mythology',
];
?>
```

**Page sections:**

1. **Hero** — yokai name (JP + EN large), palette swatch strip, one-line spirit description. Background color = `palette[2]` (darkest tone) or dark variant.

2. **Palette Block** — 4 color swatches displayed as large tiles with hex code + CSS variable name. Copyable on click (vanilla JS clipboard).

3. **CSS Snippet Block** — preformatted `:root {}` block with all `--yokai-*` vars. Copy button.

4. **Typography Recommendation** — font pairing card: display font name + body font name with a live preview sentence rendered in those fonts (Google Fonts CDN).

5. **Lore Cross-link Block** — styled callout card:
   ```
   📖 Learn the mythology
   Curious about the [Yokai Name] in Japanese folklore?
   Read the full lore, history, and cultural significance on JapaneseMythicalCreatures.com.
   → [Kitsune — Japanese Fox Spirit Mythology](https://japanesemythicalcreatures.com/yokai/kitsune/)
   ```
   Anchor text must be descriptive (not "click here"). Use the `jmc_anchor` value from config.

6. **Related Yokai Themes** — 3–4 card grid linking to other `/yokai/` pages. Hardcode neighbors per yokai (e.g. kitsune → inari, bakeneko, yatagarasu).

7. **Breadcrumb** (top of page):
   ```
   CSSKitsune → Yokai Themes → Kitsune
   ```

---

### SEO Per Yokai Page

```php
$meta = [
    'title'       => "{$yokai['name_en']} CSS Theme — {$yokai['name_jp']} Web Design Palette | CSSKitsune",
    'description' => "Free {$yokai['name_en']} CSS theme inspired by the Japanese {$yokai['name_en']} spirit. Color tokens, CSS variables, and typography for {$yokai['name_en']}-themed websites.",
    'canonical'   => "https://csskitsune.com/yokai/{$yokai['slug']}.php",
];
```

Schema.org per page:
```json
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "[Yokai] CSS Theme",
  "description": "...",
  "url": "https://csskitsune.com/yokai/[slug].php",
  "about": {
    "@type": "Thing",
    "name": "[Yokai name_en]",
    "sameAs": "[jmc_url]"
  }
}
```

The `sameAs` pointing to JMC strengthens both pages' entity signals.

---

## File Checklist

```
kitsune/index.php              ← Part 1 — kitsune landing page
yokai/index.php                ← yokai theme hub
yokai/_template.php            ← shared template (include-based)
yokai/kitsune.php              ← (can redirect to /kitsune/ or be standalone)
yokai/tengu.php                ← each includes _template, passes $yokai config
yokai/oni.php
yokai/tanuki.php
yokai/yuki-onna.php
yokai/kappa.php
yokai/baku.php
yokai/ryu.php
yokai/jorogumo.php
yokai/bakeneko.php
yokai/raijin.php
yokai/fujin.php
yokai/nue.php
yokai/gashadokuro.php
yokai/shisa.php
yokai/yamata-no-orochi.php
yokai/yatagarasu.php
yokai/tsuchigumo.php
yokai/ningyo.php
yokai/inari.php
```

No database. No framework. All static PHP config arrays + one shared template.

---

## Acceptance Criteria

- [ ] `/kitsune/` returns 200, H1 = "Kitsune Web"
- [ ] Theme Maker color pickers update live preview in real time
- [ ] Copy CSS writes valid `:root {}` to clipboard
- [ ] 4 presets load and apply correctly
- [ ] `/yokai/` hub lists all 20 yokai with swatch strips
- [ ] Each yokai page renders palette, CSS snippet, and lore cross-link
- [ ] Every yokai page links to JMC with descriptive anchor text
- [ ] `sameAs` schema present on all yokai pages pointing to JMC URLs
- [ ] Canonical tags on all pages
- [ ] Breadcrumbs present on all yokai pages
- [ ] No broken internal links
- [ ] Mobile responsive (CSS grid with auto-fit or media queries)
- [ ] Google Fonts load from `<head>` — Noto Serif JP + DM Sans
- [ ] Alpine.js loaded via CDN on kitsune page only
