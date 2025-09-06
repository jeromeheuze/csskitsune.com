<?php
/**
 * CSSKitsune About Page
 * 
 * Information about the automated CSS tutorial system
 */

// Database configuration
$host = 'localhost';
$username = 'spectrum_ckit_u';
$password = '73pC_fbhmx75z,r@';
$database = 'spectrum_csskitsune';

// Connect to database to get stats
$mysqli = new mysqli($host, $username, $password, $database);

$stats = [
    'total_posts' => 0,
    'categories' => 0,
    'total_views' => 0
];

if (!$mysqli->connect_error) {
    $mysqli->set_charset('utf8mb4');
    
    // Get total posts
    $posts_query = "SELECT COUNT(*) as count FROM blog_posts WHERE status = 'published'";
    $result = $mysqli->query($posts_query);
    if ($result) {
        $stats['total_posts'] = $result->fetch_assoc()['count'];
    }
    
    // Get total categories
    $categories_query = "SELECT COUNT(*) as count FROM blog_categories";
    $result = $mysqli->query($categories_query);
    if ($result) {
        $stats['categories'] = $result->fetch_assoc()['count'];
    }
    
    // Get total views
    $views_query = "SELECT SUM(views) as total FROM blog_posts";
    $result = $mysqli->query($views_query);
    if ($result) {
        $stats['total_views'] = $result->fetch_assoc()['total'] ?? 0;
    }
    
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About CSSKitsune – Automated CSS Tutorials & Learning Platform</title>
    <meta name="description" content="Learn about CSSKitsune's automated CSS tutorial system. Discover how we generate daily CSS tutorials covering Grid, Flexbox, animations, and modern web development techniques.">
    <meta name="keywords" content="CSSKitsune, CSS tutorials, automated content, CSS learning, web development, CSS Grid, Flexbox, animations">
    <link rel="canonical" href="https://csskitsune.com/about.php" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="About CSSKitsune – Automated CSS Tutorials & Learning Platform">
    <meta property="og:description" content="Learn about CSSKitsune's automated CSS tutorial system. Discover how we generate daily CSS tutorials covering Grid, Flexbox, animations, and modern web development techniques.">
    <meta property="og:url" content="https://csskitsune.com/about.php">
    <meta property="og:site_name" content="CSSKitsune">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CSSKitsune">
    <meta name="twitter:title" content="About CSSKitsune – Automated CSS Tutorials & Learning Platform">
    <meta name="twitter:description" content="Learn about CSSKitsune's automated CSS tutorial system. Discover how we generate daily CSS tutorials covering Grid, Flexbox, animations, and modern web development techniques.">
    <meta name="twitter:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: "Noto Sans JP", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            color: #fff;
            background: url("/csskitsune-og.jpg") no-repeat center center #000;
            background-size: cover;
            min-height: 100vh;
        }
        
        /* Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-links a:hover {
            color: #FF0000;
        }
        
        /* Main content */
        main {
            padding-top: 80px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .hero-section {
            text-align: center;
            margin-bottom: 4rem;
            padding: 3rem 2rem;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            color: #ccc;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .content-section {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem;
            margin-bottom: 2rem;
        }
        
        .content-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #FF0000;
            font-weight: 600;
        }
        
        .content-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #fff;
            font-weight: 600;
        }
        
        .content-section p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #ccc;
            margin-bottom: 1.5rem;
        }
        
        .content-section ul {
            color: #ccc;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        
        .content-section li {
            margin-bottom: 0.5rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .stat-card {
            background: rgba(17, 17, 17, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #FF0000;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #ccc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .feature-card {
            background: rgba(17, 17, 17, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 2rem;
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-card h4 {
            color: #FF0000;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .feature-card p {
            color: #ccc;
            line-height: 1.6;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            padding: 1rem 2rem;
            background: #FF0000;
            color: #fff;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.3s ease;
            margin: 0.5rem;
        }
        
        .btn:hover {
            background: darkred;
        }
        
        .btn-secondary {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        
        .btn-secondary:hover {
            background: #fff;
            color: #000;
        }
        
        .cta-section {
            text-align: center;
            margin-top: 3rem;
            padding: 3rem 2rem;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .cta-section h2 {
            color: #fff;
            margin-bottom: 1rem;
        }
        
        .cta-section p {
            color: #ccc;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .container {
                padding: 1rem;
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
                <h1>About CSSKitsune</h1>
                <p>Your automated CSS learning platform that generates fresh, comprehensive tutorials daily using AI-powered content creation.</p>
            </section>

            <!-- Stats Section -->
            <section class="content-section">
                <h2>Platform Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo number_format($stats['total_posts']); ?></div>
                        <div class="stat-label">CSS Tutorials</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['categories']; ?></div>
                        <div class="stat-label">Categories</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo number_format($stats['total_views']); ?></div>
                        <div class="stat-label">Total Views</div>
                    </div>
                </div>
            </section>

            <!-- What is CSSKitsune -->
            <section class="content-section">
                <h2>What is CSSKitsune?</h2>
                <p>CSSKitsune is an innovative automated CSS tutorial platform that combines artificial intelligence with web development expertise to deliver high-quality, comprehensive CSS tutorials every day. Our system is designed to help developers of all skill levels master modern CSS techniques through practical, hands-on examples.</p>
                
                <p>The name "CSSKitsune" combines "CSS" (Cascading Style Sheets) with "Kitsune" (Japanese for fox), representing the clever and adaptable nature of our automated learning system. Just like a fox adapts to its environment, our platform adapts to the ever-evolving world of CSS.</p>
            </section>

            <!-- How It Works -->
            <section class="content-section">
                <h2>How Our Automated System Works</h2>
                <div class="feature-grid">
                    <div class="feature-card">
                        <h4>🤖 AI-Powered Content Generation</h4>
                        <p>Our system uses advanced AI models to generate comprehensive CSS tutorials covering the latest techniques and best practices. Each tutorial is carefully crafted to be educational and practical.</p>
                    </div>
                    <div class="feature-card">
                        <h4>📚 Curated Topic Selection</h4>
                        <p>We maintain a database of 50+ carefully selected CSS topics across 5 main categories: CSS Tips, Animations, UI Components, Game UI, and Layouts.</p>
                    </div>
                    <div class="feature-card">
                        <h4>⏰ Daily Automation</h4>
                        <p>Every 24 hours, our system automatically selects a random topic, generates a comprehensive tutorial, and publishes it to our blog with proper SEO optimization.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🎯 Quality Assurance</h4>
                        <p>Each generated tutorial includes practical code examples, modern CSS techniques, responsive design considerations, and proper HTML structure.</p>
                    </div>
                </div>
            </section>

            <!-- Content Categories -->
            <section class="content-section">
                <h2>Our Content Categories</h2>
                <p>CSSKitsune covers five main areas of CSS development, ensuring comprehensive coverage of modern web styling techniques:</p>
                
                <div class="feature-grid">
                    <div class="feature-card">
                        <h4>🎨 CSS Tips</h4>
                        <p>Essential CSS techniques and best practices including custom properties, modern resets, clamp() functions, logical properties, and container queries.</p>
                    </div>
                    <div class="feature-card">
                        <h4>✨ Animations</h4>
                        <p>CSS animations, transitions, and effects covering hover effects, keyframe animations, performance optimization, and modern animation techniques.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🧩 UI Components</h4>
                        <p>Reusable CSS components and patterns including buttons, modals, forms, cards, progress bars, tooltips, and navigation menus.</p>
                    </div>
                    <div class="feature-card">
                        <h4>🎮 Game UI</h4>
                        <p>Gaming-inspired UI elements and effects like health bars, retro arcade buttons, sci-fi HUD elements, and pixel art designs.</p>
                    </div>
                    <div class="feature-card">
                        <h4>📐 Layouts</h4>
                        <p>CSS Grid, Flexbox, and layout techniques including responsive design, subgrid, alignment, multi-column layouts, and masonry designs.</p>
                    </div>
                </div>
            </section>

            <!-- Technology Stack -->
            <section class="content-section">
                <h2>Technology Stack</h2>
                <p>CSSKitsune is built using modern web technologies and automation tools:</p>
                
                <ul>
                    <li><strong>n8n:</strong> Workflow automation platform for content generation scheduling</li>
                    <li><strong>OpenAI GPT-4:</strong> AI model for generating comprehensive CSS tutorials</li>
                    <li><strong>PHP & MySQL:</strong> Backend infrastructure for content management and storage</li>
                    <li><strong>Modern CSS:</strong> Responsive design with CSS Grid, Flexbox, and custom properties</li>
                    <li><strong>SEO Optimization:</strong> Automatic meta tags, structured data, and clean URLs</li>
                </ul>
            </section>

            <!-- Mission -->
            <section class="content-section">
                <h2>Our Mission</h2>
                <p>CSSKitsune's mission is to make CSS learning accessible, comprehensive, and up-to-date for developers worldwide. We believe that by automating the creation of high-quality educational content, we can help developers stay current with the rapidly evolving CSS landscape.</p>
                
                <p>Our automated system ensures that developers always have access to fresh, relevant CSS tutorials that cover both fundamental concepts and cutting-edge techniques. Whether you're a beginner learning your first CSS properties or an experienced developer exploring advanced features, CSSKitsune provides valuable resources to enhance your skills.</p>
            </section>

            <!-- Call to Action -->
            <section class="cta-section">
                <h2>Start Learning CSS Today</h2>
                <p>Explore our comprehensive collection of CSS tutorials and join thousands of developers who are mastering modern web styling techniques.</p>
                <a href="/blog" class="btn">Browse Tutorials</a>
                <a href="https://www.youtube.com/@CSSKitsune" target="_blank" class="btn btn-secondary">Watch on YouTube</a>
            </section>
        </div>
    </main>
</body>
</html>
