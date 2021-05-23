<?php

define('APP_ROOT', str_replace('\\', '/', realpath(__DIR__)));
define('CONFIG', require APP_ROOT . '/config.php');

if (CONFIG['ENV'] === 'production') {
  error_reporting(E_ERROR);
}

require_once APP_ROOT . '/lib/Helper.php';
require_once APP_ROOT . '/lib/Response.php';
require_once APP_ROOT . '/lib/Db.php';
require_once APP_ROOT . '/models/BaseModel.php';
require_once APP_ROOT . '/models/Mahasiswa.php';
