<?php

require_once '../core.php';

use Auth\Auth;

if (Auth::user()) {
  header('Location: /index.php');
}

@[
  'username' => $username,
  'email' => $email,
] = $_POST;

if ($username && $email) {
  Auth::login($username, $email);
}

header('Location: /index.php');
