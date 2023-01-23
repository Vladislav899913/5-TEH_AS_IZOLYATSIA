document.addEventListener('DOMContentLoaded', function Slider() {
    // BURGER-MENU
    const hamb = document.querySelector('#hamb');
    const popup = document.querySelector('#popup');
    const nav_links = document.querySelector('#nav_links').cloneNode(1);
    const body = document.body;

    hamb.addEventListener('click', hambHandler);
    function hambHandler(e) {
        e.preventDefault();
        popup.classList.toggle('open');
        hamb.classList.toggle('active');
        renderPopup();
    }

    function renderPopup() {
        popup.appendChild(nav_links);
        console.log(nav_links);
    }

    // SLIDE
    const anchors = document.querySelectorAll('a[href*="#"]');

    for (let anchor of anchors) {
        anchor.addEventListener('click', function (event) {
            event.preventDefault();
            const blockID = anchor.getAttribute('href');
            document.querySelector('' + blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        });
    }
});
