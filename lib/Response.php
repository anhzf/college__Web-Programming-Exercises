<?php

namespace lib;

class Response
{
  public int $httpCode = 200;
  private array $headers = [];
  public string $body = '';

  public function send(int $statusCode = 0)
  {
    $this->sendHeaders();
    http_response_code($statusCode === '0'
      ? $this->httpCode : $statusCode);

    echo $this->body;
    exit();
  }

  public function header(string $name, $value = null)
  {
    $this->headers[$name] = $value;

    return $this;
  }

  private function sendHeaders()
  {
    $arrOfHeaders = array_map(
      fn ($entry) => Response::headerToString($entry[0], $entry[1]),
      Helper::arrayEntries($this->headers),
    );

    Response::resetHeaders();
    return array_walk($arrOfHeaders, 'header');
  }

  public static function json(array $data)
  {
    $res = new Response();
    $res->header('Content-Type', 'application/json');
    $res->body = json_encode($data);

    return $res;
  }

  private static function headerToString(string $key, $value)
  {
    if ($value === null) {

      return $key;
    } else if (is_array($value)) {

      $val = implode('; ', $value);
      return "{$key}: {$val}";
    }

    return "{$key}: {$value}";
  }

  private static function resetHeaders()
  {
    $keys = array_keys(headers_list());

    return array_walk($keys, 'header_remove');
  }
}
