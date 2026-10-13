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

    // Regional Transformation Story: Left from left, Right from right, Center pop on scroll
    initSpotlightSection();

    // Why DACFIN 6 Bento Principles & 3 Approach Cards: Pop Motion on Scroll
    initWhySection();

    // Core Strengths: Header from Left, Side box from Right, Center box Pops on scroll (Zero overlap)
    initStrengthsSection();

    // Advisory Pillars (Bottom Services): Header from Left, Side box from Right, Center box Pops
    initBottomServices();
}

export function initTrustBar() {
    const trustSection = document.querySelector('[data-trust-section]');
    if (!trustSection) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const xDist = isMobile ? 60 : 130;

    const leftCards = trustSection.querySelectorAll('[data-trust-side="left"]');
    const rightCards = trustSection.querySelectorAll('[data-trust-side="right"]');

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: trustSection,
            start: 'top 92%',
            end: 'top 55%',
            scrub: 0.8,
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
            ease: 'power2.out',
            stagger: 0.1,
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
            ease: 'power2.out',
            stagger: 0.1,
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



export function initSpotlightSection() {
    const section = document.querySelector('[data-spotlight-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const header = section.querySelector('[data-spotlight-header]');
    const grid = section.querySelector('[data-spotlight-grid]');
    if (!grid) return;

    const leftCol = section.querySelector('[data-spotlight-left]');
    const leftStats = section.querySelectorAll('[data-spotlight-stat]');
    const centerCol = section.querySelector('[data-spotlight-center]');
    const rightCol = section.querySelector('[data-spotlight-right]');

    const xDist = isMobile ? 90 : 220;

    // 1. Header subtle glide on scroll
    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, y: 35 },
            {
                opacity: 1,
                y: 0,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 92%',
                    end: 'top 55%',
                    scrub: 0.8,
                },
            }
        );
    }

    // 2. 3-Column Asymmetric Cards Animation BOUND DIRECTLY TO SCROLL:
    // Left slides in from Left, Right slides in from Right, Center POPS into place!
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: grid,
            start: isMobile ? 'top 92%' : 'top 88%',
            end: isMobile ? 'top 50%' : 'top 32%',
            scrub: 0.8,
        },
    });

    // LEFT: Left stats slide in from Left as user scrolls
    if (leftStats.length > 0) {
        tl.fromTo(leftStats,
            { opacity: 0, x: -xDist, scale: 0.88 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out', stagger: 0.08 },
            0
        );
    } else if (leftCol) {
        tl.fromTo(leftCol,
            { opacity: 0, x: -xDist, scale: 0.88 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out' },
            0
        );
    }

    // RIGHT: Right story card slides in from Right as user scrolls
    if (rightCol) {
        tl.fromTo(rightCol,
            { opacity: 0, x: xDist, scale: 0.88 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out' },
            0
        );
    }

    // CENTER: Center card POPS into the center as user scrolls!
    if (centerCol) {
        tl.fromTo(centerCol,
            { opacity: 0, scale: 0.48, y: 70, transformOrigin: 'center center' },
            { opacity: 1, scale: 1, y: 0, ease: 'back.out(2)' },
            0.04
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
    const leftCards = section.querySelectorAll('[data-why-card][data-why-col="left"]');
    const centerCards = section.querySelectorAll('[data-why-card][data-why-col="center"]');
    const rightCards = section.querySelectorAll('[data-why-card][data-why-col="right"]');
    const allCards = section.querySelectorAll('[data-why-card]');
    const approachGrid = section.querySelector('[data-why-approach-grid]');
    const approachCards = section.querySelectorAll('[data-why-approach-card]');

    // 1. Header: Smooth crisp reveal
    if (header) {
        gsap.fromTo(header,
            { opacity: 0, y: -25 },
            {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: section,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse',
                },
            }
        );
    }

    // 2. The 6 Bento Principle Cards: Punchy Directional Motion Animation
    if (grid && allCards.length > 0) {
        const mm = gsap.matchMedia();

        // Desktop: Left cards glide from left, Right cards glide from right, Center cards POP
        mm.add('(min-width: 1024px)', () => {
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 82%',
                    toggleActions: 'play none none reverse',
                },
            });

            // Left column (01, 04)
            if (leftCards.length > 0) {
                tl.fromTo(leftCards,
                    { opacity: 0, x: -75, scale: 0.88 },
                    { opacity: 1, x: 0, scale: 1, duration: 0.8, ease: 'power3.out', stagger: 0.12 },
                    0
                );
            }

            // Right column (03, 06)
            if (rightCards.length > 0) {
                tl.fromTo(rightCards,
                    { opacity: 0, x: 75, scale: 0.88 },
                    { opacity: 1, x: 0, scale: 1, duration: 0.8, ease: 'power3.out', stagger: 0.12 },
                    0
                );
            }

            // Center column (02, 05) - POPS with spring bounce
            if (centerCards.length > 0) {
                tl.fromTo(centerCards,
                    { opacity: 0, y: 55, scale: 0.78 },
                    { opacity: 1, y: 0, scale: 1, duration: 0.85, ease: 'back.out(1.8)', stagger: 0.12 },
                    0.08
                );
            }
        });

        // Mobile / Tablet: Staggered pop and glide up into place
        mm.add('(max-width: 1023px)', () => {
            gsap.fromTo(allCards,
                { opacity: 0, y: 40, scale: 0.9 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.65,
                    ease: 'back.out(1.4)',
                    stagger: 0.08,
                    scrollTrigger: {
                        trigger: grid,
                        start: 'top 88%',
                        toggleActions: 'play none none reverse',
                    },
                }
            );
        });
    }

    // 3. The 3 Approach Steps Bottom Bar: Staggered pop entrance
    if (approachCards.length > 0 && approachGrid) {
        gsap.fromTo(approachCards,
            { opacity: 0, y: 35, scale: 0.92 },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.7,
                ease: 'back.out(1.5)',
                stagger: 0.1,
                scrollTrigger: {
                    trigger: approachGrid,
                    start: 'top 90%',
                    toggleActions: 'play none none reverse',
                },
            }
        );
    }
}

