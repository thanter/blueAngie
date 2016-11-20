<?php



function addSuffix($num)
{
    $num = $num % 100; // protect against large numbers
    if ($num < 11 || $num > 13)
    {
        switch ($num % 10)
        {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}
