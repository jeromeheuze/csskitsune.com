<?php
/**
 * Security Configuration for CSS Blog Automation
 * 
 * This file contains security settings and utilities
 * for the blog automation system.
 */

// Security Configuration
class BlogSecurity {
    
    // API Key Configuration
    const API_KEY_LENGTH = 64;
    const API_KEY_CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
    
    // Rate Limiting Configuration
    const RATE_LIMIT_REQUESTS = 10; // Max requests per hour
    const RATE_LIMIT_WINDOW = 3600; // 1 hour in seconds
    
    // Input Validation
    const MAX_TITLE_LENGTH = 255;
    const MAX_CONTENT_LENGTH = 50000;
    const MAX_TAGS_LENGTH = 500;
    const MAX_META_DESCRIPTION_LENGTH = 160;
    
    /**
     * Generate a secure API key
     */
    public static function generateApiKey() {
        $key = '';
        for ($i = 0; $i < self::API_KEY_LENGTH; $i++) {
            $key .= self::API_KEY_CHARS[random_int(0, strlen(self::API_KEY_CHARS) - 1)];
        }
        return $key;
    }
    
    /**
     * Validate API key format
     */
    public static function validateApiKey($key) {
        return strlen($key) >= 32 && preg_match('/^[a-zA-Z0-9!@#$%^&*]+$/', $key);
    }
    
    /**
     * Sanitize input data
     */
    public static function sanitizeInput($data) {
        if (is_array($data)) {
            return array_map([self::class, 'sanitizeInput'], $data);
        }
        
        // Remove null bytes
        $data = str_replace("\0", '', $data);
        
        // Trim whitespace
        $data = trim($data);
        
        // Remove excessive whitespace
        $data = preg_replace('/\s+/', ' ', $data);
        
        return $data;
    }
    
    /**
     * Validate blog post data
     */
    public static function validateBlogPost($data) {
        $errors = [];
        
        // Required fields
        $required = ['title', 'content', 'category'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                $errors[] = "Field '$field' is required";
            }
        }
        
        // Length validations
        if (isset($data['title']) && strlen($data['title']) > self::MAX_TITLE_LENGTH) {
            $errors[] = "Title exceeds maximum length of " . self::MAX_TITLE_LENGTH . " characters";
        }
        
        if (isset($data['content']) && strlen($data['content']) > self::MAX_CONTENT_LENGTH) {
            $errors[] = "Content exceeds maximum length of " . self::MAX_CONTENT_LENGTH . " characters";
        }
        
        if (isset($data['tags']) && strlen($data['tags']) > self::MAX_TAGS_LENGTH) {
            $errors[] = "Tags exceed maximum length of " . self::MAX_TAGS_LENGTH . " characters";
        }
        
        if (isset($data['meta_description']) && strlen($data['meta_description']) > self::MAX_META_DESCRIPTION_LENGTH) {
            $errors[] = "Meta description exceeds maximum length of " . self::MAX_META_DESCRIPTION_LENGTH . " characters";
        }
        
        // Content validation
        if (isset($data['content'])) {
            // Check for potentially malicious content
            $dangerous_patterns = [
                '/<script[^>]*>.*?<\/script>/is',
                '/javascript:/i',
                '/on\w+\s*=/i',
                '/<iframe[^>]*>/i',
                '/<object[^>]*>/i',
                '/<embed[^>]*>/i'
            ];
            
            foreach ($dangerous_patterns as $pattern) {
                if (preg_match($pattern, $data['content'])) {
                    $errors[] = "Content contains potentially dangerous elements";
                    break;
                }
            }
        }
        
        return $errors;
    }
    
    /**
     * Check rate limiting
     */
    public static function checkRateLimit($ip) {
        $cache_file = sys_get_temp_dir() . '/blog_api_rate_limit_' . md5($ip) . '.json';
        
        $current_time = time();
        $requests = [];
        
        // Load existing requests
        if (file_exists($cache_file)) {
            $data = json_decode(file_get_contents($cache_file), true);
            if ($data && isset($data['requests'])) {
                $requests = $data['requests'];
            }
        }
        
        // Remove old requests outside the window
        $requests = array_filter($requests, function($timestamp) use ($current_time) {
            return ($current_time - $timestamp) < self::RATE_LIMIT_WINDOW;
        });
        
        // Check if limit exceeded
        if (count($requests) >= self::RATE_LIMIT_REQUESTS) {
            return false;
        }
        
        // Add current request
        $requests[] = $current_time;
        
        // Save updated requests
        file_put_contents($cache_file, json_encode(['requests' => $requests]));
        
        return true;
    }
    
    /**
     * Log security events
     */
    public static function logSecurityEvent($event, $details = []) {
        $log_entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'event' => $event,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
            'details' => $details
        ];
        
        $log_file = __DIR__ . '/../logs/security.log';
        $log_dir = dirname($log_file);
        
        if (!is_dir($log_dir)) {
            mkdir($log_dir, 0755, true);
        }
        
        file_put_contents($log_file, json_encode($log_entry) . "\n", FILE_APPEND | LOCK_EX);
    }
    
    /**
     * Get client IP address
     */
    public static function getClientIP() {
        $ip_keys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
        
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }
}

// Security Headers
function setSecurityHeaders() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Content-Security-Policy: default-src \'self\'');
}

// Input Sanitization Functions
function sanitizeString($input) {
    return BlogSecurity::sanitizeInput($input);
}

function sanitizeHtml($input) {
    // Allow safe HTML tags for blog content
    $allowed_tags = '<p><br><strong><em><u><h1><h2><h3><h4><h5><h6><ul><ol><li><blockquote><code><pre><a><img>';
    return strip_tags($input, $allowed_tags);
}

// Validation Functions
function validateSlug($slug) {
    return preg_match('/^[a-z0-9-]+$/', $slug);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateUrl($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Database Security
function escapeDbInput($mysqli, $input) {
    return $mysqli->real_escape_string($input);
}

// File Upload Security
function validateImageUpload($file) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $max_size = 5 * 1024 * 1024; // 5MB
    
    if (!in_array($file['type'], $allowed_types)) {
        return false;
    }
    
    if ($file['size'] > $max_size) {
        return false;
    }
    
    // Check file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    return in_array($extension, $allowed_extensions);
}

// CSRF Protection
function generateCSRFToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
