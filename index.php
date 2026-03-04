<?php
$success = isset($_GET['s']) && $_GET['s'] === '1';
$error = isset($_GET['e']) ? (int) $_GET['e'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSSKitsune — The Japanese Design System for AI-Era Developers</title>
  <meta name="description" content="Shizen Design System: aesthetic tokens, cultural vocabulary, and AI-ready prompts for authentic Japanese-style UI.">
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
    }
    main {
      max-width: 36rem;
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
    .form-wrap {
      background: var(--paper);
      padding: 1.75rem;
      border-radius: 6px;
      margin-bottom: 2rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }
    .form-wrap p {
      margin: 0 0 1rem;
      font-size: 0.95rem;
      color: var(--muted);
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }
    input[type="email"] {
      width: 100%;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      background: #fff;
      color: var(--text);
    }
    input[type="email"]:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 2px rgba(139,115,85,0.2);
    }
    button {
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: 500;
      color: var(--paper);
      background: var(--accent);
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover { opacity: 0.9; }
    button:disabled { opacity: 0.6; cursor: not-allowed; }
    .message {
      padding: 0.75rem;
      border-radius: 4px;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }
    .message.success { background: #e8f5e9; color: #2e7d32; }
    .message.error { background: #ffebee; color: #c62828; }
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
</head>
<body>
  <main>
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

    <?php if ($success): ?>
      <div class="message success">Thanks. You're on the list — we'll send the first Shizen prompt pack soon.</div>
    <?php elseif ($error === 1): ?>
      <div class="message error">Please enter a valid email address.</div>
    <?php elseif ($error === 2): ?>
      <div class="message error">Something went wrong. Please try again.</div>
    <?php endif; ?>

    <div class="form-wrap">
      <p>Get the first Shizen prompt pack free</p>
      <form action="submit-email.php" method="post" id="signup">
        <input type="email" name="email" placeholder="you@example.com" required autocomplete="email">
        <button type="submit">Notify me</button>
      </form>
    </div>

    <div class="teaser">
      <strong>Teaser:</strong> One prompt, one palette — wabi-sabi neutrals, ma-based spacing, and copy-paste ready output for Cursor, Figma, Webflow, and more.
    </div>
  </main>
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
          <a href="https://japancollectorsguide.com" target="_blank" rel="noopener">🪙 Japan Collectors Guide</a>
          <span>Coins, banknotes & Japanese collectibles</span>
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
      &copy; <?php echo date('Y'); ?> CSSKitsune &mdash; Part of the Japan Empire Network
    </div>
  </footer>
</body>
</html>
