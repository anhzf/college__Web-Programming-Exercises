<?php

namespace models;

use lib\Db;

class Employee extends BaseModel
{
  public static $defaultAttrs = [
    'nama' => '',
    'email' => '',
    'telepon' => '',
    'alamat' => '',
    'jenisKelamin' => '',
    'tempatLahir' => '',
  ];

  protected int $id;
  public string $nama;
  public string $email;
  public string $telepon;
  public string $alamat;
  public string $jenisKelamin;
  public string $tempatLahir;
  public \DateTime $tanggalLahir;

  public function __construct(array $attrs = [])
  {
    parent::__construct($attrs);
    // ensuring the required attributes
    $this->nama = $attrs['nama'];
    $this->email = $attrs['email'];
    $this->telepon = $attrs['telepon'];
    $this->jenisKelamin = $attrs['jenisKelamin'];
    $this->tempatLahir = $attrs['tempatLahir'];
    $this->tanggalLahir = $attrs['tanggalLahir'] ?? new \DateTime();
  }

  public function getTanggalLahir()
  {
    return $this->tanggalLahir->format('Y-m-d');
  }

  public function save()
  {
    $conn = Db::getConn();
    $success = false;
    $query = "UPDATE `karyawan`
      SET nama = ?, email = ?, telepon = ?, alamat = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?
      WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
      // supported format for sql date
      $tanggalLahir = $this->tanggalLahir->format('Y-m-d');

      $stmt->bind_param(
        'sssssssi',
        $this->nama,
        $this->email,
        $this->telepon,
        $this->alamat,
        $this->jenisKelamin,
        $this->tempatLahir,
        $tanggalLahir,
        $this->id,
      );
      $success = $stmt->execute();

      $stmt->close();
    }

    return $success;
  }

  public function create()
  {
    $conn = Db::getConn();
    $query = "INSERT INTO `karyawan`
      (nama, email, telepon, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir)
      VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
      // supported format for sql date
      $tanggalLahir = $this->tanggalLahir->format('Y-m-d');

      $stmt->bind_param(
        'sssssss',
        $this->nama,
        $this->email,
        $this->telepon,
        $this->alamat,
        $this->jenisKelamin,
        $this->tempatLahir,
        $tanggalLahir,
      );
      $stmt->execute();

      $stmt->close();
    }

    return $conn->insert_id;
  }

  public static function get(int $id)
  {
    $conn = Db::getConn();
    $data = null;
    $query = "SELECT id, nama, email, telepon, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir
      FROM `karyawan`
      WHERE id = ?
      LIMIT 1";

    if ($stmt = $conn->prepare($query)) {
      try {

        $stmt->bind_param('i', $id);
        $attrs = [];
        $stmt->execute();

        $stmt->bind_result(
          $attrs['id'],
          $attrs['nama'],
          $attrs['email'],
          $attrs['telepon'],
          $attrs['alamat'],
          $attrs['jenisKelamin'],
          $attrs['tempatLahir'],
          $attrs['tanggalLahir'],
        );

        while ($stmt->fetch()) {
          $attrs['tanggalLahir'] = new \DateTime($attrs['tanggalLahir']);
          $data = new Employee($attrs);
        }

        $stmt->close();
      } catch (\Throwable $th) {
        echo '<pre>';
        var_dump($id, $attrs, $th);
        echo '</pre>';
      }
    }

    return $data;
  }

  public static function getAll()
  {
    $conn = Db::getConn();
    $data = [];
    $query = "SELECT id, nama, email, telepon, alamat, jenis_kelamin, tempat_lahir, tanggal_lahir FROM `karyawan`";

    if ($stmt = $conn->prepare($query)) {
      $attrs = [];
      $stmt->execute();

      $stmt->bind_result(
        $attrs['id'],
        $attrs['nama'],
        $attrs['email'],
        $attrs['telepon'],
        $attrs['alamat'],
        $attrs['jenisKelamin'],
        $attrs['tempatLahir'],
        $attrs['tanggalLahir'],
      );

      while ($stmt->fetch()) {
        $attrs['tanggalLahir'] = new \DateTime($attrs['tanggalLahir']);
        array_push($data, new Employee($attrs));
      }

      $stmt->close();
    }

    return $data;
  }

  public static function delete($id)
  {
    $conn = Db::getConn();
    $success = false;
    $query = "DELETE FROM `karyawan`
      WHERE id = ?
      LIMIT 1";

    if ($stmt = $conn->prepare($query)) {
      $stmt->bind_param('i', $id);

      $success = $stmt->execute();

      $stmt->close();
    }

    return $success;
  }
}
