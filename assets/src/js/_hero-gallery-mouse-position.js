/**
 * Hero Gallery Mouse Position
 * Desktop: Images change based on mouse position (X/Y grid)
 * Mobile:  Images cycle automatically every 300ms
 */

import { isMobile, onBreakpointChange } from './_device';

class HeroGalleryMousePosition {
	constructor() {
		this.galleries = document.querySelectorAll('[data-hero-gallery-mouse]');

		if (this.galleries.length === 0) {
			return;
		}

		// Track interval IDs so we can clean them up on resize
		this.mobileIntervals = new Map();

		this.init();

		// Re-initialize when breakpoint changes (e.g. rotating device)
		onBreakpointChange(() => this.init());
	}

	init() {
		// Clean up any running mobile intervals before re-initializing
		this.mobileIntervals.forEach((intervalId) => clearInterval(intervalId));
		this.mobileIntervals.clear();

		this.galleries.forEach((gallery) => {
			const items = gallery.querySelectorAll('[data-gallery-item]');

			if (items.length <= 1) return;

			if (isMobile()) {
				this.galleryMobileAnimation(gallery, items);
			} else {
				this.galleryDesktopAnimation(gallery, items);
			}
		});
	}

	/**
	 * Mobile: cycle through images automatically every 600ms
	 * Each image gets z-index: 2 in turn, others fall back
	 */
	galleryMobileAnimation(gallery, items) {
		let currentIndex = 0;

		// Activate first image
		items[currentIndex].classList.add('is-active');
		gallery.classList.add('is-loaded');

		const intervalId = setInterval(() => {
			// Deactivate current
			items[currentIndex].classList.remove('is-active');

			// Move to next (loop back to 0)
			currentIndex = (currentIndex + 1) % items.length;

			// Activate next
			items[currentIndex].classList.add('is-active');
		}, 600);

		// Store so we can cancel on breakpoint change
		this.mobileIntervals.set(gallery, intervalId);
	}

	/**
	 * Desktop: show image based on mouse X/Y position within the gallery
	 */
	galleryDesktopAnimation(gallery, items) {
		// Remove any lingering mousemove listeners by replacing the element clone trick
		// Instead we use an AbortController per gallery
		const controller = new AbortController();
		const { signal } = controller;

		// Store controller so breakpoint change can abort it
		if (gallery._desktopController) {
			gallery._desktopController.abort();
		}
		gallery._desktopController = controller;

		const totalImages = items.length;
		const cols = Math.ceil(Math.sqrt(totalImages));
		const rows = Math.ceil(totalImages / cols);

		// Build grid mapping
		const grid = [];
		let imageIndex = 0;
		for (let row = 0; row < rows; row++) {
			for (let col = 0; col < cols; col++) {
				grid.push(imageIndex % totalImages);
				imageIndex++;
			}
		}

		let currentIndex = 0;

		// Activate first image
		items[0].classList.add('is-active');
		gallery.classList.add('is-loaded');

		// Mouse move handler
		const handleMouseMove = (e) => {
			const rect = gallery.getBoundingClientRect();
			const mouseX = e.clientX - rect.left;
			const mouseY = e.clientY - rect.top;

			const colIndex = Math.floor((mouseX / rect.width) * cols);
			const rowIndex = Math.floor((mouseY / rect.height) * rows);

			const clampedCol = Math.max(0, Math.min(cols - 1, colIndex));
			const clampedRow = Math.max(0, Math.min(rows - 1, rowIndex));

			const newIndex = grid[clampedRow * cols + clampedCol];

			if (newIndex !== currentIndex) {
				items[currentIndex].classList.remove('is-active');
				items[newIndex].classList.add('is-active');
				currentIndex = newIndex;
			}
		};

		gallery.addEventListener('mousemove', handleMouseMove, { signal });
	}
}

export default HeroGalleryMousePosition;
