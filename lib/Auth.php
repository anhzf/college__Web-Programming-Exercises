<?php

namespace Auth;

class Auth
{
  private static $cookieKeyName = '_auth-userId';
  private static $cookieExpiration = 3600 * 24 * 30;

  private static $user = null;

  private static function getUser(string $userId)
  {
    $conn = \Db\getConnection();

    if ($stmt = $conn->prepare("SELECT * FROM player WHERE id = $userId LIMIT 1")) {
      $stmt->execute();

      $stmt->bind_result($playerId, $playerName, $playerEmail);

      $user = $stmt->fetch() ? [
        'id' => $playerId,
        'username' => $playerName,
        'email' => $playerEmail,
      ] : null;

      $stmt->close();
      return $user;
    }

    return null;
  }

  private static function storeUser(string $username, string $email)
  {
    $conn = \Db\getConnection();
    $stmt = $conn->prepare("INSERT INTO player (username, email) VALUES (?, ?)");

    $stmt->bind_param('ss', $username, $email);

    $insertId = $stmt->execute() ? $stmt->insert_id : null;

    $stmt->close();
    return $insertId;
  }

  public static function user()
  {
    if (self::$user) {
      return self::$user;
    }

    return isset($_COOKIE[self::$cookieKeyName])
      ? (self::$user = self::getUser($_COOKIE[self::$cookieKeyName]))
      : null;
  }

  public static function login(string $username, string $email)
  {
    if ($userId = self::storeUser($username, $email)) {
      return setcookie(self::$cookieKeyName, $userId, time() + self::$cookieExpiration, '/');
    }

    return false;
  }

  public static function logout()
  {
    return setcookie(self::$cookieKeyName, null, -1, '/');
  }
}
