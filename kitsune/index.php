<?php
require_once __DIR__ . '/../includes/seo-config.php';
require_once __DIR__ . '/../yokai/yokai-data.php';

$meta = [
    'title'       => 'Kitsune Web — CSS Theme Maker & Kitsune Design System | CSSKitsune',
    'description' => 'Build beautiful kitsune-themed websites with the Kitsune Web Design System. Use our free kitsune theme maker to generate CSS variables inspired by Japanese fox spirit aesthetics.',
    'canonical'   => SITE_URL . '/kitsune/',
];

$yokaiAll = yokai_all_configs();
$featuredYokaiSlugs = ['kitsune', 'tengu', 'oni', 'tanuki', 'yuki-onna', 'kappa'];
$featuredYokai = array_map(fn ($s) => $yokaiAll[$s], $featuredYokaiSlugs);

$swatches = [
    ['name' => 'Kitsune Ember',   'hex' => '#C9521A', 'var' => '--kitsune-ember'],
    ['name' => 'Twilight Indigo', 'hex' => '#2D2B55', 'var' => '--kitsune-indigo'],
    ['name' => 'Fox Cream',       'hex' => '#F5ECD7', 'var' => '--kitsune-cream'],
    ['name' => 'Sacred Gold',     'hex' => '#D4A827', 'var' => '--kitsune-gold'],
    ['name' => 'Forest Shadow',   'hex' => '#1A2C1E', 'var' => '--kitsune-forest'],
    ['name' => 'Moonlit Mist',    'hex' => '#E8E4F0', 'var' => '--kitsune-mist'],
];

