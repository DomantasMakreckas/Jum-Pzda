'use script';
//
// import {hyperscript} from "./hyperscript";
// import {mount} from "./mount";
// import {App} from "./App";
//
// const button = hyperscript('button', {class: 'btn'}, 'ciulpiu');
// const h1 = hyperscript('h1', {class: 'title'}, 'Bybys');
// const div = hyperscript('div', {class: 'container', style: 'height: 200px'}, h1, button);
//
// mount(hyperscript(App),
//     document.getElementById('app')
// );

const pakelis = {
    vnt: 20,
    parukyti() {
        this.vnt--;
        console.log('likutis ' + this.vnt + ' vnt');
        return this.vnt;
    }
};

// function surukyti() {
//     while (pakelis.vnt > 0) {
//         pakelis.parukyti();
//     }
// }

// surukyti();

const mygtukas = document.createElement('button');
const tekstas = document.createTextNode('rukyti');
mygtukas.appendChild(tekstas);
document.body.appendChild(mygtukas);

pakelis.parukyti = pakelis.parukyti.bind(pakelis);
mygtukas.addEventListener('click', pakelis.parukyti);

const fn = pakelis.parukyti.bind(pakelis);

console.log(typeof pakelis.parukyti)
