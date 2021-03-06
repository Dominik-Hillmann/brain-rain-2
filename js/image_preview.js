/**
 * 
 */


/**** Functions ****/
Array.prototype.deepFlatten = function () {
    // because arr.flat() doesn't work for IE and MS Edge...
    try {
        return this.flat();
    } catch (error) {
        return this.reduce((accumulator, current) => {
            if (Array.isArray(current)) {
                return accumulator.concat(current.deepFlatten());
            } else {
                return accumulator.concat(current);
            }
        }, []);
    }
}

function hidePic() {
    // closes the image preview
    let currShown = document.querySelector("#currently-shown");
    currShown.classList.add("disappearing");

    setTimeout(() => {
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
    setTimeout(() => {
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

    setTimeout(() => {
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

    setTimeout(() => {
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
    // WICHTIG: gebe zusätzliche Node innerhalb eines Arrays weiter.
    // blurs footer and header by default
    // additional Elements can be blurred, too, by including additional elements
    let toBeBlurred = [
        document.querySelector("header"),
        document.querySelector("footer"),
        Array.from(document.querySelectorAll(".row")),
        ... additional
    ].deepFlatten().filter((e) => e != null);

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
        ... additional
    ].deepFlatten().filter((e) => e != null);

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
let waveDivision = document.querySelector('#thin-wave');
let pagesWithImagePreview = ['photography.php', 'individualized.php', 'images.php'];
let documentName = window.location
    .pathname
    .split('/')
    .pop();

if (pagesWithImagePreview.includes(documentName)) {
    var tempPicInfo = document.querySelector('#curr-pic-info');
    var currPicDescription = tempPicInfo.querySelector('p');
    var currPicName = tempPicInfo.querySelector('h1');

    // Closing of image preview if clicked anywhere but on description and arrows
    // wird geschlossen, wenn außerhalb von Pfeilen, Beschreibung oder Bild geklickt
    var overlayPreview = document.querySelector('#currently-shown');
    overlayPreview.addEventListener('click', () => {
        hidePic();
        unblurBackground([
            waveDivision,
            Array.from(document.querySelectorAll('.thin-lines'))
        ]);
    }, false);

    // Ausnahmen
    let propStop = (event) => event.stopPropagation();
    let arrows = document.querySelectorAll('.arrow');
    let leftArrow = arrows[0];
    let rightArrow = arrows[1];

    leftArrow.addEventListener('click', propStop, false);
    rightArrow.addEventListener('click', propStop, false);
    tempPicInfo.addEventListener('click', propStop, false);
}
