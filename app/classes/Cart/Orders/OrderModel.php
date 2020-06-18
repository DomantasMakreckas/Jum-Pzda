<?php

namespace App\Cart\Orders;

use App\App;
use App\Cart\Orders\Order;
use App\Drink\DrinkModel;
use Core\DataHolder;

class OrderModel
{
    const TABLE = 'order';

    /**
     * @param \App\Cart\Orders\Order $order
     * @return bool|mixed|null
     */
    public static function insert(Order $order)
    {
        return App::$db->insertRow(self::TABLE, $order->_getData());
    }

    /**
     * @param $conditions
     * @return array
     */
    public static function getWhere(array $conditions): array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $order = [];
        foreach ($rows as $row) {
            $order[] = new Order($row);
        }
        return $order;
    }

    /**
     * @param \App\Cart\Orders\Order $order
     */
    public static function update(Order $order)
    {
        App::$db->updateRow(self::TABLE, $order->getId(), $order->_getData());
    }

    /**
     * @param \App\Cart\Orders\Order $order
     */
    public static function delete(Order $order)
    {
        App::$db->deleteRow(self::TABLE, $order->getId());
    }

    /**
     * @param $id
     */
    public static function deletebyId(int $id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }

    /**
     * @param int $id
     * @return \App\Cart\Orders\Order|null
     */
    public static function get(int $id): ?Order
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Order($row);
        } else {
            return null;
        }
    }
}