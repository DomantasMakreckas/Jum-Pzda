<?php

use App\App;

require '../../bootloader.php';

$id = $_GET['id'] ?? null;

$user = \App\App::$session->getUser();

if($id !== null) {
    if(strlen($id) > 0) {
        $order = \App\Cart\Orders\OrderModel::get((int) $id);
    }
    if(!($order ?? null) || ($order->getUserId() != $user->id)) {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }
}

if(!App::$session->userIs(\App\Users\User::ROLE_USER)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$table = [
    'head' => [
        'nr',
        'Preke',
        'Kaina',
    ],
];

$items = \App\Cart\Items\ItemModel::getWhere(['order_id' => $order->getId(), 'user_id' => $user->id]);

$price = 0;
foreach ($items as $item) {
    $row = $item->drink()->_getData();
    unset($row['degrees'], $row['size'], $row['quantity'], $row['image']);
    $table['rows'][] = $row;
    $price += $item->drink()->getPrice();
}

$nav = new \App\Views\Navigation();
$table_view = new \Core\Views\Table($table);
$status_title = 'Statusas: ' . $order->_getStatusName();
?>
<html>
<head>
    <link rel="stylesheet" href="..\..\assets\index.css">
</head>
<body>
<?php print $nav->render(); ?>
<main>
    <h1>uzsakymo id: #<?php print $order->getId()?></h1>
    <div class="table">
        <?php print $table_view->render(); ?>
        <h4><?php print $status_title?></h4>
        <h2>viso: <?php print $price?> euru</h2>
    </div>
</main>
</body>
</html>

