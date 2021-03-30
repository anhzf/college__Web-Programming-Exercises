<?php

function gandakanString(string $string, int $n)
{
    return str_repeat($string, $n);
}

echo gandakanString('Hello ', 10);