/**
 * 
 */

// Seperate document to handle everything that has to do with
// resizing dependet on the document's name.
let eyecatcherNode = document.querySelector('#eyecatcher');
let welcomeNode = document.querySelector('#welcome-text-wrapper');
let backgroundImg = document.querySelector('#eyecatcher-background');

console.log(welcomeNode, eyecatcherNode, backgroundImg);

let adjustEyecatcherHeight = () => {
    if (eyecatcherNode.offsetWidth < 800) {
        eyecatcherNode.style.height = (welcomeNode.offsetHeight + 500) + 'px';
    } else {
        eyecatcherNode.style.height = (backgroundImg.offsetHeight + 50) + 'px';
    }
}


let eyecatcherSites = ['index.php', ''];
let docName = document.location
    .pathname
    .split('/')
    .pop();


window.onresize = () => {
    if (eyecatcherSites.includes(docName)) {
        // Adjusting the height of the whole eyecatcher, so I can fit the actual eyecatcher
        // under it.
        adjustEyecatcherHeight();
        // Here the width from which the bubbles in the eyecatcher can spawn. It is half the
        // screen if the screen more than 800px wide, else all of the width.
        calcWinWidth();
    }
}

adjustEyecatcherHeight();
calcWinWidth();
