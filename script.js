let navbar = document.querySelector('.header .navBar');

document.querySelector('#menuBtn').onclick = () =>{
    navbar.classList.toggle('active');
};

window.onscroll = () => {
    navBar.classList.remove('active');
}; 

