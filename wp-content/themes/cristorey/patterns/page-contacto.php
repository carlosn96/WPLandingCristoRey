<?php
/**
 * Title: Contacto
 * Slug: cristorey/page-contacto
 * Categories: featured, text
 * Description: Contact page with reveal animations, bento layout, and form area.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:heading {"textAlign":"center","level":1,"className":"reveal-mask","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h1 class="wp-block-heading has-text-align-center reveal-mask has-theme-4-color has-text-color has-x-large-font-size"
        style="font-weight:400;text-transform:uppercase;letter-spacing:4px">Contacto</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-1","style":{"typography":{"fontSize":"1.1rem","fontWeight":"300"},"spacing":{"margin":{"bottom":"48px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center reveal-mask reveal-delay-1 has-theme-5-color has-text-color"
        style="margin-bottom:48px;font-size:1.1rem;font-weight:300">
        Estamos aquí para servirte. No dudes en comunicarte con nosotros.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"align":"wide","className":"reveal-mask reveal-delay-2","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-columns alignwide reveal-mask reveal-delay-2">
        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-group bento-item"
                style="background-color:#161411;color:#fcfaf7;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"theme-3"} -->
                <h3 class="wp-block-heading has-theme-3-color has-text-color"
                    style="margin-bottom:20px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">
                    Información</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.9;font-weight:300">
                    <strong>Dirección</strong><br><?php echo wp_kses_post(get_option('cr_inst_address', 'Calle del Santuario #123<br>Col. Centro, Ciudad, CP 12345')); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:shortcode -->
                <div class="wp-block-shortcode" style="margin-bottom: 24px;">[wpgmza id="1"]</div>
                <!-- /wp:shortcode -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.9;font-weight:300">
                    <strong>Teléfono</strong><br><?php echo esc_html(get_option('cr_inst_phone', '(33) 1234-5678')); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.9;font-weight:300">
                    <strong>Correo</strong><br><?php echo esc_html(get_option('cr_inst_email', 'info@cristoreyrc.com')); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.95rem;line-height:1.9;font-weight:300">
                    <strong>Horario de
                        Oficina</strong><br><?php echo wp_kses_post(get_option('cr_inst_schedule', 'Lun – Vie: 9:00 AM – 5:00 PM<br>Sáb: 9:00 AM – 1:00 PM')); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
            <div class="wp-block-group bento-item"
                style="background-color:#161411;color:#fcfaf7;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"2.5px","fontWeight":"600"},"spacing":{"margin":{"bottom":"20px"}}},"textColor":"theme-3"} -->
                <h3 class="wp-block-heading has-theme-3-color has-text-color"
                    style="margin-bottom:20px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:2.5px">
                    Envíanos un Mensaje</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem","fontWeight":"300"}},"textColor":"theme-5"} -->
                <p class="has-theme-5-color has-text-color" style="font-size:0.9rem;font-weight:300">Completa el
                    siguiente formulario y nos
                    pondremos en contacto contigo a la brevedad.</p>
                <!-- /wp:paragraph -->

                <!-- wp:shortcode -->
                <div class="wp-block-shortcode">[wpforms id="82"]</div>
                <!-- /wp:shortcode -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->