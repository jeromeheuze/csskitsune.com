<?php
/**
 * CSS Blog Automation API Endpoint
 * 
 * This endpoint receives blog posts from n8n automation workflow
 * and stores them in the database.
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

// Function to generate URL-friendly slug
function generateSlug($title) {
    $slug = strtolower(trim($title));
    $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

// Function to create excerpt from content
function createExcerpt($content, $length = 160) {
    // Handle JSON content from AI
    if (is_string($content) && strpos($content, '{"output":"') !== false) {
        // Try to extract content from JSON
        $content_data = json_decode($content, true);
        if (isset($content_data['output'])) {
            $content = $content_data['output'];
        } else {
            // If JSON decode fails, try manual extraction
            preg_match('/"output":"(.*?)"/s', $content, $matches);
            if (isset($matches[1])) {
                $content = $matches[1];
            }
        }
    }
    
    // Clean up the content
    $content = html_entity_decode($content);
    $content = str_replace('\\n', "\n", $content);
    $content = str_replace('\\"', '"', $content);
    $content = str_replace('\\/', '/', $content);
    
    // Strip HTML tags
    $excerpt = strip_tags($content);
    
    // Remove CSS code blocks and other artifacts
    $excerpt = preg_replace('/body\s*\{[^}]*\}/s', '', $excerpt);
    $excerpt = preg_replace('/font-family[^;]*;/s', '', $excerpt);
    $excerpt = preg_replace('/\s*\{[^}]*\}\s*/s', '', $excerpt);
    $excerpt = preg_replace('/^.*?CSS.*?Best Practices.*?Tutorial\s*/i', '', $excerpt);
    
    // Remove everything after "Tutorial" that looks like CSS
    $excerpt = preg_replace('/Tutorial\s+body\s*\{.*$/s', 'Tutorial', $excerpt);
    $excerpt = preg_replace('/Tutorial\s+.*?\{.*$/s', 'Tutorial', $excerpt);
    
    // Clean up whitespace
    $excerpt = preg_replace('/\s+/', ' ', $excerpt);
    $excerpt = trim($excerpt);
    
    // If we don't have enough content, create a generic excerpt
    if (strlen($excerpt) < 50) {
        return "Learn CSS techniques with this comprehensive tutorial. Includes practical examples and modern best practices.";
    }
    
    if (strlen($excerpt) > $length) {
        $excerpt = substr($excerpt, 0, $length);
        $lastSpace = strrpos($excerpt, ' ');
        if ($lastSpace !== false) {
            $excerpt = substr($excerpt, 0, $lastSpace);
        }
        $excerpt .= '...';
    }
    
    return $excerpt;
}

// Function to validate required fields
function validateInput($data) {
    $required = ['api_key', 'title', 'content', 'category'];
    $errors = [];
    
    foreach ($required as $field) {
        if (empty($data[$field])) {
            $errors[] = "Field '$field' is required";
        }
    }
    
    return $errors;
}

