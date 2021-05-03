<?php

require_once '../core.php';

use Auth\Auth;

if (Auth::user()) {
  Auth::logout();
  header('Location: ' . CONFIG['app_url'] . '/index.php');
}

@[
  'username' => $username,
  'email' => $email,
] = $_POST;

if ($username && $email) {
  Auth::login($username, $email);
}

header('Location: ' . CONFIG['app_url'] . '/index.php');
