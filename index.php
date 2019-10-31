<?php
$distance = rand(100, 500); // km
$consumption = 7.5; // l/100km
$price_l = 1.3; // Eur/l
$fuel_total = round($distance / 100 * $consumption, 2);
$price_trip = round($fuel_total * $price_l, 2);

$h1_1 = 'Kelionės skaičiuoklė';
$li_1 = "Nuvažiuota distancija: $distance";
$li_2 = "Sunaudota $fuel_total kuro.";
$li_3 = "Kaina: $price_trip pinigų";
?>
<html>
    <head>
        <title>Kuro skaičiuoklė</title>
    </head>
    <body>
        <h1><?php print $h1_1; ?></h1>
        <ul>
            <li><?php print $li_1; ?></li>
            <li><?php print $li_2; ?></li>
            <li><?php print $li_3; ?></li>  
        </ul>
    </body>
</html>