# FINCUN Website — Laravel & Tailwind CSS

A modern, high-performance financial advisory website built for **FINCUN Private Limited** (Financial Planning, Wealth Management and Investment Advice).

Designed with a dark-green editorial studio aesthetic, bento grids, interactive charts, floating glass header, Lenis smooth scrolling, and GSAP scroll animations.

---

## Quick Start

### 1. Requirements
- PHP 8.2 or 8.3 with extensions (`pdo_sqlite` or `pdo_mysql`, `gd`, `mbstring`)
- Composer 2+
- Node.js 18+ and npm

### 2. Installation
```bash
# Clone or navigate to project directory
cd d:/finance

# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install

# Run database migrations
php artisan migrate

# Build frontend production bundle
npm run build
```

### 3. Running Locally
Run the Laravel development server:
```bash
php artisan serve
```
The site will be available at `http://127.0.0.1:8000`.

To run Vite with Hot Module Replacement (HMR) for frontend development:
```bash
npm run dev
```

### 4. Running Tests
Run the comprehensive PHPUnit test suite:
```bash
php artisan test
```

---

## Content Architecture

**No content is hardcoded in Blade views.** All text content, numbers, office details, and navigation links live in configuration files under `config/fincun/`:

| Config File | Contents |
|---|---|
| `config/fincun/site.php` | Company name, phones, emails, offices, hours, CIN, ARNs, disclaimer |
| `config/fincun/navigation.php` | Mega menu, header links, footer columns, external portals |
| `config/fincun/home.php` | Homepage hero slides, stats, services tabs, strengths, promise |
| `config/fincun/company.php` | About us story, why fincun, why planning, advisor bios |
| `config/fincun/services.php` | All 6 services (timeline, pillars, processes, why matters) |
| `config/fincun/audiences.php` | All 7 client segments (Individual, Businesses, NRIs, etc.) |
| `config/fincun/approach.php` | 3 advisory approach pillars (Alignment, Customised, Informed) |
| `config/fincun/journal.php` | Wealth Journal newsletter editions |

### Adding a New Service, Segment, or Approach
Because the views use dynamic generic templates (`pages/services/show`, `pages/audiences/show`, `pages/approach/show`):
1. Simply add a new slug and array to `config/fincun/services.php` (or `audiences.php`, `approach.php`).
2. Add the slug to `routes/web.php` in the `whereIn` constraint.
3. The page will immediately render with the full design system.

---

## Route Overview (31 Routes)

- **Homepage:** `/`
- **Company:** `/about-us`, `/our-team`, `/why-fincun`, `/why-financial-planning`
- **Services (6):** `/services/{financial-planing, investment-advise, wealth-management, loan, insurance, training}`
- **Who We Serve (7):** `/who-we-serve/{individual-families, businesses, nris, professionals, charity-trust, urban-women, special-situations}`
- **Our Approach (3):** `/our-approach/{alignment, customised-solutions, keep-you-informed}`
- **Wealth Journal (6):** `/wealth-journal`, `/wealth-journal/{newsletter-issue-1..5}`
- **Misc:** `/blogs`, `/mobile-apps`, `/loan-against-mf`
- **Contact:** `/contact-us` (GET + POST)
- **Sitemap:** `/sitemap.xml`
- **Robots:** `/robots.txt`

---

## Animation & Frontend System

Driven by declarative `data-*` attributes with full `prefers-reduced-motion` fallbacks:
- `data-reveal="up|left|right|fade"`: Scroll-triggered element reveals
- `data-stagger`: Staggered sequential child reveals
- `data-split="words"`: Character/word split typography animation
- `data-count="120"`: Numeric count-up animations for statistics
- `data-tilt`: 3D interactive card perspective tilting on desktop
- `data-magnetic`: Magnetic button tracking on mouse hover
- `data-marquee`: Infinite horizontal ticker with scroll-velocity acceleration
- `data-pin-x`: Pinned horizontal scrolling for desktop
- `#curtain`: Page load curtain transition
- `#cursor`: Custom interactive cursor follower for desktop

---

## Code Style & Standards

Run Laravel Pint to format code:
```bash
vendor/bin/pint --format agent
```
