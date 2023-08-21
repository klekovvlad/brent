import Swiper, { Autoplay, Navigation, Pagination } from "swiper";

export const InitSwipers = () => {


    const feedbackSlider = document.querySelector('.feedback-slider');
    if(feedbackSlider) {
        const feedbackSwiper = new Swiper(feedbackSlider, {
            speed: 700,
            modules: [Navigation],
            navigation: {
                prevEl: '.slider-prev',
                nextEl: '.slider-next'
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                },
                900: {
                    slidesPerView: 3,
                    centeredSlides: true,
                    initialSlide: 1,
                    spaceBetween: 0
                }
            }
        })
    }

    const storySlider = document.querySelector('.story-slider');
    if(storySlider) {
        const storyWrapper = new Swiper(storySlider, {
            speed: 1000,
            spaceBetween: 20,
            loop: true,
            direction: 'vertical',
            modules: [Pagination, Autoplay],
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.slider-pagination',
                type: 'bullets',
                clickable: true
            }
        })
    }
    
    const teamSlider = document.querySelector('.team')
    if(teamSlider) {
        const teamSwiper = new Swiper(teamSlider, {
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1250: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1600: {
                    slidesPerView: 'auto',
                    spaceBetween: 30
                }
            },
            modules: [Navigation],
            navigation: {
                prevEl: '.slider-prev',
                nextEl: '.slider-next'
            }
        })

        if(window.innerWidth < 1600) {
            const teamCol = teamSlider.querySelector('.team-col');
           if(teamCol) {
                const teamWrapper = teamSlider.querySelector('.swiper-wrapper');
                const teamColSlides = [...teamCol.children].reverse();
                teamColSlides.forEach(slide => {
                    slide.classList.add('swiper-slide')
                    teamWrapper.prepend(slide)
                })
                teamWrapper.removeChild(teamCol)
           }
        }
    }

    const casesSlider = document.querySelector('.cases');
    if(casesSlider) {
        const casesSwiper = new Swiper(casesSlider, {
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.1,
                    spaceBetween: 28,
                },
                1250: {
                    slidesPerView: 4,
                    spaceBetween: 28,
                }
            },
            modules: [Navigation],
            navigation: {
                prevEl: '.slider-prev',
                nextEl: '.slider-next'
            }
        })
    }
}