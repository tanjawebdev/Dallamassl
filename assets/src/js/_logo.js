/**
 * Logo Scroll Animation
 * Transitions between full logo and compact logo on scroll
 */

export default class Logo {
    constructor() {
        this.container = document.querySelector('[data-logo-container]');
        this.svg = this.container?.querySelector('#logo-animation');
        this.longLogo = this.svg?.querySelector('#long');
        this.shortLogo = this.svg?.querySelector('#short');
        this.letterD = this.svg?.querySelector('#letter-d');

        if (!this.container || !this.svg || !this.longLogo || !this.shortLogo || !this.letterD) {
            console.warn('Logo elements not found');
            return;
        }

        this.scrollThreshold = 1; // Pixels to scroll before animation
        this.isScrolled = false;

        this.init();
    }

    init() {
        // Set initial state
        this.longLogo.style.opacity = '1';
        this.shortLogo.style.opacity = '0';

        // Bind scroll handler
        this.handleScroll = this.handleScroll.bind(this);
        window.addEventListener('scroll', this.handleScroll);

        // Check initial scroll position
        this.handleScroll();
    }

    handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const shouldBeScrolled = scrollTop > this.scrollThreshold;

        // Only update if state changed
        if (shouldBeScrolled !== this.isScrolled) {
            this.isScrolled = shouldBeScrolled;
            this.updateLogo();
        }
    }

    updateLogo() {
        if (this.isScrolled) {
            // Scrolled state: show short logo, make fixed
            this.container.classList.add('is-scrolled');
            this.longLogo.style.opacity = '0';
            this.shortLogo.style.opacity = '1';
        } else {
            // Initial state: show long logo
            this.container.classList.remove('is-scrolled');
            this.longLogo.style.opacity = '1';
            this.shortLogo.style.opacity = '0';
        }
    }

    destroy() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
