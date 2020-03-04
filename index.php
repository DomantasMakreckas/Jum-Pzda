<?php
$title = 'Alus';

$money = rand(4, 35);
$bokal_cost = 3;
$isleista = floor($money / $bokal_cost);
$p1 = "Isgerti $isleista bokalai";
$x = 0;
$y = 1;
$z = 0;

$bokal_time = 0;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>
    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
    }

    div {
        font-size: 100px;
    }

    .tulikas {
        position: absolute;
        opacity: 0.5;

    }

    .gridas {
        display: grid;
        grid-auto-flow: row;
    }


</style>
<body>
<?php for (; $money > $bokal_cost; $money -= $bokal_cost, $y++, $bokal_time += rand(20, 30)):;
    $data = date("H:i", strtotime("+2 hours, +$bokal_time minutes")); ?>
    <div class="flex">
        <div>
            <p><?php print  $data ?></p>
            <p><?php print $z += $bokal_cost ?> EUR</p>
        </div>
        <?php for ($x = 1; $x < $y; $x++): ?>
            <img src="https://www.ermitazas.lt/out/pictures/master/product/1/106619.jpg">
        <?php endfor; ?>
        <img src="https://paciupk.lt/storage/32000/8230/5ff5f42f55d67b175335d46471aa155e.jpg">
    </div>

<?php endfor; ?>
<div class="gridas">
    <?php for ($k = 0; $k < $isleista; $k += 4): ?>
        <div>
            <img class="tulikas" src="https://www.pirk.lt/uploads/products/8/4/1/773841/pisuaras-704_3.jpg">
        </div>
    <?php endfor; ?>
</div>
</body>
</html>