<?php
require_once __DIR__ . '/../includes/seo-config.php';
require_once __DIR__ . '/yokai-data.php';

$all = yokai_all_configs();
$meta = [
    'title' => 'Yokai CSS Themes — Japanese Spirit Web Design | CSSKitsune',
    'description' => '20 CSS palettes inspired by Japanese mythological spirits — each with tokens, typography, and links to yokai lore on JapaneseMythicalCreatures.com.',
    'canonical' => SITE_URL . '/yokai/',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/favicon.ico" sizes="any">
  <title><?php echo htmlspecialchars($meta['title']); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($meta['canonical']); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($meta['canonical']); ?>">
  <meta property="og:type" content="website">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Yokai CSS Themes",
    "description": "<?php echo htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8'); ?>",
    "url": "<?php echo htmlspecialchars($meta['canonical'], ENT_QUOTES, 'UTF-8'); ?>"
  }
  </script>
  <style>
    :root {
      --bg: #0F0D1A;
      --text: #F5ECD7;
      --muted: #E8E4F0;
      --accent: #C9521A;
      --card: rgba(45, 43, 85, 0.45);
      --border: rgba(232, 228, 240, 0.12);
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'DM Sans', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
      padding: 1.5rem;
    }
    .wrap { max-width: 56rem; margin: 0 auto; }
    a { color: #D4A827; text-decoration: none; }
    a:hover { text-decoration: underline; }
    .back { font-size: 0.9rem; opacity: 0.8; display: inline-block; margin-bottom: 1.5rem; }
    h1 {
      font-family: 'Noto Serif JP', serif;
      font-size: clamp(1.75rem, 4vw, 2.25rem);
      margin: 0 0 0.5rem;
    }
    .lead { color: rgba(232, 228, 240, 0.85); max-width: 40rem; margin: 0 0 2rem; }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 1rem;
    }
    .card {
      display: block;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 1.15rem;
      color: inherit;
      text-decoration: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .card:hover {
      border-color: var(--accent);
      box-shadow: 0 0 20px rgba(201, 82, 26, 0.2);
      text-decoration: none;
    }
    .card-jp {
      font-family: 'Noto Serif JP', serif;
      font-size: 1.5rem;
      color: var(--accent);
      margin: 0 0 0.15rem;
    }
    .card-en { font-weight: 600; margin: 0 0 0.35rem; }
    .card-blurb { font-size: 0.85rem; color: rgba(232, 228, 240, 0.75); margin: 0 0 0.65rem; }
    .dots { display: flex; gap: 5px; }
    .dots span {
      width: 1.1rem; height: 1.1rem; border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.2);
    }
    .jmc-block {
      margin-top: 3rem;
      padding: 1.5rem;
      background: rgba(26, 44, 30, 0.4);
      border-radius: 8px;
      border-left: 4px solid var(--accent);
      font-size: 0.95rem;
    }
    .jmc-block p { margin: 0.5rem 0; }
    footer { margin-top: 2.5rem; font-size: 0.85rem; opacity: 0.55; }
  </style>
</head>
<body>
  <div class="wrap">
    <a href="/index.php" class="back">← CSSKitsune</a>
    <h1>Yokai Web Themes</h1>
    <p class="lead">20 CSS palettes inspired by Japanese mythological spirits — each with tokens, typography, and lore.</p>

    <div class="grid" role="list">
      <?php foreach ($all as $y): ?>
      <a class="card" href="<?php echo htmlspecialchars($y['page_url']); ?>" role="listitem">
        <p class="card-jp" lang="ja"><?php echo htmlspecialchars($y['name_jp']); ?></p>
        <p class="card-en"><?php echo htmlspecialchars($y['name_en']); ?></p>
        <p class="card-blurb"><?php echo htmlspecialchars($y['card_blurb']); ?></p>
        <div class="dots" aria-hidden="true">
          <?php foreach ($y['hub_colors'] as $c): ?>
          <span style="background:<?php echo htmlspecialchars($c); ?>"></span>
          <?php endforeach; ?>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="jmc-block">
      <p><strong>Learn the mythology behind these spirits →</strong></p>
      <p><a href="https://japanesemythicalcreatures.com" rel="noopener">Japanese mythical creatures guide</a> — the complete guide to yokai, kami, and Japanese mythical beings on JapaneseMythicalCreatures.com.</p>
    </div>

    <footer>
      <a href="/kitsune/">Kitsune Web & Theme Maker</a> · <a href="/site-map.php">Sitemap</a>
    </footer>
  </div>
</body>
</html>
