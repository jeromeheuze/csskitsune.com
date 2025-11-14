<?php
/**
 * Content helpers for filesystem-based posts
 */

require_once __DIR__ . '/markdown-fixed.php';

/**
 * Get the absolute path to the posts directory.
 */
function content_posts_path(): string
{
    return realpath(__DIR__ . '/../content/posts');
}

/**
 * Parse a post markdown file with JSON frontmatter.
 *
 * @param string $filepath
 * @param bool $withContent Whether to include rendered HTML content
 * @return array|null
 */
function parse_post_file(string $filepath, bool $withContent = false): ?array
{
    if (!is_file($filepath)) {
        return null;
    }

    $raw = file_get_contents($filepath);
    if ($raw === false) {
        return null;
    }

    if (!preg_match('/^---\s*(\{.*?\})\s*---\s*(.*)$/s', $raw, $matches)) {
        return null;
    }

    $meta = json_decode(trim($matches[1]), true);
    if (!is_array($meta)) {
        return null;
    }

    $markdown = ltrim($matches[2]);

    // Normalize metadata
    $meta['title'] = $meta['title'] ?? 'Untitled Post';
    $meta['slug'] = $meta['slug'] ?? basename($filepath, '.md');
    $meta['date'] = $meta['date'] ?? date('Y-m-d', filemtime($filepath));
    $meta['summary'] = $meta['summary'] ?? substr(strip_tags($markdown), 0, 160);
    $meta['description'] = $meta['description'] ?? $meta['summary'];
    $meta['author'] = $meta['author'] ?? 'CSS Kitsune';
    $meta['platforms'] = isset($meta['platforms']) && is_array($meta['platforms']) ? $meta['platforms'] : [];
    $meta['tags'] = isset($meta['tags']) && is_array($meta['tags']) ? $meta['tags'] : [];
    $meta['reading_time'] = $meta['reading_time'] ?? estimate_reading_time($markdown);
    $meta['timestamp'] = strtotime($meta['date']) ?: filemtime($filepath);
    $meta['path'] = $filepath;
    $meta['markdown'] = $markdown;

    if ($withContent) {
        $meta['content_html'] = FixedMarkdown::parse($markdown);
    }

    return $meta;
}

/**
 * Estimate reading time based on word count (minutes).
 */
function estimate_reading_time(string $markdown): int
{
    $wordCount = str_word_count(strip_tags($markdown));
    return max(1, (int) ceil($wordCount / 200));
}

/**
 * Load all posts metadata, sorted by newest first.
 */
function get_all_posts(): array
{
    static $cache = null;
    if ($cache !== null) {
        return $cache;
    }

    $postsDir = content_posts_path();
    if (!$postsDir) {
        return [];
    }

    $posts = [];
    foreach (glob($postsDir . '/*.md') as $file) {
        $post = parse_post_file($file, false);
        if ($post) {
            $posts[] = $post;
        }
    }

    usort($posts, function ($a, $b) {
        return $b['timestamp'] <=> $a['timestamp'];
    });

    return $cache = $posts;
}

/**
 * Find a post by slug.
 */
function get_post_by_slug(string $slug): ?array
{
    foreach (get_all_posts() as $post) {
        if ($post['slug'] === $slug) {
            return parse_post_file($post['path'], true);
        }
    }

    return null;
}

/**
 * Build a lightweight search index.
 */
function build_search_index(): array
{
    $index = [];
    foreach (get_all_posts() as $post) {
        $index[] = [
            'title' => $post['title'],
            'slug' => $post['slug'],
            'summary' => $post['summary'],
            'description' => $post['description'],
            'date' => $post['date'],
            'platforms' => $post['platforms'],
            'tags' => $post['tags'],
        ];
    }

    return $index;
}

function platform_badge_color(array $platforms, array $colorMap): string
{
    if (empty($platforms)) {
        return '#2d3648';
    }

    foreach ($platforms as $platform) {
        if (isset($colorMap[$platform])) {
            return $colorMap[$platform];
        }
    }

    return '#2d3648';
}
