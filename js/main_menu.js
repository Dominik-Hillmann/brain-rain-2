let showMenu = function () {
    // Lets the main menu appear smoothly.
    let additionalBlurred = [
        document.querySelector('#main'),
        document.querySelector('#about'),
        document.querySelector('#eyecatcher'),
        document.querySelector('#thin-wave')
    ].filter((e) => e != null);

    blurBackground(additionalBlurred);
    appearSmoothly(overlayMenu);
    overlayMenu.scrollIntoView({
        block: 'start',
        behavior: 'smooth'
    });

    menuHeading.classList.add('down');
}

let hideMenu = function () {
    // Lets the main menu disappear smoothly.
    let additionalUnblurred = [
        document.querySelector('#main'),
        document.querySelector('#about'),
        document.querySelector('#eyecatcher'),
        document.querySelector('#thin-wave')
    ].filter((e) => e != null);

    unblurBackground(additionalUnblurred);
    disappearSmoothly(overlayMenu);
}

let appearSmoothly = function (e) {
    // If element e is currently hidden, it will smoothly fade in.
    e.classList.add('appearing');
    e.classList.remove('hide');
    setTimeout(function () {
        e.classList.remove('appearing');
    }, 300);
}

let disappearSmoothly = function (e) {
    // If element e isn't currently hidden, it will disappear smoothly.
    e.classList.add('disappearing');
    setTimeout(function () {
        e.classList.add('hide');
        e.classList.remove('disappearing');
    }, 300);
}

let overlayMenu = document.querySelector('#menu');
let options = except = document.querySelector('#menu-options');
let menuHeading = document.querySelector('#menu-heading');

overlayMenu.addEventListener('click', hideMenu, false);
except.addEventListener('click', (event) => event.stopPropagation(), false);


let changeLetterColors = function (option) {
    // color change animation for the options
    let spans = option.querySelectorAll('span');
    let delay = 50; // how long between starts of the letter animations
    let animationLen = 400; // to be found in menu.css

    for (let i = 0; i < spans.length; i++) {
        let span = spans[i];
        let startTime = i * delay;

        // add class to span when 
        setTimeout(function () {
            if (!span.classList.contains('letter-changed')) {
                span.classList.add('letter-changed');
            }
        }, startTime);

        // remove the class at the end of the animation
        setTimeout(function () {
            span.classList.remove('letter-changed');
        }, startTime + animationLen); // animation ends exactly in startTime + animationLen ms
    }
}
