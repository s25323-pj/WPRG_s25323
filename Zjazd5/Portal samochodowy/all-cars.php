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
    <title>Wszystkie samochody</title>
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
<h1>Wszystkie samochody</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Marka</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Akcje</th>
    </tr>

    <?php

    $host = 'localhost';
    $port = 3307;
    $dbname = 'mojaBaza';
    $username = 'root';


    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "SELECT id, marka, model, cena FROM samochody ORDER BY rok";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {

            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["marka"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["cena"] . "</td>";
                echo "<td>";
                echo "<a href='car-details.php?id=" . $row["id"] . "'>Szczegóły</a>";
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
