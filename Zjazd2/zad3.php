<!DOCTYPE html>
<html>
<head>
    <title>Formularz rezerwacji hotelowej</title>
</head>
<body>
<h1>Formularz rezerwacji hotelowej</h1>
<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="liczba_osob">Liczba osób (1-4): *</label>
        <select id="liczba_osob" name="liczba_osob" required>
            <option value="">Wybierz</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br><br>

        <label for="adres">Adres: *</label>
        <input type="text" id="adres" name="adres" required>
        <br><br>

        <label for="numer_karty">Numer karty kredytowej: *</label>
        <input type="text" id="numer_karty" name="numer_karty" required>
        <br><br>

        <label for="email">Adres e-mail: *</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="data_przyjazdu">Data przyjazdu: *</label>
        <input type="date" id="data_przyjazdu" name="data_przyjazdu" required>
        <br><br>

        <label for="godzina_przyjazdu">Godzina przyjazdu: *</label>
        <input type="time" id="godzina_przyjazdu" name="godzina_przyjazdu">
        <br><br>

        <label for="dostawka_dla_dziecka">Czy potrzebna dostawka dla dziecka?</label>
        <input type="checkbox" id="dostawka_dla_dziecka" name="dostawka_dla_dziecka">
        <br><br>

        <label for="wyposazenie">Wyposażenie:</label><br>
        <input type="checkbox" id="wyposazenie" name="wyposazenie[]" value="Klimatyzacja">
        <label for="wyposazenie">Klimatyzacja</label><br>
        <input type="checkbox" id="wyposazenie" name="wyposazenie[]" value="Pokój dla palących">
        <label for="wyposazenie">Pokój dla palących</label><br>
        <br>
        <input type="hidden" id="formularzId" name="formularzId" value="pierwszyFormularz"/>
        <input type="submit" value="Wyślij">
    </form>

<?php } ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $liczbaOsob = $_POST['liczba_osob'];
    $dostawkaDlaDziecka = isset($_POST['dostawka_dla_dziecka']) ? 'Tak' : 'Nie';
    $wyposazenie = isset($_POST['wyposazenie'])
        ? implode(', ', $_POST['wyposazenie'])
        : '';

    $dane = array(
        "liczba_osob" => $liczbaOsob,
        "adres" => $_POST['adres'],
        "numer_karty" => $_POST['numer_karty'],
        "email" => $_POST['email'],
        "data" => $_POST['data'],
        "godzina_przyjazdu" => $_POST['godzina_przyjazdu'],
        "dostawka_dla_dziecka" => $dostawkaDlaDziecka,
        "wyposazenie" => $wyposazenie
    );

    $serializedDane = htmlspecialchars(serialize($dane));

    echo '<form method="POST" action="processGuestsForm.php">';
    for ($i = 1; $i <= $liczbaOsob; $i++) {
        echo '<label for="imiona' . $i . '">Imię osoby ' . $i . ': </label>';
        echo '<input type="text" name="imiona[]' . $i . '" id="imiona' . $i . '">';
        echo '<br><br>';
        echo '<label for="nazwiska' . $i . '">Nazwisko osoby ' . $i . ': </label>';
        echo '<input type="text" name="nazwiska[]' . $i . '" id="nazwiska' . $i . '">';
        echo '<br><br>';
    }
    ?>
    <input type="hidden" name="dane" id="dane" value="<?php echo $serializedDane; ?>"/>
    <?php
    echo '<input type="submit" value="Wyślij">';
    echo '</form>';
}
?>
</body>
</html>
