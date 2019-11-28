<?php
//kiaušrakulas
$h1_pavadinimas = 'KIAUŠRAKULAS';
$kiaušrakulas = rand(0, 4);
$h1_atsakymas = ['Paeis', 'Nepaeis', 'Ble nelabai', 'Bl bybis kiaušai žinok', 'TAI JO'];
?>
<html>
    <head>
        <title>KIAUŠRAKULAS</title>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body>
        <nav>
            <a href="" class="navText logo">JUM PZDA  </a>
            <a href="index.php" class="navText">HOME</a>
            <a href="About.php" class="navText">ABOUT US</a>
            <a href="Contacts.php" class="navText">CONTACTS</a>
            <a href="#" class="navText kiausrakulas">KIAUŠRAKULAS</a>
        </nav>
        <header>
            <h1 id="pavadinimas"><?php print $h1_pavadinimas; ?></h1>
        </header>
        <main>
            <div class="kamuolys">
                <img src="assets/images/balls.jpg">
                <h1 class="atsakymas"><?php print $h1_atsakymas[$kiaušrakulas]; ?></h1>
            </div>
        </main>
        <footer>
            <a href="" class="footerText">COPYRIGHT © JUM PZDA 2019-2020. JUOKAUJAM PIZDINKIT Į VALIAS</a>
        </footer>
    </body>
</html>