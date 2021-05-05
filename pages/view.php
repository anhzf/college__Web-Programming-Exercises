<?php require './_init.php';

use lib\Component;

$data = [
  'namaLengkap' => 'Lorem ipsum dolor',
  'email' => 'someone@google.xyz',
  'nomorTelepon' => '+62851XXXXXX',
  'alamat' => 'Solo',
  'jenisKelamin' => 'Pria',
  'tempatLahir' => 'Sama kayak beta',
  'tanggalLahir' => '21',
];
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
        <h4><code>1</code> | Papa Zola</h4>
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
    <a href="<?= CONFIG['APP_URL'] ?>/edit.php" data-tooltip="Edit data karyawan" data-position="left" class="waves-effect waves-light btn-floating btn-large blue tooltipped">
      <i class="large material-icons">edit</i>
    </a>
  </div>

  <?= Component::render('HTMLBaseFooter') ?>
</body>

</html>
