export const Faq = () => {
    const faqItems = document.querySelectorAll('.faq-item');
    if(faqItems.length > 0) {
        faqItems.forEach((item) => {
            const answer = item.querySelector('.faq-answer');
            item.onclick = () => {
                faqItems.forEach(el => {
                    if(el !== item) {
                        el.classList.remove('open')
                        el.querySelector('.faq-answer').style.maxHeight = `0px`
                    }
                })
                if(item.classList.contains('open')) {
                    item.classList.remove('open');
                    answer.style.maxHeight = `0px`
                }else {
                    item.classList.add('open');
                    answer.style.maxHeight = `${answer.scrollHeight}px`
                }
            }
        })
    }
}