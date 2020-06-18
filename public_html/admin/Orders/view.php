<?php

use App\App;
use App\Cart\Items\ItemModel;
use App\Cart\Orders\Order;
use App\Cart\Orders\OrderModel;
use App\Views\Navigation;
use Core\Views\Form;
use Core\Views\Table;

require '../../../bootloader.php';

$id = $_GET['id'] ?? null;

if ($id !== null) {
    if (strlen($id) > 0) {
        $order = OrderModel::get((int)$id);
    }
    if (!($order ?? null)) {
        header('Location: http://phpsualum.lt/admin/view.php');
    }
}
if (!App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$table = [
    'head' => [
        'Nr',
        'Preke',
        'Kaina',
    ],
];

$order_form = [
    'fields' => [
        'order_id' => [
            'type' => 'hidden',
            'value' => $order->getId(),
        ],
        'status' => [
            'label' => 'Bukle',
            'type' => 'select',
            'validate' => [
                'validate_select'
            ],
            'value' => 'status_select',
            'options' => [
                Order::STATUS_SUBMITTED => 'Patvirtinta',
                Order::STATUS_SHIPPED => 'Pakeliui',
                Order::STATUS_DELIVERED => 'Pristatyta',
                Order::STATUS_CANCELED => 'Atsaukta',
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Issaugoti',
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
    ]
];

function form_success($safe_input, $order_form)
{
    var_dump('paejo');
    $order = OrderModel::get($safe_input['order_id']);
    $order->setStatus($safe_input['status']);
    OrderModel::update($order);
}

if ($_POST) {
    $safe_input = get_filtered_input($order_form);
    validate_form($order_form, $safe_input);
}

$items = ItemModel::getWhere([
    'order_id' => $id,
    'user_id' => App::$session->getUser()->getId()
]);

$price = 0;

foreach ($items as $item) {
    $row = $item->drink()->_getData();
    unset($row['degrees'], $row['size'], $row['quantity'], $row['image']);
    $table['rows'][] = $row;
    $price += $item->drink()->getPrice();
}

$table_view = new Table($table);
$nav_view = new Navigation();

$price_print = "Viso $price Eur";
$order_title = 'Uzsakymo ID: ' . $order->getId();
$first_name = 'Vardas: ' . $order->user()->getFirstName();
$last_name = 'Pavarde: ' . $order->user()->getLastName();
$form_view = new Form($order_form);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <style>
        section, div {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table {
            border: 1px solid black;
        }

        tr, th, td {
            padding: 5px;
        }

        ul {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;

        }

        a {
            text-decoration: none;
        }

        li {
            list-style-type: none;
            margin-left: 50px;
        }
    </style>
</head>
<body>
<div>
    <?php print $nav_view->render(); ?>
</div>
<section>
    <h1><?php print $order_title ?></h1>
    <h3><?php print $first_name ?></h3>
    <h3><?php print $last_name ?></h3>
    <?php print $table_view->render(); ?>
    <h2><?php print $price_print ?></h2>
</section>
<div>
    <?php print $form_view->render() ?>
</div>
</body>
</html>
