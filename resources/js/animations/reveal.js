import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initReveal() {
    const isMobile = window.innerWidth < 768;
    const xDist = isMobile ? 80 : 250;

    // 1. Universal Scroll Scrub Motion on Rows & Grids (Left from Left, Right from Right, Center Pops)
    initUniversalScrollMotion(xDist);

    // 2. Individual / Directional Scroll Scrub Reveals
    initDirectionalReveals(xDist);

    // 3. Stagger Children on Scroll
    initStaggerScroll(xDist);

    // 4. Text Scrub Highlight
    gsap.utils.toArray('[data-scrub]').forEach((el) => {
        gsap.fromTo(el, 
            { opacity: 0.4 }, 
            {
                opacity: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    end: 'bottom 65%',
                    scrub: 1,
                }
            }
        );
    });

    // 5. Section-Specific Scroll-Driven Scrub Triggers
    initTrustBar(xDist);
    initAboutHeading();
    initServicesTabs(xDist);
    initGuideSteps(xDist);
    initTestimonials();
    initSpotlightSection(xDist);
    initWhySection(xDist);
    initStrengthsSection(xDist);
    initBottomServices(xDist);
}

/**
 * Universal Scroll Motion System:
 * Any row or container with [data-scroll-row] or recognized section grids:
 * - Left elements glide in from left (-xDist -> 0)
 * - Right elements glide in from right (+xDist -> 0)
 * - Center elements pop in from center (scale 0.88, y 50 -> scale 1, y 0)
 * Tied directly to scroll (scrub: 1).
 * Once scrolled into place, elements remain firmly in position ("apne jagha pe ruk jaye").
 */
