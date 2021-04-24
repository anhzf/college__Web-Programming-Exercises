<pre>
<?php

session_start();

$usersDb = [
  ['user1', 'Rosihan Ari Yuana', '123456'],
  ['user2', 'Alwan Nuha', '654321'],
  ['user3', 'John Doe', '7890987'],
];

if (isset($_POST['submitLogin'])) {
  [
    'username' => $username,
    'password' => $password,
  ] = $_POST;

  foreach ($usersDb as [$usernameFromDb, $fullnameFromDb, $passwordFromDb]) {
    if ($usernameFromDb === $username && $passwordFromDb === $password) {
      $_SESSION['user'] = $fullnameFromDb;

      header('Location: page1.php');
    }

    ?>
      <h3>Login Gagal!</h3>

      <p>Silahkan <a href="./form.php">Login kembali</a></p>
    <?php
  }
}
