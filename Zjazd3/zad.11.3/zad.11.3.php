<!DOCTYPE html>
<html>
<head>
    <title>Lista odnośników</title>
</head>
<body>
<h1>Lista odnośników</h1>
<?php
$file = "adresy.txt";
if (file_exists($file)) {
    $lines = file($file);
    echo "<ul>";
    foreach ($lines as $line) {
        $parts = explode(';', $line);
        $url = trim($parts[0]);
        $description = trim($parts[1]);
        echo "<li><a href=\"$url\">$description</a></li>";
    }
    echo "</ul>";
} else {
    echo "Plik $file nie istnieje.";
}
?>
</body>
</html>