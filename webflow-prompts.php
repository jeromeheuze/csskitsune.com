<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Japanese Style Webflow Prompt Pack — Copy and Paste | CSSKitsune';
$description = 'Copy-paste AI prompts and CSS custom properties for Japanese minimal UI in Webflow. Shizen tokens: wabi-sabi, spacing, typography.';
$canonical = SITE_URL . '/webflow-prompts.php';
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

  <h1>Japanese Style Webflow Prompt Pack — Copy and Paste</h1>
  <p class="meta">Prompts and CSS for Japanese minimal UI in Webflow (and Webflow AI).</p>

  <p>Use the prompts and CSS below in Webflow: with the AI assistant for layout and copy, or in Custom Code / embed for global tokens. The <a href="spec.php">Shizen</a> palette and spacing scale keep the look consistent across sections.</p>

  <h2>Prompt for Webflow AI</h2>
  <p>When generating sections or pages with Webflow’s AI, paste this style block so the output uses the same tokens.</p>
  <div class="prompt-box">
    For Webflow AI: Use Japanese minimal (wabi-sabi) style. Colors: background #F5F0E8, text #2C2C2C, accent #8B7355. Spacing: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light weight. No gradients; shadows 0–1px only. Clean, lots of whitespace.
  </div>

  <h2>CSS custom properties (paste in Webflow)</h2>
  <p>Add these to your site’s Custom Code (head) or to a global embed so every page can use the variables. Then set background, text, and accent on body or wrapper divs to the Shizen tokens.</p>
  <pre><code>:root {
  /* Shizen Wabi-Sabi */
  --shizen-bg: #F5F0E8;
  --shizen-text: #2C2C2C;
  --shizen-accent: #8B7355;
  --shizen-muted: #6B6B6B;
  --shizen-border: #D4CFC4;
  /* Spacing (ma-ratio) */
  --shizen-space-1: 4px;
  --shizen-space-2: 8px;
  --shizen-space-3: 16px;
  --shizen-space-4: 32px;
  --shizen-space-5: 64px;
}</code></pre>

  <p>Example: set the body background to <code>var(--shizen-bg)</code>, text color to <code>var(--shizen-text)</code>, and button/link color to <code>var(--shizen-accent)</code>. Use the spacing variables for margin and padding (e.g. <code>var(--shizen-space-3)</code> for 16px).</p>

  <h2>Other palettes</h2>
  <p>For Shinto (vermillion + gold), Sakura (spring pastels), or Yoru (dark), use the <a href="prompt-builder.php">Shizen Prompt Builder</a>: choose “Webflow AI” as platform and pick the aesthetic. You’ll get a ready-to-paste prompt and can copy the token values from the <a href="prompt-pack-wabi-sabi.php">free Wabi-Sabi pack</a> or the builder’s code example.</p>

  <div class="cta-box">
    <p><strong>All platforms:</strong> <a href="prompt-builder.php">Prompt Builder</a> · <a href="spec.php">Spec</a> · <a href="guide.php">Japanese UI principles guide</a></p>
  </div>

  <?php require __DIR__ . '/includes/shinto-promo.php'; ?>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="cursor-prompts.php">Cursor</a> · <a href="obs-prompts.php">OBS</a> · <a href="godot-theming.php">Godot</a> · <a href="defold-styling.php">Defold</a> · <a href="guide.php">Guide</a> · <a href="spec.php">Spec</a>
  </footer>
</body>
</html>
