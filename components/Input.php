<?php
use lib\Helper;
use lib\Component;

$class = $class ?? '';
$type = $type ?? 'text';
$inputId = $inputId ?? $_['renderId'];
$inputClass = $inputClass ?? '';

$_props = ['label', 'class', 'type', 'inputId', 'inputClass'];
$_attrs = Helper::arrayExcludeKeys(get_defined_vars(), array_merge($_props, ['_', '_props']));

$_class = "input-field {$class}";
$_inputClass = "validate {$inputClass}";
?>


<div class="<?= $_class ?>">
  <input <?= Component::arrayToAttrs($_attrs + ['id' => $inputId, 'type' => $type, 'class' => $_inputClass]) ?>>
  <label for="<?= $inputId ?>"><?= $label ?></label>
</div>
