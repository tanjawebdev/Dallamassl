/**
 * Badge Rotate – Footer overlap detection
 * Adds/removes 'is-hidden' class when the badge overlaps the footer.
 */

export default class BadgeRotate {
    constructor() {
        this.badge = document.querySelector('.badge-rotate');
        this.footer = document.querySelector('footer');

        if (!this.badge || !this.footer) return;

        this.checkOverlap = this.checkOverlap.bind(this);
        window.addEventListener('scroll', this.checkOverlap, { passive: true });
        window.addEventListener('resize', this.checkOverlap, { passive: true });
        this.checkOverlap();
    }

    checkOverlap() {
        const badgeRect = this.badge.getBoundingClientRect();
        const footerRect = this.footer.getBoundingClientRect();

        // Badge overlaps footer when badge bottom is below footer top
        if (badgeRect.bottom > footerRect.top) {
            this.badge.classList.add('is-hidden');
        } else {
            this.badge.classList.remove('is-hidden');
        }
    }
}
