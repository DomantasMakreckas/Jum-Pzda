<?php

namespace App\Views;

use App\App;
use App\Users\User;
use Core\View;

class Navigation extends View
{
    /**
     * Navigation constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {

        $user = App::$session->getUser();

        if ($user) {
            switch ($user->getRole()) {
                case User::ROLE_USER:
                    $data = $this->getUserNavigation();
                    break;

                case
                User::ROLE_ADMIN:
                    $data = $this->getAdminNavigation();
                    break;
            }

        } else {
            $data = $this->getAnonymousNavigation();
        }

        parent::__construct($data);

    }

    /**
     * @return array
     */
    public function getUserNavigation(): array
    {
        return [
            [
                'url' => '/cart',
                'page' => 'Cart',
            ],
            [
                'url' => '/orders/index',
                'page' => 'Orders',
            ],
            [
                'url' => '/index',
                'page' => 'Catalog',
            ],
            [
                'url' => '/logout',
                'page' => 'Logout',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getAdminNavigation(): array
    {
        return [
            [
                'url' => '/admin/view',
                'page' => 'View Product',
            ],
            [
                'url' => '/admin/add',
                'page' => 'Add Product'
            ],
            [
                'url' => '/index',
                'page' => 'Catalog'
            ],
            [
                'url' => '/admin/orders/index',
                'page' => 'View Orders',
            ],
            [
                'url' => '/logout',
                'page' => 'logout'
            ],

        ];

    }

    /**
     * @return array
     */
    public function getAnonymousNavigation(): array
    {
        return [
            [
                'url' => '/login',
                'page' => 'Login'
            ],
            [
                'url' => '/index',
                'page' => 'Catalog'
            ],
            [
                'url' => '/register',
                'page' => 'Register'
            ],
        ];

    }

    /**
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render(string $template_path = ROOT . '/app/templates/nav.tpl.php')
    {
        return parent::render($template_path);
    }
}