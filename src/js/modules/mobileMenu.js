export const MobileMenu = () => {
    const button = document.querySelector('.mobile-nav');
    const header = document.querySelector('.header');
    const body = document.querySelector('body');

    if(button) {
        button.onclick = () => {
            if(header.classList.contains('open')) {
                header.classList.remove('open')
                body.classList.remove('open')
                body.onclick = () => {}
            }else {
                header.classList.add('open')
                body.classList.add('open')
                body.onclick = (e) => {
                    if(e.target === body) {
                        header.classList.remove('open')
                        body.classList.remove('open')
                        body.onclick = () => {}
                    }
                }
            }
        }
    }
}