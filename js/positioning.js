let pxToFloat = function (pxStr) {
    if (pxStr.substring(pxStr.length - 2, pxStr.length) != "px") {
        throw new Error("'" + pxStr + "' is not a string ending with 'px'.");
    } else {
        return parseFloat(pxStr.substring(0, pxStr.length - 2));
    }
}
