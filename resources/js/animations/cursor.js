import gsap from 'gsap';

export function initCursor() {
    const cursor = document.getElementById('cursor');
    if (!cursor) return;

    // Disable on touch devices or reduced motion
    if ('ontouchstart' in window || navigator.maxTouchPoints > 0 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        cursor.style.display = 'none';
        return;
    }

    let isVisible = false;

    window.addEventListener('mousemove', (e) => {
        if (!isVisible) {
            cursor.classList.add('cursor-visible');
            isVisible = true;
        }
        gsap.to(cursor, {
            x: e.clientX,
            y: e.clientY,
            duration: 0.12,
            ease: 'power2.out',
            overwrite: 'auto',
        });
    });

    document.addEventListener('mouseleave', () => {
        cursor.classList.remove('cursor-visible');
        isVisible = false;
    });

    // Hover state on interactive elements
    const hoverElements = document.querySelectorAll('a, button, [data-tilt], [data-magnetic], input, textarea, select');
    hoverElements.forEach((el) => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('cursor-hover');
        });
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('cursor-hover');
        });
    });
}
