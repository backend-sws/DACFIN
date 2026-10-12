import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initLines() {
    gsap.registerPlugin(ScrollTrigger);

    document.querySelectorAll('[data-draw]').forEach((path) => {
        const length = path.getTotalLength ? path.getTotalLength() : 300;
        gsap.set(path, {
            strokeDasharray: length,
            strokeDashoffset: length,
        });

        gsap.fromTo(path, 
            { strokeDashoffset: length },
            {
                strokeDashoffset: 0,
                duration: 1.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: path,
                    start: 'top 85%',
                    toggleActions: 'restart none restart reset',
                },
            }
        );
    });

    // Refresh ScrollTrigger when images load
    window.addEventListener('load', () => {
        ScrollTrigger.refresh();
    });
}
