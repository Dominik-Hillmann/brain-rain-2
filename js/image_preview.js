function hidePic() {
    let currShown = document.querySelector("#currently-shown");
    currShown.classList.add("disappearing");

    // unblurBackground();

    setTimeout(function () {
        currShown.classList.add("hide");
        currShown.classList.remove("disappearing");
    }, 300); // animations has to 300ms long
}

function unhidePic(picLink) {
    let currShown = document.querySelector("#currently-shown");
    let mainPic = currShown.querySelector("#the-main-pic");
    mainPic.src = picLink;

    currShown.classList.add("appearing");
    currShown.classList.remove("hide");
    setTimeout(function () {
        currShown.classList.remove("appearing");
    }, 300);
}

function nextPic() {
    let currPicIndex = allPicsArr.findIndex(e => e == currPic);
    let nextPicIndex = (currPicIndex + 1 >= allPicsArr.length) ? 0 : currPicIndex + 1;

    let mainPic = document.querySelector("#the-main-pic");
    mainPic.classList.add("disappearing");

    setTimeout(function () {
        currPic = allPicsArr[nextPicIndex];
        style = currPic.currentStyle || window.getComputedStyle(currPic, false);
        backImgURL = style.backgroundImage.slice(4, -1).replace(/"/g, "");
        mainPic.src = backImgURL;
        // animation
        mainPic.classList.add("appearing");
        mainPic.classList.remove("disappearing");
        mainPic.classList.remove("appearing");        
    }, 295); // a bit shorter to not have the clipping effectct
}

function prevPic() {
    let currPicIndex = allPicsArr.findIndex(e => e == currPic);
    let nextPicIndex = (currPicIndex - 1 < 0) ? allPicsArr.length - 1 : currPicIndex - 1;

    let mainPic = document.querySelector("#the-main-pic");
    mainPic.classList.remove("appearing");
    mainPic.classList.add("disappearing");

    setTimeout(function () {
        currPic = allPicsArr[nextPicIndex];
        style = currPic.currentStyle || window.getComputedStyle(currPic, false);
        backImgURL = style.backgroundImage.slice(4, -1).replace(/"/g, "");
        mainPic.src = backImgURL;
        // animation
        mainPic.classList.add("appearing");
        mainPic.classList.remove("disappearing");
        mainPic.classList.remove("appearing");        
    }, 295); // a bit shorter to not have the clipping effect
}

function blurBackground() {
    let toBeBlurred = [
        document.querySelector("header"),
        document.querySelector("footer"),
        Array.from(document.querySelectorAll(".row"))
    ].flat();

    for (e of toBeBlurred) {
        e.classList.add("blur");
    }
}

function unblurBackground() {
    let toBeUnBlurred = [
        document.querySelector("header"),
        document.querySelector("footer"),
        Array.from(document.querySelectorAll(".row"))
    ].flat();

    for (e of toBeUnBlurred) 
        e.classList.add("unblur");
    
    setTimeout(function () {
        for (e of toBeUnBlurred) {
            e.classList.remove("blur");
            e.classList.remove("unblur");
        }
    }, 295);
}
/**
 * Bei Aufruf aus Auflistung
 *      wird currPic besetzt mit dem aktuellen Element
 *      es wäre möglich, alle wieder 
 */

let currPic; // defined if picture is clicked upon
let currPicIndex = 0;

allPicsArr = Array.from(document.querySelectorAll(".pic"));

let cross = document.querySelector("#cross");
cross.addEventListener("click", hidePic);
