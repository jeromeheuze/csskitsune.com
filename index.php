<?php
require_once __DIR__ . '/includes/content.php';

$featuredPosts = array_slice(get_all_posts(), 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Kitsune – CSS Beyond the Browser</title>
    <meta name="description" content="Advanced CSS tutorials for OBS overlays, Electron desktops, Godot HUDs, embedded dashboards, and platforms you didn’t know relied on CSS.">
    <meta name="keywords" content="OBS CSS, Electron CSS, Godot UI, ESP32 dashboard, streaming overlays, desktop styling, CSS Kitsune">
    <link rel="canonical" href="https://csskitsune.com/" />

    <meta property="og:type" content="website">
    <meta property="og:title" content="CSS Kitsune – CSS Beyond the Browser">
    <meta property="og:description" content="Deep technical CSS guides for platforms that ship real products: game engines, desktop apps, IoT dashboards, and streaming overlays.">
    <meta property="og:url" content="https://csskitsune.com/">
    <meta property="og:site_name" content="CSS Kitsune">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CSSKitsune">
    <meta name="twitter:title" content="CSS Kitsune – CSS Beyond the Browser">
    <meta name="twitter:description" content="CSS patterns, performance, and architecture for OBS, Electron, Godot, ESP32, Discord, and more.">
    <meta name="twitter:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #ff5af0;
            --primary-dark: #b832b0;
            --text: #f7f7ff;
            --text-muted: #c2c2d6;
            --bg: #0b0d15;
            --bg-glass: rgba(11, 13, 21, 0.72);
            --border: rgba(255, 255, 255, 0.08);
            --shadow: 0 20px 60px rgba(12, 15, 28, 0.55);
            --radius: 18px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Space Grotesk', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            background-image: radial-gradient(circle at 20% 20%, rgba(255, 90, 240, 0.12), transparent 45%),
                              radial-gradient(circle at 80% 10%, rgba(48, 148, 255, 0.1), transparent 50%),
                              radial-gradient(circle at 50% 80%, rgba(122, 255, 204, 0.08), transparent 55%);
        }

        a { color: inherit; }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            backdrop-filter: blur(16px);
            background: rgba(8, 9, 14, 0.85);
            border-bottom: 1px solid var(--border);
            z-index: 1000;
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            font-size: 1.35rem;
            font-weight: 600;
            letter-spacing: 0.08em;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.8rem;
            font-size: 0.95rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        main {
            padding-top: 100px;
        }

        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 6rem 2rem 4rem;
            display: grid;
            gap: 2rem;
            grid-template-columns: minmax(0, 1fr) minmax(280px, 360px);
        }

        .hero-card {
            background: var(--bg-glass);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 3rem;
            box-shadow: var(--shadow);
        }

        .hero-card h1 {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            margin-bottom: 1.5rem;
        }

        .hero-card p {
            font-size: 1.1rem;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 2.5rem;
        }

        .cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #4f46e5);
            color: #05060d;
            box-shadow: 0 10px 35px rgba(79, 70, 229, 0.4);
        }

        .btn-outline {
            border: 1px solid var(--border);
            color: var(--text);
            background: transparent;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .platforms-panel {
            background: rgba(12, 15, 28, 0.6);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            display: grid;
            gap: 1.1rem;
            align-content: start;
        }

        .platforms-panel h2 {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--text-muted);
        }

        .platform-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 0.75rem;
        }

        .platform-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 0.7rem 0.9rem;
            border-radius: 14px;
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            color: var(--text-muted);
        }

        .latest-posts {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
        }

        .latest-posts h2 {
            text-align: center;
            font-size: 1.9rem;
            margin-bottom: 2.5rem;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .post-card {
            background: rgba(10, 13, 24, 0.78);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.8rem;
            display: grid;
            gap: 1.1rem;
            box-shadow: 0 18px 40px rgba(8, 10, 18, 0.45);
        }

        .post-card .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .post-card .category-badge {
            padding: 0.3rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: rgba(255, 90, 240, 0.18);
            border: 1px solid rgba(255, 90, 240, 0.35);
        }

        .post-card h3 {
            font-size: 1.35rem;
            line-height: 1.4;
        }

        .post-card p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .post-card a {
            text-decoration: none;
            color: var(--text);
        }

        .view-all {
            margin-top: 3rem;
            text-align: center;
        }

        footer {
            border-top: 1px solid var(--border);
            background: rgba(8, 9, 14, 0.8);
            padding: 2rem;
            text-align: center;
            color: var(--text-muted);
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 4rem;
            }

            .platforms-panel {
                order: -1;
            }
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-content">
            <a href="/" class="nav-logo">{ CSSKitsune }</a>
            <ul class="nav-links">
                <li><a href="/blog">Blog</a></li>
                <li><a href="https://www.youtube.com/@CSSKitsune" target="_blank">YouTube</a></li>
                <li><a href="https://x.com/CssKitsune" target="_blank">Twitter</a></li>
                <li><a href="/about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-card">
                <h1>CSS for the Platforms Running Your Product</h1>
                <p>Streaming overlays, Electron shells, Godot HUDs, ESP32 dashboards, Discord embeds—every one of them ships with CSS under the hood. CSS Kitsune documents the patterns, performance tricks, and architecture that keep those experiences responsive in production.</p>
                <div class="cta-group">
                    <a href="/blog" class="btn btn-primary">Read the latest platform guides →</a>
                    <a href="https://www.youtube.com/@CSSKitsune" target="_blank" class="btn btn-outline">Watch live build sessions</a>
                </div>
            </div>
            <aside class="platforms-panel">
                <h2>Current Focus</h2>
                <div class="platform-grid">
                    <span class="platform-pill"><span>OBS &amp; Streamers</span><span>Overlays</span></span>
                    <span class="platform-pill"><span>Electron &amp; Tauri</span><span>Desktop</span></span>
                    <span class="platform-pill"><span>Godot &amp; Unity</span><span>Game UI</span></span>
                    <span class="platform-pill"><span>ESP32 &amp; Pi</span><span>Embedded</span></span>
                    <span class="platform-pill"><span>Discord Bots</span><span>Embeds</span></span>
                    <span class="platform-pill"><span>Phaser</span><span>Web Games</span></span>
                </div>
            </aside>
        </section>

        <?php if (!empty($featuredPosts)): ?>
            <section class="latest-posts">
                <h2>Latest Platform Playbooks</h2>
                <div class="posts-grid">
                    <?php foreach ($featuredPosts as $post): ?>
                        <article class="post-card">
                            <div class="post-meta">
                                <span class="category-badge"><?php echo htmlspecialchars(strtoupper($post['platforms'][0] ?? 'CSS')); ?></span>
                                <time><?php echo date('M j, Y', $post['timestamp']); ?></time>
                            </div>
                            <h3>
                                <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h3>
                            <p><?php echo htmlspecialchars($post['summary']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
                <div class="view-all">
                    <a href="/blog" class="btn btn-outline">Browse the full archive</a>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CSS Kitsune. CSS beyond the browser.</p>
    </footer>
</body>
</html>