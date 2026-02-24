<?php
/**
 * Admin Settings for Cristo Rey Institucional
 */

if (!defined('ABSPATH')) {
    exit;
}

class CristoRey_Admin_Settings
{

    private $option_group = 'cr_inst_settings_group';

    public function init()
    {
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_menu', array($this, 'add_settings_page'));
    }

    public function register_settings()
    {
        // Section: Contacto
        add_settings_section(
            'cr_inst_section_contact',
            'Información de Contacto',
            '__return_empty_string', // No description needed
            'cristorey-institucional'
        );

        register_setting($this->option_group, 'cr_inst_phone', array('sanitize_callback' => 'sanitize_text_field'));
        add_settings_field(
            'cr_inst_phone',
            'Teléfono',
            array($this, 'render_text_field'),
            'cristorey-institucional',
            'cr_inst_section_contact',
            array('label_for' => 'cr_inst_phone')
        );

        register_setting($this->option_group, 'cr_inst_email', array('sanitize_callback' => 'sanitize_email'));
        add_settings_field(
            'cr_inst_email',
            'Correo Electrónico',
            array($this, 'render_email_field'),
            'cristorey-institucional',
            'cr_inst_section_contact',
            array('label_for' => 'cr_inst_email')
        );

        // Section: Ubicación
        add_settings_section(
            'cr_inst_section_location',
            'Sede y Horarios',
            '__return_empty_string',
            'cristorey-institucional'
        );

        register_setting($this->option_group, 'cr_inst_address', array('sanitize_callback' => 'wp_kses_post'));
        add_settings_field(
            'cr_inst_address',
            'Dirección (Acepta HTML básico como <br>)',
            array($this, 'render_textarea_field'),
            'cristorey-institucional',
            'cr_inst_section_location',
            array('label_for' => 'cr_inst_address')
        );

        register_setting($this->option_group, 'cr_inst_schedule', array('sanitize_callback' => 'wp_kses_post'));
        add_settings_field(
            'cr_inst_schedule',
            'Horario de Oficina (Acepta HTML básico como <br>)',
            array($this, 'render_textarea_field'),
            'cristorey-institucional',
            'cr_inst_section_location',
            array('label_for' => 'cr_inst_schedule')
        );

        // Section: Redes Sociales
        add_settings_section(
            'cr_inst_section_social',
            'Redes Sociales',
            '__return_empty_string',
            'cristorey-institucional'
        );

        register_setting($this->option_group, 'cr_inst_facebook', array('sanitize_callback' => 'esc_url_raw'));
        add_settings_field(
            'cr_inst_facebook',
            'Facebook URL',
            array($this, 'render_url_field'),
            'cristorey-institucional',
            'cr_inst_section_social',
            array('label_for' => 'cr_inst_facebook')
        );

        register_setting($this->option_group, 'cr_inst_instagram', array('sanitize_callback' => 'esc_url_raw'));
        add_settings_field(
            'cr_inst_instagram',
            'Instagram URL',
            array($this, 'render_url_field'),
            'cristorey-institucional',
            'cr_inst_section_social',
            array('label_for' => 'cr_inst_instagram')
        );

        register_setting($this->option_group, 'cr_inst_youtube', array('sanitize_callback' => 'esc_url_raw'));
        add_settings_field(
            'cr_inst_youtube',
            'YouTube URL',
            array($this, 'render_url_field'),
            'cristorey-institucional',
            'cr_inst_section_social',
            array('label_for' => 'cr_inst_youtube')
        );

        register_setting($this->option_group, 'cr_inst_tiktok', array('sanitize_callback' => 'esc_url_raw'));
        add_settings_field(
            'cr_inst_tiktok',
            'TikTok URL',
            array($this, 'render_url_field'),
            'cristorey-institucional',
            'cr_inst_section_social',
            array('label_for' => 'cr_inst_tiktok')
        );

        register_setting($this->option_group, 'cr_inst_whatsapp', array('sanitize_callback' => 'esc_url_raw'));
        add_settings_field(
            'cr_inst_whatsapp',
            'WhatsApp URL',
            array($this, 'render_url_field'),
            'cristorey-institucional',
            'cr_inst_section_social',
            array('label_for' => 'cr_inst_whatsapp')
        );
    }

    public function add_settings_page()
    {
        add_menu_page(
            'Info Institucional',
            'Info Institucional',
            'manage_options',
            'cristorey-institucional',
            array($this, 'render_settings_page'),
            'dashicons-building',
            30
        );
    }

    public function render_settings_page()
    {
        if (!current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1>
                <?php echo esc_html(get_admin_page_title()); ?>
            </h1>
            <form action="options.php" method="post">
                <?php
                settings_fields($this->option_group);
                do_settings_sections('cristorey-institucional');
                submit_button('Guardar Cambios');
                ?>
            </form>
        </div>
        <?php
    }

    public function render_text_field($args)
    {
        $id = esc_attr($args['label_for']);
        $value = get_option($id);
        echo '<input type="text" id="' . $id . '" name="' . $id . '" value="' . esc_attr($value) . '" class="regular-text" />';
    }

    public function render_email_field($args)
    {
        $id = esc_attr($args['label_for']);
        $value = get_option($id);
        echo '<input type="email" id="' . $id . '" name="' . $id . '" value="' . esc_attr($value) . '" class="regular-text" />';
    }

    public function render_url_field($args)
    {
        $id = esc_attr($args['label_for']);
        $value = get_option($id);
        echo '<input type="url" id="' . $id . '" name="' . $id . '" value="' . esc_url($value) . '" class="regular-text" placeholder="https://" />';
    }

    public function render_textarea_field($args)
    {
        $id = esc_attr($args['label_for']);
        $value = get_option($id);
        echo '<textarea id="' . $id . '" name="' . $id . '" rows="4" cols="50" class="large-text code">' . esc_textarea($value) . '</textarea>';
    }
}
