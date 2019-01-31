// console.log('Dark Mode Button');
let button = document.querySelector('#inner-text-wrapper button');
let wrapper = document.querySelector('#inner-text-wrapper');
let heading = document.querySelector('#inner-text-wrapper h1');
let text = document.querySelector('#inner-text-wrapper p');
// let headerBar = document.querySelector('header');
let wave = document.querySelector('#bold-wave img');
let headerLogo = document.querySelector('#headerlogo');
let headerLogoImg = headerLogo.querySelector('img');
// console.log(headerLogoImg);

let triggerDarkMode = () => {
    // change the text itself
    text.style.color = 'white';
    heading.style.color = 'cornflowerblue';
    wrapper.style.backgroundColor = 'rgb(42, 42, 46)';
    // change the button and what it does
    button.classList.add('button-when-dark');
    button.classList.remove('button-when-light');
    button.innerHTML = 'LIGHT MODE';
    button.onclick = triggerLightMode;
    // change the rest of the page
    wave.src = './img/bold_wave_dark.png';
    header.style.backgroundColor = 'rgb(42, 42, 46)';
    headerLogo.style.color = 'white';
    headerLogoImg.src = './img/brainrainlogo_white.png';
}

let triggerLightMode = () => {
    text.style.color = 'black';
    heading.style.color = '#ff4951';
    wrapper.style.backgroundColor = 'white';

    button.classList.add('button-when-light');
    button.classList.remove('button-when-dark');
    button.innerHTML = 'DARK MODE';
    button.onclick = triggerDarkMode;

    wave.src = './img/bold_wave.png';
    header.style.backgroundColor = 'white';
    headerLogo.style.color = 'black';
    headerLogoImg.src = './img/brainrainlogo.png';
}

button.onclick = triggerDarkMode;
