<?php

$array = [
// PIRMAS EILE
    [
        [
            'boulingo_takelio_busena' => 'Neprivemta',
        ],
//  Kegliu busena
// Kegliu eiles prasideda nuo pirmo matoto
// Kegliai skaiciuojami nuo kaires i desine
        [
            [
                1 => true,
            ],
            [
                1 => false,
                2 => true,
            ],
            [
                1 => false,
                2 => false,
                3 => true,
            ],
            [
                1 => true,
                2 => false,
                3 => false,
                4 => true,
            ],
        ],
    ],
//  ANTRA EILE
    [
        [
            'boulingo_takelio_busena' => 'Privemta',
        ],
        [
            [
                1 => false,
            ],
            [
                1 => false,
                2 => false,
            ],
            [
                1 => false,
                2 => false,
                3 => false,
            ],
            [
                1 => false,
                2 => false,
                3 => false,
                4 => false,
            ],
        ],
    ]
];
var_dump($array);