try {
    // Get JSON input
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data');
    }
    
    // Validate input
    $validation_errors = validateInput($data);
    if (!empty($validation_errors)) {
        http_response_code(400);
        echo json_encode(['error' => 'Validation failed', 'details' => $validation_errors]);
        exit();
    }
    
    // Verify API key
    if ($data['api_key'] !== $valid_api_key) {
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
    
    // Prepare data
    $title = trim($data['title']);
    $content = trim($data['content']);
    $category = trim($data['category']);
    $tags = isset($data['tags']) ? trim($data['tags']) : '';
    $meta_description = isset($data['meta_description']) ? trim($data['meta_description']) : '';
    $featured_image = isset($data['featured_image']) ? trim($data['featured_image']) : '';
    $status = isset($data['status']) ? trim($data['status']) : 'published';
    $author = isset($data['author']) ? trim($data['author']) : 'CSS Kitsune';
    
    // Generate slug
    $slug = generateSlug($title);
    
    // Create excerpt if not provided
    $excerpt = isset($data['excerpt']) ? trim($data['excerpt']) : createExcerpt($content);
    
    // If meta description not provided, use excerpt
    if (empty($meta_description)) {
        $meta_description = $excerpt;
    }
    
    // Get category ID
    $category_query = "SELECT id FROM blog_categories WHERE name = ? OR slug = ?";
    $stmt = $mysqli->prepare($category_query);
    $stmt->bind_param('ss', $category, $category);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        // Create new category if it doesn't exist
        $category_slug = generateSlug($category);
        $insert_category = "INSERT INTO blog_categories (name, slug, description) VALUES (?, ?, ?)";
        $stmt2 = $mysqli->prepare($insert_category);
        $description = "Auto-generated category: " . $category;
        $stmt2->bind_param('sss', $category, $category_slug, $description);
        $stmt2->execute();
        $category_id = $mysqli->insert_id;
        $stmt2->close();
    } else {
        $category_row = $result->fetch_assoc();
        $category_id = $category_row['id'];
    }
    $stmt->close();
    
    // Check if slug already exists and make it unique
    $original_slug = $slug;
    $counter = 1;
    while (true) {
        $check_slug = "SELECT id FROM blog_posts WHERE slug = ?";
        $stmt = $mysqli->prepare($check_slug);
        $stmt->bind_param('s', $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            break;
        }
        
        $slug = $original_slug . '-' . $counter;
        $counter++;
        $stmt->close();
    }
    $stmt->close();
    
    // Insert blog post
    $insert_post = "INSERT INTO blog_posts (
        title, slug, content, excerpt, category_id, tags, 
        meta_description, meta_keywords, featured_image, 
        status, author, published_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $mysqli->prepare($insert_post);
    $meta_keywords = $tags; // Use tags as keywords for simplicity
    
    $stmt->bind_param('ssssissssss', 
        $title, $slug, $content, $excerpt, $category_id, $tags,
        $meta_description, $meta_keywords, $featured_image,
        $status, $author
    );
    
    if (!$stmt->execute()) {
        throw new Exception('Failed to insert blog post: ' . $stmt->error);
    }
    
    $post_id = $mysqli->insert_id;
    $stmt->close();
    
    // Handle tags if provided (optional advanced feature)
    if (!empty($tags)) {
        $tag_array = array_map('trim', explode(',', $tags));
        
        foreach ($tag_array as $tag_name) {
            if (empty($tag_name)) continue;
            
            // Get or create tag
            $tag_slug = generateSlug($tag_name);
            $tag_query = "SELECT id FROM blog_tags WHERE name = ? OR slug = ?";
            $stmt = $mysqli->prepare($tag_query);
            $stmt->bind_param('ss', $tag_name, $tag_slug);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 0) {
                // Create new tag
                $insert_tag = "INSERT INTO blog_tags (name, slug) VALUES (?, ?)";
                $stmt2 = $mysqli->prepare($insert_tag);
                $stmt2->bind_param('ss', $tag_name, $tag_slug);
                $stmt2->execute();
                $tag_id = $mysqli->insert_id;
                $stmt2->close();
            } else {
                $tag_row = $result->fetch_assoc();
                $tag_id = $tag_row['id'];
            }
            $stmt->close();
            
            // Link post to tag
            $link_tag = "INSERT IGNORE INTO blog_post_tags (post_id, tag_id) VALUES (?, ?)";
            $stmt = $mysqli->prepare($link_tag);
            $stmt->bind_param('ii', $post_id, $tag_id);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    // Close database connection
    $mysqli->close();
    
    // Return success response
    $response = [
        'success' => true,
        'message' => 'Blog post created successfully',
        'data' => [
            'id' => $post_id,
            'title' => $title,
            'slug' => $slug,
            'url' => 'https://yoursite.com/blog/' . $slug, // Update with your actual domain
            'category' => $category,
            'tags' => $tags,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        ]
    ];
    
    http_response_code(201);
    echo json_encode($response, JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    // Log error (in production, log to file instead of displaying)
    error_log('Blog API Error: ' . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal server error',
        'message' => $e->getMessage()
    ]);
}
?>
