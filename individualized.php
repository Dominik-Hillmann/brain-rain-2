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
        <link rel="stylesheet" href="./css/writing.css">
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->
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
        <img src="./img/cross_colored.png" id="cross" onclick="unblurBackground();">
        <div id="main-pic-container">
            <img src="./img/cube.gif" id="the-main-pic">
        </div>
        <div id="curr-pic-info-wrapper">
            <img src="./img/arrow_links_colored.png" class="arrow" onclick="prevPic();"><!--
            --><img src="./img/arrow_rechts_colored.png" class="arrow" id="rarrow" onclick="nextPic();"><!--
            --><div id="curr-pic-info">
                <h1>Titel, ein langer Titel</h1>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
    </div>


    <body>
    <?php require "./libraries/util.inc.php" ?>
        <header class="at-top">
            <div>
                <div id="headerlogo">
                    <img src="./img/brainrainlogo.png"><h1>BRAINRAIN</h1>
                </div>
                <div>
                    <div id="header-options">

                        <!-- mit z-index noch nach hinten -->

                        <p class="current-option">
                            <span>A</span><!--
                            --><span>b</span><!--
                            --><span>o</span><!--
                            --><span>u</span><!--
                            --><span>t</span>
                        </p>
                        <p>
                            <span>C</span><!--
                            --><span>o</span><!--
                            --><span>n</span><!--
                            --><span>t</span><!--
                            --><span>a</span><!--
                            --><span>c</span><!--
                            --><span>t</span><!--
                            --><span> &</span><!--
                            --><span> H</span><!--
                            --><span>i</span><!--
                            --><span>r</span><!--
                            --><span>e</span><!--
                            --><span> M</span><!--
                            --><span>e</span>
                        </p>
                        <p>
                            <span>L</span><!--
                            --><span>o</span><!--
                            --><span>g</span><!--
                            --><span> I</span><!--
                            --><span>n</span>
                        </p>
                    </div>
                    <img src="./img/burger_menu_closed.png" onclick="showMenu();">
                </div>
            </div>
        </header>

        <div id="pics-main" class="main-content" style="padding-top:200px;">
            <?php
                // Teil 1: anhand Passwort richtige JSON wählen

                // alle user fetchen
                $folderName = '/TEMP__USER_STORAGE';
                $fileNames = scandir($_SERVER['DOCUMENT_ROOT'] . $folderName);
                $fileNames = array_splice($fileNames, 2); // get rid of . and ..

                $userInfo = NULL;
                foreach ($fileNames as $fileName) {
                    $currentUser = getInfo($fileName, $folderName);

                    if (password_verify($_POST['pw'], $currentUser->pw)) {
                        $userInfo = $currentUser;
                    }
                }
                
                // Anzeige, wenn Passwort zu keinem passt (User nicht gefunden, oder so)
                if ($userInfo == NULL) {
                    var_dump($_POST);
                    echo '<br>' . 'Kein User mit diesem Kennwort gefunden';
                } else {
                    // Nun einmal die Stories darstellen, einmal die Bilder darstellen
                    // var_dump($userInfo);

                    // Bilder fetchen
                    $wantedNames = $userInfo->pics;

                    $picFolderName = '/info/pic-info';
                    $picNames = scandir($_SERVER['DOCUMENT_ROOT'] . $picFolderName);
                    $picNames = array_splice($picNames, 2); // get rid of . and ..
                    
                    $wantedPicInfo = [];
                    foreach ($picNames as $picName) {
                        $info = getInfo($picName, $picFolderName);
                    
                        if (in_array($info->name, $wantedNames)) {
                            array_push($wantedPicInfo, $info);
                        }                    
                    }

                    $picPrinter = new PicInfoPrinter($wantedPicInfo);
                    $picPrinter->printContainedInfo();
                                       
                    
                    // writings
                    $wantedWritingNames = $userInfo->writings;

                    $writFolderName = '/info/writing-info';
                    $writNames = scandir($_SERVER['DOCUMENT_ROOT'] . $writFolderName);
                    $writNames = array_splice($writNames, 2); // get rid of . and ..
                        
                    $wantedWritInfos = [];
                    foreach ($writNames as $writName) {
                        $info = getInfo($writName, $writFolderName);
    
                        if (in_array($info->name, $wantedWritingNames)) {
                            array_push($wantedWritInfos, $info);
                        }                    
                    }
    
                    $writPrinter = new WritingsInfoPrinter($wantedWritInfos);
                    $writPrinter->printContainedInfo();
                } // else
            ?>
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
                <p>
                    Copyright &#x24B8; <?php echo date("Y"); ?> BRAINRAIN, Greifswald, Germany. All rights reserved.<!--
                    --><span onclick=""> Imprint.</span>
                </p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and <a href=""><img src="./img/brainrainlogo_white.png"></a></p>
            </div>
        </footer>

        <div id="pic-texts" style="display:none;" class="hide">
            <?php
                foreach ($wantedPicInfo as $subPicInfo) {
                    foreach ($subPicInfo as $picInfo) {
                        echo '<div class="hidden-pic-info">';
                        echo '<h1>'. $picInfo->name .'</h1>';
                        echo '<p>'. $picInfo->description .'</p></div>';
                    }                    
                }
            ?>
        </div>
    </body>

    <script src="./js/positioning.js"></script>
    <script src="./js/image_preview.js"></script>
    <script src="./js/header.js"></script>

</html>
