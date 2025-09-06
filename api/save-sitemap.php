<?php
/**
 * Save Sitemap API Endpoint
 * 
 * This endpoint saves the generated sitemap to the server
 * 
 * @author CSS Kitsune
 * @version 1.0
 */

// Enable error reporting for debugging
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

// API security
$valid_api_key = '58855f86200ac86ed89742daa0f8d17188d23a89aecfe6332982181e6e6d4541';

try {
    // Get input data (handle both JSON and form data)
    $data = [];
    
    if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
        // Handle JSON input
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON data');
        }
    } else {
        // Handle form data input
        $data = $_POST;
    }
    
    // Verify API key
    if (!isset($data['api_key']) || $data['api_key'] !== $valid_api_key) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid API key']);
        exit();
    }
    
    // Validate required fields
    if (empty($data['sitemap_xml'])) {
        throw new Exception('Sitemap XML is required');
    }
    
    // Save sitemap to file
    $sitemap_path = '../sitemap.xml'; // Adjust path as needed
    $sitemap_content = $data['sitemap_xml'];
    
    if (file_put_contents($sitemap_path, $sitemap_content) === false) {
        throw new Exception('Failed to save sitemap file');
    }
    
    // Return success response
    $response = [
        'success' => true,
        'message' => 'Sitemap saved successfully',
        'file_path' => $sitemap_path,
        'post_title' => $data['post_title'] ?? 'Unknown',
        'post_url' => $data['post_url'] ?? 'Unknown',
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    http_response_code(200);
    echo json_encode($response, JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    // Log error
    error_log('Sitemap API Error: ' . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal server error',
        'message' => $e->getMessage()
    ]);
}
?>