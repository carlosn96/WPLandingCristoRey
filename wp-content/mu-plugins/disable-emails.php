<?php
// Disable all emails to prevent local development hangs on WP mail functions
if (!function_exists('wp_mail')) {
    function wp_mail()
    {
        return true;
    }
}
