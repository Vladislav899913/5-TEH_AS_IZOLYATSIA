// let header = document.querySelector(".js-header"),
//   headerH = document.querySelector(".js-header").clientHeight;

// document.onscroll = function () {
//   let scroll = window.scrollY;
//   if (scroll > headerH) {
//     header.classList.add("fixed");
//     document.body.style.paddingTop = headerH + "px";
//   } else {
//     header.classList.remove("fixed");
//     document.body.removeAttribute("style");
//   }
// };

const hamb = document.querySelector("#hamb");
const popup = document.querySelector("#popup");
const nav_links = document.querySelector("#nav_links").cloneNode(1);
const body = document.body;

hamb.addEventListener("click", hambHandler);
function hambHandler(e) {
  e.preventDefault();
  popup.classList.toggle("open");
  hamb.classList.toggle("active");
  body.classList.toggle("noscroll");
  renderPopup();
}

function renderPopup() {
  popup.appendChild(nav_links);
  console.log(nav_links);
}

const anchors = document.querySelectorAll('a[href*="#"]');

for (let anchor of anchors) {
  anchor.addEventListener("click", function (event) {
    event.preventDefault();
    const blockID = anchor.getAttribute("href");
    document.querySelector("" + blockID).scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
}

let swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  mousewheel: true,
  keyboard: true,
});
