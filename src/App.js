'use strict';

import {Component} from "./Component";
import {hyperscript} from "./hyperscript";

export class App extends Component {
    render() {
        return hyperscript('button',
            {
                class: 'button', style: 'height: 200px',
            }, 'alus')
    }
}