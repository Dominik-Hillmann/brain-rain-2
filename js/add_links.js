/**
 * This script adds links to menu items.
 */

let graphicsMenuItem = document.querySelector('#menu-options div p:nth-child(1)');
graphicsMenuItem.onclick = () => window.open(baseUrl + 'Graphic%20Design');

let illustrationMenuItem = document.querySelector('#menu-options div p:nth-child(2)');
illustrationMenuItem.onclick = () => window.open(baseUrl + 'Illustrationen');

let drawingsMenuItem = document.querySelector('#menu-options div p:nth-child(3)');
drawingsMenuItem.onclick = () => window.open(baseUrl + 'Drawings');

let photoMenuItem = document.querySelector('#menu-options div p:nth-child(4)');
photoMenuItem.onclick = () => window.open(baseUrl + 'Photography');

let writingMenuItem = document.querySelector('#menu-options div p:nth-child(5)');
writingMenuItem.onclick = () => window.open(baseUrl + 'Writing');

// Visible in mobile format only:
let aboutMenuItem = document.querySelector('#menu-options div p:nth-child(7)');
aboutMenuItem.onclick = () => window.open('index.php');

let contactMenuItem = document.querySelector('#menu-options div p:nth-child(8)');
contactMenuItem.onclick = () => window.open('contact.php');

let loginMenuItem = document.querySelector('#menu-options div p:nth-child(9)');
loginMenuItem.onclick = () => window.open('login.php');

let shopMenuItem = document.querySelector('#menu-options div p:nth-child(10)');
shopMenuItem.onclick = () => window.open('https://www.spreadshirt.de/user/UNIIKAT');
