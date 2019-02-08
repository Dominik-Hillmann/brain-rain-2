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
        <link rel="stylesheet" href="./css/contact.css">
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
                        <p class="current-option"><a href="./contact.php"><?php echo strToSpans('Contact & Hire Me'); ?></a></p>
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
            <div id="welcome-text">
                <h1>Contact & Hire Me</h1>
                <style>
                    h3 {
                        color: #ff4951 !important;
                        font-family: 'Montserrat', serif;
                        font-style: italic;
                        margin: 30px 0 5px 0;
                    }
                </style>
                <p><?php
                    $formFilled = isset($_POST["firstname"]) && 
                        isset($_POST["lastname"]) &&
                        isset($_POST["mail"]) &&
                        isset($_POST["subject"]) &&
                        isset($_POST["message"]);

                    if ($formFilled) {
                        $receiver = "dominik.hillmann.website@gmail.com";
                        $subject = $_POST["subject"];

                        $message = $_POST["message"];
                        $message .= "\nvon " . $_POST["firstname"] . " " . $_POST["lastname"] . " <" .  $_POST["mail"] . ">\r\n";
                        $message .= "Telefonnummer: " . (isset($_POST["telephone"]) ? $_POST["telephone"] : "none given");

                        $headers = "Reply-To: " . $_POST["firstname"] . " " . $_POST["lastname"] . " <" .  $_POST["mail"] . ">\r\n";
                        $headers .= "Return-Path: " . $_POST["firstname"] . " " . $_POST["lastname"] . " <" .  $_POST["mail"] . ">\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

                        $success = mail($receiver, $subject, $message, $headers);
                        echo ($success ? "Mail successfully sent." : "Error: Mail was not sent.");
                        mail($receiver, $subject, $message, $headers);
                    } else {
                        echo "Not every field was filled in. The mail was not sent.";
                    }
                ?></p>
            </div>            
            <img id="eyecatcher-background" src="./img/background_eyecatcher.png" ondragstart="return false;">
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

    </body>

    <script src="./js/image_preview.js"></script>
    <script src="./js/positioning.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/main_menu.js"></script>
    <script src="./js/bubbles.js"></script>
    <script src="./js/input_animation.js"></script>
</html>
