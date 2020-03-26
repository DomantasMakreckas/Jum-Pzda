<?php
$title = 'Advance';

$nav = [
    [
        'page' => 'Map',
        'url' => '/index.php'
    ],
    [
        'page' => 'Advance',
        'url' => '/advance.php',
    ],
    [
        'page' => 'Fight',
        'url' => '/fight.php',
    ]
];

$array = [];
$steps = rand(-3, 3);

if (0 > $steps) {
    for ($x = 0; $x > $steps; $x--) {
        $array[] = 'https://f0.pngfuel.com/png/531/265/red-arrow-direction-illustration-png-clip-art.png';
    }
    $position = 'Backward';
} elseif (0 < $steps) {
    for ($x = 0; $x < $steps; $x++) {
        $array[] = 'https://upload.wikimedia.org/wikipedia/commons/b/b3/Black_Right_Arrow.png';
    }
    $position = 'Forward';
} else {
    $position = '. It means drink some BEER!';
    $array[] = 'https://i.insider.com/5e32b2f924306a6f9b6edd52?width=1100&format=jpeg&auto=webp';
}

$h1 = 'Advance';
$h2 = "Go $steps places $position";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style/css/main.css">
    <title><?php print $title ?></title>
</head>
<body>
<header>
    <?php include "./templates/nav.php"; ?>
</header>
<section class="advance">
    <h1><?php print $h1 ?></h1>
    <h2><?php print $h2 ?></h2>
    <div class="arrows">
        <?php foreach ($array as $key => $item): ?>
            <img class="arrow" src="<?php print $array[$key]; ?>">
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>
