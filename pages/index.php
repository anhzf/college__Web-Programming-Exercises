<?php require_once './_init.php';

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
      <h1>Data Karyawan PT Google.xyz</h1>
    </div>

    <div class="col s12 row">
      <table class="striped centered highlight responsive-table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach (array_fill(0, 10, null) as $k => $v) { ?>
            <tr>
              <td>Alvin</td>
              <td>
                <a href="mailto:someone@google.xyz">someone@google.xyz</a>
              </td>
              <td>+62851XXXXXX</td>
              <td>Solo</td>
              <td>
                <a href="<?= CONFIG['APP_URL'] ?>/view.php" class="waves-effect waves-light btn-small light-blue">Detail</a>
                <a href="<?= CONFIG['APP_URL'] ?>/edit.php" class="waves-effect waves-light btn-small">Edit</a>
                <button data-target="modal_confirmDelete" class="waves-effect waves-light btn-small red modal-trigger">Hapus</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>

  <!-- sticky related -->
  <div class="fixed-action-btn">
    <a href="<?= CONFIG['APP_URL'] ?>/add.php" data-tooltip="Tambah data karyawan" data-position="left" class="waves-effect waves-light btn-floating btn-large blue tooltipped">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <!-- modal related -->
  <form id="modal_confirmDelete" class="modal">
    <div class="modal-content">
      <h5>Apakah anda yakin untuk menghapus...</h5>
    </div>

    <div class="modal-footer">
      <button class="modal-close waves-effect waves-green btn-flat">Cancel</button>
      <button class="modal-close waves-effect waves-green btn">OK</button>
    </div>
  </form>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
