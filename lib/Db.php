<?php

namespace lib;

class Db
{
  private static $conn = null;

  private static function createConn()
  {
    [
      'HOST' => $dbHost,
      'PORT' => $dbPort,
      'DATABASE' => $dbName,
      'USER' => $dbUser,
      'PASS' => $dbPass,
    ] = CONFIG['DB'];

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
