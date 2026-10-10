export default function header() {
    return {
        isScrolled: false,
        showHeader: true,
        lastScrollY: 0,
        openDropdown: null,
        mobileMenuOpen: false,

        init() {
            this.lastScrollY = window.scrollY;
            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;

                // Threshold for sticky pill styling
                this.isScrolled = currentScrollY > 40;

                // Hide topbar / header on scroll down, show on scroll up
                if (currentScrollY > 120) {
                    if (currentScrollY > this.lastScrollY && !this.mobileMenuOpen) {
                        this.showHeader = false;
                        this.openDropdown = null;
                    } else {
                        this.showHeader = true;
                    }
                } else {
                    this.showHeader = true;
                }

                this.lastScrollY = currentScrollY;

                // Update footer back-to-top ring if element exists
                const ring = document.getElementById('scroll-ring');
                if (ring) {
                    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
                    if (scrollTotal > 0) {
                        const progress = Math.min(1, Math.max(0, currentScrollY / scrollTotal));
                        const dashoffset = 88 - (88 * progress);
                        ring.style.strokeDashoffset = dashoffset;
                    }
                }

                // Update reading progress bar on journal pages if present
                const readingBar = document.getElementById('reading-bar');
                if (readingBar) {
                    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
                    if (scrollTotal > 0) {
                        const progress = Math.min(100, Math.max(0, (currentScrollY / scrollTotal) * 100));
                        readingBar.style.width = `${progress}%`;
                    }
                }
            }, { passive: true });

            // Close on escape
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.openDropdown = null;
                    this.mobileMenuOpen = false;
                }
            });
        }
    };
}
