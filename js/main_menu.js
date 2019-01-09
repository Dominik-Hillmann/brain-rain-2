function showMenu() {
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

function hideMenu() {
    // Lets the main menu disappear smoothly.
    let additionalUnblurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

    unblurBackground(additionalUnblurred);
    disappearSmoothly(overlayMenu);
}

function appearSmoothly(e) {
    // If element e is currently hidden, it will smoothly fade in.
    e.classList.add('appearing');
    e.classList.remove('hide');
    setTimeout(function () {
        e.classList.remove('appearing');
    }, 300);
}

function disappearSmoothly(e) {
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
