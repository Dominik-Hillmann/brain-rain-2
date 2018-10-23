let cross = document.querySelector("#cross");
cross.addEventListener("click", function() {
    currShown = document.querySelector("#currently-shown")
    currShown.classList.add("hide");
});

function unhidePic(picLink) {
    let currShown = document.querySelector("#currently-shown");
    let mainPic = currShown.querySelector("#the-main-pic");
    mainPic.src = picLink;
    currShown.classList.remove("hide");
}
