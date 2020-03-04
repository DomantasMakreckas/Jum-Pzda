<?php
$title = 'Array';

$vodka = [
    [
        'vardas' => 'Petras',
        'pavarde' => 'Lizius',
        'items' => [
            [
                'kiekis' => '',
                'modelis' => 'Toyota Prius'
            ]
        ]
    ],

    [
        'vardas' => 'Ona',
        'pavarde' => 'Lazauskiene',
        'items' => [
            [
                'kiekis' => 3,
                'modelis' => 'malka'
            ]
        ]
    ],

    [
        'vardas' => 'Algirdas',
        'pavarde' => 'Pautinskas',
        'items' => [
            [
                'kiekis' => 10,
                'modelis' => 'karve'
            ]
        ],
    ]
];

var_dump($vodka);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>

</style>
<body>

</body>
</html>