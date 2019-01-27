let images = document.querySelectorAll('.pic');
console.log(images);
let hoverClass = 'image-hover';
let leaveClass;

for (let except of images) {
    except.onmouseover = (event) => {
        // let origin = event.explicitOriginalTarget;
        // console.log(origin);

        for (let image of images) {
            if (image != except) {
                image.classList.add(hoverClass);
            }
        }
    }

    except.onmouseleave = (event) => {
        // let origin = event.explicitOriginalTarget;

        for (let image of images) {
            image.classList.remove(hoverClass);
        }

    }
}
