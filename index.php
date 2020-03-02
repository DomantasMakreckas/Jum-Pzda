<?php
$title = 'Mentai';

$police_fuel = rand(50, 100);
$police_cons = 7.5;
$my_fuel = rand(40, 150);
$my_cons = 11.5;

$p_distance = round($police_fuel / $police_cons * 100, 2);
$m_distance = round($my_fuel / $my_cons * 100, 2);

$li1 = "Farai nuvažiuotų: $p_distance km";
$li2 = "Aš nuvažiuočiau: $m_distance km";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<body>
<h1>Pabėgimo skaičiuoklė</h1>
<ul>
    <li><?php print $li1 ?></li>
    <li><?php print $li2 ?></li>
</ul>
</body>
</html>