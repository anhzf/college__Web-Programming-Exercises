<?php

namespace lib;

class Db
{
  private static $conn = null;

  private static function createConn()
  {
    [
      'host' => $dbHost,
      'port' => $dbPort,
      'database' => $dbName,
      'user' => $dbUser,
      'pass' => $dbPass,
    ] = CONFIG['db'];

    $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
    // automatically close the connection when program is stopped
    register_shutdown_function(fn () => $conn->close());

    return $conn;
  }

  public static function getConn()
  {
    return self::$conn ?? (self::$conn = self::createConn());
  }
}
