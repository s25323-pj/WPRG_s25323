<!DOCTYPE html>
<html>
<head>
    <title>Sprawdź, czy liczba jest liczbą pierwszą</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="liczba">Wpisz liczbę:</label>
    <input type="number" name="liczba" id="liczba" required>
    <input type="submit" name="submit" value="Sprawdź">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba = $_POST["liczba"];

    $iteracje = 0;

    if (filter_var($liczba, FILTER_VALIDATE_INT) && $liczba > 1) {
        if (czyPierwsza($liczba, $iteracje)) {
            echo "$liczba jest liczbą pierwszą. (Liczba iteracji: " . $iteracje . ")";
        } else {
            echo "$liczba nie jest liczbą pierwszą. (Liczba iteracji: " . $iteracje . ")";
        }
    } else {
        echo "Proszę wprowadzić dodatnią liczbę całkowitą większą niż 1. (Liczba iteracji: " . $iteracje . ")";
    }
}

function czyPierwsza($n, &$iteracje) {
    if (($n > 2 && $n % 2 == 0) || ($n > 3 && $n % 3 == 0)) {
        return false;
    }
    for ($i = 5; $i <= sqrt($n); $i += 2) {
        $iteracje++;
        if ($n % $i == 0) {
            return false;
        }
    }
    $iteracje++;

    return true;
}
?>