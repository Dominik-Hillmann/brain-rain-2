<!DOCTYPE html>

<html lang="de">
    <head>
        <?php require "./libraries/util.inc.php" ?>
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
        <link rel="stylesheet" href="./css/mobile.css">
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700i|Zilla+Slab" rel="stylesheet">

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

    <body>
        <header class="at-top">
            <div>
                <div id="headerlogo">
                    <img src="./img/brainrainlogo.png"><h1>BRAINRAIN</h1>
                </div>
                <div>
                    <div id="header-options">
                        <p class="current-option"><a href="./index.php"><?php echo strToSpans('About'); ?></a></p>
                        <p><a href="./contact.php"><?php echo strToSpans('Contact & Hire Me'); ?></a></p>
                        <p><a href="./login.php"><?php echo strToSpans('Log In'); ?></a></p>
                        <p><a href="https://www.spreadshirt.de/user/UNIIKAT"><?php echo strToSpans('Shop'); ?></a></p>
                    </div>
                    <img src="./img/burger_menu_closed.png" onclick="showMenu();">
                </div>
            </div>
        </header>

        <div id="eyecatcher">
            <img src="./img/brainrainlogo_dark_background.png" id="eyecatcher-logo">
            <h1 id="brain">BRAIN</h1>
            <h1 id="rain">RAIN</h1>
            <h2 id="num"><?php echo num2Roman((int) date('Y')); ?></h2>
            <div id="welcome-text-wrapper">
                <div id="welcome-text">
                    <h1>Stinki</h1>
                    <p>
                        Hier stellt sich Charlie vor, consectetur adipiscing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        If you like, you can contact me or take a look at my portfolio down below.
                    </p>
                    <button onclick="scrollToSelection();">PORTFOLIO</button>
                    <button><a href="./contact.php">CONTACT</a></button>
                </div>        
            </div>
            <img id="welcome-text-wave" src="./img/thin_wave.png" ondragstart="return false;"> 
            <img id="eyecatcher-background" src="./img/background_eyecatcher.png" ondragstart="return false;">
        </div>
 
        <div id="main" class="main-content">
            <div>
                <div id="design" class="topic-panel">
                    <h1>Graphic<br>Design</h1>
                </div><!--
                --><div id="illustration" class="hasMargin topic-panel">
                    <h1>Illustration</h1>
                </div><!--
                --><div id="drawings" class="hasMargin topic-panel">
                    <h1>Drawings</h1>
                </div><!--
                --><div id="photography" class="hasMargin topic-panel">
                    <h1>Photo-<br>graphy</h1>
                </div><!--
                --><div id="writing" class="topic-panel">
                    <h1>Writing</h1>
                </div>
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
                    Copyright &#x24B8; <?php echo date("Y"); ?> BRAINRAIN, Greifswald, Germany. All rights reserved. <a href="./impressum.php">Imprint.</a>
                </p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and <a href=""><img src="./img/brainrainlogo_white.png"></a></p>
            </div>
        </footer>

    </body>

    <script src="./js/image_preview.js"></script>
    <script src="./js/positioning.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/bubbles.js"></script>
    <script src="./js/resize.js"></script>
    <script src="./js/add_links.js"></script>
</html>
