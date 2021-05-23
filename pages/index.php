<?php require_once './_init.php';

use lib\Response;
use models\Mahasiswa;

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
@[,, $id] = explode('/', $urlPath);

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    Response::json([
      'kode' => 200,
      'status' => 'sukses',
      'data' => $id ? Mahasiswa::get($id) : Mahasiswa::getAll(),
    ])->send();
    break;

  case 'POST':
    $postData = json_decode(file_get_contents('php://input'), true);
    $mahasiswa = new Mahasiswa($postData);

    try {
      $mahasiswa->create();

      Response::json([
        'kode' => 200,
        'status' => 'Berhasil menambahkan data mahasiswa',
      ])->send();
    } catch (\Throwable $th) {

      Response::json([
        'kode' => 500,
        'status' => 'Gagal menambahkan data mahasiswa',
        'error' => $th->getMessage(),
      ])->send(500);
    }
    break;

  case 'PUT':
    $postData = json_decode(file_get_contents('php://input'), true);
    $mahasiswa = Mahasiswa::get($id);

    foreach ($postData as $key => $value) {
      $mahasiswa->{$key} = $value;
    }

    try {
      $mahasiswa->save();

      Response::json([
        'kode' => 200,
        'status' => 'Berhasil update data mahasiswa',
      ])->send();
    } catch (\Throwable $th) {

      Response::json([
        'kode' => 500,
        'status' => 'Gagal update data mahasiswa',
        'error' => $th->getMessage(),
      ])->send(500);
    }
    break;

  case 'DELETE':
    try {
      Mahasiswa::delete($id);

      Response::json([
        'kode' => 200,
        'status' => 'Berhasil menghapus data mahasiswa',
      ])->send();
    } catch (\Throwable $th) {

      Response::json([
        'kode' => 500,
        'status' => 'Gagal update data mahasiswa',
        'error' => $th->getMessage(),
      ])->send(500);
    }
    break;

  default:
    (new Response())
      ->header('HTTP/1.0 405 Method tidak terdaftar')
      ->send();
    break;
}
