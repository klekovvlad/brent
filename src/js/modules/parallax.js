let sectionStart = 0;

export const OutputParalax = (section, scroll) => {
    
    if(scroll <= section.getBoundingClientRect().top + document.documentElement.scrollTop + section.offsetHeight) {
        if(sectionStart === 0) {
            sectionStart = scroll;
        }
        const img = section.querySelector('.img-bg');
        
        const sectionSize = sectionStart + section.offsetHeight;
    
        let sectionScrollPersent =  (scroll - sectionStart) / sectionSize * 100;
    
        img.style.transform = `translate(-50%, -${50 - sectionScrollPersent}%)`
    }
    
}