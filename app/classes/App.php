<?php
namespace App;

use Core\Databases\FileDB;

class App
{
    public static $db;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();
    }

    public function __destruct()
    {
        self::$db->save();
    }
}