<?php

if (isset($_COOKIE['odwiedzina'])) {
    $odwiedzone = explode(',', $_COOKIE['odwiedzina']);
} else {
    $odwiedzone = array();
}
if (!in_array($_SERVER['REQUEST_URI'], $odwiedzone)) {
    $odwiedzone[] = $_SERVER['REQUEST_URI'];
    setcookie('odwiedzina', implode(',', $odwiedzone), time() + (30 * 24 * 60 * 60));
}
echo "Liczba odwiedzonych stron: " . count($odwiedzone);
?>
