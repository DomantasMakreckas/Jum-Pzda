<?php
$title = 'Fight';

$fights = [

];

$enemy_soldier_count = rand(5, 15);
$my_soldier_count = 10;

$win_perc = ($my_soldier_count / $enemy_soldier_count) * 100;
$win_chance = rand(0, 100);
for (; $my_soldier_count > 0 && $enemy_soldier_count > 0;) {
    if ($win_chance >= $win_perc) {
        $enemy_soldier_count--;
        $fights[][$my_soldier_count] = ['img' => 'https://t5.rbxcdn.com/a8b1fa785fa93617f197ee05c749a765'];
        $fights['enemies_down'] = ['img' => 'https://pngimage.net/wp-content/uploads/2018/05/dead-soldier-png-1.png'];
    } else {
        $my_soldier_count--;
        $fights['soldiers'] = ['img' => 'https://t5.rbxcdn.com/a8b1fa785fa93617f197ee05c749a765'];
        $fights['enemies_down'] = ['img' => 'https://pngimage.net/wp-content/uploads/2018/05/dead-soldier-png-1.png'];
    }
}

var_dump($fights);
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./assets/style/css/main.css">
    <title><?php print $title; ?></title>
</head>
<body>
<header>
</header>
<main>
<!--    <h1>--><?php //print $h1; ?><!--</h1>-->
<!--    <h2>--><?php //print $h2; ?><!--</h2>-->
    <div class="fights-container">
        <?php foreach ($fights as $fight): ?>
            <div class="fight">
                <div class="my-soldier">M</div>
                <div class="hedge">-</div>
                <?php for ($i = 0; $i < $fight['enemies_down']; $i++): ?>
                    <div class="enemy-soldier">E</div>
                <?php endfor; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
