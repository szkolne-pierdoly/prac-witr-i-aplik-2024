<?php
try {
    $connection = new mysqli("db", "admin", "supersecret", "baza", 3306);
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }
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
    <div>
        <h3>Baza flmow</h3>
        <form method="POST">
            <select name="gat">
                <option>Sci-Fi</option>
                <option>animacja</option>
                <option>dramat</option>
                <option>horror</option>
                <option>komedia</option>
            </select>
            <input type="submit" value="Filmy" />
        </form>
        <?php
            if (isset($_POST['gat'])) {
                echo "TEST";
            } else {
                return;
            }
        ?>
    </div>
</body>
</html>