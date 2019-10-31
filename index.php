<?php
$bin_vol = 40;
$bin_heap_vol = rand(30,100);
$trash_per_day = 15;
$days = round(($bin_vol + $bin_heap_vol)/$trash_per_day);
$p_current = "Turima šiukšlinė - $bin_vol litrų";
$p_max = "Žmona nieko nesako, kol kaupas neviršija $bin_heap_vol ";
$h3_end = "Išvada: Nieko nedarysiu $days dienas";
?>
<html>
    <head>
        <title>Variables</title>
    </head>
    <body>
        <h1>Šiukšlių prognozė</h1>
        <p><?php print $p_current; ?></p>
        <p><?php print $p_max; ?></p>
        <h3><?php print $h3_end; ?></h3>
    </body>
</html>