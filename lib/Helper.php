<?php

namespace lib;

class Helper
{
  public static function arrayExcludeKeys(array $array, array $keyNames)
  {
    return array_filter(
      $array,
      fn ($k) => !in_array($k, $keyNames),
      ARRAY_FILTER_USE_KEY,
    );
  }

  public static function url(string $path)
  {
    return CONFIG['APP_URL'] . $path;
  }
}
