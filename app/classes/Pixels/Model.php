<?php


namespace App\Pixels;


use App\App;

class Model
{
    const TABLE = 'pixel_table';

    public static function insert(Pixel $pixel)
    {
        App::$db->insertRow(self::TABLE, $pixel->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);

        $pixels = [];

        foreach ($rows as $row) {
            $pixels[] = new Pixel($row);
        }

        return $pixels;
    }

    public static function update(Pixel $pixel)
    {
        App::$db->updateRow(self::TABLE, $pixel->getId(), $pixel->_getData());
    }

    public static function delete(Pixel $pixel)
    {
        App::$db->deleteRow(self::TABLE, $pixel->getId());
    }
}

