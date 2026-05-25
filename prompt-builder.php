<?php
require_once __DIR__ . '/includes/seo-config.php';
$pageTitle = 'Shizen Prompt Builder — CSSKitsune';
$pageDescription = 'Build ready-to-paste AI prompts for Japanese-style UI. Pick platform, aesthetic, season, and mood.';
$canonical = SITE_URL . '/prompt-builder.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical); ?>">
  <meta name="theme-color" content="#F5F0E8">
  <meta name="keywords" content="Shizen prompt builder, Japanese UI prompts, AI design prompts, Cursor prompts, Figma Japanese style, wabi-sabi CSS, design tokens generator">
  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars(SITE_DEFAULT_OG_IMAGE); ?>">
  <meta property="og:locale" content="en_US">
  <meta property="og:site_name" content="<?php echo htmlspecialchars(SITE_NAME); ?>">
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars(SITE_DEFAULT_OG_IMAGE); ?>">
  <style>
    :root {
      --bg: #F5F0E8;
      --text: #2C2C2C;
      --muted: #6B6B6B;
      --accent: #8B7355;
      --paper: #FFFEF9;
      --ink: #1a1a1a;
      --border: #D4CFC4;
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
      padding: 1.5rem;
      line-height: 1.6;
      position: relative;
    }
    .wrap {
      max-width: 42rem;
      margin: 0 auto;
    }
    header {
      margin-bottom: 2rem;
    }
    h1 {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--ink);
      margin: 0 0 0.25rem;
    }
    .sub {
      font-size: 0.95rem;
      color: var(--muted);
      margin: 0;
    }
    a.back {
      display: inline-block;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      color: var(--accent);
      text-decoration: none;
    }
    a.back:hover { text-decoration: underline; }
    .card {
      background: var(--paper);
      padding: 1.25rem;
      border-radius: 6px;
      margin-bottom: 1.25rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }
    .card h2 {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin: 0 0 0.75rem;
    }
    label {
      display: block;
      font-size: 0.9rem;
      margin-bottom: 0.35rem;
      color: var(--text);
    }
    select {
      width: 100%;
      padding: 0.6rem 0.75rem;
      font-size: 1rem;
      border: 1px solid var(--border);
      border-radius: 4px;
      background: #fff;
      color: var(--text);
      margin-bottom: 0.75rem;
    }
    select:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 2px rgba(139,115,85,0.2);
    }
    select:last-of-type { margin-bottom: 0; }
    .row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    @media (max-width: 480px) { .row { grid-template-columns: 1fr; } }
    button.primary {
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: 500;
      color: var(--paper);
      background: var(--accent);
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }
    button.primary:hover { opacity: 0.9; }
    .output-wrap {
      position: relative;
      margin-top: 0.5rem;
    }
    textarea.output {
      width: 100%;
      min-height: 140px;
      padding: 1rem;
      font-size: 0.9rem;
      font-family: ui-monospace, monospace;
      border: 1px solid var(--border);
      border-radius: 4px;
      background: #fff;
      color: var(--text);
      resize: vertical;
    }
    textarea.output:focus { outline: none; border-color: var(--accent); }
    button.copy {
      position: absolute;
      top: 0.75rem;
      right: 0.75rem;
      padding: 0.4rem 0.75rem;
      font-size: 0.8rem;
      background: var(--ink);
      color: var(--paper);
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button.copy:hover { opacity: 0.9; }
    button.copy.copied { background: #2e7d32; }
    .context {
      font-size: 0.9rem;
      color: var(--muted);
      font-style: italic;
      margin-top: 0.75rem;
      padding-top: 0.75rem;
      border-top: 1px solid var(--border);
    }
    .code-example {
      margin-top: 0.75rem;
      padding: 0.75rem;
      background: #f0ede8;
      border-radius: 4px;
      font-size: 0.8rem;
      font-family: ui-monospace, monospace;
      overflow-x: auto;
      border-top: 1px solid var(--border);
    }
    .aesthetic-preview {
      margin-top: 1.25rem;
      padding-top: 1rem;
      border-top: 1px solid var(--border);
    }
    .aesthetic-preview h3 {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin: 0 0 0.5rem;
    }
    .aesthetic-preview-inner {
      padding: 1rem;
      border-radius: 6px;
      border: 1px solid;
      max-width: 20rem;
    }
    .aesthetic-preview-inner .ex-title {
      font-size: 1rem;
      font-weight: 600;
      margin: 0 0 0.25rem;
    }
    .aesthetic-preview-inner .ex-muted {
      font-size: 0.85rem;
      margin: 0 0 0.75rem;
    }
    .aesthetic-preview-inner .ex-btn {
      display: inline-block;
      padding: 0.4rem 0.75rem;
      font-size: 0.85rem;
      border: none;
      border-radius: 4px;
      cursor: default;
    }
    .placeholder {
      color: var(--muted);
      font-size: 0.95rem;
    }
    footer {
      margin-top: 2rem;
      padding-top: 1rem;
      font-size: 0.85rem;
      color: var(--muted);
    }
    footer a { color: var(--accent); text-decoration: none; }
    footer a:hover { text-decoration: underline; }
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
      "@type": "WebApplication",
      "name": "Shizen Prompt Builder",
      "url": "<?php echo htmlspecialchars($canonical); ?>",
      "description": "<?php echo htmlspecialchars($pageDescription); ?>",
      "applicationCategory": "DesignApplication",
      "operatingSystem": "Any",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" }
    }
    </script>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="1ehiM7USOi9S04jmBe0uJA" async></script>
</head>
<body>
  <a href="#main" class="skip-link">Skip to content</a>
  <div class="wrap" id="main">
    <a href="index.php" class="back">← Back to CSSKitsune</a>
    <header>
      <h1>Shizen Prompt Builder</h1>
      <p class="sub">Platform + Aesthetic + Season + Mood → ready-to-paste AI prompt.</p>
    </header>

    <div class="card">
      <h2>Choices</h2>
      <label for="platform">Platform</label>
      <select id="platform"></select>
      <label for="aesthetic">Aesthetic</label>
      <select id="aesthetic"></select>
      <div class="row">
        <div>
          <label for="season">Season</label>
          <select id="season"></select>
        </div>
        <div>
          <label for="mood">Mood</label>
          <select id="mood"></select>
        </div>
      </div>
      <div style="margin-top: 1.5rem;">
        <button type="button" class="primary" id="generate">Generate prompt</button>
      </div>
    </div>

    <div class="card">
      <h2>Output</h2>
      <div id="output-area">
        <p class="placeholder" id="placeholder">Select options and click Generate to build your prompt.</p>
        <div class="output-wrap" id="output-wrap" style="display: none;">
          <button type="button" class="copy" id="copy">Copy</button>
          <textarea class="output" id="output" readonly></textarea>
        </div>
      </div>
      <div class="context" id="context" style="display: none;"></div>
      <div class="code-example" id="code-example" style="display: none;"></div>
      <div class="aesthetic-preview" id="aesthetic-preview">
        <h3>Example</h3>
        <div class="aesthetic-preview-inner" id="aesthetic-preview-inner">
          <div class="ex-title">Card title</div>
          <div class="ex-muted">Secondary text in muted tone.</div>
          <span class="ex-btn">Action</span>
        </div>
      </div>
    </div>

    <?php require __DIR__ . '/includes/shinto-promo.php'; ?>

    <footer>
      <a href="index.php">CSSKitsune</a> · <a href="prompt-pack-wabi-sabi.php">Wabi-Sabi pack</a> · <a href="spec.php">Spec</a> · Part of the Japan Culture Network
    </footer>
  </div>

  <script>
(function() {
  const platformEl = document.getElementById('platform');
  const aestheticEl = document.getElementById('aesthetic');
  const seasonEl = document.getElementById('season');
  const moodEl = document.getElementById('mood');
  const generateBtn = document.getElementById('generate');
  const placeholder = document.getElementById('placeholder');
  const outputWrap = document.getElementById('output-wrap');
  const outputEl = document.getElementById('output');
  const copyBtn = document.getElementById('copy');
  const contextEl = document.getElementById('context');
  const codeExampleEl = document.getElementById('code-example');
  const previewInner = document.getElementById('aesthetic-preview-inner');

  let data = null;

  function hexLuminance(hex) {
    const n = parseInt(hex.slice(1), 16);
    const r = (n >> 16) / 255, g = (n >> 8 & 255) / 255, b = (n & 255) / 255;
    return 0.2126 * r + 0.7152 * g + 0.0722 * b;
  }

  function updatePreview() {
    if (!data || !previewInner) return;
    const aesthetic = data.aesthetics.find(a => a.id === aestheticEl.value);
    if (!aesthetic) return;
    const t = aesthetic.tokens;
    const bg = t.bg || t.paper || '#fff';
    const text = t.text || t.ink || '#1a1a1a';
    const muted = t.muted || t['ink-light'] || '#6B6B6B';
    const accent = t.accent || t.ink || t.gold || t.warm || '#8B7355';
    const border = t.border || '#ddd';
    const accentLum = hexLuminance(accent);
    const btnText = accentLum > 0.6 ? text : '#FFFEF9';
    previewInner.style.background = bg;
    previewInner.style.color = text;
    previewInner.style.borderColor = border;
    const exMuted = previewInner.querySelector('.ex-muted');
    const exBtn = previewInner.querySelector('.ex-btn');
    if (exMuted) exMuted.style.color = muted;
    if (exBtn) {
      exBtn.style.background = accent;
      exBtn.style.color = btnText;
    }
  }

  function tokenLine(tokens) {
    const parts = [];
    if (tokens.bg) parts.push('bg ' + tokens.bg);
    if (tokens.text) parts.push('text ' + tokens.text);
    if (tokens.accent) parts.push('accent ' + tokens.accent);
    if (tokens.ink && !tokens.accent) parts.push('ink ' + tokens.ink);
    if (tokens.muted) parts.push('muted ' + tokens.muted);
    if (tokens.gold) parts.push('gold ' + tokens.gold);
    if (tokens.leaf) parts.push('leaf ' + tokens.leaf);
    if (tokens.sky) parts.push('sky ' + tokens.sky);
    if (tokens.warm) parts.push('warm ' + tokens.warm);
    if (tokens.paper) parts.push('paper ' + tokens.paper);
    return parts.join(', ');
  }

  function buildPrompt() {
    if (!data) return '';
    const platformId = platformEl.value;
    const aestheticId = aestheticEl.value;
    const seasonId = seasonEl.value;
    const moodId = moodEl.value;

    const aesthetic = data.aesthetics.find(a => a.id === aestheticId);
    const platform = data.platforms.find(p => p.id === platformId);
    const season = data.seasons.find(s => s.id === seasonId);
    const mood = data.moods.find(m => m.id === moodId);

    if (!aesthetic) return '';

    const tokens = tokenLine(aesthetic.tokens);
    const parts = [
      'Use ' + aesthetic.name.toLowerCase() + ' palette: ' + tokens + '.',
      'Spacing scale: ' + aesthetic.spacing.scale + ' (' + aesthetic.spacing.name + ').',
      'Typography: ' + aesthetic.typography.ratio + ' ratio, ' + aesthetic.typography.weight + ' weight. Transitions: ' + aesthetic.motion.duration + ' ' + aesthetic.motion.easing + ', ' + aesthetic.motion.style + '.',
      'Style: ' + aesthetic.styleDescription
    ];
    if (season && season.modifier) parts.push(season.modifier);
    if (mood && mood.modifier) parts.push(mood.modifier);

    let prompt = parts.join(' ');
    if (platform && platform.id !== 'cursor') {
      prompt = 'For ' + platform.name + ': ' + prompt;
    }
    return prompt;
  }

  function updateUI() {
    const aestheticId = aestheticEl.value;
    const aesthetic = data && data.aesthetics.find(a => a.id === aestheticId);
    if (aesthetic) {
      contextEl.textContent = aesthetic.culturalContext;
      contextEl.style.display = 'block';
      if (aesthetic.codeExample) {
        codeExampleEl.textContent = aesthetic.codeExample;
        codeExampleEl.style.display = 'block';
      } else {
        codeExampleEl.style.display = 'none';
      }
    } else {
      contextEl.style.display = 'none';
      codeExampleEl.style.display = 'none';
    }
    updatePreview();
  }

  function generate() {
    const prompt = buildPrompt();
    if (!prompt) return;
    placeholder.style.display = 'none';
    outputWrap.style.display = 'block';
    outputEl.value = prompt;
    updateUI();
  }

  function copyToClipboard() {
    outputEl.select();
    try {
      document.execCommand('copy');
      copyBtn.textContent = 'Copied';
      copyBtn.classList.add('copied');
      setTimeout(function() {
        copyBtn.textContent = 'Copy';
        copyBtn.classList.remove('copied');
      }, 2000);
    } catch (e) {
      navigator.clipboard && navigator.clipboard.writeText(outputEl.value).then(function() {
        copyBtn.textContent = 'Copied';
        copyBtn.classList.add('copied');
        setTimeout(function() {
          copyBtn.textContent = 'Copy';
          copyBtn.classList.remove('copied');
        }, 2000);
      });
    }
  }

  generateBtn.addEventListener('click', generate);
  copyBtn.addEventListener('click', copyToClipboard);
  aestheticEl.addEventListener('change', function() {
    updateUI();
    if (outputWrap.style.display === 'block') {
      outputEl.value = buildPrompt();
    }
  });
  platformEl.addEventListener('change', function() {
    if (outputWrap.style.display === 'block') outputEl.value = buildPrompt();
  });
  seasonEl.addEventListener('change', function() {
    if (outputWrap.style.display === 'block') outputEl.value = buildPrompt();
  });
  moodEl.addEventListener('change', function() {
    if (outputWrap.style.display === 'block') outputEl.value = buildPrompt();
  });

  fetch('data/aesthetic-packs.json')
    .then(function(r) { return r.json(); })
    .then(function(d) {
      data = d;
      data.platforms.forEach(function(p) {
        const o = document.createElement('option');
        o.value = p.id;
        o.textContent = p.name;
        platformEl.appendChild(o);
      });
      data.aesthetics.forEach(function(a) {
        const o = document.createElement('option');
        o.value = a.id;
        o.textContent = a.name;
        aestheticEl.appendChild(o);
      });
      data.seasons.forEach(function(s) {
        const o = document.createElement('option');
        o.value = s.id;
        o.textContent = s.name;
        seasonEl.appendChild(o);
      });
      data.moods.forEach(function(m) {
        const o = document.createElement('option');
        o.value = m.id;
        o.textContent = m.name;
        moodEl.appendChild(o);
      });
      updateUI();
    })
    .catch(function() {
      placeholder.textContent = 'Could not load aesthetic packs. Check that data/aesthetic-packs.json exists.';
    });
})();
  </script>
</body>
</html>
