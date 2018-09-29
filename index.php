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
            <div>
                <img src="./img/burgermenu.png">
                <h1>Pfad mit Links</h1>
            </div>

            <img src="./img/brainrainlogo.png" id="centerlogo">

            <div id="number">
                <h1>You're my number:</h1>
                <div><p>n</p></div>
            </div>
        </header>
        <div id="heading">
            <h1>BRAINRAIN</h1>
            <h2><?php echo num2Roman((int) date("Y")); ?></h2>
        </div>
    </body>
    <script src="./js/positioning.js"></script>
</html>
