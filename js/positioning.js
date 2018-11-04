function centerLogo() {
    let menu = document.querySelector("#firstmenu");
    let logo = menu.querySelectorAll("img")[1];
    let style = window.getComputedStyle(logo);
    console.log(style.marginLeft);
    console.log(style.marginRight);
    // width des Elternelement
    // width links und rechts
    // margins so setzen, dass Gehirn in der Mitte ist
}




window.onload = function () {
    console.log("da");
    centerLogo();
}
