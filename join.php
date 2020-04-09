<?php
require 'bootloader.php';

$title = 'Join';

$form = [
    'validators' => [
        'validate_player'
    ],
    'attr' => [
        'action' => 'join.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' => [
        'teams' => [
            'label' => 'Join team:',
            'type' => 'select',
            'validate' => [

            ],
            'value' => 'team_select',
            'options' => [
            ]
        ],
        'nickname' => [
            'label' => 'Nickname: ',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                    'placeholder' => 'Nickas'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Join',
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

$teams = file_to_array(TEAM_FILE) ?: [];

foreach ($teams as $team_id => $team) {
    $form['fields']['teams']['options'][$team_id] = $team['team_name'];
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

//var_dump($_POST);

/**
 * @param $safe_input
 * @param $form
 */
function form_success($safe_input, $form)
{
    var_dump('paejo');
    $data = file_to_array(TEAM_FILE) ?: [];

    foreach ($data as $team_id => $team) {
        if ($team['team_name'] == $safe_input['teams']) {
            $data[$team_id]['players'][] = [
                'nickname' => $safe_input['nickname'],
                'score' => 0
            ];
        }
//        var_dump($team);
    }


//    var_dump($data);
    array_to_file($data, TEAM_FILE);
}


//var_dump($safe_input);
/**
 * @param $safe_input
 * @param $form
 */
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