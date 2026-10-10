import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initHero() {
    gsap.registerPlugin(ScrollTrigger);

    // Split text words reveal (pure JS span wrapping)
    document.querySelectorAll('[data-split="words"]').forEach((heading) => {
        if (heading.dataset.splitDone) return;
        heading.dataset.splitDone = 'true';

        const nodes = Array.from(heading.childNodes);
        heading.innerHTML = '';

        nodes.forEach((node) => {
            if (node.nodeType === Node.TEXT_NODE) {
                const words = node.textContent.trim().split(/\s+/);
                words.forEach((word) => {
                    if (!word) return;
                    const span = document.createElement('span');
                    span.className = 'inline-block overflow-hidden mr-[0.28em]';
                    const inner = document.createElement('span');
                    inner.className = 'inline-block word-split';
                    inner.textContent = word;
                    span.appendChild(inner);
                    heading.appendChild(span);
                });
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                const span = document.createElement('span');
                span.className = 'inline-block overflow-hidden mr-[0.28em]';
                const inner = document.createElement('span');
                inner.className = 'inline-block word-split';
                inner.innerHTML = node.outerHTML;
                span.appendChild(inner);
                heading.appendChild(span);
            }
        });

        const wordElements = heading.querySelectorAll('.word-split');
        if (wordElements.length > 0) {
            gsap.from(wordElements, {
                yPercent: 100,
                opacity: 0,
                duration: 0.9,
                stagger: 0.04,
                ease: 'power4.out',
                scrollTrigger: {
                    trigger: heading,
                    start: 'top 90%',
                    once: true,
                },
            });
        }
    });

    // Chart Line Drawing animation in Hero
    const chartLines = document.querySelectorAll('.chart-line');
    chartLines.forEach((line) => {
        const length = line.getTotalLength ? line.getTotalLength() : 350;
        gsap.set(line, {
            strokeDasharray: length,
            strokeDashoffset: length,
        });
        gsap.to(line, {
            strokeDashoffset: 0,
            duration: 2.2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: line,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Parallax on mouse move / scroll
    gsap.utils.toArray('[data-parallax]').forEach((el) => {
        const speed = parseFloat(el.dataset.parallax) || 0.1;
        gsap.to(el, {
            y: () => -100 * speed,
            ease: 'none',
            scrollTrigger: {
                trigger: el,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        });
    });
}
