<?php
/**
 * WordPress Cache Clearer
 * 
 * This script clears WordPress cache and forces pattern regeneration.
 * Upload this file to your WordPress root directory and access it via browser.
 * Delete this file after use for security.
 */

// Load WordPress
require_once('wp-load.php');

// Check if user is logged in and is admin
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    die('You must be logged in as an administrator to run this script.');
}

echo '<h1>WordPress Cache Clearer</h1>';
echo '<pre>';

// 1. Clear object cache
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
    echo "✓ Object cache flushed\n";
}

// 2. Clear transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%'");
echo "✓ Transients cleared\n";

// 3. Clear rewrite rules
flush_rewrite_rules();
echo "✓ Rewrite rules flushed\n";

// 4. Clear theme cache
if (function_exists('wp_clean_themes_cache')) {
    wp_clean_themes_cache();
    echo "✓ Theme cache cleared\n";
}

// 5. Delete compiled CSS
$upload_dir = wp_upload_dir();
$css_files = glob($upload_dir['basedir'] . '/*.css');
if ($css_files) {
    foreach ($css_files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    echo "✓ Compiled CSS files deleted\n";
}

// 6. Clear opcache if available
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✓ OPcache cleared\n";
}

echo "\n<strong>✅ Cache cleared successfully!</strong>\n";
echo "\nNext steps:\n";
echo "1. Hard refresh your browser (Ctrl+Shift+R or Cmd+Shift+R)\n";
echo "2. Check your site to verify links are working\n";
echo "3. DELETE THIS FILE (clear-cache.php) for security\n";
echo '</pre>';
?>