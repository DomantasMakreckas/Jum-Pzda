<?php

use App\Cart\Orders\OrderModel;
use App\Views\Navigation;
use Core\Views\Link;
use Core\Views\Table;

require '../../../bootloader.php';

$table = [
    'head' => [
        'ID',
        'Statusas',
        'Vardas',
        'Pavarde',
        'Kaina',
        'Data',
        'Veiksmai'
    ],
    'rows' => []
];

foreach (OrderModel::getWhere([]) as $order) {
    $link = new Link([
        'url' => "/admin/orders/view.php?id={$order->getId()}",
        'title' => 'Perziureti',
        'attr' => [
            'target' => '_blank'
        ]
    ]);

//    var_dump($order);
    $table['rows'][] = [
        $order->getId(),
        $order->_getStatusName(),
        $order->user()->getFirstName(),
        $order->user()->getLastName(),
        $order->getPrice(),
        $order->getDate(),
        $link->render()
    ];
}

$table_view = new Table($table);
$view_nav = new Navigation();
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
</style>
<body>
<header>
    <?php print $view_nav->render(); ?>
</header>
<section>
    <?php print $table_view->render(); ?>
</section>
</body>
</html>
