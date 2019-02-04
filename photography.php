<!DOCTYPE html>
<html lang="de">
    <head>
        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - Photography</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

        <!-- Mobile Specific Metas -->

        <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/images.css">
        <link rel="stylesheet" href="./css/menu.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700i|Zilla+Slab" rel="stylesheet">
    
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

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

    <div id="currently-shown" class="hide">
        <!-- here to cover all of the body -->
        <div id="main-pic-container">
            <img src="./img/cube.gif" id="the-main-pic">
        </div>
        <div id="curr-pic-info-wrapper">
            <img src="./img/arrow_links_colored.png" class="arrow" onclick="prevPic();"><!--
            --><img src="./img/arrow_rechts_colored.png" class="arrow" id="rarrow" onclick="nextPic();"><!--
            --><div id="curr-pic-info">
                <h1>Titel, ein langer Titel</h1>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <p>Click anywhere to leave the image preview.</p>
            </div>
        </div>
    </div>


    <body>
        <?php require './libraries/util.inc.php'; ?>
        <header class="at-top">
            <div>
                <div id="headerlogo">
                    <img src="./img/brainrainlogo.png"><h1>BRAINRAIN</h1>
                </div>
                <div>
                    <div id="header-options">
                        <p><a href="./index.php"><?php echo strToSpans('About'); ?></a></p>
                        <p><a href="./contact.php"><?php echo strToSpans('Contact & Hire Me'); ?></a></p>
                        <p><a href="./login.php"><?php echo strToSpans('Log In'); ?></a></p>
                        <p><a href="https://www.spreadshirt.de/user/UNIIKAT"><?php echo strToSpans('Shop'); ?></a></p>
                    </div>
                    <img src="./img/burger_menu_closed.png" onclick="showMenu();">
                </div>
            </div>
        </header>

        <div id="thin-wave" class="wave" ondragstart="return false;">
            <img src="./img/thin_wave.png">
        </div>
        <!-- Idee: hier vielleicht mit JS Elemente bei Änderung der Breite aushängen und dann wieder einhängen -->
        <!-- dynamisch von PHP anhand gespeicherter Texte aufbauen -->
        <div id="main-wrapper">
            <div id="pics-main" class="main-content">
                <?php
                    $folderName = 'info/pic-info';
                    $fileNames = scandir($_SERVER['DOCUMENT_ROOT'] . '/' . $folderName);
                    $fileNames = array_splice($fileNames, 2); // get rid of . and ..

                    $allPicInfo = [];
                    foreach ($fileNames as $fileName) {
                        $info = new PicInfo($fileName, $folderName);
                        // $info = getInfo($fileName, $folderName);

                        if (!$info->isSecret()) {
                            array_push($allPicInfo, $info);
                        }
                    }

                    // echo pictures and information
                    $picPrinter = new PicInfoPrinter($allPicInfo);
                    $picPrinter->printContainedInfo();
                ?>
            </div>
        </div>

        <footer>
            <div>
                <a href="#"><img src="./img/logos/instagram_dunkel.png" id="instagram"></a>
                <a href="#"><img src="./img/logos/twitter_dunkel.png" id="twitter"></a>
                <a href="#"><img src="./img/logos/facebook_dunkel.png" id="facebook"></a>
                <a href="#"><img src="./img/logos/youtube_dunkel.png" id="youtube"></a>
            </div>

            <div>
                <p id="madewith-pushback">&nbsp;</p>
                <p>Copyright &#x24B8; <?php echo date("Y"); ?> BRAINRAIN, Greifswald, Germany. All rights reserved. <a>Imprint</a></p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and <a href=""><img src="./img/brainrainlogo_white.png"></a></p>
            </div>
        </footer>
        <div id="pic-texts" style="display:none;">
            <?php
                // echo descriptions and names in hidden div so that the JS functions can use it to change descriptions when displayed
                foreach ($picPrinter->getChunkedInfo() as $subPicInfo) {
                    foreach ($subPicInfo as $picInfo) {
                        echo '<div class="hidden-pic-info">';
                        echo '<h1>'. $picInfo->name .'</h1>';
                        echo '<p>'. $picInfo->description .'</p></div>';
                    }                    
                }
            ?>
        </div>
    </body>

    <script src="./js/image_preview.js"></script>
    <script src="./js/positioning.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/image_hover.js"></script>
</html>
