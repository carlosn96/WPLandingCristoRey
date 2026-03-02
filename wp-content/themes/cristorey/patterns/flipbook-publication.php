<?php
/**
 * Title: Publicación (Revista/Boletín) - Flipbook
 * Slug: cristorey/flipbook-publication
 * Categories: text, featured
 * Description: Un contenedor premium con un visor 3D interactivo (DearFlip) ideal para revistas, programas y boletines.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|theme-3"}}}},"backgroundColor":"theme-1","textColor":"theme-5","className":"cr-flipbook-section","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull cr-flipbook-section has-theme-5-color has-theme-1-background-color has-text-color has-background has-link-color"
    style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)">

    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","alignItems":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"bottom":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--50)">

        <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontSize":"0.85rem"},"color":{"text":"var:preset|color|theme-3"}}} -->
        <p class="has-text-align-center has-text-color"
            style="color:var(--wp--preset--color--theme-3);font-size:0.85rem;letter-spacing:3px;text-transform:uppercase">
            Edición Especial
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|cinzel","fontSize":"clamp(2rem, 4vw, 3.5rem)","fontWeight":"600"}}} -->
        <h2 class="wp-block-heading has-text-align-center"
            style="font-family:var(--wp--preset--font-family--cinzel);font-size:clamp(2rem, 4vw, 3.5rem);font-weight:600">
            Título de la Publicación
        </h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.1rem"},"color":{"text":"var:preset|color|theme-6"}}} -->
        <p class="has-text-align-center has-text-color"
            style="color:var(--wp--preset--color--theme-6);font-size:1.1rem">
            Reemplaza el código del archivo en el shortcode debajo para mostrar la revista que desees.
        </p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"glass-panel cr-flipbook-wrapper","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group glass-panel cr-flipbook-wrapper"
        style="border-radius:8px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--20)">

        <!-- wp:shortcode -->
        [dflip source="INGRESA_LA_URL_DEL_PDF_AQUI"][/dflip]
        <!-- /wp:shortcode -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->