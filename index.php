<?php
require_once __DIR__ . '/includes/seo-config.php';
$canonical = SITE_URL . '/';
$title = 'CSSKitsune — The Japanese Design System for AI-Era Developers';
$description = 'Shizen Design System: aesthetic tokens, cultural vocabulary, and AI-ready prompts for authentic Japanese-style UI.';
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
  <meta name="keywords" content="Japanese design system, Shizen, CSS tokens, AI prompts, wabi-sabi UI, Japanese aesthetics, design tokens, Cursor prompts, Figma Japanese style">
  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars(SITE_DEFAULT_OG_IMAGE); ?>">
  <meta property="og:locale" content="en_US">
  <meta property="og:site_name" content="<?php echo htmlspecialchars(SITE_NAME); ?>">
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars(SITE_DEFAULT_OG_IMAGE); ?>">
  <style>
    :root {
      --bg: #F5F0E8;
      --text: #2C2C2C;
      --muted: #6B6B6B;
      --accent: #8B7355;
      --paper: #FFFEF9;
      --ink: #1a1a1a;
    }
    * { box-sizing: border-box; }
    .skip-link {
      position: absolute;
      top: -2.5rem;
      left: 0.5rem;
      padding: 0.5rem 0.75rem;
      background: var(--accent);
      color: var(--paper);
      font-size: 0.9rem;
      text-decoration: none;
      z-index: 100;
      border-radius: 4px;
      transition: top 0.2s;
    }
    .skip-link:focus { top: 0.5rem; outline: 2px solid var(--ink); outline-offset: 2px; }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      line-height: 1.6;
      position: relative;
    }
    main {
      max-width: 40rem;
      width: 100%;
      text-align: center;
    }
    h1 {
      font-size: clamp(1.75rem, 4vw, 2.25rem);
      font-weight: 600;
      color: var(--ink);
      margin: 0 0 0.75rem;
      letter-spacing: -0.02em;
    }
    .tagline {
      font-size: 1.125rem;
      color: var(--muted);
      margin: 0 0 2.5rem;
    }
    .logo-mark {
      display: block;
      width: 72px;
      height: 72px;
      margin: 0 auto 1.25rem;
      opacity: 0.85;
    }
    .logo-mark path {
      fill: var(--accent);
    }
    .site-name {
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--accent);
      margin: 0 0 1rem;
    }
    .teaser {
      font-size: 0.9rem;
      color: var(--muted);
      margin: 0 0 2rem;
      padding: 1rem;
      border-left: 3px solid var(--accent);
      text-align: left;
      background: var(--paper);
      border-radius: 0 4px 4px 0;
    }
    .teaser strong { color: var(--text); }
    .explore {
      margin: 2rem 0;
      text-align: left;
    }
    .explore h2 {
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin: 0 0 1rem;
      text-align: center;
    }
    .explore-grid {
      display: grid;
      gap: 1rem;
      grid-template-columns: 1fr;
    }
    @media (min-width: 32rem) {
      .explore-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 48rem) {
      .explore-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .explore-card {
      background: var(--paper);
      padding: 1.25rem;
      border-radius: 6px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.06);
      border: 1px solid rgba(0,0,0,0.04);
    }
    .explore-card a.card-title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--ink);
      text-decoration: none;
      display: block;
      margin-bottom: 0.35rem;
    }
    .explore-card a.card-title:hover { color: var(--accent); }
    .explore-card p {
      margin: 0;
      font-size: 0.9rem;
      color: var(--muted);
      line-height: 1.5;
    }
    footer {
      margin-top: auto;
      padding-top: 2rem;
      font-size: 0.85rem;
      color: var(--muted);
      width: 100%;
      max-width: 52rem;
    }
    footer a { color: var(--accent); text-decoration: none; }
    footer a:hover { text-decoration: underline; }
    .network {
      margin-bottom: 1.5rem;
      padding: 1.5rem;
      background: var(--paper);
      border-radius: 6px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .network h2 {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent);
      margin: 0 0 1rem;
    }
    .network-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(14rem, 1fr));
      gap: 0.75rem;
    }
    .network-item {
      text-align: left;
    }
    .network-item a {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text);
      margin-bottom: 0.1rem;
    }
    .network-item a:hover { color: var(--accent); }
    .network-item span {
      font-size: 0.8rem;
      color: var(--muted);
    }
    .copyright {
      text-align: center;
      font-size: 0.8rem;
      color: var(--muted);
      padding-top: 0.75rem;
      border-top: 1px solid #e5e0d8;
    }
  </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F688QNHLXE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-F688QNHLXE');
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "<?php echo htmlspecialchars(SITE_NAME); ?>",
      "url": "<?php echo htmlspecialchars(SITE_URL); ?>",
      "description": "<?php echo htmlspecialchars($description); ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": { "@type": "EntryPoint", "urlTemplate": "<?php echo htmlspecialchars(SITE_URL); ?>/prompt-builder.php" },
        "query-input": "required name=platform"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "<?php echo htmlspecialchars(SITE_NAME); ?>",
      "url": "<?php echo htmlspecialchars(SITE_URL); ?>",
      "description": "Shizen Design System — Japanese aesthetic tokens and AI-ready prompts for developers and designers."
    }
    </script>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="1ehiM7USOi9S04jmBe0uJA" async></script>
