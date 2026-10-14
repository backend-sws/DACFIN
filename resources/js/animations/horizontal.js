import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initHorizontal() {
    gsap.registerPlugin(ScrollTrigger);

    const containers = document.querySelectorAll('[data-pin-x]');
    containers.forEach((container) => {
        const track = container.querySelector('.horizontal-scroll-track');
        if (!track) return;

        // Only pin and horizontal-scroll on desktop screens (>=1024px)
        const mm = gsap.matchMedia();

        mm.add('(min-width: 1024px)', () => {
            const scrollDistance = track.scrollWidth - container.clientWidth + 80;

            if (scrollDistance > 0) {
                gsap.to(track, {
                    x: () => -scrollDistance,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: container,
                        pin: true,
                        scrub: 1,
                        start: 'top top',
                        end: () => `+=${scrollDistance * 1.2}`,
                        invalidateOnRefresh: true,
                    },
                });
            }
        });
    });
}
