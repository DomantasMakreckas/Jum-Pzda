<?php
$months = 24;
$car_price_new = 30000; // eur
$desprecation = 2; // men
$h1_1 = 'Kiek nuvertės mašina?';
$h2_1 = "Naujos mašinos kaina: $car_price_new";


$car_price_used= $car_price_new;
for($i = 0; $i < $months; $i++)
{
    $car_price_used =  $car_price_used - ($car_price_new/100 * $desprecation);
}
$depr_perc = 100-($car_price_used * 100 / $car_price_new);
$h3_1 = "Po $months mėn, mašinos vertė bus: $car_price_used eur";
$h4_1 = "Mašina nuvertės $depr_perc proc";

?>
<html>
    <head>
        <title>Lyginimas</title>
    </head>
    <body>
        <h1><?php print $h1_1; ?></h1>
        <h2><?php print $h2_1; ?></h2>
        <h3><?php print $h3_1; ?></h3>
        <h4><?php print $h4_1; ?></h4>
    </body>
</html>