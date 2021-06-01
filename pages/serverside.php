<?php require_once './_init.php';

use lib\Component;
use models\Tma;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= Component::render('HTMLBaseHeader') ?>
</head>

<body>
  <?= Component::render('BaseNavbar') ?>

  <main class="container py-4">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tabel tinggi permukaan air</h5>
            <hr>

            <table id="table-data" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nilai</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?= Component::render('HTMLBaseFooter') ?>
  <script>
    $(document).ready(() => {
      $('#table-data').DataTable({
        scrollY: 400,
        processing: true,
        serverSide: true,
        ajax: 'api/data.php',
      });
    });
  </script>
</body>

</html>
