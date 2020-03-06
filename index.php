<?php
$title = 'Array';

date_default_timezone_set('Europe/Vilnius');

$game = [
    'objects' => [
        [
            'x' => 700,
            'y' => 40,
            'class' => 'car',

        ],
        [
            'x' => 1000,
            'y' => 300,
            'class' => 'ballas'
        ],
        [
            'x' => 300,
            'y' => 100,
            'class' => 'grove'
        ],
        [
            'x' => 1200,
            'y' => 200,
            'class' => 'bike'
        ]
    ],


    'time' => '12:08',
    'player' => [
        'armor' => 70,
        'health' => 90,
        'wanted_level' => 3,
        'cash' => 3718892,
        'position' => [
            'x' => 100.123123,
            'y' => 57.312313,
            'z' => 5.212134
        ],
        'weapons' => [
            'active_id' => 0,
            'available' => [
                [
                    'name' => 'Dildo',
                    'damage' => 30,
                    'icon' => '....',
                    'type' => 'meelee',
                ],
                [
                    'name' => 'Uzi',
                    'damage' => 70,
                    'icon' => '....',
                    'type' => 'firearm',
                    'ammo' => [
                        'magazine_size' => 150,
                        'in_magazine' => 40,
                        'total' => 900,
                    ]
                ]
            ]
        ],
        'clothes' => [
            'top' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'T-shirt',
                        'model' => '....',
                    ]
                ]
            ],
            'bottom' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'Jeans',
                        'model' => '....',
                    ]
                ]
            ]
        ]
    ]
];

$data = date('H:i');
$game ['time'] = $data;

$active_id = $game['player']['weapons']['active_id'];
unset($game['player']['weapons']['available'][$active_id]);

$new_active_id = array_key_first($game['player']['weapons']['available']);
$game['player']['weapons']['active_id'] = $new_active_id;

$game ['player']['weapons']['available'][] = [
    'name' => 'spray-can',
    'damage' => 20,
    'icon' => '....',
    'type' => 'firearm',
    'ammo' => [
        'magazine_size' => 150,
        'in_magazine' => 40,
        'total' => 900,
    ]
];

$time = $game['time'];
$bapkes = $game['player']['cash'];
$h1 = "$$bapkes";
$armor = $game['player']['armor'];
$health = $game['player']['health'];
$wanted = $game['player']['wanted_level'];
$x = 6;
$k = $x - $wanted;

foreach ($game['objects'] as $key => $object) {
    $object['on_fire'] = rand(0, 1);
    $object['target'] = 0;
    if ($object['on_fire'] == 0) {
        $object['target'] = 1;
    }
    $game['objects'][$key] = $object;
}
//var_dump($game);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title><?php print $title ?></title>
</head>
<style>
    .armor {
        width: 175px;
        height: 20px;
        border: 2px solid black;
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAU4AAACXCAMAAABNy0IIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BMQEAAADCoPVP7W8GoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADOAMWZAAFyFUqwAAAAAElFTkSuQmCC");
        background-repeat: no-repeat;
        background-size: <?php print $armor ?>% 100%;
        margin-bottom: 20px;
    }

    .health {
        width: 175px;
        height: 20px;
        border: 2px solid black;
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX/AAAZ4gk3AAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC");
        background-repeat: no-repeat;
        background-size: <?php print $health ?>% 100%;
    }

    .photo {
        position: absolute;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }


</style>
<body>
<main>
    <section class="flex">
        <div>
            <img class="floatas"
                 src="https://vignette.wikia.nocookie.net/gta/images/8/80/Dildo_%28SA_-_2_-_HUD%29.png/revision/latest/top-crop/width/220/height/220?cb=20100504064155&path-prefix=pl">
        </div>
        <section>
            <p class="time"><?php print $time ?></p>
            <div class="armor"></div>
            <div class="health"></div>
        </section>

    </section>
    <!--    bapkes-->
    <h1><?php print $h1 ?></h1>

    <?php for (; $wanted < $x; $wanted++): ?>
        <img class="star"
             src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Five-pointed_star.svg/1088px-Five-pointed_star.svg.png">
    <?php endfor; ?>

    <?php for (; $k < $wanted; $k++): ?>
        <img class="star" src="https://image.flaticon.com/icons/png/512/130/130188.png">
    <?php endfor; ?>
</main>

<section>
    <?php foreach ($game['objects'] as $value): ?>
        <div class="photo <?php print $value['class'] ?>"
             style="
                     left: <?php print $value['x'] ?>px;
                     bottom: <?php print $value['y'] ?>px;">
            <?php if ($value['on_fire']) :?>
            <div class=" on_fire">
            </div>
            <?php endif; ?>
            <?php if ($value['target']) :?>
            <div class="target"></div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>


<!--<div><img src="https://media.giphy.com/media/6wpHEQNjkd74Q/giphy.gif"></div>-->
</body>
</html>