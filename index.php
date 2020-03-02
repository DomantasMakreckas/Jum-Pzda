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
    }

    .nepabegsiu {
        flex-direction: column;
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
        transform: translateY(50%) rotate(90deg);
    }
</style>
<body>
<h1>Pabėgimo skaičiuoklė</h1>
<ul>
    <li><?php print $li1 ?></li>
    <li><?php print $li2 ?></li>
    <li><?php print $li3 ?></li>
</ul>
<?php if ($distance > 0): ?>
    <section class="pabegsiu">
        <div>
            <img src="https://vignette.wikia.nocookie.net/roblox-apocalypse-rising/images/c/c5/Police_Car.png/revision/latest/scale-to-width-down/340?cb=20190118180450">
        </div>
        <div class="arrow">
            <p><?php print $distance ?></p>
            <img src="https://vectorified.com/images/arrow-icon-3.png">
            <p>Pavyko pabėgti</p>
        </div>
        <div>
            <img src="https://lh3.googleusercontent.com/proxy/8q01eNUS0-TspT-SxL7vXpSHh1FJ81bWlEyKzCGzSPy3p13lvB6FrIHxShCBO6HIeSqs2K8f7tfw2jIVRKq9tCkIzUT6XIBXQDsRHFRrcGPz3nunTQf2RRYCAEiHQgLrHdVSPNk">
        </div>
    </section>
<?php else: ?>
    <section class="nepabegsiu">
        <div class="flexas">
            <div class="mentai">
                <img src="https://vignette.wikia.nocookie.net/roblox-apocalypse-rising/images/c/c5/Police_Car.png/revision/latest/scale-to-width-down/340?cb=20190118180450">;
            </div>
            <div>
                <img class="bybys"
                     src="https://www.pirk.lt/uploads/products/3/7/7/1520377/fantasy-dick-with-balls-flesh_3.jpg">;
            </div>
            <div>
                <img src="https://lh3.googleusercontent.com/proxy/8q01eNUS0-TspT-SxL7vXpSHh1FJ81bWlEyKzCGzSPy3p13lvB6FrIHxShCBO6HIeSqs2K8f7tfw2jIVRKq9tCkIzUT6XIBXQDsRHFRrcGPz3nunTQf2RRYCAEiHQgLrHdVSPNk">
            </div>
        </div>
        <p>Nepavyko pabėgti</p>
    </section>
<?php endif; ?>
</body>
</html>