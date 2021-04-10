<?php

$filePath = './myFile.txt';
$myFile = fopen($filePath, 'r') or die('Could not open file');

echo fread($myFile, filesize($filePath));

fclose($myFile);
