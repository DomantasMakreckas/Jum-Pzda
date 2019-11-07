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
           'pirma_eile' => [
                'pirmas_keglis' => true,
            ],
            'antra_eile' => [
                'antras_keglis' => false,
                'trecias_keglis' => true,
            ],
            'trecia_eile' => [
                'ketvirtas_keglis' => false,
                'penktas_keglis' => false,
                'sestas_keglis' => true,
            ],
            'ketvirta_eile' => [
                'septintas_keglis' => true,
                'astuntas_keglis' => false,
                'devintas_keglis' => false,
                'desimtas_keglis' => true,
            ],
        ],
    ],
//  ANTRA EILE
    [
        [
            'boulingo_takelio_busena' => 'Privemta',
        ], 
        
    ]
];
var_dump($array);

