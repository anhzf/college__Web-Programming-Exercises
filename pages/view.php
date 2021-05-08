<?php require './_init.php';

use lib\Component;
use models\Employee;

$data = null;

try {
  $employee = Employee::get((int) $_GET['id']);
  $data = [
    'nama lengkap' => $employee->nama,
    'email' => $employee->email,
    'telepon' => $employee->telepon,
    'alamat' => $employee->alamat,
    'jenis kelamin' => $employee->jenisKelamin,
    'tempat lahir' => $employee->tempatLahir,
    'tanggal lahir' => $employee->getTanggalLahir(),
  ];
} catch (\Throwable $th) {
  header('Location: ' . CONFIG['APP_URL']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
  <style>
    .page-view .collection-item {
      display: flex;
      flex-direction: row;
      padding: 1.35rem 1rem;
    }

    .page-view .collection-item>dt {
      font-weight: 600;
      width: 20%;
    }
  </style>
</head>

<body class="page-view">
  <main class="container row">
    <ul class="col s12 collection with-header">
      <li class="collection-header">
        <h4><code><?= $employee->id ?></code> | <?= $employee->nama ?></h4>
      </li>

      <?php foreach ($data as $k => $v) { ?>
        <li class="collection-item">
          <dt><?= $k ?></dt>
          <dd><?= $v ?></dd>
        </li>
      <?php } ?>
    </ul>
  </main>

  <!-- sticky related -->
  <div class="fixed-action-btn">
    <a href="<?= CONFIG['APP_URL'] ?>/edit.php?<?= http_build_query(['id' => $employee->id]) ?>" data-tooltip="Edit data karyawan" data-position="left" class="waves-effect waves-light btn-floating btn-large blue tooltipped">
      <i class="large material-icons">edit</i>
    </a>
  </div>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
