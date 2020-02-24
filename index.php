<?php
$data = date("Y m d h:i:s");
$text = "$data Domantas grįžo į PHPFIGHTCLUB'ą!";
$atgal = date("Y m d h:i:s", strtotime("-1 month"));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lenta | PHP Fight Club</title>
    </head>
    <body>
        <p><?php print $text ?></p>
        <p><?php print $atgal ?></p>
    </body>
</html>
