<?php


namespace App\Cart\Items;


use App\App;
use App\Users\User;

class ItemModel
{
    const TABLE = 'items_table';

    /**
     * @param User $user
     */
    public static function insert(Item $item)
    {
        App::$db->insertRow(self::TABLE, $item->_getData());
    }

    /**
     * @param $conditions
     * @return array
     */
    public static function getWhere($conditions): array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $users = [];
        foreach ($rows as $row) {
            $users[] = new Item($row);
        }
        return $users;
    }

    /**
     * @param User $user
     */
    public static function update(Item $item)
    {
        App::$db->updateRow(self::TABLE, $item->getId(), $item->_getData());
    }

    /**
     * @param User $user
     */
    public static function delete(Item $item)
    {
        App::$db->deleteRow(self::TABLE, $item->getId());
    }

    /**
     * @param int $id
     * @return User|null
     */
    public static function get(int $id): ?Item
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Item($row);
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