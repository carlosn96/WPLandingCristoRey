<?php
/**
 * Plugin Name: Verbum Domini Image Manager
 * Description: Interfaz para gestionar las imágenes de las entradas de Verbum Domini y re-generar el diseño editorial. (Restructured)
 * Version: 1.1.0
 * Author: Antigravity
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define Constants
define('VBIM_VERSION', '1.1.0');
define('VBIM_PATH', plugin_dir_path(__FILE__));
define('VBIM_URL', plugin_dir_url(__FILE__));

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once VBIM_PATH . 'includes/class-vbim.php';

/**
 * Begins execution of the plugin.
 */
function run_vbim()
{
    $plugin = new VBIM();
    $plugin->run();
}
run_vbim();

// Activation and Deactivation
register_activation_hook(__FILE__, 'activate_vbim');
register_deactivation_hook(__FILE__, 'deactivate_vbim');

function activate_vbim()
{
    // Potential activation logic (e.g., flush rewrite rules)
    flush_rewrite_rules();
}

function deactivate_vbim()
{
    // Potential deactivation logic
}
