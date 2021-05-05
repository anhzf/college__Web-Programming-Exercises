<?php

use lib\Component;
use lib\Helper;

$_defaultData = [
  'namaLengkap' => '',
  'email' => '',
  'nomorTelepon' => '',
  'alamat' => '',
  'jenisKelamin' => '',
  'tempatLahir' => '',
  'tanggalLahir' => '',
];

$data = ($data ?? []) + $_defaultData;
$class = $class ?? '';
$submitLabel = $submitLabel ?? 'submit';

$_props = ['data', 'submitLabel', 'class'];
$_attrs = Helper::arrayExcludeKeys(get_defined_vars(), array_merge($_props, ['_', '_defaultData', '_props']));

$_class = "row {$class}";
?>


<form <?= Component::arrayToAttrs($_attrs + ['class' => $_class]) ?>>
  <div class="row">
    <?= Component::render('Input', [
      'label' => 'Nama Lengkap',
      'name' => 'namaLengkap',
      'value' => $data['namaLengkap'],
      'class' => 'col s6',
      'required' => false,
    ]) ?>
  </div>

  <div class="row">
    <?= Component::render('Input', [
      'label' => 'Email',
      'name' => 'email',
      'value' => $data['email'],
      'type' => 'email',
      'class' => 'col s6',
      'required' => true,
    ]) ?>
  </div>

  <div class="row">
    <?= Component::render('Input', [
      'label' => 'Nomor telepon',
      'name' => 'nomorTelepon',
      'value' => $data['nomorTelepon'],
      'type' => 'tel',
      'class' => 'col s6',
      'required' => true,
    ]) ?>
  </div>

  <div class="row">
    <?= Component::render('Textarea', [
      'label' => 'Alamat sekarang',
      'name' => 'alamat',
      'value' => $data['alamat'],
      'class' => 'col s6',
      'required' => true,
    ]) ?>
  </div>

  <div class="row">
    <span class="col s12">Jenis kelamin</span>

    <?= Component::render('Radio', [
      'name' => 'jenisKelamin',
      'label' => 'Pria',
      'value' => 'pria',
      'class' => 'col',
      'required' => true,
      'checked' => $data['jenisKelamin'] === 'pria',
    ]) ?>
    <?= Component::render('Radio', [
      'name' => 'jenisKelamin',
      'label' => 'Wanita',
      'value' => 'wanita',
      'class' => 'col',
      'required' => true,
      'checked' => $data['jenisKelamin'] === 'wanita',
    ]) ?>
  </div>

  <div class="row">
    <?= Component::render('Input', [
      'label' => 'Tempat lahir',
      'name' => 'tempatLahir',
      'value' => $data['tempatLahir'],
      'type' => 'text',
      'class' => 'col s3',
      'required' => true,
    ]) ?>
    <?= Component::render('Input', [
      'label' => 'Tanggal lahir',
      'name' => 'tanggalLahir',
      'value' => $data['tanggalLahir'],
      'type' => 'date',
      'class' => 'col s3',
      'required' => true,
    ]) ?>
  </div>

  <div class="row">
    <div class="col s6">
      <button type="submit" class="waves-effect waves-light btn"><?= $submitLabel ?></button>
    </div>
  </div>
</form>
