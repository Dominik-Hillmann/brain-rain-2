setTimeout(() => {
    let docPath = window.location.pathname;
    let fileName = docPath.split('/').pop();
    let filesWithImagePreview = ['photography.php', 'individualized.php'];
    let filesWithTextPreview = ['writing.php', 'individualized.php'];

    if (filesWithImagePreview.includes(fileName)) {
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
    } 

    if (filesWithTextPreview.includes(fileName)) {
        let texts = document.querySelectorAll('.text-1, .text-2, .text-3');
        let hoverClass = 'text-hover';
        let leaveClass = 'text-hover-leave';

        for (let except of texts) {
            // add callbacks for hover and leave on all images to perform animations
            except.onmouseover = () => {
                // perform animation on all other pictures
                for (let text of texts) {
                    if (text != except) {
                        text.classList.add(hoverClass);
                        text.classList.remove(leaveClass);
                    }
                }
            }

            except.onmouseleave = () => {
                // remove animation classes from all other images
                for (let text of texts) {
                    if (text != except) {
                        text.classList.add(leaveClass);
                        text.classList.remove(hoverClass);        
                    }
                }
            }
        } // for
    } // if
}, 500); // setTimeout
