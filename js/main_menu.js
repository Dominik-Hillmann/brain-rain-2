function showMenu() {
    let menu = document.querySelector('#menu');
    let additionalBlurred = [
        document.querySelector('#main'),
        document.querySelector('#about')
    ];

    blurBackground(additionalBlurred);
    appearSmoothly(menu);
}

function hideMenu() {

}

function appearSmoothly(e) {
    // 
    e.classList.add("appearing");
    e.classList.remove("hide");
    setTimeout(function () {
        e.classList.remove("appearing");
    }, 300);
}

function disappearSmoothly() {
    
}


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