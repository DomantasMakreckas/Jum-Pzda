<?php

namespace Core;

use App\App;
use App\Users\User;

class Session
{

    private $user;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->loginFromCookie();
    }

    /**
     *
     */
    public function loginFromCookie()
    {
        if ($_SESSION) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }

    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password): bool
    {
        $conditions = [
            'email' => $email,
            'password' => $password
        ];

        $user_info = App::$db->getRowWhere('users', $conditions);

        if ($user_info) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = new User($user_info);

            return true;
        }

        return false;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param null $redirect
     */
    public function logout($redirect = null)
    {
        $_SESSION = [];
        session_destroy();
        setcookie('PHPESSID', null, -1);

        if ($redirect) {
            header("Location: $redirect");
        }
    }

    /**
     * @param int $role
     * @return bool
     */
    public function userIs(int $role): bool
    {
        if (($user = \App\App::$session->getUser()) && $user->getRole() == $role) {
            return true;

        };

        return false;
    }
}