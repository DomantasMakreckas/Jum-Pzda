<?php

declare(strict_types=1);

use Core\Session;

session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');
define('TEAM_FILE', 'app/data/team.json');
define('USERS', 'app/data/users.json');
define('PIXEL_FILE', 'app/data/pixels.json');

define('FORM_TEMPLATE', ROOT . '/core/templates/form.tpl.php');
define('NAV_TEMPLATE', ROOT . '/app/templates/nav.tpl.php');

// loadinam branduolines funkcijas
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/file.php';
require 'core/functions/auth.php';

// loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';

//require 'app/classes/Pixels/Pixel.php';

require 'vendor/autoload.php';

$app = new App\App();