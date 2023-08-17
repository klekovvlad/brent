export const FormListener = () => {
    const forms = document.querySelectorAll('form');

    if(forms.length > 0) {
        forms.forEach(form => {
            form.addEventListener('wpcf7submit', (e) => {
                if(e.detail.status === "mail_sent") {
                    window.location.href = '/thanks'
                }
            })
        })
    }
}