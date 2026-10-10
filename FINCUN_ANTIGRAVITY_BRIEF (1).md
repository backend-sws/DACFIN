# FINCUN WEBSITE — FULL FRONTEND BUILD (AGENT INSTRUCTIONS)

> **To the AI coding agent (Antigravity):** This single file is your complete brief.
> Build the **entire frontend** of the FINCUN website in **Laravel (Blade)** exactly as specified.
> Do **not** ask clarifying questions. Where something is unspecified, make the best professional decision, note it in `DECISIONS.md`, and keep going.
> Work through the phases in order. Do not stop until every item in **Definition of Done** (Part C) is true.

---

# PART A — MISSION & HARD RULES

## A1. Mission

Recreate the business website **https://fincun.in** (Fincun Private Limited — financial planning, wealth management, investment advice) as a new Laravel project with:

1. **Identical content** — same header, header menu, footer, homepage text, page text, phone numbers, addresses, links, legal text (all provided in Part B / the reference sections below).
2. **Completely different design** — do NOT copy the original layout, colors or components. Follow the "Design Direction" section below (dark-green editorial studio look, bento grids, floating glass header).
3. **Rich, professional animations on every page** — implemented with GSAP + ScrollTrigger + Lenis + Alpine, driven by `data-*` attributes (see "Animation System").
4. **Clean, easy-to-understand file structure** — exactly the structure in the "Folder Structure" section. All text content lives in `config/fincun/*.php`, **never hardcoded in Blade**.

Quality bar: the work of a senior front-end engineer with 10 years of experience — polished, consistent, responsive, accessible, fast.

## A2. Scope

**IN scope (build all of it):**
- Every page listed in Part A4 (Page Inventory)
- Header (top bar + floating glass nav + mega menu + mobile overlay menu)
- Footer, CTA band, page hero component, UI components
- All animations, smooth scroll, page transition, custom cursor
- Responsive layouts (360 / 768 / 1024 / 1440)
- Contact page UI + a **minimal** working backend for it (validation, save to DB, mail) as described in "Contact Form Backend"
- SEO tags, sitemap, robots.txt

**OUT of scope (do NOT build):**
- Admin panel, login, user accounts, CMS, payments
- Real mutual fund / NPS / loan application flows (those are external links only)
- Any database content other than `contact_messages`

## A3. Hard rules (never break these)

1. **Stack:** Laravel 11+ (PHP 8.2+), Blade, Tailwind CSS via Vite, Alpine.js, GSAP + ScrollTrigger, Lenis. No Livewire, no Inertia, no Vue/React.
2. **No content in Blade.** Every string comes from `config('fincun.*')`. Blade files only loop and render.
3. **One template per page type.** Services → one `services/show`, who-we-serve → one `audiences/show`, approach → one `approach/show`.
4. **Same URLs as fincun.in** (including the original spelling `/services/financial-planing`).
5. **Design must differ** from fincun.in. Never replicate its layout. Use the tokens in the Design Direction section.
6. **Animations:** only animate `transform` and `opacity`; respect `prefers-reduced-motion`; disable cursor/tilt on touch; content must remain visible if JS fails (use a `.js` class on `<html>` to gate hidden initial states).
7. **Images:** do **not** hotlink or copy fincun.in image files. Create the placeholders described in A5. Every `<img>` has `alt`, `width`, `height`, `loading="lazy"` (except hero).
8. **Accessibility:** semantic landmarks, visible focus rings, color contrast ≥ 4.5:1 for text, keyboard-operable menus/tabs/modal, `aria-*` on menus, tabs and modal.
9. **No console errors, no 404 assets, no horizontal scroll on mobile.**
10. **Code quality:** small focused files, comments only where non-obvious, consistent naming, Blade components for anything used 2+ times.

## A4. Page Inventory (build every one)

| # | Route | Controller@method | View |
|---|---|---|---|
| 1 | `/` | `HomeController` | `pages/home` |
| 2 | `/about-us` | `PageController@about` | `pages/about` |
| 3 | `/our-team` | `PageController@team` | `pages/team` |
| 4 | `/why-fincun` | `PageController@whyFincun` | `pages/why-fincun` |
| 5 | `/why-financial-planning` | `PageController@whyPlanning` | `pages/why-financial-planning` |
| 6–11 | `/services/{financial-planing, investment-advise, wealth-management, loan, insurance, training}` | `ServiceController@show` | `pages/services/show` |
| 12–18 | `/who-we-serve/{individual-families, businesses, nris, professionals, charity-trust, urban-women, special-situations}` | `AudienceController@show` | `pages/audiences/show` |
| 19–21 | `/our-approach/{alignment, customised-solutions, keep-you-informed}` | `ApproachController@show` | `pages/approach/show` |
| 22 | `/wealth-journal` | `JournalController@index` | `pages/journal/index` |
| 23–27 | `/wealth-journal/{newsletter-issue-5-july-2026, …-4-may-2026, …-3-april-2026, …-2-february-2026, …-1-january-2026}` | `JournalController@show` | `pages/journal/show` |
| 28 | `/blogs` | `BlogController` | `pages/blogs` |
| 29 | `/mobile-apps` | `PageController@mobileApps` | `pages/mobile-apps` |
| 30 | `/loan-against-mf` | `PageController@loanAgainstMf` | `pages/loan-against-mf` |
| 31 | `/contact-us` (GET + POST) | `ContactController` | `pages/contact` |

Also: custom `404` page (`errors/404.blade.php`) in the same design, with a link home.

## A5. Images & assets (placeholder strategy)

You cannot rely on fincun.in's images. Generate these yourself so the site looks complete out of the box:

- `public/images/fincun-logo.svg` — a simple wordmark "FINCUN" in Fraunces with a small emerald/saffron mark. Use it in header, footer, favicon. (Keep the config path overridable in `site.php` under `logo`.)
- `public/images/about-section.svg`, `service-section-1..4.svg` — abstract, on-brand SVG illustrations (layered rounded shapes, line charts, coins/growth arcs) using the palette. No stock photos.
- `public/images/team/*.svg` — **initials avatars** (rounded, gradient background, 2 letters) for the 5 team members.
- `public/images/qr-code.svg` — placeholder QR-style graphic with a comment "replace with real QR".
- `public/images/google-play-badge.svg` — simple badge linking to the Play Store URL in `site.php`.
- `public/images/meta-image.png` — create a 1200×630 OG image (can be an SVG-rendered PNG; if you cannot render PNG, reference an SVG and note it in DECISIONS.md).
- `public/social/facebook.svg`, `instagram.svg`, `linkedin.svg` — simple inline-style icons.

Store every image path in config, so the owner can swap real photos later without touching Blade.

## A6. Content gaps — how to fill them

The reference sections below contain full content for: header, footer, homepage, About, Why Fincun, Why Financial Planning, Financial Planning service, Individuals & Families, Alignment, Wealth Journal list, Contact.

For the pages **not** fully captured (5 services, 6 audiences, Customised Solutions, Keep You Informed, Our Team page, Blogs, Mobile apps, Loan against MF, 5 journal issues):

1. **If you have web access:** open the matching `https://fincun.in/...` URL and copy the real text into the correct `config/fincun/*.php` key.
2. **If you do not have web access (or a page fails to load):** write short, professional, **clearly generic** copy that is consistent with the brand voice (transparent, jargon-free, goal-based). Use only facts already in this file (e.g., the service taglines). Mark every invented block with a PHP comment `// PLACEHOLDER: replace with original text from fincun.in/<path>` and list them all in `CONTENT_TODO.md`. **Never invent statistics, returns, awards, client names, testimonials or regulatory claims.**
3. Each of those pages must still render a complete, good-looking page (page hero + at least one content section + CTA band) — never an empty or broken page.
4. Journal issue pages: render a cover-style header (Issue number + date) and a body area. If no issue content is available, show a polite "This issue will be available soon" message with a link back to the journal and the contact CTA. Do not fabricate articles.

---

# PART B — REFERENCE SPECIFICATION

Everything below this line is the **authoritative spec** for design, structure, routes, content, layout, animation and backend. Follow it exactly. Where Part A and Part B overlap, Part A (stricter) wins.

(Sections in Part B are numbered 0–13. Ignore any time estimates, "TODO" suggestions to the human, and the "Content Still To Copy" section — Part A6 replaces them.)

---

## 0. Tech Stack

