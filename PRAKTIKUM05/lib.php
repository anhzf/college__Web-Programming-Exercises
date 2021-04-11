<?php

function parseRowData(string $delimiter, string $filename)
{
  $rawData = file_get_contents($filename) or die("Could not open file '$filename'");
  $dataInRows = explode("\n", $rawData);
  $data = array_map(
    fn ($row) => explode($delimiter, $row),
    $dataInRows
  );

  return $data;
}

function parseDataMahasiswa(string $filename)
{
  return array_filter(
    parseRowData('|', $filename),
    fn ($el) => count($el) > 3
  );
}

function countAge(DateTime $date)
{
  $now = new DateTime('now');

  return date_diff($now, $date)->y;
}

function parseDataTabung(string $filename)
{
  return array_filter(
    parseRowData(',', $filename),
    fn ($el) => count($el) > 2
  );
}
