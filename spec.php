<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Shizen Design System v1.0 — Specification | CSSKitsune';
$description = 'Open specification for the Shizen Design System: Japanese aesthetic tokens, ma-based spacing, typography, motion vocabulary, and AI-ready prompts.';
$canonical = SITE_URL . '/spec.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="og:type" content="article">
  <style>
    :root {
      --bg: #F5F0E8;
      --text: #2C2C2C;
      --muted: #6B6B6B;
      --accent: #8B7355;
      --paper: #FFFEF9;
      --border: #D4CFC4;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.7;
      padding: 2rem 1.5rem;
      max-width: 42rem;
      margin: 0 auto;
    }
    a { color: var(--accent); text-decoration: none; }
    a:hover { text-decoration: underline; }
    a.back { font-size: 0.9rem; display: inline-block; margin-bottom: 1.5rem; }
    h1 {
      font-size: 1.75rem;
      font-weight: 600;
      margin: 0 0 0.25rem;
    }
    .meta { font-size: 0.9rem; color: var(--muted); margin: 0 0 2rem; }
    h2 {
      font-size: 1.15rem;
      font-weight: 600;
      margin: 2rem 0 0.75rem;
      padding-bottom: 0.25rem;
      border-bottom: 1px solid var(--border);
    }
    h3 { font-size: 1rem; font-weight: 600; margin: 1.25rem 0 0.5rem; }
    p { margin: 0.5rem 0 1rem; }
    ul { margin: 0.5rem 0 1rem; padding-left: 1.5rem; }
    li { margin: 0.25rem 0; }
    pre, .code-block {
      background: #f0ede8;
      padding: 1rem;
      border-radius: 4px;
      overflow-x: auto;
      font-size: 0.85rem;
      font-family: ui-monospace, monospace;
      border: 1px solid var(--border);
      margin: 0.75rem 0 1rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.9rem;
      margin: 0.75rem 0 1rem;
    }
    th, td { text-align: left; padding: 0.5rem; border-bottom: 1px solid var(--border); }
    th { color: var(--muted); font-weight: 600; }
    strong { color: var(--text); }
    footer {
      margin-top: 3rem;
      padding-top: 1.5rem;
      font-size: 0.85rem;
      color: var(--muted);
      border-top: 1px solid var(--border);
    }
  </style>
