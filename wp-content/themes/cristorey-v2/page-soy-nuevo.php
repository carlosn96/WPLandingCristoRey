<?php
/**
 * Template Name: Funnel - Soy Nuevo (Landing Page)
 * Description: Página de bienvenida y captura de leads para nuevos visitantes.
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero / Video Header -->
    <section class="cr-hero cr-hero--split">
        <!-- Overlay is handled in CSS for --split variant -->
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_soy_nuevo_trad.png');">
        </div>

        <div class="cr-hero__inner">
            <div class="new-hero-content">
                <p class="g-fade-in cr-overline cr-text-gold">
                    Bienvenido a Casa</p>
                <h1 class="g-fade-in font-solemn cr-hero-title">Nos
                    alegra mucho que estés aquí.</h1>
                <p class="g-fade-in cr-hero-text">
                    Ya sea que estés buscando respuestas, un lugar para crecer espiritualmente, o una comunidad para
                    servir, en Cristo Rey tienes una familia.
                </p>
                <div class="g-fade-in">
                    <a href="#registro" class="cr-btn cr-bg-gold cr-text-blue">Descarga Guía de
                        1ra Visita</a>
                </div>
            </div>

            <!-- Video Placeholder -->
            <div class="new-hero-video g-fade-in cr-bg-dark"
                style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.3); aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.1);">
                <!-- Replace with actual embed like YouTube/Vimeo -->
                <div class="cr-text-white cr-text-dim" style="text-align: center;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 10px; opacity: 0.5;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="10 8 16 12 10 16 10 8"></polygon>
                    </svg>
                    <p style="font-family: var(--cr-font-title);">Video de Bienvenida del Capellán</p>
                    <span style="font-size: 0.8rem; opacity: 0.5;">(Espacio para Embed de YouTube 90 seg)</span>
                </div>
            </div>

        </div>
    </section>

    <!-- Lead Capture Form -->
    <section id="registro" class="lead-capture cr-section cr-bg-white" style="text-align: center;">
        <div class="cr-card g-fade-in" style="max-width: 800px; margin: 0 auto; text-align: left;">
            <h2 class="font-solemn cr-text-blue" style="font-size: 2.2rem; margin-bottom: 20px; margin-top: 0; text-align: center;">
                Conectemos</h2>
            <p class="cr-text-dim" style="margin-bottom: 30px; text-align: center; font-size: 1.1rem; line-height: 1.7;">
                Déjanos tu nombre y correo. Te enviaremos un PDF con todo lo que necesitas saber antes de tu primera
                Misa dominical con nosotros, además de los horarios semanales.
            </p>
            <!-- Form Placeholder -->
            <form style="display: flex; flex-direction: column; gap: 15px;">
                <input type="text" placeholder="Tu Nombre"
                    style="padding: 15px; border: 1px solid rgba(11,29,55,0.1); border-radius: 6px; font-family: var(--cr-font-body);">
                <input type="email" placeholder="Tu Correo Electrónico"
                    style="padding: 15px; border: 1px solid rgba(11,29,55,0.1); border-radius: 6px; font-family: var(--cr-font-body);">
                <button type="button" class="cr-btn cr-bg-blue cr-text-white"
                    style="width: 100%; border: none; cursor: pointer;">Recibir Guía de
                    Bienvenida</button>
                <span class="cr-text-dim" style="font-size: 0.75rem; margin-top: 10px; text-align: center;">Respetamos
                    tu privacidad. Nunca
                    enviamos spam.</span>
            </form>
        </div>
    </section>

</main>

<?php
get_footer();
