'use strict';

import {Car} from "./Car";

export class Merc extends Car {
    constructor() {
        const mers = document.querySelector('.first');
        super(30, mers, 'arrow');
    }
}

