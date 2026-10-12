# FINCUN — Hero Banner (copy of the reference banner design)

Only the **hero banner** is covered here. The layout, spacing, colors, card tilt and floating cards follow the reference image. Text is Fincun's own, and all of it comes from one config file.

> **Instruction for the AI agent (Antigravity):** Create exactly the files below, in the paths shown, then include the section on the home page with `@include('sections.hero')`. Do not change the layout. Do not hardcode text in Blade. Keep everything responsive. When finished, run `npm run build` and confirm there are no errors.

---

## 1. What the banner contains (match this)

**Left side**
1. Small white pill badge with a green dot (top)
2. Big 2-line heading, bold, dark navy. Some words are in a lighter grey-blue ("soft" words)
3. One short paragraph in grey-blue
4. Two actions: a solid navy rounded button, and a ghost link with a round icon
5. Row of 3 small features, each with a line icon and a label

**Right side**
1. A dark-blue **glass card**, tilted in 3D: brand + toggle, "Total Portfolio Value", a big number, 4 round action buttons with labels
2. **2 smaller floating cards** overlapping the right edge of the big card
3. Faint vertical text on the far right edge

**Background**
- A wide photo: a man on a villa balcony at bottom-left, a skyline in the middle, a yacht at bottom-right, with a soft misty blue-grey sky. A left-to-right white wash keeps the text readable.
- If the image is missing, a blue-grey gradient shows instead, so the page never looks broken.

**Animations**
- Load: badge, heading lines (slide up), text, buttons and features come in one by one. The card swings in from the right with a 3D turn, then the floating cards follow.
- The number counts up from 0.
- The floating cards bob up and down gently.
- On desktop, the card and floats react to the mouse (parallax).
- The toggle knob switches by itself every few seconds.
- All motion is turned off when the user has "reduce motion" enabled.

---

## 2. Files to create

```
config/fincun/hero.php                         # all banner text
resources/views/sections/hero.blade.php        # banner markup
resources/views/components/hero-icon.blade.php # inline SVG icons
resources/css/hero.css                         # banner styles
resources/js/animations/hero.js                # banner animations
public/images/hero-bg.jpg                      # background photo (see section 7)
```

Also:
- In `resources/css/app.css` add: `@import './hero.css';`
- In `resources/js/animations/index.js` import `initHero` and call it (replace any older `initHero`).
- In `<head>` add this tiny script so hidden start states only apply when JS works: `<script>document.documentElement.classList.add('js')</script>`
- Fonts: Manrope (weights 500–800) must be loaded in `<head>`.

---

## 3. `config/fincun/hero.php`

```php
<?php

return [
    // Background photo. If the file is missing, the CSS gradient is shown.
    'bg' => 'images/hero-bg.jpg',

    'badge' => 'Goal-Based Advisory',

    // Heading lines. Each segment is [text, isSoft]. Soft = lighter grey-blue.
    'title' => [
        [['Simplifying ', false], ['Wealth,', true]],
        [['Maximizing ', true],  ['Growth', false]],
    ],

    'text' => 'Fincun helps you invest smarter with transparent, goal-based financial strategies designed for long-term success.',

    'primary'   => ['Start Your Journey', '/contact-us'],
    'secondary' => ['Why Fincun?', '/why-fincun'],

    // [icon, label]  icons: chart, clock, shield
    'features' => [
        ['chart',  'Investments'],
        ['clock',  'Real-Time Insights'],
        ['shield', 'Risk Protection'],
    ],

    // Sample card (illustration only).
    'card' => [
        'brand'    => 'FINCUN',
        'label'    => 'Total Portfolio Value',
        'value'    => 12895750,        // used for the count-up
        'display'  => '₹1,28,95,750',  // shown without JS and at the end of the count-up
        'currency' => '₹',
        'locale'   => 'en-IN',         // use '$' + 'en-US' + '$12,895,750' for the exact reference look
        'actions'  => [                // [icon, label]  icons: invest, plan, shield, more
            ['invest', 'Invest'],
            ['plan',   'Plan'],
            ['shield', 'Protect'],
            ['more',   'More'],
        ],
        'illustrative' => 'Illustrative values only, not actual returns.',
    ],

    'floats' => [
        ['avatar' => '↻', 'title' => 'Dividend Reinvestment', 'amount' => '+₹1,200',  'meta' => 'Today'],
        ['avatar' => 'I', 'title' => 'Index Fund',            'amount' => '+₹55,000', 'meta' => 'Wed 18 Jan'],
    ],

    'vertical_text' => 'Financial clarity · Every step',
];
```

