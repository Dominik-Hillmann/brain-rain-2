<!DOCTYPE html>
<html lang="de">
    <head>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - Individualized</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->

    <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/images.css">
        <link rel="stylesheet" href="./css/writing.css">

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <?php require "./libraries/util.inc.php"; ?>

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
        <header>

            <div id="inner-header-wrapper">
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
            </div>

                <div id="heading">
                    <h1>BRAINRAIN</h1>
                    <h2><?php echo num2Roman((int) date("Y")); ?></h2>
                </div>
            <!--</div>-->

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

                    // WICHTIG: später Verschlüsselung
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

        <div id="pic-texts" style="display:none;">
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
