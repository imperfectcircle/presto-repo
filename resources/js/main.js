// * Apertura/Chiusura modale
window.onload = () => {
    const LOGINBUTTON = document.querySelector('#login');
    const MODALLOGIN = document.querySelector('#modalLogIn');
    const CLOSELOGIN = document.querySelector('#closeLogIn');
    const SIGNUPBUTTON = document.querySelector('#signup');
    const SIGNUPBUTTONCTA = document.querySelector('#signupcta')
    const MODALSIGNUP = document.querySelector('#modalSignup');
    const CLOSESIGNUP = document.querySelector('#closeSignup');
    LOGINBUTTON.addEventListener('click', () => {
        MODALLOGIN.style.display = 'block';
    });
    CLOSELOGIN.addEventListener('click', () => {
        MODALLOGIN.style.display = 'none';
    });
    SIGNUPBUTTON.addEventListener('click', () => {
        MODALSIGNUP.style.display = 'block';
    });
    CLOSESIGNUP.addEventListener('click', () => {
        MODALSIGNUP.style.display = 'none';
    });
    SIGNUPBUTTONCTA.addEventListener('click', () => {
        MODALSIGNUP.style.display = 'block';
    });
}; 

// menu toggle
const menuBtn = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');
const menuItem = document.querySelectorAll('.menu-item');

// main toggle

function toggle() {
    menuBtn.classList.toggle('open');
    menuItems.classList.toggle('open');
}

menuBtn.addEventListener('click', () => {
    toggle();
});

// toggle on item click if open

menuItem.forEach((el) => {
    el.addEventListener('click', () => {
        if (menuBtn.classList.contains('open')) {
            toggle();
        }
    });
});


// * Scroll to top
const SCROLLTOP = document.querySelector('#scrollTop');
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        SCROLLTOP.style.display = 'block';
    } else {
        SCROLLTOP.style.display = 'none';
    }
}
window.onscroll = () => { 
    scrollFunction(); 
};
SCROLLTOP.addEventListener('click', () => {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0;
});
