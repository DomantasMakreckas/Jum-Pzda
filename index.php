<?php

$array = [
// PIRMAS EILE
    [
        'Privemta' => false,
//  Kegliu busena
// Kegliu eiles prasideda nuo pirmo matoto
// Kegliai skaiciuojami nuo kaires i desine
        [
            [
                true,
            ],
            [
                false,
                true,
            ],
            [
                false,
                false,
                true,
            ],
            [
                true,
                false,
                false,
                true,
            ],
        ],
    ],
//  ANTRA EILE
    [
        'Privemta' => true,
//  Kegliu busena
// Kegliu eiles prasideda nuo pirmo matoto
// Kegliai skaiciuojami nuo kaires i desine
        [
            [
                false,
            ],
            [
                false,
                false,
            ],
            [
                false,
                false,
                false,
            ],
            [
                false,
                false,
                false,
                false,
            ],
        ],
    ]
];
var_dump($array);

