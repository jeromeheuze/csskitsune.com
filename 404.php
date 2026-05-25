<?php
http_response_code(404);
require_once __DIR__ . '/includes/seo-config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <title>Page not found | CSSKitsune</title>
  <meta name="robots" content="noindex, nofollow">
  <style>
    :root { --bg: #F5F0E8; --text: #2C2C2C; --muted: #6B6B6B; --accent: #8B7355; }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 0;
      line-height: 1.6;
    }
    .err-main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      text-align: center;
    }
    h1 { font-size: 1.5rem; font-weight: 600; margin: 0 0 0.5rem; }
    p { margin: 0 0 1rem; color: var(--muted); }
    a { color: var(--accent); text-decoration: none; font-weight: 500; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="err-main">
    <h1>Page not found</h1>
    <p>That page doesn’t exist or has moved.</p>
    <a href="<?php echo htmlspecialchars(SITE_URL); ?>/">← Back to CSSKitsune</a>
  </div>
  <?php require __DIR__ . '/includes/shinto-promo.php'; ?>
</body>
</html>
