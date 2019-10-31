<?php
$bin_vol = 40;
$bin_heap_vol = rand(5, 420);
$trash_per_day = 15;

$days = floor(($bin_vol + $bin_heap_vol) / $trash_per_day);

$h1 = "Siuksliu prognoze";
$p_1 = "Turime siuksline - $bin_vol litru";
$p_2 = "Zmona nieko nesako, kol kampas nevirsija $bin_heap_vol";
$h3 = "Isvada: Nieko nedarysiu $days dienu"
;
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>

    </head>
    <body>
        <h1><?php print $h1 ?></h1>
        <p><?php print $p_1 ?></p>
        <p><?php print $p_2 ?></p
        <h3><?php print $h3 ?></h3>
    </body>
</html>

