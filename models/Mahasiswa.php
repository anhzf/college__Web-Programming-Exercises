<?php

namespace models;

use lib\Db;

class Mahasiswa extends BaseModel
{
  public static $defaultAttrs = [
    'angkatan' => 2019,
    'semester' => 1,
    'ipk' => 0.00,
  ];

  protected string $nim;
  public string $nama;
  public int $angkatan;
  public int $semester;
  public int $ipk;

  public function __construct(array $attrs = [])
  {
    parent::__construct($attrs);
    // ensuring the required attributes
    $this->nim = $attrs['nim'];
    $this->nama = $attrs['nama'];
  }

  public function save()
  {
    $conn = Db::getConn();
    $success = false;
    $query = "UPDATE `mahasiswa`
      SET nama = ?, angkatan = ?, semester = ?, ipk = ?
      WHERE nim = ?";

    if ($stmt = $conn->prepare($query)) {
      $stmt->bind_param(
        'siiis',
        $this->nama,
        $this->angkatan,
        $this->semester,
        $this->ipk,
        $this->nim,
      );

      if (!($success = $stmt->execute())) {
        throw new \Exception($stmt->error);
      }

      $stmt->close();
    }

    throw new \Exception($conn->error);
    return $success;
  }

  public function create()
  {
    /* @var \mysqli $conn */
    $conn = Db::getConn();
    $query = "INSERT INTO `mahasiswa`
      (nim, nama, angkatan, semester, ipk)
      VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
      $stmt->bind_param(
        'ssiii',
        $this->nim,
        $this->nama,
        $this->angkatan,
        $this->semester,
        $this->ipk,
      );

      if (!$stmt->execute()) {
        throw new \Exception($stmt->error);
      }

      $stmt->close();

      return true;
    }

    throw new \Exception($conn->error);
    return false;
  }

  public static function get(string $nim)
  {
    $conn = Db::getConn();
    $data = null;
    $query = "SELECT nim, nama, angkatan, semester, ipk
      FROM `mahasiswa`
      WHERE nim = ?
      LIMIT 1";

    if ($stmt = $conn->prepare($query)) {
      try {

        $stmt->bind_param('s', $nim);
        $attrs = [];
        $stmt->execute();

        $stmt->bind_result(
          $attrs['nim'],
          $attrs['nama'],
          $attrs['angkatan'],
          $attrs['semester'],
          $attrs['ipk'],
        );

        while ($stmt->fetch()) {
          $data = new Mahasiswa($attrs);
        }

        $stmt->close();
      } catch (\Throwable $th) {
        echo '<pre>';
        var_dump($nim, $attrs, $th);
        echo '</pre>';
      }
    }

    return $data;
  }

  public static function getAll()
  {
    $conn = Db::getConn();
    $data = [];
    $query = "SELECT nim, nama, angkatan, semester, ipk FROM `mahasiswa`";

    if ($stmt = $conn->prepare($query)) {
      $attrs = [];
      $stmt->execute();

      $stmt->bind_result(
        $attrs['nim'],
        $attrs['nama'],
        $attrs['angkatan'],
        $attrs['semester'],
        $attrs['ipk'],
      );

      while ($stmt->fetch()) {
        array_push($data, new Mahasiswa($attrs));
      }

      $stmt->close();
    }

    return $data;
  }

  public static function delete(string $nim)
  {
    $conn = Db::getConn();
    $success = false;
    $query = "DELETE FROM `mahasiswa`
      WHERE nim = ?
      LIMIT 1";

    if ($stmt = $conn->prepare($query)) {
      $stmt->bind_param('s', $nim);

      $success = $stmt->execute();

      $stmt->close();
    }

    return $success;
  }
}
