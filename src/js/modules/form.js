export const FormListener = () => {
    const forms = document.querySelectorAll('form');

    if(forms.length > 0) {
        forms.forEach(form => {
            const input = form.querySelector('input[type=tel]')
            const button = form.querySelector('button[type=submit]')
            button.addEventListener('click', (e) => {
                if(input && input.value.length < 15) {
                    e.preventDefault();
                    input.classList.add('novalid')
                    input.parentElement.classList.add('novalid-parent');

                    input.oninput = () => {
                        if(input.value.length > 2) {
                            input.classList.remove('novalid');
                            input.parentElement.classList.remove('novalid-parent');
                        }
                    }
                }else {
                    form.addEventListener('wpcf7submit', (e) => {
                        if(e.detail.status === "mail_sent") {
                            window.location.href = '/thanks'
                        }
                    })
                }
            })

        })
    }
}