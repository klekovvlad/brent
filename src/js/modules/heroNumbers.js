export const HeroNumbers = () => {
    const heroNumberWrapper = document.querySelector('.hero-numbers');
    if(heroNumberWrapper) {
        const numbers = heroNumberWrapper.querySelectorAll('.number');

        if(numbers.length > 0) {
            numbers.forEach(number => {
                const timeout = 3000 / number.dataset.num;
                const value = number.querySelector('.value');
                let curentValue = 0
                value.textContent = curentValue;
                
                let interval = setInterval(() => {
                    if(curentValue < number.dataset.num) {
                        curentValue++;
                        value.textContent = curentValue;
                    }else{
                        clearInterval(interval)
                    }
                }, timeout)
            })
        }
    }
}