/**
 * 
 */

let inputs = document.querySelectorAll('form input');
// name of the needed CSS classes for animation
let inputClass = 'h3-with-input';
let removalClass = 'h3-without-input';
let inputClassTextarea = 'h3-with-input-textarea';
let removalClassTextarea = 'h3-without-input-textarea';

for (let input of inputs) {
    input.oninput = (event) => {
        let eventOrigin = event.explicitOriginalTarget || event.currentTarget;
        let h3 = eventOrigin.parentElement.querySelector('h3');        

        if (eventOrigin.value === '') {
            h3.classList.add(removalClass);
            h3.classList.remove(inputClass);
            
        } else {
            h3.classList.add(inputClass);
            h3.classList.remove(removalClass);
        }
    }    
}

let pathName = window.location
    .pathname
    .split('/')
    .pop();

if (pathName === 'contact.php') {
    let textarea = document.querySelector('form textarea');
    textarea.oninput = () => {
        let h3 = textarea.parentElement.querySelector('h3');
        
        if (textarea.value === '') {
            h3.classList.add(removalClassTextarea);
            h3.classList.remove(inputClassTextarea);
        } else {
            h3.classList.add(inputClassTextarea);
            h3.classList.remove(removalClassTextarea);
        }
    }
}
