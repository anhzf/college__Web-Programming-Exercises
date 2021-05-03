<?php

namespace Db;

$connection;

function createConnection()
{
  ['db' => [
    'host' => $dbHost,
    'port' => $dbPort,
    'database' => $dbName,
    'user' => $dbUser,
    'pass' => $dbPass,
  ]] = CONFIG;

  return new \mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
}

function getConnection()
{
  return $connection ?? ($connection = createConnection());
}

register_shutdown_function(function () {
  if (isset($connection) && $connection instanceof \mysqli) {
    $connection->close();
  }
});
