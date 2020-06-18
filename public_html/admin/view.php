<?php

use App\Drink\DrinkModel;
use App\Users\User;
use App\App;
use App\Views\Navigation;
use Core\Views\Table;

require '../../bootloader.php';

function delete_success($safe_input, $delete_form)
{
    DrinkModel::deleteById($safe_input['id']);
}


if (!App::$session->userIs(User::ROLE_ADMIN)) {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}

$table = [
    'head' => [
        'ID',
        'Pavadinimas',
        'Laipsniai',
        'Turis',
        'Vnt. Sandelyje',
        'Kaina',
        'url',
        'Veiksmai'
    ],
    'rows' => []
];

$delete_form = [
    'fields' => [
        'id' => [
            'type' => 'hidden',
        ],
    ],
    'buttons' => [
        'send' => [
            'text' => 'delete',
        ],
    ],
    'callbacks' => [
        'success' => 'delete_success',
    ],
];

if ($_POST) {
    $safe_input = get_filtered_input($delete_form);
    validate_form($delete_form, $safe_input);
}

foreach (DrinkModel::getWhere([]) as $drink) {
    $edit = new \Core\Views\Link([
        'url' => "/admin/edit.php?id={$drink->getId()}",
        'title' => 'Redaguoti',
        'attr' => [
            'class' => 'btn-edit'
        ]
    ]);

    $delete_form['fields']['id']['value'] = $drink->getId();
    $delete_view = new \Core\Views\Form($delete_form);

    $row = $drink->_getData();
    unset($row['image']);
    $row['edit'] = $edit->render();
    $row['delete'] = $delete_view->render();
    $table['rows'][] = $row;
}

$table_view = new Table($table);
$view_nav = new Navigation()
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
</head>
<style>
    section {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table {
        border: 1px solid black;
    }

    tr, th, td {
        padding: 5px;
    }

    ul {
        text-align: center;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style-type: none;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    button {
        margin-top: 20px;
    }
</style>
<body>
<header>
    <?php print $view_nav->render() ?>
</header>
<section>
    <?php print $table_view->render(); ?>
</section>
</body>
</html>
