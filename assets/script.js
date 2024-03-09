// Navbar button
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .flex .navbar');
// Navbar button toggle
menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}
// Navbar status on scroll
window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}