| Layer | Choice | Why |
|---|---|---|
| Framework | Laravel 11/12 (PHP 8.2+) | Your requirement |
| Views | Blade components | Reusable, clean |
| CSS | Tailwind CSS v3/v4 via Vite | Fast to build, easy to theme |
| JS | Alpine.js (UI state) + GSAP + ScrollTrigger + Lenis | Animations + smooth scroll |
| Icons | Lucide / Heroicons (inline SVG) | Light |
| Fonts | Fraunces (headings), Manrope (body) | Editorial + clean look |
| DB | MySQL (only for contact form messages) | Everything else is static content |

Setup:

```bash
composer create-project laravel/laravel fincun
cd fincun
npm install
npm install -D tailwindcss @tailwindcss/vite   # or tailwind v3 + postcss + autoprefixer
npm install alpinejs gsap lenis
php artisan make:model ContactMessage -m
php artisan storage:link
```

---

## 1. Design Direction (must look different from fincun.in)

The original is a light, white, card-and-section layout. We go **dark-to-light editorial**, with an "advisory studio" feel.

### Color tokens (`resources/css/app.css`)

```css
@theme {
  --color-ink:      #0B1F1A;   /* deep green-black, main dark */
  --color-forest:   #123D33;   /* section dark */
  --color-emerald:  #1F8A70;   /* primary accent */
  --color-mint:     #CFF5E7;   /* soft highlight */
  --color-saffron:  #F2A93B;   /* CTA / highlights */
  --color-cream:    #F7F3EA;   /* page background (light sections) */
  --color-sand:     #E8E0CF;   /* borders / cards */
  --color-slate:    #5B6B66;   /* body text on light */

  --font-display: "Fraunces", serif;
  --font-sans:    "Manrope", sans-serif;
}
```

### Visual rules

- Backgrounds alternate: `cream` → `ink` → `cream` → `forest`. Never plain white everywhere.
- Headings: Fraunces, large (clamp 40–96px), tight line-height, one word per heading in *italic saffron*.
- Layout: **bento grids**, big numbers, thin 1px lines, oversized section counters (`01 / 05`).
- Shapes: large radius (28–40px) cards, pill buttons, subtle grain overlay (SVG noise at 4% opacity).
- Buttons: saffron pill, arrow icon that slides on hover (magnetic effect).
- Header: floating glass pill (centered, `backdrop-blur`), not a full-width bar.
- Mobile: full-screen dark overlay menu with staggered link reveal.

---

## 2. Folder Structure

```
fincun/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── PageController.php          # about, team, why-*, mobile-apps, loan-against-mf
│   │   │   ├── ServiceController.php       # 6 service pages
│   │   │   ├── AudienceController.php      # who-we-serve (7)
│   │   │   ├── ApproachController.php      # our-approach (3)
│   │   │   ├── JournalController.php       # wealth-journal list + issue
│   │   │   ├── BlogController.php          # /blogs
│   │   │   └── ContactController.php       # show + store
│   │   └── Requests/
│   │       └── ContactRequest.php
│   ├── Models/
│   │   └── ContactMessage.php
│   ├── Mail/
│   │   └── ContactReceived.php
│   └── View/Components/                    # (only if you use class-based components)
│
├── config/
│   └── fincun/                             # ALL CONTENT LIVES HERE (no content in Blade)
│       ├── site.php                        # name, phones, email, offices, hours, social, legal
│       ├── navigation.php                  # header menu + footer links
│       ├── home.php                        # homepage sections
│       ├── company.php                     # about, why-fincun, why-financial-planning, team
│       ├── services.php                    # 6 services
│       ├── audiences.php                   # 7 who-we-serve
│       ├── approach.php                    # 3 approach pages
│       └── journal.php                     # newsletter issues
│
├── database/migrations/xxxx_create_contact_messages_table.php
│
├── resources/
│   ├── css/app.css
│   ├── js/
│   │   ├── app.js                          # boot: Alpine + Lenis + animations
│   │   ├── lenis.js                        # smooth scroll
│   │   ├── animations/
│   │   │   ├── index.js                    # runs all, by data-attributes
│   │   │   ├── hero.js                     # split text + parallax
│   │   │   ├── reveal.js                   # [data-reveal] fade/slide
│   │   │   ├── counters.js                 # [data-count]
│   │   │   ├── marquee.js                  # infinite ticker
│   │   │   ├── horizontal.js               # pinned horizontal scroll
│   │   │   ├── cursor.js                   # custom cursor
│   │   │   ├── magnetic.js                 # magnetic buttons
│   │   │   ├── tilt.js                     # 3D card tilt
│   │   │   ├── lines.js                    # SVG line draw
│   │   │   └── transition.js               # page curtain transition
│   │   └── components/
│   │       ├── header.js                   # Alpine: scroll state, mobile menu
│   │       └── contact-form.js             # Alpine: ajax submit + success modal
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── partials/
│       │   ├── head.blade.php              # meta, SEO, fonts, vite
│       │   ├── header.blade.php
│       │   ├── mega-menu.blade.php
│       │   ├── mobile-menu.blade.php
│       │   ├── footer.blade.php
│       │   └── cta-band.blade.php          # "Your Financial Future Starts Today"
│       ├── components/
│       │   ├── ui/
│       │   │   ├── button.blade.php
│       │   │   ├── eyebrow.blade.php       # small label above headings
│       │   │   ├── section-title.blade.php
│       │   │   ├── card.blade.php
│       │   │   ├── counter.blade.php
│       │   │   └── marquee.blade.php
│       │   └── page-hero.blade.php         # inner page hero
│       ├── sections/                       # homepage blocks
│       │   ├── hero.blade.php
│       │   ├── stats.blade.php
│       │   ├── about.blade.php
│       │   ├── services-tabs.blade.php
│       │   ├── strengths.blade.php
│       │   ├── audiences.blade.php
│       │   ├── why.blade.php
│       │   ├── team.blade.php
│       │   ├── journal.blade.php
│       │   └── promise.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── about.blade.php
│           ├── team.blade.php
│           ├── why-fincun.blade.php
│           ├── why-financial-planning.blade.php
│           ├── services/show.blade.php     # ONE template for all 6 services
│           ├── audiences/show.blade.php    # ONE template for all 7
│           ├── approach/show.blade.php     # ONE template for all 3
│           ├── journal/index.blade.php
│           ├── journal/show.blade.php
│           ├── blogs.blade.php
│           ├── contact.blade.php
│           ├── mobile-apps.blade.php
│           └── loan-against-mf.blade.php
│
├── public/images/                          # logo, team/, about-section, service-section-1..4, qr-code, meta-image
├── public/social/                          # facebook.svg, instagram.svg, linkedin.svg
└── routes/web.php
```

Rule: **one template per page type**. Services, audiences and approach pages are generated from `config/fincun/*.php` data, so adding a page = adding an array item.

---

## 3. Routes (`routes/web.php`)

Keep the **same URLs** as the original (SEO + familiarity). Note: the original service slug is spelled `financial-planing`; keep it, or add a 301 from the corrected spelling.

```php
<?php

use App\Http\Controllers\{HomeController, PageController, ServiceController,
    AudienceController, ApproachController, JournalController,
    BlogController, ContactController};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

// Company
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/our-team', [PageController::class, 'team'])->name('team');
Route::get('/why-fincun', [PageController::class, 'whyFincun'])->name('why-fincun');
Route::get('/why-financial-planning', [PageController::class, 'whyPlanning'])->name('why-planning');

// Services
Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->whereIn('slug', ['financial-planing','investment-advise','wealth-management','loan','insurance','training'])
    ->name('services.show');

// Who we serve
Route::get('/who-we-serve/{slug}', [AudienceController::class, 'show'])
    ->whereIn('slug', ['individual-families','businesses','nris','professionals','charity-trust','urban-women','special-situations'])
    ->name('audiences.show');

// Our approach
Route::get('/our-approach/{slug}', [ApproachController::class, 'show'])
    ->whereIn('slug', ['alignment','customised-solutions','keep-you-informed'])
    ->name('approach.show');

// Journal / blogs
Route::get('/wealth-journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/wealth-journal/{slug}', [JournalController::class, 'show'])->name('journal.show');
Route::get('/blogs', BlogController::class)->name('blogs');

// Misc
Route::get('/mobile-apps', [PageController::class, 'mobileApps'])->name('mobile-apps');
Route::get('/loan-against-mf', [PageController::class, 'loanAgainstMf'])->name('loan-mf');

// Contact
Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')->name('contact.store');
```

Generic controller pattern (same for Service/Audience/Approach):

```php
public function show(string $slug)
{
    $item = config("fincun.services.items.$slug") ?? abort(404);
    return view('pages.services.show', ['item' => $item, 'slug' => $slug]);
}
```

---

## 4. Content Data (copy exactly — content must stay the same)

