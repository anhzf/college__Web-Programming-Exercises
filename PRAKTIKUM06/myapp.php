<?php

function updateVisitorDataTracker(string $username, int $expiration) {
  setcookie("username", $username, time() + $expiration, "/");
  setcookie("visits", $_COOKIE['visits'] ? $_COOKIE['visits'] : 0, time() + $expiration, "/");
  setcookie("lastVisit", date("d-m-Y H:i:s"), time() + $expiration, "/");
}

$defaultCookieExpiration = time() + 3600 * 24 * 30 * 3;

if (isset($_POST['submit'])) {
  updateVisitorDataTracker($_POST['username'], $defaultCookieExpiration);
  header('Location: myapp.php');
}

// jika sudah ada cookie username
if (isset($_COOKIE['username'])) { ?>

  <!-- tampilkan nama user, baca dari cookie -->
  <p>Hallo selamat datang <?= $_COOKIE['username'] ?></p>
  <!-- tampilkan jumlah kunjungan saat ini = jumlah visit sebelumnya + 1 -->
  <p>Ini kunjungan Anda yang ke-<?= (++$_COOKIE['visits']) ?></p>
  <!-- tampilkan datetime kunjungan sebelumnya, baca dari cookie -->
  <p>Kunjungan Anda sebelumnya adalah pada tanggal <?= $_COOKIE['lastVisit'] ?></p>

<?php
  // setelah cookie sebelumnya dibaca, lakukan update cookie yang baru
  updateVisitorDataTracker($_COOKIE['username'], $defaultCookieExpiration);
} else {
  // jika cookie username belum ada, munculkan form
?>
  <h1>Welcome to my site</h1>
  <p>Ini kunjungan Anda pertama kali di situs ini ya?</p>
  <p>Kita kenalan dulu ya, silakan masukkan nama Anda</p>
  <form method="post" action="./myapp.php">
    <label for="username">Nama anda</label>
    <input type="text" name="username" id="username">
    <input type="submit" name="submit" value="Submit">
  </form>
<?php
}
