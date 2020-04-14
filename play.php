<?php
require 'bootloader.php';

$title = 'play';

$form = [
    'validators' => [
        'validate_kick'
    ],
    'fields' => [

    ],
    'buttons' => [
        'submit' => [
            'text' => 'Kick the ball',
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

if (isset($_SESSION['player'])) {
    $player = json_decode($_SESSION['player'], true);
    $nickname = $player['nickname'];
    $h1 = "Go for it, $nickname";
    $nickname_print = true;
} else {
    $nickname_print = false;
};


/**
 * @param $form
 * @param $safe_input
 */
function form_success($form, $safe_input)
{
    var_dump('paejo');
    $data = file_to_array(TEAM_FILE) ?: [];
    $decoded = json_decode($_SESSION['player'], true);
    $team = &$data[$decoded['teams']];

    foreach ($team['players'] as &$player) {
        if ($player['nickname'] == $decoded['nickname']) {
            $player['score']++;
        }
    }
    var_dump($team);
    array_to_file($data, TEAM_FILE);
}

var_dump($_SESSION);
var_dump($_COOKIE);

function form_fail($safe_input, $form)
{
    var_dump('asilas');
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
<section>
    <?php if ($nickname_print): ?>
        <h1><?php print $h1 ?></h1>
    <?php endif; ?>
    <?php include 'core/templates/form.tpl.php' ?>
</section>
</body>
</html>
