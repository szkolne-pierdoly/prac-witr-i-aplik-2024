<?php
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : "Id";

try {
    $connection = new mysqli("db", "admin", "supersecret", "baza", 3306);
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }

    // Select data from the database
    $sql = "SELECT * FROM osoba ORDER BY $orderBy";
    $result = $connection->query($sql);

    if (!$result) {
        throw new Exception("Query failed: " . $connection->error);
    }

    $connection->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      table, th, td {
        border: 1px solid black;
      }

      th, td {
        background-color: #fff;
        padding: 6px 12px;
      }

      table {
        background-color: #000;
      }
    </style>
</head>
<body>
    <h1>здраствуй цие</h1>
    <table>
      <tr>
        <th onclick="window.location.href='?orderBy=Id'">Id</th>
        <th onclick="window.location.href='?orderBy=Imie'">Imie</th>
        <th onclick="window.location.href='?orderBy=Nazwisko'">Nazwisko</th>
        <th onclick="window.location.href='?orderBy=Rok_urodzenia'">Rok Urodzenia</th>
        <th onclick="window.location.href='?orderBy=Miejsce_urodzenia'">Miejsce Urodzenia</th>
      </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . "</td>";
        echo "<td>" . $row["Imie"] . "</td>";
        echo "<td>" . $row["Nazwisko"] . "</td>";
        echo "<td>" . $row["Rok_urodzenia"] . "</td>";
        echo "<td>" . $row["Miejsce_urodzenia"] . "</td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>