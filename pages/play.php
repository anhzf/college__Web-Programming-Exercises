<?php
require_once '../core.php';

use Auth\Auth;
use Model\Game;

if (!Auth::user()) {
  header('Location: ' . CONFIG['app_url'] . '/index.php');
}

$game = Game::loadFromSessionOrNew();

if ($game->getLives() <= 0) {
  header('Location: ' . CONFIG['app_url'] . '/gameover.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= \Helper\getComponent('HTMLBaseHeader') ?>
</head>

<body class="container is-flex is-flex-direction-column">
  <?php if (isset($_POST['submitAnswer'], $_POST['answer'])) { ?>

    <?php if ($game->getCurrentQuiz()->checkAnswer(intval($_POST['answer']))) {
      $game->onRightAnswer();
    ?>

      <section class="section has-background-success-light">
        <h3 class="title">Hello <?= Auth::user()->username ?>, Selamat jawaban Anda benar…</h3>
        <span class="subtitle">Lives: <?= $game->getLives() ?> | Score: <?= $game->getScore() ?></span>
      </section>

    <?php } else {
      $game->onWrongAnswer();
    ?>

      <section class="section has-background-danger-light">
        <h3 class="title">Hello <?= Auth::user()->username ?>, Sayang jawaban Anda salah… tetap semangat ya !!!</h3>
        <span class="subtitle">Lives: <?= $game->getLives() ?> | Score: <?= $game->getScore() ?></span>
      </section>

    <?php } ?>

    <section class="section">
      <a href="<?= CONFIG['app_url'] ?>/play.php" class="button is-primary" autofocus>Soal selanjutnya</a>
    </section>

  <?php
    unset($_POST['submitAnswer'], $_POST['answer']);
  } else { ?>

    <section class="section has-background-info-light">
      <h3 class="title">Hello <?= Auth::user()->username ?>, tetap semangat ya... you can do the best!!</h3>
      <span class="subtitle">Lives: <?= $game->getLives() ?> | Score: <?= $game->getScore() ?></span>
    </section>

    <form action="<?= CONFIG['app_url'] ?>/play.php" method="post" class="section">
      <h3 class="title">Berapakah <?= $game->getCurrentQuiz() ?> ...</h3>

      <div class="subtitle field is-grouped">
        <div class="control is-expanded">
          <input type="number" name="answer" placeholder="Jawab..." id="formPlay_answer" class="input" required autofocus>
        </div>

        <div class="control">
          <button type="submit" name="submitAnswer" class="button is-link">Submit</button>
        </div>
      </div>
    </form>

  <?php } ?>
</body>

</html>
