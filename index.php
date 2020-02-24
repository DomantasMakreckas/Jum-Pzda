<?php
$data = date('Y m d h:i:s');
$data_tekstas = "$data Domantas grįžo į PHPFIGHTCLUB'ą!";
$atgal = date('F', strtotime('-1 month'));
$atgal_tekstas = "$atgal prieme teisingą sprendimą";
$kraujas = rand(20, 30) / 10;
$kraujas_tekstas = "Per sia sekunde organizmas pagamino $kraujas mil. kraujo lasteliu";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lenta | PHP Fight Club</title>
    </head>
    <body>
        <p><?php print $data_tekstas ?></p>
        <p><?php print $atgal_tekstas ?></p>
        <p><?php print $kraujas_tekstas ?> </p>
    </body>
</html>
