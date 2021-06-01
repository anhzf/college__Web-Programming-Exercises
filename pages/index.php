<?php require_once './_init.php';

use lib\Component;
use lib\Helper;
use lib\Storage;

if (isset($_POST['submit'])) {
  $fileName = trim($_POST['fileName']) . '.txt';
  $fileContent = trim($_POST['fileContent']);
  $queryString = http_build_query([
    'success' => Storage::write($fileName, $fileContent) ? 'true' : 'false',
    'file' => $fileName,
  ]);

  header('Location: ' . Helper::url("?{$queryString}"));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <?= Component::render('BaseNavbar') ?>

  <main class="container py-4">
    <?php if (isset($_GET['success']) && $_GET['success'] === 'true') { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>File berhasil disimpan!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['success'] === 'false') { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span>Oops terdapat masalah dalam menyimpan file!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>

    <div class="row">
      <h1>Simpan File</h1>
    </div>

    <div class="row">
      <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <?= Component::render('Input', [
          'label' => 'Nama file',
          'name' => 'fileName',
          'type' => 'text',
          'value' => explode('.txt', $_GET['file'])[0],
          'placeholder' => '\'example\' akan menjadi \'example.txt\'',
          'hint' => '\'example\' akan menjadi \'example.txt\'',
          'class' => 'mb-3',
        ]) ?>

        <?= Component::render('Textarea', [
          'label' => 'Isi file',
          'name' => 'fileContent',
          'value' => isset($_GET['file']) ? Storage::get($_GET['file']) : '',
          'placeholder' => 'Lorem ipsum dolor sit amet...',
          'class' => 'mb-3',
          'style' => 'height: 10rem;'
        ]) ?>
        <button type="submit" class="btn btn-primary" name="submit">Buat/Simpan file</button>
      </form>
    </div>
  </main>

  <pre><?= var_dump(null) ?></pre>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
