<?php

require '../bootloader.php';

if ($created = App\App::$db->createTable('users')) {
//    $db->save();
}

if ($create_pixel_table = \App\App::$db->createTable('pixel_table'));