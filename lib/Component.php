<?php

namespace lib;

class Component
{
  /**
   * Resolve component then render it
   *
   * @param string $componentName the component path, relative to `components/`
   * @param array $props component props
   * @return void
   **/
  public static function render(string $componentName, array $props = [])
  {
    $_ = [
      'renderId' => uniqid("{$componentName}_"),
      'component' => [
        'name' => $componentName,
      ],
    ];

    extract($props);
    unset($props, $componentName);
    require APP_ROOT . "/components/{$_['component']['name']}.php";
  }

  public static function arrayToAttrs(array $attrs)
  {
    $res = '';

    foreach ($attrs as $attrName => $attrValue) {
      if (boolval($attrValue)) {
        $val = is_string($attrValue) ? "\"{$attrValue}\"" : json_encode($attrValue);
        $res .= " {$attrName}=". $val;
      }
    }

    return $res;
  }
}
