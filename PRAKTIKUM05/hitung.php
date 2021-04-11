<?php

// baca kedua bilangan
$bil1 = $_POST['bil1'];
$bil2 = $_POST['bil2'];

// baca operator
$operator = $_POST['operator'];

// proses perhitungan
switch ($operator) {
  case "+":
    $hasil = $bil1 + $bil2;
    break;
  case "-":
    $hasil = $bil1 - $bil2;
    break;

  case "*":
    $hasil = $bil1 * $bil2;
    break;

  case "/":
    $hasil = $bil1 / $bil2;
    break;

  case "^":
    $hasil = $bil1 ^ $bil2;
    break;

  default:
    $hasil = 'undefined';
    break;
}

// menampilkan hasil perhitungan
echo "<h2>" . $bil1 . " " . $operator . " " . $bil2 . " = " . $hasil . "</h2>";
