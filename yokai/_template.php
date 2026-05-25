<?php
/** @var array $yokai */
if (!isset($yokai) || !isset($meta)) {
    http_response_code(500);
    exit('Yokai config missing');
}
$all = yokai_all_configs();
$cssBlock = yokai_css_block($yokai['css_vars']);
$bg = $yokai['css_vars']['--yokai-background'];
$text = $yokai['css_vars']['--yokai-text'];
$primary = $yokai['css_vars']['--yokai-primary'];
$accent = $yokai['css_vars']['--yokai-accent'];
$fontDisplay = rawurlencode($yokai['font_display']);
$fontBody = rawurlencode(str_replace(' ', '+', $yokai['font_body']));
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "<?php echo htmlspecialchars($yokai['name_en'] . ' CSS Theme', ENT_QUOTES, 'UTF-8'); ?>",
    "description": "<?php echo htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8'); ?>",
    "url": "<?php echo htmlspecialchars($meta['canonical'], ENT_QUOTES, 'UTF-8'); ?>",
    "about": {
      "@type": "Thing",
      "name": "<?php echo htmlspecialchars($yokai['name_en'], ENT_QUOTES, 'UTF-8'); ?>",
      "sameAs": "<?php echo htmlspecialchars($yokai['jmc_url'], ENT_QUOTES, 'UTF-8'); ?>"
    }
  }
  </script>
  <style>
    :root {
      --y-primary: <?php echo $primary; ?>;
      --y-accent: <?php echo $accent; ?>;
      --y-bg: <?php echo $bg; ?>;
      --y-text: <?php echo $text; ?>;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'DM Sans', system-ui, sans-serif;
      background: var(--y-bg);
      color: var(--y-text);
      line-height: 1.65;
    }
    a { color: var(--y-accent); }
    .wrap { max-width: 42rem; margin: 0 auto; padding: 1.5rem; }
    .crumb { font-size: 0.85rem; margin-bottom: 1.5rem; opacity: 0.75; }
    .crumb a { color: inherit; }
    .hero {
      padding: 2.5rem 0 2rem;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      margin-bottom: 2rem;
    }
    .hero-jp {
      font-family: 'Noto Serif JP', serif;
      font-size: 3rem;
      margin: 0;
      color: var(--y-primary);
      line-height: 1.1;
    }
    .hero-en {
      font-family: 'Noto Serif JP', serif;
      font-size: 1.75rem;
      margin: 0.25rem 0 0.75rem;
    }
    .hero-desc { margin: 0 0 1rem; opacity: 0.9; }
    .swatch-strip { display: flex; gap: 6px; }
    .swatch-strip span {
      width: 2.5rem; height: 2.5rem; border-radius: 50%;
      border: 2px solid rgba(255,255,255,0.2);
    }
    h2 {
      font-family: 'Noto Serif JP', serif;
      font-size: 1.2rem;
      margin: 2rem 0 1rem;
      padding-bottom: 0.35rem;
      border-bottom: 1px solid rgba(255,255,255,0.12);
    }
    .palette-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 0.75rem;
    }
    .palette-tile {
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.15);
      cursor: pointer;
      transition: transform 0.15s;
    }
    .palette-tile:hover { transform: translateY(-2px); }
    .palette-tile:focus { outline: 2px solid var(--y-accent); outline-offset: 2px; }
    .palette-tile .chip { height: 4.5rem; }
    .palette-tile .meta {
      padding: 0.5rem 0.65rem;
      font-size: 0.75rem;
      background: rgba(0,0,0,0.25);
    }
    .palette-tile .meta code { display: block; opacity: 0.85; margin-top: 0.15rem; }
    .code-block {
      background: rgba(0,0,0,0.35);
      padding: 1rem;
      border-radius: 6px;
      font-size: 0.8rem;
      overflow-x: auto;
      font-family: ui-monospace, monospace;
      border: 1px solid rgba(255,255,255,0.1);
      white-space: pre-wrap;
    }
    .btn-row { margin-top: 0.75rem; }
    .btn {
      padding: 0.6rem 1.1rem;
      font-size: 0.9rem;
      font-weight: 600;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background: var(--y-primary);
      color: var(--y-bg);
      font-family: inherit;
    }
    .btn.copied { background: var(--y-accent); }
    .type-card {
      background: rgba(0,0,0,0.2);
      padding: 1.25rem;
      border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.1);
    }
    .type-display {
      font-family: 'Noto Serif JP', serif;
      font-size: 1.35rem;
      margin: 0 0 0.5rem;
      color: var(--y-primary);
    }
    .type-body { font-family: 'DM Sans', sans-serif; margin: 0; }
    .lore-card {
      background: rgba(0,0,0,0.25);
      border-left: 4px solid var(--y-primary);
      padding: 1.25rem;
      border-radius: 0 8px 8px 0;
      margin: 2rem 0;
    }
    .lore-card p { margin: 0.35rem 0; }
    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 0.75rem;
    }
    .related-card {
      display: block;
      padding: 1rem;
      border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.12);
      text-decoration: none;
      color: inherit;
      background: rgba(0,0,0,0.15);
    }
    .related-card:hover { border-color: var(--y-primary); text-decoration: none; }
    .related-card .jp { font-family: 'Noto Serif JP', serif; font-size: 1.25rem; color: var(--y-primary); }
    .related-dots { display: flex; gap: 4px; margin-top: 0.5rem; }
    .related-dots span { width: 14px; height: 14px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.2); }
    footer { margin-top: 3rem; padding-top: 1.5rem; font-size: 0.85rem; opacity: 0.55; border-top: 1px solid rgba(255,255,255,0.1); }
  </style>
