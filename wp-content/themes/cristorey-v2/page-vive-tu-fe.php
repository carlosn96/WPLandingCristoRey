<?php
/**
 * Template Name: Funnel - Vive tu Fe
 * Description: Plantilla para formación práctica: Oración, Sacramentos y Espiritualidad
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="cr-hero">
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_vive_trad.png');">
        </div>
        <div class="cr-hero__inner">
            <p class="g-fade-in cr-overline cr-text-gold">
                Espiritualidad Práctica</p>
            <h1 class="g-fade-in font-solemn cr-hero-title">Vive tu Fe en el día a día</h1>
            <p class="g-fade-in cr-hero-text">
                La fe no es solo para los domingos. Encuentra aquí herramientas, oraciones y guías para santificar tus
                jornadas y acercarte más a Dios.
            </p>
        </div>
    </section>

    <!-- Cluster Topics Grid -->
    <section class="hub-clusters cr-section cr-bg-white">
        <div class="cr-cluster-grid">

            <!-- Cluster 1: Sacramentos -->
            <article class="cr-card g-fade-in">
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Fuerza en los Sacramentos</h3>
                <p class="cr-card__text cr-text-dim">
                    Las herramientas visibles de la gracia invisible. Guías para recibir y vivir los sacramentos.
                </p>
                <div class="cr-links-list">
                    <a href="#">&rarr; Preparativos para Bautizar</a>
                    <a href="#">&rarr; Confirmaciones: Lo que debes
                        saber</a>
                    <a href="#">&rarr; Guía para Matrimonios</a>
                </div>
            </article>

            <!-- Cluster 2: Adoración -->
            <article class="cr-card g-fade-in">
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Adoración Eucarística</h3>
                <p class="cr-card__text cr-text-dim">
                    Recursos para tener un encuentro personal con Jesús Eucaristía en el Sagrario.
                </p>
                <div class="cr-links-list">
                    <a href="#">&rarr; ¿Qué hacer en tus primeros 15
                        minutos de adoración?</a>
                    <a href="#">&rarr; El poder de las visitas al
                        Santísimo</a>
                    <a href="#">&rarr; Horarios de exposición en
                        Capellanía</a>
                </div>
            </article>

        </div>
    </section>

</main>

</main>

<?php
get_footer();
