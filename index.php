<?php
 $tuition_fee = 15000;

$commission = ($tuition_fee >= 20000) ? "You have got 25% commission. Your commission amount is $". (25 / 100) * $tuition_fee : (($tuition_fee >= 10000 && $tuition_fee < 20000) ? "You have got 20% commission. Your commission amount is $". (20 / 100) * $tuition_fee : (($tuition_fee >= 7000 && $tuition_fee < 10000) ? "You have got 15% commission. Your commission amount is $". (15 / 100) * $tuition_fee ." commission." : "Data is Invalid."));
echo $commission;