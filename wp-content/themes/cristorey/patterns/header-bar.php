<?php
/**
 * Title: Header Bar
 * Slug: cristorey/header-bar
 * Categories: header
 * Description: Pro-level header with glassmorphism, animated navigation, and refined CTAs.
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

    <!-- Brand Group: Logo + Title -->
    <!-- wp:group {"className":"cr-header__brand","style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
    <div class="wp-block-group cr-header__brand">
        <!-- wp:site-logo {"width":42,"className":"cr-header__logo"} /-->
        <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-group">
            <!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","letterSpacing":"0.5px","fontSize":"18px","lineHeight":"1.2"}},"textColor":"theme-2","className":"cr-header__title"} /-->
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"10px","letterSpacing":"2.5px","textTransform":"uppercase","fontWeight":"400","lineHeight":"1"}},"textColor":"theme-6","className":"cr-header__subtitle"} -->
            <p class="cr-header__subtitle has-theme-6-color has-text-color" style="font-size:10px;letter-spacing:2.5px;text-transform:uppercase;font-weight:400;line-height:1">Parroquia</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- Right Side: Nav + CTAs -->
    <!-- wp:group {"className":"cr-header__right","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right","verticalAlignment":"center"}} -->
    <div class="wp-block-group cr-header__right">

        <!-- Navigation -->
        <!-- wp:navigation {"textColor":"theme-2","overlayMenu":"mobile","fontSize":"small","style":{"typography":{"fontWeight":"500","letterSpacing":"0.3px"}},"className":"cr-header__nav order-1 md:order-0","ariaLabel":"Navegación principal","layout":{"type":"flex","justifyContent":"right"}} -->
        <nav class="wp-block-navigation has-theme-2-color has-text-color has-small-font-size cr-header__nav order-1 md:order-0"
            style="font-weight:500;letter-spacing:0.3px" aria-label="Navegación principal">
            <ul class="wp-block-navigation__container">
                <li class="wp-block-navigation-item cr-nav-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $home_url; ?>">
                        <span class="wp-block-navigation-item__label">Inicio</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item cr-nav-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $min_url; ?>">
                        <span class="wp-block-navigation-item__label">Ministerios</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item cr-nav-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $verbum_url; ?>">
                        <span class="wp-block-navigation-item__label">Verbum Domini</span>
                    </a>
                </li>
                <li class="wp-block-navigation-item cr-nav-item">
                    <a class="wp-block-navigation-item__content" href="<?php echo $contact_url; ?>">
                        <span class="wp-block-navigation-item__label">Contacto</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /wp:navigation -->

        <!-- CTA Buttons -->
        <!-- wp:buttons {"className":"header-cta-buttons","style":{"spacing":{"blockGap":"10px"}}} -->
        <div class="wp-block-buttons header-cta-buttons">
            <!-- wp:button {"backgroundColor":"theme-2","textColor":"theme-1","className":"is-style-fill cr-cta-primary","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"22px","right":"22px"}},"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.5px","textTransform":"uppercase"},"border":{"radius":"100px"}}} -->
            <div class="wp-block-button has-custom-font-size is-style-fill cr-cta-primary"
                style="font-size:12px;font-weight:600;letter-spacing:0.5px;text-transform:uppercase"><a
                    class="wp-block-button__link has-theme-1-color has-theme-2-background-color has-text-color has-background wp-element-button"
                    href="<?php echo $sche_url; ?>"
                    style="border-radius:100px;padding-top:10px;padding-right:22px;padding-bottom:10px;padding-left:22px">Horarios</a>
            </div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"theme-3","textColor":"theme-2","className":"is-style-fill cr-cta-accent","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"22px","right":"22px"}},"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.5px","textTransform":"uppercase"},"border":{"radius":"100px"}}} -->
            <div class="wp-block-button has-custom-font-size is-style-fill cr-cta-accent"
                style="font-size:12px;font-weight:600;letter-spacing:0.5px;text-transform:uppercase"><a
                    class="wp-block-button__link has-theme-2-color has-theme-3-background-color has-text-color has-background wp-element-button"
                    href="<?php echo $new_url; ?>"
                    style="border-radius:100px;padding-top:10px;padding-right:22px;padding-bottom:10px;padding-left:22px">Soy Nuevo</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</header>
<!-- /wp:group -->