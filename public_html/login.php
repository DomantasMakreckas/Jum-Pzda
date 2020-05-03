<?php

use App\Views\Navigation;
use Core\Views\Form;

require '../bootloader.php';

$title = 'Login';

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
        'action' => 'login.php',
        'method' => 'POST',
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'validate' => [
                'validate_not_empty',
                'validate_email'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Username'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Password'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Login',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

unset($nav[3]);

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

function form_success($safe_input, $form)
{
    var_dump('paejo');

    \App\App::$session->login($safe_input['email'], $safe_input['password']);

    header('Location: /index.php');
}

function form_fail($safe_input, $form)
{
    var_dump('asilas');
}

$view_form = new Form($form);

$view_nav = new Navigation($nav);

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


</style>
<body>
<div>
    <?php print $view_nav->render(); ?></div>
<section>
    <?php print $view_form->render(ROOT . '/core/templates/form.tpl.php') ?>
</section>
</body>
</html>
