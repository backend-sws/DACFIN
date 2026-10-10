import gsap from 'gsap';

export function initTransition() {
    const curtain = document.getElementById('curtain');
    if (!curtain) return;

    // On page load: curtain slides up and out
    gsap.set(curtain, { yPercent: 0 });
    gsap.to(curtain, {
        yPercent: -100,
        duration: 0.7,
        ease: 'power4.inOut',
        delay: 0.05,
    });

    // Page navigation transition for internal links
    document.querySelectorAll('a[href^="/"]:not([target]):not([data-no-transition]), a[href^="' + window.location.origin + '"]:not([target]):not([data-no-transition])').forEach((link) => {
        link.addEventListener('click', (e) => {
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;

            // Don't transition if navigating to same URL hash
            const currentUrl = window.location.pathname + window.location.search;
            if (href === currentUrl) return;

            e.preventDefault();

            gsap.fromTo(curtain, 
                { yPercent: 100 },
                {
                    yPercent: 0,
                    duration: 0.5,
                    ease: 'power4.inOut',
                    onComplete: () => {
                        window.location.href = href;
                    },
                }
            );
        });
    });
}
