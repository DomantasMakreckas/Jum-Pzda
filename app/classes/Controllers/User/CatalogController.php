<?php


namespace App\Controllers\User;


use App\App;
use App\Cart\Items\Item;
use App\Cart\Items\ItemModel;
use App\Controllers\BaseController;
use App\Drink\DrinkModel;
use App\Views\Catalog;

class CatalogController extends BaseController
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
        $form = new \App\views\Forms\Catalog\AddToCartForm();

        if ($form->isSubmitted() && $form->validate()) {
            var_dump('paejo');
            $safe_input = $form->getSubmitData();
            $item = new Item($safe_input);
            $item->setStatus(Item::STATUS_IN_CART);
            ItemModel::insert($item);
        }

        $user = App::$session->getUser();
        $drinks = DrinkModel::getWhere([]);

        $result = [];
        foreach ($drinks as $drink_id => $drink) {
            $form->setDrinkId($drink->id);
            if ($user) {
                $form->setUserId($user->id);
            }
            $result[$drink_id]['data'] = $drink;
            if ($user) {
                $result[$drink_id]['form'] = $form->render();
            }
        }

        if ($user) {
            $h1 = "Sveiki, sugrize " . $user->getUsername();
        } else {
            $h1 = 'Jus neprisijunges';
        }

        $content = new \App\views\Content([
            'h1' => $h1,
            'catalog' => (new Catalog($result))->render(),
        ]);

        $this->page->setContent($content->render('auth/addToCart.tpl.php'));
        $this->page->setTitle('Catalog');

        return $this->page->render();
    }
}