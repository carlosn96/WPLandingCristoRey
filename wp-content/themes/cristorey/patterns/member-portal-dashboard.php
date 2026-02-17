<?php
/**
 * Title: Member Portal Dashboard
 * Slug: cristorey/member-portal-dashboard
 * Categories: featured, text
 * Description: A unified dashboard for donations and live streaming.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"
    style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","level":1} -->
    <h1 class="wp-block-heading has-text-align-center">Portal de Miembros</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem"}}} -->
    <p class="has-text-align-center" style="font-size:1.2rem">Bienvenido a tu espacio de conexión y generosidad.</p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
    <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"60%","style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"theme-5","textColor":"theme-4"} -->
        <div class="wp-block-column has-theme-4-color has-theme-5-background-color has-text-color has-background"
            style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:60%">
            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Transmisión en Vivo</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Participa en la Santa Misa desde donde estés.</p>
            <!-- /wp:paragraph -->
            <!-- wp:embed {"providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
            <figure
                class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
                <div class="wp-block-embed__wrapper">
                    https://www.youtube.com/watch?v=dQw4w9WgXcQ
                </div>
            </figure>
            <!-- /wp:embed -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%","style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-3"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"theme-1"} -->
        <div class="wp-block-column has-theme-1-background-color has-background"
            style="border-color:var(--wp--preset--color--theme-3);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:40%">
            <!-- wp:heading {"level":3,"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-theme-2-color has-text-color">Tu Donación</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Apoya nuestra misión de evangelización.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-fill"} -->
                <div class="wp-block-button has-custom-width is-style-fill wp-block-button__width-100"><a
                        class="wp-block-button__link wp-element-button">Donar $50</a></div>
                <!-- /wp:button -->
                <!-- wp:button {"width":100,"className":"is-style-fill"} -->
                <div class="wp-block-button has-custom-width is-style-fill wp-block-button__width-100"><a
                        class="wp-block-button__link wp-element-button">Donar $100</a></div>
                <!-- /wp:button -->
                <!-- wp:button {"width":100,"className":"is-style-outline"} -->
                <div class="wp-block-button has-custom-width is-style-outline wp-block-button__width-100"><a
                        class="wp-block-button__link wp-element-button">Otra Cantidad</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->