<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'The Exact Prompt to Make Any UI Look Japanese Minimal in Cursor | CSSKitsune';
$description = 'Copy-paste AI prompts for Japanese minimal UI in Cursor, Claude, or ChatGPT. Wabi-sabi palette, ma-based spacing, ready in one block.';
$canonical = SITE_URL . '/cursor-prompts.php';
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
      font-family: ui-monospace, monospace;
      line-height: 1.5;
      overflow-x: auto;
    }
    .cta-box { background: var(--paper); padding: 1.25rem; border-radius: 6px; border-left: 4px solid var(--accent); margin: 1.5rem 0; }
    .cta-box p { margin: 0 0 0.5rem; }
    footer { margin-top: 3rem; padding-top: 1.5rem; font-size: 0.85rem; color: var(--muted); border-top: 1px solid var(--border); }
  </style>
</head>
<body>
  <a href="index.php" class="back">← Back to CSSKitsune</a>

  <h1>The Exact Prompt to Make Any UI Look Japanese Minimal in Cursor</h1>
  <p class="meta">Copy-paste prompts for Cursor, Claude, or ChatGPT. One block, one style.</p>

  <p>You don’t need a long back-and-forth to get Japanese minimal UI in Cursor (or Claude / ChatGPT). Paste one of the prompts below into your AI chat and reference it when generating components or pages. They use the <a href="spec.php">Shizen</a> token set: real hex values, spacing scale, and style rules so the output is consistent.</p>

  <h2>Wabi-sabi minimal (default)</h2>
  <p>Warm paper background, soft brown accent, lots of space. Works for landing pages, dashboards, and docs.</p>
  <div class="prompt-box">
    Use wabi-sabi neutral palette: bg #F5F0E8, text #2C2C2C, accent #8B7355. Spacing scale: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light weight. Transitions: 400ms ease, opacity-first. Style: Muromachi minimalism — no gradients, no shadows above 1px.
  </div>

  <h2>Night (Yoru) — dark UI</h2>
  <p>Deep indigo background, paper-white text. Good for dark-mode or evening-style interfaces.</p>
  <div class="prompt-box">
    Use yoru (night) palette: bg #1E2A3A, text #F5F0E8, accent #7B9BB0. Spacing scale: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light weight. Transitions: 400ms ease, opacity-first. Style: deep indigo base, one cool accent; no bright white flash.
  </div>

  <h2>Edo ink — monochrome</h2>
  <p>Sumi-e style: grey paper, black/grey ink only. No color accents.</p>
  <div class="prompt-box">
    Use edo ink palette: bg #F8F6F3, text #1a1a1a, ink #2C2C2C, ink-light #6B6B6B. Spacing scale: 4/8/16/32/64px (ma-ratio). Typography: 1.618 ratio, light to regular. Transitions: 500ms ease-in-out, opacity and subtle scale. Style: monochrome only; use opacity and weight for hierarchy.
  </div>

  <div class="cta-box">
    <p><strong>Want more?</strong> Use the <a href="prompt-builder.php">Shizen Prompt Builder</a> to pick platform, aesthetic (Wabi-Sabi, Shinto, Sakura, Yoru, Edo Ink), season, and mood → get a single prompt tailored to Cursor or another tool.</p>
  </div>

  <p><strong>How to use in Cursor:</strong> Paste the prompt into the chat when you ask for a component or page. Example: “Build a pricing section. [paste prompt above].” You can also add “Use CSS custom properties for the colors” if you want variables instead of hardcoded hex.</p>

  <footer>
    <a href="index.php">CSSKitsune</a> · <a href="prompt-builder.php">Prompt Builder</a> · <a href="webflow-prompts.php">Webflow</a> · <a href="obs-prompts.php">OBS</a> · <a href="godot-theming.php">Godot</a> · <a href="guide.php">Guide</a> · <a href="spec.php">Spec</a>
  </footer>
</body>
</html>
