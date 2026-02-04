import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

class HeroGallery {
	constructor() {
		this.init();
	}

	init() {
		const heroGalleries = document.querySelectorAll('.hero-gallery');

		heroGalleries.forEach((gallery) => {
			const interval = parseInt(gallery.dataset.interval) || 3000;

			new Splide(gallery, {
				type: 'fade',
				rewind: true,
				perPage: 1,
				arrows: false,
				pagination: true,
				autoplay: true,
				pauseOnHover: false,
				interval: interval,
			}).mount();
		});
	}
}

export default HeroGallery;

