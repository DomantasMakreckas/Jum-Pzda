'use strict';

let carImg = document.querySelector('img');
const car = {
    positionX: 0,
    positionY: 0,
    rotation: 0,
    moveLeft() {
        this.positionX -= 20;
        this.rotation = 270;
    },
    moveDown() {
        this.positionY += 20;
        this.rotation = 180;
    },
    moveRight() {
        this.positionX += 20;
        this.rotation = 90;
    },
    moveUp() {
        this.positionY -= 20;
        this.rotation = 0;
    },
    render() {
        carImg.style.left = this.positionX + 'px';
        carImg.style.top = this.positionY + 'px';
        carImg.style.transform = "rotate(" + this.rotation + "deg)";
    },
    move(event) {
        if (event.keyCode === 37) {
            car.moveLeft();
            car.render();
        }
        if (event.keyCode === 38) {
            car.moveUp();
            car.render();
        }
        if (event.keyCode === 39) {
            car.moveRight();
            car.render();
        }
        if (event.keyCode === 40) {
            car.moveDown();
            car.render();
        }
    }
};

document.addEventListener("keydown", car.move);