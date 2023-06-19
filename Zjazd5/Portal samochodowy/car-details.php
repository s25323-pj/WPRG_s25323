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
    <title>Szczegóły samochodu</title>
</head>
<body>
<h1>Szczegóły samochodu</h1>

<?php

$host = 'localhost';
$port = 3307;
$dbname = 'mojaBaza';
$username = 'root';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET['id'])) {
        $carId = $_GET['id'];
        $sql = "SELECT * FROM samochody WHERE id = :carId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':carId', $carId);
        $stmt->execute();
        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car) {
            echo "<h2>Marka: " . $car['marka'] . "</h2>";
            echo "<p>Model: " . $car['model'] . "</p>";
            echo "<p>Cena: " . $car['cena'] . "</p>";
            echo "<p>Rok produkcji: " . $car['rok'] . "</p>";
            echo "<p>Opis: " . $car['opis'] . "</p>";
            echo "<a href='all-cars.php'>Powrót</a>";
        } else {
            echo "<p>Nie znaleziono samochodu o podanym identyfikatorze.</p>";
        }
    } else {
        echo "<p>Nieprawidłowy identyfikator samochodu.</p>";
    }
} catch (PDOException $e) {
    echo "Błąd połączenia: " . $e->getMessage();
}

$conn = null;
?>

</body>
</html>
