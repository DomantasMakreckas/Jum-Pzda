'use strict';
let number = Math.floor(Math.random() * 11);
// const number = Math.round(randomNumber);
console.log(number);

let input = prompt('Atspek skaiciu');

while (Number(input) !== number) {
    number = Math.floor(Math.random() * 11);
    console.log(number);
    input = prompt('Bandyk dar karta');
}

alert('mldc, pataikei');
    