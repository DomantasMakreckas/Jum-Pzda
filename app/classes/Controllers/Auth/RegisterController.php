<?php


namespace App\Controllers\Auth;


use App\Controllers\BaseController;
use App\Users\User;
use App\Users\UserModel;

class RegisterController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Register');
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
        $form = new \App\views\Forms\Auth\RegisterForm();

        if ($form->isSubmitted() && $form->validate()) {
            var_dump('paejo');

            $user = new User($form->getSubmitData());
            $user->setRole(User::ROLE_USER);
            UserModel::insert($user);
        }

        $content = new \App\views\Content([
            'h1' => 'Registracija',
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('auth/register.tpl.php'));
        return $this->page->render();
    }
}