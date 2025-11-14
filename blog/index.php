<?php
/**
 * CSS Kitsune Blog - Filesystem Edition
 *
 * Displays the latest platform-focused CSS tutorials sourced from markdown files.
 */

require_once __DIR__ . '/../includes/content.php';

$postsPerPage = 9;
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$filterPlatform = isset($_GET['platform']) ? strtolower(trim($_GET['platform'])) : null;

$allPostsRaw = get_all_posts();
$allPosts = $allPostsRaw;

if ($filterPlatform) {
    $allPosts = array_values(array_filter($allPostsRaw, function ($post) use ($filterPlatform) {
        return in_array($filterPlatform, array_map('strtolower', $post['platforms']), true);
    }));
}

$totalPosts = count($allPosts);
$totalPages = max(1, (int) ceil($totalPosts / $postsPerPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $postsPerPage;
$posts = array_slice($allPosts, $offset, $postsPerPage);

$recentPosts = array_slice($allPostsRaw, 0, 5);

// Aggregate platforms for sidebar navigation
$platformCounts = [];
foreach ($allPostsRaw as $post) {
    foreach ($post['platforms'] as $platform) {
        if (!isset($platformCounts[$platform])) {
            $platformCounts[$platform] = 0;
        }
        $platformCounts[$platform]++;
    }
}
arsort($platformCounts);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Kitsune – CSS Beyond the Browser</title>
    <meta name="description" content="Advanced CSS tutorials for OBS overlays, Electron apps, Godot HUDs, IoT dashboards, and more platforms you didn't know used CSS.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
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
            <div class="blog-layout">
                <div class="blog-content">
                    <section class="hero-section">
                        <h2>CSS for Platforms That Actually Need It</h2>
                        <p>Deep, technical walkthroughs for styling OBS overlays, Electron desktops, Godot HUDs, IoT dashboards, and other ecosystems powered by CSS.</p>
                        <div class="search-bar">
                            <input type="search" id="post-search" placeholder="Search OBS, Electron, Godot, ESP32…" aria-label="Search posts">
                        </div>
                    </section>

                    <?php if (empty($posts)): ?>
                        <div class="no-posts">
                            <h3>No posts yet</h3>
                            <p>The new platform-focused archive is coming online soon.</p>
                        </div>
                    <?php else: ?>
                        <div class="posts-grid" id="posts-grid">
                            <?php foreach ($posts as $post): ?>
                                <?php $badgeColor = platform_badge_color($post['platforms'], $platformColors); ?>
                                <article class="post-card" data-title="<?php echo htmlspecialchars($post['title']); ?>" data-summary="<?php echo htmlspecialchars($post['summary']); ?>" data-platforms="<?php echo htmlspecialchars(implode(',', $post['platforms'])); ?>" data-tags="<?php echo htmlspecialchars(implode(',', $post['tags'])); ?>">
                                    <div class="post-meta">
                                        <span class="category-badge" style="background-color: <?php echo htmlspecialchars($badgeColor); ?>">
                                            <?php echo htmlspecialchars(strtoupper($post['platforms'][0] ?? 'CSS')); ?>
                                        </span>
                                        <time class="post-date" datetime="<?php echo htmlspecialchars($post['date']); ?>">
                                            <?php echo date('M j, Y', $post['timestamp']); ?>
                                        </time>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>">
                                            <?php echo htmlspecialchars($post['title']); ?>
                                        </a>
                                    </h3>
                                    <div class="post-excerpt">
                                        <?php echo htmlspecialchars($post['summary']); ?>
                                    </div>
                                    <div class="post-tags">
                                        <?php foreach (array_slice($post['tags'], 0, 4) as $tag): ?>
                                            <span class="tag">#<?php echo htmlspecialchars($tag); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="post-footer">
                                        <span class="author">By <?php echo htmlspecialchars($post['author']); ?></span>
                                        <span class="reading-time"><?php echo (int) $post['reading_time']; ?> min read</span>
                                        <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">Read More →</a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($totalPages > 1): ?>
                            <nav class="pagination">
                                <?php if ($page > 1): ?>
                                    <a href="?page=<?php echo $page - 1; ?>" class="pagination-btn">← Previous</a>
                                <?php endif; ?>
                                <span class="pagination-info">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>
                                <?php if ($page < $totalPages): ?>
                                    <a href="?page=<?php echo $page + 1; ?>" class="pagination-btn">Next →</a>
                                <?php endif; ?>
                            </nav>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <aside class="blog-sidebar">
                    <div class="sidebar-widget">
                        <h3>Platform Guides</h3>
                        <ul class="category-list">
                            <?php foreach ($platformCounts as $platform => $count): ?>
                                <li>
                                    <a href="/blog/?platform=<?php echo urlencode($platform); ?>" style="color: <?php echo htmlspecialchars($platformColors[$platform] ?? '#a6adc8'); ?>">
                                        <?php echo htmlspecialchars(strtoupper($platform)); ?>
                                        <span class="post-count">(<?php echo $count; ?>)</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h3>About CSS Kitsune</h3>
                        <p>We take 20 years of enterprise CSS and apply it to the ecosystems that actually need it—game engines, streaming overlays, desktop shells, embedded dashboards.</p>
                        <p><strong>Tagline:</strong> CSS Beyond the Browser.</p>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Recent Posts</h3>
                        <ul class="recent-posts">
                            <?php foreach ($recentPosts as $recent): ?>
                                <li>
                                    <a href="/blog/<?php echo htmlspecialchars($recent['slug']); ?>">
                                        <?php echo htmlspecialchars($recent['title']); ?>
                                    </a>
                                    <small><?php echo date('M j', $recent['timestamp']); ?></small>
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
            <p>Serving CSS techniques for platforms that keep your projects alive.</p>
        </div>
    </footer>

    <script>
        const searchInput = document.getElementById('post-search');
        const cards = Array.from(document.querySelectorAll('#posts-grid .post-card'));
        const resultsPanel = document.getElementById('search-results');
        let searchIndex = null;
        let isLoadingIndex = false;

        const matchesQuery = (card, query) => {
            const text = [
                card.dataset.title || '',
                card.dataset.summary || '',
                card.dataset.platforms || '',
                card.dataset.tags || ''
            ].join(' ').toLowerCase();
            return text.includes(query.toLowerCase());
        };

        const loadSearchIndex = async () => {
            if (searchIndex || isLoadingIndex) {
                return searchIndex;
            }
            isLoadingIndex = true;
            try {
                const response = await fetch('/blog/search.json.php');
                if (!response.ok) throw new Error('Failed to load search index');
                const payload = await response.json();
                searchIndex = payload.posts || [];
            } catch (error) {
                console.error(error);
                searchIndex = [];
            } finally {
                isLoadingIndex = false;
            }
            return searchIndex;
        };

        const renderSearchResults = (query, results) => {
            if (!resultsPanel) return;
            const trimmed = query.trim();
            if (!trimmed) {
                resultsPanel.hidden = true;
                resultsPanel.innerHTML = '';
                return;
            }
            if (results.length === 0) {
                resultsPanel.hidden = false;
                resultsPanel.innerHTML = `<p class="search-results__empty">No matches for “${trimmed}”.</p>`;
                return;
            }
            const items = results.slice(0, 6).map(item => `
                <a class="search-results__item" href="/blog/${item.slug}">
                    <strong>${item.title}</strong>
                    <span>${item.summary}</span>
                </a>
            `).join('');
            resultsPanel.hidden = false;
            resultsPanel.innerHTML = items;
        };

        const handleLocalFilter = (value) => {
            if (!value) {
                cards.forEach(card => card.style.display = '');
                return;
            }
            cards.forEach(card => {
                card.style.display = matchesQuery(card, value) ? '' : 'none';
            });
        };

        const handleSearchInput = async (event) => {
            const value = event.target.value.trim();
            handleLocalFilter(value);
            if (!value) {
                renderSearchResults('', []);
                return;
            }
            const index = await loadSearchIndex();
            const results = index.filter(item => {
                const haystack = [
                    item.title,
                    item.summary,
                    (item.platforms || []).join(' '),
                    (item.tags || []).join(' ')
                ].join(' ').toLowerCase();
                return haystack.includes(value.toLowerCase());
            });
            renderSearchResults(value, results);
        };

        const hideSearchResults = () => {
            if (resultsPanel) {
                resultsPanel.hidden = true;
                resultsPanel.innerHTML = '';
            }
        };

        searchInput?.addEventListener('input', handleSearchInput);
        searchInput?.addEventListener('focus', loadSearchIndex);
        
        // Hide search results when clicking outside
        document.addEventListener('click', (event) => {
            if (!resultsPanel?.contains(event.target) && event.target !== searchInput) {
                hideSearchResults();
            }
        });

        // Hide search results on scroll
        let scrollTimeout;
        window.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                hideSearchResults();
            }, 100);
        }, { passive: true });

        // Hide search results when clicking on post cards or content
        const mainContent = document.querySelector('.blog-content');
        if (mainContent) {
            mainContent.addEventListener('click', (event) => {
                if (event.target.closest('.post-card') || event.target.closest('.pagination')) {
                    hideSearchResults();
                }
            });
        }
    </script>
</body>
</html>
