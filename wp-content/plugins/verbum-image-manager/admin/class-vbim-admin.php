<?php

class VBIM_Admin
{

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function register_menu()
    {
        add_menu_page(
            'Verbum Image Manager',
            'Verbum Images',
            'manage_options',
            $this->plugin_name,
            array($this, 'render_dashboard'),
            'dashicons-images-alt2',
            25
        );
    }

    public function enqueue_assets($hook)
    {
        if ('toplevel_page_' . $this->plugin_name !== $hook) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_style($this->plugin_name . '-style', VBIM_URL . 'admin/assets/style.css', array(), $this->version);
        wp_enqueue_script($this->plugin_name . '-js', VBIM_URL . 'admin/assets/script.js', array('jquery'), $this->version, true);

        wp_localize_script($this->plugin_name . '-js', 'vbimData', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('vbim_nonce')
        ));
    }

    public function render_dashboard()
    {
        include VBIM_PATH . 'admin/views/dashboard.php';
    }

    public function ajax_get_posts()
    {
        check_ajax_referer('vbim_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permisos insuficientes.');
        }

        $args = array(
            'category' => 4, // Verbum Domini
            'posts_per_page' => 10,
            'post_status' => array('publish', 'draft', 'pending'),
        );

        $posts = get_posts($args);
        $result = array();

        foreach ($posts as $post) {
            $img_url = get_the_post_thumbnail_url($post->ID, 'medium') ?: 'https://picsum.photos/300/200';
            $result[] = array(
                'id' => $post->ID,
                'title' => get_the_title($post->ID),
                'image' => $img_url,
                'date' => get_the_date('d M Y', $post->ID),
                'status' => $post->post_status
            );
        }

        wp_send_json_success($result);
    }

    public function ajax_update_post()
    {
        check_ajax_referer('vbim_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permisos insuficientes.');
        }

        $post_id = intval($_POST['post_id']);
        $media_id = intval($_POST['media_id']);

        if (!$post_id || !$media_id) {
            wp_send_json_error('Datos insuficientes.');
        }

        // 1. Cambiar imagen destacada
        set_post_thumbnail($post_id, $media_id);
        $image_url = wp_get_attachment_url($media_id);

        // 2. Recuperar metadatos para el re-renderizado
        $keyword = get_post_meta($post_id, 'vb_keyword', true) ?: 'VERBUM';
        $phrase = get_post_meta($post_id, 'vb_central_phrase', true) ?: get_the_title($post_id);
        $citation = get_post_meta($post_id, 'vb_citation', true) ?: $keyword;
        $date_str = get_the_date('Y-m-d', $post_id);

        $post = get_post($post_id);
        $passage_text = get_post_meta($post_id, 'vb_passage_text', true) ?: strip_tags($post->post_content);

        // 3. Re-generar HTML usando el Renderer
        $new_html = VBIM_Renderer::render_editorial_html($keyword, $phrase, $passage_text, $image_url, $date_str, $citation);

        // 4. Actualizar post_content
        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => $new_html
        ));

        wp_send_json_success(array('message' => 'Entrada actualizada con éxito.'));
    }
}
