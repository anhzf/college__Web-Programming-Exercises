<?php

namespace Auth;

use Model\User;

class Auth
{
  private static $cookieKeyName = '_auth-userId';
  private static $cookieExpiration = 3600 * 24 * 30;

  private static $user = null;

  public static function user()
  {
    if (self::$user) {
      return self::$user;
    }

    return isset($_COOKIE[self::$cookieKeyName])
      ? (self::$user = User::getById($_COOKIE[self::$cookieKeyName]))
      : null;
  }

  public static function login(string $username, string $email)
  {
    $user = new User(compact('username', 'email'));

    if ($userId = $user->save()) {
      return setcookie(self::$cookieKeyName, $userId, time() + self::$cookieExpiration, '/');
    }

    return false;
  }

  public static function logout()
  {
    return setcookie(self::$cookieKeyName, null, -1, '/');
  }
}
