<?php
/**
 * @param bool $redirect
 */
function logout($redirect = false)
{
    $_SESSION = [];
    setcookie('PHPSESSID', null, -1);

    if ($redirect) {
        header('Location: /login');
    }
}

/**
 * @return bool
 */
function current_user()
{
    if (isset($_SESSION['email'])) {
        App\App::$db->load();
        $conditions = [
            'email' => $_SESSION['email'],
            'password' => $_SESSION['password']
        ];
        if ($users = App\App::$db->getRowsWhere('users', $conditions)) {
            return reset($users);
        }
    }
    return false;
}