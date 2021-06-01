<?php require_once '../_init.php';

use lib\SSP;

$dbConfig = [
  'host' => CONFIG['DB']['HOST'],
  'user' => CONFIG['DB']['USER'],
  'pass' => CONFIG['DB']['PASS'],
  'db' => CONFIG['DB']['DATABASE'],
];

$tableName = 'tma';

$primaryKey = 'id';

$columns = [
  ['db' => 'id', 'dt' => 0],
  ['db' => 'nilai', 'dt' => 1],
  ['db' => 'waktu', 'dt' => 2],
  [
    // 'db' => 'id',
    'dt' => 3,
    'formatter' => function () {
      return '<button class="btn btn-info">Edit</button><button class="btn btn-danger">Hapus</button>';
    }
  ]
];

echo json_encode(
  SSP::simple(
    $_GET,
    $dbConfig,
    $tableName,
    $primaryKey,
    $columns
  )
);
