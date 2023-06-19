<!DOCTYPE html>
<html>
<head>
    <table>
        <tr>
            <th><a href="zad.1.php">Strona główna</a></th>
            <th><a href="all-cars.php">Wszystkie samochody</a></th>
            <th><a href="add-car.php">Dodaj samochód</a></th>
        </tr>
    </table>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Dodaj samochód</title>
</head>
<body>
<h1>Dodaj samochód</h1>

<form method="POST" action="add-car.php">
    <label>Marka:</label>
    <input type="text" name="marka" required><br>

    <label>Model:</label>
    <input type="text" name="model" required><br>

    <label>Cena:</label>
    <input type="number" name="cena" required><br>

    <label>Rok produkcji:</label>
    <input type="number" name="rok" required><br>

    <label>Opis:</label>
    <textarea name="opis" required></textarea><br>

    <input type="submit" value="Dodaj samochód">
</form>


</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Połączenie z bazą danych
    $host = 'localhost';
    $port = 3307; // Twój numer portu
    $dbname = 'mojaBaza';
    $username = 'root';

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Pobranie danych z formularza
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $cena = $_POST['cena'];
        $rok = $_POST['rok'];
        $opis = $_POST['opis'];

        // Wstawienie danych do bazy
        $sql = "INSERT INTO samochody (marka, model, cena, rok, opis) VALUES (:marka, :model, :cena, :rok, :opis)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':marka', $marka);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':cena', $cena);
        $stmt->bindParam(':rok', $rok);
        $stmt->bindParam(':opis', $opis);
        $stmt->execute();

        echo "Samochód został dodany do bazy danych.";

    } catch (PDOException $e) {
        echo "Błąd połączenia: " . $e->getMessage();
    }

    $conn = null;
}
?>

