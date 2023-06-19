<!DOCTYPE html>
<html>
<head>
    <title>Portal Samochodowy</title>
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
</head>
<body>
<h1>Portal Samochodowy</h1>

<table>
    <tr>
        <th><a href="zad.1.php">Strona główna</a></th>
        <th><a href="all-cars.php">Wszystkie samochody</a></th>
        <th><a href="add-car.php">Dodaj samochód</a></th>
    </tr>
</table>

<h2>Samochody z najniższą ceną:</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Marka</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Rok</th>
    </tr>

    <?php

    $host = 'localhost';
    $port = 3307;
    $dbname = 'mojaBaza';
    $username = 'root';


    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "SELECT id, marka, model, cena, rok FROM samochody ORDER BY cena LIMIT 5";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["marka"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["cena"] . "</td>";
                echo "<td>" . $row["rok"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Brak samochodów w bazie danych</td></tr>";
        }
    } catch (PDOException $e) {
        echo "Błąd połączenia: " . $e->getMessage();
    }

    $conn = null;
    ?>

</table>

</body>
</html>
