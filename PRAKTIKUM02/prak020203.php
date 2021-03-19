<?php
require './lib.php';

$row = 4;
$col = 5;

?>
<table border="1">
    <?php for ($i = 0; $i < $row; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < $col; $j++) {
                $numb = ($i + 1) * ($j + 1);
                $fontColor = isEven($numb) ? 'white' : 'red';
                $bgColor = isEven($numb) ? 'red' : 'white';
            ?>
                <td style="background-color: <?= $bgColor ?>; color: <?= $fontColor ?>;"><?= $numb ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>