### 4.1 `config/fincun/site.php`

```php
<?php
return [
    'name'     => 'Fincun Private Limited',
    'brand'    => 'FINCUN',
    'tagline'  => 'Financial Planning, Wealth Management and Investment Advice.',
    'meta' => [
        'title'       => 'FINCUN | Financial Planning, Wealth Management & Investment Advice.',
        'description' => 'We help individuals, families and businesses make smarter financial decisions through personalized planning, wealth management and investment advisory.',
        'image'       => '/images/meta-image.webp',
    ],
    'email'    => 'bikesh@fincun.in',
    'phones'   => ['+91 9835349232', '+91 6123563039'],
    'primary_phone_tel' => '+919835349232',
    'hours'    => 'Mon–Sat : 8:00 AM – 8:00 PM',
    'offices'  => [
        ['city' => 'Patna',  'address' => "I/J-2, Chandi Vyapar Bhawan,\nExhibition Road, Patna, 800001"],
        ['city' => 'Ranchi', 'address' => "G-2, Kanhai Complex,\nArgora chowk, Ranchi, 834002"],
    ],
    'map_embed' => 'https://www.google.com/maps?q=Exhibition+Road,+Patna,+800001&output=embed',
    'social' => [
        ['name' => 'Facebook',  'url' => 'https://facebook.com/fincun.in',            'icon' => 'social/facebook.svg'],
        ['name' => 'Instagram', 'url' => 'https://instagram.com/fincun.in',           'icon' => 'social/instagram.svg'],
        ['name' => 'LinkedIn',  'url' => 'https://linkedin.com/company/fincunindia',  'icon' => 'social/linkedin.svg'],
    ],
    'play_store' => 'https://play.google.com/store/apps/details?id=com.fincun.client',
    'cin'      => 'U67190BR2016PTC025796',
    'amfi'     => ['AMFI Registered Mutual Fund Distributor (ARN-149176)', 'AMFI Registered SIF Distributor (ARN-82228)'],
    'disclaimer' => 'Every effort has been made to offer the most current, correct and clearly expressed information possible within this site. Nonetheless, inadvertent errors can occur and applicable laws, rules and regulations may change.The information contained in this site is general and is not intended to serve as advise. No warranty is given in relation to the accuracy or reliability of any information. Users should not act or fail to act on the basis of information contained herein. Users are encouraged to contact Fincun Pvt. Ltd. for advise concerning specific matters before making any decision.',
];
```

### 4.2 `config/fincun/navigation.php`

```php
<?php
return [
    'header' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'Company', 'children' => [
            ['label' => 'About us',                'url' => '/about-us'],
            ['label' => 'Our Team',                'url' => '/our-team'],
            ['label' => 'Why Fincun?',             'url' => '/why-fincun'],
            ['label' => 'Why Financial Planning?', 'url' => '/why-financial-planning'],
        ]],
        ['label' => 'Services', 'children' => [
            ['label' => 'Financial Planning',  'desc' => 'Insurance, Retirement, Tax, Education and Estate Planning.', 'url' => '/services/financial-planing'],
            ['label' => 'Investment Advise',   'desc' => 'Mutual Funds, SIP, Goal based investments.',                 'url' => '/services/investment-advise'],
            ['label' => 'Wealth Management',   'desc' => 'Approach and Portfolio Management Service.',                 'url' => '/services/wealth-management'],
            ['label' => 'Loan',                'desc' => 'Home Loan and Loan Against Property.',                       'url' => '/services/loan'],
            ['label' => 'Insurance',           'desc' => 'Insurance to secure future.',                                'url' => '/services/insurance'],
            ['label' => 'Training',            'desc' => 'Financial training for professionals.',                      'url' => '/services/training'],
        ]],
        ['label' => 'Who We Serve', 'children' => [
            ['label' => 'Individuals & Families', 'url' => '/who-we-serve/individual-families'],
            ['label' => 'Businesses',             'url' => '/who-we-serve/businesses'],
            ['label' => 'NRIs',                   'url' => '/who-we-serve/nris'],
            ['label' => 'Professionals',          'url' => '/who-we-serve/professionals'],
            ['label' => 'Charities & Trusts',     'url' => '/who-we-serve/charity-trust'],
            ['label' => 'Urban Women',            'url' => '/who-we-serve/urban-women'],
            ['label' => 'Special Situations',     'url' => '/who-we-serve/special-situations'],
        ]],
        ['label' => 'Our Approach', 'children' => [
            ['label' => 'Alignment',           'url' => '/our-approach/alignment'],
            ['label' => 'Customised Solutions','url' => '/our-approach/customised-solutions'],
            ['label' => 'Keep You Informed',   'url' => '/our-approach/keep-you-informed'],
        ]],
        ['label' => 'Wealth Journal', 'url' => '/wealth-journal'],
        ['label' => 'Contact',        'url' => '/contact-us'],
    ],
    'header_cta' => ['label' => 'Get Free Consultation', 'url' => '/contact-us'],
    'topbar'     => 'Contact us:',   // email + phone from site.php

    'footer' => [
        'services' => [
            ['Financial Planning', '/services/financial-planing'],
            ['Investment Advise',  '/services/investment-advise'],
            ['Wealth Management',  '/services/wealth-management'],
            ['Insurance',          '/services/insurance'],
            ['Loans',              '/services/loan'],
        ],
        'quick' => [
            ['About us',       '/about-us'],
            ['Blogs',         '/blogs'],
            ['Contact us',    '/contact-us'],
            ['Support',       'mailto:bikesh@fincun.in'],
            ['Wealth Journal','/wealth-journal'],
            ['Mobile apps',   '/mobile-apps'],
        ],
        'bottom_links' => [
            ['Mutual Funds', 'https://app.fincun.in'],
            ['Loans Against MF', '/loan-against-mf'],
            ['National Pension Scheme (NPS) Registration', 'https://cra.kfintech.com/poponline/registration/popsubscriberregistration/'],
            ['National Pension Scheme (NPS) Payments', 'https://cra.kfintech.com/poponline/POPContributeOnline?AuthID=C8783F5763BE413176CAF5F834A7054EB951058E9CD18E8BE4FFB375A6C54408'],
        ],
    ],
];
```

### 4.3 `config/fincun/home.php` (homepage content)

