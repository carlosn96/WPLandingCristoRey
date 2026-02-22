<?php
/**
 * Plugin Name: Verbum Domini Image Manager
 * Description: Interfaz para gestionar las imágenes de las entradas de Verbum Domini y re-generar el diseño editorial.
 * Version: 1.0
 * Author: Antigravity
 */

if (!defined('ABSPATH')) {
    exit;
}

define('VBIM_PATH', plugin_dir_path(__FILE__));
define('VBIM_URL', plugin_dir_url(__FILE__));

require_once VBIM_PATH . 'includes/renderer-port.php';

// Menú de Administración
add_action('admin_menu', 'vbim_register_menu');
function vbim_register_menu()
{
    add_menu_page(
        'Verbum Image Manager',
        'Verbum Images',
        'manage_options',
        'verbum-image-manager',
        'vbim_render_dashboard',
        'dashicons-images-alt2',
        25
    );
}

// Encolar scripts y estilos
add_action('admin_enqueue_scripts', 'vbim_enqueue_assets');
function vbim_enqueue_assets($hook)
{
    if ('toplevel_page_verbum-image-manager' !== $hook) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_style('vbim-admin-style', VBIM_URL . 'admin/assets/style.css', array(), '1.0');
    wp_enqueue_script('vbim-admin-js', VBIM_URL . 'admin/assets/script.js', array('jquery'), '1.0', true);

    wp_localize_script('vbim-admin-js', 'vbimData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vbim_nonce')
    ));
}

// Dashboard
function vbim_render_dashboard()
{
    include VBIM_PATH . 'admin/dashboard.php';
}

// AJAX: Buscar posts
add_action('wp_ajax_vbim_get_posts', 'vbim_ajax_get_posts');
function vbim_ajax_get_posts()
{
    check_ajax_referer('vbim_nonce', 'nonce');

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

// AJAX: Actualizar post
add_action('wp_ajax_vbim_update_post', 'vbim_ajax_update_post');
function vbim_ajax_update_post()
{
    check_ajax_referer('vbim_nonce', 'nonce');

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

    // Obtener el contenido original (para extraer párrafos si no se guardaron por separado)
    $post = get_post($post_id);

    // Intento de extraer el texto del pasaje del HTML anterior o de un meta (idealmente pipeline.py guardaría vb_passage_text)
    // Como no lo guardamos en el meta vb_passage_text todavía, intentaremos sacarlo del contenido o usar el mismo meta si lo añadimos ahora a pipeline.py
    // MEJOR: Actualizó pipeline.py para guardar vb_passage_text.
    $passage_text = get_post_meta($post_id, 'vb_passage_text', true) ?: strip_tags($post->post_content);

    // 3. Re-generar HTML usando el port de PHP
    $new_html = vbim_render_editorial_html($keyword, $phrase, $passage_text, $image_url, $date_str, $citation);

    // 4. Actualizar post_content
    wp_update_post(array(
        'ID' => $post_id,
        'post_content' => $new_html
    ));

    wp_send_json_success(array('message' => 'Entrada actualizada con éxito.'));
}
