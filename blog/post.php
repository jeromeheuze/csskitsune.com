<?php
/**
 * CSS Kitsune Blog - Single Post Page
 * 
 * Displays individual blog posts
 */

// Database configuration
$host = 'localhost';
$username = 'spectrum_ckit_u';
$password = '73pC_fbhmx75z,r@';
$database = 'spectrum_csskitsune';

// Connect to database
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8mb4');

// Get slug from URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if (empty($slug)) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Get the blog post
$post_query = "
    SELECT 
        bp.*,
        bc.name as category_name,
        bc.color as category_color,
        bc.slug as category_slug
    FROM blog_posts bp
    LEFT JOIN blog_categories bc ON bp.category_id = bc.id
    WHERE bp.slug = ? AND bp.status = 'published'
";

$stmt = $mysqli->prepare($post_query);
$stmt->bind_param('s', $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

$post = $result->fetch_assoc();
$stmt->close();

// Increment view count
$view_query = "UPDATE blog_posts SET views = views + 1 WHERE id = ?";
$stmt = $mysqli->prepare($view_query);
$stmt->bind_param('i', $post['id']);
$stmt->execute();
$stmt->close();

// Get related posts
$related_query = "
    SELECT bp.*, bc.name as category_name, bc.color as category_color
    FROM blog_posts bp
    LEFT JOIN blog_categories bc ON bp.category_id = bc.id
    WHERE bp.category_id = ? AND bp.id != ? AND bp.status = 'published'
    ORDER BY bp.created_at DESC
    LIMIT 3
";

$stmt = $mysqli->prepare($related_query);
$stmt->bind_param('ii', $post['category_id'], $post['id']);
$stmt->execute();
$related_result = $stmt->get_result();
$related_posts = [];

while ($row = $related_result->fetch_assoc()) {
    $related_posts[] = $row;
}
$stmt->close();

$mysqli->close();

// Include the Markdown parser
require_once '../includes/markdown-fixed.php';

// Parse the content (it might be JSON from the AI)
$content = $post['content'];

// Handle JSON content from AI (for backward compatibility)
if (is_string($content) && strpos($content, '{"output":"') !== false) {
    // Try to extract content from JSON
    $content_data = json_decode($content, true);
    if (isset($content_data['output'])) {
        $content = $content_data['output'];
    } else {
        // If JSON decode fails, try manual extraction with better regex
        preg_match('/"output":"(.*?)"}$/s', $content, $matches);
        if (isset($matches[1])) {
            $content = $matches[1];
        }
    }
}

// Clean up the content properly
$content = html_entity_decode($content);
$content = str_replace('\\n', "\n", $content);
$content = str_replace('\\"', '"', $content);
$content = str_replace('\\/', '/', $content);
$content = str_replace('\\`', '`', $content);
$content = str_replace('\\*', '*', $content);
$content = str_replace('\\#', '#', $content);

// Remove any remaining title or category prefixes
$content = preg_replace('/^[^<]*?Tutorial[^<]*?\|[^<]*?Tutorial[^<]*?/', '', $content);
$content = preg_replace('/^[^<]*?\|[^<]*?Tutorial[^<]*?/', '', $content);
$content = preg_replace('/^[^<]*?Tutorial[^<]*?/', '', $content);

// Convert Markdown to HTML
$content = FixedMarkdown::parse($content);

$content = trim($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?> - CSS Kitsune</title>
    <meta name="description" content="<?php echo htmlspecialchars($post['meta_description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($post['meta_keywords']); ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($post['meta_description']); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://csskitsune.com/blog/<?php echo htmlspecialchars($post['slug']); ?>">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($post['meta_description']); ?>">
    <meta name="twitter:image" content="https://csskitsune.com/csskitsune-og.jpg">
    
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/syntax-highlighting.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    
    <!-- Prism.js for syntax highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</head>
<body>
    <header class="blog-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="/">{ CSSKitsune }</a></h1>
                    <p>Daily CSS Tutorials & Tips</p>
                </div>
                <nav class="main-nav">
                    <a href="/">Home</a>
                    <a href="/blog">Blog</a>
                    <a href="/about.php">About</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="blog-main">
        <div class="container">
            <article class="single-post">
                <header class="post-header">
                    <div class="post-meta">
                        <span class="category-badge" style="background-color: <?php echo htmlspecialchars($post['category_color']); ?>">
                            <?php echo htmlspecialchars($post['category_name']); ?>
                        </span>
                        <time class="post-date" datetime="<?php echo $post['created_at']; ?>">
                            <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        </time>
                        <span class="post-views"><?php echo number_format($post['views']); ?> views</span>
                    </div>
                    
                    <h1 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h1>
                    
                    <div class="post-tags">
                        <?php 
                        $tags = explode(',', $post['tags']);
                        foreach ($tags as $tag): 
                            $tag = trim($tag);
                            if (!empty($tag)):
                        ?>
                            <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </header>

                <div class="post-content">
                    <?php echo $content; ?>
                </div>

                <footer class="post-footer">
                    <div class="post-author">
                        <strong>Author:</strong> <?php echo htmlspecialchars($post['author']); ?>
                    </div>
                    
                    <div class="post-share">
                        <h4>Share this post:</h4>
                        <div class="share-buttons">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($post['title']); ?>&url=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" 
                               target="_blank" class="share-btn twitter">Twitter</a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" 
                               target="_blank" class="share-btn linkedin">LinkedIn</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" 
                               target="_blank" class="share-btn facebook">Facebook</a>
                        </div>
                    </div>
                </footer>
            </article>

            <?php if (!empty($related_posts)): ?>
                <section class="related-posts">
                    <h3>Related Posts</h3>
                    <div class="related-grid">
                        <?php foreach ($related_posts as $related_post): ?>
                            <article class="related-post">
                                <div class="related-meta">
                                    <span class="category-badge" style="background-color: <?php echo htmlspecialchars($related_post['category_color']); ?>">
                                        <?php echo htmlspecialchars($related_post['category_name']); ?>
                                    </span>
                                    <time><?php echo date('M j, Y', strtotime($related_post['created_at'])); ?></time>
                                </div>
                                <h4>
                                    <a href="/blog/<?php echo htmlspecialchars($related_post['slug']); ?>">
                                        <?php echo htmlspecialchars($related_post['title']); ?>
                                    </a>
                                </h4>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <nav class="post-navigation">
                <a href="/blog" class="back-to-blog">← Back to Blog</a>
            </nav>
        </div>
    </main>

    <footer class="blog-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> CSS Kitsune. All rights reserved.</p>
            <p>Powered by automated CSS tutorials and AI-generated content.</p>
        </div>
    </footer>

    <script>
        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add copy button to code blocks
        document.querySelectorAll('pre code').forEach(block => {
            const button = document.createElement('button');
            button.className = 'copy-code-btn';
            button.textContent = 'Copy';
            button.onclick = function() {
                navigator.clipboard.writeText(block.textContent).then(() => {
                    button.textContent = 'Copied!';
                    setTimeout(() => {
                        button.textContent = 'Copy';
                    }, 2000);
                });
            };
            block.parentNode.style.position = 'relative';
            block.parentNode.appendChild(button);
        });
    </script>
</body>
</html>
