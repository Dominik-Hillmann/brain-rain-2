function stickyHeader() {
    if (window.pageYOffset > 15) {
        heading.classList.add("retract");
        heading.classList.remove("extend");
        innerHeader.classList.add("has-bottom-border");
    } else {
        heading.classList.remove("retract");
        heading.classList.add("extend");
        innerHeader.classList.remove("has-bottom-border");
    }
}

let heading = document.querySelector("#heading");
let innerHeader = document.querySelector("#inner-header-wrapper");

window.onscroll = function () {
    stickyHeader();
}
