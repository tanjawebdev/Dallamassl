/**
 * Sticky D Component
 * Makes the D logo stick at 75px from top when scrolling
 */

class StickyD {
	constructor() {
		this.logos = document.querySelectorAll('.sticky-d-logo');

		if (this.logos.length === 0) {
			return;
		}

		this.init();
	}

	init() {
		this.logos.forEach((logo) => {
			// Store the original position
			const rect = logo.getBoundingClientRect();
			const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			const originalTop = rect.top + scrollTop;
			const fixedThreshold = 75; // px from top of viewport

			let isFixed = false;

			const handleScroll = () => {
				const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

				// Calculate if logo would be at 75px from top
				const distanceFromTop = originalTop - currentScroll;

				if (distanceFromTop <= fixedThreshold && !isFixed) {
					// Switch to fixed
					logo.classList.add('is-fixed');
					isFixed = true;
				} else if (distanceFromTop > fixedThreshold && isFixed) {
					// Switch back to absolute
					logo.classList.remove('is-fixed');
					isFixed = false;
				}
			};

			// Bind scroll event
			window.addEventListener('scroll', handleScroll);

			// Check initial state
			handleScroll();
		});
	}
}

export default StickyD;
