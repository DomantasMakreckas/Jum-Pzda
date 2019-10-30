
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
        <style>             
            .box {
                width: <?php print date('s') * 15;?>;px;
                height: <?php print date('s') * 15;?>;px;
            }
        </style>
    </head>
    <body>
        <img class="box" src="images.jpg">
        <h1><?php  print date('s')?></h1>      
    </body>
</html>

