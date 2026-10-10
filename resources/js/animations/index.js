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
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
        document.documentElement.classList.add('no-motion');
        return;
    }

    initTransition();
    initHero();
    initReveal();
    initCounters();
    initMarquee();
    initHorizontal();
    initCursor();
    initMagnetic();
    initTilt();
    initLines();
}
