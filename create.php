<?php
require 'bootloader.php';

$title = 'Create';

$form = [
    'attr' => [
        'action' => 'create.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' => [
        'team_name' => [
            'label' => 'Team name',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
                'validate_team'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Team name'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Create',
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

$teams = [
    [
        'name' => 'Bybiai',
        'players' => [
            [
                'nickname' => 'kiausas',
                'score' => 99
            ],
            [
                'nickname' => 'pyzda',
                'score' => 55
            ]
        ]
    ]
];

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

function form_success($safe_input, $form)
{
    $data = file_to_array(TEAM_FILE) ?: [];

    $data[] = [
        'team_name' => $safe_input['team_name'],
        'players' => []
    ];
    array_to_file($data, TEAM_FILE);

//    header("Location: /join.php");
}


function form_fail($safe_input, $form)
{
    var_dump('EIk nx');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/style.css">
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>

</style>
<body>
<section>
    <?php include 'core/templates/form.tpl.php'; ?>
</section>

</body>
</html>
