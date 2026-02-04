import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

class BlogSlider {
    constructor() {
        this.init();
    }

    init() {
        const blogSliders = document.querySelectorAll('.blog-slider');

        blogSliders.forEach((slider) => {
            new Splide(slider, {
                type: 'loop',
                perPage: 3.5,
                perMove: 1,
                arrows: true,
                pagination: true,
                breakpoints: {
                    1024: {
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

export default BlogSlider;
