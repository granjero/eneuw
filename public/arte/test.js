function setup() {
    windowWidth >= windowHeight
        ? createCanvas(windowHeight, windowHeight)
        : createCanvas(windowWidth, windowWidth);
    frameRate(1);
    noLoop();
}

function draw() {
    let cmp = new Composicion();
    background(cmp.colorDeFondo());
    cmp.circuloNegro();
    let pi = cmp.lineaNegraPI();
    let pf = cmp.lineaNegraPF();
    // PInicial Azul
    strokeWeight(10);
    stroke(100, 100, 255);
    point(pi.x, pi.y);
    // linea entre 00 y pi
    strokeWeight(1);
    line(0, 0, pi.x, pi.y);
    // PFinal Verde
    strokeWeight(10);
    stroke(100, 255, 100);
    point(pf.x, pf.y);
    // linea entre 00 y pi
    strokeWeight(1);
    line(0, 0, pf.x, pf.y);

    // linea entre pi y pf
    stroke(0);
    strokeWeight(1);
    line(pi.x, pi.y, pf.x, pf.y);

    console.log("PIazul: " + pi.heading() + "vector: " + pi);
    console.log("PFverde: " + pf.heading() + "vector: " + pf);

    //let vector = p5.Vector.sub(pf, pi);
    let perpendicular = p5.Vector.fromAngle(
        p5.Vector.sub(pf, pi).heading() + HALF_PI
    );
    perpendicular.setMag(100);
    strokeWeight(10);
    stroke(255, 255, 100);
    //point(vector.x, vector.y);
    //p5.Vector.sub(pi, pf).heading()
    strokeWeight(1);
    stroke(100, 255, 100);
    //console.log("Vamarillo: " + vector.heading() + "vector: " + vector);
    //line(0, 0, vector.x, vector.y);

    console.log(
        "Perpendicular: " + perpendicular.heading() + "vector: " + perpendicular
    );
    stroke(100, 55, 255);
    line(pi.x, pi.y, pi.x - perpendicular.x, pi.y - perpendicular.y);
    line(pf.x, pf.y, pf.x - perpendicular.x, pf.y - perpendicular.y);
    line(
        pi.x - perpendicular.x,
        pi.y - perpendicular.y,
        pf.x - perpendicular.x,
        pf.y - perpendicular.y
    );
}

class Composicion {
    constructor() {
        this.centroCanvas = new p5.Vector(width / 2, height / 2);
        this.centroCN = this.centroCirculoNegro();
        this.diamCN = this.diametroCirculoNEgro();
        this.anchoTrazoCN = this.anchoTrazoCirculoNegro();
    }

    colorDeFondo() {
        return [
            random(220, 230),
            floor(random(200, 220)),
            floor(random(200, 220)),
        ];
    }

    centroCirculoNegro() {
        let circulo = p5.Vector.random2D();
        circulo.setMag(random(width * 0.1));
        return p5.Vector.add(this.centroCanvas, circulo);
    }

    diametroCirculoNEgro() {
        return random(width * 0.7, width * 0.75);
    }

    anchoTrazoCirculoNegro() {
        return random(width * 0.033, width * 0.055);
    }

    circuloNegro() {
        noFill();
        stroke(0, 215);
        strokeWeight(this.anchoTrazoCirculoNegro());
        circle(this.centroCN.x, this.centroCN.y, this.diamCN);
        stroke(255, 100, 100);
        point(this.centroCN.x, this.centroCN.y);
        stroke(0);
    }

    anchoLineaNerga() {
        return floor(random(1, 3));
    }

    lineaNegraPI() {
        let pi = p5.Vector.random2D();
        pi.setMag(random(this.diamCN * 0.45));
        return p5.Vector.add(this.centroCN, pi);
    }

    lineaNegraPF() {
        let pf = p5.Vector.random2D();
        pf.setMag(this.diamCN * 0.45);
        return p5.Vector.add(this.centroCN, pf);
    }

    cantLineas() {
        //return floor(random(1, 3));
        return 5;
    }

    largoLinea(pi, pf) {}

    lineas() {}
}