---

## 4. `resources/views/sections/hero.blade.php`

```blade
@php $h = config('fincun.hero'); @endphp

<section class="hero" data-hero aria-labelledby="hero-title">
    <div class="hero__bg" style="--hero-bg: url('{{ asset($h['bg']) }}')" aria-hidden="true"></div>
    <div class="hero__wash" aria-hidden="true"></div>

    <div class="hero__inner">
        {{-- LEFT --}}
        <div class="hero__copy">
            <span class="hero__badge"><i class="hero__dot"></i>{{ $h['badge'] }}</span>

            <h1 id="hero-title" class="hero__title">
                @foreach ($h['title'] as $line)
                    <span class="line"><span class="line__in">
                        @foreach ($line as [$text, $soft])<span @class(['soft' => $soft])>{{ $text }}</span>@endforeach
                    </span></span>
                @endforeach
            </h1>

            <p class="hero__text">{{ $h['text'] }}</p>

            <div class="hero__cta">
                <a class="hero__btn" href="{{ url($h['primary'][1]) }}">{{ $h['primary'][0] }}</a>
                <a class="hero__link" href="{{ url($h['secondary'][1]) }}">
                    <span class="hero__circle"><x-hero-icon name="arrow" /></span>
                    {{ $h['secondary'][0] }}
                </a>
            </div>

            <ul class="hero__features">
                @foreach ($h['features'] as [$icon, $label])
                    <li><span class="hero__ficon"><x-hero-icon :name="$icon" /></span><span>{{ $label }}</span></li>
                @endforeach
            </ul>
        </div>

        {{-- RIGHT --}}
        <div class="hero__visual">
            <article class="hcard" data-hcard aria-label="Sample portfolio card">
                <header class="hcard__head">
                    <span class="hcard__brand">
                        <span class="hcard__mark"><x-hero-icon name="mark" /></span>{{ $h['card']['brand'] }}
                    </span>
                    <span class="hcard__toggle" aria-hidden="true"><i></i></span>
                </header>

                <p class="hcard__label">{{ $h['card']['label'] }}</p>
                <p class="hcard__value"
                   data-count="{{ $h['card']['value'] }}"
                   data-currency="{{ $h['card']['currency'] }}"
                   data-locale="{{ $h['card']['locale'] }}">{{ $h['card']['display'] }}</p>

                <ul class="hcard__actions">
                    @foreach ($h['card']['actions'] as [$icon, $label])
                        <li>
                            <span class="hcard__btn"><x-hero-icon :name="$icon" /></span>
                            <small>{{ $label }}</small>
                        </li>
                    @endforeach
                </ul>
            </article>

            @foreach ($h['floats'] as $f)
                <aside class="hfloat hfloat--{{ $loop->iteration }}" data-float aria-hidden="true">
                    <span class="hfloat__av">{{ $f['avatar'] }}</span>
                    <div class="hfloat__body">
                        <strong>{{ $f['title'] }}</strong>
                        <span><b>{{ $f['amount'] }}</b><em>{{ $f['meta'] }}</em></span>
                    </div>
                </aside>
            @endforeach

            <p class="hero__note">{{ $h['card']['illustrative'] }}</p>
        </div>
    </div>

    <span class="hero__vertical" aria-hidden="true">{{ $h['vertical_text'] }}</span>
</section>
```

---

## 5. `resources/views/components/hero-icon.blade.php`

