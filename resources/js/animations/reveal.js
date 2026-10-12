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
    const eyebrow = section.querySelector('[data-spotlight-eyebrow]');
    const title = section.querySelector('[data-spotlight-title]');

    // 1. Header scroll-bound motion
    if (title && header) {
        gsap.fromTo(title,
            {
                y: isMobile ? -50 : -80,
                scale: isMobile ? 1.08 : 1.15,
                opacity: 0.2,
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
                    end: 'top 45%',
                    scrub: 0.8,
                },
            }
        );
    }

    if (eyebrow && header) {
        gsap.fromTo(eyebrow,
            {
                y: isMobile ? -30 : -50,
                scale: 0.85,
                opacity: 0.2,
            },
            {
                y: 0,
                scale: 1,
                opacity: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 92%',
                    end: 'top 50%',
                    scrub: 0.8,
                },
            }
        );
    }

    // 2. 3-Column Asymmetric Grid Animation on Scroll (Real-time scrubbed motion):
    // Left stats from Left, Right story from Right, Center Patna HQ card POPS in center!
    const grid = section.querySelector('[data-spotlight-grid]');
    if (!grid) return;

    const leftCol = section.querySelector('[data-spotlight-left]');
    const leftStats = section.querySelectorAll('[data-spotlight-stat]');
    const centerCol = section.querySelector('[data-spotlight-center]');
    const rightCol = section.querySelector('[data-spotlight-right]');

    const mm = gsap.matchMedia();

    // Desktop: Pinned scroll showcase where scrolling moves cards into position!
    mm.add('(min-width: 1024px)', () => {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top top',
                end: '+=900',
                pin: true,
                scrub: 0.8,
                anticipatePin: 1,
            },
        });

        // LEFT: 3 stat cards slide in from Left
        if (leftStats.length > 0) {
            tl.fromTo(leftStats,
                {
                    opacity: 0,
                    x: -280,
                    scale: 0.88,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                    stagger: 0.08,
                },
                0
            );
        } else if (leftCol) {
            tl.fromTo(leftCol,
                {
                    opacity: 0,
                    x: -280,
                    scale: 0.88,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                },
                0
            );
        }

        // RIGHT: Right story card slides in from Right
        if (rightCol) {
            tl.fromTo(rightCol,
                {
                    opacity: 0,
                    x: 280,
                    scale: 0.88,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                },
                0
            );
        }

        // CENTER: Center card POPS into the center on scroll!
        if (centerCol) {
            tl.fromTo(centerCol,
                {
                    opacity: 0,
                    scale: 0.45,
                    y: 90,
                    transformOrigin: 'center center',
                },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    ease: 'back.out(1.8)',
                },
                0.04
            );
        }
    });

    // Mobile & Tablet: Stacked columns scrub individually as each card enters the viewport
    mm.add('(max-width: 1023px)', () => {
        // Left Column / Stats: scrubs in from Left
        if (leftStats.length > 0 && leftCol) {
            gsap.fromTo(leftStats,
                {
                    opacity: 0,
                    x: -80,
                    scale: 0.94,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                    stagger: 0.1,
                    scrollTrigger: {
                        trigger: leftCol,
                        start: 'top 92%',
                        end: 'top 55%',
                        scrub: 0.8,
                    },
                }
            );
        } else if (leftCol) {
            gsap.fromTo(leftCol,
                {
                    opacity: 0,
                    x: -80,
                    scale: 0.94,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: leftCol,
                        start: 'top 92%',
                        end: 'top 55%',
                        scrub: 0.8,
                    },
                }
            );
        }

        // Center Column: POPS into view in center
        if (centerCol) {
            gsap.fromTo(centerCol,
                {
                    opacity: 0,
                    scale: 0.65,
                    y: 45,
                    transformOrigin: 'center center',
                },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    ease: 'back.out(1.8)',
                    scrollTrigger: {
                        trigger: centerCol,
                        start: 'top 92%',
                        end: 'top 50%',
                        scrub: 0.8,
                    },
                }
            );
        }

        // Right Column: scrubs in from Right
        if (rightCol) {
            gsap.fromTo(rightCol,
                {
                    opacity: 0,
                    x: 80,
                    scale: 0.94,
                },
                {
                    opacity: 1,
                    x: 0,
                    scale: 1,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: rightCol,
                        start: 'top 92%',
                        end: 'top 55%',
                        scrub: 0.8,
                    },
                }
            );
        }
    });
}

export function initWhySection() {
    const section = document.querySelector('[data-why-section]');
    if (!section) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const header = section.querySelector('[data-why-header]');
    const grid = section.querySelector('[data-why-grid]');
    const cards = section.querySelectorAll('[data-why-card]');
    const approachGrid = section.querySelector('[data-why-approach-grid]');
    const approachCards = section.querySelectorAll('[data-why-approach-card]');

    // 1. Header: Smooth soft entrance from top on scroll
    if (header) {
        gsap.fromTo(header,
            {
                opacity: 0,
                y: -30,
            },
            {
                opacity: 1,
                y: 0,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: section,
                    start: 'top 92%',
                    end: 'top 65%',
                    scrub: 0.8,
                },
            }
        );
    }

    // 2. The 6 Bento Principle Cards: POP MOTION ON SCROLL (Real-time scrubbed with scroll!)
    if (cards.length > 0 && grid) {
        const mm = gsap.matchMedia();
        mm.add('(min-width: 1024px)', () => {
            gsap.fromTo(cards,
                {
                    opacity: 0,
                    scale: 0.82,
                    y: 60,
                },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    ease: 'power2.out',
                    stagger: 0.08,
                    scrollTrigger: {
                        trigger: grid,
                        start: 'top 88%',
                        end: 'top 35%',
                        scrub: 0.8,
                    },
                }
            );
        });

        mm.add('(max-width: 1023px)', () => {
            cards.forEach((card) => {
                gsap.fromTo(card,
                    {
                        opacity: 0,
                        scale: 0.86,
                        y: 40,
                    },
                    {
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        ease: 'power2.out',
                        scrollTrigger: {
                            trigger: card,
                            start: 'top 92%',
                            end: 'top 60%',
                            scrub: 0.8,
                        },
                    }
                );
            });
        });
    }

    // 3. The 3 Approach Steps Bottom Bar: Slide up & pop into place on scroll
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
                ease: 'power2.out',
                stagger: 0.1,
                scrollTrigger: {
                    trigger: approachGrid,
                    start: 'top 92%',
                    end: 'top 65%',
                    scrub: 0.8,
                },
            }
        );
    }
}



