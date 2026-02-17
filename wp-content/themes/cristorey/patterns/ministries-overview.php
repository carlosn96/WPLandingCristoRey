<?php
/**
 * Title: Ministries Overview
 * Slug: cristorey/ministries-overview
 * Categories: featured, text
 * Description: A grid layout listing the available ministries.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"
    style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px"}},"textColor":"theme-2"} -->
    <h1 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
        style="text-transform:uppercase;letter-spacing:3px">Nuestros Ministerios</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem","fontStyle":"italic"}}} -->
    <p class="has-text-align-center" style="font-size:1.2rem;font-style:italic">Servicio, comunidad y fe en acción.</p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {"height":"var:preset|spacing|40"} -->
    <div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"theme-1"} -->
        <div class="wp-block-column has-theme-1-background-color has-background"
            style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);margin-top:0;margin-bottom:0;box-shadow:var(--wp--preset--shadow--natural)">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Pastoral Social</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Ayuda a los más necesitados y obras de misericordia.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
                <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/pastoral-social/')); ?>">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"theme-1"} -->
        <div class="wp-block-column has-theme-1-background-color has-background"
            style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);margin-top:0;margin-bottom:0;box-shadow:var(--wp--preset--shadow--natural)">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Coros y Liturgia</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Embelleciendo la celebración a través de la música y el servicio.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
                <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/coros-liturgia/')); ?>">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"border":{"width":"1px","style":"solid","color":"var:preset|color|theme-2"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"theme-1"} -->
        <div class="wp-block-column has-theme-1-background-color has-background"
            style="border-color:var(--wp--preset--color--theme-2);border-width:1px;border-style:solid;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);margin-top:0;margin-bottom:0;box-shadow:var(--wp--preset--shadow--natural)">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Catequesis</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Formación en la fe para niños, jóvenes y adultos.</p>
            <!-- /wp:paragraph -->
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
                <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/catequesis/')); ?>">Ver
                        Detalles</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->