```blade
@props(['name'])

<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor"
     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @switch($name)
        @case('chart')   <path d="M4 20V11M10 20V4M16 20v-6M22 20H2"/> @break
        @case('clock')   <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/> @break
        @case('shield')  <path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3z"/><path d="M9 12l2 2 4-4"/> @break
        @case('invest')  <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M8 15l3-3 2 2 3-4"/> @break
        @case('plan')    <circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r=".9" fill="currentColor"/> @break
        @case('more')    <g fill="currentColor" stroke="none"><circle cx="7.5" cy="7.5" r="1.6"/><circle cx="16.5" cy="7.5" r="1.6"/><circle cx="7.5" cy="16.5" r="1.6"/><circle cx="16.5" cy="16.5" r="1.6"/></g> @break
        @case('arrow')   <path d="M5 12h14M13 6l6 6-6 6"/> @break
        @case('mark')    <path fill="currentColor" stroke="none" d="M6 4h12v3.2H9.4v3.1H16v3.2H9.4V20H6z"/> @break
    @endswitch
</svg>
```

---

## 6. `resources/css/hero.css`

```css
.hero {
  --navy: #14254d;
  --navy-btn: #1f3b7a;
  --ink: #1b2a4e;
  --muted: #3e4c68;
  --soft: #7684a0;
  --card-a: #2d4e9f;
  --card-b: #10234f;

  position: relative;
  isolation: isolate;
  overflow: hidden;
  display: flex;
  align-items: center;
  min-height: clamp(640px, 90vh, 840px);
  font-family: "Manrope", system-ui, sans-serif;
  color: var(--ink);
  background: linear-gradient(180deg, #e9eef5 0%, #d2dcea 55%, #b8c6da 100%);
}

/* ---------- background ---------- */
.hero__bg {
  position: absolute; inset: 0; z-index: -3;
  background: var(--hero-bg) center bottom / cover no-repeat;
}
.hero__wash {
  position: absolute; inset: 0; z-index: -2;
  background:
    linear-gradient(90deg, rgba(236,241,248,.94) 0%, rgba(236,241,248,.72) 36%, rgba(236,241,248,0) 64%),
    linear-gradient(180deg, rgba(236,241,248,.6) 0%, rgba(236,241,248,0) 38%);
}

/* ---------- layout ---------- */
.hero__inner {
  display: grid;
  grid-template-columns: 1.05fr 1fr;
  align-items: center;
  gap: 48px;
  width: min(1240px, 100% - 48px);
  margin-inline: auto;
  padding: 150px 0 90px;          /* top space = top bar + floating header */
}

/* ---------- left ---------- */
.hero__badge {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 7px 14px;
  font-size: 12px; font-weight: 600; letter-spacing: .01em; color: #2e3a59;
  background: rgba(255,255,255,.78);
  border: 1px solid rgba(20,37,77,.08);
  border-radius: 999px;
  box-shadow: 0 4px 14px rgba(20,37,77,.06);
}
.hero__dot {
  width: 8px; height: 8px; border-radius: 50%; background: #22c55e;
  box-shadow: 0 0 0 0 rgba(34,197,94,.5);
  animation: hero-pulse 2.2s infinite;
}
@keyframes hero-pulse {
  70%  { box-shadow: 0 0 0 8px rgba(34,197,94,0); }
  100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
}

.hero__title {
  margin: 22px 0 0;
  font-size: clamp(40px, 5.2vw, 68px);
  font-weight: 800; line-height: 1.08; letter-spacing: -.025em;
  color: var(--ink);
}
.hero__title .line { display: block; overflow: hidden; padding-bottom: .08em; }
.hero__title .line__in { display: block; }
.hero__title .soft { color: var(--soft); }

.hero__text {
  max-width: 440px; margin: 20px 0 0;
  font-size: 18px; line-height: 1.6; color: var(--muted);
}

.hero__cta { display: flex; align-items: center; flex-wrap: wrap; gap: 22px; margin-top: 34px; }
.hero__btn {
  padding: 16px 30px;
  font-size: 15px; font-weight: 700; color: #fff; text-decoration: none;
  background: linear-gradient(180deg, #2a4a96, var(--navy-btn));
  border-radius: 10px;
  box-shadow: 0 12px 26px -8px rgba(31,59,122,.55), inset 0 1px 0 rgba(255,255,255,.18);
  transition: transform .25s ease, box-shadow .25s ease;
}
.hero__btn:hover { transform: translateY(-2px); box-shadow: 0 18px 30px -10px rgba(31,59,122,.6); }
.hero__link {
  display: inline-flex; align-items: center; gap: 12px;
  font-size: 15px; font-weight: 600; color: var(--ink); text-decoration: none;
}
.hero__circle {
  display: grid; place-items: center;
  width: 40px; height: 40px; border-radius: 50%;
  background: #fff; color: var(--navy-btn);
  box-shadow: 0 6px 16px rgba(20,37,77,.14);
  transition: transform .25s ease;
}
.hero__circle svg { width: 17px; height: 17px; }
.hero__link:hover .hero__circle { transform: translateX(4px); }

.hero__features { display: flex; flex-wrap: wrap; gap: 28px; margin: 46px 0 0; padding: 0; list-style: none; }
.hero__features li { display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 600; color: #4a5873; }
.hero__ficon {
  display: grid; place-items: center;
  width: 36px; height: 36px; border-radius: 10px;
  color: var(--navy-btn);
  background: rgba(255,255,255,.7);
  border: 1px solid rgba(20,37,77,.08);
}
.hero__ficon svg { width: 19px; height: 19px; }

/* ---------- right: card ---------- */
.hero__visual { position: relative; padding-right: 70px; }

.hcard {
  position: relative; z-index: 1;
  width: min(430px, 100%); margin-left: auto;
  padding: 22px 24px 24px;
  color: #fff;
  background: linear-gradient(145deg, var(--card-a), var(--card-b));
  border: 1px solid rgba(255,255,255,.2);
  border-radius: 22px;
  box-shadow: 0 44px 80px -24px rgba(8,20,60,.6), inset 0 1px 0 rgba(255,255,255,.28);
  backdrop-filter: blur(14px);
  transform: perspective(1400px) rotateY(-10deg) rotateX(4deg) rotateZ(-1deg); /* JS re-applies the same */
  will-change: transform;
}
.hcard__head { display: flex; align-items: center; justify-content: space-between; }
.hcard__brand { display: inline-flex; align-items: center; gap: 10px; font-size: 17px; font-weight: 700; letter-spacing: .02em; }
.hcard__mark {
  display: grid; place-items: center;
  width: 28px; height: 28px; border-radius: 8px;
  background: rgba(255,255,255,.16);
}
.hcard__mark svg { width: 15px; height: 15px; }
.hcard__toggle {
  display: flex; align-items: center;
  width: 46px; height: 26px; padding: 3px;
  background: rgba(255,255,255,.26); border-radius: 999px;
}
.hcard__toggle i { width: 20px; height: 20px; margin-left: auto; background: #fff; border-radius: 50%; box-shadow: 0 2px 6px rgba(0,0,0,.25); }

.hcard__label { margin: 26px 0 4px; font-size: 12.5px; font-weight: 500; opacity: .75; }
.hcard__value { margin: 0; font-size: clamp(30px, 3.2vw, 40px); font-weight: 800; letter-spacing: -.02em; font-variant-numeric: tabular-nums; }

.hcard__actions { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin: 26px 0 0; padding: 0; list-style: none; }
.hcard__actions li { display: grid; justify-items: center; gap: 8px; }
.hcard__btn {
  display: grid; place-items: center;
  width: 52px; height: 52px; border-radius: 16px;
  color: var(--navy);
  background: rgba(255,255,255,.9);
  box-shadow: 0 8px 18px rgba(5,15,50,.3);
  transition: transform .25s ease;
}
.hcard__btn svg { width: 22px; height: 22px; }
.hcard__actions li:hover .hcard__btn { transform: translateY(-3px); }
.hcard__actions small { font-size: 12px; font-weight: 600; opacity: .85; }

/* ---------- right: floating cards ---------- */
.hfloat {
  position: absolute; z-index: 2;
  display: flex; align-items: center; gap: 12px;
  width: 232px; padding: 13px 16px;
  color: #fff;
  background: linear-gradient(145deg, #2f50a2, #15306d);
  border: 1px solid rgba(255,255,255,.2);
  border-radius: 16px;
  box-shadow: 0 24px 44px -14px rgba(8,20,60,.55), inset 0 1px 0 rgba(255,255,255,.24);
  backdrop-filter: blur(12px);
}
.hfloat--1 { top: 38px;  right: 0; }
.hfloat--2 { top: 128px; right: -14px; }
.hfloat__av {
  display: grid; place-items: center; flex: none;
  width: 34px; height: 34px; border-radius: 50%;
  font-size: 15px; font-weight: 800;
  background: rgba(255,255,255,.18);
}
.hfloat__body { display: grid; gap: 3px; min-width: 0; flex: 1; }
.hfloat__body strong { font-size: 13px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.hfloat__body span { display: flex; justify-content: space-between; gap: 8px; font-size: 11.5px; }
.hfloat__body b { font-weight: 700; color: #8ef0b6; }
.hfloat__body em { font-style: normal; opacity: .7; }

.hero__note { margin: 18px 70px 0 auto; max-width: 430px; font-size: 11px; color: rgba(20,37,77,.55); text-align: right; }

.hero__vertical {
  position: absolute; right: 14px; bottom: 96px;
  writing-mode: vertical-rl;
  font-size: 10px; font-weight: 700; letter-spacing: .32em; text-transform: uppercase;
  color: rgba(20,37,77,.4);
}

/* hidden start states only when JS runs */
.js .hero:not(.is-ready) .hero__copy,
.js .hero:not(.is-ready) .hero__visual { visibility: hidden; }

/* ---------- responsive ---------- */
@media (max-width: 1023px) {
  .hero__inner { grid-template-columns: 1fr; gap: 36px; padding: 130px 0 64px; }
  .hero__wash {
    background: linear-gradient(180deg, rgba(236,241,248,.95) 0%, rgba(236,241,248,.8) 55%, rgba(236,241,248,.35) 100%);
  }
  .hero__visual { padding-right: 0; }
  .hcard { margin-inline: auto; }
  .hfloat { position: relative; inset: auto; width: min(430px, 100%); margin: 12px auto 0; }
  .hero__note { margin-inline: auto; text-align: center; }
}
@media (max-width: 640px) {
  .hero__title { font-size: 38px; }
  .hero__text  { font-size: 16px; }
  .hero__features { gap: 18px; }
  .hero__vertical { display: none; }
}

@media (prefers-reduced-motion: reduce) {
  .hero__dot { animation: none; }
  .hero__btn, .hero__circle, .hcard__btn { transition: none; }
}
```

