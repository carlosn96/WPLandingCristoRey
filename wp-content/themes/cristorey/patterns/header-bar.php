<?php
/**
 * Title: Header Bar
 * Slug: cristorey/header-bar
 * Categories: header
 * Description: Header navigation and CTA buttons with dynamic links.
 */

// Generate URLs
$home_url = esc_url(home_url('/'));
$min_url = esc_url(home_url('/ministerios/'));
$verbum_url = esc_url(home_url('/verbum-domini/'));
$contact_url = esc_url(home_url('/contacto/'));
$sche_url = esc_url(home_url('/horarios/'));
$new_url = esc_url(home_url('/soy-nuevo/'));
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Contents"},"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<header class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
    <!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:site-logo {"width":40} /-->
        <!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","letterSpacing":"0.5px","fontSize":"20px"}},"textColor":"theme-2"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right","verticalAlignment":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:navigation {"textColor":"theme-2","overlayMenu":"mobile","fontSize":"small","style":{"typography":{"fontWeight":"500"}},"className":"order-1 md:order-0","ariaLabel":"Navegación principal","layout":{"type":"flex","justifyContent":"right"}} -->
        <nav class="wp-block-navigation has-theme-2-color has-text-color has-small-font-size order-1 md:order-0"
            style="font-weight:500" aria-label="Navegación principal">
            <ul class="wp-block-navigation__container">
                <li class="wp-block-navigation-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $home_url; ?>">
                        <span class="wp-block-navigation-item__label">Inicio</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $min_url; ?>">
                        <span class="wp-block-navigation-item__label">Ministerios</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $verbum_url; ?>">
                        <span class="wp-block-navigation-item__label">Verbum Domini</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $contact_url; ?>">
                        <span class="wp-block-navigation-item__label">Contacto</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /wp:navigation -->

        <!-- wp:buttons {"className":"header-cta-buttons","style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-buttons header-cta-buttons">
            <!-- wp:button {"backgroundColor":"theme-2","textColor":"theme-1","className":"is-style-fill btn--primary","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"typography":{"fontSize":"13px","fontWeight":"600"},"border":{"radius":"6px"}}} -->
            <div class="wp-block-button has-custom-font-size is-style-fill btn--primary"
                style="font-size:13px;font-weight:600"><a
                    class="wp-block-button__link has-theme-1-color has-theme-2-background-color has-text-color has-background wp-element-button"
                    href="<?php echo $sche_url; ?>"
                    style="border-radius:6px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px">Horarios</a>
            </div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"theme-3","textColor":"theme-2","className":"is-style-fill btn--secondary","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"20px","right":"20px"}},"typography":{"fontSize":"13px","fontWeight":"600"},"border":{"radius":"6px"}}} -->
            <div class="wp-block-button has-custom-font-size is-style-fill btn--secondary"
                style="font-size:13px;font-weight:600"><a
                    class="wp-block-button__link has-theme-2-color has-theme-3-background-color has-text-color has-background wp-element-button"
                    href="<?php echo $new_url; ?>"
                    style="border-radius:6px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px">Soy
                    Nuevo</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</header>
<!-- /wp:group -->