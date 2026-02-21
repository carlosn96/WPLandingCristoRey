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
     * 4. Sticky Header State
     * ----------------------------------------------------------------*/
    function initStickyHeader() {
        const header = document.querySelector('.is-sticky-header');
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
     * 6. Cursor Adaptive (Optional — Desktop Only)
     * ----------------------------------------------------------------*/
    function initCursorAdaptive() {
        if (prefersReducedMotion || 'ontouchstart' in window) return;

        const cursor = document.createElement('div');
        cursor.className = 'cr-cursor';
        cursor.innerHTML = '<div class="cr-cursor__dot"></div>';
        document.body.appendChild(cursor);

        let mouseX = 0, mouseY = 0, cursorX = 0, cursorY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        function animateCursor() {
            cursorX += (mouseX - cursorX) * 0.15;
            cursorY += (mouseY - cursorY) * 0.15;
            cursor.style.transform = `translate(${cursorX}px, ${cursorY}px)`;
            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Context-aware scaling
        document.addEventListener('mouseover', (e) => {
            const target = e.target.closest('a, button, .wp-element-button, .wp-block-button__link, .service-card, .bento-item');
            if (target) {
                cursor.classList.add('cr-cursor--expanded');
            }
        });

        document.addEventListener('mouseout', (e) => {
            const target = e.target.closest('a, button, .wp-element-button, .wp-block-button__link, .service-card, .bento-item');
            if (target) {
                cursor.classList.remove('cr-cursor--expanded');
            }
        });

        // Expand on images
        document.addEventListener('mouseover', (e) => {
            if (e.target.closest('img, video, .wp-block-image, .wp-block-cover')) {
                cursor.classList.add('cr-cursor--media');
            }
        });
        document.addEventListener('mouseout', (e) => {
            if (e.target.closest('img, video, .wp-block-image, .wp-block-cover')) {
                cursor.classList.remove('cr-cursor--media');
            }
        });
    }

    /* ------------------------------------------------------------------
     * Boot
     * ----------------------------------------------------------------*/
    document.addEventListener('DOMContentLoaded', () => {
        initMaskReveals();
        initColorBlocks();
        initParallax();
        initStickyHeader();
        initMicroMoments();
        initCursorAdaptive();
    });

})();
