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
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <!-- Everything that is not show as default like the menu or pic displays -->
    <div id="menu" class="hide">
        <div id="menu-heading">
            <div>
                <img src="./img/brainrainlogo_white.png">
                <h1>BRAINRAIN</h1>
            </div>
        </div>
        <div id="menu-options">
            <div>
                <p>GRAPHIC DESIGN</p>
                <p>ILLUSTRATION</p>
                <p>DRAWINGS</p>
                <p>PHOTOGRAPHY</p>
                <p>WRITING</p>
            </div>
        </div>
    </div>

    <body>
        <?php require "./libraries/util.inc.php"; ?>
        <header>

            <div id="firstmenu" class="menufloater">
                <div id="path">
                    <img src="./img/burgermenu.png" onclick="showMenu();">
                    <h1>Home</h1>
                </div>

                <div id="number" class="menufloater">
                    <h1>You're my number:</h1>
                    <div><!--
                        --><p>1</p><!--
                        --><p>2</p><!--
                        --><p>3</p>
                    </div>
                </div>

                <img src="./img/brainrainlogo.png" id="centerlogo">
            </div>

            <div id="heading">
                <h1>BRAINRAIN</h1>
                <h2><?php echo num2Roman((int) date("Y")); ?></h2>
            </div>

        </header>

        <div id="about">
            <p><span>ABOUT</span></p><!--
            --><img src="./img/emptygap.png"><!--
            --><p><span>HIRE ME - CONTACT</span></p>
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
</html>
