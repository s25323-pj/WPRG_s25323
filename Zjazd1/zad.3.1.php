<?php
function maxarg($arg) {
//    // for loop
//    $max = $arg[0];
//    for ($i = 1; $i < count($arg); $i++) {
//        if ($arg[$i] > $max) {
//            $max = $arg[$i];
//        }
//    }
//    return $max;

//    // while loop
//    $max = $arg[0];
//    $i = 1;
//    while ($i < count($arg)) {
//        if ($arg[$i] > $max) {
//            $max = $arg[$i];
//        }
//        $i++;
//    }
//    return $max;

    // do while loop
    $max = $arg[0];
    $i = 1;
    do {
        if ($arg[$i] > $max) {
            $max = $arg[$i];
        }
        $i++;
    } while ($i < count($arg));
    return $max;

//    // foreach loop
//    $max = $arg[0];
//    foreach ($arg as $value) {
//        if ($value > $max) {
//            $max = $value;
//        }
//    }
//    return $max;
}

$arr = array(7, 4, 2, 9, 8, 3);
echo maxarg($arr);
?>