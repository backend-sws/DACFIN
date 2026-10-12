# ARCHITECTURAL & DESIGN DECISIONS (DECISIONS.md)

### 1. Technology Stack
- **Framework:** Laravel 12 on PHP 8.3.
- **Frontend Stack:** Tailwind CSS v4 via `@tailwindcss/vite`, Alpine.js for UI state, Lenis for smooth momentum scrolling, GSAP with ScrollTrigger for scroll-driven animations.
- **Blade Templating:** Clean component architecture where every string originates from `config('fincun.*')`, keeping Blade purely presentational.

### 2. Design System & Aesthetics
- **Theme:** Ice Blue / Cyan / Pure White luxury wealth aesthetic (`#FFFFFF` pure white, `#E0FFFF` light cyan, `#AFEEEE` pale turquoise, `#B0E0E6` powder blue, `#ADD8E6` light blue, paired with `#071922` midnight ocean ink, `#0D2834` deep marine forest, `#0A7F96` ocean turquoise, `#00B4D8` vibrant cerulean cyan).
- **Typography:** Fraunces for display headings and serif numbers; Manrope for body text and navigation.
- **Header:** Sleek full-width edge-to-edge navbar with Frosted Light Ice glass blur (`backdrop-blur-xl`), delicate bottom border, collapsing top bar on scroll, full mega menu for services, and a dedicated mobile slide-over drawer with accordion dropdowns.
- **Components:** Bento grids with 3D tilt effects, magnetic buttons, count-up numeric stats, infinite marquee ticker, and smooth page curtain transition.

### 3. Page Architecture & Routing
- Preserved all original SEO-friendly URLs from `fincun.in`, including the legacy spelling `/services/financial-planing` with a 301 permanent redirect from `/services/financial-planning`.
- **Dynamic Single Templates:** 
  - `pages/services/show.blade.php` serves all 6 service pages dynamically from `config/fincun/services.php`.
  - `pages/audiences/show.blade.php` serves all 7 audience segments from `config/fincun/audiences.php`.
  - `pages/approach/show.blade.php` serves all 3 approach philosophies from `config/fincun/approach.php`.
  - `pages/journal/index.blade.php` and `pages/journal/show.blade.php` serve wealth journal editions.

### 4. Contact Form Architecture
- Built with honeypot security (`website` hidden field), validation via `ContactRequest`, and throttled submissions (`5/minute`).
- Saved in database table `contact_messages`.
- Queued notification via `ContactReceived` Mailable to `bikesh@fincun.in`.
- AJAX Alpine submission with loading indicators, inline field validation, and an interactive confirmation modal with animated checkmark.

### 5. Media & Assets
- Created lightweight, crisp SVG illustrations and wordmark branding in `public/images/` and `public/social/` avoiding external hotlinking.
- Rendered 1200×630 OpenGraph social image `public/images/meta-image.png` and SVG variant for SEO sharing.