</head>
<body>
  <a href="/" class="back">← Back to CSSKitsune</a>

  <h1>Shizen Design System</h1>
  <p class="meta">Specification draft v1.0 · March 2026 · CSSKitsune</p>

  <h2>1. Vision</h2>
  <p><strong>Shizen</strong> (自然) means nature, naturalness — the effortless quality at the heart of Japanese aesthetics. This specification defines a design system built on Japanese aesthetic principles: named token palettes, spacing rooted in <em>ma</em> (negative space), typography and motion vocabulary, and AI-ready prompt templates. The goal is to give developers and AI agents a shared, precise language for Japanese-style UI.</p>

  <h2>2. What Shizen provides</h2>
  <ul>
    <li><strong>Color token palettes</strong> — Culturally and seasonally sourced (wabi-sabi neutrals, Shinto ceremonial, Edo ink, sakura, yoru). Each palette has semantic names: bg, text, accent, muted, etc.</li>
    <li><strong>Spacing scales</strong> — Based on <em>ma</em> (間), not arbitrary numbers. Ratios like 4/8/16/32/64px create rhythm and breathing room.</li>
    <li><strong>Typography</strong> — Ratios (e.g. 1.618) and weight guidance adapted from Japanese vertical rhythm and restraint.</li>
    <li><strong>Motion vocabulary</strong> — Duration, easing, and style (e.g. opacity-first, stillness-first) so motion supports the mood instead of dominating it.</li>
    <li><strong>Naming conventions</strong> — Token names that humans and AI can both understand and reuse.</li>
    <li><strong>Prompt templates</strong> — Copy-paste prompts that embed token values for Cursor, Figma AI, Webflow AI, and other platforms.</li>
  </ul>

  <h2>3. Color tokens</h2>
  <p>Each aesthetic pack defines a set of semantic color tokens. Common names:</p>
  <table>
    <tr><th>Token</th><th>Purpose</th></tr>
    <tr><td><code>bg</code></td><td>Background / paper</td></tr>
    <tr><td><code>text</code></td><td>Primary text</td></tr>
    <tr><td><code>accent</code></td><td>Links, buttons, key emphasis</td></tr>
    <tr><td><code>muted</code></td><td>Secondary text, captions</td></tr>
    <tr><td><code>border</code></td><td>Borders, dividers</td></tr>
  </table>
  <p>Packs may add tokens (e.g. <code>gold</code>, <code>ink</code>, <code>warm</code>). Values are hex. Use CSS custom properties with a <code>--shizen-</code> prefix for implementation.</p>

  <h2>4. Spacing (ma)</h2>
  <p><em>Ma</em> (間) is the intentional use of negative space — pause, breath, balance. Shizen spacing scales are named (e.g. <em>ma-ratio</em>, <em>ceremonial scale</em>) and defined as a small set of values (e.g. 4, 8, 16, 32, 64px). Use these for margin, padding, and gap so layout has consistent rhythm.</p>

  <h2>5. Typography</h2>
  <p>Each pack specifies a ratio (e.g. 1.618), weight (e.g. light, regular), and a short note. Prefer restrained weight and clear hierarchy. Japanese typography often emphasizes vertical rhythm and clarity; adapt these ideas for Latin type with line-height and scale.</p>

  <h2>6. Motion vocabulary</h2>
  <p>Shizen motion is subtle and purposeful:</p>
  <ul>
    <li><strong>Duration</strong> — Typically 300–500ms. Avoid short, snappy flashes.</li>
    <li><strong>Easing</strong> — ease or ease-in-out. No bounce or overshoot unless the aesthetic explicitly allows it.</li>
    <li><strong>Style</strong> — Opacity-first, or transform + opacity. Stillness-first: reduce motion when possible.</li>
  </ul>
  <p>Terms from the system: <em>en</em> (subtle, fate-like transition), <em>nagare</em> (flowing state change), <em>shizuka</em> (stillness-first animation).</p>

  <h2>7. Naming conventions</h2>
  <p>Token names are lowercase, semantic, and English. Use <code>--shizen-&lt;token&gt;</code> in CSS. In prompts, spell out the token and hex so AI and humans get the same result (e.g. “bg #F5F0E8, text #2C2C2C”).</p>

  <h2>8. Prompt template format</h2>
  <p>A Shizen prompt embeds the chosen palette and rules in one block. Example structure:</p>
  <pre>Use [aesthetic] palette: [token list with hex]. Spacing scale: [scale] ([name]). Typography: [ratio] ratio, [weight] weight. Transitions: [duration] [easing], [style]. Style: [short style rule].</pre>
  <p>Optional modifiers: season (e.g. spring, winter), mood (e.g. calm, minimal). Platform-specific prompts can prefix with “For [Platform]:”.</p>

  <h2>9. Aesthetic packs (v1.0)</h2>
  <p>Five core packs are defined: <strong>Wabi-Sabi Neutral</strong>, <strong>Shinto Ceremonial</strong>, <strong>Edo Ink</strong>, <strong>Sakura Season</strong>, <strong>Yoru (Night)</strong>. Each has tokens, spacing, typography, motion, style description, and a prompt template. See the <a href="prompt-builder.php">Prompt Builder</a> and the free <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a> for full detail.</p>

  <h2>10. Version and license</h2>
  <p>This is the Shizen Design System specification <strong>v1.0</strong>. The specification and associated design tokens, prompts, and documentation are licensed under <a href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International (CC BY 4.0)</a>. You may share and adapt with attribution. See the <a href="https://github.com/csskitsune/csskitsune.com/blob/main/LICENSE">LICENSE</a> file in the project repository.</p>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a>
  </footer>
</body>
</html>
