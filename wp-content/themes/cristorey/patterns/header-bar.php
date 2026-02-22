<?php
/**
 * Title: Header Bar (Premium)
 * Slug: cristorey/header-bar
 * Categories: header
 * Description: High-end custom header with semantic HTML, glassmorphism, and mobile overlay.
 */

// Generate URLs
$home_url = esc_url(home_url('/'));
$min_url = esc_url(home_url('/ministerios/'));
$verbum_url = esc_url(home_url('/verbum-domini/'));
$contact_url = esc_url(home_url('/contacto/'));
$sche_url = esc_url(home_url('/horarios/'));
$new_url = esc_url(home_url('/soy-nuevo/'));

// Clean current URI to highlight active link
$current_url = home_url($_SERVER['REQUEST_URI']);
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Premium Header"},"align":"full","className":"cr-premium-header","layout":{"type":"default"}} -->
<header class="wp-block-group alignfull cr-premium-header">
    <div class="cr-header-container">

        <!-- Brand Group: Logo + Title -->
        <a href="<?php echo $home_url; ?>" class="cr-brand-link">
            <div class="cr-header-brand">
                <!-- wp:site-logo {"width":42,"className":"cr-header-logo-block"} /-->
                <div class="cr-brand-text">
                    <span class="cr-brand-title">Cristo Rey</span>
                    <span class="cr-brand-subtitle">Parroquia</span>
                </div>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="cr-desktop-nav" aria-label="Navegación Desktop">
            <ul class="cr-nav-list">
                <li class="cr-nav-item">
                    <a href="<?php echo $home_url; ?>" class="cr-nav-link">Inicio</a>
                </li>
                <li class="cr-nav-item">
                    <a href="<?php echo $min_url; ?>" class="cr-nav-link">Ministerios</a>
                </li>
                <li class="cr-nav-item">
                    <a href="<?php echo $verbum_url; ?>" class="cr-nav-link">Verbum Domini</a>
                </li>
                <li class="cr-nav-item">
                    <a href="<?php echo $contact_url; ?>" class="cr-nav-link">Contacto</a>
                </li>
            </ul>
        </nav>

        <!-- CTA Buttons (Desktop) -->
        <div class="cr-header-ctas">
            <a href="<?php echo $sche_url; ?>" class="cr-btn cr-btn-text">Horarios</a>
            <a href="<?php echo $new_url; ?>" class="cr-btn cr-btn-pill">Soy Nuevo</a>
        </div>

        <!-- Mobile Menu Toggle (Hamburger) -->
        <button class="cr-mobile-toggle" aria-label="Abrir Menú" aria-expanded="false" aria-controls="cr-mobile-menu">
            <div class="cr-hamburger">
                <span></span>
                <span></span>
            </div>
        </button>

    </div>

    <!-- Mobile Fullscreen Overlay -->
    <div id="cr-mobile-menu" class="cr-mobile-overlay" aria-hidden="true">
        <div class="cr-mobile-overlay-inner">
            <nav class="cr-mobile-nav" aria-label="Navegación Móvil">
                <ul class="cr-mobile-nav-list">
                    <li class="cr-mobile-nav-item" style="--stagger: 1">
                        <a href="<?php echo $home_url; ?>" class="cr-mobile-nav-link">Inicio</a>
                    </li>
                    <li class="cr-mobile-nav-item" style="--stagger: 2">
                        <a href="<?php echo $min_url; ?>" class="cr-mobile-nav-link">Ministerios</a>
                    </li>
                    <li class="cr-mobile-nav-item" style="--stagger: 3">
                        <a href="<?php echo $verbum_url; ?>" class="cr-mobile-nav-link">Verbum Domini</a>
                    </li>
                    <li class="cr-mobile-nav-item" style="--stagger: 4">
                        <a href="<?php echo $contact_url; ?>" class="cr-mobile-nav-link">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="cr-mobile-ctas" style="--stagger: 5">
                <a href="<?php echo $sche_url; ?>" class="cr-btn cr-btn-text-large">Horarios de Misa</a>
                <a href="<?php echo $new_url; ?>" class="cr-btn cr-btn-pill-large">Soy Nuevo</a>
            </div>
        </div>
    </div>
</header>
<!-- /wp:group -->