<?php

define('PATH_APP_ROOT', str_replace('\\', '/', realpath(__DIR__)) . '/');

require_once PATH_APP_ROOT . 'lib/Session.php';
require_once PATH_APP_ROOT . 'lib/Auth.php';
require_once PATH_APP_ROOT . 'lib/Db.php';
require_once PATH_APP_ROOT . 'lib/Helper.php';
