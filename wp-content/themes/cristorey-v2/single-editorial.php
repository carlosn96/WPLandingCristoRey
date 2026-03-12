<?php
/**
 * Template Name: Single Editorial
 * Description: Plantilla para mostrar una única edición de la revista/editorial.
 */

get_header();

$has_editorial = have_posts();

if ($has_editorial) {
    the_post();
    $editorial_id = get_the_ID();
    $title = get_the_title();
    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15);
    
    // 1. Intentar cargar el PDF por ID de Adjunto
    $pdf_id = get_post_meta($editorial_id, '_cr_editorial_pdf_id', true);
    
    if (!empty($pdf_id) && is_numeric($pdf_id)) {
        $program_pdf_url = wp_get_attachment_url($pdf_id);
    } else {
        // 2. Fallback
        $program_pdf_url = esc_url_raw(get_post_meta($editorial_id, '_cr_editorial_pdf_url', true));
    }

    $download_url_raw = esc_url(get_post_meta($editorial_id, '_cr_editorial_download_url', true));
    $program_download_url = !empty($download_url_raw) ? $download_url_raw : $program_pdf_url;

    $flipbook_markup = '';
    if (!empty($program_pdf_url) && shortcode_exists('dflip')) {
        $flipbook_markup = do_shortcode('[dflip source="' . esc_url($program_pdf_url) . '"]');
    }
}
?>

<main id="primary" class="site-main editorial-page">

    <section class="cr-hero cr-hero--split cr-bg-dark editorial-hero">
        <div class="cr-hero__bg" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : esc_url(get_template_directory_uri() . '/assets/images/heroes/hero_front_page_trad.png'); ?>');"></div>
        <div class="cr-hero__inner">
            <div class="g-fade-in editorial-hero__copy">
                <p class="cr-overline cr-text-gold">Edición de Archivo</p>
                <h1 class="font-solemn cr-hero-title"><?php echo esc_html($title); ?></h1>
                <p class="cr-hero-text"><?php echo esc_html($excerpt); ?></p>
                <?php if ($has_editorial && !empty($flipbook_markup)): ?>
                    <div style="margin-top:18px;"><a href="#editorial-viewer" class="cr-btn cr-btn--large">Abrir Edición</a></div>
                <?php endif; ?>
            </div>
            <aside class="g-fade-in editorial-hero__aside cr-card">
                <p class="cr-overline cr-text-gold">Editorial</p>
                <h2 class="font-solemn cr-card__title cr-text-blue">Revista Mensual</h2>
                <div class="cr-card__text cr-text-dim" style="margin-bottom:0;">
                    <?php the_content(); ?>
                </div>
            </aside>
        </div>
    </section>

    <section id="editorial-viewer" class="cr-section cr-bg-white editorial-viewer">
        <div class="cr-container">
            <div class="g-fade-in editorial-viewer__wrap">
                <?php
                if ($has_editorial && !empty($flipbook_markup)) {
                    // Forzar encolado de assets dFlip
                    if ( shortcode_exists('dflip') ) {
                        wp_enqueue_script('dflip-script');
                        wp_enqueue_style('dflip-style');
                        wp_enqueue_script('dflip-parse-script');
                    }
                    echo $flipbook_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                } else {
                    echo '<div class="semana-santa-programa__placeholder">';
                    echo '<h3 class="font-solemn cr-text-blue" style="margin-top: 0;">Visor no disponible</h3>';
                    echo '<p class="cr-text-dim">Documento PDF no configurado para esta editorial o plugin dFlip no activo.</p>';
                    echo '</div>';
                }
                ?>
            </div>

            <div style="margin-top:20px; display:flex; justify-content: space-between; align-items: center;">
                <a class="cr-btn cr-btn--outline" href="<?php echo esc_url(home_url('/editorial')); ?>">
                    &larr; Volver al Inicio
                </a>
                
                <?php if (!empty($program_download_url) || !empty($program_pdf_url)): ?>
                    <a class="cr-link-arrow" href="<?php echo esc_url(!empty($program_download_url) ? $program_download_url : $program_pdf_url); ?>" target="_blank" rel="noopener">
                        Descargar Revista <span class="arrow">&rarr;</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer();
