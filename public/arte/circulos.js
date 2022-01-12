let segundos = 0;

function setup() {
    windowWidth >= windowHeight
        ? createCanvas(windowHeight, windowHeight)
        : createCanvas(windowWidth, windowWidth);
    frameRate(1);
}

function draw() {
    if (segundos % 10 == 0) {
        segundos = 1;
        let cmp = new Composicion();
        cmp.arte();
    }
    segundos++;
}

class Composicion {
    constructor() {
        this.centroCanvas = new p5.Vector(width / 2, height / 2);
        this.centroCN = this.centroCirculoNegro();
        this.diamCN = this.diametroCirculoNegro();
        this.anchoTrazoCN = this.anchoTrazoCirculoNegro();
        this.ultimoCentro = this.centroCN;
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
    }

    anchoTrazoBordeCirculo() {
        return floor(random(2, 7));
    }

    centroCirculo(diam) {
        let pi = p5.Vector.random2D();
        pi.setMag(random(this.diamCN * 0.45 - diam * 0.5));
        let centro = p5.Vector.add(this.centroCN, pi);
        let resta = p5.Vector.sub(centro, this.ultimoCentro);
        // evita que los circulos se hagan muy pegados.
        while(Math.abs(resta.x) < this.diamCN * .25 &&  Math.abs(resta.y) < this.diamCN * .25) {
            pi = p5.Vector.random2D();
            pi.setMag(random(this.diamCN * 0.45 - diam * 0.5));
            centro = p5.Vector.add(this.centroCN, pi);
            resta = p5.Vector.sub(centro, this.ultimoCentro);
        }
        console.log(this.ultimoCentro);
        return this.ultimoCentro = p5.Vector.add(this.centroCN, pi);
    }

    colorCirculo() {
        return [
            floor(random(255)),
            floor(random(255)),
            floor(random(255)),
            floor(random(80, 150)),
        ];
    }

    tamanioCirculo(tamanio) {
        switch (tamanio) {
            case 'grande':
                return random(this.diamCN / 4, this.diamCN / 3);

            case 'mediano':
                return random(this.diamCN / 6, this.diamCN / 5);

            case 'chico':
                return random(this.diamCN / 8, this.diamCN / 7);

            case 'muy_chico':
                return random(this.diamCN / 15, this.diamCN / 13);

            case 'infimo':
                return random(this.diamCN / 30, this.diamCN / 25);

            default:
                return 0;
        }
    }

    circuloInterior(tamanioCirculo, conBorde = false) {
        //let diam = random(this.diamCN / 4, this.diamCN / 3.5);
        let diam = this.tamanioCirculo(tamanioCirculo);
        let centro = this.centroCirculo(diam);
        let color = this.colorCirculo();
        let bordeNegro = Math.random() < 0.5;
        strokeWeight(0);
        if (conBorde) {
            strokeWeight(this.anchoTrazoBordeCirculo());
            bordeNegro
                ? stroke(0)
                : stroke(color[0], color[1], color[2], color[3]);
        }
        fill(color[0], color[1], color[2], color[3]);
        circle(centro.x, centro.y, diam);
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

    linea(cant = 1) {
        stroke(0);
        for (let i = 0; i < cant; i++) {
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

    // retorna un vector unitario perpendicular al segmento pi pf
    vectorPerpendicular(pi, pf) {
        return p5.Vector.fromAngle(p5.Vector.sub(pf, pi).heading() + HALF_PI);
    }

    // retorna un vector unitario paralelo al segmento pi pf
    vectorParalelo(pi, pf) {
        return createVector(p5.Vector.sub(pf, pi).x, p5.Vector.sub(pf, pi).y);
    }

    cantLineas() {
        return floor(random(2, 4));
    }

    lineas(cant = 1) {
        stroke(0);
        for (let i = 0; i < cant; i++) {
            strokeWeight(this.anchoTrazoLineaNerga());
            let pi = this.lineaNegraPI();
            let pf = this.lineaNegraPF();

            while (pi.dist(pf) < this.diamCN * 0.5) {
                pi = this.lineaNegraPI();
                pf = this.lineaNegraPF();
            }


            let modificador = this.vectorPerpendicular(pi, pf);
            modificador.setMag(this.magnitudPerpendicular());

            for (let i = 0; i < this.cantLineas(); i++) {
                line(pi.x, pi.y, pf.x, pf.y);

                pi.x = pi.x - modificador.x;
                pi.y = pi.y - modificador.y;
                pf.x = pf.x - modificador.x * this.tuerceUnPoco();
                pf.y = pf.y - modificador.y * this.tuerceUnPoco();
            }

            if (random(1) >= 0.5) {
                this.lineasPerpendiculares(pi, pf);
            }
        }
    }

    lineasPerpendiculares(pi, pf) {
        let vectorParalelo = this.vectorParalelo(pi, pf);
        let vectorPerpendicular = this.vectorPerpendicular(pi, pf);
        vectorParalelo.setMag(random(width * .07, width * .15));
        for (let i = 0; i < this.cantLineas(); i++) {
            vectorPerpendicular.setMag(random(width * .07, width * .15));
            line(
                pi.x + vectorPerpendicular.x + vectorParalelo.x,
                pi.y + vectorPerpendicular.y + vectorParalelo.y,
                pi.x - vectorPerpendicular.x + vectorParalelo.x,
                pi.y - vectorPerpendicular.y + vectorParalelo.y
            );
            vectorParalelo.x += random(width * .007, width * .015);
            vectorParalelo.y += random(width * .007, width * .015);
        }
    }

    arte() {
        background(this.colorDeFondo());
        this.lineaAmarilla();
        this.lineaVerde();
        this.circuloNegro();

        for (let i = 0; i < 3; i++) {
            this.circuloInterior('grande', true);
        }
        for (let i = 0; i < 2; i++) {
            this.circuloInterior('mediano', false);
        }
        for (let i = 0; i < 2; i++) {
            this.circuloInterior('chico', true);
            this.circuloInterior('chico', false);
        }
        this.lineas(2);
        for (let i = 0; i < 2; i++) {
            this.circuloInterior('muy_chico', true);
            this.circuloInterior('muy_chico', false);
        }
        this.linea(2);
        this.lineas(1);
        for (let i = 0; i < 4; i++) {
            this.circuloInterior('infimo', true);
            this.circuloInterior('infimo', false);
        }
        this.linea(2);
        this.lineas(1);
    }
}
