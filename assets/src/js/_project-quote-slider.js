import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

class ProjectQuoteSlider {
    constructor() {
        this.init();
    }

    init() {
        const quoteSliders = document.querySelectorAll('.project-quote__slider');

        quoteSliders.forEach((slider) => {
            new Splide(slider, {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                arrows: false,
                pagination: false,
                autoplay: true,
                interval: 3000,
                pauseOnHover: true,
                pauseOnFocus: true,
                breakpoints: {
                    1500: {
                        perPage: 2,
                        padding: '2rem',
                        gap: '1rem',
                        arrows: false,
                    },
                    768: {
                        perPage: 1,
                        padding: '2rem',
                        gap: '1rem',
                        arrows: false,
                    },
                },
            }).mount();
        });
    }
}

export default ProjectQuoteSlider;
