<?php
require_once __DIR__ . '/includes/seo-config.php';
$title = 'Sitemap | CSSKitsune';
$canonical = SITE_URL . '/site-map.php';
$pages = [
  'Home' => 'index.php',
  'Kitsune Web — Theme Maker' => 'kitsune',
  'Prompt Builder' => 'prompt-builder.php',
  'Spec (v1.0)' => 'spec.php',
  'Guide — Japanese UI principles' => 'guide.php',
  'Free Wabi-Sabi pack' => 'prompt-pack-wabi-sabi.php',
  'License (text)' => 'license.php',
  'Cursor prompts' => 'cursor-prompts.php',
  'Webflow prompts' => 'webflow-prompts.php',
  'OBS overlay prompts' => 'obs-prompts.php',
  'Godot theming' => 'godot-theming.php',
  'Defold styling' => 'defold-styling.php',
];
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
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical); ?>">
  <style>
    :root { --bg: #F5F0E8; --text: #2C2C2C; --muted: #6B6B6B; --accent: #8B7355; --border: #D4CFC4; }
    * { box-sizing: border-box; }
    body { margin: 0; font-family: system-ui, sans-serif; background: var(--bg); color: var(--text); line-height: 1.6; padding: 2rem 1.5rem; max-width: 36rem; margin: 0 auto; }
    a { color: var(--accent); text-decoration: none; }
    a:hover { text-decoration: underline; }
    .back { font-size: 0.9rem; display: inline-block; margin-bottom: 1.5rem; }
    h1 { font-size: 1.5rem; font-weight: 600; margin: 0 0 1rem; }
    ul { list-style: none; padding: 0; margin: 0; }
    li { padding: 0.35rem 0; border-bottom: 1px solid var(--border); }
    li:last-child { border-bottom: 0; }
    footer { margin-top: 2rem; font-size: 0.85rem; color: var(--muted); }
  </style>
</head>
<body>
  <a href="index.php" class="back">← Back to CSSKitsune</a>
  <h1>Sitemap</h1>
  <ul>
    <?php foreach ($pages as $label => $url): ?>
    <li><a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($label); ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php require __DIR__ . '/includes/shinto-promo.php'; ?>
  <footer>
    <a href="index.php">CSSKitsune</a> · Shizen Design System
  </footer>
</body>
</html>
