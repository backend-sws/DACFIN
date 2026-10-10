import gsap from 'gsap';

export function initTransition() {
    const curtain = document.getElementById('curtain');
    if (!curtain) return;

    // Reset and keep hidden on load and bfcache back-navigation
    curtain.classList.add('hidden');
    gsap.set(curtain, { yPercent: 100 });

    window.addEventListener('pageshow', () => {
        curtain.classList.add('hidden');
        gsap.set(curtain, { yPercent: 100 });
    });

    // Page navigation transition for internal links only
    document.querySelectorAll('a[href^="/"]:not([target]):not([data-no-transition]), a[href^="' + window.location.origin + '"]:not([target]):not([data-no-transition])').forEach((link) => {
        link.addEventListener('click', (e) => {
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:')) return;

            // Don't transition if navigating to same URL
            const currentUrl = window.location.pathname + window.location.search;
            if (href === currentUrl) return;

            e.preventDefault();

            curtain.classList.remove('hidden');
            gsap.fromTo(curtain, 
                { yPercent: 100 },
                {
                    yPercent: 0,
                    duration: 0.45,
                    ease: 'power3.inOut',
                    onComplete: () => {
                        window.location.href = href;
                    },
                }
            );
        });
    });
}