</head>
<body>
  <div class="wrap">
    <nav class="crumb" aria-label="Breadcrumb">
      <a href="/index.php">CSSKitsune</a> → <a href="/yokai/">Yokai Themes</a> → <?php echo htmlspecialchars($yokai['name_en']); ?>
    </nav>

    <header class="hero">
      <p class="hero-jp" lang="ja"><?php echo htmlspecialchars($yokai['name_jp']); ?></p>
      <h1 class="hero-en"><?php echo htmlspecialchars($yokai['name_en']); ?> CSS Theme</h1>
      <p class="hero-desc"><?php echo htmlspecialchars($yokai['description']); ?></p>
      <div class="swatch-strip" aria-hidden="true">
        <?php foreach ($yokai['hub_colors'] as $c): ?>
        <span style="background:<?php echo htmlspecialchars($c); ?>"></span>
        <?php endforeach; ?>
      </div>
    </header>

    <section aria-labelledby="palette-heading">
      <h2 id="palette-heading">Color palette</h2>
      <div class="palette-grid">
        <?php foreach ($yokai['palette'] as $i => $color):
          $varName = $i === 0 ? '--yokai-primary' : ($i === 1 ? '--yokai-accent' : '--yokai-' . strtolower(preg_replace('/\s+/', '-', $color['name'])));
        ?>
        <button type="button" class="palette-tile" data-copy="<?php echo htmlspecialchars($color['hex']); ?>" title="Click to copy hex">
          <div class="chip" style="background:<?php echo htmlspecialchars($color['hex']); ?>"></div>
          <div class="meta">
            <strong><?php echo htmlspecialchars($color['name']); ?></strong>
            <code><?php echo htmlspecialchars($color['hex']); ?></code>
          </div>
        </button>
        <?php endforeach; ?>
      </div>
    </section>

    <section aria-labelledby="css-heading">
      <h2 id="css-heading">CSS variables</h2>
      <pre class="code-block" id="yokai-css"><?php echo htmlspecialchars($cssBlock); ?></pre>
      <div class="btn-row">
        <button type="button" class="btn" id="copy-css-btn">Copy CSS</button>
      </div>
    </section>

    <section aria-labelledby="type-heading">
      <h2 id="type-heading">Typography</h2>
      <div class="type-card">
        <p class="type-display" lang="ja"><?php echo htmlspecialchars($yokai['name_jp']); ?> — <?php echo htmlspecialchars($yokai['name_en']); ?></p>
        <p class="type-body">Display: <?php echo htmlspecialchars($yokai['font_display']); ?> · Body: <?php echo htmlspecialchars($yokai['font_body']); ?>. Use this pairing for headings and UI on <?php echo htmlspecialchars(strtolower($yokai['name_en'])); ?>-themed websites.</p>
      </div>
    </section>

    <aside class="lore-card" aria-labelledby="lore-heading">
      <h2 id="lore-heading" style="margin-top:0;border:0;padding:0;font-size:1rem;">📖 Learn the mythology</h2>
      <p>Curious about <?php echo htmlspecialchars($yokai['name_en']); ?> in Japanese folklore?</p>
      <p>Read the full lore, history, and cultural significance on JapaneseMythicalCreatures.com.</p>
      <p><a href="<?php echo htmlspecialchars($yokai['jmc_url']); ?>" rel="noopener"><?php echo htmlspecialchars($yokai['jmc_anchor']); ?></a></p>
    </aside>

    <?php if (!empty($yokai['related'])): ?>
    <section aria-labelledby="related-heading">
      <h2 id="related-heading">Related yokai themes</h2>
      <div class="related-grid">
        <?php foreach ($yokai['related'] as $relSlug):
          if (!isset($all[$relSlug])) continue;
          $rel = $all[$relSlug];
        ?>
        <a class="related-card" href="<?php echo htmlspecialchars($rel['page_url']); ?>">
          <span class="jp" lang="ja"><?php echo htmlspecialchars($rel['name_jp']); ?></span>
          <span><?php echo htmlspecialchars($rel['name_en']); ?></span>
          <div class="related-dots" aria-hidden="true">
            <?php foreach ($rel['hub_colors'] as $c): ?>
            <span style="background:<?php echo htmlspecialchars($c); ?>"></span>
            <?php endforeach; ?>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

    <footer>
      <a href="/yokai/">← All yokai themes</a> · <a href="/kitsune/">Kitsune Web</a> · <a href="/index.php">CSSKitsune</a>
    </footer>
  </div>
  <script>
    (function () {
      var cssEl = document.getElementById('yokai-css');
      var btn = document.getElementById('copy-css-btn');
      function copyText(text, el) {
        navigator.clipboard.writeText(text).then(function () {
          if (el) {
            var orig = el.textContent;
            el.textContent = 'Copied ✓';
            el.classList.add('copied');
            setTimeout(function () { el.textContent = orig; el.classList.remove('copied'); }, 2000);
          }
        });
      }
      if (btn && cssEl) {
        btn.addEventListener('click', function () { copyText(cssEl.textContent, btn); });
      }
      document.querySelectorAll('.palette-tile').forEach(function (tile) {
        tile.addEventListener('click', function () {
          copyText(tile.getAttribute('data-copy'), null);
        });
      });
    })();
  </script>
</body>
</html>
