/**
 * FadeIn — IntersectionObserver utility
 *
 * Watches all elements with class `.fade-in` and adds `.is-visible`
 * once they enter the viewport. Supports optional stagger delays via
 * the `data-delay` attribute (value in milliseconds).
 *
 * Usage in HTML:
 *   <div class="fade-in">Fades in</div>
 *   <div class="fade-in" data-delay="200">Fades in after 200ms</div>
 */
export default class FadeIn {
    constructor() {
        // Don't run if user prefers reduced motion
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        this.elements = document.querySelectorAll('.fade-in');
        if (!this.elements.length) return;

        this.observer = new IntersectionObserver(
            this.onIntersect.bind(this),
            {
                threshold: 0.15,   // trigger when 12% of element is visible
                rootMargin: '0px 0px -80px 0px', // slight bottom offset
            }
        );

        this.elements.forEach((el) => this.observer.observe(el));
    }

    onIntersect(entries) {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const el = entry.target;
            const delay = parseInt(el.dataset.delay, 10) || 0;

            setTimeout(() => {
                el.classList.add('is-visible');
            }, delay);

            // Unobserve after triggering — animate only once
            this.observer.unobserve(el);
        });
    }
}
