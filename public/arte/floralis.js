
let segundos = 0;

function setup() {
    (windowWidth >= windowHeight) 
        ? createCanvas(windowHeight, windowHeight) 
        : createCanvas(windowWidth, windowWidth); 

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
        let arte = new Panadero();
        let ca = arte.cantAquenios();

        for(let i = 0; i < ca; i++) {
            let a = arte.aquenio();
            let v = arte.villano(a);
            arte.dibujaAquenio(a);
            arte.dibujaVillano(a, v);
        }
    }
    segundos++;
}

class Panadero {

    cuadrante = 0;

    aquenio() {
        let aquenio = p5.Vector.random2D();
        this.cuadrante = aquenio.heading();
        let centro = new p5.Vector(width/2, height/2);
        aquenio.setMag(random(height * .2, height * .4));
        aquenio = p5.Vector.add(centro, aquenio);
        return aquenio;
    }

    cantAquenios() {
        return random(150, 250);
    }

    dibujaAquenio(aquenio) {
        garabato(width/2, height/2, aquenio.x, aquenio.y, 5, 15);       
    }

    villano(aquenio) {
        let villano = p5.Vector.fromAngle(random(this.cuadrante - 1.5, this.cuadrante + 1.5));
        let centro = aquenio;
        villano.setMag(random(height * .04, height * .06));
        villano = p5.Vector.add(centro, villano);
        return villano;
    }

    cantVillanos(){
        return random(10,30);
    }

    dibujaVillano(aquenio) {
        for(let i = 0; i < this.cantVillanos(); i++) {
            let villano = this.villano(aquenio);
            garabato(aquenio.x, aquenio.y, villano.x, villano.y, 3, 2);
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
        if (i < pasos - 1) {
            curveVertex(x1 += pasoX + random(-desvio, desvio), y1 += pasoY + random(-desvio, desvio));
        } else {
            curveVertex(x2, y2);
            curveVertex(x2, y2);
        }
    }
    endShape();
}