```php
<?php
return [
    'hero_slides' => [
        ['eyebrow' => 'Fincun Private Limited',
         'title'   => 'Simplifying Wealth, Maximizing Growth',
         'text'    => 'Fincun helps you invest smarter with transparent, goal-based financial strategies designed for long-term success.',
         'cta'     => ['Start Your Journey', '/contact-us']],
        ['eyebrow' => 'Real-Time Insights',
         'title'   => 'Your Money, Working Smarter',
         'text'    => 'With real-time insights and adaptive portfolio management, we make sure your wealth keeps pace with the market.',
         'cta'     => ['Optimize My Portfolio', '/contact-us']],
        ['eyebrow' => 'Goal-Based Advisory',
         'title'   => 'Building Futures, One Goal at a Time',
         'text'    => "From retirement to family security, FINCUN's expert advisors craft financial plans that grow with your life.",
         'cta'     => ['Get Free Consultation', '/contact-us']],
    ],

    'stats' => [
        ['value' => 5, 'pad' => true, 'label' => 'Dedicated advisors on your team'],
        ['value' => 6, 'pad' => true, 'label' => 'Core advisory services offered'],
        ['value' => 8, 'pad' => true, 'label' => 'Client segments we specialise in'],
        ['text'  => 'Mon–Sat', 'label' => '8:00 AM – 8:00 PM, always reachable'],
    ],

    'about' => [
        'eyebrow' => 'About Us',
        'title'   => 'Your Trusted Partner in Smart Financial Planning',
        'paragraphs' => [
            "At FINCUN, we believe finance doesn't have to be complicated. Our mission is simple — to make wealth management transparent, smart and stress-free for everyone. We blend personalized advisory with technology-driven insights to help you plan, grow and protect your financial future with confidence.",
            "Whether you're looking to optimize your existing investments or build a brand-new financial roadmap, FINCUN is here to simplify the process, every step of the way.",
        ],
        'mission' => ['Our Mission', 'To empower individuals and institutions with clear, data-backed financial solutions that align with their goals and create long-term value.'],
        'vision'  => ['Our Vision',  'To redefine wealth management by making professional financial planning accessible, transparent and future-ready for all.'],
        'image'   => '/images/about-section.webp',
        'image_alt' => 'Fincun advisory',
        'quote'   => 'Clarity, trust, smarter strategies.',
    ],

    'services' => [
        'eyebrow' => 'Our Services',
        'title'   => 'Smart Solutions to Simplify Your Financial Journey',
        'tabs'    => ['Wealth Assessment, Portfolio Optimization', 'Personalized Wealth Planning', 'Dynamic Portfolio Management', 'Comprehensive Financial Advising'],
        'items' => [
            ['title' => 'Check Your Wealth Health',
             'text'  => 'Think of it as a health check-up for your investments. We review your portfolio, spot risks and highlight growth opportunities so your money is always working smarter.',
             'points'=> ['Easy-to-understand portfolio review','Spot risks before they grow bigger','Compare your returns with market benchmarks','Action plan to boost performance'],
             'image' => '/images/service-section-1.webp', 'alt' => 'Wealth health assessment'],
            ['title' => 'Plan Your Future, Your Way',
             'text'  => 'From buying a dream home to planning for retirement, our strategies are designed around your life goals — clear, flexible and stress-free.',
             'points'=> ['Goal-based financial roadmaps','Retirement and child education planning','Plans for wealth protection and growth','Flexible solutions that adapt with you'],
             'image' => '/images/service-section-2.webp', 'alt' => 'Personalized wealth planning'],
            ['title' => 'Smarter Investing, On Autopilot',
             'text'  => 'Markets move fast and we make sure your portfolio keeps up. With smart, data-driven adjustments, we capture opportunities and protect you from risks.',
             'points'=> ['Automated portfolio rebalancing','Real-time insights and adjustments','Focus on both growth and safety','Continuous monitoring and updates'],
             'image' => '/images/service-section-3.webp', 'alt' => 'Dynamic portfolio management'],
            ['title' => 'Expert Advice, Made Simple',
             'text'  => 'No jargon. No hidden agenda. Just clear, honest advice on mutual funds, NPS, PMS, AIFs and more — so you can make decisions with confidence.',
             'points'=> ['Mutual funds and NPS made easy','PMS and AIF advisory support','Loans against mutual funds','Transparent and unbiased recommendations'],
             'image' => '/images/service-section-4.webp', 'alt' => 'Comprehensive financial advising'],
        ],
    ],

    'strengths' => [
        'eyebrow' => 'Our Core Strengths',
        'title'   => 'A trusted name in financial planning and wealth management',
        'text'    => 'At FINCUN, our strength lies in combining human expertise with smart technology. We focus on understanding your goals, simplifying complex financial decisions and delivering solutions that are transparent, reliable and future-ready.',
        'items'   => [
            ['Client-Centric Approach',      'We listen first, plan second. Every solution begins with understanding your goals.'],
            ['Technology + Expertise',       'From wealth growth to risk protection, we cover all aspects of your financial life.'],
            ['Holistic Financial Solutions', 'From wealth growth to risk protection, we cover all aspects of your financial life.'],
            ['Trusted Relationships',        'We measure success not just in numbers, but in long-term trust and client satisfaction.'],
        ],
    ],

    'audiences' => [
        'eyebrow' => 'Who We Serve',
        'title'   => 'Advisory built for every stage of life',
        'all_link'=> ['See all segments →', '/who-we-serve/individual-families'],
        'items'   => [
            ['Individuals & Families', 'Individual, Families and HNIs.',       '/who-we-serve/individual-families'],
            ['Businesses',             'MSMEs and Large Organisations.',       '/who-we-serve/businesses'],
            ['NRIs',                   'Cross-border wealth, simplified.',     '/who-we-serve/nris'],
            ['Professionals',          'Doctors, Lawyers, CAs etc.',           '/who-we-serve/professionals'],
            ['Charities & Trusts',     'Charity, Trusts, NGOs etc.',           '/who-we-serve/charity-trust'],
            ['Urban Women',            'Working or Business Women.',           '/who-we-serve/urban-women'],
            ['Special Situations',     'New Weds, Single Parents etc.',        '/who-we-serve/special-situations'],
            ['Complimentary Services', 'Additional support, at no extra cost.', '/contact-us'],
        ],
    ],

    'why' => [
        'eyebrow' => 'Why Fincun?',
        'title'   => 'Because Your Financial Journey Deserves Clarity',
        'text'    => "When it comes to your money, trust and clarity matter most. That's why we simplify every step — with FINCUN, it's not just about money, it's about building the future you deserve.",
        'items'   => [
            ['Simplified Finance',      'No jargon, just clear explanations and easy-to-follow advice.'],
            ['Personalized Strategies', 'Every plan is built around your unique goals and lifestyle.'],
            ['Smart Technology',        'Real-time insights and automated tools that keep your portfolio ahead of market shifts.'],
            ['Transparent Advice',      'Honest recommendations with no hidden agendas and bias.'],
            ['End-to-End Support',      "From mutual funds to loans against investments, we're with you at every step."],
        ],
        'approach' => [
            ['01', 'Alignment',           '/our-approach/alignment'],
            ['02', 'Customised Solutions','/our-approach/customised-solutions'],
            ['03', 'Keep You Informed',   '/our-approach/keep-you-informed'],
        ],
    ],

    'team' => [
        'eyebrow' => 'Our Team',
        'title'   => 'Meet Your Trusted Advisors',
        'text'    => 'Behind FINCUN is a team of passionate financial professionals who bring together deep industry experience and a vision to make finance human, approachable and reliable.',
        'members' => [
            ['Bikesh Ojha',       'Founder & Wealth Manager',        '/images/team/bikesh.webp'],
            ['Avinash Pathak',    'Vice President',                  '/images/team/avinash.webp'],
            ['Prem Shankar Dubey','Admin Head',                      '/images/team/prem-shankar.webp'],
            ['Surbhi Sinha',      'Operations Manager',              '/images/team/surbhi.webp'],
            ['Abhishek Nandi',    'Goal Based Financial Planner',    '/images/team/abhishek.webp'],
        ],
    ],

    'journal' => [
        'eyebrow' => 'Wealth Journal',
        'title'   => 'Insights, issue by issue',
        'all_link'=> ['View all issues →', '/wealth-journal'],
        'show'    => 4,   // latest 4 from config/fincun/journal.php
    ],

    'promise' => [
        'eyebrow' => 'Our Promise',
        'title'   => 'Your goals, our commitment',
        'text'    => "At FINCUN, we promise more than financial advice, we promise a partnership built on trust, clarity and care. Every recommendation we make is aligned with your aspirations, backed by expertise and delivered with complete transparency. With us, you'll always know where your money stands and where it's headed.",
        'cta'     => ['Step towards Financial Freedom', '/contact-us'],
    ],

    // Shown on EVERY page above the footer (partials/cta-band.blade.php)
    'cta_band' => [
        'title'  => 'Your Financial Future Starts Today',
        'text'   => "Whether you're planning for retirement, wealth creation, tax savings or financial independence, our advisors are here to help.",
        'button' => ['Schedule Consultation', '/contact-us'],
    ],
];
```

### 4.4 `config/fincun/journal.php`

```php
<?php
return [
    'title' => 'FINCUN Wealth Journal',
    'intro' => 'An Investor Education Initiative by FINCUN.',
    'issues' => [
        'newsletter-issue-5-july-2026'     => ['no' => '05', 'date' => 'July 2026'],
        'newsletter-issue-4-may-2026'      => ['no' => '04', 'date' => 'May 2026'],
        'newsletter-issue-3-april-2026'    => ['no' => '03', 'date' => 'April 2026'],
        'newsletter-issue-2-february-2026' => ['no' => '02', 'date' => 'February 2026'],
        'newsletter-issue-1-january-2026'  => ['no' => '01', 'date' => 'January 2026'],
    ],
    // The issue body content was NOT captured. Open each issue URL on fincun.in and
    // paste text/PDF link into 'body' (or 'pdf') for each slug.
];
```

### 4.5 `config/fincun/company.php` (inner pages)

