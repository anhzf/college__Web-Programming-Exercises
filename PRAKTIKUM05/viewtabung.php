<?php
require './lib.php';

$data = parseDataTabung('./datatabung.dat');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Tabung</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>Diameter</th>
        <th>Tinggi</th>
        <th>Luas</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data as [$name, $diameter, $tinggi]) {
        $query = http_build_query([
          'n' => $name,
          'd' => $diameter,
          't' => $tinggi,
        ]);
      ?>

        <tr>
          <td><?= $name ?></td>
          <td><?= $diameter ?></td>
          <td><?= $tinggi ?></td>
          <td>
            <a href="./hitungluas.php?<?= $query ?>">view</a>
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</body>

</html>
