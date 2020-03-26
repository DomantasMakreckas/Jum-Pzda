<?php
$title = 'formos';

/**
 *  funkcija apsauganti nuo pavojingu ivesciu (POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{
    $filter_params = [];

    foreach ($form['fields'] as $key => $field) {
        $filter_params[$key] = FILTER_SANITIZE_SPECIAL_CHARS;

    }

    return filter_input_array(INPUT_POST, $filter_params);
}

var_dump(get_filtered_input($_POST));

$safe_input = get_filtered_input($_POST);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>

</style>
<body>
<h1>Hack It!</h1>
<h2><?php print $safe_input['vardas'] ?? ''; ?></h2>
<form method="post">
    <input type="text" name="vardas">
    <input type="text" name="pavarde">
    <input type="submit">
</form>
</body>
</html>
