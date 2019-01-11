let showMenu = function () {
    // Lets the main menu appear smoothly.
    let additionalBlurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

    blurBackground(additionalBlurred);
    appearSmoothly(overlayMenu);
    overlayMenu.scrollIntoView({
        block: 'start',
        behavior: 'smooth'
    });
}

let hideMenu = function () {
    // Lets the main menu disappear smoothly.
    let additionalUnblurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

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
let except = document.querySelector('#menu-options');

overlayMenu.addEventListener('click', hideMenu, false);
except.addEventListener('click', (event) => event.stopPropagation(), false);

// color change animation for the options
let changeLetterColors = function (option) {
    let spans = Array.from(option.querySelector('span'));
    for (let span of spans) {
        span.classList.add('letter-changed');
    }
}


let design = document.querySelector('#menu-options div p:first-child');
// design.addEventListener('mouseover', function() {
//     console.log(this);
// }, false);
console.log(design);
//# this scope
//"mouseover"
