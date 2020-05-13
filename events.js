'use strict';
const popUp = document.querySelector('.popup');
const main = document.querySelector('main');
const body = document.querySelector('body');

body.addEventListener('mouseleave', () =>
    popUp.style.display = 'block'
);

main.addEventListener('click', () =>
    popUp.style.display = 'none'
);