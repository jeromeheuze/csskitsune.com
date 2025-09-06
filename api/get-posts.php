<?php
/**
 * Get Existing Blog Posts API Endpoint
 * 
 * This endpoint returns existing blog posts to help prevent duplicates
 * in the n8n automation workflow.
 * 
 * @author CSS Kitsune
 * @version 1.0
 */

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type to JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed. Only POST requests are accepted.']);
    exit();
}

// Database configuration
$host = 'localhost';
$username = 'spectrum_ckit_u';
$password = '73pC_fbhmx75z,r@';
$database = 'spectrum_csskitsune';

// API security
$valid_api_key = '58855f86200ac86ed89742daa0f8d17188d23a89aecfe6332982181e6e6d4541';

try {
    // Get JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data');
    }
    
    // Verify API key
    if (!isset($data['api_key']) || $data['api_key'] !== $valid_api_key) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid API key']);
        exit();
    }
    
    // Connect to database
    $mysqli = new mysqli($host, $username, $password, $database);
    
    if ($mysqli->connect_error) {
        throw new Exception('Database connection failed: ' . $mysqli->connect_error);
    }
    
    // Set charset to UTF-8
    $mysqli->set_charset('utf8mb4');
    
    // Get existing blog posts (last 30 days to avoid checking very old posts)
    $query = "SELECT id, title, slug, category_id, published_at 
              FROM blog_posts 
              WHERE published_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
              ORDER BY published_at DESC";
    
    $result = $mysqli->query($query);
    
    if (!$result) {
        throw new Exception('Failed to fetch existing posts: ' . $mysqli->error);
    }
    
    $posts = [];
    while ($row = $result->fetch_assoc()) {
        $posts[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'slug' => $row['slug'],
            'category_id' => $row['category_id'],
            'published_at' => $row['published_at']
        ];
    }
    
    // Close database connection
    $mysqli->close();
    
    // Return success response
    $response = [
        'success' => true,
        'message' => 'Existing posts retrieved successfully',
        'data' => $posts,
        'count' => count($posts)
    ];
    
    http_response_code(200);
    echo json_encode($response, JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    // Log error (in production, log to file instead of displaying)
    error_log('Get Posts API Error: ' . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal server error',
        'message' => $e->getMessage()
    ]);
}
?>
