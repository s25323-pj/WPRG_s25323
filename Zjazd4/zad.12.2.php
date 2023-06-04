<?php

if (isset($_COOKIE['licznik'])) {
    $licznik = $_COOKIE['licznik'];
} else {

    $licznik = 0;
}
$licznik++;
setcookie('licznik', $licznik, time() + (30 * 24 * 60 * 60));
$limit = 5;
if ($licznik >= $limit) {
    echo "Osiągnięto limit odwiedzin.";
} else {
    echo "Liczba odwiedzin: " . $licznik;
}
?>
