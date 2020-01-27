const baseUrl = 'http://brain-rain.com/images.php?category=';
const page = location.pathname.split("/").slice(-1)[0];

if (page === 'index.php') {
    let graphicDesignPanel = document.querySelector('#design');
    graphicDesignPanel.onclick = () => window.open(baseUrl + 'Graphic%20Design');
    
    let illustrationPanel = document.querySelector('#illustration');
    illustrationPanel.onclick = () => window.open(baseUrl + 'Illustrationen');
    
    let drawingsPanel = document.querySelector('#drawings');
    drawingsPanel.onclick = () => window.open(baseUrl + 'Drawings');
    
    let photoPanel = document.querySelector('#photography');
    photoPanel.onclick = () => window.open(baseUrl + 'Photography');
    
    let writingPanel = document.querySelector('#writing');
    writingPanel.onclick = () => window.open(baseUrl + 'Writing');    
}

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
