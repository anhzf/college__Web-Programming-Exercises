<?php require_once './_init.php';

use lib\Component;
use models\Employee;

$employee = new Employee([
  'nama' => 'Anhzf',
  'email' => 'anh.dev7@gmail.com',
  'telepon' => '+62851XXXXXX',
  'alamat' => 'Solo',
  'jenisKelamin' => 'PRIA',
  'tempatLahir' => 'Sukoh',
]);
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
      <table class="striped highlight responsive-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach (Employee::getAll() as $no => $employee) { ?>
            <tr>
              <td><?= $no + 1 ?></td>
              <td><?= $employee->nama ?></td>
              <td style="width: 10%;">
                <a href="mailto:<?= $employee->email ?>"><?= $employee->email ?></a>
              </td>
              <td style="width: 10%;"><?= $employee->telepon ?></td>
              <td style="width: 25%;"><?= $employee->alamat ?></td>
              <td>
                <a href="<?= CONFIG['APP_URL'] ?>/view.php?<?= http_build_query(['id' => $employee->id]) ?>" class="waves-effect waves-light btn-small light-blue">Detail</a>
                <a href="<?= CONFIG['APP_URL'] ?>/edit.php?<?= http_build_query(['id' => $employee->id]) ?>" class="waves-effect waves-light btn-small">Edit</a>
                <button data-target="modal_confirmDelete" data-employee-id="<?= $employee->id ?>" class="waves-effect waves-light btn-small red modal-trigger">Hapus</button>
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
  <form id="modal_confirmDelete" action="<?= CONFIG['APP_URL'] ?>/delete.php" method="post" class="modal">
    <div class="modal-content">
      <h5>Apakah anda yakin untuk menghapus <code id="confirmMessage_employeeId" class="blue-grey lighten-5">dosa :v</code> ?</h5>
    </div>

    <input id="confirmDelete_input" type="hidden" name="employeeId" value="awokakaowk">

    <div class="modal-footer">
      <button type="submit" class="modal-close waves-effect waves-green btn-flat red-text">OK</button>
      <button type="reset" class="modal-close waves-effect waves-green btn">Cancel</button>
    </div>
  </form>

  <small>
    <pre><?= var_dump(null) ?></pre>
  </small>

  <?= Component::render('HTMLBaseFooter') ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const deleteModalConfirm = document.getElementById('modal_confirmDelete');

      const instance = M.Modal.init(deleteModalConfirm, {
        onOpenStart(modalEl, buttonEl) {
          const {
            employeeId
          } = buttonEl.dataset;
          const confirmMessageEl = modalEl.querySelector('#confirmMessage_employeeId');
          const confirmInputEl = modalEl.querySelector('#confirmDelete_input');

          confirmInputEl.value = employeeId;
          confirmMessageEl.textContent = employeeId;
        },
      });
    });
  </script>
</body>

</html>
