<pre>
<?php

$filePath = './datamhs.dat';
$file = fopen($filePath, 'a') or die('Could not open file');

[
  'nim' => $nim,
  'nama' => $nama,
  'tanggalLahir' => $tanggalLahir,
  'tempatLahir' => $tempatLahir,
] = $_POST;

fwrite($file, "{$nim}|{$nama}|{$tanggalLahir}|{$tempatLahir}\n");

fclose($file);

?>

<span>saved!</span>

<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
<a href="<?= $_SERVER['HTTP_REFERER'] ?>">< back</a>
<?php } ?>
