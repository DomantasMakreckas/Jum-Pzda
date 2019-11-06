<?php
$petrol_in_tank = rand(20, 30);
$h1_1 = 'Pripylei dyzelio į benz. mašina?';
$h2_1 = "Benzino buvo: $petrol_in_tank l.";

$diesel_limit = $petrol_in_tank / 10 * 100;
for ($dyzelis = 0; $dyzelis < $diesel_limit; $dyzelis++) {
    $diesel_limit = ($petrol_in_tank + $dyzelis)/100*10;
}

$h3_1 = "Max dyzelio riba: $diesel_limit l";
?>
<html>
    <head>
        <title>Lyginimas</title>
    </head>
    <body>
        <h1><?php print $h1_1; ?></h1>
        <h2><?php print $h2_1; ?></h2>
        <h3><?php print $h3_1; ?></h3>
    </body>
</html>