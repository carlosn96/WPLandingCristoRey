<?php
/**
 * Template Name: Editorial - Marzo
 * Description: Plantilla para la sección Editorial que muestra el PDF editorial-marzo.pdf usando dFlip.
 */

get_header();

$post_id = get_the_ID();
$home_url = esc_url(home_url('/'));
$program_shortcode = trim((string) get_post_meta($post_id, 'cr_editorial_shortcode', true));
$program_dflip_id = trim((string) get_post_meta($post_id, 'cr_editorial_dflip_id', true));
$program_pdf_url = esc_url_raw((string) get_post_meta($post_id, 'cr_editorial_pdf_url', true));
$program_download_url = esc_url((string) get_post_meta($post_id, 'cr_editorial_download_url', true));

$flipbook_markup = '';

if (!empty($program_shortcode)) {
    $flipbook_markup = do_shortcode($program_shortcode);
} elseif (!empty($program_dflip_id) && shortcode_exists('dflip')) {
    $flipbook_markup = do_shortcode('[dflip id="' . sanitize_text_field($program_dflip_id) . '"]');
} elseif (!empty($program_pdf_url) && shortcode_exists('dflip')) {
    $flipbook_markup = do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
}

// Fallback a uploads/editorial-marzo.pdf
if (empty($flipbook_markup) && shortcode_exists('dflip')) {
    $default_pdf = content_url('/uploads/2026/03/editorial-marzo.pdf');
    if (empty($program_pdf_url)) {
        $program_pdf_url = $default_pdf;
    }
    $flipbook_markup = do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
    if (empty($program_download_url)) {
        $program_download_url = esc_url($program_pdf_url);
    }
}

?>

<main id="primary" class="site-main editorial-page">

    <section class="cr-hero cr-hero--split cr-bg-dark editorial-hero">
        <div class="cr-hero__bg" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/heroes/hero_front_page_trad.png'); ?>');"></div>
        <div class="cr-hero__inner">
            <div class="g-fade-in editorial-hero__copy">
                <p class="cr-overline cr-text-gold">Editorial</p>
                <h1 class="font-solemn cr-hero-title">Editorial - Marzo</h1>
                <p class="cr-hero-text">Nuestro número de marzo con artículos y reflexiones para la comunidad.</p>
                <div style="margin-top:18px;"><a href="#editorial-viewer" class="cr-btn cr-btn--large">Abrir Editorial</a></div>
            </div>
            <aside class="g-fade-in editorial-hero__aside cr-card">
                <p class="cr-overline cr-text-gold">Editorial</p>
                <h2 class="font-solemn cr-card__title cr-text-blue">Lectura Recomendada</h2>
                <p class="cr-card__text cr-text-dim" style="margin-bottom:0;">Material curado para el mes: formación, memoria y comunidad.</p>
            </aside>
        </div>
    </section>

    <section id="editorial-viewer" class="cr-section cr-bg-white editorial-viewer">
        <div class="cr-container">
            <div class="g-fade-in editorial-viewer__wrap">
                <?php
                // Forzar encolado de assets dFlip por si el plugin no los encoló automáticamente
                if ( shortcode_exists('dflip') ) {
                    wp_enqueue_script('dflip-script');
                    wp_enqueue_style('dflip-style');
                    wp_enqueue_script('dflip-parse-script');
                }

                // Ruta local para verificar existencia del fichero
                $upload_local_path = ABSPATH . 'wp-content/uploads/2026/03/editorial-marzo.pdf';

                // Mostrar diagnóstico sólo a administradores
                if ( current_user_can('manage_options') ) {
                    echo '<div style="background:#fff6e6;border-left:4px solid #f5d67b;padding:12px;margin-bottom:16px;">';
                    echo '<strong>Debug Editorial:</strong> ';
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
                <div style="margin-top:20px; text-align:right;"><a class="cr-link-arrow" href="<?php echo $program_download_url; ?>" target="_blank" rel="noopener">Descargar Revista <span class="arrow">&rarr;</span></a></div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer();
