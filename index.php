
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP lydes ir <?php print date('m-d-Y', strtotime('+' . rand(1, 10) . ' year'))?></title>
    </head>
    <body>
        <h1><b>Robertas</b> - Galbut turesiu <?php print rand(1, 5)?> vaikus</h1>
        <p>D. Trump`as nebebus perzidentu: <?php  print date('Y-m-d', strtotime('+'. rand(2, 10) . 'year'))?></p>
    </body>
</html>

