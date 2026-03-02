<?php
/**
 * Template Name: Front Page
 * Description: Plantilla principal de inicio, actuando como distribuidor del embudo V2.
 */

get_header();

// Obtener las URLs base para los enlaces
$home_url = esc_url(home_url('/'));
$descubre_url = esc_url(home_url('/descubre-la-fe/'));
$vive_url = esc_url(home_url('/vive-tu-fe/'));
$sirve_url = esc_url(home_url('/sirve-y-participa/'));
$verbum_url = esc_url(home_url('/verbum-domini-hub/'));
$new_url = esc_url(home_url('/soy-nuevo/'));

?>

<main id="primary" class="site-main">

    <!-- 1. Hero Dinámico -->
    <section class="cr-hero cr-hero--tall">
        <div class="cr-hero__bg"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/heroes/hero_front_page_trad.png');">
        </div>
        <div class="cr-hero__inner">
            <p class="g-fade-in cr-overline cr-text-gold">
                Capellanía Cristo Rey</p>
            <h1 class="g-reveal-text font-solemn cr-hero-title">
                <span style="--line-index: 1;">Cristo Rey del Universo:</span><br>
                <span style="--line-index: 2;">¡Venga a nosotros tu Reino!</span>
            </h1>
            <p class="g-fade-in cr-hero-text">
                Una comunidad viva donde descubrimos el amor de Dios, vivimos nuestra fe y servimos con alegría.
            </p>
            <div class="g-fade-in" style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="cr-btn cr-btn--large"
                    style="background-color: var(--cr-color-gold); color: var(--cr-color-blue);">Visítanos</a>
            </div>
        </div>
    </section>

    <!-- 2. Llamado a la Acción Inmediato (Soy Nuevo) -->
    <section class="cr-section cr-bg-white" style="border-bottom: 1px solid rgba(11,29,55,0.05);">
        <div class="cr-container g-fade-in" style="max-width: 900px; margin: 0 auto; text-align: center;">
            <p class="cr-overline cr-text-gold">Bienvenido a Casa</p>
            <h2 class="font-solemn cr-text-blue"
                style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 25px; line-height: 1.2;">
                ¿Es tu primera vez en Cristo Rey?
            </h2>
            <p class="cr-text-dim"
                style="font-size: 1.15rem; margin-bottom: 40px; line-height: 1.8; max-width: 700px; margin-left: auto; margin-right: auto;">
                No importa en qué etapa de tu vida espiritual te encuentres, queremos caminar contigo. Descubre qué
                esperar en tu primera visita y déjanos darte la bienvenida personalmente.
            </p>
            <a href="<?php echo $new_url; ?>" class="cr-btn cr-btn--large">Planifica tu Visita</a>
        </div>
    </section>

    <!-- 3. El Triángulo Evangelizador (Embudo V2) -->
    <section class="cr-section cr-bg-bg">
        <div class="cr-container" style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 70px;">
                <p class="cr-overline cr-text-gold g-fade-in">Formación y Comunidad</p>
                <h2 class="font-solemn cr-text-blue g-fade-in"
                    style="font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 20px;">Tu Camino Espiritual</h2>
                <p class="cr-text-dim g-fade-in"
                    style="font-size: 1.15rem; max-width: 650px; margin: 0 auto; line-height: 1.8;">
                    La fe es un camino que recorremos juntos. Encuentra tu lugar en la comunidad sin importar en qué
                    etapa de tu viaje te encuentres.
                </p>
            </div>

            <div class="cr-cluster-grid">
                <!-- Descubre -->
                <article class="cr-card g-fade-in"
                    style="padding: 50px 40px; text-align: left; border-top: 4px solid var(--cr-color-gold);">
                    <h3 class="font-solemn cr-card__title cr-text-blue" style="font-size: 1.8rem;">Descubre la Fe</h3>
                    <p class="cr-card__text cr-text-dim" style="margin-bottom: 30px;">
                        Respuestas claras, el Mensaje del Evangelio y los fundamentos de lo que creemos. Para mentes
                        inquietas y corazones en búsqueda de la verdad.
                    </p>
                    <a href="<?php echo $descubre_url; ?>" class="cr-link-arrow">
                        Explorar Formación <span class="arrow">&rarr;</span>
                    </a>
                </article>

                <!-- Vive -->
                <article class="cr-card g-fade-in"
                    style="padding: 50px 40px; text-align: left; border-top: 4px solid var(--cr-color-gold); --line-index: 1;">
                    <h3 class="font-solemn cr-card__title cr-text-blue" style="font-size: 1.8rem;">Vive tu Fe</h3>
                    <p class="cr-card__text cr-text-dim" style="margin-bottom: 30px;">
                        Alimenta tu alma. Recursos sobre oración, sacramentos y adoración eucarística para santificar tu
                        vida diaria y fortalecer tu espíritu.
                    </p>
                    <a href="<?php echo $vive_url; ?>" class="cr-link-arrow">
                        Cuidado Espiritual <span class="arrow">&rarr;</span>
                    </a>
                </article>

                <!-- Sirve -->
                <article class="cr-card g-fade-in"
                    style="padding: 50px 40px; text-align: left; border-top: 4px solid var(--cr-color-gold); --line-index: 2;">
                    <h3 class="font-solemn cr-card__title cr-text-blue" style="font-size: 1.8rem;">Sirve y Participa
                    </h3>
                    <p class="cr-card__text cr-text-dim" style="margin-bottom: 30px;">
                        Pon tus talentos al servicio del Reino. Encuentra un ministerio donde puedas amar a otros,
                        crecer espiritual y humanamente, y sentirte en familia.
                    </p>
                    <a href="<?php echo $sirve_url; ?>" class="cr-link-arrow">
                        Únete a un Grupo <span class="arrow">&rarr;</span>
                    </a>
                </article>
            </div>
        </div>
    </section>

    <!-- 4. Marca Editorial: Verbum Domini Highlight -->
    <section class="cr-section cr-bg-white">
        <div class="cr-container"
            style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 80px; align-items: center;">
            <div class="fp-verbum-content g-fade-in">
                <p class="cr-overline cr-text-gold">Editorial y Reflexión</p>
                <h2 class="font-solemn cr-text-blue"
                    style="font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 25px; line-height: 1.1;">
                    Verbum Domini
                </h2>
                <p class="cr-text-dim" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 40px;">
                    No dejes que el Evangelio del domingo se quede en la parroquia. Llévalo contigo durante toda la
                    semana con nuestros análisis, contexto histórico y aplicación práctica a la vida moderna.
                </p>
                <a href="<?php echo $verbum_url; ?>" class="cr-btn">Visitar el Hub Editorial</a>
            </div>
            <div class="fp-verbum-visual g-fade-in cr-bg-dark"
                style="border-radius: 12px; aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 40px 80px rgba(11,29,55,0.15); border: 1px solid rgba(245,214,123,0.1);">
                <div class="cr-text-gold" style="text-align: center;">
                    <p class="font-solemn" style="font-size: 2rem; margin: 0; letter-spacing: 0.05em;">Evangelio y Vida
                    </p>
                    <div style="width: 40px; height: 2px; background-color: var(--cr-color-gold); margin: 20px auto 0;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Vatican News Highlight -->
    <section class="cr-section cr-bg-bg" style="padding-bottom: 20px;">
        <div class="cr-container" style="max-width: 1200px; margin: 0 auto; text-align: center;">
            <div class="g-fade-in" style="max-width: 800px; margin: 0 auto 40px auto;">
                <p class="cr-overline cr-text-gold">Comunión Universal</p>
                <h2 class="font-solemn cr-text-blue"
                    style="font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 25px; line-height: 1.1;">
                    Desde el Vaticano
                </h2>
                <p class="cr-text-dim" style="font-size: 1.15rem; line-height: 1.8;">
                    Sigue de cerca el magisterio del Santo Padre, las noticias de la Santa Sede y el latir de la
                    Iglesia universal, integrado directamente desde Vatican News.
                </p>
            </div>

            <!-- Vatican News Official Widget Script -->
            <div class="g-fade-in vatican-widget-wrapper"
                style="max-width: 1000px; margin: 0 auto; background: var(--cr-color-white); border-radius: 12px; box-shadow: 0 20px 40px rgba(11,29,55,0.08); overflow: hidden; text-align: left;">
                <vaticannews-widget lang="es" fontSize="14" carouselVideoAuto="true"
                    carouselVideoTime="fast"></vaticannews-widget>
                <script src="https://www.vaticannews.va/widget.js"></script>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();


