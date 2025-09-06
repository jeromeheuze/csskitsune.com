# CSS Blog Automation Setup Guide

This guide will help you set up the complete CSS blog automation system using n8n, PHP, and MySQL.

## 🚀 Quick Start

### 1. Database Setup

1. **Create Database:**
   ```sql
   CREATE DATABASE css_blog_automation;
   USE css_blog_automation;
   ```

2. **Import Schema:**
   ```bash
   mysql -u your_username -p css_blog_automation < database/schema.sql
   ```

3. **Verify Tables:**
   ```sql
   SHOW TABLES;
   -- Should show: blog_categories, blog_posts, blog_tags, blog_post_tags
   ```

### 2. API Configuration

1. **Update Database Credentials:**
   Edit `api/blog-post.php` and update these lines:
   ```php
   $host = 'localhost';
   $username = 'your_db_username';
   $password = 'your_db_password';
   $database = 'css_blog_automation';
   ```

2. **Generate API Key:**
   ```php
   // Run this once to generate a secure API key
   require_once 'config/security.php';
   echo BlogSecurity::generateApiKey();
   ```

3. **Set API Key:**
   Update the API key in both:
   - `api/blog-post.php` (line with `$valid_api_key`)
   - `n8n/workflow.json` (in the Content Formatter node)

### 3. n8n Workflow Setup

1. **Import Workflow:**
   - Open your n8n instance
   - Click "Import from File"
   - Upload `n8n/workflow.json`

2. **Configure OpenAI:**
   - Go to n8n Credentials
   - Add "OpenAI" credential
   - Enter your OpenAI API key

3. **Update API URL:**
   In the "Send to Blog API" node, change:
   ```
   https://yoursite.com/api/blog-post.php
   ```
   to your actual domain.

4. **Test Workflow:**
   - Click "Execute Workflow" manually
   - Check the execution log
   - Verify a blog post appears in your database

## 🔧 Detailed Configuration

### Database Configuration

The system uses these main tables:

- **blog_posts**: Main content storage
- **blog_categories**: Content categories (pre-populated)
- **blog_tags**: Tag system
- **blog_post_tags**: Many-to-many tag relationships

### API Security

The API includes several security features:

- **API Key Authentication**: Required for all requests
- **Rate Limiting**: 10 requests per hour per IP
- **Input Validation**: Comprehensive data validation
- **SQL Injection Protection**: Prepared statements
- **XSS Protection**: Content sanitization

### Content Categories

The system automatically generates content in these categories:

1. **CSS Tips** - Essential techniques and best practices
2. **Animations** - CSS animations, transitions, and effects
3. **UI Components** - Reusable CSS components and patterns
4. **Game UI** - Gaming-inspired UI elements and effects
5. **Layouts** - CSS Grid, Flexbox, and layout techniques

## 🧪 Testing

### Manual API Test

```bash
curl -X POST https://yoursite.com/api/blog-post.php \
  -H "Content-Type: application/json" \
  -d '{
    "api_key": "your_api_key_here",
    "title": "Test CSS Tutorial",
    "content": "<h1>Test Content</h1><p>This is a test blog post.</p>",
    "category": "CSS Tips",
    "tags": "css, test, tutorial",
    "meta_description": "A test CSS tutorial for automation testing.",
    "status": "published",
    "author": "CSS Kitsune"
  }'
```

### Expected Response

```json
{
  "success": true,
  "message": "Blog post created successfully",
  "data": {
    "id": 1,
    "title": "Test CSS Tutorial",
    "slug": "test-css-tutorial",
    "url": "https://yoursite.com/blog/test-css-tutorial",
    "category": "CSS Tips",
    "tags": "css, test, tutorial",
    "status": "published",
    "created_at": "2024-01-01 12:00:00"
  }
}
```

## 📊 Monitoring

### Log Files

The system creates log files in the `logs/` directory:

- `security.log` - Security events and rate limiting
- `api.log` - API requests and responses
- `error.log` - System errors

### Database Monitoring

Check these queries to monitor the system:

```sql
-- Recent posts
SELECT title, category, created_at FROM blog_posts 
ORDER BY created_at DESC LIMIT 10;

-- Posts by category
SELECT category, COUNT(*) as count 
FROM blog_posts 
GROUP BY category;

-- Daily post count
SELECT DATE(created_at) as date, COUNT(*) as posts 
FROM blog_posts 
GROUP BY DATE(created_at) 
ORDER BY date DESC;
```

## 🔍 Troubleshooting

### Common Issues

**API Returns 401 Unauthorized**
- Check API key matches in both PHP and n8n
- Verify key is being sent in request headers

**Database Connection Failed**
- Verify MySQL credentials in `api/blog-post.php`
- Check database exists and user has permissions
- Ensure MySQLi extension is enabled

**OpenAI API Errors**
- Verify API key is valid and has credits
- Check rate limits in OpenAI dashboard
- Monitor usage in n8n execution logs

**Workflow Not Running**
- Check if workflow is active in n8n
- Verify schedule trigger settings
- Check n8n execution history for errors

### Debug Mode

Enable debug mode in `api/blog-post.php`:

```php
// Add at the top of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');
```

## 🚀 Production Deployment

### Security Checklist

- [ ] Change default API key
- [ ] Disable error display in production
- [ ] Set up SSL/HTTPS
- [ ] Configure proper file permissions
- [ ] Set up regular database backups
- [ ] Monitor API usage and costs

### Performance Optimization

- [ ] Add database indexes for frequently queried columns
- [ ] Implement caching for API responses
- [ ] Set up CDN for static assets
- [ ] Monitor server resources

### Backup Strategy

```bash
# Daily database backup
mysqldump -u username -p css_blog_automation > backup_$(date +%Y%m%d).sql

# Backup uploaded files
tar -czf files_backup_$(date +%Y%m%d).tar.gz uploads/
```

## 📈 Scaling

### High Traffic Considerations

- **Database**: Consider read replicas for high read volume
- **API**: Implement Redis caching for frequent requests
- **Content**: Use CDN for image delivery
- **Monitoring**: Set up alerts for system health

### Content Management

- **Quality Control**: Review generated content regularly
- **Topic Updates**: Add new topics to the workflow
- **Category Management**: Adjust categories based on performance
- **SEO Optimization**: Monitor search rankings and adjust

## 🔮 Future Enhancements

### Planned Features

1. **Image Generation**: Auto-generate featured images using DALL-E
2. **Social Media**: Auto-post to Twitter/LinkedIn
3. **Email Newsletter**: Auto-send weekly roundups
4. **Analytics**: Track post performance and engagement
5. **A/B Testing**: Test different AI prompts for better content

### Integration Ideas

- **GitHub**: Pull trending CSS repositories for topics
- **Reddit**: Monitor r/webdev for trending discussions
- **Stack Overflow**: Track popular CSS questions
- **CodePen**: Feature trending CSS pens

## 📞 Support

If you encounter issues:

1. Check the troubleshooting section above
2. Review log files in the `logs/` directory
3. Verify all credentials are correctly set
4. Test components individually (API, then workflow)
5. Check n8n execution history for detailed error messages

## 📄 License

This automation system is provided as-is for educational and personal use. Ensure compliance with:

- OpenAI API terms of service
- Your hosting provider's terms
- Content licensing requirements
- Local data protection regulations

---

**Happy Automating! 🚀**

Your CSS blog will now generate fresh, high-quality content daily without manual intervention.
