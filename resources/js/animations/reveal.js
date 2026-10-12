import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initReveal() {
    gsap.registerPlugin(ScrollTrigger);

    const isMobile = window.innerWidth < 768;
    const xOffset = isMobile ? 50 : 90;

    // Individual Reveal Elements
    gsap.utils.toArray('[data-reveal]').forEach((el) => {
        const dir = el.dataset.reveal || 'up';
        const from = { opacity: 0, x: 0, y: 0 };

        if (dir === 'up') from.y = 45;
        if (dir === 'down') from.y = -45;
        if (dir === 'left') from.x = 45;
        if (dir === 'right') from.x = -45;
        if (dir === 'from-left') from.x = -xOffset;
        if (dir === 'from-right') from.x = xOffset;
        if (dir === 'fade') { from.x = 0; from.y = 0; }

        gsap.fromTo(el,
            {
                opacity: 0,
                x: from.x,
                y: from.y,
            },
            {
                opacity: 1,
                x: 0,
                y: 0,
                duration: 0.9,
                ease: 'power3.out',
                clearProps: 'opacity,transform',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    });

    // Stagger Children from Up
    gsap.utils.toArray('[data-stagger]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0,
                y: 35,
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.12,
                ease: 'power3.out',
                clearProps: 'opacity,transform',
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    });

    // Stagger Children from Left (Left boxes slide in from left to place)
    gsap.utils.toArray('[data-stagger-left]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0,
                x: -xOffset,
            },
            {
                opacity: 1,
                x: 0,
                duration: 0.85,
                stagger: 0.1,
                ease: 'power3.out',
                clearProps: 'opacity,transform',
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    });

    // Stagger Children from Right (Right boxes slide in from right to place)
    gsap.utils.toArray('[data-stagger-right]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0,
                x: xOffset,
            },
            {
                opacity: 1,
                x: 0,
                duration: 0.85,
                stagger: 0.1,
                ease: 'power3.out',
                clearProps: 'opacity,transform',
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    });

    // Text scrub highlight
    gsap.utils.toArray('[data-scrub]').forEach((el) => {
        gsap.fromTo(el, 
            { opacity: 0.4 }, 
            {
                opacity: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 80%',
                    end: 'bottom 60%',
                    scrub: 1,
                }
            }
        );
    });

    // 4-Card Trust Bar: 2 from Left, 2 from Right
    initTrustBar();

    // About Heading: Bold scale on scroll-down, then glides into place
    initAboutHeading();

    // Testimonials: 3D Deck Fan-out, Floating Parallax, and Card Motion
    initTestimonials();

    // Regional Transformation Story Header: Pop from top down into place
    initSpotlightHeader();

    // Why DACFIN 6 Bento Principles & 3 Approach Cards: Pop Motion on Scroll
    initWhySection();
}

export function initTrustBar() {
    const trustSection = document.querySelector('[data-trust-section]');
    if (!trustSection) return;

    const isMobile = window.innerWidth < 768;
    const xDist = isMobile ? 60 : 130;

    const leftCards = trustSection.querySelectorAll('[data-trust-side="left"]');
    const rightCards = trustSection.querySelectorAll('[data-trust-side="right"]');

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: trustSection,
            start: 'top 85%',
            toggleActions: 'restart none restart reset',
        },
    });

    // 2 Left cards slide in from Left
    tl.fromTo(leftCards,
        {
            opacity: 0,
            x: -xDist,
            scale: 0.94,
        },
        {
            opacity: 1,
            x: 0,
            scale: 1,
            duration: 0.85,
            stagger: 0.12,
            ease: 'power3.out',
            clearProps: 'transform',
        },
        0
    );

    // 2 Right cards slide in from Right
    tl.fromTo(rightCards,
        {
            opacity: 0,
            x: xDist,
            scale: 0.94,
        },
        {
            opacity: 1,
            x: 0,
            scale: 1,
            duration: 0.85,
            stagger: 0.12,
            ease: 'power3.out',
            clearProps: 'transform',
        },
        0
    );
}

export function initAboutHeading() {
    const heading = document.querySelector('[data-about-heading]');
    if (!heading) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;

    // As user scrolls down ("down scroll krte tym"), text appears bold & enlarged, 
    // then smoothly docks into place ("apne place pe chala jye ga")
    gsap.fromTo(heading,
        {
            scale: isMobile ? 1.15 : 1.25,
            y: 50,
            opacity: 0.4,
            filter: 'blur(2px)',
            transformOrigin: isMobile ? 'center center' : 'left center',
        },
        {
            scale: 1,
            y: 0,
            opacity: 1,
            filter: 'blur(0px)',
            ease: 'power2.out',
            scrollTrigger: {
                trigger: heading,
                start: 'top 96%',
                end: 'top 65%',
                scrub: 1.2,
            },
        }
    );
}

