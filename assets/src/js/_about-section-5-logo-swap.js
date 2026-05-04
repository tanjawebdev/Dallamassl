/**
 * About Section 5 Logo Swap Animation
 * Swaps fixed "D." with section logo during scroll through component
 */

export default class AboutSection5LogoSwap {
    constructor() {
        this.section = document.querySelector('.about-section-5');
        this.sectionLogo = document.querySelector('.about-section-5__logo');
        this.fixedDContainer = document.querySelector('[data-logo-container]');
        this.logoWrapper = document.querySelector('.about-section-5__logo-wrapper');
        this.logoGrid = document.querySelector('.about-section-5__grid');

        if (!this.section || !this.sectionLogo || !this.fixedDContainer) {
            return;
        }

        this.isActive = false;
        this.init();
    }

    init() {
        this.handleScroll = this.handleScroll.bind(this);
        window.addEventListener('scroll', this.handleScroll, { passive: true });
        this.handleScroll(); // Check initial state
    }

    handleScroll() {
        const sectionRect = this.section.getBoundingClientRect();
        // Get the position of the fixed "D."
        const fixedDRect = this.fixedDContainer.getBoundingClientRect();

        // EXIT: Section has ended when its bottom edge passes the "D." position
        const sectionEnded = sectionRect.bottom <= fixedDRect.bottom;

        // START: Section is active when its top edge passes the "D." position
        const sectionStarted = sectionRect.top <= fixedDRect.top - 140;

        // Activate when section has scrolled into range and hasn't ended yet
        var shouldActivate = sectionStarted && !sectionEnded;

        var stickBottom = sectionEnded && sectionStarted;

        if (stickBottom) {
            this.sectionLogo.classList.add('is-stick-bottom');
        } else {
            this.sectionLogo.classList.remove('is-stick-bottom');
        }


        if (shouldActivate !== this.isActive) {
            this.isActive = shouldActivate;
            this.toggleSwap();
        }


    }

    toggleSwap() {
        if (this.isActive) {
            // ENTRANCE: Hide fixed "D." and make section logo fixed
            this.fixedDContainer.style.opacity = '0';
            this.fixedDContainer.style.pointerEvents = 'none';
            this.sectionLogo.classList.add('is-fixed');
        } else {
            // EXIT: Show fixed "D." and unfix section logo
            this.fixedDContainer.style.opacity = '1';
            this.fixedDContainer.style.pointerEvents = 'auto';
            this.sectionLogo.classList.remove('is-fixed');
        }
    }

    destroy() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
