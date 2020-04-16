<?php
/**
 * @param bool $redirect
 */
function logout($redirect = false)
{
    $_SESSION = [];
    setcookie('PHPSESSID', null, -1);

    if ($redirect) {
        header('Location: /login.php');
    }
}

/**
 * @return bool
 */
function is_logged_in()
{
    $users = file_to_array(USERS) ?: [];
    if (isset($_SESSION['email'])) {
        foreach ($users as $user) {
            if ($user['email'] == $_SESSION['email']) {
                if ($_SESSION['password'] == $user['password']) {
                    return true;
                } else {
                    logout(false);
                }
            }
        }
    }
    return false;
}