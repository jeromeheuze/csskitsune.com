<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Wabi-Sabi Neutral Palette — Shizen Design System | CSSKitsune';
$description = 'Free prompt pack: wabi-sabi neutral tokens, ma-based spacing, and copy-paste AI prompts for Japanese minimal UI.';
$canonical = SITE_URL . '/prompt-pack-wabi-sabi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
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
      line-height: 1.6;
      padding: 2rem 1.5rem;
      max-width: 40rem;
      margin: 0 auto;
    }
    .no-print { margin-bottom: 1rem; }
    @media print {
      body { background: #fff; padding: 0; }
      .no-print { display: none !important; }
      a.back { display: none !important; }
      .screen-only { display: none !important; }
    }
    a.back {
      font-size: 0.9rem;
      color: var(--accent);
      text-decoration: none;
    }
    a.back:hover { text-decoration: underline; }
    h1 {
      font-size: 1.75rem;
      font-weight: 600;
      color: var(--text);
      margin: 0 0 0.25rem;
    }
    .sub { font-size: 0.95rem; color: var(--muted); margin: 0 0 1.5rem; }
    h2 {
      font-size: 1rem;
      font-weight: 600;
      margin: 1.5rem 0 0.5rem;
      padding-bottom: 0.25rem;
      border-bottom: 1px solid var(--border);
    }
    .context { font-style: italic; color: var(--muted); margin: 0.5rem 0 1rem; }
    .swatches {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin: 0.75rem 0;
    }
    .swatch {
      width: 4rem;
      height: 3rem;
      border-radius: 4px;
      border: 1px solid var(--border);
      box-shadow: 0 1px 2px rgba(0,0,0,0.06);
    }
    .swatch-label { font-size: 0.75rem; color: var(--muted); margin-top: 0.15rem; }
    .token-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.9rem;
      margin: 0.5rem 0 1rem;
    }
    .token-table th, .token-table td {
      text-align: left;
      padding: 0.4rem 0.5rem;
      border-bottom: 1px solid var(--border);
    }
    .token-table th { color: var(--muted); font-weight: 600; }
    .token-table code { font-size: 0.85em; }
    pre, .code-block {
      background: #f0ede8;
      padding: 1rem;
      border-radius: 4px;
      overflow-x: auto;
      font-size: 0.85rem;
      font-family: ui-monospace, monospace;
      border: 1px solid var(--border);
      margin: 0.5rem 0 1rem;
    }
    .prompt-box {
      background: var(--paper);
      border-left: 4px solid var(--accent);
      padding: 1rem;
      margin: 1rem 0;
      font-size: 0.9rem;
    }
    footer {
      margin-top: 2rem;
      padding-top: 1rem;
      font-size: 0.85rem;
      color: var(--muted);
    }
    footer a { color: var(--accent); }
  </style>
</head>
<body>
  <a href="/" class="back no-print">← Back to CSSKitsune</a>
  <p class="screen-only no-print" style="font-size: 0.85rem; color: var(--muted);">Save as PDF: <kbd>Ctrl+P</kbd> (or <kbd>Cmd+P</kbd>) → choose “Save as PDF”.</p>

  <h1>Wabi-Sabi Neutral Palette</h1>
  <p class="sub">Shizen Design System — Free prompt pack</p>

  <h2>Cultural context</h2>
  <p class="context">Embrace imperfection and simplicity. Muromachi-era tea room sensibility — weathered, quiet, unforced.</p>

  <h2>Color tokens</h2>
  <div class="swatches">
    <div><div class="swatch" style="background: #F5F0E8;"></div><span class="swatch-label">bg</span></div>
    <div><div class="swatch" style="background: #2C2C2C;"></div><span class="swatch-label">text</span></div>
    <div><div class="swatch" style="background: #8B7355;"></div><span class="swatch-label">accent</span></div>
    <div><div class="swatch" style="background: #6B6B6B;"></div><span class="swatch-label">muted</span></div>
    <div><div class="swatch" style="background: #D4CFC4;"></div><span class="swatch-label">border</span></div>
  </div>
  <table class="token-table">
    <tr><th>Token</th><th>Hex</th><th>Use</th></tr>
    <tr><td><code>bg</code></td><td>#F5F0E8</td><td>Background, paper</td></tr>
    <tr><td><code>text</code></td><td>#2C2C2C</td><td>Body text</td></tr>
    <tr><td><code>accent</code></td><td>#8B7355</td><td>Links, buttons, emphasis</td></tr>
    <tr><td><code>muted</code></td><td>#6B6B6B</td><td>Secondary text</td></tr>
    <tr><td><code>border</code></td><td>#D4CFC4</td><td>Borders, dividers</td></tr>
  </table>

  <h2>Spacing</h2>
  <p><strong>Scale:</strong> 4 / 8 / 16 / 32 / 64px (<em>ma-ratio</em> — rooted in negative space, not arbitrary numbers.)</p>

  <h2>Typography</h2>
  <p>Ratio: 1.618 (golden). Weight: light. Restrained, readable.</p>

  <h2>Motion</h2>
  <p>Transitions: 400ms ease. Opacity-first — avoid flashy movement.</p>

  <h2>Style rule</h2>
  <p>Muromachi minimalism — no gradients, no shadows above 1px. Let negative space lead.</p>

  <h2>Ready-to-paste AI prompt</h2>
  <div class="prompt-box">
    Use wabi-sabi neutral palette: bg #F5F0E8, text #2C2C2C, accent #8B7355. Spacing scale: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light weight. Transitions: 400ms ease, opacity-first. Style: Muromachi minimalism — no gradients, no shadows above 1px.
  </div>

  <h2>CSS custom properties</h2>
  <pre><code>:root {
  --shizen-bg: #F5F0E8;
  --shizen-text: #2C2C2C;
  --shizen-accent: #8B7355;
  --shizen-muted: #6B6B6B;
  --shizen-border: #D4CFC4;
}</code></pre>

  <footer>
    Shizen Design System · <a href="https://csskitsune.com">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="spec.php">Spec</a> · Part of the Japan Culture Network
  </footer>
</body>
</html>
