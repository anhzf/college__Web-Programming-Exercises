<?php

class User
{
  function __construct(string $username, string $name, string $password)
  {
    $this->username = $username;
    $this->password = $password;
    $this->name = $name;
  }
}

function getUser()
{
  return isset($_COOKIE['user']) ? $_COOKIE['user'] : null;
}

function validateLogin(string $username, string $password)
{
  $db = include './db.php';
  @[$user] = array_filter(
    $db['users'],
    fn ($user) => (
      ($user->username === $username)
      && ($user->password === $password))
  );

  return $user ?? false;
}

function login(User $user, int $expiration = 24 * 3600)
{
  $isSet = setcookie('user', $user->name, time() + $expiration, '/');
  header('Refresh:0');
  return $isSet;
}

function logout()
{
  unset($_COOKIE['user']);
  return setcookie('user', '', -1, '/');
}

function authCheck()
{
  if (!getUser()) {
    header('Location: ./login.php');
  }
}

function guestCheck()
{
  if (getUser()) {
    header('Location: ./index.php');
  }
}

function setGuessNumber()
{
  $_SESSION['numbToGuess'] = rand(0, 100);
}

function setGuessStatus(int $guessNumber)
{
  if ($guessNumber === $_SESSION['numbToGuess']) {
    $_SESSION['guessStatus'] = 'correct';
  } else {
    $_SESSION['guessStatus'] = ($guessNumber > $_SESSION['numbToGuess'])
      ? 'too_big' : 'too_small';
  }

  return $_SESSION['guessStatus'];
}
