import Swiper from "swiper";
import { Popup } from "./popup.js";

export class Gallery extends Popup {
    constructor(button) {
        super(button)
        this.button = button;
        this.array = button.dataset.imgs.split(',').splice('1');

        this.renderImgs = () => {
            let string = '';
            this.array.forEach(img => {
                string = string + `<img class="swiper-slide" src=${img} alt="Решение">`
            })
            return string;
        }
    }

    initGallery() {
        this.button.onclick = () => {
            this.openPopup();
        }
    }

    openPopup() {
        super.renderPopup()
        this.popup.classList.add('popup-gallery')
        this.popupBody.className = 'swiper gallery-slider';
        this.popupBody.innerHTML = '';
        this.popupBody.insertAdjacentHTML('beforeend', `
            <div class="swiper-wrapper">${this.renderImgs()}</div>
        `)
        this.initSlider();
    }

    initSlider() {
        const slider = new Swiper(this.popupBody, {
            slidesPerView: 1,
            spaceBetween: 10,
        }) 
    }

}

export const InitButtonsGallery = () => {
    const buttons = document.querySelectorAll('.gallery-open')
    if(buttons.length > 0) {
        buttons.forEach(button => {
            const galleryButton = new Gallery(button)
            galleryButton.initGallery();
        })
    }
}