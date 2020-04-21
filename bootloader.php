<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');
define('TEAM_FILE', 'app/data/team.json');
define('USERS', 'app/data/users.json');

// loadinam branduolines funkcijas
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/file.php';
require 'core/functions/auth.php';

// loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';

require('core/classes/FileDB.php');