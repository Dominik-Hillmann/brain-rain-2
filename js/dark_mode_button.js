// console.log('Dark Mode Button');
let button = document.querySelector('#inner-text-wrapper button');
let wrapper = document.querySelector('#inner-text-wrapper');
let heading = document.querySelector('#inner-text-wrapper h1');
let text = document.querySelector('#inner-text-wrapper p');

let triggerDarkMode = () => {
    text.style.color = 'white';
    heading.style.color = 'cornflowerblue';
    wrapper.style.backgroundColor = 'rgb(42, 42, 46)';

    button.classList.add('button-when-dark');
    button.classList.remove('button-when-light');
    button.innerHTML = 'LIGHT MODE';
    button.onclick = triggerLightMode;
}

let triggerLightMode = () => {
    text.style.color = 'black';
    heading.style.color = '#ff4951';
    wrapper.style.backgroundColor = 'white';

    button.classList.add('button-when-light');
    button.classList.remove('button-when-dark');
    button.innerHTML = 'DARK MODE';
    button.onclick = triggerDarkMode;
}

button.onclick = triggerDarkMode;
