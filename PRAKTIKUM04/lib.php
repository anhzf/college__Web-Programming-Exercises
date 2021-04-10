<?php

function parseRow(string $rowData)
{
  return explode('|', $rowData);
}

function parseDataMahasiswa(string $filename)
{
  $rawData = file_get_contents($filename);
  $dataInRows = explode("\n", $rawData);
  $data = array_map('parseRow', $dataInRows);

  return array_filter(
    $data,
    fn ($el) => count($el) > 3
  );
}

function countAge(DateTime $date)
{
  $now = new DateTime('now');

  return date_diff($now, $date)->y;
}
