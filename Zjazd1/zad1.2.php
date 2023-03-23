<?php

function srednica($promien)
{
    $srednica = 2 * $promien;
    return $srednica;
}

$promien = 3;
$srednica = srednica($promien);
echo "$srednica";

?>