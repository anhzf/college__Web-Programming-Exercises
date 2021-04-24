<?php

require_once './lib.php';

if (getUser()) {
  logout();
}

header('Location: ./index.php');
