<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator 1</title>
</head>

<body>
  <h1>Kalkulator Sederhana</h1>

  <form method="post" action="hitung.php">
    Bilangan pertama <input type="text" name="bil1">
    <select name="operator">
      <option>Pilih operator</option>
      <option>+</option>
      <option>-</option>
      <option>x</option>
      <option>/</option>
      <option>^</option>
    </select>
    Bilangan ke dua <input type="text" name="bil2">
    <input type="submit" name="submit" value="Hitung">
  </form>

</body>

</html>
