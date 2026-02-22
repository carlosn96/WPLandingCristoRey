<?php
/**
 * Title: Header
 * Slug: assembler/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Premium Plus dark header with glass effect on scroll.
 */
declare(strict_types=1);
?>
<!-- wp:html -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Manrope:wght@300;400;500;600&display=swap');

    /* ══ HEADER BASE ══ */
    .cr-header {
        --h-bg: #0e0c09;
        --h-bg-glass: rgba(14, 12, 9, 0.92);
        --h-text: rgba(252, 250, 247, 0.85);
        --h-text-hover: #fcfaf7;
        --h-gold: #eca413;
        --h-border: rgba(236, 164, 19, 0.15);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        background: var(--h-bg);
        border-bottom: 1px solid var(--h-border);
        transition: background 0.4s ease, box-shadow 0.4s ease, backdrop-filter 0.4s ease;
        font-family: 'Manrope', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .cr-header.scrolled {
        background: var(--h-bg-glass);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.6);
        border-bottom-color: var(--h-border);
    }

    .cr-header-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 clamp(1.5rem, 5vw, 4rem);
        height: 72px;
    }

    /* ══ LOGO ══ */
    .cr-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        flex-shrink: 0;
    }

    .cr-logo-icon {
        width: 28px;
        height: 28px;
        opacity: 0.9;
    }

    .cr-logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1;
    }

    .cr-logo-title {
        font-family: 'Cinzel', serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: #fcfaf7;
        letter-spacing: 0.05em;
    }

    .cr-logo-subtitle {
        font-size: 0.6rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--h-gold);
        opacity: 0.8;
        margin-top: 2px;
    }

    /* ══ NAV LINKS ══ */
    .cr-nav {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cr-nav-link {
        position: relative;
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 0.85rem;
        font-size: 0.82rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        color: var(--h-text);
        text-decoration: none;
        transition: color 0.25s ease;
        border-radius: 6px;
    }

    .cr-nav-link::after {
        content: '';
        position: absolute;
        bottom: 4px;
        left: 0.85rem;
        right: 0.85rem;
        height: 1px;
        background: var(--h-gold);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .cr-nav-link:hover {
        color: var(--h-text-hover);
    }

    .cr-nav-link:hover::after {
        transform: scaleX(1);
    }

    .cr-nav-link.active {
        color: var(--h-gold);
    }

    /* ══ CTA BUTTON ══ */
    .cr-nav-cta {
        display: inline-flex;
        align-items: center;
        padding: 0.55rem 1.35rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--h-gold);
        text-decoration: none;
        border: 1px solid var(--h-gold);
        border-radius: 100px;
        transition: background 0.3s ease, color 0.3s ease;
        white-space: nowrap;
    }

    .cr-nav-cta:hover {
        background: var(--h-gold);
        color: #0e0c09;
    }

    /* ══ MOBILE HAMBURGER ══ */
    .cr-hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
    }

    .cr-hamburger span {
        display: block;
        width: 22px;
        height: 1.5px;
        background: #fcfaf7;
        transition: all 0.3s ease;
    }

    .cr-mobile-nav {
        display: none;
        flex-direction: column;
        background: rgba(14, 12, 9, 0.98);
        backdrop-filter: blur(20px);
        border-top: 1px solid var(--h-border);
        padding: 1.5rem clamp(1.5rem, 5vw, 4rem) 2rem;
    }

    .cr-mobile-nav.open {
        display: flex;
    }

    .cr-mobile-nav .cr-nav-link {
        padding: 0.75rem 0;
        font-size: 0.95rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .cr-mobile-nav .cr-nav-cta {
        margin-top: 1.2rem;
        justify-content: center;
        padding: 0.85rem;
    }

    /* ══ PAGE OFFSET — push page content below sticky header ══ */
    body>.wp-site-blocks {
        padding-top: 72px;
    }

    @media (max-width: 840px) {

        .cr-nav,
        .cr-nav-cta {
            display: none;
        }

        .cr-hamburger {
            display: flex;
        }
    }
</style>
<!-- /wp:html -->

<!-- wp:html -->
<header class="cr-header" id="cr-header">
    <div class="cr-header-inner">

        <!-- Logo -->
        <a class="cr-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <svg class="cr-logo-icon" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 2L14 8M14 20L14 26M2 14L8 14M20 14L26 14" stroke="#eca413" stroke-width="1.5"
                    stroke-linecap="round" />
                <circle cx="14" cy="14" r="4" stroke="#eca413" stroke-width="1.5" fill="rgba(236,164,19,0.08)" />
            </svg>
            <div class="cr-logo-text">
                <span class="cr-logo-title">Cristo Rey</span>
                <span class="cr-logo-subtitle">Parroquia</span>
            </div>
        </a>

        <!-- Desktop Nav -->
        <nav aria-label="Navegación principal">
            <ul class="cr-nav">
                <li><a class="cr-nav-link" href="<?php echo esc_url(home_url('/')); ?>">Inicio</a></li>
                <li><a class="cr-nav-link" href="<?php echo esc_url(home_url('/ministerios/')); ?>">Ministerios</a></li>
                <li><a class="cr-nav-link" href="<?php echo esc_url(home_url('/verbum-domini/')); ?>">Verbum Domini</a>
                </li>
                <li><a class="cr-nav-link" href="<?php echo esc_url(home_url('/horarios/')); ?>">Horarios</a></li>
                <li><a class="cr-nav-link" href="<?php echo esc_url(home_url('/contacto/')); ?>">Contacto</a></li>
            </ul>
        </nav>

        <!-- CTA + Hamburger -->
        <div style="display:flex; align-items:center; gap:1rem;">
            <a class="cr-nav-cta" href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>">Soy Nuevo</a>
            <button class="cr-hamburger" id="cr-hamburger" aria-label="Menú" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Mobile Nav -->
    <nav class="cr-mobile-nav" id="cr-mobile-nav" aria-label="Menú móvil">
        <a class="cr-nav-link" href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
        <a class="cr-nav-link" href="<?php echo esc_url(home_url('/ministerios/')); ?>">Ministerios</a>
        <a class="cr-nav-link" href="<?php echo esc_url(home_url('/verbum-domini/')); ?>">Verbum Domini</a>
        <a class="cr-nav-link" href="<?php echo esc_url(home_url('/horarios/')); ?>">Horarios</a>
        <a class="cr-nav-link" href="<?php echo esc_url(home_url('/contacto/')); ?>">Contacto</a>
        <a class="cr-nav-cta" href="<?php echo esc_url(home_url('/soy-nuevo/')); ?>">Soy Nuevo</a>
    </nav>
</header>

<script>
    (function () {
        var header = document.getElementById('cr-header');
        var hamburger = document.getElementById('cr-hamburger');
        var mobileNav = document.getElementById('cr-mobile-nav');

        // Scroll class
        window.addEventListener('scroll', function () {
            header.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });

        // Mobile toggle
        hamburger.addEventListener('click', function () {
            var isOpen = mobileNav.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', isOpen);
        });

        // Active link highlight
        var links = document.querySelectorAll('.cr-nav-link, .cr-mobile-nav .cr-nav-link');
        links.forEach(function (link) {
            if (link.href === window.location.href || window.location.href.startsWith(link.href) && link.href !== window.location.origin + '/') {
                link.classList.add('active');
            }
        });
    })();
</script>
<!-- /wp:html -->