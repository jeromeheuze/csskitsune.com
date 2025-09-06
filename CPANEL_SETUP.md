# cPanel Setup Guide for CSS Blog Automation

This guide will help you set up the CSS blog automation system on a cPanel hosting environment.

## 🚀 Quick Setup Steps

### 1. Upload Files to cPanel

1. **Access cPanel File Manager**
   - Log into your cPanel account
   - Navigate to "File Manager"
   - Go to your domain's public_html folder

2. **Create Directory Structure**
   ```
   public_html/
   ├── api/
   │   └── blog-post.php
   ├── config/
   │   └── security.php
   ├── database/
   │   └── schema.sql
   └── logs/ (will be created automatically)
   ```

3. **Upload Files**
   - Upload `api/blog-post.php` to `public_html/api/`
   - Upload `config/security.php` to `public_html/config/`
   - Keep `database/schema.sql` for database setup

### 2. Database Setup in cPanel

1. **Create Database**
   - Go to "MySQL Databases" in cPanel
   - Create a new database named `spectrum_csskitsune`
   - Note down the full database name (usually includes your username prefix)

2. **Create Database User**
   - Create a new MySQL user
   - Assign a strong password
   - Note down the username and password

3. **Import Schema**
   - Go to "phpMyAdmin" in cPanel
   - Select your database
   - Click "Import" tab
   - Upload the `database/schema.sql` file
   - Click "Go" to execute

### 3. Configure API Endpoint

1. **Update Database Credentials**
   Edit `public_html/api/blog-post.php` and update these lines:
   ```php
   $host = 'localhost';
   $username = 'your_cpanel_db_username';  // e.g., username_spectrum
   $password = 'your_db_password';
   $database = 'your_cpanel_db_name';      // e.g., username_spectrum_csskitsune
   ```

2. **Generate API Key**
   Create a secure API key (you can use an online generator or run this PHP code):
   ```php
   <?php
   echo bin2hex(random_bytes(32));
   ?>
   ```

3. **Set API Key**
   Update the API key in `public_html/api/blog-post.php`:
   ```php
   $valid_api_key = '58855f86200ac86ed89742daa0f8d17188d23a89aecfe6332982181e6e6d4541';
   ```

### 4. Test the API

1. **Check File Permissions**
   - Right-click on `blog-post.php` in File Manager
   - Set permissions to 644 (readable by web server)

2. **Test API Endpoint**
   - Open your browser
   - Go to `https://csskitsune.com/api/blog-post.php`
   - You should see: "Method not allowed. Only POST requests are accepted."

3. **Run Test Script**
   Update `test/test-api.php` with your actual API key and run it:
   ```bash
   php test/test-api.php
   ```

### 5. Configure n8n Workflow

1. **Update API URL**
   In your n8n workflow, the API URL should be:
   ```
   https://csskitsune.com/api/blog-post.php
   ```

2. **Set API Key**
   Update the API key in the "Content Formatter" node of your n8n workflow

3. **Test Workflow**
   - Execute the workflow manually in n8n
   - Check the execution log for any errors

## 🔧 cPanel-Specific Configuration

### File Permissions
```
public_html/api/blog-post.php     - 644
public_html/config/security.php   - 644
public_html/logs/                 - 755 (directory)
```

### Database Connection
cPanel typically uses these database connection details:
- **Host**: localhost
- **Database Name**: `username_spectrum_csskitsune` (with your cPanel username prefix)
- **Username**: `username_spectrum` (with your cPanel username prefix)
- **Password**: The password you set when creating the database user

### SSL/HTTPS
Make sure your domain has SSL enabled in cPanel:
- Go to "SSL/TLS" in cPanel
- Enable "Force HTTPS Redirect" if available

## 🧪 Testing Checklist

### 1. API Endpoint Test
```bash
curl -X POST https://csskitsune.com/api/blog-post.php \
  -H "Content-Type: application/json" \
  -d '{
    "api_key": "your_api_key",
    "title": "Test Post",
    "content": "<h1>Test</h1><p>This is a test.</p>",
    "category": "CSS Tips"
  }'
```

### 2. Database Test
Check if the database tables were created:
```sql
SHOW TABLES;
-- Should show: blog_categories, blog_posts, blog_tags, blog_post_tags
```

### 3. n8n Workflow Test
- Execute workflow manually
- Check execution logs
- Verify blog post appears in database

## 🚨 Common cPanel Issues

### Issue 1: 404 Not Found
**Solution**: Make sure the file is in the correct location:
- File should be at: `public_html/api/blog-post.php`
- Not at: `public_html/blog-post.php`

### Issue 2: Database Connection Failed
**Solution**: Check database credentials:
- Use the full database name with username prefix
- Verify the database user has proper permissions
- Check if the database user is assigned to the database

### Issue 3: Permission Denied
**Solution**: Set correct file permissions:
- Files: 644
- Directories: 755
- Use cPanel File Manager to set permissions

### Issue 4: SSL Certificate Issues
**Solution**: Enable SSL in cPanel:
- Go to "SSL/TLS" in cPanel
- Install SSL certificate
- Enable "Force HTTPS Redirect"

## 📊 Monitoring in cPanel

### Error Logs
- Go to "Error Logs" in cPanel
- Check for PHP errors related to your API

### Database Management
- Use "phpMyAdmin" to monitor database
- Check for new blog posts in the `blog_posts` table

### File Manager
- Monitor the `logs/` directory for system logs
- Check file permissions and ownership

## 🔒 Security Considerations

### cPanel Security
- Keep cPanel updated
- Use strong passwords
- Enable two-factor authentication if available

### API Security
- Use a strong, unique API key
- Monitor API usage in logs
- Consider IP whitelisting if needed

### Database Security
- Use strong database passwords
- Limit database user permissions
- Regular database backups

## 📞 Support

If you encounter issues:

1. **Check cPanel Error Logs**
   - Go to "Error Logs" in cPanel
   - Look for PHP errors

2. **Verify File Locations**
   - Ensure files are in the correct directories
   - Check file permissions

3. **Test Database Connection**
   - Use phpMyAdmin to verify database access
   - Check if tables were created successfully

4. **Contact Hosting Support**
   - If issues persist, contact your hosting provider
   - They can help with cPanel-specific configurations

---

**Your CSS blog automation system should now be working on cPanel! 🚀**
