import gsap from 'gsap';

export function initTilt() {
    if ('ontouchstart' in window || navigator.maxTouchPoints > 0 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    document.querySelectorAll('[data-tilt]').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -6;
            const rotateY = ((x - centerX) / centerX) * 6;

            gsap.to(card, {
                transformPerspective: 1000,
                rotationX: rotateX,
                rotationY: rotateY,
                duration: 0.3,
                ease: 'power1.out',
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotationX: 0,
                rotationY: 0,
                duration: 0.7,
                ease: 'power3.out',
            });
        });
    });
}
