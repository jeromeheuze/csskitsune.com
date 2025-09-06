<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSSKitsune – Master CSS with Bite-Sized Tutorials</title>
    <meta name="description" content="CSSKitsune is your go-to channel for mastering CSS, from CSS Grid and Flexbox to responsive design, animations, and modern layout techniques. Join our community to level up your front-end styling game!">
    <meta name="keywords" content="CSS, CSS tutorials, CSS Grid, Flexbox, responsive design, CSS animations, CSS layouts, front-end styling, web design, CSSKitsune">
    <link rel="canonical" href="https://csskitsune.com/" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="CSSKitsune – Master CSS with Bite-Sized Tutorials">
    <meta property="og:description" content="CSSKitsune is your go-to channel for mastering CSS, from CSS Grid and Flexbox to responsive design, animations, and modern layout techniques. Join our community to level up your front-end styling game!">
    <meta property="og:url" content="https://csskitsune.com/">
    <meta property="og:site_name" content="CSSKitsune">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@CSSKitsune">
    <meta name="twitter:title" content="CSSKitsune – Master CSS with Bite-Sized Tutorials">
    <meta name="twitter:description" content="CSSKitsune is your go-to channel for mastering CSS, from CSS Grid and Flexbox to responsive design, animations, and modern layout techniques. Join our community to level up your front-end styling game!">
    <meta name="twitter:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

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
            "@type": "VideoChannel",
            "name": "CSSKitsune",
            "description": "CSSKitsune is your go-to channel for mastering CSS, from CSS Grid and Flexbox to responsive design, animations, and modern layout techniques. Join our community to level up your front-end styling game!",
            "url": "https://www.youtube.com/@CSSKitsune",
            "image": "https://csskitsune.com/csskitsune-og.jpg",
            "sameAs": [
                "https://www.youtube.com/@CSSKitsune",
                "https://x.com/CssKitsune"
            ]
        }
    </script>
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
        
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
        }
        
        .c2 {
            max-width: 600px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            padding: 0.5em 1em;
            background: #FF0000;
            color: #fff;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.3s ease;
            margin-right: 1rem;
            margin-bottom: 0.5rem;
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
        
        /* Latest posts section */
        .latest-posts {
            background: rgba(0, 0, 0, 0.8);
            padding: 4rem 2rem;
            margin-top: 2rem;
        }
        
        .latest-posts h2 {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2rem;
        }
        
        .posts-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .post-card {
            background: rgba(17, 17, 17, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .category-badge {
            background: #FF0000;
            color: #fff;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .post-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .post-title a {
            color: #fff;
            text-decoration: none;
        }
        
        .post-title a:hover {
            color: #FF0000;
        }
        
        .post-excerpt {
            color: #ccc;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .view-all-posts {
            text-align: center;
            margin-top: 3rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .c2 {
                margin: 1rem;
            }
            
            .latest-posts {
                padding: 2rem 1rem;
            }
            
            .posts-grid {
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
                <li><a href="https://www.youtube.com/@CSSKitsune" target="_blank">YouTube</a></li>
                <li><a href="https://x.com/CssKitsune" target="_blank">Twitter</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="c2">
                <h1>{ CSSKitsune }</h1>
                <p>CSSKitsune is your go-to channel for mastering CSS, whether you're just starting out or looking to sharpen your skills. Here you'll find clear, hands-on tutorials covering everything from <strong>CSS Grid</strong> and <strong>Flexbox</strong> to responsive design techniques, animations, and modern layout tricks. Each video breaks down complex concepts into bite-sized, practical lessons so you can style beautiful, responsive websites with confidence. Subscribe now and join the CSSKitsune community to level up your front-end styling game!</p>
                <a href="https://www.youtube.com/@CSSKitsune" target="_blank" class="btn">
                    View YouTube Channel
                </a>
                <a href="/blog" class="btn btn-secondary">
                    Read Blog Posts
                </a>
            </div>
        </section>

        <!-- Latest Posts Section -->
        <?php
        // Database configuration
        $host = 'localhost';
        $username = 'spectrum_ckit_u';
        $password = '73pC_fbhmx75z,r@';
        $database = 'spectrum_csskitsune';

        // Connect to database
        $mysqli = new mysqli($host, $username, $password, $database);

        if (!$mysqli->connect_error) {
            $mysqli->set_charset('utf8mb4');

            // Get latest 3 blog posts
            $posts_query = "
                SELECT 
                    bp.*,
                    bc.name as category_name,
                    bc.color as category_color
                FROM blog_posts bp
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                WHERE bp.status = 'published'
                ORDER BY bp.created_at DESC
                LIMIT 3
            ";

            $posts_result = $mysqli->query($posts_query);
            $posts = [];

            if ($posts_result) {
                while ($row = $posts_result->fetch_assoc()) {
                    $posts[] = $row;
                }
            }

            $mysqli->close();

            if (!empty($posts)): ?>
                <section class="latest-posts">
                    <h2>Latest CSS Tutorials</h2>
                    <div class="posts-grid">
                        <?php foreach ($posts as $post): ?>
                            <article class="post-card">
                                <div class="post-meta">
                                    <span class="category-badge" style="background-color: <?php echo htmlspecialchars($post['category_color']); ?>">
                                        <?php echo htmlspecialchars($post['category_name']); ?>
                                    </span>
                                    <time><?php echo date('M j, Y', strtotime($post['created_at'])); ?></time>
                                </div>
                                <h3 class="post-title">
                                    <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </h3>
                                <div class="post-excerpt">
                                    <?php 
                                    // Clean up the excerpt - handle JSON format from AI
                                    $excerpt = $post['excerpt'];
                                    
                                    // If excerpt contains JSON, extract the content
                                    if (is_string($excerpt) && strpos($excerpt, '{"output":"') !== false) {
                                        // Try to extract content from JSON
                                        $excerpt_data = json_decode($excerpt, true);
                                        if (isset($excerpt_data['output'])) {
                                            $excerpt = $excerpt_data['output'];
                                        } else {
                                            // If JSON decode fails, try manual extraction
                                            preg_match('/"output":"(.*?)"/s', $excerpt, $matches);
                                            if (isset($matches[1])) {
                                                $excerpt = $matches[1];
                                            }
                                        }
                                    }
                                    
                                    // Clean up the content
                                    $excerpt = html_entity_decode($excerpt);
                                    $excerpt = str_replace('\\n', "\n", $excerpt);
                                    $excerpt = str_replace('\\"', '"', $excerpt);
                                    $excerpt = str_replace('\\/', '/', $excerpt);
                                    
                                    // Strip HTML tags and get clean text
                                    $clean_excerpt = strip_tags($excerpt);
                                    
                                    // Remove CSS code blocks and other artifacts
                                    $clean_excerpt = preg_replace('/body\s*\{[^}]*\}/s', '', $clean_excerpt);
                                    $clean_excerpt = preg_replace('/font-family[^;]*;/s', '', $clean_excerpt);
                                    $clean_excerpt = preg_replace('/\s*\{[^}]*\}\s*/s', '', $clean_excerpt);
                                    $clean_excerpt = preg_replace('/^.*?CSS.*?Best Practices.*?Tutorial\s*/i', '', $clean_excerpt);
                                    
                                    // Remove everything after "Tutorial" that looks like CSS
                                    $clean_excerpt = preg_replace('/Tutorial\s+body\s*\{.*$/s', 'Tutorial', $clean_excerpt);
                                    $clean_excerpt = preg_replace('/Tutorial\s+.*?\{.*$/s', 'Tutorial', $clean_excerpt);
                                    
                                    // Clean up whitespace
                                    $clean_excerpt = preg_replace('/\s+/', ' ', $clean_excerpt);
                                    $clean_excerpt = trim($clean_excerpt);
                                    
                                    // Get first 120 characters of clean text
                                    $display_excerpt = substr($clean_excerpt, 0, 120);
                                    
                                    // If we don't have enough content, use a fallback
                                    if (strlen($display_excerpt) < 50) {
                                        $display_excerpt = "Learn CSS keyframe animation best practices with this comprehensive tutorial. Includes practical examples and modern techniques.";
                                    }
                                    
                                    echo htmlspecialchars($display_excerpt) . '...';
                                    ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class="view-all-posts">
                        <a href="/blog" class="btn">View All Posts</a>
                    </div>
                </section>
            <?php endif;
        } ?>
    </main>
</body>
</html>