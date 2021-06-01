<?php

use lib\Helper;
use lib\Component;
// define props with default values
$class = $class ?? '';
$type = $type ?? 'text';
$inputId = $inputId ?? $_['renderId'];
$inputClass = $inputClass ?? '';
$placeholder = $placeholder ?? '';
$hint = $hint ?? '';
// define all props
$_props = ['label', 'placeholder', 'class', 'type', 'hint', 'inputId', 'inputClass'];
// rest data will be passed as attributes
$_attrs = Helper::arrayExcludeKeys(get_defined_vars(), array_merge($_props, ['_', '_props']));
// internal
$_class = "form-floating {$class}";
$_inputClass = "form-control {$inputClass}";
?>


<div class="<?= $_class ?>">
  <input <?= Component::arrayToAttrs($_attrs + ['id' => $inputId, 'type' => $type, 'placeholder' => $placeholder, 'class' => $_inputClass]) ?>>
  <label for="<?= $inputId ?>"><?= $label ?></label>
  <small class="mx-2 text-muted"><?= $hint ?></small>
</div>
