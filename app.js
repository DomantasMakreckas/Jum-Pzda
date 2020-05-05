const h1 = document.getElementById('title');
const h2 = document.querySelector('.lentele');

const input =  prompt('kas bus h2?');

h2.innerHTML = input;


const div = document.createElement('div');
const span = document.createElement('span');
const text = document.createTextNode('kazkoks tekstas ');
const text2 = document.createTextNode('kazkoks tekstas13 ');

span.appendChild(text2);
div.appendChild(text);

document.body.appendChild(span);
document.body.appendChild(div);

console.log(div);