```php
<?php
return [
    'about' => [
        'eyebrow' => 'About FINCUN',
        'title'   => 'Building Financial Confidence For Every Stage Of Life',
        'text'    => 'We help individuals, families and businesses make smarter financial decisions through personalized planning, wealth management and investment advisory.',
        'image'   => '/images/about-section.webp',
        'story' => [
            'eyebrow' => 'Our Story',
            'title'   => 'Making Finance Simpler, Smarter and More Human',
            'paragraphs' => [
                'FINCUN was founded on a simple belief: financial planning should be transparent, accessible and focused on people rather than products.',
                'By combining personalized advisory with technology-driven insights, we help clients grow, protect and manage wealth with confidence.',
            ],
        ],
        'mission' => ['Our Mission', 'To empower individuals and institutions with clear, data-backed financial solutions that align with their goals and create long-term value.'],
        'vision'  => ['Our Vision',  'To redefine wealth management by making professional financial planning accessible, transparent and future-ready for all.'],
    ],

    'why_fincun' => [
        'title' => 'Why Choose FINCUN?',
        'text'  => 'Trust, transparency and disciplined financial planning designed around your life goals.',
        'quote' => ['Trust is the glue of life. It\'s the foundational principle that holds all relationships.', 'Stephen Covey'],
    ],

    'why_planning' => [
        'eyebrow' => 'Financial Planning',
        'title'   => 'A Plan For Your Money. A Roadmap For Your Life.',
        'text'    => 'Financial planning connects your resources with your goals, helping every financial decision move you closer to the future you want.',
        'steps' => [
            ['01', 'Where Are You Today?',     'Understand your current financial position.'],
            ['02', 'Where Do You Want To Be?', 'Define life goals and financial milestones.'],
            ['03', 'How Will You Get There?',  'Create the right asset allocation and investment strategy.'],
        ],
    ],

    // Team page: reuse config('fincun.home.team'). The full /our-team page was not captured —
    // if it has bios, copy them from https://fincun.in/our-team into a 'bio' key per member.
];
```

### 4.6 `config/fincun/services.php`

Only **Financial Planning** was captured in full. For the other 5, open the URL on fincun.in and fill the same array shape.

```php
<?php
return [
    'items' => [
        'financial-planing' => [
            'name'    => 'Financial Planning',
            'title'   => 'Financial Planning | FINCUN',
            'eyebrow' => 'Financial Planning',
            'heading' => 'Build Wealth With Confidence',
            'intro'   => "Financial planning is not just about investing. It's about creating a roadmap that helps you grow wealth, reduce risk, achieve life goals and secure your future.",
            'ctas'    => [['Schedule Consultation', '/contact-us'], ['Explore Services', '#services']],

            'timeline' => [
                'title' => 'Financial Planning is About Your Entire Life',
                'items' => [
                    ['PAST',    'Learn From Yesterday', 'Identify financial mistakes, debt burdens and inefficient investments that may be holding you back.'],
                    ['PRESENT', 'Take Action Today',    'Create practical strategies to improve savings, investments and financial discipline.'],
                    ['FUTURE',  'Build Tomorrow',       'Turn long-term goals into achievable milestones through structured financial planning.'],
                ],
            ],

            'pillars' => [
                'title' => 'The Six Pillars of Financial Security',
                'items' => [
                    ['Mutual Fund Advisory', 'Goal-based investing through professionally managed mutual funds.'],
                    ['Tax Planning',         'Reduce tax liability while maximizing long-term wealth creation.'],
                    ['Asset Allocation',     'Build a balanced portfolio across equity, debt, gold and cash.'],
                    ['Retirement Planning',  'Create a sustainable retirement income strategy.'],
                    ['Real Estate Planning', 'Evaluate property investments based on goals and risk appetite.'],
                    ['Emergency Planning',   'Prepare for unexpected events with adequate financial protection.'],
                ],
            ],

            'process' => [
                'title' => 'Our Planning Process',
                'steps' => ['Discovery', 'Risk Analysis', 'Strategy Design', 'Implementation', 'Ongoing Review'],
            ],

            'why' => [
                'title' => 'Why Professional Financial Planning Matters',
                'text'  => 'Most people invest without a strategy. Financial planning ensures every decision contributes to your long-term goals.',
                'chips' => ['Goal-Based Wealth Creation', 'Tax Efficient Investing', 'Retirement Readiness', 'Better Risk Management'],
            ],
        ],

        // TODO (copy text from fincun.in/services/<slug>) — same keys as above:
        'investment-advise' => ['name' => 'Investment Advise',  'tagline' => 'Mutual Funds, SIP, Goal based investments.'],
        'wealth-management' => ['name' => 'Wealth Management',  'tagline' => 'Approach and Portfolio Management Service.'],
        'loan'              => ['name' => 'Loan',               'tagline' => 'Home Loan and Loan Against Property.'],
        'insurance'         => ['name' => 'Insurance',          'tagline' => 'Insurance to secure future.'],
        'training'          => ['name' => 'Training',           'tagline' => 'Financial training for professionals.'],
    ],
];
```

> The `show` template must tolerate missing keys (`@isset($item['pillars'])`) so unfinished services still render a basic hero + CTA band instead of crashing.

### 4.7 `config/fincun/audiences.php`

Captured in full: **Individuals & Families**. Others: copy from `https://fincun.in/who-we-serve/<slug>`.

```php
<?php
return [
    'items' => [
        'individual-families' => [
            'name'    => 'Individual and Families',
            'heading' => 'At the heart of our business lie our relationships with the individuals and families who trust us with their wealth. We take that trust very seriously.',
            'body'    => [
                'We are fortunate to work closely with friendly, caring, and intelligent clients whom we truly enjoy spending time with. Our clients are doctors, engineers, trustees, academicians, institutions, retirees, lawyers, corporate houses, entrepreneurs, defense personnel, NRIs and people from almost all walks of life. Our clients desire a relationship with a financial adviser that can help them manage their financial lives so that they may devote more of their time to personal pursuits. The only way to truly understand each other and to build a successful and trusting partnership is to talk. We have to get to know you',
                'We realize how important your wealth is to you. You want somebody who will take the time to understand what exactly you are looking for.',
                "You certainly don’t want somebody who tries to sell you their products. You need somebody who will work in partnership with you, advising and selecting the best options for you; someone who acts like your partner, not like a salesman.",
                'We are here to guide you through the maze of finance and help you reach your goals.',
            ],
        ],
        'businesses'         => ['name' => 'Businesses',         'tagline' => 'MSMEs and Large Organisations.'],
        'nris'               => ['name' => 'NRIs',               'tagline' => 'Cross-border wealth, simplified.'],
        'professionals'      => ['name' => 'Professionals',      'tagline' => 'Doctors, Lawyers, CAs etc.'],
        'charity-trust'      => ['name' => 'Charities & Trusts', 'tagline' => 'Charity, Trusts, NGOs etc.'],
        'urban-women'        => ['name' => 'Urban Women',        'tagline' => 'Working or Business Women.'],
        'special-situations' => ['name' => 'Special Situations', 'tagline' => 'New Weds, Single Parents etc.'],
    ],
];
```

### 4.8 `config/fincun/approach.php`

Captured in full: **Alignment**. Others: copy from fincun.in.

```php
<?php
return [
    'items' => [
        'alignment' => [
            'name'    => 'Alignment',
            'heading' => 'We are dedicated to supporting our clients needs and long-term aspirations.',
            'body'    => [
                "It is our mission to work closely with clients, helping them define and articulate what they want to accomplish with their wealth. Ongoing collaboration and communication are essential in managing clients’ assets, and a high level of trust is critical in this type of relationship. Our clients share highly personal information and beliefs about matters that may impact future generations. We have always believed that we must earn this trust through all of our actions.The structure of Fincun is properly aligned with our clients’ interests, and we always work to avoid any possible conflicts of interest.",
                "At Fincun, we have built a firm wide culture that places the client at the center of everything we do. We believe in long-term relationships with our clients and when we meet with a client and the client's family or other trusted advisors, this focus on relationships is essential in executing on a long-term plan with multiple variables.",
            ],
        ],
        'customised-solutions' => ['name' => 'Customised Solutions'],
        'keep-you-informed'    => ['name' => 'Keep You Informed'],
    ],
];
```

### 4.9 Contact page content (`pages/contact.blade.php`)

- Eyebrow: **Contact Us**
- H1: **Let's talk about where your money's headed**
- Intro: Reach out for a free consultation. Our advisors typically respond within one business day.
- Form heading: **Send us a message**
- Fields: Full Name · Phone Number · Email Address · I'm interested in (select: Financial Planning, Investment Advise, Wealth Management, Insurance, Loan, Training) · Message · button **Send Message**
- Side block **Reach Us Directly**: both offices, both phones (`tel:` links), email, hours (Mon–Sat / 8:00 AM – 8:00 PM), Google Map iframe from `site.map_embed`
- Success modal: **Message sent** — "Thanks for reaching out. One of our advisors will get back to you within one business day." + Close button

---

## 5. Layout & Partials

### `layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>@include('partials.head')</head>
<body class="bg-cream text-slate font-sans antialiased" x-data="header()" data-page="@yield('page', 'default')">
    <div id="curtain" class="fixed inset-0 z-[100] bg-ink pointer-events-none translate-y-full"></div>
    <div id="cursor" class="hidden lg:block"></div>

    @include('partials.header')
    <main id="main">@yield('content')</main>
    @unless (View::hasSection('no_cta')) @include('partials.cta-band') @endunless
    @include('partials.footer')
