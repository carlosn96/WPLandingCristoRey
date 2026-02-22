<?php
/**
 * Title: Ministries Overview
 * Slug: cristorey/ministries-overview
 * Categories: featured, text
 * Description: Ministry grid with Bento layout and reveal animations.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:heading {"textAlign":"center","level":1,"className":"reveal-mask","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h1 class="wp-block-heading has-text-align-center reveal-mask has-theme-2-color has-text-color has-x-large-font-size"
        style="font-weight:400;text-transform:uppercase;letter-spacing:4px">Nuestros Ministerios</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-1","style":{"typography":{"fontSize":"1.2rem","fontStyle":"italic","fontWeight":"300"},"spacing":{"margin":{"bottom":"48px"}}}} -->
    <p class="has-text-align-center reveal-mask reveal-delay-1"
        style="font-size:1.2rem;font-style:italic;font-weight:300;margin-bottom:48px">Servicio, comunidad y fe en
        acción.</p>
    <!-- /wp:paragraph -->

    <!-- Bento Grid Ministries -->
    <!-- wp:group {"align":"wide","className":"bento-grid","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide bento-grid">

        <!-- Pastoral Social -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-1","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-1"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Pastoral Social</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"300","lineHeight":"1.7"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;font-weight:300;line-height:1.7">Ayuda a los más necesitados y obras de
                misericordia.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"16px"}}}} -->
            <div class="wp-block-buttons" style="margin-top:16px">
                <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"24px","right":"24px"}},"typography":{"fontSize":"13px"}}} -->
                <div class="wp-block-button has-custom-font-size is-style-outline" style="font-size:13px"><a
                        class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/pastoral-social/')); ?>"
                        style="border-radius:100px;padding-top:10px;padding-right:24px;padding-bottom:10px;padding-left:24px">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->

        <!-- Coros y Liturgia -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-2","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-2"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Coros y Liturgia</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"300","lineHeight":"1.7"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;font-weight:300;line-height:1.7">Embelleciendo la celebración a través de la
                música y el servicio.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"16px"}}}} -->
            <div class="wp-block-buttons" style="margin-top:16px">
                <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"24px","right":"24px"}},"typography":{"fontSize":"13px"}}} -->
                <div class="wp-block-button has-custom-font-size is-style-outline" style="font-size:13px"><a
                        class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/coros-liturgia/')); ?>"
                        style="border-radius:100px;padding-top:10px;padding-right:24px;padding-bottom:10px;padding-left:24px">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->

        <!-- Catequesis -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-3"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Catequesis</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","fontWeight":"300","lineHeight":"1.7"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;font-weight:300;line-height:1.7">Formación en la fe para niños, jóvenes y
                adultos.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"16px"}}}} -->
            <div class="wp-block-buttons" style="margin-top:16px">
                <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"24px","right":"24px"}},"typography":{"fontSize":"13px"}}} -->
                <div class="wp-block-button has-custom-font-size is-style-outline" style="font-size:13px"><a
                        class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/catequesis/')); ?>"
                        style="border-radius:100px;padding-top:10px;padding-right:24px;padding-bottom:10px;padding-left:24px">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->