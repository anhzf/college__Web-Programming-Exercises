<?php
require_once './lib.php';
session_start();

authCheck();

if (isset($_SESSION['numbToGuess'])) {
  if (isset($_POST['submitGuess']) && isset($_POST['guessNumber'])) {
    $guessNumber = intval($_POST['guessNumber']);

    if (setGuessStatus($guessNumber) === 'correct') {
      setGuessNumber();
    }
  }
} else setGuessNumber();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tebak Angka</title>
</head>

<body>
  <h5>Hallo, nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat 1-100. Silakan Anda menebak ya!</h5>
  <?php if (isset($_POST['submitGuess'])) switch ($_SESSION['guessStatus']) {
    case 'too_big': ?>
      <div>Waah tebakan anda salah, angka anda masih terlalu besar 😁</div>
    <?php include_once './formGuess.php';
      break;

    case 'too_small': ?>
      <div>Waah tebakan anda salah, angka anda masih terlalu kecil 😁</div>
    <?php include_once './formGuess.php';
      break;

    case 'correct': ?>
      <div>Selamat <b><?= $_COOKIE['user'] ?></b> anda benar🎉, saya telah memilih bilangan <?= $_POST['guessNumber'] ?></div>
      <a href="./index.php">🎮 Main lagi</a>
  <?php break;

    default:
      include_once './formGuess.php';
      break;
  }
  else include_once './formGuess.php'; ?>

  <a href="./logout.php">Logout</a>

  <!-- for debugging purpose -->
  <!-- <pre style="background-color: #eee;"><?= var_dump($_COOKIE, $_SESSION, $_POST) ?></pre> -->
</body>

</html>
