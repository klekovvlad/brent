import { OutputParalax } from "./parallax.js";

export const AnimationSection = (scroll) => {
    const sections = document.querySelectorAll('section')
    let centerSize = scroll + (window.innerHeight * 0.6)
    const storySection = document.querySelector('.story');

    if(storySection) {
        const listItems = storySection.querySelectorAll('li');
        let delay = 0.5
        listItems.forEach(li => {
            li.style.transitionDelay = `${delay}s`;
            delay = delay + 0.5
        })
    }

    if(sections.length > 0) {
        sections.forEach(section => {
            if(centerSize >= section.getBoundingClientRect().top + document.documentElement.scrollTop) {
                if(section.classList.contains('hero')) {
                    OutputParalax(section, scroll);
                }
                if(section.classList.contains('services')) {
                    OutputParalax(section, scroll);
                }
                section.classList.add('view')
            }
        })
    }
}