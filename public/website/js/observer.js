document.addEventListener('DOMContentLoaded', () => {

    function main(view , list ) {
        const sections = document.querySelectorAll(`.${view}`);

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.50
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    for (let index = 0; index < list.length; index++) {
                        document.querySelector(`.${list[index]}`).classList.toggle(`${view+index}`);
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });
    }
    
    let firstlist = ["hero-heading",'hero-img-1'];
    main("hero-page",firstlist);
});
