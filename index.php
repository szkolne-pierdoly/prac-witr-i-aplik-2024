<?php
$database_adress="db";
$database_user="root";
$database_password="supersecret";
$database_db="baza";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dostepe ankiety:</h1>
    <?php
        $conn = new mysqli($database_adress, $database_user, $database_password);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        echo "connected successfully";
    ?>
</body>
</html>