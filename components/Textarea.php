<?php
use lib\Helper;
use lib\Component;

$value = $value ?? '';
$class = $class ?? '';
$inputId = $inputId ?? $_['renderId'];
$inputClass = $inputClass ?? '';

$_props = ['label', 'value', 'class', 'inputId', 'inputClass'];
$_attrs = Helper::arrayExcludeKeys(get_defined_vars(), array_merge($_props, ['_', '_props']));

$_class = "input-field {$class}";
$_inputClass = "materialize-textarea {$inputClass}";
?>

<div class="<?= $_class ?>">
  <textarea <?= Component::arrayToAttrs($_attrs + ['id' => $inputId, 'class' => $_inputClass]) ?>><?= $value ?></textarea>
  <label for="<?= $inputId ?>"><?= $label ?></label>
</div>
