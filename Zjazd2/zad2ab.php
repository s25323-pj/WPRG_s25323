<!DOCTYPE html>
<html>
<head>
    <title>Formularz rezerwacji hotelowej</title>
</head>
<body>
<h1>Formularz rezerwacji hotelowej</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="num_of_guests">Liczba osób (1-4): *</label>
    <select id="num_of_guests" name="num_of_guests" required>
        <option value="">Proszę wybrać</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br><br>
    <label for="first_name">Imię: *</label>
    <input type="text" id="first_name" name="first_name" required>
    <br><br>
    <label for="last_name">Nazwisko: *</label>
    <input type="text" id="last_name" name="last_name" required>
    <br><br>
    <label for="address">Adres: *</label>
    <input type="text" id="address" name="address" required>
    <br><br>
    <label for="credit_card">Numer karty kredytowej: *</label>
    <input type="text" id="credit_card" name="credit_card" required>
    <br><br>
    <label for="email">E-mail: *</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="check_in_date">Data zameldowania: *</label>
    <input type="date" id="date" name="date" required>
    <br><br>
    <label for="arrival_time">Godzina zameldowania: *</label>
    <input type="time" id="arrival_time" name="arrival_time" >
    <br><br>
    <label for="child_bed">Czy potrzebujesz dodatkowego łóżka dla dziecka?</label>
    <input type="checkbox" id="child_bed" name="child_bed">
    <br><br>
    <label for="amenities">Udogodnienia:</label><br>
    <input type="checkbox" id="amenities" name="amenities[]" value="Klimatyzacja">
    <label for="amenities">Klimatyzacja</label><br>
    <input type="checkbox" id="amenities" name="amenities[]" value="Pokój dla palących">
    <label for="amenities">Pokój dla palących</label><br>
    <br>
    <input type="submit" value="Wyślij">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numOfGuests = $_POST['num_of_guests'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $creditCard = $_POST['credit_card'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $arrivalTime = $_POST['arrival_time'];
    $childBed = isset($_POST['child_bed']) ? 'Tak' : 'Nie';
    $amenities = isset($_POST['amenities'])
        ? implode(', ', $_POST['amenities'])
        : '';

    $template = '
      <h2>Podsumowanie rezerwacji</h2>
      <p>Liczba osób: %s</p>
      <p>Imię: %s</p>
      <p>Nazwisko: %s</p>
      <p>Adres: %s</p>
      <p>Numer karty kredytowe: %s</p>
      <p>Email: %s</p>
      <p>Data: %s</p>
      <p>Godzina zameldowania: %s</p>
      <p>Łóżko dla dziecka: %s</p>
      <p>Udogodnienia: %s</p>';

    printf($template, $numOfGuests, $firstName, $lastName, $address, $creditCard, $email, $date, $arrivalTime, $childBed, $amenities);
}
?>
</body>
</html>

