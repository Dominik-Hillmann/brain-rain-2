function hidePic() {
    let currShown = document.querySelector("#currently-shown");
    currShown.classList.add("disappearing");

    setTimeout(function () {
        currShown.classList.add("hide");
        currShown.classList.remove("disappearing");
    }, 300); // animations has to 300ms long
}

function unhidePic(picLink) {
    let currShown = document.querySelector("#currently-shown");
    let mainPic = currShown.querySelector("#the-main-pic");
    mainPic.src = picLink;

    // console.log(currPic);
    // console.log(allPicsArr);
    // console.log();

    currShown.classList.add("appearing");
    currShown.classList.remove("hide");
    setTimeout(function () {
        currShown.classList.remove("appearing");
    }, 300);
}

function nextPic() {
    let currPicIndex = allPicsArr.findIndex(e => e == currPic);
    let nextPicIndex = (currPicIndex >= allPicsArr.length) ? 0 : currPicIndex + 1;
    console.log(
        "len:", allPicsArr.length, 
        "currPicIndex", currPicIndex,
        "nextPicIndex", nextPicIndex
    );
    // 0 ... n Array
    // 1 ... n + 1 == length
    // Ueber den naechsten Index das Bild herausfinden, animieren, src austuschen:
        // opacity raus
        // src tauschen
        // opacity rein
}

let currPic; // defined if picture is clicked upon

let allPics = document.querySelectorAll(".pic");
allPicsArr = []; // turn allPics into array
for (pic of allPics) 
    allPicsArr.push(pic); 

let cross = document.querySelector("#cross");
cross.addEventListener("click", hidePic);
