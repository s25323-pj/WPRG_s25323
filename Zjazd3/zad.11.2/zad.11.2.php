<?php
$file = "licznik.txt";

if (file_exists($file)) {
    $count = file_get_contents($file);
    $count++;
    file_put_contents($file, $count);
} else {
    $count = 1;
    file_put_contents($file, $count);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Licznik odwiedzin</title>
</head>
<body>
<h1>Witaj na stronie!</h1>
<p>Liczba odwiedzin: <?php echo $count; ?></p>
</body>
</html>