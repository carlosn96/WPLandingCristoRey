<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'cristorey-v2'); ?>
        </a>

        <header id="masthead" class="cr-header">
            <div class="cr-header__logo font-solemn">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Cristo Rey</a>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="cr-nav">
                <button class="cr-menu-toggle" aria-controls="site-navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="cr-menu-toggle__box">
                        <span class="cr-menu-toggle__inner"></span>
                    </span>
                </button>
                <?php
                $home_url = esc_url(home_url('/'));
                $descubre_url = esc_url(home_url('/descubre-la-fe/'));
                $vive_url = esc_url(home_url('/vive-tu-fe/'));
                $sirve_url = esc_url(home_url('/sirve-y-participa/'));
                $verbum_url = esc_url(home_url('/verbum-domini-hub/'));
                $vaticano_url = esc_url(home_url('/vaticano/'));
                $sche_url = esc_url(home_url('/horarios/'));
                $contact_url = esc_url(home_url('/contacto/'));
                $new_url = esc_url(home_url('/soy-nuevo/'));
                ?>
                <ul>
                    <li><a href="<?php echo $home_url; ?>">Inicio</a></li>
                    <li><a href="<?php echo $descubre_url; ?>">Descubre la Fe</a></li>
                    <li><a href="<?php echo $vive_url; ?>">Vive tu Fe</a></li>
                    <li><a href="<?php echo $sirve_url; ?>">Sirve y Participa</a></li>
                    <li><a href="<?php echo $verbum_url; ?>">Verbum Domini</a></li>
                    <li><a class="cr-btn" href="<?php echo $new_url; ?>">Soy Nuevo</a></li>
                </ul>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->