---

## 7. `resources/js/animations/hero.js`

```js
import gsap from 'gsap';

const fmt = (n, locale) =>
  new Intl.NumberFormat(locale, { maximumFractionDigits: 0 }).format(Math.round(n));

export function initHero() {
  const root = document.querySelector('[data-hero]');
  if (!root) return;

  const q = (s) => root.querySelectorAll(s);
  const card = root.querySelector('[data-hcard]');
  const floats = [...q('[data-float]')];
  const value = root.querySelector('[data-count]');
  const knob = root.querySelector('.hcard__toggle i');

  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const fine = matchMedia('(hover: hover) and (pointer: fine)').matches;
  const desktop = matchMedia('(min-width: 1024px)').matches;

  root.classList.add('is-ready');
  if (reduce) return;                       // final state stays visible, no motion

  /* 3D tilt of the main card (same values as the CSS fallback) */
  const base = { rotateY: desktop ? -10 : -4, rotateX: desktop ? 4 : 2, rotateZ: desktop ? -1 : 0 };
  gsap.set(card, { ...base, transformPerspective: 1400 });

  /* count-up */
  const target = Number(value.dataset.count);
  const cur = value.dataset.currency || '';
  const locale = value.dataset.locale || 'en-US';
  const finalText = value.textContent;
  const counter = { v: 0 };
  value.textContent = cur + '0';

  /* intro timeline */
  const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
  tl.from('.hero__badge', { y: 16, autoAlpha: 0, duration: 0.6 })
    .from(q('.line__in'), { yPercent: 110, duration: 0.9, stagger: 0.12 }, '-=0.3')
    .from('.hero__text', { y: 20, autoAlpha: 0, duration: 0.7 }, '-=0.5')
    .from(q('.hero__cta > *'), { y: 20, autoAlpha: 0, duration: 0.6, stagger: 0.1 }, '-=0.4')
    .from(q('.hero__features li'), { y: 16, autoAlpha: 0, duration: 0.5, stagger: 0.08 }, '-=0.3')
    .from(card, { x: 90, rotateY: base.rotateY - 28, autoAlpha: 0, duration: 1.1 }, 0.3)
    .from(floats, { x: 60, autoAlpha: 0, duration: 0.8, stagger: 0.18 }, 0.9)
    .from(q('.hcard__actions li'), { y: 14, autoAlpha: 0, duration: 0.5, stagger: 0.08 }, 1.0)
    .to(counter, {
      v: target, duration: 2.2, ease: 'power2.out',
      onUpdate: () => { value.textContent = cur + fmt(counter.v, locale); },
      onComplete: () => { value.textContent = finalText; },
    }, 0.8);

  /* floating cards bob (desktop only, they are stacked on mobile) */
  if (desktop) {
    gsap.to(floats, {
      y: '+=10', duration: 2.6, ease: 'sine.inOut',
      repeat: -1, yoyo: true, delay: 1.8, stagger: { each: 0.5 },
    });
  }

  /* toggle switches by itself */
  gsap.to(knob, { x: -20, duration: 0.4, ease: 'power2.inOut', repeat: -1, yoyo: true, repeatDelay: 2.6, delay: 2.4 });

  /* mouse parallax (desktop + mouse only) */
  if (fine && desktop) {
    const ry = gsap.quickTo(card, 'rotateY', { duration: 0.8, ease: 'power3.out' });
    const rx = gsap.quickTo(card, 'rotateX', { duration: 0.8, ease: 'power3.out' });
    const fx = floats.map((f) => gsap.quickTo(f, 'x', { duration: 1, ease: 'power3.out' }));

    root.addEventListener('pointermove', (e) => {
      const r = root.getBoundingClientRect();
      const nx = (e.clientX - r.left) / r.width - 0.5;
      const ny = (e.clientY - r.top) / r.height - 0.5;
      ry(base.rotateY + nx * 8);
      rx(base.rotateX - ny * 8);
      fx.forEach((f, i) => f(-nx * (18 + i * 10)));
    });
    root.addEventListener('pointerleave', () => {
      ry(base.rotateY); rx(base.rotateX); fx.forEach((f) => f(0));
    });
  }
}
```

