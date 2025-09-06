-- CSS Blog Automation Database Schema
-- This schema creates the necessary tables for the automated blog system

-- Create database (uncomment if needed)
-- CREATE DATABASE spectrum_csskitsune;
-- USE spectrum_csskitsune;

-- Blog categories table
CREATE TABLE IF NOT EXISTS blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    color VARCHAR(7) DEFAULT '#3B82F6',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Blog tags table (optional but useful for organization)
CREATE TABLE IF NOT EXISTS blog_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Main blog posts table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content LONGTEXT NOT NULL,
    excerpt TEXT,
    category_id INT,
    tags VARCHAR(500), -- Comma-separated tags for simplicity
    meta_description VARCHAR(160),
    meta_keywords VARCHAR(255),
    featured_image VARCHAR(500),
    status ENUM('draft', 'published', 'scheduled') DEFAULT 'published',
    author VARCHAR(100) DEFAULT 'CSS Kitsune',
    views INT DEFAULT 0,
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,
    
    INDEX idx_category (category_id),
    INDEX idx_status (status),
    INDEX idx_published_at (published_at),
    INDEX idx_created_at (created_at),
    INDEX idx_slug (slug),
    
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
);

-- Many-to-many relationship for tags (optional advanced feature)
CREATE TABLE IF NOT EXISTS blog_post_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    UNIQUE KEY unique_post_tag (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES blog_tags(id) ON DELETE CASCADE
);

-- Insert default categories
INSERT INTO blog_categories (name, slug, description, color) VALUES
('CSS Tips', 'css-tips', 'Essential CSS techniques and best practices', '#10B981'),
('Animations', 'animations', 'CSS animations, transitions, and effects', '#F59E0B'),
('UI Components', 'ui-components', 'Reusable CSS components and patterns', '#8B5CF6'),
('Game UI', 'game-ui', 'Gaming-inspired UI elements and effects', '#EF4444'),
('Layouts', 'layouts', 'CSS Grid, Flexbox, and layout techniques', '#06B6D4'),
('Responsive Design', 'responsive-design', 'Mobile-first and responsive CSS techniques', '#84CC16')
ON DUPLICATE KEY UPDATE name=VALUES(name);

-- Insert some common tags
INSERT INTO blog_tags (name, slug, description) VALUES
('css', 'css', 'Core CSS concepts and properties'),
('tutorial', 'tutorial', 'Step-by-step learning content'),
('tips', 'tips', 'Quick tips and tricks'),
('animations', 'animations', 'Animation-related content'),
('responsive', 'responsive', 'Responsive design techniques'),
('grid', 'grid', 'CSS Grid layout'),
('flexbox', 'flexbox', 'Flexbox layout'),
('hover', 'hover', 'Hover effects and interactions'),
('modern', 'modern', 'Modern CSS features'),
('performance', 'performance', 'CSS performance optimization')
ON DUPLICATE KEY UPDATE name=VALUES(name);

-- Create indexes for better performance
CREATE INDEX idx_blog_posts_search ON blog_posts(title, content(100));
CREATE INDEX idx_blog_posts_category_status ON blog_posts(category_id, status);
CREATE INDEX idx_blog_posts_published ON blog_posts(published_at, status);
