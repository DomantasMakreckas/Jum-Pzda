<html>
    <head>
        <title></title>
        <style>
            body {
                background-color: rgb(<?php print rand(0, 255); ?>, <?php print rand(0, 255); ?>,<?php print rand(0, 255); ?>);
            }
            .textSize {
                font-size: <?php print rand(1, 100); ?>;
            }
            .textColor {
                color: rgb(<?php print rand(0, 255); ?>, <?php print rand(0, 255); ?>,<?php print rand(0, 255); ?>);
            }
        </style>
    </head>
    <body>
        <h1 class ="textSize">Aš keičiu savo dydį</h1>
        <p class="textColor">Aš keičiu savo spalvą</p>
    </body>
</html>