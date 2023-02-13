<?php
// 1. Reusable PHP Function that can check Even & Odd Number And Return Decision
function isEven(int $num){
    if ($num % 2 == 0){
        return true;
    }
    return false;
}

$number = 29;
if (isEven($number)){
    echo "{$number} is an even number.";
} else {
    echo "{$number} is an odd number.";
}

echo "\n";

// 2. The summation of the 1+2+3...…….100 series
$start = 1;
$end = 100;
$sum = 0;
for($i = $start; $i <= $end; $i++)
{
    $sum += $i;
}
echo "The sum of the numbers {$start} to {$end} is {$sum}";