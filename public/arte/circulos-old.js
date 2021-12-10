// SOFTWARE libre. Cite la fuente @juanmiguells

let cmp;
var dibujar = true;
var periodo = 30;
var ahora = 0;

// Setup corre una sola vez
function setup() {
    //pixelDensity(1);

    if (windowWidth >= windowHeight) {
        createCanvas(windowHeight, windowHeight);
    } else {
        createCanvas(windowWidth, windowWidth);
    }
    frameRate(1);
}

// Draw corre para siempre
function draw() {
    if (dibujar) {
        cmp = new Composicion();

        cmp.colorearFondo();
        cmp.lineasDeFondo();
        cmp.circuloNegro();
        for (var i = 0; i < floor(random(15, 25)); i++) {
            cmp.circuloInterior();
        }
        for (var j = 0; j < floor(random(5, 10)); j++) {
            cmp.lineasNegras();
        }
        dibujar = false;
    }

    if (frameCount - ahora > periodo) {
        dibujar = true;
        ahora = frameCount;
    }
}

function mouseReleased() {
    dibujar = true;
    ahora = frameCount;
}

class Composicion {

    constructor() {
        this.centroCN = p5.Vector.random2D();
        this.centroCN.setMag(random(width * 0.1));
        this.diamCN = random(width * 0.7, width * 0.75);
        this.anchoBordeCN = random(width * 0.033, width * 0.055);
        this.valorTranslate = createVector(width * 0.5 + this.centroCN.x, height * 0.5 + this.centroCN.y);
        this.diamCircInt = 0;
    }

    colorearFondo() {
        var r, g, b;
        r = floor(random(220, 230));
        g = floor(random(200, 220));
        b = floor(random(190, 215));
        background(color(r, g, b));
    }

    lineasDeFondo() {
        var r, g, b, alpha;

        r = floor(random(210, 230));
        g = floor(random(180, 210));
        b = floor(random(115, 130));
        alpha = floor(random(190, 210));

        beginShape();
        fill(color(r, g, b, alpha));
        noStroke();
        vertex(0, height); // 1
        vertex(0, random(height * 0.6, height)); // 2
        vertex(random(width * 0.75, width * 0.85), 0); // 3
        vertex(random(width * 0.85, width * 0.95), 0); // 4
        vertex(random(width * 0.2), height); // 5
        endShape();

        r = floor(random(70, 100));
        g = floor(random(140, 180));
        b = floor(random(130, 150));
        alpha = floor(random(190, 210));

        beginShape();
        fill(color(r, g, b, alpha));
        noStroke();
        vertex(width, height); // 1
        vertex(width, random(height * 0.6, height)); // 2
        vertex(random(width * 0.3, width * 0.45), 0); // 3
        vertex(random(width * 0.2, width * 0.3), 0); // 4
        vertex(random(width * 0.9, width), height); // 5
        endShape();
    }

    circuloNegro() {
        stroke(0, 215);
        strokeWeight(this.anchoBordeCN);
        noFill();
        push();
        //var x = valorTranslate.x;
        translate(this.valorTranslate.x, this.valorTranslate.y);
        circle(0, 0, this.diamCN);
        pop();
    }

    circuloInterior() {
        // Vector con el centro del circulo a dibujar
        let centroCircInt = p5.Vector.random2D();

        var r, g, b, alpha;

        r = floor(random(255));
        g = floor(random(255));
        b = floor(random(255));
        alpha = floor(random(80, 150));

        if (random(1) < 0.5) // 10%
        {
            noStroke();
        } else {
            stroke(0);
            strokeWeight(floor(random(0, 6)));
        }

        // diametro y centro del circulo
        if (random(1) < 0.05) // 5%
        {
            this.diamCircInt = random(width * 0.26, width * 0.4);
            centroCircInt.setMag(random(0, (this.diamCN * 0.5) - (this.diamCircInt * 0.5) - (this.anchoBordeCN * 0.5)));
        } else if (random(1) < 0.55) // 60%
        {
            this.diamCircInt = random(width * 0.066, width * 0.2);
            centroCircInt.setMag(random(0, (this.diamCN * 0.5) - (this.diamCircInt * 0.5) - (this.anchoBordeCN * 0.5)));
        } else {
            this.diamCircInt = random(width * 0.013, width * 0.053);
            centroCircInt.setMag(random(0, (this.diamCN * 0.5) - (this.diamCircInt * 0.5) - (this.anchoBrdeCN * 0.5)));
        }

        push();
        translate(this.valorTranslate.x, this.valorTranslate.y);
        fill(color(r, g, b, alpha));
        circle(centroCircInt.x, centroCircInt.y, this.diamCircInt);
        pop();
    }

    lineasNegras() {
        //Vector a, b, c, d, e;
        var anguloA;

        var anchoLinea = floor(random(0, 3));

        strokeWeight(anchoLinea);
        stroke(0);

        let a = p5.Vector.random2D();
        a.setMag(random(100, ((this.diamCN - (this.anchoBordeCN * 0.5)) * 0.5)));
        let b = p5.Vector.random2D();
        b.setMag(random(100, ((this.diamCN - (this.anchoBordeCN * 0.5)) * 0.5)));
        let c = p5.Vector.sub(b, a);
        push();
        translate(this.valorTranslate.x + a.x, this.valorTranslate.y + a.y);
        line(0, 0, c.x, c.y);

        anguloA = a.heading();
        let d = p5.Vector.fromAngle(anguloA);
        d.setMag(random(-10, -30));
        if (random(1) < 0.3) // 10%
        {
            push();
            translate(d.x, d.y);
            line(0, 0, c.x, c.y);
            translate(d.x, d.y);
            line(0, 0, c.x, c.y);
            pop();
        }
        if (random(1) < 0.7) // 10%
        {
            push();
            translate(d.x, d.y);
            line(0, 0, c.x, c.y);
            pop();
        }

        var perp = random(1) < 0.6 ? true : false;
        if (perp && c.mag() > 250) {
            push();
            var escala = random(3, 10);
            var cantidad = floor(random(3, 6));

            var dir = c.heading();
            let e = p5.Vector.fromAngle(dir);
            d = p5.Vector.fromAngle(dir);
            d.setMag(random(10, 30));
            d.rotate(HALF_PI + random(0.3));
            for (var i = 0; i < cantidad; i++) {
                e.setMag(escala);
                translate(e.x, e.y);

                d.rotate(PI);
                line(0, 0, d.x, d.y);
                d.setMag(random(10, 30));
                d.rotate(PI);
                line(0, 0, d.x, d.y);
            }
            pop();
        }
        pop();
    }
}
