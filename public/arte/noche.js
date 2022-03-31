let ruido = 0;
let colorCielo = [240, 70, 30];
function setup() {
    createCanvas(800, 800);
    colorMode(HSB);
    strokeWeight(2);
    noLoop();
}

function draw() {
    background(colorCielo);
    estrellas();
    luna();
    montanias(15, 250, 300);
    montanias(20, 260, 360);
    montanias(25, 270, 410);
    montanias(35, 280, 460);
    circulo(width * 1.25, 300);
}

function estrellas() {
    let colores = [
        [244, 15, 100],
        [0, 11, 70],
        [275, 12, 100],
        [50, 8, 100],
    ];
    for (let i = 0; i < 2000; i++) {
        stroke(random(colores));
        strokeWeight(random(2));
        let estrella = createVector(random(width), random(height));
        point(estrella.x, estrella.y);
    }
}
function luna() {
    let x = random(width * 0.25, width * 0.75);
    let y = random(width * 0.15, width * 0.4);
    stroke(45, 35, 80);
    fill(45, 45, 100);
    circle(x, y, 45);
    noStroke();
    fill(colorCielo);
    circle(x + random(-10, 10), y + random(-10, 10), 45);
}

function montanias(alto, color, yOffset) {
    fill(color, random(58, 60), 50);
    stroke(color, 80, 50);
    strokeWeight(1);
    beginShape();
    vertex(0, height);
    for (let i = 0; i < width; i++) {
        let y = map(noise(ruido), 0, 1, 0, (height * alto) / 100);
        vertex(i, y + yOffset);
        ruido += 0.011;
    }
    vertex(width, height);
    endShape();
}

function circulo(radio, trazo) {
    stroke(230, 10, 80);
    noFill();
    strokeWeight(trazo);
    ellipse(width / 2, height / 2, radio);
}