</head>
<body>
  <a href="#main" class="skip-link">Skip to content</a>
  <main id="main">
    <svg class="logo-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" aria-label="CSSKitsune logo">
      <path d="M596.29,194.4s18.77-40.38,12.72-98.27c-111.94,55.97-153.69,166.31-153.69,166.31,43.61-32.82,95.09-53.32,140.97-68.04Z"/>
      <path d="M410.14,669.56s-83.04,44.65-177.57,21.09c-90.76-22.62-167.83-59.06-167.83-59.06,0,0,34.55,76.87,122.16,118.69,76.79,36.65,194.88,19.78,223.24-80.71Z"/>
      <path d="M624.75,654.42s-91.72-34.45-166.51,28.68c-65.64,55.41-85.47,125.05-208.8,116.9,57.02,43.38,147.9,61.66,209.15,26.51,74.51-42.76,65.06-140.62,166.16-172.1Z"/>
      <path d="M643.29,578.86s9.11,15.6,13.09,41.12c0-.01-.02-.02-.02-.03,0,0,10.37,77.96-94.52,123.49,19.34,8.14,51.05,6.69,65.56-2.3-39.48,64.6-135.9,132.17-238.91,128.68,123.03,47.12,254.07,19.05,310.78-59.38,53.47-73.95,64.49-194.97-55.97-231.57Z"/>
      <path d="M680.06,443.96s62.22,52.7,73.76,150.29c-26.24-9.44-39.35-15.39-39.35-15.39,0,0,121.93,111.2-7.22,289.21,123.21-48.33,170.44-190.49,135.98-284.61-44.69-122.06-163.17-139.5-163.17-139.5Z"/>
      <path d="M895.5,436.84c-86.63-98.5-228.77-59.82-228.77-59.82,0,0,88.23,34.39,147.53,100.71,49.62,55.49,82.64,134.67,74.79,230.65,53.81-43.21,66.46-203.31,6.45-271.54Z"/>
      <path d="M701.3,341.03s161.72-26.18,225.73,81.81c4.63-94.02-75.56-139.21-110.21-140.26l7.32-38.83s-77.54,12.88-122.84,97.28Z"/>
      <path d="M272.85,660.72c41.98,15.74,125.71-13.6,191.69-35.33,87.11-28.69,162.31,0,162.31,0,0,0,8.4-30.78-39.18-71.36,36.38-13.99,116.13,5.6,116.13,5.6,0,0-22.39-93.75-102.14-120.33,26.63-16.45,85.53-23.36,85.53-23.36,0,0-35.99-27.92-91.12-35.4,124.53-53.17,166.51-200.09,166.51-200.09,0,0-158.11,22.39-261.65,81.15-103.54,58.77-149.72,188.89-177.7,254.66-27.98,65.76-76.96,109.14-76.96,109.14,0,0-4.9,21.69,26.58,35.33ZM412.24,443.02c33.89-36.97,79.25-59.79,79.25-59.79,0,0-15.97,42.65-45.16,62.11-29.2,19.47-58.19,53.37-71.63,71.83-10.42,14.32-18.54,26.88-21.32,30.59-2.78,3.71-9.27,5.1-9.27,5.1,0,0,23.6-61.27,68.13-109.84Z"/>
    </svg>
    <p class="site-name">CSSKitsune</p>
    <h1>The Japanese Design System for AI-Era Developers</h1>
    <p class="tagline">Shizen — aesthetic tokens, cultural vocabulary, and prompts for authentic Japanese-style UI.</p>

    <section class="explore" aria-labelledby="explore-heading">
      <h2 id="explore-heading">Explore</h2>
      <div class="explore-grid">
        <div class="explore-card">
          <a href="kitsune" class="card-title">Kitsune Web — Theme Maker</a>
          <p>Fox-spirit palette, live CSS variable generator, and kitsune website aesthetics.</p>
        </div>
        <div class="explore-card">
          <a href="prompt-builder.php" class="card-title">Shizen Prompt Builder</a>
          <p>Pick platform, aesthetic, season & mood → get a ready-to-paste AI prompt. Five palettes, live preview.</p>
        </div>
        <div class="explore-card">
          <a href="prompt-pack-wabi-sabi.php" class="card-title">Free Wabi-Sabi pack</a>
          <p>One palette, one prompt. Tokens, spacing, and copy-paste prompt — print or save as PDF.</p>
        </div>
        <div class="explore-card">
          <a href="spec.php" class="card-title">Spec v1.0</a>
          <p>Full specification: color tokens, ma-based spacing, typography, motion vocabulary, naming. CC BY 4.0.</p>
        </div>
        <div class="explore-card">
          <a href="guide.php" class="card-title">Japanese UI principles guide</a>
          <p>Ma, wabi-sabi, kisetsukan — how they translate into UI and CSS. Practical guide with links to tokens and prompts.</p>
        </div>
        <div class="explore-card">
          <a href="cursor-prompts.php" class="card-title">Cursor, Webflow, OBS, Godot & Defold</a>
          <p>Copy-paste prompts and CSS for each platform. One page per tool.</p>
        </div>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/includes/shinto-promo.php'; ?>
  <footer>
    <div class="network">
      <h2>🏯 Japanese Culture Network</h2>
      <div class="network-grid">
        <div class="network-item">
          <a href="https://japanesemythicalcreatures.com" target="_blank" rel="noopener">⛩️ Japanese Mythical Creatures</a>
          <span>Yokai, oni & kitsune folklore directory</span>
        </div>
        <div class="network-item">
          <a href="https://kohibou.com" target="_blank" rel="noopener">☕ Kohibou</a>
          <span>Japanese coffee culture & kissaten guides</span>
        </div>
        <div class="network-item">
          <a href="https://shrinepuzzle.com" target="_blank" rel="noopener">🎮 ShrinePuzzle</a>
          <span>Japanese board games & traditional games</span>
        </div>
        <div class="network-item">
          <a href="https://japanesewoodjoints.com" target="_blank" rel="noopener">🪵 Japanese Wood Joints</a>
          <span>Ancient joinery of Japanese master craftsmen</span>
        </div>
        <div class="network-item">
          <a href="https://e2japan.com" target="_blank" rel="noopener">🗾 E2Japan</a>
          <span>Explore Japan's landmarks, shrines & hidden spots</span>
        </div>
        <div class="network-item">
          <a href="https://the725club.com" target="_blank" rel="noopener">🎮 The 725 Club</a>
          <span>SNES & Super Famicom collection tracker</span>
        </div>
        <div class="network-item">
          <a href="https://spaceshipadventures.com" target="_blank" rel="noopener">🚀 Spaceship Adventures</a>
          <span>Hoshi no Isan — Japanese-aesthetic space RPG</span>
        </div>
        <div class="network-item">
          <a href="https://japaninpixels.com" target="_blank" rel="noopener">🗺️ Japan In Pixels</a>
          <span>A pixel art map of Japanese culture</span>
        </div>
      </div>
    </div>
    <div class="copyright">
      &copy; <?php echo date('Y'); ?> CSSKitsune &mdash; Part of the Japan Culture Network · <a href="site-map.php">Sitemap</a>
    </div>
  </footer>
</body>
</html>
