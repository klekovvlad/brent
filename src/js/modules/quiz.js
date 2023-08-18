import Swiper from "swiper";

export const quiz = () => {
    let message = {}
    let index = 0;
    const questions = document.querySelector('.quiz-questions');

    if(questions) {
        const questionButtons = document.querySelector('.quiz-buttons');
        const quizItems = document.querySelectorAll('.quiz-item');
        const nextButton = questionButtons.querySelector('.button')
        const inputPhone = questions.querySelector('input[type=tel]');
    
        nextButton.classList.add('disabled');
    
        const ButtonsListener = (buttons) => {
            const prevButton = questionButtons.querySelector('.question-prev');
            prevButton.classList.add('hide');
    
            buttons.onclick = (e) => {
                const quizItemInputs = quizItems[index].querySelectorAll('input');
                nextButton.classList.add('disabled');

                // quizItemInputs.forEach(input => {
                //     if(input.type === 'radio') {
                //         input.checked = false;
                //     }
                // })
    
                if(e.target.dataset.action === 'next') {
                    if(index < quizItems.length - 1) {
                        index++
                    }
                }else if(e.target.dataset.action === 'prev') {
                    if(index > 0) {
                        index--
                    }
                }
                quizItems[index].querySelectorAll('input').forEach(input => {
                    if(input.type === 'radio' && input.checked) {
                        nextButton.classList.remove('disabled')
                    }
                })
                questionSlider.slideTo(index, 500)
                if(index === quizItems.length - 1) {
                    prevButton.onclick = () => {
                        nextButton.textContent = 'Следующий вопрос';
                        nextButton.onclick = () => {};
                    }
                    nextButton.textContent = 'Оставить заявку'
                    nextButton.onclick = () => {
                        if(inputPhone.value.length > 7) {
                            send()
                        }else{
                            inputPhone.classList.add('novalid');
                        }
                    };
                }
                
                InputListener(index);
                if(index === 0) {
                    prevButton.classList.add('hide');
                }else{
                    prevButton.classList.remove('hide');
                }
            }
        }
    
        const InputListener = (index) => {
            const quizItemInputs = quizItems[index].querySelectorAll('input');
            quizItemInputs.forEach(input => {
                if(input.type === 'radio') {
                    input.onclick = () => {
                        nextButton.classList.remove('disabled');
                        message[input.name] = input.value;
                    }
                }else if(input.type === 'tel' || input.type === 'text') {
                    if(input.value.length >= 1) {
                        nextButton.classList.remove('disabled');
                    }
                    input.oninput = () => {
                        if(input.value.length >= 1) {
                            nextButton.classList.remove('disabled');
                            message[input.name] = input.value;
                        }
                    }
                }
                
            })
        }
    
        InputListener(0)
    
        const questionSlider = new Swiper(questions, {
            slidesPerView: 1,
            spaceBetween: 10,
            allowTouchMove: false,
            autoHeight: true
        })
    
        ButtonsListener(questionButtons);
    
        const send = () => {
            const formWrapper = document.querySelector('#wpcf7-f225-o1');
            const form = formWrapper.querySelector('form');
            const button = form.querySelector('button[type=submit]')
            const inputMessage = form.querySelector('input[name=message]');
            let data = ''
            for(let key in message) {
                data = `${data} ${key}: ${message[key]} \n`
            }
            inputMessage.value = data;
            button.click()
        }
    }
}

