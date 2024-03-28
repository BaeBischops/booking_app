let navbar = document.querySelector('.header .navBar');

document.querySelector('#menuBtn').onclick = () =>{
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
