<?php
require './lib.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headings</title>
</head>

<body>
    <?php
    $i = 1;

    do {
        $fontColor = isEven($i) ? 'red' : 'black';

        echo '<h' . $i . ' style="color: ' . $fontColor . '">Heading ' . $i . '</h' . $i . '>';
    } while ($i++ < 6);
    ?>
</body>

</html>