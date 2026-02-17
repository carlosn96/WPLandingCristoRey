<?php
/**
 * Title: Home Page Content (Nature Distilled)
 * Slug: cristorey/home-content
 * Categories: featured, layout
 * Description: Full homepage structure with welcome, services, community, sacraments, and reflections.
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontWeight":"400"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color has-x-large-font-size"
        style="margin-bottom:12px;font-weight:400;text-transform:uppercase;letter-spacing:3px">Bienvenido a Casa</h2>
    <!-- /wp:heading -->

    <!-- wp:separator {"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"24px"}},"layout":{"selfStretch":"fixed","flexSize":"60px"}}} -->
    <hr class="wp-block-separator is-style-default" style="margin-top:0;margin-bottom:24px" />
    <!-- /wp:separator -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.15rem","lineHeight":"1.8"}},"textColor":"theme-5"} -->
    <p class="has-text-align-center has-theme-5-color has-text-color" style="font-size:1.15rem;line-height:1.8">Somos
        una comunidad católica comprometida con la Espiritualidad de la Comunión y Fraternidad.<br>Te invitamos a
        caminar juntos en la fe, el servicio y la celebración.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"32px"}}}} -->
    <div class="wp-block-buttons" style="margin-top:32px">
        <!-- wp:button {"backgroundColor":"theme-2","textColor":"theme-1","className":"is-style-fill","style":{"border":{"radius":"6px"}}} -->
        <div class="wp-block-button is-style-fill"><a
                class="wp-block-button__link has-theme-1-color has-theme-2-background-color has-text-color has-background wp-element-button"
                href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>" style="border-radius:6px">Planifica tu Visita</a>
        </div>
        <!-- /wp:button -->
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"6px"}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"
                href="<?php echo esc_url(home_url('/horarios/')); ?>" style="border-radius:6px">Horarios de Misa</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"color":{"background":"#f7f5f1"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background"
    style="background-color:#f7f5f1;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontWeight":"400"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-2","fontSize":"large"} -->
    <h2 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color has-large-font-size"
        style="margin-bottom:12px;font-weight:400;text-transform:uppercase;letter-spacing:3px">Nuestros Servicios</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem"},"spacing":{"margin":{"bottom":"40px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center has-theme-5-color has-text-color" style="margin-bottom:40px;font-size:1rem">
        Acompañamos cada etapa de tu vida espiritual.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"className":"service-card","style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
        <div class="wp-block-column service-card has-theme-4-background-color has-background"
            style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.1rem;font-weight:600">Santa Misa</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color" style="font-size:0.9rem">Dom: 10 AM, 12
                PM, 6 PM<br>Lun–Vie: 7 PM</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"service-card","style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
        <div class="wp-block-column service-card has-theme-4-background-color has-background"
            style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.1rem;font-weight:600">Confesiones</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color" style="font-size:0.9rem">Sábados: 4 – 5:30
                PM<br>O con cita previa</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"service-card","style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
        <div class="wp-block-column service-card has-theme-4-background-color has-background"
            style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.1rem;font-weight:600">Sacramentos</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color" style="font-size:0.9rem">Bautismos ·
                Matrimonios<br>Primera Comunión · Confirmación</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"service-card","style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
        <div class="wp-block-column service-card has-theme-4-background-color has-background"
            style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.1rem;font-weight:600">Ministerios</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color" style="font-size:0.9rem">Pastoral Social ·
                Catequesis<br>Coros · Jóvenes</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:cover {"dimRatio":75,"overlayColor":"theme-2","minHeight":450,"minHeightUnit":"px","align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:450px">
    <span aria-hidden="true"
        class="wp-block-cover__background has-theme-2-background-color has-background-dim-80 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontWeight":"400"}},"textColor":"theme-3","fontSize":"large"} -->
            <h2 class="wp-block-heading has-text-align-center has-theme-3-color has-text-color has-large-font-size"
                style="font-weight:400;text-transform:uppercase;letter-spacing:3px">Vida en Comunidad</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem","lineHeight":"1.7"}},"textColor":"theme-4"} -->
            <p class="has-text-align-center has-theme-4-color has-text-color" style="font-size:1.2rem;line-height:1.7">
                "Donde dos o tres se reúnen en mi nombre, allí estoy yo en medio de ellos."<br><em>— Mateo 18:20</em>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"24px"}}}} -->
            <div class="wp-block-buttons" style="margin-top:24px">
                <!-- wp:button {"backgroundColor":"theme-3","textColor":"theme-2","className":"is-style-fill","style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button is-style-fill"><a
                        class="wp-block-button__link has-theme-2-color has-theme-3-background-color has-text-color has-background wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/')); ?>" style="border-radius:6px">Ver
                        Ministerios</a></div>
                <!-- /wp:button -->
                <!-- wp:button {"textColor":"theme-4","className":"is-style-outline","style":{"border":{"radius":"6px"}}} -->
                <div class="wp-block-button is-style-outline"><a
                        class="wp-block-button__link has-theme-4-color has-text-color wp-element-button"
                        href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>" style="border-radius:6px">Soy Nuevo</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontWeight":"400"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-2","fontSize":"large"} -->
    <h2 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color has-large-font-size"
        style="margin-bottom:12px;font-weight:400;text-transform:uppercase;letter-spacing:3px">Verbum Domini</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem"},"spacing":{"margin":{"bottom":"40px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center has-theme-5-color has-text-color" style="margin-bottom:40px;font-size:1rem">
        Reflexiones diarias para alimentar tu vida espiritual.</p>
    <!-- /wp:paragraph -->

    <!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"border":{"width":"1px","color":"#e5e2dc","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"shadow":"0 2px 8px rgba(0,0,0,0.04)"},"backgroundColor":"theme-4"} -->
        <div class="wp-block-group has-theme-4-background-color has-background"
            style="border-color:#e5e2dc;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <!-- wp:post-date {"style":{"typography":{"fontSize":"0.8rem","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"theme-3"} /-->
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600"}},"textColor":"theme-2"} /-->
            <!-- wp:post-excerpt {"excerptLength":20,"style":{"typography":{"fontSize":"0.9rem"}},"textColor":"theme-5"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"32px"}}}} -->
    <div class="wp-block-buttons" style="margin-top:32px">
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"6px"}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"
                href="<?php echo esc_url(home_url('/verbum-domini/')); ?>" style="border-radius:6px">Ver Todas las
                Reflexiones →</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->