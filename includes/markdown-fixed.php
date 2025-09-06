<?php
/**
 * Fixed Markdown Parser for CSS Kitsune Blog
 * 
 * This parser handles the specific formatting issues in our blog content
 */

class FixedMarkdown {
    
    public static function parse($markdown) {
        $html = $markdown;
        
        // Clean up any escaped characters first
        $html = str_replace('\\`', '`', $html);
        $html = str_replace('\\*', '*', $html);
        $html = str_replace('\\#', '#', $html);
        $html = str_replace('\\-', '-', $html);
        
        // Store code blocks with placeholders to protect them from other parsing
        $codeBlocks = [];
        $html = self::extractCodeBlocks($html, $codeBlocks);
        
        // Parse headers
        $html = self::parseHeaders($html);
        
        // Parse lists
        $html = self::parseLists($html);
        
        // Parse inline elements
        $html = self::parseInlineElements($html);
        
        // Parse paragraphs
        $html = self::parseParagraphs($html);
        
        // Restore code blocks
        $html = self::restoreCodeBlocks($html, $codeBlocks);
        
        return trim($html);
    }
    
    private static function extractCodeBlocks($text, &$codeBlocks) {
        // Extract code blocks and replace with placeholders
        $counter = 0;
        
        // Pattern 1: ```css\ncontent\n```
        $text = preg_replace_callback('/```css\s*\n(.*?)\n```/s', function($matches) use (&$codeBlocks, &$counter) {
            $placeholder = "___CODEBLOCK_" . $counter . "___";
            $codeBlocks[$placeholder] = '<pre><code class="language-css">' . htmlspecialchars($matches[1]) . '</code></pre>';
            $counter++;
            return $placeholder;
        }, $text);
        
        // Pattern 2: ```html\ncontent\n```
        $text = preg_replace_callback('/```html\s*\n(.*?)\n```/s', function($matches) use (&$codeBlocks, &$counter) {
            $placeholder = "___CODEBLOCK_" . $counter . "___";
            $codeBlocks[$placeholder] = '<pre><code class="language-html">' . htmlspecialchars($matches[1]) . '</code></pre>';
            $counter++;
            return $placeholder;
        }, $text);
        
        // Pattern 3: ```javascript\ncontent\n```
        $text = preg_replace_callback('/```javascript\s*\n(.*?)\n```/s', function($matches) use (&$codeBlocks, &$counter) {
            $placeholder = "___CODEBLOCK_" . $counter . "___";
            $codeBlocks[$placeholder] = '<pre><code class="language-javascript">' . htmlspecialchars($matches[1]) . '</code></pre>';
            $counter++;
            return $placeholder;
        }, $text);
        
        // Pattern 4: ```\ncontent\n``` (generic)
        $text = preg_replace_callback('/```\s*\n(.*?)\n```/s', function($matches) use (&$codeBlocks, &$counter) {
            $placeholder = "___CODEBLOCK_" . $counter . "___";
            $codeBlocks[$placeholder] = '<pre><code>' . htmlspecialchars($matches[1]) . '</code></pre>';
            $counter++;
            return $placeholder;
        }, $text);
        
        return $text;
    }
    
    private static function restoreCodeBlocks($text, $codeBlocks) {
        // Restore code blocks from placeholders
        foreach ($codeBlocks as $placeholder => $html) {
            $text = str_replace($placeholder, $html, $text);
        }
        return $text;
    }
    
    private static function parseHeaders($text) {
        // Parse headers (order matters - most specific first)
        $text = preg_replace('/^#### (.*$)/m', '<h4>$1</h4>', $text);
        $text = preg_replace('/^### (.*$)/m', '<h3>$1</h3>', $text);
        $text = preg_replace('/^## (.*$)/m', '<h2>$1</h2>', $text);
        $text = preg_replace('/^# (.*$)/m', '<h1>$1</h1>', $text);
        
        return $text;
    }
    
    private static function parseLists($text) {
        // Parse unordered lists
        $text = preg_replace('/^\* (.+)$/m', '<li>$1</li>', $text);
        $text = preg_replace('/^- (.+)$/m', '<li>$1</li>', $text);
        
        // Parse ordered lists
        $text = preg_replace('/^\d+\. (.+)$/m', '<li>$1</li>', $text);
        
        // Wrap consecutive list items in ul tags
        $text = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $text);
        
        return $text;
    }
    
    private static function parseInlineElements($text) {
        // Parse bold and italic
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
        
        // Parse inline code
        $text = preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);
        
        // Parse links
        $text = preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2">$1</a>', $text);
        
        // Parse horizontal rules
        $text = preg_replace('/^---$/m', '<hr>', $text);
        $text = preg_replace('/^___$/m', '<hr>', $text);
        $text = preg_replace('/^\*\*\*$/m', '<hr>', $text);
        
        return $text;
    }
    
    private static function parseParagraphs($text) {
        // Split into paragraphs
        $paragraphs = preg_split('/\n\s*\n/', $text);
        $result = '';
        
        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (empty($paragraph)) continue;
            
            // Skip if it's already a block element (including code blocks)
            if (preg_match('/^<(h[1-6]|ul|ol|pre|hr|___CODEBLOCK_)/', $paragraph)) {
                $result .= $paragraph . "\n\n";
            } else {
                $result .= '<p>' . $paragraph . '</p>' . "\n\n";
            }
        }
        
        return trim($result);
    }
}
?>
