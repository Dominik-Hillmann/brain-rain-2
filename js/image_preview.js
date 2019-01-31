/**** Functions ****/
function hidePic() {
    // closes the image preview
    let currShown = document.querySelector("#currently-shown");
    currShown.classList.add("disappearing");

    setTimeout(function () {
        currShown.classList.add("hide");
        currShown.classList.remove("disappearing");
    }, 300); // animations has to be 300ms long
}

function unhidePic(picLink) {
    // opens the image preview, picLink is the location of the picture in the file system
    let currShown = document.querySelector("#currently-shown");
    let mainPic = currShown.querySelector("#the-main-pic");
    mainPic.src = picLink;

    currShown.classList.add("appearing");
    currShown.classList.remove("hide");
    setTimeout(function () {
        currShown.classList.remove("appearing");
        
        let currPicIndex = allPicsArr.findIndex((e) => e == currPic);
        setPicInfo(
            allPicsInfo[currPicIndex].name,
            allPicsInfo[currPicIndex].description
        );
        
        updateArrowHeights(); // because
    }, 300);
}

function nextPic() {
    // shows the next picture in row of the current website
    let currPicIndex = allPicsArr.findIndex((e) => e == currPic);
    let nextPicIndex = (currPicIndex + 1 >= allPicsArr.length) ? 0 : currPicIndex + 1;

    let mainPic = document.querySelector("#the-main-pic");
    mainPic.classList.add("disappearing");

    setTimeout(function () {
        currPic = allPicsArr[nextPicIndex];
        style = currPic.currentStyle || window.getComputedStyle(currPic, false);
        backImgURL = style.backgroundImage.slice(4, -1).replace(/"/g, "");
        mainPic.src = backImgURL;
        setPicInfo(
            allPicsInfo[nextPicIndex].name,
            allPicsInfo[nextPicIndex].description
        );
        // animation
        mainPic.classList.add("appearing");
        mainPic.classList.remove("disappearing");
        mainPic.classList.remove("appearing");

        updateArrowHeights();
    }, 295); // a bit shorter to not have the clipping effect
}

function prevPic() {
    // 
    let currPicIndex = allPicsArr.findIndex((e) => e == currPic);
    let nextPicIndex = (currPicIndex - 1 < 0) ? allPicsArr.length - 1 : currPicIndex - 1;

    let mainPic = document.querySelector("#the-main-pic");
    mainPic.classList.remove("appearing");
    mainPic.classList.add("disappearing");

    setTimeout(function () {
        currPic = allPicsArr[nextPicIndex];
        style = currPic.currentStyle || window.getComputedStyle(currPic, false);
        backImgURL = style.backgroundImage.slice(4, -1).replace(/"/g, "");
        mainPic.src = backImgURL;
        setPicInfo(
            allPicsInfo[nextPicIndex].name,
            allPicsInfo[nextPicIndex].description
        );
        // animation
        mainPic.classList.add("appearing");
        mainPic.classList.remove("disappearing");
        mainPic.classList.remove("appearing");
        
        updateArrowHeights();
    }, 295); // a bit shorter to not have the clipping effect
}

function blurBackground(additional = []) {
    // blurs footer and header by default
    // additional Elements can be blurred, too, by including additional elements
    let toBeBlurred = [
        document.querySelector("header"),
        document.querySelector("footer"),
        Array.from(document.querySelectorAll(".row")),
        additional
    ].flat().filter((e) => e != null);

    for (let e of toBeBlurred) {
        e.classList.add("blur");
    }
}

function unblurBackground(additional = []) {
    // 
    let toBeUnBlurred = [
        document.querySelector("header"),
        document.querySelector("footer"),
        Array.from(document.querySelectorAll(".row")),
        additional
    ].flat().filter((e) => e != null);

    for (let e of toBeUnBlurred) {
        e.classList.add("unblur");
    }
    setTimeout(() => {
        for (let e of toBeUnBlurred) {
            e.classList.remove("blur");
            e.classList.remove("unblur");
        }
    }, 295);
}


function updateArrowHeights() {
    // 
    let arrows = document.querySelectorAll(".arrow");
    let textHeight = document.querySelector("#curr-pic-info-wrapper").offsetHeight;

    for (let arrow of arrows) {
        arrow.style.height = textHeight + "px";
    }
}

function setPicInfo(title, description) {
    // 
    currPicDescription.innerHTML = description;
    currPicName.innerHTML = title;
}

function scrollToMainPic() {
    // scrolls to main pic when pic gets clicked
    let mainPic = document.querySelector('#currently-shown');
    mainPic.scrollIntoView({
        block: 'start',
        behavior: 'smooth'
    });
}


/**** Global Variables ****/
let currPic; // initialized when picture is clicked
let currPicIndex = 0;

// get all pictures and the information about them from a hidden div
let allPicsArr = Array.from(document.querySelectorAll(".pic"));
let allPicsInfo = [];
for (let info of Array.from(document.querySelectorAll('.hidden-pic-info'))) {
    allPicsInfo.push({
        name: info.querySelector('h1').innerHTML,
        description: info.querySelector('p').innerHTML,
    });
}

if (allPicsArr.length != allPicsInfo.length) {
    throw new Error("Unequal amount of pics and descriptions.");
}

// initialize variables that will contain information, etc.
// only if this is an image page
let path = window.location.pathname;
let docName = path.split('/').pop();
let pagesWithImagePreview = ['photography.php'];

// if (pagesWithImagePreview.includes(docName)) {
    let tempPicInfo = document.querySelector('#curr-pic-info');
    let currPicDescription = tempPicInfo.querySelector('p');
    let currPicName = tempPicInfo.querySelector('h1');
// }
let waveDivision = document.querySelector('#thin-wave');

// Closing of image preview if clicked anywhere but on description and arrows
// wird geschlossen, wenn außerhalb von Pfeilen, Beschreibung oder Bild geklickt

// if (pagesWithImagePreview.includes(docName)) {
    let overlayPreview = document.querySelector('#currently-shown');
    overlayPreview.addEventListener('click', () => {
        hidePic();
        unblurBackground(waveDivision);
    }, false);

    // Ausnahmen
    let propStop = (event) => event.stopPropagation();
    let arrows = document.querySelectorAll('.arrow');
    let leftArrow = arrows[0];
    let rightArrow = arrows[1];

    leftArrow.addEventListener('click', propStop, false);
    rightArrow.addEventListener('click', propStop, false);
    tempPicInfo.addEventListener('click', propStop, false);
// }
