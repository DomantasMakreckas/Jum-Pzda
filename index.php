<?php
$speed_of_sound = 333;
$db_decr = 6;
$db = 120;
$sec = 0;
$p = '';
$h3 = '';
$my_position = rand(1, 100);

for ($dist = 1; $db > 0; $dist *= 2) {
    $sec = round($dist / $speed_of_sound);
    $db -= $db_decr;
    $p .= "Po $sec s ($dist m.): $db db<br>";


//    if ($db > 90 && $my_position <= $dist) {
//        $h3 .= "Stovedamas $my_position m. nuo griaustinio keisiu kelnes. ";
//    } else {
//        $h3 .= "Stovedamas $my_position m. nuo griaustinio nekeisiu kelnes. ";
//    }
    if($db > 90){
        if($my_position <= $dist){
            $h3 .= "Stovedamas $my_position m. nuo griaustinio keisiu kelnes. ";
        } else {
             $h3 .= "Stovedamas $my_position m. nuo griaustinio nekeisiu kelnes. ";
    }
}
}
echo $my_position;

$h1 = 'Griaustinio zona';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>           
    </head>
    <body>
        <h1><?php print $h1; ?></h1>
        <p><?php print $p; ?></p>
        <h3><?php print $h3; ?></h3>
    </body>
</html>

