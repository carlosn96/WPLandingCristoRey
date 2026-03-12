<?php
/**
 * Template Name: Especial - Semana Santa
 * Description: Landing profesional para el programa de Semana Santa con visor tipo libro.
 */

get_header();

$post_id = get_the_ID();
$home_url = esc_url(home_url('/'));
$program_shortcode = trim((string) get_post_meta($post_id, 'cr_semana_santa_shortcode', true));
$program_dflip_id = trim((string) get_post_meta($post_id, 'cr_semana_santa_dflip_id', true));
$program_pdf_url = esc_url_raw((string) get_post_meta($post_id, 'cr_semana_santa_pdf_url', true));
$program_download_url = esc_url((string) get_post_meta($post_id, 'cr_semana_santa_download_url', true));

$flipbook_markup = '';

if (!empty($program_shortcode)) {
    $flipbook_markup = do_shortcode($program_shortcode);
} elseif (!empty($program_dflip_id) && shortcode_exists('dflip')) {
    $flipbook_markup = do_shortcode('[dflip id="' . sanitize_text_field($program_dflip_id) . '"]');
} elseif (!empty($program_pdf_url) && shortcode_exists('dflip')) {
    $flipbook_markup = do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
}

// Si no hay markup configurado, usar el PDF ubicado en uploads como fallback.
if (empty($flipbook_markup) && shortcode_exists('dflip')) {
    $default_pdf = content_url('/uploads/2026/03/programa-semana-santa.pdf');
    // Si no hay campo personalizado, usamos el PDF por defecto
    if (empty($program_pdf_url)) {
        $program_pdf_url = $default_pdf;
    }
    $flipbook_markup = do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
    // Si no se indicó URL de descarga, apuntar al mismo PDF
    if (empty($program_download_url)) {
        $program_download_url = esc_url($program_pdf_url);
    }
}
?>

<main id="primary" class="site-main semana-santa-page">

    <section class="cr-hero cr-hero--split cr-bg-dark semana-santa-hero">
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/semana_santa_front.png'); ?>');">
        </div>
        <div class="cr-hero__inner">
            <div class="g-fade-in semana-santa-hero__copy">
                <p class="cr-overline cr-text-gold">Triduo Pascual y Celebraciones</p>
                <h1 class="font-solemn cr-hero-title">Programa Oficial de Semana Santa</h1>
                <p class="cr-hero-text">
                    Una guía completa para vivir cada celebración con orden, recogimiento y comunión.
                    Aquí encontrarás el programa en formato libro digital para una lectura cómoda en cualquier dispositivo.
                </p>
                <div class="semana-santa-hero__actions">
                    <a href="#programa-semana-santa" class="cr-btn cr-btn--large">Abrir Programa</a>
                    <a href="<?php echo $home_url; ?>" class="cr-btn cr-btn--outline">Volver a Inicio</a>
                </div>
            </div>

            <aside class="g-fade-in semana-santa-hero__aside cr-card">
                <p class="cr-overline cr-text-gold">Recomendación Pastoral</p>
                <h2 class="font-solemn cr-card__title cr-text-blue">Vívela Con El Corazón</h2>
                <p class="cr-card__text cr-text-dim" style="margin-bottom: 0;">
                    Te invitamos a llegar con anticipación a cada celebración, preparar tu intención de oración y
                    acompañar a tu familia en este itinerario de gracia.
                </p>
            </aside>
        </div>
    </section>

    <section id="programa-semana-santa" class="cr-section cr-bg-white semana-santa-programa">
        <div class="cr-container semana-santa-programa__container">
            <div class="g-fade-in semana-santa-programa__viewer">
                        <?php
                        // Intentar forzar la carga de los assets del plugin dFlip por si no se encolaron automáticamente.
                        if ( shortcode_exists('dflip') ) {
                            wp_enqueue_script('dflip-script');
                            wp_enqueue_style('dflip-style');
                            wp_enqueue_script('dflip-parse-script');
                        }

                        // Ruta absoluta local del PDF en uploads (para debug)
                        $upload_local_path = ABSPATH . 'wp-content/uploads/2026/03/programa-semana-santa.pdf';

                        // Mostrar información de diagnóstico solamente a administradores.
                        if ( current_user_can('manage_options') ) {
                            echo '<div style="background:#fff6e6;border-left:4px solid #f5d67b;padding:12px;margin-bottom:16px;">';
                            echo '<strong>Debug dFlip:</strong> ';
                            echo 'shortcode_exists(dflip)=' . (shortcode_exists('dflip') ? 'yes' : 'no') . ' | ';
                            echo 'program_pdf_url=' . esc_html($program_pdf_url) . ' | ';
                            echo 'program_download_url=' . esc_html($program_download_url) . ' | ';
                            echo 'flipbook_markup_empty=' . (empty($flipbook_markup) ? 'yes' : 'no') . ' | ';
                            echo 'file_on_disk=' . (file_exists($upload_local_path) ? 'yes' : 'no');
                            echo '</div>';
                        }

                        if ( ! empty( $flipbook_markup ) ) {
                            echo $flipbook_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        } else {
                            // Intentar un render directo usando dFlip con la URL known en uploads
                            if ( shortcode_exists('dflip') ) {
                                echo do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
                            } else {
                                echo '<div class="semana-santa-programa__placeholder">';
                                echo '<h3 class="font-solemn cr-text-blue" style="margin-top: 0;">Visor no disponible</h3>';
                                echo '<p class="cr-text-dim">El plugin dFlip no parece estar activo o disponible. Por favor verifica en Plugins.</p>';
                                echo '</div>';
                            }
                        }
                        ?>
            </div>

            <?php if (!empty($program_download_url)): ?>
                <div class="g-fade-in semana-santa-programa__download">
                    <a class="cr-link-arrow" href="<?php echo $program_download_url; ?>" target="_blank" rel="noopener">
                        Descargar Programa PDF <span class="arrow">&rarr;</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();
