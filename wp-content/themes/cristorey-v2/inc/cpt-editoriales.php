<?php
/**
 * Custom Post Type para Editoriales (Revistas)
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// 1. Registrar el Custom Post Type "Editorial"
function cr_register_cpt_editorial() {
    $labels = array(
        'name'                  => _x('Editoriales', 'Post Type General Name', 'cristorey-v2'),
        'singular_name'         => _x('Editorial', 'Post Type Singular Name', 'cristorey-v2'),
        'menu_name'             => __('Editoriales', 'cristorey-v2'),
        'name_admin_bar'        => __('Editorial', 'cristorey-v2'),
        'archives'              => __('Archivo de Editoriales', 'cristorey-v2'),
        'attributes'            => __('Atributos de Editorial', 'cristorey-v2'),
        'parent_item_colon'     => __('Editorial Padre:', 'cristorey-v2'),
        'all_items'             => __('Todas las Editoriales', 'cristorey-v2'),
        'add_new_item'          => __('Añadir Nueva Editorial', 'cristorey-v2'),
        'add_new'               => __('Añadir Nueva', 'cristorey-v2'),
        'new_item'              => __('Nueva Editorial', 'cristorey-v2'),
        'edit_item'             => __('Editar Editorial', 'cristorey-v2'),
        'update_item'           => __('Actualizar Editorial', 'cristorey-v2'),
        'view_item'             => __('Ver Editorial', 'cristorey-v2'),
        'view_items'            => __('Ver Editoriales', 'cristorey-v2'),
        'search_items'          => __('Buscar Editorial', 'cristorey-v2'),
        'not_found'             => __('No se encontraron editoriales', 'cristorey-v2'),
        'not_found_in_trash'    => __('No se encontraron editoriales en la papelera', 'cristorey-v2'),
        'featured_image'        => __('Portada de la Editorial', 'cristorey-v2'),
        'set_featured_image'    => __('Establecer portada', 'cristorey-v2'),
        'remove_featured_image' => __('Remover portada', 'cristorey-v2'),
        'use_featured_image'    => __('Usar como portada', 'cristorey-v2'),
        'insert_into_item'      => __('Insertar en la editorial', 'cristorey-v2'),
        'uploaded_to_this_item' => __('Subido a esta editorial', 'cristorey-v2'),
        'items_list'            => __('Lista de editoriales', 'cristorey-v2'),
        'items_list_navigation' => __('Navegación de lista de editoriales', 'cristorey-v2'),
        'filter_items_list'     => __('Filtrar lista de editoriales', 'cristorey-v2'),
    );
    $args = array(
        'label'                 => __('Editorial', 'cristorey-v2'),
        'description'           => __('Publicaciones mensuales o editoriales', 'cristorey-v2'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Para el editor de bloques (Gutenberg) y REST API
        'rewrite'               => array('slug' => 'revistas', 'with_front' => false),
    );
    register_post_type('editorial', $args);

    // Registrar Meta Fields para que sean accesibles desde la REST API (Para el Script)
    register_post_meta('editorial', '_cr_editorial_pdf_url', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ));
    register_post_meta('editorial', '_cr_editorial_download_url', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ));
}
add_action('init', 'cr_register_cpt_editorial', 0);

// 2. Añadir Meta Boxes para PDF URL y Download URL
function cr_add_editorial_meta_boxes() {
    add_meta_box(
        'cr_editorial_options',                   // ID único
        __('Opciones del PDF del Flipbook', 'cristorey-v2'), // Título de la caja
        'cr_editorial_options_callback',          // Callback que renderiza el HTML
        'editorial',                              // Tipo de contenido
        'normal',                                 // Contexto
        'high'                                    // Prioridad
    );
}
add_action('add_meta_boxes', 'cr_add_editorial_meta_boxes');

// 3. Renderizar el HTML de los Meta Boxes
function cr_editorial_options_callback($post) {
    // Generar un nonce para seguridad
    wp_nonce_field('cr_save_editorial_meta_data', 'cr_editorial_meta_nonce');

    // Recuperar valores actuales
    $pdf_url = get_post_meta($post->ID, '_cr_editorial_pdf_url', true);
    $download_url = get_post_meta($post->ID, '_cr_editorial_download_url', true);

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="cr_editorial_pdf_url">' . __('URL del PDF (Para dFlip)', 'cristorey-v2') . '</label></th>';
    echo '<td>';
    echo '<input type="url" id="cr_editorial_pdf_url" name="cr_editorial_pdf_url" value="' . esc_attr($pdf_url) . '" class="regular-text" style="width:100%;" />';
    echo '<p class="description">' . __('Pega aquí la URL completa del archivo PDF. Debe empezar con http:// o https://. Puedes usar la Media Library.', 'cristorey-v2') . '</p>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th><label for="cr_editorial_download_url">' . __('URL de Descarga Directa', 'cristorey-v2') . '</label></th>';
    echo '<td>';
    echo '<input type="url" id="cr_editorial_download_url" name="cr_editorial_download_url" value="' . esc_attr($download_url) . '" class="regular-text" style="width:100%;" />';
    echo '<p class="description">' . __('(Opcional) URL para el botón de descarga. Si se deja en blanco, usará la misma URL que el PDF de arriba.', 'cristorey-v2') . '</p>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
}

// 4. Guardar los valores de los Meta Boxes
function cr_save_editorial_meta_data($post_id) {
    // Validar el nonce
    if (!isset($_POST['cr_editorial_meta_nonce']) || !wp_verify_nonce($_POST['cr_editorial_meta_nonce'], 'cr_save_editorial_meta_data')) {
        return;
    }

    // Si es un autoguardado, no guardar nada
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Comprobar los permisos del usuario actual
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Guardar URL del PDF
    if (isset($_POST['cr_editorial_pdf_url'])) {
        update_post_meta($post_id, '_cr_editorial_pdf_url', esc_url_raw($_POST['cr_editorial_pdf_url']));
    }

    // Guardar URL de Descarga
    if (isset($_POST['cr_editorial_download_url'])) {
        update_post_meta($post_id, '_cr_editorial_download_url', esc_url_raw($_POST['cr_editorial_download_url']));
    }
}
add_action('save_post', 'cr_save_editorial_meta_data');
