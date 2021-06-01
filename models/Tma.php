<?php

namespace models;

use lib\Db;

class Tma extends BaseModel
{
  protected int $id;
  public int $id_pos;
  public int $nilai;
  public string $waktu;

  public static function getAll()
  {
    $conn = Db::getConn();
    $data = [];
    $query = "SELECT id, id_pos, nilai, waktu FROM `tma`";

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
        array_push($data, new Tma($attrs));
      }

      $stmt->close();
    }

    return $data;
  }
}
