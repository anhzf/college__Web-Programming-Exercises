<?php

namespace models;

use lib\Db;

class Ch extends BaseModel
{
  protected int $id;
  public int $id_pos;
  public float $nilai;
  public string $waktu;

  public static function getAll()
  {
    $conn = Db::getConn();
    $data = [];
    $query = "SELECT id, id_pos, nilai, waktu FROM `ch`";

    if ($stmt = $conn->prepare($query)) {
      $attrs = [];
      $stmt->execute();

      $stmt->bind_result(
        $attrs['id'],
        $attrs['id_pos'],
        $attrs['nilai'],
        $attrs['waktu'],
      );

      while ($stmt->fetch()) {
        array_push($data, new Ch($attrs));
      }

      $stmt->close();
    }

    return $data;
  }
}
