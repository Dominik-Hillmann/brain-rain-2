function stickyHeader() {
    let header = document.querySelector("header");
    console.log(window.getComputedStyle(header).height);
}


window.onscroll = function () {
    stickyHeader();
}
