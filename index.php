<?php
$x = rand(1,10);


for($y = 0; $y < $x; $y++){
    $h1 = "Tai yra $y-tasis ciklas";
    var_dump($h1);
}
;?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>          
    </head>
    <body>
        <h1><?php print $h1?></h1>
    </body>
</html>

