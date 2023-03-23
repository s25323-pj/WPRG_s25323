<?php
function getRandomArrayValue($index)
{
    $randomArray = array();
    for ($i = 0; $i < 10; $i++) {
        $randomArray[] = rand(0, 100);
    }
    return $randomArray[$index];
}

echo "Wartość elementu o indeksie 3 to: " . getRandomArrayValue(3);
?>