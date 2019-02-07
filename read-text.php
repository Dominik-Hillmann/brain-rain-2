<!DOCTYPE html>
<html lang="de">
<html lang="de">
    <head>
        <?php require "./libraries/util.inc.php" ?>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - <?php echo $_GET['title']; ?></title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->
        <meta>

    <!-- CSS links -->
    <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/text.css">
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

        <div id="bold-wave" class="wave" ondragstart="return false;">
            <img src="./img/bold_wave.png">
        </div>

        <div id="main-wrapper">
            <div class="main-content">
                <div id="inner-text-wrapper">
                    <!-- <div id="text-schmuck">READ TEXT: <?php echo strtoupper($_GET['title']); ?></div> -->
                    <div>
                        <h1><?php echo $_GET['title']; ?></h1>
                        <h2>
                            <?php 
                                $date = $_GET['date']; 

                                $numwords = count(explode(' ', $_GET['text']));
                                $minsToRead = ceil($numwords / 225); // most adults can read 200 to 250 words per min
                                
                                echo 'By Charlie Fricke/' . $date . '/' . $minsToRead . ' min read';
                            ?>
                            <button class="button-when-light">DARK MODE</button>
                        </h2>                        
                    </div>
                    <p><?php echo $_GET['text']; ?></p>
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
                <p>Copyright &#x24B8; <?php echo date("Y"); ?> BRAINRAIN, Greifswald, Germany. All rights reserved. <a>Imprint</a></p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and <a href=""><img src="./img/brainrainlogo_white.png"></a></p>
            </div>
        </footer>
    </body>
    <script src="./js/positioning.js"></script>
    <script src="./js/image_preview.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/dark_mode_button.js"></script>
</html>
