function showMenu() {
    // let menu = document.querySelector('#menu');
    let additionalBlurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

    blurBackground(additionalBlurred);
    appearSmoothly(overlayMenu);
}

function hideMenu() {
    let additionalUnblurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

    unblurBackground(additionalUnblurred);
    disappearSmoothly(overlayMenu);
}

function appearSmoothly(e) {
    // 
    e.classList.add("appearing");
    e.classList.remove("hide");
    setTimeout(function () {
        e.classList.remove("appearing");
    }, 300);
}

function disappearSmoothly(e) {
    // 
    e.classList.add("disappearing");
    setTimeout(function () {
        e.classList.add("hide");
        e.classList.remove("disappearing");
    }, 300);
}

let overlayMenu = document.querySelector('#menu');
let except = document.querySelector('#menu-options');

overlayMenu.addEventListener("click", function () {
    alert("wrapper");
}, false);
except.addEventListener("click", function (event) {
    alert("except");
    event.stopPropagation(); //this is important! If removed, you'll get both alerts
}, false);


// weg, wenn außerhalb bestimmter divs geklickt https://www.reddit.com/r/javascript/comments/461f0y/body_onclick_except_certain_divs/let burger = document.querySelector('#');

/*
blurBackground(addBlurringEles);
setTimeout(function () {
    unblurBackground(addBlurringEles);
    setTimeout(function () {
        blurBackground(addBlurringEles);
    }, 5000);
}, 5000);
*/