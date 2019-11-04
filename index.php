<?php
$grizai_velai = rand(0,1);
$grizai_isgeres = rand(0,1);

$h1 = 'Buitine skaiciuokle';
$h2 = '';


if($grizai_isgeres && $grizai_velai) {
    $h2 = 'Grizai velai ir isgeres';
} if($grizai_isgeres && !$grizai_velai ) {
    $h2 = 'Grizai isgeres';
} if(!$grizai_isgeres && $grizai_velai) {
    $h2 = 'Grizai velai';
} if(!$grizai_isgeres && !$grizai_velai) {
    $h2 = 'Nieko nepadarei';
}
;?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
    </head>
    <body>
        <h1><?php print $h1 ;?></h1>
        <h2><?php print $h2 ;?></h2>
    </body>
</html>

