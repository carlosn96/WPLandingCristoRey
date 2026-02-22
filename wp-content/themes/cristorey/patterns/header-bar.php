<?php
/**
 * Title: Header Bar (Premium Plus)
 * Slug: cristorey/header-bar
 * Categories: header
 * Description: Premium dark sticky header with glassmorphism scroll effect.
 */

$home_url = esc_url(home_url('/'));
$min_url = esc_url(home_url('/ministerios/'));
$verbum_url = esc_url(home_url('/verbum-domini/'));
$contact_url = esc_url(home_url('/contacto/'));
$sche_url = esc_url(home_url('/horarios/'));
$new_url = esc_url(home_url('/soy-nuevo/'));
?>
<!-- wp:html -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Manrope:wght@300;400;500;600&display=swap');

    /* ══ GLOBAL RESET FOR HEADER WRAPPER ══ */
    .is-sticky-header,
    .cr-premium-header {
        background: transparent !important;
        padding: 0 !important;
        margin: 0 !important;
        box-shadow: none !important;
        border: none !important;
    }

    /* ══ HEADER ══ */
    .cr-nav-wrap {
        --h-bg: #0e0c09;
        --h-bg-glass: rgba(14, 12, 9, 0.93);
        --h-text: rgba(252, 250, 247, 0.82);
        --h-text-active: #fcfaf7;
        --h-gold: #eca413;
        --h-border: rgba(236, 164, 19, 0.15);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
        width: 100%;
        background: var(--h-bg);
        border-bottom: 1px solid var(--h-border);
        transition: background 0.4s ease, box-shadow 0.4s ease;
        font-family: 'Manrope', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .cr-nav-wrap.cr-scrolled {
        background: var(--h-bg-glass);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
        box-shadow: 0 4px 32px rgba(0, 0, 0, 0.65);
    }

    .cr-nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 clamp(1.5rem, 5vw, 4rem);
        height: 70px;
        gap: 2rem;
    }

    /* ══ LOGO ══ */
    .cr-brand {
        display: flex;
        align-items: center;
        gap: 11px;
        text-decoration: none;
        flex-shrink: 0;
    }

    .cr-brand-text {
        line-height: 1;
    }

    .cr-brand-name {
        font-family: 'Cinzel', serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: #fcfaf7;
        letter-spacing: 0.06em;
        display: block;
    }

    .cr-brand-tag {
        font-size: 0.58rem;
        font-weight: 600;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        color: var(--h-gold);
        opacity: 0.8;
        display: block;
        margin-top: 3px;
    }

    /* ══ DESKTOP NAV ══ */
    .cr-desktop-nav ul {
        display: flex;
        align-items: center;
        gap: 0.15rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cr-desktop-nav .cr-link {
        position: relative;
        display: inline-block;
        padding: 0.5rem 0.9rem;
        font-size: 0.83rem;
        font-weight: 500;
        letter-spacing: 0.04em;
        color: var(--h-text);
        text-decoration: none;
        transition: color 0.25s ease;
        border-radius: 6px;
    }

    .cr-desktop-nav .cr-link::after {
        content: '';
        position: absolute;
        bottom: 3px;
        left: 0.9rem;
        right: 0.9rem;
        height: 1px;
        background: var(--h-gold);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .cr-desktop-nav .cr-link:hover {
        color: var(--h-text-active);
    }

    .cr-desktop-nav .cr-link:hover::after,
    .cr-desktop-nav .cr-link.cr-active::after {
        transform: scaleX(1);
    }

    .cr-desktop-nav .cr-link.cr-active {
        color: var(--h-gold);
    }

    /* ══ ACTIONS ══ */
    .cr-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-shrink: 0;
    }

    .cr-btn-schedule {
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--h-text);
        text-decoration: none;
        letter-spacing: 0.04em;
        padding: 0.4rem 0.6rem;
        transition: color 0.25s ease;
    }

    .cr-btn-schedule:hover {
        color: var(--h-gold);
    }

    .cr-btn-nuevo {
        display: inline-flex;
        align-items: center;
        padding: 0.55rem 1.35rem;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--h-gold);
        text-decoration: none;
        border: 1px solid var(--h-gold);
        border-radius: 100px;
        transition: background 0.3s ease, color 0.3s ease;
        white-space: nowrap;
    }

    .cr-btn-nuevo:hover {
        background: var(--h-gold);
        color: #0e0c09;
    }

    /* ══ HAMBURGER ══ */
    .cr-toggler {
        display: none;
        flex-direction: column;
        justify-content: center;
        gap: 5px;
        background: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        cursor: pointer;
        padding: 9px 10px;
        width: 42px;
        height: 42px;
    }

    .cr-toggler span {
        display: block;
        width: 20px;
        height: 1.5px;
        background: #fcfaf7;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .cr-toggler.open span:nth-child(1) {
        transform: translateY(6.5px) rotate(45deg);
    }

    .cr-toggler.open span:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
    }

    .cr-toggler.open span:nth-child(3) {
        transform: translateY(-6.5px) rotate(-45deg);
    }

    /* ══ MOBILE DRAWER ══ */
    .cr-drawer {
        display: none;
        flex-direction: column;
        background: rgba(11, 9, 7, 0.98);
        backdrop-filter: blur(20px);
        border-top: 1px solid var(--h-border);
        padding: 1.25rem clamp(1.5rem, 5vw, 4rem) 2rem;
        gap: 0;
    }

    .cr-drawer.open {
        display: flex;
    }

    .cr-drawer .cr-link {
        display: block;
        padding: 0.85rem 0;
        font-size: 0.92rem;
        font-weight: 500;
        color: var(--h-text);
        text-decoration: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        transition: color 0.2s ease;
    }

    .cr-drawer .cr-link:hover {
        color: var(--h-gold);
    }

    .cr-drawer .cr-btn-nuevo {
        margin-top: 1.25rem;
        justify-content: center;
        padding: 0.85rem;
    }

    /* ══ BODY OFFSET ══ */
    html {
        scroll-padding-top: 70px;
    }

    @media (max-width: 840px) {

        .cr-desktop-nav,
        .cr-btn-schedule {
            display: none !important;
        }

        .cr-toggler {
            display: flex;
        }
    }
