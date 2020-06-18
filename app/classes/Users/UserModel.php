<?php

namespace App\Users;

use App\App;

class UserModel
{
    const TABLE = 'users';

    /**
     * @param User $user
     */
    public static function insert(User $user)
    {
        App::$db->insertRow(self::TABLE, $user->_getData());
    }

    /**
     * @param $conditions
     * @return array
     */
    public static function getWhere(array $conditions): array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $users = [];
        foreach ($rows as $row) {
            $users[] = new User($row);
        }
        return $users;
    }

    /**
     * @param User $user
     */
    public static function update(User $user)
    {
        App::$db->updateRow(self::TABLE, $user->getId(), $user->_getData());
    }

    /**
     * @param User $user
     */
    public static function delete(User $user)
    {
        App::$db->deleteRow(self::TABLE, $user->getId());
    }

    /**
     * @param int $id
     * @return User|null
     */
    public static function get(int $id): ?User
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new User($row);
        } else {
            return null;
        }
    }

    /**
     * @param $id
     */
    public static function deleteById($id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }
}