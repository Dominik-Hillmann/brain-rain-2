function stickyHeader() {
    let header = document.querySelector("header");
    console.log(window.getComputedStyle(header).height);

    if (window.pageYOffset > 5) {
        heading.classList.add("retract");
        heading.classList.remove("extend");
    } else {
        heading.classList.remove("retract");
        heading.classList.add("extend");
    }
}

let heading = document.querySelector("#heading");
console.log(heading);

window.onscroll = function () {
    stickyHeader();
}
