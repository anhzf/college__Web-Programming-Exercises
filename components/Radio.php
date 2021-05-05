<?php

use lib\Helper;
use lib\Component;

$class = $class ?? '';
$inputId = $inputId ?? $_['renderId'];
$inputClass = $inputClass ?? '';

$_props = ['label', 'name', 'class', 'inputId', 'inputClass'];
$_attrs = Helper::arrayExcludeKeys(get_defined_vars(), array_merge($_props, ['_', '_props']));

$_class = "{$class}";
$_inputClass = "{$inputClass}";
?>

<div class="<?= $_class ?>">
  <label>
    <input name="<?= $name ?>" type="radio" <?= Component::arrayToAttrs($_attrs + ['id' => $inputId, 'class' => $_inputClass]) ?> />
    <span><?= $label ?></span>
  </label>
</div>
