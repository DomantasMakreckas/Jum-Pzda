<?php

use App\Users\User;

require '../bootloader.php';

$title = 'Register';

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
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Username'
                ]
            ]
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'validate' => [
                'validate_not_empty',
                'validate_email',
                'validate_email_unique'
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
        'password_repeat' => [
            'label' => 'Password Repeat',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Repeat password'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Register',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ]
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

    $user = new User($safe_input);
    App\App::$db->insertRow('users', $user->_getData());

//    header('Location: /login.php');
}

function form_fail($safe_input, $form)
{
    var_dump('asilas');
}

$view_form = new \Core\Views\Form($form);

$view_nav = new \Core\Views\Form($nav);
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
    <?php print $view_nav->render(ROOT . '/app/templates/nav.tpl.php');?></div>
<section>
    <?php print $view_form->render(ROOT . '/core/templates/form.tpl.php')?>
</section>
</body>
</html>