export function initUniversalScrollMotion(xDist) {
    const rowSelectors = [
        '[data-scroll-row]',
        '[data-services-tabs-grid]',
        '[data-guide-grid]',
        '[data-spotlight-grid]',
        '[data-why-grid]',
        '[data-strengths-grid]',
        '[data-bottom-services-grid]',
    ];

    const processedElements = new Set();

    rowSelectors.forEach((sel) => {
        document.querySelectorAll(sel).forEach((row) => {
            const leftEls = Array.from(row.querySelectorAll(
                '[data-scroll="left"], [data-scroll-left], [data-reveal="left"], [data-reveal="from-left"], [data-services-tabs-left], [data-guide-left], [data-spotlight-left], [data-strengths-left], [data-why-card][data-why-col="left"], [data-bottom-services-card][data-bottom-services-col="left"]'
            )).filter(el => !processedElements.has(el));

            const rightEls = Array.from(row.querySelectorAll(
                '[data-scroll="right"], [data-scroll-right], [data-reveal="right"], [data-reveal="from-right"], [data-services-tabs-right], [data-guide-right], [data-spotlight-right], [data-strengths-right], [data-why-card][data-why-col="right"], [data-bottom-services-card][data-bottom-services-col="right"]'
            )).filter(el => !processedElements.has(el));

            const centerEls = Array.from(row.querySelectorAll(
                '[data-scroll="center"], [data-scroll-center], [data-scroll="pop"], [data-scroll-pop], [data-spotlight-center], [data-strengths-center], [data-why-card][data-why-col="center"], [data-bottom-services-card][data-bottom-services-col="center"]'
            )).filter(el => !processedElements.has(el));

            if (leftEls.length === 0 && rightEls.length === 0 && centerEls.length === 0) return;

            [...leftEls, ...rightEls, ...centerEls].forEach(el => processedElements.add(el));

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: row,
                    start: 'top 92%',
                    end: 'top 48%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            });

            if (leftEls.length > 0) {
                tl.fromTo(leftEls,
                    { opacity: 0.15, x: -xDist, scale: 0.95 },
                    { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                    0
                );
            }

            if (rightEls.length > 0) {
                tl.fromTo(rightEls,
                    { opacity: 0.15, x: xDist, scale: 0.95 },
                    { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                    0
                );
            }

            if (centerEls.length > 0) {
                tl.fromTo(centerEls,
                    { opacity: 0.15, y: 50, scale: 0.88 },
                    { opacity: 1, y: 0, scale: 1, ease: 'none', stagger: 0.06 },
                    0
                );
            }
        });
    });

    // Standalone elements outside of rows
    const standaloneLeft = Array.from(document.querySelectorAll(
        '[data-scroll="left"], [data-scroll-left], [data-reveal="left"], [data-reveal="from-left"]'
    )).filter(el => !processedElements.has(el));

    standaloneLeft.forEach((el) => {
        processedElements.add(el);
        gsap.fromTo(el,
            { opacity: 0.15, x: -xDist, scale: 0.96 },
            {
                opacity: 1,
                x: 0,
                scale: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 94%',
                    end: 'top 52%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });

    const standaloneRight = Array.from(document.querySelectorAll(
        '[data-scroll="right"], [data-scroll-right], [data-reveal="right"], [data-reveal="from-right"]'
    )).filter(el => !processedElements.has(el));

    standaloneRight.forEach((el) => {
        processedElements.add(el);
        gsap.fromTo(el,
            { opacity: 0.15, x: xDist, scale: 0.96 },
            {
                opacity: 1,
                x: 0,
                scale: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 94%',
                    end: 'top 52%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });

    const standaloneCenter = Array.from(document.querySelectorAll(
        '[data-scroll="center"], [data-scroll-center], [data-scroll="pop"], [data-scroll-pop]'
    )).filter(el => !processedElements.has(el));

    standaloneCenter.forEach((el) => {
        processedElements.add(el);
        gsap.fromTo(el,
            { opacity: 0.15, y: 50, scale: 0.88 },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 94%',
                    end: 'top 52%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });
}

/**
 * Directional reveals that scrub directly on scroll
 */
export function initDirectionalReveals(xDist) {
    gsap.utils.toArray('[data-reveal]').forEach((el) => {
        const dir = el.dataset.reveal || 'up';
        if (dir === 'left' || dir === 'from-left' || dir === 'right' || dir === 'from-right') {
            // Already handled in universal scroll scrub
            return;
        }

        const from = { opacity: 0.2, x: 0, y: 0 };
        if (dir === 'up') from.y = 45;
        if (dir === 'down') from.y = -45;
        if (dir === 'fade') { from.x = 0; from.y = 0; }

        gsap.fromTo(el,
            {
                opacity: from.opacity,
                x: from.x,
                y: from.y,
            },
            {
                opacity: 1,
                x: 0,
                y: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 94%',
                    end: 'top 55%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });
}

/**
 * Stagger child elements on scroll
 */
export function initStaggerScroll(xDist) {
    gsap.utils.toArray('[data-stagger]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0.15,
                y: 35,
            },
            {
                opacity: 1,
                y: 0,
                ease: 'none',
                stagger: 0.08,
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 92%',
                    end: 'top 50%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });

    gsap.utils.toArray('[data-stagger-left]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0.15,
                x: -xDist,
            },
            {
                opacity: 1,
                x: 0,
                ease: 'none',
                stagger: 0.08,
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 92%',
                    end: 'top 50%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });

    gsap.utils.toArray('[data-stagger-right]').forEach((parent) => {
        gsap.fromTo(parent.children,
            {
                opacity: 0.15,
                x: xDist,
            },
            {
                opacity: 1,
                x: 0,
                ease: 'none',
                stagger: 0.08,
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 92%',
                    end: 'top 50%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                },
            }
        );
    });
}

/**
 * 4-Card Trust Bar
 */
export function initTrustBar(xDist = 200) {
    const trustSection = document.querySelector('[data-trust-section]');
    if (!trustSection) return;

    const leftCards = trustSection.querySelectorAll('[data-trust-side="left"]');
    const rightCards = trustSection.querySelectorAll('[data-trust-side="right"]');
    const allCards = [...leftCards, ...rightCards];
    if (allCards.length === 0) return;

    const grid = trustSection.querySelector('.grid') || trustSection;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: grid,
            start: 'top 94%',
            end: 'top 50%',
            scrub: 1,
            invalidateOnRefresh: true,
        },
    });

    tl.fromTo(leftCards,
        { opacity: 0.15, x: -xDist * 0.8, scale: 0.95 },
        { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.08 },
        0
    );

    tl.fromTo(rightCards,
        { opacity: 0.15, x: xDist * 0.8, scale: 0.95 },
        { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.08 },
        0
    );
}

/**
 * About Heading: Bold scale on scroll-down, then glides into place (Scrub)
 */
export function initAboutHeading() {
    const heading = document.querySelector('[data-about-heading]');
    if (!heading) return;

    const isMobile = window.innerWidth < 768;

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
            ease: 'none',
            scrollTrigger: {
                trigger: heading,
                start: 'top 96%',
                end: 'top 65%',
                scrub: 1.2,
                invalidateOnRefresh: true,
            },
        }
    );
}

/**
 * Services Tabs (#services) Scroll-Driven Motion (Scrub):
 * Left tabs glide in from Left (-xDist -> 0)
 * Right panel glides in from Right (+xDist -> 0)
 * Trigger is set directly on the tabs grid container so it is 100% visible while scrubbing.
 */
export function initServicesTabs(xDist = 250) {
    const section = document.querySelector('[data-services-tabs-section]');
    if (!section) return;

    const header = section.querySelector('[data-services-tabs-header]');
    const grid = section.querySelector('[data-services-tabs-grid]') || section;
    const leftCol = section.querySelector('[data-services-tabs-left]');
    const rightCol = section.querySelector('[data-services-tabs-right]');

    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, y: -30 },
            {
                opacity: 1,
                y: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 95%',
                    end: 'top 65%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        );
    }

    if (grid && (leftCol || rightCol)) {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                end: 'top 48%',
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        if (leftCol) {
            tl.fromTo(leftCol,
                { opacity: 0.15, x: -xDist, scale: 0.95 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }

        if (rightCol) {
            tl.fromTo(rightCol,
                { opacity: 0.15, x: xDist, scale: 0.95 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }
    }
}

/**
 * 4-Step User Guide Scroll-Driven Motion (Scrub):
 * Left info glides from Left (-xDist -> 0)
 * Right 4 steps glide from Right (+xDist -> 0)
 */
export function initGuideSteps(xDist = 240) {
    const section = document.querySelector('[data-guide-section]');
    if (!section) return;

    const grid = section.querySelector('.grid') || section;
    const leftCol = section.querySelector('[data-guide-left]');
    const rightCol = section.querySelector('[data-guide-right]');

    if (!leftCol && !rightCol) return;

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: grid,
            start: 'top 92%',
            end: 'top 48%',
            scrub: 1,
            invalidateOnRefresh: true,
        },
    });

    if (leftCol) {
        tl.fromTo(leftCol,
            { opacity: 0.15, x: -xDist, scale: 0.95 },
            { opacity: 1, x: 0, scale: 1, ease: 'none' },
            0
        );
    }

    if (rightCol) {
        tl.fromTo(rightCol,
            { opacity: 0.15, x: xDist, scale: 0.95 },
            { opacity: 1, x: 0, scale: 1, ease: 'none' },
            0
        );
    }
}

/**
 * Testimonials Section
 */
export function initTestimonials() {
    const section = document.querySelector('[data-testimonials-section]');
    if (!section) return;

    const isMobile = window.innerWidth < 768;
    const header = section.querySelector('[data-testimonials-header]');
    const deckBack = section.querySelector('[data-deck-back]');
    const deckFront = section.querySelector('[data-deck-front]');
    const content = section.querySelector('[data-testimonial-content]');

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 85%',
            toggleActions: 'restart none restart reset',
            invalidateOnRefresh: true,
        },
    });

    if (header) {
        tl.fromTo(header,
            { opacity: 0, y: 35 },
            { opacity: 1, y: 0, duration: 0.7, ease: 'power3.out' }
        );
    }

    if (deckBack && deckFront) {
        tl.fromTo(deckBack,
            { opacity: 0, x: 0, rotate: 0, scale: 0.88 },
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
            { opacity: 0, scale: 0.82, y: 35, rotate: 0 },
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

    if (content) {
        tl.fromTo(content,
            { opacity: 0, x: isMobile ? 40 : 80 },
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

    if (deckFront && deckBack) {
        gsap.to(deckFront, {
            y: -7,
            rotate: 3,
            duration: 3.2,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: 1,
        });

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

/**
 * Regional Transformation Story (Spotlight Section)
 * Left column from left (-xDist -> 0)
 * Right column from right (+xDist -> 0)
 * Center column pops from center
 */
export function initSpotlightSection(xDist = 260) {
    const section = document.querySelector('[data-spotlight-section]');
    if (!section) return;

    const header = section.querySelector('[data-spotlight-header]');
    const grid = section.querySelector('[data-spotlight-grid]') || section;
    const leftCol = section.querySelector('[data-spotlight-left]');
    const centerCol = section.querySelector('[data-spotlight-center]');
    const rightCol = section.querySelector('[data-spotlight-right]');

    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, y: -30 },
            {
                opacity: 1,
                y: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 95%',
                    end: 'top 65%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        );
    }

    if (grid) {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                end: 'top 48%',
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        if (leftCol) {
            tl.fromTo(leftCol,
                { opacity: 0.15, x: -xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }

        if (rightCol) {
            tl.fromTo(rightCol,
                { opacity: 0.15, x: xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }

        if (centerCol) {
            tl.fromTo(centerCol,
                { opacity: 0.15, y: 55, scale: 0.88 },
                { opacity: 1, y: 0, scale: 1, ease: 'none' },
                0
            );
        }
    }
}

/**
 * Why DACFIN Section: Bento Principles & Approach Cards
 */
export function initWhySection(xDist = 240) {
    const section = document.querySelector('[data-why-section]');
    if (!section) return;

    const header = section.querySelector('[data-why-header]');
    const grid = section.querySelector('[data-why-grid]') || section;
    const leftCards = section.querySelectorAll('[data-why-card][data-why-col="left"]');
    const centerCards = section.querySelectorAll('[data-why-card][data-why-col="center"]');
    const rightCards = section.querySelectorAll('[data-why-card][data-why-col="right"]');
    const approachCards = section.querySelectorAll('[data-why-approach-card]');

    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, y: -30 },
            {
                opacity: 1,
                y: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 95%',
                    end: 'top 65%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        );
    }

    if (grid) {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                end: 'top 48%',
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        if (leftCards.length > 0) {
            tl.fromTo(leftCards,
                { opacity: 0.15, x: -xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0
            );
        }

        if (rightCards.length > 0) {
            tl.fromTo(rightCards,
                { opacity: 0.15, x: xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0
            );
        }

        if (centerCards.length > 0) {
            tl.fromTo(centerCards,
                { opacity: 0.15, y: 55, scale: 0.88 },
                { opacity: 1, y: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0
            );
        }

        if (approachCards.length > 0) {
            tl.fromTo(approachCards,
                { opacity: 0.15, y: 40, scale: 0.94 },
                { opacity: 1, y: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0.15
            );
        }
    }
}

/**
 * Core Strengths Section
 */
export function initStrengthsSection(xDist = 240) {
    const section = document.querySelector('[data-strengths-section]');
    if (!section) return;

    const header = section.querySelector('[data-strengths-header]');
    const grid = section.querySelector('[data-strengths-grid]') || section;
    const leftBoxes = section.querySelectorAll('[data-strengths-left]');
    const rightBoxes = section.querySelectorAll('[data-strengths-right]');
    const centerBox = section.querySelector('[data-strengths-center]');

    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, x: -60 },
            {
                opacity: 1,
                x: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 95%',
                    end: 'top 65%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        );
    }

    if (grid) {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                end: 'top 48%',
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        if (leftBoxes.length > 0) {
            tl.fromTo(leftBoxes,
                { opacity: 0.15, x: -xDist, scale: 0.95 },
                { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0
            );
        }

        if (rightBoxes.length > 0) {
            tl.fromTo(rightBoxes,
                { opacity: 0.15, x: xDist, scale: 0.95 },
                { opacity: 1, x: 0, scale: 1, ease: 'none', stagger: 0.06 },
                0
            );
        }

        if (centerBox) {
            tl.fromTo(centerBox,
                { opacity: 0.15, scale: 0.88, y: 50 },
                { opacity: 1, scale: 1, y: 0, ease: 'none' },
                0
            );
        }
    }
}

/**
 * Bottom Services (Core Advisory Pillars)
 */
export function initBottomServices(xDist = 260) {
    const section = document.querySelector('[data-bottom-services-section]');
    if (!section) return;

    const header = section.querySelector('[data-bottom-services-header]');
    const grid = section.querySelector('[data-bottom-services-grid]') || section;
    const leftCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="left"]');
    const centerCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="center"]');
    const rightCard = section.querySelector('[data-bottom-services-card][data-bottom-services-col="right"]');

    if (header) {
        gsap.fromTo(header,
            { opacity: 0.15, y: -30 },
            {
                opacity: 1,
                y: 0,
                ease: 'none',
                scrollTrigger: {
                    trigger: header,
                    start: 'top 95%',
                    end: 'top 65%',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        );
    }

    if (grid) {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                end: 'top 48%',
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        if (leftCard) {
            tl.fromTo(leftCard,
                { opacity: 0.15, x: -xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }

        if (rightCard) {
            tl.fromTo(rightCard,
                { opacity: 0.15, x: xDist, scale: 0.94 },
                { opacity: 1, x: 0, scale: 1, ease: 'none' },
                0
            );
        }

        if (centerCard) {
            tl.fromTo(centerCard,
                { opacity: 0.15, y: 55, scale: 0.88 },
                { opacity: 1, y: 0, scale: 1, ease: 'none' },
                0
            );
        }
    }
}
