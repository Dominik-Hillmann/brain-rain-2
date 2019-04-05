<!DOCTYPE html>
<html lang="de">
    <head>
        <?php require "./libraries/util.inc.php" ?>
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
        <link rel="stylesheet" href="./css/mobile.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700i|Zilla+Slab">
    
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <div id="menu" class="hide">
        <div id="menu-heading">
            <div>
                <img src="./img/brainrainlogo_white.png">
                <h1>BRAINRAIN</h1>
            </div>
        </div>
        <div id="menu-options">
            <div>
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

                <!-- This is a divider between the art and other categories. -->
                <p class="visible-on-mobile">
                    <?php echo strToSpans(' '); ?>
                </p>

                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(7)'));" class="visible-on-mobile">
                    <?php echo strToSpans('About'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(8)'));" class="visible-on-mobile">
                    <?php echo strToSpans('Contact & Hire Me'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(9)'));" class="visible-on-mobile">
                    <?php echo strToSpans('Log In'); ?>
                </p>
                <p onmouseover="changeLetterColors(document.querySelector('#menu-options div p:nth-child(10)'));" class="visible-on-mobile">
                    <?php echo strToSpans('Shop'); ?>
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
                    require "./secret/db.inc.php";
                    $db = mysqli_connect("127.0.0.1:3306", DB_USER, DB_PASS, "db_synchro");
                    
                    $result = $db->query("SELECT * FROM tags_pics ORDER BY pic_filename ASC");

                    while ($row = $result->fetch_assoc()) {
                        echo $row['tag_name'] . "_____" . $row['pic_filename'] . "<br>";
                    }

                    $folderName = 'info/pic-info';
                    $fileNames = scandir($_SERVER['DOCUMENT_ROOT'] . '/' . $folderName);
                    $fileNames = array_splice($fileNames, 2); // get rid of . and ..

                    $allPicInfo = [];
                    foreach ($fileNames as $fileName) {
                        $info = new PicInfo($fileName, $folderName);

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
        <?php $picPrinter->printHiddenDescriptions(); ?>
    </body>

    <script src="./js/image_preview.js"></script>
    <script src="./js/positioning.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/image_hover.js"></script>
    
</html>
