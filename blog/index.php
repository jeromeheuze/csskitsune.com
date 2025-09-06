<?php
/**
 * CSS Kitsune Blog - Homepage
 * 
 * Displays the latest blog posts from the automated system
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

// Get posts per page
$posts_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

// Get total posts count
$count_query = "SELECT COUNT(*) as total FROM blog_posts WHERE status = 'published'";
$count_result = $mysqli->query($count_query);
$total_posts = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_posts / $posts_per_page);

// Get blog posts with category information
$posts_query = "
    SELECT 
        bp.*,
        bc.name as category_name,
        bc.color as category_color,
        bc.slug as category_slug
    FROM blog_posts bp
    LEFT JOIN blog_categories bc ON bp.category_id = bc.id
    WHERE bp.status = 'published'
    ORDER BY bp.created_at DESC
    LIMIT $posts_per_page OFFSET $offset
";

$posts_result = $mysqli->query($posts_query);
$posts = [];

if ($posts_result) {
    while ($row = $posts_result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Get categories for sidebar
$categories_query = "
    SELECT bc.*, COUNT(bp.id) as post_count
    FROM blog_categories bc
    LEFT JOIN blog_posts bp ON bc.id = bp.category_id AND bp.status = 'published'
    GROUP BY bc.id
    ORDER BY post_count DESC
";

$categories_result = $mysqli->query($categories_query);
$categories = [];

if ($categories_result) {
    while ($row = $categories_result->fetch_assoc()) {
        $categories[] = $row;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Kitsune - Daily CSS Tutorials & Tips</title>
    <meta name="description" content="Daily CSS tutorials, tips, and techniques. Learn modern CSS with practical examples and best practices.">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
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
            <div class="blog-layout">
                <div class="blog-content">
                    <section class="hero-section">
                        <h2>Latest CSS Tutorials</h2>
                        <p>Discover daily CSS tips, techniques, and tutorials to level up your frontend skills.</p>
                    </section>

                    <?php if (empty($posts)): ?>
                        <div class="no-posts">
                            <h3>No posts yet</h3>
                            <p>Check back soon for amazing CSS tutorials!</p>
                        </div>
                    <?php else: ?>
                        <div class="posts-grid">
                            <?php foreach ($posts as $post): ?>
                                <article class="post-card">
                                    <div class="post-meta">
                                        <span class="category-badge" style="background-color: <?php echo htmlspecialchars($post['category_color']); ?>">
                                            <?php echo htmlspecialchars($post['category_name']); ?>
                                        </span>
                                        <time class="post-date" datetime="<?php echo $post['created_at']; ?>">
                                            <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                        </time>
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
                                        
                                        // Get first 150 characters of clean text
                                        $display_excerpt = substr($clean_excerpt, 0, 150);
                                        
                                        // If we don't have enough content, use a fallback
                                        if (strlen($display_excerpt) < 50) {
                                            $display_excerpt = "Learn " . strtolower($post['title']) . " with this comprehensive tutorial. Includes practical examples and modern techniques.";
                                        }
                                        
                                        echo htmlspecialchars($display_excerpt) . '...';
                                        ?>
                                    </div>
                                    
                                    <div class="post-tags">
                                        <?php 
                                        $tags = explode(',', $post['tags']);
                                        foreach (array_slice($tags, 0, 3) as $tag): 
                                        ?>
                                            <span class="tag"><?php echo htmlspecialchars(trim($tag)); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                    <div class="post-footer">
                                        <span class="author">By <?php echo htmlspecialchars($post['author']); ?></span>
                                        <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">
                                            Read More →
                                        </a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($total_pages > 1): ?>
                            <nav class="pagination">
                                <?php if ($page > 1): ?>
                                    <a href="?page=<?php echo $page - 1; ?>" class="pagination-btn">← Previous</a>
                                <?php endif; ?>
                                
                                <span class="pagination-info">
                                    Page <?php echo $page; ?> of <?php echo $total_pages; ?>
                                </span>
                                
                                <?php if ($page < $total_pages): ?>
                                    <a href="?page=<?php echo $page + 1; ?>" class="pagination-btn">Next →</a>
                                <?php endif; ?>
                            </nav>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <aside class="blog-sidebar">
                    <div class="sidebar-widget">
                        <h3>Categories</h3>
                        <ul class="category-list">
                            <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="/blog/category/<?php echo htmlspecialchars($category['slug']); ?>" 
                                       style="color: <?php echo htmlspecialchars($category['color']); ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                        <span class="post-count">(<?php echo $category['post_count']; ?>)</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h3>About CSS Kitsune</h3>
                        <p>Daily CSS tutorials, tips, and techniques to help you master modern web development. Our content is automatically generated to keep you up-to-date with the latest CSS features and best practices.</p>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Recent Posts</h3>
                        <ul class="recent-posts">
                            <?php foreach (array_slice($posts, 0, 5) as $recent_post): ?>
                                <li>
                                    <a href="/blog/<?php echo htmlspecialchars($recent_post['slug']); ?>">
                                        <?php echo htmlspecialchars($recent_post['title']); ?>
                                    </a>
                                    <small><?php echo date('M j', strtotime($recent_post['created_at'])); ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <footer class="blog-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> CSS Kitsune. All rights reserved.</p>
            <p>Powered by automated CSS tutorials and AI-generated content.</p>
        </div>
    </footer>
</body>
</html>
