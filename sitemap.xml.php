<?php
/**
 * Dynamic XML Sitemap Generator
 * 
 * Generates sitemap.xml dynamically from database content
 * 
 * @author CSS Kitsune
 * @version 1.0
 */

// Database configuration
$host = 'localhost';
$username = 'spectrum_ckit_u';
$password = '73pC_fbhmx75z,r@';
$database = 'spectrum_csskitsune';

// Connect to database
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    http_response_code(500);
    die('Database connection failed');
}

$mysqli->set_charset('utf8mb4');

// Set content type to XML
header('Content-Type: application/xml; charset=utf-8');

// Start building XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Static pages
$staticPages = [
    [
        'url' => 'https://csskitsune.com/',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'daily',
        'priority' => '1.0'
    ],
    [
        'url' => 'https://csskitsune.com/about.php',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'monthly',
        'priority' => '0.9'
    ],
    [
        'url' => 'https://csskitsune.com/blog/',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'daily',
        'priority' => '0.9'
    ]
];

// Add static pages
foreach ($staticPages as $page) {
    echo '  <url>' . "\n";
    echo '    <loc>' . htmlspecialchars($page['url']) . '</loc>' . "\n";
    echo '    <lastmod>' . $page['lastmod'] . '</lastmod>' . "\n";
    echo '    <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
    echo '    <priority>' . $page['priority'] . '</priority>' . "\n";
    echo '  </url>' . "\n";
}

// Get all published blog posts
$query = "SELECT slug, updated_at, created_at FROM blog_posts WHERE status = 'published' ORDER BY created_at DESC";
$result = $mysqli->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url = 'https://csskitsune.com/blog/' . $row['slug'];
        $lastmod = $row['updated_at'] ? $row['updated_at'] : $row['created_at'];
        $lastmod = date('Y-m-d', strtotime($lastmod));
        
        echo '  <url>' . "\n";
        echo '    <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
        echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
        echo '    <changefreq>weekly</changefreq>' . "\n";
        echo '    <priority>0.8</priority>' . "\n";
        echo '  </url>' . "\n";
    }
}

// Close database connection
$mysqli->close();

// End XML
echo '</urlset>' . "\n";
?>
