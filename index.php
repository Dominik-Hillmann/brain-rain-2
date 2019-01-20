<!DOCTYPE html>
<html lang="de">
    <head>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->
        <meta>

    <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/images.css">
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="./css/eyecatcher.css">
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat:700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400" rel="stylesheet"> 

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <!-- Everything that is not show as default like the menu or pic displays -->
    <div id="menu" class="hide">
        <div id="menu-heading">
            <div>
                <img src="./img/brainrainlogo_white.png">
                <h1>BRAINRAIN<?php/* echo num2Roman((int) date("Y")); */?></h1>
            </div>
        </div>
        <div id="menu-options">
            <div>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(1)'));">
                    <span>G</span><!--
                    --><span>r</span><!--
                    --><span>a</span><!--
                    --><span>p</span><!--
                    --><span>h</span><!--
                    --><span>i</span><!--
                    --><span>c</span><!--  
                    --><span>&nbsp;D</span><!--
                    --><span>e</span><!--
                    --><span>s</span><!--
                    --><span>i</span><!--
                    --><span>g</span><!--
                    --><span>n</span>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(2)'));">
                    <span>I</span><!--
                    --><span>l</span><!--
                    --><span>l</span><!--
                    --><span>u</span><!--
                    --><span>s</span><!--
                    --><span>t</span><!--  
                    --><span>r</span><!--
                    --><span>a</span><!--
                    --><span>t</span><!--
                    --><span>i</span><!--
                    --><span>o</span><!--
                    --><span>n</span>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(3)'));">
                    <span>D</span><!--
                    --><span>r</span><!--
                    --><span>a</span><!--
                    --><span>w</span><!--
                    --><span>i</span><!--
                    --><span>n</span><!--  
                    --><span>g</span><!--
                    --><span>s</span>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(4)'));">
                    <span>P</span><!--
                    --><span>h</span><!--
                    --><span>o</span><!--
                    --><span>t</span><!--
                    --><span>o</span><!--
                    --><span>g</span><!--
                    --><span>r</span><!--  
                    --><span>a</span><!--
                    --><span>p</span><!--
                    --><span>h</span><!--
                    --><span>y</span>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(5)'));">
                    <span>W</span><!--
                    --><span>r</span><!--
                    --><span>i</span><!--
                    --><span>t</span><!--
                    --><span>i</span><!--
                    --><span>n</span><!--  
                    --><span>g</span>
                </p>
            </div>
        </div>
    </div>

    <body>
        <?php require "./libraries/util.inc.php" ?>
        <header>
            <div>
                <div id="headerlogo">
                    <img src="./img/brainrainlogo.png"><h1>BRAINRAIN</h1>
                </div>
                <div>
                    <div id="header-options">

                        <!-- mit z-index noch nach hinten -->

                        <p onmouseover="changeLetterColors(document.querySelector('#header-options p:nth-child(1)'));">
                            <span>A</span><!--
                            --><span>B</span><!--
                            --><span>O</span><!--
                            --><span>U</span><!--
                            --><span>T</span>
                        </p>
                        <p onmouseover="changeLetterColors(document.querySelector('#header-options p:nth-child(2)'));">
                            <span>c</span><!--
                            --><span>o</span><!--
                            --><span>n</span><!--
                            --><span>t</span><!--
                            --><span>a</span><!--
                            --><span>c</span><!--
                            --><span>t</span>
                        </p>
                        <p onmouseover="changeLetterColors(document.querySelector('#header-options p:nth-child(3)'));">
                            <span>l</span><!--
                            --><span>o</span><!--
                            --><span>g</span><!--
                            --><span> i</span><!--
                            --><span>n</span>
                        </p>
                    </div>
                    <img src="./img/burger_menu_closed.png" onclick="showMenu();">
                </div>
            </div>
        </header>

        <!-- <div id="about">
            <p><span>ABOUT</span></p>
            <img src="./img/emptygap.png">
            <p><span>HIRE ME - CONTACT</span></p>
        </div> -->

        <div id="eyecatcher">
            <img src="./img/brainrainlogo_dark_background.png" id="eyecatcher-logo">
            <h1 id="brain">BRAIN</h1>
            <h1 id="rain">RAIN</h1>
            <h2 id="num"><?php echo num2Roman((int) date('Y')); ?></h2>
            <!-- <img class="eyecatcher-circle" src="./img/white_circle.png">
            <img class="eyecatcher-circle" src="./img/white_circle.png">
            <img class="eyecatcher-circle" src="./img/white_circle.png"> -->
            <img id="eyecatcher-background" src="./img/background_eyecatcher.png">
        </div>

        <div id="main" class="main-content">
            <div id="design">
                <h1>GRAPHIC<br>DESIGN</h1>
            </div><!--
            --><div id="illustration" class="hasMargin">
                <h1>ILLUS-<br>TRATION</h1>
            </div><!--
            --><div id="drawings" class="hasMargin">
                <h1>DRAWINGS</h1>
            </div><!--
            --><div id="photography" class="hasMargin">
                <h1>PHOTO-<br>GRAPHY</h1>
            </div><!--
            --><div id="writing">
                <h1>WRITING</h1>
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
    <script src="./js/positioning.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/bubbles.js"></script>
</html>
