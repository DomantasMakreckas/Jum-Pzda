<?php
$months = 12;
$wallet = 1000;
$month_income = 700;

for ($x = 1; $x <= $months; $x++) {
    $wallet += $month_income - rand(100, 3000);
    if ($wallet < 0) {
        $h2 = "Atsargiai, $x menesi gali baigtis pinigai!";
        break;
    }
    $h2 = "Po $months m., prognozuojamas likutis: $wallet";
}

$h1 = 'Wallet Forecast';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>       
    </head>
    <body>
        <h1><?php print $h1; ?></h1>
        <h2><?php print $h2; ?></h2>
    </body>
</html>

