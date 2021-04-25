<?php
require './lib.php';

$row = 4;
$col = 5;
$numb = 1;

?>
<table border="1">
    <?php for ($i = 0; $i < $row; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < $col; $j++) {
                $fontColor = isEven($numb) ? 'white' : 'red';
                $bgColor = isEven($numb) ? 'red' : 'white';
            ?>
                <td style="background-color: <?= $bgColor ?>; color: <?= $fontColor ?>;"><?= $numb ?></td>
            <?php $numb++; } ?>
        </tr>
    <?php } ?>
</table>
