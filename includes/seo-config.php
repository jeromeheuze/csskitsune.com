<?php
/**
 * SEO base configuration. Update SITE_URL when deploying to production.
 */
if (!defined('SITE_URL')) {
    define('SITE_URL', 'https://csskitsune.com');
}
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'CSSKitsune');
}
if (!defined('SITE_DEFAULT_OG_IMAGE')) {
    define('SITE_DEFAULT_OG_IMAGE', SITE_URL . '/assets/logo/Kitsune_white.png');
}
