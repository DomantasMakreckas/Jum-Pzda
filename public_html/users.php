<?php
require '../bootloader.php';

$table = [
    'head' => [
        'Klausimas',
        'Taip (%)',
    ],
    'rows' => [

    ]
];

$questions = [
    'kardanas' => 'Ar laikai kardana?',
    'bakas' => 'Ar pili i baka?',
    'zole' => 'Ar geri zoliu arbata?'
];

$data = file_to_array(DB_FILE) ?: [];

$stats = [];

foreach ($data as $response) {
    foreach ($response as $question_id => $answer) {
        if (!isset($stats[$question_id])) {
            $stats[$question_id] = 0;
        }

        if ($answer == 'taip') {
            $stats[$question_id]++;
        }
    }
}

$respondents = count($data);

foreach ($stats as $question_id => $count) {
    $table['rows'][] = [
        $questions[$question_id],
        round($count / $respondents * 100, 2)
    ];
}

$p = "Viso respondentu $respondents";

$user_id = $_COOKIE['user_id'] ?? microtime();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', "$user_id", time() + 3600, "/");
setcookie('visits', "$visits", time() + 3600, "/");

$h1 = "User ID: $user_id";
$h2 = "Vistis: $visits";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/user_style.css">
    <meta charset="utf-8">
    <title>User</title>
</head>
<style>

</style>
<body>
<h1><?php print $h1 ?></h1>
<h2><?php print $h2 ?></h2>
<section>
    <?php include '../core/templates/table.tpl.php'; ?>
    <p><?php print $p ?></p>
</section>

<div>

</div>

</body>
</html>