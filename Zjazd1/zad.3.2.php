<?php
function rzut($scianki, $rzuty)
{
    $wyniki = array();
    for ($i = 0; $i < $rzuty; $i++) {
        $wyniki[] = rand(1, $scianki);
    }
    return $wyniki;
}

$results = rzut(6, 5);
print_r($results);
?>
