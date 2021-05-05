<?php require './_init.php';

use lib\Component;

$data = [
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <main class="container row">
    <div class="col s12">
      <h1>Edit data karyawan</h1>
    </div>

    <?= Component::render('FormKaryawan', [
      'method' => 'post',
      'data' => $data,
      'submitLabel' => 'Simpan',
    ]) ?>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
