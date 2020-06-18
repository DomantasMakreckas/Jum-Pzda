<?php

use App\Cart\Items\Item;
use App\Cart\Items\ItemModel;
use App\Cart\Orders\Order;
use App\Cart\Orders\OrderModel;
use App\Drink\DrinkModel;
use App\App;
use App\Views\Navigation;
use Core\Views\Form;
use Core\Views\Table;

require '../bootloader.php';
$table = [
    'head' => [
        'Nr.',
        'Prekė',
        'Kaina',
        'Veiksmai'
    ],
];

$cancel_form = [
    'fields' => [
        'id' => [
            'type' => 'hidden'
        ],
    ],
    'buttons' => [
        'send' => [
            'text' => 'Nebenuoru',
        ],
    ],
    'callbacks' => [
        'success' => 'cancel_success',
    ],
];

$order_form = [
    'fields' => [
        'id' => [
            'type' => 'hidden'
        ],
    ],
    'buttons' => [
        'order' => [
            'text' => 'Uzsakyti',
        ],
    ],
    'callbacks' => [
        'success' => 'order_success',
    ],
];

function cancel_success($safe_input, $cancel_form)
{
    ItemModel::deleteById($safe_input['id']);
}

function order_success($safe_input, $cancel_form)
{
    $items = ItemModel::getWhere([
        'user_id' => App::$session->getUser()->getId(),
        'status' => Item::STATUS_IN_CART
    ]);

    $order = new Order([
            'date' => date("Y-M-d H:i")
    ]);

    $order_id = OrderModel::insert($order);
    $order->setId($order_id);
    $order->setStatus(Order::STATUS_SUBMITTED);
    $order->setUserId(App::$session->getUser()->getId());

    $sum = 0;

    foreach ($items as $item) {
        $item->setStatus(Item::STATUS_ORDERED);
        $item->setOrderId($order_id);
        ItemModel::update($item);
        $sum += $item->drink()->getPrice();
    }

    $order->setPrice($sum);
    OrderModel::update($order);
}

if (get_form_action() === 'send') {
    $safe_input = get_filtered_input($cancel_form);
    validate_form($cancel_form, $safe_input);
} elseif (get_form_action() === 'order') {
    $safe_input = get_filtered_input($order_form);
    validate_form($order_form, $safe_input);
}

$drinks = DrinkModel::getWhere([]);
$user = App::$session->getUser();
$items = ItemModel::getWhere([
    'user_id' => $user->getId(),
    'status' => Item::STATUS_IN_CART
]);

if ($user) {
    $add = 1;
    foreach ($items as $item) {
        $cancel_form['fields']['id']['value'] = $item->getId();
        $cancel_view = new Form($cancel_form);

        $table['rows'][] = [$add,
            $item->drink()->name,
            $item->drink()->price,
            $cancel_view->render()];
        $add++;
    }
}

$table_view = new Table($table);
$order_view = new Form($order_form);
$nav_view = new Navigation();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<!--    <link rel="stylesheet" href="style.css">-->
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
</style>
<body>
<div>
    <?php print $nav_view->render();?>
</div>
<section>
    <?php print $table_view->render(); ?>
</section>
<section>
    <?php print $order_view->render(); ?>
</section>
</body>
</html>