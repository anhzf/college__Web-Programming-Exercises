<?php

function hitungGaji(string $gol, int $masaKerja)
{
    switch (strtoupper($gol)) {
        case 'A':
            return $masaKerja < 10 ? 5_000_000 : 7_000_000;
            
        case 'B':
            return $masaKerja < 10 ? 6_000_000 : 8_000_000;

        default:
            return 0;
    }
}

echo hitungGaji('A', 9) . "<br />";
echo hitungGaji('A', 10) . "<br />";
echo hitungGaji('B', 9) . "<br />";
echo hitungGaji('B', 10) . "<br />";