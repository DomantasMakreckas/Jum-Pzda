<?php


namespace App\Controllers\User;


use App\App;
use App\Controllers\BaseController;

class OrdersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
//        if(!App::$session->userIs(\App\Users\User::ROLE_USER)) {
//            header('HTTP/1.1 401 Unauthorized');
//            exit;
//        }
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * There can be more methods,
     * like edit (for showing edit form)
     * delete (for deleting an item)
     * and more if needed,
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create(),
     * edit() and
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * edit.php:
     * $controller = new ProductsController();
     * print $controller->edit();
     *
     *
     * create.php:
     * $controller = new ProductsController();
     * print $controller->create();
     *
     * @return string|null
     */
    function index(): ?string
    {
        $user = \App\App::$session->getUser();

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
                'url' => "/orders/view?id={$order->getId()}",
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

        $content = new \App\views\Content([
            'table' => (new \Core\Views\Table($table))->render()
        ]);

        $this->page->setContent($content->render('user/index.tpl.php'));
        $this->page->setTitle('Orders');

        return $this->page->render();
    }

    function view(): ?string
    {
        $id = $_GET['id'] ?? null;

        $user = \App\App::$session->getUser();

        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = \App\Cart\Orders\OrderModel::get((int)$id);
            }
            if (!($order ?? null) || ($order->getUserId() != $user->id)) {
                header('HTTP/1.1 401 Unauthorized');
                exit;
            }
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

        $h1 = 'Uzsakymo id:#: ' . $order->getId();
        $total_price = "Viso $price euru";
        $status_title = 'Statusas: ' . $order->_getStatusName();

        $content = new \App\views\Content([
            'id' => $h1,
            'table' => (new \Core\Views\Table($table))->render(),
            'status' => $status_title,
            'price' => $total_price
        ]);

        $this->page->setContent($content->render('user/view.tpl.php'));
        $this->page->setTitle('Order');

        return $this->page->render();
    }
}