<?php

// loadinam branduolines funkcijas
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/file.php';

// loadinam projektui specifines funkcijas
require 'app/functions/form/validators.php';

define('DB_FILE', 'app/data/db.json');

define('TEAM_FILE', 'app/data/team.json');

session_start();