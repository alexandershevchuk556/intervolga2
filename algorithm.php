<?php

$a = 5;

$arr = [1123333, 66324255, 344433, 335563];

function insertIntoArray(&$arr, $var, $key) {
    for($i = count($arr) - 1; $i >= $key; $i--) {
        $arr[$i + 1] = $arr[$i];

    }
    $arr[$key] = $var;
}


function numContains($haystack, $needle) {
    $haystack = array_map('intval', str_split($haystack));
    foreach ($haystack as $d) {
        if ($d == $needle) {
            return true;
        } 
    }
    return false;
}


$containsTwo = [];



foreach ($arr as $k => $v) {
    if (numContains($v, 2)) {
        $containsTwo[] = $k + 1;
    }
}
rsort($containsTwo);


foreach($containsTwo as $k) {
    insertIntoArray($arr, $a, $k);
}

print_r($arr);

