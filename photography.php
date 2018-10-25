<!DOCTYPE html>
<html lang="de">
    <head>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - Photography</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->
        <meta>

    <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/images.css">
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <!--<div id="hidden-img-list" class="hidden">

        <img
    </div>-->

    <div id="currently-shown">
        <!-- here to cover all of the body -->
        <img src="./img/cross.png" id="cross">
        <div id="main-pic-container">
            <img src="./img/cube.gif" id="the-main-pic">
        </div>
        <div>
            <img src="./img/arrow_links.png" class="arrow">
            <img src="./img/arrow_rechts.png" class="arrow" onclick="nextPic();">
        </div>
    </div>


    <body>
        <?php require "./libraries/util.inc.php"; ?>
        <header>

            <div id="firstmenu" class="menufloater">
                <div id="path">
                    <img src="./img/burgermenu.png">
                    <h1><a href="http://brain-rain.net">Menu</a> / Photography</h1>
                </div>

                <div id="number" class="menufloater">
                    <h1>You're my number:</h1>
                    <div><!--
                        --><p>1</p><!--
                        --><p>2</p><!--
                        --><p>3</p>
                    </div>
                </div>

                <img src="./img/brainrainlogo.png">
            </div>

            <div id="heading">
                <h1>BRAINRAIN</h1>
                <h2><?php echo num2Roman((int) date("Y")); ?></h2>
            </div>

        </header>


        <!-- Idee: hier vielleicht mit JS Elemente bei Änderung der Breite aushängen und dann wieder einhängen -->
        <!-- dynamisch von PHP anhand gespeicherter Texte aufbauen -->
        <div id="pics-main">
            <div class="row"><!--                
                --><div class="pic-3 pic" style="background-image:url('./img/Volyova.jpg')" onclick="currPic=document.querySelectorAll('.pic-3')[0];unhidePic('./img/Volyova.jpg');">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div><!--

                --><div class="pic-3 pic">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div><!--

                --><div class="pic-3 pic">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div>
            </div>

            <div class="row">
                <div class="pic-2 pic">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div><!--

                --><div class="pic-2 pic">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div>
            </div>

            <div class="row">
                <div class="pic-1 pic">
                    <h1>TITEL</h1>
                    <p>DATUM</p>
                </div>
            </div>
        </div>


        <footer>
            <div>
                <a href="#"><img src="./img/logos/instagram.png" id="instagram"></a>
                <a href="#"><img src="./img/logos/twitter.png" id="twitter"></a>
                <a href="#"><img src="./img/logos/facebook.png" id="facebook"></a>
                <a href="#"><img src="./img/logos/youtube.png" id="youtube"></a>
            </div>

            <div>
                <p id="madewith-pushback">&nbsp;</p>
                <p>Copyright &#x24B8; <?php echo date("Y"); ?> BRAINRAIN, Greifswald, Germany. All rights reserved. <a>Imprint</a></p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and <a href=""><img src="./img/brainrainlogo.png"></a></p>
            </div>
        </footer>

    </body>
    <script src="./js/image_preview.js"></script>
</html>
