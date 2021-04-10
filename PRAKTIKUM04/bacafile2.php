<?php

$filePath = './myFile.txt';
$myFile = fopen($filePath, 'r') or die('Could not open file');

while (!feof($myFile)) {
  echo fgets($myFile);
}


fclose($myFile);
