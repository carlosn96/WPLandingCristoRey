<?php
/**
 * Title: Horarios de Misa
 * Slug: cristorey/page-horarios
 * Categories: featured, text
 * Description: Mass schedule page with Bento Grid layout and reveal animations.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:heading {"textAlign":"center","level":1,"className":"reveal-mask","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h1 class="wp-block-heading has-text-align-center reveal-mask has-theme-2-color has-text-color has-x-large-font-size"
        style="font-weight:400;text-transform:uppercase;letter-spacing:4px">Horarios de Misa</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-1","style":{"typography":{"fontSize":"1.1rem","fontWeight":"300"},"spacing":{"margin":{"bottom":"48px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center reveal-mask reveal-delay-1 has-theme-5-color has-text-color"
        style="margin-bottom:48px;font-size:1.1rem;font-weight:300">Te
        esperamos para celebrar juntos la Eucaristía.</p>
    <!-- /wp:paragraph -->

    <!-- Bento Grid Schedule -->
    <!-- wp:group {"align":"wide","className":"bento-grid reveal-mask reveal-delay-2","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide bento-grid reveal-mask reveal-delay-2">

        <!-- Domingos -->
        <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color"
                style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">
                Domingos</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontWeight":"600","lineHeight":"1.6"}},"textColor":"theme-2"} -->
            <p class="has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.5rem;font-weight:600;line-height:1.6">
                10:00 AM<br>12:00 PM<br>6:00 PM</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Entre Semana -->
        <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color"
                style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">
                Entre Semana</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <p class="has-text-align-center has-theme-2-color has-text-color" style="font-size:1.5rem;font-weight:600">
                Lun – Vie: 7:00 PM</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"},"spacing":{"margin":{"top":"12px"}}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="margin-top:12px;font-size:0.9rem;line-height:1.7;font-weight:300">La misa diaria se celebra en la
                capilla lateral</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Confesiones -->
        <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-3"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color"
                style="margin-bottom:12px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">
                Confesiones</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <p class="has-text-align-center has-theme-2-color has-text-color" style="font-size:1.5rem;font-weight:600">
                Sáb: 4:00 – 5:30 PM</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"},"spacing":{"margin":{"top":"12px"}}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="margin-top:12px;font-size:0.9rem;line-height:1.7;font-weight:300">O con cita previa contactando a
                la oficina parroquial</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

    <!-- Días Especiales -->
    <!-- wp:group {"className":"reveal-mask reveal-delay-3","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
    <div class="wp-block-group reveal-mask reveal-delay-3" style="margin-top:var(--wp--preset--spacing--60)">
        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"16px"}}},"textColor":"theme-3"} -->
        <h3 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color"
            style="margin-bottom:16px;font-size:1rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">Días
            Especiales</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
        <p class="has-text-align-center has-theme-5-color has-text-color"
            style="font-size:0.95rem;line-height:1.9;font-weight:300">Los
            horarios de Semana Santa, Navidad y días festivos se anuncian con anticipación. Consulta nuestras redes
            sociales o llama a la oficina parroquial para información actualizada.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->