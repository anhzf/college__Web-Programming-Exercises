<?php

define('MULTIPLIER', 3000);

function hitungDenda(string $tglHarusKembali, string $tglKembali)
{
    $date1 = date_create($tglHarusKembali);
    $date2 = date_create($tglKembali);
    $dayDiff = date_diff($date1, $date2)->days;

    return $dayDiff * MULTIPLIER;
}

echo "Besarnya denda adalah: Rp " . hitungDenda('2021-01-03', '2021-01-05');
