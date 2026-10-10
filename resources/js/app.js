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
