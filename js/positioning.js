let pxToFloat = function (pxStr) {
    if (pxStr.substring(pxStr.length - 2, pxStr.length) != "px") {
        throw new Error("'" + pxStr + "' is not a string ending with 'px'.");
    } else {
        return parseFloat(pxStr.substring(0, pxStr.length - 2));
    }
}

// function centerLogo() {
//     // for some reason, the margin set on "auto" uses the elements left and right
//     // in the menu instead of outer border of the menu itself
//     let logoWidth = pxToFloat(window.getComputedStyle(logo).width);
//     let menuWidth = pxToFloat(window.getComputedStyle(menu).width);

//     let margin = ((menuWidth - logoWidth) / 2) + "px";
//     logo.style.marginRight = margin;
//     logo.style.marginLeft = margin;
// }


// let menu = document.querySelector("#firstmenu");
// let logo = menu.querySelectorAll("img")[1];
// let left = menu.querySelector("#path");
// let right = menu.querySelector("#number.menufloater");

// window.onload = function () {
//     centerLogo();
// }

// window.addEventListener("resize", centerLogo);
