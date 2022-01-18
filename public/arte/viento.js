let segundos = 0;

function setup() {
    windowWidth >= windowHeight
        ? createCanvas(windowHeight * 0.8, windowHeight * 0.8)
        : createCanvas(windowWidth * 0.8, windowWidth * 0.8);

    noFill();
    background(255);
    frameRate(1);
    strokeWeight(1);
    stroke(0);
}

function draw() {
    if (segundos % 10 == 0) {
        segundos = 1;
        background(255);
        arte = new Cuadrado();
        arte.dibuja();
    }
    segundos++;
}

class Cuadrado {
    cantLineas = 100;
    separacion = width / this.cantLineas;
    x = 0;
    pasos = 50;

    dibuja() {
        for (let i = 2; i < this.cantLineas; i++) {
            garabato(this.x, 0, this.x, height, this.pasos, i * 0.025);
            this.x += this.separacion;
            console.log(this.x);
        }
    }
}

function garabato(x1, y1, x2, y2, pasos, desvio) {
    pasoX = (x2 - x1) / pasos;
    pasoY = (y2 - y1) / pasos;
    beginShape();
    curveVertex(x1, y1);
    curveVertex(x1, y1);
    for (i = 0; i < pasos; i++) {
        if (i <= pasos) {
            curveVertex(
                (x1 += pasoX + random(-desvio, desvio)),
                (y1 += pasoY + random(-desvio, desvio))
            );
        }
    }
    curveVertex(x2, y2);
    endShape();
}
