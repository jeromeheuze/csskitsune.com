<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Defold GUI Styling — Shizen Token System | CSSKitsune';
$description = 'Use Shizen color and spacing tokens for Defold GUI: wabi-sabi and Yoru palettes, script-ready values, and AI prompts.';
$canonical = SITE_URL . '/defold-styling.php';
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
    :root { --bg: #F5F0E8; --text: #2C2C2C; --muted: #6B6B6B; --accent: #8B7355; --paper: #FFFEF9; --border: #D4CFC4; }
    * { box-sizing: border-box; }
    body { margin: 0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: var(--bg); color: var(--text); line-height: 1.7; padding: 2rem 1.5rem; max-width: 42rem; margin: 0 auto; }
    a { color: var(--accent); text-decoration: none; }
    a:hover { text-decoration: underline; }
    .back { font-size: 0.9rem; display: inline-block; margin-bottom: 1.5rem; }
    h1 { font-size: 1.75rem; font-weight: 600; margin: 0 0 0.25rem; }
    .meta { font-size: 0.9rem; color: var(--muted); margin: 0 0 2rem; }
    h2 { font-size: 1.15rem; font-weight: 600; margin: 2rem 0 0.75rem; padding-bottom: 0.25rem; border-bottom: 1px solid var(--border); }
    p { margin: 0.5rem 0 1rem; }
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
    .prompt-box {
      background: var(--paper);
      border: 1px solid var(--border);
      border-left: 4px solid var(--accent);
      padding: 1rem 1.25rem;
      margin: 1rem 0;
      font-size: 0.9rem;
      line-height: 1.5;
    }
    .cta-box { background: var(--paper); padding: 1.25rem; border-radius: 6px; border-left: 4px solid var(--accent); margin: 1.5rem 0; }
    .cta-box p { margin: 0 0 0.5rem; }
    footer { margin-top: 3rem; padding-top: 1.5rem; font-size: 0.85rem; color: var(--muted); border-top: 1px solid var(--border); }
  </style>
</head>
<body>
  <a href="index.php" class="back">← Back to CSSKitsune</a>

  <h1>Defold GUI Styling — Shizen Token System</h1>
  <p class="meta">Color and spacing tokens for Defold GUI scenes and scripts.</p>

  <p>Defold’s GUI uses nodes, materials, and scripts. You can drive colors and layout from a small set of <a href="spec.php">Shizen</a> tokens so menus, HUDs, and dialogs share a consistent Japanese minimal look. This page gives hex values, Lua-friendly numbers where useful, and a prompt for AI when generating or refactoring GUI.</p>

  <h2>Wabi-Sabi palette (hex and 0–1)</h2>
  <p>Use these in GUI scripts or materials. Defold often expects colors as <code>vmath.vector4(r, g, b, a)</code> with 0–1 components; hex is handy for reference and for tools that accept it.</p>
  <pre><code>-- Shizen Wabi-Sabi (hex)
local shizen = {
  bg     = vmath.vector4(0.96, 0.94, 0.91, 1),   -- #F5F0E8
  text   = vmath.vector4(0.17, 0.17, 0.17, 1),   -- #2C2C2C
  accent = vmath.vector4(0.55, 0.45, 0.33, 1),   -- #8B7355
  muted  = vmath.vector4(0.42, 0.42, 0.42, 1),   -- #6B6B6B
  border = vmath.vector4(0.83, 0.81, 0.77, 1),   -- #D4CFC4
}</code></pre>

  <h2>Spacing (ma-ratio)</h2>
  <p>Use 4, 8, 16, 32, 64 as pixel margins or gaps between GUI elements. Scale by your reference resolution if you use dynamic scaling.</p>
  <pre><code>-- Spacing constants (px)
local space = { 4, 8, 16, 32, 64 }</code></pre>

  <h2>Prompt for AI (Cursor / Claude)</h2>
  <p>When generating or editing Defold GUI Lua, paste this so the style stays consistent.</p>
  <div class="prompt-box" style="font-family: ui-monospace, monospace; font-size: 0.9rem;">
    For Defold GUI: Japanese minimal (wabi-sabi). Colors: bg #F5F0E8, text #2C2C2C, accent #8B7355, muted #6B6B6B. Spacing 4/8/16/32/64px. Light weight text where possible. Flat or 1px shadow; no gradients.
  </div>

  <h2>Yoru (night) — dark GUI</h2>
  <p>For dark menus or HUDs:</p>
  <pre><code>-- Yoru palette (0–1)
local yoru = {
  bg     = vmath.vector4(0.12, 0.16, 0.23, 1),   -- #1E2A3A
  text   = vmath.vector4(0.96, 0.94, 0.91, 1),   -- #F5F0E8
  accent = vmath.vector4(0.48, 0.61, 0.69, 1),   -- #7B9BB0
  border = vmath.vector4(0.23, 0.29, 0.35, 1),   -- #3A4A5A
}</code></pre>

  <div class="cta-box">
    <p><strong>More palettes:</strong> Use the <a href="prompt-builder.php">Shizen Prompt Builder</a> and select “Defold” to get a prompt for Shinto, Sakura, or Edo Ink. Full token list in the <a href="spec.php">spec</a>.</p>
  </div>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="cursor-prompts.php">Cursor</a> · <a href="webflow-prompts.php">Webflow</a> · <a href="obs-prompts.php">OBS</a> · <a href="godot-theming.php">Godot</a> · <a href="guide.php">Guide</a> · <a href="spec.php">Spec</a>
  </footer>
</body>
</html>
