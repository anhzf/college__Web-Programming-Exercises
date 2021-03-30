<?php

function buatBintang(int $n)
{
    echo "<pre>";

    for ($i = 0; $i < $n; $i++) {

        for ($j = 0; $j < $i; $j++) {
            echo "*";
        }

        echo "\n";
    }

    echo "</pre>";
}

buatBintang(100);
buatBintang(10);
