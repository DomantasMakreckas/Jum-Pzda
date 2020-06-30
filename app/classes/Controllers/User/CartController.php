<?php


namespace App\Controllers\User;


use App\App;
use App\Cart\Items\Item;
use App\Cart\Items\ItemModel;
use App\Cart\Orders\Order;
use App\Cart\Orders\OrderModel;
use App\Controllers\BaseController;
use Core\Views\Table;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
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
                'Nr.',
                'Prekė',
                'Kaina',
                'Veiksmai'
            ],
        ];

        $cancel_form = new \App\views\Forms\Auth\CartCancelForm();
        $confirm_form = new \App\views\Forms\Auth\CartSuccessForm();

        if ($cancel_form->isSubmitted() && $cancel_form->validate()) {
            $safe_input = $cancel_form->getSubmitData();
            var_dump($safe_input);
            ItemModel::deleteById($safe_input['id']);
        }

        if ($confirm_form->isSubmitted() && $confirm_form->validate()) {
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

        $user = App::$session->getUser();
        $items = ItemModel::getWhere([
            'user_id' => $user->getId(),
            'status' => Item::STATUS_IN_CART
        ]);

        if ($user) {
            $add = 1;
            foreach ($items as $item) {
                $cancel_form->setId($item->getId());

                $table['rows'][] = [
                    $add,
                    $item->drink()->name,
                    $item->drink()->price,
                    $cancel_form->render()
                ];
                $add++;
            }
        }

        $content = new \App\views\Content([
            'table' => (new Table($table))->render(),
            'form' => $confirm_form->render()
        ]);

        $this->page->setContent($content->render('user/cart.tpl.php'));
        $this->page->setTitle('Cart');

        return $this->page->render();
    }
}