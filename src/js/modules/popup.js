const body = document.querySelector('body')

export class Popup {
    constructor(button) {
        this.button = button;
        this.popup = document.createElement('div');
        this.popup.classList.add('popup');
        this.popup.classList.add('hide')
        this.popupBody = document.createElement('div');
        this.popupBody.classList.add('popup-body');
    }

    renderPopup() {
        this.popup.append(this.popupBody)
        body.append(this.popup);
        setTimeout(() => {
            this.popup.classList.remove('hide')
        }, 100)

        document.addEventListener('keydown', (e) => {
            if(e.key === 'Escape') {
                this.closePopup()
            }
        }, {once: true});

        this.popup.addEventListener('click', (e) => {
            if(e.target.classList.contains('popup')) {
                this.closePopup();
            }
        })
    }

    closePopup() {
        this.popup.classList.add('hide');

        setTimeout(() => {
            if(document.querySelector('.popup')) {
                document.querySelector('.popup').parentElement.removeChild(document.querySelector('.popup'));
            }
        }, 200)
    }

    addClassName(className) {
        this.popupBody.classList.add(className)
    }
}