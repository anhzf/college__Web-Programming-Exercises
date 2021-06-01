<?php require_once './_init.php';

use lib\Component;
use lib\Helper;
use lib\Storage;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader', ['title' => 'Baca file']) ?>
</head>

<body>
  <?= Component::render('BaseNavbar') ?>

  <main class="container py-4">
    <div class="row">
      <div class="col-3">
        <div class="card bg-light text-dark">
          <h5 class="card-header">
            Daftar file
          </h5>

          <ul class="list-group list-group-flush">
            <?php foreach (Storage::list() as $fileName) {
              $queryString = http_build_query(['file' => $fileName]);
            ?>

              <li class="list-group-item">
                <a href="<?= Helper::url("/baca.php?{$queryString}") ?>"><?= $fileName ?></a>
                <!-- <button type="button" class="btn btn-secondary btn-sm">Small button</button> -->
                <a href="<?= Helper::url("/?{$queryString}") ?>" class="badge rounded-pill bg-secondary">edit</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Isi file</h5>
            <hr>
            <p class="card-text">
              <?= isset($_GET['file'])
                ? Storage::get($_GET['file'])
                : 'Tidak ada file dipilih, silahkan pilih file pada daftar disamping...' ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <pre><?= var_dump(null) ?></pre>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
