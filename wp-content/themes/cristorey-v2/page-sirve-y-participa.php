<?php
/**
 * Template Name: Funnel - Sirve y Participa
 * Description: Plantilla para la comunidad y ministerios, enfocada en conexión emocional
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="cr-hero">
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_sirve_trad.png');">
        </div>
        <div class="cr-hero__inner">
            <p class="g-fade-in cr-overline cr-text-gold">
                Comunidad Viva</p>
            <h1 class="g-fade-in font-solemn cr-hero-title">Tu familia espiritual te espera</h1>
            <p class="g-fade-in cr-hero-text">
                No estamos llamados a vivir la fe en solitario. Cristo Rey es un mosaico de carismas donde todos tienen
                un lugar para servir, amar y crecer juntos.
            </p>
        </div>
    </section>

    <!-- Emotional Micro-Stories & CTAs -->
    <section class="community-grid cr-section cr-bg-white">
        <div class="cr-cluster-grid">

            <!-- Grupo 1 -->
            <article class="cr-card g-fade-in">
                <div class="cr-card__image"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sirve/jovenes.png');">
                </div>
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Pastoral Juvenil</h3>
                <p class="cr-card__text cr-text-dim">
                    "Encontrar a otros que comparten mis valores revolucionó mi semana." Únete a nuestros grupos
                    enfocados en la amistad real y la misión.
                </p>
                <div style="margin-top: auto;">
                    <a href="#" class="cr-btn cr-btn--outline" style="text-align: center; display: block;">Quiero
                        integrarme a
                        Jóvenes</a>
                </div>
            </article>

            <!-- Grupo 2 -->
            <article class="cr-card g-fade-in">
                <div class="cr-card__image"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sirve/liturgia.png');">
                </div>
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Ministerio de Liturgia</h3>
                <p class="cr-card__text cr-text-dim">
                    Ayuda a la comunidad a orar con belleza. Si tienes talento musical o quieres servir en el altar,
                    hay un ministerio para ti.
                </p>
                <div style="margin-top: auto;">
                    <a href="#" class="cr-btn cr-btn--outline" style="text-align: center; display: block;">Quiero servir
                        en Misa</a>
                </div>
            </article>

            <!-- Grupo 3 -->
            <article class="cr-card g-fade-in">
                <div class="cr-card__image"
                    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sirve/familia.png');">
                </div>
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Matrimonios y Familias</h3>
                <p class="cr-card__text cr-text-dim">
                    Fortalece tu vocación familiar rodeado de otros matrimonios. Formación, retiros y convivencia
                    sana para criar juntos a nuestros hijos.
                </p>
                <div style="margin-top: auto;">
                    <a href="#" class="cr-btn cr-btn--outline" style="text-align: center; display: block;">Familia que
                        acoge</a>
                </div>
            </article>

        </div>
    </section>

</main>

<?php
get_footer();