/**
 * Core Strengths Section Scroll-Triggered Motion:
 * 1. Header glides in from Left on scroll-down
 * 2. Side boxes glide in from Right on same scroll
 * 3. Center box pops in (scale & spring, guaranteed zero overlap)
 */
export function initStrengthsSection() {
    const section = document.querySelector('[data-strengths-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const header = section.querySelector('[data-strengths-header]');
    const leftBoxes = section.querySelectorAll('[data-strengths-left]');
    const rightBoxes = section.querySelectorAll('[data-strengths-right]');
    const centerBox = section.querySelector('[data-strengths-center]');

    // Safe distances (within column margin, never crossing adjacent column boundaries -> ZERO OVERLAP)
    const xDist = isMobile ? 40 : 80;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: isMobile ? 'top 92%' : 'top 85%',
            end: isMobile ? 'top 50%' : 'top 30%',
            scrub: 0.8,
        },
    });

    // 1. Point 1: Header comes from Left side on scroll
    if (header) {
        tl.fromTo(header,
            { opacity: 0, x: -xDist },
            { opacity: 1, x: 0, ease: 'power2.out' },
            0
        );
    }

    // Left boxes (Large Intro card + Box 02) come from Left on scroll
    if (leftBoxes.length > 0) {
        tl.fromTo(leftBoxes,
            { opacity: 0, x: -xDist, scale: 0.94 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out', stagger: 0.08 },
            0
        );
    }

    // 2. Point 2: Side boxes (Box 01 + Box 04) come from Right on same scroll
    if (rightBoxes.length > 0) {
        tl.fromTo(rightBoxes,
            { opacity: 0, x: xDist, scale: 0.94 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out', stagger: 0.08 },
            0
        );
    }

    // 3. Point 3: Center box (Box 03) POPS into place (scale up, slight y, zero overlay)
    if (centerBox) {
        tl.fromTo(centerBox,
            { opacity: 0, scale: 0.72, y: 35, transformOrigin: 'center center' },
            { opacity: 1, scale: 1, y: 0, ease: 'back.out(2)' },
            0.05
        );
    }
}

/**
 * Advisory Pillars (Bottom Services) Scroll-Triggered Motion:
 * Header from Left, Side box from Right, Center box Pops on scroll
 */
export function initBottomServices() {
    const section = document.querySelector('[data-bottom-services-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const isMobile = window.innerWidth < 768;
    const header = section.querySelector('[data-bottom-services-header]');
    const leftCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="left"]');
    const centerCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="center"]');
    const rightCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="right"]');

    const xDist = isMobile ? 40 : 80;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: isMobile ? 'top 92%' : 'top 85%',
            end: isMobile ? 'top 50%' : 'top 30%',
            scrub: 0.8,
        },
    });

    if (header) {
        tl.fromTo(header,
            { opacity: 0, x: -xDist },
            { opacity: 1, x: 0, ease: 'power2.out' },
            0
        );
    }

    if (leftCard) {
        tl.fromTo(leftCard,
            { opacity: 0, x: -xDist, scale: 0.94 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out' },
            0
        );
    }

    if (rightCard) {
        tl.fromTo(rightCard,
            { opacity: 0, x: xDist, scale: 0.94 },
            { opacity: 1, x: 0, scale: 1, ease: 'power2.out' },
            0
        );
    }

    if (centerCard) {
        tl.fromTo(centerCard,
            { opacity: 0, scale: 0.72, y: 35, transformOrigin: 'center center' },
            { opacity: 1, scale: 1, y: 0, ease: 'back.out(2)' },
            0.05
        );
    }
}



