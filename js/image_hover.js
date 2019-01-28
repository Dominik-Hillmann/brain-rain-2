let images = document.querySelectorAll('.pic');
let hoverClass = 'image-hover';
let leaveClass = 'image-hover-leave';

for (let except of images) {
    // add callbacks for hover and leave on all images to perform animations
    except.onmouseover = () => {
        // perform animation on all other pictures
        for (let image of images) {
            if (image != except) {
                image.classList.add(hoverClass);
                image.classList.remove(leaveClass);
            }
        }
    }

    except.onmouseleave = () => {
        // remove animation classes from all other images
        for (let image of images) {
            if (image != except) {
                image.classList.add(leaveClass);
                image.classList.remove(hoverClass);        
            }
        }
    }
}
