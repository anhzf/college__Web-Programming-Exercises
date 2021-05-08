<?php

namespace models;

class BaseModel
{
  public function __construct(array $attrs)
  {
    foreach ($this->mergeAttrsWithDefault($attrs) as $key => $value) {
      $this->{$key} = $value;
    }
  }

  protected function mergeAttrsWithDefault(array $attrs)
  {
    $default = method_exists($this, 'getDefaultAttrs')
      ? $this->getDefaultAttrs()
      : get_called_class()::$defaultAttrs ?? [];

    return $attrs + $default;
  }

  public function __get(string $name)
  {
    $getterName = 'get' . ucfirst($name);

    if (method_exists($this, $getterName)) {
      return $this->$getterName();
    } else {
      return $this->$name;
    }
  }

  public function __set(string $name, $value)
  {
    $setterName = 'set' . ucfirst($name);

    if (method_exists($this, $setterName)) {
      $this->$setterName($value);
    } else {
      if (property_exists($this, $name)) {
        throw new \Exception('Can\'t assign private property `' . $name . '`', 1);
      } else {
        $this->{$name} = $value;
      }
    }
  }
}
