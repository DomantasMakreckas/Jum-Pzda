<?php
$nr1 = (rand(370600000000, 370699999999));
$nr2 = (rand(370600000000, 370699999999));
$nr3 = (rand(370600000000, 370699999999));
$nr4 = (rand(370600000000, 370699999999));


$debil_nr = "Debilo Ugniaus numeris +$nr1";
$kauso_nr = "Kaušo Domanto numeris +$nr2";
$asilo_nr = "Asilo Roberto numeris +$nr3";
$durniaus_nr = "Durniaus Rimo numeris +$nr4"
?>

<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>

    <body class="bodyR">
        <nav>
            <a href="" class="navText logo">JUM PZDA  </a>
            <a href="index.php" class="navText">HOME</a>
            <a href="About.php" class="navText">ABOUT US</a>
            <a href="#" class="navText">CONTACTS</a>
            <a href="Kiausrakulas.php" class="navText kiausrakulas">KIAUŠRAKULAS</a>
        </nav>
        <p class="pR">SKAMBTELKIT MUMS IR JUM BUS PYZDA!</p>
        <ul>
            <li class="lR"><?php print $debil_nr ?></li>
            <li class="lR"><?php print $kauso_nr ?></li>
            <li class="lR"><?php print $asilo_nr ?></li>
            <li class="lR"><?php print $durniaus_nr ?></li>
        </ul>
    </body>
</html>
