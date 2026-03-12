<?php
/**
 * Plugin Name: Cristo Rey Editorial Manager
 * Description: Plugin oficial para gestionar, subir y publicar las revistas/editoriales mensuales usando dFlip. Construido para funcionar con DB sincronizada (Local/Prod).
 * Version:     1.1.0
 * Author:      Jan Dev
 * Text Domain: cristorey-editorial
 */

if (!defined('ABSPATH')) {
    exit;
}

class CR_Editorial_Manager {

    public function __construct() {
        add_action('init', array($this, 'registrar_cpt'));
        
        if (is_admin()) {
            add_action('admin_menu', array($this, 'agregar_pagina_menu'));
            add_action('admin_enqueue_scripts', array($this, 'encolar_scripts_admin'));
            add_action('wp_ajax_cr_publicar_editorial', array($this, 'ajax_publicar_editorial'));
        }
    }

    /**
     * 1. Registra el CPT Editorial (Migrado del Template)
     */
    public function registrar_cpt() {
        $labels = array(
            'name'                  => 'Editoriales',
            'singular_name'         => 'Editorial',
            'menu_name'             => 'Editoriales',
            'add_new'               => 'Añadir Nueva Manualmente',
            'all_items'             => 'Todas las Editoriales',
        );
        $args = array(
            'label'                 => 'Editorial',
            'description'           => 'Publicaciones mensuales (Revistas)',
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
            'public'                => true,
            'show_ui'               => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-book-alt',
            'has_archive'           => 'editorial',
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => 'editorial', 'with_front' => false),
        );
        register_post_type('editorial', $args);
    }

    /**
     * 2. Agrega Submenú para Publicación de 1 Clic
     */
    public function agregar_pagina_menu() {
        add_submenu_page(
            'edit.php?post_type=editorial', 
            'Publicador Asistido', 
            'Publicador Asistido', 
            'publish_posts', 
            'cr-publicador-editorial', 
            array($this, 'render_pagina_admin')
        );
    }

    /**
     * 3. Variables de entorno (CSS y WP Media)
     */
    public function encolar_scripts_admin($hook) {
        if ($hook != 'editorial_page_cr-publicador-editorial') {
            return;
        }
        
        // Habilita el Media Uploader de WP en esta página
        wp_enqueue_media();
        
        wp_register_script('cr-editorial-admin-js', plugin_dir_url(__FILE__) . 'admin/js/admin.js', array('jquery'), '1.0.0', true);
        
        // Pasar la URL del AJAX y el Nonce al JS
        wp_localize_script('cr-editorial-admin-js', 'crEditorialData', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('cr_editorial_nonce_action')
        ));
        
        wp_enqueue_script('cr-editorial-admin-js');
        wp_enqueue_style('cr-editorial-admin-css', plugin_dir_url(__FILE__) . 'admin/css/admin.css');
    }

    /**
     * 4. Vista HTML de la Página
     */
    public function render_pagina_admin() {
        ?>
        <div class="wrap cr-editorial-wrap">
            <h1 class="wp-heading-inline">📖 Publicador Automático de Editoriales</h1>
            <p>Esta herramienta crea la publicación del mes actual configurando dinámicamente el título, la portada y enlazando el PDF elegido usando buenas prácticas compartidas (Local/Prod).</p>

            <div class="cr-card-admin">
                <!-- Título Dinámico Sugerido -->
                <div class="cr-form-row">
                    <label><strong>Título de la Publicación:</strong></label>
                    <?php 
                        $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                        $titulo_sugerido = 'Editorial - ' . $meses[date('n') - 1] . ' ' . date('Y');
                    ?>
                    <input type="text" id="cr_post_title" value="<?php echo esc_attr($titulo_sugerido); ?>" style="width: 100%; max-width: 400px; padding: 6px;">
                </div>

                <!-- Imagen Destacada -->
                <div class="cr-form-row">
                    <label><strong>1. Imagen de Portada (Miniatura):</strong></label>
                    <div class="cr-media-uploader">
                        <input type="hidden" id="cr_cover_id" value="">
                        <div id="cr_cover_preview" class="cr-preview-box"><i>No hay imagen seleccionada</i></div>
                        <button type="button" class="button" id="cr_btn_cover">Seleccionar o Subir Imagen</button>
                    </div>
                </div>

                <!-- Archivo PDF -->
                <div class="cr-form-row">
                    <label><strong>2. Documento de la Revista (PDF):</strong></label>
                    <div class="cr-media-uploader">
                        <input type="hidden" id="cr_pdf_id" value="">
                        <div id="cr_pdf_preview" class="cr-preview-box pdf-box"><i>No hay PDF seleccionado</i></div>
                        <button type="button" class="button" id="cr_btn_pdf">Seleccionar o Subir PDF</button>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="cr-form-row cr-actions">
                    <button type="button" class="button button-primary button-large" id="cr_btn_publish">✨ Publicar Editorial Mágicamente</button>
                    <span id="cr_loading" style="display:none; margin-left: 10px;">
                        <span class="spinner is-active" style="float:none;"></span> Publicando...
                    </span>
                </div>
                
                <div id="cr_message_box"></div>
            </div>
        </div>
        <?php
    }

    /**
     * 5. Endpoint AJAX que publica el CPT
     */
    public function ajax_publicar_editorial() {
        check_ajax_referer('cr_editorial_nonce_action', 'nonce');

        if (!current_user_can('publish_posts')) {
            wp_send_json_error('No tienes permisos.');
        }

        $title    = sanitize_text_field($_POST['title']);
        $cover_id = intval($_POST['cover_id']);
        $pdf_id   = intval($_POST['pdf_id']);

        if (!$title || !$cover_id || !$pdf_id) {
            wp_send_json_error('Faltan campos por completar.');
        }

        // Crear Post
        $post_data = array(
            'post_title'  => $title,
            'post_status' => 'publish',
            'post_type'   => 'editorial',
        );

        $post_id = wp_insert_post($post_data, true);

        if (is_wp_error($post_id)) {
            wp_send_json_error($post_id->get_error_message());
        }

        // Asignar Imagen Destacada
        set_post_thumbnail($post_id, $cover_id);

        // Guardar el ID del PDF como Meta, NO LA URL ABSOLUTA.
        // Esto soluciona los problemas entre entornos de Producción y Local compartiendo bd
        update_post_meta($post_id, '_cr_editorial_pdf_id', $pdf_id);

        wp_send_json_success(array(
            'message' => '¡Publicación creada exitosamente!',
            'url'     => get_permalink($post_id)
        ));
    }

    /**
     * Helper param para limpiar caché de Permalinks (Activación)
     */
    public static function activar_plugin() {
        // Ejecutar registro de CPT primero, luego limpiar cache (flush)
        $instancia = new self();
        $instancia->registrar_cpt();
        flush_rewrite_rules();
    }

    public static function desactivar_plugin() {
        flush_rewrite_rules();
    }
}

register_activation_hook(__FILE__, array('CR_Editorial_Manager', 'activar_plugin'));
register_deactivation_hook(__FILE__, array('CR_Editorial_Manager', 'desactivar_plugin'));

new CR_Editorial_Manager();
