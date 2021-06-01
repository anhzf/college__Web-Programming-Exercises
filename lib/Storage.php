<?php

namespace lib;

class Storage
{
  public static function write(string $filename, $content)
  {
    $file = fopen(Storage::resolvePath($filename), 'w');
    $success = fwrite($file, $content);
    fclose($file);

    return $success;
  }

  public static function get(string $filename)
  {
    return file_get_contents(Storage::resolvePath($filename));
  }

  public static function list(string $path = '')
  {
    return array_diff(scandir(Storage::resolvePath($path)), ['.', '..']);
  }

  public static function resolvePath(string $path)
  {
    return str_replace('\\', '/', CONFIG['STORAGE']['PATH']) . '/' . $path;
  }
}
