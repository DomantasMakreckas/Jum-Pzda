<?php
$kates = rand(1, 3);
$sunys = rand(1, 3);
$katasuniai = 0;

for ($k = 1; $k <= $kates; $k++) {
    for ($s = 1; $s <= $sunys; $s++) {
        $pavyko = rand(0, 1);
        if ($pavyko == 1) {
            $katasuniai++;
            break;
        }
    }
}

$h1 = 'Katasuniu Iseiga';
$h2 = "Dalyvavo $kates kates ir $sunys sunys";
$h3 = "Katasuniu iseiga: $katasuniai";
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>          
    </head>
    <body>
        <h1><?php print $h1; ?></h1>
        <h2><?php print $h2; ?></h2>
        <h3><?php print $h3; ?></h3>
    </body>
</html>

