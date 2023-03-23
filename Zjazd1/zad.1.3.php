<?php

function cenzura($zdanie)
{
    $do_cenzury = array("wiadro", "Marcin");
    $liczba_slow = count($do_cenzury);

    for ($i = 0; $i < $liczba_slow; $i++) {
        $dlugosc_slowa = strlen($do_cenzury[$i]);
        $gwiazdki = str_repeat('*', $dlugosc_slowa);
        $zdanie = str_ireplace($do_cenzury[$i], $gwiazdki, $zdanie);
    }

    return $zdanie;
}

$zdanie = "Marcin poszedł po wiadro. Po co poszedł Marcin?";
echo $dobre_zdanie = cenzura($zdanie);


?>