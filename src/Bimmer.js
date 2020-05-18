'use strict';

import {Car} from "./Car";


export class Bimmer extends Car {
    constructor() {
        const bmw = document.querySelector('.second');
        super(20, bmw, 'wasd');
    }
}

