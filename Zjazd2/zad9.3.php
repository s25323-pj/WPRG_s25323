<!DOCTYPE html>
<html>
<head>
    <title>Obsługa katalogu</title>
</head>
<body>
<form method="post">
    <label>Ścieżka: </label>
    <input type="text" name="path" placeholder="./php/images/network/"><br>
    <label>Nazwa katalogu: </label>
    <input type="text" name="directory_name"><br>
    <label>Rodzaj operacji: </label>
    <select name="operation">
        <option value="read">Odczytanie</option>
        <option value="delete">Usunięcie</option>
        <option value="create">Stworzenie</option>
    </select><br>
    <input type="submit" name="submit" value="Wykonaj">
</form>

<?php
if(isset($_POST['submit'])){
    $path = $_POST['path'];
    $directory_name = $_POST['directory_name'];
    $operation = $_POST['operation'];
    if(substr($path, -1) != '/'){
        $path .= '/';
    }
    $directory_path = $path . $directory_name;
    if($operation == 'read'){
        if(is_dir($directory_path)){
            $files = scandir($directory_path);
            echo "<p>Lista elementów w katalogu $directory_name:</p>";
            echo "<ul>";
            foreach($files as $file){
                if($file != '.' && $file != '..'){
                    echo "<li>$file</li>";
                }
            }
            echo "</ul>";
        }
        else{
            echo "<p>Katalog $directory_name nie istnieje!</p>";
        }
    }
    elseif($operation == 'delete'){
        if(is_dir($directory_path)){
            if(count(scandir($directory_path)) == 2){
                rmdir($directory_path);
                echo "<p>Katalog $directory_name został usunięty!</p>";
            }
            else{
                echo "<p>Katalog $directory_name nie jest pusty!</p>";
            }
        }
        else{
            echo "<p>Katalog $directory_name nie istnieje!</p>";
        }
    }
    elseif($operation == 'create'){
        if(!is_dir($directory_path)){
            mkdir($directory_path);
            echo "<p>Katalog $directory_name został utworzony w ścieżce $path</p>";
        }
        else{
            echo "<p>Katalog $directory_name już istnieje w ścieżce $path!</p>";
        }
    }
}
?>
</body>
</html>