<!DOCTYPE html>
<html lang="de">
    <head>
    <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>BRAINRAIN - Login</title>
        <meta name="description" content="">
        <meta name="author" content="Dominik Hillmann">

    <!-- Mobile Specific Metas -->

    <!-- CSS links -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/images.css">
        <link rel="stylesheet" href="css/login.css">

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>

    <!--<div id="hidden-img-list" class="hidden">

        <img
    </div>-->

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

        <div id="login" class="main-content">
            <form action="individualized.php" method="post">
                Name: <input type="text" name="name"><br>
                Password: <input type="password" name="pw"><br>
                <input type="submit">
            </form>        
        </div>

        <?php
        /*
            Grundidee:
        verschlüsselte Passwörter außerhalb des Ordners speichern, auf den Nutzer zugreifen können
            dieser Ordner enthält je
            das verschlüsselte Passwort
            eine Liste von
                Bildern
                Texten
                Vorstellungen, die nur auf der Seite angezeigt werden sollen
            Name
            Password
            Liste an Units, die dem Nutzer zugänglich sein sollen
            dafür vielleicht speziellen Unterordner anlegen

            später UI für Charlie --> DBX  
        */
        ?>

    </body>

    <script src="./js/positioning.js"></script>
    <script src="./js/image_preview.js"></script>
    <script src="./js/header.js"></script>

</html>
