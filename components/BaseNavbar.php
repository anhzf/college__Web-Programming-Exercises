<?php

use lib\Helper;
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= Helper::url('/') ?>">Highcharts</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= Helper::url('/index.php') ?>">Tinggi Permukaan Air</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Helper::url('/ch.php') ?>">Curah Hujan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Helper::url('/kekeruhan.php') ?>">Kekeruhan Air</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Helper::url('/challenge.php') ?>">Challenge</a>
        </li>
      </ul>

      <span class="navbar-text">K3519010</span>
    </div>
  </div>
</nav>
