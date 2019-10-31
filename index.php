<?php

$distance = rand(50, 9000);
$consumption = 7.5;
$price_1 = 1.3;
$my_money = 100;
$trip_condition;

$fuel_total = round(($distance / 100) * $consumption, 2) ;
$price_trip = round($fuel_total * $price_1, 2) ;

if ($my_money >= $price_trip ) {
    $trip_condition = "Iperkama";
} else {
    $trip_condition = "Neiperkama";
};

$h1 = 'Keliones skaiciuokle';
$li_1 = "Nuvaziota distancija: $distance";
$li_2 = "Sunaudota $fuel_total l. kuro";
$li_3 = "Kaina: $price_trip pinigu";
$li_4 = "turimi pinigai: $my_money";
$p_1 = "Isvada: Kelione $trip_condition";
;?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>
        <h1><?php print $h1;?></h1>
        <ul>
            <li><?php print $li_1;?></li>
            <li><?php print $li_2;?></li>
            <li><?php print $li_3;?></li> 
            <li><?php print $li_4;?></li> 
        </ul>
        <hr>
        <p><?php print $p_1;?></p>
    </body>
</html>

