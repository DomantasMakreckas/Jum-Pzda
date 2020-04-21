<?php
require '../bootloader.php';

$title = 'formos';

$nav = [
    [
        'url' => '/index.php',
        'page' => 'Home',
    ],
    [
        'url' => '/register.php',
        'page' => 'Register',
    ],
    [
        'url' => '/login.php',
        'page' => 'Login',
    ],
    [
        'url' => '/logout.php',
        'page' => 'Logout',
    ],
];

$form = [
    'attr' => [
        'action' => 'register.php',
        'method' => 'POST',
    ],
    'fields' => [
        'x' => [
            'label' => 'X koordinates',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => '200'
                ]
            ]
        ],
        'y' => [
            'label' => 'Y koordinates',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => '300'
                ]
            ]
        ],
        'color' => [
            'label' => 'Spalva',
            'type' => 'color',
            'validate' => [
                'validate_not_empty',

            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Username'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Pirk pixeli',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]
        ]
    ],

    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

$logged = is_logged_in();

$print = false;
if ($logged) {
    $data = file_to_array(USERS) ?: [];

    foreach ($data as $people) {
        if ($people['email'] == $_SESSION['email']) {
            $username = $people['username'];
            $print = true;
        }
    }
}

if ($print) {
    $h1 = "Sveiki, sugrize $username";
    unset($nav[1]);
    unset($nav[2]);
} else {
    $h1 = 'Jus neprisijunges';
    unset($nav[3]);
}

$array = [
    [
        'oop' => '!poo',
        'oop1' => '!poo',
    ],
    [
        'oop' => '!poo',
        'oop1' => '!poo',
    ]
];

$db = new FileDB(DB_FILE);

$db->setData($array);
$db->save();
$db->load();
$db->getData();

var_dump($db);

$db->createTable('bybys');
$db->insertRow('alus', $array, 'indeksas');
$data = $db->getData();
var_dump($data);
var_dump($db->getData());
var_dump(array_key_last($data['alus']));


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="../app/assets/style.css">
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>
    ul {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    .pixels {
        height: 800px;
        width: 1700px;
        border: 1px solid red;
    }

    span {
        height: 10px;
        width: 10px;
        background-color: aqua;
        display: block;
    }
</style>
<!--<body>-->
<!--<div>-->
<!--    --><?php //include '../app/templates/nav.tpl.php'; ?>
<!--</div>-->
<!--<div>-->
<!--    <h1>--><?php //print $h1 ?><!--</h1>-->
<!--</div>-->
<!--<div class="pixels">-->
<!--    <span></span>-->
<!--</div>-->
<!--<section>-->
<!--    --><?php //include '../core/templates/form.tpl.php'; ?>
<!--</section>-->
</body>
</html>