$starCount = 36;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <title><?php echo htmlspecialchars($meta['title']); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($meta['canonical']); ?>">
  <meta name="theme-color" content="#0F0D1A">
  <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($meta['canonical']); ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo htmlspecialchars(SITE_DEFAULT_OG_IMAGE); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars(SITE_NAME); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Kitsune Web — CSS Theme Maker",
    "description": "<?php echo htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8'); ?>",
    "url": "<?php echo htmlspecialchars($meta['canonical'], ENT_QUOTES, 'UTF-8'); ?>"
  }
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  <style>
    :root {
      --kitsune-ember: #C9521A;
      --kitsune-indigo: #2D2B55;
      --kitsune-cream: #F5ECD7;
      --kitsune-gold: #D4A827;
      --kitsune-forest: #1A2C1E;
      --kitsune-mist: #E8E4F0;
      --kitsune-dark: #0F0D1A;
      --font-display: 'Noto Serif JP', serif;
      --font-body: 'DM Sans', system-ui, sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      font-family: var(--font-body);
      background: var(--kitsune-dark);
      color: var(--kitsune-cream);
      line-height: 1.65;
    }
    a { color: var(--kitsune-gold); text-decoration: none; }
    a:hover { text-decoration: underline; }
    .skip-link {
      position: absolute;
      top: -3rem;
      left: 0.75rem;
      padding: 0.5rem 0.75rem;
      background: var(--kitsune-ember);
      color: var(--kitsune-cream);
      z-index: 200;
      border-radius: 4px;
    }
    .skip-link:focus { top: 0.75rem; outline: 2px solid var(--kitsune-gold); }

    /* Hero */
    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: var(--kitsune-dark);
      padding: 4rem 1.5rem 3rem;
    }
    .hero-torii {
      position: absolute;
      right: -8%;
      top: 50%;
      transform: translateY(-50%);
      width: min(70vw, 520px);
      opacity: 0.1;
      pointer-events: none;
    }
    .hero-stars {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
    }
    .star {
      position: absolute;
      width: 3px;
      height: 3px;
      background: var(--kitsune-mist);
      border-radius: 50%;
      opacity: 0.35;
      animation: star-shimmer 4s ease-in-out infinite;
    }
    @keyframes star-shimmer {
      0%, 100% { opacity: 0.2; transform: scale(1); }
      50% { opacity: 0.85; transform: scale(1.35); }
    }
    .hero-inner {
      position: relative;
      z-index: 2;
      max-width: 72rem;
      margin: 0 auto;
      width: 100%;
      display: grid;
      grid-template-columns: 1fr;
      gap: 2rem;
      align-items: center;
    }
    @media (min-width: 900px) {
      .hero-inner { grid-template-columns: 1.1fr 0.9fr; gap: 3rem; }
    }
    .hero-kanji {
      font-family: var(--font-display);
      font-size: clamp(2.5rem, 6vw, 3.75rem);
      font-weight: 700;
      line-height: 1.15;
      margin: 0 0 0.5rem;
      color: var(--kitsune-cream);
    }
    .hero-kanji .jp { color: var(--kitsune-ember); margin-right: 0.35rem; }
    .hero h1 {
      font-family: var(--font-display);
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 400;
      margin: 0 0 1rem;
      color: var(--kitsune-mist);
      letter-spacing: 0.02em;
    }
    .hero-lead {
      font-size: 1.05rem;
      max-width: 36rem;
      color: rgba(245, 236, 215, 0.88);
      margin: 0 0 1.75rem;
    }
    .hero-cta {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem;
    }
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0.75rem 1.35rem;
      font-size: 0.95rem;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      font-family: var(--font-body);
      text-decoration: none;
      transition: opacity 0.2s, transform 0.15s;
    }
    .btn:hover { text-decoration: none; opacity: 0.92; transform: translateY(-1px); }
    .btn-primary {
      background: var(--kitsune-ember);
      color: var(--kitsune-cream);
      box-shadow: 0 0 28px rgba(201, 82, 26, 0.45);
    }
    .btn-secondary {
      background: transparent;
      color: var(--kitsune-gold);
      border: 1px solid rgba(212, 168, 39, 0.5);
    }
    .hero-fox-wrap {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .hero-fox {
      width: min(100%, 380px);
      height: auto;
      filter: drop-shadow(0 0 40px rgba(201, 82, 26, 0.6)) drop-shadow(0 0 80px rgba(201, 82, 26, 0.25));
    }
    .site-nav {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 72rem;
      margin: 0 auto;
    }
    .site-nav a { font-size: 0.9rem; color: var(--kitsune-mist); }
    .site-nav .brand { font-family: var(--font-display); font-weight: 700; color: var(--kitsune-cream); }

    /* Sections */
    .section {
      padding: 4rem 1.5rem;
      max-width: 72rem;
      margin: 0 auto;
    }
    .section-alt {
      background: linear-gradient(180deg, rgba(45, 43, 85, 0.35) 0%, transparent 100%);
    }
    h2 {
      font-family: var(--font-display);
      font-size: clamp(1.5rem, 3vw, 2rem);
      font-weight: 700;
      margin: 0 0 1.25rem;
      color: var(--kitsune-cream);
    }
    h3 {
      font-family: var(--font-display);
      font-size: 1.1rem;
      font-weight: 600;
      margin: 0 0 0.75rem;
      color: var(--kitsune-mist);
    }

    /* SEO block */
    .seo-grid {
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 2rem;
      align-items: start;
    }
    @media (max-width: 640px) {
      .seo-grid { grid-template-columns: 1fr; }
      .seo-ornament { display: none; }
    }
    .seo-ornament {
      writing-mode: vertical-rl;
      text-orientation: mixed;
      font-family: var(--font-display);
      font-size: 1.5rem;
      letter-spacing: 0.35em;
      color: var(--kitsune-ember);
      opacity: 0.55;
      padding: 0.5rem 0;
    }
    .seo-copy blockquote {
      margin: 0 0 1.5rem;
      padding-left: 1rem;
      border-left: 3px solid var(--kitsune-ember);
      font-style: italic;
      color: rgba(245, 236, 215, 0.9);
    }
    .feature-cards {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-top: 2rem;
    }
    @media (max-width: 720px) {
      .feature-cards { grid-template-columns: 1fr; }
    }
    .feature-card {
      background: rgba(45, 43, 85, 0.4);
      border: 1px solid rgba(232, 228, 240, 0.12);
      border-radius: 8px;
      padding: 1.25rem;
    }
    .feature-card .icon { font-size: 1.5rem; margin-bottom: 0.5rem; }
    .feature-card strong {
      display: block;
      font-size: 0.95rem;
      margin-bottom: 0.35rem;
      color: var(--kitsune-cream);
    }
    .feature-card span { font-size: 0.85rem; color: rgba(232, 228, 240, 0.75); }

    /* Swatches */
    .swatch-row {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem;
      margin-top: 1.5rem;
    }
    .swatch {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.8rem;
      color: rgba(232, 228, 240, 0.8);
    }
    .swatch-dot {
      width: 2rem;
      height: 2rem;
      border-radius: 50%;
      border: 2px solid rgba(255,255,255,0.15);
    }

    /* Theme maker */
    #theme-maker {
      scroll-margin-top: 2rem;
    }
    .maker-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 2rem;
    }
    @media (min-width: 900px) {
      .maker-grid { grid-template-columns: 1fr 1fr; }
    }
    .maker-panel {
      background: rgba(26, 44, 30, 0.5);
      border: 1px solid rgba(201, 82, 26, 0.25);
      border-radius: 10px;
      padding: 1.5rem;
    }
    .maker-panel label {
      display: block;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 0.35rem;
      color: var(--kitsune-mist);
    }
    .color-field {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 1rem;
    }
    .color-field input[type="color"] {
      width: 3rem;
      height: 2.25rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background: transparent;
    }
    .color-field code {
      font-size: 0.8rem;
      color: rgba(232, 228, 240, 0.7);
    }
    .preset-row {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1.25rem;
    }
    .preset-btn {
      padding: 0.45rem 0.85rem;
      font-size: 0.8rem;
      font-weight: 500;
      background: rgba(45, 43, 85, 0.6);
      color: var(--kitsune-cream);
      border: 1px solid rgba(212, 168, 39, 0.3);
      border-radius: 999px;
      cursor: pointer;
      font-family: var(--font-body);
    }
    .preset-btn:hover { border-color: var(--kitsune-gold); }
    .css-output {
      background: #080612;
      border: 1px solid rgba(232, 228, 240, 0.15);
      border-radius: 6px;
      padding: 1rem;
      font-family: ui-monospace, 'Cascadia Code', monospace;
      font-size: 0.8rem;
      white-space: pre-wrap;
      color: var(--kitsune-mist);
      margin: 1rem 0;
      min-height: 7rem;
    }
    .btn-copy {
      background: var(--kitsune-gold);
      color: var(--kitsune-dark);
    }
    .preview-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 12px 40px rgba(0,0,0,0.45);
      min-height: 280px;
    }
    .preview-header {
      padding: 0.65rem 1rem;
      font-size: 0.75rem;
      font-weight: 600;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .preview-body { padding: 1.25rem 1rem 1.5rem; }
    .preview-nav {
      display: flex;
      gap: 0.75rem;
      font-size: 0.7rem;
      opacity: 0.75;
      margin-bottom: 1rem;
    }
    .preview-badge {
      display: inline-block;
      font-size: 0.65rem;
      font-weight: 600;
      padding: 0.2rem 0.55rem;
      border-radius: 999px;
      margin-bottom: 0.75rem;
    }
    .preview-title {
      font-family: var(--font-display);
      font-size: 1.15rem;
      margin: 0 0 0.5rem;
    }
    .preview-text { font-size: 0.85rem; opacity: 0.9; margin: 0 0 1rem; line-height: 1.5; }
    .preview-btn {
      display: inline-block;
      padding: 0.45rem 1rem;
      font-size: 0.8rem;
      font-weight: 600;
      border-radius: 4px;
      border: none;
    }

    /* Pack scroll */
    .pack-scroll {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding-bottom: 0.75rem;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
    }
    .pack-card {
      flex: 0 0 min(260px, 85vw);
      scroll-snap-align: start;
      background: rgba(45, 43, 85, 0.35);
      border: 1px solid rgba(232, 228, 240, 0.12);
      border-radius: 10px;
      padding: 1.25rem;
      display: block;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    a.pack-card:hover {
      border-color: var(--kitsune-ember);
      box-shadow: 0 0 20px rgba(201, 82, 26, 0.2);
      text-decoration: none;
    }
    .pack-card.active {
      border-color: var(--kitsune-ember);
      box-shadow: 0 0 24px rgba(201, 82, 26, 0.25);
      background: rgba(201, 82, 26, 0.08);
    }
    .pack-card h3 { margin: 0 0 0.35rem; font-size: 1rem; }
    .pack-dots {
      display: flex;
      gap: 4px;
      margin: 0.75rem 0;
    }
    .pack-dots span {
      width: 1.25rem;
      height: 1.25rem;
      border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.2);
    }
    .pack-card p {
      margin: 0;
      font-size: 0.85rem;
      color: rgba(232, 228, 240, 0.75);
    }
    .pack-cta { margin-top: 1.5rem; }

    /* SEO footer */
    .seo-footer {
      max-width: 48rem;
      font-size: 0.875rem;
      opacity: 0.6;
      color: var(--kitsune-mist);
    }
    .seo-footer h3 {
      font-size: 0.95rem;
      opacity: 0.85;
      margin-bottom: 0.5rem;
    }

    footer.page-footer {
      text-align: center;
      padding: 2rem 1.5rem 3rem;
      font-size: 0.85rem;
      color: rgba(232, 228, 240, 0.5);
      border-top: 1px solid rgba(232, 228, 240, 0.1);
    }
  </style>
</head>
<body>
  <a href="#main" class="skip-link">Skip to content</a>

  <header class="site-nav" aria-label="Site">
    <a href="/index.php" class="brand">CSSKitsune</a>
    <a href="/index.php">← Home</a>
  </header>

  <section class="hero" aria-labelledby="hero-heading">
    <svg class="hero-torii" viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <rect x="20" y="48" width="160" height="14" rx="3" fill="#C9521A"/>
      <rect x="32" y="64" width="136" height="10" rx="2" fill="#C9521A" opacity="0.7"/>
      <rect x="12" y="40" width="176" height="12" rx="3" fill="#C9521A" opacity="0.5"/>
      <rect x="48" y="74" width="18" height="150" rx="4" fill="#C9521A" opacity="0.85"/>
      <rect x="134" y="74" width="18" height="150" rx="4" fill="#C9521A" opacity="0.85"/>
    </svg>
    <div class="hero-stars" aria-hidden="true">
      <?php for ($i = 0; $i < $starCount; $i++):
        $top = rand(2, 98);
        $left = rand(1, 99);
        $delay = number_format(rand(0, 4000) / 1000, 2);
        $size = rand(2, 4);
      ?>
      <span class="star" style="top:<?php echo $top; ?>%;left:<?php echo $left; ?>%;width:<?php echo $size; ?>px;height:<?php echo $size; ?>px;animation-delay:<?php echo $delay; ?>s"></span>
      <?php endfor; ?>
    </div>
    <div class="hero-inner">
      <div>
        <p class="hero-kanji" id="hero-heading"><span class="jp" lang="ja">狐</span> Kitsune Web</p>
        <h1>The Design System for Japanese Fox Aesthetics</h1>
        <p class="hero-lead">Build atmospheric, Japan-inspired websites with Shizen's Kitsune theme pack — CSS variables, utility classes, and a free Kitsune Theme Maker.</p>
        <div class="hero-cta">
          <a href="#theme-maker" class="btn btn-primary">Try the Theme Maker ↓</a>
          <a href="/yokai/" class="btn btn-secondary">Explore Yokai Themes →</a>
        </div>
      </div>
      <div class="hero-fox-wrap">
        <!-- CSSKitsune brand mark: multi-tailed kitsune (from Kitsune logo), ember treatment -->
        <svg class="hero-fox" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Kitsune fox with fanned tails">
          <g fill="#C9521A">
            <path fill-opacity="0.72" d="M895.5,436.84c-86.63-98.5-228.77-59.82-228.77-59.82,0,0,88.23,34.39,147.53,100.71,49.62,55.49,82.64,134.67,74.79,230.65,53.81-43.21,66.46-203.31,6.45-271.54Z"/>
            <path fill-opacity="0.78" d="M680.06,443.96s62.22,52.7,73.76,150.29c-26.24-9.44-39.35-15.39-39.35-15.39,0,0,121.93,111.2-7.22,289.21,123.21-48.33,170.44-190.49,135.98-284.61-44.69-122.06-163.17-139.5-163.17-139.5Z"/>
            <path fill-opacity="0.82" d="M643.29,578.86s9.11,15.6,13.09,41.12c0-.01-.02-.02-.02-.03,0,0,10.37,77.96-94.52,123.49,19.34,8.14,51.05,6.69,65.56-2.3-39.48,64.6-135.9,132.17-238.91,128.68,123.03,47.12,254.07,19.05,310.78-59.38,53.47-73.95,64.49-194.97-55.97-231.57Z"/>
            <path fill-opacity="0.85" d="M624.75,654.42s-91.72-34.45-166.51,28.68c-65.64,55.41-85.47,125.05-208.8,116.9,57.02,43.38,147.9,61.66,209.15,26.51,74.51-42.76,65.06-140.62,166.16-172.1Z"/>
            <path fill-opacity="0.88" d="M410.14,669.56s-83.04,44.65-177.57,21.09c-90.76-22.62-167.83-59.06-167.83-59.06,0,0,34.55,76.87,122.16,118.69,76.79,36.65,194.88,19.78,223.24-80.71Z"/>
            <path fill-opacity="0.9" d="M701.3,341.03s161.72-26.18,225.73,81.81c4.63-94.02-75.56-139.21-110.21-140.26l7.32-38.83s-77.54,12.88-122.84,97.28Z"/>
            <path fill-opacity="0.92" d="M596.29,194.4s18.77-40.38,12.72-98.27c-111.94,55.97-153.69,166.31-153.69,166.31,43.61-32.82,95.09-53.32,140.97-68.04Z"/>
            <path fill-opacity="0.95" d="M272.85,660.72c41.98,15.74,125.71-13.6,191.69-35.33,87.11-28.69,162.31,0,162.31,0,0,0,8.4-30.78-39.18-71.36,36.38-13.99,116.13,5.6,116.13,5.6,0,0-22.39-93.75-102.14-120.33,26.63-16.45,85.53-23.36,85.53-23.36,0,0-35.99-27.92-91.12-35.4,124.53-53.17,166.51-200.09,166.51-200.09,0,0-158.11,22.39-261.65,81.15-103.54,58.77-149.72,188.89-177.7,254.66-27.98,65.76-76.96,109.14-76.96,109.14,0,0-4.9,21.69,26.58,35.33ZM412.24,443.02c33.89-36.97,79.25-59.79,79.25-59.79,0,0-15.97,42.65-45.16,62.11-29.2,19.47-58.19,53.37-71.63,71.83-10.42,14.32-18.54,26.88-21.32,30.59-2.78,3.71-9.27,5.1-9.27,5.1,0,0,23.6-61.27,68.13-109.84Z"/>
          </g>
          <path fill="none" stroke="#F5ECD7" stroke-opacity="0.22" stroke-width="6" stroke-linejoin="round" d="M412.24,443.02c33.89-36.97,79.25-59.79,79.25-59.79,0,0-15.97,42.65-45.16,62.11-29.2,19.47-58.19,53.37-71.63,71.83"/>
        </svg>
      </div>
    </div>
  </section>

  <main id="main">
    <section class="section section-alt" aria-labelledby="what-heading">
      <div class="seo-grid">
        <div class="seo-ornament" aria-hidden="true">狐の道</div>
        <div class="seo-copy">
          <h2 id="what-heading">What Makes a Kitsune Website?</h2>
          <blockquote>
            <p>In Japanese mythology, the kitsune is a fox spirit of intelligence, beauty, and transformation — a being that exists between worlds. A kitsune website carries that same duality: elegant and wild, ancient and modern, warm and mysterious.</p>
            <p>The Shizen Kitsune theme translates this spirit into CSS design tokens: ember oranges, twilight indigoes, sacred gold accents, and deep forest shadows — all calibrated for WCAG-accessible contrast on the web.</p>
          </blockquote>
          <div class="swatch-row" aria-label="Kitsune color tokens">
            <?php foreach ($swatches as $s): ?>
            <div class="swatch">
              <span class="swatch-dot" style="background:<?php echo htmlspecialchars($s['hex']); ?>"></span>
              <span><?php echo htmlspecialchars($s['name']); ?> <code><?php echo htmlspecialchars($s['var']); ?></code></span>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="feature-cards">
            <div class="feature-card">
              <div class="icon" aria-hidden="true">🦊</div>
              <strong>Fox Spirit Palette</strong>
              <span>6 hand-tuned color tokens</span>
            </div>
            <div class="feature-card">
              <div class="icon" aria-hidden="true">🎋</div>
              <strong>Torii Typography</strong>
              <span>Noto Serif JP + a modern grotesque pairing</span>
            </div>
            <div class="feature-card">
              <div class="icon" aria-hidden="true">✨</div>
              <strong>Motion Pack</strong>
              <span>Entrance animations inspired by mist and ember</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="theme-maker" aria-labelledby="maker-heading"
      x-data="{
        colors: {
          primary: '#C9521A',
          accent: '#D4A827',
          background: '#0F0D1A',
          text: '#F5ECD7',
        },
        presets: [
          { name: 'Ember Fox', primary: '#C9521A', accent: '#D4A827', background: '#0F0D1A', text: '#F5ECD7' },
          { name: 'Moonlit Shrine', primary: '#8B6BB1', accent: '#C9A96E', background: '#F0EDE8', text: '#1A1A2E' },
          { name: 'Forest Inari', primary: '#2D6A4F', accent: '#95C11F', background: '#1A2C1E', text: '#E8F5E9' },
          { name: 'Cherry Dusk', primary: '#D64C82', accent: '#FFB347', background: '#1C0D1A', text: '#FCE4EC' },
        ],
        copied: false,
        get cssOutput() {
          return `:root {\n  --kitsune-primary:    ${this.colors.primary};\n  --kitsune-accent:     ${this.colors.accent};\n  --kitsune-background: ${this.colors.background};\n  --kitsune-text:       ${this.colors.text};\n}`;
        },
        applyPreset(preset) {
          this.colors = { primary: preset.primary, accent: preset.accent, background: preset.background, text: preset.text };
        },
        copyCSS() {
          navigator.clipboard.writeText(this.cssOutput);
          this.copied = true;
          setTimeout(() => this.copied = false, 2000);
        }
      }">
      <h2 id="maker-heading">Kitsune Theme Maker</h2>
      <p style="color:rgba(232,228,240,0.8);max-width:40rem;margin:0 0 2rem;">Customize a kitsune web palette and copy ready-to-use CSS variables. Pick a preset or tune four colors — preview updates instantly.</p>

      <div class="maker-grid">
        <div class="maker-panel">
          <p style="font-size:0.85rem;color:var(--kitsune-mist);margin:0 0 0.75rem;">Presets</p>
          <div class="preset-row">
            <template x-for="preset in presets" :key="preset.name">
              <button type="button" class="preset-btn" @click="applyPreset(preset)" x-text="preset.name"></button>
            </template>
          </div>

          <div class="color-field">
            <label for="color-primary">Primary</label>
            <input id="color-primary" type="color" x-model="colors.primary">
            <code x-text="colors.primary"></code>
          </div>
          <div class="color-field">
            <label for="color-accent">Accent</label>
            <input id="color-accent" type="color" x-model="colors.accent">
            <code x-text="colors.accent"></code>
          </div>
          <div class="color-field">
            <label for="color-bg">Background</label>
            <input id="color-bg" type="color" x-model="colors.background">
            <code x-text="colors.background"></code>
          </div>
          <div class="color-field">
            <label for="color-text">Text</label>
            <input id="color-text" type="color" x-model="colors.text">
            <code x-text="colors.text"></code>
          </div>

          <pre class="css-output" x-text="cssOutput" aria-label="Generated CSS variables"></pre>
          <button type="button" class="btn btn-copy" @click="copyCSS()" x-text="copied ? 'Copied ✓' : 'Copy CSS'"></button>
        </div>

        <div>
          <p style="font-size:0.85rem;color:var(--kitsune-mist);margin:0 0 0.75rem;">Live preview</p>
          <div class="preview-card">
            <div class="preview-header" :style="{ backgroundColor: colors.primary, color: colors.text }">
              <span>kitsune.example</span>
              <span>☰</span>
            </div>
            <div class="preview-body" :style="{ backgroundColor: colors.background, color: colors.text }">
              <nav class="preview-nav" aria-hidden="true">
                <span>Home</span><span>Shrine</span><span>Tales</span>
              </nav>
              <span class="preview-badge" :style="{ backgroundColor: colors.accent, color: colors.background }">Fox Spirit</span>
              <h3 class="preview-title" :style="{ color: colors.text }">Kitsune Web — Theme Preview</h3>
              <p class="preview-text">A kitsune website balances ember warmth with twilight mystery — your palette, live.</p>
              <button type="button" class="preview-btn" :style="{ backgroundColor: colors.primary, color: colors.text }">Enter the shrine</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-alt" aria-labelledby="yokai-heading">
      <h2 id="yokai-heading">Explore Yokai Web Themes</h2>
      <p style="max-width:42rem;color:rgba(245,236,215,0.88);">Each yokai in Japanese mythology has a distinct spirit — and a distinct visual language. Browse our full collection of yokai CSS themes, each with its own palette, typography recommendation, and link to the mythological lore.</p>

      <div class="pack-scroll" role="list" aria-label="Featured yokai themes">
        <?php foreach ($featuredYokai as $y):
          $isKitsune = $y['slug'] === 'kitsune';
        ?>
        <a class="pack-card<?php echo $isKitsune ? ' active' : ''; ?>" href="<?php echo htmlspecialchars($y['page_url']); ?>" role="listitem" style="text-decoration:none;color:inherit;">
          <h3><span lang="ja"><?php echo htmlspecialchars($y['name_jp']); ?></span> <?php echo htmlspecialchars($y['name_en']); ?><?php if ($isKitsune): ?> <span style="color:var(--kitsune-ember);font-size:0.75rem;">· active</span><?php endif; ?></h3>
          <div class="pack-dots" aria-hidden="true">
            <?php foreach ($y['hub_colors'] as $c): ?>
            <span style="background:<?php echo htmlspecialchars($c); ?>"></span>
            <?php endforeach; ?>
          </div>
          <p><?php echo htmlspecialchars($y['card_blurb']); ?></p>
        </a>
        <?php endforeach; ?>
      </div>
      <p class="pack-cta"><a href="/yokai/" class="btn btn-secondary">View All 20 Yokai Themes →</a></p>
    </section>

    <section class="section">
      <div class="seo-footer">
        <h3>About Kitsune Web Design</h3>
        <p>A kitsune design system is a token set and visual language rooted in Japanese fox folklore — ember glow, shrine gold, forest shadow, and moonlit mist. Kitsune aesthetics work well for Japanese-inspired websites because they balance ceremonial restraint with spirit-world drama: readable type, accessible contrast, and atmosphere that feels intentional rather than generic “anime” styling. The Shizen kitsune color palette is built from six hand-tuned hues mapped to CSS custom properties, so developers can theme landing pages, games, streams, and editorial sites consistently. Teams use the CSSKitsune kitsune theme pack and kitsune maker for rapid theming, then wire variables into Tailwind, Webflow, Godot, or plain CSS — the same workflow as other Shizen packs, with a fox-spirit identity baked in from the start.</p>
      </div>
    </section>
  </main>

  <?php require __DIR__ . '/../includes/shinto-promo.php'; ?>

  <footer class="page-footer">
    <a href="/index.php">CSSKitsune</a> · <a href="/yokai/">Yokai Themes</a> · <a href="/site-map.php">Sitemap</a>
  </footer>
</body>
</html>
