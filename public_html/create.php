<?php
require '../bootloader.php';

$title = 'Create';

$form = [
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
                    'placeholder' => 'Team name'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Create',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
    ]
];

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
<body>
<section>
    <?php include '../core/templates/form.tpl.php'; ?>
</section>
</body>
</html>
