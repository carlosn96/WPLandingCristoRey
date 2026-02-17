<?php
/**
 * Title: Ministry Detail Layout
 * Slug: cristorey/ministry-detail-layout
 * Categories: featured, text
 * Description: A rich layout for ministry and community group details.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull"
    style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"https://cristoreyrc.com/wp-content/uploads/2024/01/hero-bg.jpg","dimRatio":60,"overlayColor":"theme-2","minHeight":400,"minHeightUnit":"px","align":"full"} -->
    <div class="wp-block-cover alignfull" style="min-height:400px">
        <span aria-hidden="true"
            class="wp-block-cover__background has-theme-2-background-color has-background-dim-60 has-background-dim"></span>
        <img class="wp-block-cover__image-background" alt="Ministry Hero" src="" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(2.5rem, 5vw, 4.5rem)","textTransform":"uppercase"}},"textColor":"theme-3"} -->
            <h1 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color"
                style="font-size:clamp(2.5rem, 5vw, 4.5rem);text-transform:uppercase">Nombre del Ministerio</h1>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontStyle":"italic"}}} -->
            <p class="has-text-align-center" style="font-size:1.5rem;font-style:italic">Un breve lema o descripción
                inspiradora.</p>
            <!-- /wp:paragraph -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"
        style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
        <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
        <div class="wp-block-columns">
            <!-- wp:column {"width":"66%"} -->
            <div class="wp-block-column" style="flex-basis:66%">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading">Sobre Nosotros</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Descripción detallada del ministerio, sus objetivos y actividades principales. Aquí se explica la
                    misión y cómo impacta a la comunidad.</p>
                <!-- /wp:paragraph -->

                <!-- wp:separator -->
                <hr class="wp-block-separator has-alpha-channel-opacity" />
                <!-- /wp:separator -->

                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading">Actividades Recientes</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Lista o descripción de eventos recientes o recurrentes.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"33%","style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"theme-1"} -->
            <div class="wp-block-column has-theme-1-background-color has-background"
                style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:33%">
                <!-- wp:heading {"level":4} -->
                <h4 class="wp-block-heading">Contacto e Información</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"}}} -->
                <p style="font-size:0.9rem"><strong>Coordinador:</strong><br>Nombre del Coordinador</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"}}} -->
                <p style="font-size:0.9rem"><strong>Email:</strong><br>contacto@cristorey.org</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"}}} -->
                <p style="font-size:0.9rem"><strong>Reuniones:</strong><br>Día y Hora</p>
                <!-- /wp:paragraph -->

                <!-- wp:button {"width":100,"style":{"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"className":"is-style-fill"} -->
                <div class="wp-block-button has-custom-width is-style-fill wp-block-button__width-100"><a
                        class="wp-block-button__link wp-element-button"
                        style="padding-top:10px;padding-bottom:10px">Unirse</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->