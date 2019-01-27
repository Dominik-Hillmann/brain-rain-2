function getRand(min, max, int) {
    // random numbers between min and max, returns an integer if int == true
    let rand = Math.random() * (max - min);
    return (int ? Math.floor(rand) : rand) + min;
}
// window width to dertermine where bubbles are supposed to spawn
let winWidth;
let calcWinWidth = () => winWidth = window.innerWidth || document.body.clientWidth;
calcWinWidth();
window.onresize = calcWinWidth;
// parent of the bubbles
let eyeCatcherNode = document.querySelector('#eyecatcher');

function bubbleAnimation() {
    let numBubbles = getRand(1, 7, true);

    for (let i = 0; i < numBubbles; i++) {
        let animationDuration = getRand(10, 25, true);
        // create DOM element
        let bubble = document.createElement('img');
        bubble.src = './img/white_circle.png';
        // random styles for the bubble
        bubble.classList.add('bubble');
        bubble.style.right = getRand(0, 0.5 * winWidth, false) + 'px';
        bubble.style.height = getRand(1, 8, true) + 'px';
        bubble.style.animation = 'bubble-up ' + animationDuration + 's'; // ease-in-out';
        // append and remove if its time is up
        eyeCatcherNode.appendChild(bubble);
        setTimeout(() => bubble.remove(), animationDuration * 1000); // * 1000 because ms
    }
}

bubbleAnimation();
setInterval(bubbleAnimation, 3500); // new bubbles every 3.5 seconds

// scroll down to sections if clicked on 'PORTFOLIO' button
let scrollToSelection = () => document.querySelector('#main').scrollIntoView({
    block: 'start',
    behavior: 'smooth'
});

// blurring of sections at bottom of the page
let sections = Array.from(document.querySelectorAll('#main > div > div'));
let blurClass = 'section-blurred';

for (let except of sections) {
    except.onmouseleave = () => {
        for (let section of sections) {
            section.classList.remove(blurClass);
        }
    }

    except.onmouseover = () => {
        for (let section of sections) {
            if (section != except) {
                section.classList.add(blurClass);
            }
        }
    }
}
