<?php
require_once '../core.php';

use Auth\Auth;

if (!Auth::user()) {
  header('Location: /index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= \Helper\getComponent('HTMLBaseHeader') ?>
</head>

<body class="container is-flex is-flex-direction-column">
  <section class="section has-background-info-light">
    <h3 class="title">Hello <?= Auth::user()['username'] ?>, tetap semangat ya... you can do the best!!</h3>
    <span class="subtitle">Lives: XX | Score: XX</span>
  </section>

  <form action="" method="post" class="section">
    <h3 class="title">Berapakah 5 + 7 = ...</h3>

    <div class="subtitle field is-grouped">
      <div class="control is-expanded">
        <input type="number" name="answer" placeholder="Jawab..." id="formPlay_answer" class="input">
      </div>

      <div class="control">
        <button type="submit" class="button is-link">Submit</button>
      </div>
    </div>
  </form>

  <pre><?= var_dump(Auth::user()) ?></pre>
</body>

</html>
