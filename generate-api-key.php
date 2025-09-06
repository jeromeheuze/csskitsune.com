<?php
/**
 * API Key Generator for CSS Blog Automation
 * 
 * This script generates a secure API key for the blog automation system.
 * Run this once to generate your API key, then update it in your files.
 */

echo "🔑 CSS Blog API Key Generator\n";
echo "=============================\n\n";

// Generate a secure API key
$api_key = bin2hex(random_bytes(32));

echo "Generated API Key:\n";
echo $api_key . "\n\n";

echo "📋 Next Steps:\n";
echo "1. Copy the API key above\n";
echo "2. Update api/blog-post.php (line with \$valid_api_key)\n";
echo "3. Update n8n/workflow.json (in Content Formatter node)\n";
echo "4. Delete this file after use for security\n\n";

echo "⚠️  Security Note:\n";
echo "Keep this API key secure and don't share it publicly!\n";
?>
