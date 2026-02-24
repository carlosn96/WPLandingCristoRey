<?php
/**
 * Plugin Name: Cristo Rey Institucional
 * Plugin URI:  https://capellaniacristorey.com/
 * Description: Administra la información de contacto, dirección y redes sociales de la Capellanía.
 * Version:     1.0.0
 * Author:      Jan Dev
 * Text Domain: cristorey-inst
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define plugin paths
define('CRISTOREY_INST_PATH', plugin_dir_path(__FILE__));
define('CRISTOREY_INST_URL', plugin_dir_url(__FILE__));

// Require the settings class
require_once CRISTOREY_INST_PATH . 'includes/class-cristorey-admin-settings.php';

// Initialize the settings
function cristorey_inst_init()
{
    if (is_admin()) {
        $settings = new CristoRey_Admin_Settings();
        $settings->init();
    }
}
add_action('plugins_loaded', 'cristorey_inst_init');
