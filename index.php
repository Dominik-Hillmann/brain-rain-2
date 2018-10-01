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
        <!-- <link rel="stylesheet" href="css/mobile.css"> -->

    <!-- Favicon -->
        <link rel="icon" type="image/png" href="favicon.ico">
    </head>
    <body>
        <?php require "./libraries/util.inc.php"; ?>
        <header>
            <!-- <div>
                <img src="./img/burgermenu.png">
                <h1>Pfad mit Links</h1>
            </div> -->

            <img src="./img/brainrainlogo.png" id="centerlogo">

            <!-- <div id="number">
                <h1>You're my number:</h1>
                <div><p>n</p></div>
            </div> -->

            <div id="heading">
                <h1>BRAINRAIN</h1>
                <h2><?php echo num2Roman((int) date("Y")); ?></h2>
            </div>
        </header>
        <!-- <div id="heading">
            <h1>BRAINRAIN</h1>
            <h2><?php echo num2Roman((int) date("Y")); ?></h2>
        </div> -->


        <footer>
            <div>
                <a href="#"><img src="./img/logos/instagram.png" id="instagram"></a>
                <a href="#"><img src="./img/logos/twitter.png" id="twitter"></a>
                <a href="#"><img src="./img/logos/facebook.png" id="facebook"></a>
                <a href="#"><img src="./img/logos/youtube.png" id="youtube"></a>
            </div>

            <div>
                <p>Copyright &#x24B8; <?php echo date("Y"); ?> BRRAINRAIN, Greifswald, Germany. All rights reserved. <a>Imprint</a></p>
                <p id="madewith">Made with <span id="love">&#9829;</span> and brain</p>
            </div>
        </footer>

    </body>
    <script src="./js/positioning.js"></script>
</html>
