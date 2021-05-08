<?php require './_init.php';

use lib\Component;
use models\Employee;

$data = null;
$employee = null;
$isAfterSaveEdit = false;
$formButtonSubmitName = 'submitFormKaryawan';

try {
  $employee = Employee::get((int) $_GET['id']);

  if (isset($_POST[$formButtonSubmitName])) {
    $postData = [
      'tanggalLahir' => new DateTime($_POST['tanggalLahir'] ?? null)
    ] + $_POST;

    foreach ($postData as $key => $value) {
      $employee->{$key} = $value;
    }

    $isAfterSaveEdit = $employee->save();
    // reset post data
    $_POST = [];
  }
} catch (\Throwable $th) {
  header('Location: ' . CONFIG['APP_URL']);
}

$data = [
  'nama' => $employee->nama,
  'email' => $employee->email,
  'telepon' => $employee->telepon,
  'alamat' => $employee->alamat,
  'jenisKelamin' => $employee->jenisKelamin,
  'tempatLahir' => $employee->tempatLahir,
  'tanggalLahir' => $employee->getTanggalLahir(),
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <main class="container row">
    <?php if ($isAfterSaveEdit) { ?>
      <div class="card-panel col s12 green">
        <span class="white-text">Berhasil menyimpan data!</span>
      </div>
    <?php } ?>

    <div class="col s12">
      <h1>Edit data karyawan</h1>
    </div>

    <?= Component::render('FormKaryawan', [
      'method' => 'post',
      'data' => $data,
      'submitLabel' => 'Simpan',
      'buttonSubmitName' => $formButtonSubmitName
    ]) ?>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
