<?php require './_init.php';

use lib\Component;
use models\Employee;

$employee = null;

try {
  $postData = [
    'tanggalLahir' => new DateTime($_POST['tanggalLahir'] ?? null)
  ] + $_POST;

  $employee = new Employee($postData);

  if ($employee->create()) {
    header('Location: ' . CONFIG['APP_URL']);
  }
} catch (\Throwable $th) {
}
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
      'action' => $_SERVER['PHP_SELF'],
      'method' => 'post',
      'submitLabel' => 'Tambah',
      'data' => $_POST,
    ]) ?>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
