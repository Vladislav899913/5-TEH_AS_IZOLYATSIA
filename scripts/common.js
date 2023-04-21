document.addEventListener('DOMContentLoaded', function Slider() {
    // BURGER-MENU
    const navBurgerIcon = document.querySelector('#nav_burger_icon');
    const navBurger = document.querySelector('#nav_burger');
    const navLinks = document.querySelector('#nav').cloneNode(1);

    navBurgerIcon.addEventListener('click', hambHandler);
    function hambHandler(e) {
        e.preventDefault();
        navBurger.classList.toggle('open');
        navBurgerIcon.classList.toggle('active');
        // document.querySelector('body').style.overflow = 'hidden';
        navBurger.appendChild(navLinks);
    }

    // HIDE BURGER-MENU ON SCROLL
    var previousScrollPosition = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPosition = window.pageYOffset;
        if (
            previousScrollPosition > currentScrollPosition ||
            previousScrollPosition < currentScrollPosition
        ) {
            navBurger.classList.remove('open');
            navBurgerIcon.classList.remove('active');
        }
        previousScrollPosition = currentScrollPosition;
    };
});
