import Alpine from 'alpinejs';
import { initLenis } from './lenis';
import { initAnimations } from './animations';
import header from './components/header';
import contactForm from './components/contact-form';

window.Alpine = Alpine;
Alpine.data('header', header);
Alpine.data('contactForm', contactForm);
Alpine.start();

function boot() {
    initLenis();
    initAnimations();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
