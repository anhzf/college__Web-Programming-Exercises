<?php
require_once '../core.php';

use Auth\Auth;
use Model\Game;

if (!Auth::user()) {
  header('Location: ' . CONFIG['app_url'] . '/index.php');
}

$game = Game::loadFromSessionOrNew();

$game::resetInstance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= \Helper\getComponent('HTMLBaseHeader') ?>
</head>

<body class="container is-flex is-flex-direction-column">
  <section class="section has-background-info-light">
    <h3 class="title">Hello <?= Auth::user()->username ?>..., Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik 😁</h3>
    <span class="subtitle">Score anda: <?= $game->getScore() ?></span>
  </section>

  <section class="section">
    <a href="<?= CONFIG['app_url'] ?>/play.php" class="button is-primary" autofocus>Main Lagi</a>
  </section>

  <section class="section columns">
    <div class="column"></div>
    <div class="column is-8">
      <?= \Helper\getComponent('HallOfFameTable', ['games' => Game::getTop10()]) ?>
    </div>
    <div class="column"></div>
  </section>
</body>

</html>