export function initTestimonials() {
    const section = document.querySelector('[data-testimonials-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;

    const header = section.querySelector('[data-testimonials-header]');
    const deckBack = section.querySelector('[data-deck-back]');
    const deckFront = section.querySelector('[data-deck-front]');
    const content = section.querySelector('[data-testimonial-content]');

    // 1. Coordinated ScrollTrigger Entrance Timeline
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 85%',
            toggleActions: 'restart none restart reset',
        },
    });

    // Header reveal
    if (header) {
        tl.fromTo(header,
            { opacity: 0, y: 35 },
            { opacity: 1, y: 0, duration: 0.7, ease: 'power3.out' }
        );
    }

    // Left Deck Fan-out Entrance:
    // Starts stacked together and fans open with spring physics
    if (deckBack && deckFront) {
        tl.fromTo(deckBack,
            {
                opacity: 0,
                x: 0,
                rotate: 0,
                scale: 0.88,
            },
            {
                opacity: 1,
                x: isMobile ? -24 : -40,
                rotate: -6,
                scale: 1,
                duration: 0.85,
                ease: 'back.out(1.6)',
            },
            '-=0.45'
        );

        tl.fromTo(deckFront,
            {
                opacity: 0,
                scale: 0.82,
                y: 35,
                rotate: 0,
            },
            {
                opacity: 1,
                scale: 1,
                y: 0,
                rotate: 2,
                duration: 0.85,
                ease: 'back.out(1.7)',
            },
            '-=0.7'
        );
    }

    // Right Testimonial Content Slide-in
    if (content) {
        tl.fromTo(content,
            {
                opacity: 0,
                x: isMobile ? 40 : 80,
            },
            {
                opacity: 1,
                x: 0,
                duration: 0.85,
                ease: 'power3.out',
                clearProps: 'transform',
            },
            '-=0.75'
        );
    }

    // 2. Continuous Ambient Floating Parallax on the Deck Cards
    if (deckFront && deckBack) {
        // Front card gentle breathing bob
        gsap.to(deckFront, {
            y: -7,
            rotate: 3,
            duration: 3.2,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: 1,
        });

        // Back card counter-floating bob
        gsap.to(deckBack, {
            y: 6,
            rotate: -8,
            duration: 3.6,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: 1.2,
        });
    }
}

export function initSpotlightHeader() {
    const header = document.querySelector('[data-spotlight-header]');
    if (!header) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const eyebrow = header.querySelector('[data-spotlight-eyebrow]');
    const title = header.querySelector('[data-spotlight-title]');

    // Live scroll-bound motion across visible viewport:
    // As user scrolls through the section, title and eyebrow actively glide down
    // from the top (upper se) and dock into their exact place (niche apne jagha pe)
    if (title) {
        gsap.fromTo(title,
            {
                y: isMobile ? -90 : -150,
                scale: isMobile ? 1.15 : 1.25,
                opacity: 0.15,
                filter: 'blur(3px)',
                transformOrigin: 'center center',
            },
            {
                y: 0,
                scale: 1,
                opacity: 1,
                filter: 'blur(0px)',
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 92%',
                    end: 'top 40%',
                    scrub: 1,
                },
            }
        );
    }

    if (eyebrow) {
        gsap.fromTo(eyebrow,
            {
                y: isMobile ? -50 : -80,
                scale: 0.8,
                opacity: 0.15,
            },
            {
                y: 0,
                scale: 1,
                opacity: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 92%',
                    end: 'top 48%',
                    scrub: 1,
                },
            }
        );
    }
}

export function initWhySection() {
    const section = document.querySelector('[data-why-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const header = section.querySelector('[data-why-header]');
    const grid = section.querySelector('[data-why-grid]');
    const cards = section.querySelectorAll('[data-why-card]');
    const approachGrid = section.querySelector('[data-why-approach-grid]');
    const approachCards = section.querySelectorAll('[data-why-approach-card]');

    // 1. Header: Smooth soft entrance from top
    if (header) {
        gsap.fromTo(header,
            {
                opacity: 0,
                y: -30,
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: section,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    }

    // 2. The 6 Bento Principle Cards: POP MOTION ON SCROLL
    // As requested: start small (size chota), pop up and scale smoothly into place on scroll
    if (cards.length > 0 && grid) {
        gsap.fromTo(cards,
            {
                opacity: 0,
                scale: isMobile ? 0.86 : 0.8,
                y: isMobile ? 45 : 70,
                rotate: (i) => (i % 2 === 0 ? -1.8 : 1.8),
            },
            {
                opacity: 1,
                scale: 1,
                y: 0,
                rotate: 0,
                duration: 0.85,
                stagger: isMobile ? 0.08 : 0.12,
                ease: 'back.out(1.8)',
                clearProps: 'transform,opacity',
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    }

    // 3. The 3 Approach Steps Bottom Bar: Slide up & pop into place
    if (approachCards.length > 0 && approachGrid) {
        gsap.fromTo(approachCards,
            {
                opacity: 0,
                y: 40,
                scale: 0.88,
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.75,
                stagger: 0.12,
                ease: 'back.out(1.6)',
                clearProps: 'transform,opacity',
                scrollTrigger: {
                    trigger: approachGrid,
                    start: 'top 88%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    }
}



