<?php


$userIP = $_SERVER['REMOTE_ADDR'];

$ipFile = 'adresy_ip.txt';
$allowedIPs = file($ipFile, FILE_IGNORE_NEW_LINES);

if (in_array($userIP, $allowedIPs)) {
    include 'strona_uprawniona.php';
} else {
    include 'domyslna_strona.php';
}
?>
