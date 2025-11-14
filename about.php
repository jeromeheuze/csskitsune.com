<?php
/**
 * CSSKitsune About Page
 * 
 * Information about CSS beyond the browser
 */

require_once __DIR__ . '/includes/content.php';

// Get stats from filesystem-based content
$allPosts = get_all_posts();
$stats = [
    'total_posts' => count($allPosts),
    'platforms' => [],
    'total_reading_time' => 0
];

// Collect unique platforms and total reading time
foreach ($allPosts as $post) {
    if (!empty($post['platforms'])) {
        $stats['platforms'] = array_merge($stats['platforms'], $post['platforms']);
    }
    $stats['total_reading_time'] += $post['reading_time'] ?? 0;
}

$stats['platforms'] = array_unique($stats['platforms']);
$stats['unique_platforms'] = count($stats['platforms']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About CSS Kitsune – CSS Beyond the Browser</title>
    <meta name="description" content="CSS Kitsune documents CSS patterns, performance tricks, and architecture for platforms that ship real products: OBS overlays, Electron apps, Godot HUDs, ESP32 dashboards, and more.">
    <meta name="keywords" content="CSS Kitsune, OBS CSS, Electron CSS, Godot UI, ESP32 dashboard, streaming overlays, desktop styling, CSS beyond browser">
    <link rel="canonical" href="https://csskitsune.com/about.php" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="About CSS Kitsune – CSS Beyond the Browser">
    <meta property="og:description" content="Deep technical CSS guides for platforms that ship real products: game engines, desktop apps, IoT dashboards, and streaming overlays.">
    <meta property="og:url" content="https://csskitsune.com/about.php">
    <meta property="og:site_name" content="CSS Kitsune">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CSSKitsune">
    <meta name="twitter:title" content="About CSS Kitsune – CSS Beyond the Browser">
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

        a { color: inherit; text-decoration: none; }

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
            color: var(--text-muted);
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        main {
            padding-top: 100px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 4rem;
            padding: 4rem 2rem;
            background: var(--bg-glass);
            backdrop-filter: blur(16px);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .hero-section h1 {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .content-section {
            background: var(--bg-glass);
            backdrop-filter: blur(16px);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .content-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-weight: 600;
        }

        .content-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--text);
            font-weight: 600;
        }

        .content-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        .content-section ul {
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .content-section li {
            margin-bottom: 0.75rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .stat-card {
            background: rgba(10, 13, 24, 0.78);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(12, 15, 28, 0.7);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.95rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .feature-card {
            background: rgba(10, 13, 24, 0.78);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(12, 15, 28, 0.7);
        }

        .feature-card h4 {
            color: var(--primary);
            font-size: 1.3rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .feature-card p {
            color: var(--text-muted);
            line-height: 1.7;
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

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 45px rgba(79, 70, 229, 0.5);
        }

        .btn-outline {
            border: 1px solid var(--border);
            color: var(--text);
            background: transparent;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }

        .cta-section {
            text-align: center;
            margin-top: 3rem;
            padding: 4rem 2rem;
            background: var(--bg-glass);
            backdrop-filter: blur(16px);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .cta-section h2 {
            color: var(--text);
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .cta-section p {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 1.1rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
                font-size: 0.85rem;
            }

            .container {
                padding: 1rem;
            }

            .hero-section {
                padding: 3rem 1.5rem;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .content-section {
                padding: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="nav-content">
            <a href="/" class="nav-logo">{ CSSKitsune }</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/about.php">About</a></li>
                <li><a href="https://www.youtube.com/@CSSKitsune" target="_blank">YouTube</a></li>
                <li><a href="https://x.com/CssKitsune" target="_blank">Twitter</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            <!-- Hero Section -->
            <section class="hero-section">
                <h1>About CSS Kitsune</h1>
                <p>CSS Kitsune documents CSS patterns, performance tricks, and architecture for platforms that ship real products. We focus on the CSS that powers streaming overlays, desktop apps, game engines, IoT dashboards, and other platforms beyond the traditional browser.</p>
            </section>

            <!-- Stats Section -->
            <section class="content-section">
                <h2>Platform Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo number_format($stats['total_posts']); ?></div>
                        <div class="stat-label">Platform Guides</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['unique_platforms']; ?></div>
                        <div class="stat-label">Platforms Covered</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo number_format($stats['total_reading_time']); ?></div>
                        <div class="stat-label">Minutes of Content</div>
                    </div>
                </div>
            </section>

            <!-- What is CSS Kitsune -->
            <section class="content-section">
                <h2>What is CSS Kitsune?</h2>
                <p>CSS Kitsune is a technical blog focused on CSS for platforms beyond the browser. While most CSS resources focus on web development, we document the CSS that powers real-world applications: OBS streaming overlays, Electron desktop apps, Godot game UIs, ESP32 embedded dashboards, Discord bot embeds, and more.</p>
                
                <p>The name "Kitsune" (Japanese for fox) represents the clever and adaptable nature of CSS when applied to non-traditional platforms. Just as a fox adapts to its environment, CSS adapts to the unique constraints and opportunities of each platform.</p>
            </section>

            <!-- Our Focus -->
            <section class="content-section">
                <h2>Our Platform Focus</h2>
                <p>We create deep technical guides for platforms that rely on CSS but aren't traditional web browsers:</p>
                
                <div class="feature-grid">
                    <div class="feature-card">
                        <h4>📺 OBS & Streaming</h4>
                        <p>Browser Source overlays, scene transitions, custom HTML/CSS widgets, and performance optimization for live streaming setups.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🖥️ Electron & Tauri</h4>
                        <p>Desktop application styling, window management, native-feel interfaces, and CSS architecture for cross-platform desktop apps.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🎮 Game Engines</h4>
                        <p>Godot UI styling, Unity WebGL interfaces, Phaser game HUDs, and CSS patterns for game development workflows.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🔌 Embedded Systems</h4>
                        <p>ESP32 web dashboards, Raspberry Pi interfaces, IoT device UIs, and CSS for resource-constrained environments.</p>
                    </div>
                    <div class="feature-card">
                        <h4>💬 Discord & Chat</h4>
                        <p>Discord bot embed styling, chat interface customization, and CSS for messaging platform integrations.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🌐 Progressive Web Apps</h4>
                        <p>PWA styling, offline-first interfaces, and CSS patterns for app-like web experiences.</p>
                    </div>
                </div>
            </section>

            <!-- What We Cover -->
            <section class="content-section">
                <h2>What We Cover</h2>
                <p>Our guides focus on the practical, production-ready CSS patterns that keep these platforms responsive and performant:</p>
                
                <ul>
                    <li><strong>Performance Optimization:</strong> CSS techniques that work within platform-specific constraints and resource limits</li>
                    <li><strong>Architecture Patterns:</strong> How to structure CSS for non-browser environments with unique rendering engines</li>
                    <li><strong>Platform-Specific Features:</strong> Leveraging CSS features that work differently (or better) outside traditional browsers</li>
                    <li><strong>Real-World Examples:</strong> Complete, working code examples that you can use in production</li>
                    <li><strong>Troubleshooting:</strong> Common issues and solutions when CSS behaves differently on these platforms</li>
                    <li><strong>Best Practices:</strong> Patterns and conventions that make CSS maintainable in these unique contexts</li>
                </ul>
            </section>

            <!-- Technology Stack -->
            <section class="content-section">
                <h2>How We Build</h2>
                <p>CSS Kitsune is built with modern web technologies:</p>
                
                <ul>
                    <li><strong>Static Content:</strong> Markdown-based posts stored in the filesystem for easy version control and editing</li>
                    <li><strong>PHP:</strong> Server-side rendering and content management</li>
                    <li><strong>Modern CSS:</strong> The same CSS techniques we document, applied to our own site</li>
                    <li><strong>Client-Side Search:</strong> Fast, lightweight search without server dependencies</li>
                </ul>
            </section>

            <!-- Mission -->
            <section class="content-section">
                <h2>Our Mission</h2>
                <p>CSS Kitsune's mission is to document the CSS that powers real products. While most CSS resources focus on web development, we believe that CSS knowledge is valuable across many platforms—from streaming software to game engines to embedded devices.</p>
                
                <p>Our guides are written for developers who need to style interfaces in environments where CSS works differently, has different constraints, or offers unique opportunities. Whether you're building an OBS overlay, styling an Electron app, or creating a game UI, CSS Kitsune provides the patterns and insights you need.</p>
            </section>

            <!-- Call to Action -->
            <section class="cta-section">
                <h2>Start Building with CSS</h2>
                <p>Explore our platform-specific guides and learn how CSS works beyond the browser.</p>
                <div class="cta-group">
                    <a href="/blog" class="btn btn-primary">Browse Platform Guides →</a>
                    <a href="https://www.youtube.com/@CSSKitsune" target="_blank" class="btn btn-outline">Watch Build Sessions</a>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
