let x = 0;
let y = 0;
let largoX;
let largoY;
let modificador = 35;
let colorPrimario;

function setup() {
    colorMode(HSB, 100);
    createCanvas(windowWidth, windowHeight);
    noFill();
    frameRate(1);
    //for (let i = 0; i < width; i += modificador) {
    //line(i, 0, i, height);
    //line(0, i, width, i);
    //}
    strokeWeight(5);
}

function draw() {
    background(100, 0, 100);
    let forma = new Forma(x, y, modificador);
    forma.dibujaTodo();
}

class Forma {
    constructor(x, y, modificador) {
        this.x = x;
        this.y = y;
        this.modificador = modificador;
    }

    dibujaTodo() {
        for (let i = 0; i < width; i += this.modificador) {
            for (let j = 0; j < height; j += this.modificador) {
                //stroke(floor(map(i, 0, width, 0, 100, true)), 100, 100);
                this.x = i;
                this.y = j;
                this.dibujaForma(seleccionaForma());
            }
        }
    }
    dibujaForma(numero) {
        switch (numero) {
            case 1:
                this.uno();
                break;
            case 2:
                this.dos();
                break;
            case 3:
                this.tres();
                break;
            case 4:
                this.cuatro();
                break;
            case 5:
                this.cinco();
                break;
            case 6:
                this.seis();
                break;
            case 7:
                this.siete();
                break;
            case 8:
                this.ocho();
                break;
        }
    }

    uno() {
        arc(this.x, this.y, this.modificador, this.modificador, 0, HALF_PI);
        arc(
            this.x + this.modificador,
            this.y + this.modificador,
            this.modificador,
            this.modificador,
            PI,
            PI + HALF_PI
        );
    }

    dos() {
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            PI,
            PI + HALF_PI
        );
        arc(
            this.x + this.modificador,
            this.y + this.modificador,
            this.modificador,
            this.modificador,
            PI,
            PI + HALF_PI
        );
    }

    tres() {
        arc(this.x, this.y, this.modificador, this.modificador, 0, HALF_PI);
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            0,
            HALF_PI
        );
    }

    cuatro() {
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            PI,
            PI + HALF_PI
        );
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            0,
            HALF_PI
        );
    }

    cinco() {
        arc(
            this.x,
            this.y + this.modificador,
            this.modificador,
            this.modificador,
            PI + HALF_PI,
            0
        );
        arc(
            this.x + this.modificador,
            this.y,
            this.modificador,
            this.modificador,
            HALF_PI,
            PI
        );
    }

    seis() {
        arc(
            this.x,
            this.y + this.modificador,
            this.modificador,
            this.modificador,
            PI + HALF_PI,
            0
        );
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            PI + HALF_PI,
            0
        );
    }

    siete() {
        arc(
            this.x + this.modificador,
            this.y,
            this.modificador,
            this.modificador,
            HALF_PI,
            PI
        );
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            HALF_PI,
            PI
        );
    }

    ocho() {
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            HALF_PI,
            PI
        );
        arc(
            this.x + this.modificador / 2,
            this.y + this.modificador / 2,
            this.modificador,
            this.modificador,
            PI + HALF_PI,
            0
        );
    }
}

function seleccionaForma() {
    return random([1, 2, 3, 4, 5, 6, 7, 8]);
}

function randomColor() {
    return [random(100), random(80, 100), random(50, 100)];
}
