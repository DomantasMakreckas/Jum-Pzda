<?php
require 'bootloader.php';

$table = [
    'head' => [
        'username',
        'password',
    ],
    'rows' => [

    ]
];

$table['rows'] = file_to_array(DB_FILE) ?: [];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="app/assets/style.css">
    <meta charset="utf-8">
    <title>User</title>
</head>
<style>

</style>
<body>
<section>
    <?php include 'core/templates/table.tpl.php'; ?>
</section>
</body>
</html>