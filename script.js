let navbar = document.querySelector('.header .navBar');
let menuBtn = document.querySelector('#menuBtn');

menuBtn.onclick = () =>{
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    navBar.classList.remove('active');
}; 

var swiper = new Swiper(".homeSlider", {
    loop: true,
    effect: "coverFlow",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".gallery-slider", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 2,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
});
