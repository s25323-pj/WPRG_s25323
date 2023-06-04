<!DOCTYPE html>
<html>
<head>
    <title>Dane osob</title>
</head>
<body>
<h1>Dane osób</h1>
<form action="str3.php" method="POST">
    <?php
    $num_of_people = $_POST['num_of_people'];
    echo '<input type="hidden" name="num_of_people" value="'.$num_of_people.'">'; // Przekazanie ilości osób do trzeciej podstrony

    echo '<input type="hidden" name="card_number" value="'.$_POST['card_number'].'">'; // Przekazanie numeru karty do trzeciej podstrony
    echo '<input type="hidden" name="customer_name" value="'.$_POST['customer_name'].'">'; // Przekazanie danych zamawiającego do trzeciej podstrony

    for ($i = 1; $i <= $num_of_people; $i++) {
        echo '<h3>Osoba '.$i.'</h3>';
        echo '<label>Imię:</label>';
        echo '<input type="text" name="person['.$i.'][name]"><br>';

        echo '<label>Nazwisko:</label>';
        echo '<input type="text" name="person['.$i.'][surname]"><br>';
    }
    ?>
    <input type="submit" name="save_data" value="Zapisz dane">
    <input type="submit" name="summary" value="Przejdź do podsumowania">
</form>
</body>
</html>
