<?php


namespace App\Controllers\Admin;


use App\App;
use App\Cart\Items\ItemModel;
use App\Cart\Orders\OrderModel;
use App\Controllers\BaseController;
use Core\Views\Link;
use Core\Views\Table;

class OrdersController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        if (!App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }
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
                'url' => "/admin/orders/edit?id={$order->getId()}",
                'title' => 'Perziureti',
                'attr' => [
                    'target' => '_blank'
                ]
            ]);

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

        $content = new \App\views\Content([
            'form' => (new Table($table))->render()
        ]);

        $this->page->setContent($content->render('admin/admin.tpl.php'));
        $this->page->setTitle('Orders');

        return $this->page->render();
    }

    function edit(): ?string
    {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = OrderModel::get((int)$id);
            }
            if (!($order ?? null)) {
                header('Location: http://phpsualum.lt/admin/edit');
                exit;
            }
        }

        $table = [
            'head' => [
                'Nr',
                'Preke',
                'Kaina',
            ],
            'rows' => []
        ];

        $order_form = new \App\views\Forms\Admin\Orders\EditForm();

        if ($order_form->isSubmitted() && $order_form->validate()) {
            var_dump('paejo');
            $safe_input = $order_form->getSubmitData();
            $order = OrderModel::get($safe_input['order_id']);
            $order->setStatus($safe_input['status']);
            OrderModel::update($order);
        }

        $items = ItemModel::getWhere([
            'order_id' => $order->getId()
        ]);

        $price = 0;
        foreach ($items as $item) {
            $row = $item->drink()->_getData();
            unset($row['degrees'], $row['size'], $row['quantity'], $row['image']);
            $table['rows'][] = $row;

            $price += $item->drink()->getPrice();
        }

        $table_view = new Table($table);

        $content = new \App\views\Content([
            'order_title' => 'Uzsakymo ID ' . $order->getId(),
            'first_name' => 'Vardas ' . $order->user()->getFirstName(),
            'last_name' => 'Pavarde ' . $order->user()->getLastName(),
            'table' => $table_view->render(),
            'price' => 'Viso ' . $price . ' Eur',
            'form' => $order_form->render()
        ]);

        $this->page->setContent($content->render('admin/edit.tpl.php'));
        $this->page->setTitle('Edit Order');

        return $this->page->render();
    }
}