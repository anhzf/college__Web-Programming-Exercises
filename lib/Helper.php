<?php

namespace Helper;

function getComponent(string $componentName, array $data = [])
{
  extract($data, EXTR_SKIP);
  unset($data);
  require PATH_APP_ROOT . "components/$componentName.php";
}
