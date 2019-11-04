<?php
$sekunde = date('s');

if (($sekunde % 2) == 0) {
    $h1 = 'lygine';
    $class = 'kvadratas';
} else {
    $h1 = 'nelygine';
    $class = 'apskritimas';
}
;?>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
        <style>
            div {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100px;
                height: 100px;
            }
            .kvadratas {
                border: 2px solid black;
            }
            .apskritimas {
                border-radius: 50%;
                border:2px solid black;
            }
        </style>         
    </head>
    <body>
        <div class="<?php print $class ?>">
            <h1><?php print $sekunde ?></h1>
        </div>
    </body>
</html>

