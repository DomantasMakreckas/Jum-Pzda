'use script';

import {hyperscript, mount} from "./vdom/bootloader";
import {Navigation} from "./Components/Navigation";
import {Main} from "./Components/Main";

mount(hyperscript(Navigation),
    document.getElementById('navigation-list')
);

mount(hyperscript(Main),
    document.getElementById('main')
);