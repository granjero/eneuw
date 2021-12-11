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
    cmp.lineaAmarilla();
    cmp.lineaVerde();
    cmp.circuloNegro();
    cmp.linea(4);
    cmp.lineas();
    cmp.lineas();
    cmp.lineas();
    cmp.lineas();
    cmp.lineas();
    cmp.lineas();
}

class Composicion {
    constructor() {
        this.centroCanvas = new p5.Vector(width / 2, height / 2);
        this.centroCN = this.centroCirculoNegro();
        this.diamCN = this.diametroCirculoNegro();
        this.anchoTrazoCN = this.anchoTrazoCirculoNegro();
    }

    colorDeFondo() {
        return [
            random(220, 230),
            floor(random(200, 220)),
            floor(random(200, 220)),
        ];
    }

    colorLineaAmariila() {
        return [
            floor(random(210, 230)),
            floor(random(180, 210)),
            floor(random(115, 130)),
            floor(random(190, 210)),
        ];
    }

    lineaAmarilla() {
        beginShape();
        fill(color(this.colorLineaAmariila()));
        noStroke();
        vertex(0, height); // 1
        vertex(0, random(height * 0.6, height)); // 2
        vertex(random(width * 0.75, width * 0.85), 0); // 3
        vertex(random(width * 0.85, width * 0.95), 0); // 4
        vertex(random(width * 0.2), height); // 5
        endShape();
    }

    colorLineaVerde() {
        return [
            floor(random(70, 100)),
            floor(random(140, 180)),
            floor(random(130, 150)),
            floor(random(190, 210)),
        ];
    }

    lineaVerde() {
        beginShape();
        fill(color(this.colorLineaVerde()));
        noStroke();
        vertex(width, height); // 1
        vertex(width, random(height * 0.6, height)); // 2
        vertex(random(width * 0.3, width * 0.45), 0); // 3
        vertex(random(width * 0.2, width * 0.3), 0); // 4
        vertex(random(width * 0.9, width), height); // 5
        endShape();
    }

    centroCirculoNegro() {
        let circulo = p5.Vector.random2D();
        circulo.setMag(random(width * 0.1));
        return p5.Vector.add(this.centroCanvas, circulo);
    }

    diametroCirculoNegro() {
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
        //stroke(255, 100, 100);
        //point(this.centroCN.x, this.centroCN.y);
        //stroke(0);
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
        pf.setMag(random(this.diamCN * 0.45));
        return p5.Vector.add(this.centroCN, pf);
    }

    anchoTrazoLineaNerga() {
        return floor(random(1, 3));
    }

    linea(cant) {
        for (let i = 0; i <= cant; i++) {
            strokeWeight(this.anchoTrazoLineaNerga());
            let pi = this.lineaNegraPI();
            let pf = this.lineaNegraPF();
            while (pi.dist(pf) < this.diamCN * 0.2) {
                pi = this.lineaNegraPI();
                pf = this.lineaNegraPF();
            }
            line(pi.x, pi.y, pf.x, pf.y);
        }
    }

    magnitudPerpendicular() {
        return random(width * 0.009, width * 0.015);
        //return 10;
    }

    tuerceUnPoco() {
        return random(2);
    }

    perpendicular(pi, pf) {
        let perpendicular = p5.Vector.fromAngle(
            p5.Vector.sub(pf, pi).heading() + HALF_PI
        );
        perpendicular.setMag(this.magnitudPerpendicular());
        return perpendicular;
    }

    cantLineas() {
        return floor(random(2, 4));
    }

    lineas() {
        strokeWeight(this.anchoTrazoLineaNerga());
        let pi = this.lineaNegraPI();
        let pf = this.lineaNegraPF();

        while (pi.dist(pf) < this.diamCN * 0.5) {
            pi = this.lineaNegraPI();
            pf = this.lineaNegraPF();
        }

        let perpendicular = this.perpendicular(pi, pf);

        for (let i = 0; i < this.cantLineas(); i++) {
            line(pi.x, pi.y, pf.x, pf.y);

            pi.x = pi.x - perpendicular.x;
            pi.y = pi.y - perpendicular.y;
            pf.x = pf.x - perpendicular.x * this.tuerceUnPoco();
            pf.y = pf.y - perpendicular.y * this.tuerceUnPoco();
        }
    }
}
