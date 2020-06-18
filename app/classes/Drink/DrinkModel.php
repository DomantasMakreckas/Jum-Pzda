<?php


namespace App\Drink;


use App\App;

class DrinkModel
{
    const DRINK = 'drink_table';

    /**
     * @param Drink $drink
     */
    public static function insert(Drink $drink)
    {
        App::$db->insertRow(self::DRINK, $drink->_getData());
    }

    /**
     * @param $conditions
     * @return array
     */
    public static function getWhere(array $conditions): array
    {
        $rows = App::$db->getRowsWhere(self::DRINK, $conditions);

        $drinks = [];

        foreach ($rows as $row) {
            $drinks[] = new Drink($row);
        }

        return $drinks;
    }

    /**
     * @param Drink $drink
     */
    public static function update(Drink $drink)
    {
        App::$db->updateRow(self::DRINK, $drink->getId(), $drink->_getData());
    }

    /**
     * @param Drink $drink
     */
    public static function delete(Drink $drink)
    {
        App::$db->deleteRow(self::DRINK, $drink->getId());
    }

    /**
     * @param int $id
     * @return Drink|null
     */
    public static function get(int $id): ?Drink
    {
        if ($row = App::$db->getRowById(self::DRINK, $id)) {
            return new Drink($row);
        } else {
            return null;
        }
    }

    /**
     * @param $id
     */
    public static function deleteById(int $id)
    {
        App::$db->deleteRow(self::DRINK, $id);
    }
}