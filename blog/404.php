<?php
/**
 * CSS Kitsune Blog - 404 Error Page
 */

http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - CSS Kitsune</title>
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
    <header class="blog-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1><a href="/">{ CSSKitsune }</a></h1>
                    <p>Daily CSS Tutorials & Tips</p>
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
            <div class="error-page">
                <div class="error-content">
                    <h1>404 - Page Not Found</h1>
                    <p>The page you're looking for doesn't exist or has been moved.</p>
                    
                    <div class="error-actions">
                        <a href="/blog" class="btn btn-primary">Back to Blog</a>
                        <a href="/" class="btn btn-secondary">Go Home</a>
                    </div>
                    
                    <div class="error-suggestions">
                        <h3>Maybe you're looking for:</h3>
                        <ul>
                            <li><a href="/blog">Latest CSS Tutorials</a></li>
                            <li><a href="/blog/category/css-tips">CSS Tips</a></li>
                            <li><a href="/blog/category/animations">CSS Animations</a></li>
                            <li><a href="/blog/category/ui-components">UI Components</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blog-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> CSS Kitsune. All rights reserved.</p>
            <p>Powered by automated CSS tutorials and AI-generated content.</p>
        </div>
    </footer>

    <style>
        .error-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
            text-align: center;
        }
        
        .error-content {
            max-width: 600px;
            padding: 3rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .error-content h1 {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .error-content p {
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 2rem;
        }
        
        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: var(--bg-light);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .btn-secondary:hover {
            background: var(--border-color);
            transform: translateY(-2px);
        }
        
        .error-suggestions {
            text-align: left;
        }
        
        .error-suggestions h3 {
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .error-suggestions ul {
            list-style: none;
            padding: 0;
        }
        
        .error-suggestions li {
            margin-bottom: 0.5rem;
        }
        
        .error-suggestions a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .error-suggestions a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .error-content {
                padding: 2rem;
                margin: 0 1rem;
            }
            
            .error-content h1 {
                font-size: 2rem;
            }
            
            .error-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</body>
</html>
