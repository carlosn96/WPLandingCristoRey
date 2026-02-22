<?php

class VBIM {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'verbum-image-manager';
        $this->version = '1.1.0';
        $this->load_dependencies();
        $this->define_admin_hooks();
    }

    private function load_dependencies() {
        require_once VBIM_PATH . 'includes/class-vbim-loader.php';
        require_once VBIM_PATH . 'includes/class-vbim-renderer.php';
        require_once VBIM_PATH . 'admin/class-vbim-admin.php';
        $this->loader = new VBIM_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new VBIM_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'register_menu' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_assets' );
        $this->loader->add_action( 'wp_ajax_vbim_get_posts', $plugin_admin, 'ajax_get_posts' );
        $this->loader->add_action( 'wp_ajax_vbim_update_post', $plugin_admin, 'ajax_update_post' );
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }

    public function get_loader() {
        return $this->loader;
    }
}
