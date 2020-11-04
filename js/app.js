const hamburguer = document.querySelector('#menu');
const navlinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');

hamburguer.addEventListener('click', ()=> {

    navlinks.classList.toggle("open");
    
});