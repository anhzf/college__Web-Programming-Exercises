<pre>
<?php
require_once './lib.php';

@[
  'username' => $username,
  'password' => $password,
] = $_POST;

if (isset($_POST['submitLogin']) && $username && $password) {
  if ($user = validateLogin($username, $password)) {
    login($user);
  } else { ?>

    <h3>User atau password salah</h3>

  <?php }
}

guestCheck();
?>
</pre>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <label for="inputUsername">Username</label>
  <input type="text" name="username" id="inputUsername" placeholder="Username" required>

  <label for="inputPassword">Password</label>
  <input type="password" name="password" id="inputPassword" placeholder="Password" required>

  <button type="submit" name="submitLogin">Login</button>
</form>
