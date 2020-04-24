<?php


require '../bootloader.php';

$title = 'formos';

function form_success($safe_input, $form)
{
    var_dump('paejo');

    if (App\App::$db->getRowsWhere('users', ['email' => $_SESSION['email']])) {
        App\App::$db->insertRow('pixel_table', [
            'username' => $_SESSION['email'],
            'x' => $safe_input['x'],
            'y' => $safe_input['y'],
            'color' => $safe_input['color'],
        ]);
    }
}

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
    'fields' => [
        'x' => [
            'label' => 'X koordinates',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
                'validate_field_range' => [
                    'min' => 1,
                    'max' => 800,
                ]
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
                'validate_field_range' => [
                    'min' => 1,
                    'max' => 1000,
                ]
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
    ]
];

$user = current_user();

if ($user) {
    $h1 = "Sveiki, sugrize " . $user['username'];
    unset($nav[1]);
    unset($nav[2]);
} else {
    $h1 = 'Jus neprisijunges';
    unset($nav[3]);
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$pixels = App\App::$db->getRowsWhere('pixel_table', []);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="style.css">
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
        position: relative;
    }

    span {
        height: 10px;
        width: 10px;
        display: inline-block;
        position: absolute;
    }
</style>
<body>
<div>
    <?php include '../app/templates/nav.tpl.php'; ?>
</div>
<div>
    <h1><?php print $h1 ?></h1>
</div>
<div class="pixels">
    <?php foreach ($pixels as $pixel): ?>
        <span style="
                top: <?php print $pixel['x']; ?>;
                left: <?php print $pixel['y']; ?>;
                background: <?php print $pixel['color']; ?>; "></span>
    <?php endforeach; ?>
</div>
<section>
    <?php include '../core/templates/form.tpl.php'; ?>
</section>
</body>
</html>
