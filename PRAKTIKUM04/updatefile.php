<?php

$filePath = './myFile.txt';
$myFile = fopen($filePath, 'a+') or die('Could not open file');

fwrite($myFile, "DOS = Disk Operating System\n");

fclose($myFile);
