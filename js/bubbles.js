// Ziel: erstelle kleine Kugeln an zufälligen Stellen, die nach oben blubbern und von der Mausposition in
// ihrer vertikalen Position beeinflusst werden.

// 1. Füge Bubbles ein
// 2. Lasse diese steigen, unten opacity = 0, oben 1.0, zerstöre sie oben
    // zufällige Geschwindigkeit
// 3. Beeinflussung durch Mausposition

// später minimale Beeinflussung der Postition großer Elemente durch Scrollposition

function getRand(min, max, int) {
    let rand = Math.random() * (max - min)
    return int ? Math.floor(rand) + min : rand + min;
}
const numBubbleTypes = 2; // how many CSS classes for different bubbles there are
let winWidth = window.innerWidth || document.body.clientWidth;
let eyeCatcherNode = document.querySelector('#eyecatcher');
// random Größe (CSS)
// random Farbe (src)
// random Geschwindigkeit (Animation, extra Animationsklasse?)

for (let i = 0; i < 10; i++) {
    let bubble = document.createElement('img');
    bubble.src = './img/white_circle.png';
    bubble.classList.add('bubble');

    let animationTime = getRand(10, 25, true);

    bubble.classList.add('bubble-' + getRand(1, numBubbleTypes, true));
    bubble.style.right = getRand(0, 0.5 * winWidth, false) + 'px';
    bubble.style.bottom = getRand(0, 200, false) + 'px';
    bubble.style.height = getRand(1, 7, true) + 'px';
    bubble.style.animation = 'bubble-up ' + animationTime + 's ease-in-out';

    eyeCatcherNode.appendChild(bubble);
    console.log(bubble);

    setTimeout(
        () => bubble.remove(), 
        animationTime * 1000 // * 1000 because ms
    );
}