<html>
    <head>
        <title>Bomba</title>
        <style>
            .bomba {
                width: <?php print date('s'); ?>%;
            }
            .bombasprogus00 {
                width: 0;
                opacity: 0;
            }
            .sprogimas{
                width: 0;
            }
            .bombasprogimas00 {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <img src="assets/images/bomb.jpg" class="bomba bombasprogus<?php print date("s"); ?>">
        <div class="bombasprogus<?php print date("s"); ?>"><?php print date('s'); ?></div>
        <img class="bombasprogimas<?php print date("s"); ?> sprogimas" src="assets/images/explosion.jpg">
    </body>
</html>