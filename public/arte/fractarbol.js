let largoRama;

function setup() {
    createCanvas(windowWidth, windowHeight);
    largoRama = windowHeight * 0.25;
    //frameRate(1);
    //noLoop();
}

function draw() {
    background(50);
    stroke(255, 255, 255);
    //strokeWeight(2);
    translate(width / 2, height);
    rama(largoRama);
}

function rama(largoRama) {
    line(0, 0, 0, -largoRama);
    translate(0, -largoRama);
    if (largoRama > 10) {
        push();
        rotate(anguloRaton());
        rama(largoRama * 0.75);
        pop();
        push();
        rotate(-anguloRaton());
        rama(largoRama * 0.75);
        pop();
    }
}

function anguloRaton() {
    return map(mouseY, 0, height, 0, PI / 4);
}
