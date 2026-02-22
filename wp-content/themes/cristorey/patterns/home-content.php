<?php
/**
 * Title: Home Page Content (The Editorial Layer)
 * Slug: cristorey/home-content
 * Categories: featured, layout
 * Description: Immersive homepage with Bento Grid services, mask reveals, color-block transitions, and cinematic flow.
 */
?>

<!-- Section 1: Welcome — Mask Reveals + Staggered -->
<!-- wp:group {"align":"full","className":"reveal-mask","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"theme-1","layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group alignfull reveal-mask has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"
    data-bg-color="#F0EEE9">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"reveal-mask reveal-delay-1","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400","lineHeight":"1.1"},"spacing":{"margin":{"bottom":"16px"}}},"textColor":"theme-2","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center reveal-mask reveal-delay-1 has-theme-2-color has-text-color has-x-large-font-size"
        style="margin-bottom:16px;font-weight:400;text-transform:uppercase;letter-spacing:4px;line-height:1.1">
        Bienvenido a Casa</h2>
    <!-- /wp:heading -->

    <!-- wp:separator {"className":"is-style-default reveal-mask reveal-delay-2","style":{"spacing":{"margin":{"top":"0","bottom":"28px"}},"layout":{"selfStretch":"fixed","flexSize":"60px"}}} -->
    <hr class="wp-block-separator is-style-default reveal-mask reveal-delay-2"
        style="margin-top:0;margin-bottom:28px" />
    <!-- /wp:separator -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-3","style":{"typography":{"fontSize":"1.15rem","lineHeight":"1.9","fontWeight":"300"}},"textColor":"theme-5"} -->
    <p class="has-text-align-center reveal-mask reveal-delay-3 has-theme-5-color has-text-color"
        style="font-size:1.15rem;line-height:1.9;font-weight:300">Somos
        una comunidad católica comprometida con la Espiritualidad de la Comunión y Fraternidad.<br>Te invitamos a
        caminar juntos en la fe, el servicio y la celebración.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"reveal-mask reveal-delay-4","style":{"spacing":{"margin":{"top":"36px"}}}} -->
    <div class="wp-block-buttons reveal-mask reveal-delay-4" style="margin-top:36px">
        <!-- wp:button {"backgroundColor":"theme-2","textColor":"theme-1","className":"is-style-fill","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}}}} -->
        <div class="wp-block-button is-style-fill"><a
                class="wp-block-button__link has-theme-1-color has-theme-2-background-color has-text-color has-background wp-element-button"
                href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>"
                style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Planifica
                tu Visita</a>
        </div>
        <!-- /wp:button -->
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"
                href="<?php echo esc_url(home_url('/horarios/')); ?>"
                style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Horarios
                de Misa</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- Section 2: Services — Bento Grid 2.0 -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"color":{"background":"#f7f5f1"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background"
    style="background-color:#f7f5f1;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"
    data-bg-color="#f7f5f1">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"reveal-mask","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-2","fontSize":"large"} -->
    <h2 class="wp-block-heading has-text-align-center reveal-mask has-theme-2-color has-text-color has-large-font-size"
        style="margin-bottom:12px;font-weight:400;text-transform:uppercase;letter-spacing:4px">Nuestros Servicios</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-1","style":{"typography":{"fontSize":"1rem","fontWeight":"300"},"spacing":{"margin":{"bottom":"48px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center reveal-mask reveal-delay-1 has-theme-5-color has-text-color"
        style="margin-bottom:48px;font-size:1rem;font-weight:300">
        Acompañamos cada etapa de tu vida espiritual.</p>
    <!-- /wp:paragraph -->

    <!-- Bento Grid -->
    <!-- wp:group {"align":"wide","className":"bento-grid","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide bento-grid">

        <!-- Card 1: Santa Misa -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-1","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"theme-4"} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-1 has-theme-4-background-color has-background"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Santa Misa</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;line-height:1.7;font-weight:300">Dom: 10 AM, 12
                PM, 6 PM<br>Lun–Vie: 7 PM</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Card 2: Confesiones -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-2","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"theme-4"} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-2 has-theme-4-background-color has-background"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Confesiones</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;line-height:1.7;font-weight:300">Sábados: 4 – 5:30
                PM<br>O con cita previa</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Card 3: Sacramentos -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-3","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"theme-4"} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-3 has-theme-4-background-color has-background"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Sacramentos</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;line-height:1.7;font-weight:300">Bautismos ·
                Matrimonios<br>Primera Comunión · Confirmación</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Card 4: Ministerios -->
        <!-- wp:group {"className":"bento-item reveal-mask reveal-delay-4","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"theme-4"} -->
        <div class="wp-block-group bento-item reveal-mask reveal-delay-4 has-theme-4-background-color has-background"
            style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.15rem","fontWeight":"600"}},"textColor":"theme-2"} -->
            <h3 class="wp-block-heading has-text-align-center has-theme-2-color has-text-color"
                style="font-size:1.15rem;font-weight:600">Ministerios</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem","lineHeight":"1.7","fontWeight":"300"}},"textColor":"theme-5"} -->
            <p class="has-text-align-center has-theme-5-color has-text-color"
                style="font-size:0.9rem;line-height:1.7;font-weight:300">Pastoral Social ·
                Catequesis<br>Coros · Jóvenes</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- Section 3: Community — Cinematic Cover -->
<!-- wp:cover {"dimRatio":80,"overlayColor":"theme-2","minHeight":500,"minHeightUnit":"px","align":"full","className":"reveal-mask"} -->
<div class="wp-block-cover alignfull reveal-mask" style="min-height:500px" data-bg-color="#0b1d37">
    <span aria-hidden="true"
        class="wp-block-cover__background has-theme-2-background-color has-background-dim-80 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":2,"className":"reveal-mask reveal-delay-1","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"}},"textColor":"theme-3","fontSize":"large"} -->
            <h2 class="wp-block-heading has-text-align-center reveal-mask reveal-delay-1 has-theme-3-color has-text-color has-large-font-size"
                style="font-weight:400;text-transform:uppercase;letter-spacing:4px">Vida en Comunidad</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-2","style":{"typography":{"fontSize":"1.2rem","lineHeight":"1.8","fontWeight":"300","fontStyle":"italic"}},"textColor":"theme-4"} -->
            <p class="has-text-align-center reveal-mask reveal-delay-2 has-theme-4-color has-text-color"
                style="font-size:1.2rem;line-height:1.8;font-weight:300;font-style:italic">
                "Donde dos o tres se reúnen en mi nombre, allí estoy yo en medio de ellos."<br><em>— Mateo 18:20</em>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"reveal-mask reveal-delay-3","style":{"spacing":{"margin":{"top":"28px"}}}} -->
            <div class="wp-block-buttons reveal-mask reveal-delay-3" style="margin-top:28px">
                <!-- wp:button {"backgroundColor":"theme-3","textColor":"theme-2","className":"is-style-fill","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}}}} -->
                <div class="wp-block-button is-style-fill"><a
                        class="wp-block-button__link has-theme-2-color has-theme-3-background-color has-text-color has-background wp-element-button"
                        href="<?php echo esc_url(home_url('/ministerios/')); ?>"
                        style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Ver
                        Ministerios</a></div>
                <!-- /wp:button -->
                <!-- wp:button {"textColor":"theme-4","className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}}}} -->
                <div class="wp-block-button is-style-outline"><a
                        class="wp-block-button__link has-theme-4-color has-text-color wp-element-button"
                        href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>"
                        style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Soy
                        Nuevo</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->

<!-- Section 4: Verbum Domini — Staggered Cards -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"
    data-bg-color="#F0EEE9">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"reveal-mask","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px","fontWeight":"400"},"spacing":{"margin":{"bottom":"12px"}}},"textColor":"theme-2","fontSize":"large"} -->
    <h2 class="wp-block-heading has-text-align-center reveal-mask has-theme-2-color has-text-color has-large-font-size"
        style="margin-bottom:12px;font-weight:400;text-transform:uppercase;letter-spacing:4px">Verbum Domini</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"reveal-mask reveal-delay-1","style":{"typography":{"fontSize":"1rem","fontWeight":"300"},"spacing":{"margin":{"bottom":"48px"}}},"textColor":"theme-5"} -->
    <p class="has-text-align-center reveal-mask reveal-delay-1 has-theme-5-color has-text-color"
        style="margin-bottom:48px;font-size:1rem;font-weight:300">
        Reflexiones diarias para alimentar tu vida espiritual.</p>
    <!-- /wp:paragraph -->

    <!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"className":"bento-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group bento-item"
            style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:post-date {"style":{"typography":{"fontSize":"0.75rem","textTransform":"uppercase","letterSpacing":"1.5px","fontWeight":"500"}},"textColor":"theme-3"} /-->
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.1rem","fontWeight":"600","lineHeight":"1.3"}},"textColor":"theme-2"} /-->
            <!-- wp:post-excerpt {"excerptLength":20,"style":{"typography":{"fontSize":"0.9rem","fontWeight":"300","lineHeight":"1.6"}},"textColor":"theme-5"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"reveal-mask reveal-delay-2","style":{"spacing":{"margin":{"top":"40px"}}}} -->
    <div class="wp-block-buttons reveal-mask reveal-delay-2" style="margin-top:40px">
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"100px"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"32px","right":"32px"}}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"
                href="<?php echo esc_url(home_url('/verbum-domini/')); ?>"
                style="border-radius:100px;padding-top:14px;padding-right:32px;padding-bottom:14px;padding-left:32px">Ver
                Todas las
                Reflexiones →</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->