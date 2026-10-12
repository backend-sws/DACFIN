import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initCounters() {
    gsap.registerPlugin(ScrollTrigger);

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const statsStrip = document.querySelector('[data-stats-strip]');

    if (statsStrip) {
        if (prefersReducedMotion) {
            gsap.set(statsStrip, { opacity: 1, scale: 1, y: 0 });
            gsap.set(statsStrip.querySelectorAll('[data-stat-item]'), { opacity: 1, scale: 1, y: 0 });
        } else {
            const statItems = statsStrip.querySelectorAll('[data-stat-item]');
            const counters = statsStrip.querySelectorAll('[data-count]');
            const shimmer = statsStrip.querySelector('[data-stats-shimmer]');

            // Dedicated Pop Motion Timeline on Scroll
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: statsStrip,
                    start: 'top 88%',
                    toggleActions: 'restart none restart reset',
                    onLeaveBack: () => {
                        counters.forEach((c) => {
                            const pad = c.dataset.pad === 'true';
                            c.textContent = pad ? '00' : '0';
                        });
                    },
                    onEnterBack: () => {
                        // Re-trigger ensures pop works both scrolling down and scrolling up
                    },
                },
            });

            // 1. Stats Card Container Spring Pop
            tl.fromTo(statsStrip,
                {
                    opacity: 0,
                    scale: 0.84,
                    y: 40,
                },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    duration: 0.7,
                    ease: 'back.out(1.7)',
                }
            );

            // 2. Individual Stat Items Staggered Pop
            tl.fromTo(statItems,
                {
                    opacity: 0,
                    scale: 0.74,
                    y: 20,
                },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    duration: 0.55,
                    stagger: 0.08,
                    ease: 'back.out(2.2)',
                },
                '-=0.52'
            );

            // 3. Top Shimmer Beam Sweep Accent
            if (shimmer) {
                tl.fromTo(shimmer,
                    {
                        xPercent: -100,
                        opacity: 0,
                    },
                    {
                        xPercent: 100,
                        opacity: 0.9,
                        duration: 1.2,
                        ease: 'power2.out',
                    },
                    '-=0.45'
                );
            }

            // 4. Concurrently Roll Numbers from 0 to Target
            counters.forEach((counter) => {
                const target = parseInt(counter.dataset.count, 10);
                if (isNaN(target)) return;
                const pad = counter.dataset.pad === 'true';
                const obj = { val: 0 };

                tl.fromTo(obj,
                    { val: 0 },
                    {
                        val: target,
                        duration: 1.1,
                        ease: 'power2.out',
                        onUpdate: () => {
                            const current = Math.floor(obj.val);
                            counter.textContent = pad ? String(current).padStart(2, '0') : String(current);
                        },
                        onComplete: () => {
                            counter.textContent = pad ? String(target).padStart(2, '0') : String(target);
                        },
                    },
                    '-=0.55'
                );
            });
        }
    }

    // Standalone counters (excluding hero & stats strip)
    document.querySelectorAll('[data-count]').forEach((counter) => {
        if (counter.closest('[data-hero]') || counter.closest('[data-stats-strip]')) return;
        const target = parseInt(counter.dataset.count, 10);
        if (isNaN(target)) return;
        const pad = counter.dataset.pad === 'true';

        const obj = { val: 0 };

        gsap.fromTo(obj, 
            { val: 0 },
            {
                val: target,
                duration: 1.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: counter,
                    start: 'top 90%',
                    toggleActions: 'restart none restart reset',
                },
                onUpdate: () => {
                    const current = Math.floor(obj.val);
                    counter.textContent = pad ? String(current).padStart(2, '0') : String(current);
                },
                onComplete: () => {
                    counter.textContent = pad ? String(target).padStart(2, '0') : String(target);
                }
            }
        );
    });
}

