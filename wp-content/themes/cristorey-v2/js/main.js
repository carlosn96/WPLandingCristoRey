document.addEventListener("DOMContentLoaded", (event) => {
    // 1. Initialize Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);

    // 2. Hide Header on Scroll Down, Show on Scroll Up
    const header = document.querySelector('.cr-header');
    let lastScrollY = window.scrollY;

    lenis.on('scroll', (e) => {
        const currentScrollY = e.actualScroll;
        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            header.classList.add('is-hidden');
        } else {
            header.classList.remove('is-hidden');
        }
        lastScrollY = currentScrollY;
    });

    // 3. GSAP + SplitType Reveal Animations

    // Fade in simple elements
    const fadeElements = document.querySelectorAll('.g-fade-in');
    fadeElements.forEach(el => {
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%", // Reveal when 85% into viewport
                toggleActions: "play none none reverse"
            },
            y: 0,
            opacity: 1,
            duration: 1.3, // Matches var(--cr-trans-reveal)
            ease: "power3.out" // Closest GSAP ease to cubic-bezier(.43, .195, .02, 1)
        });
    });

    // Split text reveal for headings and quotes (.g-reveal-text)
    const revealTexts = document.querySelectorAll('.g-reveal-text');
    revealTexts.forEach(text => {
        // Break text into lines and words
        const typeSplit = new SplitType(text, {
            types: 'lines, words',
            tagName: 'span'
        });

        // Add index variables to match CSS calc() stagger
        typeSplit.words.forEach((word, wordIndex) => {
            // Find parent line index
            let lineIndex = 0;
            const parentLine = word.closest('.line');
            if (parentLine) {
                const siblings = Array.from(parentLine.parentNode.children);
                lineIndex = siblings.indexOf(parentLine);
            }

            // Set CSS variables inline for the CSS transition to pick up
            word.style.setProperty('--word-index', wordIndex);
            word.style.setProperty('--line-index', lineIndex);
        });

        // ScrollTrigger to add the 'is-revealed' class
        ScrollTrigger.create({
            trigger: text,
            start: "top 80%",
            onEnter: () => text.classList.add('is-revealed'),
            // Optional: uncomment to reverse animation when scrolling back up
            // onLeaveBack: () => text.classList.remove('is-revealed')
        });
    });
});
