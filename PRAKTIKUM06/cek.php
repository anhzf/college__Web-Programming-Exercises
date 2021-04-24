<?php

if (!isset($_SESSION['user'])) {
  ?>

    <p>Hayoo... mau coba nge-bypass ya...?</p>
    <p><a href="./form.php">Login</a> dulu sini</p>

  <?php

  exit();
}
