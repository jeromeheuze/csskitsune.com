<?php
/**
 * Enhanced Markdown Parser for CSS Kitsune Blog
 * 
 * Converts Markdown to HTML for blog posts
 * 
 * @author CSS Kitsune
 * @version 2.0
 */

class SimpleMarkdown {
    
    public static function parse($markdown) {
        $html = $markdown;
        
        // Clean up any escaped characters first
        $html = str_replace('\\`', '`', $html);
        $html = str_replace('\\*', '*', $html);
        $html = str_replace('\\#', '#', $html);
        
        // Code blocks first (before inline code)
        $html = preg_replace('/```css\n(.*?)\n```/s', '<pre><code class="language-css">$1</code></pre>', $html);
        $html = preg_replace('/```html\n(.*?)\n```/s', '<pre><code class="language-html">$1</code></pre>', $html);
        $html = preg_replace('/```javascript\n(.*?)\n```/s', '<pre><code class="language-javascript">$1</code></pre>', $html);
        $html = preg_replace('/```\n(.*?)\n```/s', '<pre><code>$1</code></pre>', $html);
        
        // Headers
        $html = preg_replace('/^#### (.*$)/m', '<h4>$1</h4>', $html);
        $html = preg_replace('/^### (.*$)/m', '<h3>$1</h3>', $html);
        $html = preg_replace('/^## (.*$)/m', '<h2>$1</h2>', $html);
        $html = preg_replace('/^# (.*$)/m', '<h1>$1</h1>', $html);
        
        // Horizontal rules
        $html = preg_replace('/^---$/m', '<hr>', $html);
        $html = preg_replace('/^___$/m', '<hr>', $html);
        $html = preg_replace('/^\*\*\*$/m', '<hr>', $html);
        
        // Lists (unordered)
        $html = preg_replace('/^\* (.+)$/m', '<li>$1</li>', $html);
        $html = preg_replace('/^- (.+)$/m', '<li>$1</li>', $html);
        
        // Lists (ordered)
        $html = preg_replace('/^\d+\. (.+)$/m', '<li>$1</li>', $html);
        
        // Wrap consecutive list items in ul/ol tags
        $html = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $html);
        
        // Bold and italic (bold first, then italic)
        $html = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $html);
        $html = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $html);
        
        // Inline code (after bold/italic to avoid conflicts)
        $html = preg_replace('/`([^`]+)`/', '<code>$1</code>', $html);
        
        // Links
        $html = preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2">$1</a>', $html);
        
        // Line breaks and paragraphs
        $html = preg_replace('/\n\n/', '</p><p>', $html);
        $html = '<p>' . $html . '</p>';
        
        // Clean up empty paragraphs
        $html = preg_replace('/<p><\/p>/', '', $html);
        $html = preg_replace('/<p>\s*<\/p>/', '', $html);
        
        // Clean up nested paragraphs around block elements
        $html = preg_replace('/<p>(<h[1-6]>.*<\/h[1-6]>)<\/p>/', '$1', $html);
        $html = preg_replace('/<p>(<ul>.*<\/ul>)<\/p>/s', '$1', $html);
        $html = preg_replace('/<p>(<ol>.*<\/ol>)<\/p>/s', '$1', $html);
        $html = preg_replace('/<p>(<pre>.*<\/pre>)<\/p>/s', '$1', $html);
        $html = preg_replace('/<p>(<hr>)<\/p>/', '$1', $html);
        
        // Clean up extra whitespace
        $html = preg_replace('/\s+/', ' ', $html);
        $html = preg_replace('/>\s+</', '><', $html);
        
        // Add proper line breaks for readability
        $html = str_replace('</h1>', "</h1>\n\n", $html);
        $html = str_replace('</h2>', "</h2>\n\n", $html);
        $html = str_replace('</h3>', "</h3>\n\n", $html);
        $html = str_replace('</h4>', "</h4>\n\n", $html);
        $html = str_replace('</p>', "</p>\n\n", $html);
        $html = str_replace('</ul>', "</ul>\n\n", $html);
        $html = str_replace('</ol>', "</ol>\n\n", $html);
        $html = str_replace('</pre>', "</pre>\n\n", $html);
        $html = str_replace('<hr>', "<hr>\n\n", $html);
        
        return trim($html);
    }
}
?>
