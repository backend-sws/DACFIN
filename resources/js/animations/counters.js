import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initCounters() {
    gsap.registerPlugin(ScrollTrigger);

    document.querySelectorAll('[data-count]').forEach((counter) => {
        const target = parseInt(counter.dataset.count, 10);
        if (isNaN(target)) return;
        const pad = counter.dataset.pad === 'true';

        const obj = { val: 0 };

        gsap.to(obj, {
            val: target,
            duration: 2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: counter,
                start: 'top 90%',
                once: true,
            },
            onUpdate: () => {
                const current = Math.floor(obj.val);
                counter.textContent = pad ? String(current).padStart(2, '0') : String(current);
            },
            onComplete: () => {
                counter.textContent = pad ? String(target).padStart(2, '0') : String(target);
            }
        });
    });
}
