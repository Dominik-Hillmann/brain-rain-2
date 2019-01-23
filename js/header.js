
let header = document.querySelector('header');

window.onscroll = () => {
    if (window.pageYOffset > 50) {
        // console.log('not at top');
        header.classList.add('not-at-top');
        header.classList.remove('at-top');
        // if ()
    } else {
        header.classList.add('at-top');
        header.classList.remove('not-at-top');
        // console.log('is at top');
    }
}