<?php
/**
 * CSS Blog API Test Script
 * 
 * This script tests the blog API endpoint to ensure
 * it's working correctly before setting up the n8n workflow.
 */

// Configuration
$api_url = 'https://csskitsune.com/api/blog-post.php'; // Update with your actual URL
$api_key = '58855f86200ac86ed89742daa0f8d17188d23a89aecfe6332982181e6e6d4541'; // Update with your actual API key

// Test data
$test_post = [
    'api_key' => $api_key,
    'title' => 'Test CSS Tutorial - ' . date('Y-m-d H:i:s'),
    'content' => '
        <h1>Test CSS Tutorial</h1>
        <p>This is a test blog post created by the automation system.</p>
        
        <h2>CSS Example</h2>
        <pre><code>
.button {
    background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}
        </code></pre>
        
        <p>This button uses modern CSS techniques including gradients, transitions, and transforms.</p>
        
        <h2>Conclusion</h2>
        <p>This test post demonstrates that the automation system is working correctly.</p>
    ',
    'category' => 'CSS Tips',
    'tags' => 'css, test, automation, tutorial',
    'meta_description' => 'A test CSS tutorial created by the blog automation system to verify everything is working correctly.',
    'featured_image' => '',
    'status' => 'published',
    'author' => 'CSS Kitsune'
];

// Function to make API request
function testApi($url, $data) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for testing
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    
    curl_close($ch);
    
    return [
        'response' => $response,
        'http_code' => $http_code,
        'error' => $error
    ];
}

// Run the test
echo "🧪 Testing CSS Blog API...\n\n";

$result = testApi($api_url, $test_post);

echo "📡 API Response:\n";
echo "HTTP Code: " . $result['http_code'] . "\n";

if ($result['error']) {
    echo "❌ cURL Error: " . $result['error'] . "\n";
    exit(1);
}

if ($result['response']) {
    $response_data = json_decode($result['response'], true);
    
    if ($response_data) {
        echo "📄 Response Data:\n";
        echo json_encode($response_data, JSON_PRETTY_PRINT) . "\n";
        
        if (isset($response_data['success']) && $response_data['success']) {
            echo "\n✅ Test PASSED! Blog post created successfully.\n";
            echo "📝 Post ID: " . ($response_data['data']['id'] ?? 'N/A') . "\n";
            echo "🔗 Slug: " . ($response_data['data']['slug'] ?? 'N/A') . "\n";
            echo "📂 Category: " . ($response_data['data']['category'] ?? 'N/A') . "\n";
        } else {
            echo "\n❌ Test FAILED! API returned an error.\n";
            echo "🚨 Error: " . ($response_data['error'] ?? 'Unknown error') . "\n";
        }
    } else {
        echo "❌ Invalid JSON response\n";
        echo "Raw response: " . $result['response'] . "\n";
    }
} else {
    echo "❌ No response received\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "🔧 Troubleshooting Tips:\n";
echo "1. Check that the API URL is correct\n";
echo "2. Verify the API key matches in both files\n";
echo "3. Ensure the database is set up and accessible\n";
echo "4. Check PHP error logs for detailed error messages\n";
echo "5. Verify the web server is running and accessible\n";
?>
