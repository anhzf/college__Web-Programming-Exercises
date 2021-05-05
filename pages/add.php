<?php require './_init.php';

use lib\Component;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <main class="container row">
    <div class="col s12">
      <h1>Tambah data karyawan</h1>
    </div>

    <?= Component::render('FormKaryawan', [
      'method' => 'post',
      'submitLabel' => 'Tambah',
    ]) ?>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
