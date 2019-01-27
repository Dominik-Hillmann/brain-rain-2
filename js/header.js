let header = document.querySelector('header');

window.onscroll = () => {
    if (window.pageYOffset > 50) {
        header.classList.add('not-at-top');
        header.classList.remove('at-top');
    } else {
        header.classList.add('at-top');
        header.classList.remove('not-at-top');
    }
}

let fb = document.querySelector('#facebook');
fb.onmouseover = () => fb.src = '../img/logos/facebook.png';
fb.onmouseleave = () => fb.src = '../img/logos/facebook_dunkel.png';

let insta = document.querySelector('#instagram');
insta.onmouseover = () => insta.src = '../img/logos/instagram.png';
insta.onmouseleave = () => insta.src = '../img/logos/instagram_dunkel.png';

let tw = document.querySelector('#twitter');
tw.onmouseover = () => tw.src = '../img/logos/twitter.png';
tw.onmouseleave = () => tw.src = '../img/logos/twitter_dunkel.png';

let yt = document.querySelector('#youtube');
yt.onmouseover = () => yt.src = '../img/logos/youtube.png';
yt.onmouseleave = () => yt.src = '../img/logos/youtube_dunkel.png';
