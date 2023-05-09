<!DOCTYPE html>
<html>
<head>
    <title>Odwróć kolejność wierszy</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $file = $_FILES["fileToUpload"]["tmp_name"];
    $lines = file($file);
    $reversed = array_reverse($lines);
    foreach ($reversed as $line) {
        echo $line . "<br>";
    }
}
?>
</body>
</html>