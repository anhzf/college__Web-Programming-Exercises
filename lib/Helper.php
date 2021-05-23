<?php

namespace lib;

class Helper
{
  public static function arrayEntries(array $array)
  {
    $keys = array_keys($array);
    $values = array_values($array);

    return array_map(null, $keys, $values);
  }
}
