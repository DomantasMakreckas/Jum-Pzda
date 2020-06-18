<?php

use App\App;

require '../../bootloader.php';

$user = \App\App::$session->getUser();

if(!App::$session->userIs(\App\Users\User::ROLE_USER)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$table = [
    'head' => [
        'id',
        'status',
        'Data',
        'Kaina',
        'Veiksmai',
    ],
];

$orders = \App\Cart\Orders\OrderModel::getWhere(['user_id' => $user->id]);

$number = 1;
foreach ($orders as $order) {
    $view = new \Core\Views\Link([
        'url' => "/orders/view.php?id={$order->getId()}",
        'title' => 'Perziureti',
        'attr' => [
            'class' => 'mano-linkas',
        ]
    ]);

    $row = [
        'number' => $number,
        'status' => $order->_getStatusName(),
        'date' => $order->getDate(),
        'price' => $order->getPrice(),
        'action' => $view->render()
    ];

    unset($row['user_id']);
    $table['rows'][] = $row;
    $number++;
}

$nav = new \App\Views\Navigation();
$table_view = new \Core\Views\Table($table);
?>

<html>
<head>
</head>
<?php print $nav->render(); ?>
<body>
<main>
    <div class="table">
        <?php print $table_view->render(); ?>
    </div>
</main>
</body>
</html>
