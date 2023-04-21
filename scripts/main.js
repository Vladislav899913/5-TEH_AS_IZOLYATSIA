// SLIDER
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName('activity_slider_slides');
    let dots = document.getElementsByClassName('activity_slider_dot');

    if (n < 1) {
        slideIndex = slides.length;
    }

    if (n > slides.length) {
        slideIndex = 1;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(
            ' activity_dot_active',
            ''
        );
    }

    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className += ' activity_dot_active';
}
