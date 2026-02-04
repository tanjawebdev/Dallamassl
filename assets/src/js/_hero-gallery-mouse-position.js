/**
 * Hero Gallery Mouse Position
 * Images change based on mouse position (X and Y)
 * Creates a grid where each zone shows a different image
 */

class HeroGalleryMousePosition {
	constructor() {
		this.galleries = document.querySelectorAll('[data-hero-gallery-mouse]');

		if (this.galleries.length === 0) {
			return;
		}

		this.init();
	}

	init() {
		this.galleries.forEach((gallery) => {
			const items = gallery.querySelectorAll('[data-gallery-item]');

			if (items.length <= 1) {
				return; // Need at least 2 images for interaction
			}

			// Create a grid based on number of images
			// For example: 6 images = 3 columns x 2 rows
			const totalImages = items.length;
			const cols = Math.ceil(Math.sqrt(totalImages));
			const rows = Math.ceil(totalImages / cols);

			// Create grid array (can repeat images if needed)
			const grid = [];
			let imageIndex = 0;
			for (let row = 0; row < rows; row++) {
				for (let col = 0; col < cols; col++) {
					grid.push(imageIndex % totalImages); // Repeat if needed
					imageIndex++;
				}
			}

			let currentIndex = 0;

			// init first image as active
			items[0].classList.add('is-active');

			// Mouse move handler
			const handleMouseMove = (e) => {
				// Get mouse position relative to container
				const rect = gallery.getBoundingClientRect();
				const mouseX = e.clientX - rect.left;
				const mouseY = e.clientY - rect.top;
				const containerWidth = rect.width;
				const containerHeight = rect.height;

				// Calculate grid column and row
				const colIndex = Math.floor((mouseX / containerWidth) * cols);
				const rowIndex = Math.floor((mouseY / containerHeight) * rows);

				// Clamp to valid range
				const clampedCol = Math.max(0, Math.min(cols - 1, colIndex));
				const clampedRow = Math.max(0, Math.min(rows - 1, rowIndex));

				// Get grid position and corresponding image index
				const gridPosition = clampedRow * cols + clampedCol;
				const newIndex = grid[gridPosition];

				// Only update if index changed
				if (newIndex !== currentIndex) {
					// Remove active class from current
					items[currentIndex].classList.remove('is-active');

					// Add active class to new
					items[newIndex].classList.add('is-active');

					currentIndex = newIndex;
				}
			};

			// Add event listener
			gallery.addEventListener('mousemove', handleMouseMove);

			// Initialize first image as active
			items[0].classList.add('is-active');
		});
	}
}

export default HeroGalleryMousePosition;
