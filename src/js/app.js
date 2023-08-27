import { AnimationEl } from "./modules/animation.js";
import { AnimationSection } from "./modules/animationEl.js";
import { Faq } from "./modules/faq.js";
import { FormListener } from "./modules/form.js";
import { InitButtonsGallery } from "./modules/gallery.js";
import { HeroNumbers } from "./modules/heroNumbers.js";
import { InitSwipers } from "./modules/initSwiper.js";
import { MapEl } from "./modules/map.js";
import { MobileMenu } from "./modules/mobileMenu.js";
import { quiz } from "./modules/quiz.js";
import IMask from "imask";

setTimeout(() => {
    HeroNumbers();
}, 1000)
MobileMenu();
InitSwipers();
InitButtonsGallery();
quiz();
Faq();
MapEl();
FormListener();

const phones = document.querySelectorAll('input[type=tel]');



export const PhoneMask = () => {
    const phones = document.querySelectorAll('input[type=tel]')
    
    if(phones.length > 0) {
        phones.forEach(phone => {
            let phoneMask = IMask(
            phone, {
                mask: '+{7}(000)000-00-00'
            });
        })
    }
}

PhoneMask();

const PopupForms = () => {
    let forms = {}
    fetch('/wp-json/wp/v2/pages/7')
    .then(response => response.json())
    .then(data => {
        forms = data.acf.forms;
    })

    const popup = document.querySelector('.form-popup');
    const popupButton = popup.querySelector('button[type=submit]')
    console.log(popupButton);
    const buttons = document.querySelectorAll('.popup-open');
    if(buttons.length > 0) {
        buttons.forEach(button => {
            button.onclick = (e) => {
                popup.classList.add('open')
                if(forms[e.target.dataset.action]) {
                    popup.querySelector('.form-title').textContent = forms[e.target.dataset.action].title
                    popup.querySelector('.form-subtitle').textContent = forms[e.target.dataset.action].subtitle
                    popup.querySelector('.button').textContent = forms[e.target.dataset.action].button
                }else {
                    popup.querySelector('.form-title').textContent = 'Получите консультацию юриста'
                    popup.querySelector('.form-subtitle').textContent = 'Оставьте ваш номер телефона, мы свяжемся с вами в течение 10 минут и ответим на все вопросы!'
                }
                popup.onclick = (e) => {
                    if(e.target.classList.contains('form-popup') || e.target.classList.contains('form-close')) {
                        popup.classList.remove('open')
                        popup.onclick = () => {}
                    }
                }
            }
        })
    }
}   

PopupForms();

window.onscroll = () => {
    AnimationEl(window.scrollY)
    AnimationSection(window.scrollY);
}