<?php
/**
 * Plugin Name: Fix REST API Auth (Remote/Local)
 * Description: Enables Application Passwords over HTTP (useful for staging) and ensures Authorization headers reach WP.
 */

// Habilitar Application Passwords incluso en entornos sin SSL forzado (como algunos subdominios de temp)
add_filter('wp_is_application_passwords_supported', '__return_true');

// Asegurar que las cabeceras de autorización se procesen correctamente
// Soporte para Authorization estándar y X-WP-Auth personalizado para entornos CGI
$auth_header = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['HTTP_X_WP_AUTH'] ?? '';

if (!empty($auth_header)) {
    if (stripos($auth_header, 'Basic') === 0) {
        $auth = explode(':', base64_decode(substr($auth_header, 6)));
        if (count($auth) == 2) {
            $_SERVER['PHP_AUTH_USER'] = $auth[0];
            $_SERVER['PHP_AUTH_PW'] = $auth[1];
        }
    }
}
