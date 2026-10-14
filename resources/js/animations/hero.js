import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

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
  const isMobile = matchMedia('(max-width: 640px)').matches;

  root.classList.add('is-ready');
  if (reduce) return;                       // final state stays visible, no motion

  /* 3D tilt of the main card (disabled on mobile to prevent overflow) */
  const base = { rotateY: desktop ? -10 : (isMobile ? 0 : -4), rotateX: desktop ? 4 : (isMobile ? 0 : 2), rotateZ: desktop ? -1 : 0 };
  if (!isMobile) {
    gsap.set(card, { ...base, transformPerspective: 1400 });
  } else {
    gsap.set(card, { rotateY: 0, rotateX: 0, rotateZ: 0 });
  }

  /* count-up */
  const target = Number(value.dataset.count);
  const cur = value.dataset.currency || '';
  const locale = value.dataset.locale || 'en-US';
  const finalText = value.textContent;
  const counter = { v: 0 };
  value.textContent = cur + '0';

  /* 1. Intro timeline for LEFT copy (runs on page load) */
  const xDist = desktop ? -80 : -50;
  const introTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

  introTl.fromTo('.hero__badge',
      { x: xDist, autoAlpha: 0 },
      { x: 0, autoAlpha: 1, duration: 0.7, clearProps: 'transform,opacity,visibility' }
    )
    .fromTo(q('.hero__title .line'),
      { x: xDist - 20, autoAlpha: 0 },
      { x: 0, autoAlpha: 1, duration: 0.85, stagger: 0.16, clearProps: 'transform,opacity,visibility' },
      '-=0.35'
    )
    .fromTo('.hero__text',
      { x: xDist, autoAlpha: 0 },
      { x: 0, autoAlpha: 1, duration: 0.75, clearProps: 'transform,opacity,visibility' },
      '-=0.4'
    )
    .fromTo(q('.hero__cta > *'),
      { x: xDist + 10, autoAlpha: 0 },
      { x: 0, autoAlpha: 1, duration: 0.65, stagger: 0.14, clearProps: 'transform,opacity,visibility' },
      '-=0.35'
    )
    .fromTo(q('.hero__features li'),
      { x: xDist + 15, autoAlpha: 0 },
      { x: 0, autoAlpha: 1, duration: 0.6, stagger: 0.12, clearProps: 'transform,opacity,visibility' },
      '-=0.3'
    );

  /* 2. Scroll-driven timeline for the RIGHT visual card (comes in when scrolling, not before) */
  const visual = root.querySelector('.hero__visual');
  const cardXDist = desktop ? 280 : 120;

  if (reduce) {
    if (visual) gsap.set(visual, { x: 0, autoAlpha: 1 });
    value.textContent = finalText;
    return;
  }

  gsap.set(visual, { x: cardXDist, autoAlpha: 0 });

  const cardScrollTl = gsap.timeline({
    scrollTrigger: {
      trigger: root,
      start: 'top top',
      end: desktop ? '+=180' : '+=140',
      scrub: 1,
      invalidateOnRefresh: true,
    }
  });

  cardScrollTl.fromTo(visual,
    { x: cardXDist, autoAlpha: 0 },
    { x: 0, autoAlpha: 1, ease: 'none' },
    0
  );

  cardScrollTl.fromTo(counter,
    { v: 0 },
    {
      v: target,
      ease: 'none',
      onUpdate: () => {
        if (counter.v >= target - 100) {
          value.textContent = finalText;
        } else {
          value.textContent = cur + fmt(counter.v, locale);
        }
      },
    },
    0
  );

  /* Replay intro animation when scrolling from bottom back up to the top */
  ScrollTrigger.create({
    trigger: root,
    start: 'top top',
    end: 'bottom top',
    onLeave: () => {
      introTl.pause(0);
    },
    onEnterBack: () => {
      introTl.restart();
    },
  });

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
