<?php
/**
 * Parsedown - A better Markdown Parser in PHP
 * 
 * This is a simplified version of Parsedown for our blog
 * 
 * @author Emanuil Rusev
 * @version 1.0
 */

class Parsedown {
    
    public function text($text) {
        $text = $this->cleanupEscapedCharacters($text);
        $text = $this->parseCodeBlocks($text);
        $text = $this->parseHeaders($text);
        $text = $this->parseLists($text);
        $text = $this->parseInlineElements($text);
        $text = $this->parseParagraphs($text);
        
        return $text;
    }
    
    private function cleanupEscapedCharacters($text) {
        // Remove escaped characters that are causing issues
        $text = str_replace('\\`', '`', $text);
        $text = str_replace('\\*', '*', $text);
        $text = str_replace('\\#', '#', $text);
        $text = str_replace('\\-', '-', $text);
        $text = str_replace('\\[', '[', $text);
        $text = str_replace('\\]', ']', $text);
        $text = str_replace('\\(', '(', $text);
        $text = str_replace('\\)', ')', $text);
        
        return $text;
    }
    
    private function parseCodeBlocks($text) {
        // Parse fenced code blocks - handle various formats
        $text = preg_replace('/```css\s*\n(.*?)\n```/s', '<pre><code class="language-css">$1</code></pre>', $text);
        $text = preg_replace('/```html\s*\n(.*?)\n```/s', '<pre><code class="language-html">$1</code></pre>', $text);
        $text = preg_replace('/```javascript\s*\n(.*?)\n```/s', '<pre><code class="language-javascript">$1</code></pre>', $text);
        $text = preg_replace('/```\s*\n(.*?)\n```/s', '<pre><code>$1</code></pre>', $text);
        
        // Handle code blocks without language specification
        $text = preg_replace('/```\s*(.*?)\s*```/s', '<pre><code>$1</code></pre>', $text);
        
        return $text;
    }
    
    private function parseHeaders($text) {
        // Parse headers
        $text = preg_replace('/^#### (.*$)/m', '<h4>$1</h4>', $text);
        $text = preg_replace('/^### (.*$)/m', '<h3>$1</h3>', $text);
        $text = preg_replace('/^## (.*$)/m', '<h2>$1</h2>', $text);
        $text = preg_replace('/^# (.*$)/m', '<h1>$1</h1>', $text);
        
        return $text;
    }
    
    private function parseLists($text) {
        // Parse unordered lists
        $text = preg_replace('/^\* (.+)$/m', '<li>$1</li>', $text);
        $text = preg_replace('/^- (.+)$/m', '<li>$1</li>', $text);
        
        // Parse ordered lists
        $text = preg_replace('/^\d+\. (.+)$/m', '<li>$1</li>', $text);
        
        // Wrap consecutive list items
        $text = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $text);
        
        return $text;
    }
    
    private function parseInlineElements($text) {
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
    
    private function parseParagraphs($text) {
        // Split into paragraphs
        $paragraphs = preg_split('/\n\s*\n/', $text);
        $result = '';
        
        foreach ($paragraphs as $paragraph) {
            $paragraph = trim($paragraph);
            if (empty($paragraph)) continue;
            
            // Skip if it's already a block element
            if (preg_match('/^<(h[1-6]|ul|ol|pre|hr)/', $paragraph)) {
                $result .= $paragraph . "\n\n";
            } else {
                $result .= '<p>' . $paragraph . '</p>' . "\n\n";
            }
        }
        
        return trim($result);
    }
}
?>
