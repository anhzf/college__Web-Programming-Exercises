<?php
require './lib.php';

$data = parseDataMahasiswa('./datamhs.dat');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>

<body>
  <h1>Data Mahasiswa</h1>

  <span>Jumlah data = <?= count($data) ?></span>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Usia (Tahun)</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data as $i => [$nim, $name, $birthdate, $birthplace]) { ?>

        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $nim ?></td>
          <td><?= $name ?></td>
          <td><?= $birthdate ?></td>
          <td><?= $birthplace ?></td>
          <td><?= countAge(date_create($birthdate)) ?></td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</body>

</html>
