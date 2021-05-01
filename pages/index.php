<?php
require_once '../core.php';

use Auth\Auth;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= \Helper\getComponent('HTMLBaseHeader') ?>
</head>

<body class="container is-flex is-flex-direction-column">
  <?php if (Auth::user()) { ?>

    <section class="section is-medium has-background-info-light is-flex is-flex-direction-column">
      <h1 class="title">
        Hallo <?= Auth::user()['username'] ?>, selamat datang kembali di permainan ini!!!
      </h1>

      <small class="subtitle">
        <span>Bukan anda? </span>
        <a href="./login.php">klik disini</a>
      </small>

      <a href="./play.php" class="button is-primary">Mulai game</a>
    </section>

  <?php } else { ?>

    <section class="section is-medium has-background-info-light columns">
      <div class="column"></div>
      <div class="column is-4">
        <?= \Helper\getComponent('FormLogin', ['formAction' => './login.php']) ?>
      </div>
      <div class="column"></div>
    </section>

  <?php } ?>

  <pre><?= var_dump(Auth::user()) ?></pre>
</body>

</html>