</body>
</html>
```

### Header (`partials/header.blade.php`)

1. **Top bar** (thin, ink background): `Contact us:` + email + phone (from `site.php`). Hides on scroll.
2. **Floating glass pill** header: logo (left) · mega-menu items (center) · saffron `Get Free Consultation` button (right).
3. Dropdowns: **Services** opens a wide mega panel with the 6 services + descriptions; other groups are simple dropdowns.
4. Mobile: hamburger → full-screen dark overlay, links stagger in (GSAP), accordion groups, phone + CTA at the bottom.
5. Build the loop from `config('fincun.navigation.header')` — never hardcode links.

### Footer (`partials/footer.blade.php`)

Dark `ink` background, giant faded **FINCUN** wordmark behind (outlined text, parallax), then:

1. Logo + tagline + QR code + Google Play badge
2. Columns: **Services** · **Quick Links** · **Get in Touch** (Patna, Ranchi, phones, email, hours)
3. Social icons (Facebook, Instagram, LinkedIn)
4. Bottom link row (Mutual Funds, Loans Against MF, NPS Registration, NPS Payments)
5. Disclaimer text → `© 2026 Fincun Private Limited. All rights reserved.` → `CIN: …` → AMFI ARN lines
6. "Back to top" circular button with scroll-progress ring

Use `{{ date('Y') }}` for the year.

### CTA band (`partials/cta-band.blade.php`)

Used on all pages: "Your Financial Future Starts Today" + text + `Schedule Consultation` button. Big saffron-on-forest panel with moving gradient blob.

---

## 6. Home Page — Section Design + Animation Plan

| # | Section | New layout idea | Animation |
|---|---|---|---|
| 1 | **Hero** (3 slides content) | Full-viewport dark `ink`, huge Fraunces headline left, floating glass "portfolio card" right with animated line chart. 3 slides auto-rotate (6s) with progress bars | Split-text line reveal per word; slide cross-fade; chart line draws itself (`stroke-dashoffset`); cards float with parallax on mouse move |
| 2 | **Stats** | Slim strip overlapping hero bottom: 05 / 06 / 08 / Mon–Sat | Count-up from 0 when visible; numbers in Fraunces |
| 3 | **About** | Two-column: image in an arched mask + rotating circular text badge "Clarity · Trust · Smarter Strategies"; Mission/Vision as two flip cards | Image clip-path reveal; parallax scale; card flip on hover |
| 4 | **Services** (4 tabs) | Left: vertical tab list (4 labels). Right: content panel with image, title, checklist | Tab switch = crossfade + image slides; checklist items stagger in; active tab gets sliding indicator |
| 5 | **Core Strengths** | **Bento grid** 4 tiles of different sizes, intro text in the large tile | Tiles rise in with stagger; 3D tilt on hover; icon draws itself |
| 6 | **Who We Serve** | **Pinned horizontal scroll** of 8 tall cards (01–08) | Vertical scroll drives horizontal movement; card scales when centered; "See all segments →" link |
| 7 | **Why Fincun** | Dark forest section: 5 principles as a sticky list on the left, big text on the right; below, the 3 approach steps (/01 /02 /03) as links | Active principle highlights as you scroll; numbers outline→fill; underline sweeps |
| 8 | **Marquee** | Between sections: scrolling words "Mutual Funds · NPS · PMS · AIF · SIP · Loan Against MF · Insurance" | Infinite marquee, speeds up with scroll velocity |
| 9 | **Team** | 5 photo cards, grayscale → color on hover, name slides up | Cards fan out on enter; hover lifts and tilts; cursor changes to "View" |
| 10 | **Wealth Journal** | 4 issue cards styled like magazine covers (Issue 05 · July 2026) | Stagger rise; cover tilts; arrow slides on hover |
| 11 | **Promise** | Full-width centered statement, big type, saffron CTA | Words highlight one-by-one as you scroll (scrub); CTA magnetic |

---

## 7. Inner Pages — Layout + Animation Plan

All inner pages use `<x-page-hero>`: dark hero, eyebrow + split-text H1, breadcrumb, animated gradient mesh behind. Then content, then CTA band.

| Page | Content layout | Special animation |
|---|---|---|
| **About us** | Hero → image + Story → Mission/Vision cards → CTA | Parallax image, text-scrub paragraph highlight |
| **Our Team** | Grid of team cards | Stagger + hover color reveal |
| **Why Fincun?** | Hero with Stephen Covey quote as a giant typographic block | Quote types in word-by-word; floating quote marks |
| **Why Financial Planning?** | 3 big steps (01/02/03) vertical timeline | SVG line draws down the page connecting steps; step dots pulse |
| **Financial Planning** | Hero → Past/Present/Future → 6 pillars → 5-step process → "Why matters" chips | Past/Present/Future as 3 horizontal panels that expand; pillars bento w/ tilt; process = horizontal progress line that fills; chips float |
| **Other 5 services** | Same template (`services/show`) | Same system |
| **Who We Serve (7)** | Big quote-style heading + body paragraphs + sidebar of the other 6 segments | Heading word-reveal; sidebar links slide |
| **Our Approach (3)** | Heading + body, with prev/next approach navigation at bottom | Text-scrub highlight; prev/next arrows |
| **Wealth Journal** | Grid of issue "covers" | Stagger + tilt |
| **Journal issue** | Article/PDF view + back link | Reading-progress bar at top |
| **Contact** | Split: form left, offices + map right | Floating labels, field focus glow, success modal with checkmark drawing animation |

---

## 8. Animation System (`resources/js/animations/`)

Everything is driven by **data attributes**, so Blade stays clean:

| Attribute | Effect |
|---|---|
| `data-reveal="up|left|right|fade"` | Fade + translate on scroll-in |
| `data-stagger` (on parent) | Children reveal one after another |
| `data-split="words|lines|chars"` | Split text reveal (use `SplitType` or manual spans) |
| `data-count="120"` | Count-up number |
| `data-parallax="0.2"` | Parallax speed |
| `data-magnetic` | Magnetic hover button |
| `data-tilt` | 3D tilt card |
| `data-scrub` | Words highlight as scrolling |
| `data-marquee` | Infinite ticker |
| `data-draw` | SVG path draws on scroll |
| `data-pin-x` | Pinned horizontal scroll container |

### `app.js`

```js
import Alpine from 'alpinejs';
import { initLenis } from './lenis';
import { initAnimations } from './animations';
import header from './components/header';
import contactForm from './components/contact-form';

window.Alpine = Alpine;
Alpine.data('header', header);
Alpine.data('contactForm', contactForm);
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initLenis();
    initAnimations();
});
```

### `animations/index.js` (skeleton)

```js
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initReveal } from './reveal';
import { initHero } from './hero';
import { initCounters } from './counters';
import { initMarquee } from './marquee';
import { initHorizontal } from './horizontal';
import { initCursor } from './cursor';
import { initMagnetic } from './magnetic';
import { initTilt } from './tilt';
import { initLines } from './lines';
import { initTransition } from './transition';

gsap.registerPlugin(ScrollTrigger);

export function initAnimations() {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) { document.documentElement.classList.add('no-motion'); return; }

    initReveal(); initHero(); initCounters(); initMarquee();
    initHorizontal(); initCursor(); initMagnetic(); initTilt();
    initLines(); initTransition();
}
```

### `reveal.js` (example)

```js
import gsap from 'gsap';

export function initReveal() {
    gsap.utils.toArray('[data-reveal]').forEach((el) => {
        const dir = el.dataset.reveal;
        const from = { opacity: 0 };
        if (dir === 'up') from.y = 50;
        if (dir === 'left') from.x = -60;
        if (dir === 'right') from.x = 60;

        gsap.from(el, { ...from, duration: 1, ease: 'power3.out',
            scrollTrigger: { trigger: el, start: 'top 85%', once: true } });
    });

    gsap.utils.toArray('[data-stagger]').forEach((parent) => {
        gsap.from(parent.children, { opacity: 0, y: 40, duration: .8, stagger: .12, ease: 'power3.out',
            scrollTrigger: { trigger: parent, start: 'top 80%', once: true } });
    });
}
```

### `lenis.js`

```js
import Lenis from 'lenis';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initLenis() {
    const lenis = new Lenis({ lerp: 0.09, smoothWheel: true });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((t) => lenis.raf(t * 1000));
    gsap.ticker.lagSmoothing(0);
    window.lenis = lenis;
}
```

### `transition.js` (page curtain)

```js
import gsap from 'gsap';

