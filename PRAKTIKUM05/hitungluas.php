<?php

[
  'n' => $name,
  'd' => $diameter,
  't' => $tinggi,
] = $_GET;

$luasTabung = (M_PI * $diameter / 2) * $tinggi;

?>

<div>Luas tabung <?= $name ?> dengan diameter <?= $diameter ?> dan tinggi <?= $tinggi ?> adalah <?= $luasTabung ?> satuan luas</div>

<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
<a href="<?= $_SERVER['HTTP_REFERER'] ?>">< back</a>
<?php } ?>
