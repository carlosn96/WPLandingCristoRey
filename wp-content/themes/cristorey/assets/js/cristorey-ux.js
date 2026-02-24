/**
 * Cristo Rey UX Engine — "Cinematic Flow"
 * =========================================
 * High-end interaction layer: mask reveals, staggered choreography,
 * color-block transitions, parallax depth, and tactile micro-moments.
 *
 * @version 3.0.0 — Dark Editorial Unification
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
     * 4. Micro-Moments — Tactile Click Feedback
     *    (Scoped to interactive elements only, not all links)
     * ----------------------------------------------------------------*/
    function initMicroMoments() {
        if (prefersReducedMotion) return;

        const INTERACTIVE = '.wp-element-button, .wp-block-button__link, .service-card, .bento-item, .hp-bento-item, .vdl-card, .cr-btn, .cr-btn-nuevo, .hp-btn';

        document.addEventListener('pointerdown', (e) => {
            const target = e.target.closest(INTERACTIVE);
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
     * Boot
     * ----------------------------------------------------------------*/
    document.addEventListener('DOMContentLoaded', () => {
        initMaskReveals();
        initColorBlocks();
        initParallax();
        initMicroMoments();
    });

})();
