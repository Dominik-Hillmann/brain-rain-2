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
                <?php require './libraries/util.inc.php'; ?>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(1)'));">
                    <?php echo strToSpans('Graphic Design'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(2)'));">
                    <?php echo strToSpans('Illustration'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(3)'));">
                    <?php echo strToSpans('Drawings'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(4)'));">
                    <?php echo strToSpans('Photography'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(5)'));">
                    <?php echo strToSpans('Writing'); ?>
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
            </div>
        </div>
    </div>


    <body>
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

        <div id="main-wrapper">
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
                        // Bilder fetchen
                        $wantedNames = $userInfo->pics;

                        $picFolderName = '/info/pic-info';
                        $picNames = scandir($_SERVER['DOCUMENT_ROOT'] . $picFolderName);
                        $picNames = array_splice($picNames, 2); // get rid of . and ..
                        
                        $wantedPicInfo = [];
                        foreach ($picNames as $picName) {
                            // $info = getInfo($picName, $picFolderName);
                            $info = new PicInfo($picName, $picFolderName);
                            if (in_array($info->name, $wantedNames)) {
                                array_push($wantedPicInfo, $info);
                            }                    
                        }

                        $picPrinter = new PicInfoPrinter($wantedPicInfo);
                        $picPrinter->printContainedInfo();                        

                        echo '<div class="thin-lines"><img src="./img/thin_lines.png"><div><h1>PHOTOGRAPHY</h1></div></div>';
                        
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

    <script src="./js/positioning.js"></script>
    <script src="./js/image_preview.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/image_hover.js"></script>
    <script src="./js/main_menu.js"></script>
</html>
