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
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

export function initAnimations() {
    initHero();
    initTransition();
    initHorizontal();
    initReveal();
    initCounters();
    initMarquee();
    initCursor();
    initMagnetic();
    initTilt();
    initLines();

    ScrollTrigger.sort();
    ScrollTrigger.refresh();
    setTimeout(() => {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
    }, 150);
    setTimeout(() => {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
    }, 500);
    setTimeout(() => {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
    }, 1200);

    window.addEventListener('load', () => {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
    });
}
