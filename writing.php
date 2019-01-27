<!DOCTYPE html>
<html lang="de">
    <head>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - Writing</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->
        <meta>

    <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/writing.css">
        <link rel="stylesheet" href="./css/menu.css">
    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700i|Zilla+Slab" rel="stylesheet">

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>
    <!-- Everything that is not show as default like the menu or pic displays -->
    <div id="menu" class="hide">
        <div id="menu-heading">
            <img src="./img/brainrainlogo.png">
            <h1>BRAINRAIN</h1>
        </div>
        <div id="menu-options">
            <p><span>&bull;</span>GRAPHIC DESIGN</p>
            <p><span>&bull;</span>ILLUSTRATION</p>
            <p><span>&bull;</span>DRAWINGS</p>
            <p><span>&bull;</span>PHOTOGRAPHY</p>
            <p><span>&bull;</span>WRITING</p>
        </div>
    </div>

    <body>
        <?php require "./libraries/util.inc.php"; ?>
        <header>

            <div id="firstmenu" class="menufloater">
                <div id="path">
                    <img src="./img/burgermenu.png" onclick="showMenu();">
                    <h1><a href="http://brain-rain.net">Menu</a> / Writing</h1>
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
        <div id="writing-main" class="main-content">
            <?php
                $folderName = 'info/writing-info';
                $fileNames = scandir($_SERVER['DOCUMENT_ROOT'] . '/' . $folderName);
                $fileNames = array_splice($fileNames, 2); // get rid of . and ..
                    
                $allWritingsInfo = [];
                foreach ($fileNames as $fileName) {
                    $info = getInfo($fileName, $folderName);

                    if (!$info->secret) {
                        array_push($allWritingsInfo, $info);
                    }                    
                }

                // chunk the ordered arrays into arrays of the size of a row: 3
                $writPrinter = new WritingsInfoPrinter($allWritingsInfo);
                $writPrinter->printContainedInfo();
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
        <?php
            for ($i = 0; $i < 20; $i++) echo '<br>';
        ?>
    </body>
    <script src="./js/positioning.js"></script>
    <script src="./js/image_preview.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
</html>
