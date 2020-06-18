<?php

use App\Users\User;
use App\Users\UserModel;
use App\Views\Navigation;
use Core\Views\Form;

require '../bootloader.php';

$title = 'Register';

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
        'firstname' => [
            'label' => 'FirstName',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'First Name'
                ]
            ]
        ],
        'lastname' => [
            'label' => 'LastName',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Last Name'
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

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

function form_success($safe_input, $form)
{
    var_dump('paejo');

    $user = new User($safe_input);
    $user->setRole(User::ROLE_USER);
    UserModel::insert($user);
}

function form_fail($safe_input, $form)
{
    var_dump('asilas');
}

$view_form = new Form($form);
$view_nav = new Navigation();
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
    <?php print $view_nav->render(); ?>
</div>
<section>
    <?php print $view_form->render() ?>
</section>
</body>
</html>

