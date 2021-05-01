<?php

namespace Db;

function getConnection()
{
  [
    'host' => $dbHost,
    'port' => $dbPort,
    'database' => $dbName,
    'user' => $dbUser,
    'pass' => $dbPass,
  ] = (require '../config.php')['db'];

  return new \mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
}
