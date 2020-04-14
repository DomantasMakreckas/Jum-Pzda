<?php
require 'bootloader.php';

$title = 'Join';

$form = [
    'validators' => [
        'validate_player'
    ],
    'fields' => [
        'teams' => [
            'label' => 'Join team:',
            'type' => 'select',
            'validate' => [
                'validate_select'
            ],
            'value' => 'team_select',
            'options' => []
        ],
        'nickname' => [
            'label' => 'Nickname: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Nickas'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Join',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
    ]
];

/**
 * @param $safe_input
 * @param $form
 */
function form_success($safe_input, $form)
{
    var_dump('paejo');
    $data = file_to_array(TEAM_FILE) ?: [];

    $data[$safe_input['teams']]['players'][] = [
        'nickname' => $safe_input['nickname'],
        'score' => 0
    ];

    $team_cookie = json_encode($safe_input);
    session_start();
    $_SESSION['player'] = $team_cookie;
    array_to_file($data, TEAM_FILE);
}


if (isset($_SESSION['player'])) {
    $player = json_decode($_COOKIE['player'], true);
    $data = file_to_array(TEAM_FILE);

    $team_name = $data[$player['teams']]['team_name'];
    $player_name = $player['nickname'];

    $text = "Zdarova pzdaballs zaidejau - $player_name. Jau esi komandoje $team_name";
    $print_form = false;
} else {
    $print_form = true;
}

$teams = file_to_array(TEAM_FILE) ?: [];

foreach ($teams as $team_id => $team) {
    $form['fields']['teams']['options'][$team_id] = $team['team_name'];
    var_dump($team);
}


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/style.css">
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<body>
<?php if ($print_form): ?>
    <section>
        <?php include 'core/templates/form.tpl.php' ?>
    </section>
<?php else: ?>
    <h1><?php print $text ?></h1>
<?php endif; ?>
</body>
</html>