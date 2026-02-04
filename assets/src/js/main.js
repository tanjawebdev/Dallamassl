import General from './_general';
import HeroGallery from './_hero-gallery';
import BlogSlider from './_blog-slider';
import InfoBoxSelection from './_info-box-selection';
import Logo from './_logo';
import HeroGalleryMousePosition from './_hero-gallery-mouse-position';

const App = {
	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneral() {
			return new General();
		}
		initGeneral();

		// Hero Gallery (Splide carousel)
		function initHeroGallery() {
			return new HeroGallery();
		}
		initHeroGallery();

		// Blog Slider (Splide carousel)
		function initBlogSlider() {
			return new BlogSlider();
		}
		initBlogSlider();

		// Info Box Selection (tabbed interface)
		function initInfoBoxSelection() {
			return new InfoBoxSelection();
		}
		initInfoBoxSelection();

		// Logo
		function initLogo() {
			return new Logo();
		}
		initLogo();

		// Hero Gallery Mouse Position
		function initHeroGalleryMousePosition() {
			return new HeroGalleryMousePosition();
		}
		initHeroGalleryMousePosition();
	},
};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});
