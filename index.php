<?php
try {
    $connection = new mysqli("db", "admin", "supersecret", "baza", 3306);
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }

    // Select data from the database
    $sql = "SELECT * FROM osoba";
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
</head>
<body>
    <h1>здраствуй цие</h1>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["Imie"] . " " . $row["Nazwisko"] . "</p>";
    }
    ?>
</body>
</html>