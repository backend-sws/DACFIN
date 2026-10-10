import gsap from 'gsap';

export function initCursor() {
    const cursor = document.getElementById('cursor');
    if (!cursor) return;

    // Disable on touch devices or reduced motion
    if ('ontouchstart' in window || navigator.maxTouchPoints > 0 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        cursor.style.display = 'none';
        return;
    }

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        gsap.to(cursor, {
            x: mouseX,
            y: mouseY,
            duration: 0.15,
            ease: 'power2.out',
        });
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
