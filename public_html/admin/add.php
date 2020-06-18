<?php

use App\App;
use App\Drink\Drink;
use App\Drink\DrinkModel;
use App\Users\User;
use App\Views\Navigation;
use Core\Views\Form;

require '../../bootloader.php';

$title = 'Add';

if (!App::$session->userIs(User::ROLE_ADMIN)) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

function form_success($safe_input, $form)
{
    var_dump('paejo');
    DrinkModel::insert(new Drink($safe_input));
}

$nav = [
    [
        'url' => 'http://phpsualum.lt/admin/view.php',
        'page' => 'View',
    ],
];

$form = [
    'fields' => [
        'name' => [
            'label' => 'Pavadinimas',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: Lithuanica'
                ]
            ]
        ],
        'degrees' => [
            'label' => 'Laipsniai',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
                'validate_field_range' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: 40'
                ]
            ]
        ],
        'size' => [
            'label' => 'Tūris(ml)',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: 700'
                ]
            ]
        ],
        'quantity' => [
            'label' => 'Kiekis sandėlyje',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: 10'
                ]
            ]
        ],
        'price' => [
            'label' => 'Kaina (EUR)',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: 14,99'
                ]
            ]
        ],
        'image' => [
            'label' => 'Nuotrauka(URL)',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pvz.: http://...'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Sukurti',
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

$view_form = new Form($form);
$view_nav = new Navigation($nav);

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}
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
        text-align: center;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style-type: none;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    button {
        margin-top: 20px;
    }
</style>
<body>
<header>
    <?php print $view_nav->render() ?>
</header>
<section>
    <?php print $view_form->render() ?>
</section>
</body>
</html>
