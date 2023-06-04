<!DOCTYPE html>
<html>
<head>
    <title>Podsumowanie</title>
</head>
<body>
<h1>Podsumowanie</h1>
<h2>Dane ogólne:</h2>
<?php
session_start();
$card_number = $_POST['card_number']; // Odczytanie numeru karty
$customer_name = $_POST['customer_name']; // Odczytanie danych zamawiającego
$num_of_people = $_POST['num_of_people'];

echo '<p>Numer karty: '.$card_number.'</p>';
echo '<p>Dane zamawiającego: '.$customer_name.'</p>';
echo '<p>Ilość osób: '.$num_of_people.'</p>';
?>

<h2>Dane osób:</h2>
<?php
if (isset($_POST['save_data'])) {
    $people = $_POST['person'];
    $_SESSION['people'] = $people;

    echo '<ul>';
    foreach ($people as $person) {
        echo '<li>Imię: '.$person['name'].', Nazwisko: '.$person['surname'].'</li>';
    }
    echo '</ul>';
} elseif (isset($_POST['summary'])) {
    $people = $_SESSION['people'];

    echo '<ul>';
    foreach ($people as $person) {
        echo '<li>Imię: '.$person['name'].', Nazwisko: '.$person['surname'].'</li>';
    }
    echo '</ul>';
}
?>
</body>
</html>
