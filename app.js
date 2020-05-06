'use strict';

// const shoppingCart = {
//     obuolys: 2,
//     bananas: 3
// };
//
// let answer;
//
// do {
//     const productName = prompt('Iveskite norima produkta');
//     const productQuantity = prompt('Iveskite skaiciu kiek noresite');
//
//     shoppingCart[productName] = productQuantity;
//
//     answer = prompt('Dar kazko?');
// }
// while (answer === 'noriu');
//
// for (let key in shoppingCart) {
//     console.log(key + '-kiekis = ' + shoppingCart[key]);
//     // console.log(`${key} - kiekis = ${shoppingCart[key]}`);  veikia ir taip
// }
//
// console.log(shoppingCart);


const rapLyrics = [
    {
        word: 'mergos',
        naughty: false,
    },
    {
        word: 'narkotikai',
        naughty: true,
    },
    {
        word: 'bapkes',
        naughty: false,
    },
    {
        word: 'bmw',
        naughty: false,
    },
    {
        word: 'mergos',
        naughty: false,
    },
    {
        word: 'narkotikai',
        naughty: true,
    },
    {
        word: 'bapkes',
        naughty: false,
    },
    {
        word: 'bmw',
        naughty: false,
    },
];

let age = prompt('Iveskite savo amziu');
// let search = prompt('Kokio zodzio ieskai?');
// let find = rapLyrics.find(getLyrics);
// let filter = rapLyrics.filter(getLyrics);

const result = age < 17 ?
    rapLyrics.filter(censor) :
    rapLyrics;

function censor(value) {
    return !value.naughty;
}

function getWords(value) {
    return value.word;
}

const lyrics = result.map(getWords);

console.log(result);
console.log(result.map(getWords));

const p = document.createElement('p');
const text = document.createTextNode(lyrics.join(' '));
p.appendChild(text);
document.body.appendChild(p);
