<?php
$sunny = rand(0, 1);


if ($sunny) {
    $img = 'https://cdn3.iconfinder.com/data/icons/symbol-1-1/36/12-512.png';
    $h1 = 'Sauleta';
} else {
    $img = 'https://previews.123rf.com/images/designofire/designofire1811/designofire181101801/112650027-cloudy-icon-for-personal-and-commercial-use-.jpg';
    $h1 = 'Debesuota';
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
        <style>
            img {
                width: 100px;
                height: 100px;
            }
            
            div  {
                display: flex;
            }
        </style>
    </head>
    <body>
        <div>
            <h1><?php print $h1; ?></h1>
            <img src=<?php print $img ?>>      
        </div>

    </body>
</html>