export function initTransition() {
    const curtain = document.getElementById('curtain');
    // on load: curtain slides up and out
    gsap.set(curtain, { yPercent: 0, y: 0 });
    gsap.to(curtain, { yPercent: -100, duration: .8, ease: 'power4.inOut', delay: .1 });

    document.querySelectorAll('a[href^="/"]:not([target]):not([data-no-transition])').forEach((a) => {
        a.addEventListener('click', (e) => {
            if (e.metaKey || e.ctrlKey) return;
            e.preventDefault();
            gsap.fromTo(curtain, { yPercent: 100 }, { yPercent: 0, duration: .6, ease: 'power4.inOut',
                onComplete: () => (window.location = a.href) });
        });
    });
}
```

### Performance & accessibility rules

- Respect `prefers-reduced-motion` (already handled in `index.js`; also add a CSS fallback so content is visible without JS).
- Animate only `transform` and `opacity`.
- Disable cursor/tilt on touch devices.
- Call `ScrollTrigger.refresh()` after images load.
- Lazy-load below-the-fold images (`loading="lazy"`), serve `.webp`.

---

## 9. Contact Form Backend

**Migration**

```php
Schema::create('contact_messages', function (Blueprint $t) {
    $t->id();
    $t->string('name');
    $t->string('phone', 20);
    $t->string('email');
    $t->string('interest')->nullable();
    $t->text('message')->nullable();
    $t->string('ip', 45)->nullable();
    $t->timestamps();
});
```

**`ContactRequest`**

```php
public function rules(): array
{
    return [
        'name'     => ['required','string','max:120'],
        'phone'    => ['required','regex:/^[0-9+\-\s]{8,15}$/'],
        'email'    => ['required','email','max:150'],
        'interest' => ['nullable','in:Financial Planning,Investment Advise,Wealth Management,Insurance,Loan,Training'],
        'message'  => ['nullable','string','max:2000'],
        'website'  => ['prohibited'],   // honeypot — hidden field, bots fill it
    ];
}
```

**`ContactController@store`**

```php
public function store(ContactRequest $request)
{
    $msg = ContactMessage::create($request->safe()->except('website') + ['ip' => $request->ip()]);
    Mail::to(config('fincun.site.email'))->queue(new ContactReceived($msg));

    return $request->wantsJson()
        ? response()->json(['ok' => true])
        : back()->with('sent', true);
}
```

Front end (`contact-form.js`): Alpine `fetch` POST with CSRF header, show the success modal on `ok`, show field errors inline. Set `MAIL_*` in `.env`.

---

## 10. SEO & Meta

- Each page sets `@section('title', '…')` → format `"{Page} | FINCUN"` (the original uses this pattern).
- Default description from `site.meta.description`; add `og:*` and `twitter:*` tags in `partials/head.blade.php`.
- Canonical URL: `{{ url()->current() }}`.
- Add `sitemap.xml` (spatie/laravel-sitemap) and `robots.txt`.
- Add JSON-LD `FinancialService` / `LocalBusiness` schema with both offices.

---

## 11. Build Order (fast path)

| Step | Task | Time |
|---|---|---|
| 1 | Install Laravel, Vite, Tailwind, GSAP, Lenis, Alpine | 20 min |
| 2 | Create `config/fincun/*.php` (paste content from §4) | 30 min |
| 3 | Copy images from fincun.in into `public/images` (logo, team, about, services, qr, meta) | 15 min |
| 4 | Design tokens + fonts in `app.css`, base layout, `head`, header, footer, CTA band | 3 h |
| 5 | UI components: button, eyebrow, section-title, card, marquee, page-hero | 1.5 h |
| 6 | Routes + controllers (one generic `show` per group) | 45 min |
| 7 | Home sections 1–11 | 5 h |
| 8 | Animation modules (§8) wired to `data-*` attributes | 3 h |
| 9 | Inner pages: about, team, why-fincun, why-planning, services/show, audiences/show, approach/show | 4 h |
| 10 | Journal pages + blogs + mobile-apps + loan-against-mf | 1.5 h |
| 11 | Contact page + form backend + mail | 1.5 h |
| 12 | Fill the TODO content (5 services, 6 audiences, 2 approach, journal issues) from fincun.in | 1.5 h |
| 13 | Responsive pass (360 / 768 / 1024 / 1440), reduced-motion check | 2 h |
| 14 | SEO, sitemap, Lighthouse (target 90+), deploy | 1.5 h |

---

## 12. Content Still To Copy (not captured in this guide)

These pages exist on fincun.in but their body text was not extracted. Copy the text exactly into the matching config file:

- Services: `investment-advise`, `wealth-management`, `loan`, `insurance`, `training`
- Who we serve: `businesses`, `nris`, `professionals`, `charity-trust`, `urban-women`, `special-situations`
- Our approach: `customised-solutions`, `keep-you-informed`
- `/our-team` (full page), `/blogs`, `/mobile-apps`, `/loan-against-mf`
- Wealth Journal issue pages (5 issues)

Everything else — header, mega menu, footer, homepage, About, Why Fincun, Why Financial Planning, Financial Planning, Individuals & Families, Alignment, Wealth Journal list, Contact — is already in §4.

---

## 13. Quality Checklist

- [ ] Header/menu/footer text matches the original exactly (same links, phones, addresses, ARN, CIN)
- [ ] No content hardcoded in Blade — only in `config/fincun/*`
- [ ] Every page ends with the CTA band + footer
- [ ] Every page has unique `<title>` and meta description
- [ ] Animations off under `prefers-reduced-motion`
- [ ] Mobile menu, contact form, and success modal tested
- [ ] Images are `.webp` with `alt` text and `loading="lazy"`
- [ ] `php artisan route:cache config:cache view:cache` on production
- [ ] Don't reuse the original's logo/images without permission if you are not the owner; use your own licensed assets


---

# PART C — EXECUTION PLAN, COMPONENT SPECS & DEFINITION OF DONE

## C1. Execution phases (do them in this order; commit after each phase)

**Phase 1 — Project setup**
1. `composer create-project laravel/laravel fincun` (skip if the project already exists).
2. Install: `npm i -D tailwindcss @tailwindcss/vite` and `npm i alpinejs gsap lenis`. Configure Vite + Tailwind; add Google Fonts (Fraunces + Manrope) in `partials/head.blade.php`.
3. Create the full folder tree from "2. Folder Structure" (empty files are fine at this step).
4. Create `.env.example` entries for `MAIL_*`. Use SQLite or MySQL; run the `contact_messages` migration.

**Phase 2 — Content layer**
5. Create every `config/fincun/*.php` file using the arrays in Part B §4 (copy exactly). Fill the gaps per A6.
6. Create all placeholder images per A5.

**Phase 3 — Foundation**
7. `resources/css/app.css`: tokens (`@theme`), base styles, grain overlay, focus rings, `.no-motion` and `html:not(.js)` fallbacks, utility classes (`.container-x`, `.section-y`, `.h-display`).
8. `layouts/app.blade.php`, `partials/head`, `header`, `mega-menu`, `mobile-menu`, `footer`, `cta-band`.
9. UI components in `components/ui/*` and `components/page-hero.blade.php` (specs in C2).
10. `routes/web.php` + all controllers (generic `show` for the three grouped page types; 404 on unknown slug).

**Phase 4 — Homepage**
11. Build the 11 homepage sections (Part B §6) as `sections/*.blade.php`, composed in `pages/home.blade.php`.

**Phase 5 — Animation system**
12. Implement all modules in `resources/js/animations/*` and `lenis.js`, `app.js`, Alpine components (`header.js`, `contact-form.js`). Wire everything via `data-*` attributes (Part B §8). Add the data attributes to Blade as you build sections.

**Phase 6 — Inner pages**
13. Build every page in A4 using `<x-page-hero>` + page-specific sections (Part B §7). Make sure templates tolerate missing config keys (`@isset`, `?? null`).

**Phase 7 — Contact**
14. Contact page UI, Alpine form (floating labels, inline errors, loading state, success modal with animated checkmark), `ContactRequest`, controller, mail, throttle, honeypot.

**Phase 8 — Polish & QA**
15. Responsive pass at 360 / 768 / 1024 / 1440. Reduced-motion pass. Keyboard-only pass. Lighthouse (target ≥ 90 for Performance, Accessibility, Best Practices, SEO).
16. SEO: per-page `<title>` ("{Page} | FINCUN"), meta description, OG/Twitter tags, canonical, JSON-LD (`FinancialService`, both offices), `sitemap.xml`, `robots.txt`.
17. Write `README.md` (setup, run, build, where content lives, how to add a page), `DECISIONS.md`, `CONTENT_TODO.md`.

## C2. Component specifications

### Layout & navigation

| Component | Requirements |
|---|---|
| **Top bar** | Thin `ink` strip: "Contact us:" + email (mailto) + primary phone (tel). Slides away on scroll-down, returns on scroll-up. Hidden below 640px (phone/email move into mobile menu). |
| **Header** | Floating glass pill (`backdrop-blur`, 1px border, rounded-full) centered at top, sticky. Logo left, nav center, saffron CTA right. Shrinks slightly and gains shadow after 40px scroll. |
| **Nav items** | Rendered from `fincun.navigation.header`. Items with `children` open on hover (desktop) / click (keyboard): **Services** shows a wide 2-column mega panel (label + description per service); others show a compact dropdown. Active page link highlighted. Close on `Esc` and outside click. `aria-expanded`, `aria-haspopup`. |
| **Mobile menu** | Hamburger morphs to X. Full-screen `ink` overlay, big Fraunces links stagger in via GSAP, accordion for groups, phone + email + CTA pinned at bottom. Locks body scroll. Focus trapped while open. |
| **Footer** | Per Part B §5: logo + tagline + QR + Play badge; Services / Quick Links / Get in Touch columns; social icons; bottom link row; disclaimer; ©; CIN; AMFI lines; giant outlined "FINCUN" wordmark with parallax; back-to-top button with scroll-progress ring. All data from config. Year via `date('Y')`. |
| **CTA band** | Appears on every page above the footer (unless `no_cta` section is set). Saffron-on-forest panel, moving gradient blob, magnetic button. |
| **Page hero** | Props: `eyebrow`, `title`, `text` (optional), `breadcrumbs`. Dark `ink`, animated gradient mesh, split-text H1 reveal, breadcrumb trail. |

### UI primitives (`components/ui/`)

- `button` — props: `href`, `variant` (primary saffron | ghost | dark), `arrow` (bool). Pill shape, arrow slides on hover, has `data-magnetic`.
- `eyebrow` — small uppercase label with a short line before it.
- `section-title` — eyebrow + H2 with `data-split="words"`; supports `light` (for dark backgrounds) and `italic` word highlight in saffron.
- `card` — rounded 28–40px, 1px sand border, optional `data-tilt`.
- `counter` — `data-count` number, supports zero-padding (05, 06, 08).
- `marquee` — infinite scrolling list of words separated by a dot; speed reacts to scroll velocity.

## C3. Per-page build spec (quick reference)

For each page: use `<x-page-hero>`, then the listed sections, then the CTA band.

| Page | Sections (in order) | Data source |
|---|---|---|
| Home | hero (3-slide) → stats → about → services tabs → strengths bento → audiences (pinned horizontal) → marquee → why → team → journal → promise | `fincun.home` |
| About | hero → story (image + 2 paragraphs) → mission/vision cards | `fincun.company.about` |
| Our Team | hero → team grid (5 cards, hover reveal) | `fincun.home.team` (+ optional bio) |
| Why Fincun | hero (large typographic Stephen Covey quote) → why principles (reuse homepage why block) | `fincun.company.why_fincun`, `fincun.home.why` |
| Why Financial Planning | hero → 3-step vertical timeline with SVG line drawing | `fincun.company.why_planning` |
| Service (×6) | hero → timeline (Past/Present/Future) → six pillars bento → 5-step process line → "why matters" chips; sections render only if their key exists; otherwise a short intro + related-services links | `fincun.services.items.{slug}` |
| Audience (×7) | hero (big quote-style heading) → body paragraphs + sticky sidebar listing the other segments | `fincun.audiences.items.{slug}` |
| Approach (×3) | hero → body paragraphs with scrub-highlight → prev/next approach nav | `fincun.approach.items.{slug}` |
| Journal index | hero (title + intro) → grid of magazine-cover issue cards | `fincun.journal` |
| Journal issue | cover header (issue no. + date) → body or "available soon" → back link + reading-progress bar | `fincun.journal.issues.{slug}` |
| Blogs | hero → empty-state or card grid (placeholder copy per A6) | — |
| Mobile apps | hero → Play Store badge + QR block + short app description (placeholder per A6) | `fincun.site` |
| Loan against MF | hero → short explainer + "Apply / Talk to us" CTA linking to contact (placeholder per A6) | — |
| Contact | hero → split: form (left) + offices/phones/email/hours + map iframe (right) → success modal | `fincun.site`, spec in Part B §4.9 |
| 404 | big "404" with animation + link home | — |

## C4. Animation acceptance details

- **Page load:** curtain slides away (≈0.8s); hero text splits and reveals; header fades down.
- **Page navigation:** internal links trigger curtain-in then navigate. Skip for `target=_blank`, `mailto:`, `tel:`, anchors, modifier-key clicks, `data-no-transition`.
- **Smooth scroll:** Lenis on, synced with ScrollTrigger; anchor links use `lenis.scrollTo`.
- **Every page** must have at least: hero reveal, scroll reveals on sections, one "special" effect from the table in Part B §7.
- Hero chart on the homepage: inline SVG line that draws itself and loops subtly; floating glass cards react to mouse parallax (desktop only).
- Horizontal pinned section (Who We Serve) must degrade to a normal vertical grid below 1024px and under reduced-motion.
- `ScrollTrigger.refresh()` after fonts and images load; kill/recreate triggers on resize via `ScrollTrigger.matchMedia`/`gsap.matchMedia`.
- No layout shift: reserve space for pinned/animated elements.

## C5. Contact form behaviour

- Fields exactly as Part B §4.9; labels float; inline error text under each field; submit button shows spinner and disables during request.
- On success: open modal ("Message sent" + the exact thank-you text), animate a checkmark drawing, reset the form. On failure: show a friendly error banner; never lose entered data.
- Honeypot field `website` hidden off-screen (`tabindex=-1`, `autocomplete=off`).
- Server: validation via `ContactRequest`, store in `contact_messages`, queue mail to `site.email` (use the `log` mailer by default so it works without SMTP), throttle `5/min`.

## C6. Commands the agent must run & pass

```bash
npm run build                    # must succeed with no errors
php artisan migrate              # must succeed
php artisan route:list           # every route in A4 present
php artisan config:cache && php artisan config:clear
php artisan serve                # smoke-test every route returns 200 (404 for unknown slugs)
```

Write a small feature test (`tests/Feature/PagesTest.php`) that loops all A4 URLs and asserts HTTP 200, plus a contact-form test (valid → 302/200 + DB row; honeypot filled → 422).

## C7. Definition of Done (all must be true)

**Content**
- [ ] Header menu, top bar, footer, disclaimer, CIN, ARNs, phones, addresses match Part B §4 exactly
- [ ] Homepage text matches `config/fincun/home.php` exactly (all 11 sections present)
- [ ] All 31 routes in A4 respond 200; unknown slugs 404 with the custom page
- [ ] No text hardcoded in Blade; all strings come from `config/fincun/*`
- [ ] Invented placeholder copy is marked `// PLACEHOLDER` and listed in `CONTENT_TODO.md`; no fabricated stats/awards/testimonials

**Design**
- [ ] Looks clearly different from fincun.in (dark-green editorial, bento, floating glass header, Fraunces + Manrope, saffron accents)
- [ ] Tokens used consistently (no random hex codes in Blade)
- [ ] Responsive and clean at 360 / 768 / 1024 / 1440; no horizontal scroll

**Animation**
- [ ] Every page has hero reveal + scroll reveals + at least one special effect
- [ ] Lenis smooth scroll, page curtain transition, custom cursor (desktop), magnetic buttons, tilt cards, count-ups, marquee, SVG line draw, pinned horizontal section all working
- [ ] `prefers-reduced-motion` disables motion and content stays visible
- [ ] Content visible with JS disabled

**Code quality**
- [ ] Folder structure matches Part B §2 exactly; one template per page type
- [ ] `npm run build` and tests pass; no console errors; no missing assets
- [ ] `README.md`, `DECISIONS.md`, `CONTENT_TODO.md` written

**Performance & SEO**
- [ ] Lighthouse ≥ 90 (Performance, Accessibility, Best Practices, SEO) on Home and one inner page
- [ ] Unique `<title>` + meta description per page, OG/Twitter tags, canonical, JSON-LD, sitemap, robots

## C8. Final report (print this when finished)

When every box in C7 is checked, output a short report:
1. How to run the project (3–5 commands)
2. The list of pages built (count)
3. Anything marked PLACEHOLDER that the owner must replace
4. Any decision you made that deviated from this brief (and why)
