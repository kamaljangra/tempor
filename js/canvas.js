const canvas = $("#canvas");
const ctx = canvas.getContext("2d");
canvas.width = $("header")[0].offsetWidth;
canvas.height = $("header")[0].offsetHeight;
let canAdd = false;
let padd = 0;

document.addEventListener("keypress", (e) => {
    if (e.key == "q") canAdd = !canAdd;
});
class particle {
    constructor(x, y, speed, size, color = "#000000") {
        this.x = x;
        this.y = y;
        this.speed = speed;
        this.dirX = randInt(-speed, speed, 0);
        this.dirY = randInt(-speed, speed, 0);
        this.size = size;
        this.color = color;
    }
    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
        ctx.fillStyle = this.color;
        ctx.fill();
    }
    update() {
        if (this.x + this.size > canvas.width || this.x - this.size < 0) {
            this.dirX = -this.dirX;
        }
        if (this.y + this.size > canvas.height || this.y - this.size < 0) {
            this.dirY = -this.dirY;
        }
        this.x += this.dirX;
        this.y += this.dirY;
        this.draw();
    }
}

// Render Particles
var particles = [];
function createParticle() {
    let x = randInt(0, canvas.width),
        y = randInt(0, canvas.height),
        speed = 1,
        size = 2;
    let par = new particle(x, y, speed, size);
    par.draw();
    particles.push(par);
}

function randInt(min, max, ex) {
    let r = () => Math.floor(Math.random() * (max - min + 1) + min);
    let n = r();
    if (ex!==null) while (ex===n) n = r();
    return n;
}

function connect() {
    for (let i = 0; i < particles.length; i++) {
        let p1 = particles[i];
        for (let j = 0; j < particles.length; j++) {
            let p2 = particles[j];
            let d = p2p_dis(p1, p2);
            let r = 7500;
            if (d < r) {
                ctx.strokeStyle = "black";
                ctx.lineWidth = 1;
                ctx.globalAlpha = (r - d) / r;
                ctx.beginPath();
                ctx.moveTo(p1.x, p1.y);
                ctx.lineTo(p2.x, p2.y);
                ctx.stroke();
                ctx.restore();
            }
        }
    }
}
function animate() {
    if (canAdd) {
        if (padd == 1) {
            padd = 0;
            createParticle();
        } else {
            padd++;
        }
    }
    requestAnimationFrame(animate);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < particles.length; i++) {
        const element = particles[i];
        element.update();
    }
    connect();
}
function p2p_dis(p1, p2) {
    return (p1.x - p2.x) ** 2 + (p1.y - p2.y) ** 2;
}
for (let i = 0; i < 75; i++) {
    createParticle();
}
animate();
