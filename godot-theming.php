<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Godot UI Theming with Japanese Aesthetics | CSSKitsune';
$description = 'Use Shizen tokens and palettes for Godot 4 theme resources: colors, spacing, and style for wabi-sabi or Yoru UI.';
$canonical = SITE_URL . '/godot-theming.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .cta-box { background: var(--paper); padding: 1.25rem; border-radius: 6px; border-left: 4px solid var(--accent); margin: 1.5rem 0; }
    .cta-box p { margin: 0 0 0.5rem; }
    footer { margin-top: 3rem; padding-top: 1.5rem; font-size: 0.85rem; color: var(--muted); border-top: 1px solid var(--border); }
  </style>
</head>
<body>
  <a href="index.php" class="back">← Back to CSSKitsune</a>

  <h1>Godot UI Theming with Japanese Aesthetics</h1>
  <p class="meta">Map Shizen tokens to Godot 4 theme colors and constants.</p>

  <p>Godot’s theme system (Theme resources, colors, constants) lines up well with a token-based design system. You can plug <a href="spec.php">Shizen</a> palette and spacing values into your theme so menus, buttons, and panels get a consistent Japanese minimal look. This page gives you the values and a prompt for AI-assisted theme setup.</p>

  <h2>Wabi-Sabi palette (Godot colors)</h2>
  <p>Use these in your Theme resource or in a script that sets theme overrides. Godot uses hex without the leading <code>#</code> in some contexts; use <code>Color()</code> with normalized values or hex strings as needed.</p>
  <pre><code># Wabi-Sabi — use in Theme or theme override
# Background / panel
font_color_normal / bg:  #F5F0E8  (paper)
# Text
font_color / text:       #2C2C2C
font_color_muted:        #6B6B6B
# Accent (buttons, highlights)
font_color_hover / accent: #8B7355
# Border
border_color:            #D4CFC4</code></pre>

  <h2>Spacing (ma-ratio)</h2>
  <p>Shizen uses 4/8/16/32/64px. In Godot, map these to theme constants (e.g. <code>separation</code>, custom constants) or use them as reference for margin/padding in your UI layout.</p>
  <pre><code># Theme constants (example names)
separation = 8   # or 16 for larger gaps
h_separation = 8
v_separation = 8
# Scale: 4, 8, 16, 32, 64</code></pre>

  <h2>Prompt for AI-assisted theme setup</h2>
  <p>When using Cursor or Claude to generate or adjust a Godot theme, paste this so the style stays consistent.</p>
  <div class="prompt-box" style="font-family: ui-monospace, monospace; font-size: 0.9rem;">
    For Godot 4 Theme resource: Japanese minimal (wabi-sabi). Colors: background/panel #F5F0E8, text #2C2C2C, accent/hover #8B7355, muted #6B6B6B, border #D4CFC4. Use light font weight where possible. Spacing constants: 4, 8, 16, 32, 64. No gradients; flat or 1px shadow only.
  </div>

  <h2>Yoru (night) for dark UI</h2>
  <p>For a dark game UI or settings screen:</p>
  <pre><code># Yoru palette
bg:      #1E2A3A
text:    #F5F0E8
accent:  #7B9BB0
muted:   #9BA8B5
border:  #3A4A5A</code></pre>

  <p>Apply these to your default theme or a secondary theme resource and assign the theme to your root control or specific nodes.</p>

  <div class="cta-box">
    <p><strong>All palettes:</strong> Use the <a href="prompt-builder.php">Shizen Prompt Builder</a> and select “Godot Engine” to get a prompt for Shinto, Sakura, Edo Ink, or Yoru. The <a href="spec.php">spec</a> has the full token list.</p>
  </div>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="cursor-prompts.php">Cursor</a> · <a href="webflow-prompts.php">Webflow</a> · <a href="obs-prompts.php">OBS</a> · <a href="guide.php">Guide</a> · <a href="spec.php">Spec</a>
  </footer>
</body>
</html>
