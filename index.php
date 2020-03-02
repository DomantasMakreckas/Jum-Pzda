<?php
$title = 'Mentai';

$police_fuel = rand(50, 100);
$police_cons = 7.5;
$my_fuel = rand(40, 150);
$my_cons = 11.5;

$p_distance = round($police_fuel / $police_cons * 100, 2);
$m_distance = round($my_fuel / $my_cons * 100, 2);

if ($p_distance <= $m_distance) {
    $tikimybe = 'išeitų';
} else {
    $tikimybe = 'neišeitų';
}

$distance = $m_distance - $p_distance;

if ($distance > 0) {
    $vaizdavimas = 'pabegsiu';
    $police_car = 'flexas';
} else {
    $vaizdavimas = 'nepabegsiu';
    $police_car = 'mentai flexas';
}

$li1 = "Farai nuvažiuotų: $p_distance km";
$li2 = "Aš nuvažiuočiau: $m_distance km";
$li3 = "Išvada: $tikimybe pabėgti"
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>
    .pabegsiu, .nepabegsiu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .nepabegsiu {
        justify-content: center;
    }

    .arrow {
        width: 30vw;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .flexas {
        display: flex;
        position: relative;
    }

    .mentai {
        transform: translate(50%, -10%) rotate(-65deg);
        z-index: 2;
    }

    .bybys {
        z-index: -2;
        height: 200px;
        width: 100px;
        position: absolute;
        transform: translateY(-10%) rotate(90deg);
    }
</style>
<body>
<h1>Pabėgimo skaičiuoklė</h1>
<ul>
    <li><?php print $li1 ?></li>
    <li><?php print $li2 ?></li>
    <li><?php print $li3 ?></li>
</ul>
<section class="<?php print $vaizdavimas ?>">
    <div class="<?php print $police_car ?>">
        <img src="https://vignette.wikia.nocookie.net/roblox-apocalypse-rising/images/c/c5/Police_Car.png/revision/latest/scale-to-width-down/340?cb=20190118180450">
    </div>
    <?php if ($distance > 0): ?>
        <div class="arrow">
            <p><?php print $distance ?></p>
            <img src="https://vectorified.com/images/arrow-icon-3.png">
            <p>Pavyko pabėgti</p>
        </div>
    <?php else: ?>
        <div>
            <img class="bybys"
                 src="https://www.pirk.lt/uploads/products/3/7/7/1520377/fantasy-dick-with-balls-flesh_3.jpg">;
        </div>
    <?php endif; ?>
    <div>
        <img src="https://drive.venipak.com/wp-content/uploads/2017/08/drive-l-car.png">
    </div>
</section>
</body>
</html>