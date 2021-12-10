function setup() {
    (windowWidth >= windowHeight) 
        ? createCanvas(windowHeight, windowHeight)
        : createCanvas(windowWidth, windowWidth);
    frameRate(1);
}

function draw() {
    let cmp = new Composicion;
    background(cmp.colorDeFondo());
    cmp.lineaAmarilla();
    cmp.lineaVerde();
    cmp.circuloNegro();
    cmp.linea();

}

class Composicion {

    centro = new p5.Vector(width/2, height/2);

    colorDeFondo() {
        return [random(220, 230),
            floor(random(200, 220)),
            floor(random(200, 220))];
    }

    colorLineaAmariila() {
        return [floor(random(210, 230)),
            floor(random(180, 210)),
            floor(random(115, 130)),
            floor(random(190, 210))];
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
        return [ floor(random(70, 100)),
            floor(random(140, 180)),
            floor(random(130, 150)),
            floor(random(190, 210))];
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

    anchoCirculoNegro() {
        return random(width * 0.033, width * 0.055);
    }

    diametroCirculoNEgro() {
        return random(width * 0.7, width * 0.75);
    }
    
    centroCirculoNegro() {
        let circulo = p5.Vector.random2D();
        circulo.setMag(random(width * .1));
        return p5.Vector.add(this.centro, circulo);
    }

    circuloNegro() {
        noFill();
        stroke(0, 215);
        strokeWeight(this.anchoCirculoNegro());
        circle(this.centroCirculoNegro().x, this.centroCirculoNegro().y, this.diametroCirculoNEgro());
    }

    anchoLineaNerga() {
        return floor(random(1,3))
    }

    lineaNegraPI() {
        let pi = p5.Vector.random2D();
        pi.setMag(random((this.diametroCirculoNEgro() - this.anchoCirculoNegro() * 2) * .5));
        return p5.Vector.add(this.centroCirculoNegro(), pi);
    }

    lineaNegraPF() {
        let pf = p5.Vector.random2D();
        pf.setMag(random((this.diametroCirculoNEgro() - this.anchoCirculoNegro() * 2) * .5));
        return p5.Vector.add(this.centroCirculoNegro(), pf);
    }

    linea() {
        strokeWeight(this.anchoLineaNerga());
        line(this.lineaNegraPI().x, this.lineaNegraPI().y, this.lineaNegraPF().x, this.lineaNegraPF().y);
    }
}
