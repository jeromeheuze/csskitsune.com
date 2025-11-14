<?php
/**
 * CSS Kitsune Blog - Single Post (Filesystem Edition)
 */

require_once __DIR__ . '/../includes/content.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') {
    header('HTTP/1.0 404 Not Found');
    include __DIR__ . '/404.php';
    exit;
}

$post = get_post_by_slug($slug);
if (!$post) {
    header('HTTP/1.0 404 Not Found');
    include __DIR__ . '/404.php';
    exit;
}

$allPosts = get_all_posts();
$related = [];
foreach ($allPosts as $candidate) {
    if ($candidate['slug'] === $post['slug']) {
        continue;
    }
    if (!empty(array_intersect($post['platforms'], $candidate['platforms']))) {
        $related[] = $candidate;
    }
    if (count($related) >= 3) {
        break;
    }
}

$platformColors = [
    'obs' => '#bf5af2',
    'streaming' => '#ff7aa2',
    'electron' => '#64a8ff',
    'desktop' => '#4dd0e1',
    'godot' => '#478cbf',
    'game-ui' => '#f6c177',
    'esp32' => '#7bd88f',
    'iot' => '#ffd166',
    'discord' => '#7289da',
    'unity' => '#454ade',
];

$badgeColor = platform_badge_color($post['platforms'], $platformColors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?> – CSS Kitsune</title>
    <meta name="description" content="<?php echo htmlspecialchars($post['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars(implode(', ', $post['tags'])); ?>">

    <meta property="og:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($post['description']); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://csskitsune.com/blog/<?php echo htmlspecialchars($post['slug']); ?>">
    <meta property="og:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($post['description']); ?>">
    <meta name="twitter:image" content="https://csskitsune.com/csskitsune-og.jpg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/syntax-highlighting.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</head>
<body>
    <header class="blog-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="/">{ CSSKitsune }</a></h1>
                    <p>CSS Beyond the Browser</p>
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
                        <span class="category-badge" style="background-color: <?php echo htmlspecialchars($badgeColor); ?>">
                            <?php echo htmlspecialchars(strtoupper($post['platforms'][0] ?? 'CSS')); ?>
                        </span>
                        <time class="post-date" datetime="<?php echo htmlspecialchars($post['date']); ?>">
                            <?php echo date('F j, Y', $post['timestamp']); ?>
                        </time>
                        <span class="post-views"><?php echo (int) $post['reading_time']; ?> min read</span>
                    </div>

                    <h1 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h1>

                    <div class="post-tags">
                        <?php foreach ($post['tags'] as $tag): ?>
                            <span class="tag">#<?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </header>

                <div class="post-content">
                    <?php echo $post['content_html']; ?>
                </div>

                <footer class="post-footer">
                    <div class="post-author">
                        <strong>Author:</strong> <?php echo htmlspecialchars($post['author']); ?>
                    </div>
                    <div class="post-share">
                        <h4>Share this post:</h4>
                        <div class="share-buttons">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($post['title']); ?>&url=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" target="_blank" class="share-btn twitter">Twitter</a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" target="_blank" class="share-btn linkedin">LinkedIn</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://csskitsune.com/blog/' . $post['slug']); ?>" target="_blank" class="share-btn facebook">Facebook</a>
                        </div>
                    </div>
                </footer>
            </article>

            <?php if (!empty($related)): ?>
                <section class="related-posts">
                    <h3>Related Platform Guides</h3>
                    <div class="related-grid">
                        <?php foreach ($related as $item): ?>
                            <article class="related-post">
                                <div class="related-meta">
                                    <span class="category-badge" style="background-color: <?php echo htmlspecialchars(platform_badge_color($item['platforms'], $platformColors)); ?>">
                                        <?php echo htmlspecialchars(strtoupper($item['platforms'][0] ?? 'CSS')); ?>
                                    </span>
                                    <time><?php echo date('M j, Y', $item['timestamp']); ?></time>
                                </div>
                                <h4>
                                    <a href="/blog/<?php echo htmlspecialchars($item['slug']); ?>">
                                        <?php echo htmlspecialchars($item['title']); ?>
                                    </a>
                                </h4>
                                <p><?php echo htmlspecialchars($item['summary']); ?></p>
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
            <p>CSS techniques for game engines, desktop shells, streaming overlays, and beyond.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('pre code').forEach(block => {
            const button = document.createElement('button');
            button.className = 'copy-code-btn';
            button.type = 'button';
            button.textContent = 'Copy';
            button.addEventListener('click', () => {
                navigator.clipboard.writeText(block.textContent).then(() => {
                    button.textContent = 'Copied!';
                    setTimeout(() => button.textContent = 'Copy', 2000);
                });
            });
            block.parentNode.style.position = 'relative';
            block.parentNode.appendChild(button);
        });
    </script>
</body>
</html>
