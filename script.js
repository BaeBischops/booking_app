let navbar = document.querySelector('.header .navbar');

document.querySelector('#menuBtn').onclick = () =>{
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    navbar.classList.remove('active');
 }; 

