<?php
/**
 * Title: Contacto
 * Slug: cristorey/page-contacto
 * Categories: featured, text
 * Description: Contact page with info, map placeholder, and form area.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontWeight":"400"}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h1 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color has-x-large-font-size"
        style="font-weight:400;text-transform:uppercase;letter-spacing:3px">Contacto</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.1rem"},"spacing":{"margin":{"bottom":"40px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center has-theme-5-color has-text-color" style="margin-bottom:40px;font-size:1.1rem">
        Estamos aquí para servirte. No dudes en comunicarte con nosotros.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2px","fontWeight":"600"},"spacing":{"margin":{"bottom":"16px"}}},"textColor":"theme-3"} -->
            <h3 class="wp-block-heading has-theme-3-color has-text-color"
                style="margin-bottom:16px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2px">
                Información</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.8"}},"textColor":"theme-5"} -->
            <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.8">
                <strong>Dirección</strong><br>Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.8"}},"textColor":"theme-5"} -->
            <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.8">
                <strong>Teléfono</strong><br>(33) 1234-5678</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.8"}},"textColor":"theme-5"} -->
            <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.8">
                <strong>Correo</strong><br>info@cristoreyrc.com</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.8"}},"textColor":"theme-5"} -->
            <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.8"><strong>Horario de
                    Oficina</strong><br>Lun – Vie: 9:00 AM – 5:00 PM<br>Sáb: 9:00 AM – 1:00 PM</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2px","fontWeight":"600"},"spacing":{"margin":{"bottom":"16px"}}},"textColor":"theme-3"} -->
            <h3 class="wp-block-heading has-theme-3-color has-text-color"
                style="margin-bottom:16px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2px">
                Envíanos un Mensaje</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} -->
            <p class="has-theme-5-color has-text-color" style="font-size:0.9rem">Completa el siguiente formulario y nos
                pondremos en contacto contigo a la brevedad.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
            <div class="wp-block-group has-theme-4-background-color has-background"
                style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem","fontStyle":"italic"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.9rem;font-style:italic">Aquí puedes
                    insertar un bloque de formulario de Jetpack o cualquier plugin de formulario de contacto.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->