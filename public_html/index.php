<?php

$n = 8;
$s = 'DDUUDDUU';

//$test = str_split($s);

//$s = [
//    'U', 'D', 'D', 'D', 'U', 'D', 'U', 'U'
//];

//function sockMerchant($n, $ar)
//{
//    $array_new = array_count_values($ar);
//    $pairs = 0;
//    foreach ($array_new as $key => $sock) {
//        $pairs += floor($sock / 2);
//    }
//
//    return $pairs;
//}
//
//;
//
// var_dump(sockMerchant($n, $ar));


function countingValleys($n, $s)
{
    $count = 0;
    $result = 0;
    $array = str_split($s);
    foreach ($array as $value) {
        if ($value === 'U') {
            $count++;
            if ($count === 0) {
                $result++;
            }
        } else {
            $count--;
        }
    }
    return $result;
}


var_dump(countingValleys($n, $s));