import { error } from "./error.js";
import { setPhoneMask } from "./mask.js";
import { sendQuiz } from "./quiz.js";

export class Survey {
    constructor(wrapper) {
        this.wrapper = wrapper;
        this.page_id = 399;
        this.url = `/wp-json/wp/v2/pages/${this.page_id}`;
        this.questions = [];
        this.max_page = 0;
        this.page = 0;
        this.message = {};
        this.survey = wrapper.querySelector('.survey-content-wrapper');
        this.progress = wrapper.querySelector('.survey-progress');
        this.buttons = wrapper.querySelector('.survey-buttons');
    }

    init() {
        this.getQuestions().then(data => {
            this.questions = data.acf.survey.element;
            this.max_page = this.questions.length - 1;
            this.render(0, this.survey, this.questions);

            this.buttons.addEventListener('click', (e) => {
                this.buttonsListener(e)
            })
        })
    }

    async getQuestions() {
        const res = await fetch(this.url)
        if(!res.ok) {
            this.survey.innerHTML = error();
        }else {
            return res.json();
        }
    }

    buttonsListener(e) {
        
        if(e.target.dataset.action === 'next' && this.page < this.max_page) {
            this.page++;
        }else if(e.target.dataset.action === 'prev' && this.page >= 0) {
            this.page--;
        }else if(this.page === this.max_page && e.target.dataset.action === 'next') {
            sendQuiz(this.message)
        }
       
        if(e.target.dataset.action && this.page <= this.max_page) {
            this.setProgress();
            this.render(this.page, this.survey, this.questions)
        }

    }

    inputListener(e) {
        if(e.target.type !== 'tel') {
            if(this.wrapper.querySelector('[data-action="next"]').classList.contains('disabled')) {
                this.toggleNextButtonDisabled();
            }
        }else{
            if(e.target.value.length >= 15) {
                if(this.wrapper.querySelector('[data-action="next"]').classList.contains('disabled')) {
                    this.toggleNextButtonDisabled();
                }
            }else{
                this.wrapper.querySelector('[data-action="next"]').classList.add('disabled')
            }
        }
        this.message[e.target.name] = e.target.value;
    }

    setProgress() {
        try {
            let persent = this.page / (this.max_page + 1) * 100;
            this.progress.querySelector('.survey-progress-persent .value').textContent = `${persent.toFixed(0)}%`;
            this.progress.querySelector('.survey-progress-track-line').style.right = `${100 - persent.toFixed(0)}%`
        }
        catch {
            console.log('Ошибка при расчете прогрессбара')
        }
    }

    render(index, wrapper, array) {
        const answers = this.createEl('div', 'survey-answers')
        const question = array[index].question

        this.clear();
        this.toggleNextButtonDisabled();
        answers.classList.add(this.setAnswersGrid(array[index].answer))

        array[index].answer.map((answer, index) => {
            answers.append(this.renderAnswer(answer, index, question))
        })

        wrapper.append(
            this.renderQuestion(question),
            answers
        )
    }

    renderQuestion(str) {
        const el = this.createEl('div', 'survey-question')
        el.textContent = str
        return el
    }

    renderAnswer(obj, index, question) {
        const el = this.createEl('div', 'survey-answer input');
        const input = this.createEl('input', '');
        input.type = obj.type;

        if(obj.type !== 'radio') {
            input.placeholder = obj.text;
            if(obj.type === 'tel') {
                setPhoneMask(input);
            }
        }else{
            const label = this.createEl('label', 'survey-answer-label')
            label.textContent = obj.text;
            input.value = obj.text;
            input.id = `${this.page}-${index}`;
            label.setAttribute('for', `${this.page}-${index}`);

            if(obj.img) {
                const img = this.createEl('img', 'survey-answer-img');
                img.src = obj.img.url;
                img.alt = obj.img.alt;
                label.append(img)
                el.classList.add('input-img')
            }

            el.append(label)
        }

        input.name = question;
        input.addEventListener('input', (e) => {
            this.inputListener(e);
        })

        el.prepend(input)
        return el
    }

    setAnswersGrid(array) {
        for(let i = 0; i < array.length; i++) {
            if(array[i].type !== 'radio') {  
                return 'small'
            }
        } 
        if(array.length > 4) {
            return 'large'
        }else{
            return 'medium'
        }
    }

    toggleNextButtonDisabled() {
        this.wrapper.querySelector('[data-action="next"]').classList.toggle('disabled')
    }

    createEl(type, className) {
        const el = document.createElement(type);
        el.className = className;
        return el;
    }

    clear() {
        this.survey.innerHTML = '';
    }
}