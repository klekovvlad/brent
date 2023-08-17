export const AnimationEl = (scroll) => {
    const animationItems = document.querySelectorAll('.animation');

    let centerSize = scroll + (window.innerHeight * 0.8)
    animationItems.forEach(item => {

        if(centerSize >= item.getBoundingClientRect().top + document.documentElement.scrollTop) {
            
            item.style.opacity = '1'
            item.style.transform = 'translate(0, 0)'
        }
    })
}