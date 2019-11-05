<?php
$months = 12;
$wallet = 1000;
$month_income = 700;

for($x = 1; $x <= $months; $x++){
    $wallet = $wallet + $month_income - rand(1,690);
}

$h1 = 'Wallet Forecast';
$h2 = "Po $months m., prognozuojamas likutis: $wallet";
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

