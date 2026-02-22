/**
 * Cristo Rey UX Engine — "Cinematic Flow"
 * =========================================
 * High-end interaction layer: mask reveals, staggered choreography,
 * color-block transitions, parallax depth, and cursor adaptive.
 *
 * @version 2.0.0
 */

(function () {
    'use strict';

    /* ------------------------------------------------------------------
     * 0. Reduced Motion Guard
     * ----------------------------------------------------------------*/
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ------------------------------------------------------------------
     * 1. Mask Reveal System  (clip-path choreography)
     * ----------------------------------------------------------------*/
    function initMaskReveals() {
        if (prefersReducedMotion) {
            document.querySelectorAll('.reveal, .reveal-mask').forEach(el => {
                el.classList.add('active');
            });
            return;
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = parseInt(el.dataset.revealDelay || '0', 10);
                    setTimeout(() => el.classList.add('active'), delay);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.reveal, .reveal-mask').forEach(el => observer.observe(el));
    }

    /* ------------------------------------------------------------------
     * 2. Color-Block Section Transitions
     * ----------------------------------------------------------------*/
    function initColorBlocks() {
        if (prefersReducedMotion) return;

        const sections = document.querySelectorAll('[data-bg-color]');
        if (!sections.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const color = entry.target.dataset.bgColor;
                    if (color) {
                        document.documentElement.style.setProperty('--cr-ambient-bg', color);
                    }
                }
            });
        }, { threshold: 0.35 });

        sections.forEach(sec => observer.observe(sec));
    }

    /* ------------------------------------------------------------------
     * 3. Parallax Depth Engine  (scroll-driven translateY)
     * ----------------------------------------------------------------*/
    function initParallax() {
        if (prefersReducedMotion) return;

        const layers = document.querySelectorAll('[data-parallax]');
        if (!layers.length) return;

        let ticking = false;

        function update() {
            const scrollY = window.scrollY;
            layers.forEach(el => {
                const speed = parseFloat(el.dataset.parallax || '0.15');
                const rect = el.getBoundingClientRect();
                const centerOffset = rect.top + rect.height / 2 - window.innerHeight / 2;
                el.style.transform = `translateY(${centerOffset * speed}px)`;
            });
            ticking = false;
        }

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });
    }

    /* ------------------------------------------------------------------
     * 4. Premium Sticky Header & Mobile Menu
     * ----------------------------------------------------------------*/
    function initStickyHeader() {
        const header = document.querySelector('.cr-premium-header');
        if (!header) return;

        const sentinel = document.createElement('div');
        sentinel.setAttribute('aria-hidden', 'true');
        Object.assign(sentinel.style, {
            position: 'absolute', top: '0', height: '1px',
            width: '100%', pointerEvents: 'none'
        });
        document.body.prepend(sentinel);

        const observer = new IntersectionObserver(([e]) => {
            header.classList.toggle('scrolled', !e.isIntersecting);
        }, { rootMargin: '-1px 0px 0px 0px', threshold: [1] });

        observer.observe(sentinel);
    }

    function initMobileMenu() {
        const toggleBtn = document.querySelector('.cr-mobile-toggle');
        const overlay = document.querySelector('.cr-mobile-overlay');
        const body = document.body;

        if (!toggleBtn || !overlay) return;

        toggleBtn.addEventListener('click', () => {
            const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

            toggleBtn.setAttribute('aria-expanded', !isExpanded);
            overlay.classList.toggle('is-active', !isExpanded);
            overlay.setAttribute('aria-hidden', isExpanded);

            // Prevent scrolling on body when menu is open
            body.style.overflow = !isExpanded ? 'hidden' : '';
        });

        // Close menu when a link is clicked
        const links = overlay.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', () => {
                toggleBtn.setAttribute('aria-expanded', 'false');
                overlay.classList.remove('is-active');
                overlay.setAttribute('aria-hidden', 'true');
                body.style.overflow = '';
            });
        });
    }

    /* ------------------------------------------------------------------
     * 5. Micro-Moments — Tactile Click Feedback
     * ----------------------------------------------------------------*/
    function initMicroMoments() {
        if (prefersReducedMotion) return;

        document.addEventListener('pointerdown', (e) => {
            const target = e.target.closest('.wp-element-button, .wp-block-button__link, .service-card, .bento-item, a');
            if (target) {
                target.style.transform = 'scale(0.97)';
                target.style.transition = 'transform 0.12s cubic-bezier(0.23, 1, 0.32, 1)';
            }
        });

        document.addEventListener('pointerup', () => {
            document.querySelectorAll('[style*="scale(0.97)"]').forEach(el => {
                el.style.transform = '';
            });
        });
    }

    /* ------------------------------------------------------------------
    /* ------------------------------------------------------------------
     * Boot
     * ----------------------------------------------------------------*/
    document.addEventListener('DOMContentLoaded', () => {
        initMaskReveals();
        initColorBlocks();
        initParallax();
        initStickyHeader();
        initMobileMenu();
        initMicroMoments();
    });

})();
