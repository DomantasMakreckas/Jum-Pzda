<?php

use App\App;
use App\Drink\Drink;
use App\Drink\DrinkModel;
use App\Users\User;
use Core\Views\Form;

require '../../bootloader.php';

$title = 'Edit';

if (!App::$session->userIs(User::ROLE_ADMIN)) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$id = $_GET['id'] ?? null;
if ($id !== null) {
    if (strlen($id) > 0) {
        $drink = DrinkModel::get((int)$id);
    }

    if (!($drink ?? null)) {
        header('Location: http://phpsualum.lt/admin/view.php');
    }
}

$form = [
    'fields' => [
        'name' => [
            'label' => 'Pavadinimas',
            'type' => 'text',
            'value' => $drink->getName(),
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
            'value' => $drink->getDegrees(),
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
            'value' => $drink->getSize(),
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
            'value' => $drink->getQuantity(),
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
            'value' => $drink->getPrice(),
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
            'label' => 'Nuotrauka',
            'type' => 'text',
            'value' => $drink->getImage(),
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'http://'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Atnaujinti',
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

function form_success($safe_input, $form)
{
    var_dump('paejo');
    $safe_input['id'] = $_GET['id'];
    DrinkModel::update(new Drink($safe_input));
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$view_form = new Form($form);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<body>
<section>
    <?php print $view_form->render() ?>
</section>
</body>
</html>
