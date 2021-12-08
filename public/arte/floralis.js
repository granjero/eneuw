/*

floralis.pde
// SOFTWARE LIBRE. Cite la fuente @juanmiguells
Rama rama;
boolean bandera = true;

void setup() {
    size(800, 800);
    noFill();
    rama = new Rama();
}

void draw() {
    translate(width / 2, height / 2);

    if (bandera) {
        bandera = false;
        rama.dibujar(int(random(180, 250)), int(random(15, 30)));
    }
}

void mouseClicked() {
    bandera = true;
}

 rama.pde
class Rama {
    PVector tallo;
    PVector[] hojas;
    PVector[] hojas2;
    float cuadrante;

    Rama() {}

    void creaTallo() {
        tallo = PVector.random2D();
        tallo.setMag(random(height * 0.2, height * 0.4));
        cuadrante = tallo.heading();
    }

    PVector[] creaHojas(int cantHojas) {
        PVector[] hojitas = new PVector[cantHoja];
        for (int i = 0; i < cantHojas; i++) {
            hojitas[i] = PVector.fromAngle(random(cuadrante - 0.10, cuadrante + 0.10));
            hojitas[i].setMag(random(tallo.mag() * 0.99, tallo.mag() * 1.20));
        }
        return hojitas;
    }

    void dibujar(int cantRamas, int cantHojas) {

        background(255);

        // RAMAS
        for (int j = 0; j < cantRamas; j++) {
            creaTallo();
            scribble(0, 0, tallo.x, tallo.y, 3, 30.5);

            // HOJAS
            hojas = creaHojas(int(random(cantHojas)));
            for (int i = 0; i < hojas.length; i++) {
                scribble(tallo.x, tallo.y, hojas[i].x, hojas[i].y, 5, 3.0);
            }
        }
    }
}


//SCRIBBLE este código lo saqué de algún lado y no recuerdo de donde

void scribble(float x1, float y1, float x2, float y2, int steps, float scribVal) {
    float xStep = (x2 - x1) / steps;
    float yStep = (y2 - y1) / steps;
    beginShape();
    curveVertex(x1, y1);
    curveVertex(x1, y1);
    for (int i = 0; i < steps; i++) {
        if (i < steps - 1) {
            curveVertex(x1 += xStep + random(-scribVal, scribVal), y1 += yStep + random(-scribVal, scribVal));
        } else {
            curveVertex(x2, y2);
            curveVertex(x2, y2);
        }
    }
    endShape();
}s

*/


let segundos = 0;

function setup() {
    (windowWidth >= windowHeight) 
        ? createCanvas(windowHeight, windowHeight) 
        : createCanvas(windowWidth, windowWidth); 

    background(255);
    frameRate(1);
    strokeWeight(1);
    stroke(0, 0, 0);
}

function draw() {
    if (segundos % 12 == 0) {
        segundos = 1;
        background(5, 0, 5);
        dibuja = new Trazo();
        dibuja.arte();
    }
    segundos++;
}

function mousePressed() {}

class Rama {

    aquenio() {

    }
}
