<?php

require '../bootloader.php';

if ($created = App\App::$db->createTable('users')) ;

if ($create_pixel_table = \App\App::$db->createTable('pixel_table')) ;