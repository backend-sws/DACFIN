import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initMarquee() {
    gsap.registerPlugin(ScrollTrigger);

    const marquees = document.querySelectorAll('[data-marquee]');
    marquees.forEach((marquee) => {
        const track = marquee.querySelector('.marquee-inner');
        if (!track) return;

        // Loop animation
        const tween = gsap.to(track, {
            xPercent: -50,
            ease: 'none',
            duration: 25,
            repeat: -1,
        });

        // Speed adjustment on scroll
        ScrollTrigger.create({
            trigger: marquee,
            start: 'top bottom',
            end: 'bottom top',
            onUpdate: (self) => {
                const velocity = Math.abs(self.getVelocity() / 300);
                const timeScale = Math.max(1, Math.min(4, 1 + velocity));
                gsap.to(tween, { timeScale: timeScale, duration: 0.4, overwrite: 'auto' });
            },
        });
    });
}
