<?php

namespace Core;

use App\App;

class Session
{

    private $user;

    public function __construct()
    {
        $this->loginFromCookie();
    }

    public function loginFromCookie()
    {
        if ($_SESSION) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }

    }

    public function login($email, $password)
    {
        $conditions = [
            'email' => $email,
            'password' => $password
        ];

        $user_info = App::$db->getRowWhere('users', $conditions);

        if ($user_info) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = $user_info;

            return true;
        }

        return false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function logout($redirect = null)
    {
        $_SESSION = [];
        session_destroy();
        setcookie('PHPESSID', null, -1);

        if ($redirect) {
            header("Location: $redirect");
        }
    }
}