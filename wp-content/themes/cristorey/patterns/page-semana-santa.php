<?php
/**
 * Title: Página: Semana Santa
 * Slug: cristorey/page-semana-santa
 * Categories: pages, featured
 * Description: Una página solemne y elegante para la Semana Santa, incluye el visor interactivo del programa y un bloque Bento con el Triduo Pascual.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

    <!-- wp:cover {"url":"","dimRatio":80,"overlayColor":"theme-1","isUserOverlayColor":true,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|40","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}},"color":{"text":"var:preset|color|theme-5"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-theme-5-color has-text-color has-background-dim-80 has-background-dim has-theme-1-background-color"
        style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)">
        <span aria-hidden="true"
            class="wp-block-cover__background has-theme-1-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","alignItems":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontSize":"0.9rem"},"color":{"text":"var:preset|color|theme-3"}}} -->
                <p class="has-text-align-center has-text-color"
                    style="color:var(--wp--preset--color--theme-3);font-size:0.9rem;letter-spacing:4px;text-transform:uppercase">
                    Semana Santa</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontFamily":"var:preset|font-family|cinzel","fontSize":"clamp(2.5rem, 6vw, 5rem)","fontWeight":"700"}}} -->
                <h1 class="wp-block-heading has-text-align-center"
                    style="font-family:var(--wp--preset--font-family--cinzel);font-size:clamp(2.5rem, 6vw, 5rem);font-weight:700">
                    Pasión, Muerte y Resurrección</h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem","fontStyle":"italic"},"color":{"text":"var:preset|color|theme-6"},"elements":{"link":{"color":{"text":"var:preset|color|theme-3"}}}}} -->
                <p class="has-text-align-center has-text-color has-link-color"
                    style="color:var(--wp--preset--color--theme-6);font-size:1.2rem;font-style:italic">"Tanto amó Dios
                    al mundo, que entregó a su Hijo único, para que no perezca ninguno de los que creen en él, sino que
                    tengan vida eterna." — Juan 3:16</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:pattern {"slug":"cristorey/flipbook-publication"} /-->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"theme-2","textColor":"theme-5","layout":{"type":"constrained","contentSize":"1200px"}} -->
    <div class="wp-block-group alignfull has-theme-5-color has-theme-2-background-color has-text-color has-background"
        style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)">

        <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|cinzel","fontSize":"clamp(2rem, 4vw, 3rem)","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
        <h2 class="wp-block-heading has-text-align-center"
            style="margin-bottom:var(--wp--preset--spacing--50);font-family:var(--wp--preset--font-family--cinzel);font-size:clamp(2rem, 4vw, 3rem);font-weight:600">
            Triduo Pascual</h2>
        <!-- /wp:heading -->

        <!-- wp:html -->
        <div class="bento-grid">
            <div class="bento-item glass-panel">
                <div style="color: var(--cr-gold); font-size: 2rem; margin-bottom: 1rem;"><i
                        class="fa-solid fa-hands-praying"></i></div>
                <h3
                    style="font-family: var(--wp--preset--font-family--cinzel); margin-bottom: 0.5rem; font-size: 1.5rem;">
                    Jueves Santo</h3>
                <p style="color: var(--cr-text-muted); font-size: 0.95rem;">Misa de la Cena del Señor y lavatorio de los
                    pies. Institución de la Eucaristía y del Sacerdocio.</p>
                <p style="margin-top: 1rem; font-weight: 600; color: var(--cr-gold);">7:00 PM</p>
            </div>

            <div class="bento-item glass-panel">
                <div style="color: var(--cr-gold); font-size: 2rem; margin-bottom: 1rem;"><i
                        class="fa-solid fa-cross"></i></div>
                <h3
                    style="font-family: var(--wp--preset--font-family--cinzel); margin-bottom: 0.5rem; font-size: 1.5rem;">
                    Viernes Santo</h3>
                <p style="color: var(--cr-text-muted); font-size: 0.95rem;">Viacrucis meditado y celebración de la
                    Pasión del Señor. Adoración de la Santa Cruz.</p>
                <p style="margin-top: 1rem; font-weight: 600; color: var(--cr-gold);">Viacrucis: 10:00 AM<br>Pasión:
                    5:00 PM</p>
            </div>

            <div class="bento-item glass-panel bento-item--wide">
                <div style="color: var(--cr-gold); font-size: 2rem; margin-bottom: 1rem;"><i
                        class="fa-solid fa-fire"></i></div>
                <h3
                    style="font-family: var(--wp--preset--font-family--cinzel); margin-bottom: 0.5rem; font-size: 1.8rem;">
                    Sábado de Gloria - Vigilia Pascual</h3>
                <p style="color: var(--cr-text-muted); font-size: 1.1rem; max-width: 600px;">La celebración más
                    importante del año litúrgico. Bendición del fuego nuevo, el pregón pascual y la renovación de las
                    promesas bautismales.</p>
                <p style="margin-top: 1rem; font-weight: 600; color: var(--cr-gold); font-size: 1.2rem;">9:00 PM</p>
            </div>

            <div class="bento-item glass-panel bento-item--wide">
                <div style="color: var(--cr-gold); font-size: 2rem; margin-bottom: 1rem;"><i
                        class="fa-solid fa-dove"></i></div>
                <h3
                    style="font-family: var(--wp--preset--font-family--cinzel); margin-bottom: 0.5rem; font-size: 1.8rem;">
                    Domingo de Resurrección</h3>
                <p style="color: var(--cr-text-muted); font-size: 1.1rem; max-width: 600px;">¡Cristo ha resucitado!
                    Celebramos con gozo la victoria de la vida sobre la muerte en nuestras misas dominicales.</p>
                <p style="margin-top: 1rem; font-weight: 600; color: var(--cr-gold);">Misas: 10:00 AM, 12:00 PM, 6:00 PM
                </p>
            </div>
        </div>
        <!-- /wp:html -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->