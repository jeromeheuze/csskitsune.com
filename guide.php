<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Japanese UI Design Principles for Western Developers | CSSKitsune';
$description = 'How Japanese aesthetics — ma, wabi-sabi, kisetsukan — translate into UI and CSS. A practical guide with tokens and prompts.';
$canonical = SITE_URL . '/guide.php';
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
  <meta name="theme-color" content="#F5F0E8">
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
    .back { font-size: 0.9rem; display: inline-block; margin-bottom: 1.5rem; }
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
    .cta-box {
      background: var(--paper);
      padding: 1.25rem;
      border-radius: 6px;
      border-left: 4px solid var(--accent);
      margin: 1.5rem 0;
    }
    .cta-box p { margin: 0 0 0.5rem; }
    .cta-box a { font-weight: 500; }
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
  <a href="index.php" class="back">← Back to CSSKitsune</a>

  <h1>Japanese UI Design Principles for Western Developers</h1>
  <p class="meta">A practical guide to ma, wabi-sabi, and tokens that work in any stack.</p>

  <p>Japanese interfaces often feel different: calmer, more restrained, with a sense of space and subtle hierarchy. That’s not by accident. A few core ideas from Japanese aesthetics translate directly into UI and CSS — and into the prompts you use with AI tools. This guide walks through those principles and points you to ready-made tokens and prompts.</p>

  <h2>1. Ma (間) — Negative space that does the work</h2>
  <p><em>Ma</em> is the space between elements: the pause, the breath, the silence. In UI terms, it’s margin, padding, and gap used deliberately instead of filling every pixel. Japanese design often uses fewer elements and more empty space so that what remains feels intentional.</p>
  <p><strong>In practice:</strong> Use a small, consistent spacing scale (e.g. 4, 8, 16, 32, 64px) for all spacing. Avoid one-off values. Let some areas stay sparse. The <a href="spec.php">Shizen spec</a> calls this the <em>ma-ratio</em> scale.</p>

  <h2>2. Wabi-sabi — Restraint and imperfection</h2>
  <p>Wabi-sabi values simplicity, asymmetry, and the beauty of imperfection. In UI: muted palettes, light typography, minimal decoration. No heavy gradients or big shadows. Colors tend toward warm neutrals (paper, ink, soft brown accents).</p>
  <p><strong>In practice:</strong> Prefer a limited palette (background, text, one accent, one muted). Use light or regular font weights. Keep shadows under 1px or omit them. The <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a> gives you exact hex values and a copy-paste prompt.</p>

  <h2>3. Kisetsukan (季節感) — Seasonal feeling</h2>
  <p>Japanese design often reflects the season: spring pastels, autumn warmth, winter stillness. You don’t have to go literal; the idea is that color and mood can shift in a coherent way. Shizen’s aesthetic packs (Sakura, Yoru, Edo Ink, Shinto) are built around these moods.</p>
  <p><strong>In practice:</strong> Pick one “season” or mood per screen or flow. Use a single palette for that context instead of mixing many styles. The <a href="prompt-builder.php">Prompt Builder</a> lets you combine aesthetic + season + mood into one prompt.</p>

  <h2>4. Typography — Rhythm and clarity</h2>
  <p>Japanese typography emphasizes vertical rhythm and readability. For Latin type, that means a clear scale (e.g. 1.618 ratio), consistent line-height, and restrained weight. Avoid decorative or heavy type for body text.</p>
  <p><strong>In practice:</strong> Use a modular scale for font sizes. Prefer light or regular for body; medium or semibold only for emphasis. Keep line-height around 1.5–1.7 for readability.</p>

  <h2>5. Motion — Stillness first</h2>
  <p>Motion in Japanese design tends to be subtle: opacity, gentle transitions, no bounce or flash. The goal is to support the content, not distract. Shizen uses terms like <em>opacity-first</em> and durations around 300–500ms with ease or ease-in-out.</p>
  <p><strong>In practice:</strong> Prefer opacity and light transform over big movements. Use 400ms ease for most transitions. Avoid animation on load unless it’s very subtle.</p>

  <h2>6. From principles to tokens and prompts</h2>
  <p>Principles alone don’t give you hex values or a prompt. The Shizen Design System turns these ideas into:</p>
  <ul>
    <li><strong>Color tokens</strong> — Named palettes (bg, text, accent, muted) with hex values you can plug into CSS or design tools.</li>
    <li><strong>Spacing scales</strong> — Named scales (e.g. ma-ratio) so you don’t invent numbers.</li>
    <li><strong>Ready-to-paste prompts</strong> — One block of text you can drop into Cursor, Figma AI, Webflow AI, etc., to get Japanese-style UI.</li>
  </ul>

  <div class="cta-box">
    <p><strong>Try it:</strong> Use the <a href="prompt-builder.php">Shizen Prompt Builder</a> to pick platform, aesthetic, season, and mood → get a single prompt. Or read the full <a href="spec.php">Shizen v1.0 spec</a> and the free <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a>.</p>
  </div>

  <h2>Summary</h2>
  <p>Japanese UI principles for Western developers: embrace <em>ma</em> (consistent spacing, more empty space), keep color and type restrained (wabi-sabi), align mood with a single palette (kisetsukan), use clear typography and subtle motion. Then use a token system and prompts — like Shizen — to turn that into code and AI-ready copy.</p>

  <h2>Articles by platform</h2>
  <p>Copy-paste prompts and tokens:</p>
  <ul>
    <li><a href="cursor-prompts.php">The exact prompt to make any UI look Japanese minimal in Cursor</a> — Cursor, Claude, ChatGPT.</li>
    <li><a href="webflow-prompts.php">Japanese style Webflow prompt pack — copy and paste</a> — Webflow AI + CSS variables.</li>
    <li><a href="obs-prompts.php">OBS overlay CSS prompts for Japanese stream aesthetics</a> — Browser source overlays.</li>
    <li><a href="godot-theming.php">Godot UI theming with Japanese aesthetics</a> — Theme resources, colors, spacing.</li>
    <li><a href="defold-styling.php">Defold GUI styling — Shizen token system</a> — GUI scripts, colors, Lua.</li>
  </ul>

  <?php require __DIR__ . '/includes/shinto-promo.php'; ?>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="spec.php">Spec</a> · <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a>
  </footer>
</body>
</html>
