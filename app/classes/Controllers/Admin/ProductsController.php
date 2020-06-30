<?php


namespace App\Controllers\Admin;


use App\App;
use App\Controllers\BaseController;
use App\Drink\Drink;
use App\Drink\DrinkModel;
use App\Users\User;
use Core\Views\Table;

class ProductsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if (!App::$session->userIs(User::ROLE_ADMIN)) {
            header("HTTP/1.1 401 Unauthorized");
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
        $delete_form = new \App\views\Forms\Admin\Products\ViewForm();

        if ($delete_form->validate() && $delete_form->isSubmitted()) {
            $safe_input = $delete_form->getSubmitData();
            DrinkModel::deleteById($safe_input['id']);
        }

        $table = [
            'head' => [
                'ID',
                'Pavadinimas',
                'Laipsniai',
                'Turis',
                'Vnt. Sandelyje',
                'Kaina',
                'Taisyti',
                'Veiksmai'
            ],
            'rows' => []
        ];

        foreach (DrinkModel::getWhere([]) as $drink) {
            $edit = new \Core\Views\Link([
                'url' => "/admin/edit?id={$drink->getId()}",
                'title' => 'Redaguoti',
                'attr' => [
                    'class' => 'btn-edit'
                ]
            ]);

            $delete_form->setId($drink->getId());
            $row = $drink->_getData();
            unset($row['image']);
            $row['edit'] = $edit->render();
            $row['delete'] = $delete_form->render();
            $table['rows'][] = $row;
        }

        $content = new \App\views\Content([
            'form' => (new Table($table))->render()
        ]);

        $this->page->setContent($content->render('admin/admin.tpl.php'));
        $this->page->setTitle('View Product');

        return $this->page->render();
    }

    function create(): ?string
    {
        $form = new \App\views\Forms\Admin\Products\AddForm();

        if ($form->isSubmitted() && $form->validate()) {
            $drink = new Drink($form->getSubmitData());
            DrinkModel::insert($drink);
        }

        $content = new \App\views\Content(['form' => $form->render()]);

        $this->page->setTitle('Add product');
        $this->page->setContent($content->render('admin/admin.tpl.php'));

        return $this->page->render();
    }

    function edit(): ?string
    {
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            if (strlen($id) > 0) {
                $drink = DrinkModel::get((int)$id);
            }

            if (!($drink ?? null)) {
                header('Location: http://phpsualum.lt/admin/edit');
            }
        }

        $form = new \App\views\Forms\Admin\Products\EditForm();

        if ($form->isSubmitted() && $form->validate()) {
            var_dump('paejo');

            $drink = new Drink($form->getSubmitData());
            $drink->setId($id);
            DrinkModel::update($drink);
        }

        $content = new \App\views\Content([
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('admin/admin.tpl.php'));
        $this->page->setTitle('Edit');

        return $this->page->render();
    }
}