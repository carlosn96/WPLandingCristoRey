<?php
/**
 * Template Name: Hub - Verbum Domini
 * Description: Ecosistema Editorial Propio para Verbum Domini
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Brand Hero Section -->
    <section class="cr-hero cr-hero--split cr-bg-dark">
        <!-- Overlay handled by CSS -->
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_front_page_trad.png');">
            <!-- Reusing the front_page_trad image for Verbum Domini for sheer majesty -->
        </div>

        <div class="cr-hero__inner" style="z-index: 2;">
            <div class="vd-hero-content">
                <h1 class="g-fade-in font-solemn cr-hero-title cr-text-gold">
                    Verbum Domini</h1>
                <p class="g-fade-in cr-hero-text">
                    El Pan de la Palabra para vivir la semana. Análisis, contexto y homilías dominicales de Capellanía
                    Cristo Rey.
                </p>
                <div class="g-fade-in" style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <a href="#suscribir" class="cr-btn cr-bg-gold cr-text-blue">Suscribirse al
                        Boletín</a>
                    <a href="#podcast" class="cr-btn cr-btn--outline"
                        style="border-color: var(--cr-color-gold); color: var(--cr-color-gold);">Escuchar en Spotify</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Episode/Article -->
    <section class="vd-latest cr-section cr-bg-white">
        <div class="vd-latest-inner" style="max-width: 1000px; margin: 0 auto;">
            <p class="cr-overline cr-text-blue" style="margin-bottom: 20px;">
                Última Reflexión</p>

            <article class="cr-card g-fade-in"
                style="flex-direction: row; padding: 0; align-items: stretch; border: none; overflow: hidden; gap: 0;">
                <div class="cr-card__image"
                    style="flex: 1 1 400px; background: #333; min-height: 300px; margin: 0; border-radius: 0;">
                    <span style="color: #fff; opacity: 0.5;">[Evangelio Cover Image]</span>
                </div>
                <div class="vd-featured-content" style="flex: 1 1 400px; padding: 50px;">
                    <span class="cr-text-dim" style="font-size: 0.85rem; font-weight: 600;">Primer Domingo de
                        Cuaresma</span>
                    <h2 class="font-solemn cr-text-blue" style="font-size: 2.2rem; margin: 15px 0 25px;">Las Tentaciones
                        en el Desierto</h2>
                    <p class="cr-card__text cr-text-dim">
                        ¿Por qué el Espíritu lleva a Jesús al desierto? Una reflexión profunda sobre cómo enfrentar
                        nuestras propias sequedades espirituales y tentaciones modernas.
                    </p>
                    <a href="#" class="cr-btn cr-btn--outline cr-text-blue"
                        style="border-color: var(--cr-color-blue);">Leer Homilía Completa</a>
                </div>
            </article>
        </div>
    </section>

</main>

<?php
get_footer();
