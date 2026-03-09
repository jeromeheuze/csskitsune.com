<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'OBS Overlay CSS Prompts for Japanese Stream Aesthetics | CSSKitsune';
$description = 'Copy-paste prompts and CSS for Japanese-style OBS overlays: wabi-sabi, Shinto, or night palette. Browser source–ready.';
$canonical = SITE_URL . '/obs-prompts.php';
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
    .prompt-box {
      background: var(--paper);
      border: 1px solid var(--border);
      border-left: 4px solid var(--accent);
      padding: 1rem 1.25rem;
      margin: 1rem 0;
      font-size: 0.9rem;
      line-height: 1.5;
    }
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

  <h1>OBS Overlay CSS Prompts for Japanese Stream Aesthetics</h1>
  <p class="meta">Prompts and CSS for browser-source overlays in OBS. Calm, readable, on-brand.</p>

  <p>Stream overlays (alerts, labels, panels) can use the same Japanese aesthetic as the rest of your brand: warm paper tones, clear typography, and plenty of space. Use the prompts and CSS below in OBS browser sources or when asking AI to generate overlay HTML/CSS. All values come from the <a href="spec.php">Shizen</a> token set.</p>

  <h2>Prompt for overlay design (AI or yourself)</h2>
  <p>When generating overlay layout or copy, paste this so the style stays consistent.</p>
  <div class="prompt-box">
    For OBS browser source overlay: Japanese minimal (wabi-sabi). Background #F5F0E8 or transparent; text #2C2C2C; accent #8B7355. Spacing 8/16/24px. Typography: light weight, 1.618 ratio. No gradients; subtle or no shadow. Clean, readable for stream — avoid tiny text.
  </div>

  <h2>Shinto / ceremonial (vermillion + gold)</h2>
  <p>Stronger look for alerts or highlights.</p>
  <div class="prompt-box">
    For OBS overlay: Shinto ceremonial. Background #FFFEF9; text #1a1a1a; accent #C41E3A; gold #C9A227 for emphasis. Spacing 8/16/24px. Clean edges, no blur. Readable on stream.
  </div>

  <h2>Night (Yoru) — dark overlay</h2>
  <p>Dark indigo for night streams or dark themes.</p>
  <div class="prompt-box">
    For OBS overlay: Yoru (night). Background #1E2A3A or semi-transparent; text #F5F0E8; accent #7B9BB0. Spacing 8/16/24px. Light weight. One cool accent; no bright white flash.
  </div>

  <h2>CSS variables for browser source</h2>
  <p>In your overlay HTML, add a <code>&lt;style&gt;</code> block with these variables so you can tweak one place.</p>
  <pre><code>:root {
  --shizen-bg: #F5F0E8;
  --shizen-text: #2C2C2C;
  --shizen-accent: #8B7355;
  --shizen-muted: #6B6B6B;
}
body { font-family: system-ui, sans-serif; background: var(--shizen-bg); color: var(--shizen-text); }</code></pre>

  <p><strong>OBS tip:</strong> Create a Browser Source, point it to your overlay URL or local HTML file. Use a resolution that matches your scene (e.g. 1920×1080) and set “Shutdown source when not visible” if you want to save resources.</p>

  <div class="cta-box">
    <p><strong>More palettes:</strong> Use the <a href="prompt-builder.php">Shizen Prompt Builder</a> and choose “OBS Studio” as platform to get a prompt for any aesthetic (Sakura, Edo Ink, etc.).</p>
  </div>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="cursor-prompts.php">Cursor</a> · <a href="webflow-prompts.php">Webflow</a> · <a href="godot-theming.php">Godot</a> · <a href="guide.php">Guide</a> · <a href="spec.php">Spec</a>
  </footer>
</body>
</html>
