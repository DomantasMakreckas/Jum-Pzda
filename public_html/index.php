<?php

use App\App;
use App\Cart\Items\Item;
use App\Cart\Items\ItemModel;
use App\Drink\DrinkModel;
use App\Views\Catalog;
use App\Views\Navigation;
use Core\Views\Form;

require '../bootloader.php';

$title = 'formos';

function form_success($safe_input, $form)
{
    var_dump('paejo');
    $item = new Item($safe_input);
    $item->setStatus(Item::STATUS_IN_CART);
    ItemModel::insert($item);
}

$add_form = [
    'callbacks' => [
        'success' => 'form_success',
    ],
    'fields' => [
        'user_id' => [
            'type' => 'hidden',
            'value' => '',
        ],
        'drink_id' => [
            'type' => 'hidden',
            'value' => '',
        ],
    ],
    'buttons' => [
        'send' => [
            'text' => 'pirk alkoholi',
            'extra' => [
                'attr' => [
                    'class' => 'buy-btn'
                ]
            ]
        ],
    ],
];

$user = App::$session->getUser();
$drinks = DrinkModel::getWhere([]);
$form = [];

foreach ($drinks as $drink_id => $drink) {
    $result[$drink_id]['data'] = $drink;
    if ($user) {
        $add_form['fields']['drink_id']['value'] = $drink->getId();
        $add_form['fields']['user_id']['value'] = $user->getId();
        $add_button = new Form($add_form);
        $result[$drink_id]['form'] = $add_button;
    }
}

if ($_POST) {
    $safe_input = get_filtered_input($add_form);
    validate_form($add_form, $safe_input);
}

$user = App::$session->getUser();

if ($user) {
    $h1 = "Sveiki, sugrize " . $user->getUsername();
} else {
    $h1 = 'Jus neprisijunges';
}


$view_catalog = new Catalog($result);
$view_nav = new Navigation();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<style>
    form {
        background: none;
        display: block;
        padding: 0px;
    }

    button {
        margin-top: 0px;
    }
    img {
        height: 200px;
    }
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .sandelys {
        border: 1px solid black;
        margin: 20px;
        min-width: 300px;
    }
    .full-beer {
        text-align: center;
    }
</style>
<body>
<div>
    <?php print $view_nav->render(); ?>
</div>
<div>
    <h1><?php print $h1 ?></h1>
</div>
<?php print $view_catalog->render(); ?>
</body>
</html>