</style>

<div class="cr-nav-wrap" id="crNav">
    <div class="cr-nav-inner">

        <a class="cr-brand" href="<?php echo $home_url; ?>">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none">
                <path d="M14 3v7M14 18v7M3 14h7M18 14h7" stroke="#eca413" stroke-width="1.5" stroke-linecap="round" />
                <circle cx="14" cy="14" r="4.5" stroke="#eca413" stroke-width="1.5" fill="rgba(236,164,19,0.06)" />
            </svg>
            <div class="cr-brand-text">
                <span class="cr-brand-name">Cristo Rey</span>
                <span class="cr-brand-tag">Parroquia</span>
            </div>
        </a>

        <nav class="cr-desktop-nav" aria-label="Navegación principal">
            <ul>
                <li><a class="cr-link" href="<?php echo $home_url; ?>">Inicio</a></li>
                <li><a class="cr-link" href="<?php echo $min_url; ?>">Ministerios</a></li>
                <li><a class="cr-link" href="<?php echo $verbum_url; ?>">Verbum Domini</a></li>
                <li><a class="cr-link" href="<?php echo $contact_url; ?>">Contacto</a></li>
            </ul>
        </nav>

        <div class="cr-actions">
            <a class="cr-btn-schedule" href="<?php echo $sche_url; ?>">Horarios</a>
            <a class="cr-btn-nuevo" href="<?php echo $new_url; ?>">Soy Nuevo</a>
            <button class="cr-toggler" id="crToggler" aria-label="Menú" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>

    <nav class="cr-drawer" id="crDrawer" aria-label="Menú móvil">
        <a class="cr-link" href="<?php echo $home_url; ?>">Inicio</a>
        <a class="cr-link" href="<?php echo $min_url; ?>">Ministerios</a>
        <a class="cr-link" href="<?php echo $verbum_url; ?>">Verbum Domini</a>
        <a class="cr-link" href="<?php echo $sche_url; ?>">Horarios</a>
        <a class="cr-link" href="<?php echo $contact_url; ?>">Contacto</a>
        <a class="cr-btn-nuevo" href="<?php echo $new_url; ?>">Soy Nuevo</a>
    </nav>
</div>

<!-- Body push so content doesn't hide behind fixed header -->
<div style="height:70px" aria-hidden="true"></div>

<script>
    (function () {
        var nav = document.getElementById('crNav');
        var toggler = document.getElementById('crToggler');
        var drawer = document.getElementById('crDrawer');

        /* Scroll glass effect */
        window.addEventListener('scroll', function () {
            nav.classList.toggle('cr-scrolled', window.scrollY > 24);
        }, { passive: true });

        /* Hamburger toggle */
        toggler.addEventListener('click', function () {
            var open = toggler.classList.toggle('open');
            drawer.classList.toggle('open', open);
            toggler.setAttribute('aria-expanded', open);
        });

        /* Active link */
        var href = window.location.pathname;
        document.querySelectorAll('.cr-link').forEach(function (a) {
            try {
                var path = new URL(a.href).pathname;
                if (path === '/' ? href === '/' : href.startsWith(path) && path !== '/') {
                    a.classList.add('cr-active');
                }
            } catch (e) { }
        });
    })();
</script>
<!-- /wp:html -->