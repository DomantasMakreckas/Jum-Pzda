'use strict';

export class Car {
    constructor(speed, car, arrow, x = 0, y = 0, rotate = 0) {
        this.positionX = x;
        this.positionY = y;
        this.rotation = rotate;
        this.speed = speed;
        this.car = car;
        this.controls = arrow;
        this.move = this.move.bind(this);
        document.addEventListener("keydown", this.move);
    }

    moveLeft() {
        this.positionX -= this.speed;
        this.rotation = 270;
        return this
    }

    moveRight() {
        this.positionX += this.speed;
        this.rotation = 90;
        return this;
    }

    moveUp() {
        this.positionY -= this.speed;
        this.rotation = 0;
        return this
    }

    moveDown() {
        this.positionY += this.speed;
        this.rotation = 180;
        return this
    }

    render() {
        this.car.style.left = this.positionX + 'px';
        this.car.style.top = this.positionY + 'px';
        this.car.style.transform = "rotate(" + this.rotation + "deg)";
    }

    move(event)  {
        if (this.controls === 'arrow') {
            switch (event.keyCode) {
                case 37:
                    this.moveLeft();
                    this.render();
                    break;
                case 38:
                    this.moveUp();
                    this.render();
                    break;
                case 39:
                    this.moveRight();
                    this.render();
                    break;
                case 40:
                    this.moveDown();
                    this.render();
                    break;
                case 13:
                    this.pedalToTheMetal();
                    this.render();
                    break;
            }
        } else {
            switch (event.keyCode) {
                case 65:
                    this.moveLeft();
                    this.render();
                    break;
                case 87:
                    this.moveUp();
                    this.render();
                    break;
                case 68:
                    this.moveRight();
                    this.render();
                    break;
                case 83:
                    this.moveDown();
                    this.render();
                    break;
                case 13:
                    this.pedalToTheMetal();
                    this.render();
                    break;
            }
        }
    }

    pedalToTheMetal() {
        this.moveRight();
        this.render();
        if (this.positionX < document.body.clientWidth) {
            this.pedalToTheMetal();
        }
    }
}