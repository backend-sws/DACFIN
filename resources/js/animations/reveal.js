import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initReveal() {
    gsap.registerPlugin(ScrollTrigger);

    // Individual Reveal Elements
    gsap.utils.toArray('[data-reveal]').forEach((el) => {
        const dir = el.dataset.reveal || 'up';
        const from = { opacity: 0 };

        if (dir === 'up') from.y = 45;
        if (dir === 'left') from.x = 45;
        if (dir === 'right') from.x = -45;
        if (dir === 'fade') from.y = 0;

        gsap.from(el, {
            ...from,
            duration: 0.9,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 88%',
                once: true,
            },
        });
    });

    // Stagger Children
    gsap.utils.toArray('[data-stagger]').forEach((parent) => {
        gsap.from(parent.children, {
            opacity: 0,
            y: 35,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: parent,
                start: 'top 85%',
                once: true,
            },
        });
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
}