---

## 8. Background photo (`public/images/hero-bg.jpg`)

The reference banner is an AI-made photo. Generate your own with any image tool and save it as `public/images/hero-bg.jpg`. Do not use the screenshot itself, and do not use someone else's photo without a licence.

**Prompt to generate it:**

> Wide cinematic photograph, 2400×1200. Foreground bottom-left: a modern luxury villa balcony with glass railing and a man in a navy suit standing with his back partly to the camera, looking out over a calm bay. Midground: misty skyline of modern glass skyscrapers across the water. Bottom-right: a white luxury yacht on the water. Soft overcast morning light, cool blue-grey colour grading, gentle haze. Keep the upper-left third of the frame bright, clean and empty so text can sit on it. No text, no logos, no watermarks.

Size guidance: about 2400×1200, JPG under 400 KB (compress it). Keep the person and the villa in the bottom-left and the yacht in the bottom-right so the wash and the card do not cover them.

---

## 9. Wire-up checklist

- [ ] `@include('sections.hero')` is the first section on the home page
- [ ] `@import './hero.css';` is in `app.css`
- [ ] `initHero()` is called from `animations/index.js`
- [ ] The `js` class script and the Manrope font are in `<head>`
- [ ] The header is the floating glass pill, and the hero already leaves 150px of top space for it
- [ ] Desktop (1440): two columns, card tilted, floats overlapping the card's right edge
- [ ] Tablet and mobile: one column, card centered, floats stacked below it, no horizontal scroll
- [ ] Reduced motion: no animation, everything is visible
- [ ] No console errors, and `npm run build` passes
