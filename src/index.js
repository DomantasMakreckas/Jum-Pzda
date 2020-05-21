'use script';

import {hyperscript} from "./hyperscript";
import {mount} from "./mount";
import {App} from "./App";

const button = hyperscript('button', {class: 'btn'}, 'ciulpiu');
const h1 = hyperscript('h1', {class: 'title'}, 'Bybys');
const div = hyperscript('div', {class: 'container', style: 'height: 200px'}, h1, button);

mount(hyperscript(App),
    document.getElementById('app')
);




