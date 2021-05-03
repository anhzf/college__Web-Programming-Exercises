<?php

define('PATH_APP_ROOT', str_replace('\\', '/', realpath(__DIR__)) . '/');

require_once PATH_APP_ROOT . 'lib/Auth.php';
require_once PATH_APP_ROOT . 'lib/Db.php';
require_once PATH_APP_ROOT . 'lib/Helper.php';
require_once PATH_APP_ROOT . 'lib/Model/Game.php';
require_once PATH_APP_ROOT . 'lib/Model/Quiz.php';
require_once PATH_APP_ROOT . 'lib/Model/User.php';
// last to load due to limitation of session usage
require_once PATH_APP_ROOT . 'lib/Session.php';
