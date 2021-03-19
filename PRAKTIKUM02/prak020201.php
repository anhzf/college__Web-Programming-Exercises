<?php

$row = 4;
$col = 5;

?>

<table border="1">
    <?php for ($i = 0; $i < $row; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < $col; $j++) { ?>
                <td>Hello</td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>