<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
</head>
<body>
<form method="post" action="">
    <input type="number" name="liczba1" required>
    <select name="dzialanie" required>
        <option value="dodawanie">+</option>
        <option value="odejmowanie">-</option>
        <option value="mnozenie">*</option>
        <option value="dzielenie">/</option>
    </select>
    <input type="number" name="liczba2" required>
    <input type="submit" value="Oblicz">
</form>
<?php
if(isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['dzialanie'])) {
    $liczba1 = $_POST['liczba1'];
    $liczba2 = $_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];

    if($dzialanie == 'dodawanie') {
        $wynik = $liczba1 + $liczba2;
        echo "<p>Wynik: $wynik</p>";
    }
    elseif($dzialanie == 'odejmowanie') {
        $wynik = $liczba1 - $liczba2;
        echo "<p>Wynik: $wynik</p>";
    }
    elseif($dzialanie == 'mnozenie') {
        $wynik = $liczba1 * $liczba2;
        echo "<p>Wynik: $wynik</p>";
    }
    elseif($dzialanie == 'dzielenie') {
        if($liczba2 == 0) {
            echo "<p>Nie można dzielić przez zero!</p>";
        }
        else {
            $wynik = $liczba1 / $liczba2;
            echo "<p>Wynik: $wynik</p>";
        }
    }
}
?>
</body>
</html>
