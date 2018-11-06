function pxToFloat(pxStr) {
    if (pxStr.substring(pxStr.length - 2, pxStr.length) != "px") {
        throw new Error("pxStr is not a string containing 'px' at the end.");
    } else {
        return parseFloat(pxStr.substring(0, pxStr.length - 3));
    }
}

function centerLogo() {

    let logoMarginLeft = pxToFloat(window.getComputedStyle(logo).marginLeft);
    let leftWidth = pxToFloat(window.getComputedStyle(left).width);
    let rightWidth = pxToFloat(window.getComputedStyle(right).width);

    // console.log(logoMarginLeft);
    // console.log(leftWidth);

    console.log(window.getComputedStyle(logo));

    // logo.style.marginLeft = (logoMarginLeft + rightWidth) + "px";
    // console.log(leftWidth - rightWidth);


//     "margin-left": "587.767px"
// ​
// "margin-right": "424.933px"
// marginLeft: "587.767px"
// ​
// marginRight: "424.933px"
}


let menu = document.querySelector("#firstmenu");
let logo = menu.querySelectorAll("img")[1];
let left = menu.querySelector("#path");
let right = menu.querySelector("#number");

window.onload = function () {
    centerLogo();
}
