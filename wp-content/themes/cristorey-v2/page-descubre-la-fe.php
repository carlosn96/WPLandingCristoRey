<?php
/**
 * Template Name: Pilar - Descubre la Fe
 * Description: Plantilla Pilar SEO para la sección "Descubre la Fe"
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="cr-hero">
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_descubre_trad.png');">
        </div>
        <div class="cr-hero__inner">
            <p class="g-fade-in cr-overline cr-text-gold">
                Formación Católica</p>
            <h1 class="g-fade-in font-solemn cr-hero-title">Cómo vivir la Fe Católica hoy</h1>
            <p class="g-fade-in cr-hero-text">
                Bienvenido a nuestro centro de recursos. Aquí encontrarás respuestas profundas, guías prácticas y la
                riqueza del Evangelio para iluminar tu vida diaria.
            </p>
        </div>
    </section>

    <!-- Cluster Topics Grid (The Strategy) -->
    <section class="hub-clusters cr-section cr-bg-white">
        <div class="cr-cluster-grid">

            <!-- Cluster 1: Evangelio y Magisterio -->
            <article class="cr-card g-fade-in">
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Conocer el Evangelio</h3>
                <p class="cr-card__text cr-text-dim">
                    Comentarios del Evangelio dominical, reflexiones litúrgicas y estudio de las escrituras.
                </p>
                <div class="cr-links-list">
                    <a href="#">&rarr; Reflexión del Evangelio de HOY</a>
                    <a href="#">&rarr; ¿Cómo leer la Biblia católica?</a>
                    <a href="#">&rarr; El Magisterio de León XIV
                        explicados</a>
                </div>
            </article>

            <!-- Cluster 2: Oración y Devoción -->
            <article class="cr-card g-fade-in">
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Vida de Oración</h3>
                <p class="cr-card__text cr-text-dim">
                    Aprende a dialogar con Dios a través del tesoro de devociones de la Iglesia Católica.
                </p>
                <div class="cr-links-list">
                    <a href="#">&rarr; ¿Cómo rezar el Santo Rosario? (Paso
                        a paso)</a>
                    <a href="#">&rarr; Vía Crucis Meditado</a>
                    <a href="#">&rarr; Oraciones frente al Santísimo</a>
                </div>
            </article>

            <!-- Cluster 3: Dudas y Apologética -->
            <article class="cr-card g-fade-in">
                <h3 class="font-solemn cr-card__title cr-text-blue">
                    Respuestas Claras</h3>
                <p class="cr-card__text cr-text-dim">
                    Respuestas directas a las dudas morales y teológicas del mundo contemporáneo.
                </p>
                <div class="cr-links-list">
                    <a href="#">&rarr; Guía total para confesarse bien</a>
                    <a href="#">&rarr; ¿Qué es el Purgatorio?</a>
                    <a href="#">&rarr; Diferencias entre un católico y un
                        cristiano</a>
                </div>
            </article>

        </div>
    </section>

</main>

</main>

<?php
get_footer();
