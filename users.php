<?php
require 'bootloader.php';

$table = [
    'head' => [
        'Klausimas',
        'Taip (%)',
    ],
    'rows' => [
        [
            'Ar laikai kardana?',
        ],
        [
            'Ar pili i baka?'
        ],
        [
            'Ar rukai zoliu arbata?'
        ]

    ],
    'answers' => [

    ]
];

$table['answers'] = file_to_array(DB_FILE) ?: [];
$kardanas = 0;
$bakas = 0;
$zole = 0;
foreach ($table['answers'] as $answer) {

    if ($answer['kardanas'] == 'taip') {
        $kardanas++;
    }
    if ($answer['bakas'] == 'taip') {
        $bakas++;
    }
    if ($answer['zole'] == 'taip') {
        $zole++;
    }
}

// Apskaiciuojam dalyciu skaiciu
$participants = count(file_to_array(DB_FILE));

//apskaiciuojam procenta kiek zmoniu atsake TAIP
$percent1 = round($kardanas / $participants * 100, 2);
$percent2 = round($bakas / $participants * 100, 2);
$percent3 = round($zole / $participants * 100, 2);

// idedam i table rezultata
$table['rows'][0][] = "$percent1 %";
$table['rows'][1][] = "$percent2 %";
$table['rows'][2][] = "$percent3 %";

$p = "Viso respondentu $participants";


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/user_style.css">
    <meta charset="utf-8">
    <title>User</title>
</head>
<style>

</style>
<body>

<section>
    <?php include 'core/templates/table.tpl.php'; ?>
    <p><?php print $p ?></p>
</section>

</body>
</html>